<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SetupInternalCouncil;
use Illuminate\Http\Request;

class ApiAdmininternalcouncilcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = SetupInternalCouncil::where('delete_status',0)->get();
        return response()->json([
            "status" => 200,
            "test_data" => $data,
            "message" => "data get successfully"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        $data = new  SetupInternalCouncil();
        $data->first_name= $request->first_name;
        $data->middle_name= $request->middle_name;
        $data->last_name= $request->last_name;
        $data->email= $request->email;
        $data->work_phone= $request->work_phone;
        $data->save();
        return response()->json([
            "status" => 200,
            "test_data" => $data,
            "message" => " data added successfully"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $data = SetupInternalCouncil::find($id);
        $data = new  SetupInternalCouncil();
        $data->first_name= $request->first_name;
        $data->middle_name= $request->middle_name;
        $data->last_name= $request->last_name;
        $data->email= $request->email;
        $data->work_phone= $request->work_phone;
        
        $data->update();
        return response()->json([
            "status" => 200,
            "-test_data" => $data,
            "message" => " data updated successfully"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = SetupInternalCouncil::find($id);
        $data->delete_status=1;
        $data->update();
        return response()->json([
            "status" => 200,
            "-test_data" => $data,
            "message" => " data deleted successfully"
        ]);
    }
}
