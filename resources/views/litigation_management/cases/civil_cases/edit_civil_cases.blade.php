@extends('layouts.admin_layouts.admin_layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Civil Cases</h1>

                    </div><!-- /.col -->


                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">
                                <a class="leading-normal inline-flex items-center font-normal spark-button-focus h-8 text-md px-4 bg-transparent border-0 border-solid text-blue-700 hover:text-blue-800 active:text-blue-700 rounded-md"
                                   type="button" href="{{ route('civil-cases') }}" aria-disabled="false" role="link"
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
                <div class="col-md-12">
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
                                                <a data-toggle="tab" href="#home" class="active">Edit Civil Cases</a>
                                            </li>
                                            <li class="">
                                                <a data-toggle="tab" href="#about">Update Status</a>
                                            </li>
                                        </ul>
                                    </h3>
                                    <div class="float-right">
                                        <a href="{{ route('view-civil-cases', $data->id) }}">
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


                                            <form action="{{ route('update-civil-cases', $data->id) }}" method="post"
                                                  enctype="multipart/form-data">

                                                <!-- Default box -->
                                                <div class="card">

                                                    <div class="card-header">
                                                        <div class="text-center mr-md-5">
                                                            <div class="custom-control custom-radio custom-control-inline">
                                                                <input type="checkbox" class="custom-control-input" id="original_case"
                                                                       name="original_case" value="Appeal Case">
                                                                <label class="custom-control-label" for="original_case">Original Case</label>
                                                            </div>
                                                            <div
                                                                class="custom-control custom-radio custom-control-inline">
                                                                <input type="checkbox" class="custom-control-input"
                                                                       id="appeal_case"
                                                                       name="case" value="Appeal Case" @if($data->case == 'Appeal Case') checked @endif >
                                                                <label class="custom-control-label" for="appeal_case">Appeal
                                                                    Case</label>
                                                            </div>
                                                            <div
                                                                class="custom-control custom-radio custom-control-inline">
                                                                <input type="checkbox" class="custom-control-input"
                                                                       id="revision_case"
                                                                       name="case" value="Revision Case" @if($data->case == 'Revision Case') checked @endif>
                                                                <label class="custom-control-label" for="revision_case">Revision
                                                                    Case</label>
                                                            </div>
                                                        </div>
                                                    </div>

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
                                                                                <label for="in_favour_of" class="col-sm-4 col-form-label">In
                                                                                    favour
                                                                                    of</label>
                                                                                <div class="col-sm-8">
                                                                                    <select name="in_favour_of"
                                                                                            class="form-control select2">
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
                                                                                <label for="received_from" class="col-sm-4 col-form-label">
                                                                                    Received
                                                                                    From </label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control"
                                                                                           id="received_from"
                                                                                           name="received_from"
                                                                                           value="{{ $data->received_from }}">
                                                                                    @error('received_from')<span
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
                                                                                <label for="receiver_contact_details"
                                                                                       class="col-sm-4 col-form-label"> Receiver Contact
                                                                                    Details </label>
                                                                                <div class="col-sm-8">
                                                    <textarea name="receiver_contact_details" class="form-control"
                                                              rows="3"
                                                              placeholder="">{{ $data->receiver_contact_details }}</textarea>
                                                                                    @error('receiver_contact_details')<span
                                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="received_by" class="col-sm-4 col-form-label">
                                                                                    Received
                                                                                    By </label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control" id="received_by"
                                                                                           name="received_by"
                                                                                           value="{{ $data->received_by }}">
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
                                                                                        @foreach ($existing_client_subcategory as $item)
                                                                                            <option
                                                                                                value="{{ $item->id }}" {{( $data->client_subcategory_id == $item->id ? 'selected':'')}}>{{ ucfirst($item->client_subcategory_name) }}</option>
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
                                                                                <label for="client_division_id"
                                                                                       class="col-sm-4 col-form-label">Division</label>
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
                                                                                       class="col-sm-4 col-form-label">District</label>
                                                                                <div class="col-sm-8">
                                                                                    <select name="client_district_id"
                                                                                            class="form-control select2"
                                                                                            id="client_district_id"
                                                                                            action="{{ route('find-thana') }}">
                                                                                        <option value=""> Select</option>
                                                                                        @foreach ($existing_client_district as $item)
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
                                                                                       class="col-sm-4 col-form-label">Thana</label>
                                                                                <div class="col-sm-8">
                                                                                    <select name="client_thana_id" id="client_thana_id"
                                                                                            class="form-control select2">
                                                                                        <option value="">Select</option>
                                                                                        @foreach ($existing_client_thana as $item)
                                                                                            <option
                                                                                                value="{{ $item->id }}" {{( $data->client_thana_id == $item->id ? 'selected':'')}}>{{ ucfirst($item->thana_name) }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    @error('client_thana_id')<span
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
                                                                                <label for="required_missing_documents"
                                                                                       class="col-sm-4 col-form-label"> Required/Missing
                                                                                    Documents </label>
                                                                                <div class="col-sm-8">
                                                    <textarea name="required_missing_documents" class="form-control"
                                                              rows="3"
                                                              placeholder="">{{ $data->required_missing_documents }}</textarea>
                                                                                    @error('required_missing_documents')<span
                                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h6 class="text-uppercase text-bold"><u> Update Case Status </u>
                                                                            </h6>
                                                                            <div class="form-group row">
                                                                                <label for="update_case_status_id"
                                                                                       class="col-sm-4 col-form-label">
                                                                                    Status </label>
                                                                                <div class="col-sm-8">
                                                                                    <select name="update_case_status_id"
                                                                                            class="form-control select2">
                                                                                        <option value="">Select</option>
                                                                                        @foreach($case_status as $item)
                                                                                            <option
                                                                                                value="{{ $item->id }}" {{( $data->update_case_status_id == $item->id ? 'selected':'')}}>{{ $item->case_status_name }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    @error('update_case_status_id')<span
                                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="update_next_date"
                                                                                       class="col-sm-4 col-form-label"> Next Date </label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="date" class="form-control"
                                                                                           id="update_next_date"
                                                                                           name="update_next_date"
                                                                                           value="{{ $data->update_next_date }}">
                                                                                    @error('update_next_date')<span
                                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="update_next_date_fixed_id"
                                                                                       class="col-sm-4 col-form-label">
                                                                                    Next
                                                                                    date fixed for </label>
                                                                                <div class="col-sm-8">
                                                                                    <select name="update_next_date_fixed_id"
                                                                                            class="form-control select2">
                                                                                        <option value="">Select</option>
                                                                                        @foreach($next_date_reason as $item)
                                                                                            <option
                                                                                                value="{{ $item->id }}" {{( $data->update_next_date_fixed_id == $item->id ? 'selected':'')}}>{{ $item->next_date_reason_name }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    @error('update_next_date_fixed_id')<span
                                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="case_proceedings"
                                                                                       class="col-sm-4 col-form-label"> Case
                                                                                    Proceedings </label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="date" class="form-control"
                                                                                           id="case_proceedings"
                                                                                           name="case_proceedings"
                                                                                           value="{{ $data->case_proceedings }}">
                                                                                    @error('case_proceedings')<span
                                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="update_case_notes"
                                                                                       class="col-sm-4 col-form-label"> Case Notes </label>
                                                                                <div class="col-sm-8">
                                                                <textarea name="update_case_notes" class="form-control"
                                                                          rows="3"
                                                                          placeholder="">{{ $data->update_case_notes }}</textarea>
                                                                                    @error('update_case_notes')<span
                                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="next_day_presence_id"
                                                                                       class="col-sm-4 col-form-label">
                                                                                    Next Day Presence</label>
                                                                                <div class="col-sm-8">
                                                                                    <select name="next_day_presence_id"
                                                                                            class="form-control select2">
                                                                                        <option value="">Select</option>
                                                                                        @foreach($next_day_presence as $item)
                                                                                            <option
                                                                                                value="{{ $item->id }}" {{( $data->next_day_presence_id == $item->id ? 'selected':'')}}>{{ $item->next_day_presence_name }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    @error('next_day_presence_id')<span
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
                                                                                <label for="case_category_id"
                                                                                       class="col-sm-4 col-form-label">Case
                                                                                    Category</label>
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
                                                                                    Subcategory</label>
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
                                                                                    Cases</label>
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
                                                        <textarea name="case_infos_case_no" class="form-control"
                                                                  rows="3"
                                                                  placeholder="">{{ $data->case_infos_case_no }}</textarea>
                                                                                    @error('case_infos_case_no')<span
                                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <label for="name_of_the_court"
                                                                                       class="col-sm-4 col-form-label"> Name
                                                                                    of the filling Court </label>
                                                                                <div class="col-sm-8">
                                                        <textarea name="name_of_the_court" class="form-control" rows="3"
                                                                  placeholder="">{{ $data->name_of_the_court }}</textarea>
                                                                                    @error('name_of_the_court')<span
                                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="date_of_filing" class="col-sm-4 col-form-label">Date
                                                                                    of
                                                                                    filing</label>
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
                                                                                <label for="law" class="col-sm-4 col-form-label">
                                                                                    Law </label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control" id="law"
                                                                                           name="law" value="{{ $data->law }}">
                                                                                    @error('law')<span
                                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="section" class="col-sm-4 col-form-label">
                                                                                    Section </label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control" id="section"
                                                                                           name="section" value="{{ $data->section }}">
                                                                                    @error('section')<span
                                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                                </div>
                                                                            </div>
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
                                                                                        @foreach ($existing_case_info_district as $item)
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
                                                                                        @foreach ($existing_case_info_client_thana as $item)
                                                                                            <option
                                                                                                value="{{ $item->id }}" {{( $data->case_infos_thana_id == $item->id ? 'selected':'')}}>{{ ucfirst($item->thana_name) }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    @error('case_infos_thana_id')<span
                                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="allegation_claim"
                                                                                       class="col-sm-4 col-form-label">
                                                                                    Allegation/Claim </label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control"
                                                                                           id="allegation_claim"
                                                                                           name="allegation_claim"
                                                                                           value="{{ $data->allegation_claim }}">
                                                                                    @error('allegation_claim')<span
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
                                                                                <label for="plaintiff_name"
                                                                                       class="col-sm-4 col-form-label">Name
                                                                                    of the Plaintiff</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control"
                                                                                           id="plaintiff_name"
                                                                                           name="plaintiff_name"
                                                                                           value="{{ $data->plaintiff_name }}">
                                                                                    @error('plaintiff_name')<span
                                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="representative_name"
                                                                                       class="col-sm-4 col-form-label">
                                                                                    Name of the Representative </label>
                                                                                <div class="col-sm-8">
                                                    <textarea name="representative_name" class="form-control" rows="3"
                                                              placeholder="">{{ $data->representative_name }}</textarea>
                                                                                    @error('representative_name')<span
                                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="representative_details"
                                                                                       class="col-sm-4 col-form-label">
                                                                                    Details of the Representative </label>
                                                                                <div class="col-sm-8">
                                                    <textarea name="representative_details" class="form-control"
                                                              rows="3"
                                                              placeholder="">{{ $data->representative_details }}</textarea>
                                                                                    @error('representative_details')<span
                                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="defendant_name" class="col-sm-4 col-form-label">
                                                                                    Name of
                                                                                    the Defendant </label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control"
                                                                                           id="defendant_name"
                                                                                           name="defendant_name"
                                                                                           value="{{ $data->defendant_name }}">
                                                                                    @error('defendant_name')<span
                                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="defendant_representative_name"
                                                                                       class="col-sm-4 col-form-label">
                                                                                    Name of the Representative </label>
                                                                                <div class="col-sm-8">
                                                    <textarea name="defendant_representative_name" class="form-control" rows="3"
                                                              placeholder="">{{ $data->defendant_representative_name }}</textarea>
                                                                                    @error('defendant_representative_name')<span
                                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="defendant_representative_details"
                                                                                       class="col-sm-4 col-form-label">
                                                                                    Details of the Representative </label>
                                                                                <div class="col-sm-8">
                                                    <textarea name="defendant_representative_details" class="form-control"
                                                              rows="3"
                                                              placeholder="">{{ $data->defendant_representative_details }}</textarea>
                                                                                    @error('defendant_representative_details')<span
                                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h6 class="text-uppercase text-bold"><u> Lawyers
                                                                                    Information </u></h6>
                                                                            <div class="form-group row">
                                                                                <label for="advocate_name" class="col-sm-4 col-form-label">Name
                                                                                    of
                                                                                    Advocate/Law Firm</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control"
                                                                                           id="advocate_name"
                                                                                           name="advocate_name"
                                                                                           value="{{ $data->advocate_name }}">
                                                                                    @error('advocate_name')<span
                                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="assigned_lawyer"
                                                                                       class="col-sm-4 col-form-label"> Name
                                                                                    of Assigned Lawyer </label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control"
                                                                                           id="assigned_lawyer"
                                                                                           name="assigned_lawyer"
                                                                                           value="{{ $data->assigned_lawyer }}">
                                                                                    @error('assigned_lawyer')<span
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
                                                                                <label for="comments" class="col-sm-4 col-form-label">
                                                                                    Comments </label>
                                                                                <div class="col-sm-8">
                                                    <textarea name="comments" class="form-control" rows="3"
                                                              placeholder="">{{ $data->comments }}</textarea>
                                                                                    @error('comments')<span
                                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="appeal_case_info" style="display: none;">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h6 class="text-uppercase text-bold"><u> Case Information </u>
                                                                            </h6>
                                                                            <div class="form-group row">
                                                                                <label for="appeal_original_case_no"
                                                                                       class="col-sm-4 col-form-label">Original Case
                                                                                    No.</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control"
                                                                                           id="appeal_original_case_no"
                                                                                           name="appeal_original_case_no"
                                                                                           value="{{ $data->appeal_original_case_no }}">
                                                                                    @error('appeal_original_case_no')<span
                                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="appeal_subsequent_case_no"
                                                                                       class="col-sm-4 col-form-label">
                                                                                    Subsequent Case No. </label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control"
                                                                                           id="appeal_subsequent_case_no"
                                                                                           name="appeal_subsequent_case_no"
                                                                                           value="{{ $data->appeal_subsequent_case_no }}">
                                                                                    @error('appeal_subsequent_case_no')<span
                                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="appeal_date_of_judgement_order"
                                                                                       class="col-sm-4 col-form-label">
                                                                                    Date of Judgement & Order </label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="date" class="form-control"
                                                                                           id="appeal_date_of_judgement_order"
                                                                                           name="appeal_date_of_judgement_order"
                                                                                           value="{{ $data->appeal_date_of_judgement_order }}">
                                                                                    @error('appeal_date_of_judgement_order')<span
                                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="appeal_summary_of_judgement_order"
                                                                                       class="col-sm-4 col-form-label">
                                                                                    Summary of Judgement & Order </label>
                                                                                <div class="col-sm-8">
                                                                <textarea name="appeal_summary_of_judgement_order"
                                                                          class="form-control" rows="3"
                                                                          placeholder="">{{ $data->appeal_summary_of_judgement_order }}</textarea>
                                                                                    @error('appeal_summary_of_judgement_order')<span
                                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="appeal_case_category_id"
                                                                                       class="col-sm-4 col-form-label">Appeal Case
                                                                                    Category</label>
                                                                                <div class="col-sm-8">
                                                                                    <select name="appeal_case_category_id"
                                                                                            class="form-control select2"
                                                                                            id="appeal_case_category_id"
                                                                                            action="{{ route('find-case-subcategory') }}">
                                                                                        <option value="">Select</option>
                                                                                        @foreach ($case_category as $item)
                                                                                            <option
                                                                                                value="{{ $item->id }}" {{( $data->appeal_case_category_id == $item->id ? 'selected':'')}}>{{ ucfirst($item->case_category) }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    @error('appeal_case_category_id')<span
                                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="appeal_case_subcategory_id"
                                                                                       class="col-sm-4 col-form-label">Appeal Case
                                                                                    Subcategory</label>
                                                                                <div class="col-sm-8">
                                                                                    <select name="appeal_case_subcategory_id"
                                                                                            class="form-control select2"
                                                                                            id="appeal_case_subcategory_id">
                                                                                        <option value="">Select</option>
                                                                                        @foreach ($existing_appeal_case_subcategory as $item)
                                                                                            <option
                                                                                                value="{{ $item->id }}" {{( $data->appeal_case_subcategory_id == $item->id ? 'selected':'')}}>{{ ucfirst($item->case_subcategory) }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    @error('appeal_case_subcategory_id')<span
                                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="appeal_case_type_id"
                                                                                       class="col-sm-4 col-form-label">Appeal Case
                                                                                    Type</label>
                                                                                <div class="col-sm-8">
                                                                                    <select name="appeal_case_type_id"
                                                                                            class="form-control select2"
                                                                                            id="appeal_case_type_id"
                                                                                            action="{{ route('find-thana') }}">
                                                                                        <option value=""> Select</option>
                                                                                        @foreach($case_types as $item)
                                                                                            <option
                                                                                                value="{{ $item->id }}" {{( $data->case_type_id == $item->id ? 'selected':'')}}>{{ $item->case_types_name }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    @error('appeal_case_type_id')<span
                                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="appeal_case_no"
                                                                                       class="col-sm-4 col-form-label">
                                                                                    Appeal Case No. </label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control"
                                                                                           id="appeal_case_no"
                                                                                           name="appeal_case_no"
                                                                                           value="{{ $data->appeal_case_no }}">
                                                                                    @error('appeal_case_no')<span
                                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="appellate_filing_court"
                                                                                       class="col-sm-4 col-form-label">
                                                                                    Name of the filing Court </label>
                                                                                <div class="col-sm-8">
                                                    <textarea name="appellate_filing_court" class="form-control"
                                                              rows="3"
                                                              placeholder="">{{ $data->appellate_filing_court }}</textarea>
                                                                                    @error('appellate_filing_court')<span
                                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="appeal_date_of_filing"
                                                                                       class="col-sm-4 col-form-label">
                                                                                    Date of filing </label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="date" class="form-control"
                                                                                           id="appeal_date_of_filing"
                                                                                           name="appeal_date_of_filing"
                                                                                           value="{{ $data->appeal_date_of_filing }}">
                                                                                    @error('appeal_date_of_filing')<span
                                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="appeal_law" class="col-sm-4 col-form-label">
                                                                                    Law </label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control" id="appeal_law"
                                                                                           name="appeal_law" value="{{ $data->appeal_law }}">
                                                                                    @error('appeal_law')<span
                                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="appeal_section" class="col-sm-4 col-form-label">
                                                                                    Section </label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control"
                                                                                           id="appeal_section"
                                                                                           name="appeal_section"
                                                                                           value="{{ $data->appeal_section }}">
                                                                                    @error('appeal_section')<span
                                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="appeal_allegation_claim"
                                                                                       class="col-sm-4 col-form-label">
                                                                                    Allegation/Claim </label>
                                                                                <div class="col-sm-8">
                                                    <textarea name="appeal_allegation_claim" class="form-control"
                                                              rows="3"
                                                              placeholder="">{{ $data->appeal_allegation_claim }}</textarea>
                                                                                    @error('appeal_allegation_claim')<span
                                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="appeal_amount_of_money"
                                                                                       class="col-sm-4 col-form-label">
                                                                                    Amount of Money </label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control"
                                                                                           id="appeal_amount_of_money"
                                                                                           name="appeal_amount_of_money"
                                                                                           value="{{ $data->appeal_amount_of_money }}">
                                                                                    @error('appeal_amount_of_money')<span
                                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="appeal_another_claim"
                                                                                       class="col-sm-4 col-form-label">
                                                                                    Another Claim (if any) </label>
                                                                                <div class="col-sm-8">
                                                    <textarea name="appeal_another_claim" class="form-control" rows="3"
                                                              placeholder="">{{ $data->appeal_another_claim }}</textarea>
                                                                                    @error('appeal_another_claim')<span
                                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="appeal_summary_facts"
                                                                                       class="col-sm-4 col-form-label">
                                                                                    Summary of Facts </label>
                                                                                <div class="col-sm-8">
                                                    <textarea name="appeal_summary_facts" class="form-control" rows="3"
                                                              placeholder="">{{ $data->appeal_summary_facts }}</textarea>
                                                                                    @error('appeal_summary_facts')<span
                                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="appeal_name_of_the_appellant"
                                                                                       class="col-sm-4 col-form-label">
                                                                                    Name of the Appellant </label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control"
                                                                                           id="appeal_name_of_the_appellant"
                                                                                           name="appeal_name_of_the_appellant"
                                                                                           value="{{ $data->appeal_name_of_the_appellant }}">
                                                                                    @error('appeal_name_of_the_appellant')<span
                                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="appeal_representative"
                                                                                       class="col-sm-4 col-form-label">
                                                                                    Name of the Representative </label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control"
                                                                                           id="appeal_representative"
                                                                                           name="appeal_representative"
                                                                                           value="{{ $data->appeal_representative }}">
                                                                                    @error('appeal_representative')<span
                                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="appeal_representative_details"
                                                                                       class="col-sm-4 col-form-label">
                                                                                    Details of the Representative </label>
                                                                                <div class="col-sm-8">
                                                    <textarea name="appeal_representative_details" class="form-control"
                                                              rows="3"
                                                              placeholder="">{{ $data->appeal_representative_details }}</textarea>
                                                                                    @error('appeal_representative_details')<span
                                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="appeal_respondent_opposite_party"
                                                                                       class="col-sm-4 col-form-label">
                                                                                    Name of the Respondent/Opposite Party </label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control"
                                                                                           id="appeal_respondent_opposite_party"
                                                                                           name="appeal_respondent_opposite_party"
                                                                                           value="{{ $data->appeal_respondent_opposite_party }}">
                                                                                    @error('appeal_respondent_opposite_party')<span
                                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="appeal_opposite_representative"
                                                                                       class="col-sm-4 col-form-label">
                                                                                    Name of the Representative </label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control"
                                                                                           id="appeal_opposite_representative"
                                                                                           name="appeal_opposite_representative"
                                                                                           value="{{ $data->appeal_opposite_representative }}">
                                                                                    @error('appeal_opposite_representative')<span
                                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="appeal_opposite_representative_details"
                                                                                       class="col-sm-4 col-form-label">
                                                                                    Details of the Representative </label>
                                                                                <div class="col-sm-8">
                                                    <textarea name="appeal_opposite_representative_details"
                                                              class="form-control" rows="3"
                                                              placeholder="">{{ $data->appeal_opposite_representative_details }}</textarea>
                                                                                    @error('appeal_opposite_representative_details')<span
                                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="revision_case_info" style="display: none;">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h6 class="text-uppercase text-bold"><u> Case Information</u>
                                                                            </h6>
                                                                            <div class="form-group row">
                                                                                <label for="revision_original_case_no"
                                                                                       class="col-sm-4 col-form-label">Original Case
                                                                                    No.</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control"
                                                                                           id="revision_original_case_no"
                                                                                           name="revision_original_case_no"
                                                                                           value="{{ $data->revision_original_case_no }}">
                                                                                    @error('revision_original_case_no')<span
                                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="revision_subsequent_case_no"
                                                                                       class="col-sm-4 col-form-label">
                                                                                    Subsequent Case No. </label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control"
                                                                                           id="revision_subsequent_case_no"
                                                                                           name="revision_subsequent_case_no"
                                                                                           value="{{ $data->revision_subsequent_case_no }}">
                                                                                    @error('revision_subsequent_case_no')<span
                                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="revision_date_of_judgement_order"
                                                                                       class="col-sm-4 col-form-label">
                                                                                    Date of Judgement & Order </label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="date" class="form-control"
                                                                                           id="revision_date_of_judgement_order"
                                                                                           name="revision_date_of_judgement_order"
                                                                                           value="{{ $data->revision_date_of_judgement_order }}">
                                                                                    @error('revision_date_of_judgement_order')<span
                                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="revision_summary_of_judgement_order"
                                                                                       class="col-sm-4 col-form-label">
                                                                                    Summary of Judgement & Order </label>
                                                                                <div class="col-sm-8">
                                                                <textarea name="revision_summary_of_judgement_order"
                                                                          class="form-control" rows="3"
                                                                          placeholder="">{{ $data->revision_summary_of_judgement_order }}</textarea>
                                                                                    @error('revision_summary_of_judgement_order')<span
                                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="revision_appeal_case_category_id"
                                                                                       class="col-sm-4 col-form-label">Revision Case
                                                                                    Category</label>
                                                                                <div class="col-sm-8">
                                                                                    <select name="revision_appeal_case_category_id"
                                                                                            class="form-control select2"
                                                                                            id="revision_appeal_case_category_id"
                                                                                            action="{{ route('find-case-subcategory') }}">
                                                                                        <option value="">Select</option>
                                                                                        @foreach ($case_category as $item)
                                                                                            <option
                                                                                                value="{{ $item->id }}" {{( $data->revision_appeal_case_category_id == $item->id ? 'selected':'')}}>{{ ucfirst($item->case_category) }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    @error('appeal_case_category_id')<span
                                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="revision_case_subcategory_id"
                                                                                       class="col-sm-4 col-form-label">Revision Case
                                                                                    Subcategory</label>
                                                                                <div class="col-sm-8">
                                                                                    <select name="revision_case_subcategory_id"
                                                                                            class="form-control select2"
                                                                                            id="revision_case_subcategory_id">
                                                                                        <option value="">Select</option>
                                                                                        @foreach ($existing_revision_case_subcategory as $item)
                                                                                            <option
                                                                                                value="{{ $item->id }}" {{( $data->revision_case_subcategory_id == $item->id ? 'selected':'')}}>{{ ucfirst($item->case_subcategory) }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    @error('revision_case_subcategory_id')<span
                                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="revision_case_type_id"
                                                                                       class="col-sm-4 col-form-label">Revision Case
                                                                                    Type</label>
                                                                                <div class="col-sm-8">
                                                                                    <select name="revision_case_type_id"
                                                                                            class="form-control select2"
                                                                                            id="revision_case_type_id"
                                                                                            action="{{ route('find-thana') }}">
                                                                                        <option value=""> Select</option>
                                                                                        @foreach($case_types as $item)
                                                                                            <option
                                                                                                value="{{ $item->id }}" {{( $data->case_type_id == $item->id ? 'selected':'')}}>{{ $item->case_types_name }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    @error('revision_case_type_id')<span
                                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="revision_case_no"
                                                                                       class="col-sm-4 col-form-label">
                                                                                    Revision Case No. </label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control"
                                                                                           id="revision_case_no"
                                                                                           name="revision_case_no"
                                                                                           value="{{ $data->revision_case_no }}">
                                                                                    @error('revision_case_no')<span
                                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="revision_filing_court"
                                                                                       class="col-sm-4 col-form-label">
                                                                                    Name of the filing Court </label>
                                                                                <div class="col-sm-8">
                                                    <textarea name="revision_filing_court" class="form-control"
                                                              rows="3"
                                                              placeholder="">{{ $data->revision_filing_court }}</textarea>
                                                                                    @error('revision_filing_court')<span
                                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="revision_date_of_filing"
                                                                                       class="col-sm-4 col-form-label">
                                                                                    Date of filing </label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="date" class="form-control"
                                                                                           id="revision_date_of_filing"
                                                                                           name="revision_date_of_filing"
                                                                                           value="{{ $data->revision_date_of_filing }}">
                                                                                    @error('revision_date_of_filing')<span
                                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="revision_law" class="col-sm-4 col-form-label">
                                                                                    Law </label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control" id="revision_law"
                                                                                           name="revision_law" value="{{ $data->revision_law }}">
                                                                                    @error('revision_law')<span
                                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="revision_section" class="col-sm-4 col-form-label">
                                                                                    Section </label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control"
                                                                                           id="revision_section"
                                                                                           name="revision_section"
                                                                                           value="{{ $data->revision_section }}">
                                                                                    @error('revision_section')<span
                                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="revision_allegation_claim"
                                                                                       class="col-sm-4 col-form-label">
                                                                                    Allegation/Claim </label>
                                                                                <div class="col-sm-8">
                                                    <textarea name="revision_allegation_claim" class="form-control"
                                                              rows="3"
                                                              placeholder="">{{ $data->revision_allegation_claim }}</textarea>
                                                                                    @error('revision_allegation_claim')<span
                                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="revision_amount_of_money"
                                                                                       class="col-sm-4 col-form-label">
                                                                                    Amount of Money </label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control"
                                                                                           id="revision_amount_of_money"
                                                                                           name="revision_amount_of_money"
                                                                                           value="{{ $data->revision_amount_of_money }}">
                                                                                    @error('revision_amount_of_money')<span
                                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="revision_another_claim"
                                                                                       class="col-sm-4 col-form-label">
                                                                                    Another Claim (if any) </label>
                                                                                <div class="col-sm-8">
                                                    <textarea name="revision_another_claim" class="form-control" rows="3"
                                                              placeholder="">{{ $data->revision_another_claim }}</textarea>
                                                                                    @error('revision_another_claim')<span
                                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="revision_summary_facts"
                                                                                       class="col-sm-4 col-form-label">
                                                                                    Summary of Facts </label>
                                                                                <div class="col-sm-8">
                                                    <textarea name="revision_summary_facts" class="form-control" rows="3"
                                                              placeholder="">{{ $data->revision_summary_facts }}</textarea>
                                                                                    @error('revision_summary_facts')<span
                                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="revision_name_of_the_appellant"
                                                                                       class="col-sm-4 col-form-label">
                                                                                    Name of the Petitioner </label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control"
                                                                                           id="revision_name_of_the_appellant"
                                                                                           name="revision_name_of_the_appellant"
                                                                                           value="{{ $data->revision_name_of_the_appellant }}">
                                                                                    @error('revision_name_of_the_appellant')<span
                                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="revision_representative"
                                                                                       class="col-sm-4 col-form-label">
                                                                                    Name of the Representative </label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control"
                                                                                           id="revision_representative"
                                                                                           name="revision_representative"
                                                                                           value="{{ $data->revision_representative }}">
                                                                                    @error('revision_representative')<span
                                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="revision_representative_details"
                                                                                       class="col-sm-4 col-form-label">
                                                                                    Details of the Representative </label>
                                                                                <div class="col-sm-8">
                                                    <textarea name="revision_representative_details" class="form-control"
                                                              rows="3"
                                                              placeholder="">{{ $data->revision_representative_details }}</textarea>
                                                                                    @error('revision_representative_details')<span
                                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="revision_respondent_opposite_party"
                                                                                       class="col-sm-4 col-form-label">
                                                                                    Name of the Respondent/Opposite Party </label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control"
                                                                                           id="revision_respondent_opposite_party"
                                                                                           name="revision_respondent_opposite_party"
                                                                                           value="{{ $data->revision_respondent_opposite_party }}">
                                                                                    @error('revision_respondent_opposite_party')<span
                                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="revision_opposite_representative"
                                                                                       class="col-sm-4 col-form-label">
                                                                                    Name of the Representative </label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control"
                                                                                           id="revision_opposite_representative"
                                                                                           name="revision_opposite_representative"
                                                                                           value="{{ $data->revision_opposite_representative }}">
                                                                                    @error('revision_opposite_representative')<span
                                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="revision_opposite_representative_details"
                                                                                       class="col-sm-4 col-form-label">
                                                                                    Details of the Representative </label>
                                                                                <div class="col-sm-8">
                                                    <textarea name="revision_opposite_representative_details"
                                                              class="form-control" rows="3"
                                                              placeholder="">{{ $data->revision_opposite_representative_details }}</textarea>
                                                                                    @error('revision_opposite_representative_details')<span
                                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="uploaded_document"> Document Upload </label>
                                                                    <div class="input-group hdtuto control-group lst increment">
                                                                        <input type="file" name="uploaded_document[]"
                                                                               class="myfrm form-control">
                                                                        <div class="input-group-btn">
                                                                            <button class="btn btn-success" type="button"><i
                                                                                    class="fldemo glyphicon glyphicon-plus"></i>+
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                    <div class="clone hide">
                                                                        <div class="hdtuto control-group lst input-group"
                                                                             style="margin-top:10px">
                                                                            <input type="file" name="uploaded_document[]"
                                                                                   class="myfrm form-control">
                                                                            <div class="input-group-btn">
                                                                                <button class="btn btn-danger" type="button"><i
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

                                                </div>
                                            </form>


                                        </div>
                                        <div id="about" class="tab-pane">
                                            <div class="panel-body">
                                                <div class="tab-content">
                                                    <div id="home" class="tab-pane active">

                                                        <div class="card-header">
                                                            <h3 class="card-title" id="heading">Update Civil Case
                                                                Status</h3>

                                                        </div>

                                                        <form
                                                            action="{{ route('update-civil-cases-status', $data->id) }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="card-body">

                                                                <div class="row">
                                                                    <div class="col-md-6">

                                                                        <div class="form-group row">
                                                                            <label for="updated_court_id"
                                                                                   class="col-sm-4 col-form-label"> Name
                                                                                of
                                                                                the filling Court </label>
                                                                            <div class="col-sm-8">
                                                                                <select name="updated_court_id"
                                                                                        class="form-control select2"
                                                                                >
                                                                                    <option value="">Select</option>
                                                                                    @foreach ($court as $item)
                                                                                        <option
                                                                                            value="{{ $item->id }}"
                                                                                            {{ $data->updated_court_id == $item->id ? 'selected' : '' }}>
                                                                                            {{ $item->court_name }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('updated_court_id')
                                                                                <span
                                                                                    class="text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="updated_next_date"
                                                                                   class="col-sm-4 col-form-label"> Next
                                                                                Date
                                                                            </label>
                                                                            <div class="col-sm-8">
                                                                                <input type="date" class="form-control"
                                                                                       id="updated_next_date"
                                                                                       name="updated_next_date"
                                                                                       value="{{ $data->updated_next_date }}"
                                                                                >
                                                                                @error('updated_next_date')
                                                                                <span
                                                                                    class="text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="updated_next_date_fixed_id"
                                                                                   class="col-sm-4 col-form-label"> Next
                                                                                date
                                                                                fixed for </label>
                                                                            <div class="col-sm-8">
                                                                                <select
                                                                                    name="updated_next_date_fixed_id"
                                                                                    class="form-control select2"
                                                                                >
                                                                                    <option value="">Select</option>
                                                                                    @foreach ($next_date_reason as $item)
                                                                                        <option
                                                                                            value="{{ $item->id }}"
                                                                                            {{ $data->updated_next_date_fixed_id == $item->id ? 'selected' : '' }}>
                                                                                            {{ $item->next_date_reason_name }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('updated_next_date_fixed_id')
                                                                                <span
                                                                                    class="text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="updated_panel_lawyer_id"
                                                                                   class="col-sm-4 col-form-label">Panel
                                                                                Lawyer</label>
                                                                            <div class="col-sm-8">

                                                                                <select name="updated_panel_lawyer_id"
                                                                                        class="form-control select2"
                                                                                >
                                                                                    <option value="">Select</option>
                                                                                    @foreach ($external_council as $item)
                                                                                        <option
                                                                                            value="{{ $item->id }}"
                                                                                            {{ $data->updated_panel_lawyer_id == $item->id ? 'selected' : '' }}>
                                                                                            {{ $item->first_name }}
                                                                                            {{ $item->middle_name }}
                                                                                            {{ $item->last_name }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('updated_panel_lawyer_id')
                                                                                <span
                                                                                    class="text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label for="order_date"
                                                                                   class="col-sm-4 col-form-label">
                                                                                Order Date
                                                                            </label>
                                                                            <div class="col-sm-8">
                                                                                <input type="date" class="form-control"
                                                                                       id="order_date" name="order_date"
                                                                                >
                                                                                @error('order_date')
                                                                                <span
                                                                                    class="text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="updated_case_status_id"
                                                                                   class="col-sm-4 col-form-label">Case
                                                                                Status</label>
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
                                                                            <label for="updated_accused_name"
                                                                                   class="col-sm-4 col-form-label">
                                                                                Accused Name
                                                                            </label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control"
                                                                                       id="updated_accused_name"
                                                                                       name="updated_accused_name"
                                                                                >
                                                                                @error('updated_accused_name')
                                                                                <span
                                                                                    class="text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group row">
                                                                            <label for="update_description"
                                                                                   class="col-sm-4 col-form-label">
                                                                                Update
                                                                                Description </label>
                                                                            <div class="col-sm-8">
                                                                                <textarea name="update_description"
                                                                                          class="form-control" rows="3"
                                                                                          placeholder=""></textarea>
                                                                                @error('update_description')
                                                                                <span
                                                                                    class="text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label for="case_proceedings"
                                                                                   class="col-sm-4 col-form-label"> Case
                                                                                Proceedings </label>
                                                                            <div class="col-sm-8">
                                                                                <textarea name="case_proceedings"
                                                                                          class="form-control" rows="3"
                                                                                          placeholder=""></textarea>
                                                                                @error('case_proceedings')
                                                                                <span
                                                                                    class="text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="case_notes"
                                                                                   class="col-sm-4 col-form-label"> Case
                                                                                Notes
                                                                            </label>
                                                                            <div class="col-sm-8">
                                                                                <textarea name="case_notes"
                                                                                          class="form-control" rows="3"
                                                                                          placeholder=""></textarea>
                                                                                @error('case_notes')
                                                                                <span
                                                                                    class="text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-check">

                                                                            <input
                                                                                class="form-check-input primary_meter3"
                                                                                type="radio"
                                                                                name="next_date_fixed_reason"
                                                                                id="primary_meter" value="Next Date">
                                                                            <label
                                                                                class="form-check-label primary_meter"
                                                                                for="primary_meter">
                                                                                Next Date
                                                                            </label>

                                                                            <input
                                                                                class="form-check-input primary_meter3"
                                                                                type="radio"
                                                                                name="next_date_fixed_reason"
                                                                                id="asdf" value="No Next Date">
                                                                            <label
                                                                                class="form-check-label primary_meter"
                                                                                for="asdf">
                                                                                No Next Date
                                                                            </label>

                                                                            <input
                                                                                class="form-check-input primary_meter3"
                                                                                type="radio"
                                                                                name="next_date_fixed_reason"
                                                                                id="aaaaaa" value="Disposed">
                                                                            <label
                                                                                class="form-check-label primary_meter"
                                                                                for="aaaaaa">
                                                                                Disposed
                                                                            </label>

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
                            </section>


                        </div>
                    </div>

                </div>
        </section>


        <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->
@endsection
