<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SetupPropertyType;
use App\Models\SetupDistrict;
use App\Models\SetupSellerBuyer;

class FlatInfoController extends Controller
{
    //

    public function flat_information()
    {
        // dd('asdfasdf asdfasdf');
        $property_type = SetupPropertyType::where('delete_status',0)->get();
        $district = SetupDistrict::where('delete_status',0)->get();
        $seller = SetupSellerBuyer::where(['seller_or_buyer' => 'Seller' ,'delete_status' => 0])->get();
        $buyer = SetupSellerBuyer::where(['seller_or_buyer' => 'Buyer' ,'delete_status' => 0])->get();

        $data = SetupPropertyType::all();

        return view('property_management.flat_information.flat_information',compact('property_type','district','seller','buyer','data'));

    }

    public function add_flat_information()
    {
        $property_type = SetupPropertyType::where('delete_status',0)->get();
        $district = SetupDistrict::where('delete_status',0)->get();
        $seller = SetupSellerBuyer::where(['seller_or_buyer' => 'Seller' ,'delete_status' => 0])->get();
        $buyer = SetupSellerBuyer::where(['seller_or_buyer' => 'Buyer' ,'delete_status' => 0])->get();
       
        return view('property_management.flat_information.add_flat_information',compact('property_type','district','seller','buyer'));
    }

}
