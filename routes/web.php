<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\backend\InfoController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\CourseController;
use App\Http\Controllers\backend\SliderController;
use App\Http\Controllers\backend\TeacherController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\AdminCourseController;
use App\Http\Controllers\backend\SubCategoryController;
use App\Http\Controllers\backend\AdminProfileController;
use App\Http\Controllers\backend\AdminTeacherController;
use App\Http\Controllers\backend\UserProfileController;
use App\Http\Controllers\backend\CourseLectureController;
use App\Http\Controllers\backend\CourseSectionController;
use App\Http\Controllers\backend\TeacherProfileController;
use App\Http\Controllers\frontend\FrontendDashboardController;



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// admin Route list
Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');

Route::middleware(['auth', 'verified', 'role:admin'])->prefix('admin')->name('admin.')->group(function(){
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [AdminController::class, 'destroy'])->name('logout');

    // profile route
    Route::get('/profile', [AdminProfileController::class, 'index'])->name('profile');
    Route::post('/profile/store', [AdminProfileController::class, 'store'])->name('profile.store');

    Route::get('/setting', [AdminProfileController::class, 'setting'])->name('setting');
    Route::post('/password/setting', [AdminProfileController::class, 'passwordSetting'])->name('passwordSetting');

    Route::resource('category', CategoryController::class);
    Route::resource('subcategory', SubCategoryController::class);

    // Slider Manajemen
    Route::resource('slider', SliderController::class);
    
    //  Manajemen Info
    Route::resource('info', InfoController::class);

    // Control Teacher
    Route::resource('teacher', AdminTeacherController::class);
    Route::post('/update-status', [AdminTeacherController::class, 'updateStatus'])->name('teacher.status');
    Route::get('/teacher-active-list', [AdminTeacherController::class, 'teacherActive'])->name('teacher.active');

    // manage course
    Route::resource('course', AdminCourseController::class);
    
    // manage course section
    Route::resource('course-section', AdminCourseController::class);
    
    Route::get('/get-subcategories/{categoryId}', [CategoryController::class, 'getsubcategories']);

    // manage lecture
    Route::resource('lecture', AdminCourseController::class);
});

// teacher Route list
Route::get('/teacher/login', [TeacherController::class, 'login'])->name('teacher.login');

Route::middleware(['auth', 'verified', 'role:teacher'])->prefix('teacher')->name('teacher.')->group(function(){
    Route::get('/dashboard', [TeacherController::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [TeacherController::class, 'destroy'])->name('logout');
    
    // profile route
    Route::get('/profile', [TeacherProfileController::class, 'index'])->name('profile');
    Route::post('/profile/store', [TeacherProfileController::class, 'store'])->name('profile.store');
    Route::get('/setting', [TeacherProfileController::class, 'setting'])->name('setting');
    Route::post('/password/setting', [TeacherProfileController::class, 'passwordSetting'])->name('passwordSetting');

    // manage course
    Route::resource('course', CourseController::class);
    
    // manage course section
    Route::resource('course-section', CourseSectionController::class);
    
    Route::get('/get-subcategories/{categoryId}', [CategoryController::class, 'getsubcategories']);

    // manage lecture
    Route::resource('lecture', CourseLectureController::class);
});

// User Route list
Route::middleware(['auth', 'verified', 'role:user'])->prefix('user')->name('user.')->group(function(){
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [UserController::class, 'destroy'])->name('logout');

    // profile setting route
    Route::get('/profile', [UserProfileController::class, 'index'])->name('profile');
    Route::post('/profile/store', [UserProfileController::class, 'store'])->name('profile.store');
    Route::get('/setting', [UserProfileController::class, 'setting'])->name('setting');
    Route::post('/password/setting', [UserProfileController::class, 'passwordSetting'])->name('passwordSetting');

});

// Frontend Route
Route::get('/', [FrontendDashboardController::class, 'home'])->name('frontend.home');
Route::get('/course-details/{slug}', [FrontendDashboardController::class, 'courseDetail'])->name('course-details');

require __DIR__.'/auth.php';
