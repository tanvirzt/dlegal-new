<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SetupPropertyType;
use App\Models\SetupDistrict;
use App\Models\SetupSellerBuyer;
use App\Models\SetupFloor;
use App\Models\SetupFlatNumber;
use App\Models\FlatInformation;
use App\Models\FlatInformationFile;
use App\Models\SetupThana;
use DB;

class FlatInfoController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:flat-information-list|flat-information-create|flat-information-edit|flat-information-delete|flat-information-view', ['only' => ['flat_information']]);
        $this->middleware('permission:flat-information-create', ['only' => ['add_flat_information','save_flat_information']]);
        $this->middleware('permission:flat-information-edit', ['only' => ['edit_flat_information','update_flat_information']]);
        $this->middleware('permission:flat-information-delete', ['only' => ['delete_flat_information']]);
        $this->middleware('permission:flat-information-view', ['only' => ['view_flat_information']]);
    }

    public function flat_information()
    {
        // dd('asdfasdf asdfasdf');
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
// dd($data);
        return view('property_management.flat_information.flat_information',compact('property_type','district','seller','buyer','data'));

    }

    public function add_flat_information()
    {
        $property_type = SetupPropertyType::where('delete_status',0)->get();
        $district = SetupDistrict::where('delete_status',0)->get();
        $seller = SetupSellerBuyer::where(['seller_or_buyer' => 'Seller' ,'delete_status' => 0])->get();
        $buyer = SetupSellerBuyer::where(['seller_or_buyer' => 'Buyer' ,'delete_status' => 0])->get();
        $floor = SetupFloor::where('delete_status',0)->get();
        return view('property_management.flat_information.add_flat_information',compact('property_type','district','seller','buyer','floor'));
    }

    public function find_flat_number(Request $request)
    {
        $flat_number = SetupFlatNumber::where(['floor_id' => $request->floor_id, 'delete_status' => 0])->orderBy('flat_number','asc')->get();
        return response()->json($flat_number);
    }

    public function save_flat_information(Request $request)
    {
        // dd($request->all());

//        $rules = [
//            'property_type_id' => 'required',
//            'district_id' => 'required',
//            'thana_id' => 'required',
//            'seller_id' => 'required',
//            'buyer_id' => 'required',
//            'cs_khatian' => 'required',
//            'cs_dag' => 'required',
//            'sa_khatian' => 'required',
//            'sa_dag' => 'required',
//            'rs_khatian' => 'required',
//            'rs_dag' => 'required',
//            'bs_khatian' => 'required',
//            'bs_dag' => 'required',
//            'khatian_dag_city_jorip' => 'required',
//            'flat_area' => 'required',
//            'deed_no' => 'required',
//            'date_of_deed' => 'required',
//            'deed_value' => 'required',
//            'possession' => 'required',
//        ];
//
//        $validMsg = [
//            'property_type_id.required' => 'Property Type field is required',
//            'district_id.required' => 'District field is required',
//            'thana_id.required' => 'Thana field is required',
//            'seller_id.required' => 'Seller field is required',
//            'buyer_id.required' => 'Buyer field is required',
//            'cs_khatian.required' => 'CS Khatian field is required',
//            'cs_dag.required' => 'CS Dag field is required',
//            'sa_khatian.required' => 'SA Khatian field is required',
//            'sa_dag.required' => 'SA Dag field is required',
//            'rs_khatian.required' => 'RS Khatian field is required',
//            'rs_dag.required' => 'RS Dag field is required',
//            'bs_khatian.required' => 'BS Khatian field is required',
//            'bs_dag.required' => 'BS Dag field is required',
//            'khatian_dag_city_jorip.required' => 'Khatian Dag & City Jorip field is required',
//            'flat_area.required' => 'Land Area field is required',
//            'deed_no.required' => 'Deed No. field is required',
//            'date_of_deed.required' => 'Date of Deed field is required',
//            'deed_value.required' => 'Deed Value field is required',
//            'possession.required' => 'Possession field is required',
//        ];
//
//        $this->validate($request, $rules, $validMsg);

        $data = new FlatInformation();
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
        $data->flat_area = $request->flat_area;
        $data->deed_no = $request->deed_no;
        $data->date_of_deed = $request->date_of_deed;
        $data->deed_value = $request->deed_value;
        $data->possession = $request->possession;
        $data->boundary_wall = $request->boundary_wall;
        $data->any_dispute = $request->any_dispute;
        $data->any_suit_case = $request->any_suit_case;
        $data->flat_owner = $request->flat_owner;
        $data->mouza_name = $request->mouza_name;
        $data->mutation_khatian_no = $request->mutation_khatian_no;
        $data->mutation_case_no = $request->mutation_case_no;
        $data->mutation_khatian_owner = $request->mutation_khatian_owner;
        $data->dcr_number = $request->dcr_number;
        $data->dcr_date = $request->dcr_date;
        $data->register_office_name = $request->register_office_name;
        $data->floor_id = $request->floor_id;
        $data->flat_number_id = $request->flat_number_id;
        $data->flat_size = $request->flat_size;

        if ($request->flat_compliance == "compliance") {
            $data->flat_compliance = "Yes";
        } else {
            $data->flat_compliance = "No";
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
                $file->move(public_path('files/flat_information'), $name);

                $file= new FlatInformationFile();
                $file->flat_information_id = $data->id;
                $file->uploaded_document = $name;
                $file->save();
            }
        }

        session()->flash('success','Flat Information Added Successfully.');
        return redirect()->route('flat-information');

    }

    public function edit_flat_information($id)
    {
        $property_type = SetupPropertyType::where('delete_status',0)->get();
        $district = SetupDistrict::where('delete_status',0)->get();
        $seller = SetupSellerBuyer::where(['seller_or_buyer' => 'Seller' ,'delete_status' => 0])->get();
        $buyer = SetupSellerBuyer::where(['seller_or_buyer' => 'Buyer' ,'delete_status' => 0])->get();
        $floor = SetupFloor::where('delete_status',0)->get();

        $data = FlatInformation::find($id);

        $existing_thana = SetupThana::where(['district_id' => $data->district_id, 'delete_status' => 0])->get();
        $existing_flat_number = SetupFlatNumber::where(['floor_id' => $data->floor_id, 'delete_status' => 0])->get();
    // dd($data);
        return view('property_management.flat_information.edit_flat_information',compact('property_type','district','seller','buyer','floor','existing_flat_number','data','existing_thana'));

    }


    public function update_flat_information(Request $request, $id)
    {
        // dd($request->all());

//        $rules = [
//            'property_type_id' => 'required',
//            'district_id' => 'required',
//            'thana_id' => 'required',
//            'seller_id' => 'required',
//            'buyer_id' => 'required',
//            'cs_khatian' => 'required',
//            'cs_dag' => 'required',
//            'sa_khatian' => 'required',
//            'sa_dag' => 'required',
//            'rs_khatian' => 'required',
//            'rs_dag' => 'required',
//            'bs_khatian' => 'required',
//            'bs_dag' => 'required',
//            'khatian_dag_city_jorip' => 'required',
//            'flat_area' => 'required',
//            'deed_no' => 'required',
//            'date_of_deed' => 'required',
//            'deed_value' => 'required',
//            'possession' => 'required',
//        ];
//
//        $validMsg = [
//            'property_type_id.required' => 'Property Type field is required',
//            'district_id.required' => 'District field is required',
//            'thana_id.required' => 'Thana field is required',
//            'seller_id.required' => 'Seller field is required',
//            'buyer_id.required' => 'Buyer field is required',
//            'cs_khatian.required' => 'CS Khatian field is required',
//            'cs_dag.required' => 'CS Dag field is required',
//            'sa_khatian.required' => 'SA Khatian field is required',
//            'sa_dag.required' => 'SA Dag field is required',
//            'rs_khatian.required' => 'RS Khatian field is required',
//            'rs_dag.required' => 'RS Dag field is required',
//            'bs_khatian.required' => 'BS Khatian field is required',
//            'bs_dag.required' => 'BS Dag field is required',
//            'khatian_dag_city_jorip.required' => 'Khatian Dag & City Jorip field is required',
//            'flat_area.required' => 'Land Area field is required',
//            'deed_no.required' => 'Deed No. field is required',
//            'date_of_deed.required' => 'Date of Deed field is required',
//            'deed_value.required' => 'Deed Value field is required',
//            'possession.required' => 'Possession field is required',
//        ];
//
//        $this->validate($request, $rules, $validMsg);

        $data = FlatInformation::find($id);
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
        $data->flat_area = $request->flat_area;
        $data->deed_no = $request->deed_no;
        $data->date_of_deed = $request->date_of_deed;
        $data->deed_value = $request->deed_value;
        $data->possession = $request->possession;
        $data->boundary_wall = $request->boundary_wall;
        $data->any_dispute = $request->any_dispute;
        $data->any_suit_case = $request->any_suit_case;
        $data->flat_owner = $request->flat_owner;
        $data->mouza_name = $request->mouza_name;
        $data->mutation_khatian_no = $request->mutation_khatian_no;
        $data->mutation_case_no = $request->mutation_case_no;
        $data->mutation_khatian_owner = $request->mutation_khatian_owner;
        $data->dcr_number = $request->dcr_number;
        $data->dcr_date = $request->dcr_date;
        $data->register_office_name = $request->register_office_name;
        $data->floor_id = $request->floor_id;
        $data->flat_number_id = $request->flat_number_id;
        $data->flat_size = $request->flat_size;

         if ($request->flat_compliance == "compliance") {
            $data->flat_compliance = "Yes";
            $data->electricity = $request->electricity;
            $data->gas = $request->gas;
            $data->sewerage = $request->sewerage;
            $data->water = $request->water;
            $data->expires = $request->expires;
            $data->renew = $request->renew;
        } else {
            $data->flat_compliance = "No";
            $data->electricity = null;
            $data->gas = null;
            $data->sewerage = null;
            $data->water = null;
            $data->expires = null;
            $data->renew = null;
        }


         $data->save();

         if($request->hasfile('uploaded_document'))
         {
             foreach($request->file('uploaded_document') as $file)
             {
                 $original_name = $file->getClientOriginalName();
                 $name = time().rand(1,100).$original_name;
                 $file->move(public_path('files/flat_information'), $name);

                 $file= new FlatInformationFile();
                 $file->flat_information_id = $data->id;
                 $file->uploaded_document = $name;
                 $file->save();
             }
         }

         session()->flash('success','Flat Information Updated Successfully');
         return redirect()->route('flat-information');

    }

    public function delete_flat_information($id)
    {
        $data = FlatInformation::find($id);
        if ($data['delete_status'] == 1){
            $delete_status = 0;
        }else{
            $delete_status = 1;
        }
        $data->delete_status = $delete_status;
        $data->save();

        session()->flash('success', 'Flat Information Deleted');
        return redirect()->back();
    }

    public function view_flat_information($id)
    {

        $data = DB::table('flat_information')
                ->leftJoin('setup_property_types','flat_information.property_type_id','=','setup_property_types.id')
                ->leftJoin('setup_districts','flat_information.district_id','=','setup_districts.id')
                ->leftJoin('setup_thanas','flat_information.thana_id','=','setup_thanas.id')
                ->leftJoin('setup_seller_buyers as seller','flat_information.seller_id','=','seller.id')
                ->leftJoin('setup_seller_buyers as buyer','flat_information.buyer_id','=','buyer.id')
                ->leftJoin('setup_floors','flat_information.floor_id','=','setup_floors.id')
                ->leftJoin('setup_flat_numbers','flat_information.flat_number_id','=','setup_flat_numbers.id')
                ->select('flat_information.*','setup_property_types.property_type_name','setup_districts.district_name','setup_thanas.thana_name','seller.seller_buyer_name as seller_name','buyer.seller_buyer_name as buyer_name','setup_floors.floor_name','setup_flat_numbers.flat_number')
                ->where('flat_information.id',$id)
                ->first();

        //  dd($data);
        $flat_information_files = FlatInformationFile::where('flat_information_id',$id)->get();
        // dd($flat_information_files);
        return view('property_management.flat_information.view_flat_information',compact('data','flat_information_files'));

    }

    public function download_flat_information_files($id)
    {
        $files = FlatInformationFile::find($id);
        $file_path = 'files/flat_information/'.$files->uploaded_document;
        return response()->download($file_path);
    }

    public function search_flat_information(Request $request)
    {
        // dd($request->all());
        $query = DB::table('flat_information')
                ->leftJoin('setup_property_types','flat_information.property_type_id','=','setup_property_types.id')
                ->leftJoin('setup_districts','flat_information.district_id','=','setup_districts.id')
                ->leftJoin('setup_thanas','flat_information.thana_id','=','setup_thanas.id')
                ->leftJoin('setup_seller_buyers as seller','flat_information.seller_id','=','seller.id')
                ->leftJoin('setup_seller_buyers as buyer','flat_information.buyer_id','=','buyer.id')
                ->leftJoin('setup_floors','flat_information.floor_id','=','setup_floors.id')
                ->leftJoin('setup_flat_numbers','flat_information.flat_number_id','=','setup_flat_numbers.id')
                ->select('flat_information.*','setup_property_types.property_type_name','setup_districts.district_name','setup_thanas.thana_name','seller.seller_buyer_name as seller_name','buyer.seller_buyer_name as buyer_name','setup_floors.floor_name','setup_flat_numbers.flat_number');
        if ($request->district_id && $request->thana_id) {
            // dd('district and thana');

           $data = $query->where(['flat_information.district_id' => $request->district_id, 'flat_information.thana_id' => $request->thana_id])
                    ->get();

        } else if($request->district_id){
            // dd('district');

           $data = $query->where(['flat_information.district_id' => $request->district_id])
                    ->get();

        } else if($request->property_type_id){
            // dd('property type');

            $data = $query->where(['flat_information.property_type_id' => $request->property_type_id])
                    ->get();

        } else if($request->seller_id){
            // dd('seller');

            $data = $query->where(['flat_information.seller_id' => $request->seller_id])
                    ->get();

        }else if($request->buyer_id){
            // dd('buyer');

            $data = $query->where(['flat_information.buyer_id' => $request->buyer_id])
                    ->get();

        }else{
            $data = $query->get();
        }

        return response()->json([
            'result' => 'flat_information',
            'data' => $data,
        ]);


    }


}
