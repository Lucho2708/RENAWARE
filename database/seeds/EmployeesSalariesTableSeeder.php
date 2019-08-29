<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class EmployeesSalariesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\EmployeeSalary::create([
          'salario'  =>"1900000",
          'impuesto' =>"0.08",
          'salud' =>"0.08",
          'pension' =>"0.08",
          'valor_primas' =>"0.5",
          'cargo' =>"Tecnico"
        ]);

        App\EmployeeSalary::create([
          'salario'  =>"10000000",
          'impuesto' =>"0.12",
          'salud' =>"0.08",
          'pension' =>"0.02",
          'valor_primas' =>"0.02",
          'cargo' =>"Gerente"
        ]);
    }
}
