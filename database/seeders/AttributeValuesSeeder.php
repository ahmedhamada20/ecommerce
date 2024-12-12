<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use App\Models\Attribute;
use App\Models\AttributeValue;

class AttributeValuesSeeder extends Seeder
{
    public function run(): void
    {

        Schema::disableForeignKeyConstraints();
        DB::table('attribute_values')->truncate();
        Schema::enableForeignKeyConstraints();


        $attributes = Attribute::all();

        foreach ($attributes as $attribute) {
            for ($i = 1; $i <= 3; $i++) {
                AttributeValue::create([
                    'attribute_id' => $attribute->id,
                    'value' => $attribute->name_en . ' - Option ' . $i,
                    'qty' => rand(5, 50),
                    'price' => rand(10, 500),
                ]);
            }
        }
    }
}
