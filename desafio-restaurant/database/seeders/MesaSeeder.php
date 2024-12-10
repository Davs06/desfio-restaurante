<?php

namespace Database\Seeders;

use App\Models\Admin\Mesa;
use Illuminate\Database\Seeder;

class MesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mesa::factory()->count(15)->create(); // Cria 15 mesas
    }
}
