<?php

namespace App\Http\Controllers\api;

use App\Models\Tag;
use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $categoryId = $request->input('category_id');
        $tagId = $request->input('tag_id');
        $searchQuery = $request->input('search');

        $category = Category::query();
        $tags = Tag::query();

        $news = News::query()
            ->where('status', 1)
            ->whereDate('published_at', '<=', now())
            ->when($categoryId > 0, function($category) use ($categoryId) {
                return $category->where('category_id', $categoryId);
            })
            ->when($tagId, function($tags) use ($tagId) {
                return $tags->with(['tags' => function($tags) use ($tagId) {
                    $tags->where('tags.id', $tagId);
                }]);
            })
            ->where('title', 'LIKE', '%' . $searchQuery . '%')
            ->select(
                'id', 
                'title', 
                'subtitle', 
                'summary', 
                'image', 
                'views_count', 
                'category_id', 
                'user_id',
            )
            ->orderBy('published_at')
            ->paginate(15);
        $news->makeHidden('image');

        return Response::success('', $news);
    }

    public function show(string $id)
    {
        $news = News::whereRaw('created_at >= published_at')
            ->where('status', 1)
            ->where('id', $id)
            ->select(
                'id', 
                'title', 
                'subtitle', 
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
        return Response::success('', $news);
    }
}
