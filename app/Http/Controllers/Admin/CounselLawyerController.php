<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SetupExternalCouncil;
use App\Models\SetupDocumentsType;
use App\Models\SetupDocument;
use App\Models\Counsel;
use App\Models\CounselDocumentsReceived;
use App\Models\CounselDocumentsRequired;
use App\Models\ChamberStaffDocumentsReceived;
use App\Models\ChamberStaffDocumentsRequired;
use App\Models\ChamberStaff;
use App\Models\InternalCounsel;
use App\Models\InternalCounselDocumentsReceived;
use App\Models\InternalCounselDocumentsRequired;
use DB;
use App\Models\Chamber;
use App\Models\ChamberPartner;
use App\Models\ChamberAssociate;
use App\Models\ChamberClerk;
use App\Models\ChamberSupportStaff;
use App\Models\ChamberAccounts;
use Str;

class CounselLawyerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct(){

        // $this->middleware('permission:counsel-list|counsel-create|counsel-edit|counsel-delete', ['only' => ['index_counsel']]);
        // $this->middleware('permission:counsel-create', ['only' => ['create_counsel','store_counsel']]);
        // $this->middleware('permission:counsel-edit', ['only' => ['edit_counsel','update_counsel']]);
        // $this->middleware('permission:counsel-delete', ['only' => ['destroy_counsel']]);

        // $this->middleware('permission:chamber-staff-list|chamber-staff-create|chamber-staff-edit|chamber-staff-delete', ['only' => ['index_chamber_staff']]);
        // $this->middleware('permission:chamber-staff-create', ['only' => ['create_chamber_staff','store_chamber_staff']]);
        // $this->middleware('permission:chamber-staff-edit', ['only' => ['edit_chamber_staff','update_chamber_staff']]);
        // $this->middleware('permission:chamber-staff-delete', ['only' => ['destroy_chamber_staff']]);

        // $this->middleware('permission:chamber-list|chamber-create|chamber-edit|chamber-delete', ['only' => ['index_chamber']]);
        // $this->middleware('permission:chamber-create', ['only' => ['create_chamber','store_chamber']]);
        // $this->middleware('permission:chamber-edit', ['only' => ['edit_chamber','update_chamber']]);
        // $this->middleware('permission:chamber-delete', ['only' => ['destroy_chamber']]);

