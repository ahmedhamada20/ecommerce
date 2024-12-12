<?php

namespace Database\Seeders;

use App\Models\AdvertisementBanners;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AdvertisementBannersSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('advertisement_banners')->truncate();
        Schema::enableForeignKeyConstraints();
        $banners = [
            [
                'name_ar' => 'إعلان خاص بالعيد',
                'name_en' => 'Special Eid Banner',
                'description_ar' => 'عرض خاص بمناسبة العيد',
                'description_en' => 'Special offers for Eid',
                'date' => Carbon::now()->toDateString(),
                'active' => true
            ],
            [
                'name_ar' => 'خصومات الشتاء',
                'name_en' => 'Winter Discounts',
                'description_ar' => 'خصومات كبيرة هذا الشتاء',
                'description_en' => 'Huge discounts this winter',
                'date' => Carbon::now()->subDays(10)->toDateString(),
                'active' => true
            ],
            [
                'name_ar' => 'إعلان رمضان',
                'name_en' => 'Ramadan Advertisement',
                'description_ar' => 'عروض رمضانية رائعة',
                'description_en' => 'Amazing Ramadan offers',
                'date' => Carbon::now()->subMonths(1)->toDateString(),
                'active' => true
            ],
            [
                'name_ar' => 'عرض الربيع',
                'name_en' => 'Spring Sale',
                'description_ar' => 'خصومات خاصة لموسم الربيع',
                'description_en' => 'Special discounts for Spring season',
                'date' => Carbon::now()->addDays(5)->toDateString(),
                'active' => true
            ],
            [
                'name_ar' => 'إعلان ترويجي عالمي',
                'name_en' => 'Global Promotional Banner',
                'description_ar' => 'فرص عالمية غير مسبوقة',
                'description_en' => 'Unprecedented global opportunities',
                'date' => Carbon::now()->toDateString(),
                'active' => true
            ]
        ];

        foreach ($banners as $banner) {
            AdvertisementBanners::create($banner);
        }
    }
}
