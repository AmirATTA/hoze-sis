<?php

namespace App\Http\Controllers\admin;

use App\Models\News;
use App\Models\Article;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $totalViewsCount = Announcement::sum('views_count')
            + Article::sum('views_count')
            + News::sum('views_count');

        $newsCount = News::count();

        $latestAnnouncement = Announcement::latest()->take(3)->get();
        $latestArticle = Article::latest()->take(3)->get();
        $latestNews = News::latest()->take(3)->get();

        $latestContent = $latestNews->concat($latestAnnouncement)->concat($latestArticle)->sortByDesc('created_at')->take(3);
        return view('admin.dashboard')->with([
            'total_views' => $totalViewsCount,
            'news_count' => $newsCount,
            'lastest_content' => $latestContent,
        ]);
    }
}
