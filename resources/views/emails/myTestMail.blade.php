<!DOCTYPE html>
<html>
<head>
    <title>ItsolutionStuff.com</title>
</head>
<body>

    <div class="row">
        <div class="col-md-11 mx-auto">
            <div class="card">
                <div>
                    <div class="card-header" style="border-bottom: 0px;">
                        <style>
                            .data td, th, .data{
                                border: 1px solid #eeeeee;
                            }
                            .data th{
                                font-weight: 600;
                                background: #d3d3d3;
                            }
                            .card {
                                box-shadow: 0 0 1px rgb(0 0 0 / 13%), 0 1px 3px rgb(0 0 0 / 20%);
                                margin-bottom: 1rem;
                            }
                            .card {
                                position: relative;
                                display: -ms-flexbox;
                                display: flex;
                                -ms-flex-direction: column;
                                flex-direction: column;
                                min-width: 0;
                                word-wrap: break-word;
                                background-color: #fff;
                                background-clip: border-box;
                                border: 0 solid rgba(0,0,0,.125);
                                border-radius: 0.25rem;
                            }
                            .card-header {
                                background-color: transparent;
                                border-bottom: 1px solid rgba(0,0,0,.125);
                                padding: 0.75rem 1.25rem;
                                position: relative;
                                border-top-left-radius: 0.25rem;
                                border-top-right-radius: 0.25rem;
                            }
                            .card-header {
                                padding: 0.75rem 1.25rem;
                                margin-bottom: 0;
                                background-color: rgba(0,0,0,.03);
                                border-bottom: 0 solid rgba(0,0,0,.125);
                            }
                            .row {
                                display: -ms-flexbox;
                                display: flex;
                                -ms-flex-wrap: wrap;
                                flex-wrap: wrap;
                                margin-right: -7.5px;
                                margin-left: -7.5px;
                            }
                            .pt-1, .py-1 {
                                padding-top: 0.25rem!important;
                            }
                            .mr-1, .mx-1 {
                                margin-right: 0.25rem!important;
                            }
                            .border {
                                border: 1px solid #dee2e6!important;
                            }
                            .col-md-1{
                                position: relative;
                                width: 100%;
                                padding-right: 7.5px;
                                padding-left: 7.5px;
                            }
                            .text-bold, .text-bold.table td, .text-bold.table th {
                                font-weight: 700;
                            }
                            .text-center {
                                text-align: center!important;
                            }

                            .h6, h6 {
                                font-size: 1rem;
                            }
                            .h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {
                                margin-bottom: 0.5rem;
                                font-family: inherit;
                                font-weight: 500;
                                line-height: 1.2;
                                color: inherit;
                            }                
                            .text-bold, .text-bold.table td, .text-bold.table th {
                                font-weight: 700;
                            }
                            .text-center {
                                text-align: center!important;
                            }
                            .mb-0, .my-0 {
                                margin-bottom: 0!important;
                            }
                            .h6, h6 {
                                font-size: 1rem;
                            }
                            .h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {
                                margin-bottom: 0.5rem;
                                font-family: inherit;
                                font-weight: 500;
                                line-height: 1.2;
                                color: inherit;
                            }

                        </style>
                        <table style="width: 100%;z-index:99;" width="100%">

                            <tr>
                                <td style="text-align: center; width:100%;" valign="top">
                                    <span id="lblUnitName" class="HeaderStyle"><b>dLegal</b></span>
                                    <br/>
                                    <span id="lblUnitAddress" class="HeaderStyle2">365/B, Modhubag, Mogbazar, Hatirjheel, Dhaka - 1217, Bangladesh</span>
                                    <br/>
                                    <span id="lblUnitAddress" class="HeaderStyle2"> Cell:01717406688 </span>
                                    <br/>
                                    <span id="lblUnitAddress" class="HeaderStyle2"> Tel:01717406688 </span>
                                    <br/>
                                    <span id="lblUnitAddress" class="HeaderStyle2">Email:niamulkabir.adv@gmail.com</span>
                                        <span id="lblVoucherType" class="VoucherStyle">
                                    <br/>
                                </td>

                            </tr>
                        </table>

                    </div>
            @foreach($criminal_cases as $key=>$datum)
                @if (!empty($datum->next_date))
                    <div class="card">
                        <div class="card-header" style="border-bottom: 0px;">
                                <div class="row" style="margin-bottom: -10px;">
                                    <div class="col-md-1 border pt-1 mr-1">
                                        <span class="info-box-text text-center text-bold h6 text-text-warning" style="color: #FF7034;font-size:12px;">
                                            {{ $calendar_date = date('d-m-Y', strtotime($datum->next_date)) }}
                                        </span>
                                        <span class="info-box-number text-center mb-0 text-bold h6" style="color: #FF7034;font-size:11px;">
                                            @php
                                                $date = $datum->next_date;
                                                $time = date('l', strtotime($date));
                                                echo $time;
                                            @endphp
                                        </span>
                                    </div>
                                    <div class="col-md-1 border pt-1 mr-1">
                                        <h6 class="info-box-text text-center text-muted text-bold" style="font-size:12.5px;">Total</h6>
                                                <p class="info-box-number text-center text-muted mb-0 text-bold" style="font-size:12.5px;">
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

                                                                        // dd($calendar_wise_data);
                                                            @endphp
                                                    {{ $calendar_count }}</p>
                                    </div>
                                    <div class="col-md-1 border pt-1 mr-1">
                                        <h6 class="info-box-text text-center text-muted text-bold" style="font-size:12.5px;">Civil Cases</h6>
                                                <p class="info-box-number text-center text-muted mb-0 text-bold" style="font-size:12.5px;">0</p>
                                    </div>
                                    <div class="col-md-1 border pt-1 mr-1">
                                        <h6 class="info-box-text text-center text-muted text-bold" style="font-size:12.5px;">Criminal Cases</h6>
                                        <p class="info-box-number text-center text-muted mb-0 text-bold" style="font-size:12.5px;">{{ $calendar_count }}</p>
                                    </div>
                                    <div class="col-md-1 border pt-1 mr-1">
                                        <h6 class="info-box-text text-center text-muted text-bold" style="font-size:12.5px;">Others</h6>
                                        <p class="info-box-number text-center text-muted mb-0 text-bold" style="font-size:12.5px;">0</p>
                                    </div>
                                </div>

                        </div>

                        <div class="card-body" style="padding: 0.52rem;">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Court Name</th>
                                        <th>Case No.</th>
                                        <th>S. Case No.</th>
                                        <th>Fixed For</th>
                                        <th>1st Party/Complainant/ Petitioner/Plaintiff</th>
                                        <th>2nd Party/Accused/ Oppositon/Defendant</th>
                                        <th>Step to be taken</th>
                                        <th>Previous Day Note</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if (!empty($calendar_wise_data))
                                @foreach ($calendar_wise_data as $keys=>$value) 
                                <tr>
                                    <td>{{ $keys+1 }}</td>
                                    <td>
                                            
                                        @if (!empty($value->case_infos_sub_seq_court_short_id) || !empty($value->sub_seq_court_short_write))
                                                
                                            
                                        @php
                                            $notes = explode(', ',$value->case_infos_sub_seq_court_short_id);
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

