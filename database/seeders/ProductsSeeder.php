<?php

namespace Database\Seeders;

use App\Models\Coupon;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use App\Models\Product;

class ProductsSeeder extends Seeder
{
    public function run(): void
    {



        Schema::disableForeignKeyConstraints();
        DB::table('products')->truncate();
        Schema::enableForeignKeyConstraints();
        $tags = Tag::all();
        $coupons = Coupon::all();
        $products = [
            [
                'name_en' => 'Smartphone Galaxy Z',
                'name_ar' => 'هاتف Galaxy Z',
                'slug' => Str::slug('Smartphone Galaxy Z'),
                'SKU' => 'SKU001',
                'product_points' => 100.00,
                'coupon_id' => 1,
                'type_discount' => 'percentage',
                'discount_price' => 120.00,
                'price' => 1500.00,
                'quantity' => 30,
                'short_description_ar' => 'هاتف ذكي مع أداء ممتاز.',
                'short_description_en' => 'A smartphone with excellent performance.',
                'description_ar' => 'شاشة عرض عالية الجودة ومعالج سريع.',
                'description_en' => 'High-quality display and fast processor.',
                'notes_ar' => 'يتوفر بألوان مختلفة.',
                'notes_en' => 'Available in multiple colors.',
                'stock' => true,
                'publish' => true,
                'user_id' => 1,
                'brand_id' => 1,
                'currency_id' => 1,
                'features' => json_encode(['5G', 'AMOLED', '128GB Storage']),
                'tags' => json_encode(['smartphone', 'electronics']),
                'start_date_discount' => '2024-01-01',
                'end_date_discount' => '2024-12-31',
                'end_time_date_discount' => '2024-06-30',
                'news' => true,
            ],
            [
                'name_en' => 'Wireless Headphones Pro',
                'name_ar' => 'سماعات لاسلكية Pro',
                'slug' => Str::slug('Wireless Headphones Pro'),
                'SKU' => 'SKU002',
                'product_points' => 50.00,
                'coupon_id' => 2,
                'type_discount' => 'cash',
                'discount_price' => 120.00,
                'price' => 300.00,
                'quantity' => 50,
                'short_description_ar' => 'سماعات لاسلكية بجودة عالية.',
                'short_description_en' => 'High-quality wireless headphones.',
                'description_ar' => 'بطارية تدوم طويلاً وميزة إلغاء الضجيج.',
                'description_en' => 'Long-lasting battery and noise cancellation feature.',
                'notes_ar' => 'متوفرة باللون الأسود.',
                'notes_en' => 'Available in black color.',
                'stock' => true,
                'publish' => true,
                'user_id' => 1,
                'brand_id' => 2,
                'currency_id' => 1,
                'features' => json_encode(['Bluetooth', 'Noise Cancellation']),
                'tags' => json_encode(['audio', 'headphones']),
                'start_date_discount' => '2024-03-01',
                'end_date_discount' => '2024-09-30',
                'end_time_date_discount' => '2024-06-30',
                'news' => false,
            ],
            [
                'name_en' => 'Laptop Acer Aspire',
                'name_ar' => 'حاسوب Acer Aspire',
                'slug' => Str::slug('Laptop Acer Aspire'),
                'SKU' => 'SKU003',
                'product_points' => 80.00,
                'coupon_id' => 3,
                'type_discount' => 'percentage',
                'discount_price' => 950.00,
                'price' => 1000.00,
                'quantity' => 20,
                'short_description_ar' => 'حاسوب محمول أداء احترافي.',
                'short_description_en' => 'Professional performance laptop.',
                'description_ar' => 'شاشة عالية الدقة ومعالج Core i7.',
                'description_en' => 'High-definition screen and Core i7 processor.',
                'notes_ar' => 'خفيف الوزن ومتين.',
                'notes_en' => 'Lightweight and durable.',
                'stock' => true,
                'publish' => true,
                'user_id' => 1,
                'brand_id' => 3,
                'currency_id' => 1,
                'features' => json_encode(['Core i7', '16GB RAM', '512GB SSD']),
                'tags' => json_encode(['laptop', 'computer', 'electronics']),
                'start_date_discount' => '2024-02-15',
                'end_date_discount' => '2024-12-31',
                'end_time_date_discount' => '2024-06-30',
                'news' => true,
            ],
            [
                'name_en' => 'Digital Camera Canon',
                'name_ar' => 'كاميرا رقمية Canon',
                'slug' => Str::slug('Digital Camera Canon'),
                'SKU' => 'SKU004',
                'product_points' => 60.00,
                'coupon_id' => null,
                'type_discount' => 'cash',
                'discount_price' => 500.00,
                'price' => 600.00,
                'quantity' => 15,
                'short_description_ar' => 'كاميرا رقمية عالية الجودة.',
                'short_description_en' => 'High-quality digital camera.',
                'description_ar' => 'صور دقيقة مع أداء ممتاز.',
                'description_en' => 'Accurate images with excellent performance.',
                'notes_ar' => 'تدعم تصوير الفيديو عالي الدقة.',
                'notes_en' => 'Supports high-definition video recording.',
                'stock' => true,
                'publish' => true,
                'user_id' => 1,
                'brand_id' => 2,
                'currency_id' => 1,
                'features' => json_encode(['4K Video', 'DSLR Performance']),
                'tags' => json_encode(['camera', 'digital', 'photography']),
                'start_date_discount' => '2024-01-20',
                'end_date_discount' => '2024-12-31',
                'end_time_date_discount' => '2024-06-30',
                'news' => false,
            ],
            [
                'name_en' => 'Bluetooth Speaker JBL',
                'name_ar' => 'سماعة بلوتوث JBL',
                'slug' => Str::slug('Bluetooth Speaker JBL'),
                'SKU' => 'SKU005',
                'product_points' => 40.00,
                'coupon_id' => null,
                'type_discount' => 'percentage',
                'discount_price' => 120.00,
                'price' => 150.00,
                'quantity' => 40,
                'short_description_ar' => 'سماعة بلوتوث عالية الجودة.',
                'short_description_en' => 'High-quality Bluetooth speaker.',
                'description_ar' => 'صوت نقي وعالي الجودة.',
                'description_en' => 'Clear and high-quality sound.',
                'notes_ar' => 'مقاومة للماء.',
                'notes_en' => 'Water-resistant.',
                'stock' => true,
                'publish' => true,
                'user_id' => 1,
                'brand_id' => 2,
                'currency_id' => 2,
                'features' => json_encode(['Bluetooth 5.0', 'Waterproof']),
                'tags' => json_encode(['audio', 'speaker', 'wireless']),
                'start_date_discount' => '2024-04-01',
                'end_date_discount' => '2024-12-31',
                'end_time_date_discount' => '2024-06-30',
                'news' => true,
            ],
        ];

        foreach ($products as $product) {
            $new = Product::create($product);
            $new->tags()->attach(
                $tags->random(rand(1, 3))->pluck('id')->toArray()
            );

            $new->coupons()->attach(
                $coupons->random(rand(1, 3))->pluck('id')->toArray()
            );
        }
    }
}
