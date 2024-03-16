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
            ['name' => 'Logistics', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Tech', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Management', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'PR', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Advertising', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sells', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Finance', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Reserach&Analytics', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('departments')->insert($departments);
        Employee::factory()->count(10)->create();
    }
}
