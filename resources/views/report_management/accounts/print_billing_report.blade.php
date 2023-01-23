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
            padding: 0px !important;
            font-weight: bold;
        }
    </style>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Ledger Report</h1>
                        {{-- test --}}
                    </div><!-- /.col -->
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
                    <div class="invoice-header">
                        <div class="invoice-logo" style="overflow: hidden; margin-bottom: 15px;">
                            <img src="{{ asset('login_assets/img/rsz_11d_legal_logo.png') }}" alt="image"
                                class="brand-image" style="opacity:1">
                        </div>
                        <h1>Billing</h1>
                        <div class="address">
                            <div class="invoice-self">
                                <p><strong>From</strong></p>
                                <p>365/B, Modhubag, Mogbazar, Hatirjheel, Dhaka
                                    - 1217, Bangladesh</p>
                                <p>Cell: 01717406688 </p>
                                <p>Tel: 01717406688 </p>
                                <p>Email: niamulkabir.adv@gmail.com</p>
                            </div>
                        </div>
                    </div>
                    <article>
                        <address>
                            <div class="invoice-customer">
                                <h5>Customer</h5>


                                <address>
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
                                                            <h6>Client :
                                                                {{ $clientName->client_name }}
                                                            </h6>
                                                        @endif
                                                    </span>
                                                    <span id="lblUnitAddress">
                                                        @if (!empty($request_data['from_date']))
                                                            @if ($request_data['from_date'] != 'dd-mm-yyyy')
                                                                <h6>From:
                                                                    {{ $request_data['from_date'] }} -
                                                                    To: {{ $request_data['to_date'] }}</h6>
                                                            @endif
                                                        @endif
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </address>

                                </address>
                            </div>
                        </address>
                        <div class="meta-box">
                            <table class="meta">

                                <tr>
                                    <th>DATE</th>
                                    <td>{{ date('d-m-Y') }}</td>
                                </tr>

                            </table>
                        </div>


                        <table class="inventory">
                            <thead>
                                <tr>
                                    <th class="text-center">SL</th>
                                    <th class="text-center">Bill No</th>

                                    <th class="text-center">Bill Date</th>

                                    <th class="text-center">Bill Amount</th>

                                    <th class="text-center">Remarks</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $due = 0;
                                    $pd_amnt = 0;
                                @endphp

                                @foreach ($data as $key => $datum)
                                    <tr>
                                        <td>
                                            {{ $key + 1 }}
                                        </td>
                                        <td>
                                            {{ $datum->billing_no }}
                                        </td>


                                        <td>

                                            {{ date('d-m-Y', strtotime($datum->ledger_date)) }}
                                        </td>
                                        <td>
                                            {{ $datum->bill_amount }}
                                        </td>


                                        <td>


                                            {{ $datum->remarks }}

                                        </td>


                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                        <table class="meta">
                            <tr>
                                <th>Sutotal</th>
                                <td>{{ (int) $data->sum('bill_amount') }}</td>
                            </tr>
                            <tr class="total-border"></tr>
                            <tr class="invo-total-price">
                                <th>Total</th>
                                <td>{{ (int) $data->sum('bill_amount') }}</td>
                            </tr>
                        </table>


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
