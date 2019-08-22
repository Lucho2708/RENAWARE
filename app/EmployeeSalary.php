<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeSalary extends Model
{
    protected $fillable = [
      'salario',
      'impuesto',
      'salud',
      'pension',
      'valor_primas',
      'cargo'];

    public function Employee()
    {
      return $this->belongsTo('App\Employee');
    }
}
