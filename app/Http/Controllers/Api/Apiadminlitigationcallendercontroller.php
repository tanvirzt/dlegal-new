<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\models\SetupInternalCouncil;
use App\models\SetupClientName;
use App\models\SetupClient;
use App\models\SetupMatter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Apiadminlitigationcallendercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request$request)
    {
        // dd($request->all());

        $request_data = $request->all();

        $is_searched = 'Searched';
        $internal_council = SetupInternalCouncil::where('delete_status', 0)->get();
        $client_name = SetupClientName::where('delete_status', 0)->get();
        $client = SetupClient::where('delete_status', 0)->get();
        $matter = SetupMatter::where('delete_status', 0)->orderBy('matter_name', 'asc')->get();
        if ($request->from_date != "dd/mm/yyyy" && $request->to_date != "dd/mm/yyyy") {

            $from_date_explode = explode('/', $request->from_date);
            $from_date_implode = implode('-', $from_date_explode);
            $from_date = date('Y-m-d', strtotime($from_date_implode));

            $to_date_explode = explode('/', $request->to_date);
            $to_date_implode = implode('-', $to_date_explode);
            $to_date = date('Y-m-d', strtotime($to_date_implode));

            $criminal_cases_count = DB::table('criminal_cases')->distinct()->orderBy('next_date', 'asc')->where('delete_status', 0)->count(['next_date']);

            $criminal_cases = DB::table('criminal_cases')
                ->distinct()->orderBy('next_date', 'asc')
                ->where(['delete_status' => 0])
                // ->where('next_date','>=',date('Y-m-d'))
                ->where('next_date', '>=', $from_date)
                ->where('next_date', '<=', $to_date)->get(['next_date']);
                return response()->json([
                    "status" => 200,
                    "SetupInternalCouncil" => $internal_council,
                    "Setupclientname" => $client_name,
                    "Setupclient" => $client,
                    "SetupMatter" => $matter,
                    
                    "message" => " data searched successfully"
                ]);   
    } else if ($request->from_date != "dd/mm/yyyy") {

        $from_date_explode = explode('/', $request->from_date);
        $from_date_implode = implode('-', $from_date_explode);
        $from_date = date('Y-m-d', strtotime($from_date_implode));

        // $to_date_explode = explode('/', $request->to_date);
        // $to_date_implode = implode('-', $to_date_explode);
        // $to_date = date('Y-m-d', strtotime($to_date_implode));

        $criminal_cases_count = DB::table('criminal_cases')->distinct()->orderBy('next_date', 'asc')->where('delete_status', 0)->count(['next_date']);

        $criminal_cases = DB::table('criminal_cases')
            ->distinct()->orderBy('next_date', 'asc')
            ->where(['delete_status' => 0])
            // ->where('next_date','>=',date('Y-m-d'))
            ->where('next_date', '=', $from_date)
            ->get(['next_date']);
        $to_date = $from_date;

        return response()->json([
            "status" => 200,
            
            "SetupInternalCouncil" => $internal_council,
            "Setupclientname" => $client_name,
            "Setupclient" => $client,
            "SetupMatter" => $matter,
            
            "message" => " data searched successfully"
        ]);   
    } else if ($request->to_date != "dd/mm/yyyy") {

        $to_date_explode = explode('/', $request->to_date);
        $to_date_implode = implode('-', $to_date_explode);
        $to_date = date('Y-m-d', strtotime($to_date_implode));

        // $to_date_explode = explode('/', $request->to_date);
        // $to_date_implode = implode('-', $to_date_explode);
        // $to_date = date('Y-m-d', strtotime($to_date_implode));

        $criminal_cases_count = DB::table('criminal_cases')->distinct()->orderBy('next_date', 'asc')->where('delete_status', 0)->count(['next_date']);

        $criminal_cases = DB::table('criminal_cases')
            ->distinct()->orderBy('next_date', 'asc')
            ->where(['delete_status' => 0])
            // ->where('next_date','>=',date('Y-m-d'))
            ->where('next_date', '=', $to_date)
            ->get(['next_date']);
        $from_date = $to_date;

        return response()->json([
            "status" => 200,
            
            "SetupInternalCouncil" => $internal_council,
                    "Setupclientname" => $client_name,
                    "Setupclient" => $client,
                    "SetupMatter" => $matter,
            
            "message" => " data searched successfully"
        ]);   
    } else if ($request->lawyer_advocate_id) {

        $criminal_cases_count = DB::table('criminal_cases')->distinct()->orderBy('next_date', 'asc')->where('delete_status', 0)->count(['next_date']);

        $criminal_cases = DB::table('criminal_cases')
            ->distinct()->orderBy('next_date', 'asc')
            ->where(['delete_status' => 0])
            ->where('lawyer_advocate_id', '=', $request->lawyer_advocate_id)
            ->get(['next_date']);
        $from_date = date('Y-m-d');
        $to_date = date('Y-m-d');
        // dd($criminal_cases);
        return response()->json([
            "status" => 200,
            
            "SetupInternalCouncil" => $internal_council,
            "Setupclientname" => $client_name,
            "Setupclient" => $client,
            "SetupMatter" => $matter,
            
            "message" => " data searched successfully"
        ]);   
    } else if ($request->client_id) {

        $criminal_cases_count = DB::table('criminal_cases')->distinct()->orderBy('next_date', 'asc')->where('delete_status', 0)->count(['next_date']);

        $criminal_cases = DB::table('criminal_cases')
            ->distinct()->orderBy('next_date', 'asc')
            ->where(['delete_status' => 0])
            ->where('case_infos_complainant_informant_name', 'LIKE', "%{$request->client_id}%")
            ->orWhere('case_infos_accused_name', 'like', "%{$request->client_id}%")
            ->get(['next_date']);
        $from_date = date('Y-m-d');
        $to_date = date('Y-m-d');

        return response()->json([
            "status" => 200,
            
            "SetupInternalCouncil" => $internal_council,
            "Setupclientname" => $client_name,
            "Setupclient" => $client,
            "SetupMatter" => $matter,
            
            "message" => " data searched successfully"
        ]);   
    } else if ($request->client_name_write) {

        $criminal_cases_count = DB::table('criminal_cases')->distinct()->orderBy('next_date', 'asc')->where('delete_status', 0)->count(['next_date']);

        $criminal_cases = DB::table('criminal_cases')
            ->distinct()->orderBy('next_date', 'asc')
            ->where(['delete_status' => 0])
            ->where('criminal_cases.case_infos_complainant_informant_name', 'LIKE', "%{$request->client_name_write}%")
            ->orWhere('criminal_cases.case_infos_accused_name', 'like', "%{$request->client_name_write}%")
            ->get(['next_date']);
        $from_date = date('Y-m-d');
        $to_date = date('Y-m-d');

        return response()->json([
            "status" => 200,
            
            "SetupInternalCouncil" => $internal_council,
            "Setupclientname" => $client_name,
            "Setupclient" => $client,
            "SetupMatter" => $matter,
            
            "message" => " data searched successfully"
        ]);   
    } else if ($request->matter_id) {

        $criminal_cases_count = DB::table('criminal_cases')->distinct()->orderBy('next_date', 'asc')->where('delete_status', 0)->count(['next_date']);

        $criminal_cases = DB::table('criminal_cases')
            ->distinct()->orderBy('next_date', 'asc')
            ->where(['delete_status' => 0])
            ->where('matter_id', '=', $request->matter_id)
            ->get(['next_date']);
        $from_date = date('Y-m-d');
        $to_date = date('Y-m-d');
        // dd($criminal_cases);
        return response()->json([
            "status" => 200,
            
            "SetupInternalCouncil" => $internal_council,
            "Setupclientname" => $client_name,
            "Setupclient" => $client,
            "SetupMatter" => $matter,
            
            "message" => " data searched successfully"
        ]);   
    } else if ($request->matter_write) {

        $criminal_cases_count = DB::table('criminal_cases')->distinct()->orderBy('next_date', 'asc')->where('delete_status', 0)->count(['next_date']);

        $criminal_cases = DB::table('criminal_cases')
            ->distinct()->orderBy('next_date', 'asc')
            ->where(['delete_status' => 0])
            ->where('matter_write', '=', $request->matter_write)
            ->get(['next_date']);
        $from_date = date('Y-m-d');
        $to_date = date('Y-m-d');

        return response()->json([
            "status" => 200,
            
            "SetupInternalCouncil" => $internal_council,
                    "Setupclientname" => $client_name,
                    "Setupclient" => $client,
                    "SetupMatter" => $matter,
            
            "message" => " data searched successfully"
        ]);   
    } else if ($request->todays_case) {

        $from_date = date('Y-m-d');

        $criminal_cases_count = DB::table('criminal_cases')->distinct()->orderBy('next_date', 'asc')->where('delete_status', 0)->count(['next_date']);

        $criminal_cases = DB::table('criminal_cases')
            ->distinct()->orderBy('next_date', 'asc')
            ->where(['delete_status' => 0])
            // ->where('next_date','>=',date('Y-m-d'))
            ->where('next_date', '=', $from_date)
            ->get(['next_date']);
        $to_date = $from_date;

        return response()->json([
            "status" => 200,
            
            "SetupInternalCouncil" => $internal_council,
                    "Setupclientname" => $client_name,
                    "Setupclient" => $client,
                    "SetupMatter" => $matter,
            
            "message" => " data searched successfully"
        ]);   
    }else if ($request->tomorrows_case) {
        
        // $curr_date = date('Y-m-d');

        $from_date = date("Y-m-d", strtotime("tomorrow"));


        $criminal_cases_count = DB::table('criminal_cases')->distinct()->orderBy('next_date', 'asc')->where('delete_status', 0)->count(['next_date']);

        $criminal_cases = DB::table('criminal_cases')
            ->distinct()->orderBy('next_date', 'asc')
            ->where(['delete_status' => 0])
            // ->where('next_date','>=',date('Y-m-d'))
            ->where('next_date', '=', $from_date)
            ->get(['next_date']);
        $to_date = $from_date;

        return response()->json([
            "status" => 200,
            
            "SetupInternalCouncil" => $internal_council,
            "Setupclientname" => $client_name,
            "Setupclient" => $client,
            "SetupMatter" => $matter,
            
            "message" => " data searched successfully"
        ]);   
    } else {
        $from_date = date('Y-m-d');
        $to_date = date('Y-m-d');

        $criminal_cases_count = DB::table('criminal_cases')->distinct()->orderBy('next_date', 'asc')->where('delete_status', 0)->count(['next_date']);
        $criminal_cases = DB::table('criminal_cases')->distinct()->orderBy('next_date', 'asc')->where(['delete_status' => 0])->where('next_date', '>=', date('Y-m-d'))->get(['next_date']);
    
    return response()->json([
        "status" => 200,
        
        "SetupInternalCouncil" => $internal_council,
                    "Setupclientname" => $client_name,
                    "Setupclient" => $client,
                    "SetupMatter" => $matter,
        
        "message" => " data searched successfully"
    ]);   

}
}

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
