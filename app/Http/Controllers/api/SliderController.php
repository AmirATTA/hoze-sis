<?php

namespace App\Http\Controllers\api;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class SliderController extends Controller
{
    public function index()
    {
        $slider = Slider::query()
            ->where('status', 1)
            ->select(
                'id', 
                'title', 
                'summary', 
                'link', 
                'image', 
            )
            ->orderBy('id', 'desc')
            ->get();
        return Response::success('', $slider);
    }
}
