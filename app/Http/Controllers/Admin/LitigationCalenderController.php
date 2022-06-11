<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CriminalCase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\SetupCaseTypes;
use App\Models\SetupCourt;
use App\Models\SetupCaseCategory;

class LitigationCalenderController extends Controller
{
    //

    public function litigation_calender_list()
    {
// dd('adsfsdf');
        $criminal_cases_count = DB::table('criminal_cases')->distinct()->orderBy('next_date','asc')->where('delete_status',0)->count(['next_date']);
        $criminal_cases = DB::table('criminal_cases')->distinct()->orderBy('next_date','asc')->where(['delete_status' => 0])->where('next_date','>=',date('Y-m-d'))->get(['next_date']);
// dd($criminal_cases);
        // dd($data);

    //     $criminal_cases = DB::table('criminal_cases')
    //     ->leftJoin('setup_next_date_reasons', 'criminal_cases.next_date_fixed_id', 'setup_next_date_reasons.id')
    //     ->leftJoin('setup_case_statuses', 'criminal_cases.case_status_id', 'setup_case_statuses.id')
    //     ->leftJoin('setup_case_titles', 'criminal_cases.case_infos_case_title_id', 'setup_case_titles.id')
    //     ->leftJoin('setup_courts', 'criminal_cases.name_of_the_court_id', '=', 'setup_courts.id')
    //     ->leftJoin('setup_districts', 'criminal_cases.case_infos_district_id', '=', 'setup_districts.id')
    //     ->leftJoin('setup_districts as accused_district', 'criminal_cases.client_district_id', '=', 'accused_district.id')
    //     ->leftJoin('setup_case_types', 'criminal_cases.case_type_id', '=', 'setup_case_types.id')
    //     ->leftJoin('setup_external_councils', 'criminal_cases.lawyer_advocate_id', '=', 'setup_external_councils.id')
    //    ->leftJoin('setup_case_titles as case_infos_title', 'criminal_cases.case_infos_sub_seq_case_title_id', '=', 'case_infos_title.id')
    //     ->select('criminal_cases.*',
    //     'setup_case_statuses.case_status_name',
    //     'setup_case_titles.case_title_name', 
    //     'setup_next_date_reasons.next_date_reason_name', 
    //     'setup_courts.court_name', 
    //     'setup_districts.district_name',
    //     'accused_district.district_name as accused_district_name', 
    //     'setup_case_types.case_types_name',
    //     'setup_external_councils.first_name',
    //     'setup_external_councils.middle_name',
    //     'setup_external_councils.last_name',
    //     'case_infos_title.case_title_name as sub_seq_case_title_name')
    //     ->orderBy('criminal_cases.received_date','asc')
    //     ->where('criminal_cases.delete_status',0)
    //     ->distinct('criminal_cases.next_date')
    //     ->get();

    //    $criminal_cases = json_decode(json_encode($criminal_cases));
    //    echo "<pre>";print_r($criminal_cases);die();


        return view('litigation_management.litigation_calender.litigation_calender_list',compact('criminal_cases','criminal_cases_count'));
    }

    public function litigation_calender_short()
    {
        return view('litigation_management.litigation_calender.litigation_calender_short');
    }

    public function search_litigation_calendar(Request $request)
    {
// dd($request->all());
        if ($request->from_date != "dd/mm/yyyy" && $request->to_date != "dd/mm/yyyy") {

            $from_date_explode = explode('/', $request->from_date);
            $from_date_implode = implode('-',$from_date_explode);
            $from_date = date('Y-m-d', strtotime($from_date_implode));

            $to_date_explode = explode('/', $request->to_date);
            $to_date_implode = implode('-',$to_date_explode);
            $to_date = date('Y-m-d', strtotime($to_date_implode));

            $criminal_cases_count = DB::table('criminal_cases')->distinct()->orderBy('next_date','asc')->where('delete_status',0)->count(['next_date']);
            
            $criminal_cases = DB::table('criminal_cases')
                                ->distinct()->orderBy('next_date','asc')
                                ->where(['delete_status' => 0])
                                // ->where('next_date','>=',date('Y-m-d'))
                                ->where('next_date', '>=', $from_date)
                                ->where('next_date', '<=', $to_date)->get(['next_date']);

            return view('litigation_management.litigation_calender.litigation_calender_list',compact('criminal_cases','criminal_cases_count'));

        } else {

            $criminal_cases_count = DB::table('criminal_cases')->distinct()->orderBy('next_date','asc')->where('delete_status',0)->count(['next_date']);
            $criminal_cases = DB::table('criminal_cases')->distinct()->orderBy('next_date','asc')->where(['delete_status' => 0])->where('next_date','>=',date('Y-m-d'))->get(['next_date']);
            return view('litigation_management.litigation_calender.litigation_calender_list',compact('criminal_cases','criminal_cases_count'));

        }
        
    }

    public function search_case_pages()
    {

        $division = DB::table("setup_divisions")->get();
        $case_types = SetupCaseTypes::where('delete_status', 0)->get();
        $court = SetupCourt::where(['case_type' => 'Criminal Cases', 'delete_status' => 0])->get();
        $case_category = SetupCaseCategory::where(['case_type' => 'Criminal Cases', 'delete_status' => 0])->get();

        return view('litigation_management.litigation_search.cases',compact('division','case_types','court','case_category'));
    }

