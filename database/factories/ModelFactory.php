<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Http\Controllers\EmployeeController;
use App\Employee;
use App\User;
use App\{Employee, EmployeeSalary};

$factory->define(Employee::class, function (Faker $faker) {
    return [
      'documento' => $faker->idNumber,
      'telefono'  => $faker->mobileNumber,
      'nombres'   => $faker->name,
      'direccion' => $faker->address,
    ];
});

$factory->define(EmployeeSalary::class, function (Faker $faker){
  return[
    'salario'     =>  $faker->numberBetween($min = 1000, $max = 9000),
    'impuesto'    =>  $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 9),
    'salud'       =>  $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 9),
    'pension'     =>  $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 9),
    'valor_primas'=>  $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 9),
    'cargo'       =>  $faker->jobTitle,
    'employee_id' =>  function () {
      return factory(Employee::class)->create()->id;
    }
  ];
});
