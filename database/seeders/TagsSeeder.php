<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use App\Models\Tag;
use App\Models\User;

class TagsSeeder extends Seeder
{
    public function run(): void
    {

        Schema::disableForeignKeyConstraints();
        DB::table('tags')->truncate();
        Schema::enableForeignKeyConstraints();

        $users = User::all();

        $tagNames = [
            'Technology', 'Health', 'Education', 'Travel', 'Fashion',
            'Food', 'Sports', 'Entertainment', 'Business', 'Science'
        ];

        foreach ($tagNames as $name) {
            Tag::create([
                'name' => $name,
                'user_id' => $users->random()->id,
                'columns' => json_encode(['extra_info' => Str::random(10)]),
            ]);
        }
    }
}
