<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\AnnouncementStoreRequest;
use App\Http\Requests\AnnouncementUpdateRequest;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $announcement = Announcement::orderBy('id', 'desc')->paginate(15);

        return view('admin.announcement.index')->with([
            'announcement' => $announcement
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();

        return view('admin.announcement.create')->with([
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AnnouncementStoreRequest $request)
    {
        $slug = Str::slug($request->input('slug'));
        $imagePath = $request->file('image')->store('public/announcement');
        $imageName = basename($imagePath);
        $user = Auth::user();
        $validated = array_merge($request->validated(), ['image' => $imageName, 'user_id' => $user->id, 'slug' => $slug]);

        $announcement = Announcement::create($validated);

        if(!$announcement) {
            return redirect(route('announcements.create'))->with('error', 'عملیان انجام نشد');
        } else {
            return redirect(route('announcements.index'))->with('success', 'دسته بندی ساخته شد!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Announcement $announcement)
    {
        $announcement = Announcement::findOrFail($announcement->id);

        $user = Auth::user();

        $convertedCreatedAtDate = convertToJalaliDate($announcement->created_at, true);
        $convertedPublishedAtDate = convertToJalaliDate($announcement->published_at, true);

        return view('admin.announcement.show')->with([
            'announcement' => $announcement,
            'created_at' => $convertedCreatedAtDate,
            'published_at' => $convertedPublishedAtDate,
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Announcement $announcement)
    {
        $categories = Category::get();
        $announcement = Announcement::findOrFail($announcement->id);

        $convertedDate = convertToJalaliDate($announcement->published_at, false);

        return view('admin.announcement.edit')->with([
            'announcement' => $announcement,
            'published_at' => $convertedDate,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AnnouncementUpdateRequest $request, Announcement $announcement)
    {
        $tags = $request->input('tags');
        $announcement = Announcement::findOrFail($announcement->id);

        $validated = $request->only([
            'title', 
            'subtitle', 
            'summary', 
            'slug', 
            'body', 
            'category_id', 
            'published_at', 
            'featured', 
            'status'
        ]);

        if ($request->file('image')) {
            $image = $request->file('image');
    
            Storage::delete('public/announcement/' . $announcement->image);

            $path = $image->store('public/announcement');
            $validated['image'] = basename($path);
        }

        $slug = Str::slug($request->input('slug'));
        $validated['slug'] = $slug;
        
        $announcement->update($validated);

        return redirect()->route('announcements.index')->with('success', 'خبر با موفقیت بروزرسانی شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Announcement $announcement)
    {
        Storage::delete('public/announcement/' . $announcement->image);

        $announcement->delete();
    }
}
