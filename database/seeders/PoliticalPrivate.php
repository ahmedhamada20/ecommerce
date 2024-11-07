<?php

namespace Database\Seeders;

use App\Models\PoliticalPrivate as ModelsPoliticalPrivate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class PoliticalPrivate extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
  
        Schema::disableForeignKeyConstraints();
        DB::table('political_privates')->truncate();
        Schema::enableForeignKeyConstraints();

        ModelsPoliticalPrivate::create([
            'title_ar'=>fake()->paragraph(),
            'title_en'=>fake()->paragraph(),
            'notes_ar'=>fake()->paragraph(),
            'notes_en'=>fake()->paragraph(),
        ]);
    }
}
