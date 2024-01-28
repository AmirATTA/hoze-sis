<?php

namespace App\Http\Controllers\api\menu;

use App\Models\MenuGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class GroupController extends Controller
{
    public function index()
    {
        $menuGroups = MenuGroup::select(
            'id', 
            'label', 
            'name', 
        )
        ->orderBy('id', 'desc')
        ->get();
        return Response::success('', $menuGroups);
    }
}
