<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('categories')->truncate();
        Schema::enableForeignKeyConstraints();
        for ($i = 1; $i <= 5; $i++) {
            Category::create([
                'name_ar' => fake()->name(),
                'name_en' => fake()->name(),
                'icon' => fake()->imageUrl(),
                'image' => fake()->image(storage_path('app/public/category'), 640, 480, null, false),
                'active' => fake()->boolean(),
                'description' => fake()->text(),
                'parent_id' => $i === 1 ? null : (fake()->boolean() ? null : Category::inRandomOrder()->first()->id),
                'user_id' => auth('web')->check() ? auth('web')->user()->id : null,
            ]);
        }
    }
}
