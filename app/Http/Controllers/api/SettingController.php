<?php

namespace App\Http\Controllers\api;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::query()
            ->select(
                'id', 
                'group', 
                'label', 
                'value', 
            )
            ->orderBy('group')
            ->orderBy('id', 'desc')
            ->get();
        return Response::success('', $setting);
    }
}
