<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('colors')->truncate();
        Schema::enableForeignKeyConstraints();
        for ($i = 1; $i <= 10; $i++) {
            Color::create([
                'name'=> fake()->hexColor(),
                'user_id'=>auth('web')->check() ? auth('web')->user()->id : null,
            ]);
        }
    }
}
