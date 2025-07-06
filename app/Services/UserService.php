<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function createTeacher(array $data)
    {
        // Hash the password before saving
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        // Ensure role is teacher
        $data['role'] = 'teacher';

        // Ensure status is active by default
        $data['status'] = '1';
        return $this->userRepository->createTeacher($data, $data['photo'] ?? null);
    }
}
