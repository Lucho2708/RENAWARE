<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmployeeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_employee()
    {
      $documento  = 1070608568;
      $telefono   = 3142151036;
      $nombres     = 'Luis Eduardo Silva Rodriguez';
      $direccion  = 'KR 68D 34 28 SUR';

      $this->visit(route('employee.create'))
        ->type($documento, 'documento')
        ->type($telefono, 'telefono')
        ->type($nombres, 'nombres')
        ->type($direccion, 'direccion')
        ->press('Crear');

      $this->seeInDatabase('employees',[
        'documento' => $documento,
        'telefono'  => $telefono,
        'nombres'   => $nombres,
        'direccion' => $direccion
      ]);
    }
}
