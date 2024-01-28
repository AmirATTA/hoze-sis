<?php

namespace App\Http\Controllers\admin;

use App\Helpers\DateHelper;
use App\Models\Link;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LinkStoreRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\LinkUpdateRequest;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $link = Link::orderBy('id', 'desc')->paginate(15);

        return view('admin.link.index')->with([
            'link' => $link
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.link.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LinkStoreRequest $request)
    {
        $imagePath = $request->file('image')->store('public/link');
        $imageName = basename($imagePath);
        $validated = array_merge($request->validated(), ['image' => $imageName]);

        $link = Link::create($validated);

        if(!$link) {
            return redirect(route('links.create'))->with('error', 'عملیان انجام نشد');
        } else {
            return redirect(route('links.index'))->with('success', 'دسته بندی ساخته شد!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Link $link)
    {
        $link = Link::findOrFail($link->id);

        $convertedCreatedAtDate = convertToJalaliDate($link->created_at, true);

        return view('admin.link.show')->with([
            'link' => $link,
            'created_at' => $convertedCreatedAtDate,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Link $link)
    {
        $link = Link::findOrFail($link->id);

        return view('admin.link.edit')->with([
            'link' => $link,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LinkUpdateRequest $request, Link $link)
    {
        $link = Link::findOrFail($link->id);

        $validated = $request->only([
            'title', 
            'subtitle', 
            'link', 
            'image', 
            'status'
        ]);

        if ($request->file('image')) {
            $image = $request->file('image');
    
            Storage::delete('public/link/' . $link->image);

            $path = $image->store('public/link');
            $validated['image'] = basename($path);
        }

        $link->update($validated);

        return redirect()->route('links.index')->with('success', 'خبر با موفقیت بروزرسانی شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Link $link)
    {
        Storage::delete('public/link/' . $link->image);

        $link->delete();
    }
}
