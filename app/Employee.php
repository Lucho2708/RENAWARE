<?php

namespace App;

use Illute\Database\Eloquent\Model;
use App\EmployeeSalary;

class Employee extends Model
{
  protected $fillable = [
    'documento',
    'telefono',
    'nombres',
    'direccion'];

  public function employeeSalaries()
  {
    return $this->hasOne(EmployeeSalary::class);
  }

  public function createEmployee ($array, $data)
  {
    $employee = new Employee ($data);

    $this->employees()->save($employee);

    return $employee;
  }
}
