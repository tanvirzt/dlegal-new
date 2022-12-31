@extends('layouts.admin_layouts.admin_layout')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Billings Log</h1>

                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>

                            <li class="breadcrumb-item active">Billings Log</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

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
                    

                </div>

            </div>
        </div>
  <div class="row p-5">
    <div class="card p-5">
        
    <table id="customers" class="table table-bordered">
  <tr>
    <th>SI</th>
    <th>Court</th>
    <th>Case No.</th>
    <th>Fixed For </th>
    <th>Party</th>
    <th>Police Station</th>
    <th>Matter</th>
  </tr>
  @php
  $i=1;
  @endphp
@foreach($criminal_cases as $keys=>$value)
  <tr>
    <td >{{ $i++ }}</td>
    @php

$calendar_count = DB::table('criminal_case_status_logs')->where(['criminal_case_status_logs.delete_status' => 0, 'updated_next_date' => $value->updated_next_date])
                ->count();
$calendar_wise_data = DB::table('criminal_case_status_logs')
                ->leftJoin('criminal_cases', 'criminal_cases.id', 'criminal_case_status_logs.case_id')
               

                ->leftJoin('setup_next_date_reasons', 'criminal_cases.next_date_fixed_id', 'setup_next_date_reasons.id')
                ->leftJoin('setup_case_statuses', 'criminal_cases.case_status_id', 'setup_case_statuses.id')
                ->leftJoin('setup_case_titles', 'criminal_cases.case_infos_case_title_id', 'setup_case_titles.id')
                ->leftJoin('setup_courts', 'criminal_cases.name_of_the_court_id', '=', 'setup_courts.id')
                ->leftJoin('setup_districts', 'criminal_cases.case_infos_district_id', '=', 'setup_districts.id')
                ->leftJoin('setup_districts as accused_district', 'criminal_cases.client_district_id', '=', 'accused_district.id')
                ->leftJoin('setup_case_types', 'criminal_cases.case_type_id', '=', 'setup_case_types.id')
                ->leftJoin('setup_external_councils', 'criminal_cases.lawyer_advocate_id', '=', 'setup_external_councils.id')
                ->leftJoin('setup_case_titles as case_infos_title', 'criminal_cases.case_infos_sub_seq_case_title_id', '=', 'case_infos_title.id')
                ->leftJoin('setup_matters', 'criminal_cases.matter_id', '=', 'setup_matters.id')
                ->leftJoin('setup_thanas', 'criminal_cases.case_infos_thana_id', '=', 'setup_thanas.id')


                ->select('criminal_cases.*', 'criminal_case_status_logs.case_id',
                

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
                'setup_thanas.thana_name',
                'case_infos_title.case_title_name as sub_seq_case_title_name',
                'setup_matters.matter_name'


            
                )
                ->orderBy('criminal_cases.case_infos_sub_seq_court_short_id','asc')
                ->orderBy('criminal_cases.case_infos_court_short_id','asc')
                ->where(['criminal_case_status_logs.delete_status' => 0, 'criminal_case_status_logs.updated_next_date' => $value->updated_next_date])
                ->get();

    @endphp
    @foreach ($calendar_wise_data as $keys=>$value)
    <td>                                            @if (!empty($value->case_infos_sub_seq_court_short_id) || !empty($value->sub_seq_court_short_write))


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



@endif</td>
@endforeach
<td class="case_no_column"><a href="{{ route('view-criminal-cases', $value->id) }}"> 
                                            @php
                                                $case_infos_sub_seq_case_no = explode(', ', $value->case_infos_sub_seq_case_no);
                                                // dd(count($case_infos_sub_seq_case_no));
                                            @endphp
                                            @if (!empty($value->case_infos_sub_seq_case_no))
                                                {{ $value->sub_seq_case_title_name }} {{ last($case_infos_sub_seq_case_no) }}

                                                @php
                                                if (!empty($value->case_infos_sub_seq_case_no) && !empty($value->case_infos_sub_seq_case_year)) {
                                                    echo "/";
                                                }
                                                    $case_infos_sub_seq_case_year = explode(', ', $value->case_infos_sub_seq_case_year);
                                                @endphp

                                                {{ last($case_infos_sub_seq_case_year) }}
                                            @else
                                                {{ $value->case_infos_case_no ? $value->case_title_name.' '.$value->case_infos_case_no.'/'.$value->case_infos_case_year : '' }}
                                            @endif
                                        
                                        </a></td>
                                        <td class="police_station_column">{{ $value->thana_name }}</td>
{{-- @php
    $proceedings = \App\Models\CriminalCaseStatusLog::select('updated_next_date')->where(['case_id' => $value->id ,'delete_status' => 0])->groupBy('updated_next_date')->first();

@endphp
<td>
    @if (!empty($proceedings->updated_next_date) && $proceedings->updated_next_date !== null)
        {{ $proceedings->updated_next_date }}
    @endif
</td> --}}

<td class="fixed_for_column">{{ $value->next_date_reason_name }}</td>

                                        <td class="party_column">
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

                                           <span style="color:blue;"> Vs.</span>
                                            
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
                                        {{-- <td>
                                            
                                        </td> --}}

                                        <td class="matter_column">
                                            {{ $value->matter_name }}
                                            {{ $value->matter_write }}
                                        </td>
  </tr>
@endforeach
  
</table>
    </div>
  </div>


    </div>
    <script type="text/javascript"> 
      window.addEventListener("load", window.print());
    </script>

@endsection

