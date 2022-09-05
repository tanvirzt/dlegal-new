<?php

namespace App\Http\Controllers;

use App\Models\DomainSetup;
use App\Http\Requests\StoreDomainSetupRequest;
use App\Http\Requests\UpdateDomainSetupRequest;
use App\Models\SetupCompany;
use Illuminate\Http\Request;

class DomainSetupController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:domain-setup-list|domain-setup-create|domain-setup-edit|domain-setup-delete', ['only' => ['index','store']]);
        $this->middleware('permission:domain-setup-create', ['only' => ['create','store']]);
        $this->middleware('permission:domain-setup-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:domain-setup-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DomainSetup::orderBy('id', 'DESC')->get();
        return view('user_management.domain_setup.index',compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        dd('asdfasdf');
        $company = SetupCompany::pluck('company_name', 'id')->all();
//        dd($company);
        return view('user_management.domain_setup.create',compact('company'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDomainSetupRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDomainSetupRequest $request)
    {
        $data = $request->all();
        if ($request->hasfile('company_logo')) {
            $file = $request->file('company_logo');
            $original_name = $file->getClientOriginalName();
            $file_name = time().rand(1,0).$original_name;
            $file->move(public_path('files/company_logo'),$file_name);
            $data['company_logo'] = $file_name;
        }
        DomainSetup::create($data);
        session()->flash('success', 'Domain Added Successfully.');
        return redirect()->route('domain-setup.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DomainSetup  $domainSetup
     * @return \Illuminate\Http\Response
     */
    public function show(DomainSetup $domainSetup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DomainSetup  $domainSetup
     * @return \Illuminate\Http\Response
     */
    public function edit(DomainSetup $domainSetup)
    {
        $company = SetupCompany::pluck('company_name', 'id')->all();
        return view('user_management.domain_setup.edit', compact('domainSetup','company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDomainSetupRequest  $request
     * @param  \App\Models\DomainSetup  $domainSetup
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDomainSetupRequest $request, DomainSetup $domainSetup)
    {
        $data = $request->all();
        if ($request->hasfile('company_logo')) {
            if($domainSetup->company_logo != null){
                $file_path = 'files/company_logo/'.$domainSetup->company_logo;
                if(file_exists($file_path)){
                    unlink($file_path);
                }
            }
            $file = $request->file('company_logo');
            $original_name = $file->getClientOriginalName();
            $file_name = time().rand(1,0).$original_name;
            $file->move(public_path('files/company_logo'),$file_name);
            $data['company_logo'] = $file_name;
        }
        $domainSetup->update($data);
        session()->flash('success', 'Domain Updated Successfully.');
        return redirect()->route('domain-setup.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DomainSetup  $domainSetup
     * @return \Illuminate\Http\Response
     */
    public function destroy(DomainSetup $domainSetup)
    {
        $domainSetup->delete();
        session()->flash('success', 'Domain Deleted Successfully.');
        return redirect()->route('domain-setup.index');
    }
}
