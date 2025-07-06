<?php

namespace App\Http\Controllers\backend;

use App\Models\Course;
use App\Models\Category;
use App\Models\CourseGoal;
use Illuminate\Http\Request;
use App\Services\CourseService;
use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
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
        $instructor_id = Auth::user()->id;
        $all_courses = Course::where('instructor_id', $instructor_id)->with('category', 'subcategory')->latest()->get();
        return view('backend.teacher.course.index', compact('all_courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $all_categories = Category::all();
        return view('backend.teacher.course.create', compact('all_categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CourseRequest $request)
    {
        $validatedData = $request->validated();
        // passing data dan file ke service
        $course = $this->courseService->createCourse($validatedData, $request->file('image'));

        // managed course goal
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
        $course = Course::with('subCategory')->find($id);
        $course_goals = CourseGoal::where('course_id', $id)->get();
        return view('backend.teacher.course.edit', compact('all_categories', 'course', 'course_goals'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CourseRequest $request, string $id)
    {
        $validatedData = $request->validated();
        $course = $this->courseService->updateCourse($validatedData, $request->file('image'), $id);
        // managed course goal
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

        // Delete Image dari folder public
        if($course->image){
            $imagePath = public_path(parse_url($course->course_image, PHP_URLPATH));

            if(file_exists($imagePath)){
                unlink($imagePath);
            }
        }
        $course->delete();

        return redirect()->route('teacher.course.index')->with('success', 'Course Deleted Successfully!');
    }


}
