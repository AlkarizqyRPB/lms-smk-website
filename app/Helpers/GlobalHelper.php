<?php

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

// Sidebar activating

if(!function_exists('setSidebar')){
  function setSidebar(array $routes) : ?string{
    foreach($routes as $route){
      if(request()->routeIs($route)){
        return 'mm-active';
      }
    }
    return null;
  }
}

// Global Use in category
if (!function_exists('getCategories')) {
    function getCategories()
    {
        return Category::with('subcategory')->orderBy('name', 'asc')->get();
    }
}

/* Instructor Approved via admin */

if (!function_exists('isApprovedUser')) {
    function isApprovedUser()
    {
        $user_id = Auth::id();
        return User::where('role', 'teacher')
            ->where('status', '1')
            ->where('id', $user_id)
            ->first();
    }
}


// getCourseCategories untuk fungsi course_category di frontend dan detail-course
if (!function_exists('getCourseCategories')) {
    function getCourseCategories()
    {
        return Category::with('course', 'course.user', 'course.course_goal')->get();
    }
}
