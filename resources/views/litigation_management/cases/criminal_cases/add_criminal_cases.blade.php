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
                <form action="{{ route('save-criminal-cases') }}" method="post" enctype="multipart/form-data">

                    <!-- Default box -->
                    <div class="card">

                        <div class="card-header">
                            <h3 class="card-title"> Add Criminal Cases </h3>

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
                                                               value="{{old('client')}}">
                                                        @error('client')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="legal_issue_id" class="col-sm-4 col-form-label">Legal
                                                        Issue</label>
                                                    <div class="col-sm-8">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <select name="legal_issue_id"
                                                                        id="legal_issue_id"
                                                                        class="form-control select2">
                                                                    <option value="">Select</option>
                                                                    @foreach($legal_issue as $item)
                                                                        <option
                                                                            value="{{ $item->id }}" {{  old('legal_issue_id') == $item->id ? 'selected' : '' }}>{{ $item->legal_issue_name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control"
                                                                       id="legal_issue_write"
                                                                       name="legal_issue_write"
                                                                       placeholder="Legal Issue"
                                                                       value="{{ old('legal_issue_write') }}">
                                                            </div>
                                                        </div>

                                                        @error('legal_issue_id')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="legal_service_id" class="col-sm-4 col-form-label">Legal
                                                        Service</label>
                                                    <div class="col-sm-8">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <select name="legal_service_id"
                                                                        id="legal_service_id"
                                                                        class="form-control select2">
                                                                    <option value="">Select</option>
                                                                    @foreach($legal_service as $item)
                                                                        <option
                                                                            value="{{ $item->id }}" {{(old('legal_service_id') == $item->id ? 'selected':'')}}>{{ $item->legal_service_name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control"
                                                                       id="legal_service_write"
                                                                       name="legal_service_write"
                                                                       placeholder="Legal Service"
                                                                       value="{{ old('legal_service_write') }}">
                                                            </div>
                                                        </div>


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
                                                               value="{{old('complainant_informant_name')}}">
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
                                                               value="{{old('accused_name')}}">
                                                        @error('accused_name')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="in_favour_of_id" class="col-sm-4 col-form-label">In favour
                                                        of </label>
                                                    <div class="col-sm-8">
                                                        <select name="in_favour_of_id" class="form-control select2">
                                                            <option value="">Select</option>
                                                            @foreach($in_favour_of as $item)
                                                                <option
                                                                    value="{{ $item->id }}" {{(old('in_favour_of_id') == $item->id ? 'selected':'')}}> {{ $item->in_favour_of_name }} </option>
                                                            @endforeach
                                                        </select>
                                                        @error('in_favour_of_id')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="case_no" class="col-sm-4 col-form-label">Case
                                                        No.</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="case_no"
                                                               name="case_no"
                                                               value="{{old('case_no')}}">
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
                                                                    value="{{ $item->id }}" {{(old('name_of_the_court_id') == $item->id ? 'selected':'')}}>{{ $item->court_name }}</option>
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
                                                    <span class="date_span">
                                                        <input type="date" class="xDateContainer date_first_input"
                                                               onchange="setCorrect(this,'xTime');"><input type="text" id="xTime" name="next_date"
                                                                                                           value="dd/mm/yyyy"
                                                                                                           class="date_second_input"
                                                                                                           tabindex="-1"><span
                                                            class="date_second_span" tabindex="-1">&#9660;</span>
                                                    </span>
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
                                                                    value="{{ $item->id }}" {{(old('next_date_fixed_id') == $item->id ? 'selected':'')}}>{{ $item->next_date_reason_name }}</option>
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
                                                    <span class="date_span">
                                                        <input type="date" class="xDateContainer date_first_input"
                                                               onchange="setCorrect(this,'xTime2');"><input type="text" id="xTime2"
                                                                                                            name="received_date" value="dd/mm/yyyy"
                                                                                                            class="date_second_input"
                                                                                                            tabindex="-1"><span
                                                            class="date_second_span" tabindex="-1">&#9660;</span>
                                                    </span>
                                                        @error('received_date')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="mode_of_receipt_id"
                                                           class="col-sm-4 col-form-label"> Mode
                                                        of Receipt </label>
                                                    <div class="col-sm-8">
                                                        <select name="mode_of_receipt_id"
                                                                class="form-control select2"
                                                                id="mode_of_receipt_id"
                                                                action="{{ route('find-client-subcategory') }}">
                                                            <option value="">Select</option>
                                                            @foreach ($mode as $item)
                                                                <option
                                                                    value="{{ $item->id }}" {{(old('mode_of_receipt_id') == $item->id ? 'selected':'')}}>{{ ucfirst($item->mode_name) }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('mode_of_receipt')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="referrer_id"
                                                           class="col-sm-4 col-form-label"> Referrer Name </label>
                                                    <div class="col-sm-8">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <select name="referrer_id"
                                                                        id="referrer_id"
                                                                        class="form-control select2">
                                                                    <option value="">Select</option>
                                                                    @foreach($referrer as $item)
                                                                        <option
                                                                            value="{{ $item->id }}" {{  old('referrer_id') == $item->id ? 'selected' : '' }}>{{ $item->referrer_name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control"
                                                                       id="referrer_write"
                                                                       name="referrer_write"
                                                                       placeholder="Referrer"
                                                                       value="{{ old('referrer_write') }}">
                                                            </div>
                                                        </div>
                                                        @error('contact_person_name')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="referrer_details"
                                                           class="col-sm-4 col-form-label"> Referrer
                                                        Details </label>
                                                    <div class="col-sm-8">
                                                    <textarea name="referrer_details" class="form-control"
                                                              rows="3"
                                                              placeholder="">{{old('referrer_details')}}</textarea>
                                                        @error('referrer_details')<span
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
                                                    <label for="client_party_id"
                                                           class="col-sm-4 col-form-label">Client(Which Party)</label>
                                                    <div class="col-sm-8">
                                                        <select name="client_party_id"
                                                                class="form-control select2"
                                                                id="client_party_id">
                                                            <option value="">Select</option>
                                                            @foreach($in_favour_of as $item)
                                                                <option
                                                                    value="{{ $item->id }}" {{(old('client_party_id') == $item->id ? 'selected':'')}}> {{ $item->in_favour_of_name }} </option>
                                                            @endforeach
                                                        </select>
                                                        @error('client_party_id')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
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
                                                                    value="{{ $item->id }}" {{(old('client_category_id') == $item->id ? 'selected':'')}}>{{ ucfirst($item->client_category_name) }}</option>
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

                                                        </select>
                                                        @error('client_subcategory_id')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="client_id" class="col-sm-4 col-form-label">Client
                                                        Name</label>
                                                    <div class="col-sm-8">

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <select name="client_id[]"
                                                                        id="client_id"
                                                                        class="form-control select2" multiple>
                                                                    <option value="">Select</option>
                                                                    @foreach($client as $item)
                                                                        <option
                                                                            value="{{ $item->client_name }}" {{  old('client_id') == $item->id ? 'selected' : '' }}>{{ $item->client_name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="input-group hdtuto_client control-group increment_client">
                                                                    <input type="text" name="client_name_write[]"
                                                                           class="myfrm form-control col-12" placeholder="Client Name">
                                                                    <div class="input-group-btn">
                                                                        <button class="btn btn-success btn_success_client"
                                                                                type="button"><i
                                                                                class="fldemo glyphicon glyphicon-plus"></i>+
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <div class="clone_client hide">
                                                                    <div class="hdtuto_client control-group lst input-group"
                                                                         style="margin-top:10px">
                                                                        <input type="text" name="client_name_write[]"
                                                                               class="myfrm form-control col-12">
                                                                        <div class="input-group-btn">
                                                                            <button class="btn btn-danger btn_danger_client"
                                                                                    type="button"><i
                                                                                    class="fldemo glyphicon glyphicon-remove"></i> -
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>



                                                            </div>
                                                        </div>

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
                                                              placeholder="">{{old('client_address')}}</textarea>
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
                                                               value="{{old('client_mobile')}}">
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
                                                               value="{{old('client_email')}}">
                                                        @error('client_email')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="client_profession_id"
                                                           class="col-sm-4 col-form-label">Profession/Type</label>
                                                    <div class="col-sm-8">

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <select name="client_profession_id"
                                                                        class="form-control select2"
                                                                        id="client_profession_id">
                                                                    <option value="">Select</option>
                                                                    @foreach ($profession as $item)
                                                                        <option
                                                                            value="{{ $item->id }}" {{(old('client_profession_id') == $item->id ? 'selected':'')}}>{{ ucfirst($item->profession_name) }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control"
                                                                       id="client_profession_write"
                                                                       name="client_profession_write"
                                                                       placeholder="Profession Name"
                                                                       value="{{ old('client_profession_write') }}">
                                                            </div>
                                                        </div>

                                                        @error('client_profession_id')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="client_division_id"
                                                           class="col-sm-4 col-form-label">Zone/Division</label>
                                                    <div class="col-sm-8">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <select name="client_division_id"
                                                                        id="client_division_id"
                                                                        class="form-control select2" action="{{ route('find_district') }}">
                                                                    <option value="">Select</option>
                                                                    @foreach ($division as $item)
                                                                        <option
                                                                            value="{{ $item->id }}" {{(old('client_division_id') == $item->id ? 'selected':'')}}>{{ ucfirst($item->division_name) }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control"
                                                                       id="client_divisoin_write"
                                                                       name="client_divisoin_write"
                                                                       placeholder="Client Division"
                                                                       value="{{ old('client_divisoin_write') }}">
                                                            </div>
                                                        </div>
                                                        @error('client_division_id')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="client_district_id"
                                                           class="col-sm-4 col-form-label">Area/District</label>
                                                    <div class="col-sm-8">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <select name="client_district_id"
                                                                        id="client_district_id"
                                                                        class="form-control select2" action="{{ route('find-thana') }}">
                                                                    <option value="">Select</option>

                                                                </select>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control"
                                                                       id="client_district_write"
                                                                       name="client_district_write"
                                                                       placeholder="Client District"
                                                                       value="{{ old('client_district_write') }}">
                                                            </div>
                                                        </div>

                                                        @error('client_district_id')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="client_thana_id"
                                                           class="col-sm-4 col-form-label">Branch/Thana</label>
                                                    <div class="col-sm-8">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <select name="client_thana_id"
                                                                        id="client_thana_id"
                                                                        class="form-control select2">
                                                                    <option value="">Select</option>

                                                                </select>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control"
                                                                       id="client_thana_write"
                                                                       name="client_thana_write"
                                                                       placeholder="Client Thana"
                                                                       value="{{ old('client_thana_write') }}">
                                                            </div>
                                                        </div>
                                                        @error('client_thana_id')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="client_representative_name" class="col-sm-4 col-form-label">Representative Name</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="client_representative_name"
                                                               name="client_representative_name"
                                                               value="{{old('client_representative_name')}}">
                                                        @error('client_representative_name')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="client_representative_details"
                                                           class="col-sm-4 col-form-label"> Representative Details </label>
                                                    <div class="col-sm-8">
                                                    <textarea name="client_representative_details" class="form-control"
                                                              rows="3"
                                                              placeholder="">{{old('client_representative_details')}}</textarea>
                                                        @error('client_representative_details')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="client_coordinator_tadbirkar_id"
                                                           class="col-sm-4 col-form-label"> Coordinator/Tadbirkar </label>
                                                    <div class="col-sm-8">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <select name="client_coordinator_tadbirkar_id"
                                                                        id="client_coordinator_tadbirkar_id"
                                                                        class="form-control select2">
                                                                    <option value="">Select</option>
                                                                    @foreach($coordinator as $item)
                                                                        <option
                                                                            value="{{ $item->id }}" {{ old('client_coordinator_tadbirkar_id') == $item->id ? 'selected' : '' }}>{{ $item->coordinator_name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control"
                                                                       id="coordinator_tadbirkar_write"
                                                                       name="coordinator_tadbirkar_write"
                                                                       placeholder="Tadbirkar Name"
                                                                       value="{{old('coordinator_tadbirkar_write')}}">
                                                            </div>
                                                        </div>
                                                        @error('coordinator_tadbirkar_write')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="client_coordinator_details"
                                                           class="col-sm-4 col-form-label"> Coordinator Details </label>
                                                    <div class="col-sm-8">
                                                    <textarea name="client_coordinator_details" class="form-control"
                                                              rows="3"
                                                              placeholder="">{{old('client_coordinator_details')}}</textarea>
                                                        @error('client_coordinator_details')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                                <h6 class="text-uppercase text-bold"><u> Opposite Party Information </u></h6>
                                                <div class="form-group row">
                                                    <label for="opposition_party_id"
                                                           class="col-sm-4 col-form-label">Opposition(Which Party)</label>
                                                    <div class="col-sm-8">
                                                        <select name="opposition_party_id"
                                                                class="form-control select2"
                                                                id="opposition_party_id">
                                                            <option value="">Select</option>
                                                            @foreach($in_favour_of as $item)
                                                                <option
                                                                    value="{{ $item->id }}" {{(old('opposition_party_id') == $item->id ? 'selected':'')}}> {{ $item->in_favour_of_name }} </option>
                                                            @endforeach
                                                        </select>
                                                        @error('opposition_party_id')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="opposition_category_id"
                                                           class="col-sm-4 col-form-label">Opposition
                                                        Category</label>
                                                    <div class="col-sm-8">
                                                        <select name="opposition_category_id"
                                                                class="form-control select2"
                                                                id="opposition_category_id"
                                                                action="{{ route('find-client-subcategory') }}">
                                                            <option value="">Select</option>
                                                            @foreach ($client_category as $item)
                                                                <option
                                                                    value="{{ $item->id }}" {{(old('opposition_category_id') == $item->id ? 'selected':'')}}>{{ ucfirst($item->client_category_name) }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('opposition_category_id')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="opposition_subcategory_id"
                                                           class="col-sm-4 col-form-label">Opposition
                                                        Subcategory</label>
                                                    <div class="col-sm-8">
                                                        <select name="opposition_subcategory_id"
                                                                class="form-control select2"
                                                                id="opposition_subcategory_id">
                                                            <option value="">Select</option>

                                                        </select>
                                                        @error('opposition_subcategory_id')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="opposition_id" class="col-sm-4 col-form-label">Opposition
                                                        Name</label>
                                                    <div class="col-sm-8">

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <select name="opposition_id[]"
                                                                        id="opposition_id"
                                                                        class="form-control select2" multiple>
                                                                    <option value="">Select</option>
                                                                    @foreach($opposition as $item)
                                                                        <option
                                                                            value="{{ $item->opposition_name }}" {{  old('opposition_id') == $item->id ? 'selected' : '' }}>{{ $item->opposition_name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="input-group hdtuto_opposition control-group increment_opposition">
                                                                    <input type="text" name="opposition_write[]"
                                                                           class="myfrm form-control col-12" placeholder="Client Name">
                                                                    <div class="input-group-btn">
                                                                        <button class="btn btn-success btn_success_opposition"
                                                                                type="button"><i
                                                                                class="fldemo glyphicon glyphicon-plus"></i>+
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <div class="clone_opposition hide">
                                                                    <div class="hdtuto_opposition control-group lst input-group"
                                                                         style="margin-top:10px">
                                                                        <input type="text" name="opposition_write[]"
                                                                               class="myfrm form-control col-12">
                                                                        <div class="input-group-btn">
                                                                            <button class="btn btn-danger btn_danger_opposition"
                                                                                    type="button"><i
                                                                                    class="fldemo glyphicon glyphicon-remove"></i> -
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>



                                                            </div>
                                                        </div>

                                                        @error('client_name')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="opposition_address" class="col-sm-4 col-form-label">
                                                        Opposition
                                                        Address </label>
                                                    <div class="col-sm-8">
                                                    <textarea name="opposition_address" class="form-control" rows="3"
                                                              placeholder="">{{old('opposition_address')}}</textarea>
                                                        @error('opposition_address')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="opposition_mobile" class="col-sm-4 col-form-label">Opposition
                                                        Mobile</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="opposition_mobile"
                                                               name="opposition_mobile"
                                                               value="{{old('opposition_mobile')}}">
                                                        @error('opposition_mobile')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="opposition_email" class="col-sm-4 col-form-label">Opposition
                                                        Email</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="opposition_email"
                                                               name="opposition_email"
                                                               value="{{old('opposition_email')}}">
                                                        @error('opposition_email')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="opposition_profession_id"
                                                           class="col-sm-4 col-form-label">Profession/Type</label>
                                                    <div class="col-sm-8">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <select name="opposition_profession_id"
                                                                        class="form-control select2"
                                                                        id="opposition_profession_id">
                                                                    <option value="">Select</option>
                                                                    @foreach ($profession as $item)
                                                                        <option
                                                                            value="{{ $item->id }}" {{(old('opposition_profession_id') == $item->id ? 'selected':'')}}>{{ ucfirst($item->profession_name) }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control"
                                                                       id="opposition_profession_write"
                                                                       name="opposition_profession_write"
                                                                       placeholder="Profession Name"
                                                                       value="{{ old('opposition_profession_write') }}">
                                                            </div>
                                                        </div>
                                                        @error('opposition_profession_write')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="opposition_division_id"
                                                           class="col-sm-4 col-form-label">Zone/Division</label>
                                                    <div class="col-sm-8">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <select name="opposition_division_id"
                                                                        id="opposition_division_id"
                                                                        class="form-control select2" action="{{ route('find_district') }}">
                                                                    <option value="">Select</option>
                                                                    @foreach ($division as $item)
                                                                        <option
                                                                            value="{{ $item->id }}" {{(old('opposition_division_id') == $item->id ? 'selected':'')}}>{{ ucfirst($item->division_name) }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control"
                                                                       id="opposition_divisoin_write"
                                                                       name="opposition_divisoin_write"
                                                                       placeholder="Opposition Division"
                                                                       value="{{ old('opposition_divisoin_write') }}">
                                                            </div>
                                                        </div>
                                                        @error('opposition_divisoin_write')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="opposition_district_id"
                                                           class="col-sm-4 col-form-label">Area/District</label>
                                                    <div class="col-sm-8">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <select name="opposition_district_id"
                                                                        id="opposition_district_id"
                                                                        class="form-control select2" action="{{ route('find-thana') }}">
                                                                    <option value="">Select</option>

                                                                </select>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control"
                                                                       id="opposition_district_write"
                                                                       name="opposition_district_write"
                                                                       placeholder="Opposition District"
                                                                       value="{{ old('opposition_district_write') }}">
                                                            </div>
                                                        </div>

                                                        @error('opposition_district_write')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="opposition_thana_id"
                                                           class="col-sm-4 col-form-label">Branch/Thana</label>
                                                    <div class="col-sm-8">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <select name="opposition_thana_id"
                                                                        id="opposition_thana_id"
                                                                        class="form-control select2">
                                                                    <option value="">Select</option>

                                                                </select>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control"
                                                                       id="opposition_thana_write"
                                                                       name="opposition_thana_write"
                                                                       placeholder="Opposition Thana"
                                                                       value="{{ old('opposition_thana_write') }}">
                                                            </div>
                                                        </div>
                                                        @error('opposition_thana_write')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="opposition_representative_name" class="col-sm-4 col-form-label">Representative Name</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="opposition_representative_name"
                                                               name="opposition_representative_name"
                                                               value="{{old('opposition_representative_name')}}">
                                                        @error('opposition_representative_name')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="opposition_representative_details"
                                                           class="col-sm-4 col-form-label"> Representative Details </label>
                                                    <div class="col-sm-8">
                                                    <textarea name="opposition_representative_details" class="form-control"
                                                              rows="3"
                                                              placeholder="">{{old('opposition_representative_details')}}</textarea>
                                                        @error('opposition_representative_details')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="opposition_coordinator_tadbirkar_id"
                                                           class="col-sm-4 col-form-label"> Coordinator/Tadbirkar </label>
                                                    <div class="col-sm-8">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <select name="opposition_coordinator_tadbirkar_id"
                                                                        id="opposition_coordinator_tadbirkar_id"
                                                                        class="form-control select2">
                                                                    <option value="">Select</option>
                                                                    @foreach($coordinator as $item)
                                                                        <option
                                                                            value="{{ $item->id }}" {{ old('opposition_coordinator_tadbirkar_id') == $item->id ? 'selected' : '' }}>{{ $item->coordinator_name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control"
                                                                       id="opposition_coordinator_tadbirkar_write"
                                                                       name="opposition_coordinator_tadbirkar_write"
                                                                       placeholder="Tadbirkar Name"
                                                                       value="{{old('opposition_coordinator_tadbirkar_write')}}">
                                                            </div>
                                                        </div>
                                                        @error('coordinator_tadbirkar_id')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="opposition_coordinator_details"
                                                           class="col-sm-4 col-form-label"> Coordinator Details </label>
                                                    <div class="col-sm-8">
                                                    <textarea name="opposition_coordinator_details" class="form-control"
                                                              rows="3"
                                                              placeholder="">{{old('opposition_coordinator_details')}}</textarea>
                                                        @error('opposition_coordinator_details')<span
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
                                                <h6 class="text-uppercase text-bold"><u> Lawyer
                                                        Information </u></h6>
                                                <div class="form-group row">
                                                    <label for="lawyer_advocate_id" class="col-sm-4 col-form-label">Name
                                                        of
                                                        Advocate/Law Firm</label>
                                                    <div class="col-sm-8">
                                                        <select name="lawyer_advocate_id" id="lawyer_advocate_id" class="form-control select2" action="{{ route('find-associates') }}">
                                                            <option value="">Select</option>
                                                            @foreach($external_council as $item)
                                                                <option
                                                                    value="{{ $item->id }}" {{(old('lawyer_advocate_id') == $item->id ? 'selected':'')}}>{{ $item->first_name }} {{ $item->middle_name }} {{ $item->last_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('lawyer_advocate_id')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="assigned_lawyer_id" class="col-sm-4 col-form-label">Name of Assigned
                                                        Lawyer</label>
                                                    <div class="col-sm-8">
                                                        <select name="assigned_lawyer_id[]" id="assigned_lawyer_id" class="form-control select2" multiple>
                                                            <option value="">Select</option>

                                                        </select>
                                                        @error('assigned_lawyer_id')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="lawyers_remarks"
                                                           class="col-sm-4 col-form-label"> Remarks </label>
                                                    <div class="col-sm-8">
                                                    <textarea name="lawyers_remarks" class="form-control"
                                                              rows="3"
                                                              placeholder="">{{old('lawyers_remarks')}}</textarea>
                                                        @error('lawyers_remarks')<span
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
                                                    <label for="received_documents_id"
                                                           class="col-sm-4 col-form-label">
                                                        Received Documents </label>
                                                    <div class="col-sm-8">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <select name="received_documents_id[]"
                                                                        id="received_documents_id"
                                                                        class="form-control select2" multiple>
                                                                    <option value="">Select</option>
                                                                    @foreach($documents as $item)
                                                                        <option
                                                                            value="{{ $item->documents_name }}" {{ old('received_documents_id') == $item->id ? 'selected' : '' }}>{{ $item->documents_name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="input-group hdtuto_received_documents control-group increment_received_documents">
                                                                    <input type="text" name="received_documents_write[]"
                                                                           class="myfrm form-control col-12" placeholder="Received Documents">
                                                                    <div class="input-group-btn">
                                                                        <button class="btn btn-success btn_success_received_documents"
                                                                                type="button"><i
                                                                                class="fldemo glyphicon glyphicon-plus"></i>+
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <div class="clone_received_documents hide">
                                                                    <div class="hdtuto_received_documents control-group lst input-group"
                                                                         style="margin-top:10px">
                                                                        <input type="text" name="received_documents_write[]"
                                                                               class="myfrm form-control col-12">
                                                                        <div class="input-group-btn">
                                                                            <button class="btn btn-danger btn_danger_received_documents"
                                                                                    type="button"><i
                                                                                    class="fldemo glyphicon glyphicon-remove"></i> -
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        @error('received_documents_write')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="required_wanting_documents_id"
                                                           class="col-sm-4 col-form-label"> Required/Wanting
                                                        Documents </label>
                                                    <div class="col-sm-8">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <select name="required_wanting_documents_id[]"
                                                                        id="required_wanting_documents_id"
                                                                        class="form-control select2" multiple>
                                                                    <option value="">Select</option>
                                                                    @foreach($documents as $item)
                                                                        <option
                                                                            value="{{ $item->documents_name }}" {{ old('required_wanting_documents_id') == $item->id ? 'selected' : '' }}>{{ $item->documents_name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="input-group hdtuto_required_wanting_documents control-group increment_required_wanting_documents">
                                                                    <input type="text" name="required_wanting_documents_write[]"
                                                                           class="myfrm form-control col-12" placeholder="Required Documents">
                                                                    <div class="input-group-btn">
                                                                        <button class="btn btn-success btn_success_required_wanting_documents"
                                                                                type="button"><i
                                                                                class="fldemo glyphicon glyphicon-plus"></i>+
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <div class="clone_required_wanting_documents hide">
                                                                    <div class="hdtuto_required_wanting_documents control-group lst input-group"
                                                                         style="margin-top:10px">
                                                                        <input type="text" name="required_wanting_documents_write[]"
                                                                               class="myfrm form-control col-12">
                                                                        <div class="input-group-btn">
                                                                            <button class="btn btn-danger btn_danger_required_wanting_documents"
                                                                                    type="button"><i
                                                                                    class="fldemo glyphicon glyphicon-remove"></i> -
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        @error('required_wanting_documents')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

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
                                                                    value="{{ $item->id }}" {{(old('case_infos_division_id') == $item->id ? 'selected':'')}}>{{ ucfirst($item->division_name) }}</option>
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

                                                        </select>
                                                        @error('case_infos_thana_id')<span
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
                                                                    value="{{ $item->id }}" {{(old('case_category_id') == $item->id ? 'selected':'')}}>{{ $item->case_category }}</option>
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

                                                        </select>
                                                        @error('case_subcategory_id')<span
                                                            class="text-danger">{{$message}}</span>@enderror

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="case_infos_case_title_id"
                                                           class="col-sm-4 col-form-label">Case Title</label>
                                                    <div class="col-sm-8">
                                                        <select name="case_infos_case_title_id"
                                                                id="case_infos_case_title_id"
                                                                class="form-control select2">
                                                            <option value="">Select</option>
                                                            @foreach($case_title as $item)
                                                                <option
                                                                    value="{{ $item->id }}" {{(old('case_infos_case_title_id') == $item->id ? 'selected':'')}}>{{ $item->case_title_name }}</option>
                                                            @endforeach

                                                        </select>
                                                        @error('case_infos_case_title_id')<span
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
                                                                       value="{{old('case_infos_case_no')}}">
                                                                <input type="text" class="form-control col-5 ml-0"
                                                                       id="case_infos_case_year"
                                                                       name="case_infos_case_year[]" placeholder="Case Year"
                                                                       value="{{old('case_infos_case_year')}}">
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
                                                                           name="case_infos_case_no[]" placeholder="Case No."
                                                                           value="{{old('case_infos_case_no')}}">
                                                                    <input type="text" class="form-control col-5 ml-0"
                                                                           id="case_infos_case_year"
                                                                           name="case_infos_case_year[]" placeholder="Case Year"
                                                                           value="{{old('case_infos_case_year')}}">
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
                                                    <label for="case_infos_court_id"
                                                           class="col-sm-4 col-form-label"> Name
                                                        of the Court </label>
                                                    <div class="col-sm-8">
                                                        <select name="case_infos_court_id[]"
                                                                class="form-control select2" multiple>
                                                            <option value="">Select</option>
                                                            @foreach($court as $item)
                                                                <option
                                                                    value="{{ $item->court_name }}" {{(old('case_infos_court_id') == $item->id ? 'selected':'')}}>{{ $item->court_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('case_infos_court_id')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="case_infos_sub_seq_case_title_id"
                                                           class="col-sm-4 col-form-label">Sub Seq. Case Title</label>
                                                    <div class="col-sm-8">
                                                        <select name="case_infos_sub_seq_case_title_id"
                                                                id="case_infos_sub_seq_case_title_id"
                                                                class="form-control select2">
                                                            <option value="">Select</option>
                                                            @foreach($case_title as $item)
                                                                <option
                                                                    value="{{ $item->id }}" {{(old('case_infos_case_title_id') == $item->id ? 'selected':'')}}>{{ $item->case_title_name }}</option>
                                                            @endforeach

                                                        </select>
                                                        @error('case_infos_sub_seq_case_title_id')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="case_infos_case_no"
                                                           class="col-sm-4 col-form-label">Sub Seq. Case
                                                        No.</label>
                                                    <div class="col-sm-8">
                                                        <div class="input-group hdtuto_case_infos_sub_seq_case_no control-group increment_case_infos_sub_seq_case_no">
                                                            <input type="text" name="case_infos_sub_seq_case_no[]"
                                                                   class="myfrm form-control">
                                                            <div class="input-group-btn">
                                                                <button class="btn btn-success btn_success_case_infos_sub_seq_case_no"
                                                                        type="button"><i
                                                                        class="fldemo glyphicon glyphicon-plus"></i>+
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="clone_case_infos_sub_seq_case_no hide">
                                                            <div class="hdtuto_case_infos_sub_seq_case_no control-group lst input-group"
                                                                 style="margin-top:10px">
                                                                <input type="text" name="case_infos_sub_seq_case_no[]"
                                                                       class="myfrm form-control">
                                                                <div class="input-group-btn">
                                                                    <button class="btn btn-danger btn_danger_case_infos_sub_seq_case_no"
                                                                            type="button"><i
                                                                            class="fldemo glyphicon glyphicon-remove"></i> -
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @error('case_infos_sub_seq_case_no')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="case_infos_sub_seq_court_id"
                                                           class="col-sm-4 col-form-label"> Sub-Seq. Court </label>
                                                    <div class="col-sm-8">
                                                        <select name="case_infos_sub_seq_court_id[]"
                                                                class="form-control select2" multiple>
                                                            <option value="">Select</option>
                                                            @foreach($court as $item)
                                                                <option
                                                                    value="{{ $item->court_name }}" {{(old('case_infos_sub_seq_court_id') == $item->id ? 'selected':'')}}>{{ $item->court_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('case_infos_sub_seq_court_id')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="law_id" class="col-sm-4 col-form-label">
                                                        Law </label>
                                                    <div class="col-sm-8">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <select name="law_id[]"
                                                                        id="law_id"
                                                                        class="form-control select2" multiple>
                                                                    <option value="">Select</option>
                                                                    @foreach($law as $item)
                                                                        <option
                                                                            value="{{ $item->law_name }}" {{  old('law_id') == $item->id ? 'selected' : '' }}>{{ $item->law_name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="input-group hdtuto_law control-group increment_law">
                                                                    <input type="text" name="law_write[]"
                                                                           class="myfrm form-control col-12" placeholder="Law Name">
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
                                                                        <input type="text" name="law_write[]"
                                                                               class="myfrm form-control col-12">
                                                                        <div class="input-group-btn">
                                                                            <button class="btn btn-danger btn_danger_law"
                                                                                    type="button"><i
                                                                                    class="fldemo glyphicon glyphicon-remove"></i> -
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        @error('law')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="section_id" class="col-sm-4 col-form-label">
                                                        Section </label>
                                                    <div class="col-sm-8">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <select name="section_id[]"
                                                                        id="section_id"
                                                                        class="form-control select2" multiple>
                                                                    <option value="">Select</option>
                                                                    @foreach($section as $item)
                                                                        <option
                                                                            value="{{ $item->section_name }}" {{  old('section_id') == $item->id ? 'selected' : '' }}>{{ $item->section_name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="input-group hdtuto_section control-group increment_section">
                                                                    <input type="text" name="section_write[]"
                                                                           class="myfrm form-control col-12" placeholder="Section Name">
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
                                                                        <input type="text" name="section_write[]"
                                                                               class="myfrm form-control col-12">
                                                                        <div class="input-group-btn">
                                                                            <button class="btn btn-danger btn_danger_section"
                                                                                    type="button"><i
                                                                                    class="fldemo glyphicon glyphicon-remove"></i> -
                                                                            </button>
                                                                        </div>
                                                                    </div>
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
                                                    <span class="date_span">
                                                        <input type="date" class="xDateContainer date_first_input"
                                                               onchange="setCorrect(this,'xTime4');"><input type="text" id="xTime4"
                                                                                                            name="date_of_filing" value="dd/mm/yyyy"
                                                                                                            class="date_second_input"
                                                                                                            tabindex="-1"><span
                                                            class="date_second_span" tabindex="-1">&#9660;</span>
                                                    </span>
                                                        @error('date_of_filing')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="matter_id" class="col-sm-4 col-form-label">Case Matter</label>
                                                    <div class="col-sm-8">
                                                        <select name="matter_id"
                                                                class="form-control select2">
                                                            <option value="">Select</option>
                                                            @foreach($matter as $item)
                                                                <option
                                                                    value="{{ $item->id }}" {{(old('matter_id') == $item->id ? 'selected':'')}}>{{ $item->matter_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('matter_id')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="case_type_id" class="col-sm-4 col-form-label">Case Type </label>
                                                    <div class="col-sm-8">
                                                        <select name="case_type_id"
                                                                class="form-control select2">
                                                            <option value="">Select</option>
                                                            @foreach($case_types as $item)
                                                                <option
                                                                    value="{{ $item->id }}" {{(old('case_type_id') == $item->id ? 'selected':'')}}>{{ $item->case_types_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('case_type_id')<span
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
                                                                   class="myfrm form-control">
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

                                                        <div
                                                            class="input-group hdtuto_complainant_representative control-group increment_complainant_representative">
                                                            <input type="text" name="complainant_informant_representative[]"
                                                                   class="myfrm form-control">
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
                                                                   class="myfrm form-control">
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

                                                        <div
                                                            class="input-group hdtuto_accused_representative control-group increment_accused_representative">
                                                            <input type="text" name="case_infos_accused_representative[]"
                                                                   class="myfrm form-control">
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
                                                    <label for="prosecution_witness"
                                                           class="col-sm-4 col-form-label">Prosecution Witnesses</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control"
                                                               id="prosecution_witness"
                                                               name="prosecution_witness"
                                                               value="{{old('prosecution_witness')}}">
                                                        @error('prosecution_witness')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="defense_witness"
                                                           class="col-sm-4 col-form-label">Defense Witnesses</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control"
                                                               id="defense_witness"
                                                               name="defense_witness"
                                                               value="{{old('defense_witness')}}">
                                                        @error('defense_witness')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="case_infos_allegation_claim_id"
                                                           class="col-sm-4 col-form-label">
                                                        Allegation/Claim </label>
                                                    <div class="col-sm-8">

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                            <select name="case_infos_allegation_claim_id"
                                                                    class="form-control select2">
                                                                <option value="">Select</option>
                                                                @foreach($allegation as $item)
                                                                    <option
                                                                        value="{{ $item->id }}" {{(old('case_infos_allegation_claim_id') == $item->id ? 'selected':'')}}>{{ $item->allegation_name }}</option>
                                                                @endforeach
                                                            </select>
                                                            </div>
                                                            <div class="col-md-6">

                                                            <input type="text" class="form-control"
                                                                   id="case_infos_allegation_claim_write"
                                                                   name="case_infos_allegation_claim_write"
                                                                   placeholder="Allegation"
                                                                   value="{{old('case_infos_allegation_claim_write')}}">
                                                            </div>
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
                                                               value="{{old('amount_of_money')}}">
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
                                                              placeholder="">{{old('another_claim')}}</textarea>
                                                        @error('another_claim')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="recovery_seizure_articles" class="col-sm-4 col-form-label">
                                                        Recovery/Seizure Articles </label>
                                                    <div class="col-sm-8">
                                                    <textarea name="recovery_seizure_articles" class="form-control" rows="3"
                                                              placeholder="">{{old('recovery_seizure_articles')}}</textarea>
                                                        @error('recovery_seizure_articles')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="summary_facts" class="col-sm-4 col-form-label">
                                                        Summary
                                                        of Facts </label>
                                                    <div class="col-sm-8">
                                                    <textarea name="summary_facts" class="form-control" rows="3"
                                                              placeholder="">{{old('summary_facts')}}</textarea>
                                                        @error('summary_facts')<span
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
                                                              placeholder="">{{old('case_info_remarks')}}</textarea>
                                                        @error('case_info_remarks')<span
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
                                        class="fas fa-save"></i> Save
                                </button>
                            </div>
                        </div>

                    </div>

                </form>

                <!-- /.card -->
            </div>
        </section>


        <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->




@endsection




