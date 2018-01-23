<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Tag;
use Illuminate\Http\Request;
use Session;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('tags.index')->withTags($tags);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255'
        ]);
        $tag = new Tag;
        $tag->name = $request->input('name');
        $tag->save();
        Session::flash('success', 'New Tag created Successfully');
        return redirect()->route('tags.index');
    }

    public function show($id)
    {
        $tag = Tag::find($id);
        return view('tags.show')->withTag($tag);
    }

    public function edit($id)
    {
        $tag = Tag::find($id);
        return view('tags.edit')->withTag($tag);
    }

    public function update(Request $request, $id)
    {
        $tag = Tag::find($id);

        $this->validate($request, [
            'edit_tag' => 'required|max:255'
        ]);

        $tag->name = $request->input('edit_tag');
        $tag->save();

        Session::flash('success', 'Successfully saved your new Tag!!!!');
        return redirect()->route('tags.index');
    }

    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->posts()->detach();
        $tag->delete();
        return redirect()->route('tags.index')->with('info', 'Tag deleted!');
    }
}
