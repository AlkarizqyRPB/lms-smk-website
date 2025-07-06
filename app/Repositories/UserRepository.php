<?php

namespace App\Repositories;

use App\Models\User;
use App\Traits\FileUploadTrait;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    use FileUploadTrait;

    public function createTeacher(array $data, $photo = null){
      // Handle file upload jika ada
        $photoPath = null;
        if ($photo) {
            $photoPath = $this->uploadFile($photo, 'user');
        }

        return User::create([
        'username'   => $data['username'],
        'email'      => $data['email'],
        'password'   => Hash::make('password'), // default password jika tidak dikirim dari request
        'photo'      => $photoPath,
        'phone'      => $data['phone'] ?? null,
        'address'    => $data['address'] ?? null,
        'city'       => $data['city'] ?? null,
        'country'    => $data['country'] ?? null,
        'gender'     => $data['gender'] ?? 'male', // default jika null
        'experience' => $data['experience'] ?? null,
        'role'       => 'teacher',
        'status'     => '1',
    ]);
    }
}
