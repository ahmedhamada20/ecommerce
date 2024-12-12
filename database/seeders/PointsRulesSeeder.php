<?php

namespace Database\Seeders;

use App\Models\PointsRule;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PointsRulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('points_rules')->truncate();
        Schema::enableForeignKeyConstraints();
        $products = Product::all();

        for ($i = 1; $i <= 10; $i++) {
            PointsRule::create([
                'name_ar' => "قاعدة نقاط رقم $i بالعربية",
                'name_en' => "Points Rule $i in English",
                'description_ar' => "وصف قاعدة النقاط رقم $i بالعربية",
                'description_en' => "Points rule description $i in English",
                'product_id' => $products->random()->id,
                'type' => rand(1, 3),
                'is_active' => (bool)rand(0, 1),
                'exp_date' => now()->addDays(rand(30, 365)),
            ]);
        }
    }
}
