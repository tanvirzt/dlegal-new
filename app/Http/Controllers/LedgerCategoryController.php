<?php

namespace App\Http\Controllers;

use App\Models\LedgerCategory;
use Illuminate\Http\Request;

class LedgerCategoryController extends Controller
{
        /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $data = LedgerCategory::orderBy('id','desc')->get();
        return view('accounts.ledger_category.ledger_category', compact('data'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('accounts.ledger_category.add_ledger_category');
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
            'ledger_category_name' => 'required',
        ]);
        
        LedgerCategory::create($request->post());

        return redirect()->route('ledger-category.index')->with('success','Ledger Category has been created successfully.');
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\company  $company
    * @return \Illuminate\Http\Response
    */
    public function show(LedgerCategory $ledger_category)
    {
        return view('ledger_category.show',compact('ledger_category'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Company  $company
    * @return \Illuminate\Http\Response
    */
    public function edit(LedgerCategory $ledger_category)
    {
        return view('accounts.ledger_category.edit_ledger_category',compact('ledger_category'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\company  $company
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, LedgerCategory $ledger_category)
    {
        $request->validate([
            'ledger_category_name' => 'required',
        ]);
        
        $ledger_category->fill($request->post())->save();

        return redirect()->route('ledger-category.index')->with('success','Ledger Category has been updated successfully.');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Company  $company
    * @return \Illuminate\Http\Response
    */
    public function destroy(LedgerCategory $ledger_category)
    {
        $ledger_category->delete();
        return redirect()->route('ledger-category.index')->with('success','Ledger Category has been deleted successfully.');
    }
}
