<?php

namespace Database\Seeders;

use App\Models\Atraksi;
use App\Models\JamBuka;
use App\Models\Paket;
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

        Atraksi::factory()->create([
            'title' => 'Dufan',
            'slug' => 'Dufan',
            'deskripsi' => 'Dufan',
            'info_penting' => 'Dufan',
            'highlight' => 'Dufan',
            'provinsi' => 2,
            'provinsi_name' => 'Dufan',
            'kota' => 2,
            'kota_name' => 'Dufan',
            'lowest_price' => 100000,
            'is_active' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Paket::factory()->create([
            'atraksi_id' => 1,
            'type_id' => 1,
            'title' => "Full Day - Regular",                  // Generate a fake title
            'deskripsi' => 'asdfgadfgdfg',             // Generate a fake description
            'fasilitas' => 'asdfgadfgdfg',             // Generate fake facilities
            'cara_penukaran' => 'asdfgadfgdfg',        // Generate fake exchange procedure
            'syarat_dan_ketentuan' => 'asdfgadfgdfg',  // Generate fake terms and conditions
            'harga' => 100000,     // Generate a fake price
            'kuota' => 100,       // Generate a fake quota
            'is_refundable' => 1,            // Random boolean for is_refundable
            'created_at' => now(),
            'updated_at' => now(),
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
