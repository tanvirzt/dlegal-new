<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CivilCases;
use App\Models\SetupPropertyType;
use App\Models\SetupSellerBuyer;
use App\Models\SetupDistrict;
use App\Models\SetupThana;
use App\Models\LandInformation;
use App\Models\LandInformationFile;
use DB;

class LandInfoController extends Controller
{
    //

    public function land_information()
    {
        // $data = CivilCases::all();

        $data = DB::table('land_information')
                ->leftJoin('setup_property_types','land_information.property_type_id','=','setup_property_types.id')
                ->leftJoin('setup_districts','land_information.district_id','=','setup_districts.id')
                ->leftJoin('setup_thanas','land_information.thana_id','=','setup_thanas.id')
                ->leftJoin('setup_seller_buyers','land_information.seller_id','=','setup_seller_buyers.id')
                ->leftJoin('setup_seller_buyers as buyers','land_information.buyer_id','=','buyers.id')
                ->select('land_information.*','setup_property_types.property_type_name','setup_districts.district_name','setup_thanas.thana_name','setup_seller_buyers.seller_buyer_name as seller_name','buyers.seller_buyer_name as buyer_name')
                ->get();
// dd($data);
        return view('property_management.land_information.land_information',compact('data'));
    }

    public function add_land_information()
    {
        $property_type = SetupPropertyType::where('delete_status',0)->get();
        // $seller_buyer = SetupSellerBuyer::where('delete_status',0)->get();
        $district = SetupDistrict::where('delete_status',0)->get();
        $seller = SetupSellerBuyer::where(['delete_status' => 0])->get();
        $buyer = SetupSellerBuyer::where(['delete_status' => 0])->get();
        // dd($buyer);
        return view('property_management.land_information.add_land_information',compact('property_type','district','seller','buyer'));
    }

    public function find_thana(Request $request)
    {
        $thana = SetupThana::where('district_id',$request->district_id)->get();
        return response()->json($thana);
    }

    public function find_seller_details(Request $request)
    {
        $seller = SetupSellerBuyer::find($request->seller_id);
        return response()->json($seller);

    }

    public function find_buyer_details(Request $request)
    {
        $buyer = SetupSellerBuyer::find($request->buyer_id);
        return response()->json($buyer);
    }

    public function save_land_information(Request $request)
    {
        //   dd($request->all());
     $rules = [
        'property_type_id' => 'required',
        'district_id' => 'required',
        'thana_id' => 'required',
        'seller_id' => 'required',
        'buyer_id' => 'required',
        'cs_khatian' => 'required',
        'cs_dag' => 'required',
        'sa_khatian' => 'required',
        'sa_dag' => 'required',
        'rs_khatian' => 'required',
        'rs_dag' => 'required',
        'bs_khatian' => 'required',
        'bs_dag' => 'required',
        'khatian_dag_city_jorip' => 'required',
        'land_area' => 'required',
        'deed_no' => 'required',
        'date_of_deed' => 'required',
        'deed_value' => 'required',
        'possession' => 'required',
    ];

    $validMsg = [
        'property_type_id.required' => 'Property Type field is required',
        'district_id.required' => 'District field is required',
        'thana_id.required' => 'Thana field is required',
        'seller_id.required' => 'Seller field is required',
        'buyer_id.required' => 'Buyer field is required',
        'cs_khatian.required' => 'CS Khatian field is required',
        'cs_dag.required' => 'CS Dag field is required',
        'sa_khatian.required' => 'SA Khatian field is required',
        'sa_dag.required' => 'SA Dag field is required',
        'rs_khatian.required' => 'RS Khatian field is required',
        'rs_dag.required' => 'RS Dag field is required',
        'bs_khatian.required' => 'BS Khatian field is required',
        'bs_dag.required' => 'BS Dag field is required',
        'khatian_dag_city_jorip.required' => 'Khatian Dag & City Jorip field is required',
        'land_area.required' => 'Land Area field is required',
        'deed_no.required' => 'Deed No. field is required',
        'date_of_deed.required' => 'Date of Deed field is required',
        'deed_value.required' => 'Deed Value field is required',
        'possession.required' => 'Possession field is required',
        
    ];

    $this->validate($request, $rules, $validMsg);

     $data = new LandInformation();
     $data->property_type_id = $request->property_type_id;
     $data->district_id = $request->district_id;
     $data->thana_id = $request->thana_id;
     $data->seller_id = $request->seller_id;
     $data->buyer_id = $request->buyer_id;
     $data->cs_khatian = $request->cs_khatian;
     $data->cs_dag = $request->cs_dag;
     $data->sa_khatian = $request->sa_khatian;
     $data->sa_dag = $request->sa_dag;
     $data->rs_khatian = $request->rs_khatian;
     $data->rs_dag = $request->rs_dag;
     $data->bs_khatian = $request->bs_khatian;
     $data->bs_dag = $request->bs_dag;
     $data->khatian_dag_city_jorip = $request->khatian_dag_city_jorip;
     $data->land_area = $request->land_area;
     $data->deed_no = $request->deed_no;
     $data->date_of_deed = $request->date_of_deed;
     $data->deed_value = $request->deed_value;
     $data->possession = $request->possession;
     $data->boundary_wall = $request->boundary_wall;
     $data->any_dispute = $request->any_dispute;
     $data->any_suit_case = $request->any_suit_case;
     $data->property_owner = $request->property_owner;
     $data->mouza_name = $request->mouza_name;
     $data->mutation_khatian_no = $request->mutation_khatian_no;
     $data->mutation_case_no = $request->mutation_case_no;
     $data->mutation_khatian_owner = $request->mutation_khatian_owner;
     $data->dcr_number = $request->dcr_number;
     $data->dcr_date = $request->dcr_date;
     $data->register_office_name = $request->register_office_name;

     if ($request->land_compliance == "compliance") {
            $data->land_compliance = "on";
        } else {
            $data->land_compliance = "off";
        }

     $data->electricity = $request->electricity;
     $data->gas = $request->gas;
     $data->sewerage = $request->sewerage;
     $data->water = $request->water;
     $data->expires = $request->expires;
     $data->renew = $request->renew;
     $data->save();

     if($request->hasfile('uploaded_document'))
     {
         foreach($request->file('uploaded_document') as $file)
         {
             $original_name = $file->getClientOriginalName();
             $name = time().rand(1,100).$original_name;
             $file->move(public_path('files/land_information'), $name);

             $file= new LandInformationFile();
             $file->land_information_id = $data->id;
             $file->uploaded_document = $name;
             $file->save();
         }
     }

     session()->flash('success','Land Information Added Successfully');
     return redirect()->back();
    }


    public function delete_land_information($id)
    {
        $data = LandInformation::find($id);
        if ($data['delete_status'] == 1){
            $delete_status = 0;
        }else{
            $delete_status = 1;
        }
        $data->delete_status = $delete_status;
        $data->save();
   
        session()->flash('success', 'Land Information Deleted');
        return redirect()->back();
    }

}
