<?php

namespace App\Services;

use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;

class PasswordService
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function sendResetLink(array $credentials)
    {
        $status = Password::sendResetLink($credentials);

        return $status === Password::RESET_LINK_SENT;
    }

    public function resetPassword(array $credentials)
    {
        $status = Password::reset($credentials, function ($user, $password) {
            $this->userRepository->updatePassword($user->email, $password);
        });

        return $status === Password::PASSWORD_RESET;
    }
}
