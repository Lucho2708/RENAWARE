<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
  protected $fillable = [
    'documento',
    'telefono',
    'nombres',
    'direccion'];

  public function EmployeeSalary()
  {
    return $this->hasOne('App\EmployeeSalary');
  }
}
