<?php

namespace Database\Seeders;

use App\Models\Employee;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@proton.com',
            'password' => '$2y$12$wpLk9gcx1v.qUgvwG3ywC.WJIDfwjtwWmqTiQ7m2cT8RFfH/NuGaa',
        ]);
        $departments = [
            ['name' => 'Logistics', 'created_at' => now()->subDays(7)->format('Y-m-d'), 'updated_at' => null],
            ['name' => 'Tech', 'created_at' => now()->subDays(14)->format('Y-m-d'), 'updated_at' => null],
            ['name' => 'Management', 'created_at' => now()->subDays(21)->format('Y-m-d'), 'updated_at' => null],
            ['name' => 'PR', 'created_at' => now()->subDays(28)->format('Y-m-d'), 'updated_at' => null],
            ['name' => 'Advertising', 'created_at' => now()->subDays(35)->format('Y-m-d'), 'updated_at' => null],
            ['name' => 'Sells', 'created_at' => now()->subDays(42)->format('Y-m-d'), 'updated_at' => null],
            ['name' => 'Finance', 'created_at' => now()->subDays(49)->format('Y-m-d'), 'updated_at' => null],
            ['name' => 'Research&Analytics', 'created_at' => now()->subDays(56)->format('Y-m-d'), 'updated_at' => null],
        ];

        DB::table('departments')->insert($departments);
        Employee::factory()->count(10)->create();
    }
}
