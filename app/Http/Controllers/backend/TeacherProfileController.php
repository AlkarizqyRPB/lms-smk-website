<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Services\ProfileService;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Services\PasswordUpdateService;
use App\Http\Requests\PasswordUpdateRequest;

class TeacherProfileController extends Controller
{
    protected $profileService, $passwordUpdateService;

    public function __construct(ProfileService $profileService, PasswordUpdateService $passwordUpdateService){
        $this->profileService = $profileService;
        $this->passwordUpdateService = $passwordUpdateService;
    }
    
    public function index(){
        return view('backend.teacher.profile.index');
    }
    
    public function store(ProfileRequest $request){
        // Pass Data and Files to the service
        $this->profileService->saveProfile($request->validated(), $request ->file('photo'));
        return redirect()->back()->with('success', 'Profile updated successfully');
    }
    
    public function setting(){
        return view('backend.teacher.profile.setting');
    }
    
    public function passwordSetting(PasswordUpdateRequest $request){

        // Pass Data and Files to the service
        $this->passwordUpdateService->updatePassword($request->validated());
        return redirect()->back()->with('success', 'Password updated successfully');
    }
}
