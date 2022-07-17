<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CriminalCase;
use App\Models\SetupClientName;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\SetupCaseTypes;
use App\Models\SetupCourt;
use App\Models\SetupCaseCategory;
use App\Models\SetupComplainant;
use App\Models\SetupMatter;
use App\Models\SetupClient;
use App\Models\SetupExternalCouncil;
use App\Models\SetupCaseStatus;
use App\Models\SetupNextDateReason;

class LitigationCalenderController extends Controller
{
    //

    public function litigation_calender_list()
    {
// dd('adsfsdf');
        $criminal_cases_count = DB::table('criminal_cases')->distinct()->orderBy('next_date', 'asc')->where('delete_status', 0)->count(['next_date']);
        $criminal_cases = DB::table('criminal_cases')->distinct()->orderBy('next_date', 'asc')->where(['delete_status' => 0])->where('next_date', '>=', date('Y-m-d'))->get(['next_date']);
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


        return view('litigation_management.litigation_calender.litigation_calender_list', compact('criminal_cases', 'criminal_cases_count'));
    }

    public function litigation_calender_short()
    {

        $date = date('F, Y');
        $month = date('Y-m');

        $start = Carbon::parse($month)->startOfMonth();
        $end = Carbon::parse($month)->endOfMonth();
// dd($end);
        $dates = [];
        while ($start->lte($end)) {
            $dates[] = $start->copy();
            $start->addDay();
        }

        return view('litigation_management.litigation_calender.litigation_calender_short', compact('dates','date'));
    }

    public function search_litigation_calendar(Request $request)
    {
// dd($request->all());
        if ($request->from_date != "dd/mm/yyyy" && $request->to_date != "dd/mm/yyyy") {

            $from_date_explode = explode('/', $request->from_date);
            $from_date_implode = implode('-', $from_date_explode);
            $from_date = date('Y-m-d', strtotime($from_date_implode));

            $to_date_explode = explode('/', $request->to_date);
            $to_date_implode = implode('-', $to_date_explode);
            $to_date = date('Y-m-d', strtotime($to_date_implode));

            $criminal_cases_count = DB::table('criminal_cases')->distinct()->orderBy('next_date', 'asc')->where('delete_status', 0)->count(['next_date']);

            $criminal_cases = DB::table('criminal_cases')
                ->distinct()->orderBy('next_date', 'asc')
                ->where(['delete_status' => 0])
                // ->where('next_date','>=',date('Y-m-d'))
                ->where('next_date', '>=', $from_date)
                ->where('next_date', '<=', $to_date)->get(['next_date']);

            return view('litigation_management.litigation_calender.litigation_calender_list', compact('criminal_cases', 'criminal_cases_count'));

        } else {

            $criminal_cases_count = DB::table('criminal_cases')->distinct()->orderBy('next_date', 'asc')->where('delete_status', 0)->count(['next_date']);
            $criminal_cases = DB::table('criminal_cases')->distinct()->orderBy('next_date', 'asc')->where(['delete_status' => 0])->where('next_date', '>=', date('Y-m-d'))->get(['next_date']);
            return view('litigation_management.litigation_calender.litigation_calender_list', compact('criminal_cases', 'criminal_cases_count'));

        }

    }

    public function search_case_pages()
    {

        $division = DB::table("setup_divisions")->get();
        $case_types = SetupCaseTypes::where('delete_status', 0)->get();
        $court = SetupCourt::where(['case_class_id' => 'Criminal', 'delete_status' => 0])->get();
        $case_category = SetupCaseCategory::where(['case_type' => 'Criminal', 'delete_status' => 0])->get();
        $complainant = SetupComplainant::where('delete_status', 0)->orderBy('complainant_name', 'asc')->get();
        $matter = SetupMatter::where('delete_status', 0)->orderBy('matter_name', 'asc')->get();
        $client = SetupClient::where('delete_status', 0)->orderBy('client_name','asc')->get();
        $client_name = SetupClientName::where('delete_status', 0)->get();
        $external_council = SetupExternalCouncil::where('delete_status', 0)->get();
        $case_status = SetupCaseStatus::where('delete_status', 0)->orderBy('case_status_name','asc')->get();
        $next_date_reason = SetupNextDateReason::where('delete_status', 0)->get();


        return view('litigation_management.litigation_search.cases', compact('next_date_reason','case_status','external_council','division', 'case_types', 'court', 'case_category', 'complainant', 'matter','client','client_name'));
    }

