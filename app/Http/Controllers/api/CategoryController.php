<?php

namespace App\Http\Controllers\api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::query()
            ->where('status', 1)
            ->select(
                'id', 
                'name', 
                'type', 
            )
            ->orderBy('type')
            ->get();
        return Response::success('', $category);
    }
}
