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
    <section class="content" id="section1st">

        <div class="container-fluid">

            <div class="col-12">

                {{-- print document  --}}

                <div class="invoice p-3 mb-3">

                    <div class="row">
                        <div class="col-10 ">
                            <h4 style="text-align: center; padding-left:100px">
                                <img src="{{ asset('login_assets/img/rsz_11d_legal_logo.png') }}" alt="AdminLTE Logo"
                                    class="brand-image" style="opacity:1">

                                {{-- <b>From</b>  --}}




                            </h4>
                            <h2
                                style="font-weight: bold; text-aling:center;font-size:25px;color: #079e8d; padding-left:550px">
                                Money
                                Receipt</h2>
                        </div>
                        <div class="col-2">

                            <h3 class="float-right" style="font-weight: bold">Date: {{ date('d-m-Y') }}</h3>
                        </div>
                    </div>
                    @php
                        if ($data->client_id != null) {
                            $client = App\Models\SetupClient::where('id', $data->client_id)->first();
                        }
                        
                    @endphp
                    {{-- <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">

                       

                            <address>
                                <h2 style="font-weight: bold;font-size:25px;color: #079e8d;">Money Receipt</h2>
                                <b style="font-weight: bold;font-size:15px">Invoice No :</b>
                                <strong
                                    style="font-weight: bold;font-size:15px">{{ $data->transaction_no }}</strong><br>
                                <b style="font-weight: bold;font-size:15px">Client :</b>
                                <strong style="font-weight: bold;font-size:15px">{{ $client->client_name }}</strong><br>

                                <b style="font-weight: bold;font-size:15px">Address :</b> <strong id="lblUnitAddress"
                                    class="HeaderStyle2" style="font-weight: bold;font-size:15px">
                                    {{ $client->client_address }}</strong><br>
                                <b style="font-weight: bold;font-size:15px">Email :</b><strong id="lblUnitAddress"
                                    class="HeaderStyle2" style="font-weight: bold;font-size:18px">
                                    {{ $client->client_email }}</strong><br>
                                <b style="font-weight: bold;font-size:15px">Phone :</b><strong id="lblVoucherType"
                                    class="VoucherStyle"
                                    style="font-weight: bold;font-size:15px">{{ $client->client_mobile }}</strong>
                            </address>

                        </div>

                        @php
                            $case = DB::table('case_billings')
                                ->where('case_no', $data->id)
                                ->first();
                        @endphp
                        @if ($case != null)
                            <div class="col-sm-4 invoice-col">
                                <b>To</b>

                                @php
                                    
                                    if ($case->class_of_cases == 'District Court') {
                                        $case = App\Models\CriminalCase::where('id', $case->case_no)->first();
                                    } elseif ($case->class_of_cases == 'Special Court') {
                                        $case = App\Models\CriminalCase::where('id', $case->case_no)->first();
                                    } elseif ($case->class_of_cases == 'High Court Division') {
                                        $case = App\Models\HighCourtCase::where('id', $case->case_no)->first();
                                    } elseif ($case->class_of_cases == 'Appellate Division') {
                                        $case = App\Models\AppellateCourtCase::where('id', $case->case_no)->first();
                                    }
                                    
                                @endphp


                            </div>
                        @endif


                    </div> --}}
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-1 "></div>
                            <div class="col-10">
                                <div class="card p-5 m-5">
                                    <form>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Client Name</label>
                                                <input type="text" class="form-control" id="inputEmail4"
                                                    value="{{ $client->client_name }}" disabled>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4">Paid Amount</label>
                                                <input type="text" class="form-control"
                                                    value="{{ $data->paid_amount }}" placeholder="Password" disabled>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputAddress">Bill Amount</label>
                                                <input type="text" class="form-control"
                                                    value="{{ $data->bill_amount }}" disabled>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputAddress2">Payment Type</label>
                                                <input type="text" class="form-control"
                                                    value="{{ $data->payment_type }}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputAddress">Invoice Number</label>
                                                <input type="text" class="form-control"
                                                    value="{{ $data->transaction_no }}" disabled>
                                            </div>

                                        </div>


                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-1">

                        </div>

                        <div class="col-6 pl-5 ml-3">

                            <div class="table-responsive mt-2">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th style="width:50%">Subtotal:</th>
                                            <td>{{ @$data->bill_amount }}</td>
                                        </tr>

                                        <tr>
                                            <th>Total:</th>
                                            <td>{{ @$data->bill_amount }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>


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
                        @if ($data != null)
                            <div class="col-md-12">
                                <a href="{{ route('money-receipt-print-preview', $data->id) }}" title="Print Case Info"
                                    target="_blank" class="btn btn-info float-right"><i class="fas fa-print"></i>
                                    Print</a>
                            </div>
                        @endif
                    </div>



                </div>



            </div>
        </div>
    </section>

</div>