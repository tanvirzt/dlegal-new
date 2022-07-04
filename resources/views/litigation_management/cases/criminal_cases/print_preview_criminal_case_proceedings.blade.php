@extends('layouts.admin_layouts.admin_layout')
@section('content')



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Case Proceedings Log</h1>

                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>

                            <li class="breadcrumb-item active">Case Proceeding Log</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-11 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <!-- Main content -->
                        <section class="content">
                            <div class="">
                                <div id="divToPrint">
                                    

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


                                                <span id="lblUnitName" class="HeaderStyle"><b>DLegal</b></span>
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
                                                    <u><span style="padding: 5px;"> Criminal Case No. 
                                                        {{ $data->case_infos_case_no ? $data->case_infos_case_title_name.' '.$data->case_infos_case_no.' of '.$data->case_infos_case_year : '' }}@if ($data->sub_seq_case_title_name != null),
                                                        @endif
                                                        {{ $data->sub_seq_case_title_name }}
                                                        @php
                                                            $case_infos_sub_seq_case_no = explode(', ',trim($data->case_infos_sub_seq_case_no));
                                                            $key = array_key_last($case_infos_sub_seq_case_no);
                                                            echo $case_infos_sub_seq_case_no[$key];
                        
                                                            $case_infos_sub_seq_case_year = explode(', ',trim($data->case_infos_sub_seq_case_year));
                                                            $key = array_key_last($case_infos_sub_seq_case_year);
                                                            $last_case_no = $case_infos_sub_seq_case_year[$key];
                                                            if ($last_case_no != null) {
                                                                echo ' of '.$last_case_no;
                                                            }
                                                        @endphp
                                                    </span></u>
                                                <br/>

                                            </td>

                                        </tr>
                                    </table>
                                    <style type="text/css">
                                        th, td {
                                            padding: 5px;
                                            text-align: center;
                                            width: auto;
                                        }
                                    </style>
                                    <table class="data" style="width:100%;" id="printTable" cellpadding="0" cellspacing="0" border="1">
                                        <tr>
                                            <th>SL</th>
                                            <th style="width: 75px;">Date</th>
                                            <th>Fixed For</th>
                                            <th>Court Proceeding</th>
                                            <th style="width: 100px;">Court Order</th>
                                            <th style="width: 75px;">Next Date</th>
                                            <th>Fixed For</th>
                                            <th style="width: 75px;">Day Note</th>
                                            <th>Engaged Advocate</th>
                                        </tr>
                                        @foreach($case_logs as $key=>$logs)
                                            <tr>

                                                <td class="AccStyle" align="left">
                                                    {{ $key+1 }}
                                                </td>
                                                <td class="AccStyle" align="left">
                                                    {{ date('d-m-Y', strtotime($logs->updated_order_date)) }}
                                                </td>
                                                <td class="AccStyle" align="left">
                                                    {{ $logs->next_date_reason_name }} {{ $logs->updated_fixed_for_write }}
                                                </td>
                                                <td class="AccStyle" align="left">
                                                    @php
                                                        $proceedings = explode(', ',$logs->court_proceedings_id);
                                                    @endphp
                                                
                                                    @if($logs->court_proceedings_id)
                                                        @if (count($proceedings)> 1)
                                                            @foreach ($proceedings as $pro)
                                                                <li class="text-left">{{ $pro }}</li>
                                                            @endforeach
                                                        @else
                                                            @foreach ($proceedings as $pro)
                                                                {{ $pro }}
                                                            @endforeach
                                                        @endif
                                                    @endif
                                                    {{ $logs->court_proceedings_write }}
                                                </td>
                                                <td class="AccStyle" align="left">
                                                    @php
                                                        $order = explode(', ',$logs->updated_court_order_id);
                                                    @endphp
                                                    @if($logs->updated_court_order_id)
                                                        @foreach ($order as $pro)
                                                            <li class="text-left">{{ $pro }}</li>
                                                        @endforeach
                                                    @endif
                                                    {{ $logs->updated_court_order_write }}
                                                </td>
                                                <td class="AccStyle" align="left">
                                                    {{ date('d-m-Y', strtotime($logs->updated_next_date)) }}
                                                </td>

                                                <td class="AccStyle" align="left">
                                                    {{ $logs->index_next_date_reason_name }}  {{ $logs->updated_index_fixed_for_write }}
                                                </td>
                                                <td class="AccStyle" align="left">
                                                    @php
                                                        $notes = explode(', ',$logs->updated_day_notes_id);
                                                    @endphp
                                                    @if($logs->updated_day_notes_id)
                                                        @foreach ($notes as $pro)
                                                            <li class="text-left">{{ $pro }}</li>
                                                        @endforeach
                                                    @endif
                                                    {{ $logs->updated_day_notes_write }}
                                                </td>
                                                <td class="AccStyle" align="left"> 
                                                    {{ $logs->updated_engaged_advocate_id }} {{ $logs->updated_engaged_advocate_write }}
                                                </td>
                                                
                                            </tr>
                                        
                                    @endforeach

                                    </table>
                                    <br/>
                                    <br/>
                                    <br/>
                                    
                                    <br/>

                                </div>

                            </div>
                        </section>

                    </div>
                </div>
            </div>
        </div>



    </div>
    <script type="text/javascript"> 
      window.addEventListener("load", window.print());
    </script>

@endsection




