<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('tags')->truncate();
        Schema::enableForeignKeyConstraints();
        for ($i = 1; $i <= 10; $i++) {
            Tag::create([
                'name' => fake()->word(),
                'user_id' => auth('web')->check() ? auth('web')->user()->id : null,
            ]);
        }

    }
}
