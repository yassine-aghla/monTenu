<?php
namespace App\Repositories;

interface UserRepositoryInterface
{
    public function create(array $data);
    public function findByEmail(string $email);
    public function updatePassword(string $email, string $password);
}