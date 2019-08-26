<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\EmployeeSalary;

class Empleado extends Model
{
  protected $table  = 'employees';

  protected $fillable = [
    'documento',
    'telefono',
    'nombres',
    'direccion'];

  public function employeeSalaries()
  {
    return $this->hasOne(EmployeeSalary::class);
  }

}
