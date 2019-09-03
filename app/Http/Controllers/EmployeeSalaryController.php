<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmployeeSalary;

class EmployeeSalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      /**
      *
      * Retorna la lista de todos los cargos generados por el usuario.
      *
      */
        return View('position.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      /**
      *
      * Retorna el formnulario para crear el cargo.
      *
      */
        return view('position.create');
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
        *
        * Se le indica al usuario que el campo en el formulario
        * es requerido
        *
        */
        $this->validate( $request, [
          'salario'   => 'required',
          'impuesto'  => 'required',
          'salud'     => 'required',
          'pension'   => 'required',
          'valor_primas' => 'required',
          'cargo'     => 'required'
        ]);

        /**
        * Se crea el cargo que va a ser relacionado con el empleado.
        *
        */
        $position = New EmployeeSalary ($request->all());

        $position->save();

        return redirect(route('position.create'));
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

    public function getPositionAll()
    {
      /**
      *
      * Se obtienen todos los cargos con valores "null" o "fk_empleado"
      *
      */
      $position = EmployeeSalary::All();
      return $position;
    }

    public function getEmployeeAll()
    {
      /**
      *
      * Se obtienen los datos del empleado a travez de los cargos que no
      * tiene valores "null" empleados relacionado al cargo.
      *
      */
      $empleado = EmployeeSalary::with('employee')->whereNotNull('employee_id')->get();
      return $empleado;
    }
}
