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
                                    <button type="button" class="btn btn-block bg-gradient-info">Litigation Calendar(list)</button>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('litigation-calender-short') }}">
                                    <button type="button" class="btn btn-block bg-gradient-success">Litigation Calendar(Short)</button>
                                </a>
                            </div>
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
                <h3 class="" id="heading">Litigation Calendar</h3>
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div id="accordion">
                                <div class="card-header" id="headingTwo">
                                    <h3 class="card-title"> Search </h3>
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
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                    data-parent="#accordion">
                                    <div class="card-body">
                                        <form method="post" action="{{ route('search-litigation-calendar') }}">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label for="from_date" class="col-sm-4 col-form-label">
                                                            From Date </label>
                                                        <div class="col-sm-8">
                                                            <span class="date_span_calendar">
                                                                <input type="date" class="xDateContainer date_first_input"
                                                                       onchange="setCorrect(this,'from_date');"><input type="text" id="from_date"
                                                                                                                    name="from_date" value="dd/mm/yyyy"
                                                                                                                    class="date_second_input"
                                                                                                                    tabindex="-1"><span
                                                                    class="date_second_span" tabindex="-1">&#9660;</span>
                                                            </span>
                                                            @error('from_date')<span
                                                                class="text-danger">{{$message}}</span>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label for="to_date" class="col-sm-4 col-form-label">
                                                            To Date </label>
                                                        <div class="col-sm-8">
                                                            <span class="date_span_calendar">
                                                                <input type="date" class="xDateContainer date_first_input"
                                                                       onchange="setCorrect(this,'to_date');"><input type="text" id="to_date"
                                                                                                                    name="to_date" value="dd/mm/yyyy"
                                                                                                                    class="date_second_input"
                                                                                                                    tabindex="-1"><span
                                                                    class="date_second_span" tabindex="-1">&#9660;</span>
                                                            </span>
                                                            @error('to_date')<span
                                                                class="text-danger">{{$message}}</span>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="float-right">
                                                <button type="submit" id="submit" class="btn btn-primary text-uppercase"><i
                                                        class="fas fa-search"></i> Search
                                                </button>
                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @foreach($criminal_cases as $key=>$datum)
                    @if (!empty($datum->next_date))
                        <div class="card">

                            <div class="card-header">
                                {{-- <h3 class="card-title"> --}}
                                    <div class="row" style="margin-bottom: -20px;">
                                        <div class="col-md-1 border pt-1 mr-1">
                                            <span class="info-box-text text-center text-success text-bold h6 text-text-warning" style="color: ">
                                                {{ $calendar_date = date('d-m-Y', strtotime($datum->next_date)) }}
                                            </span>
                                            <span class="info-box-number text-center text-success mb-0 text-bold h6">
                                                @php
                                                    $date = $datum->next_date;
                                                    $time = date('l', strtotime($date));
                                                    echo $time;
                                                @endphp
                                            </span>
                                        </div>
                                        <div class="col-md-1 border pt-1 mr-1">
                                            <h6 class="info-box-text text-center text-muted text-bold">Total</h6>
                                                    <p class="info-box-number text-center text-muted mb-0 text-bold">
                                                        
                                                        @php
                                                            
                                                            $calendar_count = DB::table('criminal_cases')->where(['criminal_cases.delete_status' => 0, 'next_date' => $datum->next_date])
                                                                            ->count();
                                                        $calendar_wise_data = DB::table('criminal_cases')
                                                                            // ->leftJoin('criminal_cases_case_steps', 'criminal_cases.id', 'criminal_cases_case_steps.criminal_case_id')
                                                                            ->leftJoin('setup_next_date_reasons', 'criminal_cases.next_date_fixed_id', 'setup_next_date_reasons.id')
                                                                            ->leftJoin('setup_case_statuses', 'criminal_cases.case_status_id', 'setup_case_statuses.id')
                                                                            ->leftJoin('setup_case_titles', 'criminal_cases.case_infos_case_title_id', 'setup_case_titles.id')
                                                                            ->leftJoin('setup_courts', 'criminal_cases.name_of_the_court_id', '=', 'setup_courts.id')
                                                                            ->leftJoin('setup_districts', 'criminal_cases.case_infos_district_id', '=', 'setup_districts.id')
                                                                            ->leftJoin('setup_districts as accused_district', 'criminal_cases.client_district_id', '=', 'accused_district.id')
                                                                            ->leftJoin('setup_case_types', 'criminal_cases.case_type_id', '=', 'setup_case_types.id')
                                                                            ->leftJoin('setup_external_councils', 'criminal_cases.lawyer_advocate_id', '=', 'setup_external_councils.id')
                                                                        ->leftJoin('setup_case_titles as case_infos_title', 'criminal_cases.case_infos_sub_seq_case_title_id', '=', 'case_infos_title.id')
                                                                            ->select('criminal_cases.*',
                                                                            // 'criminal_cases_case_steps.another_claim',
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
                                                                            'case_infos_title.case_title_name as sub_seq_case_title_name')
                                                                            ->orderBy('criminal_cases.received_date','asc')
                                                                            ->where(['criminal_cases.delete_status' => 0, 'next_date' => $datum->next_date])
                                                                            ->get();
                                                                @endphp
                                                        {{ $calendar_count }}</p>
                                        </div>
                                        <div class="col-md-1 border pt-1 mr-1">
                                            <h6 class="info-box-text text-center text-muted text-bold">Civil Cases</h6>
                                                    <p class="info-box-number text-center text-muted mb-0 text-bold">0</p>
                                        </div>
                                        <div class="col-md-1 border pt-1 mr-1">
                                            <h6 class="info-box-text text-center text-muted text-bold">Criminal Cases</h6>
                                            <p class="info-box-number text-center text-muted mb-0 text-bold">{{ $calendar_count }}</p>
                                        </div>
                                        <div class="col-md-1 border pt-1 mr-1">
                                            <h6 class="info-box-text text-center text-muted text-bold">Others</h6>
                                            <p class="info-box-number text-center text-muted mb-0 text-bold">0</p>
                                        </div>
                                        
                                        
                                        {{-- <div class="col-md-2">
                                            <div class="info-box bg-light">
                                                <div class="info-box-content">
                                                    <span class="info-box-text text-center text-success text-bold h6 text-text-warning" style="color: ">
                                                        {{ $calendar_date = date('d-m-Y', strtotime($datum->next_date)) }}
                                                    </span>
                                                    <span class="info-box-number text-center text-success mb-0 text-bold h6">
                                                        @php
                                                            $date = $datum->next_date;
                                                            $time = date('l', strtotime($date));
                                                            echo $time;
                                                        @endphp
                                                    </span>
                                                </div>
                                            </div>
                                        </div> --}}

                                        
                                        {{-- <div class="col-12 col-md-2">
                                            <div class="info-box bg-light">
                                                <div class="info-box-content">
                                                    <span class="info-box-text text-center text-muted text-bold">Total</span>
                                                    <span class="info-box-number text-center text-muted mb-0 text-bold">
                                                        
                                                        @php
                                                            
                                                            $calendar_count = DB::table('criminal_cases')->where(['criminal_cases.delete_status' => 0, 'next_date' => $datum->next_date])
                                                                            ->count();
                                                        $calendar_wise_data = DB::table('criminal_cases')
                                                                            // ->leftJoin('criminal_cases_case_steps', 'criminal_cases.id', 'criminal_cases_case_steps.criminal_case_id')
                                                                            ->leftJoin('setup_next_date_reasons', 'criminal_cases.next_date_fixed_id', 'setup_next_date_reasons.id')
                                                                            ->leftJoin('setup_case_statuses', 'criminal_cases.case_status_id', 'setup_case_statuses.id')
                                                                            ->leftJoin('setup_case_titles', 'criminal_cases.case_infos_case_title_id', 'setup_case_titles.id')
                                                                            ->leftJoin('setup_courts', 'criminal_cases.name_of_the_court_id', '=', 'setup_courts.id')
                                                                            ->leftJoin('setup_districts', 'criminal_cases.case_infos_district_id', '=', 'setup_districts.id')
                                                                            ->leftJoin('setup_districts as accused_district', 'criminal_cases.client_district_id', '=', 'accused_district.id')
                                                                            ->leftJoin('setup_case_types', 'criminal_cases.case_type_id', '=', 'setup_case_types.id')
                                                                            ->leftJoin('setup_external_councils', 'criminal_cases.lawyer_advocate_id', '=', 'setup_external_councils.id')
                                                                        ->leftJoin('setup_case_titles as case_infos_title', 'criminal_cases.case_infos_sub_seq_case_title_id', '=', 'case_infos_title.id')
                                                                            ->select('criminal_cases.*',
                                                                            // 'criminal_cases_case_steps.another_claim',
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
                                                                            'case_infos_title.case_title_name as sub_seq_case_title_name')
                                                                            ->orderBy('criminal_cases.received_date','asc')
                                                                            ->where(['criminal_cases.delete_status' => 0, 'next_date' => $datum->next_date])
                                                                            ->get();
                                                                @endphp
                                                        {{ $calendar_count }}</span>
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
                                                    <span class="info-box-number text-center text-muted mb-0 text-bold">{{ $calendar_count }}</span>
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
                                        </div> --}}
                                    </div>

                                {{-- </h3> --}}
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>

                            </div>

                            <div class="card-body" style="padding: 0.52rem;">
                                <table class="table table-bordered table-striped calendar_list">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Court Name</th>
                                            <th>Case No.</th>
                                            <th>Fixed For</th>
                                            <th>1st Party/Complainant/ Petitioner/Plaintiff</th>
                                            <th>2nd Party/Accused/ Oppositon/Defendant</th>
                                            <th>Step to be taken</th>
                                            <th>Day Note</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if (!empty($calendar_wise_data))
                                    @foreach ($calendar_wise_data as $keys=>$value) 
                                    <tr>
                                        <td>{{ $keys+1 }}</td>
                                        <td>
                                            @php
                                                    $notes = explode(', ',$value->case_infos_sub_seq_court_short_id);
                                                    // dd($notes);
                                                    // dd(trim($notes));
                                                @endphp
                                                @if($value->case_infos_sub_seq_court_short_id)
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




                                                @php
                                                    $notes = explode(', ',$value->sub_seq_court_short_write);
                                                @endphp
                                                @if($value->sub_seq_court_short_write)
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
                                            {{-- @if (!empty($value->case_infos_sub_seq_court_short_id || $value->sub_seq_court_short_write) )
                                                @php
                                                    $court_name = explode(', ',$value->case_infos_sub_seq_court_short_id);
                                                @endphp
                                                @if($value->case_infos_sub_seq_court_short_id)
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
                                                    $sub_seq_court_short_write = explode(', ',$value->sub_seq_court_short_write);
                                                @endphp
                                                @if($value->sub_seq_court_short_write)
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
                                                    $court_name = explode(', ',$value->case_infos_court_short_id);
                                                @endphp
                                                @if($value->case_infos_court_short_id)
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
                                                    $court_short_write = explode(', ',$value->court_short_write);
                                                @endphp
                                                @if($value->court_short_write)
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
                                            @endif --}}

                                        </td>
                                        <td><a href="{{ route('view-criminal-cases', $value->id) }}"> {{ $value->case_infos_case_no ? $value->case_title_name.' '.$value->case_infos_case_no.'/'.$value->case_infos_case_year : '' }} </a></td>
                                        <td>{{ $value->next_date_reason_name }}</td>
                                        <td>
                                            @php
                                                $notes = explode(', ',$value->case_infos_complainant_informant_name);
                                            @endphp
                                            @if($value->case_infos_complainant_informant_name)
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
                                                $accused = explode(', ',$value->case_infos_accused_name);
                                            @endphp
                                            @if($value->case_infos_accused_name)
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
                                            {{ $value->updated_remarks_or_steps_taken }}
                                        </td>
                                        <td>
                                            @php
                                                $updated_day_notes = explode(', ', trim($value->updated_day_notes_id));
                                                // dd($updated_day_notes);
                                            @endphp
                                            @if($value->updated_day_notes_id)
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
                                    </tr>
                                    @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    @endif
                @endforeach
        
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
