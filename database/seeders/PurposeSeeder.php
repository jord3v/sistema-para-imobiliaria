<?php

namespace Database\Seeders;

use App\Models\Purpose;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PurposeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Purpose::create(['name' => 'Apartamento']);
        Purpose::create(['name' => 'Casa']);
        Purpose::create(['name' => 'Comércio']);
        Purpose::create(['name' => 'Terreno']);
        Purpose::create(['name' => 'Rural']);
        Purpose::create(['name' => 'Industria']);
    }
}
