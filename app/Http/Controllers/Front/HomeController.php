<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\AddToCart;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Comparison;
use App\Models\Crm;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Wishlist;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $best_selling = OrderItem::latest()
            ->take(4)
            ->pluck('product_id');
        $products = Product::where('publish', true)->whereIn('id', $best_selling)->get();
        return view('front.index', compact('products'));
    }

    public function blog()
    {
        $blogs = Blog::orderBy('id', 'DESC')->get();
        $latestProducts = Product::where('publish', true)
            ->latest()
            ->take(4)
            ->get();
        return view('front.blog.index', compact('blogs', 'latestProducts'));
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

        $query = Product::where('publish', true)->whereIn('id', $category_products);

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

        $categories = Category::where('active', true)->get();

        return view('front.category.index', compact('categories', 'latestProducts', 'products', 'category'));
    }


    public function products(Request $request)
    {

        $query = Product::where('publish', true);

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

        $categories = Category::where('active', true)->get();

        return view('front.products.index', compact('categories', 'latestProducts', 'products'));
    }


    public function products_details($slug)
    {
        $locale = app()->getLocale();
        $slugField = $locale === 'ar' ? 'slug_ar' : 'slug_en';
        $row = Product::where('publish', true)->where($slugField, $slug)->first();
        $categories = Category::where('active', true)->get();
        $latestProducts = Product::where('publish', true)
            ->latest()
            ->take(4)
            ->get();
        return view('front.products.show', compact('categories', 'latestProducts', 'row'));
    }

    public function contactUs()
    {
        return view('front.contactUs.index');
    }
    public function post_contactUs(Request $request)
    {
        Crm::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'enquiry' => $request->enquiry,
        ]);
        return redirect()->back()
            ->with('success', "Add  successfully");
    }

    public function aboutsUs()
    {
        return view('front.about_us.index');
    }
    public function viewCart()
    {
  
        return view('front.orders.cart');
    }
    public function checkout()
    {
        return view('front.orders.checkout' );
    }


    public function addTocart(Request $request)
    {
        $product = Product::findOrFail($request->product_id);


        Cart::add($product->id, app()->getLocale() === 'ar' ? $product->name_ar : $product->name_en, 1, $product->price)->associate(Product::class);
        return redirect()->back()
            ->with('success', "Add To Cart successfully");
    }
    public function addTowishlists(Request $request)
    {
        $checkProducts = Wishlist::where('customer_id', auth()->user()->id)->where('product_id', $request->product_id)->first();
        if (!$checkProducts) {
            Wishlist::create([
                'customer_id' => auth()->user()->id,
                'product_id' => $request->product_id,
            ]);

            return redirect()->back()
                ->with('success', "Add To Wishlist successfully");
        }
        return redirect()->back()
            ->with('success', "The product is already Add");

    }
    public function addToComparisons(Request $request)
    {
        $checkProducts = Comparison::where('user_id', auth()->user()->id)->where('product_id', $request->product_id)->first();
        if (!$checkProducts) {
            Comparison::create([
                'user_id' => auth()->user()->id,
                'product_id' => $request->product_id,
            ]);

            return redirect()->back()
                ->with('success', "Add To Wishlist successfully");
        }
        return redirect()->back()
            ->with('success', "The product is already Add");

    }
    public function delete_addTocart($id)
    {





        Cart::remove($id);
        return redirect()->back()
            ->with('success', "Add To Cart successfully");


    }


    public function updateQuantity(Request $request, $id)
    {
        dd($id);
        $quantity = $request->input('quantity');

        $cartItem = Cart::get($id);
        Cart::update($id, $quantity);

        $totalPrice = Cart::get($id)->price * $quantity;
        return response()->json(['totalPrice' => $totalPrice]);
    }
    public function delete_wishlists($id)
    {
        Wishlist::where('customer_id', auth()->user()->id)->where('product_id', $id)->delete();

        return redirect()->back()
            ->with('success', "Deleted  successfully");

    }
    public function delete_comparisons($id)
    {
        Comparison::where('user_id', auth()->user()->id)->where('product_id', $id)->delete();

        return redirect()->back()
            ->with('success', "Deleted  successfully");

    }


}
