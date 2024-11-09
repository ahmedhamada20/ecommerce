<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Storage::exists('public/galleries')) {
            Storage::deleteDirectory('public/galleries');
        }

        Storage::makeDirectory('public/galleries');
        Schema::disableForeignKeyConstraints();
        DB::table('galleries')->truncate();
        Schema::enableForeignKeyConstraints();
        for ($i = 1; $i <= 6; $i++) {
            Gallery::create([
                "photo" => fake()->image(storage_path('app/public/galleries'), 640, 480, null, false),
            ]);
        }
    }
}
