@extends('layouts.admin_layouts.admin_layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-4">
                        <h1 class="m-0 text-dark">Dashboard</h1>
                    </div>
                    <div class="col-sm-4">
                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{ route('litigation-calender-list') }}">
                                    <button type="button" class="btn btn-block bg-gradient-info">Litigation Calender(list)</button>
                                </a>
                            </div>
{{--                            <div class="col-md-6">--}}
{{--                                <a href="{{ route('litigation-calender-short') }}">--}}
{{--                                    <button type="button" class="btn btn-block bg-gradient-success">Litigation Calender(Short)</button>--}}
{{--                                </a>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <h3 class="" id="heading">Litigation Calender</h3>
                @foreach($criminal_cases as $key=>$datum)
                <div class="card">

                    <div class="card-header">
                        <h3 class="card-title">
                            <div class="row">
                                <div class="col-12 col-md-2">
                                    <div class="info-box bg-light">
                                        <div class="info-box-content" style="margin-right: 130px;">
                                            <span class="info-box-text text-center text-success text-bold h6 text-text-warning" style="color: ">{{ $datum->received_date }}</span>
                                            <span class="info-box-number text-center text-success mb-0 text-bold h6">
                                                @php
                                                    $date = $datum->received_date;
                                                    $time = date('l', strtotime($date));
                                                    echo $time;
                                                @endphp
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-2">
                                    <div class="info-box bg-light">
                                        <div class="info-box-content">
                                            <span class="info-box-text text-center text-muted text-bold">Total</span>
                                            <span class="info-box-number text-center text-muted mb-0 text-bold">{{ $criminal_cases_count }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="info-box bg-light">
                                        <div class="info-box-content">
                                            <span class="info-box-text text-center text-muted text-bold">Civil Cases</span>
                                            <span class="info-box-number text-center text-muted mb-0 text-bold">0</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="info-box bg-light">
                                        <div class="info-box-content">
                                            <span class="info-box-text text-center text-muted text-bold">Criminal Cases</span>
                                            <span class="info-box-number text-center text-muted mb-0 text-bold">{{ $criminal_cases_count }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-2">
                                    <div class="info-box bg-light">
                                        <div class="info-box-content">
                                            <span class="info-box-text text-center text-muted text-bold">Others</span>
                                            <span class="info-box-number text-center text-muted mb-0 text-bold">0</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>

                    </div>

                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Court Name</th>
                                <th>Case No.</th>
                                <th>Fixed For</th>
                                <th>1st Party/Complainant</th>
                                <th>2nd Party/Accused</th>
                                <th>Step to be taken</th>
                                <th>Day Note</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{ $key+1 }}</td>
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
                                <td>{{ $datum->case_infos_case_no ? $datum->case_title_name.' '.$datum->case_infos_case_no.'/'.$datum->case_infos_case_year : '' }}</td>
                                <td>{{ $datum->next_date_reason_name }}</td>
                                <td>
                                    @php
                                        $notes = explode(', ',$datum->case_infos_complainant_informant_name);
                                    @endphp
                                    @if($datum->case_infos_complainant_informant_name)
                                        @if (count($notes) >1)
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
                                    {{ $datum->accused_write }}
                                </td>
                                <td>
                                    @php
                                        $updated_day_notes = explode(', ',$datum->updated_day_notes_id);
                                    @endphp
                                    @if($datum->updated_day_notes_id)
                                        @if (count($updated_day_notes) >1)
                                            @foreach ($updated_day_notes as $pro)
                                                <li class="text-left">{{ $pro }}</li>
                                            @endforeach    
                                        @else
                                            @foreach ($updated_day_notes as $pro)
                                                {{ $pro }}
                                            @endforeach
                                        @endif
                                    @endif
                                </td>
                                <td>
                                    {{ $datum->updated_remarks_or_steps_taken }}
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            @endforeach
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
