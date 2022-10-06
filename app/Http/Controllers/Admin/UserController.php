<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Repositories\AdminUserRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{

    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index(AdminUserRepository $userRepository)
    {
        $users = $userRepository->getAll();
        return view('backend.admin.users.index', ['users' => $users]);
    }

    public function create()
    {
        return view('backend.admin.users.new');
    }

    public function store(UserRequest $request)
    {
        $is_stored = $this->userRepository->save($request->toArray());
        if ($is_stored) {

            session()->flash('success', 'Utilisateur ajouté avec succès !');
            return redirect()->route('lb_admin.admin.user.index');
        }
        session()->flash('error', 'Vos données n\'ont pas pu être sauvegardées');
        return redirect()->back();
        //return redirect()->back()->withErrors($validator)->withInput();
    }

    public function delete(AdminUserRepository $adminUserRepository, $id)
    {
        $is_deleted = $adminUserRepository->delete($id);
        if ($is_deleted) {
            session()->flash('success', 'Suppression effectuée avec succès !');
            return redirect()->route('lb_admin.admin.user.index');
        }
        session()->flash('error', 'Suppression échouée !');
        return redirect()->back();
    }
}
