<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BillSchedule;
use App\Models\CriminalCasesBilling;
use App\Models\PaymentMode;
use App\Models\SetupBillParticular;
use Illuminate\Http\Request;
use App\Models\SetupExternalCouncil;
use App\Models\SetupBillType;
use App\Models\SetupBank;
use App\Models\SetupDigitalPayment;
use App\Models\SetupDistrict;
use App\Models\SetupBankBranch;
use App\Models\CivilCases;
use App\Models\CriminalCase;
use App\Models\LabourCase;
use App\Models\QuassiJudicialCase;
use App\Models\SupremeCourtCase;
use App\Models\HighCourtCase;
use App\Models\AppellateCourtCase;
use App\Models\CaseBilling;
use App\Models\SetupCaseTypes;
use DB;
use App\Models\Counsel;
use App\Models\SetupClient;
use App\Models\LedgerEntry;
use App\Models\LedgerHead;

class BillingsController extends Controller
{
    //

    function __construct()
    {
        $this->middleware('permission:billing-list', ['only' => ['billing']]);
        $this->middleware('permission:billing-add', ['only' => ['add_billing']]);
    }


    public function billing()
    {
        $data = DB::table('case_billings')
                ->leftJoin('setup_bill_types','case_billings.bill_type_id','=','setup_bill_types.id')
                ->leftJoin('setup_districts','case_billings.district_id','=','setup_districts.id')
                ->leftJoin('setup_external_councils','case_billings.panel_lawyer_id','=','setup_external_councils.id')
                ->leftJoin('setup_banks','case_billings.bank_id','=','setup_banks.id')
                ->leftJoin('setup_bank_branches','case_billings.branch_id','=','setup_bank_branches.id')
                ->leftJoin('setup_digital_payments','case_billings.digital_payment_type_id','=','setup_digital_payments.id')
                ->where('case_billings.delete_status',0)
                ->select('case_billings.*','setup_bill_types.bill_type_name','setup_districts.district_name','setup_external_councils.first_name','setup_external_councils.middle_name','setup_external_councils.last_name','setup_banks.bank_name','setup_bank_branches.bank_branch_name','setup_digital_payments.digital_payment_type_name')
                ->get();
        $external_council = SetupExternalCouncil::where('delete_status',0)->get();

        return view('litigation_management.billings.billings.billing_lists',compact('data','external_council'));
    }

    public function billings()
    {
        $data = DB::table('case_billings')
                ->leftJoin('setup_bill_types','case_billings.bill_type_id','=','setup_bill_types.id')
                ->leftJoin('setup_districts','case_billings.district_id','=','setup_districts.id')
                ->leftJoin('setup_external_councils','case_billings.panel_lawyer_id','=','setup_external_councils.id')
                ->leftJoin('setup_banks','case_billings.bank_id','=','setup_banks.id')
                ->leftJoin('setup_bank_branches','case_billings.branch_id','=','setup_bank_branches.id')
                ->leftJoin('setup_digital_payments','case_billings.digital_payment_type_id','=','setup_digital_payments.id')
                ->where('case_billings.delete_status',0)
                ->select('case_billings.*','setup_bill_types.bill_type_name','setup_districts.district_name','setup_external_councils.first_name','setup_external_councils.middle_name','setup_external_councils.last_name','setup_banks.bank_name','setup_bank_branches.bank_branch_name','setup_digital_payments.digital_payment_type_name')
                ->orderBy('id', 'DESC')
                ->get();

                //dd($data);
        $external_council = SetupExternalCouncil::where('delete_status',0)->get();

         //dd($data);

        return view('litigation_management.billings.billings.billings',compact('data','external_council'));
    }

    public function add_billing()
    {
        $bill_type = SetupBillType::where('delete_status',0)->get();
        $external_council = DB::table('counsels')->where('counsel_type','Internal')->get();
        $bank = SetupBank::where('delete_status',0)->get();
        $digital_payment_type = SetupDigitalPayment::where('delete_status',0)->get();
        $district = SetupDistrict::where('delete_status',0)->get();
        $case_types = SetupCaseTypes::where('delete_status', 0)->get();
        $client = SetupClient::where('delete_status', 0)->get();
        $ledgerHeads = LedgerHead::all();

        return view('litigation_management.billings.billings.add_billing',compact('external_council','bill_type','bank','digital_payment_type','district', 'case_types','client'));
    }

