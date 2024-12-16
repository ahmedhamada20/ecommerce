<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use App\Models\Payment;
use App\Models\Order;

class PaymentsSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('payments')->truncate();
        Schema::enableForeignKeyConstraints();

        $paymentMethods = ['credit_card', 'paypal', 'cash_on_delivery'];
        $paymentStatuses = ['pending', 'completed', 'failed'];

        Order::chunk(100, function ($orders) use ($paymentMethods, $paymentStatuses) {
            $payments = [];
            foreach ($orders as $order) {
                $payments[] = [
                    'order_id' => $order->id,
                    'payment_method' => $paymentMethods[array_rand($paymentMethods)],
                    'payment_status' => $paymentStatuses[array_rand($paymentStatuses)],
                    'amount' => $order->total,
                    'columns' => json_encode(['extra_info' => Str::random(10)]),
                    'created_at' => now(),
                    'updated_at' => now()
                ];
            }
            Payment::insert($payments);
        });
    }
}
