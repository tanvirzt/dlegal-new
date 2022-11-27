@extends('layouts.admin_layouts.admin_layout')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Income Expense Report </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>

                            <li class="breadcrumb-item active"> Income Expense Report</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
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
                                    <h3 class="card-title"> Income Expense :: Report
                                        
                                         @if (!empty($is_search))
                                             <span style="color: red;font-size:15px;">(Showing:
                                                {{ $request_data['ledger_type'] != null ? 'Income Expense' : '' }}    
                                                
                                                )
                                                                                        
                                                {{-- {{ !empty($is_search) ? '(Showing)' : '' }} --}}
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


                                        <form method="get" action="{{ route('income-expense-report-search') }}">
                                            {{-- @csrf --}}
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="ledger_type" class="col-form-label">Ledger Type</label>
                                                        <div>
                                                            <select name="ledger_type" class="form-control select2" id="ledger_type">
                                                                <option value=""> Select </option>
                                                                <option value="Income" {{ old('ledger_type') || $request_data['ledger_type'] == 'Income' ? 'selected' : '' }}> Income </option>
                                                                <option value="Expense" {{ old('ledger_type') || $request_data['ledger_type'] == 'Expense' ? 'selected' : '' }}> Expense </option>
                                                            </select>
                                                            @error('ledger_type')<span
                                                                class="text-danger">{{$message}}</span>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="case_type_id" class="col-form-label">From Date </label>
                                                        <div class="">
                                                            <span class="date_span" style="width: 404px;">
                                                                <input type="date" class="xDateContainer date_first_input"
                                                                       onchange="setCorrect(this,'from_date');"><input type="text" id="from_date"
                                                                                                                    name="from_date" value="dd-mm-yyyy"
                                                                                                                    class="date_second_input"
                                                                                                                    tabindex="-1"><span
                                                                    class="date_second_span" tabindex="-1">&#9660;</span>
                                                            </span>
                                                            @error('case_type_id')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="case_type_id" class="col-form-label"> To Date </label>
                                                        <div class="">
                                                            <span class="date_span" style="width: 404px;">
                                                                <input type="date" class="xDateContainer date_first_input"
                                                                       onchange="setCorrect(this,'to_date');"><input type="text" id="to_date"
                                                                                                                    name="to_date" value="dd-mm-yyyy"
                                                                                                                    class="date_second_input"
                                                                                                                    tabindex="-1"><span
                                                                    class="date_second_span" tabindex="-1">&#9660;</span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>

                                            

                                            <div class="float-right">
                                                <button type="submit" id="submit"
                                                    class="btn btn-primary text-uppercase"><i class="fas fa-search"></i>
                                                    Search
                                                </button>
                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if(!empty($data))
                        <div class="col-md-12">
                            <div class="card" style="min-height: 480px;">
                                <div class="card-header">
                                    <h3 class="card-title"> List <span style="color: red;font-size:15px;">{{ !empty($is_search) ? '(Showing Searched Item)' : '' }}</span> </h3>
                                    <div class="float-right">

                                        <form method="get" action="{{ route('print-ledger-report') }}" target="_blank">
                                            @csrf


                                                <input type="hidden" name="ledger_type" value="{{ $request_data['ledger_type'] }}">
                                                <input type="hidden" name="from_date" value="{{ $request_data['from_date'] }}">
                                                <input type="hidden" name="to_date" value="{{ $request_data['to_date'] }}">
                                                
                                            <button type="submit" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Delete"> <i class="fas fa-print"></i> Print </button>
                                        </form>




                                        {{-- <a href="{{ route('litigation-report-print-preview',['param1'=>$from_date,'param2'=>$to_date]) }}" target="_blank"
                                            class="btn btn-info"><i class="fas fa-print"></i> Print </a> --}}
                                    </div>
    
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    @if (!empty($data))
    
                                    <table class="table data_table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th class="text-center"> SL</th>
                                            <th class="text-center"> Transaction No.</th>
                                            <th class="text-center"> Job No.</th>
                                            <th class="text-center"> Payment Against Bill </th>
                                            <th class="text-center"> Ledger Date </th>
                                            <th class="text-center"> Payment Type </th>
                                            <th class="text-center"> Bill Name </th>
                                            <th class="text-center"> Bill Amount </th>
                                            <th class="text-center"> Remarks </th>
                                        </tr>
                                        </thead>
                                        <tbody>
    
                                        @foreach($data as $key=>$datum)
    
                                            <tr>
                                                <td>
                                                    {{ $key+1 }}
                                                </td>
                                                <td>
                                                    {{ $datum->transaction_no }}
                                                </td>
                                                <td>
                                                    {{ $datum->job_no }}
                                                </td>
                                                <td width="8%">
                                                    {{ $datum->payment_against_bill == 'on' ? 'Yes': 'No' }}
                                                </td>
                                                <td>
                                                    {{ $datum->ledger_date != null ? date('d-m-Y', strtotime($datum->ledger_date)) : '' }}                                                    
                                                </td>
                                                <td>
                                                    {{ $datum->payment_type }}
                                                   
                                                </td>
                                                <td>
                                                    {{ $datum->ledger_head_bill != null ? $datum->ledger_head_bill->ledger_head_name : '' }}
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
                                    @endif
    
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                    @endif
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@section('scripts')
    <script>
        $(function() {
            $('#report_type').change(function() {
                if ($('#report_type').val() == 'custom_date' || $('#report_type').val() == 'disposed') {
                    $('.report_type_box').show();
                } else {
                    $('.report_type_box').hide();
                }
            });
        });
    </script>
    <script>
        function printDiv() {
            var divContents = document.getElementById("divToPrint").innerHTML;
            var a = window.open('Litigation report', 'Litigation report', '');
            a.document.write('<html>');
            a.document.write(divContents);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }
    </script>
@endsection
@endsection
