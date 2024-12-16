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
        ini_set('memory_limit', '10G');
        Schema::disableForeignKeyConstraints();
        DB::table('orders')->truncate();
        Schema::enableForeignKeyConstraints();
        $customers = User::inRandomOrder()->limit(5)->pluck('id')->toArray();
        $coupons = Coupon::inRandomOrder()->limit(5)->pluck('id')->toArray();

        $orderTypes = ['orders', 'gifit'];
        $paymentTypes = ['cash', 'online', 'installment', 'wallet'];
        $orderStatuses = ['pending', 'processing', 'completed', 'cancelled', 'refunded'];

        $orders = [];
        $now = now();

        for ($i = 0; $i < 1800; $i++) {
            $orders[] = [
                'order_number' => Str::uuid(),
                'ref_id' => Str::random(50),
                'payment_type' => $paymentTypes[array_rand($paymentTypes)],
                'order_type' => $orderTypes[array_rand($orderTypes)],
                'customer_id' => $customers[array_rand($customers)],
                'coupon_id' => $coupons[array_rand($coupons)] ?? null,
                'points_used' => rand(0, 50),
                'status' => $orderStatuses[array_rand($orderStatuses)],
                'subtotal' => rand(100, 500),
                'discount' => rand(0, 100),
                'total' => rand(400, 1000),
                'shipping_address' => '123 Main Street, Cairo',
                'billing_address' => '456 Elm Street, Cairo',
                'placed_at' => $now,
                'completed_at' => $now->copy()->addDays(rand(1, 10)),
                'cancelled_at' => rand(0, 1) ? $now->copy()->subDays(rand(1, 5)) : null,
                'created_at' => now(),
                'updated_at' => now()
            ];

            if (count($orders) === 1000) {
                Order::insert($orders);
                $orders = [];
            }
        }

        if (!empty($orders)) {
            Order::insert($orders);
        }
    }
}
