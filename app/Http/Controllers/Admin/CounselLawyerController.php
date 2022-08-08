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

class CounselLawyerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('hello');
        $data = SetupExternalCouncil::get();
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
    public function edit($id)
    {
        //
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


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_counsel()
    {
        $data = Counsel::get();
        // dd($data);
        return view('counsel_lawyer.external_counsel.counsel.counsel',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_counsel()
    {
        $documents = SetupDocument::where('delete_status', 0)->orderBy('documents_name','asc')->get();
        $documents_type = SetupDocumentsType::where('delete_status',0)->orderBy('documents_type_name','asc')->get();
        return view('counsel_lawyer.external_counsel.counsel.add_counsel',compact('documents_type','documents'));
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
        $data->bar_council_enrollment_date = $request->bar_council_enrollment_date;
        $data->bar_council_enrollment_sanad_no = $request->bar_council_enrollment_sanad_no;
        $data->mother_bar_name = $request->mother_bar_name;
        $data->mother_bar_membership_number = $request->mother_bar_membership_number;
        $data->practicing_bar_date = $request->practicing_bar_date;
        $data->practicing_bar_membership_number = $request->practicing_bar_membership_number;
        $data->high_court_enrollment_date = $request->high_court_enrollment_date;
        $data->high_court_enrollment_membership_number = $request->high_court_enrollment_membership_number;
        $data->bar_council_fees = $request->bar_council_fees;
        $data->bar_council_fees_write = $request->bar_council_fees_write;
        $data->district_bar_mem_fee = $request->district_bar_mem_fee;
        $data->district_bar_mem_write = $request->district_bar_mem_write;
        $data->scba_memb_fee = $request->scba_memb_fee;
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
        return redirect()->route('counsel');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function counsel_show($id)
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

        $documents = SetupDocument::where('delete_status', 0)->orderBy('documents_name','asc')->get();
        $documents_type = SetupDocumentsType::where('delete_status',0)->orderBy('documents_type_name','asc')->get();
        $data = Counsel::find($id);
        $received_documents_explode = CounselDocumentsReceived::where('counsel_id', $id)->get()->toArray();
        $required_wanting_documents_explode = CounselDocumentsRequired::where('counsel_id', $id)->get()->toArray();
        // dd($received_documents_explode);
        return view('counsel_lawyer.external_counsel.counsel.edit_counsel',compact('required_wanting_documents_explode','received_documents_explode','documents_type','documents','data'));

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
        $data->bar_council_enrollment_date = $request->bar_council_enrollment_date;
        $data->bar_council_enrollment_sanad_no = $request->bar_council_enrollment_sanad_no;
        $data->mother_bar_name = $request->mother_bar_name;
        $data->mother_bar_membership_number = $request->mother_bar_membership_number;
        $data->practicing_bar_date = $request->practicing_bar_date;
        $data->practicing_bar_membership_number = $request->practicing_bar_membership_number;
        $data->high_court_enrollment_date = $request->high_court_enrollment_date;
        $data->high_court_enrollment_membership_number = $request->high_court_enrollment_membership_number;
        $data->bar_council_fees = $request->bar_council_fees;
        $data->bar_council_fees_write = $request->bar_council_fees_write;
        $data->district_bar_mem_fee = $request->district_bar_mem_fee;
        $data->district_bar_mem_write = $request->district_bar_mem_write;
        $data->scba_memb_fee = $request->scba_memb_fee;
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
    public function chamber_staff_show($id)
    {
        //
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

}
