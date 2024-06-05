<?php

namespace Database\Seeders;

use App\Models\JamBuka;
use App\Models\Type;
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
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Type::factory()->create([
            'name' => 'Regular',
        ]);

        Type::factory()->create([
            'name' => 'Fast Track',
        ]);

        JamBuka::factory()->create([
            'atraksi_id' => 1,
            'hari' => 'Senin',
            'waktu' => '09:00 - 17:00',
            'is_open' => true
        ]);
        JamBuka::factory()->create([
            'atraksi_id' => 1,
            'hari' => 'Selasa',
            'waktu' => '09:00 - 17:00',
            'is_open' => true
        ]);
        JamBuka::factory()->create([
            'atraksi_id' => 1,
            'hari' => 'Rabu',
            'waktu' => '09:00 - 17:00',
            'is_open' => true
        ]);
        JamBuka::factory()->create([
            'atraksi_id' => 1,
            'hari' => 'Kamis',
            'waktu' => '09:00 - 17:00',
            'is_open' => true
        ]);
        JamBuka::factory()->create([
            'atraksi_id' => 1,
            'hari' => 'Jumat',
            'waktu' => '09:00 - 17:00',
            'is_open' => true
        ]);
        JamBuka::factory()->create([
            'atraksi_id' => 1,
            'hari' => 'Sabtu',
            'waktu' => '09:00 - 17:00',
            'is_open' => true
        ]);
        JamBuka::factory()->create([
            'atraksi_id' => 1,
            'hari' => 'Minggu',
            'waktu' => '09:00 - 17:00',
            'is_open' => true
        ]);



    }
}
