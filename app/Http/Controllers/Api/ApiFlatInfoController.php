<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\models\SetupPropertyType;
use App\models\SetupDistrict;
use App\models\SetupSellerBuyer;
use App\models\SetupFloor;
use App\models\FlatInformation;
use App\models\SetupThana;
use App\models\SetupFlatNumber;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ApiFlatInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function flat_information()
    {
          
          $property_type = SetupPropertyType::where('delete_status',0)->get();
          $district = SetupDistrict::where('delete_status',0)->get();
          $seller = SetupSellerBuyer::where(['seller_or_buyer' => 'Seller' ,'delete_status' => 0])->get();
          $buyer = SetupSellerBuyer::where(['seller_or_buyer' => 'Buyer' ,'delete_status' => 0])->get();
  
          $data = DB::table('flat_information')
                      ->leftJoin('setup_property_types','flat_information.property_type_id','=','setup_property_types.id')
                      ->leftJoin('setup_districts','flat_information.district_id','=','setup_districts.id')
                      ->leftJoin('setup_thanas','flat_information.thana_id','=','setup_thanas.id')
                      ->leftJoin('setup_seller_buyers as seller','flat_information.seller_id','=','seller.id')
                      ->leftJoin('setup_seller_buyers as buyer','flat_information.buyer_id','=','buyer.id')
                      ->select('flat_information.*','setup_property_types.property_type_name','setup_districts.district_name','setup_thanas.thana_name','seller.seller_buyer_name as seller_name','buyer.seller_buyer_name as buyer_name')
                      ->get();
                      return response()->json([
                        "status"=>200,
                        "data"=>$data,
                        "message"=>"data get successfully"

                      ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_flat_information()
    {
        $property_type = SetupPropertyType::where('delete_status',0)->get();
        $district = SetupDistrict::where('delete_status',0)->get();
        $seller = SetupSellerBuyer::where(['seller_or_buyer' => 'Seller' ,'delete_status' => 0])->get();
        $buyer = SetupSellerBuyer::where(['seller_or_buyer' => 'Buyer' ,'delete_status' => 0])->get();
        $floor = SetupFloor::where('delete_status',0)->get();

        return response()->json([
            "status"=>200,
            "property_type"=>$property_type,
            "district"=>$district,
            "seller"=>$seller,
            "buyer"=>$buyer,
            "floor"=>$floor,

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
