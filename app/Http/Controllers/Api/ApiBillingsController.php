<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\models\SetupExternalCouncil;
USE App\models\SetupBillType;
use App\models\SetupBank;
use App\models\SetupDigitalPayment;
use App\models\SetupDistrict;
use App\models\SetupCaseTypes;
use App\models\SetupBankBranch;
use App\models\CriminalCase;
use App\models\LabourCase;
use App\models\HighCourtCase;
use App\models\AppellateCourtCase;
use App\models\CaseBilling;
use App\models\CivilCases;
use App\models\QuassiJudicialCase;
use App\models\SupremeCourtCase;
use App\models\BillSchedule;
use App\models\SetupBillParticular;
use App\models\PaymentMode;
use App\models\CriminalCasesBilling;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ApiBillingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

return response()->json([
    "status"=>200,
    "data"=>$data,
    "external_council"=>$external_council,
]);
}   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_billing()
    {
        $bill_type = SetupBillType::where('delete_status',0)->get();
        $external_council = SetupExternalCouncil::where('delete_status',0)->get();
        $bank = SetupBank::where('delete_status',0)->get();
        $digital_payment_type = SetupDigitalPayment::where('delete_status',0)->get();
        $district = SetupDistrict::where('delete_status',0)->get();
        $case_types = SetupCaseTypes::where('delete_status', 0)->get();

        return response()->json([
            "status"=>200,
            "external_council"=>$external_council,
            "bill_type"=>$bill_type,
            "bank"=>$bank,
            "digital_payment_type"=>$digital_payment_type,
            "district"=>$district,
            "case_types"=>$case_types,

            "message"=>"data get successfully"
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add_billing_from_district_court($id)
    {
        $bill_type = SetupBillType::where('delete_status',0)->get();
        $external_council = SetupExternalCouncil::where('delete_status',0)->get();
        $bank = SetupBank::where('delete_status',0)->get();
        $digital_payment_type = SetupDigitalPayment::where('delete_status',0)->get();
        $district = SetupDistrict::where('delete_status',0)->get();
        $case_types = SetupCaseTypes::where('delete_status', 0)->get();
        $case_class = CriminalCase::find($id);
       
        return response()->json([
            "status"=>200,
            "case_class"=>$case_class,
            "case_types"=>$case_types,
            "district"=>$district,
            "digital_payment_type"=>$digital_payment_type,
            "bank"=>$bank,
            "bill_type"=>$bill_type,
            "external_council"=>$external_council,

            "message"=>"data added successfully"
        ]);
    }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

      return response()->json([
        "status"=>200,
        "data"=>$data,
        "external_council"=>$external_council,
        "bill_type"=>$bill_type,
        "bank"=>$bank,
        "external_council"=>$digital_payment_type,
        "data"=>$district,
        "case_no"=>$case_no,
        "bank_branch"=>$bank_branch,
        "message"=>"data edited successfully"
      ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function add_billing_civil_cases($id)
    {

        $bill_type = SetupBillType::where('delete_status',0)->get();
        $external_council = SetupExternalCouncil::where('delete_status',0)->get();
        $bank = SetupBank::where('delete_status',0)->get();
        $digital_payment_type = SetupDigitalPayment::where('delete_status',0)->get();
        $district = SetupDistrict::where('delete_status',0)->get();
        $civil_case = CivilCases::find($id);

        return response()->json([
            "status"=>200,
            "external_council"=>$external_council,
            "bill_type"=>$bill_type,
            "bank"=>$bank,
            "digital_payment_type"=>$digital_payment_type,
            "district"=>$district,
            "civil_case"=>$civil_case,

            "message"=>"data addes successfully"
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function add_billing_criminal_cases($id)
    {
        $bill_type = SetupBillType::where('delete_status',0)->get();
        $external_council = SetupExternalCouncil::where('delete_status',0)->get();
        $bank = SetupBank::where('delete_status',0)->get();
        $digital_payment_type = SetupDigitalPayment::where('delete_status',0)->get();
        $district = SetupDistrict::where('delete_status',0)->get();
        $criminal_case = CriminalCase::find($id);

        
        return response()->json([
            "external_council"=>$external_council,
            "bill_type"=>$bill_type,
            "bank"=>$bank,
            "digital_payment_type"=>$digital_payment_type,
            "district"=>$district,
            "criminal_case"=>$criminal_case,

            "message"=>"data added successfully"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        return response()->json([
            "status"=>200,
            "payment_mode"=>$payment_mode,
            "bill_schedule"=>$bill_schedule,
            "bill_particulars"=>$bill_particulars,
            "external_council"=>$external_council,
            "bill_type"=>$bill_type,
            "bank"=>$bank,
            "digital_payment_type"=>$digital_payment_type,
            "district"=>$district,
            "data"=>$data,
            "message"=>"data added successfully"
        ]);
}
public function add_billing_labour_cases($id)
{

    $bill_type = SetupBillType::where('delete_status',0)->get();
    $external_council = SetupExternalCouncil::where('delete_status',0)->get();
    $bank = SetupBank::where('delete_status',0)->get();
    $digital_payment_type = SetupDigitalPayment::where('delete_status',0)->get();
    $district = SetupDistrict::where('delete_status',0)->get();
    $labour_case = LabourCase::find($id);

    return response()->json([
        "status"=>200,
        "external_council"=>$external_council,
        "bill_type"=>$bill_type,
        "bank"=>$bank,
        "digital_payment_type"=>$digital_payment_type,
        "district"=>$district,
        "labour_case"=>$labour_case,

        "message"=>"data get successfully"
    ]);

}
public function add_billing_quassi_judicial_cases($id)
    {
        $bill_type = SetupBillType::where('delete_status',0)->get();
        $external_council = SetupExternalCouncil::where('delete_status',0)->get();
        $bank = SetupBank::where('delete_status',0)->get();
        $digital_payment_type = SetupDigitalPayment::where('delete_status',0)->get();
        $district = SetupDistrict::where('delete_status',0)->get();
        $quassi_judicial_case = QuassiJudicialCase::find($id);

        return response()->json([
            "status"=>200,
            "bill_type"=>$bill_type,
            "external_council"=>$external_council,
            "bank"=>$bank,
            "digital_payment_type"=>$digital_payment_type,
            "district"=>$district,
            "quassi_judicial_case"=>$quassi_judicial_case,

            "message"=>"data get successfully"
        ]);
    }
    public function add_billing_supreme_court_cases($id)
    {

        $bill_type = SetupBillType::where('delete_status',0)->get();
        $external_council = SetupExternalCouncil::where('delete_status',0)->get();
        $bank = SetupBank::where('delete_status',0)->get();
        $digital_payment_type = SetupDigitalPayment::where('delete_status',0)->get();
        $district = SetupDistrict::where('delete_status',0)->get();
        $supreme_court_case = SupremeCourtCase::find($id);

        return response()->json([
            "status"=>200,
            "external_council"=>$external_council,
            "bill_type"=>$bill_type,
            "bank"=>$bank,
            "digital_payment_type"=>$digital_payment_type,
            "district"=>$district,
            "supreme_court_case"=>$supreme_court_case,

            "message"=>"data added successfully"
        ]);

    }
    public function add_billing_high_court_cases($id)
    {
        $bill_type = SetupBillType::where('delete_status',0)->get();
        $external_council = SetupExternalCouncil::where('delete_status',0)->get();
        $bank = SetupBank::where('delete_status',0)->get();
        $digital_payment_type = SetupDigitalPayment::where('delete_status',0)->get();
        $district = SetupDistrict::where('delete_status',0)->get();
        $high_court_case = HighCourtCase::find($id);

        return response()->json([
            "status"=>200,
            "external_council"=>$external_council,
            "bank"=>$bank,
            "bill_type"=>$bill_type,
            "digital_payment_type"=>$digital_payment_type,
            "district"=>$district,
            "high_court_case"=>$high_court_case,

            "message"=>"data get successfully"
        ]);
    }
    public function add_billing_appellate_court_cases($id)
    {
        $bill_type = SetupBillType::where('delete_status',0)->get();
        $external_council = SetupExternalCouncil::where('delete_status',0)->get();
        $bank = SetupBank::where('delete_status',0)->get();
        $digital_payment_type = SetupDigitalPayment::where('delete_status',0)->get();
        $district = SetupDistrict::where('delete_status',0)->get();
        $appellate_court_case = AppellateCourtCase::find($id);

        return response()->json([
            "status"=>200,
            "external_council"=>$external_council,
            "bank"=>$bank,
            "digital_payment_type"=>$digital_payment_type,
            "district"=>$district,
            "appellate_court_case"=>$appellate_court_case,

            "message"=>"data get successfully"
        ]);
    }
   

}