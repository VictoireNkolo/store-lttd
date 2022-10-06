<?php


namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function showLoginForm()
    {
        return view('backend.auth.login');
    }

    public function saveLogin(LoginRequest $request)
    {
        $is_login = $this->userRepository->checkLogin($request->only(['email', 'password']));
        if ($is_login) {
            if (Auth::user()->role == 'admin') {
                return redirect()->route('lb_admin.admin.dashboard.index');
            }
            return redirect()->route('lb_admin.user.dashboard.index');
        }
        session()->flash('error', 'login ou mot de passe incorrect');
        return redirect()->back();
    }

    public function logout()
    {
        session()->flush();
        Auth::logout();
        return redirect()->route('lb_admin');
    }
}
