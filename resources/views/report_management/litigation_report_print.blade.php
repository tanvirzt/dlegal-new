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
                    @if (!empty($data))
                        <div class="card">
                        
                            <div class="card-body" style="padding: 0.52rem;">
                                <table class="table table-bordered table-striped">
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
                                                    {{ $datum->case_infos_case_no ? $datum->case_title_name.' '.$datum->case_infos_case_no.'/'.$datum->case_infos_case_year : '' }}
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
                            </div>

                        </div>
                    @endif










   

                    </div>
                </div>

            </div>
        </div>



    </div>
    <script type="text/javascript"> 
      window.addEventListener("load", window.print());
    </script>

@endsection