    public function search_cases(Request $request)
    {
    //    dd($request->all());
        $division = DB::table("setup_divisions")->get();
        $case_types = SetupCaseTypes::where('delete_status', 0)->get();
        $court = SetupCourt::where(['case_class_id' => 'Criminal', 'delete_status' => 0])->get();
        $case_category = SetupCaseCategory::where(['case_type' => 'Criminal', 'delete_status' => 0])->get();
        $complainant = SetupComplainant::where('delete_status', 0)->orderBy('complainant_name', 'asc')->get();
        $matter = SetupMatter::where('delete_status', 0)->orderBy('matter_name', 'asc')->get();
        $client = SetupClient::where('delete_status', 0)->orderBy('client_name','asc')->get();
        $client_name = SetupClientName::where('delete_status', 0)->get();
        $external_council = SetupExternalCouncil::where('delete_status', 0)->get();
        $case_status = SetupCaseStatus::where('delete_status', 0)->orderBy('case_status_name','asc')->get();
        $next_date_reason = SetupNextDateReason::where('delete_status', 0)->get();



        if ($request->received_date != "dd/mm/yyyy") {
            $received_date_explode = explode('/', $request->received_date);
            $received_date_implode = implode('-', $received_date_explode);
            $received_date = date('Y-m-d', strtotime($received_date_implode));
        } else if ($request->received_date == "dd/mm/yyyy") {
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


        switch ($request->isMethod('post')) {
            case $request->created_case_id:
                $query2 = $query->where('criminal_cases.created_case_id', 'LIKE', "%{$request->created_case_id}%");
                break;
            case $request->case_infos_case_no:
                $query2 = $query->where('criminal_cases.case_infos_case_no', 'LIKE', "%{$request->case_infos_case_no}%");
                break;
            case $request->name_of_the_court_id:
                $query2 = $query->where('criminal_cases.name_of_the_court_id', $request->name_of_the_court_id);
                break;
            case $request->case_infos_complainant_informant_name:
                $query2 = $query->where('criminal_cases.case_infos_complainant_informant_name', 'LIKE', "%{$request->case_infos_complainant_informant_name}%");
                break;
            case $request->case_infos_accused_name:
                $query2 = $query->where('criminal_cases.case_infos_accused_name', 'LIKE', "%{$request->case_infos_accused_name}%");
                break;
            case $request->case_type_id:
                $query2 = $query->where('criminal_cases.case_type_id', $request->case_type_id);
                break;
            case $request->matter_id:
                $query2 = $query->where('criminal_cases.matter_id', $request->matter_id);
                break;
            case $request->case_category_id:
                $query2 = $query->where('criminal_cases.case_category_id', $request->case_category_id);
                break;
            case $request->case_subcategory_id:
                $query2 = $query->where('criminal_cases.case_subcategory_id', 'LIKE', "%{$request->case_subcategory_id}%");
                break;
            case $request->client_division_id:
                $query2 = $query->where('criminal_cases.client_division_id', $request->client_division_id);
                break;
            case $request->client_divisoin_write:
                $query2 = $query->where('criminal_cases.client_divisoin_write', 'LIKE', "%{$request->client_divisoin_write}%");
                break;
            case $request->client_district_id:
                $query2 = $query->where('criminal_cases.client_district_id', $request->client_district_id);
                break;
            case $request->client_district_write:
                $query2 = $query->where('criminal_cases.client_district_write', 'LIKE', "%{$request->client_district_write}%");
                break;
            case $request->client_thana_id:
                $query2 = $query->where('criminal_cases.client_thana_id', $request->client_thana_id);
                break;
            case $request->client_thana_write:
                $query2 = $query->where('criminal_cases.client_thana_write', 'LIKE', "%{$request->client_thana_write}%");
                break;
            case $request->client_id:
                $query2 = $query->where('criminal_cases.case_infos_complainant_informant_name', 'LIKE', "%{$request->client_id}%")
                                ->orWhere('criminal_cases.case_infos_accused_name', 'like', "%{$request->client_id}%");
                break;
            case $request->client_name_write:
                $query2 = $query->where('criminal_cases.case_infos_complainant_informant_name', 'LIKE', "%{$request->client_name_write}%")
                                ->orWhere('criminal_cases.case_infos_accused_name', 'like', "%{$request->client_name_write}%");
                break;
            case $request->lawyer_advocate_id:
                $query2 = $query->where('criminal_cases.lawyer_advocate_id', $request->lawyer_advocate_id);
                break;
            case $request->case_status_id:
                $query2 = $query->where('criminal_cases.case_status_id', $request->case_status_id);
                break;
            case $request->next_date_fixed_id:
                $query2 = $query->where('criminal_cases.next_date_fixed_id', $request->next_date_fixed_id);
                break;
            default:
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
            ->where('criminal_cases.delete_status',0)
            ->get();
// dd($data);
        return view('litigation_management.litigation_search.cases', compact('next_date_reason','case_status','external_council','data', 'division', 'case_types', 'court', 'case_category', 'complainant', 'matter','client','client_name'));
    }

    public function search_litigation_calendar_short(Request $request)
    {

        // dd($request->from_date);

        $date = date('F, Y',strtotime($request->from_date));
        // dd($date);


        $search_month = explode('-', $request->from_date);



        // dd($search_month[1]);

        // dd($search_month[0].'-'.$search_month[1]);

        $month = $search_month[0].'-'.$search_month[1];
// dd($month);
        $start = Carbon::parse($month)->startOfMonth();
        $end = Carbon::parse($month)->endOfMonth();
// dd($end);
        $dates = [];
        while ($start->lte($end)) {
            $dates[] = $start->copy();
            $start->addDay();
        }

        return view('litigation_management.litigation_calender.litigation_calender_short', compact('dates','date'));
    }

public function calendar_short_next_previous(Request $request)
{

    // dd($request->all());

    $time = strtotime($request->from_date);

    if ($request->arrow_up) {

// dd('arrow_up');
        $date = date('F, Y',strtotime("+1 month",$time));

    } else {

// dd('arrow_down');
        $date = date('F, Y',strtotime(' - 1 months',$time));
        // dd($date);
    }
// dd($date);    
    $search_month = explode('-', $request->from_date);

    $month = $search_month[0].'-'.($search_month[1]);
    $start = Carbon::parse($month)->startOfMonth();
    $end = Carbon::parse($month)->endOfMonth();
    $dates = [];
    while ($start->lte($end)) {
        $dates[] = $start->copy();
        $start->addDay();
    }

    return view('litigation_management.litigation_calender.litigation_calender_short', compact('dates','date'));

}


}
