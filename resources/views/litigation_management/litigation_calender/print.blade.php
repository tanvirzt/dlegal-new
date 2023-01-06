@extends('layouts.admin_layouts.admin_layout')
@section('content')
<style>
        details {
            position:relative;
        }
        details summary {
            display:block;
            cursor: pointer;
            color: red;
        }
        details summary:focus {
            outline:none;
        }
        details[open] {
            display:block;
            padding-bottom:25px;
            /* padding-top:10px; */
            animation: open .3s linear;
        }
        details[open] summary {
            position:absolute;
            bottom: 0;
            left:0;
        }
        #main_more{
            color: black;
        }

        details #open{text-align:middle;}
        details #open:after{
            display: inline-block;
            position:relative;
            top: -3px;
            padding-left: 8px;
            content: "\00bb";
            transform: rotate(90deg);
        }
        details[open] #open{display:none;}
        details #close:after{
            display: inline-block;
            position:relative;
            top: 4px;
            padding-left: 8px;
            content: "\00bb";
            transform: rotate(270deg);
        }
        details #close{display:none;}
        details[open] #close{display:block;}
        details[open] #main_more{display:none;}

        ::-webkit-details-marker {display: none;}
        @keyframes open {
            0% {
                opacity: 0;
                transform: translateY(-10px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
         .logBtn{
            margin-left: 8rem; 
         }


        /*Start Scroll View */
         .card.CaseInfoCard {
            height: 69.5rem;
            overflow-y: scroll;
        }
        .CaseInfoCard::-webkit-scrollbar {
            width: 5px;
        }
        .CaseInfoCard::-webkit-scrollbar-track {
            background: #fff !important;
            border-left: 1px solid #ddd;
        }
        .CaseInfoCard::-webkit-scrollbar-thumb {
            background: rgb(0 0 0 / 20%) !important;
            border-radius: 10px !important;
            padding: 2px;
        }


         .card.caseStepCard {
            height: 25.5rem;
            overflow-y: scroll;
        }
        .caseStepCard::-webkit-scrollbar {
            width: 5px;
        }
        .caseStepCard::-webkit-scrollbar-track {
            background: #fff !important;
            border-left: 1px solid #ddd;
        }
        .caseStepCard::-webkit-scrollbar-thumb {
            background: rgb(0 0 0 / 20%) !important;
            border-radius: 10px !important;
            padding: 2px;
        }


        .card.caseEvents {
            height: 23.5rem;
            overflow-y: scroll;
        }
        .caseEvents::-webkit-scrollbar {
            width: 5px;
        }
        .caseEvents::-webkit-scrollbar-track {
            background: #fff !important;
            border-left: 1px solid #ddd;
        }
        .caseEvents::-webkit-scrollbar-thumb {
            background: rgb(0 0 0 / 20%) !important;
            border-radius: 10px !important;
            padding: 2px;
        }

        .card.documentCard {
            height: 24.5rem;
            overflow-y: scroll;
        }
        .documentCard::-webkit-scrollbar {
            width: 5px;
        }
        .documentCard::-webkit-scrollbar-track {
            background: #fff !important;
            border-left: 1px solid #ddd;
        }
        .documentCard::-webkit-scrollbar-thumb {
            background: rgb(0 0 0 / 20%) !important;
            border-radius: 10px !important;
            padding: 2px;
        }




        .card.caseFileLoacation {
            height: 19.5rem;
            overflow-y: scroll;
        }
        .caseFileLoacation::-webkit-scrollbar {
            width: 5px;
        }
        .caseFileLoacation::-webkit-scrollbar-track {
            background: #fff !important;
            border-left: 1px solid #ddd;
        }
        .caseFileLoacation::-webkit-scrollbar-thumb {
            background: rgb(0 0 0 / 20%) !important;
            border-radius: 10px !important;
            padding: 2px;
        }



        .card.clientInfoCard  {
            height: 37rem;
            overflow-y: scroll;
        }
        .clientInfoCard::-webkit-scrollbar {
            width: 5px;
        }
        .clientInfoCard::-webkit-scrollbar-track {
            background: #fff !important;
            border-left: 1px solid #ddd;
        }
        .clientInfoCard::-webkit-scrollbar-thumb {
            background: rgb(0 0 0 / 20%) !important;
            border-radius: 10px !important;
            padding: 2px;
        }


        .card-header.caseInfoHeader {
            position: sticky;
            top: 0px;
        }

        .card-header {
            background-color: #f3f3f3 !important;
        }

        .caseInfoTable tbody tr td:first-child {
            width: 26% !important;
        }
        .caseInfoTable2 tbody tr td:first-child {
            width: 22% !important;
        }
        .layInfoTable tbody tr td:first-child {
            width: 30.5% !important;
        }


        




    </style>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
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
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                            data-parent="#accordion">
                            <div class="card-body">
                                <form method="get" action="{{ route('search-litigation-calendar') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="lawyer_advocate_id" class="col-sm-4 col-form-label">Panel
                                                    Lawyer</label>
                                                <div class="col-sm-8">
                                                    <select name="lawyer_advocate_id" id="lawyer_advocate_id" class="form-control select2"
                                                            >
                                                        <option value="">Select</option>
                                                        @foreach($external_council as $item)
                                                        <option
                                                            value="{{ $item->id }}" {{( old('lawyer_advocate_id') == $item->id ? 'selected':'')}}>{{ $item->first_name }} {{ $item->last_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('lawyer_advocate_id')<span
                                                        class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="client_id" class="col-sm-4 col-form-label">Client/Party</label>
                                                <div class="col-sm-8">

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <select name="client_id"
                                                                    id="client_id"
                                                                    class="form-control select2">
                                                                <option value="">Select</option>
                                                                @foreach($client_name as $item)
                                                                    <option
                                                                        value="{{ $item->client_name }}" {{  old('client_id') == $item->id ? 'selected' : '' }}>{{ $item->client_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control"
                                                                    id="client_name_write"
                                                                    name="client_name_write"
                                                                    placeholder="Client/Party"
                                                                    value="{{ old('client_name_write') }}">
                                                        </div>
                                                    </div>

                                                    @error('client_name')<span
                                                        class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="matter_id" class="col-sm-4 col-form-label">Case Matter</label>
                                                <div class="col-sm-8">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <select name="matter_id"
                                                                    id="matter_id"
                                                                    class="form-control select2">
                                                                <option value="">Select</option>
                                                                @foreach($matter as $item)
                                                                    <option
                                                                        value="{{ $item->id }}" {{( old('matter_id') == $item->id ? 'selected':'')}}>{{ $item->matter_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control"
                                                                    id="matter_write"
                                                                    name="matter_write"
                                                                    placeholder="Matter"
                                                                    value="{{ old('matter_write') }}">
                                                        </div>
                                                    </div>


                                                    @error('matter_id')<span
                                                        class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>

                                        </div>
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
                                            <div class="form-group row">
                                                <div class="icheck-success d-inline col-sm-4">
                                     
                                                </div>
                                                <div class="icheck-success d-inline col-sm-3">
                                                    <input type="checkbox" name="todays_case" id="todays_case">
                                                    <label for="todays_case">
                                                        Today
                                                    </label>
                                                </div>
                                                <div class="icheck-success d-inline col-sm-5">
                                                    <input type="checkbox" name="tomorrows_case" id="tomorrows_case">
                                                    <label for="tomorrows_case">
                                                        Tomorrow
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="float-right">

                                        @if (!empty($is_searched))

                                            <a href="{{ route('litigation-calendar-list-print-preview-search',['param1'=>$from_date,'param2'=>$to_date]) }}" target="_blank"
                                                class="btn btn-info"><i class="fas fa-print"></i> Print </a>
                                                <button type="button" class="btn btn-info"
                                                        data-toggle="modal" data-target="#modal-lg-status-of-the-case"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Update Status of the Case"><i class="fas fa-paper-plane"></i> Email
                                                </button>
                                        @endif

                                        <button type="submit" id="submit" class="btn btn-primary text-uppercase"><i
                                                class="fas fa-search"></i> Search
                                        </button>
                                    </div>

                                </form>

                                <div class="modal fade" id="modal-lg-status-of-the-case">
                                    <div class="modal-dialog modal-md">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="card-title"> Send Cause List </h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{ route('send-cause-list-pdf-to-mail') }}" method="post">
                                                @csrf
                                                <div class="card-body">
                                                    <div class="form-group row">
                                                        <label for="updated_case_status_id" class="col-sm-4 col-form-label"> Own </label>
                                                        <div class="col-sm-8">
                                                            <input type="hidden" name="param1" class="form-control" value="{{ !empty($is_searched) ? $from_date : '' }}">
                                                            <input type="hidden" name="param2" class="form-control" value="{{ !empty($is_searched) ? $to_date : '' }}">
                                                            <input type="checkbox" name="own_mail" class="form-control">
                                                            @error('updated_case_status_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="updated_case_status_id" class="col-sm-4 col-form-label"> Others </label>
                                                        <div class="col-sm-8">
                                                            <input type="checkbox" id="send_mail" class="form-control">
                                                            @error('updated_case_status_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row" id="mail" style="display: none;">
                                                        <label for="updated_case_status_id" class="col-sm-4 col-form-label"> Email </label>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="others_email" class="form-control">
                                                            @error('updated_case_status_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                            
                            
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        <div class="float-right">
                                                            <button type="submit" class="btn btn-primary text-uppercase"><i class="fas fa-paper-plane"></i> Send
                                                            </button>
                                                        </div>
                                                    </div>
                            
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">

                    </div>
                </div>
                @if(Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                    {{Session::get('success')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
               @endif
                @if (!empty($criminal_cases))
@php


@endphp


    
                
                        <div class="card">
                            <div class="card-header" id="{{ $print_date}}">
                                
                                

                                    <div class="row w-75" style="margin-bottom: -20px;">
                                        <div class="col-md-2 border pt-1 mr-1">
                                            <span class="info-box-text text-center text-bold h6 text-text-warning" style="color: #FF7034;font-size:15px;display:block;">
                                                {{ $calendar_date = date('d-m-Y', strtotime($print_date)) }}
                                            </span>
                                            <span class="info-box-number text-center mb-0 text-bold h6" style="color: #FF7034;font-size:13px;display:block;">
                                                @php
                                                    $date = $print_date;
                                                    $time = date('l', strtotime($date));
                                                    echo $time;
                                                @endphp
                                            </span>
                                           
                                        </div>
                                        <div class="col-md-1 border pt-1 mr-1">
                                            <h6 class="info-box-text text-center text-muted text-bold" style="font-size:11px;">Total</h6>
                                                    <p class="info-box-number text-center text-muted mb-0 text-bold" style="font-size:15px;">

                                                        @php

                                                            $calendar_count = DB::table('criminal_case_status_logs')->where(['criminal_case_status_logs.delete_status' => 0, 'updated_next_date' => $print_date])
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
                                                                            ->where(['criminal_case_status_logs.delete_status' => 0, 'criminal_case_status_logs.updated_next_date' => $print_date])
                                                                            ->get();
                                                               
                                                                @endphp
                                                        {{ $calendar_count }}</p>
                                        </div>
                                        <div class="col-md-2 border pt-1 mr-1">
                                            <h6 class="info-box-text text-center text-muted text-bold" style="font-size:11px;">Civil Cases</h6>
                                                    <p class="info-box-number text-center text-muted mb-0 text-bold" style="font-size:15px;">0</p>
                                        </div>
                                        <div class="col-md-2 border pt-1 mr-1">
                                            <h6 class="info-box-text text-center text-muted text-bold" style="font-size:11px;">Criminal Cases</h6>
                                            <p class="info-box-number text-center text-muted mb-0 text-bold" style="font-size:15px;">{{ $calendar_count }}</p>
                                        </div>
                                        <div class="col-md-1 border pt-1 mr-1">
                                            <h6 class="info-box-text text-center text-muted text-bold" style="font-size:11px;">Appeal</h6>
                                            <p class="info-box-number text-center text-muted mb-0 text-bold" style="font-size:15px;">0</p>
                                        </div>

                                        <div class="col-md-1 border pt-1 mr-1">
                                            <h6 class="info-box-text text-center text-muted text-bold" style="font-size:11px;">Revision</h6>
                                            <p class="info-box-number text-center text-muted mb-0 text-bold" style="font-size:15px;">0</p>
                                        </div>
                                      
                                    </div>

                                    
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>

                            </div>

                            <div class="card-body" style="padding: 0.52rem;" >
                                <table class="table table-bordered table-striped calendar_list">
                                    <thead>
                                        <tr>
                                            <th class="sl_no_column" width="7%">SL</th>
                                            <th class="court_column" width="15%">Court</th>
                                            <th class="case_no_column" width="10%">Case No.</th>
                                            <th class="police_station_column" width="10%">Police Station</th>
                                            <th class="fixed_for_column" width="20%">Fixed For</th>
                                            <th class="party_column" width="20%">Party</th>
                                            <th class="matter_column" width="25%">Matter</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if (!empty($calendar_wise_data))
                                        @foreach ($calendar_wise_data as $keys=>$value)
                                        <tr>
                                        <td class="sl_no_column">{{ $keys+1 }}</td>
                                        <td class="court_column">

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

                                        </td>
                                        <td class="case_no_column"><a href="{{ route('view-criminal-cases', $value->id) }}"> 
                                            @php
                                                $case_infos_sub_seq_case_no = explode(', ', $value->case_infos_sub_seq_case_no);
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

                                        <td class="matter_column">
                                            {{ $value->matter_name }}
                                            {{ $value->matter_write }}
                                        </td>
                                
                                     

                                      </tr>
                                    
                                    @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>

                        </div>
               
      
                @endif
            </div>
        </section>
    </div>


    
    

@endsection
@section('scripts')
<script type="text/javascript"> 
    window.addEventListener("load", window.print());
  </script>
@endsection