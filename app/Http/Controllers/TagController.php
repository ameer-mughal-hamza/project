<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;
use Session;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view('tags.index')->withTags($tags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
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
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->posts()->detach();
        $tag->delete();
        return redirect()->route('tags.index')->with('info', 'Tag deleted!');
    }
}
