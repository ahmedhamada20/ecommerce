<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('users')->truncate();
        DB::table('roles')->truncate();
        DB::table('role_has_permissions')->truncate();
        DB::table('permissions')->truncate();
        Schema::enableForeignKeyConstraints();

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        $permissions = [
            'permission_index', 'permission_create', 'permission_edit', 'permission_deleted',
            'role_index', 'role_create', 'role_edit', 'role_deleted', 'Users', 'Brand', 'Product', 'sliders', 'currencies',
            'Blog', 'coupons', 'categories', 'Reward', 'tags', 'installments', 'advertisement_banners', 'special_products',
            'orders'
        ];
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission, 'guard_name' => 'web']);
        }
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        $role_admin = Role::create(['name' => 'admin', 'guard_name' => 'web']);
        $role_admin->syncPermissions(Permission::all());
        $admin = User::create([
            'first_name' => 'Ahmed',
            'last_name' => 'Hamada',
            'email' => 'admin@admin.com',
            'phone' => '201111289180',
            'type' => 'admin',
            'gender' => 'man',
            'role' => $role_admin->name,
            'password' => bcrypt(123456789),
        ]);


        $admin->assignRole($role_admin);

        $role_employee = Role::create(['name' => 'employee', 'guard_name' => 'web']);
        $role_employee->syncPermissions(Permission::whereNotIn('id',  [1, 2, 3, 4, 5, 6, 7, 11])->where('guard_name', 'web')->get());
        $employee = User::create([
            'first_name' => 'Test',
            'last_name' => 'Dash',
            'email' => 'test@test.com',
            'phone' => '201111289181',
            'type' => 'admin',
            'gender' => 'man',
            'role' => $role_employee->name,
            'password' => bcrypt(123456789),
        ]);
        $employee->assignRole($role_employee);


        DB::table('users')->insert([
            [
                'first_name' => 'John',
                'last_name' => 'Doe',
                'email' => 'john.doe@example.com',
                'phone' => '1234567891',
                'code_country' => '+1',
                'whatsapp_phone' => '1234567890',
                'profile_picture' => null,
                'date_of_birth' => '1990-01-01',
                'fb_link' => null,
                'tw_link' => null,
                'in_link' => null,
                'google_id' => null,
                'facebook_id' => null,
                'reset_code' => null,
                'wallets' => 100.50,
                'address' => '123 Main Street, Cairo',
                'is_verified' => true,
                'type' => 'customer',
                'gender' => 'man',
                'wallet_balance' => 100.50,
                'is_active' => true,
                'email_verified_at' => now(),
                'last_login' => now(),
                'reset_password_expires' => null,
                'reset_password_token' => null,
                'password' => Hash::make('password123'),
                'role' => null,
                'columns' => null,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'first_name' => 'Jane',
                'last_name' => 'Smith',
                'email' => 'jane.smith@example.com',
                'phone' => '9876543210',
                'code_country' => '+1',
                'whatsapp_phone' => '9876543210',
                'profile_picture' => null,
                'date_of_birth' => '1985-05-15',
                'fb_link' => null,
                'tw_link' => null,
                'in_link' => null,
                'google_id' => null,
                'facebook_id' => null,
                'reset_code' => null,
                'wallets' => 200.75,
                'address' => '456 Elm Street, Cairo',
                'is_verified' => true,
                'type' => 'customer',
                'gender' => 'female',
                'wallet_balance' => 200.75,
                'is_active' => true,
                'email_verified_at' => now(),
                'last_login' => now(),
                'reset_password_expires' => null,
                'reset_password_token' => null,
                'password' => Hash::make('password456'),
                'role' => null,
                'columns' => null,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        $this->command->info('Users Add successfully.');
        $this->call(BrandSeeder::class);
        $this->call(CouponsSeeder::class);
        $this->call(CurrenciesSeeder::class);
        $this->call(CategoriesSeeder::class);
        $this->call(TagsSeeder::class);
        $this->call(ProductsSeeder::class);
        $this->call(OrdersSeeder::class);
        $this->call(PaymentsSeeder::class);
        $this->call(BlogsSeeder::class);
        $this->call(AttributesSeeder::class);
        $this->call(AttributeValuesSeeder::class);
        $this->call(ProductAttributesSeeder::class);
        $this->call(SlidersSeeder::class);
        $this->call(HyperlinksSeeder::class);
        $this->call(PointsSeeder::class);
        $this->call(PointsRulesSeeder::class);
        $this->call(RewardsSeeder::class);
        $this->call(GiftRedemptionsSeeder::class);
        $this->call(OrderStatusesSeeder::class);
        $this->call(InstallmentsSeeder::class);
        $this->call(UserInstallmentsSeeder::class);
        $this->call(AdvertisementBannersSeeder::class);
        $this->call(OrderItemsSeeder::class);
        $this->call(SpecialProductsSeeder::class);
        $this->call(SpecialAllProductsSeeder::class);
    }
}
