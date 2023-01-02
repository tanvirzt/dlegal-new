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
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark" id="heading">Litigation Cause List <span style="color: red;font-size:15px;">
                            {{-- {{ !empty($is_searched) ? '(Showing Searched Item)' : '' }} --}}
                        
                        
                            {{ !empty($request_data['lawyer_advocate_id']) && $request_data['lawyer_advocate_id'] != null ? '(Showing : Panel Lawyer)' : '' }}
                            {{ !empty($request_data['client_id']) && $request_data['client_id'] != null ? '(Showing : Client Party)' : '' }}
                            {{ !empty($request_data['client_name_write']) && $request_data['client_name_write'] != null ? '(Showing : Client Party)' : '' }}
                            {{ !empty($request_data['matter_id']) && $request_data['matter_id'] != null ? '(Showing : Case Matter)' : '' }}
                            {{ !empty($request_data['matter_write']) && $request_data['matter_write'] != null ? '(Showing : Case Matter)' : '' }}
                            {{ !empty($request_data['from_date']) && $request_data['from_date'] != 'dd/mm/yyyy' && $request_data['from_date'] != null ? '(Showing : From Date)' : '' }}
                            {{ !empty($request_data['to_date']) && $request_data['to_date'] != 'dd/mm/yyyy' && $request_data['to_date'] != null ? '(Showing : To Date)' : '' }}
                            {{ !empty($request_data['todays_case']) && $request_data['todays_case'] != null ? '(Showing : Today)' : '' }}
                            {{ !empty($request_data['tomorrows_case']) && $request_data['tomorrows_case'] != null ? '(Showing : Tomorrow)' : '' }}

                            {{-- {{ $request_data['today'] != null ? 'Today' : '' }} --}}
                            {{-- {{ $request_data['to_date'] != null ? 'Tomorrow' : '' }} --}}
                        
                        
                        </span></h1>




                    </div>
                    <div class="col-sm-3">

                    </div>
                    <div class="col-sm-3">
                    </form>
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        {{-- <h3 class="" id="heading">Litigation Cause List <span style="color: red;font-size:15px;">
            {{ !empty($is_searched) ? '(Showing Searched Item)' : '' }}
        
        
            {{ !empty($request_data['lawyer_advocate_id']) && $request_data['lawyer_advocate_id'] != null ? 'Panel Lawyer' : '' }}
            {{ !empty($request_data['client_id']) && $request_data['client_id'] != null ? 'Client Party' : '' }}
            {{ !empty($request_data['client_name_write']) && $request_data['client_name_write'] != null ? 'Client Party' : '' }}
            {{ !empty($request_data['matter_id']) && $request_data['matter_id'] != null ? 'Case Matter' : '' }}
            {{ !empty($request_data['matter_write']) && $request_data['matter_write'] != null ? 'Case Matter' : '' }}
            {{ !empty($request_data['from_date']) && $request_data['from_date'] != null ? 'From Date' : '' }}
            {{ !empty($request_data['to_date']) && $request_data['to_date'] != null ? 'To Date' : '' }}
        
        </span></h3> --}}
        <div class="row">
            <div class="col-md-10">
                
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
                            {{-- @if (!empty($is_searched))
                                <a href="{{ route('litigation-calendar-list-print-preview-search',['param1'=>$from_date,'param2'=>$to_date]) }}" target="_blank"
                                class="btn btn-info btn-sm float-right"><i class="fas fa-print"></i> Print </a>
                            @else
                            <a href="{{ route('litigation-calendar-list-print-preview') }}" target="_blank"
                            class="btn btn-info btn-sm float-right"><i class="fas fa-print"></i> Print</a>

                            @endif --}}

                            <!-- <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                                <i class="fas fa-download"></i> Print
                                </button>  -->
                        </div>
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
                                                    {{-- <input type="checkbox" name="todays_case" id="todays_case">
                                                    <label for="todays_case">
                                                        Todays Case
                                                    </label> --}}
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
                                                


                                                {{-- <a href="{{ route('send-email-pdf',['param1'=>$from_date,'param2'=>$to_date]) }}"
                                                    class="btn btn-info"><i class="fas fa-print"></i> Send Mail </a>     --}}


                                            {{-- <a href="{{ route('litigation-calendar-list-print-preview-search',['param1'=>$from_date,'param2'=>$to_date]) }}" target="_blank"
                                                class="btn btn-info"><i class="fas fa-print"></i> Print </a> --}}
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
                <form method="POST" action="{{ route('calendar-list-arrow-up') }}" style="display: contents;">
                    <input type="hidden" class="form-control" name="from_date" value="{{ !empty($criminal_cases[0]->next_date) ? date('Y-m-d', strtotime($criminal_cases[0]->next_date)) : '' }}">
                    <input type="submit" class="btn btn-info-cause" name="arrow_up" value="" style="padding: 4px 12px 4px 12px;">
                    
                    <i class="fas fa-angle-left" style="position: relative;
                    right: 21px;"></i>
                </form>
                <form action="{{ route('calendar-list-arrow-down') }}" method="post" style="display: contents;">
                    <input type="hidden" class="form-control" name="to_date" value="{{ !empty($criminal_cases[0]->next_date) ? date('Y-m-d', strtotime($criminal_cases[0]->next_date)) : '' }}">
                    <input type="submit" class="btn btn-info-cause" name="arrow_down" value="" style="padding: 4px 12px 4px 12px;">
                    <i class="fas fa-angle-right" style="position: relative;
                    right: 21px;"></i>
                </form>
                <a class="btn btn-info-cause" href="{{ route('litigation-calender-list') }}" style="width: 126px;"> Todays Case </a>

                <a class="btn btn-info-cause mt-1 lit_calender" href="{{ route('litigation-calender-short') }}"> Litigation Calendar </a>
{{-- <input type="checkbox" class="steps"> --}}



