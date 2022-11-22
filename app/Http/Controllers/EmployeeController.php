<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Employee::get();
        return view('employee.employee', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.add_employee');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // request_array($request->all());

        $data = $request->all();

        if ($request->hasfile('employee_image')) {
            $file = $request->file('employee_image');
            $img_ext = $file->getClientOriginalExtension();
            $img_name = time().rand(111,99999).'.'.$img_ext;
            $image_path = 'files/employee_image/'.$img_name;
            Image::make($file)->resize(150,150)->save($image_path);
            $data['employee_image'] = $img_name;
        }else{
            $data['employee_image'] = null;
        }

        Employee::create($data);

        session()->flash('success', 'Data Saved Successfully.');
        return redirect()->route('employee.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Employee::find($id);
        return view('employee.edit_employee', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
