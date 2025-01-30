<?php

namespace Database\Seeders;

use App\Models\author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        author::factory()->count(5)->create();
    }
}