<div class="dropdown float-right">
    <button class="btn btn-secondary btn-info-cause mt-1 dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Columns
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      <a class="dropdown-item" href="#">
        <input type="checkbox" checked class="sl_no" name="sl_no">            
        <label for="sl_no" class="sl_no">SL </label>
      </a>
      <a class="dropdown-item" href="#">
        <input type="checkbox" checked class="court" name="court">            
        <label for="court" class="court"> Court </label>
      </a>
      <a class="dropdown-item" href="#">
        <input type="checkbox" checked class="case_no" name="case_no">            
        <label for="case_no" class="case_no"> Case No. </label>
      </a>
      <a class="dropdown-item" href="#">
        <input type="checkbox" checked class="police_station" name="police_station">            
        <label for="police_station" class="police_station"> Police Station </label>
      </a>
      <a class="dropdown-item" href="#">
        <input type="checkbox" checked class="fixed_for" name="fixed_for">            
        <label for="fixed_for" class="fixed_for"> Fixed For </label>
      </a>

      <a class="dropdown-item" href="#">
        <input type="checkbox" checked class="party" name="party">            
        <label for="party" class="party"> Party </label>
      </a>
      <a class="dropdown-item" href="#">
        <input type="checkbox" checked class="matter" name="matter">            
        <label for="matter" class="matter"> Matter </label>
      </a>
      <a class="dropdown-item" href="#">
        <input type="checkbox" checked class="steps_notes" name="steps_notes">            
        <label for="steps_notes" class="steps_notes"> Steps & Notes </label>
      </a>
    </div>
  </div>
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

// dd($request_data);

@endphp


                @foreach($criminal_cases as $key=>$datum)
                    @if (!empty($datum->next_date))
                        <div class="card">
                            <div class="card-header" id="{{ $datum->next_date }}">
                                
                                

                                    <div class="row w-75" style="margin-bottom: -20px;">
                                        <div class="col-md-2 border pt-1 mr-1">
                                            <span class="info-box-text text-center text-bold h6 text-text-warning" style="color: #FF7034;font-size:15px;display:block;">
                                                {{ $calendar_date = date('d-m-Y', strtotime($datum->next_date)) }}
                                            </span>
                                            <span class="info-box-number text-center mb-0 text-bold h6" style="color: #FF7034;font-size:13px;display:block;">
                                                @php
                                                    $date = $datum->next_date;
                                                    $time = date('l', strtotime($date));
                                                    echo $time;
                                                @endphp
                                            </span>
                                           
                                        </div>
                                        <div class="col-md-1 border pt-1 mr-1">
                                            <h6 class="info-box-text text-center text-muted text-bold" style="font-size:11px;">Total</h6>
                                                    <p class="info-box-number text-center text-muted mb-0 text-bold" style="font-size:15px;">

                                                        @php

                                                            $calendar_count = DB::table('criminal_case_status_logs')->where(['criminal_case_status_logs.delete_status' => 0, 'updated_next_date' => $datum->next_date])
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
                                                                            ->where(['criminal_case_status_logs.delete_status' => 0, 'criminal_case_status_logs.updated_next_date' => $datum->next_date])
                                                                            ->get();
                                                                 //dd($calendar_wise_data);
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
                                        {{-- <div class="col-md-1 border pt-1 mr-1">
                                            <h6 class="info-box-text text-center text-muted text-bold" style="font-size:11px;">Others</h6>
                                            <p class="info-box-number text-center text-muted mb-0 text-bold" style="font-size:15px;">0</p>
                                        </div> --}}

                                        <div class="col-md-1 border pt-1 mr-1">
                                            <h6 class="info-box-text text-center text-muted text-bold" style="font-size:11px;">Appeal</h6>
                                            <p class="info-box-number text-center text-muted mb-0 text-bold" style="font-size:15px;">0</p>
                                        </div>

                                        <div class="col-md-1 border pt-1 mr-1">
                                            <h6 class="info-box-text text-center text-muted text-bold" style="font-size:11px;">Revision</h6>
                                            <p class="info-box-number text-center text-muted mb-0 text-bold" style="font-size:15px;">0</p>
                                        </div>
                                        <div class="col-md-1 p-3 mr-1">
                                         <a href="{{ route('litigation-calender-print',$datum->next_date) }}" title="Print Case Info" target="_blank" class="btn btn-info btn-sm"><i class="fas fa-print"></i></a>
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
                                            <th class="sl_no_column" width="2%">SL</th>
                                            <th class="court_column" width="5%">Court</th>
                                            <th class="case_no_column" width="10%">Case No.</th>
                                            <th class="police_station_column" width="5%">Police Station</th>
                                            {{-- <th width="10%">Previous Case Date</th> --}}
                                            <th class="fixed_for_column" width="10%">Fixed For</th>
                                            <th class="party_column" width="20%">Party</th>
                                            {{-- <th width="17%">2nd Party</th> --}}
                                            <th class="matter_column" width="10%">Matter</th>
                                            <th class="matter_column" width="10%">Type</th>
                                            <th class="matter_column" width="10%">PV.Date</th>
                                            <th class="matter_column" width="10%">PV.D Fixed For</th>
                                            <th class="steps_notes_column" width="15%">Next Steps</th>
                                            <th class="steps_notes_column" width="15%">Lawyer</th>
                                            <th class="steps_notes_column" width="15%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if (!empty($calendar_wise_data))
                                    @foreach ($calendar_wise_data as $keys=>$value)
                                    @php
$letter_notice_explode = App\Models\CriminalCasesLetterNotice::where('case_id', $value->id)->get()->toArray();
$documents = App\Models\SetupDocument::where('delete_status', 0)->orderBy('documents_name', 'asc')->get();
$existing_assignend_external_council = App\Models\SetupExternalCouncilAssociate::where(['external_council_id' => $value->lawyer_advocate_id, 'delete_status' => 0])->orderBy('first_name', 'asc')->get();

