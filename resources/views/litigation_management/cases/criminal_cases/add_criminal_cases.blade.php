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


                            {{--                        <div class="text-center mr-md-5">--}}
                            {{--                            <div class="custom-control custom-radio custom-control-inline">--}}
                            {{--                                <input type="checkbox" class="custom-control-input" id="original_case"--}}
                            {{--                                       name="original_case" value="Appeal Case">--}}
                            {{--                                <label class="custom-control-label" for="original_case">Original Case</label>--}}
                            {{--                            </div>--}}
                            {{--                            <div class="custom-control custom-radio custom-control-inline">--}}
                            {{--                                <input type="checkbox" class="custom-control-input" id="appeal_case"--}}
                            {{--                                       name="appeal_case" value="Appeal Case">--}}
                            {{--                                <label class="custom-control-label" for="appeal_case">Appeal Case</label>--}}
                            {{--                            </div>--}}
                            {{--                            <div class="custom-control custom-radio custom-control-inline">--}}
                            {{--                                <input type="checkbox" class="custom-control-input" id="revision_case"--}}
                            {{--                                       name="revision_case" value="Revision Case">--}}
                            {{--                                <label class="custom-control-label" for="revision_case">Revision--}}
                            {{--                                    Case</label>--}}
                            {{--                            </div>--}}
                            {{--                        </div>--}}
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
                                                                       id="legal_issue"
                                                                       name="legal_issue"
                                                                       placeholder="Legal Issue"
                                                                       value="{{ old('legal_issue') }}">
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
                                                                       id="legal_service"
                                                                       name="legal_service"
                                                                       placeholder="Legal Service"
                                                                       value="{{ old('legal_service') }}">
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

                                                        {{--                                                    <input type="date" class="form-control" id="next_date"--}}
                                                        {{--                                                           name="next_date" value="{{old('next_date')}}">--}}
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
                                                                       id="referrer"
                                                                       name="referrer"
                                                                       placeholder="Referrer"
                                                                       value="{{ old('referrer') }}">
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
                                                            @foreach ($party as $item)
                                                                <option
                                                                    value="{{ $item->id }}" {{(old('client_party_id') == $item->id ? 'selected':'')}}>{{ ucfirst($item->party_name) }}</option>
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
                                                                            value="{{ $item->id }}" {{  old('client_id') == $item->id ? 'selected' : '' }}>{{ $item->client_name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="input-group hdtuto_client control-group increment_client">
                                                                    <input type="text" name="client_name[]"
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
                                                                        <input type="text" name="client_name[]"
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
                                                    <label for="profession_id"
                                                           class="col-sm-4 col-form-label">Profession/Type</label>
                                                    <div class="col-sm-8">
                                                        <select name="profession_id"
                                                                class="form-control select2"
                                                                id="profession_id">
                                                            <option value="">Select</option>
                                                            @foreach ($profession as $item)
                                                                <option
                                                                    value="{{ $item->id }}" {{(old('profession_id') == $item->id ? 'selected':'')}}>{{ ucfirst($item->profession_name) }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('profession_id')<span
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
                                                                       id="client_divisoin"
                                                                       name="client_divisoin"
                                                                       placeholder="Client Division"
                                                                       value="{{ old('client_divisoin') }}">
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
                                                                       id="client_district"
                                                                       name="client_district"
                                                                       placeholder="Client District"
                                                                       value="{{ old('client_district') }}">
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
                                                                       id="client_thana"
                                                                       name="client_thana"
                                                                       placeholder="Client Thana"
                                                                       value="{{ old('client_thana') }}">
                                                            </div>
                                                        </div>
                                                        @error('client_thana_id')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="representative_name" class="col-sm-4 col-form-label">Representative Name</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="representative_name"
                                                               name="representative_name"
                                                               value="{{old('representative_name')}}">
                                                        @error('representative_name')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="representative_details"
                                                           class="col-sm-4 col-form-label"> Representative Details </label>
                                                    <div class="col-sm-8">
                                                    <textarea name="representative_details" class="form-control"
                                                              rows="3"
                                                              placeholder="">{{old('representative_details')}}</textarea>
                                                        @error('representative_details')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="coordinator_tadbirkar_id"
                                                           class="col-sm-4 col-form-label"> Coordinator/Tadbirkar </label>
                                                    <div class="col-sm-8">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <select name="coordinator_tadbirkar_id"
                                                                        id="coordinator_tadbirkar_id"
                                                                        class="form-control select2">
                                                                    <option value="">Select</option>
                                                                    @foreach($coordinator as $item)
                                                                        <option
                                                                            value="{{ $item->id }}" {{ old('coordinator_tadbirkar_id') == $item->id ? 'selected' : '' }}>{{ $item->coordinator_name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control"
                                                                       id="coordinator_tadbirkar_name"
                                                                       name="coordinator_tadbirkar_name"
                                                                       placeholder="Tadbirkar Name"
                                                                       value="{{old('coordinator_tadbirkar_name')}}">
                                                            </div>
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
                                                              placeholder="">{{old('coordinator_details')}}</textarea>
                                                        @error('coordinator_details')<span
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
                                                            @foreach ($party as $item)
                                                                <option
                                                                    value="{{ $item->id }}" {{(old('opposition_party_id') == $item->id ? 'selected':'')}}>{{ ucfirst($item->party_name) }}</option>
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
                                                    <label for="client_id" class="col-sm-4 col-form-label">Opposition
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
                                                                            value="{{ $item->id }}" {{  old('client_id') == $item->id ? 'selected' : '' }}>{{ $item->client_name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="input-group hdtuto_client control-group increment_client">
                                                                    <input type="text" name="client_name[]"
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
                                                                        <input type="text" name="client_name[]"
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
                                                              placeholder="">{{old('received_documents')}}</textarea>
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
                                                              placeholder="">{{old('required_wanting_documents')}}</textarea>
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
                                                                    value="{{ $item->id }}" {{(old('assigned_lawyer') == $item->id ? 'selected':'')}}>{{ $item->first_name }} {{ $item->middle_name }} {{ $item->last_name }}</option>
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
                                                                    value="{{ $item->first_name.' '.$item->middle_name.' '.$item->last_name }}" {{(old('assigned_lawyer') == $item->first_name.' '.$item->middle_name.' '.$item->last_name ? 'selected':'')}}>{{ $item->first_name }} {{ $item->middle_name }} {{ $item->last_name }}</option>
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
                                                              placeholder="">{{old('lawyers_remarks')}}</textarea>
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
                                                                    value="{{ $item->id }}" {{(old('case_status_id') == $item->id ? 'selected':'')}}>{{ $item->case_status_name }}</option>
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
                                                    <span class="date_span">
                                                        <input type="date" class="xDateContainer date_first_input"
                                                               onchange="setCorrect(this,'xTime3');"><input type="text" id="xTime3"
                                                                                                            name="status_next_date" value="dd/mm/yyyy"
                                                                                                            class="date_second_input"
                                                                                                            tabindex="-1"><span
                                                            class="date_second_span" tabindex="-1">&#9660;</span>
                                                    </span>
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
                                                                    value="{{ $item->id }}" {{(old('status_next_date_fixed_id') == $item->id ? 'selected':'')}}>{{ $item->next_date_reason_name }}</option>
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
                                                              placeholder="">{{old('status_remarks')}}</textarea>
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
                                                    <label for="name_of_the_court"
                                                           class="col-sm-4 col-form-label"> Name
                                                        of the Court </label>
                                                    <div class="col-sm-8">
                                                        <select name="name_of_the_court_id[]"
                                                                class="form-control select2" multiple>
                                                            <option value="">Select</option>
                                                            @foreach($court as $item)
                                                                <option
                                                                    value="{{ $item->id }}" {{(old('name_of_the_court_id') == $item->id ? 'selected':'')}}>{{ $item->court_name }}</option>
                                                            @endforeach
                                                        </select>
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
                                                    <label for="case_type_id" class="col-sm-4 col-form-label">Type
                                                        of
                                                        Cases </label>
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
                                                    <label for="case_infos_case_no"
                                                           class="col-sm-4 col-form-label">Case
                                                        No.</label>
                                                    <div class="col-sm-8">


                                                        <div
                                                            class="input-group hdtuto_case_infos_case_no control-group increment_case_infos_case_no ml-2">
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
                                                    <label for="law" class="col-sm-4 col-form-label">
                                                        Law </label>
                                                    <div class="col-sm-8">
                                                        <div class="input-group hdtuto_law control-group increment_law">
                                                            <input type="text" name="law[]"
                                                                   class="myfrm form-control">
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
                                                                   class="myfrm form-control">
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
                                                    <label for="matter_id" class="col-sm-4 col-form-label">Matter</label>
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
                                                                        value="{{ $item->id }}" {{(old('case_infos_allegation_claim_id') == $item->id ? 'selected':'')}}>{{ $item->allegation_name }}</option>
                                                                @endforeach
                                                            </select>
                                                            <input type="text" class="form-control col-6"
                                                                   id="case_infos_allegation_claim"
                                                                   name="case_infos_allegation_claim"
                                                                   placeholder="Allegation"
                                                                   value="{{old('case_infos_allegation_claim')}}">
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
                                                    <label for="date_of_arrest"
                                                           class="col-sm-4 col-form-label">Date of Arrest</label>
                                                    <div class="col-sm-8">
                                                    <span class="date_span">
                                                        <input type="date" class="xDateContainer date_first_input"
                                                               onchange="setCorrect(this,'xTime5');"><input type="text" id="xTime5"
                                                                                                            name="date_of_arrest" value="dd/mm/yyyy"
                                                                                                            class="date_second_input"
                                                                                                            tabindex="-1"><span
                                                            class="date_second_span" tabindex="-1">&#9660;</span>
                                                    </span>
                                                        @error('date_of_arrest')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="date_of_bill"
                                                           class="col-sm-4 col-form-label">
                                                        Date of Bill </label>
                                                    <div class="col-sm-8">
                                                    <span class="date_span">
                                                        <input type="date" class="xDateContainer date_first_input"
                                                               onchange="setCorrect(this,'xTime6');"><input type="text" id="xTime6"
                                                                                                            name="date_of_bill" value="dd/mm/yyyy"
                                                                                                            class="date_second_input"
                                                                                                            tabindex="-1"><span
                                                            class="date_second_span" tabindex="-1">&#9660;</span>
                                                    </span>
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
                                                              placeholder="">{{old('case_info_remarks')}}</textarea>
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
                                                    <span class="date_span">
                                                        <input type="date" class="xDateContainer date_first_input"
                                                               onchange="setCorrect(this,'xTime7');"><input type="text" id="xTime7"
                                                                                                            name="judgement_date_of_filing"
                                                                                                            value="dd/mm/yyyy"
                                                                                                            class="date_second_input"
                                                                                                            tabindex="-1"><span
                                                            class="date_second_span" tabindex="-1">&#9660;</span>
                                                    </span>
                                                        @error('judgement_date_of_filing')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="date_of_cognizance"
                                                           class="col-sm-4 col-form-label"> Date of Cognizance </label>
                                                    <div class="col-sm-8">
                                                    <span class="date_span">
                                                        <input type="date" class="xDateContainer date_first_input"
                                                               onchange="setCorrect(this,'date_of_cognizance');"><input type="text"
                                                                                                                        id="date_of_cognizance"
                                                                                                                        name="date_of_cognizance"
                                                                                                                        value="dd/mm/yyyy"
                                                                                                                        class="date_second_input"
                                                                                                                        tabindex="-1"><span
                                                            class="date_second_span" tabindex="-1">&#9660;</span>
                                                    </span>
                                                        @error('date_of_cognizance')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="date_of_court_transfer"
                                                           class="col-sm-4 col-form-label"> Date of Court Transfer </label>
                                                    <div class="col-sm-8">
                                                    <span class="date_span">
                                                        <input type="date" class="xDateContainer date_first_input"
                                                               onchange="setCorrect(this,'date_of_court_transfer');"><input type="text"
                                                                                                                            id="date_of_court_transfer"
                                                                                                                            name="date_of_court_transfer"
                                                                                                                            value="dd/mm/yyyy"
                                                                                                                            class="date_second_input"
                                                                                                                            tabindex="-1"><span
                                                            class="date_second_span" tabindex="-1">&#9660;</span>
                                                    </span>
                                                        @error('date_of_court_transfer')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="date_of_charge_framed"
                                                           class="col-sm-4 col-form-label"> Date of Charge Framed </label>
                                                    <div class="col-sm-8">
                                                    <span class="date_span">
                                                        <input type="date" class="xDateContainer date_first_input"
                                                               onchange="setCorrect(this,'date_of_charge_framed');"><input type="text"
                                                                                                                           id="date_of_charge_framed"
                                                                                                                           name="date_of_charge_framed"
                                                                                                                           value="dd/mm/yyyy"
                                                                                                                           class="date_second_input"
                                                                                                                           tabindex="-1"><span
                                                            class="date_second_span" tabindex="-1">&#9660;</span>
                                                    </span>
                                                        @error('date_of_charge_framed')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="date_of_witness_from"
                                                           class="col-sm-4 col-form-label"> Date of Witness(From) </label>
                                                    <div class="col-sm-8">
                                                    <span class="date_span">
                                                        <input type="date" class="xDateContainer date_first_input"
                                                               onchange="setCorrect(this,'date_of_witness_from');"><input type="text"
                                                                                                                          id="date_of_witness_from"
                                                                                                                          name="date_of_witness_from"
                                                                                                                          value="dd/mm/yyyy"
                                                                                                                          class="date_second_input"
                                                                                                                          tabindex="-1"><span
                                                            class="date_second_span" tabindex="-1">&#9660;</span>
                                                    </span>

                                                        @error('date_of_witness_from')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="date_of_witness_to"
                                                           class="col-sm-4 col-form-label"> Date of Witness(To) </label>
                                                    <div class="col-sm-8">
                                                    <span class="date_span">
                                                        <input type="date" class="xDateContainer date_first_input"
                                                               onchange="setCorrect(this,'date_of_witness_to');"><input type="text"
                                                                                                                        id="date_of_witness_to"
                                                                                                                        name="date_of_witness_to"
                                                                                                                        value="dd/mm/yyyy"
                                                                                                                        class="date_second_input"
                                                                                                                        tabindex="-1"><span
                                                            class="date_second_span" tabindex="-1">&#9660;</span>
                                                    </span>
                                                        @error('date_of_witness_to')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="date_of_argument"
                                                           class="col-sm-4 col-form-label"> Date of Argument </label>
                                                    <div class="col-sm-8">
                                                    <span class="date_span">
                                                        <input type="date" class="xDateContainer date_first_input"
                                                               onchange="setCorrect(this,'date_of_argument');"><input type="text"
                                                                                                                      id="date_of_argument"
                                                                                                                      name="date_of_bill"
                                                                                                                      value="dd/mm/yyyy"
                                                                                                                      class="date_second_input"
                                                                                                                      tabindex="-1"><span
                                                            class="date_second_span" tabindex="-1">&#9660;</span>
                                                    </span>

                                                        @error('date_of_argument')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="date_of_judgement_order"
                                                           class="col-sm-4 col-form-label"> Date of Judgement &
                                                        Order </label>
                                                    <div class="col-sm-8">
                                                    <span class="date_span">
                                                        <input type="date" class="xDateContainer date_first_input"
                                                               onchange="setCorrect(this,'date_of_judgement_order');"><input type="text"
                                                                                                                             id="date_of_judgement_order"
                                                                                                                             name="date_of_bill"
                                                                                                                             value="dd/mm/yyyy"
                                                                                                                             class="date_second_input"
                                                                                                                             tabindex="-1"><span
                                                            class="date_second_span" tabindex="-1">&#9660;</span>
                                                    </span>
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
                                                              placeholder="">{{old('summary_judgement_order')}}</textarea>
                                                        @error('summary_judgement_order')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="judgement_remarks" class="col-sm-4 col-form-label">
                                                        Remarks </label>
                                                    <div class="col-sm-8">
                                                    <textarea name="judgement_remarks" class="form-control" rows="3"
                                                              placeholder="">{{old('judgement_remarks')}}</textarea>
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
                            {{--                                                           value="{{old('appeal_original_case_no')}}">--}}
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




