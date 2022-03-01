<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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

class BillingsController extends Controller
{
    //

    public function billing()
    {
        return view('litigation_management.billings.billings.billing_lists');
    }

    public function add_billing()
    {
        $bill_type = SetupBillType::where('delete_status',0)->get();
        $external_council = SetupExternalCouncil::where('delete_status',0)->get();
        $bank = SetupBank::where('delete_status',0)->get();
        $digital_payment_type = SetupDigitalPayment::where('delete_status',0)->get();
        $district = SetupDistrict::where('delete_status',0)->get();
// dd($digital_payment_type);
        return view('litigation_management.billings.billings.add_billing',compact('external_council','bill_type','bank','digital_payment_type','district'));
    }

    public function find_bank_branch(Request $request)
    {
        // dd($request->bank_id);
        $bank_branch = SetupBankBranch::where('bank_id',$request->bank_id)->get();
        return response()->json($bank_branch);
    }

    public function find_case_no(Request $request)
    {
        if ($request->case_type == "Civil Cases") {

            $case = CivilCases::where('delete_status',0)->get();

        }else if ($request->case_type == "Criminal Cases"){

            $case = CriminalCase::where('delete_status',0)->get();

        }else if ($request->case_type == "Labour Cases"){

            $case = LabourCase::where('delete_status',0)->get();
            
        }else if ($request->case_type == "Special Quassi - Judicial Cases"){

            $case = QuassiJudicialCase::where('delete_status',0)->get();
            
        }else if ($request->case_type == "Supreme Court of Bangladesh"){

            $case = SupremeCourtCase::where('delete_status',0)->get();
            
        }else if ($request->case_type == "High Court Division"){

            $case = HighCourtCase::where('delete_status',0)->get();
            
        }else if ($request->case_type == "Appellate Court Division"){

            $case = AppellateCourtCase::where('delete_status',0)->get();
            
        }

        return response()->json($case);
    }

}
