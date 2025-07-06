<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use App\Models\Course;
use App\Models\Category;
use App\Models\CourseGoal;
use Illuminate\Http\Request;
use App\Services\CourseService;
use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use Illuminate\Support\Facades\Auth;

class AdminCourseController extends Controller
{
    protected $courseService;

    public function __construct(CourseService $courseService){
        $this->courseService = $courseService; 
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all_courses = Course::with('category', 'subcategory', 'user')->latest()->get();
        return view('backend.admin.course.index', compact('all_courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $all_categories = Category::all();
        $all_teachers = User::where('role', 'teacher')->get();

        return view('backend.admin.course.create', compact('all_categories', 'all_teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CourseRequest $request)
    {
        $validatedData = $request->validated();

        // Admin memilih guru manual, tidak pakai Auth
        $validatedData['instructor_id'] = $request->instructor_id;

        $course = $this->courseService->createCourse($validatedData, $request->file('image'));

        if (!empty($validatedData['course_goals'])) {
            $this->courseService->createCourseGoals($course->id, $validatedData['course_goals']);
        }

        return redirect()->back()->with('success', 'Course created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $all_categories = Category::all();
        $all_teachers = User::where('role', 'teacher')->get();
        $course = Course::with('subCategory')->find($id);
        $course_goals = CourseGoal::where('course_id', $id)->get();

        return view('backend.admin.course.edit', compact('all_categories', 'all_teachers', 'course', 'course_goals'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CourseRequest $request, string $id)
    {
        $validatedData = $request->validated();
        $validatedData['instructor_id'] = $request->instructor_id;

        $course = $this->courseService->updateCourse($validatedData, $request->file('image'), $id);

        if (!empty($validatedData['course_goals'])) {
            $this->courseService->updateCourseGoals($course->id, $validatedData['course_goals']);
        }

        return redirect()->back()->with('success', 'Course updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course = Course::findOrFail($id);

        if ($course->image) {
            $imagePath = public_path(parse_url($course->course_image, PHP_URLPATH));
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $course->delete();

        return redirect()->route('admin.course.index')->with('success', 'Course Deleted Successfully!');
    }
}
