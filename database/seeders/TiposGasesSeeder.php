<?php

namespace Database\Seeders;

use App\Models\TipoGas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TiposGasesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TipoGas::insert([
            ['descripcion' => 'Oxígeno Medicinal', 'uni_medida' => 'm3'],
            ['descripcion' => 'Oxígeno Industrial', 'uni_medida' => 'm3'],
            ['descripcion' => 'Gas Carbónico', 'uni_medida' => 'kg'],
            ['descripcion' => 'Acetileno', 'uni_medida' => 'kg'],
            ['descripcion' => 'Nitrógeno', 'uni_medida' => 'm3'],
        ]);
    }
}
