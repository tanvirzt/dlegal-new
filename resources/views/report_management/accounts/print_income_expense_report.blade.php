@extends('layouts.admin_layouts.admin_layout')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Ledger Report</h1>

                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>

                            <li class="breadcrumb-item active">Ledger Report</li>
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
                                        .data td,
                                        th,
                                        .data {
                                            border: 1px solid #eeeeee;
                                        }

                                        .data th {
                                            font-weight: 600;
                                            background: #d3d3d3;
                                        }
                                    </style>
                                    <table style="width: 100%;z-index:99;" width="100%">

                                        <tr>


                                            <td style="text-align: center; width:100%;" valign="top">


                                                <span id="lblUnitName" class="HeaderStyle"><b>dLegal</b></span>
                                                <br />
                                                <span id="lblUnitAddress" class="HeaderStyle2">365/B, Modhubag, Mogbazar,
                                                    Hatirjheel, Dhaka - 1217, Bangladesh</span>
                                                <br />
                                                <span id="lblUnitAddress" class="HeaderStyle2"> Cell:01717406688 </span>
                                                <br />
                                                <span id="lblUnitAddress" class="HeaderStyle2"> Tel:01717406688 </span>
                                                <br />
                                                <span id="lblUnitAddress"
                                                    class="HeaderStyle2">Email:niamulkabir.adv@gmail.com</span>
                                            </td>
                                        </tr>
                                    </table>
                                    <style type="text/css">
                                        th,
                                        td {
                                            padding: 5px;
                                            text-align: center;
                                            width: auto;
                                        }
                                    </style>
                                    <table class="data" style="width:100%;" id="printTable" cellpadding="0"
                                        cellspacing="0" border="1">
                                        <tr>
                                            <th>SL</th>
                                            <th style="width: 75px;">Transaction No.</th>
                                            <th>Job No.</th>
                                            <th>Payment Against Bill</th>
                                            <th style="width: 100px;">Ledger Date</th>
                                            <th style="width: 75px;">Payment Type</th>
                                            <th>Bill Name</th>
                                            <th style="width: 75px;">Bill Amount</th>
                                            <th>Remarks</th>
                                        </tr>
                                        @foreach($data as $key=>$datum)
    
                                            <tr>
                                                <td>
                                                    {{ $key+1 }}
                                                </td>
                                                <td>
                                                    {{ $datum->transaction_no }}
                                                </td>
                                                <td>
                                                    {{ $datum->job_no }}
                                                </td>
                                                <td width="8%">
                                                    {{ $datum->payment_against_bill == 'on' ? 'Yes': 'No' }}
                                                </td>
                                                <td>
                                                    {{ $datum->ledger_date != null ? date('d-m-Y', strtotime($datum->ledger_date)) : '' }}                                                    
                                                </td>
                                                <td>
                                                    {{ $datum->payment_type }}
                                                   
                                                </td>
                                                <td>
                                                    {{ $datum->ledger_head_bill != null ? $datum->ledger_head_bill->ledger_head_name : '' }}
                                                </td>
                                                <td>
                                                    {{ $datum->bill_amount }}
                                                </td>
                                                
                                                <td>
                                                    {{ $datum->remarks }}
                                                </td>
                                                
                                                
                                            </tr>
                                        @endforeach

                                    </table>
                                    <br />
                                    <br />
                                    <br />

                                    <br />

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