$data = DB::table('criminal_cases')
            ->leftJoin('setup_legal_issues', 'criminal_cases.legal_issue_id', '=', 'setup_legal_issues.id')
            ->leftJoin('setup_legal_services', 'criminal_cases.legal_service_id', '=', 'setup_legal_services.id')
            ->leftJoin('setup_complainants', 'criminal_cases.complainant_informant_id', '=', 'setup_complainants.id')
            ->leftJoin('setup_accuseds', 'criminal_cases.accused_id', '=', 'setup_accuseds.id')
            ->leftJoin('setup_in_favour_ofs', 'criminal_cases.in_favour_of_id', '=', 'setup_in_favour_ofs.id')
            ->leftJoin('setup_courts', 'criminal_cases.name_of_the_court_id', '=', 'setup_courts.id')
            ->leftJoin('setup_next_date_reasons', 'criminal_cases.next_date_fixed_id', '=', 'setup_next_date_reasons.id')
            ->leftJoin('setup_modes', 'criminal_cases.mode_of_receipt_id', '=', 'setup_modes.id')
            ->leftJoin('setup_referrers', 'criminal_cases.referrer_id', '=', 'setup_referrers.id')
            ->leftJoin('setup_in_favour_ofs as client_party', 'criminal_cases.client_party_id', '=', 'client_party.id')
            ->leftJoin('setup_client_categories', 'criminal_cases.client_category_id', '=', 'setup_client_categories.id')
            ->leftJoin('setup_client_subcategories', 'criminal_cases.client_subcategory_id', '=', 'setup_client_subcategories.id')
            ->leftJoin('setup_clients', 'criminal_cases.client_id', '=', 'setup_clients.id')
            ->leftJoin('setup_professions', 'criminal_cases.client_profession_id', '=', 'setup_professions.id')
            ->leftJoin('setup_divisions as client_division', 'criminal_cases.client_division_id', '=', 'client_division.id')
            ->leftJoin('setup_districts as client_district', 'criminal_cases.client_district_id', '=', 'client_district.id')
            ->leftJoin('setup_thanas as client_thana', 'criminal_cases.client_thana_id', '=', 'client_thana.id')
            ->leftJoin('setup_coordinators', 'criminal_cases.client_coordinator_tadbirkar_id', '=', 'setup_coordinators.id')
            ->leftJoin('setup_in_favour_ofs as opposition_party', 'criminal_cases.opposition_party_id', '=', 'opposition_party.id')
            ->leftJoin('setup_client_categories as opposition_category', 'criminal_cases.opposition_category_id', '=', 'opposition_category.id')
            ->leftJoin('setup_client_subcategories as opposition_subcategory', 'criminal_cases.opposition_subcategory_id', '=', 'opposition_subcategory.id')
            ->leftJoin('setup_clients as opposition', 'criminal_cases.opposition_id', '=', 'opposition.id')
            ->leftJoin('setup_professions as opposition_profession', 'criminal_cases.opposition_profession_id', '=', 'opposition_profession.id')
            ->leftJoin('setup_divisions as opposition_division', 'criminal_cases.opposition_division_id', '=', 'opposition_division.id')
            ->leftJoin('setup_districts as opposition_district', 'criminal_cases.opposition_district_id', '=', 'opposition_district.id')
            ->leftJoin('setup_thanas as opposition_thana', 'criminal_cases.opposition_thana_id', '=', 'opposition_thana.id')
            ->leftJoin('setup_coordinators as opposition_coordinator', 'criminal_cases.opposition_coordinator_tadbirkar_id', '=', 'opposition_coordinator.id')
            ->leftJoin('setup_external_councils', 'criminal_cases.lawyer_advocate_id', '=', 'setup_external_councils.id')
            ->leftJoin('setup_divisions as case_infos_division', 'criminal_cases.case_infos_division_id', '=', 'case_infos_division.id')
            ->leftJoin('setup_districts as case_infos_district', 'criminal_cases.case_infos_district_id', '=', 'case_infos_district.id')
            ->leftJoin('setup_thanas as case_infos_thana', 'criminal_cases.case_infos_thana_id', '=', 'case_infos_thana.id')
            ->leftJoin('setup_case_categories', 'criminal_cases.case_category_id', '=', 'setup_case_categories.id')
            ->leftJoin('setup_case_subcategories', 'criminal_cases.case_subcategory_id', '=', 'setup_case_subcategories.id')
            ->leftJoin('setup_case_titles as case_infos_case_title', 'criminal_cases.case_infos_case_title_id', '=', 'case_infos_case_title.id')
            ->leftJoin('setup_case_titles as sub_seq_case_infos_case_title', 'criminal_cases.case_infos_sub_seq_case_title_id', '=', 'sub_seq_case_infos_case_title.id')
            ->leftJoin('setup_matters', 'criminal_cases.matter_id', '=', 'setup_matters.id')
            ->leftJoin('setup_case_statuses', 'criminal_cases.case_status_id', '=', 'setup_case_statuses.id')
            ->leftJoin('setup_case_types', 'criminal_cases.case_type_id', '=', 'setup_case_types.id')
            ->leftJoin('setup_allegations', 'criminal_cases.case_infos_sub_seq_case_title_id', '=', 'setup_allegations.id')
            ->leftJoin('admins', 'criminal_cases.received_by_id', '=', 'admins.id')
            ->leftJoin('setup_cabinets', 'criminal_cases.cabinet_id', '=', 'setup_cabinets.id')
            ->leftJoin('setup_case_titles as case_infos_title', 'criminal_cases.case_infos_sub_seq_case_title_id', '=', 'case_infos_title.id')
            ->leftJoin('setup_groups as client_group', 'criminal_cases.client_group_id', '=', 'client_group.id')
            ->leftJoin('setup_groups as opposition_group', 'criminal_cases.opposition_group_id', '=', 'opposition_group.id')
            ->select('criminal_cases.*',
                'setup_legal_issues.legal_issue_name',
                'setup_legal_services.legal_service_name',
                'setup_complainants.complainant_name',
                'setup_accuseds.accused_name',
                'setup_in_favour_ofs.in_favour_of_name',
                'setup_courts.court_name',
                'setup_next_date_reasons.next_date_reason_name',
                'setup_modes.mode_name',
                'setup_referrers.referrer_name',
                'client_party.in_favour_of_name as client_party_name',
                'setup_client_categories.client_category_name',
                'setup_client_subcategories.client_subcategory_name',
                'setup_clients.client_name',
                'setup_professions.profession_name',
                'client_division.division_name as client_division_name',
                'client_district.district_name as client_district_name',
                'client_thana.thana_name as client_thana_name',
                'setup_coordinators.coordinator_name',
                'opposition_party.in_favour_of_name as oppsition_party_name',
                'opposition_category.client_category_name as opposition_category_name',
                'opposition_subcategory.client_subcategory_name as opposition_subcategory_name',
                'opposition.client_name as opposition_name',
                'opposition_profession.profession_name as opposition_profession_name',
                'opposition_division.division_name as opposition_division_name',
                'opposition_district.district_name as opposition_district_name',
                'opposition_thana.thana_name as opposition_thana_name',
                'opposition_coordinator.coordinator_name as opposition_coordinator_name',
                'setup_external_councils.first_name',
                'setup_external_councils.middle_name',
                'setup_external_councils.last_name',
                'case_infos_division.division_name as case_infos_division_name',
                'case_infos_district.district_name as case_infos_district_name',
                'case_infos_thana.thana_name as case_infos_thana_name',
                'setup_case_categories.case_category',
                'setup_case_subcategories.case_subcategory',
                'case_infos_case_title.case_title_name as case_infos_case_title_name',
                'sub_seq_case_infos_case_title.case_title_name as sub_seq_case_infos_case_title_name',
                'setup_matters.matter_name',
                'setup_case_statuses.case_status_name',
                'setup_case_types.case_types_name',
                'setup_allegations.allegation_name',
                'admins.name',
                'setup_cabinets.cabinet_name',
                'case_infos_title.case_title_name as sub_seq_case_title_name',
                'client_group.group_name as client_group_name',
                'opposition_group.group_name as opposition_group_name')
            ->where('criminal_cases.id', $value->id)
            ->first();
