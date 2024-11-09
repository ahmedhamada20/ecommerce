<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Storage::exists('public/partners')) {
            Storage::deleteDirectory('public/partners');
        }

        Storage::makeDirectory('public/partners');
        Schema::disableForeignKeyConstraints();
        DB::table('partners')->truncate();
        Schema::enableForeignKeyConstraints();
        for ($i = 1; $i <= 6; $i++) {
            Partner::create([
                "photo" => fake()->image(storage_path('app/public/partners'), 640, 480, null, false),
            ]);
        }
    }
}
