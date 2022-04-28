<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CriminalCase;
use Illuminate\Http\Request;

class LitigationCalenderController extends Controller
{
    //

    public function litigation_calender_list()
    {
        $criminal_cases = CriminalCase::where('delete_status',0)->get();
        return view('litigation_management.litigation_calender.litigation_calender_list',compact('criminal_cases'));
    }

    public function litigation_calender_short()
    {
        return view('litigation_management.litigation_calender.litigation_calender_short');
    }

}
