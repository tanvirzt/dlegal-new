<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CivilCases;

class DocManagementController extends Controller
{
    //

    public function document_management()
    {
        // dd('adfasdf asdf');
        $civil_case = CivilCases::where('delete_status',0)->get();

        // dd($civil_case);
        return view('document_management.document_management.document_management',compact('civil_case'));
    }

}
