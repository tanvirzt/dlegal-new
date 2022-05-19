<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CriminalCase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LitigationCalenderController extends Controller
{
    //

    public function litigation_calender_list()
    {
// dd('adsfsdf');

        $criminal_cases_count = CriminalCase::where('delete_status',0)->count();
        $criminal_cases = DB::table('criminal_cases')
        // ->leftJoin('criminal_cases_case_steps', 'criminal_cases.id', 'criminal_cases_case_steps.criminal_case_id')
        ->leftJoin('setup_next_date_reasons', 'criminal_cases.next_date_fixed_id', 'setup_next_date_reasons.id')
        ->leftJoin('setup_case_statuses', 'criminal_cases.case_status_id', 'setup_case_statuses.id')
        ->leftJoin('setup_case_titles', 'criminal_cases.case_infos_case_title_id', 'setup_case_titles.id')
        ->leftJoin('setup_courts', 'criminal_cases.name_of_the_court_id', '=', 'setup_courts.id')
        ->leftJoin('setup_districts', 'criminal_cases.case_infos_district_id', '=', 'setup_districts.id')
        ->leftJoin('setup_districts as accused_district', 'criminal_cases.client_district_id', '=', 'accused_district.id')
        ->leftJoin('setup_case_types', 'criminal_cases.case_type_id', '=', 'setup_case_types.id')
        ->leftJoin('setup_external_councils', 'criminal_cases.lawyer_advocate_id', '=', 'setup_external_councils.id')
       ->leftJoin('setup_case_titles as case_infos_title', 'criminal_cases.case_infos_sub_seq_case_title_id', '=', 'case_infos_title.id')
        ->select('criminal_cases.*',
        // 'criminal_cases_case_steps.another_claim',
        'setup_case_statuses.case_status_name',
        'setup_case_titles.case_title_name', 
        'setup_next_date_reasons.next_date_reason_name', 
        'setup_courts.court_name', 
        'setup_districts.district_name',
        'accused_district.district_name as accused_district_name', 
        'setup_case_types.case_types_name',
        'setup_external_councils.first_name',
        'setup_external_councils.middle_name',
        'setup_external_councils.last_name',
        'case_infos_title.case_title_name as sub_seq_case_title_name')
        ->orderBy('criminal_cases.received_date','asc')
        ->where('criminal_cases.delete_status',0)
        ->get();

    //    $criminal_cases = json_decode(json_encode($criminal_cases));
    //    echo "<pre>";print_r($criminal_cases);die();


        return view('litigation_management.litigation_calender.litigation_calender_list',compact('criminal_cases','criminal_cases_count'));
    }

    public function litigation_calender_short()
    {
        return view('litigation_management.litigation_calender.litigation_calender_short');
    }

}
