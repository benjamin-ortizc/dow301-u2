<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstudiantesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('estudiantes')->insert([
          [
            "rut" => "21579160-2",
            "nombre" => "Benjamin",
            "apellido" => "Ortiz",
            "email" => "benjamin.ortiz@usm.cl"
          ],
          [
            "rut" => "21345224-2",
            "nombre" => "Pepito",
            "apellido" => "Fernandez",
            "email" => "pepito_fernandez@gmail.com",
          ],
          [
            "rut" => "12345221-5",
            "nombre" => "Jose",
            "apellido" => "Carrillo",
            "email" => "jose_carrillo@gmail.com",
          ]
        ]);
    }
}
