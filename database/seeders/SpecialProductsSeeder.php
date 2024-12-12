<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class SpecialProductsSeeder extends Seeder
{
    public function run(): void
    {

        Schema::disableForeignKeyConstraints();
        DB::table('special_products')->truncate();
        Schema::enableForeignKeyConstraints();

        DB::table('special_products')->insert([
            [
                'name_ar' => 'منتج خاص 1',
                'name_en' => 'Special Product 1',
                'description_ar' => 'وصف المنتج الخاص رقم 1',
                'description_en' => 'Description of special product 1',
                'image' => 'special1.jpg',
                'columns' => json_encode(['color' => 'Red', 'size' => 'L']),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name_ar' => 'منتج خاص 2',
                'name_en' => 'Special Product 2',
                'description_ar' => 'وصف المنتج الخاص رقم 2',
                'description_en' => 'Description of special product 2',
                'image' => 'special2.jpg',
                'columns' => json_encode(['color' => 'Blue', 'size' => 'M']),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name_ar' => 'منتج خاص 3',
                'name_en' => 'Special Product 3',
                'description_ar' => 'وصف المنتج الخاص رقم 3',
                'description_en' => 'Description of special product 3',
                'image' => 'special3.jpg',
                'columns' => json_encode(['color' => 'Green', 'size' => 'S']),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name_ar' => 'منتج خاص 4',
                'name_en' => 'Special Product 4',
                'description_ar' => 'وصف المنتج الخاص رقم 4',
                'description_en' => 'Description of special product 4',
                'image' => 'special4.jpg',
                'columns' => json_encode(['color' => 'Yellow', 'size' => 'XL']),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name_ar' => 'منتج خاص 5',
                'name_en' => 'Special Product 5',
                'description_ar' => 'وصف المنتج الخاص رقم 5',
                'description_en' => 'Description of special product 5',
                'image' => 'special5.jpg',
                'columns' => json_encode(['color' => 'Black', 'size' => 'M']),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        $this->command->info('5 special products have been seeded successfully.');
    }
}
