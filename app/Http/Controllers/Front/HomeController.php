<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        return view('front.index');
    }

    public function blog()
    {
        $blogs = Blog::orderBy('id', 'DESC')->get();
        return view('front.blog.index', compact('blogs'));
    }

    public function blog_detail($id)
    {
        $blog = Blog::where('slug', $id)->firstorfail();
        return view('front.blog.show', compact('blog'));
    }


    public function category($slug)
    {
        $category = Category::where('slug',$slug)->first();
        $category_products = DB::table('products_categories')->whereIn('category_id',[$category->id])->pluck('product_id');
        $data = Product::whereIn('id',$category_products)->get();
        return view('front.category.index',compact('data','category'));
    }


    public function category_detail($id)
    {

    }
}
