<?php

namespace Database\Seeders;

use App\Models\Coupon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class CouponsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('coupons')->truncate();
        Schema::enableForeignKeyConstraints();
        $data = [
            [
                'user_id' => 1,
                'customer_id' => null,
                'type_code' => 1,
                'code' => strtoupper(Str::random(10)),
                'description' => 'كود مجاني بدون خصم محدد',
                'discount_value' => null,
                'discount_type' => null,
                'max_used' => 100,
                'times_used' => 20,
                'status' => true,
                'start_date' => '2024-01-01',
                'end_date' => '2024-12-31',
            ],
            [
                'user_id' => 1,
                'customer_id' => 2,
                'type_code' => 2,
                'code' => strtoupper(Str::random(10)),
                'description' => 'خصم نقدي على الطلبات',
                'discount_value' => 50.00,
                'discount_type' => 'cash',
                'max_used' => 50,
                'times_used' => 10,
                'status' => true,
                'start_date' => '2024-02-01',
                'end_date' => '2024-12-31',
            ],
            [
                'user_id' => 1,
                'customer_id' => null,
                'type_code' => 2,
                'code' => strtoupper(Str::random(10)),
                'description' => 'خصم نسبي على الطلبات',
                'discount_value' => 20.00,
                'discount_type' => 'relative',
                'max_used' => 200,
                'times_used' => 50,
                'status' => false,
                'start_date' => '2024-01-01',
                'end_date' => '2024-06-30',
            ],
        ];

        foreach ($data as $item) {
            Coupon::create($item);
        }
    }
}
