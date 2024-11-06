<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Customer;
use App\Models\Info;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Storage::deleteDirectory('public/info');
        Storage::makeDirectory('public/info');
        Schema::disableForeignKeyConstraints();
        DB::table('infos')->truncate();
        Schema::enableForeignKeyConstraints();

        Info::createOrFirst([

            "name_ar"=>fake()->name(),
            "name_en"=>fake()->name(),
            'logo' => fake()->image('public/storage/info', 640, 480, null, false),
            'phone' => fake()->phoneNumber(),
            'phone_1' => fake()->phoneNumber(),
            'phone_2' => fake()->phoneNumber(),
            'phone_3' => fake()->phoneNumber(),
            'phone_4' => fake()->phoneNumber(),
            'fb_link' => fake()->url(),
            'tw_link' => fake()->url(),
            'in_link' => fake()->url(),
            'payment_logo' => fake()->image('public/storage/info', 640, 480, null, false),
            'home_open_logo_new' => fake()->image('public/storage/info', 640, 480, null, false),
            "home_tilte_logo_new_ar"=>fake()->title(),
            "home_tilte_logo_new_en"=>fake()->title(),
            "home_title_products_1_ar"=>fake()->title(),
            "home_title_products_1_en"=>fake()->title(),
            "notes_title_products_1_ar"=>fake()->title(),
            "notes_title_products_1_en"=>fake()->title(),
            "home_title_products_2_ar"=>fake()->title(),
            "home_title_products_2_en"=>fake()->title(),
            "notes_title_products_2_ar"=>fake()->title(),
            "notes_title_products_2_en"=>fake()->title(),
            'partners_logo' => fake()->image('public/storage/info', 640, 480, null, false)
        ]);


        // $this->call(CustomerSeeder::class);
        // $this->call(ColorSeeder::class);
        // $this->call(SizeSeeder::class);
        // $this->call(TagsSeeder::class);
        // $this->call(CategorySeeder::class);
        // $this->call(BrandSeeder::class);
        // $this->call(ProductSeeder::class);
        // $this->call(SilderSeeder::class);
        // $this->call(BlogSeeder::class);
        // $this->call(GallerySeeder::class);
        // $this->call(PartnerSeeder::class);
        // $this->call(AboutSeeder::class);
    }
}
