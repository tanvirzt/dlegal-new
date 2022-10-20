<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SetupCaseCategory;
use App\Models\SetupCaseStatus;
use App\Models\SetupCaseTypes;
use App\Models\SetupClientCategory;
use App\Models\SetupClientName;
use App\Models\SetupCourt;
use App\Models\SetupExternalCouncil;
use App\Models\SetupGroup;
use App\Models\SetupMatter;
use App\Models\SetupNextDateReason;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function litigation_report(){

        return view('report_management.report_search');
    }

    public function litigation_report_result(Request $request)
    {
    //    dd($request->all());

        if ($request->from_next_date != "dd/mm/yyyy") {
            $from_next_date_explode = explode('/', $request->from_next_date);
            $from_next_date_implode = implode('-', $from_next_date_explode);
            $from_next_date = date('Y-m-d', strtotime($from_next_date_implode));
        } else if ($request->from_next_date == "dd/mm/yyyy") {
            $from_next_date = null;
        }

        if ($request->to_next_date != "dd/mm/yyyy") {
            $to_next_date_explode = explode('/', $request->to_next_date);
            $to_next_date_implode = implode('-', $to_next_date_explode);
            $to_next_date = date('Y-m-d', strtotime($to_next_date_implode));
        } else if ($request->to_next_date == "dd/mm/yyyy") {
            $to_next_date = null;
        }

        $date = new DateTime('now');

        $date->modify('first day of next month');
        $next_month_start = $date->format('Y-m-d');

        $date->modify('last day of this month');
        $next_month_end = $date->format('Y-m-d');

        $next_week_start = date('Y-m-d',
            strtotime("sunday 0 week")
        );

        $next_week_end = date('Y-m-d', strtotime("thursday 1 week"));


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
            ->leftJoin('setup_case_titles as case_infos_title', 'criminal_cases.case_infos_sub_seq_case_title_id', '=', 'case_infos_title.id')
            ->leftJoin('setup_matters', 'criminal_cases.matter_id', '=', 'setup_matters.id');


        switch ($request->isMethod('post')) {
            case $request->report_type == "daily":
                // dd(10);
                $query2 = $query->where('criminal_cases.next_date', date('Y-m-d'));
                break;
            case $request->report_type == 'next_week':
                $query2 = $query->whereBetween('next_date', array($next_week_start, $next_week_end));
                break;
            case $request->report_type == 'next_month':
                $query2 = $query->whereBetween('next_date', array($next_month_start, $next_month_end));
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
            case $request->from_next_date && $request->to_next_date:
                $query2 = $query->where('next_date', '>=', $from_next_date)
                                ->where('next_date', '<=', $to_next_date);
                break;
            case $request->from_next_date:
                $query2 = $query->where('criminal_cases.next_date', $from_next_date);
                break;
            case $request->to_next_date:
                $query2 = $query->where('criminal_cases.next_date', $to_next_date);
                break;
            case $request->client_category_id && $request->client_subcategory_id:
                $query2 = $query->where('criminal_cases.client_category_id', $request->client_category_id)
                                ->where('criminal_cases.client_subcategory_id', $request->client_subcategory_id);
                break;
            case $request->client_category_id:
                $query2 = $query->where('criminal_cases.client_category_id', $request->client_category_id);
                break;
            case $request->client_group_id:
                $query2 = $query->where('criminal_cases.client_group_id', $request->client_group_id);
                break;
            case $request->client_group_write:
                $query2 = $query->where('criminal_cases.client_group_write','like', "%{$request->client_group_write}%");
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
            'case_infos_title.case_title_name as sub_seq_case_title_name',
            'setup_matters.matter_name')
            ->where('criminal_cases.delete_status',0)
            ->get();

        $is_search = 'Searched';


        return view('report_management.report_search', compact('data'));


        // $court = SetupCourt::where(['case_class_id' => 'Criminal', 'delete_status' => 0])->get();
        // $client_name = SetupClientName::where('delete_status', 0)->get();
        // $client_category = SetupClientCategory::where('delete_status', 0)->orderBy('client_category_name', 'asc')->get();
        // $group_name = SetupGroup::get();
        // $case_category = SetupCaseCategory::where(['case_type' => 'Criminal', 'delete_status' => 0])->get();
        // $case_types = SetupCaseTypes::where('delete_status', 0)->get();
        // $matter = SetupMatter::where('delete_status', 0)->orderBy('matter_name', 'asc')->get();
        // $division = DB::table("setup_divisions")->get();
        // $case_status = SetupCaseStatus::where('delete_status', 0)->orderBy('case_status_name', 'asc')->get();
        // $next_date_reason = SetupNextDateReason::where('delete_status', 0)->get();
        // $external_council = SetupExternalCouncil::where('delete_status', 0)->get();

        // return view('report_management.report_search', compact('data', 'court', 'client_name', 'client_category', 'group_name', 'case_category', 'case_types', 'matter','division', 'case_status', 'next_date_reason', 'external_council'));
    }
}
