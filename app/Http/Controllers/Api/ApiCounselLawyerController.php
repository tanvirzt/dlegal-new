<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Chamber;
use App\Models\ChamberAccounts;
use App\Models\ChamberAssociate;
use App\Models\ChamberClerk;
use App\Models\ChamberPartner;
use App\Models\ChamberSupportStaff;
use App\Models\Counsel;
use App\Models\CounselDocumentsReceived;
use App\Models\CounselDocumentsRequired;
use App\Models\SetupDocument;
use App\Models\SetupDocumentsType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ApiCounselLawyerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_counsel()
    {
        $data = Counsel::where('counsel_type','External')->get();
        return response()->json([
            "status" => 200,
            "data" => $data,
            "message" => "data get successfully"
        ]);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        

        $chamber_partner_sections = $request->chamber_partner_sections;
        $remove = array_pop($chamber_partner_sections);

        $associate_sections = $request->associate_sections;
        $remove = array_pop($associate_sections);

        $clerk_sections = $request->clerk_sections;
        $remove = array_pop($clerk_sections);

        $support_staff_sections = $request->support_staff_sections;
        $remove = array_pop($support_staff_sections);

        $chamber_account_sections = $request->chamber_account_sections;
        $remove = array_pop($chamber_account_sections);


        DB::beginTransaction();

        $data = new Chamber();
        $data->chamber_name = $request->chamber_name;

        if ($request->hasfile('chamber_logo')) {
            $file = $request->file('chamber_logo');
            $original_name = $file->getClientOriginalName();
            $explode = explode('.',$original_name);
            array_pop($explode);
            $implode = implode('-',$explode);
            $original_extension = $file->getClientOriginalExtension();
            $name = Str::slug($implode).'.'.$original_extension;
            $file->move(public_path('files/chamber_logo'), $name);
            $data->chamber_logo = $name;
        }

        $data->main_office_address = $request->main_office_address;
        $data->chamber_telephone = $request->chamber_telephone;
        $data->chamber_mobile_one = $request->chamber_mobile_one;
        $data->chamber_mobile_two = $request->chamber_mobile_two;
        $data->chamber_email_one = $request->chamber_email_one;
        $data->chamber_email_two = $request->chamber_email_two;
        $data->branch_office_address_one = $request->branch_office_address_one;
        $data->branch_office_address_two = $request->branch_office_address_two;
        $data->head_of_chamber = $request->head_of_chamber;

       
        if ($request->hasfile('head_of_chamber_signature')) {
            $file = $request->file('head_of_chamber_signature');
            $original_name = $file->getClientOriginalName();
            $file_name = time().rand(1,0).$original_name;
            $file->move(public_path('files/chamber/head_of_chamber_signature'),$file_name);
            $data->head_of_chamber_signature = $file_name;
         }
        $data->admin_of_chamber = $request->admin_of_chamber;
        if ($request->hasfile('admin_of_chamber_signature')) {
            $file = $request->file('admin_of_chamber_signature');
            $original_name = $file->getClientOriginalName();
            $file_name = time().rand(1,0).$original_name;
            $file->move(public_path('files/chamber/admin_of_chamber_signature'),$file_name);
            $data->admin_of_chamber_signature = $file_name;
         }

     
        $data->accountant = $request->accountant;
        
        if ($request->hasfile('accountant_signature')) {
            $file = $request->file('accountant_signature');
            $original_name = $file->getClientOriginalName();
            $file_name = time().rand(1,0).$original_name;
            $file->move(public_path('files/chamber/accountant_signature'),$file_name);
            $data->accountant_signature = $file_name;
         }
        $data->head_clerk = $request->head_clerk;
        
        if ($request->hasfile('head_clerk_signature')) {
            $file = $request->file('head_clerk_signature');
            $original_name = $file->getClientOriginalName();
            $file_name = time().rand(1,0).$original_name;
            $file->move(public_path('files/chamber/head_clerk_signature'),$file_name);
            $data->head_clerk_signature = $file_name;
         }

        $data->letterhead_write_up = $request->letterhead_write_up;
        $data->letterhead_address = $request->letterhead_address;
        $data->save();

        foreach ( array_filter($chamber_partner_sections) as $key => $value ){
            $datum = new ChamberPartner();
            $datum->chamber_id = $data->id;
            $datum->partner_of_chamber = $request->partner_of_chamber[$key];
            $datum->partner_of_chamber_signature = $request->partner_of_chamber_signature[$key];
            $datum->save();
        }

        foreach ( array_filter($associate_sections) as $key => $value ){
            $datum = new ChamberAssociate();
            $datum->chamber_id = $data->id;
            $datum->associate = $request->associate[$key];
            $datum->associate_signature = $request->associate_signature[$key];
            $datum->save();
        }

        foreach ( array_filter($clerk_sections) as $key => $value ){
            $datum = new ChamberClerk();
            $datum->chamber_id = $data->id;
            $datum->clerk = $request->clerk[$key];
            $datum->clerk_signature = $request->clerk_signature[$key];
            $datum->save();
        }

        foreach ( array_filter($support_staff_sections) as $key => $value ){
            $datum = new ChamberSupportStaff();
            $datum->chamber_id = $data->id;
            $datum->support_staff = $request->support_staff[$key];
            $datum->support_staff_signature = $request->support_staff_signature[$key];
            $datum->save();
        }

        foreach ( array_filter($chamber_account_sections) as $key => $value ){
            $datum = new ChamberAccounts();
            $datum->chamber_id = $data->id;
            $datum->chamber_accounts = $request->chamber_accounts[$key];
            $datum->account_name = $request->account_name[$key];
            $datum->account_number = $request->account_number[$key];
            $datum->bank_name = $request->bank_name[$key];
            $datum->save();
        }
        return response()->json([
            "status"=>200,
            "data"=>$data,
            "message"=>"data stored successfully"
        ]);
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
    public function edit_counsel($id)
    {
        $chamber = Chamber::orderBy('id','asc')->get();
        $documents = SetupDocument::where('delete_status', 0)->orderBy('documents_name','asc')->get();
        $documents_type = SetupDocumentsType::where('delete_status',0)->orderBy('documents_type_name','asc')->get();
        $data = Counsel::find($id);
        $received_documents_explode = CounselDocumentsReceived::where('counsel_id', $id)->get()->toArray();
        $required_wanting_documents_explode = CounselDocumentsRequired::where('counsel_id', $id)->get()->toArray();
        $data->edit();
        return response()->json([
            "status" => 200,
            "data" => $data,
            "message" => " data edited successfully"
        ]);
        
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_counsel($id)
    {
        $data = counsel::find($id);
       
        $data->delete();
        return response()->json([
            "status" => 200,
            "data" => $data,
            "message" => " data deleted successfully"
        ]);
    } 
    public function internal_consel_new()
    {
        $data = Counsel::where('counsel_type','Internal')->get();
        return response()->json([
            "status" => 200,
            "data" => $data,
            "message" => "data get successfully"
        ]);
    } 
    public function chamber()
    {
        $data = Chamber::get();
        return response()->json([
            "status" => 200,
            "data" => $data,
            "message" => "data get successfully"
        ]);
    } 

public function edit_chamber($id)
{
    $data = Chamber::find($id);
    $chamber_partner_explode = ChamberPartner::where('chamber_id', $id)->get()->toArray();
    $chamber_associate_explode = ChamberAssociate::where('chamber_id', $id)->get()->toArray();
    $chamber_clerk_explode = ChamberClerk::where('chamber_id', $id)->get()->toArray();
    $chamber_support_staff_explode = ChamberSupportStaff::where('chamber_id', $id)->get()->toArray();
    $chamber_accounts_explode = ChamberAccounts::where('chamber_id', $id)->get()->toArray();
    return response()->json([
        "status" => 200,
        "chamber_partner_explode" => $chamber_partner_explode,
        "chamber_associate_explode" => $chamber_associate_explode,
        "chamber_clerk_explode" => $chamber_clerk_explode,
        "chamber_support_staff_explode" => $chamber_support_staff_explode,
        "chamber_accounts_explode " => $chamber_accounts_explode ,
        "message" => " data edited successfully"
    ]);
}

public function delete_chamber($id)
{
    $data = Chamber::find($id);
   
    $data->delete();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => " data deleted successfully"
    ]);
} 
           

}