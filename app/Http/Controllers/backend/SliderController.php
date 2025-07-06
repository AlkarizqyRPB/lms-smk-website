<?php

namespace App\Http\Controllers\backend;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Services\SliderService;
use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;

class SliderController extends Controller
{
    protected $sliderService;

    public function __construct(SliderService $sliderService){
        $this->sliderService = $sliderService; 
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all_sliders = Slider::latest()->get();
        return view('backend.admin.slider.index', compact('all_sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SliderRequest $request)
    {
        // passing data dan file ke service
        $this->sliderService->saveSlider($request->validated(), $request->file('image'));
        return redirect()->route('admin.slider.index')->with('success', 'Slider created successfully');
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
        $slider = Slider::find($id);
        return view('backend.admin.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SliderRequest $request, string $id)
    {
        // passing data dan file ke service
        $this->sliderService->updateSlider($request->validated(), $request->file('image'), $id);
        return redirect()->route('admin.slider.index')->with('success', 'Slider update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider = Slider::findOrFail($id);

        // Delete associated image if exists 
        if ($slider->image) {
            $imagePath = public_path(parse_url($slider->image, PHP_URL_PATH));
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $slider->delete();

        return redirect()->back()->with('success', 'Slider deleted successfully.');
    }
}
