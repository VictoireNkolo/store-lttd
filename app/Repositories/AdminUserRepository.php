<?php


namespace App\Repositories;


use App\Models\User;

class AdminUserRepository
{

    /**
     * @var User
     */
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getAll()
    {
        return $this->user::where('is_delete', 0)->paginate(5);
    }

    public function delete($id)
    {
        $user = $this->user::find($id);
        $user->is_delete = 1;
        return $user->save();
    }
}
