<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\models\CivilCases;
use App\models\CriminalCase;
use App\models\LabourCase;
use App\models\QuassiJudicialCase;
use App\models\SupremeCourtCase;
use App\models\HighCourtCase;
use App\models\AppellateCourtCase;
use App\models\LandInformation;
use App\models\FlatInformation;
use App\models\SetupExternalCouncil;
use App\models\SetupInternalCouncil;
use App\models\SetupExternalCouncilAssociate;
use App\models\ExternalFile;
use Illuminate\Http\Request;

class ApiDocManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function document_management()
    { $civil_case = CivilCases::with('civil_cases_files')->where('delete_status',0)->get();
        $criminal_case = CriminalCase::with('criminal_cases_files')->where('delete_status',0)->get();
        $labour_case = LabourCase::with('labour_cases_files')->where('delete_status',0)->get();
        $quassi_judicial_case = QuassiJudicialCase::with('quassi_judicial_cases_files')->where('delete_status',0)->get();
        $supreme_court_case = SupremeCourtCase::with('supreme_court_cases_files')->where('delete_status',0)->get();
        $high_court_case = HighCourtCase::with('high_court_cases_files')->where('delete_status',0)->get();
        $appellate_court_case = AppellateCourtCase::with('appellate_court_cases_files')->where('delete_status',0)->get();


        $land_information = LandInformation::with('land_information_files')->where('delete_status',0)->get();
        $flat_information = FlatInformation::with('flat_information_files')->where('delete_status',0)->get();

        $external_council = SetupExternalCouncil::with('external_council_files')->where('delete_status',0)->get();
        $internal_council = SetupInternalCouncil::with('internal_council_files')->where('delete_status',0)->get();
        $external_council_associates = SetupExternalCouncilAssociate::with('external_council_associates_files')->where('delete_status',0)->get();
        $external_document = ExternalFile::where('delete_status',0)->get();

        return response()->json([
            "status"=>200,
            "external_council"=>$external_council,
            "external_council_associates"=>$external_council_associates,
            "internal_council"=>$internal_council,
            "civil_case"=>$civil_case,
            "criminal_case"=>$criminal_case,
            "labour_case"=>$labour_case,
            "internal_council"=>$internal_council,
            "quassi_judicial_case"=>$quassi_judicial_case,
            "supreme_court_case"=>$supreme_court_case,
            "high_court_case"=>$high_court_case,
            "appellate_court_case"=>$appellate_court_case,
            "land_information"=>$land_information,
            "flat_information"=>$flat_information,
            "external_document"=>$external_document,

            "message"=>"data get successfuly"
        ]);


        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
     

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
