<?php

namespace App\Http\Controllers\admin\menu;

use App\Models\Category;
use App\Models\MenuItem;
use App\Models\MenuGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {
        $menuGroup = MenuGroup::with('menuItems')->findOrFail($id);
        $menuItem = $menuGroup->menuItems->sortBy('order');
        $categories = Category::get();
                
        return view('admin.menu.item')->with([
            'menuGroup' => $menuGroup,
            'menuItem' => $menuItem,
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $groupId = $request->route('item');
        $menuGroup = MenuGroup::with('menuItems')->findOrFail($groupId);
        $countMenuItems = count($menuGroup->menuItems);
        
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:256',
            'new_tab' => 'required',
            'status' => 'required',
            'link' => 'nullable',
            'linkable_type' => 'nullable',
            'linkable_id' => 'nullable',
        ]);

        if ($validator->fails()) {
            return redirect()
                        ->back()
                        ->with('menu-item-error', 'wrong')
                        ->withErrors($validator)
                        ->withInput();
        }

        if($request->linkable_type != 'Category') {
            $linkableType = null;
            $linkableId = null;
            $link = $request->link;
        } else {
            $linkableType = "App\Models\\" . $request->linkable_type;
            $linkableId = $request->linkable_id;
            $link = null;
        }

        $validated = array_merge($validator->validated(), [
            'menu_group_id' => $groupId, 
            'order' => $countMenuItems,
            'link' => $link,
            'linkable_type' => $linkableType,
            'linkable_id' => $linkableId
        ]);

        $menuItem = MenuItem::create($validated);

        if(!$menuItem) {
            return back()->with('menu-item-error', 'wrong');
        } else {
            return back()->with('menu-item-error', 'success');
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
        $item = $request->input('item');
        $menuItem = MenuItem::findOrFail($item[0]['id']);

        $menuItem->title = $item[1]['title'];
        $menuItem->link = $item[2]['link'];
        $menuItem->linkable_type = $item[3]['linkable_type'];
        $menuItem->linkable_id = $item[4]['linkable_id'];
        $menuItem->linkable_id = $item[5]['new_tab'];
        $menuItem->linkable_id = $item[6]['status'];
        $menuItem->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $menuItem = MenuItem::findOrFail($id);
        $menuItem->delete();
        
        
        $data = $request->input('items');
        $index = 0;
        foreach ($data as $item) {
            $menuItemOrder = MenuItem::where('title', $item)->first();
            if ($menuItemOrder) {
                $menuItemOrder->order = $index;
                $menuItemOrder->save();
                $index++;
            }
        }
    }

    /**
     * Changes order of an item in storage.
     */
    public function changeOrder(Request $request, string $id)
    {
        $data = $request->input('items');
        $index = 0;
        foreach ($data as $item) {
            $menuItem = MenuItem::where('title', $item)->first();
            if ($menuItem) {
                $menuItem->order = $index;
                $menuItem->save();
                $index++;
            }
        }
    }
}
