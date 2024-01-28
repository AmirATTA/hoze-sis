<?php

namespace App\Http\Controllers\api;

use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class AnnouncementController extends Controller
{
    public function index(Request $request)
    {
        $searchQuery = $request->input('search');
        
        $announcement = Announcement::query()
            ->where('status', 1)
            ->whereDate('published_at', '<=', now())
            ->where('title', 'LIKE', '%' . $searchQuery . '%')
            ->select(
                'id', 
                'title', 
                'summary', 
                'image', 
                'views_count', 
                'user_id',
            )
            ->orderBy('published_at')
            ->paginate(15);
        return Response::success('', $announcement);
    }

    public function show(string $id)
    {
        $announcement = Announcement::whereRaw('created_at >= published_at')
            ->where('status', 1)
            ->where('id', $id)
            ->select(
                'id', 
                'title', 
                'summary', 
                'body', 
                'image', 
                'views_count', 
                'user_id',
            )
            ->get();
        return Response::success('', $announcement);
    }
}
