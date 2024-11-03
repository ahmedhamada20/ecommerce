<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Storage::deleteDirectory('public/blogs');
        Storage::makeDirectory('public/blogs');
        Schema::disableForeignKeyConstraints();
        DB::table('blogs')->truncate();
        Schema::enableForeignKeyConstraints();
        for ($i = 1; $i <= 5; $i++) {
            Blog::create([
                'name_ar' => fake()->title(),
                'name_en' => fake()->title(),
                'short_description_ar' => fake()->paragraph(),
                'short_description_en' => fake()->paragraph(),
                'description_ar' => fake()->paragraph(),
                'description_en' => fake()->paragraph(),
                'image' => fake()->image(storage_path('app/public/blogs'), 640, 480, null, false),
                'user_id' => auth('web')->check() ? auth('web')->user()->id : null,
            ]);
        }

    }
}
