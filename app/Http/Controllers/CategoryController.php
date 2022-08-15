<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryCreateRequest;
use App\Http\Requests\CategoryUpdateRequest;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryCreateRequest $request)
    {
        if($request->hasFile('image')){
            $fileName = Str::slug($request->name).'.'.$request->image->extension();
            $fileNameWithUpload ='images/'.$fileName;
            $request->image->move(public_path('images'),$fileName);
            $request->merge([
                'image'=>$fileNameWithUpload
            ]);
        }

        Category::create($request->post());
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.category-edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, $id)
    {
        $asdImage = Category::find($id);
        if($request->hasFile('image')){
            $fileName = Str::slug($request->name).'.'.$request->image->extension();
            $fileNameWithUpload ='images/'.$fileName;
            $request->image->move(public_path('images'),$fileName);
            $request->merge([

                'image'=>$fileNameWithUpload
            ]);
        }
        else{
            $fileNameWithUpload = $asdImage->image;
        }

        Category::find($id)->update([
            'name'=>$request->get('name'),
            'image'=>$fileNameWithUpload,

        ]);

        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect()->route('category.index');
    }
}
