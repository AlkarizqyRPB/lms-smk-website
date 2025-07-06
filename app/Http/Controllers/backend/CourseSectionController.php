<?php

namespace App\Http\Controllers\backend;

use App\Models\Course;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\CourseSection;
use App\Http\Controllers\Controller;

class CourseSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'section_title' => 'required|string|max:255',
        ]);

        // Store the data in the database
        CourseSection::create($validateData);


        return redirect()->back()->with('success', 'New section added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $course = Course::find($id);
        $course_wise_lecture = CourseSection::with('lecture')->where('course_id', $id)->get();

        return view('backend.teacher.course-section.index', compact('course', 'course_wise_lecture'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        CourseSection::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Data delecte successfully');
    }
}