//dd($data);
@endphp
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
                                        {{-- <td>
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

                                        </td> --}}
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
                                        <td class="matter_column">
                                            {{ $value->case_types_name }}
                                         
                                        </td>
                                        @php
                                        
                                         $case_logs = DB::table('criminal_case_status_logs')
                                        ->leftJoin('setup_case_statuses', 'criminal_case_status_logs.updated_case_status_id', '=', 'setup_case_statuses.id')
                                        ->leftJoin('setup_next_date_reasons', 'criminal_case_status_logs.updated_fixed_for_id', '=', 'setup_next_date_reasons.id')
                                        ->leftJoin('setup_court_proceedings', 'criminal_case_status_logs.court_proceedings_id', '=', 'setup_court_proceedings.id')
                                        ->leftJoin('setup_court_last_orders', 'criminal_case_status_logs.updated_court_order_id', '=', 'setup_court_last_orders.id')
                                        ->leftJoin('setup_day_notes', 'criminal_case_status_logs.updated_day_notes_id', '=', 'setup_day_notes.id')
                                        ->leftJoin('setup_next_date_reasons as index_reason', 'criminal_case_status_logs.updated_index_fixed_for_id', '=', 'index_reason.id')
                                        ->leftJoin('setup_external_council_associates', 'criminal_case_status_logs.updated_engaged_advocate_id', '=', 'setup_external_council_associates.id')
                                        ->leftJoin('setup_next_day_presences', 'criminal_case_status_logs.updated_next_day_presence_id', '=', 'setup_next_day_presences.id')
                                        ->select('criminal_case_status_logs.*', 'setup_case_statuses.case_status_name', 'setup_next_date_reasons.next_date_reason_name', 'setup_court_proceedings.court_proceeding_name', 'setup_court_last_orders.court_last_order_name', 'setup_day_notes.day_notes_name', 'setup_external_council_associates.first_name', 'setup_external_council_associates.middle_name', 'setup_external_council_associates.last_name', 'setup_next_day_presences.next_day_presence_name', 'index_reason.next_date_reason_name as index_next_date_reason_name')
                                        ->where(['criminal_case_status_logs.case_id' => $value->id, 'criminal_case_status_logs.delete_status' => 0])
                                         ->orderBy('criminal_case_status_logs.updated_order_date', 'desc')
                                        ->skip(1)
                                        // ->orderByRaw("DATE_FORMAT('Y-m-d',criminal_case_status_logs.updated_order_date), 'desc'")
                                        ->first();
                                          //dd($case_logs);
                                        @endphp
                                        <td>
                                         @if(@$case_logs->updated_next_date != null)   
                                         {{@$case_logs->updated_next_date}}
                                         @else

                                        @endif
                                        </td>
                                       
                                        <td>
                                            @if(@$case_logs->next_date_reason_name != null)   
                                            {{ @$case_logs->next_date_reason_name }}
                                            @else
                                            @endif
                                        </td> 
                                        <td class="steps_notes_column">
                                            {{ $value->updated_remarks_or_steps_taken }}
                                        
                                            @php
                                                $updated_day_notes = explode(',', trim($value->updated_day_notes_id));
                                                // dd($updated_day_notes);
                                            @endphp
                                            @if($value->updated_day_notes_id)
                                                @if (count($updated_day_notes) >1)
                                                    @foreach ($updated_day_notes as $pro)
                                                    @if ($pro)
                                                    <li class="text-left">{{ $pro }}</li>
                                                    @endif
                                                    @endforeach
                                                @else
                                                    @foreach ($updated_day_notes as $pro)
                                                        {{ $pro }}
                                                    @endforeach
                                                @endif
                                            @endif
                                        </td>
                                                                              
                                        <td class="steps_notes_column">
                                             @if($value->lead_laywer_name)
                                             {{$value->lead_laywer_name}}
                                             @else
                                            
                                             @endif
                                            </td>
                                        <td> 
                                            <div class="card-tools">
                                           
                                            <div class="dropdown">
                                                <svg class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink6"
                                                     data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                                     xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                     class="feather feather-more-horizontal">
                                                    <circle cx="12" cy="12" r="1"></circle>
                                                    <circle cx="19" cy="12" r="1"></circle>
                                                    <circle cx="5" cy="12" r="1"></circle>
                                                </svg>

                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink6" 
                                                     style="will-change: transform;">
                                                    <a class="dropdown-item btn btn-outline-success" data-toggle="modal" data-target="#modal-lg-send-messages" data-placement="top"
                                                       href=""><i class="fas fa-bell"></i> Send SMS/Mail</a>
                                                       
                                                    <a class="dropdown-item" data-toggle="modal" data-target="#modal-lg-2"  data-placement="top" title="Update Status"
                                                       href=""><i class="fas fa-signal"></i> CPL</a>
                                                    {{-- <a class="dropdown-item" data-toggle="modal" data-target="#modal-lg" data-placement="top" title="Update Status"
                                                       href=""><i class="fas fa-signal"></i> CPL</a> --}}
                                                   <a class="dropdown-item" href="{{ route('add-billing-from-district-court', $value->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-money-bill"></i> Bill</a>
                                                </div>
                                            </div>
                                            </div>
                                        </td>
                                    </tr>
                                    

                                    
                                    {{-- update status fo the case --}}

