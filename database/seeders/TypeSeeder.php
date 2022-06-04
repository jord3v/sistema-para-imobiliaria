<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Padrão', 'purpose_id' => '1'],
            ['name' => 'Kitnet', 'purpose_id' => '1'],
            ['name' => 'Cobertura', 'purpose_id' => '1'],
            ['name' => 'Loft', 'purpose_id' => '1'],
            ['name' => 'Penthouse', 'purpose_id' => '1'],
            ['name' => 'Flat', 'purpose_id' => '1'],
            ['name' => 'Sala Living', 'purpose_id' => '1'],
            ['name' => 'Cobertura Duplex', 'purpose_id' => '1'],
            ['name' => 'Cobertura Triplex', 'purpose_id' => '1'],
    
            ['name' => 'Padrão', 'purpose_id' => '2'],
            ['name' => 'Sobrado', 'purpose_id' => '2'],
            ['name' => 'Térrea', 'purpose_id' => '2'],
            ['name' => 'Sobreposta Alta', 'purpose_id' => '2'],
            ['name' => 'Sobreposta Baixa', 'purpose_id' => '2'],
            ['name' => 'Edícula', 'purpose_id' => '2'],
    
            ['name' => 'Barracão', 'purpose_id' => '3'],
            ['name' => 'Conjuntos', 'purpose_id' => '3'],
            ['name' => 'Consultório', 'purpose_id' => '3'],
            ['name' => 'Escola', 'purpose_id' => '3'],
            ['name' => 'Galeria', 'purpose_id' => '3'],
            ['name' => 'Galpão', 'purpose_id' => '3'],
            ['name' => 'Hotel', 'purpose_id' => '3'],
            ['name' => 'Lanchonete', 'purpose_id' => '3'],
            ['name' => 'Minimercado', 'purpose_id' => '3'],
            ['name' => 'Padaria', 'purpose_id' => '3'],
            ['name' => 'Predio', 'purpose_id' => '3'],
            ['name' => 'Quiosque', 'purpose_id' => '3'],
            ['name' => 'Restaurante', 'purpose_id' => '3'],
            ['name' => 'Sala', 'purpose_id' => '3'],
            ['name' => 'Salão', 'purpose_id' => '3'],
            ['name' => 'Sobreloja', 'purpose_id' => '3'],
            ['name' => 'Supermercado', 'purpose_id' => '3'],
    
            ['name' => 'Padrão', 'purpose_id' => '4'],
    
            ['name' => 'Fazenda', 'purpose_id' => '5'],
            ['name' => 'Chacara', 'purpose_id' => '5'],
            ['name' => 'Haras', 'purpose_id' => '5'],
            ['name' => 'Rancho', 'purpose_id' => '5'],
            ['name' => 'Sitio', 'purpose_id' => '5'],
            ['name' => 'Terreno', 'purpose_id' => '5'],
    
            ['name' => 'Terreno', 'purpose_id' => '6'],
            ['name' => 'Galpão', 'purpose_id' => '6'],
            ['name' => 'Prédio', 'purpose_id' => '6']
        ];
        foreach ($data as $key => $value) {
            Type::create($value);
        }  
    }
}
