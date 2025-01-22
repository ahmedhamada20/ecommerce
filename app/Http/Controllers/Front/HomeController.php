<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
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

    public function category(Request $request, $slug)
    {
        $category = Category::where('slug', $slug)->first();
    
        $category_products = DB::table('products_categories')
            ->where('category_id', $category->id)
            ->pluck('product_id');
    
        $query = Product::where('publish',true)->whereIn('id', $category_products);
    
        $locale = app()->getLocale();
    
        if ($request->has('sort')) {
            switch ($request->get('sort')) {
                case 'name_asc':
                    if ($locale == 'ar') {
                        $query->orderBy('name_ar', 'asc');
                    } else {
                        $query->orderBy('name_en', 'asc');
                    }
                    break;
                case 'name_desc':
                    if ($locale == 'ar') {
                        $query->orderBy('name_ar', 'desc');
                    } else {
                        $query->orderBy('name_en', 'desc');
                    }
                    break;
                case 'price_asc':
                    $query->orderBy('price', 'asc');
                    break;
                case 'price_desc':
                    $query->orderBy('price', 'desc');
                    break;
                default:
                    break;
            }
        }
        if ($request->has('category')) {
            $query->whereHas('categories', function ($q) use ($request) {
                $q->whereIn('category_id', $request->category);
            });
        }

        if ($request->has('search') && $request->search != '') {
            $searchColumn = app()->getLocale() == 'ar' ? 'name_ar' : 'name_en';
            $query->where($searchColumn, 'like', '%' . $request->search . '%');
        }
        
    
        $limit = $request->get('limit', 15);
        $products = $query->paginate($limit);
        $latestProducts = Product::where('publish', true)
        ->latest()
        ->take(4)
        ->get();

        if ($request->has('min_price') && $request->has('max_price')) {
            $query->whereBetween('price', [$request->min_price, $request->max_price]);
        }

        $categories = Category::where('active',true)->get();

        return view('front.category.index', compact('categories','latestProducts','products', 'category'));
    }
    

    public function products(Request $request)
    {

        $query = Product::where('publish',true);

        $locale = app()->getLocale();
    
        if ($request->has('sort')) {
            switch ($request->get('sort')) {
                case 'name_asc':
                    if ($locale == 'ar') {
                        $query->orderBy('name_ar', 'asc');
                    } else {
                        $query->orderBy('name_en', 'asc');
                    }
                    break;
                case 'name_desc':
                    if ($locale == 'ar') {
                        $query->orderBy('name_ar', 'desc');
                    } else {
                        $query->orderBy('name_en', 'desc');
                    }
                    break;
                case 'price_asc':
                    $query->orderBy('price', 'asc');
                    break;
                case 'price_desc':
                    $query->orderBy('price', 'desc');
                    break;
                default:
                    break;
            }
        }

        if ($request->has('category')) {
            $query->whereHas('categories', function ($q) use ($request) {
                $q->whereIn('category_id', $request->category);
            });
        }

        if ($request->has('search') && $request->search != '') {
            $searchColumn = app()->getLocale() == 'ar' ? 'name_ar' : 'name_en';
            $query->where($searchColumn, 'like', '%' . $request->search . '%');
        }

        if ($request->has('min_price') && $request->has('max_price')) {
            $query->whereBetween('price', [$request->min_price, $request->max_price]);
        }

        $limit = $request->get('limit', 15);
        $products = $query->paginate($limit);
        $latestProducts = Product::where('publish', true)
        ->latest()
        ->take(4)
        ->get();

        $categories = Category::where('active',true)->get();

        return view('front.products.index', compact('categories','latestProducts','products'));
    }


    public function products_details($slug)
    {
        $locale = app()->getLocale();
        $slugField = $locale === 'ar' ? 'slug_ar' : 'slug_en';
        $row = Product::where('publish', true)->where($slugField, $slug)->first();
        $categories = Category::where('active',true)->get();
        $latestProducts = Product::where('publish', true)
        ->latest()
        ->take(4)
        ->get();
        return view('front.products.show', compact('categories','latestProducts','row'));
    }

    public function contactUs()
    {
        return view('front.contactUs.index');
    }
}
