<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Currency;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CurrenciesSeeder extends Seeder
{
    public function run(): void
    {

        Schema::disableForeignKeyConstraints();
        DB::table('currencies')->truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            [
                'name_ar' => 'الدولار الأمريكي',
                'name_en' => 'US Dollar',
                'type' => 'fiat',
                'country' => 'United States',
                'rate' => '1.00',
                'is_active' => true,
                'columns' => json_encode(['symbol' => '$', 'code' => 'USD']),
            ],
            [
                'name_ar' => 'اليورو',
                'name_en' => 'Euro',
                'type' => 'fiat',
                'country' => 'European Union',
                'rate' => '1.10',
                'is_active' => true,
                'columns' => json_encode(['symbol' => '€', 'code' => 'EUR']),
            ],
            [
                'name_ar' => 'البيتكوين',
                'name_en' => 'Bitcoin',
                'type' => 'crypto',
                'country' => 'Global',
                'rate' => '30000.00',
                'is_active' => true,
                'columns' => json_encode(['symbol' => '₿', 'code' => 'BTC']),
            ],
            [
                'name_ar' => 'الجنيه المصري',
                'name_en' => 'Egyptian Pound',
                'type' => 'fiat',
                'country' => 'Egypt',
                'rate' => '0.064',
                'is_active' => false,
                'columns' => json_encode(['symbol' => 'E£', 'code' => 'EGP']),
            ],
        ];

        foreach ($data as $item) {
            Currency::create($item);
        }
    }
}
