<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Tryout;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ProvinsiSeeder::class,
            KotaSeeder::class,
            UniversitasSeeder::class,
            JurusanSeeder::class,
            InstansiSeeder::class,
            CategorySeeder::class,
            TryoutSeeder::class,
            SoalSeeder::class,
        ]);

        // Create test users with different target_test preferences
        $users = [
            [
                'name' => 'User CPNS',
                'email' => 'usercpns@example.com',
                'password' => bcrypt('password'),
                'target_test' => 'cpns',
            ],
            [
                'name' => 'User PPPK',
                'email' => 'userpppk@example.com',
                'password' => bcrypt('password'),
                'target_test' => 'pppk',
            ],
            [
                'name' => 'User Both',
                'email' => 'userboth@example.com',
                'password' => bcrypt('password'),
                'target_test' => 'both',
            ],
        ];

        foreach ($users as $userData) {
            User::create($userData);
        }

        // Test User untuk development
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
            'target_test' => 'both',
        ]);

        echo "✅ Database seeding completed!\n";
        echo "📊 Created " . count($users) . " test users with different target_test preferences\n";
        echo "📝 Created TryoutSeeder with CPNS & PPPK packages\n";
        echo "📋 Total tryouts created: " . Tryout::count() . "\n";
    }
}
