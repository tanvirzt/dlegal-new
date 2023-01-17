<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CaseBilling;
use App\Models\CriminalCase;
use App\Models\LedgerEntry;
use App\Models\LedgerHead;
use Illuminate\Http\Request;

class ApiLedgerEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = LedgerEntry::with('bill','ledger_head')->orderBy('id','desc')->get();
        return response()->json([
            "status"=>200,
            "data"=>$data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function  add_ledger_entry($id)
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


        $case_class = CriminalCase::find($id);
        $single_case_bill = CaseBilling::find($id);
        return response()->json([
            "status"=>200,
            "case_class"=>$case_class,
            "single_case_bill"=>$single_case_bill,
            "ledger_head"=>$ledger_head,
            "bill_no"=>$bill_no,
            "txn_no"=>$txn_no,
        ]);

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
}
