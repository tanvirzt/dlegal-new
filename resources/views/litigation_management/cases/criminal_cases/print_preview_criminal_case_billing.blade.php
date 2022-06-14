@extends('layouts.admin_layouts.admin_layout')
@section('content')



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Criminal Cases</h1>

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
                                        }
                                    </style>
                                    <table style="width: 100%;z-index:99;" width="100%">

                                        <tr>


                                            <td style="text-align: center; width:100%;" valign="top">


                                                <span id="lblUnitName" class="HeaderStyle"><b>BCLC</b></span>
                                                <br/>
                                                <span id="lblUnitAddress" class="HeaderStyle2">365/B, Modhubag, Mogbazar, Hatirjheel, Dhaka - 1217, Bangladesh</span>
                                                <br/>
                                                <span id="lblUnitAddress" class="HeaderStyle2"> Cell:01717406688 </span>
                                                <br/>
                                                <span id="lblUnitAddress" class="HeaderStyle2"> Tel:01717406688 </span>
                                                <br/>
                                                <span id="lblUnitAddress" class="HeaderStyle2">Email:niamulkabir.adv@gmail.com</span>
                                                <br/>


                                                <br/>
                                                    <span id="lblVoucherType" class="VoucherStyle">
                                                <br/>
                                                    <u><span style="padding: 5px;">Billings Log(Total: {{ $bill_amount }} ৳, Paid: {{ $payment_amount }} ৳, Due: {{ $due_amount }} ৳)</span></u>
                                                <br/>
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
                                            <th style="width: 75px;">Bill for the Date</th>
                                            <th>Bill Particulars</th>
                                            <th>Bill Type</th>
                                            <th style="width: 100px;">Bill Schedule</th>
                                            <th style="width: 75px;">Bill Amount</th>
                                            <th>Bill Submitted</th>
                                            <th style="width: 75px;">Payment Amount</th>
                                            <th>Payment Received</th>
                                            <th>Payment Mode</th>
                                            <th>Paid/Due</th>
                                        </tr>
                                        @foreach($bill_history as $key=>$bill_logs)
                                            <tr>
                                                <td class="AccStyle" align="left">
                                                    {{ $key+1 }}
                                                </td>
                                                <td class="AccStyle" align="left">
                                                    {{ $bill_logs->bill_for_the_date }}
                                                </td>
                                                <td class="AccStyle" align="left">
                                                    {{ $bill_logs->bill_particulars_id }} {{ $bill_logs->bill_particulars }}
                                                </td>
                                                <td class="AccStyle" align="left">
                                                    {{ $bill_logs->bill_type_name }}
                                                </td>
                                                <td class="AccStyle" align="left">
                                                    {{ $bill_logs->bill_schedule_name }}
                                                </td>
                                                <td class="AccStyle" align="left">
                                                    {{ $bill_logs->bill_amount }}
                                                </td>

                                                <td class="AccStyle" align="left">
                                                    {{ $bill_logs->bill_submitted }}
                                                </td>
                                                <td class="AccStyle" align="left">
                                                    {{ $bill_logs->payment_amount }}
                                                </td>
                                                <td class="AccStyle" align="left">
                                                    {{ $bill_logs->payment_received }} 
                                                </td>
                                                <td class="AccStyle" align="left"> 
                                                    {{ $bill_logs->payment_mode_name }}
                                                </td>
                                                <td class="AccStyle" align="left"> 
                                                    {{ $bill_logs->paid_due }}
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




