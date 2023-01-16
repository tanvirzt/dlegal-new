<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\models\SetupComplianceCategory;
use App\models\RegulatoryCompliance;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ApiRegulatoryComplianceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function regulatory_compliance()
    {
        $compliance_category = SetupComplianceCategory::where('delete_status',0)->get();

        $data = DB::table('regulatory_compliances')
                ->leftJoin('setup_compliance_categories','regulatory_compliances.compliance_category_id','=','setup_compliance_categories.id')
                ->select('regulatory_compliances.*','setup_compliance_categories.compliance_category_name')
                ->get();

                return response()->json([
                    "status"=>200,
                    "data"=>$data,
                    "compliance_category"=>$compliance_category,

                    "message"=>"data get successfully"
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
    public function edit_regulatory_compliance($id)
    {
        $compliance_category = SetupComplianceCategory::where('delete_status',0)->get();
        $data = RegulatoryCompliance::find($id);
        return response()->json([
            "status"=>200,
            "data"=>$data,
            "compliance_category"=>$compliance_category,
            "message"=>"data added successfully"
        ]);
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
