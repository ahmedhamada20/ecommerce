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
        $orders = Order::all();
        foreach ($orders as $order) {
            Payment::create([
                'order_id' => $order->id,
                'payment_method' => $paymentMethods[array_rand($paymentMethods)],
                'payment_status' => $paymentStatuses[array_rand($paymentStatuses)],
                'amount' => $order->total,
                'columns' => json_encode(['extra_info' => Str::random(10)]),
            ]);
        }
    }
}