        // $this->middleware('permission:internal-counsel-list|internal-counsel-create|internal-counsel-edit|internal-counsel-delete', ['only' => ['index_internal_counsel']]);
        // $this->middleware('permission:internal-counsel-create', ['only' => ['create_internal_counsel','store_internal_counsel']]);
        // $this->middleware('permission:internal-counsel-edit', ['only' => ['edit_internal_counsel','update_internal_counsel']]);
        // $this->middleware('permission:internal-counsel-delete', ['only' => ['destroy_internal_counsel']]);

    }


    public function index()
    {
        $data = Chamber::get();
        return view('counsel_lawyer.external_counsel.chamber.chamber',compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('counsel_lawyer.external_counsel.chamber.add_chamber');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
        // $data = json_decode(json_encode($request->all()));
        // echo "<pre>";print_r($data);die;

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

        // $data->head_of_chamber_signature = $request->head_of_chamber_signature;
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

        // $data->admin_of_chamber_signature = $request->admin_of_chamber_signature;
        $data->accountant = $request->accountant;
        // $data->accountant_signature = $request->accountant_signature;
        if ($request->hasfile('accountant_signature')) {
            $file = $request->file('accountant_signature');
            $original_name = $file->getClientOriginalName();
            $file_name = time().rand(1,0).$original_name;
            $file->move(public_path('files/chamber/accountant_signature'),$file_name);
            $data->accountant_signature = $file_name;
         }
        $data->head_clerk = $request->head_clerk;
        // $data->head_clerk_signature = $request->head_clerk_signature;
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

        DB::commit();

        session()->flash('success', 'Chamber Added Successfully.');
        return redirect()->route('chamber');

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
    public function edit($id)
    {
        $data = Chamber::find($id);
        $chamber_partner_explode = ChamberPartner::where('chamber_id', $id)->get()->toArray();
        $chamber_associate_explode = ChamberAssociate::where('chamber_id', $id)->get()->toArray();
        $chamber_clerk_explode = ChamberClerk::where('chamber_id', $id)->get()->toArray();
        $chamber_support_staff_explode = ChamberSupportStaff::where('chamber_id', $id)->get()->toArray();
        $chamber_accounts_explode = ChamberAccounts::where('chamber_id', $id)->get()->toArray();
        // dd($data);

        return view('counsel_lawyer.external_counsel.chamber.edit_chamber', compact('data','chamber_partner_explode','chamber_associate_explode','chamber_clerk_explode','chamber_support_staff_explode','chamber_accounts_explode'));


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

        // $data = json_decode(json_encode($request->all()));
        // echo "<pre>";print_r($data);die;

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

        $data = Chamber::find($id);
        $data->chamber_name = $request->chamber_name;

        $image_path = 'files/chamber_logo/'.$data['chamber_logo'];
// if file exists then remove it
        if($request->chamber_logo && file_exists($image_path)){
            unlink($image_path);
        }

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
        $data->head_of_chamber_signature = $request->head_of_chamber_signature;
        $data->admin_of_chamber = $request->admin_of_chamber;
        $data->admin_of_chamber_signature = $request->admin_of_chamber_signature;
        $data->accountant = $request->accountant;
        $data->accountant_signature = $request->accountant_signature;
        $data->head_clerk = $request->head_clerk;
        $data->head_clerk_signature = $request->head_clerk_signature;
        $data->letterhead_write_up = $request->letterhead_write_up;
        $data->letterhead_address = $request->letterhead_address;
        $data->save();

        ChamberPartner::where('chamber_id', $id)->delete();

        foreach ( array_filter($chamber_partner_sections) as $key => $value ){
            $datum = new ChamberPartner();
            $datum->chamber_id = $data->id;
            $datum->partner_of_chamber = $request->partner_of_chamber[$key];
            $datum->partner_of_chamber_signature = $request->partner_of_chamber_signature[$key];
            $datum->save();
        }

        ChamberAssociate::where('chamber_id', $id)->delete();

        foreach ( array_filter($associate_sections) as $key => $value ){
            $datum = new ChamberAssociate();
            $datum->chamber_id = $data->id;
            $datum->associate = $request->associate[$key];
            $datum->associate_signature = $request->associate_signature[$key];
            $datum->save();
        }

        ChamberClerk::where('chamber_id', $id)->delete();

        foreach ( array_filter($clerk_sections) as $key => $value ){
            $datum = new ChamberClerk();
            $datum->chamber_id = $data->id;
            $datum->clerk = $request->clerk[$key];
            $datum->clerk_signature = $request->clerk_signature[$key];
            $datum->save();
        }

        ChamberSupportStaff::where('chamber_id', $id)->delete();

        foreach ( array_filter($support_staff_sections) as $key => $value ){
            $datum = new ChamberSupportStaff();
            $datum->chamber_id = $data->id;
            $datum->support_staff = $request->support_staff[$key];
            $datum->support_staff_signature = $request->support_staff_signature[$key];
            $datum->save();
        }

        ChamberAccounts::where('chamber_id', $id)->delete();

        foreach ( array_filter($chamber_account_sections) as $key => $value ){
            $datum = new ChamberAccounts();
            $datum->chamber_id = $data->id;
            $datum->chamber_accounts = $request->chamber_accounts[$key];
            $datum->account_name = $request->account_name[$key];
            $datum->account_number = $request->account_number[$key];
            $datum->bank_name = $request->bank_name[$key];
            $datum->save();
        }

        DB::commit();

        session()->flash('success', 'Chamber Updated Successfully.');
        return redirect()->route('chamber');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Chamber::find($id)->delete();
        session()->flash('success', 'Counsel Deleted Successfully.');
        return redirect()->back();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_counsel()
    {
        $data = Counsel::where('counsel_type','External')->get();
        // dd($data);
        return view('counsel_lawyer.external_counsel.counsel.counsel',compact('data'));
    }

    public function employee_new()
    {
        $data =   $data = Counsel::where('counsel_type','Staff')->get();
        return view('employee.employee', compact('data'));
    }

    public function index_counsel_chamber()
    {
        $data = Counsel::where('counsel_type','External')->where('counsel_category','Chamber')->get();

        return view('counsel_lawyer.external_counsel.counsel.counsel',compact('data'));
    }
    public function index_counsel_company()
    {
        $data = Counsel::where('counsel_type','External')->where('counsel_category','Company')->get();

        return view('counsel_lawyer.external_counsel.counsel.counsel',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_counsel()
    {
        $chamber = Chamber::orderBy('id','asc')->get();
        $documents = SetupDocument::where('delete_status', 0)->orderBy('documents_name','asc')->get();
        $documents_type = SetupDocumentsType::where('delete_status',0)->orderBy('documents_type_name','asc')->get();
        return view('counsel_lawyer.external_counsel.counsel.add_counsel',compact('documents_type','documents','chamber'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_counsel(Request $request)
    {
        // $data = json_decode(json_encode($request->all()));
        // echo "<pre>";print_r($data);die;


        $received_documents_sections = $request->received_documents_sections;
        $remove = array_pop($received_documents_sections);

        $required_wanting_documents_sections = $request->required_wanting_documents_sections;
        $remove = array_pop($required_wanting_documents_sections);

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

        foreach ( array_filter($received_documents_sections) as $key => $value ){
            $datum = new CounselDocumentsReceived();
            $datum->counsel_id = $data->id;
            $datum->received_documents_id = $request->received_documents_id[$key];
            $datum->received_documents = $request->received_documents[$key];
            $datum->received_documents_date = $request->received_documents_date[$key];
            $datum->received_documents_type_id = $request->received_documents_type_id[$key];
            $datum->save();
        }


        foreach ( array_filter($required_wanting_documents_sections) as $key => $value ){
            $required = new CounselDocumentsRequired();
            $required->counsel_id = $data->id;
            $required->required_wanting_documents_id = $request->required_wanting_documents_id[$key];
            $required->required_wanting_documents = $request->required_wanting_documents[$key];
            $required->required_wanting_documents_date = $request->required_wanting_documents_date[$key];
            $required->required_wanting_documents_type_id = $request->required_wanting_documents_type_id[$key];
            $required->save();
        }


        session()->flash('success', 'Counsel Added Successfully');
        if ($request->counsel_type === 'Internal') {
            return redirect()->route('internal-counsel-new');
        }
        if ($request->counsel_type === 'Staff') {
            return redirect()->route('employee-new');
        }
        return redirect()->route('counsel');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_counsel($id)
    {
        $data = Counsel::with('documents_received.received_documents_name','documents_received.received_documents_type_name','documents_required.required_wanting_documents_name','documents_required.required_wanting_documents_type_name')->find($id);
        // data_array($data);
        return view('counsel_lawyer.external_counsel.counsel.show_counsel',compact('data'));
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
        return view('counsel_lawyer.external_counsel.counsel.edit_counsel',compact('required_wanting_documents_explode','chamber','received_documents_explode','documents_type','documents','data'));
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
        $received_documents_sections = $request->received_documents_sections;
        $remove = array_pop($received_documents_sections);

        $required_wanting_documents_sections = $request->required_wanting_documents_sections;
        $remove = array_pop($required_wanting_documents_sections);

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

        CounselDocumentsReceived::where('counsel_id', $id)->delete();

        foreach ( array_filter($received_documents_sections) as $key => $value ){
            $datum = new CounselDocumentsReceived();
            $datum->counsel_id = $data->id;
            $datum->received_documents_id = $request->received_documents_id[$key];
            $datum->received_documents = $request->received_documents[$key];
            $datum->received_documents_date = $request->received_documents_date[$key];
            $datum->received_documents_type_id = $request->received_documents_type_id[$key];
            $datum->save();
        }

        CounselDocumentsRequired::where('counsel_id', $id)->delete();

        foreach ( array_filter($required_wanting_documents_sections) as $key => $value ){
            $required = new CounselDocumentsRequired();
            $required->counsel_id = $data->id;
            $required->required_wanting_documents_id = $request->required_wanting_documents_id[$key];
            $required->required_wanting_documents = $request->required_wanting_documents[$key];
            $required->required_wanting_documents_date = $request->required_wanting_documents_date[$key];
            $required->required_wanting_documents_type_id = $request->required_wanting_documents_type_id[$key];
            $required->save();
        }


        session()->flash('success', 'Counsel Updated Successfully.');
       if ($request->counsel_type === 'Internal') {
        return redirect()->route('internal-counsel-new');
       }
         if ($request->counsel_type === 'Staff') {
         return redirect()->route('employee-new');
        }
        return redirect()->route('counsel');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_counsel($id)
    {
        Counsel::find($id)->delete();
        session()->flash('success', 'Counsel Deleted Successfully.');
        return redirect()->back();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_chamber_staff()
    {
        $data = ChamberStaff::get();
        // dd($data);
        return view('counsel_lawyer.external_counsel.chamber_staff.chamber_staff',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_chamber_staff()
    {
        $documents = SetupDocument::where('delete_status', 0)->orderBy('documents_name','asc')->get();
        $documents_type = SetupDocumentsType::where('delete_status',0)->orderBy('documents_type_name','asc')->get();
        return view('counsel_lawyer.external_counsel.chamber_staff.add_chamber_staff',compact('documents_type','documents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_chamber_staff(Request $request)
    {
        // dd($request->all());
        // $data = json_decode(json_encode($request->all()));
        // echo "<pre>";print_r($data);die;

        $received_documents_sections = $request->received_documents_sections;
        $remove = array_pop($received_documents_sections);

        $required_wanting_documents_sections = $request->required_wanting_documents_sections;
        $remove = array_pop($required_wanting_documents_sections);

        $data = new ChamberStaff();
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
        $data->professional_contact_number = $request->professional_contact_number;
        $data->professional_contact_number_write = $request->professional_contact_number_write;
        $data->professional_email = $request->professional_email;
        $data->professional_email_write = $request->professional_email_write;
        $data->professional_experience_one = $request->professional_experience_one;
        $data->professional_experience_two = $request->professional_experience_two;
        $data->date_of_joining = $request->date_of_joining == 'dd-mm-yyyy' || $request->date_of_joining == 'NaN-NaN-NaN' ? null : $request->date_of_joining;
        $data->save();

        foreach ( array_filter($received_documents_sections) as $key => $value ){
            $datum = new ChamberStaffDocumentsReceived();
            $datum->chamber_staff_id = $data->id;
            $datum->received_documents_id = $request->received_documents_id[$key];
            $datum->received_documents = $request->received_documents[$key];
            $datum->received_documents_date = $request->received_documents_date[$key];
            $datum->received_documents_type_id = $request->received_documents_type_id[$key];
            $datum->save();
        }


        foreach ( array_filter($required_wanting_documents_sections) as $key => $value ){
            $required = new ChamberStaffDocumentsRequired();
            $required->chamber_staff_id = $data->id;
            $required->required_wanting_documents_id = $request->required_wanting_documents_id[$key];
            $required->required_wanting_documents = $request->required_wanting_documents[$key];
            $required->required_wanting_documents_date = $request->required_wanting_documents_date[$key];
            $required->required_wanting_documents_type_id = $request->required_wanting_documents_type_id[$key];
            $required->save();
        }


        session()->flash('success', 'Chamber Staff Added Successfully.');
        return redirect()->route('chamber-staff');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_chamber_staff($id)
    {
        $data = ChamberStaff::with('documents_received','documents_required')->find($id);
        // data_array($data);
        return view('counsel_lawyer.external_counsel.chamber_staff.show_chamber_staff',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_chamber_staff($id)
    {
        $documents = SetupDocument::where('delete_status', 0)->orderBy('documents_name','asc')->get();
        $documents_type = SetupDocumentsType::where('delete_status',0)->orderBy('documents_type_name','asc')->get();
        $data = ChamberStaff::find($id);
        $received_documents_explode = ChamberStaffDocumentsReceived::where('chamber_staff_id', $id)->get()->toArray();
        $required_wanting_documents_explode = ChamberStaffDocumentsRequired::where('chamber_staff_id', $id)->get()->toArray();
        return view('counsel_lawyer.external_counsel.chamber_staff.edit_chamber_staff',compact('required_wanting_documents_explode','received_documents_explode','documents_type','documents','data'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_chamber_staff(Request $request, $id)
    {
        $received_documents_sections = $request->received_documents_sections;
        $remove = array_pop($received_documents_sections);

        $required_wanting_documents_sections = $request->required_wanting_documents_sections;
        $remove = array_pop($required_wanting_documents_sections);

        $data = ChamberStaff::find($id);
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
        $data->professional_contact_number = $request->professional_contact_number;
        $data->professional_contact_number_write = $request->professional_contact_number_write;
        $data->professional_email = $request->professional_email;
        $data->professional_email_write = $request->professional_email_write;
        $data->professional_experience_one = $request->professional_experience_one;
        $data->professional_experience_two = $request->professional_experience_two;
        $data->date_of_joining = $request->date_of_joining == 'dd-mm-yyyy' || $request->date_of_joining == 'NaN-NaN-NaN' ? null : $request->date_of_joining;
        $data->save();

        ChamberStaffDocumentsReceived::where('chamber_staff_id', $id)->delete();

        foreach ( array_filter($received_documents_sections) as $key => $value ){
            $datum = new ChamberStaffDocumentsReceived();
            $datum->chamber_staff_id = $data->id;
            $datum->received_documents_id = $request->received_documents_id[$key];
            $datum->received_documents = $request->received_documents[$key];
            $datum->received_documents_date = $request->received_documents_date[$key];
            $datum->received_documents_type_id = $request->received_documents_type_id[$key];
            $datum->save();
        }

        ChamberStaffDocumentsRequired::where('chamber_staff_id', $id)->delete();

        foreach ( array_filter($required_wanting_documents_sections) as $key => $value ){
            $required = new ChamberStaffDocumentsRequired();
            $required->chamber_staff_id = $data->id;
            $required->required_wanting_documents_id = $request->required_wanting_documents_id[$key];
            $required->required_wanting_documents = $request->required_wanting_documents[$key];
            $required->required_wanting_documents_date = $request->required_wanting_documents_date[$key];
            $required->required_wanting_documents_type_id = $request->required_wanting_documents_type_id[$key];
            $required->save();
        }


        session()->flash('success', 'Chamber Staff Updated Successfully.');
        return redirect()->route('chamber-staff');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_chamber_staff($id)
    {
        ChamberStaff::find($id)->delete();
        session()->flash('success', 'Chamber Staff Deleted Successfully.');
        return redirect()->back();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_internal_counsel()
    {
        $data = InternalCounsel::get();
        return view('counsel_lawyer.internal_counsel.internal_counsel',compact('data'));
    }

    public function index_internal_counsel_new()
    {
        $data = Counsel::where('counsel_type','Internal')->get();
       
        return view('counsel_lawyer.internal_counsel.internal_counsel',compact('data'));
    }
    public function index_internal_counsel_new_chamber()
    {
        $data = Counsel::where('counsel_type','Internal')->where('counsel_category','Chamber')->get();
        return view('counsel_lawyer.internal_counsel.internal_counsel',compact('data'));
    }
    public function index_internal_counsel_new_company()
    {
        $data = Counsel::where('counsel_type','Internal')->where('counsel_category','Company')->get();
        return view('counsel_lawyer.internal_counsel.internal_counsel',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_internal_counsel()
    {
        $documents = SetupDocument::where('delete_status', 0)->orderBy('documents_name','asc')->get();
        $documents_type = SetupDocumentsType::where('delete_status',0)->orderBy('documents_type_name','asc')->get();
        return view('counsel_lawyer.internal_counsel.add_internal_counsel',compact('documents_type','documents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_internal_counsel(Request $request)
    {
        // $data = json_decode(json_encode($request->all()));
        // echo "<pre>";print_r($data);die;

        $received_documents_sections = $request->received_documents_sections;
        $remove = array_pop($received_documents_sections);

        $required_wanting_documents_sections = $request->required_wanting_documents_sections;
        $remove = array_pop($required_wanting_documents_sections);

        $data = new InternalCounsel();
        $data->chamber_name = $request->chamber_name;
        $data->internal_counsel_role_id = $request->internal_counsel_role_id;
        $data->internal_counsel_name = $request->internal_counsel_name;
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

        foreach ( array_filter($received_documents_sections) as $key => $value ){
            $datum = new InternalCounselDocumentsReceived();
            $datum->internal_counsel_id = $data->id;
            $datum->received_documents_id = $request->received_documents_id[$key];
            $datum->received_documents = $request->received_documents[$key];
            $datum->received_documents_date = $request->received_documents_date[$key];
            $datum->received_documents_type_id = $request->received_documents_type_id[$key];
            $datum->save();
        }


        foreach ( array_filter($required_wanting_documents_sections) as $key => $value ){
            $required = new InternalCounselDocumentsRequired();
            $required->internal_counsel_id = $data->id;
            $required->required_wanting_documents_id = $request->required_wanting_documents_id[$key];
            $required->required_wanting_documents = $request->required_wanting_documents[$key];
            $required->required_wanting_documents_date = $request->required_wanting_documents_date[$key];
            $required->required_wanting_documents_type_id = $request->required_wanting_documents_type_id[$key];
            $required->save();
        }


        session()->flash('success', 'Internal Counsel Added Successfully');
        return redirect()->route('internal-counsel');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_internal_counsel($id)
    {
        $data = InternalCounsel::with('documents_received','documents_required')->find($id);
        // data_array($data);
        return view('counsel_lawyer.internal_counsel.show_internal_counsel',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_internal_counsel($id)
    {

        $documents = SetupDocument::where('delete_status', 0)->orderBy('documents_name','asc')->get();
        $documents_type = SetupDocumentsType::where('delete_status',0)->orderBy('documents_type_name','asc')->get();
        $data = InternalCounsel::find($id);
        $received_documents_explode = InternalCounselDocumentsReceived::where('internal_counsel_id', $id)->get()->toArray();
        $required_wanting_documents_explode = InternalCounselDocumentsRequired::where('internal_counsel_id', $id)->get()->toArray();
        // dd($received_documents_explode);
        return view('counsel_lawyer.internal_counsel.edit_internal_counsel',compact('required_wanting_documents_explode','received_documents_explode','documents_type','documents','data'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_internal_counsel(Request $request, $id)
    {
        $received_documents_sections = $request->received_documents_sections;
        $remove = array_pop($received_documents_sections);

        $required_wanting_documents_sections = $request->required_wanting_documents_sections;
        $remove = array_pop($required_wanting_documents_sections);

        $data = InternalCounsel::find($id);
        $data->chamber_name = $request->chamber_name;
        $data->internal_counsel_role_id = $request->internal_counsel_role_id;
        $data->internal_counsel_name = $request->internal_counsel_name;
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

        InternalCounselDocumentsReceived::where('internal_counsel_id', $id)->delete();

        foreach ( array_filter($received_documents_sections) as $key => $value ){
            $datum = new InternalCounselDocumentsReceived();
            $datum->internal_counsel_id = $data->id;
            $datum->received_documents_id = $request->received_documents_id[$key];
            $datum->received_documents = $request->received_documents[$key];
            $datum->received_documents_date = $request->received_documents_date[$key];
            $datum->received_documents_type_id = $request->received_documents_type_id[$key];
            $datum->save();
        }

        InternalCounselDocumentsRequired::where('internal_counsel_id', $id)->delete();

        foreach ( array_filter($required_wanting_documents_sections) as $key => $value ){
            $required = new InternalCounselDocumentsRequired();
            $required->internal_counsel_id = $data->id;
            $required->required_wanting_documents_id = $request->required_wanting_documents_id[$key];
            $required->required_wanting_documents = $request->required_wanting_documents[$key];
            $required->required_wanting_documents_date = $request->required_wanting_documents_date[$key];
            $required->required_wanting_documents_type_id = $request->required_wanting_documents_type_id[$key];
            $required->save();
        }


        session()->flash('success', 'Internal Counsel Updated Successfully.');
        return redirect()->route('internal-counsel');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_internal_counsel($id)
    {
        InternalCounsel::find($id)->delete();
        session()->flash('success', 'Internal Counsel Deleted Successfully.');
        return redirect()->back();
    }



}
