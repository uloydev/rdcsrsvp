<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('passwordnya'),
        ]);

        $prizes = [
            [
                'name' => 'Paket Umroh',
                'amount' => 1,
                'is_prime' => true,
            ],
            [
                'name' => 'Sepeda Motor',
                'amount' => 1,
                'is_prime' => true,
            ],
            [
                'name' => 'Smart TV 43"',
                'amount' => 2,
                'is_prime' => true,
            ],
            [
                'name' => 'Sepeda Listrik',
                'amount' => 2,
                'is_prime' => true,
            ],
            [
                'name' => 'Handphone',
                'amount' => 4,
                'is_prime' => false,
            ],
            [
                'name' => 'Smart Watch',
                'amount' => 10,
                'is_prime' => false,
            ],
            [
                'name' => 'Power Bank',
                'amount' => 20,
                'is_prime' => false,
            ],
            [
                'name' => 'TWS Headset',
                'amount' => 20,
                'is_prime' => false,
            ],
            [
                'name' => 'Mini Hand Fan',
                'amount' => 20,
                'is_prime' => false,
            ],
            [
                'name' => 'Speaker Wireless',
                'amount' => 20,
                'is_prime' => false,
            ],
            [
                'name' => 'Tumbler Stainless',
                'amount' => 50,
                'is_prime' => false,
            ]
        ];

        foreach ($prizes as $prize) {
            \App\Models\Prize::create($prize);
        }
    }
}