    public function add_billing_from_district_court($id)
    {
        $bill_type = SetupBillType::where('delete_status',0)->get();
        $external_council = SetupExternalCouncil::where('delete_status',0)->get();
        $bank = SetupBank::where('delete_status',0)->get();
        $digital_payment_type = SetupDigitalPayment::where('delete_status',0)->get();
        $district = SetupDistrict::where('delete_status',0)->get();
        $case_types = SetupCaseTypes::where('delete_status', 0)->get();
        $case_class = CriminalCase::find($id);
       // dd($case_class);
        $billing_log_new = DB::table('case_billings')
        ->leftJoin('setup_bill_types','case_billings.bill_type_id','=','setup_bill_types.id')
        ->leftJoin('setup_districts','case_billings.district_id','=','setup_districts.id')
        ->leftJoin('setup_external_councils','case_billings.panel_lawyer_id','=','setup_external_councils.id')
        ->leftJoin('setup_banks','case_billings.bank_id','=','setup_banks.id')
        ->leftJoin('setup_bank_branches','case_billings.branch_id','=','setup_bank_branches.id')
        ->leftJoin('setup_digital_payments','case_billings.digital_payment_type_id','=','setup_digital_payments.id')
        ->where(['case_billings.delete_status' => 0, 'case_billings.class_of_cases' => 'District Court', 'case_no' => $id])
        ->select('case_billings.*','setup_bill_types.bill_type_name','setup_districts.district_name','setup_external_councils.first_name','setup_external_councils.middle_name','setup_external_councils.last_name','setup_banks.bank_name','setup_bank_branches.bank_branch_name','setup_digital_payments.digital_payment_type_name')
        ->first();
        $data = DB::table('criminal_cases')
            ->leftJoin('setup_legal_issues', 'criminal_cases.legal_issue_id', '=', 'setup_legal_issues.id')
            ->leftJoin('setup_legal_services', 'criminal_cases.legal_service_id', '=', 'setup_legal_services.id')
            ->leftJoin('setup_complainants', 'criminal_cases.complainant_informant_id', '=', 'setup_complainants.id')
            ->leftJoin('setup_accuseds', 'criminal_cases.accused_id', '=', 'setup_accuseds.id')
            ->leftJoin('setup_in_favour_ofs', 'criminal_cases.in_favour_of_id', '=', 'setup_in_favour_ofs.id')
            ->leftJoin('setup_courts', 'criminal_cases.name_of_the_court_id', '=', 'setup_courts.id')
            ->leftJoin('setup_next_date_reasons', 'criminal_cases.next_date_fixed_id', '=', 'setup_next_date_reasons.id')
            ->leftJoin('setup_modes', 'criminal_cases.mode_of_receipt_id', '=', 'setup_modes.id')
            ->leftJoin('setup_referrers', 'criminal_cases.referrer_id', '=', 'setup_referrers.id')
            ->leftJoin('setup_in_favour_ofs as client_party', 'criminal_cases.client_party_id', '=', 'client_party.id')
            ->leftJoin('setup_client_categories', 'criminal_cases.client_category_id', '=', 'setup_client_categories.id')
            ->leftJoin('setup_client_subcategories', 'criminal_cases.client_subcategory_id', '=', 'setup_client_subcategories.id')
            ->leftJoin('setup_clients', 'criminal_cases.client_id', '=', 'setup_clients.id')
            ->leftJoin('setup_professions', 'criminal_cases.client_profession_id', '=', 'setup_professions.id')
            ->leftJoin('setup_divisions as client_division', 'criminal_cases.client_division_id', '=', 'client_division.id')
            ->leftJoin('setup_districts as client_district', 'criminal_cases.client_district_id', '=', 'client_district.id')
            ->leftJoin('setup_thanas as client_thana', 'criminal_cases.client_thana_id', '=', 'client_thana.id')
            ->leftJoin('setup_coordinators', 'criminal_cases.client_coordinator_tadbirkar_id', '=', 'setup_coordinators.id')
            ->leftJoin('setup_in_favour_ofs as opposition_party', 'criminal_cases.opposition_party_id', '=', 'opposition_party.id')
            ->leftJoin('setup_client_categories as opposition_category', 'criminal_cases.opposition_category_id', '=', 'opposition_category.id')
            ->leftJoin('setup_client_subcategories as opposition_subcategory', 'criminal_cases.opposition_subcategory_id', '=', 'opposition_subcategory.id')
            ->leftJoin('setup_clients as opposition', 'criminal_cases.opposition_id', '=', 'opposition.id')
            ->leftJoin('setup_professions as opposition_profession', 'criminal_cases.opposition_profession_id', '=', 'opposition_profession.id')
            ->leftJoin('setup_divisions as opposition_division', 'criminal_cases.opposition_division_id', '=', 'opposition_division.id')
            ->leftJoin('setup_districts as opposition_district', 'criminal_cases.opposition_district_id', '=', 'opposition_district.id')
            ->leftJoin('setup_thanas as opposition_thana', 'criminal_cases.opposition_thana_id', '=', 'opposition_thana.id')
            ->leftJoin('setup_coordinators as opposition_coordinator', 'criminal_cases.opposition_coordinator_tadbirkar_id', '=', 'opposition_coordinator.id')
            ->leftJoin('setup_external_councils', 'criminal_cases.lawyer_advocate_id', '=', 'setup_external_councils.id')
            ->leftJoin('setup_divisions as case_infos_division', 'criminal_cases.case_infos_division_id', '=', 'case_infos_division.id')
            ->leftJoin('setup_districts as case_infos_district', 'criminal_cases.case_infos_district_id', '=', 'case_infos_district.id')
            ->leftJoin('setup_thanas as case_infos_thana', 'criminal_cases.case_infos_thana_id', '=', 'case_infos_thana.id')
            ->leftJoin('setup_case_categories', 'criminal_cases.case_category_id', '=', 'setup_case_categories.id')
            ->leftJoin('setup_case_subcategories', 'criminal_cases.case_subcategory_id', '=', 'setup_case_subcategories.id')
            ->leftJoin('setup_case_titles as case_infos_case_title', 'criminal_cases.case_infos_case_title_id', '=', 'case_infos_case_title.id')
            ->leftJoin('setup_case_titles as sub_seq_case_infos_case_title', 'criminal_cases.case_infos_sub_seq_case_title_id', '=', 'sub_seq_case_infos_case_title.id')
            ->leftJoin('setup_matters', 'criminal_cases.matter_id', '=', 'setup_matters.id')
            ->leftJoin('setup_case_statuses', 'criminal_cases.case_status_id', '=', 'setup_case_statuses.id')
            ->leftJoin('setup_case_types', 'criminal_cases.case_type_id', '=', 'setup_case_types.id')
            ->leftJoin('setup_allegations', 'criminal_cases.case_infos_sub_seq_case_title_id', '=', 'setup_allegations.id')
            ->leftJoin('admins', 'criminal_cases.received_by_id', '=', 'admins.id')
            ->leftJoin('setup_cabinets', 'criminal_cases.cabinet_id', '=', 'setup_cabinets.id')
            ->leftJoin('setup_case_titles as case_infos_title', 'criminal_cases.case_infos_sub_seq_case_title_id', '=', 'case_infos_title.id')
            ->leftJoin('setup_groups as client_group', 'criminal_cases.client_group_id', '=', 'client_group.id')
            ->leftJoin('setup_groups as opposition_group', 'criminal_cases.opposition_group_id', '=', 'opposition_group.id')
            ->select('criminal_cases.*',
                'setup_referrers.referrer_name',
                'setup_client_categories.client_category_name',
                'setup_client_subcategories.client_subcategory_name',
                'setup_clients.client_name',
                'setup_professions.profession_name',
                'client_division.division_name as client_division_name',
                'client_district.district_name as client_district_name',
                'client_thana.thana_name as client_thana_name',
                'setup_coordinators.coordinator_name',
                'opposition_party.in_favour_of_name as oppsition_party_name',
                'opposition_category.client_category_name as opposition_category_name',
                'opposition_subcategory.client_subcategory_name as opposition_subcategory_name',
                'opposition.client_name as opposition_name',
                'opposition_profession.profession_name as opposition_profession_name',
                'opposition_division.division_name as opposition_division_name',
                'opposition_district.district_name as opposition_district_name',
                'opposition_thana.thana_name as opposition_thana_name',
                'opposition_coordinator.coordinator_name as opposition_coordinator_name',
                'setup_external_councils.first_name',
                'setup_external_councils.middle_name',
                'setup_external_councils.last_name',
                'case_infos_division.division_name as case_infos_division_name',
                'case_infos_district.district_name as case_infos_district_name',
                'case_infos_thana.thana_name as case_infos_thana_name',
                'setup_case_categories.case_category',
                'setup_case_subcategories.case_subcategory',
                'case_infos_case_title.case_title_name as case_infos_case_title_name',
                'sub_seq_case_infos_case_title.case_title_name as sub_seq_case_infos_case_title_name',
                'setup_matters.matter_name',
                'setup_case_statuses.case_status_name',
                'setup_case_types.case_types_name',
                'setup_cabinets.cabinet_name',
                'case_infos_title.case_title_name as sub_seq_case_title_name',
                'client_group.group_name as client_group_name',
                'opposition_group.group_name as opposition_group_name')
            ->where('criminal_cases.id', $id)
            ->first();
           // dd($data);
            $bill_id=$id;
        return view('litigation_management.billings.billings.test',compact('bill_id','billing_log_new','data','external_council','bill_type','bank','digital_payment_type','district', 'case_types', 'case_class'));
    }

