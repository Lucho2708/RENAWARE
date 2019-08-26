<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Empleado;

class EmployeeSalary extends Model
{
    protected $table = 'employees_salaries';

    protected $fillable = [
      'salario',
      'impuesto',
      'salud',
      'pension',
      'valor_primas',
      'cargo'];

    public function employees()
    {
      return $this->belongsTo(Empleado::class);
    }
}
