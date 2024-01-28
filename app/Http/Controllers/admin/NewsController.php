<?php

namespace App\Http\Controllers\admin;

use App\Helpers\DateHelper;
use App\Models\Tag;
use App\Models\News;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\NewsStoreRequest;
use App\Http\Requests\NewsUpdateRequest;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::orderBy('id', 'desc')->paginate(15);

        return view('admin.news.index')->with([
            'news' => $news
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        $tags = Tag::get();

        return view('admin.news.create')->with([
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NewsStoreRequest $request)
    {
        $tags = $request->input('tags');
        
        $slug = Str::slug($request->input('slug'));
        $imagePath = $request->file('image')->store('public/news');
        $imageName = basename($imagePath);
        $user = Auth::user();
        $validated = array_merge($request->validated(), ['image' => $imageName, 'user_id' => $user->id, 'slug' => $slug]);

        $news = News::create($validated);
        $news->attachTags($tags);

        if(!$news) {
            return redirect(route('news.create'))->with('error', 'عملیان انجام نشد');
        } else {
            return redirect(route('news.index'))->with('success', 'دسته بندی ساخته شد!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        $news = News::findOrFail($news->id);
        $category = Category::find($news->category_id)->name;

        $user = Auth::user();

        $convertedCreatedAtDate = convertToJalaliDate($news->created_at, true);
        $convertedPublishedAtDate = convertToJalaliDate($news->published_at, true);

        $tags = $news->tags()->pluck('tags.name')->toArray();

        return view('admin.news.show')->with([
            'news' => $news,
            'created_at' => $convertedCreatedAtDate,
            'published_at' => $convertedPublishedAtDate,
            'category' => $category,
            'tags' => $tags,
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        $categories = Category::get();
        $tags = Tag::get();
        $news = News::findOrFail($news->id);

        $convertedDate = convertToJalaliDate($news->published_at, false);

        $tagIds = $news->tags()->pluck('tags.id')->toArray();

        return view('admin.news.edit')->with([
            'news' => $news,
            'published_at' => $convertedDate,
            'categories' => $categories,
            'tags' => $tags,
            'tag_ids' => $tagIds,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NewsUpdateRequest $request, string $id)
    {
        $tags = $request->input('tags');
        $news = News::findOrFail($id);

        $news->attachTags($tags, true);
        $validated = $request->only([
            'title', 
            'subtitle', 
            'summary', 
            'slug', 
            'body', 
            'category_id', 
            'published_at', 
            'resource_label', 
            'resource_url', 
            'featured', 
            'status'
        ]);

        if ($request->file('image')) {
            $image = $request->file('image');
    
            Storage::delete('public/news/' . $news->image);

            $path = $image->store('public/news');
            $validated['image'] = basename($path);
        }

        $slug = Str::slug($request->input('slug'));
        $validated['slug'] = $slug;
        

        $news->update($validated);


        return redirect()->route('news.index')->with('success', 'خبر با موفقیت بروزرسانی شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        Storage::delete('public/news/' . $news->image);

        $news->tags()->detach();

        $news->delete();
    }
}
