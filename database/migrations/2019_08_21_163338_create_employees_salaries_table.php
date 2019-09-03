<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     // Tabla de cargos y salarios 
    public function up()
    {
        Schema::create('employees_salaries', function (Blueprint $table) {
          //Tabla de salarios de empleados
            $table->bigIncrements('id');
            $table->integer('salario');
            $table->double('impuesto');
            $table->double('salud');
            $table->double('pension');
            $table->double('valor_primas');
            $table->string('cargo');
            $table->unsignedBigInteger('employee_id')->nullable();

            $table->foreign('employee_id')->references('id')->on('employees');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees_salaries');
    }
}
