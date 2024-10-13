<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('sizes')->truncate();
        Schema::enableForeignKeyConstraints();
        $sizes = ['XL', 'L', 'M', 'S', 'XS'];
        for ($i = 0; $i < count($sizes); $i++) {
            Size::create([
                'name' => $sizes[$i],
                'user_id' => auth('web')->check() ? auth('web')->user()->id : null,
            ]);
        }

    }
}
