<?php

namespace App\Http\Controllers\api;

use App\Models\Link;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class LinkController extends Controller
{
    public function index()
    {
        $link = Link::query()
            ->where('status', 1)
            ->select(
                'id', 
                'title', 
                'subtitle', 
                'link', 
                'image', 
            )
            ->orderBy('id', 'desc')
            ->get();
        return Response::success('', $link);
    }
}
