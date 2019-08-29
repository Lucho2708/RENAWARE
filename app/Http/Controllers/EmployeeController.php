<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\EmployeeSalary;
use App\Empleado;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('employee.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //Se debe coloca Database transactions

        $this->validate($request, [
          'nombres'   => 'required',
          'documento' => 'required|integer|min:1',
          'telefono'  => 'required|integer|min:1',
          'direccion' => 'required',
          'cargo'     => 'required'
        ]);

        DB::transaction(function() use ($request){

          $empleado = New Empleado ($request->all());

          $empleado->save();

          $cargo = EmployeeSalary::findOrFail($request['cargo']);

          $cargo->employee()->associate($empleado);

          $cargo->save();

        });

        return redirect(route('employee.create'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getPosition()
    {
      //$positions = EmployeeSalary::all();

      $positions = DB::table('employees_salaries')
        ->whereNull('employee_id')
        ->get();

      return $positions;
    }
}
