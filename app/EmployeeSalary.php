<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Employee;

class EmployeeSalary extends Model
{
    protected $fillable = [
      'salario',
      'impuesto',
      'salud',
      'pension',
      'valor_primas',
      'cargo'];

    public function employees()
    {
      return $this->belongsTo(Employee::class);
    }
}
