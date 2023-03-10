@extends('layouts.admin_layouts.admin_layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Labour Cases</h1>

                    </div><!-- /.col -->



                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">
                                <a class="leading-normal inline-flex items-center font-normal spark-button-focus h-8 text-md px-4 bg-transparent border-0 border-solid text-blue-700 hover:text-blue-800 active:text-blue-700 rounded-md"
                                    type="button" href="{{ route('labour-cases') }}" aria-disabled="false" role="link"
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
                                                <a data-toggle="tab" href="#home" class="active">Edit Labour Cases</a>
                                            </li>
                                            <li class="">
                                                <a data-toggle="tab" href="#about">Update Status</a>
                                            </li>
                                        </ul>
                                    </h3>
                                    <div class="float-right">
                                        <a href="{{ route('view-labour-cases', $data->id) }}"><button
                                                class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top"
                                                title="Details"><i class="fas fa-eye"></i></button></a>
                                    </div>
                                </div>

                                <div class="panel-body">
                                    <div class="tab-content">
                                        <div id="home" class="tab-pane active">

                                            <div class="card-header">
                                                <h3 class="card-title" id="heading">Edit Labour Cases</h3>

                                            </div>


                                            <form action="{{ route('update-labour-cases', $data->id) }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="card-body">

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label for="case_no" class="col-sm-4 col-form-label">Case No.</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" id="case_no" name="case_no"
                                                                           value="{{ $data->case_no }}">
                                                                    @error('case_no')<span
                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="case_year" class="col-sm-4 col-form-label">Case Year</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" id="case_year"
                                                                           name="case_year" value="{{ $data->case_year }}">
                                                                    @error('case_year')<span
                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="client_category_id" class="col-sm-4 col-form-label">Client
                                                                    Category</label>
                                                                <div class="col-sm-8">
                                                                    <select name="client_category_id" class="form-control select2"
                                                                            id="client_category_id"
                                                                            action="{{ route('find-client-subcategory') }}">
                                                                        <option value="">Select</option>
                                                                        @foreach ($client_category as $item)
                                                                            <option
                                                                                value="{{ $item->id }}" {{($data->client_category_id == $item->id ? 'selected':'')}}>{{ ucfirst($item->client_category_name) }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('client_category_id')<span
                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="client_subcategory_id" class="col-sm-4 col-form-label">Client
                                                                    Subcategory</label>
                                                                <div class="col-sm-8">
                                                                    <select name="client_subcategory_id" class="form-control select2"
                                                                            id="client_subcategory_id">
                                                                        <option value="">Select</option>
                                                                        @foreach ($existing_client_subcategory as $item)
                                                                            <option
                                                                                value="{{ $item->id }}" {{($data->client_subcategory_id == $item->id ? 'selected':'')}}>{{ ucfirst($item->client_subcategory_name) }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('client_subcategory_id')<span
                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="date_of_case_received" class="col-sm-4 col-form-label"> Date
                                                                    of Case Received </label>
                                                                <div class="col-sm-8">
                                                                    <input type="date" class="form-control" id="date_of_case_received"
                                                                           name="date_of_case_received"
                                                                           value="{{ $data->date_of_case_received }}">
                                                                    @error('date_of_case_received')<span
                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="case_category_id" class="col-sm-4 col-form-label">Case
                                                                    Category</label>
                                                                <div class="col-sm-8">
                                                                    <select name="case_category_id" id="case_category_id"
                                                                            class="form-control select2"
                                                                            action="{{ route('find-case-subcategory') }}">
                                                                        <option value="">Select</option>
                                                                        @foreach($case_category as $item)
                                                                            <option
                                                                                value="{{ $item->id }}" {{($data->case_category_id == $item->id ? 'selected':'')}}>{{ $item->case_category }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('case_category_id')<span
                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="case_subcategory_id" class="col-sm-4 col-form-label">Case
                                                                    Subcategory</label>
                                                                <div class="col-sm-8">

                                                                    <select name="case_subcategory_id" id="case_subcategory_id"
                                                                            class="form-control select2">
                                                                        <option value="">Select</option>
                                                                        @foreach($existing_case_subcategory as $item)
                                                                            <option
                                                                                value="{{ $item->id }}" {{($data->case_subcategory_id == $item->id ? 'selected':'')}}>{{ $item->case_subcategory }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('case_subcategory_id')<span
                                                                        class="text-danger">{{$message}}</span>@enderror

                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="case_type_id" class="col-sm-4 col-form-label">Type of
                                                                    Cases</label>
                                                                <div class="col-sm-8">

                                                                    <select name="case_type_id" class="form-control select2">
                                                                        <option value="">Select</option>
                                                                        @foreach($case_types as $item)
                                                                            <option
                                                                                value="{{ $item->id }}" {{($data->case_type_id == $item->id ? 'selected':'')}}>{{ $item->case_types_name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('case_type_id')<span
                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="trial_court" class="col-sm-4 col-form-label">Trial
                                                                    Court</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" id="trial_court"
                                                                           name="trial_court" value="{{ $data->trial_court }}">
                                                                    @error('trial_court')<span
                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="zone_id" class="col-sm-4 col-form-label"> Zone </label>
                                                                <div class="col-sm-8">
                                                                    <select name="zone_id" class="form-control select2">
                                                                        <option value="">Select</option>
                                                                        @foreach($zone as $item)
                                                                            <option
                                                                                value="{{ $item->id }}" {{($data->zone_id == $item->id ? 'selected':'')}}>{{ $item->region_name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('zone_id')<span
                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="area_id" class="col-sm-4 col-form-label"> Area </label>
                                                                <div class="col-sm-8">
                                                                    <select name="area_id" class="form-control select2">
                                                                        <option value="">Select</option>
                                                                        @foreach($area as $item)
                                                                            <option
                                                                                value="{{ $item->id }}" {{($data->area_id == $item->id ? 'selected':'')}}>{{ $item->area_name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('area_id')<span
                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="branch_id" class="col-sm-4 col-form-label"> Branch </label>
                                                                <div class="col-sm-8">
                                                                    <select name="branch_id" class="form-control select2">
                                                                        <option value="">Select</option>
                                                                        @foreach($branch as $item)
                                                                            <option
                                                                                value="{{ $item->id }}" {{($data->branch_id == $item->id ? 'selected':'')}}>{{ $item->branch_name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('branch_id')<span
                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="company_organization_id" class="col-sm-4 col-form-label">
                                                                    Company/Organization </label>
                                                                <div class="col-sm-8">
                                                                    <select name="company_organization_id" class="form-control select2">
                                                                        <option value="">Select</option>
                                                                        @foreach($company as $item)
                                                                            <option
                                                                                value="{{ $item->id }}" {{($data->company_organization_id == $item->id ? 'selected':'')}}>{{ $item->company_name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('company_organization_id')<span
                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="name_of_the_court_id" class="col-sm-4 col-form-label"> Name
                                                                    of the Court </label>
                                                                <div class="col-sm-8">
                                                                    <select name="name_of_the_court_id" class="form-control select2">
                                                                        <option value="">Select</option>
                                                                        @foreach($court as $item)
                                                                            <option
                                                                                value="{{ $item->id }}" {{($data->name_of_the_court_id == $item->id ? 'selected':'')}}>{{ $item->court_name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('name_of_the_court_id')<span
                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="date_of_filing" class="col-sm-4 col-form-label">Date of
                                                                    filing</label>
                                                                <div class="col-sm-8">
                                                                    <input type="date" class="form-control" id="date_of_filing"
                                                                           name="date_of_filing" value="{{ $data->date_of_filing }}">
                                                                    @error('date_of_filing')<span
                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="division_id"
                                                                       class="col-sm-4 col-form-label">Division</label>
                                                                <div class="col-sm-8">
                                                                    <select name="division_id" class="form-control select2"
                                                                            id="division_id" action="{{ route('find_district') }}">
                                                                        <option value="">Select</option>
                                                                        @foreach ($division as $item)
                                                                            <option
                                                                                value="{{ $item->id }}" {{($data->division_id == $item->id ? 'selected':'')}}>{{ ucfirst($item->division_name) }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('division_id')<span
                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="district_id"
                                                                       class="col-sm-4 col-form-label">District</label>
                                                                <div class="col-sm-8">
                                                                    <select name="district_id" class="form-control select2"
                                                                            id="district_id" action="{{ route('find-thana') }}">
                                                                        <option value=""> Select</option>
                                                                        @foreach ($existing_district as $item)
                                                                            <option
                                                                                value="{{ $item->id }}" {{($data->division_id == $item->id ? 'selected':'')}}>{{ ucfirst($item->district_name) }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('district_id')<span
                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="thana_id" class="col-sm-4 col-form-label">Police
                                                                    Station</label>
                                                                <div class="col-sm-8">
                                                                    <select name="thana_id" id="thana_id" class="form-control select2">
                                                                        <option value="">Select</option>
                                                                        @foreach ($existing_thana as $item)
                                                                            <option
                                                                                value="{{ $item->id }}" {{($data->thana_id == $item->id ? 'selected':'')}}>{{ ucfirst($item->thana_name) }}</option>
                                                                        @endforeach

                                                                    </select>
                                                                    @error('thana_id')<span
                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="relevant_law_id" class="col-sm-4 col-form-label"> Relevant
                                                                    Laws</label>
                                                                <div class="col-sm-8">
                                                                    <select name="relevant_law_id" class="form-control select2">
                                                                        <option value="">Select</option>
                                                                        @foreach($law as $item)
                                                                            <option
                                                                                value="{{ $item->id }}" {{($data->relevant_law_id == $item->id ? 'selected':'')}}>{{ $item->law_name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('relevant_law_id')<span
                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="relevant_sections_id" class="col-sm-4 col-form-label">
                                                                    Relevant Sections </label>
                                                                <div class="col-sm-8">
                                                                    <select name="relevant_sections_id" class="form-control select2">
                                                                        <option value="">Select</option>
                                                                        @foreach($section as $item)
                                                                            <option
                                                                                value="{{ $item->id }}" {{($data->relevant_sections_id == $item->id ? 'selected':'')}}>{{ $item->section_name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('relevant_sections_id')<span
                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="alligation" class="col-sm-4 col-form-label">
                                                                    Alligation </label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" id="alligation"
                                                                           name="alligation" value="{{ $data->alligation }}">
                                                                    @error('alligation')<span
                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="amount" class="col-sm-4 col-form-label">Amount of
                                                                    Money</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" id="amount" name="amount"
                                                                           value="{{ $data->amount }}">
                                                                    @error('amount')<span
                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="name_of_the_first_party" class="col-sm-4 col-form-label">Name
                                                                    of the 1st Party/Petitioner</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" id="name_of_the_first_party"
                                                                           name="name_of_the_first_party"
                                                                           value="{{ $data->name_of_the_first_party }}">
                                                                    @error('name_of_the_first_party')<span
                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="first_party_contact_no" class="col-sm-4 col-form-label"> 1st
                                                                    Party/Petitioner Contact No. </label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" id="first_party_contact_no"
                                                                           name="first_party_contact_no"
                                                                           value="{{ $data->first_party_contact_no }}">
                                                                    @error('first_party_contact_no')<span
                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                </div>
                                                            </div>


                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label for="first_party_designation_id" class="col-sm-4 col-form-label">Designation
                                                                    of the 1st Party/Petitioner</label>
                                                                <div class="col-sm-8">

                                                                    <select name="first_party_designation_id"
                                                                            class="form-control select2">
                                                                        <option value="">Select</option>
                                                                        @foreach($designation as $item)
                                                                            <option
                                                                                value="{{ $item->id }}" {{( $data->first_party_designation_id == $item->id ? 'selected':'')}}>{{ $item->designation_name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('first_party_designation_id')<span
                                                                        class="text-danger">{{$message}}</span>@enderror

                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="external_council_name_id" class="col-sm-4 col-form-label">External
                                                                    Council</label>
                                                                <div class="col-sm-8">

                                                                    <select name="external_council_name_id" class="form-control select2"
                                                                            id="external_council_name_id"
                                                                            action="{{ route('find-associates') }}">
                                                                        <option value="">Select</option>
                                                                        @foreach($external_council as $item)
                                                                            <option
                                                                                value="{{ $item->id }}" {{( $data->external_council_name_id == $item->id ? 'selected':'')}}>{{ $item->first_name }} {{ $item->middle_name }} {{ $item->last_name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('external_council_name_id')<span
                                                                        class="text-danger">{{$message}}</span>@enderror

                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="external_council_associates_id"
                                                                       class="col-sm-4 col-form-label">External Council
                                                                    Associates</label>
                                                                <div class="col-sm-8">
                                                                    <select name="external_council_associates_id"
                                                                            class="form-control select2"
                                                                            id="external_council_associates_id">
                                                                        <option value="">Select</option>
                                                                        @foreach($existing_ext_coun_associates as $item)
                                                                            <option
                                                                                value="{{ $item->id }}" {{( $data->external_council_name_id == $item->id ? 'selected':'')}}>{{ $item->first_name }} {{ $item->middle_name }} {{ $item->last_name }}</option>
                                                                        @endforeach

                                                                    </select>
                                                                    @error('external_council_associates_id')<span
                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="second_party_name" class="col-sm-4 col-form-label"> Name of
                                                                    the 2nd Party/Opposite Party </label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" id="second_party_name"
                                                                           name="second_party_name"
                                                                           value="{{ $data->second_party_name }}">
                                                                    @error('second_party_name')<span
                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="second_party_address" class="col-sm-4 col-form-label">
                                                                    Address of 2nd Party/Opposite Party </label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" id="second_party_address"
                                                                           name="second_party_address"
                                                                           value="{{ $data->second_party_address }}">
                                                                    @error('second_party_address')<span
                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="case_status_id" class="col-sm-4 col-form-label">Status of
                                                                    the Cases</label>
                                                                <div class="col-sm-8">
                                                                    <select name="case_status_id" class="form-control select2">
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
                                                                <label for="last_order_court_id" class="col-sm-4 col-form-label">Last
                                                                    Order of the Court</label>
                                                                <div class="col-sm-8">

                                                                    <select name="last_order_court_id" class="form-control select2">
                                                                        <option value="">Select</option>
                                                                        @foreach($last_court_order as $item)
                                                                            <option
                                                                                value="{{ $item->id }}" {{( $data->last_order_court_id == $item->id ? 'selected':'')}}>{{ $item->court_last_order_name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('last_order_court_id')<span
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
                                                                <label for="next_date_fixed_id" class="col-sm-4 col-form-label"> Next
                                                                    date fixed for </label>
                                                                <div class="col-sm-8">
                                                                    <select name="next_date_fixed_id" class="form-control select2">
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
                                                                <label for="case_notes" class="col-sm-4 col-form-label"> Case
                                                                    Notes </label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" id="case_notes"
                                                                           name="case_notes" value="{{ $data->case_notes }}">
                                                                    @error('case_notes')<span
                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="assigned_lawyer_id" class="col-sm-4 col-form-label">Assigned
                                                                    Lawyer (in favour of)</label>
                                                                <div class="col-sm-8">
                                                                    <select name="assigned_lawyer_id" class="form-control select2">
                                                                        <option value="">Select</option>
                                                                        @foreach($internal_council as $item)
                                                                            <option
                                                                                value="{{ $item->id }}" {{( $data->assigned_lawyer_id == $item->id ? 'selected':'')}}>{{ $item->first_name }} {{ $item->middle_name }} {{ $item->last_name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('assigned_lawyer_id')<span
                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="total_legal_bill_amount" class="col-sm-4 col-form-label">Total
                                                                    Legal Bill Amount and Cost</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" id="total_legal_bill_amount"
                                                                           name="total_legal_bill_amount"
                                                                           value="{{ $data->total_legal_bill_amount }}">
                                                                    @error('total_legal_bill_amount')<span
                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="other_claim" class="col-sm-4 col-form-label"> Other Claim(if
                                                                    any) </label>
                                                                <div class="col-sm-8">
                                                    <textarea name="other_claim" class="form-control" rows="3"
                                                              placeholder="">{{ $data->other_claim }}</textarea>
                                                                    @error('other_claim')<span
                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="summary_facts_alligation" class="col-sm-4 col-form-label">
                                                                    Summary of Facts & Alligation </label>
                                                                <div class="col-sm-8">
                                                    <textarea name="summary_facts_alligation" class="form-control"
                                                              rows="3"
                                                              placeholder="">{{ $data->summary_facts_alligation }}</textarea>
                                                                    @error('summary_facts_alligation')<span
                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="prayer_claims_by_psg" class="col-sm-4 col-form-label">
                                                                    Prayer/Claims by </label>
                                                                <div class="col-sm-8">
                                                    <textarea name="prayer_claims_by_psg" class="form-control" rows="3"
                                                              placeholder="">{{ $data->prayer_claims_by_psg }}</textarea>
                                                                    @error('prayer_claims_by_psg')<span
                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="missing_documents_evidence" class="col-sm-4 col-form-label">
                                                                    Missing Documents/Evidence/Information </label>
                                                                <div class="col-sm-8">
                                                    <textarea name="missing_documents_evidence" class="form-control"
                                                              rows="3"
                                                              placeholder="">{{ $data->missing_documents_evidence }}</textarea>
                                                                    @error('missing_documents_evidence')<span
                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="comments" class="col-sm-4 col-form-label"> Comments </label>
                                                                <div class="col-sm-8">
                                                    <textarea name="comments" class="form-control" rows="3"
                                                              placeholder="">{{ $data->comments }}</textarea>
                                                                    @error('comments')<span
                                                                        class="text-danger">{{$message}}</span>@enderror
                                                                </div>
                                                            </div>

                                                        </div>
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
                                            </form>



                                        </div>
                                        <div id="about" class="tab-pane">
                                            <div class="panel-body">
                                                <div class="tab-content">
                                                    <div id="home" class="tab-pane active">

                                                        <div class="card-header">
                                                            <h3 class="card-title" id="heading">Update Labour Case
                                                                Status</h3>

                                                        </div>

                                                        <form
                                                            action="{{ route('update-labour-cases-status', $data->id) }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="card-body">

                                                                <div class="row">
                                                                    <div class="col-md-6">

                                                                        <div class="form-group row">
                                                                            <label for="updated_court_id"
                                                                                class="col-sm-4 col-form-label"> Name of
                                                                                the filling Court </label>
                                                                            <div class="col-sm-8">
                                                                                <select name="updated_court_id"
                                                                                    class="form-control select2">
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
                                                                                class="col-sm-4 col-form-label"> Next Date
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
                                                                                class="col-sm-4 col-form-label"> Next date
                                                                                fixed for </label>
                                                                            <div class="col-sm-8">
                                                                                <select name="updated_next_date_fixed_id"
                                                                                    class="form-control select2" >
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
                                                                                    class="form-control select2" >
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
                                                                                class="col-sm-4 col-form-label"> Order Date
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
                                                                                    class="form-control select2" >
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
                                                                                class="col-sm-4 col-form-label"> Accused Name
                                                                            </label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control"
                                                                                    id="updated_accused_name" name="updated_accused_name"
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
                                                                                class="col-sm-4 col-form-label"> Update
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
                                                                                class="col-sm-4 col-form-label"> Case Notes
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

                                                                            <input class="form-check-input primary_meter3"
                                                                                type="radio" name="next_date_fixed_reason"
                                                                                id="primary_meter" value="Next Date">
                                                                            <label class="form-check-label primary_meter"
                                                                                for="primary_meter">
                                                                                Next Date
                                                                            </label>

                                                                            <input class="form-check-input primary_meter3"
                                                                                type="radio" name="next_date_fixed_reason"
                                                                                id="asdf" value="No Next Date">
                                                                            <label class="form-check-label primary_meter"
                                                                                for="asdf">
                                                                                No Next Date
                                                                            </label>

                                                                            <input class="form-check-input primary_meter3"
                                                                                type="radio" name="next_date_fixed_reason"
                                                                                id="aaaaaa" value="Disposed">
                                                                            <label class="form-check-label primary_meter"
                                                                                for="aaaaaa">
                                                                                Disposed
                                                                            </label>

                                                                        </div>
                                                                    </div>

                                                                </div>

                                                                <div class="float-right mt-4">
                                                                    <button type="submit"
                                                                        class="btn btn-primary text-uppercase"><i
                                                                            class="fas fa-save"></i> Update </button>
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
