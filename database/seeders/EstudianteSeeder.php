<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstudianteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::Table('estudiantes')->insert([
            'Nombre' => 'Juan',
            'Apellido' => 'Perez',
            'Email' => 'shy@gmail.com',
            'Telefono' => '7774691256',
            'Direccion' => 'Lomas alla',
            'Carrera' => 'ITI'
        ]);
    }
}
