<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CivilCases;
use App\Models\CriminalCase;
use App\Models\LabourCase;
use App\Models\QuassiJudicialCase;
use App\Models\SupremeCourtCase;
use App\Models\HighCourtCase;
use App\Models\AppellateCourtCase;
use App\Models\LandInformation;
use App\Models\FlatInformation;
use App\Models\SetupExternalCouncil;
use App\Models\SetupInternalCouncil;
use App\Models\SetupExternalCouncilAssociate;

class DocManagementController extends Controller
{
    //

    public function document_management()
    {
// litigation management        
        $civil_case = CivilCases::with('civil_cases_files')->where('delete_status',0)->get();
        $criminal_case = CriminalCase::with('criminal_cases_files')->where('delete_status',0)->get();
        $labour_case = LabourCase::with('labour_cases_files')->where('delete_status',0)->get();
        $quassi_judicial_case = QuassiJudicialCase::with('quassi_judicial_cases_files')->where('delete_status',0)->get();
        $supreme_court_case = SupremeCourtCase::with('supreme_court_cases_files')->where('delete_status',0)->get();
        $high_court_case = HighCourtCase::with('high_court_cases_files')->where('delete_status',0)->get();
        $appellate_court_case = AppellateCourtCase::with('appellate_court_cases_files')->where('delete_status',0)->get();
        
// property management        
        $land_information = LandInformation::with('land_information_files')->where('delete_status',0)->get();
        $flat_information = FlatInformation::with('flat_information_files')->where('delete_status',0)->get();

        $external_council = SetupExternalCouncil::with('external_council_files')->where('delete_status',0)->get();
        $internal_council = SetupInternalCouncil::with('internal_council_files')->where('delete_status',0)->get();
        $external_council_associates = SetupExternalCouncilAssociate::with('external_council_associates_files')->where('delete_status',0)->get();
        
        // $external_council_associates = json_decode(json_encode($external_council_associates));
        // echo "<pre>";print_r($external_council_associates);die;

        return view('document_management.document_management.document_management',compact('external_council','external_council_associates','internal_council','civil_case','criminal_case','labour_case','quassi_judicial_case','supreme_court_case','high_court_case','appellate_court_case','land_information','flat_information'));
    }


    public function add_documents()
    {
        return view('document_management.document_management.add_document');
    }

}
