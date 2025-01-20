<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('front.index');
    }

    public function blog()
    {
        $blogs = Blog::orderBy('id', 'DESC')->get();
        return view('front.blog.index',compact('blogs'));
    }

    public function blog_detail($id)
    {
        $blog = Blog::where('slug',$id)->firstorfail();
        return view('front.blog.show',compact('blog'));

    }
}
