<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Requests\MenuCreateRequest;
use App\Models\Category;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $menu = Category::whereId($id)->with('menus')->first();
        return view('admin.menu', compact('menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($category_id)
    {
        $category = Category::find($category_id);
        return view('admin.menu-create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MenuCreateRequest $request, $category_id)
    {
        Category::find($category_id)->menus()->create($request->post());
        return redirect()->route('menu.index',$category_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit($category_id, Menu $menu )
    {
        return view('admin.menu-edit', compact('category_id','menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update($category_id ,Request $request, Menu $menu)
    {
        $menu->update($request->post());
        return redirect()->route('menu.index', $category_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */


    public function silme($category_id , $menu_id){
        Category::find($category_id)->menus()->whereId($menu_id)->delete();
        return redirect()->route('menu.index',$category_id);
    }
}
