<?php

namespace App\Repositories;

use App\Models\User;
use App\Traits\FileUploadTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordUpdateRepository{

    use FileUploadTrait; // Use the FileUploadTrait
    
    public function updatePassword($data){
      $user_id = Auth::user()->id;
      $user = User::where('id', $user_id)->first();

      // check if the current password is correct
      if(!Hash::check($data['current_password'], $user->password)){
        return back()->withErrors((['current_password' => 'The current password is incorrect' ]));
      }

      // update password
      $user->password = Hash::make($data['new_password']);
      $user->save();

      return $user;
    }
}