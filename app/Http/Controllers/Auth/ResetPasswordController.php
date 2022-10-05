<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use App\Repositories\PasswordResetRepository;
use App\Http\Requests\PasswordResetRequest;
use Illuminate\Support\Carbon;

class ResetPasswordController extends Controller
{

    private $userRepository;
    private $passwordResetRepository;

    public function __construct(UserRepository $userRepository, PasswordResetRepository $passwordResetRepository)
    {
        $this->userRepository = $userRepository;
        $this->passwordResetRepository = $passwordResetRepository;
    }

    public function showResetForm($token = null)
    {
        //vérification du token et de sa validité
        $request_password_reset = $this->passwordResetRepository->verifyIfTokenIsTrusted($token);

        if ($request_password_reset) {
            $lifetime = Carbon::now()->diffInMinutes($request_password_reset->created_at);

            if ($lifetime <= config('myconfig.password_reset.token_lifetime')) {
                return view('auth.passwords.reset')->with([
                    'token' => $token,
                    'email' => $request_password_reset->email,
                ]);
            }

            // on supprime la requête de reset en BD
            $this->passwordResetRepository->deletePasswordResetRequest($token);
            session()->flash('expired_error', 'Ce lien de réinitialisation n\'est plus valide (plus de 60 minutes), veuillez reprendre l\'opération !');
            return view('backend.auth.passwords.error_reset');
        }
        //token non généré par le système
        session()->flash('faketoken_error', 'Lien de réinitialisation non reconnu par le système !');
        return view('backend.auth.passwords.error_reset');
    }

    public function reset(PasswordResetRequest $passwordResetRequest)
    {
        $update = $this->userRepository->updatePassword($passwordResetRequest->toArray());

        if ($update) {
            $this->passwordResetRepository->deletePasswordResetRequest($passwordResetRequest->token);
            session()->flash('success', 'Mot de passe réinitialisé avec succès !');
            return redirect()->route('lb_admin.login.form');
        }

        session()->flash('error', 'Erreur lors de la réinitialisation du mot de passe, veuillez reprendre l\'opération svp !');
        return redirect()->back();
    }
}
