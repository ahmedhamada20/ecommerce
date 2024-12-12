<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GiftRedemption;
use App\Models\User;
use App\Models\Reward;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class GiftRedemptionsSeeder extends Seeder
{
    public function run(): void
    {

        Schema::disableForeignKeyConstraints();
        DB::table('gift_redemptions')->truncate();
        Schema::enableForeignKeyConstraints();

        $users = User::all();
        $rewards = Reward::all();

        if ($users->isEmpty() || $rewards->isEmpty()) {
            $this->command->info('لا توجد بيانات كافية للمستخدمين أو المكافآت');
            return;
        }

        for ($i = 1; $i <= 15; $i++) {
            $user = $users->random();
            $reward = $rewards->random();

            GiftRedemption::create([
                'user_id' => $user->id,
                'reward_id' => $reward->id,
                'points_used' => rand(50, 500),
                'redeemed_at' => now()->subDays(rand(1, 30))->toDateString(),
            ]);
        }
    }
}
