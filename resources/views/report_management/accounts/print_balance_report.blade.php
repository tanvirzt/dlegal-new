@extends('layouts.admin_layouts.admin_layout')
@section('content')
    <style>
        .col-9>h2 {
            font-weight: bold;
            text-align: center;
            font-size: 25px;
            padding-left: 180px;
            padding-top: 30px;
        }

        .col-3>h3 {
            padding: -20px !important;
            font-weight: bold;
        }
    </style>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Ledger Report</h1>
                        {{-- test --}}
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>

                            <li class="breadcrumb-item active">Ledger Report</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <style>
            th {
                background-color: #fff;
            }
        </style>

        <div class="row">
            <div class="col-md-8 mx-auto py-4">
                <div class="main-invo">
                    <div class="row">
                        <div class="col-9 ">
                            <h4 style="text-align: center; padding-left:180px">
                                <img src="{{ asset('login_assets/img/rsz_11d_legal_logo.png') }}" alt="AdminLTE Logo"
                                    class="brand-image" style="opacity:1">
                            </h4>
                            <h2>
                                LEDGER REPORT
                            </h2>

                        </div>
                        <div class="col-3">

                            <h3>Date: {{ date('d-m-Y') }}</h3>
                        </div>
                    </div>
                    <article>
                        <address>
                            <div class="invoice-customer">

                                <div class="address">
                                    <div class="invoice-self">
                                        <span id="lblUnitAddress">

                                            @if (!empty($request_data['client']))
                                                @php
                                                    $clientName = DB::table('setup_clients')
                                                        ->where('id', $request_data['client'])
                                                        ->first();
                                                @endphp
                                                <h4 style="font-weight:bold">Client :
                                                    {{ $clientName->client_name }}
                                                </h4>
                                            @endif
                                        </span>
                                        <span id="lblUnitAddress">
                                            @if (!empty($request_data['from_date']))
                                                @if ($request_data['from_date'] != 'dd-mm-yyyy')
                                                    <h4 style="font-weight: bold;">From:
                                                        {{ $request_data['from_date'] }} -
                                                        To: {{ $request_data['to_date'] }}</h4>
                                                @endif
                                            @else
                                                <h4 style="font-weight: bold;">Date:
                                                    As of Today
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </address>


                        <table class="inventory">
                            <thead>
                                <tr>
                                    <th class="text-center">SL</th>
                                    <th class="text-center">BILL No</th>

                                    <th class="text-center">Payment Type</th>

                                    <th class="text-center">Bill Amount</th>
                                    <th class="text-center">Paid Amount</th>
                                    <th class="text-center">Due Amount</th>
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
                                                {{ $item->payment_type }}
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
                                    <td colspan="3">Total: </td>
                                    <td> {{ $sum_bill_amount }} </td>
                                    <td> {{ $sum_paid_amount }} </td>
                                    @php
                                        $bill = $sum_bill_amount - $sum_paid_amount;
                                    @endphp
                                    <td> {{ $bill }} </td>

                                </tr>
                            </tbody>
                        </table>
                        {{-- <article>
                            <div class="invoice-terms">
                                <h4>Terms and Condition</h4>
                                <div class="tc-ol">
                                    <ol>
                                        <li>Write Something ...................................</li>
                                        <li>Write Something ...................................</li>
                                    </ol>
                        </div>
                     </div> --}}
                    </article>
                    </article>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="text-center">
                                <hr width="50%">
                                Accountant
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="text-center">
                                <hr width="50%">
                                Checked By
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="text-center">
                                <hr width="50%">
                                Received By
                            </div>
                        </div>

                    </div>
                </div>
                <!--end invoice area-->

            </div>
        </div>


    </div>
    <script type="text/javascript">
        window.addEventListener("load", window.print());
    </script>
@endsection
