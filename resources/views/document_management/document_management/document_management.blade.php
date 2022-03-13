@extends('layouts.admin_layouts.admin_layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> Document Management </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>

                            <li class="breadcrumb-item active"> Document Management </li>
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



                    <div class="col-12">

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> List </h3>
                                <div class="float-right">
                                    <a href="{{ route('add-documents') }}"><button
                                            class="btn btn-sm btn-success add_btn"><i class="fas fa-plus"></i> Add
                                            Document Management </button></a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">



                                <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                                <script src="{{ asset('treetable/dist/jquery-simple-tree-table.js') }}"></script>


                                <table id="opened"
                                    class="table table-responsive table-hover table-stripped no-footer dtr-inline">

                                    {{-- litigation Management --}}

                                    <tr data-node-id="81.2" data-node-pid="1">
                                        <td> Admin </td>
                                        <td></td>
                                    </tr>
                                    <tr data-node-id="81.2.1" data-node-pid="81.2">
                                        <td> Setup </td>
                                        <td></td>
                                    </tr>
                                    <tr data-node-id="81.2.1.1" data-node-pid="81.2.1">
                                        <td> External Council </td>
                                        <td></td>
                                    </tr>

                                    @foreach ($external_council as $council)
                                        <tr data-node-id="22.{{ $council->id }}" data-node-pid="81.2.1.1">
                                            <td> Name :{{ $council->first_name }} {{ $council->middle_name }} {{ $council->last_name }}</td>
                                            <td></td>
                                        </tr>
                                        @foreach ($council->external_council_files as $files)
                                            <tr data-node-id="22.2.1.3" data-node-pid="22.{{ $files->external_council_id }}">
                                                <td> File :{{ $files->uploaded_document }} </td>
                                                <td>
                                                    <a href="{{ route('download-external-council-files', $files->id) }}"><button
                                                            class="btn btn-outline-success btn-sm" data-toggle="tooltip"
                                                            data-placement="top" title="Download"><i
                                                                class="fas fa-download"></i></button></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach

                                    <tr data-node-id="802.2.1.1" data-node-pid="81.2.1">
                                        <td> External Council Associates </td>
                                        <td></td>
                                    </tr>

                                    @foreach ($external_council_associates as $council)
                                        <tr data-node-id="302.{{ $council->id }}" data-node-pid="802.2.1.1">
                                            <td> Name :{{ $council->first_name }} {{ $council->middle_name }} {{ $council->last_name }}</td>
                                            <td></td>
                                        </tr>
                                        @foreach ($council->external_council_associates_files as $files)
                                            <tr data-node-id="302.2.1.3" data-node-pid="302.{{ $files->external_council_associates_id }}">
                                                <td> File :{{ $files->uploaded_document }} </td>
                                                <td>
                                                    <a href="{{ route('download-external-council-associates-files', $files->id) }}"><button
                                                            class="btn btn-outline-success btn-sm" data-toggle="tooltip"
                                                            data-placement="top" title="Download"><i
                                                                class="fas fa-download"></i></button></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach


                                    <tr data-node-id="82.2.1.1" data-node-pid="81.2.1">
                                        <td> Internal Council </td>
                                        <td></td>
                                    </tr>

                                    @foreach ($internal_council as $council)
                                        <tr data-node-id="32.{{ $council->id }}" data-node-pid="82.2.1.1">
                                            <td> Name :{{ $council->first_name }} {{ $council->middle_name }} {{ $council->last_name }}</td>
                                            <td></td>
                                        </tr>
                                        @foreach ($council->internal_council_files as $files)
                                            <tr data-node-id="32.2.1.3" data-node-pid="32.{{ $files->internal_council_id }}">
                                                <td> File :{{ $files->uploaded_document }} </td>
                                                <td>
                                                    <a href="{{ route('download-external-council-files', $files->id) }}"><button
                                                            class="btn btn-outline-success btn-sm" data-toggle="tooltip"
                                                            data-placement="top" title="Download"><i
                                                                class="fas fa-download"></i></button></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach


                                    <tr data-node-id="1.2" data-node-pid="1">
                                        <td> Litigation Management</td>
                                        <td></td>
                                    </tr>
                                    <tr data-node-id="1.2.1" data-node-pid="1.2">
                                        <td> Cases</td>
                                        <td></td>
                                    </tr>
                                    <tr data-node-id="1.2.1.1" data-node-pid="1.2.1">
                                        <td> Civil Cases</td>
                                        <td></td>
                                    </tr>

                                    @foreach ($civil_case as $case)
                                        <tr data-node-id="2.{{ $case->id }}" data-node-pid="1.2.1.1">
                                            <td> Case No :{{ $case->case_no }}</td>
                                            <td></td>
                                        </tr>
                                        @foreach ($case->civil_cases_files as $files)
                                            <tr data-node-id="3.2.1.3" data-node-pid="2.{{ $files->case_id }}">
                                                <td> File :{{ $files->uploaded_document }} </td>
                                                <td>
                                                    <a href="{{ route('download-civil-cases-files', $files->id) }}"><button
                                                            class="btn btn-outline-success btn-sm" data-toggle="tooltip"
                                                            data-placement="top" title="Download"><i
                                                                class="fas fa-download"></i></button></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach

                                    <tr data-node-id="2.2.1.1" data-node-pid="1.2.1">
                                        <td> Criminal Cases </td>
                                        <td></td>
                                    </tr>

                                    @foreach ($criminal_case as $case)
                                        <tr data-node-id="3.{{ $case->id }}" data-node-pid="2.2.1.1">
                                            <td> Case No :{{ $case->case_no }}</td>
                                            <td></td>
                                        </tr>
                                        @foreach ($case->criminal_cases_files as $files)
                                            <tr data-node-id="3.2.1.3" data-node-pid="3.{{ $files->case_id }}">
                                                <td> File :{{ $files->uploaded_document }} </td>
                                                <td>
                                                    <a href="{{ route('download-criminal-cases-files', $files->id) }}"><button
                                                            class="btn btn-outline-success btn-sm" data-toggle="tooltip"
                                                            data-placement="top" title="Download"><i
                                                                class="fas fa-download"></i></button></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach


                                    <tr data-node-id="3.2.1.1" data-node-pid="1.2.1">
                                        <td> Labour Cases </td>
                                        <td></td>
                                    </tr>

                                    @foreach ($labour_case as $case)
                                        <tr data-node-id="4.{{ $case->id }}" data-node-pid="3.2.1.1">
                                            <td> Case No :{{ $case->case_no }}</td>
                                            <td></td>
                                        </tr>
                                        @foreach ($case->labour_cases_files as $files)
                                            <tr data-node-id="4.2.1.3" data-node-pid="4.{{ $files->case_id }}">
                                                <td> File :{{ $files->uploaded_document }} </td>
                                                <td>
                                                    <a href="{{ route('download-labour-cases-files', $files->id) }}"><button
                                                            class="btn btn-outline-success btn-sm" data-toggle="tooltip"
                                                            data-placement="top" title="Download"><i
                                                                class="fas fa-download"></i></button></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach

                                    <tr data-node-id="4.2.1.1" data-node-pid="1.2.1">
                                        <td> Special/Quassi-Judicial Cases </td>
                                        <td></td>
                                    </tr>

                                    @foreach ($quassi_judicial_case as $case)
                                        <tr data-node-id="5.{{ $case->id }}" data-node-pid="4.2.1.1">
                                            <td> Case No :{{ $case->case_no }}</td>
                                            <td></td>
                                        </tr>
                                        @foreach ($case->quassi_judicial_cases_files as $files)
                                            <tr data-node-id="5.2.1.3" data-node-pid="5.{{ $files->case_id }}">
                                                <td> File :{{ $files->uploaded_document }} </td>
                                                <td>
                                                    <a
                                                        href="{{ route('download-quassi-judicial-cases-files', $files->id) }}"><button
                                                            class="btn btn-outline-success btn-sm" data-toggle="tooltip"
                                                            data-placement="top" title="Download"><i
                                                                class="fas fa-download"></i></button></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach

                                    <tr data-node-id="5.2.1.1" data-node-pid="1.2.1">
                                        <td> Supreme Court of Bangladesh </td>
                                        <td></td>
                                    </tr>

                                    @foreach ($supreme_court_case as $case)
                                        <tr data-node-id="6.{{ $case->id }}" data-node-pid="5.2.1.1">
                                            <td> Case No :{{ $case->case_no }}</td>
                                            <td></td>
                                        </tr>
                                        @foreach ($case->supreme_court_cases_files as $files)
                                            <tr data-node-id="6.2.1.3" data-node-pid="6.{{ $files->case_id }}">
                                                <td> File :{{ $files->uploaded_document }} </td>
                                                <td>
                                                    <a
                                                        href="{{ route('download-supreme-court-cases-files', $files->id) }}"><button
                                                            class="btn btn-outline-success btn-sm" data-toggle="tooltip"
                                                            data-placement="top" title="Download"><i
                                                                class="fas fa-download"></i></button></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach

                                    <tr data-node-id="6.2.1.1" data-node-pid="1.2.1">
                                        <td> High Court Division </td>
                                        <td></td>
                                    </tr>

                                    @foreach ($high_court_case as $case)
                                        <tr data-node-id="7.{{ $case->id }}" data-node-pid="6.2.1.1">
                                            <td> Case No :{{ $case->case_no }}</td>
                                            <td></td>
                                        </tr>
                                        @foreach ($case->high_court_cases_files as $files)
                                            <tr data-node-id="7.2.1.3" data-node-pid="7.{{ $files->case_id }}">
                                                <td> File :{{ $files->uploaded_document }} </td>
                                                <td>
                                                    <a href="{{ route('download-high-court-cases-files', $files->id) }}"><button
                                                            class="btn btn-outline-success btn-sm" data-toggle="tooltip"
                                                            data-placement="top" title="Download"><i
                                                                class="fas fa-download"></i></button></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach

                                    <tr data-node-id="7.2.1.1" data-node-pid="1.2.1">
                                        <td> Appellate Court Division </td>
                                        <td></td>
                                    </tr>

                                    @foreach ($appellate_court_case as $case)
                                        <tr data-node-id="8.{{ $case->id }}" data-node-pid="7.2.1.1">
                                            <td> Case No :{{ $case->case_no }}</td>
                                            <td></td>
                                        </tr>
                                        @foreach ($case->appellate_court_cases_files as $files)
                                            <tr data-node-id="81.2.1.3" data-node-pid="8.{{ $files->case_id }}">
                                                <td> File :{{ $files->uploaded_document }} </td>
                                                <td>
                                                    <a
                                                        href="{{ route('download-appellate-court-cases-files', $files->id) }}"><button
                                                            class="btn btn-outline-success btn-sm" data-toggle="tooltip"
                                                            data-placement="top" title="Download"><i
                                                                class="fas fa-download"></i></button></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach

                                    {{-- property Management --}}

                                    <tr data-node-id="11.2" data-node-pid="1">
                                        <td> Property Management</td>
                                        <td></td>
                                    </tr>
                                    <tr data-node-id="11.2.1" data-node-pid="11.2">
                                        <td> Land Information</td>
                                        <td></td>
                                    </tr>
                                    @foreach ($land_information as $land)
                                        <tr data-node-id="21.{{ $land->id }}" data-node-pid="11.2.1">
                                            <td> Land No : {{ $land->id }} - {{ $land->cs_khatian }} -
                                                {{ $land->cs_dag }}</td>
                                            <td></td>
                                        </tr>
                                        @foreach ($land->land_information_files as $files)
                                            <tr data-node-id="31.2.1.2"
                                                data-node-pid="21.{{ $files->land_information_id }}">
                                                <td> File : {{ $files->uploaded_document }}</td>
                                                <td><a href="{{ route('download-land-information-files', $files->id) }}"><button
                                                            class="btn btn-outline-success btn-sm" data-toggle="tooltip"
                                                            data-placement="top" title="Download"><i
                                                                class="fas fa-download"></i></button></a></td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                    <tr data-node-id="21.2.1" data-node-pid="11.2">
                                        <td> Flat Information</td>
                                        <td></td>
                                    </tr>
                                    @foreach ($flat_information as $flat)
                                        <tr data-node-id="31.{{ $flat->id }}" data-node-pid="21.2.1">
                                            <td> Flat No : {{ $flat->id }} - {{ $flat->cs_khatian }} -
                                                {{ $flat->cs_dag }}</td>
                                            <td></td>
                                        </tr>
                                        @foreach ($flat->flat_information_files as $files)
                                            <tr data-node-id="41.2.1.2"
                                                data-node-pid="31.{{ $files->flat_information_id }}">
                                                <td> File : {{ $files->uploaded_document }}</td>
                                                <td><a href="{{ route('download-flat-information-files', $files->id) }}"><button
                                                            class="btn btn-outline-success btn-sm" data-toggle="tooltip"
                                                            data-placement="top" title="Download"><i
                                                                class="fas fa-download"></i></button></a></td>
                                            </tr>
                                        @endforeach
                                    @endforeach

                                    

                                    <tr data-node-id="211.2" data-node-pid="1">
                                        <td> External Document </td>
                                        <td></td>
                                    </tr>

                                    @foreach ($external_document as $ext_doc)
                                        <tr data-node-id="211.2.1" data-node-pid="211.2">
                                            <td> File Name :{{ $ext_doc->file_name }} File : {{ $ext_doc->uploaded_document }} </td>
                                            <td><a href="{{ route('download-external-files', $ext_doc->id) }}"><button
                                                class="btn btn-outline-success btn-sm" data-toggle="tooltip"
                                                data-placement="top" title="Download"><i
                                                    class="fas fa-download"></i></button></a></td>
                                        </tr>
                                    @endforeach


                                </table>
                                <script>
                                    $('#opened').simpleTreeTable({
                                        opened: [1, 1.1]
                                    });
                                </script>













                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
