<?php

namespace App\Http\Controllers\admin\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('admin.profile')->with([
            'user' => $user,
        ]);
    }

    public function update(ProfileUpdateRequest $request)
    {
        $user = Auth::user();

        $validated = $request->only([
            'name', 
            'email',
            'phone'
        ]);

        $user->update($validated);
        
        return redirect()->back()->with('profile-update', 'success');
    }
}
