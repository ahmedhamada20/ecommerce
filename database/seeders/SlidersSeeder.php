<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Slider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class SlidersSeeder extends Seeder
{
    public function run(): void
    {

        Schema::disableForeignKeyConstraints();
        DB::table('sliders')->truncate();
        Schema::enableForeignKeyConstraints();

        $users = User::all();

        for ($i = 1; $i <= 5; $i++) {
            Slider::create([
                'title_ar' => "العنوان بالعربية - Slider $i",
                'title_en' => "English Title - Slider $i",
                'description_ar' => "وصف طويل بالعربية لـ Slider $i.",
                'description_en' => "Long description in English for Slider $i.",
                'user_id' => $users->random()->id,
            ]);
        }
    }
}
