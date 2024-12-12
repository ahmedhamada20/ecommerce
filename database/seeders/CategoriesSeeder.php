<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use App\Models\Category;

class CategoriesSeeder extends Seeder
{
    public function run(): void
    {

        Schema::disableForeignKeyConstraints();
        DB::table('categories')->truncate();
        Schema::enableForeignKeyConstraints();
        $data = [
            [
                'name_ar' => 'الإلكترونيات',
                'name_en' => 'Electronics',
                'slug' => Str::slug('Electronics'),
                'image' => null,
                'active' => true,
                'description_ar' => 'قسم يضم كل الأجهزة الإلكترونية.',
                'description_en' => 'Section for all electronic devices.',
                'parent_id' => null,
                'user_id' => 1,
            ],
            [
                'name_ar' => 'الموبايلات',
                'name_en' => 'Mobiles',
                'slug' => Str::slug('Mobiles'),
                'image' => null,
                'active' => true,
                'description_ar' => 'قسم خاص بالهواتف المحمولة.',
                'description_en' => 'Section for mobile phones.',
                'parent_id' => 1,
                'user_id' => 1,
            ],
            [
                'name_ar' => 'الأجهزة المنزلية',
                'name_en' => 'Home Appliances',
                'slug' => Str::slug('Home Appliances'),
                'image' => null,
                'active' => true,
                'description_ar' => 'قسم يضم الأجهزة المنزلية المختلفة.',
                'description_en' => 'Section for various home appliances.',
                'parent_id' => null,
                'user_id' => 2,
            ],
            [
                'name_ar' => 'الثلاجات',
                'name_en' => 'Refrigerators',
                'slug' => Str::slug('Refrigerators'),
                'image' => null,
                'active' => false,
                'description_ar' => 'قسم خاص بالثلاجات.',
                'description_en' => 'Section for refrigerators.',
                'parent_id' => 3,
                'user_id' => 2,
                'columns' => json_encode(['extra_field' => 'value4']),
            ],
        ];

        foreach ($data as $item) {
            Category::create($item);
        }
    }
}
