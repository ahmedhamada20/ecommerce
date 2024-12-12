<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class SpecialAllProductsSeeder extends Seeder
{
    public function run(): void
    {

        Schema::disableForeignKeyConstraints();
        DB::table('special_all_products')->truncate();
        Schema::enableForeignKeyConstraints();

        DB::table('special_all_products')->insert([
            [
                'product_id' => 1,
                'special_product_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'product_id' => 2,
                'special_product_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'product_id' => 3,
                'special_product_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'product_id' => 4,
                'special_product_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'product_id' => 5,
                'special_product_id' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        $this->command->info('Special products have been associated with all products.');
    }
}
