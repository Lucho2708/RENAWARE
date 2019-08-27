<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PositionTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_position()
    {
        $salario = 950000;
        $impuesto =  0.08;
        $salud = 0.08;
        $pension= 0.08;
        $valor_primas = 0.02;
        $cargo = "Desarrollador";

        $this->visit(route('position.create'))
          ->type($salario, 'salario')
          ->type($impuesto, 'impuesto')
          ->type($salud, 'salud')
          ->type($pension, 'pension')
          ->type($valor_primas, 'valor_primas')
          ->type($cargo, 'cargo')
          ->press('Crear');

        $this->seeInDatabase('employees_salaries',[
          'salario' => $salario,
          'impuesto' => $impuesto,
          'salud' => $salud,
          'pension'=> $pension,
          'valor_primas' => $valor_primas,
          'cargo' => $cargo
        ]);
    }
}