    public function find_bank_branch(Request $request)
    {
        $bank_branch = SetupBankBranch::where('bank_id',$request->bank_id)->orderBy('bank_branch_name','asc')->get();
        return response()->json($bank_branch);
    }

    public function find_case_no(Request $request)
    {
        // return $request->all();

        if ($request->class_of_cases == "District Court") {

            $case = CriminalCase::where('case_type',"=",'District')->where('delete_status',0)->get();

        }else if ($request->class_of_cases == "Special Court"){

            $case = CriminalCase::where('case_type',"=",'Special')->where('delete_status',0)->get();

        }else if ($request->class_of_cases == "High Court Division"){

            $case = HighCourtCase::where('delete_status',0)->get();

        }else if ($request->class_of_cases == "Appellate Division"){

            $case = AppellateCourtCase::where('delete_status',0)->get();

        }

        return response()->json($case);
    }

    public function save_billing(Request $request)
    {
        
//        $rules = [
//            'bill_type_id' => 'required',
//            'payment_type' => 'required',
//            'district_id' => 'required',
//            'case_type' => 'required',
//            'case_no' => 'required',
//        ];
//
//        $validMsg = [
//            'bill_type_id.required' => 'Bill type field is required',
//            'payment_type.required' => 'Payment type field is required',
//            'district_id.required' => 'District field is required',
//            'case_type.required' => 'Case Type field is required',
//            'case_no.required' => 'Case No field is required',
//        ];
//
//        $this->validate($request, $rules, $validMsg);
        $latest = CaseBilling::latest()->first();
// data_array($latest);
        if ($latest != null) {
            $latest_no = explode('-', $latest->billing_no);
            $sl = $latest_no[1] + 1;
        } else {
            $sl = +1;
        }
        $billing_no = 'BL-000' . $sl;

        if ($request->date_of_billing != 'dd-mm-yyyy') {
            $date_of_billing_explode = explode('-', $request->date_of_billing);
            $date_of_billing_implode = implode('-', $date_of_billing_explode);
            $date_of_billing = date('Y-m-d', strtotime($date_of_billing_implode));
        } else {
            $date_of_billing = date('Y-m-d');
        }


        $data = new CaseBilling();
        $data->billing_no = $billing_no;
        $data->bill_type_id = $request->bill_type_id;
        $data->payment_type = $request->payment_type;
        $data->district_id = $request->district_id;
        $data->case_type_id = $request->case_type_id;
        $data->class_of_cases = $request->class_of_cases;
        $data->case_no = $request->case_no;

        $data->panel_lawyer_id = $request->panel_lawyer_id;
        $data->bill_amount = $request->bill_amount;
        $data->date_of_billing = $date_of_billing;
        $data->bank_id = $request->bank_id;
        $data->branch_id = $request->branch_id;
        $data->cheque_no = $request->cheque_no;
        $data->payment_amount = $request->payment_amount;
        $data->digital_payment_type_id = $request->digital_payment_type_id;
        $data->save();

        session()->flash('success','Bill Added Successfully');

        // if ($request->redirect_to == "Civil Cases") {

        //     return redirect()->route('civil-cases');

        // } else if ($request->redirect_to == "Criminal Cases"){

        //     return redirect()->route('criminal-cases');

        // }else if ($request->redirect_to == "Labour Cases"){

        //     return redirect()->route('labour-cases');

        // }else if ($request->redirect_to == "Special Quassi - Judicial Cases"){

        //     return redirect()->route('quassi-judicial-cases');

        // }else if ($request->redirect_to == "Supreme Court of Bangladesh"){

        //     return redirect()->route('supreme-court-cases');

        // }else if ($request->redirect_to == "High Court Division"){

        //     return redirect()->route('high-court-cases');

        // }else if ($request->redirect_to == "Appellate Court Division"){

        //     return redirect()->route('appellate-court-cases');

        // }else {

        //     return redirect()->route('billing');

        // }

        if ($request['save_and_return'] === "save_and_rt_payment") {
            return redirect()->route('ledger-entry.create');
        }

            return redirect()->route('billings');

    }

