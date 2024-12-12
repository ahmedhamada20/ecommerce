<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\ProductAttributes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ProductAttributesSeeder extends Seeder
{
    public function run(): void
    {


        Schema::disableForeignKeyConstraints();
        DB::table('product_attributes')->truncate();
        Schema::enableForeignKeyConstraints();

        $products = Product::all();
        $attributes = Attribute::all();

        foreach ($products as $product) {
            $randomAttributes = $attributes->random(3);
            foreach ($randomAttributes as $attribute) {
                $attributeValues = AttributeValue::where('attribute_id', $attribute->id)->get();
                $randomValue = $attributeValues->random();
                ProductAttributes::create([
                    'product_id' => $product->id,
                    'attribute_id' => $attribute->id,
                    'attribute_value_id' => $randomValue->id,
                ]);
            }
        }
    }
}
