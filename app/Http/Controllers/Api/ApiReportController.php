<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CaseBilling;
use App\Models\LedgerEntry;
use App\Models\LedgerHead;
use App\Models\SetupClient;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ledger_report()
    {
        $request_data = [
            'ledger_head_id' => '',
            'ledger_head_name' => '',
            'class_of_cases' => '',
            'case_no' => '',
        ];
        $ledger_head = LedgerHead::all();
        return response()->json([
            "status"=>200,
            "request_data"=>$request_data,
            "ledger_head"=>$ledger_head,

            "message"=>"data get successfully"
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function  ledger_report_search(Request $request)
    {
        
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


        $query = DB::table('ledger_entries')
            ->leftJoin('ledger_heads', 'ledger_entries.ledger_head_id', 'ledger_heads.id')
            ->leftJoin('case_billings', 'case_billings.id', 'ledger_entries.bill_id')
            ->where('ledger_entries.ledger_head_id', $request->ledger_head_id);

        switch ($request->isMethod('get')) {

            case $request->from_date != 'dd-mm-yyyy' && $request->to_date != 'dd-mm-yyyy':
                $query2 = $query->whereBetween('ledger_entries.ledger_date', array($from_next_date, $to_next_date));
                break;

            default:
                $query2 = $query;
        }

        $data = $query2->select('ledger_entries.*', 'ledger_heads.ledger_code', 'ledger_heads.ledger_head_name', 'case_billings.billing_no', 'case_billings.payment_type', 'case_billings.class_of_cases', 'case_billings.case_no')
            ->get();
        $ledger_head = LedgerHead::all();
        $is_search = 'Searched';
        $ledger_head_name = LedgerHead::where('id', $request->ledger_head_id)->first();
        return response()->json([
            "status"=>200,
            "data"=>$data,
            "request_data"=>$request_data,
            "ledger_head"=>$ledger_head,
            "is_search"=>$is_search,
            "ledger_head_name"=>$ledger_head_name,

            "message"=>"data searched successfully"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function print_ledger_report(Request $request)
    {
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

        $query = DB::table('ledger_entries')
            ->leftJoin('ledger_heads', 'ledger_entries.ledger_head_id', 'ledger_heads.id')
            ->leftJoin('case_billings', 'case_billings.id', 'ledger_entries.bill_id')
            ->where('ledger_entries.ledger_head_id', $request->ledger_head_id);

        switch ($request->isMethod('get')) {

            case $request->from_date != 'dd-mm-yyyy' && $request->to_date != 'dd-mm-yyyy':
                $query2 = $query->whereBetween('ledger_entries.ledger_date', array($from_next_date, $to_next_date));
                break;

            default:
                $query2 = $query;
        }

        $data = $query2->select('ledger_entries.*', 'ledger_heads.ledger_code', 'ledger_heads.ledger_head_name', 'case_billings.billing_no', 'case_billings.payment_type', 'case_billings.class_of_cases', 'case_billings.case_no')
            ->get();
        $ledger_head = LedgerHead::all();
        $is_search = 'Searched';
        $ledger_head_name = LedgerHead::where('id', $request->ledger_head_id)->first();
        return response()->json([
            "status"=>200,
            "data"=>$data,
            "request_data"=>$request_data,
            "ledger_head"=>$ledger_head,
            "is_search"=>$is_search,
            "ledger_head_name"=>$ledger_head_name,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ledger_head_report_list()
    {
        $request_data = [
            'ledger_type' => '',
        ];
        $data = LedgerEntry::with('ledger_head')->orderBy('id', 'DESC')->get();
        $ledger_head = LedgerHead::all();
        return response()->json([
            "status"=>200,
            "data"=>$data,
            "ledger_head"=>$ledger_head,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ledger_head_report_list_search(Request $request)
    {
        $request_data = $request->all();

        $data = LedgerEntry::with('ledger_head')->where('ledger_type', $request->ledger_type)->orderBy('id', 'DESC')->get();
        $ledger_head = LedgerHead::all();
        $is_search = 'Searched';
        return response()->json([
            "status"=>200,
            "request_data"=>$request_data,
            "data"=>$data,
            "ledger_head"=>$ledger_head,
            "is_search"=>$is_search,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function print_ledger_head_report_list(Request $request)
    {
        $request_data = $request->all();

        $data = LedgerEntry::with('ledger_head')->where('ledger_type', $request->ledger_type)->orderBy('id', 'DESC')->get();
        $ledger_head = LedgerHead::all();
        $is_search = 'Searched';
        return response()->json([
            "status"=>200,
            "request_data"=>$request_data,
            "data"=>$data,
            "ledger_head"=>$ledger_head,
            "is_search"=>$is_search,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function income_expense_report()
    {
        $request_data = [
            'ledger_type' => '',
            'from_date' => '',
            'to_date' => '',
        ];
        $data = LedgerEntry::with('ledger_head')->orderBy('id', 'DESC')->get();
        $ledger_head = DB::table('ledger_heads')->get();
      
        $clients = SetupClient::where('delete_status', 0)->orderBy('client_name', 'asc')->get();
        return response()->json([
            "status"=>200,
            "request_data"=>$request_data,
            "data"=>$data,
            "ledger_head"=>$ledger_head,
            "clients"=>$clients,
        ]);
    }
    public function print_income_expense_report(Request $request)
    {

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

        $query = LedgerEntry::with('ledger_head');

        switch ($request->isMethod('get')) {
            case $request->ledger_type != null:
                $query2 = $query->where('ledger_type', $request->ledger_type);
                break;
            case $request->from_date != null && $request->to_date != null:
                $query2 = $query->whereBetween('ledger_date', array($from_next_date, $to_next_date));
                break;
            default:
                $query2 = $query;
        }

        $data = $query2->orderBy('id', 'DESC')->get();
    
        $ledger_head = LedgerHead::all();
        $is_search = 'Searched';
        return response()->json([
            "status"=>200,
            "request_data"=>$request_data,
            "data"=>$data,
            "ledger_head"=>$ledger_head,
            "is_search"=>$is_search,
        ]);

}
public function income_expense_report_search(Request $request)
    {

       
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
        $query = LedgerEntry::with('ledger_head');

        switch ($request->isMethod('get')) {
            case $request->client != null && $request->ledger_type != null :
                $query2 = $query->where(['client_id' => $request->client,'ledger_type' => $request->ledger_type]);
                break;
            case $request->client != null :
                $query2 = $query->where(['client_id' => $request->client]);
                //dd($query2);
                break;
            case $request->client != null && $request->ledger_type != null && $request->from_date != null && $request->to_date != null:
                $query2 = $query->where(['client_id' => $request->client,'ledger_type' => $request->ledger_type])->whereBetween('ledger_date', array($from_next_date, $to_next_date));
                break;
            
            case $request->ledger_type != null:
                $query2 = $query->where('ledger_type', $request->ledger_type);
                break;
            case $request->from_date != null && $request->to_date != null:
                $query2 = $query->whereBetween('ledger_date', array($from_next_date, $to_next_date));
                break;
      

            default:
                $query2 = $query;
        }

        $data = $query2->orderBy('id', 'DESC')->get();
    
        $ledger_head = LedgerHead::all();
        $is_search = 'Searched';
        $clients = SetupClient::where('delete_status', 0)->orderBy('client_name', 'asc')->get();
        return response()->json([
            "status"=>200,
            "request_data"=>$request_data,
            "data"=>$data,
            "ledger_head"=>$ledger_head,
            "clients"=>$clients,
            "is_search"=>$is_search,
        ]);

}
public function balance_report()
    {
        $request_data = [
            'class_of_cases' => '',
            'case_no' => '',
            'from_date' => '',
            'to_date' => '',
        ];

        $data = CaseBilling::all();
        
        $ledger_head = LedgerHead::all()  ->where('delete_status', 0);
        $is_search = 'Searched';
        $clients = SetupClient::where('delete_status', 0)->orderBy('client_name', 'asc')->get();
        return response()->json([
            "status"=>200,
            "data"=>$data,
            "request_data"=>$request_data,
            "is_search"=>$is_search,
            "clients"=>$clients,
            "ledger_head"=>$ledger_head,
        ]);
}
public function balance_report_search(Request $request)
{
     
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

        case $request->class_of_cases != null && $request->case_no != null && $request->client != null && $from_next_date != null && $to_next_date != null:
            $query2 =DB::table('ledger_entries')
            ->join('case_billings','ledger_entries.bill_id','case_billings.id')
            ->select('case_billings.*','ledger_entries.*')->where(['class_of_cases' => $request->class_of_cases, 'case_no' => $request->case_no, 'client_id' => $request->client])
            ->whereBetween('case_billings.date_of_billing', [$from_next_date, $to_next_date])
            ->where('case_billings.delete_status', 0)->get();
            
            break;
        case $request->class_of_cases != null && $request->case_no != null && $request->client != null:
            $query2 =DB::table('ledger_entries')
            ->join('case_billings','ledger_entries.bill_id','case_billings.id')
            ->select('case_billings.*','ledger_entries.*')->where(['class_of_cases' => $request->class_of_cases, 'case_no' => $request->case_no, 'client_id' => $request->client])
            ->where('case_billings.delete_status', 0)
            ->get();
            
            break;
       case $request->client != null:
                $query2 =DB::table('ledger_entries')
                ->join('case_billings','ledger_entries.bill_id','case_billings.id')
                ->select('case_billings.*','ledger_entries.*')
                ->where(['client_id' => $request->client])
                ->where('case_billings.delete_status', 0)->get();
               
                break;
        case $request->class_of_cases != null && $from_next_date == null && $to_next_date == null:
            $query2 =DB::table('ledger_entries')
            ->join('case_billings','ledger_entries.bill_id','case_billings.id')
            ->select('case_billings.*','ledger_entries.*')->where(['class_of_cases' => $request->class_of_cases])
            ->where('case_billings.delete_status', 0)
            ->get();
           
        break;

        case $request->from_date != null && $request->to_date != null :
            $query2 =DB::table('ledger_entries')
            ->join('case_billings','ledger_entries.bill_id','case_billings.id')
            ->select('case_billings.*','ledger_entries.*') ->whereBetween('case_billings.date_of_billing', [$from_next_date, $to_next_date])
            ->where('case_billings.delete_status', 0)->get();
           
            break;
        case $request->class_of_cases != null && $request->case_no == null && $request->client == null:
            
            $query2 =DB::table('ledger_entries')
            ->join('case_billings','ledger_entries.bill_id','case_billings.id')
            ->select('case_billings.*','ledger_entries.*')->where(['class_of_cases' => $request->class_of_cases, 'case_no' => $request->case_no])
            ->where('case_billings.delete_status', 0)->get();
          
            break;
            case $request->client != null && $request->class_of_cases != null && $request->case_no != null && $from_next_date == null && $to_next_date == null:
                
                $query2 =DB::table('ledger_entries')
                ->join('case_billings','ledger_entries.bill_id','case_billings.id')
                ->select('case_billings.*','ledger_entries.*')
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
    return response()->json([
        "status"=>200,
        "data"=>$data,
        "request_data"=>$request_data,
        "ledger_head"=>$ledger_head,
        "is_search"=>$is_search,
        "bill_no"=>$bill_no,
        "clients"=>$clients,
    ]);
}
public function print_balance_report(Request $request)
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

            case $request->class_of_cases != null && $request->case_no != null && $request->client != null && $from_next_date != null && $to_next_date != null:
                $query2 =DB::table('ledger_entries')
                ->join('case_billings','ledger_entries.bill_id','case_billings.id')
                ->select('case_billings.*','ledger_entries.*')->where(['class_of_cases' => $request->class_of_cases, 'case_no' => $request->case_no, 'client_id' => $request->client])
                ->whereBetween('case_billings.date_of_billing', [$from_next_date, $to_next_date])
                ->where('case_billings.delete_status', 0)->get();
                //dd($query2);
                break;
            case $request->class_of_cases != null && $request->case_no != null && $request->client != null:
                $query2 =DB::table('ledger_entries')
                ->join('case_billings','ledger_entries.bill_id','case_billings.id')
                ->select('case_billings.*','ledger_entries.*')->where(['class_of_cases' => $request->class_of_cases, 'case_no' => $request->case_no, 'client_id' => $request->client])
                ->where('case_billings.delete_status', 0)
                ->get();
                //dd($query2);
                break;
           case $request->client != null:
                    $query2 =DB::table('ledger_entries')
                    ->join('case_billings','ledger_entries.bill_id','case_billings.id')
                    ->select('case_billings.*','ledger_entries.*')
                    ->where(['client_id' => $request->client])
                    ->where('case_billings.delete_status', 0)->get();
                   // dd($query2);
                    break;
            case $request->class_of_cases != null && $from_next_date == null && $to_next_date == null:
                $query2 =DB::table('ledger_entries')
                ->join('case_billings','ledger_entries.bill_id','case_billings.id')
                ->select('case_billings.*','ledger_entries.*')->where(['class_of_cases' => $request->class_of_cases])
                ->where('case_billings.delete_status', 0)
                ->get();
               // dd($query2);
            break;

            case $request->from_date != null && $request->to_date != null :
                $query2 =DB::table('ledger_entries')
                ->join('case_billings','ledger_entries.bill_id','case_billings.id')
                ->select('case_billings.*','ledger_entries.*') ->whereBetween('case_billings.date_of_billing', [$from_next_date, $to_next_date])
                ->where('case_billings.delete_status', 0)->get();
               // dd($query2);
                break;
            case $request->class_of_cases != null && $request->case_no == null && $request->client == null:
                // $query2 = $query->where(['class_of_cases' => $request->class_of_cases, 'client_id' => $request->client_id]);
                $query2 =DB::table('ledger_entries')
                ->join('case_billings','ledger_entries.bill_id','case_billings.id')
                ->select('case_billings.*','ledger_entries.*')->where(['class_of_cases' => $request->class_of_cases, 'case_no' => $request->case_no])
                ->where('case_billings.delete_status', 0)->get();
               // dd($query2);
                break;
                case $request->client != null && $request->class_of_cases != null && $request->case_no != null && $from_next_date == null && $to_next_date == null:
                    // $query2 = $query->where(['class_of_cases' => $request->class_of_cases, 'client_id' => $request->client_id]);
                    $query2 =DB::table('ledger_entries')
                    ->join('case_billings','ledger_entries.bill_id','case_billings.id')
                    ->select('case_billings.*','ledger_entries.*')
                    ->where('case_billings.delete_status', 0)->get();
                    //dd($query2);
                    break;
            default:
                $query2 = DB::table('ledger_entries')
                ->join('case_billings','ledger_entries.bill_id','case_billings.id')
                ->select('case_billings.*','ledger_entries.*')
                ->where('case_billings.delete_status', 0)->get();
                //dd($query2);
        }

        $data =$query2;
        $ledger_head = LedgerHead::all();
        $is_search = 'Searched';
        $ledger_head_name = LedgerHead::where('id', $request->ledger_head_id)->first();
        $clients = SetupClient::where('delete_status', 0)->orderBy('client_name', 'asc')->get();
        return response()->json([
            "status"=>200,
            "data"=>$data,
            "request_data"=>$request_data,
            "ledger_head"=>$ledger_head,
            "is_search"=>$is_search,
            "clients"=>$clients,
            "bill_no"=>$bill_no,
        ]);
    }
    public function litigation_report()
    {
        $request_data = [
            'from_next_date' => '',
            'case_type' => '',
            'from_next_date' => '',
            'from_next_date' => '',
            'report_type' => '',
        ];
        return response()->json([
            "status"=>200,
            "request_data"=>$request_data,
        ]);
}
public function litigation_report_result(Request $request)
    {

        $request_data = $request->all();

        if ($request->from_next_date != "dd/mm/yyyy") {
            $from_next_date_explode = explode('/', $request->from_next_date);
            $from_next_date_implode = implode('-', $from_next_date_explode);
            $from_next_date = date('Y-m-d', strtotime($from_next_date_implode));
        } else if ($request->from_next_date == "dd/mm/yyyy") {
            $from_next_date = null;
        }

        if ($request->to_next_date != "dd/mm/yyyy") {
            $to_next_date_explode = explode('/', $request->to_next_date);
            $to_next_date_implode = implode('-', $to_next_date_explode);
            $to_next_date = date('Y-m-d', strtotime($to_next_date_implode));
        } else if ($request->to_next_date == "dd/mm/yyyy") {
            $to_next_date = null;
        }

        $date = new DateTime('now');

        $date->modify('first day of next month');
        $next_month_start = $date->format('Y-m-d');

        $date->modify('last day of this month');
        $next_month_end = $date->format('Y-m-d');

        $next_week_start = date(
            'Y-m-d',
            strtotime("sunday 0 week")
        );

        $next_week_end = date('Y-m-d', strtotime("thursday 1 week"));

        // $now = Carbon::now();
        // $start = $now->startOfWeek(Carbon::TUESDAY);
        // $end = $now->endOfWeek(Carbon::MONDAY);
        // data_array(date('Y-m-d', strtotime($start)));
        // data_array($now);

        $query = DB::table('criminal_cases')
            ->leftJoin('setup_next_date_reasons', 'criminal_cases.next_date_fixed_id', 'setup_next_date_reasons.id')
            ->leftJoin('setup_case_statuses', 'criminal_cases.case_status_id', 'setup_case_statuses.id')
            ->leftJoin('setup_case_titles', 'criminal_cases.case_infos_case_title_id', 'setup_case_titles.id')
            ->leftJoin('setup_courts', 'criminal_cases.name_of_the_court_id', '=', 'setup_courts.id')
            ->leftJoin('setup_districts', 'criminal_cases.case_infos_district_id', '=', 'setup_districts.id')
            ->leftJoin('setup_districts as accused_district', 'criminal_cases.client_district_id', '=', 'accused_district.id')
            ->leftJoin('setup_case_types', 'criminal_cases.case_type_id', '=', 'setup_case_types.id')
            ->leftJoin('setup_external_councils', 'criminal_cases.lawyer_advocate_id', '=', 'setup_external_councils.id')
            ->leftJoin('setup_case_titles as case_infos_title', 'criminal_cases.case_infos_sub_seq_case_title_id', '=', 'case_infos_title.id')
            ->leftJoin('setup_matters', 'criminal_cases.matter_id', '=', 'setup_matters.id')->orderBy('next_date', 'ASC');


        switch ($request->isMethod('get')) {
            case $request->report_type == "daily":
                $query2 = $query->where('criminal_cases.next_date', date('Y-m-d'));
                break;
            case $request->report_type == 'next_week':
                $query2 = $query->whereBetween('next_date', array($next_week_start, $next_week_end));
                break;
            case $request->report_type == 'next_month':
                $query2 = $query->whereBetween('next_date', array($next_month_start, $next_month_end));
                break;
            case $request->report_type == 'custom_date':
                $query2 = $query->whereBetween('next_date', array($from_next_date, $to_next_date));
                break;
            case $request->report_type == 'not_updated':
                $query2 = $query->whereNull('next_date');
                break;
                break;
            case $request->report_type == 'not_updated':
                $query2 = $query->whereNull('next_date');
                break;
                break;
            case $request->report_type == 'disposed':
                $query2 = $query->where('case_status_id', 'Disposed')->whereBetween('next_date', array($from_next_date, $to_next_date));
                break;
            default:
                $query2 = $query;
        }


        $data = $query2->select(
            'criminal_cases.*',
            'setup_case_statuses.case_status_name',
            'setup_case_titles.case_title_name',
            'setup_next_date_reasons.next_date_reason_name',
            'setup_courts.court_name',
            'setup_districts.district_name',
            'accused_district.district_name as accused_district_name',
            'setup_case_types.case_types_name',
            'setup_external_councils.first_name',
            'setup_external_councils.middle_name',
            'setup_external_councils.last_name',
            'case_infos_title.case_title_name as sub_seq_case_title_name',
            'setup_matters.matter_name'
        )
            ->where('criminal_cases.delete_status', 0)
            ->get();

        $is_search = 'Searched';
        return response()->json([
            "status"=>200,
            "data"=>$data,
            "request_data"=>$request_data,
        ]);
}
}