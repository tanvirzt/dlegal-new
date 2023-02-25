@extends('layouts.admin_layouts.admin_layout')
@section('content')

<style type="text/css">
    .card-title, .content-header h1{
        color: #0CA2A3 !important;
        font-weight: bold;
        font-size: 18px;
    }
</style>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Balance Report </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>

                            <li class="breadcrumb-item active"> Balance Report</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                        {{ Session::get('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div id="accordion">
                                <div class="card-header" id="headingTwo">
                                    <h3 class="card-title"> Ledger Report

                                        @if (!empty($is_search))
                                            <span style="color: red;font-size:15px;">(Showing:
                                                {{ $request_data['class_of_cases'] != null ? 'Ledger Head' : '' }}

                                                )

                                            </span>
                                        @endif

                                    </h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn collapsed" data-toggle="collapse"
                                            data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>


                                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo"
                                    data-parent="#accordion">
                                    <div class="card-body">


                                        <form method="get" action="{{ route('balance-report-search') }}">
                                            <div class="row">

                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="class_of_cases" class="col-form-label">Client</label>
                                                        <div class="">

                                                            <select name="client" class="form-control select2"
                                                                id="client">
                                                                <option value=""> Select </option>
                                                                @foreach ($clients as $client)
                                                                    <option value="{{ $client->id }}">
                                                                        {{ $client->client_name }}</option>
                                                                @endforeach

                                                            </select>
                                                            @error('client')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="class_of_cases" class="col-form-label">Class of Cases
                                                        </label>
                                                        <div class="">

                                                            <select name="class_of_cases" class="form-control select2"
                                                                id="class_of_cases" action="{{ route('find-case-no') }}">
                                                                <option value=""> Select </option>
                                                                <option value="District Court"> District Court </option>
                                                                <option value="Special Court"> Special Court </option>
                                                                <option value="High Court Division"> High Court Division
                                                                </option>
                                                                <option value="Appellate Division"> Appellate Division
                                                                </option>
                                                            </select>
                                                            @error('class_of_cases')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="case_no" class="col-form-label">Case No
                                                        </label>
                                                        <div class="">

                                                            <select name="case_no" class="form-control select2"
                                                                id="case_no" action="{{ route('find-case-no') }}">
                                                                <option value=""> Select </option>

                                                            </select>
                                                            @error('case_no')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>



                                                <div class="col-sm-4 mr-3">
                                                    <div class="form-group">
                                                        <label for="case_type_id" class="col-form-label">From Date </label>
                                                        <div class="">

                                                            <span class="date_span">
                                                                <input type="date"
                                                                    class="xDateContainer date_first_input"
                                                                    onchange="setCorrect(this,'from_date');"><input
                                                                    type="text" id="from_date" name="from_date"
                                                                    value="dd-mm-yyyy" class="date_second_input"
                                                                    tabindex="-1"><span class="date_second_span"
                                                                    tabindex="-1">&#9660;</span>
                                                            </span>

                                                            @error('case_type_id')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="case_type_id" class="col-form-label"> To Date </label>
                                                        <div class="">
                                                            <span class="date_span">
                                                                <input type="date"
                                                                    class="xDateContainer date_first_input"
                                                                    onchange="setCorrect(this,'to_date');"><input
                                                                    type="text" id="to_date" name="to_date"
                                                                    value="dd-mm-yyyy" class="date_second_input"
                                                                    tabindex="-1"><span class="date_second_span"
                                                                    tabindex="-1">&#9660;</span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>



                                            <div class="float-right">
                                                <button type="submit" id="submit"
                                                    class="btn btn-primary text-uppercase submitForm"><i class="fas fa-search"></i>
                                                    Search
                                                </button>
                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if (!empty($data))
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title"> List <span
                                            style="color: red;font-size:15px;">{{ !empty($is_search) ? '(Showing Searched Item)' : '' }}</span>
                                    </h3>
                                    <div class="float-right">

                                        <form method="get" action="{{ route('print-balance-report') }}"
                                            target="_blank">
                                            @csrf

                                            {{--
                                            <input type="hidden" name="client" value="{{ $request_data['client'] }}">
                                            <input type="hidden" name="from_date"
                                                value="{{ $request_data['from_date'] }}">
                                            <input type="hidden" name="to_date" value="{{ $request_data['to_date'] }}">
                                            <input type="hidden" name="class_of_cases"
                                                value="{{ $request_data['class_of_cases'] }}">
                                            <input type="hidden" name="case_no" value="{{ $request_data['case_no'] }}"> --}}

                                            <button type="submit" class="btn btn-info" data-toggle="tooltip"
                                                data-placement="top" title="Delete"> <i class="fas fa-print"></i> Print
                                            </button>
                                        </form>
                                    </div>

                                </div>
                                <div class="card-body">
                                    @if (!empty($data))
                                        <div class="invoice p-3 mb-3">

                                            <div class="row">
                                                <div class="col-12">
                                                    <h4>
                                                        <img src="{{ asset('login_assets/img/rsz_11d_legal_logo.png') }}"
                                                            alt="AdminLTE Logo" class="brand-image"
                                                            style="opacity:1; padding-left:0px">

                                                        <small class="float-right"
                                                            style="font-weight: 600!important;font-size:100%!important;">Date: {{ date('d-m-Y') }}</small>
                                                    </h4>
                                                </div>
                                                <h2 style="font-weight: bold;padding-left:570px;padding-top:20px;">
                                                    LEDGER REPORT</h2>


                                            </div>
                                            <br>
                                            <br>
                                            <div class="row invoice-info">
                                                <div class="col-sm-4 invoice-col">
                                                    {{-- <span id="lblUnitAddress" style="padding: 0px">

                                                        @if (!empty($request_data['client']))
                                                            @php
                                                                $clientName = DB::table('setup_clients')
                                                                    ->where('id', $request_data['client'])
                                                                    ->first();
                                                            @endphp
                                                            <h4>Client Name:
                                                                {{ $clientName->client_name }}
                                                            </h4>
                                                        @endif
                                                    </span>
                                                    <span id="lblUnitAddress" style="padding: 0px">
                                                        @if (!empty($request_data['from_date']))
                                                            @if ($request_data['from_date'] != 'dd-mm-yyyy')
                                                                <h4>From:
                                                                    {{ $request_data['from_date'] }},
                                                                    To: {{ $request_data['to_date'] }}</h4>
                                                            @endif
                                                        @endif
                                                    </span> --}}
                                                </div>

                                                <div class="col-sm-4 invoice-col">
                                                    <div class="col-sm-4 invoice-col">
                                                        <span id="lblUnitAddress" style="padding: 0px">

                                                            @if (!empty($request_data['client']))
                                                                @php
                                                                    $clientName = DB::table('setup_clients')
                                                                        ->where('id', $request_data['client'])
                                                                        ->first();
                                                                @endphp
                                                                <h4>Client Name:
                                                                    {{ $clientName->client_name }}
                                                                </h4>
                                                            @endif
                                                        </span>
                                                        <span id="lblUnitAddress" style="padding: 0px">
                                                            @if (!empty($request_data['from_date']))
                                                                @if ($request_data['from_date'] != 'dd-mm-yyyy')
                                                                    <h4>From:
                                                                        {{ $request_data['from_date'] }},
                                                                        To: {{ $request_data['to_date'] }}</h4>
                                                                @endif
                                                            @endif
                                                        </span>
                                                    </div>
                                                    <h5 class="text-center">
                                                        {{ !empty($ledger_head_name) ? $ledger_head_name->ledger_head_name : '' }}
                                                    </h5>
                                                    <h6 class="text-center">
                                                        {{ !empty($request_data['class_of_cases']) ? $request_data['class_of_cases'] : '' }}
                                                    </h6>
                                                    @if (!empty($request_data['class_of_cases']) && $request_data['class_of_cases'] == 'District Court')
                                                        <h6 class="text-center">

                                                            @php
                                                                $case_number = DB::table('ledger_entries')
                                                                    ->leftJoin('case_billings', 'ledger_entries.bill_id', 'case_billings.id')
                                                                    ->leftJoin('criminal_cases', 'case_billings.case_no', 'criminal_cases.id')
                                                                    ->where(['case_billings.class_of_cases' => $request_data['class_of_cases'], 'case_billings.case_no' => $request_data['case_no']])
                                                                    ->select('ledger_entries.*', 'case_billings.class_of_cases', 'case_billings.case_no', 'criminal_cases.case_no as main_case_no')
                                                                    ->first();

                                                            @endphp

                                                            @if (!empty($case_number->main_case_no))
                                                                {{ $case_number->main_case_no }}
                                                            @endif

                                                        </h6>
                                                    @endif




                                                </div>



                                            </div>



                                            <div class="row">

                                                <div class="col-12 table-responsive">

                                                    <table class="table table-bordered reportSearch">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-left">SL</th>
                                                                <th class="text-left">Bill No</th>
                                                                <th class="text-left">Billing Date</th>

                                                                <th class="text-left">Payment Type</th>
                                                                <th class="text-left">Paid Date</th>
                                                                <th class="text-left">Bill Amount</th>
                                                                <th class="text-left">Received Amount</th>

                                                                <th class="text-left">Due Amount</th>
                                                                <th class="text-left">Remarks</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            @php
                                                                $due = 0;
                                                                $sum_paid_amount = 0;
                                                                $sum_bill_amount = 0;
                                                            @endphp

                                                            @foreach ($data as $key => $item)
                                                                @php
                                                                    $ledger = DB::table('ledger_entries')
                                                                        ->where('bill_id', $item->id)

                                                                        ->get();
                                                                    // dd($data);
                                                                    $ledger_count = DB::table('ledger_entries')
                                                                        ->where('bill_id', $item->id)

                                                                        ->count();
                                                                @endphp

                                                                @foreach ($ledger as $datum)
                                                                    <tr>
                                                                        @php
                                                                            $i = $loop->index;
                                                                        @endphp
                                                                        <td>
                                                                            {{ $loop->iteration }}
                                                                        </td>

                                                                        <td>
                                                                            {{ $item->billing_no }}
                                                                        </td>

                                                                        <td>
                                                                            {{ date('d-m-Y', strtotime($item->date_of_billing)) }}
                                                                        </td>
                                                                        <td>
                                                                            {{ $item->payment_type }}
                                                                        </td>
                                                                        <td>

                                                                            {{ date('d-m-Y', strtotime($datum->ledger_date)) }}
                                                                        </td>
                                                                        @if ($loop->first)
                                                                            <td>
                                                                                {{ $item->bill_amount }}
                                                                            </td>
                                                                        @else
                                                                            <td>
                                                                            </td>
                                                                        @endif
                                                                        <td>
                                                                            {{ $datum->paid_amount }}
                                                                        </td>

                                                                        <td>
                                                                            {{ $datum->bill_amount - $datum->paid_amount }}
                                                                        </td>
                                                                        <td>
                                                                            {{ $datum->remarks }}
                                                                        </td>
                                                                        @php
                                                                            $sum_paid_amount = $sum_paid_amount + $datum->paid_amount;
                                                                        @endphp
                                                                    </tr>
                                                                @endforeach
                                                                @if ($ledger_count > 0)
                                                                    <input type="hidden"
                                                                        value={{ $sum_bill_amount = $sum_bill_amount + $item->bill_amount }}>
                                                                @endif
                                                            @endforeach

                                                            <tr>
                                                                <td colspan="5">Total: </td>
                                                                <td> {{ $sum_bill_amount }} </td>
                                                                <td> {{ $sum_paid_amount }} </td>
                                                                @php
                                                                    $bill = $sum_bill_amount - $sum_paid_amount;
                                                                @endphp
                                                                <td> {{ $bill }} </td>
                                                                <td colspan="1"> </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="col-6">

                                                </div>



                                            </div>




                                        </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </section>
    </div>

@endsection
