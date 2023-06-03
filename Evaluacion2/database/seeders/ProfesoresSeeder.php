<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfesoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('profesores')->insert([
          [
            "email" => "carlos.alten@usm.cl",
            "nombre" => "Carlos",
            "apellido" => "Alten",
          ],
          [
            "email" => "dagoberto.cabrera@usm.cl",
            "nombre" => "Dagoberto",
            "apellido" => "Cabrera",
          ],
        ]);
    }
}
