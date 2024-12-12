<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
            'role_index', 'role_create', 'role_edit', 'role_deleted'
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

        User::create([
            'first_name' => 'user',
            'last_name' => 'user',
            'email' => 'user@user.com',
            'phone' => '201111289181',
            'type' => 'customer',
            'gender' => 'man',
            'role' => $role_admin->name,
            'password' => bcrypt(123456789),
        ]);
        $admin->assignRole($role_admin);

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
