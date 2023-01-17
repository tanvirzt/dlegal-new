<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\LandInformation;
use App\Models\SetupDistrict;
use App\Models\SetupPropertyType;
use App\Models\SetupSellerBuyer;
use App\Models\SetupThana;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ApiLandInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function land_information()
    {
        $data = DB::table('land_information')
        ->leftJoin('setup_property_types','land_information.property_type_id','=','setup_property_types.id')
        ->leftJoin('setup_districts','land_information.district_id','=','setup_districts.id')
        ->leftJoin('setup_thanas','land_information.thana_id','=','setup_thanas.id')
        ->leftJoin('setup_seller_buyers','land_information.seller_id','=','setup_seller_buyers.id')
        ->leftJoin('setup_seller_buyers as buyers','land_information.buyer_id','=','buyers.id')
        ->select('land_information.*','setup_property_types.property_type_name','setup_districts.district_name','setup_thanas.thana_name','setup_seller_buyers.seller_buyer_name as seller_name','buyers.seller_buyer_name as buyer_name')
        ->get();
        $property_type = SetupPropertyType::where('delete_status',0)->get();
        $district = SetupDistrict::where('delete_status',0)->get();
        $seller = SetupSellerBuyer::where(['seller_or_buyer' => 'Seller' ,'delete_status' => 0])->get();
        $buyer = SetupSellerBuyer::where(['seller_or_buyer' => 'Buyer' ,'delete_status' => 0])->get();

        return response()->json([
            "status"=>200,
            "data"=>$data,
            "property_type"=>$property_type,
            "district"=>$district,
            "seller"=>$seller,
            "buyer"=>$buyer,

            "message"=>"data get successfully"
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_land_information()
    {
        $property_type = SetupPropertyType::where('delete_status',0)->get();
        $district = SetupDistrict::where('delete_status',0)->get();
        $seller = SetupSellerBuyer::where(['seller_or_buyer' => 'Seller' ,'delete_status' => 0])->get();
        $buyer = SetupSellerBuyer::where(['seller_or_buyer' => 'Buyer' ,'delete_status' => 0])->get();
        return response()->json([
            "status"=>200,
            "property_type"=>$property_type,
            "distrct"=>$district,
            "seller"=>$seller,
            "buyer"=>$buyer,

            "message"=>"data added successfully"
        ]);
        
    }

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
    public function edit_land_information($id)
    {
        $property_type = SetupPropertyType::where('delete_status',0)->get();
        $district = SetupDistrict::where('delete_status',0)->get();
        $seller = SetupSellerBuyer::where(['seller_or_buyer' => 'Seller' ,'delete_status' => 0])->get();
        $buyer = SetupSellerBuyer::where(['seller_or_buyer' => 'Buyer' ,'delete_status' => 0])->get();

        $data = LandInformation::find($id);
        $existing_thana = SetupThana::where(['district_id' => $data->district_id, 'delete_status' => 0])->get();
        return response()->json([
            "status"=>200,
            "property_type"=>$property_type,
            "district"=>$district,
            "seller"=>$seller,
            "buyer"=>$buyer,
            "data"=>$data,
            "existing_thana"=>$existing_thana,

            "message"=>"data edited successfully"
        ]);

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
