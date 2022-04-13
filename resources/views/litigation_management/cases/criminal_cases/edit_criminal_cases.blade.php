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
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">
                                <a class="leading-normal inline-flex items-center font-normal spark-button-focus h-8 text-md px-4 bg-transparent border-0 border-solid text-blue-700 hover:text-blue-800 active:text-blue-700 rounded-md"
                                   type="button" href="{{ route('criminal-cases') }}" aria-disabled="false" role="link"
                                   tabindex="-1">Back</a>
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

                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                            {{ Session::get('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="card">
                        <div class="">


                            <section class="panel">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <ul class="nav custom_top_tab">
                                            <li class="">
                                                <a data-toggle="tab" href="#home" class="active">Edit Criminal Cases</a>
                                            </li>
                                            <li class="">
                                                <a data-toggle="tab" href="#about">Update Status</a>
                                            </li>
                                            <li class="">
                                                <a data-toggle="tab" href="#activities">Activities</a>
                                            </li>
                                        </ul>
                                    </h3>
                                    <div class="float-right">
                                        <a href="{{ route('view-criminal-cases', $data->id) }}">
                                            <button
                                                class="btn btn-primary btn-sm" data-toggle="tooltip"
                                                data-placement="top"
                                                title="Details"><i class="fas fa-eye"></i></button>
                                        </a>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="tab-content">
                                        <div id="home" class="tab-pane active">

                                            <div class="card-header">
                                                <h3 class="card-title" id="heading">Edit Criminal Cases</h3>

                                            </div>

                                            <form action="{{ route('update-criminal-cases', $data->id) }}" method="post"
                                                  enctype="multipart/form-data">
                                                @csrf
                                                <div class="card-body">
                                                    <div class="row original_case">
                                                        <div class="col-md-6">

                                                            <div class="">
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <h6 class="text-uppercase text-bold"><u> Basic Information </u>
                                                                        </h6>
                                                                        <div class="form-group row">
                                                                            <label for="client" class="col-sm-4 col-form-label">Client
                                                                                Name</label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control" id="client"
                                                                                       name="client"
                                                                                       value="{{ $data->client }}">
                                                                                @error('client')<span
                                                                                    class="text-danger">{{$message}}</span>@enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="legal_issue_id" class="col-sm-4 col-form-label">Legal
                                                                                Issue</label>
                                                                            <div class="col-sm-8">
                                                                                <select name="legal_issue_id"
                                                                                        class="form-control select2">
                                                                                    <option value="">Select</option>
                                                                                    @foreach($legal_issue as $item)
                                                                                        <option
                                                                                            value="{{ $item->id }}" {{( $data->legal_issue_id == $item->id ? 'selected':'')}}>{{ $item->legal_issue_name }}</option>
                                                                                    @endforeach
                                                                                </select>

                                                                                @error('legal_issue_id')<span
                                                                                    class="text-danger">{{$message}}</span>@enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="legal_service_id" class="col-sm-4 col-form-label">Legal
                                                                                Service</label>
                                                                            <div class="col-sm-8">
                                                                                <select name="legal_service_id"
                                                                                        class="form-control select2">
                                                                                    <option value="">Select</option>
                                                                                    @foreach($legal_service as $item)
                                                                                        <option
                                                                                            value="{{ $item->id }}" {{( $data->legal_service_id == $item->id ? 'selected':'')}}>{{ $item->legal_service_name }}</option>
                                                                                    @endforeach
                                                                                </select>

                                                                                @error('legal_service_id')<span
                                                                                    class="text-danger">{{$message}}</span>@enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="complainant_informant_name" class="col-sm-4 col-form-label">Complainant/Informant
                                                                                Name </label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control"
                                                                                       id="complainant_informant_name"
                                                                                       name="complainant_informant_name"
                                                                                       value="{{ $data->complainant_informant_name }}">
                                                                                @error('complainant_informant_name')<span
                                                                                    class="text-danger">{{$message}}</span>@enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="accused_name" class="col-sm-4 col-form-label">Accused
                                                                                Name </label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control" id="accused_name"
                                                                                       name="accused_name"
                                                                                       value="{{ $data->accused_name }}">
                                                                                @error('accused_name')<span
                                                                                    class="text-danger">{{$message}}</span>@enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="in_favour_of" class="col-sm-4 col-form-label">In favour
                                                                                of </label>
                                                                            <div class="col-sm-8">
                                                                                <select name="in_favour_of" class="form-control select2">
                                                                                    <option value="">Select</option>
                                                                                    @foreach($internal_council as $item)
                                                                                        <option
                                                                                            value="{{ $item->id }}" {{( $data->in_favour_of == $item->id ? 'selected':'')}}>{{ $item->first_name }} {{ $item->middle_name }} {{ $item->last_name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('in_favour_of')<span
                                                                                    class="text-danger">{{$message}}</span>@enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="case_no" class="col-sm-4 col-form-label">Case
                                                                                No.</label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control" id="case_no"
                                                                                       name="case_no"
                                                                                       value="{{ $data->case_no }}">
                                                                                @error('case_no')<span
                                                                                    class="text-danger">{{$message}}</span>@enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="name_of_the_court_id"
                                                                                   class="col-sm-4 col-form-label">
                                                                                Name
                                                                                of the Court </label>
                                                                            <div class="col-sm-8">
                                                                                <select name="name_of_the_court_id"
                                                                                        class="form-control select2">
                                                                                    <option value="">Select</option>
                                                                                    @foreach($court as $item)
                                                                                        <option
                                                                                            value="{{ $item->id }}" {{( $data->name_of_the_court_id == $item->id ? 'selected':'')}}>{{ $item->court_name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('name_of_the_court_id')<span
                                                                                    class="text-danger">{{$message}}</span>@enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="next_date" class="col-sm-4 col-form-label"> Next
                                                                                Date </label>
                                                                            <div class="col-sm-8">
                                                                                <input type="date" class="form-control" id="next_date"
                                                                                       name="next_date" value="{{ $data->next_date }}">
                                                                                @error('next_date')<span
                                                                                    class="text-danger">{{$message}}</span>@enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="next_date_fixed_id"
                                                                                   class="col-sm-4 col-form-label">
                                                                                Next
                                                                                date fixed for </label>
                                                                            <div class="col-sm-8">
                                                                                <select name="next_date_fixed_id"
                                                                                        class="form-control select2">
                                                                                    <option value="">Select</option>
                                                                                    @foreach($next_date_reason as $item)
                                                                                        <option
                                                                                            value="{{ $item->id }}" {{( $data->next_date_fixed_id == $item->id ? 'selected':'')}}>{{ $item->next_date_reason_name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('next_date_fixed_id')<span
                                                                                    class="text-danger">{{$message}}</span>@enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="received_date" class="col-sm-4 col-form-label">
                                                                                Received
                                                                                Date </label>
                                                                            <div class="col-sm-8">
                                                                                <input type="date" class="form-control"
                                                                                       id="received_date"
                                                                                       name="received_date"
                                                                                       value="{{ $data->received_date }}">
                                                                                @error('received_date')<span
                                                                                    class="text-danger">{{$message}}</span>@enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="mode_of_receipt"
                                                                                   class="col-sm-4 col-form-label"> Mode
                                                                                of Receipt </label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control"
                                                                                       id="mode_of_receipt"
                                                                                       name="mode_of_receipt"
                                                                                       value="{{ $data->mode_of_receipt }}">
                                                                                @error('mode_of_receipt')<span
                                                                                    class="text-danger">{{$message}}</span>@enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="contact_person_name"
                                                                                   class="col-sm-4 col-form-label"> Contact Person Name </label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control"
                                                                                       id="contact_person_name"
                                                                                       name="contact_person_name"
                                                                                       value="{{ $data->contact_person_name }}">
                                                                                @error('contact_person_name')<span
                                                                                    class="text-danger">{{$message}}</span>@enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="contact_person_details"
                                                                                   class="col-sm-4 col-form-label"> Contact Person
                                                                                Details </label>
                                                                            <div class="col-sm-8">
                                                    <textarea name="contact_person_details" class="form-control"
                                                              rows="3"
                                                              placeholder="">{{ $data->contact_person_details }}</textarea>
                                                                                @error('contact_person_details')<span
                                                                                    class="text-danger">{{$message}}</span>@enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="received_by" class="col-sm-4 col-form-label">
                                                                                Received
                                                                                By </label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control" id="received_by"
                                                                                       name="received_by" readonly
                                                                                       value="{{ Auth::guard('admin')->user()->email }}">
                                                                                @error('received_by')<span
                                                                                    class="text-danger">{{$message}}</span>@enderror
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <h6 class="text-uppercase text-bold"><u> Client Information </u>
                                                                        </h6>

                                                                        <div class="form-group row">
                                                                            <label for="client_category_id"
                                                                                   class="col-sm-4 col-form-label">Client
                                                                                Category</label>
                                                                            <div class="col-sm-8">
                                                                                <select name="client_category_id"
                                                                                        class="form-control select2"
                                                                                        id="client_category_id"
                                                                                        action="{{ route('find-client-subcategory') }}">
                                                                                    <option value="">Select</option>
                                                                                    @foreach ($client_category as $item)
                                                                                        <option
                                                                                            value="{{ $item->id }}" {{( $data->client_category_id == $item->id ? 'selected':'')}}>{{ ucfirst($item->client_category_name) }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('client_category_id')<span
                                                                                    class="text-danger">{{$message}}</span>@enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="client_subcategory_id"
                                                                                   class="col-sm-4 col-form-label">Client
                                                                                Subcategory</label>
                                                                            <div class="col-sm-8">
                                                                                <select name="client_subcategory_id"
                                                                                        class="form-control select2"
                                                                                        id="client_subcategory_id">
                                                                                    <option value="">Select</option>

                                                                                    @foreach($existing_client_subcategory as $item)

                                                                                        <option value="{{ $item->id }}" {{ $data->client_subcategory_id == $item->id ? 'selected' : '' }}>{{ $item->client_subcategory_name }}</option>

                                                                                    @endforeach

                                                                                </select>
                                                                                @error('client_subcategory_id')<span
                                                                                    class="text-danger">{{$message}}</span>@enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="client_name" class="col-sm-4 col-form-label">Client
                                                                                Name</label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control" id="client_name"
                                                                                       name="client_name"
                                                                                       value="{{ $data->client_name }}">
                                                                                @error('client_name')<span
                                                                                    class="text-danger">{{$message}}</span>@enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="client_address" class="col-sm-4 col-form-label">
                                                                                Client
                                                                                Address </label>
                                                                            <div class="col-sm-8">
                                                    <textarea name="client_address" class="form-control" rows="3"
                                                              placeholder="">{{ $data->client_address }}</textarea>
                                                                                @error('client_address')<span
                                                                                    class="text-danger">{{$message}}</span>@enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="client_mobile" class="col-sm-4 col-form-label">Client
                                                                                Mobile</label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control" id="client_mobile"
                                                                                       name="client_mobile"
                                                                                       value="{{ $data->client_mobile }}">
                                                                                @error('client_mobile')<span
                                                                                    class="text-danger">{{$message}}</span>@enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="client_email" class="col-sm-4 col-form-label">Client
                                                                                Email</label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control" id="client_email"
                                                                                       name="client_email"
                                                                                       value="{{ $data->client_email }}">
                                                                                @error('client_email')<span
                                                                                    class="text-danger">{{$message}}</span>@enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="client_division_id"
                                                                                   class="col-sm-4 col-form-label">Zone/Division</label>
                                                                            <div class="col-sm-8">
                                                                                <select name="client_division_id"
                                                                                        class="form-control select2"
                                                                                        id="client_division_id"
                                                                                        action="{{ route('find_district') }}">
                                                                                    <option value="">Select</option>
                                                                                    @foreach ($division as $item)
                                                                                        <option
                                                                                            value="{{ $item->id }}" {{( $data->client_division_id == $item->id ? 'selected':'')}}>{{ ucfirst($item->division_name) }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('client_division_id')<span
                                                                                    class="text-danger">{{$message}}</span>@enderror
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label for="client_district_id"
                                                                                   class="col-sm-4 col-form-label">Area/District</label>
                                                                            <div class="col-sm-8">
                                                                                <select name="client_district_id"
                                                                                        class="form-control select2"
                                                                                        id="client_district_id"
                                                                                        action="{{ route('find-thana') }}">
                                                                                    <option value=""> Select</option>
                                                                                    @foreach ($existing_district as $item)
                                                                                        <option
                                                                                            value="{{ $item->id }}" {{( $data->client_district_id == $item->id ? 'selected':'')}}>{{ ucfirst($item->district_name) }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('client_district_id')<span
                                                                                    class="text-danger">{{$message}}</span>@enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="client_thana_id"
                                                                                   class="col-sm-4 col-form-label">Branch/Thana</label>
                                                                            <div class="col-sm-8">
                                                                                <select name="client_thana_id" id="client_thana_id"
                                                                                        class="form-control select2">
                                                                                    <option value="">Select</option>
                                                                                    @foreach ($existing_thana as $item)
                                                                                        <option
                                                                                            value="{{ $item->id }}" {{( $data->client_thana_id == $item->id ? 'selected':'')}}>{{ ucfirst($item->thana_name) }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('client_thana_id')<span
                                                                                    class="text-danger">{{$message}}</span>@enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="coordinator_tadbirkar_id"
                                                                                   class="col-sm-4 col-form-label"> Coordinator/Tadbirkar </label>
                                                                            <div class="col-sm-8">
                                                                                <div class="row" style="padding: 0px 8px;">
                                                                                    <select name="coordinator_tadbirkar_id"
                                                                                            id="coordinator_tadbirkar_id"
                                                                                            class="form-control select2 col-6">
                                                                                        <option value="">Select</option>
                                                                                        @foreach($coordinator as $item)
                                                                                            <option
                                                                                                value="{{ $item->id }}" {{  $data->coordinator_tadbirkar_id == $item->id ? 'selected' : '' }}>{{ $item->coordinator_name }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    <input type="text" class="form-control col-6"
                                                                                           id="coordinator_tadbirkar_name"
                                                                                           name="coordinator_tadbirkar_name"
                                                                                           placeholder="Tadbirkar Name"
                                                                                           value="{{ $data->coordinator_tadbirkar_name }}">
                                                                                </div>

                                                                                @error('coordinator_tadbirkar_id')<span
                                                                                    class="text-danger">{{$message}}</span>@enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="coordinator_details"
                                                                                   class="col-sm-4 col-form-label"> Coordinator Details </label>
                                                                            <div class="col-sm-8">
                                                    <textarea name="coordinator_details" class="form-control"
                                                              rows="3"
                                                              placeholder="">{{ $data->coordinator_details }}</textarea>
                                                                                @error('coordinator_details')<span
                                                                                    class="text-danger">{{$message}}</span>@enderror
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <h6 class="text-uppercase text-bold"><u> Documents
                                                                                Information </u></h6>
                                                                        <div class="form-group row">
                                                                            <label for="received_documents"
                                                                                   class="col-sm-4 col-form-label">
                                                                                Received Documents </label>
                                                                            <div class="col-sm-8">
                                                    <textarea name="received_documents" class="form-control" rows="3"
                                                              placeholder="">{{ $data->received_documents }}</textarea>
                                                                                @error('received_documents')<span
                                                                                    class="text-danger">{{$message}}</span>@enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="required_wanting_documents"
                                                                                   class="col-sm-4 col-form-label"> Required/Wanting
                                                                                Documents </label>
                                                                            <div class="col-sm-8">
                                                    <textarea name="required_wanting_documents" class="form-control"
                                                              rows="3"
                                                              placeholder="">{{ $data->required_wanting_documents }}</textarea>
                                                                                @error('required_wanting_documents')<span
                                                                                    class="text-danger">{{$message}}</span>@enderror
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <h6 class="text-uppercase text-bold"><u> Lawyer
                                                                                Information </u></h6>
                                                                        <div class="form-group row">
                                                                            <label for="lawyer_advocate_id" class="col-sm-4 col-form-label">Name
                                                                                of
                                                                                Advocate/Law Firm</label>
                                                                            <div class="col-sm-8">
                                                                                <select name="lawyer_advocate_id" class="form-control select2">
                                                                                    <option value="">Select</option>
                                                                                    @foreach($external_council as $item)
                                                                                        <option
                                                                                            value="{{ $item->id }}" {{($data->lawyer_advocate_id == $item->id ? 'selected':'')}}>{{ $item->first_name }} {{ $item->middle_name }} {{ $item->last_name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('lawyer_advocate_id')<span
                                                                                    class="text-danger">{{$message}}</span>@enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="assigned_lawyer" class="col-sm-4 col-form-label">Name of Assigned
                                                                                Lawyer</label>
                                                                            <div class="col-sm-8">
                                                                                <select name="assigned_lawyer[]" class="form-control select2" multiple>
                                                                                    <option value="">Select</option>
                                                                                    @foreach($internal_council as $item)
                                                                                        <option
                                                                                            value="{{ $item->first_name.' '.$item->middle_name.' '.$item->last_name }}" {{( in_array($item->first_name.' '.$item->middle_name.' '.$item->last_name, $assigned_lawyer) ? 'selected':'')}}>{{ $item->first_name }} {{ $item->middle_name }} {{ $item->last_name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('assigned_lawyer')<span
                                                                                    class="text-danger">{{$message}}</span>@enderror
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label for="lawyers_remarks"
                                                                                   class="col-sm-4 col-form-label"> Remarks </label>
                                                                            <div class="col-sm-8">
                                                    <textarea name="lawyers_remarks" class="form-control"
                                                              rows="3"
                                                              placeholder="">{{ $data->lawyers_remarks }}</textarea>
                                                                                @error('lawyers_remarks')<span
                                                                                    class="text-danger">{{$message}}</span>@enderror
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <h6 class="text-uppercase text-bold"><u> Status of the Case </u>
                                                                        </h6>
                                                                        <div class="form-group row">
                                                                            <label for="case_status_id"
                                                                                   class="col-sm-4 col-form-label">Status</label>
                                                                            <div class="col-sm-8">
                                                                                <select name="case_status_id"
                                                                                        class="form-control select2">
                                                                                    <option value="">Select</option>
                                                                                    @foreach($case_status as $item)
                                                                                        <option
                                                                                            value="{{ $item->id }}" {{( $data->case_status_id == $item->id ? 'selected':'')}}>{{ $item->case_status_name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('case_status_id')<span
                                                                                    class="text-danger">{{$message}}</span>@enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="status_next_date"
                                                                                   class="col-sm-4 col-form-label"> Next
                                                                                Date </label>
                                                                            <div class="col-sm-8">
                                                                                <input type="date" class="form-control"
                                                                                       id="status_next_date"
                                                                                       name="status_next_date"
                                                                                       value="{{ $data->status_next_date }}">
                                                                                @error('status_next_date')<span
                                                                                    class="text-danger">{{$message}}</span>@enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="status_next_date_fixed_id"
                                                                                   class="col-sm-4 col-form-label">
                                                                                Next
                                                                                date fixed for </label>
                                                                            <div class="col-sm-8">
                                                                                <select name="status_next_date_fixed_id"
                                                                                        class="form-control select2">
                                                                                    <option value="">Select</option>
                                                                                    @foreach($next_date_reason as $item)
                                                                                        <option
                                                                                            value="{{ $item->id }}" {{( $data->status_next_date_fixed_id == $item->id ? 'selected':'')}}>{{ $item->next_date_reason_name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('status_next_date_fixed_id')<span
                                                                                    class="text-danger">{{$message}}</span>@enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="status_remarks" class="col-sm-4 col-form-label">
                                                                                Remarks </label>
                                                                            <div class="col-sm-8">
                                                    <textarea name="status_remarks" class="form-control" rows="3"
                                                              placeholder="">{{ $data->status_remarks }}</textarea>
                                                                                @error('status_remarks')<span
                                                                                    class="text-danger">{{$message}}</span>@enderror
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="">
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <h6 class="text-uppercase text-bold"><u> Case Information </u>
                                                                        </h6>
                                                                        <div class="form-group row">
                                                                            <label for="case_infos_division_id"
                                                                                   class="col-sm-4 col-form-label">Division</label>
                                                                            <div class="col-sm-8">
                                                                                <select name="case_infos_division_id"
                                                                                        class="form-control select2"
                                                                                        id="case_infos_division_id"
                                                                                        action="{{ route('find_district') }}">
                                                                                    <option value="">Select</option>
                                                                                    @foreach ($division as $item)
                                                                                        <option
                                                                                            value="{{ $item->id }}" {{( $data->case_infos_division_id == $item->id ? 'selected':'')}}>{{ ucfirst($item->division_name) }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('case_infos_division_id')<span
                                                                                    class="text-danger">{{$message}}</span>@enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="case_infos_district_id"
                                                                                   class="col-sm-4 col-form-label">District</label>
                                                                            <div class="col-sm-8">
                                                                                <select name="case_infos_district_id"
                                                                                        class="form-control select2"
                                                                                        id="case_infos_district_id"
                                                                                        action="{{ route('find-thana') }}">
                                                                                    <option value=""> Select</option>
                                                                                    @foreach ($existing_district as $item)
                                                                                        <option
                                                                                            value="{{ $item->id }}" {{( $data->case_infos_district_id == $item->id ? 'selected':'')}}>{{ ucfirst($item->district_name) }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('case_infos_district_id')<span
                                                                                    class="text-danger">{{$message}}</span>@enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="case_infos_thana_id"
                                                                                   class="col-sm-4 col-form-label">Thana</label>
                                                                            <div class="col-sm-8">
                                                                                <select name="case_infos_thana_id"
                                                                                        id="case_infos_thana_id"
                                                                                        class="form-control select2">
                                                                                    <option value="">Select</option>
                                                                                    @foreach ($case_infos_existing_thana as $item)
                                                                                        <option
                                                                                            value="{{ $item->id }}" {{( $data->case_infos_thana_id == $item->id ? 'selected':'')}}>{{ ucfirst($item->thana_name) }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('case_infos_thana_id')<span
                                                                                    class="text-danger">{{$message}}</span>@enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="name_of_the_court"
                                                                                   class="col-sm-4 col-form-label"> Name
                                                                                of the Court </label>
                                                                            <div class="col-sm-8">
                                                                                <div
                                                                                    class="input-group hdtuto_court_name control-group increment_court_name">
                                                                                    <input type="text" name="name_of_the_court[]"
                                                                                           class="myfrm form-control" value="{{ rtrim($data->name_of_the_court, ', ') }}">
                                                                                    <div class="input-group-btn">
                                                                                        <button class="btn btn-success btn_success_court_name"
                                                                                                type="button"><i
                                                                                                class="fldemo glyphicon glyphicon-plus"></i>+
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="clone_court_name hide">
                                                                                    <div class="hdtuto_court_name control-group lst input-group"
                                                                                         style="margin-top:10px">
                                                                                        <input type="text" name="name_of_the_court[]"
                                                                                               class="myfrm form-control">
                                                                                        <div class="input-group-btn">
                                                                                            <button class="btn btn-danger btn_danger_court_name"
                                                                                                    type="button"><i
                                                                                                    class="fldemo glyphicon glyphicon-remove"></i> -
                                                                                            </button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                @error('name_of_the_court')<span
                                                                                    class="text-danger">{{$message}}</span>@enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="case_category_id"
                                                                                   class="col-sm-4 col-form-label">Case
                                                                                Category </label>
                                                                            <div class="col-sm-8">
                                                                                <select name="case_category_id" id="case_category_id"
                                                                                        class="form-control select2"
                                                                                        action="{{ route('find-case-subcategory') }}">
                                                                                    <option value="">Select</option>
                                                                                    @foreach($case_category as $item)
                                                                                        <option
                                                                                            value="{{ $item->id }}" {{( $data->case_category_id == $item->id ? 'selected':'')}}>{{ $item->case_category }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('case_category_id')<span
                                                                                    class="text-danger">{{$message}}</span>@enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="case_subcategory_id"
                                                                                   class="col-sm-4 col-form-label">Case
                                                                                Subcategory </label>
                                                                            <div class="col-sm-8">

                                                                                <select name="case_subcategory_id"
                                                                                        id="case_subcategory_id"
                                                                                        class="form-control select2">
                                                                                    <option value="">Select</option>
                                                                                    @foreach($existing_case_subcategory as $item)
                                                                                        <option
                                                                                            value="{{ $item->id }}" {{( $data->case_subcategory_id == $item->id ? 'selected':'')}}>{{ $item->case_subcategory }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('case_subcategory_id')<span
                                                                                    class="text-danger">{{$message}}</span>@enderror

                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="case_type_id" class="col-sm-4 col-form-label">Type
                                                                                of
                                                                                Cases </label>
                                                                            <div class="col-sm-8">
                                                                                <select name="case_type_id"
                                                                                        class="form-control select2">
                                                                                    <option value="">Select</option>
                                                                                    @foreach($case_types as $item)
                                                                                        <option
                                                                                            value="{{ $item->id }}" {{( $data->case_type_id == $item->id ? 'selected':'')}}>{{ $item->case_types_name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('case_type_id')<span
                                                                                    class="text-danger">{{$message}}</span>@enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="case_infos_case_no"
                                                                                   class="col-sm-4 col-form-label">Case
                                                                                No.</label>
                                                                            <div class="col-sm-8">
                                                                                <div class="input-group hdtuto_case_infos_case_no control-group increment_case_infos_case_no ml-2">
                                                                                    <div class="row" style="">
                                                                                        <input type="text" class="form-control col-5"
                                                                                               id="case_infos_case_no"
                                                                                               name="case_infos_case_no[]" placeholder="Case No."
                                                                                               value="{{ rtrim($data->case_infos_case_no, ', ') }}">
                                                                                        <input type="text" class="form-control col-5 ml-0"
                                                                                               id="case_infos_case_year"
                                                                                               name="case_infos_case_year[]" placeholder="Case Year"
                                                                                               value="{{ rtrim($data->case_infos_case_year, ', ') }}">
                                                                                        <div class="input-group-btn col-2">

                                                                                            <button class="btn btn-success btn_success_case_infos_case_no ml-2"
                                                                                                    type="button"><i
                                                                                                    class="fldemo glyphicon glyphicon-plus"></i>+
                                                                                            </button>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                                <div class="clone_case_infos_case_no hide ">
                                                                                    <div class="hdtuto_case_infos_case_no control-group lst input-group ml-2"
                                                                                         style="margin-top:10px">
                                                                                        <div class="row" style="">
                                                                                            <input type="text" class="form-control col-5"
                                                                                                   id="case_infos_case_no"
                                                                                                   name="case_infos_case_no[]" placeholder="Case No.">
                                                                                            <input type="text" class="form-control col-5 ml-0"
                                                                                                   id="case_infos_case_year"
                                                                                                   name="case_infos_case_year[]" placeholder="Case Year">
                                                                                            <div class="input-group-btn col-2">
                                                                                                <button class="btn btn-danger btn_danger_case_infos_case_no ml-2"
                                                                                                        type="button"><i
                                                                                                        class="fldemo glyphicon glyphicon-remove"></i> -
                                                                                                </button>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                                @error('case_infos_case_no')<span
                                                                                    class="text-danger">{{$message}}</span>@enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="law" class="col-sm-4 col-form-label">
                                                                                Law </label>
                                                                            <div class="col-sm-8">
                                                                                <div class="input-group hdtuto_law control-group increment_law">
                                                                                    <input type="text" name="law[]"
                                                                                           class="myfrm form-control" value="{{ rtrim($data->law, ', ') }}">
                                                                                    <div class="input-group-btn">
                                                                                        <button class="btn btn-success btn_success_law"
                                                                                                type="button"><i
                                                                                                class="fldemo glyphicon glyphicon-plus"></i>+
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="clone_law hide">
                                                                                    <div class="hdtuto_law control-group lst input-group"
                                                                                         style="margin-top:10px">
                                                                                        <input type="text" name="law[]"
                                                                                               class="myfrm form-control">
                                                                                        <div class="input-group-btn">
                                                                                            <button class="btn btn-danger btn_danger_law"
                                                                                                    type="button"><i
                                                                                                    class="fldemo glyphicon glyphicon-remove"></i> -
                                                                                            </button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>


                                                                                @error('law')<span
                                                                                    class="text-danger">{{$message}}</span>@enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="section" class="col-sm-4 col-form-label">
                                                                                Section </label>
                                                                            <div class="col-sm-8">

                                                                                <div class="input-group hdtuto_section control-group increment_section">
                                                                                    <input type="text" name="section[]"
                                                                                           class="myfrm form-control" value="{{ rtrim($data->section, ', ') }}">
                                                                                    <div class="input-group-btn">
                                                                                        <button class="btn btn-success btn_success_section"
                                                                                                type="button"><i
                                                                                                class="fldemo glyphicon glyphicon-plus"></i>+
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="clone_section hide">
                                                                                    <div class="hdtuto_section control-group lst input-group"
                                                                                         style="margin-top:10px">
                                                                                        <input type="text" name="section[]"
                                                                                               class="myfrm form-control">
                                                                                        <div class="input-group-btn">
                                                                                            <button class="btn btn-danger btn_danger_section"
                                                                                                    type="button"><i
                                                                                                    class="fldemo glyphicon glyphicon-remove"></i> -
                                                                                            </button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                @error('section')<span
                                                                                    class="text-danger">{{$message}}</span>@enderror
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label for="date_of_filing" class="col-sm-4 col-form-label">Case Filing
                                                                                Date</label>
                                                                            <div class="col-sm-8">
                                                                                <input type="date" class="form-control"
                                                                                       id="date_of_filing"
                                                                                       name="date_of_filing"
                                                                                       value="{{ $data->date_of_filing }}">
                                                                                @error('date_of_filing')<span
                                                                                    class="text-danger">{{$message}}</span>@enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="matter_id" class="col-sm-4 col-form-label">Matter</label>
                                                                            <div class="col-sm-8">
                                                                                <select name="matter_id"
                                                                                        class="form-control select2">
                                                                                    <option value="">Select</option>
                                                                                    @foreach($matter as $item)
                                                                                        <option
                                                                                            value="{{ $item->id }}" {{( $data->matter_id == $item->id ? 'selected':'')}}>{{ $item->matter_name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('matter_id')<span
                                                                                    class="text-danger">{{$message}}</span>@enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="case_infos_complainant_informant_name"
                                                                                   class="col-sm-4 col-form-label">
                                                                                Complainant/Informant Name </label>
                                                                            <div class="col-sm-8">

                                                                                <div class="input-group hdtuto_complainant control-group increment_complainant">
                                                                                    <input type="text" name="case_infos_complainant_informant_name[]"
                                                                                           class="myfrm form-control" value="{{ rtrim($data->case_infos_complainant_informant_name, ', ') }}">
                                                                                    <div class="input-group-btn">
                                                                                        <button class="btn btn-success btn_success_complainant"
                                                                                                type="button"><i
                                                                                                class="fldemo glyphicon glyphicon-plus"></i>+
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="clone_complainant hide">
                                                                                    <div class="hdtuto_complainant control-group lst input-group"
                                                                                         style="margin-top:10px">
                                                                                        <input type="text" name="case_infos_complainant_informant_name[]"
                                                                                               class="myfrm form-control">
                                                                                        <div class="input-group-btn">
                                                                                            <button class="btn btn-danger btn_danger_complainant"
                                                                                                    type="button"><i
                                                                                                    class="fldemo glyphicon glyphicon-remove"></i> -
                                                                                            </button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                @error('case_infos_complainant_informant_name')<span
                                                                                    class="text-danger">{{$message}}</span>@enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="complainant_informant_representative"
                                                                                   class="col-sm-4 col-form-label">
                                                                                Complainant/Informant's Representative </label>
                                                                            <div class="col-sm-8">

                                                                                <div class="input-group hdtuto_complainant_representative control-group increment_complainant_representative">
                                                                                    <input type="text" name="complainant_informant_representative[]"
                                                                                           class="myfrm form-control" value="{{ rtrim($data->complainant_informant_representative, ', ') }}">
                                                                                    <div class="input-group-btn">
                                                                                        <button class="btn btn-success btn_success_complainant_representative"
                                                                                                type="button"><i
                                                                                                class="fldemo glyphicon glyphicon-plus"></i>+
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="clone_complainant_representative hide">
                                                                                    <div class="hdtuto_complainant_representative control-group lst input-group"
                                                                                         style="margin-top:10px">
                                                                                        <input type="text" name="complainant_informant_representative[]"
                                                                                               class="myfrm form-control">
                                                                                        <div class="input-group-btn">
                                                                                            <button class="btn btn-danger btn_danger_complainant_representative"
                                                                                                    type="button"><i
                                                                                                    class="fldemo glyphicon glyphicon-remove"></i> -
                                                                                            </button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                @error('complainant_informant_representative')<span
                                                                                    class="text-danger">{{$message}}</span>@enderror
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label for="case_infos_accused_name"
                                                                                   class="col-sm-4 col-form-label">
                                                                                Accused Name </label>
                                                                            <div class="col-sm-8">

                                                                                <div class="input-group hdtuto_accused control-group increment_accused">
                                                                                    <input type="text" name="case_infos_accused_name[]"
                                                                                           class="myfrm form-control" value="{{ rtrim($data->case_infos_accused_name, ', ') }}">
                                                                                    <div class="input-group-btn">
                                                                                        <button class="btn btn-success btn_success_accused"
                                                                                                type="button"><i
                                                                                                class="fldemo glyphicon glyphicon-plus"></i>+
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="clone_accused hide">
                                                                                    <div class="hdtuto_accused control-group lst input-group"
                                                                                         style="margin-top:10px">
                                                                                        <input type="text" name="case_infos_accused_name[]"
                                                                                               class="myfrm form-control">
                                                                                        <div class="input-group-btn">
                                                                                            <button class="btn btn-danger btn_danger_accused"
                                                                                                    type="button"><i
                                                                                                    class="fldemo glyphicon glyphicon-remove"></i> -
                                                                                            </button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                @error('case_infos_accused_name')<span
                                                                                    class="text-danger">{{$message}}</span>@enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="case_infos_accused_representative"
                                                                                   class="col-sm-4 col-form-label">
                                                                                Accused's Representative </label>
                                                                            <div class="col-sm-8">

                                                                                <div class="input-group hdtuto_accused_representative control-group increment_accused_representative">
                                                                                    <input type="text" name="case_infos_accused_representative[]"
                                                                                           class="myfrm form-control" value="{{ rtrim($data->case_infos_accused_representative, ', ') }}">
                                                                                    <div class="input-group-btn">
                                                                                        <button class="btn btn-success btn_success_accused_representative"
                                                                                                type="button"><i
                                                                                                class="fldemo glyphicon glyphicon-plus"></i>+
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="clone_accused_representative hide">
                                                                                    <div class="hdtuto_accused_representative control-group lst input-group"
                                                                                         style="margin-top:10px">
                                                                                        <input type="text" name="case_infos_accused_representative[]"
                                                                                               class="myfrm form-control">
                                                                                        <div class="input-group-btn">
                                                                                            <button class="btn btn-danger btn_danger_accused_representative"
                                                                                                    type="button"><i
                                                                                                    class="fldemo glyphicon glyphicon-remove"></i> -
                                                                                            </button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                @error('case_infos_accused_representative')<span
                                                                                    class="text-danger">{{$message}}</span>@enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="case_infos_allegation_claim_id"
                                                                                   class="col-sm-4 col-form-label">
                                                                                Allegation/Claim </label>
                                                                            <div class="col-sm-8">

                                                                                <div class="row" style="padding: 0px 8px;">
                                                                                    <select name="case_infos_allegation_claim_id"
                                                                                            class="form-control select2 col-6">
                                                                                        <option value="">Select</option>
                                                                                        @foreach($allegation as $item)
                                                                                            <option
                                                                                                value="{{ $item->id }}" {{( $data->case_infos_allegation_claim_id == $item->id ? 'selected':'')}}>{{ $item->allegation_name }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    <input type="text" class="form-control col-6"
                                                                                           id="case_infos_allegation_claim"
                                                                                           name="case_infos_allegation_claim"
                                                                                           placeholder="Allegation"
                                                                                           value="{{ $data->case_infos_allegation_claim }}">
                                                                                </div>

                                                                                @error('case_infos_allegation_claim_id')<span
                                                                                    class="text-danger">{{$message}}</span>@enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="amount_of_money"
                                                                                   class="col-sm-4 col-form-label">Amount
                                                                                of
                                                                                Money</label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control"
                                                                                       id="amount_of_money"
                                                                                       name="amount_of_money"
                                                                                       value="{{ $data->amount_of_money }}">
                                                                                @error('amount_of_money')<span
                                                                                    class="text-danger">{{$message}}</span>@enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="another_claim" class="col-sm-4 col-form-label">
                                                                                Another
                                                                                Claim(if
                                                                                any) </label>
                                                                            <div class="col-sm-8">
                                                    <textarea name="another_claim" class="form-control" rows="3"
                                                              placeholder="">{{ $data->another_claim }}</textarea>
                                                                                @error('another_claim')<span
                                                                                    class="text-danger">{{$message}}</span>@enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="summary_facts" class="col-sm-4 col-form-label">
                                                                                Summary
                                                                                of Facts </label>
                                                                            <div class="col-sm-8">
                                                    <textarea name="summary_facts" class="form-control" rows="3"
                                                              placeholder="">{{ $data->summary_facts }}</textarea>
                                                                                @error('summary_facts')<span
                                                                                    class="text-danger">{{$message}}</span>@enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="date_of_arrest"
                                                                                   class="col-sm-4 col-form-label">Date of Arrest</label>
                                                                            <div class="col-sm-8">
                                                                                <input type="date" class="form-control"
                                                                                       id="date_of_arrest"
                                                                                       name="date_of_arrest"
                                                                                       value="{{ $data->date_of_arrest }}">
                                                                                @error('date_of_arrest')<span
                                                                                    class="text-danger">{{$message}}</span>@enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="date_of_bill"
                                                                                   class="col-sm-4 col-form-label">
                                                                                Date of Bill </label>
                                                                            <div class="col-sm-8">
                                                                                <input type="date" class="form-control"
                                                                                       id="date_of_bill"
                                                                                       name="date_of_bill"
                                                                                       value="{{ $data->date_of_bill }}">
                                                                                @error('date_of_bill')<span
                                                                                    class="text-danger">{{$message}}</span>@enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="case_info_remarks"
                                                                                   class="col-sm-4 col-form-label">
                                                                                Remarks </label>
                                                                            <div class="col-sm-8">
                                                    <textarea name="case_info_remarks" class="form-control"
                                                              rows="3"
                                                              placeholder="">{{ $data->case_info_remarks }}</textarea>
                                                                                @error('case_info_remarks')<span
                                                                                    class="text-danger">{{$message}}</span>@enderror
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <h6 class="text-uppercase text-bold"><u> Judgement Information </u>
                                                                        </h6>
                                                                        <div class="form-group row">
                                                                            <label for="judgement_date_of_filing"
                                                                                   class="col-sm-4 col-form-label"> Date of Filing </label>
                                                                            <div class="col-sm-8">
                                                                                <input type="date" class="form-control"
                                                                                       id="judgement_date_of_filing"
                                                                                       name="judgement_date_of_filing"
                                                                                       value="{{ $data->judgement_date_of_filing }}">
                                                                                @error('judgement_date_of_filing')<span
                                                                                    class="text-danger">{{$message}}</span>@enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="date_of_cognizance"
                                                                                   class="col-sm-4 col-form-label"> Date of Cognizance </label>
                                                                            <div class="col-sm-8">
                                                                                <input type="date" class="form-control"
                                                                                       id="date_of_cognizance"
                                                                                       name="date_of_cognizance"
                                                                                       value="{{ $data->date_of_cognizance }}">
                                                                                @error('date_of_cognizance')<span
                                                                                    class="text-danger">{{$message}}</span>@enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="date_of_court_transfer"
                                                                                   class="col-sm-4 col-form-label"> Date of Court Transfer </label>
                                                                            <div class="col-sm-8">
                                                                                <input type="date" class="form-control"
                                                                                       id="date_of_court_transfer"
                                                                                       name="date_of_court_transfer"
                                                                                       value="{{ $data->date_of_court_transfer }}">
                                                                                @error('date_of_court_transfer')<span
                                                                                    class="text-danger">{{$message}}</span>@enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="date_of_charge_framed"
                                                                                   class="col-sm-4 col-form-label"> Date of Charge Framed </label>
                                                                            <div class="col-sm-8">
                                                                                <input type="date" class="form-control"
                                                                                       id="date_of_charge_framed"
                                                                                       name="date_of_charge_framed"
                                                                                       value="{{ $data->date_of_charge_framed }}">
                                                                                @error('date_of_charge_framed')<span
                                                                                    class="text-danger">{{$message}}</span>@enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="date_of_witness_from"
                                                                                   class="col-sm-4 col-form-label"> Date of Witness(From) </label>
                                                                            <div class="col-sm-8">
                                                                                <input type="date" class="form-control"
                                                                                       id="date_of_witness_from"
                                                                                       name="date_of_witness_from"
                                                                                       value="{{ $data->date_of_witness_from }}">
                                                                                @error('date_of_witness_from')<span
                                                                                    class="text-danger">{{$message}}</span>@enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="date_of_witness_to"
                                                                                   class="col-sm-4 col-form-label"> Date of Witness(To) </label>
                                                                            <div class="col-sm-8">
                                                                                <input type="date" class="form-control"
                                                                                       id="date_of_witness_to"
                                                                                       name="date_of_witness_to"
                                                                                       value="{{ $data->date_of_witness_to }}">
                                                                                @error('date_of_witness_to')<span
                                                                                    class="text-danger">{{$message}}</span>@enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="date_of_argument"
                                                                                   class="col-sm-4 col-form-label"> Date of Argument </label>
                                                                            <div class="col-sm-8">
                                                                                <input type="date" class="form-control"
                                                                                       id="date_of_argument"
                                                                                       name="date_of_argument"
                                                                                       value="{{ $data->date_of_argument }}">
                                                                                @error('date_of_argument')<span
                                                                                    class="text-danger">{{$message}}</span>@enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="date_of_judgement_order"
                                                                                   class="col-sm-4 col-form-label"> Date of Judgement &
                                                                                Order </label>
                                                                            <div class="col-sm-8">
                                                                                <input type="date" class="form-control"
                                                                                       id="date_of_judgement_order"
                                                                                       name="date_of_judgement_order"
                                                                                       value="{{ $data->date_of_judgement_order }}">
                                                                                @error('date_of_judgement_order')<span
                                                                                    class="text-danger">{{$message}}</span>@enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="summary_judgement_order" class="col-sm-4 col-form-label">
                                                                                Summary of Judgement & Order </label>
                                                                            <div class="col-sm-8">
                                                    <textarea name="summary_judgement_order" class="form-control"
                                                              rows="3"
                                                              placeholder="">{{ $data->summary_judgement_order }}</textarea>
                                                                                @error('summary_judgement_order')<span
                                                                                    class="text-danger">{{$message}}</span>@enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="judgement_remarks" class="col-sm-4 col-form-label">
                                                                                Remarks </label>
                                                                            <div class="col-sm-8">
                                                    <textarea name="judgement_remarks" class="form-control" rows="3"
                                                              placeholder="">{{ $data->judgement_remarks }}</textarea>
                                                                                @error('judgement_remarks')<span
                                                                                    class="text-danger">{{$message}}</span>@enderror
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    {{--                        <div class="row">--}}
                                                    {{--                            <div class="col-md-6">--}}
                                                    {{--                                <div class="appeal_case_info" style="display: none;">--}}
                                                    {{--                                    <div class="card">--}}
                                                    {{--                                        <div class="card-body">--}}
                                                    {{--                                            <h6 class="text-uppercase text-bold"><u> Case Information </u>--}}
                                                    {{--                                            </h6>--}}
                                                    {{--                                            <div class="form-group row">--}}
                                                    {{--                                                <label for="appeal_original_case_no"--}}
                                                    {{--                                                       class="col-sm-4 col-form-label">Original Case--}}
                                                    {{--                                                    No.</label>--}}
                                                    {{--                                                <div class="col-sm-8">--}}
                                                    {{--                                                    <input type="text" class="form-control"--}}
                                                    {{--                                                           id="appeal_original_case_no"--}}
                                                    {{--                                                           name="appeal_original_case_no"--}}
                                                    {{--                                                           value="{{ $data-> appeal_original_case_no }}">--}}
                                                    {{--                                                    @error('appeal_original_case_no')<span--}}
                                                    {{--                                                        class="text-danger">{{$message}}</span>@enderror--}}
                                                    {{--                                                </div>--}}
                                                    {{--                                            </div>--}}
                                                    {{--                                            <div class="form-group row">--}}
                                                    {{--                                                <label for="appeal_subsequent_case_no"--}}
                                                    {{--                                                       class="col-sm-4 col-form-label">--}}
                                                    {{--                                                    Subsequent Case No. </label>--}}
                                                    {{--                                                <div class="col-sm-8">--}}
                                                    {{--                                                    <input type="text" class="form-control"--}}
                                                    {{--                                                           id="appeal_subsequent_case_no"--}}
                                                    {{--                                                           name="appeal_subsequent_case_no"--}}
                                                    {{--                                                           value="{{old('appeal_subsequent_case_no')}}">--}}
                                                    {{--                                                    @error('appeal_subsequent_case_no')<span--}}
                                                    {{--                                                        class="text-danger">{{$message}}</span>@enderror--}}
                                                    {{--                                                </div>--}}
                                                    {{--                                            </div>--}}
                                                    {{--                                            <div class="form-group row">--}}
                                                    {{--                                                <label for="appeal_date_of_judgement_order"--}}
                                                    {{--                                                       class="col-sm-4 col-form-label">--}}
                                                    {{--                                                    Date of Judgement & Order </label>--}}
                                                    {{--                                                <div class="col-sm-8">--}}
                                                    {{--                                                    <input type="date" class="form-control"--}}
                                                    {{--                                                           id="appeal_date_of_judgement_order"--}}
                                                    {{--                                                           name="appeal_date_of_judgement_order"--}}
                                                    {{--                                                           value="{{old('appeal_date_of_judgement_order')}}">--}}
                                                    {{--                                                    @error('appeal_date_of_judgement_order')<span--}}
                                                    {{--                                                        class="text-danger">{{$message}}</span>@enderror--}}
                                                    {{--                                                </div>--}}
                                                    {{--                                            </div>--}}
                                                    {{--                                            <div class="form-group row">--}}
                                                    {{--                                                <label for="appeal_summary_of_judgement_order"--}}
                                                    {{--                                                       class="col-sm-4 col-form-label">--}}
                                                    {{--                                                    Summary of Judgement & Order </label>--}}
                                                    {{--                                                <div class="col-sm-8">--}}
                                                    {{--                                                                <textarea name="appeal_summary_of_judgement_order"--}}
                                                    {{--                                                                          class="form-control" rows="3"--}}
                                                    {{--                                                                          placeholder="">{{old('appeal_summary_of_judgement_order')}}</textarea>--}}
                                                    {{--                                                    @error('appeal_summary_of_judgement_order')<span--}}
                                                    {{--                                                        class="text-danger">{{$message}}</span>@enderror--}}
                                                    {{--                                                </div>--}}
                                                    {{--                                            </div>--}}
                                                    {{--                                            <div class="form-group row">--}}
                                                    {{--                                                <label for="appeal_case_category_id"--}}
                                                    {{--                                                       class="col-sm-4 col-form-label">Appeal Case--}}
                                                    {{--                                                    Category</label>--}}
                                                    {{--                                                <div class="col-sm-8">--}}
                                                    {{--                                                    <select name="appeal_case_category_id"--}}
                                                    {{--                                                            class="form-control select2"--}}
                                                    {{--                                                            id="appeal_case_category_id"--}}
                                                    {{--                                                            action="{{ route('find-case-subcategory') }}">--}}
                                                    {{--                                                        <option value="">Select</option>--}}
                                                    {{--                                                        @foreach ($case_category as $item)--}}
                                                    {{--                                                            <option--}}
                                                    {{--                                                                value="{{ $item->id }}" {{(old('appeal_case_category_id') == $item->id ? 'selected':'')}}>{{ ucfirst($item->case_category) }}</option>--}}
                                                    {{--                                                        @endforeach--}}
                                                    {{--                                                    </select>--}}
                                                    {{--                                                    @error('appeal_case_category_id')<span--}}
                                                    {{--                                                        class="text-danger">{{$message}}</span>@enderror--}}
                                                    {{--                                                </div>--}}
                                                    {{--                                            </div>--}}
                                                    {{--                                            <div class="form-group row">--}}
                                                    {{--                                                <label for="appeal_case_subcategory_id"--}}
                                                    {{--                                                       class="col-sm-4 col-form-label">Appeal Case--}}
                                                    {{--                                                    Subcategory</label>--}}
                                                    {{--                                                <div class="col-sm-8">--}}
                                                    {{--                                                    <select name="appeal_case_subcategory_id"--}}
                                                    {{--                                                            class="form-control select2"--}}
                                                    {{--                                                            id="appeal_case_subcategory_id">--}}
                                                    {{--                                                        <option value="">Select</option>--}}

                                                    {{--                                                    </select>--}}
                                                    {{--                                                    @error('appeal_case_subcategory_id')<span--}}
                                                    {{--                                                        class="text-danger">{{$message}}</span>@enderror--}}
                                                    {{--                                                </div>--}}
                                                    {{--                                            </div>--}}
                                                    {{--                                            <div class="form-group row">--}}
                                                    {{--                                                <label for="appeal_case_type_id"--}}
                                                    {{--                                                       class="col-sm-4 col-form-label">Appeal Case--}}
                                                    {{--                                                    Type</label>--}}
                                                    {{--                                                <div class="col-sm-8">--}}
                                                    {{--                                                    <select name="appeal_case_type_id"--}}
                                                    {{--                                                            class="form-control select2"--}}
                                                    {{--                                                            id="appeal_case_type_id"--}}
                                                    {{--                                                            action="{{ route('find-thana') }}">--}}
                                                    {{--                                                        <option value=""> Select</option>--}}
                                                    {{--                                                        @foreach($case_types as $item)--}}
                                                    {{--                                                            <option--}}
                                                    {{--                                                                value="{{ $item->id }}" {{(old('case_type_id') == $item->id ? 'selected':'')}}>{{ $item->case_types_name }}</option>--}}
                                                    {{--                                                        @endforeach--}}
                                                    {{--                                                    </select>--}}
                                                    {{--                                                    @error('appeal_case_type_id')<span--}}
                                                    {{--                                                        class="text-danger">{{$message}}</span>@enderror--}}
                                                    {{--                                                </div>--}}
                                                    {{--                                            </div>--}}
                                                    {{--                                            <div class="form-group row">--}}
                                                    {{--                                                <label for="appeal_case_no"--}}
                                                    {{--                                                       class="col-sm-4 col-form-label">--}}
                                                    {{--                                                    Appeal Case No. </label>--}}
                                                    {{--                                                <div class="col-sm-8">--}}
                                                    {{--                                                    <input type="text" class="form-control"--}}
                                                    {{--                                                           id="appeal_case_no"--}}
                                                    {{--                                                           name="appeal_case_no"--}}
                                                    {{--                                                           value="{{old('appeal_case_no')}}">--}}
                                                    {{--                                                    @error('appeal_case_no')<span--}}
                                                    {{--                                                        class="text-danger">{{$message}}</span>@enderror--}}
                                                    {{--                                                </div>--}}
                                                    {{--                                            </div>--}}
                                                    {{--                                            <div class="form-group row">--}}
                                                    {{--                                                <label for="appellate_filing_court"--}}
                                                    {{--                                                       class="col-sm-4 col-form-label">--}}
                                                    {{--                                                    Name of the filing Court </label>--}}
                                                    {{--                                                <div class="col-sm-8">--}}
                                                    {{--                                                    <textarea name="appellate_filing_court" class="form-control"--}}
                                                    {{--                                                              rows="3"--}}
                                                    {{--                                                              placeholder="">{{old('appellate_filing_court')}}</textarea>--}}
                                                    {{--                                                    @error('appellate_filing_court')<span--}}
                                                    {{--                                                        class="text-danger">{{$message}}</span>@enderror--}}
                                                    {{--                                                </div>--}}
                                                    {{--                                            </div>--}}
                                                    {{--                                            <div class="form-group row">--}}
                                                    {{--                                                <label for="appeal_date_of_filing"--}}
                                                    {{--                                                       class="col-sm-4 col-form-label">--}}
                                                    {{--                                                    Date of filing </label>--}}
                                                    {{--                                                <div class="col-sm-8">--}}
                                                    {{--                                                    <input type="date" class="form-control"--}}
                                                    {{--                                                           id="appeal_date_of_filing"--}}
                                                    {{--                                                           name="appeal_date_of_filing"--}}
                                                    {{--                                                           value="{{old('appeal_date_of_filing')}}">--}}
                                                    {{--                                                    @error('appeal_date_of_filing')<span--}}
                                                    {{--                                                        class="text-danger">{{$message}}</span>@enderror--}}
                                                    {{--                                                </div>--}}
                                                    {{--                                            </div>--}}
                                                    {{--                                            <div class="form-group row">--}}
                                                    {{--                                                <label for="appeal_law" class="col-sm-4 col-form-label">--}}
                                                    {{--                                                    Law </label>--}}
                                                    {{--                                                <div class="col-sm-8">--}}
                                                    {{--                                                    <input type="text" class="form-control" id="appeal_law"--}}
                                                    {{--                                                           name="appeal_law" value="{{old('appeal_law')}}">--}}
                                                    {{--                                                    @error('appeal_law')<span--}}
                                                    {{--                                                        class="text-danger">{{$message}}</span>@enderror--}}
                                                    {{--                                                </div>--}}
                                                    {{--                                            </div>--}}
                                                    {{--                                            <div class="form-group row">--}}
                                                    {{--                                                <label for="appeal_section" class="col-sm-4 col-form-label">--}}
                                                    {{--                                                    Section </label>--}}
                                                    {{--                                                <div class="col-sm-8">--}}
                                                    {{--                                                    <input type="text" class="form-control"--}}
                                                    {{--                                                           id="appeal_section"--}}
                                                    {{--                                                           name="appeal_section"--}}
                                                    {{--                                                           value="{{old('appeal_section')}}">--}}
                                                    {{--                                                    @error('appeal_section')<span--}}
                                                    {{--                                                        class="text-danger">{{$message}}</span>@enderror--}}
                                                    {{--                                                </div>--}}
                                                    {{--                                            </div>--}}
                                                    {{--                                            <div class="form-group row">--}}
                                                    {{--                                                <label for="appeal_allegation_claim"--}}
                                                    {{--                                                       class="col-sm-4 col-form-label">--}}
                                                    {{--                                                    Allegation/Claim </label>--}}
                                                    {{--                                                <div class="col-sm-8">--}}
                                                    {{--                                                    <textarea name="appeal_allegation_claim" class="form-control"--}}
                                                    {{--                                                              rows="3"--}}
                                                    {{--                                                              placeholder="">{{old('appeal_allegation_claim')}}</textarea>--}}
                                                    {{--                                                    @error('appeal_allegation_claim')<span--}}
                                                    {{--                                                        class="text-danger">{{$message}}</span>@enderror--}}
                                                    {{--                                                </div>--}}
                                                    {{--                                            </div>--}}
                                                    {{--                                            <div class="form-group row">--}}
                                                    {{--                                                <label for="appeal_amount_of_money"--}}
                                                    {{--                                                       class="col-sm-4 col-form-label">--}}
                                                    {{--                                                    Amount of Money </label>--}}
                                                    {{--                                                <div class="col-sm-8">--}}
                                                    {{--                                                    <input type="text" class="form-control"--}}
                                                    {{--                                                           id="appeal_amount_of_money"--}}
                                                    {{--                                                           name="appeal_amount_of_money"--}}
                                                    {{--                                                           value="{{old('appeal_amount_of_money')}}">--}}
                                                    {{--                                                    @error('appeal_amount_of_money')<span--}}
                                                    {{--                                                        class="text-danger">{{$message}}</span>@enderror--}}
                                                    {{--                                                </div>--}}
                                                    {{--                                            </div>--}}
                                                    {{--                                            <div class="form-group row">--}}
                                                    {{--                                                <label for="appeal_another_claim"--}}
                                                    {{--                                                       class="col-sm-4 col-form-label">--}}
                                                    {{--                                                    Another Claim (if any) </label>--}}
                                                    {{--                                                <div class="col-sm-8">--}}
                                                    {{--                                                    <textarea name="appeal_another_claim" class="form-control" rows="3"--}}
                                                    {{--                                                              placeholder="">{{old('appeal_another_claim')}}</textarea>--}}
                                                    {{--                                                    @error('appeal_another_claim')<span--}}
                                                    {{--                                                        class="text-danger">{{$message}}</span>@enderror--}}
                                                    {{--                                                </div>--}}
                                                    {{--                                            </div>--}}
                                                    {{--                                            <div class="form-group row">--}}
                                                    {{--                                                <label for="appeal_summary_facts"--}}
                                                    {{--                                                       class="col-sm-4 col-form-label">--}}
                                                    {{--                                                    Summary of Facts </label>--}}
                                                    {{--                                                <div class="col-sm-8">--}}
                                                    {{--                                                    <textarea name="appeal_summary_facts" class="form-control" rows="3"--}}
                                                    {{--                                                              placeholder="">{{old('appeal_summary_facts')}}</textarea>--}}
                                                    {{--                                                    @error('appeal_summary_facts')<span--}}
                                                    {{--                                                        class="text-danger">{{$message}}</span>@enderror--}}
                                                    {{--                                                </div>--}}
                                                    {{--                                            </div>--}}
                                                    {{--                                            <div class="form-group row">--}}
                                                    {{--                                                <label for="appeal_name_of_the_appellant"--}}
                                                    {{--                                                       class="col-sm-4 col-form-label">--}}
                                                    {{--                                                    Name of the Appellant </label>--}}
                                                    {{--                                                <div class="col-sm-8">--}}
                                                    {{--                                                    <input type="text" class="form-control"--}}
                                                    {{--                                                           id="appeal_name_of_the_appellant"--}}
                                                    {{--                                                           name="appeal_name_of_the_appellant"--}}
                                                    {{--                                                           value="{{old('appeal_name_of_the_appellant')}}">--}}
                                                    {{--                                                    @error('appeal_name_of_the_appellant')<span--}}
                                                    {{--                                                        class="text-danger">{{$message}}</span>@enderror--}}
                                                    {{--                                                </div>--}}
                                                    {{--                                            </div>--}}
                                                    {{--                                            <div class="form-group row">--}}
                                                    {{--                                                <label for="appeal_representative"--}}
                                                    {{--                                                       class="col-sm-4 col-form-label">--}}
                                                    {{--                                                    Name of the Representative </label>--}}
                                                    {{--                                                <div class="col-sm-8">--}}
                                                    {{--                                                    <input type="text" class="form-control"--}}
                                                    {{--                                                           id="appeal_representative"--}}
                                                    {{--                                                           name="appeal_representative"--}}
                                                    {{--                                                           value="{{old('appeal_representative')}}">--}}
                                                    {{--                                                    @error('appeal_representative')<span--}}
                                                    {{--                                                        class="text-danger">{{$message}}</span>@enderror--}}
                                                    {{--                                                </div>--}}
                                                    {{--                                            </div>--}}
                                                    {{--                                            <div class="form-group row">--}}
                                                    {{--                                                <label for="appeal_representative_details"--}}
                                                    {{--                                                       class="col-sm-4 col-form-label">--}}
                                                    {{--                                                    Details of the Representative </label>--}}
                                                    {{--                                                <div class="col-sm-8">--}}
                                                    {{--                                                    <textarea name="appeal_representative_details" class="form-control"--}}
                                                    {{--                                                              rows="3"--}}
                                                    {{--                                                              placeholder="">{{old('appeal_representative_details')}}</textarea>--}}
                                                    {{--                                                    @error('appeal_representative_details')<span--}}
                                                    {{--                                                        class="text-danger">{{$message}}</span>@enderror--}}
                                                    {{--                                                </div>--}}
                                                    {{--                                            </div>--}}
                                                    {{--                                            <div class="form-group row">--}}
                                                    {{--                                                <label for="appeal_respondent_opposite_party"--}}
                                                    {{--                                                       class="col-sm-4 col-form-label">--}}
                                                    {{--                                                    Name of the Respondent/Opposite Party </label>--}}
                                                    {{--                                                <div class="col-sm-8">--}}
                                                    {{--                                                    <input type="text" class="form-control"--}}
                                                    {{--                                                           id="appeal_respondent_opposite_party"--}}
                                                    {{--                                                           name="appeal_respondent_opposite_party"--}}
                                                    {{--                                                           value="{{old('appeal_respondent_opposite_party')}}">--}}
                                                    {{--                                                    @error('appeal_respondent_opposite_party')<span--}}
                                                    {{--                                                        class="text-danger">{{$message}}</span>@enderror--}}
                                                    {{--                                                </div>--}}
                                                    {{--                                            </div>--}}
                                                    {{--                                            <div class="form-group row">--}}
                                                    {{--                                                <label for="appeal_opposite_representative"--}}
                                                    {{--                                                       class="col-sm-4 col-form-label">--}}
                                                    {{--                                                    Name of the Representative </label>--}}
                                                    {{--                                                <div class="col-sm-8">--}}
                                                    {{--                                                    <input type="text" class="form-control"--}}
                                                    {{--                                                           id="appeal_opposite_representative"--}}
                                                    {{--                                                           name="appeal_opposite_representative"--}}
                                                    {{--                                                           value="{{old('appeal_opposite_representative')}}">--}}
                                                    {{--                                                    @error('appeal_opposite_representative')<span--}}
                                                    {{--                                                        class="text-danger">{{$message}}</span>@enderror--}}
                                                    {{--                                                </div>--}}
                                                    {{--                                            </div>--}}
                                                    {{--                                            <div class="form-group row">--}}
                                                    {{--                                                <label for="appeal_opposite_representative_details"--}}
                                                    {{--                                                       class="col-sm-4 col-form-label">--}}
                                                    {{--                                                    Details of the Representative </label>--}}
                                                    {{--                                                <div class="col-sm-8">--}}
                                                    {{--                                                    <textarea name="appeal_opposite_representative_details"--}}
                                                    {{--                                                              class="form-control" rows="3"--}}
                                                    {{--                                                              placeholder="">{{old('appeal_opposite_representative_details')}}</textarea>--}}
                                                    {{--                                                    @error('appeal_opposite_representative_details')<span--}}
                                                    {{--                                                        class="text-danger">{{$message}}</span>@enderror--}}
                                                    {{--                                                </div>--}}
                                                    {{--                                            </div>--}}
                                                    {{--                                        </div>--}}
                                                    {{--                                    </div>--}}
                                                    {{--                                </div>--}}
                                                    {{--                            </div>--}}
                                                    {{--                            <div class="col-md-6">--}}
                                                    {{--                                <div class="revision_case_info" style="display: none;">--}}
                                                    {{--                                    <div class="card">--}}
                                                    {{--                                        <div class="card-body">--}}
                                                    {{--                                            <h6 class="text-uppercase text-bold"><u> Case Information</u>--}}
                                                    {{--                                            </h6>--}}
                                                    {{--                                            <div class="form-group row">--}}
                                                    {{--                                                <label for="revision_original_case_no"--}}
                                                    {{--                                                       class="col-sm-4 col-form-label">Original Case--}}
                                                    {{--                                                    No.</label>--}}
                                                    {{--                                                <div class="col-sm-8">--}}
                                                    {{--                                                    <input type="text" class="form-control"--}}
                                                    {{--                                                           id="revision_original_case_no"--}}
                                                    {{--                                                           name="revision_original_case_no"--}}
                                                    {{--                                                           value="{{old('revision_original_case_no')}}">--}}
                                                    {{--                                                    @error('revision_original_case_no')<span--}}
                                                    {{--                                                        class="text-danger">{{$message}}</span>@enderror--}}
                                                    {{--                                                </div>--}}
                                                    {{--                                            </div>--}}
                                                    {{--                                            <div class="form-group row">--}}
                                                    {{--                                                <label for="revision_subsequent_case_no"--}}
                                                    {{--                                                       class="col-sm-4 col-form-label">--}}
                                                    {{--                                                    Subsequent Case No. </label>--}}
                                                    {{--                                                <div class="col-sm-8">--}}
                                                    {{--                                                    <input type="text" class="form-control"--}}
                                                    {{--                                                           id="revision_subsequent_case_no"--}}
                                                    {{--                                                           name="revision_subsequent_case_no"--}}
                                                    {{--                                                           value="{{old('revision_subsequent_case_no')}}">--}}
                                                    {{--                                                    @error('revision_subsequent_case_no')<span--}}
                                                    {{--                                                        class="text-danger">{{$message}}</span>@enderror--}}
                                                    {{--                                                </div>--}}
                                                    {{--                                            </div>--}}
                                                    {{--                                            <div class="form-group row">--}}
                                                    {{--                                                <label for="revision_date_of_judgement_order"--}}
                                                    {{--                                                       class="col-sm-4 col-form-label">--}}
                                                    {{--                                                    Date of Judgement & Order </label>--}}
                                                    {{--                                                <div class="col-sm-8">--}}
                                                    {{--                                                    <input type="date" class="form-control"--}}
                                                    {{--                                                           id="revision_date_of_judgement_order"--}}
                                                    {{--                                                           name="revision_date_of_judgement_order"--}}
                                                    {{--                                                           value="{{old('revision_date_of_judgement_order')}}">--}}
                                                    {{--                                                    @error('revision_date_of_judgement_order')<span--}}
                                                    {{--                                                        class="text-danger">{{$message}}</span>@enderror--}}
                                                    {{--                                                </div>--}}
                                                    {{--                                            </div>--}}
                                                    {{--                                            <div class="form-group row">--}}
                                                    {{--                                                <label for="revision_summary_of_judgement_order"--}}
                                                    {{--                                                       class="col-sm-4 col-form-label">--}}
                                                    {{--                                                    Summary of Judgement & Order </label>--}}
                                                    {{--                                                <div class="col-sm-8">--}}
                                                    {{--                                                                <textarea name="revision_summary_of_judgement_order"--}}
                                                    {{--                                                                          class="form-control" rows="3"--}}
                                                    {{--                                                                          placeholder="">{{old('revision_summary_of_judgement_order')}}</textarea>--}}
                                                    {{--                                                    @error('revision_summary_of_judgement_order')<span--}}
                                                    {{--                                                        class="text-danger">{{$message}}</span>@enderror--}}
                                                    {{--                                                </div>--}}
                                                    {{--                                            </div>--}}
                                                    {{--                                            <div class="form-group row">--}}
                                                    {{--                                                <label for="revision_appeal_case_category_id"--}}
                                                    {{--                                                       class="col-sm-4 col-form-label">Revision Case--}}
                                                    {{--                                                    Category</label>--}}
                                                    {{--                                                <div class="col-sm-8">--}}
                                                    {{--                                                    <select name="revision_appeal_case_category_id"--}}
                                                    {{--                                                            class="form-control select2"--}}
                                                    {{--                                                            id="revision_appeal_case_category_id"--}}
                                                    {{--                                                            action="{{ route('find-case-subcategory') }}">--}}
                                                    {{--                                                        <option value="">Select</option>--}}
                                                    {{--                                                        @foreach ($case_category as $item)--}}
                                                    {{--                                                            <option--}}
                                                    {{--                                                                value="{{ $item->id }}" {{(old('revision_appeal_case_category_id') == $item->id ? 'selected':'')}}>{{ ucfirst($item->case_category) }}</option>--}}
                                                    {{--                                                        @endforeach--}}
                                                    {{--                                                    </select>--}}
                                                    {{--                                                    @error('revision_appeal_case_category_id')<span--}}
                                                    {{--                                                        class="text-danger">{{$message}}</span>@enderror--}}
                                                    {{--                                                </div>--}}
                                                    {{--                                            </div>--}}
                                                    {{--                                            <div class="form-group row">--}}
                                                    {{--                                                <label for="revision_case_subcategory_id"--}}
                                                    {{--                                                       class="col-sm-4 col-form-label">Revision Case--}}
                                                    {{--                                                    Subcategory</label>--}}
                                                    {{--                                                <div class="col-sm-8">--}}
                                                    {{--                                                    <select name="revision_case_subcategory_id"--}}
                                                    {{--                                                            class="form-control select2"--}}
                                                    {{--                                                            id="revision_case_subcategory_id">--}}
                                                    {{--                                                        <option value="">Select</option>--}}

                                                    {{--                                                    </select>--}}
                                                    {{--                                                    @error('revision_case_subcategory_id')<span--}}
                                                    {{--                                                        class="text-danger">{{$message}}</span>@enderror--}}
                                                    {{--                                                </div>--}}
                                                    {{--                                            </div>--}}
                                                    {{--                                            <div class="form-group row">--}}
                                                    {{--                                                <label for="revision_case_type_id"--}}
                                                    {{--                                                       class="col-sm-4 col-form-label">Revision Case--}}
                                                    {{--                                                    Type</label>--}}
                                                    {{--                                                <div class="col-sm-8">--}}
                                                    {{--                                                    <select name="revision_case_type_id"--}}
                                                    {{--                                                            class="form-control select2"--}}
                                                    {{--                                                            id="revision_case_type_id"--}}
                                                    {{--                                                            action="{{ route('find-thana') }}">--}}
                                                    {{--                                                        <option value=""> Select</option>--}}
                                                    {{--                                                        @foreach($case_types as $item)--}}
                                                    {{--                                                            <option--}}
                                                    {{--                                                                value="{{ $item->id }}" {{(old('case_type_id') == $item->id ? 'selected':'')}}>{{ $item->case_types_name }}</option>--}}
                                                    {{--                                                        @endforeach--}}
                                                    {{--                                                    </select>--}}
                                                    {{--                                                    @error('revision_case_type_id')<span--}}
                                                    {{--                                                        class="text-danger">{{$message}}</span>@enderror--}}
                                                    {{--                                                </div>--}}
                                                    {{--                                            </div>--}}
                                                    {{--                                            <div class="form-group row">--}}
                                                    {{--                                                <label for="revision_case_no"--}}
                                                    {{--                                                       class="col-sm-4 col-form-label">--}}
                                                    {{--                                                    Revision Case No. </label>--}}
                                                    {{--                                                <div class="col-sm-8">--}}
                                                    {{--                                                    <input type="text" class="form-control"--}}
                                                    {{--                                                           id="revision_case_no"--}}
                                                    {{--                                                           name="revision_case_no"--}}
                                                    {{--                                                           value="{{old('revision_case_no')}}">--}}
                                                    {{--                                                    @error('revision_case_no')<span--}}
                                                    {{--                                                        class="text-danger">{{$message}}</span>@enderror--}}
                                                    {{--                                                </div>--}}
                                                    {{--                                            </div>--}}
                                                    {{--                                            <div class="form-group row">--}}
                                                    {{--                                                <label for="revision_filing_court"--}}
                                                    {{--                                                       class="col-sm-4 col-form-label">--}}
                                                    {{--                                                    Name of the filing Court </label>--}}
                                                    {{--                                                <div class="col-sm-8">--}}
                                                    {{--                                                    <textarea name="revision_filing_court" class="form-control"--}}
                                                    {{--                                                              rows="3"--}}
                                                    {{--                                                              placeholder="">{{old('revision_filing_court')}}</textarea>--}}
                                                    {{--                                                    @error('revision_filing_court')<span--}}
                                                    {{--                                                        class="text-danger">{{$message}}</span>@enderror--}}
                                                    {{--                                                </div>--}}
                                                    {{--                                            </div>--}}
                                                    {{--                                            <div class="form-group row">--}}
                                                    {{--                                                <label for="revision_date_of_filing"--}}
                                                    {{--                                                       class="col-sm-4 col-form-label">--}}
                                                    {{--                                                    Date of filing </label>--}}
                                                    {{--                                                <div class="col-sm-8">--}}
                                                    {{--                                                    <input type="date" class="form-control"--}}
                                                    {{--                                                           id="revision_date_of_filing"--}}
                                                    {{--                                                           name="revision_date_of_filing"--}}
                                                    {{--                                                           value="{{old('revision_date_of_filing')}}">--}}
                                                    {{--                                                    @error('revision_date_of_filing')<span--}}
                                                    {{--                                                        class="text-danger">{{$message}}</span>@enderror--}}
                                                    {{--                                                </div>--}}
                                                    {{--                                            </div>--}}
                                                    {{--                                            <div class="form-group row">--}}
                                                    {{--                                                <label for="revision_law" class="col-sm-4 col-form-label">--}}
                                                    {{--                                                    Law </label>--}}
                                                    {{--                                                <div class="col-sm-8">--}}
                                                    {{--                                                    <input type="text" class="form-control" id="revision_law"--}}
                                                    {{--                                                           name="revision_law" value="{{old('revision_law')}}">--}}
                                                    {{--                                                    @error('revision_law')<span--}}
                                                    {{--                                                        class="text-danger">{{$message}}</span>@enderror--}}
                                                    {{--                                                </div>--}}
                                                    {{--                                            </div>--}}
                                                    {{--                                            <div class="form-group row">--}}
                                                    {{--                                                <label for="revision_section" class="col-sm-4 col-form-label">--}}
                                                    {{--                                                    Section </label>--}}
                                                    {{--                                                <div class="col-sm-8">--}}
                                                    {{--                                                    <input type="text" class="form-control"--}}
                                                    {{--                                                           id="revision_section"--}}
                                                    {{--                                                           name="revision_section"--}}
                                                    {{--                                                           value="{{old('revision_section')}}">--}}
                                                    {{--                                                    @error('revision_section')<span--}}
                                                    {{--                                                        class="text-danger">{{$message}}</span>@enderror--}}
                                                    {{--                                                </div>--}}
                                                    {{--                                            </div>--}}
                                                    {{--                                            <div class="form-group row">--}}
                                                    {{--                                                <label for="revision_allegation_claim"--}}
                                                    {{--                                                       class="col-sm-4 col-form-label">--}}
                                                    {{--                                                    Allegation/Claim </label>--}}
                                                    {{--                                                <div class="col-sm-8">--}}
                                                    {{--                                                    <textarea name="revision_allegation_claim" class="form-control"--}}
                                                    {{--                                                              rows="3"--}}
                                                    {{--                                                              placeholder="">{{old('revision_allegation_claim')}}</textarea>--}}
                                                    {{--                                                    @error('revision_allegation_claim')<span--}}
                                                    {{--                                                        class="text-danger">{{$message}}</span>@enderror--}}
                                                    {{--                                                </div>--}}
                                                    {{--                                            </div>--}}
                                                    {{--                                            <div class="form-group row">--}}
                                                    {{--                                                <label for="revision_amount_of_money"--}}
                                                    {{--                                                       class="col-sm-4 col-form-label">--}}
                                                    {{--                                                    Amount of Money </label>--}}
                                                    {{--                                                <div class="col-sm-8">--}}
                                                    {{--                                                    <input type="text" class="form-control"--}}
                                                    {{--                                                           id="revision_amount_of_money"--}}
                                                    {{--                                                           name="revision_amount_of_money"--}}
                                                    {{--                                                           value="{{old('revision_amount_of_money')}}">--}}
                                                    {{--                                                    @error('revision_amount_of_money')<span--}}
                                                    {{--                                                        class="text-danger">{{$message}}</span>@enderror--}}
                                                    {{--                                                </div>--}}
                                                    {{--                                            </div>--}}
                                                    {{--                                            <div class="form-group row">--}}
                                                    {{--                                                <label for="revision_another_claim"--}}
                                                    {{--                                                       class="col-sm-4 col-form-label">--}}
                                                    {{--                                                    Another Claim (if any) </label>--}}
                                                    {{--                                                <div class="col-sm-8">--}}
                                                    {{--                                                    <textarea name="revision_another_claim" class="form-control" rows="3"--}}
                                                    {{--                                                              placeholder="">{{old('revision_another_claim')}}</textarea>--}}
                                                    {{--                                                    @error('revision_another_claim')<span--}}
                                                    {{--                                                        class="text-danger">{{$message}}</span>@enderror--}}
                                                    {{--                                                </div>--}}
                                                    {{--                                            </div>--}}
                                                    {{--                                            <div class="form-group row">--}}
                                                    {{--                                                <label for="revision_summary_facts"--}}
                                                    {{--                                                       class="col-sm-4 col-form-label">--}}
                                                    {{--                                                    Summary of Facts </label>--}}
                                                    {{--                                                <div class="col-sm-8">--}}
                                                    {{--                                                    <textarea name="revision_summary_facts" class="form-control" rows="3"--}}
                                                    {{--                                                              placeholder="">{{old('revision_summary_facts')}}</textarea>--}}
                                                    {{--                                                    @error('revision_summary_facts')<span--}}
                                                    {{--                                                        class="text-danger">{{$message}}</span>@enderror--}}
                                                    {{--                                                </div>--}}
                                                    {{--                                            </div>--}}
                                                    {{--                                            <div class="form-group row">--}}
                                                    {{--                                                <label for="revision_name_of_the_appellant"--}}
                                                    {{--                                                       class="col-sm-4 col-form-label">--}}
                                                    {{--                                                    Name of the Petitioner </label>--}}
                                                    {{--                                                <div class="col-sm-8">--}}
                                                    {{--                                                    <input type="text" class="form-control"--}}
                                                    {{--                                                           id="revision_name_of_the_appellant"--}}
                                                    {{--                                                           name="revision_name_of_the_appellant"--}}
                                                    {{--                                                           value="{{old('revision_name_of_the_appellant')}}">--}}
                                                    {{--                                                    @error('revision_name_of_the_appellant')<span--}}
                                                    {{--                                                        class="text-danger">{{$message}}</span>@enderror--}}
                                                    {{--                                                </div>--}}
                                                    {{--                                            </div>--}}
                                                    {{--                                            <div class="form-group row">--}}
                                                    {{--                                                <label for="revision_representative"--}}
                                                    {{--                                                       class="col-sm-4 col-form-label">--}}
                                                    {{--                                                    Name of the Representative </label>--}}
                                                    {{--                                                <div class="col-sm-8">--}}
                                                    {{--                                                    <input type="text" class="form-control"--}}
                                                    {{--                                                           id="revision_representative"--}}
                                                    {{--                                                           name="revision_representative"--}}
                                                    {{--                                                           value="{{old('revision_representative')}}">--}}
                                                    {{--                                                    @error('revision_representative')<span--}}
                                                    {{--                                                        class="text-danger">{{$message}}</span>@enderror--}}
                                                    {{--                                                </div>--}}
                                                    {{--                                            </div>--}}
                                                    {{--                                            <div class="form-group row">--}}
                                                    {{--                                                <label for="revision_representative_details"--}}
                                                    {{--                                                       class="col-sm-4 col-form-label">--}}
                                                    {{--                                                    Details of the Representative </label>--}}
                                                    {{--                                                <div class="col-sm-8">--}}
                                                    {{--                                                    <textarea name="revision_representative_details" class="form-control"--}}
                                                    {{--                                                              rows="3"--}}
                                                    {{--                                                              placeholder="">{{old('revision_representative_details')}}</textarea>--}}
                                                    {{--                                                    @error('revision_representative_details')<span--}}
                                                    {{--                                                        class="text-danger">{{$message}}</span>@enderror--}}
                                                    {{--                                                </div>--}}
                                                    {{--                                            </div>--}}
                                                    {{--                                            <div class="form-group row">--}}
                                                    {{--                                                <label for="revision_respondent_opposite_party"--}}
                                                    {{--                                                       class="col-sm-4 col-form-label">--}}
                                                    {{--                                                    Name of the Respondent/Opposite Party </label>--}}
                                                    {{--                                                <div class="col-sm-8">--}}
                                                    {{--                                                    <input type="text" class="form-control"--}}
                                                    {{--                                                           id="revision_respondent_opposite_party"--}}
                                                    {{--                                                           name="revision_respondent_opposite_party"--}}
                                                    {{--                                                           value="{{old('revision_respondent_opposite_party')}}">--}}
                                                    {{--                                                    @error('revision_respondent_opposite_party')<span--}}
                                                    {{--                                                        class="text-danger">{{$message}}</span>@enderror--}}
                                                    {{--                                                </div>--}}
                                                    {{--                                            </div>--}}
                                                    {{--                                            <div class="form-group row">--}}
                                                    {{--                                                <label for="revision_opposite_representative"--}}
                                                    {{--                                                       class="col-sm-4 col-form-label">--}}
                                                    {{--                                                    Name of the Representative </label>--}}
                                                    {{--                                                <div class="col-sm-8">--}}
                                                    {{--                                                    <input type="text" class="form-control"--}}
                                                    {{--                                                           id="revision_opposite_representative"--}}
                                                    {{--                                                           name="revision_opposite_representative"--}}
                                                    {{--                                                           value="{{old('revision_opposite_representative')}}">--}}
                                                    {{--                                                    @error('revision_opposite_representative')<span--}}
                                                    {{--                                                        class="text-danger">{{$message}}</span>@enderror--}}
                                                    {{--                                                </div>--}}
                                                    {{--                                            </div>--}}
                                                    {{--                                            <div class="form-group row">--}}
                                                    {{--                                                <label for="revision_opposite_representative_details"--}}
                                                    {{--                                                       class="col-sm-4 col-form-label">--}}
                                                    {{--                                                    Details of the Representative </label>--}}
                                                    {{--                                                <div class="col-sm-8">--}}
                                                    {{--                                                    <textarea name="revision_opposite_representative_details"--}}
                                                    {{--                                                              class="form-control" rows="3"--}}
                                                    {{--                                                              placeholder="">{{old('revision_opposite_representative_details')}}</textarea>--}}
                                                    {{--                                                    @error('revision_opposite_representative_details')<span--}}
                                                    {{--                                                        class="text-danger">{{$message}}</span>@enderror--}}
                                                    {{--                                                </div>--}}
                                                    {{--                                            </div>--}}
                                                    {{--                                        </div>--}}
                                                    {{--                                    </div>--}}
                                                    {{--                                </div>--}}
                                                    {{--                            </div>--}}
                                                    {{--                        </div>--}}
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="uploaded_document"> Document Upload </label>
                                                                <div class="input-group hdtuto_files control-group increment_files">
                                                                    <input type="file" name="uploaded_document[]"
                                                                           class="myfrm form-control">
                                                                    <div class="input-group-btn">
                                                                        <button class="btn btn-success btn_success_files"
                                                                                type="button"><i
                                                                                class="fldemo glyphicon glyphicon-plus"></i>+
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <div class="clone_files hide">
                                                                    <div class="hdtuto_files control-group lst input-group"
                                                                         style="margin-top:10px">
                                                                        <input type="file" name="uploaded_document[]"
                                                                               class="myfrm form-control">
                                                                        <div class="input-group-btn">
                                                                            <button class="btn btn-danger btn_danger_files"
                                                                                    type="button"><i
                                                                                    class="fldemo glyphicon glyphicon-remove"></i> -
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="float-right mt-4">
                                                        <button type="submit" class="btn btn-primary text-uppercase"><i
                                                                class="fas fa-save"></i> Update
                                                        </button>
                                                    </div>
                                                </div>

                                            </form>

                                        </div>
                                        <div id="about" class="tab-pane">
                                            <div class="panel-body">
                                                <div class="tab-content">
                                                    <div id="home" class="tab-pane active">

                                                        <div class="card-header">
                                                            <h3 class="card-title" id="heading">Update Criminal Case
                                                                Status</h3>

                                                        </div>

                                                        <form
                                                            action="{{ route('update-criminal-cases-status', $data->id) }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="card-body">

                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group row">
                                                                            <label for="updated_case_status_id"
                                                                                   class="col-sm-4 col-form-label">Status</label>
                                                                            <div class="col-sm-8">

                                                                                <select name="updated_case_status_id"
                                                                                        class="form-control select2"
                                                                                >
                                                                                    <option value="">Select</option>
                                                                                    @foreach ($case_status as $item)
                                                                                        <option
                                                                                            value="{{ $item->id }}"
                                                                                            {{ $data->updated_case_status_id == $item->id ? 'selected' : '' }}>
                                                                                            {{ $item->case_status_name }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('updated_case_status_id')
                                                                                <span
                                                                                    class="text-danger">{{ $message }}</span>
                                                                                @enderror

                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="updated_order_date"
                                                                                   class="col-sm-4 col-form-label">
                                                                                Order Date
                                                                            </label>
                                                                            <div class="col-sm-8">
                                                                                <input type="date" class="form-control"
                                                                                       id="updated_order_date" name="updated_order_date"
                                                                                >
                                                                                @error('updated_order_date')
                                                                                <span
                                                                                    class="text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="updated_fixed_for"
                                                                                   class="col-sm-4 col-form-label"> Fixed for </label>
                                                                            <div class="col-sm-8">
                                                                                <textarea name="updated_fixed_for"
                                                                                          class="form-control" rows="3"
                                                                                          placeholder=""></textarea>
                                                                                @error('updated_fixed_for')
                                                                                <span
                                                                                    class="text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>




                                                                        <div class="form-group row">
                                                                            <label for="court_proceedings_id"
                                                                                   class="col-md-4 col-form-label"> Court Proceeding
                                                                            </label>
                                                                            <div class="col-md-8">
                                                                                <div class="row" >
                                                                                    <div class="col-md-6">
                                                                                    <select name="court_proceedings_id"
                                                                                            id="court_proceedings_id"
                                                                                            class="form-control select2">
                                                                                        <option value="">Select</option>
                                                                                        @foreach($court_proceeding as $item)
                                                                                            <option
                                                                                                value="{{ $item->id }}" {{  $data->court_proceedings_id == $item->id ? 'selected' : '' }}>{{ $item->court_proceeding_name }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                    <input type="text" class="form-control"
                                                                                           id="court_proceedings"
                                                                                           name="court_proceedings"

                                                                                           value="{{ old('court_proceedings') }}">
                                                                                    </div>
                                                                                </div>

                                                                                @error('court_proceedings')<span
                                                                                    class="text-danger">{{$message}}</span>@enderror
                                                                            </div>
                                                                        </div>




                                                                    </div>


                                                                    <div class="col-md-6">
                                                                        <div class="form-group row">
                                                                            <label for="updated_court_order_id"
                                                                                   class="col-md-4 col-form-label"> Court Order
                                                                            </label>
                                                                            <div class="col-md-8">
                                                                                <div class="row" >
                                                                                    <div class="col-md-6">
                                                                                        <select name="updated_court_order_id"
                                                                                                id="updated_court_order_id"
                                                                                                class="form-control select2">
                                                                                            <option value="">Select</option>
                                                                                            @foreach($last_court_order as $item)
                                                                                                <option
                                                                                                    value="{{ $item->id }}" {{  $data->updated_court_order_id == $item->id ? 'selected' : '' }}>{{ $item->court_last_order_name }}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <input type="text" class="form-control"
                                                                                               id="updated_court_order"
                                                                                               name="updated_court_order">
                                                                                    </div>
                                                                                </div>

                                                                                @error('updated_court_order')<span
                                                                                    class="text-danger">{{$message}}</span>@enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="updated_day_notes_id"
                                                                                   class="col-md-4 col-form-label"> Day Notes
                                                                            </label>
                                                                            <div class="col-md-8">
                                                                                <div class="row" >
                                                                                    <div class="col-md-6">
                                                                                        <select name="updated_day_notes_id"
                                                                                                id="updated_day_notes_id"
                                                                                                class="form-control select2">
                                                                                            <option value="">Select</option>
                                                                                            @foreach($day_notes as $item)
                                                                                                <option
                                                                                                    value="{{ $item->id }}" {{  old('updated_day_notes_id') == $item->id ? 'selected' : '' }}>{{ $item->day_notes_name }}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <input type="text" class="form-control"
                                                                                               id="updated_day_notes"
                                                                                               name="updated_day_notes">
                                                                                    </div>
                                                                                </div>

                                                                                @error('coordinator_tadbirkar_id')<span
                                                                                    class="text-danger">{{$message}}</span>@enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="updated_engaged_advocate_id"
                                                                                   class="col-sm-4 col-form-label">
                                                                                Engaged Advocate
                                                                            </label>
                                                                            <div class="col-sm-8">
                                                                                <select name="updated_engaged_advocate_id"
                                                                                        class="form-control select2"
                                                                                >
                                                                                    <option value="">Select</option>
                                                                                    @foreach ($external_council as $item)
                                                                                        <option
                                                                                            value="{{ $item->id }}"
                                                                                            {{ $data->updated_engaged_advocate_id == $item->id ? 'selected' : '' }}>
                                                                                            {{ $item->first_name }}
                                                                                            {{ $item->middle_name }}
                                                                                            {{ $item->last_name }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('updated_engaged_advocate_id')
                                                                                <span
                                                                                    class="text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label for="updated_next_day_presence_id"
                                                                                   class="col-sm-4 col-form-label">
                                                                                Next Day Presence</label>
                                                                            <div class="col-sm-8">
                                                                                <select name="updated_next_day_presence_id"
                                                                                        class="form-control select2">
                                                                                    <option value="">Select</option>
                                                                                    @foreach($next_day_presence as $item)
                                                                                        <option
                                                                                            value="{{ $item->id }}" {{(old('updated_next_day_presence_id') == $item->id ? 'selected':'')}}>{{ $item->next_day_presence_name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('updated_next_day_presence_id')<span
                                                                                    class="text-danger">{{$message}}</span>@enderror
                                                                            </div>
                                                                        </div>

                                                                    </div>

                                                                </div>

                                                                <div class="float-right mt-4">
                                                                    <button type="submit"
                                                                            class="btn btn-primary text-uppercase"><i
                                                                            class="fas fa-save"></i> Update
                                                                    </button>
                                                                </div>


                                                            </div>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="activities" class="tab-pane">
                                            <div class="panel-body">
                                                <div class="tab-content">
                                                    <div id="activities" class="tab-pane active">

                                                        <div class="card-header">
                                                            <h3 class="card-title" id="heading">Activities</h3>

                                                        </div>

                                                        <form
                                                            action="{{ route('update-criminal-cases-activity', $data->id) }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="card-body">

                                                                <div class="row">
                                                                    <div class="col-md-6">

                                                                        <div class="form-group row">
                                                                            <label for="activity_date"
                                                                                   class="col-sm-4 col-form-label"> Date
                                                                            </label>
                                                                            <div class="col-sm-8">
                                                                                <input type="date" class="form-control"
                                                                                       id="activity_date"
                                                                                       name="activity_date"
                                                                                       value="{{ $data->activity_date }}"
                                                                                >
                                                                                @error('activity_date')
                                                                                <span
                                                                                    class="text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="activity_action"
                                                                                   class="col-sm-4 col-form-label"> Activity Action </label>
                                                                            <div class="col-sm-8">
                                                                                <textarea name="activity_action"
                                                                                          class="form-control" rows="3"
                                                                                          placeholder=""></textarea>
                                                                                @error('activity_action')
                                                                                <span
                                                                                    class="text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="activity_progress"
                                                                                   class="col-sm-4 col-form-label">Progress</label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control"
                                                                                       id="activity_progress" name="activity_progress">
                                                                                @error('activity_progress')
                                                                                <span
                                                                                    class="text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                                    <div class="col-md-6">
                                                                        <div class="form-group row">
                                                                            <label for="activity_mode"
                                                                                   class="col-sm-4 col-form-label">
                                                                                Mode
                                                                            </label>
                                                                            <div class="col-sm-8">
                                                                                <select name="activity_mode[]"
                                                                                        class="form-control select2" multiple
                                                                                >
                                                                                    <option value="">Select</option>
                                                                                    @foreach ($mode as $item)
                                                                                        <option
                                                                                            value="{{ $item->mode_name }}"
                                                                                            {{ old('activity_mode') == $item->mode_name ? 'selected' : '' }}>
                                                                                            {{ $item->mode_name }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('activity_mode')
                                                                                <span
                                                                                    class="text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="activity_time_spent"
                                                                                   class="col-sm-4 col-form-label">Time Spent</label>
                                                                            <div class="col-sm-8">

                                                                                <input type="text" class="form-control"
                                                                                       id="activity_time_spent" name="activity_time_spent"
                                                                                >
                                                                                @error('activity_time_spent')
                                                                                <span
                                                                                    class="text-danger">{{ $message }}</span>
                                                                                @enderror

                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="activity_engaged"
                                                                                   class="col-sm-4 col-form-label">
                                                                                Engaged
                                                                            </label>
                                                                            <div class="col-sm-8">
                                                                                <select name="activity_engaged[]"
                                                                                        class="form-control select2" multiple
                                                                                >
                                                                                    <option value="">Select</option>
                                                                                    @foreach ($external_council as $item)
                                                                                        <option
                                                                                            value="{{ $item->first_name.' '.$item->middle_name.' '.$item->last_name }}"
                                                                                            {{ $data->activity_engaged == $item->id ? 'selected' : '' }}>
                                                                                            {{ $item->first_name }}
                                                                                            {{ $item->middle_name }}
                                                                                            {{ $item->last_name }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('activity_engaged')
                                                                                <span
                                                                                    class="text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="activity_forwarded_to_id"
                                                                                   class="col-sm-4 col-form-label">
                                                                                Forwarded To </label>
                                                                            <div class="col-sm-8">
                                                                                <select name="activity_forwarded_to_id"
                                                                                        class="form-control select2"
                                                                                >
                                                                                    <option value="">Select</option>
                                                                                    @foreach ($external_council as $item)
                                                                                        <option
                                                                                            value="{{ $item->id }}"
                                                                                            {{ $data->activity_forwarded_to_id == $item->id ? 'selected' : '' }}>
                                                                                            {{ $item->first_name }}
                                                                                            {{ $item->middle_name }}
                                                                                            {{ $item->last_name }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('activity_forwarded_to_id')
                                                                                <span
                                                                                    class="text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>

                                                                    </div>

                                                                </div>

                                                                <div class="float-right mt-4">
                                                                    <button type="submit"
                                                                            class="btn btn-primary text-uppercase"><i
                                                                            class="fas fa-save"></i> Save
                                                                    </button>
                                                                </div>


                                                            </div>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                            </section>

                        </div>
                    </div>


            </div>
        </section>
        <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->
@endsection
