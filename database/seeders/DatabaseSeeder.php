<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Product;
use App\Models\Referral;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::create(['name' => 'admin']);
        $resellerRole = Role::create(['name' => 'reseller']);

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'phone' => '0123456789',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        $admin->assignRole($adminRole);

        $reseller = User::create([
            'name' => 'Reseller',
            'email' => 'reseller@gmail.com',
            'phone' => '0123432436',
            'referral_code' => Str::random(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        $reseller->assignRole($resellerRole);
        $reseller2 = User::create([
            'name' => 'Reseller 2',
            'email' => 'reseller2@gmail.com',
            'phone' => '01234324367',
            'referral_code' => Str::random(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        $reseller2->assignRole($resellerRole);

        Referral::create([
            'code' => $reseller->referral_code,
            'user_id' => $reseller2->id,
        ]);

        $categories = [];
        $categories[] = Category::create([
            'name' => 'Men',
            'description' => 'Men`s Product',
        ]);
        $categories[] = Category::create([
            'name' => 'Woman ',
            'description' => 'Woman`s Product',
        ]);

        foreach($categories as $category) {
            $category->products()->saveMany(Product::factory()->count(10)->create());
        }
    }
}