    public function search_cases(Request $request)
    {
// dd($request->all());
        $division = DB::table("setup_divisions")->get();
        $case_types = SetupCaseTypes::where('delete_status', 0)->get();
        $court = SetupCourt::where(['case_type' => 'Criminal Cases', 'delete_status' => 0])->get();
        $case_category = SetupCaseCategory::where(['case_type' => 'Criminal Cases', 'delete_status' => 0])->get();


        if ($request->received_date != "dd/mm/yyyy") {
            $received_date_explode = explode('/', $request->received_date);
            $received_date_implode = implode('-',$received_date_explode);
            $received_date = date('Y-m-d', strtotime($received_date_implode));
        } else if($request->received_date == "dd/mm/yyyy") {
            $received_date = null;
        }
        

        // dd($received_date);
        $query = DB::table('criminal_cases')
            ->leftJoin('setup_next_date_reasons', 'criminal_cases.next_date_fixed_id', 'setup_next_date_reasons.id')
            ->leftJoin('setup_case_statuses', 'criminal_cases.case_status_id', 'setup_case_statuses.id')
            ->leftJoin('setup_case_titles', 'criminal_cases.case_infos_case_title_id', 'setup_case_titles.id')
            ->leftJoin('setup_courts', 'criminal_cases.name_of_the_court_id', '=', 'setup_courts.id')
            ->leftJoin('setup_districts', 'criminal_cases.case_infos_district_id', '=', 'setup_districts.id')
            ->leftJoin('setup_districts as accused_district', 'criminal_cases.client_district_id', '=', 'accused_district.id')
            ->leftJoin('setup_case_types', 'criminal_cases.case_type_id', '=', 'setup_case_types.id')
            ->leftJoin('setup_external_councils', 'criminal_cases.lawyer_advocate_id', '=', 'setup_external_councils.id')
            ->leftJoin('setup_case_titles as case_infos_title', 'criminal_cases.case_infos_sub_seq_case_title_id', '=', 'case_infos_title.id');

        if ($request->case_infos_case_no && $request->received_date && $request->name_of_the_court_id) {

            $query2 = $query->where(['criminal_cases.case_infos_case_no' => $request->case_infos_case_no, 'criminal_cases.received_date' => $received_date, 'criminal_cases.name_of_the_court_id' => $request->name_of_the_court_id]);
dd('1st');
        } else if ($request->case_infos_case_no && $request->received_date && $request->name_of_the_court_id == null) {
            // dd('2nd');

            $query2 = $query->where(['criminal_cases.case_infos_case_no' => $request->case_infos_case_no]);

        } else if ($request->case_infos_case_no && $request->received_date == null && $request->name_of_the_court_id) {
            dd('3rd');

            $query2 = $query->where(['criminal_cases.case_infos_case_no' => $request->case_infos_case_no, 'criminal_cases.name_of_the_court_id' => $request->name_of_the_court_id]);

        } else if ($request->case_infos_case_no == null && $request->received_date != "dd/mm/yyyy" && $request->name_of_the_court_id) {
            dd('4rd');

            $query2 = $query->where(['criminal_cases.received_date' => $received_date, 'criminal_cases.name_of_the_court_id' => $request->name_of_the_court_id]);

        } else if ($request->case_infos_case_no && $request->received_date == null && $request->name_of_the_court_id == null) {
            dd('5rd');

            $query2 = $query->where(['criminal_cases.case_infos_case_no' => $request->case_infos_case_no]);
            // dd('6rd');

        } else if ($request->case_infos_case_no == null && $received_date && $request->name_of_the_court_id == null) {
            // dd('7rd');

            // dd($received_date);
            $query2 = $query->where('criminal_cases.received_date', $received_date);

        } else if ($request->case_infos_case_no == null && $request->received_date == 'dd/mm/yyyy' && $request->name_of_the_court_id) {
// dd($request->all());
// dd('8rd');
// dd($request->all());
            $query2 = $query->where('criminal_cases.name_of_the_court_id', $request->name_of_the_court_id);

        } else if ($request->case_infos_case_no == null && $received_date == null && $request->name_of_the_court_id == null && $request->case_category_id && $request->case_subcategory_id) {
            // dd('9rd');

            $query2 = $query->where(['criminal_cases.case_category_id' => $request->case_category_id, 'criminal_cases.case_subcategory_id' => $request->case_subcategory_id]);

        } else if ($request->case_infos_case_no == null && $received_date == null && $request->name_of_the_court_id == null && $request->case_category_id && $request->case_subcategory_id == null) {
            // dd('10rd');

            $query2 = $query->where('criminal_cases.case_category_id', $request->case_category_id);

        } else {
            dd('11rd');

            $query2 = $query;

        }
        
        $data = $query2->select('criminal_cases.*',
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
        ->get();
// dd($data);
        return view('litigation_management.litigation_search.cases',compact('data','division','case_types','court','case_category'));
    }


}
