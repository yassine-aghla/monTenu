<?php
namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{
    public function create(array $data)
    {
        return User::create($data);
    }

    public function findByEmail(string $email)
    {
        return User::where('email', $email)->first();
    }

    public function updatePassword(string $email, string $password)
    {
        $user = $this->findByEmail($email);
        if ($user) {
            $user->password = Hash::make($password);
            $user->save();
            return $user;
        }
        return null;
    }
}