<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OrderItem;
use App\Models\Order;
use App\Models\Product;
use App\Models\Attribute;
use App\Models\AttributeValue;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class OrderItemsSeeder extends Seeder
{
    public function run(): void
    {

        Schema::disableForeignKeyConstraints();
        DB::table('order_items')->truncate();
        Schema::enableForeignKeyConstraints();

        $orders = Order::all();
        $products = Product::all();
        $attributes = Attribute::all();
        $attributeValues = AttributeValue::all();

        if ($orders->isEmpty() || $products->isEmpty()) {
            $this->command->info('No orders or products found in the database.');
            return;
        }

        foreach ($orders as $order) {
            $numItems = rand(1, 5);

            for ($i = 0; $i < $numItems; $i++) {
                $product = $products->random();
                $attribute = $attributes->random();
                $attributeValue = $attributeValues->random();

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'attribute_id' => $attribute ? $attribute->id : null,
                    'attribute_value_id' => $attributeValue ? $attributeValue->id : null,
                    'quantity' => rand(1, 10),
                    'price_per_unit' => rand(100, 500)
                ]);
            }
        }
    }
}
