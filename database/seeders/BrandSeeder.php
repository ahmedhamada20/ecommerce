<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Storage::deleteDirectory('public/brands');
        Storage::makeDirectory('public/brands');
        Schema::disableForeignKeyConstraints();
        DB::table('brands')->truncate();
        Schema::enableForeignKeyConstraints();
        for ($i = 1; $i <= 5; $i++) {
            Brand::create([
                'name_ar' => fake()->name(),
                'name_en' => fake()->name(),
                'image' => fake()->image(storage_path('app/public/brands'), 640, 480, null, false),
                'active' => fake()->boolean(),
                'description' => fake()->text(),
                'user_id' => auth('web')->check() ? auth('web')->user()->id : null,
            ]);
        }
    }
}
