@extends('layouts.admin_layouts.admin_layout')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Litigation Summary & Report </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>

                            <li class="breadcrumb-item active"> Litigation Summary & Report</li>
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
                                    <h3 class="card-title"> Litigation :: Summary & Report
                                        
                                         @if (!empty($data))
                                             <span style="color: red;font-size:15px;">(Showing:
                                                {{ $request_data['report_type'] == 'not_updated' ? 'NOT UPD Report' : '' }}    
                                                
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


                                        <form method="get" action="{{ route('litigation.report.result') }}">
                                            {{-- @csrf --}}
                                            <div class="form-group row">
                                                <label for="case_type_id" class="col-sm-4 col-form-label">Case Type </label>
                                                <div class="col-sm-8">
                                                    @php
                                                        // dd($request_data['case_type']);
                                                    @endphp
                                                    <select name="case_type" class="form-control select2" required>
                                                        <option value="">Select Case Type</option>

                                                        <option value="civil"
                                                            {{ old('case_type') || $request_data['case_type'] == 'civil' ? 'selected' : '' }}>Civil
                                                        </option>
                                                        <option value="criminal"
                                                            {{ old('case_type') || $request_data['case_type'] == 'criminal' ? 'selected' : '' }}>Criminal
                                                        </option>
                                                        <option value="service_matter"
                                                            {{ old('case_type') || $request_data['case_type'] == 'service_matter' ? 'selected' : '' }}>
                                                            Service Matter</option>
                                                        <option value="special"
                                                            {{ old('case_type') || $request_data['case_type'] == 'special' ? 'selected' : '' }}>
                                                            Special/Quassi-Judicial Cases</option>

                                                        <option value="high_court"
                                                            {{ old('case_type') || $request_data['case_type'] == 'high_court' ? 'selected' : '' }}>High
                                                            Court Division</option>
                                                        <option value="high_court"
                                                            {{ old('case_type') || $request_data['case_type'] == 'appellate_court' ? 'selected' : '' }}>
                                                            Appellate Court Division</option>
                                                    </select>
                                                    @error('case_type_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="case_type_id" class="col-sm-4 col-form-label">Report Type
                                                </label>
                                                <div class="col-sm-8">
                                                    <select name="report_type" id="report_type" class="form-control select2"
                                                        required>                       
                                                        <option value="">Select Report Type</option>

                                                        <option value="daily"
                                                            {{ old('report_type') || $request_data['report_type'] == 'daily' ? 'selected' : '' }}>Today
                                                            Report</option>

                                                            <option value="custom_date"
                                                            {{ old('report_type') || $request_data['report_type']   == 'custom_date' ? 'selected' : '' }}>
                                                            Custom Date Report</option>

                                                        <option value="next_week"
                                                            {{ old('report_type') || $request_data['report_type']  == 'next_week' ? 'selected' : '' }}>Next
                                                            Week Report</option>


                                                        <option value="next_month"
                                                            {{ old('report_type') || $request_data['report_type']  == 'next_month' ? 'selected' : '' }}>Next
                                                            Month Report</option>


                                                        <option value="not_updated"
                                                            {{ old('report_type') || $request_data['report_type']  == 'not_updated' ? 'selected' : '' }}>
                                                            NOT UPD Report</option>

                                                        <option value="disposed"
                                                            {{ old('report_type') || $request_data['report_type']  == 'disposed' ? 'selected' : '' }}>
                                                            Disposed of Case Report</option>



                                                    </select>
                                                    @error('report_type')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror

                                                    <div class="report_type_box mt-3"
                                                        @if (old('report_type') == 'from_to' || old('report_type') == 'disposed' || $request_data['report_type'] ==  'disposed' || $request_data['report_type'] ==  'custom_date' ) style="display:block;" @else style="display:none;" @endif>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="mb-1">
                                                                    <label class="form-label" for="">From
                                                                        Date</label>
                                                                    <input type="date" name="from_next_date"
                                                                        class="form-control @error('from_next_date') is-invalid @enderror"
                                                                        value="{{ !empty($request_data['from_next_date']) ? $request_data['from_next_date'] :  old('from_next_date') }}">

                                                                    @error('from_next_date')
                                                                        <div class="invalid-feedback">{{ $message }}
                                                                        </div>
                                                                    @enderror

                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="mb-1">
                                                                    <label class="form-label" for="">To
                                                                        Date</label>
                                                                    <input type="date" name="to_next_date"
                                                                        class="form-control @error('to_next_date') is-invalid @enderror"
                                                                        value="{{ !empty($request_data['to_next_date']) ? $request_data['to_next_date'] : old('to_next_date') }}">

                                                                    @error('to_next_date')
                                                                        <div class="invalid-feedback">{{ $message }}
                                                                        </div>
                                                                    @enderror

                                                                </div>
                                                            </div>
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
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title"> List <span style="color: red;font-size:15px;">{{ !empty($is_search) ? '(Showing Searched Item)' : '' }}</span> </h3>
                                    <div class="float-right">

                                        <form method="get" action="{{ route('print-report-search') }}" target="_blank">
                                            @csrf


                                            {{-- 'from_next_date' => '', --}}
                                            {{-- 'case_type' => '', --}}
                                            {{-- 'from_next_date' => '', --}}
                                            {{-- 'from_next_date' => '', --}}
                                            {{-- 'report_type' => '', --}}


                                                <input type="hidden" name="case_type" value="{{ $request_data['case_type'] }}">
                                                <input type="hidden" name="report_type" value="{{ $request_data['report_type'] }}">
                                                <input type="hidden" name="from_next_date" value="{{ $request_data['from_next_date'] }}">
                                                <input type="hidden" name="to_next_date" value="{{ $request_data['to_next_date'] }}">
                                                
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
                                            <th class="text-center"> ID</th>
                                            <th class="text-center"> Status</th>
                                            <th class="text-center"> Next Date</th>
                                            <th class="text-center"> Fixed for</th>
                                            <th class="text-center"> Case No</th>
                                            <th class="text-center"> S. Case No</th>
                                            <th class="text-center"> Court Name</th>
                                            <th class="text-center"> Complainant District </th>
                                            <th class="text-center"> Complainant </th>
                                            <th class="text-center"> Accused Name </th>
                                            <th class="text-center"> Accused District </th>
                                            <th class="text-center"> Case Matter</th>
                                           <th class="text-center"> Lawyer</th>
                                        </tr>
                                        </thead>
                                        <tbody>
    
                                        @foreach($data as $key=>$datum)
    
                                            <tr>
                                                <td>
                                                    {{ $key+1 }}
                                                </td>
                                                <td>
                                                    {{ $datum->created_case_id }}
                                                </td>
                                                <td>
                                                    {{ $datum->case_status_name }}
                                                </td>
                                                <td width="8%">
                                                    {{ date('d-m-Y', strtotime($datum->next_date)) }}
                                                </td>
                                                <td>
                                                    {{ $datum->next_date_reason_name }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('view-criminal-cases', $datum->id) }}"> 
                                                        {{ $datum->case_infos_case_no ? $datum->case_title_name.' '.$datum->case_infos_case_no.'/'.$datum->case_infos_case_year : '' }} 
                                                    
                                                    
                                                    </a>
                                                </td>
                                                <td>
                                                    {{ $datum->sub_seq_case_title_name }}
                                                    @php
                                                        $case_infos_sub_seq_case_no = explode(', ',trim($datum->case_infos_sub_seq_case_no));
                                                        $key = array_key_last($case_infos_sub_seq_case_no);
                                                        echo $case_infos_sub_seq_case_no[$key];
    
                                                        $case_infos_sub_seq_case_year = explode(', ',trim($datum->case_infos_sub_seq_case_year));
                                                        $key = array_key_last($case_infos_sub_seq_case_year);
                                                        $last_case_no = $case_infos_sub_seq_case_year[$key];
                                                        if ($last_case_no != null) {
                                                            echo '/'.$last_case_no;
                                                        }
                                                    @endphp
                                                </td>
                                                <td>
                                                    @if (!empty($datum->case_infos_sub_seq_court_short_id || $datum->sub_seq_court_short_write) )
                                                        @php
                                                            $court_name = explode(', ',$datum->case_infos_sub_seq_court_short_id);
                                                        @endphp
                                                        @if($datum->case_infos_sub_seq_court_short_id)
                                                            @if (count($court_name)> 1)
                                                                @foreach ($court_name as $pro)
                                                                    <li class="text-left">{{ $pro }}</li>
                                                                @endforeach
                                                            @else
                                                                @foreach ($court_name as $pro)
                                                                    {{ $pro }}
                                                                @endforeach
                                                            @endif
                                                        @endif
                                                        @php
                                                            $sub_seq_court_short_write = explode(', ',$datum->sub_seq_court_short_write);
                                                        @endphp
                                                        @if($datum->sub_seq_court_short_write)
                                                            @if (count($sub_seq_court_short_write)> 1)
                                                                @foreach ($sub_seq_court_short_write as $pro)
                                                                    <li class="text-left">{{ $pro }}</li>
                                                                @endforeach
                                                            @else
                                                                @foreach ($sub_seq_court_short_write as $pro)
                                                                    {{ $pro }}
                                                                @endforeach
                                                            @endif
                                                        @endif
                                                    @else
                                                        @php
                                                            $court_name = explode(', ',$datum->case_infos_court_short_id);
                                                        @endphp
                                                        @if($datum->case_infos_court_short_id)
                                                            @if (count($court_name)> 1)
                                                                @foreach ($court_name as $pro)
                                                                    <li class="text-left">{{ $pro }}</li>
                                                                @endforeach
                                                            @else
                                                                @foreach ($court_name as $pro)
                                                                    {{ $pro }}
                                                                @endforeach
                                                            @endif
                                                        @endif
                                                        @php
                                                            $court_short_write = explode(', ',$datum->court_short_write);
                                                        @endphp
                                                        @if($datum->court_short_write)
                                                            @if (count($court_short_write)> 1)
                                                                @foreach ($court_short_write as $pro)
                                                                    <li class="text-left">{{ $pro }}</li>
                                                                @endforeach
                                                            @else
                                                                @foreach ($court_short_write as $pro)
                                                                    {{ $pro }}
                                                                @endforeach
                                                            @endif
                                                        @endif
                                                    @endif
    
    
                                                </td>
                                                <td>
                                                    {{ $datum->district_name }}
                                                </td>
                                                <td>
                                                    @php
                                                        $notes = explode(', ',$datum->case_infos_complainant_informant_name);
                                                    @endphp
                                                    @if($datum->case_infos_complainant_informant_name)
                                                        @if (count($notes)>1)
                                                            @foreach ($notes as $pro)
                                                                <li class="text-left">{{ $pro }}</li>
                                                            @endforeach
                                                        @else
                                                            @foreach ($notes as $pro)
                                                                {{ $pro }}
                                                            @endforeach
                                                        @endif
    
                                                    @endif
                                                </td>
                                                <td>
                                                    @php
                                                        $accused = explode(', ',$datum->case_infos_accused_name);
                                                    @endphp
                                                    @if($datum->case_infos_accused_name)
                                                        @if (count($accused)>1)
                                                            @foreach($accused as $item)
                                                                <li class="text-left">{{ $item }}</li>
                                                            @endforeach
                                                        @else
                                                            @foreach($accused as $item)
                                                                {{ $item }}
                                                            @endforeach
                                                        @endif
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $datum->accused_district_name }}
                                                </td>
                                                <td>
                                                    {{ $datum->matter_name }} {{ $datum->matter_write }}
                                                </td>
                                                <td>
    
                                                   @if (!empty($datum->first_name) && !empty($datum->assigned_lawyer_id))
                                                    <li class="text-left">{{ $datum->first_name }} {{ $datum->middle_name }} {{ $datum->last_name }}  </li> @if($datum->lawyer_advocate_write) <li class="text-left">{{ $datum->lawyer_advocate_write }}</li> @endif
    
                                                    @php
                                                    $assigned_lawyer = explode(', ',$datum->assigned_lawyer_id);
                                                    @endphp
                                                    @if($datum->assigned_lawyer_id)
                                                                @foreach ($assigned_lawyer as $pro)
                                                                    <li class="text-left">{{ $pro }}</li>
                                                                @endforeach
    
                                                    @endif
    
                                                    @else
                                                    {{ $datum->first_name }} {{ $datum->middle_name }} {{ $datum->last_name }} {{ $datum->lawyer_advocate_write }}
    
                                                    @php
                                                        $assigned_lawyer = explode(', ',$datum->assigned_lawyer_id);
                                                   @endphp
                                                   @if($datum->assigned_lawyer_id)
                                                        @if (count($assigned_lawyer)>1)
                                                            @foreach ($assigned_lawyer as $pro)
                                                                <li class="text-left">{{ $pro }}</li>
                                                            @endforeach
                                                        @else
                                                            @foreach ($assigned_lawyer as $pro)
                                                                {{ $pro }}
                                                            @endforeach
                                                        @endif
    
                                                   @endif
    
                                                    @endif
    
    
    
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