    public function edit_billing($id)
    {
        $bill_type = SetupBillType::where('delete_status',0)->get();
        $external_council = SetupExternalCouncil::where('delete_status',0)->get();
        $bank = SetupBank::where('delete_status',0)->get();
        $digital_payment_type = SetupDigitalPayment::where('delete_status',0)->get();
        $district = SetupDistrict::where('delete_status',0)->get();
        $bank_branch = SetupBankBranch::where('delete_status',0)->get();
        $data = CaseBilling::find($id);


        if ($data->case_type == "Civil Cases") {

            $case_no = CivilCases::where('delete_status',0)->get();

        } else if ($data->case_type == "Criminal Cases"){

            $case_no = CriminalCase::where('delete_status',0)->get();

        } else if ($data->case_type == "Labour Cases"){

            $case_no = LabourCase::where('delete_status',0)->get();

        } else if ($data->case_type == "Special Quassi - Judicial Cases"){

            $case_no = QuassiJudicialCase::where('delete_status',0)->get();

        } else if ($data->case_type == "Supreme Court of Bangladesh"){

            $case_no = SupremeCourtCase::where('delete_status',0)->get();

        } else if ($data->case_type == "High Court Division"){

            $case_no = HighCourtCase::where('delete_status',0)->get();

        } else if ($data->case_type == "Appellate Court Division"){

            $case_no = AppellateCourtCase::where('delete_status',0)->get();

        }

        return view('litigation_management.billings.billings.edit_billing',compact('data','external_council','bill_type','bank','digital_payment_type','district','case_no','bank_branch'));
    }

    public function update_billing(Request $request, $id)
    {

//        $rules = [
//            'bill_type_id' => 'required',
//            'payment_type' => 'required',
//            'district_id' => 'required',
//            'case_type' => 'required',
//            'case_no' => 'required',
//        ];
//
//        $validMsg = [
//            'bill_type_id.required' => 'Bill type field is required',
//            'payment_type.required' => 'Payment type field is required',
//            'district_id.required' => 'District field is required',
//            'case_type.required' => 'Case Type field is required',
//            'case_no.required' => 'Case No field is required',
//        ];
//
//        $this->validate($request, $rules, $validMsg);


        $data = CaseBilling::find($id);
        $data->bill_type_id = $request->bill_type_id;
        $data->payment_type = $request->payment_type;
        $data->district_id = $request->district_id;
        $data->case_type_id = $request->case_type_id;
        $data->class_of_cases = $request->class_of_cases;
        $data->case_no = $request->case_no;
        $data->panel_lawyer_id = $request->panel_lawyer_id;
        $data->bill_amount = $request->bill_amount;
        $data->date_of_billing = $request->date_of_billing;

        if($request->payment_type == "Cash Payment"){

            $data->bank_id = null;
            $data->branch_id = null;
            $data->cheque_no = null;
            $data->digital_payment_type_id = null;

        }else if($request->payment_type == "Bank Payment"){

            $data->bank_id = $request->bank_id;
            $data->branch_id = $request->branch_id;
            $data->cheque_no = $request->cheque_no;
            $data->digital_payment_type_id = null;

        }else if($request->payment_type == "Digital Payment"){

            $data->bank_id = null;
            $data->branch_id = null;
            $data->cheque_no = null;
            $data->digital_payment_type_id = $request->digital_payment_type_id;

        }

        $data->payment_amount = $request->payment_amount;
        $data->save();

        session()->flash('success','Bill Updated Successfully');
        return redirect()->route('billings');

    }

