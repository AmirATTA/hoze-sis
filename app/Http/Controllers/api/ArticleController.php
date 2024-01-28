<?php

namespace App\Http\Controllers\api;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $categoryId = $request->input('category_id');
        $searchQuery = $request->input('search');

        $category = Category::query();

        $article = Article::query()
            ->where('status', 1)
            ->when($categoryId > 0, function($category) use ($categoryId) {
                return $category->where('category_id', $categoryId);
            })
            ->where('title', 'LIKE', '%' . $searchQuery . '%')
            ->select(
                'id', 
                'title', 
                'summary', 
                'image', 
                'views_count', 
                'category_id',
                'user_id',
            )
            ->orderBy('id', 'desc')
            ->paginate(15);
        return Response::success('', $article);
    }

    public function show(string $id)
    {
        $article = Article::where('status', 1)
            ->where('id', $id)
            ->select(
                'id', 
                'title', 
                'summary', 
                'body', 
                'image', 
                'views_count', 
                'resource_label', 
                'resource_url', 
                'category_id', 
                'user_id',
            )
            ->get();
        return Response::success('', $article);
    }
}
