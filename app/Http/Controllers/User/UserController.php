<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{

    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index($id)
    {
        $users = $this->userRepository->show($id);
        return view('backend.user.users.index', ['users' => $users]);
    }
}
