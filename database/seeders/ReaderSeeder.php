<?php

namespace Database\Seeders;

use App\Models\reader;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        reader::factory()->count(5)->create();
    }
}
