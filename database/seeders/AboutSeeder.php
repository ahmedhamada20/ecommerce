<?php

namespace Database\Seeders;

use App\Models\AboutUs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Storage::deleteDirectory('public/about_us');
        Storage::makeDirectory('public/about_us');
        Schema::disableForeignKeyConstraints();
        DB::table('about_us')->truncate();
        Schema::enableForeignKeyConstraints();

        AboutUs::create([
            'photo' => fake()->image(storage_path('app/public/about_us'), 640, 480, null, false),
            'photo_1' => fake()->image(storage_path('app/public/about_us'), 640, 480, null, false),
            'logo_1' => fake()->image(storage_path('app/public/about_us'), 640, 480, null, false),
            'logo_2' => fake()->image(storage_path('app/public/about_us'), 640, 480, null, false),
            'logo_3' => fake()->image(storage_path('app/public/about_us'), 640, 480, null, false),
            'description_ar'=>fake()->paragraphs(),
            'description_en'=>fake()->paragraphs(),
            'description_ar_1'=>fake()->paragraphs(),
            'description_en_1'=>fake()->paragraphs(),
            'description_logo_1_ar'=>fake()->paragraphs(),
            'description_logo_1_en'=>fake()->paragraphs(),
            'description_logo_2_ar'=>fake()->paragraphs(),
            'description_logo_2_en'=>fake()->paragraphs(),
            'description_logo_3_ar'=>fake()->paragraphs(),
            'description_logo_3_en'=>fake()->paragraphs(),

        ]);
    }
}
