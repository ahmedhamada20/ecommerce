<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use App\Models\Blog;
use App\Models\User;

class BlogsSeeder extends Seeder
{
    public function run(): void
    {

        Schema::disableForeignKeyConstraints();
        DB::table('blogs')->truncate();
        Schema::enableForeignKeyConstraints();

        $users = User::all();

        for ($i = 0; $i < 5; $i++) {
            Blog::create([
                'name_ar' => 'مدونة رقم ' . $i . ' بالعربية',
                'name_en' => 'Blog ' . $i . ' in English',
                'rate' => rand(1, 5),
                'short_description_ar' => 'وصف قصير باللغة العربية ' . $i,
                'short_description_en' => 'Short description in English ' . $i,
                'description_ar' => Str::random(50),
                'description_en' => Str::random(50),
                'notes_ar' => 'ملاحظات بالعربية ' . $i,
                'notes_en' => 'Notes in English ' . $i,
                'count_view' => rand(0, 100),
                'count_comments' => rand(0, 50),
                'user_id' => $users->random()->id,
                'columns' => json_encode(['extra_key' => Str::random(10)]),
            ]);
        }
    }
}
