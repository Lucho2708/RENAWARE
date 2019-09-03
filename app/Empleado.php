<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\EmployeeSalary;

class Empleado extends Model
{
  /**
  * Modelo de empleados
  */
  protected $table  = 'employees';

  protected $fillable = [
    'documento',
    'telefono',
    'nombres',
    'direccion'];

  public function employeeSalaries()
  {
    /**
    * Se genera la relacopm uno a uno
    */
    return $this->hasOne(EmployeeSalary::class);
  }

}
