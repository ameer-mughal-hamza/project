<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:50'
        ]);
        $category = new Category;
        $category->name = $request->input('name');
        $category->save();

        return redirect()->route('categories.index');
    }

    public function show($id)
    {
        $category = Category::find($id);
        return view('categories.show')->withCategory($category);
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('categories.edit')->withCategory($category);
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        $this->validate($request, [
            'category_tag' => 'required|max:255'
        ]);

        $category->name = $request->input('category_tag');
        $category->save();

        Session::flash('success', 'Successfully saved your new Tag!!!!');
        return redirect()->route('categories.index');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->doctors()->detach();
        $category->delete();
        return redirect()->route('categories.index')->with('info', 'Category deleted!');
    }
}
