<?php

namespace App\Http\Controllers;

use App\Models\LedgerEntry;
use App\Models\CaseBilling;
use App\Models\LedgerHead;
use App\Models\CriminalCase;
use Illuminate\Http\Request;
use App\Models\SetupClient;
class LedgerEntryController extends Controller
{
   
    public function index()
    {
        $data = LedgerEntry::with('bill','ledger_head')->orderBy('id','desc')->get();
        return view('accounts.ledger_entry.index', compact('data'));
    }


    public function create()
    {
        $bill_no = CaseBilling::where('delete_status', 0)->get();
        $ledger_head = LedgerHead::all();
        $latest = LedgerEntry::orderBy('id','DESC')->first();

        if ($latest != null) {
            $latest_no = explode('-', $latest->transaction_no);
            $sl = $latest_no[1] + 1;
        } else {
            $sl = +1;
        }
        $txn_no = 'TXN-000' . $sl;
        $client = SetupClient::where('delete_status', 0)->get();
        return view('accounts.ledger_entry.create', compact('bill_no','ledger_head','txn_no','client'));
    }


    public function store(Request $request)
    {
        $data = $request->all();
        if ($request->ledger_date != "dd/mm/yyyy") {
            $from_next_date_explode = explode('/', $request->ledger_date);
            $from_next_date_implode = implode('-', $from_next_date_explode);
            $data['ledger_date'] = date('Y-m-d', strtotime($from_next_date_implode));
        } else if ($request->ledger_date == "dd/mm/yyyy") {
            $data['ledger_date'] = null;
        }
        if($request->bill_id != null)
        {
            $is_exist = LedgerEntry::where('bill_id', $request->bill_id)->count();
           dd($request->bill_id);
            if ( $is_exist > 0 ) {
                $bill_amnt = CaseBilling::where('id', $request->bill_id)->first();
                $amnt = LedgerEntry::where('bill_id', $request->bill_id)->sum('paid_amount');
                $data['bill_amount'] = $bill_amnt->bill_amount - $amnt;
            }
          
        }else{
            $data['bill_amount']='';
        }

        $saveData = new LedgerEntry();

        $saveData->transaction_no = $request->transaction_no;
        $saveData->job_no = $request->job_no;
        $saveData->ledger_category_id = $request->ledger_category_id;
        $saveData->ledger_head_id = $request->ledger_head_id;
        $saveData->payment_against_bill = $request->payment_against_bill;
        $saveData->client_id = $data['client_id'];
        $saveData->bill_id = $request->bill_id;
        $saveData->ledger_date = $data['ledger_date'];
        $saveData->payment_type = $request->payment_type;
        $saveData->bill_amount = $data['bill_amount'];
        $saveData->paid_amount = $request->paid_amount;
        $saveData->remarks = $request->remarks;

        if ($request->ledger_category_id == 'Expense') {
            $saveData->expense_paid_amount = $request->paid_amount;
        } else {
            $saveData->income_paid_amount = $request->paid_amount;
        }

        $saveData->save();
     

        return redirect()->route('ledger-entry.index')->with('success','Ledger Entry has been created successfully.');
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\company  $company
    * @return \Illuminate\Http\Response
    */
    public function show(LedgerEntry $ledger_entry)
    {
        return view('ledger_entry.show',compact('ledger_entry'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Company  $company
    * @return \Illuminate\Http\Response
    */
    public function edit(LedgerEntry $ledger_entry)
    {
        $bill_no = CaseBilling::where('delete_status', 0)->get();
        $ledger_head = LedgerHead::where('ledger_category_id', $ledger_entry->ledger_category_id)->get();
        // dd($ledger_head);
        return view('accounts.ledger_entry.edit',compact('ledger_entry', 'bill_no', 'ledger_head'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\company  $company
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, LedgerEntry $ledger_entry)
    {
        // $request->validate([
        //     'transaction_no' => 'required',
        //     'payment_type' => 'required',
        // ]);

        // dd($request->all());

        $data = $request->post();

        if ($request->ledger_date != "dd/mm/yyyy") {
            $from_next_date_explode = explode('/', $request->ledger_date);
            $from_next_date_implode = implode('-', $from_next_date_explode);
            $data['ledger_date'] = date('Y-m-d', strtotime($from_next_date_implode));
        } else if ($request->ledger_date == "dd/mm/yyyy") {
            $data['ledger_date'] = null;
        }

        if ($request->ledger_category_id == 'Expense') {
            $data['expense_paid_amount'] = $request->paid_amount;
            $data['income_paid_amount'] = null;
        } else {
            $data['expense_paid_amount'] = null;
            $data['income_paid_amount'] = $request->paid_amount;
        }


        if ($request->payment_against_bill != null) {
            // dd('tes asdf asdf ');
            $data['payment_against_bill'] = 'on';
            $data['bill_id'] = $request->bill_id;
        } else {
            // dd('No payment against bill');
            $data['payment_against_bill'] = null;
            $data['bill_id'] = null;

        }


        $ledger_entry->fill($data)->save();

        return redirect()->route('ledger-entry.index')->with('success','Ledger Entry has been updated successfully.');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Company  $company
    * @return \Illuminate\Http\Response
    */
    public function destroy(LedgerEntry $ledger_entry)
    {
        $ledger_entry->delete();
        return redirect()->route('ledger-entry.index')->with('success','Ledger Entry has been deleted successfully.');
    }


    public function add_ledger_entry($id)
    {
        $bill_no = CaseBilling::where('delete_status', 0)->get();
        $ledger_head = LedgerHead::all();
        $latest = LedgerEntry::orderBy('id','DESC')->first();

        if ($latest != null) {
            $latest_no = explode('-', $latest->transaction_no);
            $sl = $latest_no[1] + 1;
        } else {
            $sl = +1;
        }
        $txn_no = 'TXN-000' . $sl;
// dd($txn_no);

        // $bill_type = SetupBillType::where('delete_status',0)->get();
        // $external_council = SetupExternalCouncil::where('delete_status',0)->get();
        // $bank = SetupBank::where('delete_status',0)->get();
        // $digital_payment_type = SetupDigitalPayment::where('delete_status',0)->get();
        // $district = SetupDistrict::where('delete_status',0)->get();
        // $case_types = SetupCaseTypes::where('delete_status', 0)->get();

        $case_class = CriminalCase::find($id);
        $single_case_bill = CaseBilling::find($id);

        $client = SetupClient::where('delete_status', 0)->get();

        return view('accounts.ledger_entry.create', compact('client','bill_no','ledger_head','txn_no', 'case_class', 'single_case_bill'));
    }


}
