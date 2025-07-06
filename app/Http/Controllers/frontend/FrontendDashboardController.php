<?php

namespace App\Http\Controllers\frontend;

use App\Models\Course;
use App\Models\Slider;
use App\Models\InfoBox;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\CourseLecture;
use App\Models\CourseSection;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FrontendDashboardController extends Controller
{
    public function home(){
        $all_sliders = Slider::first()->get();
        $all_info = InfoBox::all();
        $all_categories = Category::inRandomOrder()->limit(6)->withCount('subcategory')->get();
        $categories = Category::all();
        $course_category = Category::with('course', 'course.user', 'course.course_goal')->get();

        return view('frontend.pages.home.index', compact('all_sliders', 'all_info', 'all_categories', 'categories', 'course_category'));
    }

    public function courseDetail($slug){
        $course = Course::where('course_name_slug', $slug)->with('category', 'subcategory', 'user', 'course_goal')->first();
        $total_lecture = CourseLecture::where('course_id', $course->id)->count();
        $course_content = CourseSection::where('course_id', $course->id)->with('lecture')->get();
        $all_category = Category::orderBy('name', 'asc')->get();

        // Get the currently authenticated user's ID
        $userId = Auth::id();

        // Fetch similar courses but exclude those already ordered by the student
        $similarCourses = Course::where('category_id', $course->category_id)->where('id', '!=', $course->id)->get();
        $more_course_teacher = Course::where('instructor_id', $course->instructor_id)->where('id', '!=', $course->id)->with('user')->get();

        // jika ingin menampilkan durasi course pakai ini
        // $total_minutes = CourseLecture::where('course_id', $course->id)->sum('video_duration');
        // $hours = floor($total_minutes / 60);
        // $minutes = floor($total_minutes % 60);
        // $seconds = round(($total_minutes - floor($total_minutes)) * 60);
        // $total_lecture_duration = sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);

        return view('frontend.pages.course-details.index', compact('course', 'course_content', 'total_lecture', 'similarCourses', 'more_course_teacher', 'all_category'));
    }
}
