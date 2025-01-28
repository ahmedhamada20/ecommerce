<?php

use App\Models\AddToCart;
use App\Models\AdvertisementBanners;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Wishlist;
use Gloudemans\Shoppingcart\Facades\Cart;

if (!function_exists('queryModels')) {
    function queryModels($modelName, $conditions = [], $pagination = null, $withRelations = [])
    {
        $modelClass = "App\\Models\\" . $modelName;

        if (!class_exists($modelClass)) {
            throw new Exception("Error: Model class '{$modelName}' not found.");
        }

        $model = new $modelClass;

        if (!method_exists($model, 'newQuery')) {
            throw new Exception("Error: Model '{$modelName}' does not support querying.");
        }

        $queryBuilder = $model->newQuery();

        if (!empty($withRelations)) {
            $queryBuilder->with($withRelations);
        }

        if (!is_null($conditions)) {
            foreach ($conditions as $field => $value) {
                if (is_array($value)) {
                    $queryBuilder->where($field, $value[0], $value[1]);
                } else {
                    $queryBuilder->where($field, $value);
                }
            }
        }



        if ($pagination && is_array($pagination)) {
            $perPage = $pagination['perPage'] ?? 15;
            $page = $pagination['page'] ?? 1;
            return $queryBuilder->paginate($perPage, ['*'], 'page', $page);
        }
        return $queryBuilder->orderBy('id', 'DESC')->get();
    }
}

if (!function_exists('queryModelsOrders')) {
    function queryModelsOrders($modelName, $conditions = [], $pagination = null, $withRelations = [], $relationships = [])
    {
        $modelClass = "App\\Models\\" . $modelName;

        if (!class_exists($modelClass)) {
            throw new Exception("Error: Model class '{$modelName}' not found.");
        }

        $model = new $modelClass;

        if (!method_exists($model, 'newQuery')) {
            throw new Exception("Error: Model '{$modelName}' does not support querying.");
        }

        $queryBuilder = $model->newQuery();

        if (!empty($withRelations)) {
            $queryBuilder->with($withRelations);
        }

        if (!empty($relationships)) {
            foreach ($relationships as $relation => $callback) {
                $queryBuilder->whereHas($relation, $callback);
            }
        }

        if (!empty($conditions)) {
            foreach ($conditions as $field => $value) {

                if (is_array($value)) {
                    if (count($value) == 3) {
                        $queryBuilder->where($value[0], $value[1], $value[2]);

                    }
                } else {
                    $queryBuilder->where($field, $value);
                }
            }
        }

        if ($pagination && is_array($pagination)) {
            $perPage = $pagination['perPage'] ?? 15;
            $page = $pagination['page'] ?? 1;
            return $queryBuilder->paginate($perPage, ['*'], 'page', $page);
        }

        return $queryBuilder->orderBy('id', 'DESC')->get();
    }
}



if (!function_exists('get_models')) {
    function get_models($models, $conditions = [])
    {
        $modelClass = "App\\Models\\" . $models;
        if (!$modelClass) {
            throw new Exception("Error: Model class '{$models}' not found.");
        }
        $model = new $modelClass;
        $queryBuilder = $model->newQuery();
        if (!is_null($conditions)) {
            foreach ($conditions as $field => $value) {
                if (is_array($value)) {
                    $queryBuilder->where($field, $value[0], $value[1]);
                } else {
                    $queryBuilder->where($field, $value);
                }
            }
        }

        return $queryBuilder->get();
    }
}

if (!function_exists('generateRandomString')) {
    function generateRandomString($length = 10)
    {
        $characters = 'ABCDEFHIJKLMNOPQRSTUVWXYZ0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}


if (!function_exists('send_in_firebase')) {
    function send_in_firebase($client_id, $messages)
    {
        $response = Http::put(env('Firebase') . 'chat/send.json', [
            'data' => [

                "status" => "noRead",
                "client_id" => $client_id,
                "messages" => $messages,
                "create_dates" => [
                    'created_at_human' => \Carbon\Carbon::now()->diffForHumans(),
                    'created_at' => \Carbon\Carbon::now(),
                ],
            ]
        ]);



        $response2 = Http::delete(env('Firebase') . 'chat/send.json', [
            'data' => [

                "status" => "noRead",
                "client_id" => $client_id,
                "messages" => $messages,
                "create_dates" => [
                    'created_at_human' => \Carbon\Carbon::now()->diffForHumans(),
                    'created_at' => \Carbon\Carbon::now(),
                ],
            ]
        ]);

        if ($response->ok()) {
            return response()->json(['success' => true], 201);
        }
        return false;
    }
}

if (!function_exists('auth_user')) {
    function auth_user()
    {

        if (auth()->check()) {
            if (auth()->user()->type == "customer") {

                return true;
            }
            return false;
        }
        return 0;

    }
}

if (!function_exists('get_products')) {
    function get_products()
    {

        if (auth()->check()) {

            if (auth()->check() && auth_user()) {

                return AddToCart::where('customer_id', auth()->user()->id)
                ->with('product')
                    ->get();

            }
            return collect();
        }

    }
}

if (!function_exists('get_wishlists')) {
    function get_wishlists()
    {

        if (auth()->check()) {
            if (auth_user()) {
                $get_products = Wishlist::where('customer_id', auth()->user()->id)->get();
                return $get_products;
            }

        }
        return false;

    }
}


if (!function_exists('get_settings')) {
    function get_settings()
    {
        return Setting::pluck('value', 'key')->toArray();
    }

}

if (!function_exists('get_category')) {
    function get_category()
    {

        return Category::where('active', 1)->whereNull('parent_id')->get();

    }

}


if (!function_exists('get_category_products')) {
    function get_category_products($id)
    {
   
        $category_products = \DB::table('products_categories')
            ->where('category_id', $id)
            ->pluck('product_id');
        return Product::where('publish', true)->whereIn('id', $category_products)->get();
    }

}


if (!function_exists('get_category_products_lastes')) {
    function get_category_products_lastes()
    {
   
        $category_products = \DB::table('products_categories')
            ->orderByDesc('id')
            ->take(5)
            ->pluck('product_id');
        return Product::where('publish', true)->whereIn('id', $category_products)->get();
    }

}

if (!function_exists('latest_blogs')) {

    function latest_blogs()
    {
        return Blog::latest()->first();
    }
}
if (!function_exists('get_blogs')) {

    function get_blogs()
    {
        return Blog::latest()->take(3)->get();
    }
}


if (!function_exists('latest_banners')) {

    function latest_banners()
    {
        return AdvertisementBanners::latest()->inRandomOrder()->first();
    }
}
if (!function_exists('get_count')) {
    function get_count($model)
    {
        $modelClass = "App\\Models\\" . $model;

        if (class_exists($modelClass)) {
            return $modelClass::query();
        }

        throw new Exception("Model {$model} does not exist.");
    }
}
if (!function_exists('get_card')) {
    function get_card()
    {
        // Cart::destroy();
        return  Cart::content();
    }
}






