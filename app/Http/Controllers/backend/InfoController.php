<?php

namespace App\Http\Controllers\backend;

use App\Models\InfoBox;
use Illuminate\Http\Request;
use App\Http\Requests\InfoRequest;
use App\Http\Controllers\Controller;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $first_info = InfoBox::where('id','1')->first();
        $second_info = InfoBox::where('id','2')->first();
        $third_info = InfoBox::where('id','3')->first();
        return view('backend.admin.info.index', compact('first_info', 'second_info', 'third_info'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InfoRequest $request, string $id)
    {
        InfoBox::updateOrCreate(
            ['id' => $id],
            $request->validated()
        );

        return redirect()->back()->with('success', 'Info Box update successfully');
    }

}
