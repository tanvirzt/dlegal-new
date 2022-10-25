@extends('layouts.admin_layouts.admin_layout')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Litigation Report </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>

                            <li class="breadcrumb-item active"> Litigation Report</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                        {{ Session::get('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div id="accordion">
                                <div class="card-header" id="headingTwo">
                                    <h3 class="card-title"> Litigation :: Report </h3>
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


                                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo"
                                    data-parent="#accordion">
                                    <div class="card-body">


                                        <form method="get" action="{{ route('litigation.report.result') }}">
                                            {{-- @csrf --}}
                                            <div class="form-group row">
                                                <label for="case_type_id" class="col-sm-4 col-form-label">Case Type </label>
                                                <div class="col-sm-8">
                                                    <select name="case_type" class="form-control select2" required>
                                                        <option value="">Select Case Type</option>

                                                        <option value="civil"
                                                            {{ old('case_type') == 'civil' ? 'selected' : '' }}>Civil
                                                        </option>
                                                        <option value="criminal"
                                                            {{ old('case_type') == 'criminal' ? 'selected' : '' }}>Criminal
                                                        </option>
                                                        <option value="service_matter"
                                                            {{ old('case_type') == 'service_matter' ? 'selected' : '' }}>
                                                            Service Matter</option>
                                                        <option value="special"
                                                            {{ old('case_type') == 'special' ? 'selected' : '' }}>
                                                            Special/Quassi-Judicial Cases</option>

                                                        <option value="high_court"
                                                            {{ old('case_type') == 'high_court' ? 'selected' : '' }}>High
                                                            Court Division</option>
                                                        <option value="high_court"
                                                            {{ old('case_type') == 'appellate_court' ? 'selected' : '' }}>
                                                            Appellate Court Division</option>
                                                    </select>
                                                    @error('case_type_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="case_type_id" class="col-sm-4 col-form-label">Report Type
                                                </label>
                                                <div class="col-sm-8">
                                                    <select name="report_type" id="report_type" class="form-control select2"
                                                        required>                       
                                                        <option value="">Select Report Type</option>

                                                        <option value="daily"
                                                            {{ old('report_type') == 'daily' ? 'selected' : '' }}>Today
                                                            Report</option>

                                                            <option value="custom_date"
                                                            {{ old('report_type') == 'custom_date' ? 'selected' : '' }}>
                                                            Custom Date Report</option>

                                                        <option value="next_week"
                                                            {{ old('report_type') == 'next_week' ? 'selected' : '' }}>Next
                                                            Week Report</option>


                                                        <option value="next_month"
                                                            {{ old('report_type') == 'next_month' ? 'selected' : '' }}>Next
                                                            Month Report</option>


                                                        <option value="not_updated"
                                                            {{ old('report_type') == 'not_updated' ? 'selected' : '' }}>
                                                            Next Date Not Updated Report</option>

                                                        <option value="disposed"
                                                            {{ old('report_type') == 'disposed' ? 'selected' : '' }}>
                                                            Disposed of Case Report</option>



                                                    </select>
                                                    @error('report_type')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror

                                                    <div class="report_type_box mt-3"
                                                        @if (old('report_type') == 'from_to' || old('report_type') == 'disposed') style="display:block;" @else style="display:none;" @endif>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="mb-1">
                                                                    <label class="form-label" for="">From
                                                                        Date</label>
                                                                    <input type="date" name="from_next_date"
                                                                        class="form-control @error('from_next_date') is-invalid @enderror"
                                                                        value="{{ old('from_next_date') }}">

                                                                    @error('from_next_date')
                                                                        <div class="invalid-feedback">{{ $message }}
                                                                        </div>
                                                                    @enderror

                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="mb-1">
                                                                    <label class="form-label" for="">To
                                                                        Date</label>
                                                                    <input type="date" name="to_next_date"
                                                                        class="form-control @error('to_next_date') is-invalid @enderror"
                                                                        value="{{ old('to_next_date') }}">

                                                                    @error('to_next_date')
                                                                        <div class="invalid-feedback">{{ $message }}
                                                                        </div>
                                                                    @enderror

                                                                </div>
                                                            </div>
                                                        </div>



                                                    </div>
                                                </div>
                                            </div>

                                            <div class="float-right">
                                                <button type="submit" id="submit"
                                                    class="btn btn-primary text-uppercase"><i class="fas fa-search"></i>
                                                    Get Report
                                                </button>
                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if(!empty($data))
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">

                                    <section class="content">
                                        <div class="container-fluid">
                                            <div id="divToPrint">
                                                <input type="button" class="btn btn-primary print-btn" value="Print"
                                                    onclick="printDiv()">
                                                <style>
                                                    table td,
                                                    th,
                                                    table {
                                                        border-color: #eeeeee;
                                                    }
                                                    #divToPrint{
                                                        font-family: 'Apple', 'Helvetica Neue', Helvetica, Arial, sans-serif;
                                                    }

                                                    @media print {
                                                        .print-btn {
                                                            display: none;
                                                        }
                                                    }
                                                </style>
                                                <table style="width: 100%;z-index:99;" width="100%">

                                                    <tr>
                                                        <td style="text-align: center; width:100%;" valign="top">


                                                            <span id="lblUnitName"
                                                                class="HeaderStyle"><b>dLegal</b></span>
                                                            <br />
                                                            <span id="lblUnitAddress" class="HeaderStyle2">365/B,
                                                                Modhubag, Mogbazar, Hatirjheel, Dhaka - 1217,
                                                                Bangladesh</span>
                                                            <br />
                                                            <span id="lblUnitAddress" class="HeaderStyle2">Cell:
                                                                01717406688</span>
                                                            <br />
                                                            <span id="lblUnitAddress" class="HeaderStyle2">Tel:
                                                                01717406688</span>
                                                            <br />
                                                            <span id="lblUnitAddress" class="HeaderStyle2">Email:
                                                                niamulkabir.adv@gmail.com</span>
                                                            <br />

                                                            <span id="lblVoucherType" class="VoucherStyle">
                                                                <br />

                                                                <span
                                                                    style="border: 1px solid #ddd; padding: 5px;">Litigation
                                                                    Report</span>
                                                                <br />
                                                                <br />

                                                        </td>

                                                    </tr>
                                                </table>


                                                <style type="text/css">
                                                    th,
                                                    td {
                                                        padding: 5px;
                                                        text-align: center;
                                                        width: auto;
                                                        font-size: 11px;
                                                    }
                                                </style>

                                                <div class="table-responsive">
                                                    <table style="width:100%;" id="printTable" cellpadding="0"
                                                        cellspacing="0" border="1">
                                                        <tr>
                                                            <th style="width: 45px;">Sl No.</th>
                                                            <th>ID</th>
                                                            <th>Status</th>
                                                            <th>Next Date</th>
                                                            <th>Fixed For</th>
                                                            <th>Case No</th>
                                                            <th>S.Case No</th>
                                                            <th>Court Name</th>
                                                            <th>Complainant District</th>
                                                            <th>Complainant</th>
                                                            <th>Accused Name</th>
                                                            <th>Accused District</th>
                                                            <th>Case Matter</th>
                                                            <th> Lawyer</th>
                                                        </tr>
                                                        @foreach ($data as $datum)
                                                            <tr>
                                                                <td class="AccStyle" align="left">
                                                                    {{ $loop->iteration }}
                                                                </td>
                                                                <td class="AccStyle" align="left">
                                                                    {{ $datum->created_case_id }}
                                                                </td>
                                                                <td class="AccStyle" align="left">
                                                                    @if (Is_numeric($datum->case_status_id))
                                                                        {{ $datum->case_status_name }}
                                                                    @else
                                                                        {{ $datum->case_status_id }}
                                                                    @endif
                                                                </td>
                                                                <td class="AccStyle" align="left">
                                                                    @if (!empty($datum->next_date) && $datum->next_date < date('Y-m-d'))
                                                                        <span
                                                                            style="color: rgba(255, 0, 0, 1);font-size:11.5px;">{{ date('d-m-Y', strtotime($datum->next_date)) }}</span>
                                                                    @elseif(!empty($datum->next_date))
                                                                        {{ date('d-m-Y', strtotime($datum->next_date)) }}
                                                                    @else
                                                                        <button type='button'
                                                                            class='btn-custom btn-danger-custom-next-date text-uppercase'
                                                                            style="padding:2px;line-height: 10px;">Not Upd
                                                                        </button>
                                                                    @endif
                                                                </td>
                                                                <td class="AccStyle" align="left">
                                                                    {{ $datum->next_date_reason_name }}
                                                                </td>
                                                                <td class="AccStyle" align="left">
                                                                    {{ $datum->case_infos_case_no ? $datum->case_title_name . ' ' . $datum->case_infos_case_no . '/' . $datum->case_infos_case_year : '' }}
                                                                </td>

                                                                <td class="AccStyle" align="left">
                                                                    {{ $datum->sub_seq_case_title_name }}
                                                                    @php
                                                                        $case_infos_sub_seq_case_no = explode(', ', trim($datum->case_infos_sub_seq_case_no));
                                                                        $key = array_key_last($case_infos_sub_seq_case_no);
                                                                        echo $case_infos_sub_seq_case_no[$key];

                                                                        $case_infos_sub_seq_case_year = explode(', ', trim($datum->case_infos_sub_seq_case_year));
                                                                        $key = array_key_last($case_infos_sub_seq_case_year);
                                                                        $last_case_no = $case_infos_sub_seq_case_year[$key];
                                                                        if ($last_case_no != null) {
                                                                            echo '/' . $last_case_no;
                                                                        }
                                                                    @endphp
                                                                </td>
                                                                <td class="AccStyle" align="left">
                                                                    @if (!empty($datum->case_infos_sub_seq_court_short_id) || !empty($datum->sub_seq_court_short_write))
                                                                        @php
                                                                            $notes = explode(', ', $datum->case_infos_sub_seq_court_short_id);
                                                                        @endphp
                                                                        @if ($datum->case_infos_sub_seq_court_short_id)
                                                                            @if (count($notes) > 1)
                                                                                @foreach ($notes as $pro)
                                                                                    <li class="text-left">
                                                                                        {{ $pro }}</li>
                                                                                @endforeach
                                                                            @else
                                                                                @foreach ($notes as $pro)
                                                                                    {{ $pro }}
                                                                                @endforeach
                                                                            @endif
                                                                        @endif
                                                                        @php
                                                                            $notes = explode(', ', $datum->sub_seq_court_short_write);
                                                                        @endphp
                                                                        @if ($datum->sub_seq_court_short_write)
                                                                            @if (count($notes) > 1)
                                                                                @foreach ($notes as $pro)
                                                                                    <li class="text-left">
                                                                                        {{ $pro }}</li>
                                                                                @endforeach
                                                                            @else
                                                                                @foreach ($notes as $pro)
                                                                                    {{ $pro }}
                                                                                @endforeach
                                                                            @endif
                                                                        @endif
                                                                    @else
                                                                        @php
                                                                            $notes = explode(', ', $datum->case_infos_court_short_id);
                                                                        @endphp
                                                                        @if ($datum->case_infos_court_short_id)
                                                                            @if (count($notes) > 1)
                                                                                @foreach ($notes as $pro)
                                                                                    <li class="text-left">
                                                                                        {{ $pro }}</li>
                                                                                @endforeach
                                                                            @else
                                                                                @foreach ($notes as $pro)
                                                                                    {{ $pro }}
                                                                                @endforeach
                                                                            @endif
                                                                        @endif
                                                                        @php
                                                                            $notes = explode(', ', $datum->court_short_write);
                                                                        @endphp
                                                                        @if ($datum->court_short_write)
                                                                            @if (count($notes) > 1)
                                                                                @foreach ($notes as $pro)
                                                                                    <li class="text-left">
                                                                                        {{ $pro }}</li>
                                                                                @endforeach
                                                                            @else
                                                                                @foreach ($notes as $pro)
                                                                                    {{ $pro }}
                                                                                @endforeach
                                                                            @endif
                                                                        @endif
                                                                    @endif
                                                                </td>
                                                                <td class="AccStyle" align="left">
                                                                    {{ $datum->district_name }}
                                                                </td>
                                                                <td class="AccStyle" align="left">
                                                                    @php
                                                                        $notes = explode(', ', $datum->case_infos_complainant_informant_name);
                                                                    @endphp
                                                                    @if ($datum->case_infos_complainant_informant_name)
                                                                        @if (count($notes) > 1)
                                                                            @foreach ($notes as $pro)
                                                                                <li class="text-left">{{ $pro }}
                                                                                </li>
                                                                            @endforeach
                                                                        @else
                                                                            @foreach ($notes as $pro)
                                                                                {{ $pro }}
                                                                            @endforeach
                                                                        @endif
                                                                    @endif
                                                                </td>
                                                                <td class="AccStyle" align="left">
                                                                    @php
                                                                        $accused = explode(', ', $datum->case_infos_accused_name);
                                                                    @endphp
                                                                    @if ($datum->case_infos_accused_name)
                                                                        @if (count($accused) > 1)
                                                                            @foreach ($accused as $item)
                                                                                <li class="text-left">{{ $item }}
                                                                                </li>
                                                                            @endforeach
                                                                        @else
                                                                            @foreach ($accused as $item)
                                                                                {{ $item }}
                                                                            @endforeach
                                                                        @endif
                                                                    @endif
                                                                </td>
                                                                <td class="AccStyle" align="left">
                                                                    {{ $datum->accused_district_name }}
                                                                </td>
                                                                <td class="AccStyle" align="left">
                                                                    {{ $datum->matter_name }} {{ $datum->matter_write }}
                                                                </td>
                                                                <td class="AccStyle" align="left">
                                                                    {{ $datum->first_name }} {{ $datum->last_name }}
                                                                    {{ $datum->lawyer_advocate_write }}
                                                                </td>

                                                            </tr>
                                                        @endforeach
                                                    </table>
                                                </div>

                                                <br />
                                                <br />
                                                <br />
                                                <br />

                                            </div>

                                        </div>
                                        <!--/. container-fluid -->
                                    </section>

                                    <!-- /.content -->

                                </div>
                            </div>
                        </div>
                    @endif
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@section('scripts')
    <script>
        $(function() {
            $('#report_type').change(function() {
                if ($('#report_type').val() == 'custom_date' || $('#report_type').val() == 'disposed') {
                    $('.report_type_box').show();
                } else {
                    $('.report_type_box').hide();
                }
            });
        });
    </script>
    <script>
        function printDiv() {
            var divContents = document.getElementById("divToPrint").innerHTML;
            var a = window.open('Litigation report', 'Litigation report', '');
            a.document.write('<html>');
            a.document.write(divContents);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }
    </script>
@endsection
@endsection
