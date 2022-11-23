<?php

namespace App\Http\Controllers;

use App\Models\LedgerHead;
use App\Models\LedgerCategory;
use Illuminate\Http\Request;

class LedgerHeadController extends Controller
{
        /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $data = LedgerHead::with('ledger_category')->orderBy('id','desc')->get();
        // dd($data);
        return view('accounts.ledger_head.index', compact('data'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $ledger_category = LedgerCategory::orderBy('id','DESC')->get();
        return view('accounts.ledger_head.create', compact('ledger_category'));
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $request->validate([
            'ledger_head_name' => 'required',
            'ledger_category_id' => 'required',
        ]);
        
        LedgerHead::create($request->post());

        return redirect()->route('ledger-head.index')->with('success','Ledger Head has been created successfully.');
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\company  $company
    * @return \Illuminate\Http\Response
    */
    public function show(LedgerHead $ledger_head)
    {
        return view('ledger_head.show',compact('ledger_head'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Company  $company
    * @return \Illuminate\Http\Response
    */
    public function edit(LedgerHead $ledger_head)
    {
        $ledger_category = LedgerCategory::orderBy('id','DESC')->get();
        return view('accounts.ledger_head.edit',compact('ledger_head','ledger_category'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\company  $company
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, LedgerHead $ledger_head)
    {
        $request->validate([
            'ledger_head_name' => 'required',
            'ledger_category_id' => 'required',
        ]);
        
        $ledger_head->fill($request->post())->save();

        return redirect()->route('ledger-head.index')->with('success','Ledger Head has been updated successfully.');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Company  $company
    * @return \Illuminate\Http\Response
    */
    public function destroy(LedgerHead $ledger_head)
    {
        $ledger_head->delete();
        return redirect()->route('ledger-head.index')->with('success','Ledger Head has been deleted successfully.');
    }
}
