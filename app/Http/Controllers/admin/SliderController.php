<?php

namespace App\Http\Controllers\admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\SliderStoreRequest;
use App\Http\Requests\SliderUpdateRequest;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $slider = Slider::orderBy('id', 'desc')->paginate(15);

        return view('admin.slider.index')->with([
            'slider' => $slider
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SliderStoreRequest $request)
    {
        $imagePath = $request->file('image')->store('public/slider');
        $imageName = basename($imagePath);
        $validated = array_merge($request->validated(), ['image' => $imageName]);

        $slider = Slider::create($validated);

        if(!$slider) {
            return redirect(route('sliders.create'))->with('error', 'عملیان انجام نشد');
        } else {
            return redirect(route('sliders.index'))->with('success', 'دسته بندی ساخته شد!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        $slider = Slider::findOrFail($slider->id);

        $convertedCreatedAtDate = convertToJalaliDate($slider->created_at, true);

        return view('admin.slider.show')->with([
            'slider' => $slider,
            'created_at' => $convertedCreatedAtDate,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        $slider = Slider::findOrFail($slider->id);

        return view('admin.slider.edit')->with([
            'slider' => $slider,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SliderUpdateRequest $request, string $id)
    {
        $slider = Slider::findOrFail($id);

        $validated = $request->only([
            'title', 
            'summary', 
            'link', 
            'status'
        ]);

        if ($request->file('image')) {
            $image = $request->file('image');
    
            Storage::delete('public/slider/' . $slider->image);

            $path = $image->store('public/slider');
            $validated['image'] = basename($path);
        }

        $slider->update($validated);


        return redirect()->route('sliders.index')->with('success', 'خبر با موفقیت بروزرسانی شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        Storage::delete('public/slider/' . $slider->image);

        $slider->delete();
    }
}
