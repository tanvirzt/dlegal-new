<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CivilCases;

class LandInfoController extends Controller
{
    //

    public function land_information()
    {
        $data = CivilCases::all();
        return view('property_management.land_information.land_information',compact('data'));
    }

    public function add_land_information()
    {
        // dd('asdfasdfasdf');
        return view('property_management.land_information.add_land_information');
    }

}