    public function add_billing_civil_cases($id)
    {

        $bill_type = SetupBillType::where('delete_status',0)->get();
        $external_council = SetupExternalCouncil::where('delete_status',0)->get();
        $bank = SetupBank::where('delete_status',0)->get();
        $digital_payment_type = SetupDigitalPayment::where('delete_status',0)->get();
        $district = SetupDistrict::where('delete_status',0)->get();
        $civil_case = CivilCases::find($id);

        return view('litigation_management.billings.billings.add_billing',compact('external_council','bill_type','bank','digital_payment_type','district','civil_case'));

    }

    public function add_billing_criminal_cases($id)
    {
        $bill_type = SetupBillType::where('delete_status',0)->get();
        $external_council = SetupExternalCouncil::where('delete_status',0)->get();
        $bank = SetupBank::where('delete_status',0)->get();
        $digital_payment_type = SetupDigitalPayment::where('delete_status',0)->get();
        $district = SetupDistrict::where('delete_status',0)->get();
        $criminal_case = CriminalCase::find($id);

        return view('litigation_management.billings.billings.add_billing',compact('external_council','bill_type','bank','digital_payment_type','district','criminal_case'));
    }

    public function add_criminal_cases_billling($id)
    {
        $external_council = SetupExternalCouncil::where('delete_status',0)->get();
        $bank = SetupBank::where('delete_status',0)->get();
        $digital_payment_type = SetupDigitalPayment::where('delete_status',0)->get();
        $district = SetupDistrict::where('delete_status',0)->get();

        $bill_type = SetupBillType::where('delete_status',0)->get();
        $bill_particulars = SetupBillParticular::where('delete_status',0)->get();
        $bill_schedule = BillSchedule::where('delete_status',0)->get();
        $payment_mode = PaymentMode::where('delete_status',0)->get();
        $data = CriminalCase::find($id);
//dd($payment_mode);
        return view('litigation_management.cases.criminal_cases.add_criminal_cases_billing',compact('payment_mode','bill_schedule','bill_particulars','external_council','bill_type','bank','digital_payment_type','district','data'));
    }

    public function delete_billing($id)
    {
        $data = CaseBilling::find($id);
        if ($data['delete_status'] == 1){
            $delete_status = 0;
        }else{
            $delete_status = 1;
        }
        $data->delete_status = $delete_status;
        $data->save();
        session()->flash('success', 'Billing Deleted');
        return redirect()->back();
    }

    public function add_billing_labour_cases($id)
    {

        $bill_type = SetupBillType::where('delete_status',0)->get();
        $external_council = SetupExternalCouncil::where('delete_status',0)->get();
        $bank = SetupBank::where('delete_status',0)->get();
        $digital_payment_type = SetupDigitalPayment::where('delete_status',0)->get();
        $district = SetupDistrict::where('delete_status',0)->get();
        $labour_case = LabourCase::find($id);

        return view('litigation_management.billings.billings.add_billing',compact('external_council','bill_type','bank','digital_payment_type','district','labour_case'));

    }

    public function add_billing_quassi_judicial_cases($id)
    {
        $bill_type = SetupBillType::where('delete_status',0)->get();
        $external_council = SetupExternalCouncil::where('delete_status',0)->get();
        $bank = SetupBank::where('delete_status',0)->get();
        $digital_payment_type = SetupDigitalPayment::where('delete_status',0)->get();
        $district = SetupDistrict::where('delete_status',0)->get();
        $quassi_judicial_case = QuassiJudicialCase::find($id);

        return view('litigation_management.billings.billings.add_billing',compact('external_council','bill_type','bank','digital_payment_type','district','quassi_judicial_case'));
    }

    public function add_billing_supreme_court_cases($id)
    {

        $bill_type = SetupBillType::where('delete_status',0)->get();
        $external_council = SetupExternalCouncil::where('delete_status',0)->get();
        $bank = SetupBank::where('delete_status',0)->get();
        $digital_payment_type = SetupDigitalPayment::where('delete_status',0)->get();
        $district = SetupDistrict::where('delete_status',0)->get();
        $supreme_court_case = SupremeCourtCase::find($id);

        return view('litigation_management.billings.billings.add_billing',compact('external_council','bill_type','bank','digital_payment_type','district','supreme_court_case'));

    }

    public function add_billing_high_court_cases($id)
    {
        $bill_type = SetupBillType::where('delete_status',0)->get();
        $external_council = SetupExternalCouncil::where('delete_status',0)->get();
        $bank = SetupBank::where('delete_status',0)->get();
        $digital_payment_type = SetupDigitalPayment::where('delete_status',0)->get();
        $district = SetupDistrict::where('delete_status',0)->get();
        $high_court_case = HighCourtCase::find($id);

        return view('litigation_management.billings.billings.add_billing',compact('external_council','bill_type','bank','digital_payment_type','district','high_court_case'));
    }

    public function add_billing_appellate_court_cases($id)
    {
        $bill_type = SetupBillType::where('delete_status',0)->get();
        $external_council = SetupExternalCouncil::where('delete_status',0)->get();
        $bank = SetupBank::where('delete_status',0)->get();
        $digital_payment_type = SetupDigitalPayment::where('delete_status',0)->get();
        $district = SetupDistrict::where('delete_status',0)->get();
        $appellate_court_case = AppellateCourtCase::find($id);

        return view('litigation_management.billings.billings.add_billing',compact('external_council','bill_type','bank','digital_payment_type','district','appellate_court_case'));
    }

