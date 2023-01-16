<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\models\SetupCaseTypes;
use App\models\SetupCourt;
use App\models\SetupCaseCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ApilabourCaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function labour_cases()
    {
        $division = DB::table("setup_divisions")->get();
        $case_types = SetupCaseTypes::where('delete_status', 0)->get();
        $court = SetupCourt::where('delete_status', 0)->get();
        $case_category = SetupCaseCategory::where(['case_type' => 'Labour Cases', 'delete_status' => 0])->get();

        return response()->json([

            "status"=>200,
            "division"=>$division,
            "case_types"=>$case_types,
            "case_category"=>$case_category,

            "message"=> "data added succesfully"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
}
