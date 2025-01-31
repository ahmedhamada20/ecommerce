<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Coupon;
use App\Models\Photo;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class ProductsSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('products')->truncate();
        DB::table('photos')->truncate();
        Schema::enableForeignKeyConstraints();

        $tags = Tag::all();
        $coupons = Coupon::all();
        $categories = Category::all();
        $products = [];

        for ($i = 1; $i <= 150; $i++) {
            $products[] = [
                'name_en' => "Product $i",
                'name_ar' => "المنتج $i",
                'slug_ar' => Str::slug("Product $i"),
                'slug_en' => Str::slug("Product $i"),
                'SKU' => 'SKU' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'product_points' => rand(10, 100) + rand(0, 99) / 100,
                'coupon_id' => $coupons->random()->id,
                'type_discount' => $i % 2 === 0 ? 'percentage' : 'cash',
                'discount_price' => rand(50, 500) + rand(0, 99) / 100,
                'price' => rand(100, 2000) + rand(0, 99) / 100,
                'quantity' => rand(10, 100),
                'short_description_ar' => "وصف قصير للمنتج $i.",
                'short_description_en' => "Short description for product $i.",
                'description_ar' => "وصف مفصل للمنتج $i.",
                'description_en' => "Detailed description for product $i.",
                'notes_ar' => $i % 3 === 0 ? "ملحوظة خاصة للمنتج $i." : null,
                'notes_en' => $i % 3 === 0 ? "Special note for product $i." : null,
                'stock' => true,
                'publish' => true,
                'user_id' => 1,
                'brand_id' => rand(1, 5),
                'currency_id' => rand(1, 3),
                'features' => json_encode(["Feature $i", "Feature $i.1", "Feature $i.2"]),
                'tags' => json_encode(["tag$i", "tag$i.1", "tag$i.2"]),
                'start_date_discount' => '2024-' . str_pad(rand(1, 12), 2, '0', STR_PAD_LEFT) . '-01',
                'end_date_discount' => '2024-12-31',
                'end_time_date_discount' => '2024-06-30',
                'news' => $i % 2 === 0,
            ];
        }

        foreach ($products as $productData) {
            // إنشاء المنتج في قاعدة البيانات
            $newProduct = Product::create($productData);

            // إضافة صورة افتراضية للمنتج
            Photo::create([
                'filename' => "products/" . 1 . ".jpg",
                'photoable_id' => $newProduct->id,
                'photoable_type' => Product::class,
            ]);

            // إرفاق الوسوم بعد إنشاء المنتج
            $randomTags = $tags->random(rand(1, 3))->pluck('id')->toArray();
            $newProduct->tags()->attach($randomTags);

            // إرفاق الفئات
            $randomCategories = $categories->random(rand(1, 3))->pluck('id')->toArray();
            $newProduct->categories()->attach($randomCategories);

            // إرفاق القسائم
            $randomCoupons = $coupons->random(rand(1, 3))->pluck('id')->toArray();
            $newProduct->coupons()->attach($coupons->random(rand(1, 3))->pluck('id')->toArray());
        }
    }
}
