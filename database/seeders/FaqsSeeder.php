<?php

namespace Database\Seeders;

use App\Models\Faq;
use App\Models\FaqQuestions;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class FaqsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('faqs')->truncate();
        DB::table('faq_questions')->truncate();
        Schema::enableForeignKeyConstraints();

        for ($i = 1; $i <= 5; $i++) {
            Faq::create([
                'name_ar'=> fake()->name(),
                'name_en'=> fake()->hexColor(),
            ]);


            FaqQuestions::create([
                'faq_id'=> fake()->randomElement(Faq::pluck('id')->toArray()), 
                'answer_ar'=> fake()->name(),
                'answer_en'=> fake()->hexColor(),
            ]);



        }
    }
}
