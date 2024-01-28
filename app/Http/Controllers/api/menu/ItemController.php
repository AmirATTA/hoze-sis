<?php

namespace App\Http\Controllers\api\menu;

use App\Models\MenuItem;
use App\Models\MenuGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class ItemController extends Controller
{
    public function index()
    {
        $menuItems = MenuItem::query()
            ->where('status', 1)
            ->select(
                'id', 
                'menu_group_id', 
                'title', 
                'linkable_type', 
                'linkable_id', 
                'link', 
                'order', 
                'new_tab'
            )
            ->orderBy('order')
            ->with(['menuGroups' => function ($query) {
                $query->select(
                    'id', 
                    'name', 
                );
            }])
            ->get();

        return Response::success('', $menuItems);
    }
}
