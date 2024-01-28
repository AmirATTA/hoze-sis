<?php

namespace App\Http\Controllers\admin;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ArticleStoreRequest;
use App\Http\Requests\ArticleUpdateRequest;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $article = Article::orderBy('id', 'desc')->paginate(15);

        return view('admin.article.index')->with([
            'article' => $article
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();

        return view('admin.article.create')->with([
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleStoreRequest $request)
    {
        $slug = Str::slug($request->input('slug'));
        $imagePath = $request->file('image')->store('public/article');
        $imageName = basename($imagePath);
        $user = Auth::user();
        $validated = array_merge($request->validated(), ['image' => $imageName, 'user_id' => $user->id, 'slug' => $slug]);

        $article = Article::create($validated);

        if(!$article) {
            return redirect(route('articles.create'))->with('error', 'عملیان انجام نشد');
        } else {
            return redirect(route('articles.index'))->with('success', 'دسته بندی ساخته شد!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        $article = Article::findOrFail($article->id);
        $category = Category::find($article->category_id)->name;

        $user = Auth::user();

        $convertedCreatedAtDate = convertToJalaliDate($article->created_at, true);

        return view('admin.article.show')->with([
            'article' => $article,
            'created_at' => $convertedCreatedAtDate,
            'category' => $category,
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $categories = Category::get();
        $article = Article::findOrFail($article->id);

        return view('admin.article.edit')->with([
            'article' => $article,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticleUpdateRequest $request, string $id)
    {
        $article = Article::findOrFail($id);

        $validated = $request->only([
            'title', 
            'summary', 
            'slug', 
            'body', 
            'category_id', 
            'resource_label', 
            'resource_url', 
            'status'
        ]);

        if ($request->file('image')) {
            $image = $request->file('image');
    
            Storage::delete('public/article/' . $article->image);

            $path = $image->store('public/article');
            $validated['image'] = basename($path);
        }

        $slug = Str::slug($request->input('slug'));
        $validated['slug'] = $slug;
        

        $article->update($validated);


        return redirect()->route('articles.index')->with('success', 'خبر با موفقیت بروزرسانی شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        Storage::delete('public/article/' . $article->image);

        $article->delete();
    }
}
