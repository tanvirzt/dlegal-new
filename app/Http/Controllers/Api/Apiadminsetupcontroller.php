<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\models\SetupDesignation;
use App\models\SetupCaseStatus;
use App\Models\SetupCaseTypes;
use App\Models\SetupPropertyType;
use App\models\SetupComplianceCategory;
use Illuminate\Http\Request;

class Apiadminsetupcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function designation()
    {
        $data =  SetupDesignation::where('delete_status',0)->get();
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
    public function add_degignation(Request $request)
    {
        $data = new  SetupDesignation();
        $data->designation_name= $request->designation_name;
      
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
        $data = SetupDesignation::find($id);
        $data->designation_name = $request->designation_name;
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
    public function delete_designation($id)
    {
        $data = SetupDesignation::find($id);
        $data->delete_status=1;
        $data->update();
        return response()->json([
            "status" => 200,
            "-test_data" => $data,
            "message" => " data deleted successfully"
        ]);
    }
    public function case_status()
    {
        $data = SetupCaseStatus::where('delete_status',0)->get();
        return response()->json([
            "status" => 200,
            "test_data" => $data,
            "message" => "data get successfully"
        ]);
}
public function add_case_status(Request $request)
    {
        $data = new  SetupCaseStatus();
        $data->case_status_name= $request->case_status_name;
      
        $data->save();
        return response()->json([
            "status" => 200,
            "test_data" => $data,
            "message" => " data added successfully"
        ]);
}
public function update_case_status(Request $request, $id)
{
    $data = SetupCaseStatus::find($id);
    $data->case_status_name = $request->case_status_name;
    $data->update();
    return response()->json([
        "status" => 200,
        "-test_data" => $data,
        "message" => " data updated successfully"
    ]);
}
public function delete_case_status($id)
{
    $data = SetupCaseStatus::find($id);
    $data->delete_status=1;
    $data->update();
    return response()->json([
        "status" => 200,
        "-test_data" => $data,
        "message" => " data deleted successfully"
    ]);
}
public function case_types()
{
    $data = SetupCaseTypes::where('delete_status',0)->get();
    return response()->json([
        "status" => 200,
        "test_data" => $data,
        "message" => "data get successfully"
    ]);
}
public function add_case_types(Request $request)
    {
        $data = new  SetupCaseTypes();
        $data->case_types_name= $request->case_types_name;
      
        $data->save();
        return response()->json([
            "status" => 200,
            "test_data" => $data,
            "message" => " data added successfully"
        ]);
}
public function update_case_types(Request $request, $id)
{
    $data = SetupCaseTypes::find($id);
    $data->case_types_name = $request->case_types_name;
    $data->update();
    return response()->json([
        "status" => 200,
        "-test_data" => $data,
        "message" => " data updated successfully"
    ]);
}
public function delete_case_types($id)
{
    $data = SetupCaseTypes::find($id);
    $data->delete_status=1;
    $data->update();
    return response()->json([
        "status" => 200,
        "-test_data" => $data,
        "message" => " data deleted successfully"
    ]);
}
public function property_type()
{
    $data = SetupPropertyType::where('delete_status',0)->get();
    return response()->json([
        "status" => 200,
        "test_data" => $data,
        "message" => "data get successfully"
    ]);
}
public function add_property_type(Request $request)
    {
        $data = new  SetupPropertyType();
        $data->property_type_name= $request->property_type_name;
      
        $data->save();
        return response()->json([
            "status" => 200,
            "test_data" => $data,
            "message" => " data added successfully"
        ]);
}
public function update_property_types(Request $request, $id)
{
    $data = SetupPropertyType::find($id);
    $data->property_type_name = $request->property_type_name;
    $data->update();
    return response()->json([
        "status" => 200,
        "-test_data" => $data,
        "message" => " data updated successfully"
    ]);
}
public function delete_property_types($id)
{
    $data = SetupPropertyType::find($id);
    $data->delete_status=1;
    $data->update();
    return response()->json([
        "status" => 200,
        "-test_data" => $data,
        "message" => " data deleted successfully"
    ]);
}
public function compliance_category()
{
    $data = SetupComplianceCategory::where('delete_status',0)->get();
    return response()->json([
        "status" => 200,
        "test_data" => $data,
        "message" => "data get successfully"
    ]);
}
public function add_compliance_category(Request $request)
    {
        $data = new  SetupComplianceCategory();
        $data->compliance_category_name= $request->compliance_category_name;
      
        $data->save();
        return response()->json([
            "status" => 200,
            "test_data" => $data,
            "message" => " data added successfully"
        ]);
}
}