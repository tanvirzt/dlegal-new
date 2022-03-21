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
                        <h1 class="m-0 text-dark"> High Court Division </h1>

                    </div><!-- /.col -->



                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">
                                <a class="leading-normal inline-flex items-center font-normal spark-button-focus h-8 text-md px-4 bg-transparent border-0 border-solid text-blue-700 hover:text-blue-800 active:text-blue-700 rounded-md" type="button" href="{{ route('high-court-cases') }}" aria-disabled="false" role="link" tabindex="-1"> Back </a>
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
                                <h3 class="card-title" id="heading">High Court Division Details</h3>
                                <div class="float-right">
                                    <a href="{{ route('edit-high-court-cases', $data->id) }}"><button
                                    class="btn btn-info btn-sm" data-toggle="tooltip"
                                    data-placement="top" title="Edit"><i
                                        class="fas fa-edit"></i></button></a>

                                </div>
                            </div>
                                <div class="card-body">
                                    <table class="table table-responsive table-hover table-bordered">
                                        <tbody>
                                            <tr>
                                                <th>Lower Court </th>
                                                <td>{{ $data->lower_court }}</td>
                                                <th>Case Received (From)</th>
                                                <td>{{ $data->case_received_lawyer_first_name }} {{ $data->case_received_lawyer_middle_name }} {{ $data->case_received_lawyer_last_name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Case No. (Lower Court) </th>
                                                <td>{{ $data->case_no }}</td>
                                                <th>Case Papers Received</th>
                                                <td>{{ $data->case_papers_received }}</td>
                                            </tr>
                                            <tr>
                                                <th>Division </th>
                                                <td>{{ $data->division_name }}</td>
                                                <th>Tadbirkar Details</th>
                                                <td>{{ $data->tadbirkar_details }}</td>
                                            </tr>
                                            <tr>
                                                <th>District </th>
                                                <td>{{ $data->district_name }}</td>
                                                <th>Tender No.</th>
                                                <td>{{ $data->tender_no }}</td>
                                            </tr>
                                            <tr>
                                                <th>Police Station </th>
                                                <td>{{ $data->thana_name }}</td>
                                                <th>Tender No. Date</th>
                                                <td>{{ $data->tender_no_date }}</td>
                                            </tr>
                                            <tr>
                                                <th>Case Category </th>
                                                <td>{{ $data->case_category_name }}</td>
                                                <th>Category of Supreme Court Case</th>
                                                <td>{{ $data->supreme_court_category }}</td>
                                            </tr>
                                            <tr>
                                                <th>Class of Cases </th>
                                                <td>{{ $data->case_class_name }}</td>
                                                <th>Subcategory of Supreme Court Case</th>
                                                <td>{{ $data->supreme_court_subcategory }}</td>
                                            </tr>
                                            <tr>
                                                <th>Type of Cases </th>
                                                <td>{{ $data->case_types_name }}</td>
                                                <th>Case No. (High Court Division)</th>
                                                <td>{{ $data->case_no_hcd }}</td>
                                            </tr>
                                            <tr>
                                                <th>Relevant Laws/Sections</th>
                                                <td>{{ $data->relevant_law_section_name }}</td>
                                                <th>Date of filing(High Court Division)</th>
                                                <td>{{ $data->date_of_filing_hcd }}</td>
                                            </tr>
                                            <tr>
                                                <th>Section</th>
                                                <td>{{ $data->section_name }}</td>
                                                <th>Court (High Court Divisoin)</th>
                                                <td>{{ $data->hcd_court_name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Date of filing </th>
                                                <td>{{ $data->date_of_filing }}</td>
                                                <th>Law & Sections</th>
                                                <td>{{ $data->law_section_name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Plaintiff Name</th>
                                                <td>{{ $data->plaintiff_name }}</td>
                                                <th>Order</th>
                                                <td>{{ $data->order }}</td>
                                            </tr>
                                            <tr>
                                                <th>Plaintiff Designation</th>
                                                <td>{{ $data->designation_name }}</td>
                                                <th>Order Date</th>
                                                <td>{{ $data->order_date }}</td>
                                            </tr>
                                            <tr>
                                                <th>Plaintiff Contact No</th>
                                                <td>{{ $data->plaintiff_contact_number }}</td>
                                                <th>Order No. & Memo</th>
                                                <td>{{ $data->order_no_memo }}</td>
                                            </tr>
                                            <tr>
                                                <th>Name of the Complainant</th>
                                                <td>{{ $data->name_of_the_complainant }}</td>
                                                <th>Name of the Appellant/Petitioner</th>
                                                <td>{{ $data->appellant_petitioner_name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Complainant Contact No. </th>
                                                <td>{{ $data->complainant_contact_no }}</td>
                                                <th>Designation of the Appellant/Petitioner</th>
                                                <td>{{ $data->appellant_designation_name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Designation of the Complainant </th>
                                                <td>{{ $data->complainant_designation_name }}</td>
                                                <th>Address of the Appellant/Petitioner</th>
                                                <td>{{ $data->appellant_address }}</td>
                                            </tr>
                                            <tr>
                                                <th>Name of the Accused</th>
                                                <td>{{ $data->accused_name }}</td>
                                                <th>Name of the Respondent/Opposite Party</th>
                                                <td>{{ $data->opposite_party_name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Name of the Accused Company</th>
                                                <td>{{ $data->company_name }}</td>
                                                <th>Designation of the Respondent/Opposite Party</th>
                                                <td>{{ $data->opposite_designation_name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Address of the Accused</th>
                                                <td>{{ $data->accused_address }}</td>
                                                <th>Address of Respondent/Opposite Party</th>
                                                <td>{{ $data->opposite_party_address }}</td>
                                            </tr>
                                            <tr>
                                                <th>Accused Contact No.</th>
                                                <td>{{ $data->accused_contact_no }}</td>
                                                <th>Step Taken by the Party</th>
                                                <td>{{ $data->party_steps_taken_name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Other Claim(if any)</th>
                                                <td>{{ $data->other_claim }}</td>
                                                <th>Status of the Cases</th>
                                                <td>{{ $data->case_status_name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Summary of Facts & Alligation</th>
                                                <td>{{ $data->summary_facts_alligation }}</td>
                                                <th>Name of Court (Fixed for Hearing)</th>
                                                <td>{{ $data->fixed_hearing_court_name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Name of Trial / Impugned Court</th>
                                                <td>{{ $data->trial_court_name }}</td>
                                                <th>Next Step to be Taken in Court</th>
                                                <td>{{ $data->court_steps_taken_name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Date of Judgement/Order (Trial Court)</th>
                                                <td>{{ $data->trial_court_judgement_date }}</td>
                                                <th>Date for Next Step in Court</th>
                                                <td>{{ $data->court_next_steps_date }}</td>
                                            </tr>
                                            <tr>
                                                <th>Judgment/Order with Grounds (Trial Court)</th>
                                                <td>{{ $data->trial_grounds_judgement }}</td>
                                                <th>Name of Lawyer</th>
                                                <td>{{ $data->assigned_lawyer_first_name }} {{ $data->assigned_lawyer_middle_name }} {{ $data->assigned_lawyer_last_name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Name of Appeal/Revision Court (District)</th>
                                                <td>{{ $data->appeal_court_name }}</td>
                                                <th>Documents(Lawyer's Appointment)</th>
                                                <td>{{ $data->documents_lawyers_appointment }}</td>
                                            </tr>
                                            <tr>
                                                <th>Date of Judgement (Appeal/Revision Court)</th>
                                                <td>{{ $data->appeal_court_judgement_date }}</td>
                                                <th>Documents sent to Lawyer/Law Chamber</th>
                                                <td>{{ $data->documents_sent_to_law_chamber }}</td>
                                            </tr>
                                            <tr>
                                                <th>Judgement of Appeal/Revision with Grounds (District Court)</th>
                                                <td>{{ $data->appeal_grounds_judgement }}</td>
                                                <th>Documents received from field office/programe</th>
                                                <td>{{ $data->documents_received_field_programe }}</td>
                                            </tr>
                                            <tr>
                                                <th>Judgement/Order of Appeal/Revision Court (District)</th>
                                                <td>{{ $data->appeal_court_judgement }}</td>
                                                <th>Missing Documents/Evidence/Information</th>
                                                <td>{{ $data->missing_documents_evidence }}</td>
                                            </tr>
                                            <tr>
                                                <th>Panel Lawyer</th>
                                                <td>{{ $data->panel_lawyer_first_name }} {{ $data->panel_lawyer_middle_name }} {{ $data->panel_lawyer_last_name }}</td>
                                                <th>Ground of Appeal/Revision</th>
                                                <td>{{ $data->ground_appeal_revision }}</td>
                                            </tr>
                                            <tr>
                                                <th>Total Legal Bill Amount and Cost</th>
                                                <td>{{ $data->total_legal_bill_amount }}</td>
                                                <th>Recommendations</th>
                                                <td>{{ $data->recommendations }}</td>
                                            </tr>


                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-header">
                                    <h3 class="card-title" id="heading">Documents Logs</h3>
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
                                        @foreach($high_court_cases_files as $files)
                                            <tr>
                                                <td class="table_text_center">
                                                    {{ $files->uploaded_document }}
                                                </td>
                                                <td class="table_text_center">

                                                        <a href="{{ route('download-high-court-cases-files', $files->id) }}"><button
                                                            class="btn btn-outline-success btn-sm" data-toggle="tooltip"
                                                            data-placement="top" title="Download"><i class="fas fa-download"></i></button></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                            </div>

                            <div class="card-header">
                                <h3 class="card-title custom_h3" id="heading">Proceedings Logs</h3>
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
                                <h3 class="card-title custom_h3" id="heading">Billings Logs</h3>
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




