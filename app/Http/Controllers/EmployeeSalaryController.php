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
        return View('position.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $this->validate( $request, [
          'salario'   => 'required',
          'impuesto'  => 'required',
          'salud'     => 'required',
          'pension'   => 'required',
          'valor_primas' => 'required',
          'cargo'     => 'required'
        ]);

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

    public function getPositionAll()
    {
      $position = EmployeeSalary::All();
      return $position;
    }

    public function getEmployeeAll()
    {
      $empleado = EmployeeSalary::with('employee')->whereNotNull('employee_id')->get();
      return $empleado;
    }
}