<div class="modal fade" id="modal-lg-status-of-the-case">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="card-title"> Edit Status of the Case </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('update-criminal-cases-status-column', $value->id) }}" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group row">
                        <label for="updated_case_status_id" class="col-sm-4 col-form-label">Status</label>
                        <div class="col-sm-8">
                            <select name="updated_case_status_id" id="updated_case_status_id"
                                    class="form-control select2">
                                <option value="">Select</option>
                                <option value="Disposed"
                                        {{ old('updated_case_status_id') == 'Disposed' ? 'selected' : '' }}>
                                        Disposed Cases</option>
                                @foreach ($case_status as $item)
                                    <option value="{{ $item->id }}"
                                        {{ old('updated_case_status_id') == $item->id ? 'selected' : '' }}>
                                        {{ $item->case_status_name }}</option>
                                @endforeach

                            </select>
                            @error('updated_case_status_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>


                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <div class="float-right">
                            <button type="submit" class="btn btn-primary text-uppercase"><i
                                    class="fas fa-save"></i> Update
                            </button>
                        </div>
                    </div>

                </div>
            </form>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-lg-letter-notice">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="card-title"> Update {{$value->case_type}} Court </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('update-criminal-cases', $value->id) }}" method="post">
                @csrf
                <div class="card-body">
                    <h6 class="text-uppercase text-bold"><u> Case Events & Incidents </u></h6>
                    <h6 class="text-uppercase text-bold">
                        <div class="row">
                            <div class="col-md-2"> Date</div>
                            <div class="col-md-4 text-center ml-3">Title</div>
                            <div class="col-md-3 text-center">Description</div>
                            <div class="col-md-2">Evidence</div>
                        </div>
                    </h6>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <div class="input-group hdtuto_letter_notice control-group increment_letter_notice">
                                <input type="hidden" name="letter_notice_sections[]"
                                       class="myfrm form-control mr-2 col-md-4" value="letter_notice_sections">
                                <input type="date" name="letter_notice_date[]"
                                       class="myfrm form-control mr-2 col-md-4"
                                       value="{{ !empty($letter_notice_explode[0]['letter_notice_date']) ? $letter_notice_explode[0]['letter_notice_date'] : '' }}">
                                <select name="letter_notice_documents_id[]"
                                        class="form-control mr-2 col-md-3">
                                    <option value="">Select</option>
                                    @foreach($documents as $item)
                                        <option
                                            value="{{ $item->id }}" {{ !empty($letter_notice_explode[0]['letter_notice_documents_id']) && $letter_notice_explode[0]['letter_notice_documents_id']  == $item->id ? 'selected' : '' }}>{{ $item->documents_name }}</option>
                                    @endforeach
                                </select>
                                <input type="text" name="letter_notice_documents_write[]"
                                       class="myfrm form-control mr-2 col-md-4" placeholder="Document"
                                       value="{{ !empty($letter_notice_explode[0]['letter_notice_documents_write']) ? $letter_notice_explode[0]['letter_notice_documents_write'] : '' }}">

                                <input type="text" name="letter_notice_particulars_write[]"
                                       class="myfrm form-control mr-2 col-md-4" placeholder="Particulars"
                                       value="{{ !empty($letter_notice_explode[0]['letter_notice_particulars_write']) ? $letter_notice_explode[0]['letter_notice_particulars_write'] : '' }}">

                                <select name="letter_notice_type_id[]"
                                        class="form-control mr-2">
                                    <option value="">Select</option>
                                    @foreach($documents_type as $item)
                                        <option
                                            value="{{ $item->id }}" {{ !empty($letter_notice_explode[0]['letter_notice_type_id']) && $letter_notice_explode[0]['letter_notice_type_id']  == $item->id ? 'selected' : '' }}>{{ $item->documents_type_name }}</option>
                                    @endforeach
                                </select>
                                <div class="input-group-btn">
                                    <button class="btn btn-success btn_success_letter_notice_edit"
                                            type="button"><i
                                            class="fldemo glyphicon glyphicon-plus"></i>+
                                    </button>
                                </div>
                            </div>
                            <div class="clone_letter_notice @if(count($letter_notice_explode) <= 1) hide @endif">
                                @php
                                    array_shift($letter_notice_explode);
                                @endphp
                                @foreach ( $letter_notice_explode as $values)
                                    <div class="hdtuto_letter_notice control-group lst input-group"
                                         style="margin-top:10px">
                                        <input type="hidden" name="letter_notice_sections[]"
                                               class="myfrm form-control mr-2 col-md-4" value="letter_notice_sections">
                                        <input type="date" name="letter_notice_date[]"
                                               class="myfrm form-control mr-2 col-md-4" value="{{ $values['letter_notice_date'] }}">
                                        <select name="letter_notice_documents_id[]"
                                                class="form-control mr-2 col-md-3">
                                            <option value="">Select</option>
                                            @foreach($documents as $item)
                                                <option
                                                    value="{{ $item->id }}" {{ $values['letter_notice_documents_id'] == $item->id ? 'selected' : '' }}>{{ $item->documents_name }}</option>
                                            @endforeach
                                        </select>
                                        <input type="text" name="letter_notice_documents_write[]"
                                               class="myfrm form-control mr-2 col-md-4" placeholder="Document"
                                               value="{{ $values['letter_notice_documents_write'] }}">

                                        <input type="text" name="letter_notice_particulars_write[]"
                                               class="myfrm form-control mr-2 col-md-4" placeholder="Particulars"
                                               value="{{ $values['letter_notice_particulars_write'] }}">
                                        <select name="letter_notice_type_id[]"
                                                class="form-control mr-2">
                                            <option value="">Select</option>
                                            @foreach($documents_type as $item)
                                                <option
                                                    value="{{ $item->id }}" {{ !empty($values['letter_notice_type_id']) && $values['letter_notice_type_id']  == $item->id ? 'selected' : '' }}>{{ $item->documents_type_name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-btn">
                                            <button class="btn btn-danger btn_danger_letter_notice"
                                                    type="button"><i
                                                    class="fldemo glyphicon glyphicon-remove"></i> -
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="clone_letter_notice_edit hide">
                                <div class="hdtuto_letter_notice control-group lst input-group"
                                     style="margin-top:10px">
                                    <input type="hidden" name="letter_notice_sections[]"
                                           class="myfrm form-control mr-2 col-md-4" value="letter_notice_sections">
                                    <input type="date" name="letter_notice_date[]"
                                           class="myfrm form-control mr-2 col-md-4">
                                    <select name="letter_notice_documents_id[]"
                                            class="form-control mr-2 col-md-3">
                                        <option value="">Select</option>
                                        @foreach($documents as $item)
                                            <option
                                                value="{{ $item->id }}" {{ old('letter_notice_id') == $item->id ? 'selected' : '' }}>{{ $item->documents_name }}</option>
                                        @endforeach
                                    </select>
                                    <input type="text" name="letter_notice_documents_write[]"
                                           class="myfrm form-control mr-2 col-md-4" placeholder="Document">

                                    <input type="text" name="letter_notice_particulars_write[]"
                                           class="myfrm form-control mr-2 col-md-4" placeholder="Particulars">
                                    <select name="letter_notice_type_id[]"
                                            class="form-control mr-2">
                                        <option value="">Select</option>
                                        @foreach($documents_type as $item)
                                            <option
                                                value="{{ $item->id }}" {{ old('letter_notice_type_id') == $item->id ? 'selected' : '' }}>{{ $item->documents_type_name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="input-group-btn">
                                        <button class="btn btn-danger btn_danger_letter_notice"
                                                type="button"><i
                                                class="fldemo glyphicon glyphicon-remove"></i> -
                                        </button>
                                    </div>
                                </div>
                            </div>

                            @error('case_infos_letter_notice_informant_name')<span
                                class="text-danger">{{$message}}</span>@enderror
                        </div>
                    </div>


                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <div class="float-right">
                            <button type="submit" class="btn btn-primary text-uppercase"><i
                                    class="fas fa-save"></i> Update
                            </button>
                        </div>
                    </div>

                </div>
            </form>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
{{-- update status of the case --}}

{{-- billings log --}}
{{-- update cases modal --}}

    <!-- /.modal -->

    <div class="modal fade" id="modal-lg-2">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="card-title"> Update Activities </h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('update-criminal-cases-activity', $data->id) }}" method="post">
                    @csrf
                    <div class="card-body">
                        <input type="hidden" name="case_no"
                               value="{{ $data->case_infos_case_no ? $data->case_infos_case_title_name . ' ' . $data->case_infos_case_no . ' of ' . $data->case_infos_case_year : '' }}@if ($data->sub_seq_case_title_name != null) , @endif
                               {{ $data->sub_seq_case_title_name }}
                               @php
                                   $case_infos_sub_seq_case_no = explode(', ',trim($data->case_infos_sub_seq_case_no));
                                   $key = array_key_last($case_infos_sub_seq_case_no);
                                   echo $case_infos_sub_seq_case_no[$key];

                                   $case_infos_sub_seq_case_year = explode(', ',trim($data->case_infos_sub_seq_case_year));
                                   $key = array_key_last($case_infos_sub_seq_case_year);
                                   $last_case_no = $case_infos_sub_seq_case_year[$key];
                                   if ($last_case_no != null) {
                                       echo '/'.$last_case_no;
                                   }
                               @endphp">

                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group row">
                                    <label for="activity_date" class="col-sm-4 col-form-label"> Date
                                    </label>
                                    <div class="col-sm-8">
                                        <span class="date_span_status_modal">
                                            <input type="date" class="xDateContainer date_first_input"
                                                   onchange="setCorrect(this,'activity_date');"><input type="text"
                                                                                                       id="activity_date" name="activity_date"
                                                                                                       value="dd-mm-yyyy"
                                                                                                       class="date_second_input" tabindex="-1"><span
                                                class="date_second_span"
                                                tabindex="-1">&#9660;</span>
                                        </span>

                                        @error('activity_date')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="activity_action" class="col-sm-4 col-form-label"> Activity/Action </label>
                                    <div class="col-sm-8">
                                        <textarea name="activity_action" class="form-control" rows="2"
                                                  placeholder="">{{old('activity_action')}}</textarea>
                                        @error('activity_action')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="activity_progress" class="col-sm-4 col-form-label">Progress</label>
                                    <div class="col-sm-8">
                                        <textarea name="activity_progress" class="form-control" rows="2"
                                                  placeholder="">{{old('activity_progress')}}</textarea>
                                        @error('activity_progress')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="activity_mode_id" class="col-md-4 col-form-label"> Mode
                                    </label>
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <select name="activity_mode_id" class="form-control select2">
                                                    <option value="">Select</option>
                                                    @foreach ($mode as $item)
                                                        <option value="{{ $item->id }}"
                                                            {{ old('activity_mode_id') == $item->mode_name ? 'selected' : '' }}>
                                                            {{ $item->mode_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" id="activity_mode_write" placeholder="Mode"
                                                       name="activity_mode_write">
                                            </div>

                                        </div>

                                        @error('activity_mode_write')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="start_time" class="col-sm-4 col-form-label">Start Time</label>
                                    <div class="col-sm-8">
                                        <input type="datetime-local" class="form-control" id="start_time"
                                               name="start_time">
                                        @error('start_time')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="end_time" class="col-sm-4 col-form-label">End Time</label>
                                    <div class="col-sm-8">
                                        <input type="datetime-local" class="form-control" id="end_time"
                                               name="end_time">
                                        @error('end_time')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="setup_hours" class="col-sm-4 col-form-label">Time Spent</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="setup_hours" name="setup_hours"
                                               readonly>
                                        @error('setup_hours')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="time_spend_manual" class="col-sm-4 col-form-label">Time Spent</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="time_spend_manual" name="time_spend_manual">
                                        @error('time_spend_manual')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-6">

                                <div class="form-group row">
                                    <label for="activity_engaged_id" class="col-md-4 col-form-label"> Engaged
                                    </label>
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <select name="activity_engaged_id[]" data-placeholder="Select"
                                                        class="form-control select2" multiple>
                                                    <option value="">Select</option>
                                                    @foreach ($external_council as $item)
                                                        <option
                                                            value="{{ $item->first_name . ' ' . $item->last_name }}"
                                                            {{ old('updated_engaged_advocate_id') == $item->id ? 'selected' : '' }}>
                                                            {{ $item->first_name }}
                                                            {{ $item->last_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" id="activity_engaged_write"
                                                       placeholder="Activity Engaged" name="activity_engaged_write">
                                            </div>
                                        </div>

                                        @error('activity_mode_write')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="activity_forwarded_to_id" class="col-md-4 col-form-label"> Forwarded To
                                    </label>
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <select name="activity_forwarded_to_id[]" class="form-control select2" data-placeholder="Select"
                                                        multiple>
                                                    <option value="">Select</option>
                                                    @foreach ($external_council as $item)
                                                        <option value="{{ $item->id }}"
                                                            {{ old('activity_forwarded_to_id') == $item->id ? 'selected' : '' }}>
                                                            {{ $item->first_name }}
                                                            {{ $item->last_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control"
                                                       id="activity_forwarded_to_write" placeholder="Forwarded To"
                                                       name="activity_forwarded_to_write">
                                            </div>
                                        </div>

                                        @error('activity_forwarded_to_write')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="activity_requirements" class="col-sm-4 col-form-label">Requirements</label>
                                    <div class="col-sm-8">
                                        <textarea name="activity_requirements" class="form-control" rows="2"
                                                  placeholder="">{{old('activity_requirements')}}</textarea>
                                        @error('client')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="activity_remarks" class="col-sm-4 col-form-label">Note</label>
                                    <div class="col-sm-8">
                                        <textarea name="activity_remarks" class="form-control" rows="2"
                                                  placeholder="">{{old('activity_remarks')}}</textarea>
                                        @error('client')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>


                            </div>

                        </div>

                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <div class="float-right">
                                <button type="submit" class="btn btn-primary text-uppercase"><i class="fas fa-save"></i>
                                    Update
                                </button>
                            </div>
                        </div>

                    </div>
                </form>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
 <!-- /.modal -->

 <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="card-title"> Update District Court Status </h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('update-criminal-cases-status', $value->id) }}" method="post">
                    <div class="">

                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="updated_case_status_id" class="col-md-4 col-form-label"> Status
                                        </label>
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <select name="updated_case_status_id" id="updated_case_status_id"
                                                            class="form-control select2">
                                                        <option value="">Select</option>
                                                        @php
                                                        $case_status=App\Models\SetupCaseStatus::where('delete_status', 0)->orderBy('case_status_name', 'asc')->get();
                                                        @endphp
                                                        @foreach ($case_status as $item)
                                                            <option value="{{ $item->id }}"
                                                                    @if (!empty($previous_activity->updated_case_status_id) && $previous_activity->updated_case_status_id == $item->id) selected @else {{ old('updated_case_status_id') == $item->id ? 'selected' : '' }} @endif>
                                                                {{ $item->case_status_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control"
                                                           id="updated_case_status_write" name="updated_case_status_write"
                                                           @if (!empty($previous_activity->updated_case_status_write)) value="{{ $previous_activity->updated_case_status_write }}"
                                                           @endif
                                                           placeholder="Status"
                                                           value="{{ old('updated_case_status_write') }}">
                                                </div>
                                            </div>

                                            @error('updated_case_status')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="updated_order_date" class="col-sm-4 col-form-label">
                                            Case/Order Date
                                        </label>
                                        <div class="col-sm-8">
                                            <span class="date_span_status_modal">
                                                <input type="date" class="xDateContainer date_first_input"
                                                       onchange="setCorrect(this,'updated_order_date');"><input
                                                    type="text" id="updated_order_date" name="updated_order_date"

                                                    @if (!empty(@$previous_activity->updated_next_date) && @$previous_activity->updated_next_date != null)
                                                        value="{{ date('d/m/Y', strtotime(@$previous_activity->updated_next_date)) }}"
                                                    @else
                                                        value="dd-mm-yyyy"
                                                    @endif

                                                    class="date_second_input" tabindex="-1"><span
                                                    class="date_second_span" tabindex="-1">&#9660;</span>
                                            </span>
                                            @error('updated_order_date')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="updated_fixed_for_id" class="col-md-4 col-form-label"> Fixed For
                                        </label>
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <select name="updated_fixed_for_id" id="updated_fixed_for_id"
                                                            class="form-control select2">
                                                        <option value="">Select</option>
                                                        @foreach ($next_date_reason as $item)
                                                            <option value="{{ $item->id }}"
                                                                    @if (!empty($previous_activity->updated_index_fixed_for_id) && $previous_activity->updated_index_fixed_for_id == $item->id) selected @else {{ old('updated_fixed_for_id') == $item->id ? 'selected' : '' }} @endif>
                                                                {{ $item->next_date_reason_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control"
                                                           id="updated_fixed_for_write" name="updated_fixed_for_write"
                                                           placeholder="Fixed For"
                                                           @if (!empty($previous_activity->updated_fixed_for_write)) value="{{ $previous_activity->updated_fixed_for_write }}"
                                                           @endif
                                                           value="{{ old('updated_fixed_for_write') }}">
                                                </div>
                                            </div>

                                            @error('updated_fixed_for')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="updated_fixed_for_id" class="col-md-4 col-form-label"> Court
                                            Proceeding
                                        </label>
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <select name="court_proceedings_id[]"  id="updated_fixed_for_id"
                                                            class="form-control select2">
                                                        <option value="">Select</option>
                                                        @foreach ($court_proceeding as $item)
                                                        <option value="{{ $item->court_proceeding_name }}"
                                                                {{ old('court_proceedings_id') == $item->id ? 'selected' : '' }}>
                                                                {{ $item->court_proceeding_name }}</option>
                                                        @endforeach
                                                    </select>
                                                
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control"
                                                           id="court_proceedings_write" name="court_proceedings_write"
                                                           placeholder="Court Proceeding"
                                                           value="{{ old('court_proceedings_write') }}">
                                                </div>
                                            </div>

                                            @error('updated_fixed_for')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="updated_court_order_id" class="col-md-4 col-form-label"> Court Order
                                        </label>
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <select name="updated_court_order_id[]" id="updated_fixed_for_id"
                                                            class="form-control select2">
                                                        <option value="">Select</option>
                                                        @foreach ($last_court_order as $item)
                                                        <option value="{{ $item->court_last_order_name }}"
                                                                {{ old('updated_court_order_id') == $item->court_last_order_name ? 'selected' : '' }}>
                                                                {{ $item->court_last_order_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control"
                                                           id="updated_court_order_write" placeholder="Court Order"
                                                           name="updated_court_order_write">

                                                </div>
                                            </div>

                                            @error('updated_court_order_write')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="updated_next_date" class="col-sm-4 col-form-label">
                                            Next Date
                                        </label>
                                        <div class="col-sm-8">
                                            <span class="date_span_status_modal">
                                                <input type="date" class="xDateContainer date_first_input"
                                                       onchange="setCorrect(this,'updated_next_date');"><input type="text"
                                                                                                               id="updated_next_date"
                                                                                                               name="updated_next_date"
                                                                                                               value="dd-mm-yyyy"
                                                                                                               class="date_second_input"
                                                                                                               tabindex="-1"><span
                                                    class="date_second_span" tabindex="-1">&#9660;</span>
                                            </span>
                                            @error('updated_next_date')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="updated_index_fixed_for_id" class="col-md-4 col-form-label"> Next Date
                                            Fixed For
                                        </label>
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <select name="updated_index_fixed_for_id"
                                                            id="updated_index_fixed_for_id" class="form-control select2">
                                                        <option value="">Select</option>
                                                        @foreach ($next_date_reason as $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ old('updated_index_fixed_for_id') == $item->id ? 'selected' : '' }}>
                                                                {{ $item->next_date_reason_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control"
                                                           id="updated_index_fixed_for_write"
                                                           placeholder="Next Date Fixed For"
                                                           name="updated_index_fixed_for_write">

                                                </div>
                                            </div>

                                            @error('updated_index_fixed_for_write')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-6">

                                    <div class="form-group row">
                                        <label for="updated_day_notes_id" class="col-md-4 col-form-label"> Day Notes
                                        </label>
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-6">

                                                    <select name="updated_day_notes_id[]"
                                                            id="updated_index_fixed_for_id" class="form-control select2">
                                                        <option value="">Select</option>
                                                        @foreach ($day_notes as $item)
                                                        <option value="{{ $item->day_notes_name }}"
                                                                {{ old('updated_day_notes_id') == $item->day_notes_name ? 'selected' : '' }}>
                                                                {{ $item->day_notes_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control"
                                                           id="updated_day_notes_write" placeholder="Day Notes"
                                                           name="updated_day_notes_write">
                                                </div>
                                            </div>

                                            @error('updated_day_notes_write')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="updated_engaged_advocate_id" class="col-md-4 col-form-label"> Engaged
                                            Advocate
                                        </label>
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <select name="updated_engaged_advocate_id[]" data-placeholder="Select"
                                                            class="form-control select2" multiple>
                                                        <option value="">Select</option>
                                                        @foreach ($existing_assignend_external_council as $item)
                                                            <option
                                                                value="{{ $item->first_name . ' ' . $item->middle_name . ' ' . $item->last_name }}"
                                                                {{ old('updated_engaged_advocate_id') == $item->id ? 'selected' : '' }}>
                                                                {{ $item->first_name }}
                                                                {{ $item->middle_name }}
                                                                {{ $item->last_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control"
                                                           id="updated_engaged_advocate_write" placeholder="Engaged Advocate"
                                                           name="updated_engaged_advocate_write">
                                                </div>
                                            </div>

                                            @error('updated_engaged_advocate_write')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="updated_next_day_presence_id" class="col-sm-4 col-form-label">
                                            Next Day Presence</label>
                                        <div class="col-sm-8">
                                            <select name="updated_next_day_presence_id" class="form-control select2">
                                                <option value="">Select</option>
                                                @foreach ($next_day_presence as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ old('updated_next_day_presence_id') == $item->id ? 'selected' : '' }}>
                                                        {{ $item->next_day_presence_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('updated_next_day_presence_id')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="updated_remarks" class="col-sm-4 col-form-label"> Steps To be taken
                                            next date </label>
                                        <div class="col-sm-8">
                                            <textarea name="updated_remarks" class="form-control" rows="3" placeholder=""></textarea>
                                            @error('updated_remarks')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                            </div>


                        </div>


                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <div class="float-right">
                            <button type="submit" class="btn btn-primary text-uppercase"><i class="fas fa-save"></i>
                                Update
                            </button>
                        </div>
                    </div>
                </form>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<div class="modal fade" id="modal-lg-send-messages">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="card-title"> Send Messages </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('send-messages-for-criminal-cases', $data->id) }}" method="post">
                @csrf
                <div class="card-body">
                    <input type="hidden" name="case_no"
                           value="{{ $data->case_infos_case_no ? $data->case_infos_case_title_name . ' ' . $value->case_infos_case_no . ' of ' . $value->case_infos_case_year : '' }}@if ($value->sub_seq_case_title_name != null) , @endif
                           {{ $data->sub_seq_case_title_name }}
                           @php
                               $case_infos_sub_seq_case_no = explode(', ',trim($data->case_infos_sub_seq_case_no));
                               $key = array_key_last($case_infos_sub_seq_case_no);
                               echo $case_infos_sub_seq_case_no[$key];

                               $case_infos_sub_seq_case_year = explode(', ',trim($data->case_infos_sub_seq_case_year));
                               $key = array_key_last($case_infos_sub_seq_case_year);
                               $last_case_no = $case_infos_sub_seq_case_year[$key];
                               if ($last_case_no != null) {
                                   echo '/'.$last_case_no;
                               }
                           @endphp">
                    <input type="hidden" name="client_name" value="{{ $data->client_name }}">
                    <div class="form-group row">
                        <div class="form-check ml-2">
                            <input class="form-check-input" type="checkbox" name="send_sms" id="send_sms">
                            <label class="form-check-label mt-1" for="send_sms">
                                Send SMS
                            </label>
                        </div>
                        <div class="form-check ml-2">
                            <input class="form-check-input" type="checkbox" name="send_mail" id="send_mail">
                            <label class="form-check-label mt-1" for="send_mail">
                                Send Mail
                            </label>
                        </div>
                    </div>
                    <div class="form-group row" id="mobile" style="display: none;">
                        <label for="client_mobile" class="col-sm-4 col-form-label">Client Mobile</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="client_mobile"
                                   name="client_mobile" value="{{ $data->client_mobile }}" readonly>
                            @error('client_mobile')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row" id="mail" style="display: none;">
                        <label for="client_email" class="col-sm-4 col-form-label">Client Email</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="client_email"
                                   name="client_email" value="{{ $data->client_email }}" readonly>
                            @error('client_email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="messages" class="col-sm-4 col-form-label"> Messages </label>
                        <div class="col-sm-8">
                            <textarea name="messages" id="messages" class="form-control" rows="5"
                                      placeholder="">{{old('messages')}}</textarea>
                            @error('messages')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>


                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <div class="float-right">
                            <button type="submit" class="btn btn-primary text-uppercase"><i
                                    class="fas fa-save"></i> Send
                            </button>
                        </div>
                    </div>

                </div>
            </form>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>



@section('scripts')
<script>
    $(".sl_no").on('click', function () {
        $(".sl_no_column").toggle();
    });
    $(".court").on('click', function () {
        $(".court_column").toggle();
    });
    $(".case_no").on('click', function () {
        $(".case_no_column").toggle();
    });
    $(".police_station").on('click', function () {
        $(".police_station_column").toggle();
    });
    $(".fixed_for").on('click', function () {
        $(".fixed_for_column").toggle();
    });
    $(".party").on('click', function () {
        $(".party_column").toggle();
    });
    $(".matter").on('click', function () {
        $(".matter_column").toggle();
    });
    $(".steps_notes").on('click', function () {
        $(".steps_notes_column").toggle();
    });

</script>
@endsection






                                    @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    @endif
                @endforeach
                @endif
            </div>
        </section>
    </div>


    
    

@endsection
