<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('brands')->truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            [
                'name_ar' => 'اسم بالعربية 1',
                'name_en' => 'Name in English 1',
                'slug' => Str::slug('Name in English 1'),
                'image' => 'images/sample1.jpg',
                'description_ar' => 'وصف طويل باللغة العربية 1',
                'description_en' => 'Long description in English 1',
                'count_view' => 10,
                'active' => true,
                'user_id' => 1,
            ],
            [
                'name_ar' => 'اسم بالعربية 2',
                'name_en' => 'Name in English 2',
                'slug' => Str::slug('Name in English 2'),
                'image' => 'images/sample2.jpg',
                'description_ar' => 'وصف طويل باللغة العربية 2',
                'description_en' => 'Long description in English 2',
                'count_view' => 25,
                'active' => false,
                'user_id' => 1,
            ],
            [
                'name_ar' => 'اسم بالعربية 3',
                'name_en' => 'Name in English 3',
                'slug' => Str::slug('Name in English 3'),
                'image' => null,
                'description_ar' => null,
                'description_en' => null,
                'count_view' => 0,
                'active' => true,
                'user_id' => 1,
            ],
        ];

        foreach ($data as $item){
            Brand::create($item);
        }
    }
}
