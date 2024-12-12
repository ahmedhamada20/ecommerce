<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use App\Models\Attribute;

class AttributesSeeder extends Seeder
{
    public function run(): void
    {

        Schema::disableForeignKeyConstraints();
        DB::table('attributes')->truncate();
        Schema::enableForeignKeyConstraints();

        $attributesData = [
            ['name_ar' => 'اللون', 'name_en' => 'Color', 'description_ar' => 'لون المنتج', 'description_en' => 'Product color'],
            ['name_ar' => 'الحجم', 'name_en' => 'Size', 'description_ar' => 'حجم المنتج', 'description_en' => 'Product size'],
            ['name_ar' => 'المادة', 'name_en' => 'Material', 'description_ar' => 'مادة التصنيع', 'description_en' => 'Manufacturing material'],
            ['name_ar' => 'الوزن', 'name_en' => 'Weight', 'description_ar' => 'وزن المنتج', 'description_en' => 'Product weight'],
            ['name_ar' => 'العلامة التجارية', 'name_en' => 'Brand', 'description_ar' => 'اسم العلامة التجارية', 'description_en' => 'Brand name'],
        ];

        foreach ($attributesData as $attribute) {
            Attribute::create([
                'name_ar' => $attribute['name_ar'],
                'name_en' => $attribute['name_en'],
                'description_ar' => $attribute['description_ar'],
                'description_en' => $attribute['description_en'],
                'columns' => json_encode(['extra_data' => Str::random(10)]),
            ]);
        }
    }
}
