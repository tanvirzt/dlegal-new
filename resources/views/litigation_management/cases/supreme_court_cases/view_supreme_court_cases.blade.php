@extends('layouts.admin_layouts.admin_layout')
@section('content')

<style>
    th {
        text-align: right;
        width:25%;
    }
    td{
        width:25%;
    }
</style>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark"> Supreme Court of Bangladesh </h1>

                    </div><!-- /.col -->



                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">
                                <a class="leading-normal inline-flex items-center font-normal spark-button-focus h-8 text-md px-4 bg-transparent border-0 border-solid text-blue-700 hover:text-blue-800 active:text-blue-700 rounded-md" type="button" href="{{ route('supreme-court-cases') }}" aria-disabled="false" role="link" tabindex="-1"> Back </a>
                            </li>
                        </ol>
                    </div>


                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        


        <section class="content">
            <div class="container-fluid py-2">
                <div class="col-md-12">
                    @if(Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                            {{Session::get('success')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="card">
                        <div class="">
                            <div class="card-header">
                                <h3 class="card-title" id="heading">Supreme Court of Bangladesh Details</h3>
                                <div class="float-right">
                                    <a class="btn btn-info"
                                        href="{{ route('edit-supreme-court-cases', $data->id) }}"> Edit </a>
                                </div>
                            </div>
                                <div class="card-body">
                                    <table class="table table-responsive table-hover table-bordered">
                                        <tbody>
                                            <tr>
                                                <th>Case No.</th>
                                                <td>{{ $data->case_no }}</td>
                                                <th>Name of the Opposite Party</th>
                                                <td>{{ $data->opposite_party_name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Date of Case Received</th>
                                                <td>{{ $data->date_of_case_received }}</td>
                                                <th>Address of Opposite Party</th>
                                                <td>{{ $data->opposite_party_address }}</td>
                                            </tr>
                                            <tr>
                                                <th>Case Category</th>
                                                <td>{{ $data->case_category_name }}</td>
                                                <th>Status of the Cases</th>
                                                <td>{{ $data->case_status_name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Type of Cases</th>
                                                <td>{{ $data->case_types_name }}</td>
                                                <th>Last Order of the Court</th>
                                                <td>{{ $data->court_last_order_name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Subsequent Case No.</th>
                                                <td>{{ $data->subsequent_case_no }}</td>
                                                <th>Name of the Accused</th>
                                                <td>{{ $data->accused_name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Zone</th>
                                                <td>{{ $data->region_name }}</td>
                                                <th>Name of the Accused Company</th>
                                                <td>{{ $data->accused_company_name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Area</th>
                                                <td>{{ $data->area_name }}</td>
                                                <th>Next Date</th>
                                                <td>{{ $data->next_date }}</td>
                                            </tr>
                                            <tr>
                                                <th>Branch</th>
                                                <td>{{ $data->branch_name }}</td>
                                                <th>Address of the Accused</th>
                                                <td> {{ $data->accused_address }} </td>
                                            </tr>
                                            <tr>
                                                <th>Member No.</th>
                                                <td>{{ $data->member_no }}</td>
                                                <th>Accused Contact No.</th>
                                                <td> {{ $data->accused_contact_no }} </td>
                                            </tr>
                                            <tr>
                                                <th>Program</th>
                                                <td> {{ $data->program_name }} </td>
                                                <th>Next date fixed for</th>
                                                <td> {{ $data->next_date_reason_name }} </td>
                                            </tr>
                                            <tr>
                                                <th>Police Station</th>
                                                <td>{{ $data->police_station }}</td>
                                                <th>Plaintiff Name</th>
                                                <td>{{ $data->plaintiff_name }} </td>
                                            </tr>
                                            <tr>
                                                <th>Name of the Court</th>
                                                <td>{{ $data->court_name }}</td>
                                                <th>Plaintiff Designation</th>
                                                <td>{{ $data->plaintiff_designation_name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Date of filing</th>
                                                <td>{{ $data->date_of_filing }}</td>
                                                <th>Plaintiff Contact No</th>
                                                <td> {{ $data->plaintiff_contact_number }} </td>
                                            </tr>
                                            <tr>
                                                <th>Division</th>
                                                <td>{{ $data->division_name }}</td>
                                                <th>Company</th>
                                                <td>{{ $data->company_name }}</td>
                                            </tr>
                                            <tr>
                                                <th>District</th>
                                                <td>{{ $data->district_name }}</td>
                                                <th>Case Notes</th>
                                                <td> {{ $data->case_notes }} </td>
                                            </tr>
                                            <tr>
                                                <th>Relevant Laws/Sections</th>
                                                <td>{{ $data->law_section_name }}</td>
                                                <th>Panel Lawyer</th>
                                                <td> {{ $data->pl_first_name }} {{ $data->pl_middle_name }} {{ $data->pl_last_name }} </td>
                                            </tr>
                                            <tr>
                                                <th>Alligation</th>
                                                <td>{{ $data->alligation_name }}</td>
                                                <th>Assigned Lawyer</th>
                                                <td>{{ $data->assigned_first_name }} {{ $data->assigned_middle_name }} {{ $data->assigned_last_name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Amount of Money</th>
                                                <td> {{ $data->amount }} </td>
                                                <th>Total Legal Bill Amount and Cost</th>
                                                <td>{{ $data->total_legal_bill_amount }}</td>
                                            </tr>
                                            <tr>
                                                <th>Name of the Complainant</th>
                                                <td>{{ $data->name_of_the_complainant }}</td>
                                                <th>Other Claim(if any)</th>
                                                <td>{{ $data->other_claim }}</td>
                                            </tr>
                                            <tr>
                                                <th>Complainant Contact No.</th>
                                                <td>{{ $data->complainant_contact_no }}</td>
                                                <th>Summary of Facts & Alligation</th>
                                                <td> {{ $data->summary_facts_alligation }} </td>
                                            </tr>
                                            <tr>
                                                <th>Designation of the Complainant</th>
                                                <td>{{ $data->designation_name }}</td>
                                                <th>Prayer/Claims by PSG</th>
                                                <td>{{ $data->prayer_claims_by_psg }}</td>
                                            </tr>
                                            <tr>
                                                <th>External Council </th>
                                                <td>{{ $data->first_name }} {{ $data->middle_name }} {{ $data->last_name }}</td>
                                                <th>Missing Documents/Evidence/Information</th>
                                                <td>{{ $data->missing_documents_evidence }}</td>
                                            </tr>
                                            <tr>
                                                <th>External Council Associates</th>
                                                <td>{{ $data->as_first_name }} {{ $data->as_middle_name }} {{ $data->as_last_name }}</td>
                                                <th>Comments</th>
                                                <td>{{ $data->comments }}</td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>               
                                </div>
                                <div class="card-header">
                                    <h3 class="card-title" id="heading"> View Documents of this Case </h3>
                                </div>
                                <div class="card-body">
                                    <table id="data_table" class="table dataTable no-footer dtr-inline">
                                        <thead>
                                            <tr>
                                                <th class="table_text_center">Uploaded Document</th>
                                                <th class="table_text_center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($supreme_court_cases_files as $files)
                                            <tr>
                                                <td class="table_text_center">
                                                    {{ $files->uploaded_document }}
                                                </td>
                                                <td class="table_text_center">
                                                        
                                                        <a href="{{ route('download-supreme-court-cases-files', $files->id) }}"><button
                                                            class="btn btn-outline-success btn-sm" data-toggle="tooltip"
                                                            data-placement="top" title="Download"><i class="fas fa-download"></i></button></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                            </div>
                            <div class="card-header">
                                <h3 class="card-title custom_h3" id="heading">View Log of this Case</h3>
                            </div>
                            <div class="card-body">
                                <table id="table_logs_text_center" class="table table-responsive no-footer dtr-inline">
                                    <thead>
                                        <tr>
                                            <th class="table_logs_text_center">Case No</th>
                                            <th class="table_logs_text_center">Accused Name</th>
                                            <th class="table_logs_text_center">Case Status</th>
                                            <th class="table_logs_text_center">Court Name</th>
                                            <th class="table_logs_text_center">Next Date</th>
                                            <th class="table_logs_text_center">Date Reason</th>
                                            <th class="table_logs_text_center">Update Description</th>
                                            <th class="table_logs_text_center">Case Proceedings</th>
                                            <th class="table_logs_text_center">Case Notes</th>
                                            <th class="table_logs_text_center">Panel Lawyer</th>
                                            <th class="table_logs_text_center">Order Date</th>
                                            <th class="table_logs_text_center">Final Status</th>
                                            <th class="table_logs_text_center">Update Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($case_logs as $logs)
                                        <tr>
                                            <td class="table_logs_text_center"> {{ $logs->case_no }} </td>
                                            <td class="table_logs_text_center"> {{ $logs->updated_accused_name }} </td>
                                            <td class="table_logs_text_center"> {{ $logs->case_status_name }} </td>
                                            <td class="table_logs_text_center"> {{ $logs->court_name }} </td>
                                            <td class="table_logs_text_center"> {{ $logs->updated_next_date }} </td>
                                            <td class="table_logs_text_center"> {{ $logs->next_date_reason_name }} </td>
                                            <td class="table_logs_text_center"> {{ $logs->update_description }} </td>
                                            <td class="table_logs_text_center"> {{ $logs->case_proceedings }} </td>
                                            <td class="table_logs_text_center"> {{ $logs->case_notes }} </td>
                                            <td class="table_logs_text_center"> {{ $logs->first_name }} {{ $logs->middle_name }} {{ $logs->last_name }} </td> 
                                            <td class="table_logs_text_center"> {{ $logs->order_date }} </td>
                                            <td class="table_logs_text_center"> {{ $logs->next_date_fixed_reason }} </td>
                                            <td class="table_logs_text_center"> {{ $logs->created_at }} </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-header">
                                <h3 class="card-title custom_h3" id="heading">View Billings of this Case</h3>
                            </div>
                            <div class="card-body">
                                <table id="table_bill_logs_text_center" class="table table-responsive no-footer dtr-inline">
                                    <thead>
                                        <tr>
                                            <th class="table_logs_text_center">Bill Type</th>
                                            <th class="table_logs_text_center">Payment Type</th>
                                            <th class="table_logs_text_center">District Name</th>
                                            <th class="table_logs_text_center">Panel Lawyer</th>
                                            <th class="table_logs_text_center">Bill Amount</th>
                                            <th class="table_logs_text_center">Billing Date</th>
                                            <th class="table_logs_text_center">Bank Name</th>
                                            <th class="table_logs_text_center">Bank Branch</th>
                                            <th class="table_logs_text_center">Cheque No.</th>
                                            <th class="table_logs_text_center">Payment Amount</th>
                                            <th class="table_logs_text_center">Digital Payment</th>
                                            <th class="table_logs_text_center">Approval</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($bill_history as $bill_logs)
                                        <tr>
                                            <td class="table_logs_text_center"> {{ $bill_logs->bill_type_name }} </td>
                                            <td class="table_logs_text_center"> {{ $bill_logs->payment_type }} </td>
                                            <td class="table_logs_text_center"> {{ $bill_logs->district_name }} </td>
                                            <td class="table_logs_text_center"> {{ $bill_logs->first_name }} </td>
                                            <td class="table_logs_text_center"> {{ $bill_logs->bill_amount }} </td>
                                            <td class="table_logs_text_center"> {{ $bill_logs->date_of_billing }} </td>
                                            <td class="table_logs_text_center"> {{ $bill_logs->bank_name }} </td> 
                                            <td class="table_logs_text_center"> {{ $bill_logs->bank_branch_name }} </td>
                                            <td class="table_logs_text_center"> {{ $bill_logs->cheque_no }} </td>
                                            <td class="table_logs_text_center"> {{ $bill_logs->payment_amount }} </td>
                                            <td class="table_logs_text_center"> {{ $bill_logs->digital_payment_type_name }} </td>
                                            <td class="table_logs_text_center"> {{ $bill_logs->is_approved }} </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
        </section>
    </div>
    <!-- /.content-wrapper -->

@endsection