@else

                                        @php
                                            $notes = explode(', ',$value->case_infos_court_short_id);
                                        @endphp
                                        @if($value->case_infos_court_short_id)
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
                                            $notes = explode(', ',$value->court_short_write);
                                        @endphp
                                        @if($value->court_short_write)
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
                                    <td>
                                        @php
                                            $case_infos_sub_seq_case_no = explode(', ', $value->case_infos_sub_seq_case_no);
                                        @endphp

                                        {{ last($case_infos_sub_seq_case_no) }} 

                                        @php
                                        if (!empty($value->case_infos_sub_seq_case_no) && !empty($value->case_infos_sub_seq_case_year)) {
                                            echo "/";
                                        }
                                            $case_infos_sub_seq_case_year = explode(', ', $value->case_infos_sub_seq_case_year);
                                        @endphp

                                        {{ last($case_infos_sub_seq_case_year) }} 

                                        {{-- @if ($value->case_infos_sub_seq_case_no)
                                            @if (count($case_infos_sub_seq_case_no) > 1)
                                                @foreach ($case_infos_sub_seq_case_no as $pro)
                                                    <li class="text-left">{{ $pro }}
                                                    </li>
                                                @endforeach
                                            @else
                                                @foreach ($case_infos_sub_seq_case_no as $pro)
                                                    {{ $pro }}
                                                @endforeach
                                            @endif
                                        @endif --}}
                                        {{-- @php
                                            $case_infos_sub_seq_case_year = explode(', ', $value->case_infos_sub_seq_case_year);
                                        @endphp
                                        @if ($value->case_infos_sub_seq_case_year)
                                            @if (count($case_infos_sub_seq_case_year) > 1)
                                                @foreach ($case_infos_sub_seq_case_year as $pro)
                                                    <li class="text-left">{{ $pro }}
                                                    </li>
                                                @endforeach
                                            @else
                                                @foreach ($case_infos_sub_seq_case_year as $pro)
                                                    {{ $pro }}
                                                @endforeach
                                            @endif
                                        @endif --}}

                                    </td>
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
                </div>
            </div>

        </div>
    </div>




















































    {{-- <style>
        .data td, th, .data{
            border: 1px solid #eeeeee;
        }
        .data th{
            font-weight: 600;
            background: #d3d3d3;
        }
    </style>
    <table style="width: 100%;z-index:99;" width="100%">

        <tr>
            <td style="text-align: center; width:100%;" valign="top">
                <span id="lblUnitName" class="HeaderStyle"><b>dLegal</b></span>
                <br/>
                <span id="lblUnitAddress" class="HeaderStyle2">365/B, Modhubag, Mogbazar, Hatirjheel, Dhaka - 1217, Bangladesh</span>
                <br/>
                <span id="lblUnitAddress" class="HeaderStyle2"> Cell:01717406688 </span>
                <br/>
                <span id="lblUnitAddress" class="HeaderStyle2"> Tel:01717406688 </span>
                <br/>
                <span id="lblUnitAddress" class="HeaderStyle2">Email:niamulkabir.adv@gmail.com</span>
                    <span id="lblVoucherType" class="VoucherStyle">
                <br/>
            </td>

        </tr>
    </table>


    <h1>{{ $title }}</h1>
    <p>{{ $body }}</p>
     
    <p>Thank you</p> --}}
</body>
</html>