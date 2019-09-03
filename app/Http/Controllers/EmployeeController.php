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
      /**
      * Retorna la vista para listar los empleados.
      */
      return view('employee.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /**
        * Retorna la vista del formulario para crear empleado.
        */
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
        /**
        * Se generan los requiemientos de los campos a solicitar
        * en el formulario del empleado.
        */

        $this->validate($request, [
          'nombres'   => 'required',
          'documento' => 'required|integer|min:1',
          'telefono'  => 'required|integer|min:1',
          'direccion' => 'required',
          'cargo'     => 'required'
        ]);


        /**
        *
        * Se crea el empleado en la base de datos relacionado con el cargo.
        *
        */
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

    public function getPosition()
    {
      /**
       *  Obtener datos del cargo donde la llave foránea sea "null"
       *  para listar el "select", el cargo debe ser único por usuario.
       */
       
      $positions = DB::table('employees_salaries')
        ->whereNull('employee_id')
        ->get();

      return $positions;
    }
}