    public function search_case_billings(Request $request)
    {

        $query = DB::table('case_billings')
                ->leftJoin('setup_bill_types','case_billings.bill_type_id','=','setup_bill_types.id')
                ->leftJoin('setup_districts','case_billings.district_id','=','setup_districts.id')
                ->leftJoin('setup_external_councils','case_billings.panel_lawyer_id','=','setup_external_councils.id')
                ->leftJoin('setup_banks','case_billings.bank_id','=','setup_banks.id')
                ->leftJoin('setup_bank_branches','case_billings.branch_id','=','setup_bank_branches.id')
                ->leftJoin('setup_digital_payments','case_billings.digital_payment_type_id','=','setup_digital_payments.id');

        if($request->case_type && $request->case_no){

            $data = $query->where(['case_billings.case_type' => $request->case_type,'case_billings.case_no' => $request->case_no, 'case_billings.delete_status' => 0])
                    ->select('case_billings.*','setup_bill_types.bill_type_name','setup_districts.district_name','setup_external_councils.first_name','setup_external_councils.middle_name','setup_external_councils.last_name','setup_banks.bank_name','setup_bank_branches.bank_branch_name','setup_digital_payments.digital_payment_type_name')
                    ->get();

        }elseif($request->case_type){

            $data = $query->where(['case_billings.case_type' => $request->case_type, 'case_billings.delete_status' => 0])
                    ->select('case_billings.*','setup_bill_types.bill_type_name','setup_districts.district_name','setup_external_councils.first_name','setup_external_councils.middle_name','setup_external_councils.last_name','setup_banks.bank_name','setup_bank_branches.bank_branch_name','setup_digital_payments.digital_payment_type_name')
                    ->get();

        }elseif($request->panel_lawyer_id){

            $data = $query->where(['case_billings.panel_lawyer_id' => $request->panel_lawyer_id, 'case_billings.delete_status' => 0])
                    ->select('case_billings.*','setup_bill_types.bill_type_name','setup_districts.district_name','setup_external_councils.first_name','setup_external_councils.middle_name','setup_external_councils.last_name','setup_banks.bank_name','setup_bank_branches.bank_branch_name','setup_digital_payments.digital_payment_type_name')
                    ->get();

        }elseif($request->date_of_billing){

            $data = $query->where(['case_billings.date_of_billing' => $request->date_of_billing, 'case_billings.delete_status' => 0])
                    ->select('case_billings.*','setup_bill_types.bill_type_name','setup_districts.district_name','setup_external_councils.first_name','setup_external_councils.middle_name','setup_external_councils.last_name','setup_banks.bank_name','setup_bank_branches.bank_branch_name','setup_digital_payments.digital_payment_type_name')
                    ->get();

        }else{

            $data = $query->select('case_billings.*','setup_bill_types.bill_type_name','setup_districts.district_name','setup_external_councils.first_name','setup_external_councils.middle_name','setup_external_councils.last_name','setup_banks.bank_name','setup_bank_branches.bank_branch_name','setup_digital_payments.digital_payment_type_name')
                    ->get();

        }

        return response()->json([
            'result' => 'billing',
            'data' => $data,
        ]);

    }

    public function save_criminal_cases_billing(Request $request, $id)
    {
//        $data = $request->all();
//        $data = json_decode(json_encode($data));
//        echo "<pre>";print_r($data);die();

        $due = $request->bill_amount - $request->payment_amount;

        $data = new CriminalCasesBilling();
        $data->case_id = $id;
        $data->bill_date = $request->bill_date == "dd-mm-yyyy" ? null : $request->bill_date;
        $data->bill_for_the_date = $request->bill_for_the_date == "dd-mm-yyyy" ? null : $request->bill_for_the_date;
        $data->bill_particulars_id = $request->bill_particulars_id ? implode(', ',$request->bill_particulars_id) : null;
        $data->bill_particulars = $request->bill_particulars;
        $data->bill_type_id = $request->bill_type_id;
        $data->bill_type = $request->bill_type;
        $data->bill_schedule_id = $request->bill_schedule_id;
        $data->bill_amount = $request->bill_amount;

        $data->payment_amount = $request->payment_amount;
        $data->due_amount = $due;
        $data->paid_due = $due<=0 ? 'Paid' : 'Due';

        $data->bill_submitted = $request->bill_submitted == "dd-mm-yyyy" ? null : $request->bill_submitted;
        $data->payment_received = $request->payment_received == "dd-mm-yyyy" ? null : $request->payment_received;
        $data->payment_mode_id = $request->payment_mode_id;
        $data->save();

        session()->flash('success', 'Criminal Cases Billing Added Successfully.');
        return redirect()->back();

    }

    public function edit_criminal_cases_billing($id)
    {
        // dd('adsfasdf');
        $bill_type = SetupBillType::where('delete_status',0)->get();
        $bill_particulars = SetupBillParticular::where('delete_status',0)->get();
        $bill_schedule = BillSchedule::where('delete_status',0)->get();
        $payment_mode = PaymentMode::where('delete_status',0)->get();
        $data = CriminalCasesBilling::find($id);
// dd($data);
        $explode_particulars = explode(', ',$data->bill_particulars_id);
// dd($explode_particulars);
        return view('litigation_management.cases.criminal_cases.edit_criminal_cases_billing',compact('payment_mode','bill_schedule','bill_particulars','bill_type','data','explode_particulars'));

    }

