<?php

namespace App\Http\Controllers;

use App\Models\Counsel;
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
        $data = Employee::orderBy('id','DESC')->get();
        return view('employee.employee', compact('data'));
    }
    public function employee_new()
    {
       $data = Counsel::where('counsel_type','Staff')
        ->orwhere('counsel_type','Internal')
       ->get();

       return view('employee.employee_new', compact('data'));
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
    public function update(Request $request, $id)
    {

        $brand = Employee::find($id);

        $data = $request->all();

        if ($request->hasfile('employee_image')) {
                if ($brand->employee_image != null) {
                    $file_path = 'files/employee_image/'.$brand->employee_image;
                    if(file_exists($file_path)){
                        unlink($file_path);
                    }
                }

                $file = $request->file('employee_image');
                $img_ext = $file->getClientOriginalExtension();
                $img_name = time().rand(111,99999).'.'.$img_ext;
                $image_path = 'files/employee_image/'.$img_name;
                Image::make($file)->resize(982,500)->save($image_path);
                $data['employee_image'] = $img_name;
        }else{
            $data['employee_image'] = $brand->employee_image;
        }

        $brand->fill($data)->save();

        session()->flash('success', 'Data Updated Successfully.');
        return redirect()->route('employee.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        Employee::find($id)->delete();
        return redirect()->route('employee.index')
            ->with('success','Employee deleted successfully');
    }
}
