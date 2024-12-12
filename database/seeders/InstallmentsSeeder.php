<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Installment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class InstallmentsSeeder extends Seeder
{
    public function run(): void
    {

        Schema::disableForeignKeyConstraints();
        DB::table('installments')->truncate();
        Schema::enableForeignKeyConstraints();

        $installments = [
            [
                'name_ar' => 'قسط 12 شهرًا',
                'name_en' => '12 Months Installment',
                'description_ar' => 'خطة لمدة 12 شهرًا بدون فوائد.',
                'description_en' => 'A 12-month plan with no interest.',
                'deposit' => 500.00,
                'down_payment' => 1000.00,
                'profit' => 50.00,
                'min_price' => 5000.00,
                'active' => true
            ],
            [
                'name_ar' => 'قسط 6 أشهر',
                'name_en' => '6 Months Installment',
                'description_ar' => 'خطط لـ 6 أشهر مع فوائد منخفضة.',
                'description_en' => '6-month plans with low-interest rates.',
                'deposit' => 300.00,
                'down_payment' => 2000.00,
                'profit' => 80.00,
                'min_price' => 3000.00,
                'active' => true
            ],
            [
                'name_ar' => 'قسط 3 أشهر',
                'name_en' => '3 Months Installment',
                'description_ar' => 'قسط قصير مع خيارات مميزة.',
                'description_en' => 'Short installment with premium options.',
                'deposit' => 150.00,
                'down_payment' => 1500.00,
                'profit' => 40.00,
                'min_price' => 2000.00,
                'active' => true
            ],
            [
                'name_ar' => 'قسط 24 شهرًا',
                'name_en' => '24 Months Installment',
                'description_ar' => 'خطط طويلة الأجل مع فوائد تناسب الجميع.',
                'description_en' => 'Long-term plans suitable for all.',
                'deposit' => 600.00,
                'down_payment' => 2500.00,
                'profit' => 100.00,
                'min_price' => 10000.00,
                'active' => true
            ],
            [
                'name_ar' => 'قسط خاص',
                'name_en' => 'Special Installment',
                'description_ar' => 'خطط مرنة حسب احتياجات العميل.',
                'description_en' => 'Flexible plans tailored to customer needs.',
                'deposit' => 800.00,
                'down_payment' => 3000.00,
                'profit' => 120.00,
                'min_price' => 8000.00,
                'active' => true
            ]
        ];

        foreach ($installments as $installment) {
            Installment::create($installment);
        }
    }
}
