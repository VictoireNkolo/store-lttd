<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use App\Repositories\PasswordResetRepository;
use App\Http\Requests\EmailRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\PasswordReset;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{

    private $userRepository;
    private $passwordResetRepository;

    public function __construct(UserRepository $userRepository, PasswordResetRepository $passwordResetRepository)
    {
        $this->userRepository = $userRepository;
        $this->passwordResetRepository = $passwordResetRepository;
    }

    public function showLinkRequestForm()
    {
        return view('backend.auth.passwords.email');
    }

    public function sendResetLinkEmail(EmailRequest $emailRequest)
    {
        $email_exists = $this->userRepository->verifyEmailExists($emailRequest->only('email'));
        if ($email_exists) {
            $token = Str::random(60);
            $passwordResetDetails = array(
                'email' => $emailRequest['email'],
                'token' => $token
            );

            $has_request = $this->passwordResetRepository->verifyIfRequestExists($emailRequest->only('email'));
            if ($has_request) {
                session()->flash('error', 'Cette adresse email a déjà une requête de ce type en cours ! Veuillez consulter votre boîte mail svp');
                return redirect()->back();
            } else {
                //envoi d'email
                try {
                    Mail::to($emailRequest['email'])
                        ->send(new PasswordReset($passwordResetDetails));
                } catch (\Exception $e) {
                    dd($e->getMessage());
                }
                //On insère le token généré et l'email dans la BD
                $is_stored = $this->passwordResetRepository->save($passwordResetDetails);

                if ($is_stored) {
                    session()->flash('success', 'Un email contenant le lien de réinitialisation de votre mot de passe a été envoyé à l\'adresse email ' . $emailRequest['email'] . ' !');
                    return redirect()->back();
                }
                session()->flash('error', 'Erreur lors de l\'envoi du mail ou de la génération du lien de réinitialisation !');
                return redirect()->back();
            }
        }
        session()->flash('error', 'Aucun utilisateur n\'a été trouvé avec cette adresse email !');
        return redirect()->back();
    }
}
