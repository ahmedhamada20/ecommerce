<?php

namespace Database\Seeders;

use App\Enums\HyperlinksEnum;
use App\Models\Hyperlink;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class HyperlinksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('hyperlinks')->truncate();
        Schema::enableForeignKeyConstraints();

        $types = [HyperlinksEnum::SLIDER, HyperlinksEnum::BLOG];

        for ($i = 1; $i <= 10; $i++) {
            Hyperlink::create([
                'type' => $types[array_rand($types)],
                'name_ar' => "اسم الرابط بالعربية - $i",
                'name_en' => "Link Name in English - $i",
                'link' => "https://example.com/link-$i",
            ]);
        }
    }
}
