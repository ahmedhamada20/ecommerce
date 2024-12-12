<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\User;
use App\Models\OrderStatus;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class OrderStatusesSeeder extends Seeder
{
    public function run(): void
    {


        Schema::disableForeignKeyConstraints();
        DB::table('order_statuses')->truncate();
        Schema::enableForeignKeyConstraints();
        $statuses = ['pending', 'processing', 'completed', 'cancelled', 'refunded'];

        $orders = Order::all();
        $users = User::all();

        foreach ($orders as $order) {
            $randomUser = $users->random();

            $status = $statuses[array_rand($statuses)];

            OrderStatus::create([
                'order_id' => $order->id,
                'status' => $status,
                'user_id' => $randomUser->id,
                'columns' => json_encode(['updated_at' => Carbon::now()->toDateTimeString()])
            ]);
        }
    }
}
