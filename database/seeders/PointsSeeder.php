<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Order;
use App\Models\Point;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PointsSeeder extends Seeder
{
    public function run(): void
    {


        Schema::disableForeignKeyConstraints();
        DB::table('points')->truncate();
        Schema::enableForeignKeyConstraints();

        $users = User::all();
        $orders = Order::all();

        for ($i = 1; $i <= 10; $i++) {
            Point::create([
                'user_id' => $users->random()->id,
                'order_id' => $orders->random()->id,
                'points' => rand(10, 100),
                'type' => array_rand(['purchase', 'reward', 'referral']),
                'points_total' => rand(500, 1000),
                'value_exchanged' => rand(50, 500),
                'description' => "نقاط تضاف تلقائيًا عبر الطلب رقم $i",
                'exp_date' => now()->addDays(rand(7, 365))
            ]);
        }
    }
}