    public function update_criminal_cases_billing_submit(Request $request, $id)
    {

        $due = $request->bill_amount - $request->payment_amount;

        $data = CriminalCasesBilling::find($id);
        $data->bill_date = $request->bill_date == "dd-mm-yyyy" ? null : $request->bill_date;
        $data->bill_for_the_date = $request->bill_for_the_date == "dd-mm-yyyy" ? null : $request->bill_for_the_date;
        $data->bill_particulars_id = $request->bill_particulars_id ? implode(', ',$request->bill_particulars_id) : null;
        $data->bill_particulars = $request->bill_particulars;
        $data->bill_type_id = $request->bill_type_id;
        $data->bill_type = $request->bill_type;
        $data->bill_schedule_id = $request->bill_schedule_id;
        $data->bill_amount = $request->bill_amount;

        $data->payment_amount = $request->payment_amount;
        $data->due_amount = $due;
        $data->paid_due = $due<=0 ? 'Paid' : 'Due';

        $data->bill_submitted = $request->bill_submitted == "dd-mm-yyyy" ? null : $request->bill_submitted;
        $data->payment_received = $request->payment_received == "dd-mm-yyyy" ? null : $request->payment_received;
        $data->payment_mode_id = $request->payment_mode_id;
        $data->save();

        session()->flash('success', 'Criminal Cases Billing Updated Successfully.');
        return redirect()->route('view-criminal-cases',$data->case_id);

    }

    public function delete_criminal_cases_billing($id)
    {
        $data = CriminalCasesBilling::find($id);
        // dd($data);
        if ($data['delete_status'] == 1) {
            $delete_status = 0;
        } else {
            $delete_status = 1;
        }
        $data->delete_status = $delete_status;
        $data->save();

        session()->flash('success', 'Criminal Cases Deleted');
        return redirect()->back();
    }

    public function view_billing($id)
    {
        $data = DB::table('case_billings')
                ->leftJoin('setup_bill_types','case_billings.bill_type_id','=','setup_bill_types.id')
                ->leftJoin('setup_districts','case_billings.district_id','=','setup_districts.id')
                ->leftJoin('setup_external_councils','case_billings.panel_lawyer_id','=','setup_external_councils.id')
                ->leftJoin('setup_banks','case_billings.bank_id','=','setup_banks.id')
                ->leftJoin('setup_bank_branches','case_billings.branch_id','=','setup_bank_branches.id')
                ->leftJoin('setup_digital_payments','case_billings.digital_payment_type_id','=','setup_digital_payments.id')
                ->leftJoin('setup_case_types','case_billings.case_type_id','=','setup_case_types.id')
                ->where('case_billings.id', $id)
                ->select('case_billings.*','setup_bill_types.bill_type_name','setup_districts.district_name','setup_external_councils.first_name','setup_external_councils.middle_name','setup_external_councils.last_name','setup_banks.bank_name','setup_bank_branches.bank_branch_name','setup_digital_payments.digital_payment_type_name', 'setup_case_types.case_types_name')
                ->first();
                // dd($data);
        return view('litigation_management.billings.billings.view_billing',compact('data'));

    }
    public function view_money_receipt($id)
    {
        // $data = LedgerEntry::with('ledger_head','bill')->find($id);

        $data =DB::table('ledger_entries')
        ->join('case_billings','ledger_entries.bill_id','case_billings.id')
        ->join('ledger_heads','ledger_entries.ledger_head_id','ledger_heads.id')
        ->select('ledger_entries.*','ledger_heads.*','case_billings.*')
        ->where('ledger_entries.id',$id)->first();
         //dd($data);
        // if ($data->receipt_no == null) {
        //     $transcation_no = explode('-', $data->transaction_no);
        //     $data->receipt_no = 'RCPT-'.$transcation_no[1];
        //     $data->save();
        // }
             // data_array($data);
        return view('accounts.ledger_entry.show',compact('data'));
    }

    public function money_receipt_print_preview($id)
    {
        $data = LedgerEntry::with('ledger_head','bill')->find($id);
        // dd($data);

        return view('accounts.ledger_entry.money_receipt_print_preview', compact('data'));

    }


    public function edit_billings($id)
    {
        $bill_type = SetupBillType::where('delete_status',0)->get();
        $external_council = SetupExternalCouncil::where('delete_status',0)->get();
        $bank = SetupBank::where('delete_status',0)->get();
        $digital_payment_type = SetupDigitalPayment::where('delete_status',0)->get();
        $district = SetupDistrict::where('delete_status',0)->get();
        $bank_branch = SetupBankBranch::where('delete_status',0)->get();
        $case_types = SetupCaseTypes::where('delete_status', 0)->get();
        $data = CaseBilling::find($id);


        if ($data->class_of_cases == "District Court") {

            $case = CriminalCase::where('delete_status',0)->get();

        }else if ($data->class_of_cases == "Special Court"){

            $case = LabourCase::where('delete_status',0)->get();

        }else if ($data->class_of_cases == "High Court Division"){

            $case = HighCourtCase::where('delete_status',0)->get();

        }else if ($data->class_of_cases == "Appellate Division"){

            $case = AppellateCourtCase::where('delete_status',0)->get();

        }

        return view('litigation_management.billings.billings.edit_billing',compact('data','external_council','bill_type','bank','digital_payment_type','district','case','bank_branch','case_types'));
    }

