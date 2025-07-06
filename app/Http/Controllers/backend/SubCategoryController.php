<?php

namespace App\Http\Controllers\backend;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\SubCategoryService;
use App\Http\Requests\SubCategoryRequest;

class SubCategoryController extends Controller
{
    protected $subCategoryService;

    public function __construct(SubCategoryService $subCategoryService)
    {
        $this->subCategoryService = $subCategoryService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all_subcategories = SubCategory::orderBy('name', 'asc')->with('category')->get();
        return view('backend.admin.subcategory.index', compact('all_subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $all_categories = Category::orderBy('name', 'asc')->get();
        return view('backend.admin.subcategory.create', compact('all_categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubCategoryRequest $request)
    {
        // Pass data and files to the service
        $this->subCategoryService->saveSubCategory($request->validated());
        return redirect()->route('admin.subcategory.index')->with('success', 'New SubCategory Created');
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
        $subcategory = SubCategory::find($id);
        $all_categories = Category::orderBy('name', 'asc')->get();
        return view('backend.admin.subcategory.edit', compact('subcategory', 'all_categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SubCategoryRequest $request, string $id)
    {
        // Pass data and files to the service
        $this->subCategoryService->updateSubCategory($request->validated(), $id);
        return redirect()->route('admin.subcategory.index')->with('success', 'SubCategory Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        SubCategory::findOrFail($id)->delete();

        return redirect()->route('admin.subcategory.index')->with('success', 'SubCategory deleted successfully.');
    }
}
