<?php

namespace App\Http\Controllers;

use Illuminate\Http\File;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Facade;
use App\Post;
class IndexController extends Controller
{
    //To show Home Page

    public function getHomePage()
    {
    	return view('index.home');
    }
    //To Show Service page

    public function getServicePage()
    {
        return view('index.service');
    }
    //To show the Blog Page that Contains all posts

    public function getBlogPage()
    {
        $posts = Post::orderBy('title', 'asc')->get();
    	return view('index.blog', ['posts'=> $posts]);
    }
    // To Show a single post

    public function getPost($id)
    {
        $post = Post::find($id);
        return view('index.post', ['post' => $post]);
    }
}
