<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Photo;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Storage::exists('public/products')) {
            Storage::deleteDirectory('public/products');
        }

        Storage::makeDirectory('public/products');
        Schema::disableForeignKeyConstraints();
        DB::table('products')->truncate();
        Schema::enableForeignKeyConstraints();
        $categories = QueryModelsAll('Category')->get();
        $tags = QueryModelsAll('Tag')->get();
        $colors = QueryModelsAll('Color')->get();
        $sizes = QueryModelsAll('Size')->get();

        $products = [];
        for ($i = 0; $i < 5; $i++) {
            $products[] = Product::create([
                'name_ar' => fake()->name(),
                'name_en' => fake()->name(),
                'slug' => fake()->slug(),
                'SKU' => fake()->unique()->bothify('???-#####'),
                'discount_price' => fake()->randomFloat(2, 10, 100),
                'price' => fake()->randomFloat(2, 100, 1000),
                'quantity' => fake()->numberBetween(1, 100),
                'short_description_ar' => fake()->paragraph(),
                'short_description_en' => fake()->paragraph(),
                'description_ar' => fake()->paragraph(),
                'description_en' => fake()->paragraph(),
                'additional_ar' => fake()->paragraph(),
                'additional_en' => fake()->paragraph(),
                'notes_ar' => fake()->paragraph(),
                'notes_en' => fake()->paragraph(),
                'stock' => fake()->boolean(),
                'publish' => fake()->boolean(),
                'user_id' => auth('web')->check() ? auth('web')->user()->id : null,
                'brand_id' => Brand::inRandomOrder()->first()->id,
                'features' => fake()->boolean(),
                'news' => fake()->boolean(),
                'type_discount' => fake()->randomElement(['percentage','cash']),
            ]);
        }

        foreach ($products as $product) {
            $product->categories()->attach(
                $categories->random(rand(1, 3))->pluck('id')->toArray()
            );

            $product->tags()->attach(
                $tags->random(rand(1, 3))->pluck('id')->toArray()
            );

            $product->colors()->attach(
                $colors->random(rand(1, 3))->pluck('id')->toArray()
            );

            $product->sizes()->attach(
                $sizes->random(rand(1, 3))->pluck('id')->toArray()
            );

            for ($j = 0; $j < rand(1, 5); $j++) {
                Photo::create([
                    'Filename' => fake()->image('public/storage/products', 640, 480, null, false),
                    'photoable_id' => $product->id,
                    'photoable_type' => Product::class,
                ]);
            }
        }
    }
}
