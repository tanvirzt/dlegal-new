<?php

namespace App\Http\Controllers;

use App\Models\LedgerEntry;
use App\Models\CaseBilling;
use App\Models\LedgerHead;
use Illuminate\Http\Request;

class LedgerEntryController extends Controller
{
        /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $data = LedgerEntry::orderBy('id','desc')->get();
        // dd($data);
        return view('accounts.ledger_entry.index', compact('data'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
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

        return view('accounts.ledger_entry.create', compact('bill_no','ledger_head','txn_no'));
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        // request_array($request->all());

        $request->validate([
            'transaction_no' => 'required',
            // 'job_no' => 'required',
            'payment_type' => 'required',
        ]);

        LedgerEntry::create($request->post());

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
        $ledger_head = LedgerHead::all();
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
        $request->validate([
            'transaction_no' => 'required',
            // 'job_no' => 'required',
            'payment_type' => 'required',
        ]);

        $data = $request->post();

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


}
