<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('type')->insert([
            'name' => 'Regular',
        ]);

        DB::table('type')->insert([
            'name' => 'Fast Track',
        ]);
    }
}
