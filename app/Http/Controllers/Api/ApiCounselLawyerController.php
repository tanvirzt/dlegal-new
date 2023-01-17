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
use Illuminate\Support\Facades\DB;
use str;
use App\models\CounselDocumentsRequired;
use App\Models\SetupDocument;
use App\Models\SetupDocumentsType;
use Illuminate\Http\Request;

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
    public function add_counsel(Request $request)
    {
       
        
        // $received_documents_sections = $request->received_documents_sections;
        // $remove = array_pop($received_documents_sections);

        // $required_wanting_documents_sections = $request->required_wanting_documents_sections;
        // $remove = array_pop($required_wanting_documents_sections);
        $data = new Counsel();
        

        $data->counsel_type = $request->counsel_type;
        $data->counsel_category = $request->counsel_category;

        $data->chamber_name = $request->chamber_name;
        $data->counsel_role_id = $request->counsel_role_id;
        $data->counsel_name = $request->counsel_name;
        $data->father_name = $request->father_name;
        $data->mother_name = $request->mother_name;
        $data->spouse_name = $request->spouse_name;
        $data->present_address = $request->present_address;
        $data->permanent_address = $request->permanent_address;
        $data->date_of_birth = $request->date_of_birth == 'dd-mm-yyyy' || $request->date_of_birth == 'NaN-NaN-NaN' ? null : $request->date_of_birth;
        $data->nid_number = $request->nid_number;
        $data->mobile_number = $request->mobile_number;
        $data->email = $request->email;
        $data->emergency_contact = $request->emergency_contact;
        $data->relation = $request->relation;
        $data->professional_name = $request->professional_name;
        $data->ssc_year = $request->ssc_year;
        $data->ssc_institution = $request->ssc_institution;
        $data->hsc_year = $request->hsc_year;
        $data->hsc_institution = $request->hsc_institution;
        $data->llb_year = $request->llb_year;
        $data->llb_institution = $request->llb_institution;
        $data->llm_year = $request->llm_year;
        $data->llm_instution = $request->llm_instution;
        $data->bar_council_enrollment_date = $request->bar_council_enrollment_date == 'dd-mm-yyyy' || $request->bar_council_enrollment_date == 'NaN-NaN-NaN' ? null : $request->bar_council_enrollment_date;
        $data->bar_council_enrollment_sanad_no = $request->bar_council_enrollment_sanad_no;
        $data->mother_bar_name = $request->mother_bar_name;
        $data->mother_bar_membership_number = $request->mother_bar_membership_number;
        $data->practicing_bar_date = $request->practicing_bar_date == 'dd-mm-yyyy' || $request->practicing_bar_date == 'NaN-NaN-NaN' ? null : $request->practicing_bar_date;
        $data->practicing_bar_membership_number = $request->practicing_bar_membership_number;
        $data->high_court_enrollment_date = $request->high_court_enrollment_date == 'dd-mm-yyyy' || $request->high_court_enrollment_date == 'NaN-NaN-NaN' ? null : $request->high_court_enrollment_date;
        $data->high_court_enrollment_membership_number = $request->high_court_enrollment_membership_number;
        $data->bar_council_fees = $request->bar_council_fees == 'dd-mm-yyyy' || $request->bar_council_fees == 'NaN-NaN-NaN' ? null : $request->bar_council_fees;
        $data->bar_council_fees_write = $request->bar_council_fees_write;
        $data->district_bar_mem_fee = $request->district_bar_mem_fee == 'dd-mm-yyyy' || $request->district_bar_mem_fee == 'NaN-NaN-NaN' ? null : $request->district_bar_mem_fee;
        $data->district_bar_mem_write = $request->district_bar_mem_write;
        $data->scba_memb_fee = $request->scba_memb_fee == 'dd-mm-yyyy' || $request->scba_memb_fee == 'NaN-NaN-NaN' ? null : $request->scba_memb_fee;
        $data->scba_memb_fee_write = $request->scba_memb_fee_write;
        $data->professional_contact_number = $request->professional_contact_number;
        $data->professional_contact_number_write = $request->professional_contact_number_write;
        $data->professional_email = $request->professional_email;
        $data->professional_email_write = $request->professional_email_write;
        $data->name_of_associates = $request->name_of_associates;
        $data->name_of_associates_write = $request->name_of_associates_write;
        $data->professional_experience_one = $request->professional_experience_one;
        $data->professional_experience_two = $request->professional_experience_two;
        $data->date_of_joining = $request->date_of_joining == 'dd-mm-yyyy' || $request->date_of_joining == 'NaN-NaN-NaN' ? null : $request->date_of_joining;
        $data->save();
        // foreach ( array_filter($received_documents_sections) as $key => $value ){
        //     $datum = new CounselDocumentsReceived();
        //     $datum->counsel_id = $data->id;
        //     $datum->received_documents_id = $request->received_documents_id[$key];
        //     $datum->received_documents = $request->received_documents[$key];
        //     $datum->received_documents_date = $request->received_documents_date[$key];
        //     $datum->received_documents_type_id = $request->received_documents_type_id[$key];
        //     $datum->save();
        // }


        // foreach ( array_filter($required_wanting_documents_sections) as $key => $value ){
        //     $required = new CounselDocumentsRequired();
        //     $required->counsel_id = $data->id;
        //     $required->required_wanting_documents_id = $request->required_wanting_documents_id[$key];
        //     $required->required_wanting_documents = $request->required_wanting_documents[$key];
        //     $required->required_wanting_documents_date = $request->required_wanting_documents_date[$key];
        //     $required->required_wanting_documents_type_id = $request->required_wanting_documents_type_id[$key];
        //     $required->save();
        // }
        
        $data->save();
        return response()->json([
            "status" => 200,
            "data" => $data,
            "message" => " data added successfully"
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
    public function update_counsel(Request $request, $id)
    {
    //   $received_documents_sections = $request->received_documents_sections;
    //   $remove = array_pop($received_documents_sections);

    //   $required_wanting_documents_sections = $request->required_wanting_documents_sections;
    //   $remove = array_pop($requires_wanting_documents_sections);

        $data = Counsel::find($id);
        $data->counsel_type = $request->counsel_type;
        $data->counsel_category = $request->counsel_category;
        $data->chamber_name = $request->chamber_name;
        $data->counsel_role_id = $request->counsel_role_id;
        $data->counsel_name = $request->counsel_name;
        $data->father_name = $request->father_name;
        $data->mother_name = $request->mother_name;
        $data->spouse_name = $request->spouse_name;
        $data->present_address = $request->present_address;
        $data->permanent_address = $request->permanent_address;
        $data->date_of_birth = $request->date_of_birth == 'dd-mm-yyyy' || $request->date_of_birth == 'NaN-NaN-NaN' ? null : $request->date_of_birth;
        $data->nid_number = $request->nid_number;
        $data->mobile_number = $request->mobile_number;
        $data->email = $request->email;
        $data->emergency_contact = $request->emergency_contact;
        $data->relation = $request->relation;
        $data->professional_name = $request->professional_name;
        $data->ssc_year = $request->ssc_year;
        $data->ssc_institution = $request->ssc_institution;
        $data->hsc_year = $request->hsc_year;
        $data->hsc_institution = $request->hsc_institution;
        $data->llb_year = $request->llb_year;
        $data->llb_institution = $request->llb_institution;
        $data->llm_year = $request->llm_year;
        $data->llm_instution = $request->llm_instution;
        $data->bar_council_enrollment_date = $request->bar_council_enrollment_date == 'dd-mm-yyyy' || $request->bar_council_enrollment_date == 'NaN-NaN-NaN' ? null : $request->bar_council_enrollment_date;
        $data->bar_council_enrollment_sanad_no = $request->bar_council_enrollment_sanad_no;
        $data->mother_bar_name = $request->mother_bar_name;
        $data->mother_bar_membership_number = $request->mother_bar_membership_number;
        $data->practicing_bar_date = $request->practicing_bar_date == 'dd-mm-yyyy' || $request->practicing_bar_date == 'NaN-NaN-NaN' ? null : $request->practicing_bar_date;
        $data->practicing_bar_membership_number = $request->practicing_bar_membership_number;
        $data->high_court_enrollment_date = $request->high_court_enrollment_date == 'dd-mm-yyyy' || $request->high_court_enrollment_date == 'NaN-NaN-NaN' ? null : $request->high_court_enrollment_date;
        $data->high_court_enrollment_membership_number = $request->high_court_enrollment_membership_number;
        $data->bar_council_fees = $request->bar_council_fees == 'dd-mm-yyyy' || $request->bar_council_fees == 'NaN-NaN-NaN' ? null : $request->bar_council_fees;
        $data->bar_council_fees_write = $request->bar_council_fees_write;
        $data->district_bar_mem_fee = $request->district_bar_mem_fee == 'dd-mm-yyyy' || $request->district_bar_mem_fee == 'NaN-NaN-NaN' ? null : $request->district_bar_mem_fee;
        $data->district_bar_mem_write = $request->district_bar_mem_write;
        $data->scba_memb_fee = $request->scba_memb_fee == 'dd-mm-yyyy' || $request->scba_memb_fee == 'NaN-NaN-NaN' ? null : $request->scba_memb_fee;
        $data->scba_memb_fee_write = $request->scba_memb_fee_write;
        $data->professional_contact_number = $request->professional_contact_number;
        $data->professional_contact_number_write = $request->professional_contact_number_write;
        $data->professional_email = $request->professional_email;
        $data->professional_email_write = $request->professional_email_write;
        $data->name_of_associates = $request->name_of_associates;
        $data->name_of_associates_write = $request->name_of_associates_write;
        $data->professional_experience_one = $request->professional_experience_one;
        $data->professional_experience_two = $request->professional_experience_two;
        $data->date_of_joining = $request->date_of_joining == 'dd-mm-yyyy' || $request->date_of_joining == 'NaN-NaN-NaN' ? null : $request->date_of_joining;
        $data->save();
        // foreach ( array_filter($received_documents_sections) as $key => $value ){
        //     $datum = new CounselDocumentsReceived();
        //     $datum->counsel_id = $data->id;
        //     $datum->received_documents_id = $request->received_documents_id[$key];
        //     $datum->received_documents = $request->received_documents[$key];
        //     $datum->received_documents_date = $request->received_documents_date[$key];
        //     $datum->received_documents_type_id = $request->received_documents_type_id[$key];
        //     $datum->u();
        // }


        // foreach ( array_filter($required_wanting_documents_sections) as $key => $value ){
        //     $required = new CounselDocumentsRequired();
        //     $required->counsel_id = $data->id;
        //     $required->required_wanting_documents_id = $request->required_wanting_documents_id[$key];
        //     $required->required_wanting_documents = $request->required_wanting_documents[$key];
        //     $required->required_wanting_documents_date = $request->required_wanting_documents_date[$key];
        //     $required->required_wanting_documents_type_id = $request->required_wanting_documents_type_id[$key];
        //     $required->save();
        // }
        $data->update();
        return response()->json([
            "status" => 200,
            "data" => $data,
            "message" => " data updated successfully"
        ]);
       

    }

    

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
//     public function add_chamber(Request $request)
//     {    
//         $chamber_partner_sections = $request->chamber_partner_sections;
//         $remove = array_pop($chamber_partner_sections);

//         $associate_sections = $request->associate_sections;
//         $remove = array_pop($associate_sections);

//         $clerk_sections = $request->clerk_sections;
//         $remove = array_pop($clerk_sections);

//         $support_staff_sections = $request->support_staff_sections;
//         $remove = array_pop($support_staff_sections);

//         $chamber_account_sections = $request->chamber_account_sections;
//         $remove = array_pop($chamber_account_sections);
//         DB::beginTransaction();

//         $data = new Chamber();
//         $data->chamber_name = $request->chamber_name;

//         if ($request->hasfile('chamber_logo')) {
//             $file = $request->file('chamber_logo');
//             $original_name = $file->getClientOriginalName();
//             $explode = explode('.',$original_name);
//             array_pop($explode);
//             $implode = implode('-',$explode);
//             $original_extension = $file->getClientOriginalExtension();
//             $name = Str::slug($implode).'.'.$original_extension;
//             $file->move(public_path('files/chamber_logo'), $name);
//             $data->chamber_logo = $name;
//         }
//         $data->main_office_address = $request->main_office_address;
//         $data->chamber_telephone = $request->chamber_telephone;
//         $data->chamber_mobile_one = $request->chamber_mobile_one;
//         $data->chamber_mobile_two = $request->chamber_mobile_two;
//         $data->chamber_email_one = $request->chamber_email_one;
//         $data->chamber_email_two = $request->chamber_email_two;
//         $data->branch_office_address_one = $request->branch_office_address_one;
//         $data->branch_office_address_two = $request->branch_office_address_two;
//         $data->head_of_chamber = $request->head_of_chamber;
//         if ($request->hasfile('head_of_chamber_signature')) {
//             $file = $request->file('head_of_chamber_signature');
//             $original_name = $file->getClientOriginalName();
//             $file_name = time().rand(1,0).$original_name;
//             $file->move(public_path('files/chamber/head_of_chamber_signature'),$file_name);
//             $data->head_of_chamber_signature = $file_name;
//          }
//         $data->admin_of_chamber = $request->admin_of_chamber;
//         if ($request->hasfile('admin_of_chamber_signature')) {
//             $file = $request->file('admin_of_chamber_signature');
//             $original_name = $file->getClientOriginalName();
//             $file_name = time().rand(1,0).$original_name;
//             $file->move(public_path('files/chamber/admin_of_chamber_signature'),$file_name);
//             $data->admin_of_chamber_signature = $file_name;
//          }

//          $data->accountant = $request->accountant;

//          if ($request->hasfile('accountant_signature')) {
//             $file = $request->file('accountant_signature');
//             $original_name = $file->getClientOriginalName();
//             $file_name = time().rand(1,0).$original_name;
//             $file->move(public_path('files/chamber/accountant_signature'),$file_name);
//             $data->accountant_signature = $file_name;
//          }
         
//         $data->letterhead_write_up = $request->letterhead_write_up;
//         $data->letterhead_address = $request->letterhead_address;
//         $data->save();

//         foreach ( array_filter($chamber_partner_sections) as $key => $value ){
//             $datum = new ChamberPartner();
//             $datum->chamber_id = $data->id;
//             $datum->partner_of_chamber = $request->partner_of_chamber[$key];
//             $datum->partner_of_chamber_signature = $request->partner_of_chamber_signature[$key];
//             $datum->save();
//         }

//         foreach ( array_filter($associate_sections) as $key => $value ){
//             $datum = new ChamberAssociate();
//             $datum->chamber_id = $data->id;
//             $datum->associate = $request->associate[$key];
//             $datum->associate_signature = $request->associate_signature[$key];
//             $datum->save();
//         }
//         foreach ( array_filter($clerk_sections) as $key => $value ){
//             $datum = new ChamberClerk();
//             $datum->chamber_id = $data->id;
//             $datum->clerk = $request->clerk[$key];
//             $datum->clerk_signature = $request->clerk_signature[$key];
//             $datum->save();
//         }

//         foreach ( array_filter($support_staff_sections) as $key => $value ){
//             $datum = new ChamberSupportStaff();
//             $datum->chamber_id = $data->id;
//             $datum->support_staff = $request->support_staff[$key];
//             $datum->support_staff_signature = $request->support_staff_signature[$key];
//             $datum->save();
//         }

//         foreach ( array_filter($chamber_account_sections) as $key => $value ){
//             $datum = new ChamberAccounts();
//             $datum->chamber_id = $data->id;
//             $datum->chamber_accounts = $request->chamber_accounts[$key];
//             $datum->account_name = $request->account_name[$key];
//             $datum->account_number = $request->account_number[$key];
//             $datum->bank_name = $request->bank_name[$key];
//             $datum->save();
//         }
//         DB::commit();

//         session()->flash('success', 'Chamber Added Successfully.');
//         return redirect()->route('chamber');

    
       
        
//         $data->save();
//         return response()->json([
//             "status" => 200,
//             "data" => $data,
//             "message" => " data added successfully"
//         ]);
// }
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
// public function update_chamber(Request $request, $id)
// {
//     $chamber_partner_sections = $request->chamber_partner_sections;
//     $remove = array_pop($chamber_partner_sections);

//     $associate_sections = $request->associate_sections;
//     $remove = array_pop($associate_sections);

//     $clerk_sections = $request->clerk_sections;
//     $remove = array_pop($clerk_sections);

//     $support_staff_sections = $request->support_staff_sections;
//     $remove = array_pop($support_staff_sections);

//     $chamber_account_sections = $request->chamber_account_sections;
//     $remove = array_pop($chamber_account_sections);


//     DB::beginTransaction();

//     $data = Chamber::find($id);
//     $data->chamber_name = $request->chamber_name;

//     $image_path = 'files/chamber_logo/'.$data['chamber_logo'];

//     if($request->chamber_logo && file_exists($image_path)){
//         unlink($image_path);
//     }

//     if ($request->hasfile('chamber_logo')) {
//         $file = $request->file('chamber_logo');
//         $original_name = $file->getClientOriginalName();
//         $explode = explode('.',$original_name);
//         array_pop($explode);
//         $implode = implode('-',$explode);
//         $original_extension = $file->getClientOriginalExtension();
//         $name = Str::slug($implode).'.'.$original_extension;
//         $file->move(public_path('files/chamber_logo'), $name);
//         $data->chamber_logo = $name;
//     }

//     $data->main_office_address = $request->main_office_address;
//     $data->chamber_telephone = $request->chamber_telephone;
//     $data->chamber_mobile_one = $request->chamber_mobile_one;
//     $data->chamber_mobile_two = $request->chamber_mobile_two;
//     $data->chamber_email_one = $request->chamber_email_one;
//     $data->chamber_email_two = $request->chamber_email_two;
//     $data->branch_office_address_one = $request->branch_office_address_one;
//     $data->branch_office_address_two = $request->branch_office_address_two;
//     $data->head_of_chamber = $request->head_of_chamber;
//     $data->head_of_chamber_signature = $request->head_of_chamber_signature;
//     $data->admin_of_chamber = $request->admin_of_chamber;
//     $data->admin_of_chamber_signature = $request->admin_of_chamber_signature;
//     $data->accountant = $request->accountant;
//     $data->accountant_signature = $request->accountant_signature;
//     $data->head_clerk = $request->head_clerk;
//     $data->head_clerk_signature = $request->head_clerk_signature;
//     $data->letterhead_write_up = $request->letterhead_write_up;
//     $data->letterhead_address = $request->letterhead_address;
//     $data->save();

//     ChamberPartner::where('chamber_id', $id)->delete();

//     foreach ( array_filter($chamber_partner_sections) as $key => $value ){
//         $datum = new ChamberPartner();
//         $datum->chamber_id = $data->id;
//         $datum->partner_of_chamber = $request->partner_of_chamber[$key];
//         $datum->partner_of_chamber_signature = $request->partner_of_chamber_signature[$key];
//         $datum->save();
//     }

//     ChamberAssociate::where('chamber_id', $id)->delete();

//     foreach ( array_filter($associate_sections) as $key => $value ){
//         $datum = new ChamberAssociate();
//         $datum->chamber_id = $data->id;
//         $datum->associate = $request->associate[$key];
//         $datum->associate_signature = $request->associate_signature[$key];
//         $datum->save();
//     }

//     ChamberClerk::where('chamber_id', $id)->delete();

//     foreach ( array_filter($clerk_sections) as $key => $value ){
//         $datum = new ChamberClerk();
//         $datum->chamber_id = $data->id;
//         $datum->clerk = $request->clerk[$key];
//         $datum->clerk_signature = $request->clerk_signature[$key];
//         $datum->save();
//     }

//     ChamberSupportStaff::where('chamber_id', $id)->delete();

//     foreach ( array_filter($support_staff_sections) as $key => $value ){
//         $datum = new ChamberSupportStaff();
//         $datum->chamber_id = $data->id;
//         $datum->support_staff = $request->support_staff[$key];
//         $datum->support_staff_signature = $request->support_staff_signature[$key];
//         $datum->save();
//     }

//     ChamberAccounts::where('chamber_id', $id)->delete();

//     foreach ( array_filter($chamber_account_sections) as $key => $value ){
//         $datum = new ChamberAccounts();
//         $datum->chamber_id = $data->id;
//         $datum->chamber_accounts = $request->chamber_accounts[$key];
//         $datum->account_name = $request->account_name[$key];
//         $datum->account_number = $request->account_number[$key];
//         $datum->bank_name = $request->bank_name[$key];
//         $datum->save();
//     }

//     DB::commit();
    
    
    
        
//     $data->update();
//     return response()->json([
//         "status" => 200,
//         "data" => $data,
//         "message" => " data updated successfully"
//     ]);
// }
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