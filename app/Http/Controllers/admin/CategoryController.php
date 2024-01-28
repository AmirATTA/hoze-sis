<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::all();
        return view('admin.category.index')->with([
            'category' => $category
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $slug = empty($request->input('slug')) ? Str::slug($request->input('name')) : Str::slug($request->input('slug'));

        $validated = array_merge($request->validated(), ['slug' => $slug]);
        $category = Category::create($validated);

        if(!$category) {
            return redirect(route('categories.create'))->with('error', 'عملیان انجام نشد');
        } else {
            return redirect(route('categories.index'))->with('success', 'دسته بندی ساخته شد!');
        }
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
    public function edit(Category $category)
    {
        $category = Category::findOrFail($category->id);

        return view('admin.category.edit')->with([
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {
        $category = Category::findOrFail($id);
        $validated = $request->only([
            'name', 
            'slug', 
            'type', 
            'status'
        ]);

        $slug = Str::slug($request->input('slug'));
        $validated['slug'] = $slug;
        
        $category->update($validated);

        return redirect()->route('categories.index')->with('success', 'دسته بندی با موفقیت بروزرسانی شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $newsCount = $category->news()->count();
        $articlesCount = $category->articles()->count();
        if ($newsCount == 0 && $articlesCount == 0) {
            $category->delete();
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }
}
