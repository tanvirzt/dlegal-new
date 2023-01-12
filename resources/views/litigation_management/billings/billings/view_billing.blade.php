@extends('layouts.admin_layouts.admin_layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Billing</h1>

                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">
                                <a type="button" href="{{ route('billings') }}" aria-disabled="false" role="link"
                                    tabindex="-1">Back </a>
                            </li>
                        </ol>
                    </div>

                </div>

            </div>

        </div>


        <div class="row">
            <div class="col-md-8 mx-auto py-4">

                <!--start invoice area-->
                <div class="main-invo">
                    <div class="invoice-header">
                        <div class="invoice-logo" style="overflow: hidden; margin-bottom: 15px;">
                            <img src="{{ asset('login_assets/img/rsz_11d_legal_logo.png') }}" alt="image"
                                class="brand-image" style="opacity:1">
                        </div>
                        <h1>Invoice</h1>
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
                                @php
                                    if ($data->class_of_cases == 'District Court') {
                                        $case = App\Models\CriminalCase::where('id', $data->case_no)->first();
                                    } elseif ($data->class_of_cases == 'Special Court') {
                                        $case = App\Models\LabourCase::where('id', $data->case_no)->first();
                                    } elseif ($data->class_of_cases == 'High Court Division') {
                                        $case = App\Models\HighCourtCase::where('id', $data->case_no)->first();
                                    } elseif ($data->class_of_cases == 'Appellate Division') {
                                        $case = App\Models\AppellateCourtCase::where('id', $data->case_no)->first();
                                    }

                                @endphp

                                <address>
                                    {{-- <strong>{{ $case->client_name_write }}</strong><br>
                                    {{ $case->client_address }} --}}

                                </address>
                            </div>
                        </address>
                        <div class="meta-box">
                            <table class="meta">

                                <tr>
                                    <th>DATE</th>
                                    <td>{{ date('d-m-Y') }}</td>
                                </tr>
                                <tr>
                                    <th>INVOICE NO</th>
                                    <td>{{ $data->billing_no }}</td>
                                </tr>
                                <tr>
                                    <th>CASE NO</th>
                                    {{-- <td>{{ $case->case_no }}</td> --}}
                                </tr>
                            </table>
                        </div>
                        <table class="inventory">
                            <thead>
                                <tr>
                                    <th width="10%"><span>S.N</span></th>
                                    <th><span>Bill Type</span></th>
                                    <th><span>Amount</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><span>1</span></td>
                                    <td><span> {{ $data->bill_type_name }}
                                        </span></td>
                                    <td><span class="in-price">{{ $data->bill_amount }}</span></td>
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

                            <table class="meta">
                                <tr>
                                    <th>Sutotal</th>
                                    <td>{{ $data->bill_amount }}</td>
                                </tr>
                                <tr class="total-border"></tr>
                                <tr class="invo-total-price">
                                    <th>Total</th>
                                    <td>{{ $data->bill_amount }}</td>
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
                        <div class="col-md-12">
                            <a href="{{ route('billings-print-preview', $data->id) }}" title="Print Case Info"
                                target="_blank" class="btn btn-info float-right"><i class="fas fa-print"></i> Print</a>
                        </div>
                    </div>
                </div>
                <!--end invoice area-->

            </div>
        </div>


    </div>
@endsection
