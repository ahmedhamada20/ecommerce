<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserInstallment;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UserInstallmentsSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('user_installments')->truncate();
        Schema::enableForeignKeyConstraints();
        $installments = [
            [
                'order_id' => 1,
                'user_id' => 1,
                'value' => 500.00,
                'due_date' => Carbon::now()->addMonths(3)->toDateString(),
                'paid_date' => Carbon::now()->toDateString(),
                'status' => 'paid'
            ],
            [
                'order_id' => 2,
                'user_id' => 2,
                'value' => 1000.00,
                'due_date' => Carbon::now()->addMonths(6)->toDateString(),
                'paid_date' => null,
                'status' => 'pending'
            ],
            [
                'order_id' => 3,
                'user_id' => 3,
                'value' => 1500.00,
                'due_date' => Carbon::now()->addMonths(12)->toDateString(),
                'paid_date' => null,
                'status' => 'pending'
            ],
            [
                'order_id' => 4,
                'user_id' => 4,
                'value' => 750.00,
                'due_date' => Carbon::now()->addMonths(2)->toDateString(),
                'paid_date' => Carbon::now()->toDateString(),
                'status' => 'paid'
            ],
            [
                'order_id' => 5,
                'user_id' => 5,
                'value' => 2000.00,
                'due_date' => Carbon::now()->addMonths(4)->toDateString(),
                'paid_date' => null,
                'status' => 'pending'
            ]
        ];

        foreach ($installments as $installment) {
            UserInstallment::create($installment);
        }
    }
}
