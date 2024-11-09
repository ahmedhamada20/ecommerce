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
        if (Storage::exists('public/about_us')) {
            Storage::deleteDirectory('public/about_us');
        }

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
            'description_ar'=>fake()->paragraph(),
            'description_en'=>fake()->paragraph(),
            'description_ar_1'=>fake()->paragraph(),
            'description_en_1'=>fake()->paragraph(),
            'description_logo_1_ar'=>fake()->paragraph(),
            'description_logo_1_en'=>fake()->paragraph(),
            'description_logo_2_ar'=>fake()->paragraph(),
            'description_logo_2_en'=>fake()->paragraph(),
            'description_logo_3_ar'=>fake()->paragraph(),
            'description_logo_3_en'=>fake()->paragraph(),
            'title_logo_1_ar'=>fake()->title(),
            'title_logo_1_en'=>fake()->title(),
            'title_logo_2_ar'=>fake()->title(),
            'title_logo_2_en'=>fake()->title(),
            'title_logo_3_ar'=>fake()->title(),
            'title_logo_3_en'=>fake()->title(),
        ]);
    }
}