    public function find_bill(Request $request)
    {
        // return $request->all();
        $data = CaseBilling::where(['id' => $request->bill_id, 'delete_status' => 0])->first();
        return response()->json($data);
    }

    public function find_ledger_head(Request $request)
    {
        // return $request->all();
        $data = LedgerHead::where(['ledger_category_id' => $request->ledger_category_id])->get();
        return response()->json($data);
    }
    public function billing_report(){

        $request_data = [
            'class_of_cases' => '',
            'case_no' => '',
            'from_date' => '',
            'to_date' => '',
        ];

        $data =DB::table('ledger_entries')
        ->join('case_billings','ledger_entries.bill_id','case_billings.id')
        ->select('case_billings.*','ledger_entries.*')
        ->where('delete_status', 0)
        ->get();

        $ledger_head = LedgerHead::all()->where('delete_status', 0);
        $is_search = 'Searched';
        $clients = SetupClient::where('delete_status', 0)->orderBy('client_name', 'asc')->get();

        return view('litigation_management.billings.billings.billing_report' ,compact('data', 'request_data', 'ledger_head', 'clients'));
    }
    public function billing_report_search(Request $request)
    {
        //dd($request);
        $request_data = $request->all();

        if ($request->from_date != "dd/mm/yyyy") {
            $from_next_date_explode = explode('/', $request->from_date);
            $from_next_date_implode = implode('-', $from_next_date_explode);
            $from_next_date = date('Y-m-d', strtotime($from_next_date_implode));
        } else if ($request->from_next_date == "dd/mm/yyyy") {
            $from_next_date = null;
        }

        if ($request->to_date != "dd/mm/yyyy") {
            $to_next_date_explode = explode('/', $request->to_date);
            $to_next_date_implode = implode('-', $to_next_date_explode);
            $to_next_date = date('Y-m-d', strtotime($to_next_date_implode));
        } else if ($request->to_next_date == "dd/mm/yyyy") {
            $to_next_date = null;
        }

        $bill_no = CaseBilling::where('delete_status', 0)->get();
        $query = CaseBilling::with('ledger');

        switch ($request->isMethod('get')) {
            case $request->class_of_cases != null && $request->case_no != null && $request->client != null && $request->from_date != null && $request->to_date != null:
                 $query2 =DB::table('ledger_entries')
                ->join('case_billings','ledger_entries.bill_id','case_billings.id')
                ->select('case_billings.*','ledger_entries.*')->where(['class_of_cases' => $request->class_of_cases, 'case_no' => $request->case_no, 'client_id' => $request->client])
                ->whereBetween('case_billings.date_of_billing', [$from_next_date, $to_next_date])
                ->get();
                break;
            case $request->class_of_cases != null && $request->case_no != null && $request->client != null :
                $query2 =DB::table('ledger_entries')
                ->join('case_billings','ledger_entries.bill_id','case_billings.id')
                ->select('case_billings.*','ledger_entries.*')->where(['class_of_cases' => $request->class_of_cases, 'case_no' => $request->case_no, 'client_id' => $request->client])
                ->where('case_billings.delete_status', 0)->get();
                break;
            case $request->class_of_cases != null :
                $query2 =DB::table('ledger_entries')
                ->join('case_billings','ledger_entries.bill_id','case_billings.id')
                ->select('case_billings.*','ledger_entries.*')->where(['class_of_cases' => $request->class_of_cases])
                  ->where('case_billings.delete_status', 0)->get();
                break;
            case $request->from_date != null && $request->to_date != null :
                $query2 =DB::table('ledger_entries')
                ->join('case_billings','ledger_entries.bill_id','case_billings.id')
                ->select('case_billings.*','ledger_entries.*') ->whereBetween('case_billings.date_of_billing', [$from_next_date, $to_next_date])
                ->where('case_billings.delete_status', 0)->get();

                break;
            case $request->class_of_cases != null && $request->case_no == null && $request->client == null:
                // $query2 = $query->where(['class_of_cases' => $request->class_of_cases, 'client_id' => $request->client_id]);
                $query2 =DB::table('ledger_entries')
                ->join('case_billings','ledger_entries.bill_id','case_billings.id')
                ->select('case_billings.*','ledger_entries.*')->where(['class_of_cases' => $request->class_of_cases, 'case_no' => $request->case_no])
                ->where('case_billings.delete_status', 0)->get();
                break;
                case $request->client != null :
                    // $query2 = $query->where(['class_of_cases' => $request->class_of_cases, 'client_id' => $request->client_id]);
                    $query2 =DB::table('ledger_entries')
                    ->join('case_billings','ledger_entries.bill_id','case_billings.id')
                    ->select('case_billings.*','ledger_entries.*')->where(['client_id' => $request->client])
                    ->where('case_billings.delete_status', 0)->get();
                    break;
            default:
                $query2 = DB::table('ledger_entries')
                ->join('case_billings','ledger_entries.bill_id','case_billings.id')
                ->select('case_billings.*','ledger_entries.*')
                ->where('case_billings.delete_status', 0)->get();
        }

        $data =$query2;
        $ledger_head = LedgerHead::all();
        $is_search = 'Searched';
        $ledger_head_name = LedgerHead::where('id', $request->ledger_head_id)->first();
        $clients = SetupClient::where('delete_status', 0)->orderBy('client_name', 'asc')->get();


        return view('litigation_management.billings.billings.billing_report', compact('data', 'request_data', 'ledger_head', 'is_search', 'bill_no', 'clients'));
    }
}
