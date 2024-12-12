<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reward;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class RewardsSeeder extends Seeder
{
    public function run(): void
    {


        Schema::disableForeignKeyConstraints();
        DB::table('rewards')->truncate();
        Schema::enableForeignKeyConstraints();

        for ($i = 1; $i <= 10; $i++) {
            Reward::create([
                'name_ar' => "مكافأة رقم $i بالعربية",
                'name_en' => "Reward $i in English",
                'description_ar' => "وصف المكافأة رقم $i باللغة العربية",
                'description_en' => "Reward description $i in English",
                'points_required' => rand(100, 1000),  // عدد النقاط المطلوبة للمكافأة
                'is_active' => (bool)rand(0, 1),  // تحديد حالة المكافأة (تنشيط أو إلغاء)
            ]);
        }
    }
}
