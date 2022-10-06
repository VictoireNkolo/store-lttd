<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Repositories\AdminUserRepository;
use App\Repositories\PostRepository;
use App\Repositories\UserRepository;

class DashboardController extends Controller
{
    public function index(AdminUserRepository $userRepository)
    {
        $users  =   $userRepository->getAll();
        return view('backend.admin.dashboard.index', ['users' => $users]);
    }
}
