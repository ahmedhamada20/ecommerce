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

        $data = [];
        for ($i = 1; $i <= 50; $i++) {
            $data[] = [
                'name_ar' => "اسم بالعربية $i",
                'name_en' => "Name in English $i",
                'slug' => Str::slug("Name in English $i"),
                'image' => 'images/sample' . $i . '.jpg',
                'description_ar' => "وصف طويل باللغة العربية $i",
                'description_en' => "Long description in English $i",
                'count_view' => rand(1, 100), // Random count between 1 and 100
                'active' => rand(0, 1) == 1, // Random active status
                'user_id' => 1,
            ];
        }

        foreach ($data as $item) {
            Brand::create($item);
        }

    }
}
