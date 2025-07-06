<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;

class AdminTeacherController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService){
        $this->userService = $userService; 
    }

    public function index(){
        $all_teacher = User::where('role', 'teacher')->latest()->get();
        return view('backend.admin.teacher.index', compact('all_teacher'));
    }

    public function create(){
        return view('backend.admin.teacher.create');
    }

    public function store(UserRequest $request){
        $this->userService->createTeacher($request->validated());
        return redirect()->route('admin.teacher.index')->with('success', 'Teacher account created successfully.');
    }
    
    public function updateStatus(Request $request){
        $user = User::find($request->user_id);
        if($user){
            $user->status = $request->status;
            $user->save();

            return response()->json(['success'=> true, 'message' => 'User status update']);
        }
        return response()->json(['success'=>false, 'message' => 'User not found']);
    }

    public function teacherActive(Request $request){
        $active_teacher = User::where('status', '1')->where('role', 'teacher')->latest()->get();
        return view('backend.admin.teacher.active', compact('active_teacher'));
    }
}
