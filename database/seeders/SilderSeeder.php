<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class SilderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Storage::exists('public/sliders')) {
            Storage::deleteDirectory('public/sliders');
        }

        Storage::makeDirectory('public/sliders');
        Schema::disableForeignKeyConstraints();
        DB::table('sliders')->truncate();
        Schema::enableForeignKeyConstraints();
        for ($i = 0; $i < 10; $i++) {
            Slider::create([
                'title_ar' => fake()->title(),
                'title_en' => fake()->title(),
                'description_ar' => fake()->paragraph(),
                'description_en' => fake()->paragraph(),
                'photo' => fake()->image(storage_path('app/public/sliders'), 640, 480, null, false),
            ]);
        }
    }
}
