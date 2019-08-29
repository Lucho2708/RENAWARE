<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmpleadoSalario extends Model
{
  protected $table = 'employees_salaries';

  protected $fillable = [
    'salario',
    'impuesto',
    'salud',
    'pension',
    'valor_primas',
    'cargo'];

  public function empleado()
  {
    return $this->hasOne(Empleado::class);
  }
}
