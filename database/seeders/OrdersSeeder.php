<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use App\Models\Order;
use App\Models\User;
use App\Models\Coupon;

class OrdersSeeder extends Seeder
{
    public function run(): void
    {

        Schema::disableForeignKeyConstraints();
        DB::table('orders')->truncate();
        Schema::enableForeignKeyConstraints();

        $customers = User::inRandomOrder()->limit(5)->get();
        $coupons = Coupon::inRandomOrder()->limit(5)->get();

        $orderTypes = ['orders', 'gifit'];
        $paymentTypes = ['cash', 'online', 'installment', 'wallet'];
        $orderStatuses = ['pending', 'processing', 'completed', 'cancelled', 'refunded'];

        for ($i = 0; $i < 5; $i++) {
            Order::create([
                'order_number' => Str::uuid(),
                'ref_id' => Str::random(10),
                'payment_type' => $paymentTypes[array_rand($paymentTypes)],
                'order_type' => $orderTypes[array_rand($orderTypes)],
                'customer_id' => $customers->random()->id,
                'coupon_id' => $coupons->random()->id ?? null,
                'points_used' => rand(0, 50),
                'status' => $orderStatuses[array_rand($orderStatuses)],
                'subtotal' => rand(100, 500),
                'discount' => rand(0, 100),
                'total' => rand(400, 1000),
                'shipping_address' => '123 Main Street, Cairo',
                'billing_address' => '456 Elm Street, Cairo',
                'placed_at' => now(),
                'completed_at' => now()->addDays(rand(1, 10)),
                'cancelled_at' => now()->subDays(rand(1, 5)),
            ]);
        }
    }
}
