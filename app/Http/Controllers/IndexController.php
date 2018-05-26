<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\File;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Facade;
use App\Post;
use App\Doctor;
use PhpParser\Comment\Doc;

class IndexController extends Controller
{
    //To show Home Page

    public function getHomePage()
    {
        $categories = Category::all();
        $doctors = Doctor::all();
        return view('index.home')->with('categories', $categories)->with('doctors', $doctors);
    }

    //To Show Service page

    public function getServicePage()
    {
        return view('index.service');
    }
    //To show the Blog Page that Contains all posts

//    public function getBlogPage()
//    {
//        $posts = Post::orderBy('title', 'asc')->get();
//    	return view('index.blog', ['posts'=> $posts]);
//    }

    public function getBlogPage()
    {
        return view('index.blog');
    }

    // To Show a single post

    public function getPost($id)
    {
//        $post = Post::find($id);
        return view('index.single-blog');
//        return view('index.single-blog', ['post' => $post]);
    }

    public function getService($category)
    {
//        dd($category);
        $doctors = Doctor::where('category', $category)->get();
        $otherDepartments = Category::where('name', '!=', $category)->get();
        $categoryOfDoctor = Category::where('name', $category)->first();
        return view('index.service-page')->with('doctors', $doctors)
            ->with('category', $categoryOfDoctor)
            ->with('otherDepartments', $otherDepartments);
    }

    public function getDoctor($id)
    {
        $doctors = Doctor::where('id', $id)->first();
        $similarDoctors = Doctor::where('id', '!=', $id)->get();
        $doctorsEducation = explode(' ', $doctors->education);
//        dd($similarDoctors);
        return view('index.view-doctor')->with('doctors', $doctors)
            ->with('similarDoctors', $similarDoctors)
            ->with('doctorsEducation', $doctorsEducation);
    }
}
