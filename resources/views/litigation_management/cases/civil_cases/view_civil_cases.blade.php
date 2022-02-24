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
                        <h1 class="m-0 text-dark"> Civil Cases </h1>

                    </div><!-- /.col -->



                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">
                                <a class="leading-normal inline-flex items-center font-normal spark-button-focus h-8 text-md px-4 bg-transparent border-0 border-solid text-blue-700 hover:text-blue-800 active:text-blue-700 rounded-md" type="button" href="{{ route('civil-cases') }}" aria-disabled="false" role="link" tabindex="-1">Back</a>
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
                                <h3 class="card-title custom_h3" id="heading">Civil Cases Details</h3>
                                <div class="float-right">
                                    <a class="btn btn-info"
                                        href="{{ route('edit-civil-cases', $data->id) }}"> Edit </a>
                                </div>
                            </div>
                                <div class="card-body">
                                    <table class="table table-responsive table-hover table-bordered">
                                        <tbody>
                                            <tr>
                                                <th>Case No.</th>
                                                <td>{{ $data->case_no }}</td>
                                                <th>Subsequent Plaintiff Name</th>
                                                <td>{{ $data->subsequent_plaintiff_name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Date of Filing</th>
                                                <td>{{ $data->date_of_filing }}</td>
                                                <th>Name of the Suit</th>
                                                <td>{{ $data->name_of_suit }}</td>
                                            </tr>
                                            <tr>
                                                <th>Division</th>
                                                <td>{{ $data->division_name }}</td>
                                                <th>Defendent Name</th>
                                                <td>{{ $data->defendent_name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Case Year</th>
                                                <td>{{ $data->case_year }}</td>
                                                <th>Defendent Address</th>
                                                <td>{{ $data->defendent_address }}</td>
                                            </tr>
                                            <tr>
                                                <th>District</th>
                                                <td>{{ $data->district_name }}</td>
                                                <th>Name of Defendent Company</th>
                                                <td>{{ $data->def_company_name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Ref No.</th>
                                                <td>{{ $data->ref_no }}</td>
                                                <th>Date of incident</th>
                                                <td>{{ $data->date_of_incident }}</td>
                                            </tr>
                                            <tr>
                                                <th>Amount</th>
                                                <td>{{ $data->amount }}</td>
                                                <th>Last Order of the Court</th>
                                                <td>{{ $data->court_last_order_name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Location</th>
                                                <td>{{ $data->location }}</td>
                                                <th>Date of Incident To </th>
                                                <td>{{ $data->date_of_incident_to }}</td>
                                            </tr>
                                            <tr>
                                                <th>Case Status</th>
                                                <td>{{ $data->case_status_name }}</td>
                                                <th>Additional Order</th>
                                                <td>{{ $data->additional_order }}</td>
                                            </tr>
                                            <tr>
                                                <th>Property Type</th>
                                                <td>{{ $data->property_type_name }}</td>
                                                <th>Who identified the Incident First ?</th>
                                                <td>{{ $data->first_identification_person }}</td>
                                            </tr>
                                            <tr>
                                                <th>Case Category Nature</th>
                                                <td>{{ $data->case_category_name }}</td>
                                                <th>Disbursement Date</th>
                                                <td>{{ $data->disbursement_date }}</td>
                                            </tr>
                                            <tr>
                                                <th>Type of Cases</th>
                                                <td>{{ $data->case_types_name }}</td>
                                                <th>Date of Identification</th>
                                                <td>{{ $data->date_of_identification }}</td>
                                            </tr>
                                            <tr>
                                                <th>Name of the Court</th>
                                                <td>{{ $data->court_name }}</td>
                                                <th>Last date of Cash Receipt</th>
                                                <td>{{ $data->date_of_cash_receipt }}</td>
                                            </tr>
                                            <tr>
                                                <th>External Council</th>
                                                <td>{{ $data->first_name }} {{ $data->middle_name }} {{ $data->last_name }}</td>
                                                <th>Case Notes</th>
                                                <td>{{ $data->case_notes }}</td>
                                            </tr>
                                            <tr>
                                                <th>External Council Associates</th>
                                                <td>{{ $data->as_first_name }} {{ $data->as_middle_name }} {{ $data->as_last_name }}</td>
                                                <th>Date of Disposed</th>
                                                <td>{{ $data->date_of_disposed }}</td>
                                            </tr>
                                            <tr>
                                                <th>Relevant Laws/Sections </th>
                                                <td>{{ $data->law_section_name }}</td>
                                                <th>Power of Attorny</th>
                                                <td>{{ $data->power_of_attorny }}</td>
                                            </tr>
                                            <tr>
                                                <th>Plaintiff Name</th>
                                                <td>{{ $data->plaintiff_name }}</td>
                                                <th>Total Legal Bill Amount & Cost</th>
                                                <td>{{ $data->total_legal_bill_amount_cost }}</td>
                                            </tr>
                                            <tr>
                                                <th>Contact No.</th>
                                                <td>{{ $data->contact_number }}</td>
                                                <th>Panel Lawyer</th>
                                                <td>{{ $data->pl_first_name }} {{ $data->pl_middle_name }} {{ $data->pl_last_name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Plaintiff Designation</th>
                                                <td>{{ $data->designation_name }}</td>
                                                <th>Assigned Lawyer</th>
                                                <td>{{ $data->ic_first_name }} {{ $data->ic_middle_name }} {{ $data->ic_last_name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Next Date </th>
                                                <td>{{ $data->next_date }}</td>
                                                <th>Notes</th>
                                                <td>{{ $data->notes }}</td>
                                            </tr>
                                            <tr>
                                                <th>Plaintiff Contact No</th>
                                                <td>{{ $data->plaintiff_contact_number }}</td>
                                                <th>Other Claim(if any)</th>
                                                <td>{{ $data->other_claim }}</td>
                                            </tr>
                                            <tr>
                                                <th>Next date fixed for </th>
                                                <td>{{ $data->next_date_reason_name }}</td>
                                                <th>Summary of Facts & Alligation</th>
                                                <td>{{ $data->summary_facts_alligation }}</td>
                                            </tr>
                                            <tr>
                                                <th>Company</th>
                                                <td>{{ $data->company_name }}</td>
                                                <th>Missing Documents/Evidence/Information</th>
                                                <td>{{ $data->missing_documents_evidence_information }}</td>
                                            </tr>
                                            <tr>
                                                <th>Zone</th>
                                                <td>{{ $data->region_name }}</td>
                                                <th>Comments</th>
                                                <td>{{ $data->comments }}</td>
                                            </tr>
                                            <tr>
                                                <th>Area</th>
                                                <td>{{ $data->area_name }}</td>
                                            </tr>
                                        </tbody>
                                    </table>               
                                </div>
                                <div class="card-header">
                                    <h3 class="card-title custom_h3" id="heading">Civil Cases Files</h3>
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
                                        @foreach($civil_cases_files as $files)
                                            <tr>
                                                <td class="table_text_center">
                                                    {{ $files->uploaded_document }}
                                                </td>
                                                <td class="table_text_center">
                                                        <a href="{{ route('download-civil-cases-files', $files->id) }}"><button class="badge badge-info btn-sm"
                                                        > Download </button></a>
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
                        </div>
                    </div>

                </div>
        </section>
    </div>
    <!-- /.content-wrapper -->

@endsection




