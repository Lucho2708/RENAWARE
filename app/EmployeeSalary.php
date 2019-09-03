<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Empleado;

class EmployeeSalary extends Model
{
  /**
  * Modelo de cargo y salario
  */
    protected $table = 'employees_salaries';

    protected $fillable = [
      'salario',
      'impuesto',
      'salud',
      'pension',
      'valor_primas',
      'cargo'];

    public function employee()
    {
      /**
      * Se genera la relación uno a uno
      */
      return $this->belongsTo(Empleado::class);
    }
}
