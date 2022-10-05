<?php


namespace App\Repositories;


use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Notifications\RegisteredNotification;

class UserRepository
{

    /**
     * @var User
     */
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * check user login status
     *
     * @param array $arrData
     */
    public function checkLogin(array $arrData): bool
    {
        $user   =   $this->user::where(['email' => $arrData['email']])->first();
        if ($user) {
            if (Hash::check($arrData['password'], $user->password)) {
                return Auth::attempt(['email' => $arrData['email'], 'password' => $arrData['password']], true);
            }
        }
        return false;
    }

    /**
     * Verifies if the given email is assigned to a registered user
     */
    public function verifyEmailExists(array $arrEmail)
    {
        $user = $this->user::where(['email' => $arrEmail['email']])->first();
        if ($user) {
            return true;
        }
        return false;
    }

    public function show($id)
    {
        return $this->user::where(['id' => $id])->first();
    }

    /**
     * Create a user
     *
     * @param array $arrData
     */
    public function save(array $arrData)
    {
        $this->user->name = $arrData['name'];
        $this->user->email = $arrData['email'];
        $this->user->role = $arrData['role'];
        $this->user->password = $arrData['password'];

        $this->user->notify(new RegisteredNotification($this->user));
        $this->user->password = Hash::make($arrData['password']);

        return $this->user->save();
    }

    /**
     * Updates the password of an account with
     * @param array $data
     */
    public function updatePassword($data)
    {
        $user = $this->user::where(['email' => $data['email']])->first();
        $user->password = Hash::make($data['password']);

        return $user->save();
    }
}
