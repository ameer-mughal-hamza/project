<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use Image;

class PostController extends Controller
{
    public function getPostForDoctorBlog()
    {
        $posts = POST::where('doctor_id', Auth::user()->id)->orderBy('title', 'asc')->take(5)->get();
        return view('doctors.blog', ['posts' => $posts]);
    }

    public function getPosts()
    {
        $posts = POST::where('doctor_id', Auth::user()->id)->orderBy('title', 'asc')->get();
        return view('doctors.blog.index', ['posts' => $posts]);
    }

    public function getPostCreate()
    {
        $tags = Tag::all();
        return view('doctors.blog.create', ['tags' => $tags]);
    }

    public function getPostEdit($id)
    {
        $post = Post::find($id);
        return view('doctors.blog.edit')->withPost($post);
    }


    public function postUpdate(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|min:5',
            'content' => 'required'
        ]);

        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();
        return redirect()->route('doctor.blog.posts')->with('info', 'Post edited, new Title is: ' . $request->input('title'));
    }

    public function postCreate(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:5',
            'content' => 'required'
        ]);

        $doctor = Auth::user();
        $post = new Post;

        $post->title = $request->input('title');
        $post->content = $request->input('content');

        if ($request->hasFile('upload-image')) {
            $image = $request->file('upload-image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('upload-images/' . $filename);
            Image::make($image)->resize(800, 400)->save($location);
            $post->image_url = $filename;
        }
        $doctor->posts()->save($post);
        $post->tags()->attach($request->input('tags') === null ? [] : $request->input('tags'));
        return redirect()->route('doctor.blog');
    }

    public function delete($id)
    {
        $post = Post::find($id);
        if ($post->image_url) {
            $image_url = $post->image_url;
            \File::delete('upload-images/' . $image_url);
        }
        $post->tags()->detach();
        $post->delete();
        return redirect()->route('doctor.blog.posts')->with('info', 'Post deleted!');
    }
}
