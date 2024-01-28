<?php

namespace App\Http\Controllers\admin\menu;

use App\Models\MenuGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menuGroup = MenuGroup::with('menuItems')->get();

        return view('admin.menu.group')->with([
            'menuGroup' => $menuGroup
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:256',
            'label' => 'required|max:256',
        ]);
        
        if ($validator->fails()) {
            return redirect()
                        ->back()
                        ->with('menu-group-error', 'wrong')
                        ->withErrors($validator)
                        ->withInput();
        }

        $menuGroup = MenuGroup::create($validator->validated());

        if(!$menuGroup) {
            return back()->with('menu-group-error', 'wrong');
        } else {
            return back()->with('menu-group-error', 'success');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $group = $request->input('group');
        $menuGroup = MenuGroup::findOrFail($group[0]['id']);

        $menuGroup->name = $group[1]['name'];
        $menuGroup->label = $group[2]['label'];
        $menuGroup->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $menuGroup = MenuGroup::findOrFail($id);
        $menuGroup->delete();
    }
}
