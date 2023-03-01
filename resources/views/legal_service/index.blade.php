@extends('layouts.admin_layouts.admin_layout')
@section('content')
    <!-- jQuery library -->
    <style>
        p {
            color: grey
        }

        #heading {
            text-transform: uppercase;
            color: #3AAFA9;
            font-weight: normal
        }

        #msform {
            text-align: center;
            position: relative;
            margin-top: 20px
        }

        #msform fieldset {
            background: white;
            border: 0 none;
            border-radius: 0.5rem;
            box-sizing: border-box;
            width: 100%;
            margin: 0;
            padding-bottom: 20px;
            position: relative
        }

        .form-card {
            text-align: left
        }

        #msform fieldset:not(:first-of-type) {
            display: none
        }

        #msform .action-button {
            width: 100px;
            background: #3AAFA9;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 0px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 0px 10px 5px;
            float: right
        }

        #msform .action-button:hover,
        #msform .action-button:focus {
            background-color: #3AAFA9
        }

        .action-button-previous {
            width: 100px;
            background: #616161;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 0px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 5px 10px 0px;
            float: right
        }

        #msform .submit-button-previous {
            width: 100px;
            background: #e47b7ba8;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 0px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 5px 10px 0px;
            float: right
        }

        #msform .action-button-previous:hover,
        #msform .action-button-previous:focus {
            background-color: #000000
        }



        .fs-title {
            font-size: 25px;
            color: #3AAFA9;
            margin-bottom: 15px;
            font-weight: normal;
            text-align: left
        }

        .purple-text {
            color: #3AAFA9;
            font-weight: normal
        }

        .steps {
            font-size: 25px;
            color: gray;
            margin-bottom: 10px;
            font-weight: normal;
            text-align: right
        }

        .fieldlabels {
            color: gray;
            text-align: left
        }

        #progressbar {
            margin-bottom: 30px;
            overflow: hidden;
            color: lightgrey
        }

        #progressbar .active {
            color: #3AAFA9
        }

        #progressbar li {
            list-style-type: none;
            font-size: 15px;
            width: 190px;
            padding-left: 120px;
            float: left;
            position: relative;
            font-weight: 400;

        }

        #progressbar #account:before {
            font-family: FontAwesome;
            content: "\f13e"
        }

        #progressbar #personal:before {
            font-family: FontAwesome;
            content: "\f007"
        }

        #progressbar #payment:before {
            font-family: FontAwesome;
            content: "\f030"
        }

        #progressbar #confirm:before {
            font-family: FontAwesome;
            content: "\f00c"
        }

        #progressbar li:before {
            width: 180px;
            height: 38px;
            line-height: 45px;
            display: block;
            font-size: 20px;
            color: #ffffff;
            background: lightgray;
            border-radius: 2%;
            margin: 0 auto 10px auto;
            padding: 2px
        }

        #progressbar li:after {
            content: '';
            width: 100%;
            height: 2px;
            background: lightgray;
            position: absolute;
            left: 0;
            top: 25px;
            z-index: -1
        }

        #progressbar li.active:before,
        #progressbar li.active:after {
            background: #3AAFA9
        }

        .progress {
            height: 20px
        }

        .progress-bar {
            background-color: #3AAFA9
        }

        .fit-image {
            width: 100%;
            object-fit: cover
        }

        .form-body {
            margin: 10px;
            padding: 100px;
            width: 2800px;
            height: 100%;
        }

        .card-header {
            height: 60px;
        }
    </style>

    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Billing</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">
                                <a class="leading-normal inline-flex items-center font-normal spark-button-focus h-8 text-md px-4 bg-transparent border-0 border-solid text-blue-700 hover:text-blue-800 active:text-blue-700 rounded-md"
                                    type="button" href="{{ route('billings') }}" aria-readonly="false" role="link"
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
                <div class="card">
                    <div class="card-header">
                        <h3 style="padding-top:15px;font-weight:bold "> General Legal Setvices</h3>
                    </div>
                    <div class="row ">
                        <div class="col-12 p-5">
                            <form action="{{ route('save-legal-services') }}" method="post" enctype="multipart/form-data"
                                id="msform">
                                @csrf
                                <!-- progressbar -->
                                <ul id="progressbar">
                                    <li class="active" id="account"><strong>Service Info</strong></li>
                                    {{-- <li id="personal"><strong>Service Status</strong></li> --}}
                                    <li id="payment"><strong>Events & Stages</strong></li>
                                    <li id="confirm"><strong>Party info</strong></li>
                                    <li id="payment"><strong>Lawyer Info</strong></li>
                                    <li id="confirm"><strong>Service Doc</strong></li>
                                </ul>

                                <fieldset>
                                    <div class="form-card">
                                        <div class="row">
                                            <div class="col-7">
                                                <h2 class="fs-title">Account Information:</h2>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">

                                                <div class="form-group row">

                                                    <div class="col-sm-6">
                                                        <label for="case_infos_division_id" class=" col-form-label">Service
                                                            Category</label>
                                                        <select name="case_infos_division_id" class="form-control select2"
                                                            id="case_infos_division_id"
                                                            action="{{ route('find_district') }}">
                                                            <option value="">Select</option>
                                                            @foreach ($legal_service_category as $item)
                                                                <option value="{{ $item->id }}"
                                                                    {{ old('legal_service_category_id') == $item->id ? 'selected' : '' }}>
                                                                    {{ ucfirst($item->legal_service_category) }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('case_infos_division_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="case_infos_division_id" class=" col-form-label">Service
                                                            Type</label>
                                                        <select name="case_infos_division_id" class="form-control select2"
                                                            id="case_infos_division_id"
                                                            action="{{ route('find_district') }}">
                                                            <option value="">Select</option>
                                                            @foreach ($legal_service_type as $item)
                                                                <option value="{{ $item->id }}"
                                                                    {{ old('legal_service_type_id') == $item->id ? 'selected' : '' }}>
                                                                    {{ ucfirst($item->legal_service_type) }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('case_infos_division_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">

                                                    <div class="col-sm-6">
                                                        <label for="case_infos_division_id"
                                                            class=" col-form-label">Division</label>
                                                        <select name="case_infos_division_id" class="form-control select2"
                                                            id="case_infos_division_id"
                                                            action="{{ route('find_district') }}">
                                                            <option value="">Select</option>
                                                            @foreach ($division as $item)
                                                                <option value="{{ $item->id }}"
                                                                    {{ old('case_infos_division_id') == $item->id ? 'selected' : '' }}>
                                                                    {{ ucfirst($item->division_name) }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('case_infos_division_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>


                                                    <div class="col-sm-6">
                                                        <label for="case_infos_district_id"
                                                            class=" col-form-label">District</label>
                                                        <select name="client_district_id" id="client_district_id"
                                                            class="form-control select2"
                                                            action="{{ route('find-thana') }}">
                                                            <option value="">Select</option>

                                                        </select>
                                                        @error('case_infos_district_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">

                                                    <div class="col-sm-6">
                                                        <div class="row">
                                                            <div class="col-11">
                                                                <label for="case_infos_district_id"
                                                                    class=" col-form-label">Service Mater</label>
                                                                <select name="service_matter_id"
                                                                    class="form-control select2"
                                                                    id="case_infos_division_id">
                                                                    <option value="">Select</option>
                                                                    @foreach ($service_matter as $item)
                                                                        <option value="{{ $item->id }}"
                                                                            {{ old('service_matter_id') == $item->id ? 'selected' : '' }}>
                                                                            {{ ucfirst($item->matter_name) }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('case_infos_district_id')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="input-group-btn col-1" style="padding-top:27px ">

                                                                <button
                                                                    class="btn btn-success btn_success_case_infos_sub_seq_case_no ml-2"
                                                                    type="button"><i
                                                                        class="fldemo glyphicon glyphicon-plus"></i>+
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <label for="case_infos_district_id" class=" col-form-label">Police
                                                            Station</label>

                                                        <select name="client_thana_id" id="client_thana_id"
                                                            class="form-control select2">
                                                            <option value="">Select</option>

                                                        </select>
                                                        @error('client_thana_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror

                                                    </div>
                                                </div>


                                                <div class="form-group row" style="padding: -10px!important;">

                                                    <div class="col-sm-6">
                                                        <div class="row">
                                                            <div class="col-11">
                                                                <label for="case_infos_district_id"
                                                                    class=" col-form-label">Dispute</label>
                                                                <select name="dispute_id" class="form-control select2"
                                                                    id="case_infos_division_id">
                                                                    <option value="">Select</option>
                                                                    @foreach ($dispute as $item)
                                                                        <option value="{{ $item->id }}"
                                                                            {{ old('dispute_id') == $item->id ? 'selected' : '' }}>
                                                                            {{ ucfirst($item->dispute_name) }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('case_infos_district_id')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="input-group-btn col-1" style="padding-top:27px ">

                                                                <button
                                                                    class="btn btn-success btn_success_case_infos_sub_seq_case_no ml-2"
                                                                    type="button"><i
                                                                        class="fldemo glyphicon glyphicon-plus"></i>+
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-sm-6">
                                                        <label for="case_infos_district_id" class="form-label">Claim
                                                            Amount /Prayer
                                                        </label>

                                                        <input type="text" class="form-control" name="claim_amount"
                                                            placeholder=" Type Claim Amount">
                                                        @error('case_infos_thana_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-6">
                                                        <label for="case_prayer_id" class="form-label">Service Description
                                                        </label>
                                                        <input type="text" name="service_description"
                                                            class="myfrm form-control ml-2 mr-2" placeholder="type">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="case_type_id" class="col-form-label">Other Claim(if
                                                            any)
                                                        </label>
                                                        <input type="text" class="form-control" name="other_claim"
                                                            placeholder=" Type ">
                                                        @error('case_type_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">

                                                    <div class="col-sm-6">
                                                        <label for="case_infos_district_id"
                                                            class=" col-form-label">Receive Date & Time
                                                        </label>

                                                        <input type="date" class="form-control"
                                                            id="case_infos_case_year" name="received_date">
                                                        @error('case_infos_thana_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror

                                                    </div>


                                                    <div class="col-sm-6">
                                                        <label for="case_type_id" class="col-form-label">Received From
                                                        </label>
                                                        <select name="received_from_id" class="form-control select2"
                                                            id="case_infos_division_id">
                                                            <option value="">Select</option>
                                                            @foreach ($received_from as $item)
                                                                <option value="{{ $item->id }}"
                                                                    {{ old('received_from_id') == $item->id ? 'selected' : '' }}>
                                                                    {{ ucfirst($item->received_from) }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('case_type_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                </div>



                                                <div class="form-group row">
                                                    <div class="col-sm-6">
                                                        <label for="case_type_id" class="col-form-label">Mode of Received
                                                        </label>
                                                        <select name="received_mode_id" class="form-control select2"
                                                            id="case_infos_division_id">
                                                            <option value="">Select</option>
                                                            @foreach ($received_mode as $item)
                                                                <option value="{{ $item->id }}"
                                                                    {{ old('received_mode_id') == $item->id ? 'selected' : '' }}>
                                                                    {{ ucfirst($item->received_mode) }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('case_type_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="case_prayer_id" class="form-label">Received By</label>
                                                        <select name="received_by_id" class="form-control select2"
                                                            id="case_infos_division_id">
                                                            <option value="">Select</option>
                                                            @foreach ($received_by as $item)
                                                                <option value="{{ $item->id }}"
                                                                    {{ old('received_by_id') == $item->id ? 'selected' : '' }}>
                                                                    {{ ucfirst($item->received_by) }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                </div>
                                                {{-- <div class="form-group row">
                                                    <div class="col-sm-6">
                                                        <label for="case_type_id" class="col-form-label">Client Name
                                                        </label>
                                                        <select name="case_type_id" id="case_type_id"
                                                            class="form-control select2">
                                                            <option value="">Select</option>
                                                        </select>
                                                        @error('case_type_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="case_prayer_id" class="form-label">Opponent
                                                            Name</label>
                                                        <input type="text" name="received_documents_date"
                                                            class="form-control">
                                                    </div>

                                                </div> --}}
                                                {{-- <div class="form-group row">
                                                    <div class="col-sm-6">
                                                        <label for="case_type_id" class="col-form-label">Client
                                                            Coordinator
                                                        </label>
                                                        <input type="text" name="received_documents_date"
                                                            class="form-control">
                                                        @error('case_type_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="case_prayer_id" class="form-label">Refferrer
                                                            Details</label>
                                                        <input type="text" name="received_documents_date"
                                                            class="form-control">
                                                    </div>

                                                </div> --}}
                                                <div class="form-group row">
                                                    <div class="col-sm-6">
                                                        <label for="case_type_id" class="col-form-label">Legal Service
                                                            Required
                                                        </label>
                                                        <select name="legal_service_id" class="form-control select2"
                                                            id="case_infos_division_id">
                                                            <option value="">Select</option>
                                                            @foreach ($legal_service as $item)
                                                                <option value="{{ $item->id }}"
                                                                    {{ old('legal_service_id') == $item->id ? 'selected' : '' }}>
                                                                    {{ ucfirst($item->legal_service_name) }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('case_type_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror

                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="case_prayer_id" class="form-label">Law</label>
                                                        <select name="received_by_id" class="form-control select2"
                                                            id="case_infos_division_id">
                                                            <option value="">Select</option>
                                                            @foreach ($law as $item)
                                                                <option value="{{ $item->id }}"
                                                                    {{ old('law_id') == $item->id ? 'selected' : '' }}>
                                                                    {{ ucfirst($item->law_name) }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('case_type_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-sm-6">
                                                        <label for="case_type_id" class="col-form-label">Previous
                                                            Dispute(if any)
                                                        </label>
                                                        <input type="text" name="previous_dispute"
                                                            class="form-control">
                                                        @error('case_type_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="case_prayer_id" class="form-label">Section</label>
                                                        <select name="section_id" class="form-control select2"
                                                            id="case_infos_division_id">
                                                            <option value="">Select</option>
                                                            @foreach ($section as $item)
                                                                <option value="{{ $item->id }}"
                                                                    {{ old('section_id') == $item->id ? 'selected' : '' }}>
                                                                    {{ ucfirst($item->section_name) }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('case_type_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                </div>
                                                <div class="form-group row">
                                                    <label for="case_infos_case_titel_sort_id"
                                                        class="col-form-label">Summary Of Facts</label>
                                                    <textarea class="form-control" name="summary_of_fact" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                    @error('case_type_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <label for="case_infos_division_id"
                                                            class=" col-form-label">Special Note
                                                        </label>
                                                        <textarea class="form-control" name="special_note" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                        @error('case_infos_division_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="case_infos_case_no" class="col-form-label">Reference
                                                        Case/Issue Info
                                                    </label>
                                                    <textarea class="form-control" name="reference_case" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                    @error('case_type_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>




                                            </div>

                                        </div>
                                    </div> <input type="button" name="next" class="next action-button"
                                        value="Next" />
                                </fieldset>
                                {{-- <fieldset>
                                    <div class="form-card">
                                        <div class="row">
                                            <div class="col-7">
                                                <h2 class="fs-title">Running Service Status:</h2>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">

                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <label for="case_infos_division_id"
                                                            class=" col-form-label">Service
                                                            Category</label>
                                                        <input class="form-control" type="text" name="">
                                                        @error('case_infos_division_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <label for="case_infos_division_id" class=" col-form-label">
                                                            Progress Status</label>
                                                        <input class="form-control" type="text" name="">
                                                        @error('case_infos_division_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <label for="case_infos_division_id"
                                                            class=" col-form-label">Received Date & time
                                                        </label>
                                                        <input class="form-control" type="date" name="">
                                                        @error('case_infos_division_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <label for="case_infos_division_id"
                                                            class=" col-form-label">Received From
                                                        </label>
                                                        <select name="case_type_id" id="case_type_id"
                                                            class="form-control select2">
                                                            <option value="">Select</option>
                                                        </select>
                                                        @error('case_infos_division_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <label for="case_infos_division_id"
                                                            class=" col-form-label">Received By
                                                        </label>
                                                        <select name="case_type_id" id="case_type_id"
                                                            class="form-control select2">
                                                            <option value="">Select</option>
                                                        </select>
                                                        @error('case_infos_division_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <label for="case_infos_division_id" class=" col-form-label">
                                                            Progress Status</label>
                                                        <input class="form-control" type="text" name="">
                                                        @error('case_infos_division_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-card">
                                        <div class="row">
                                            <div class="col-7">
                                                <h2 class="fs-title">Completed Service Status:</h2>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">

                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <label for="case_infos_division_id"
                                                            class=" col-form-label">Service Timeline / Deadline
                                                        </label>
                                                        <input class="form-control" type="date" name="">
                                                        @error('case_infos_division_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <label for="case_infos_division_id"
                                                            class=" col-form-label">Service Completed
                                                        </label>
                                                        <input class="form-control" type="date" name="">
                                                        @error('case_infos_division_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <label for="case_infos_division_id"
                                                            class=" col-form-label">Service Timeline Delivered
                                                        </label>
                                                        <input class="form-control" type="date" name="">
                                                        @error('case_infos_division_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>


                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <label for="case_infos_division_id"
                                                            class=" col-form-label">Delivery Mode
                                                        </label>
                                                        <select name="case_type_id" id="case_type_id"
                                                            class="form-control select2">
                                                            <option value="">Select</option>
                                                        </select>
                                                        @error('case_infos_division_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <label for="case_infos_division_id"
                                                            class=" col-form-label">Delivered to
                                                        </label>
                                                        <select name="case_type_id" id="case_type_id"
                                                            class="form-control select2">
                                                            <option value="">Select</option>
                                                        </select>
                                                        @error('case_infos_division_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <label for="case_infos_division_id"
                                                            class=" col-form-label">Service /Evidence Type
                                                        </label>
                                                        <select name="case_type_id" id="case_type_id"
                                                            class="form-control select2">
                                                            <option value="">Select</option>
                                                        </select>
                                                        @error('case_infos_division_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <label for="case_infos_division_id" class=" col-form-label">Note
                                                        </label>
                                                        <input class="form-control" type="date" name="">
                                                        @error('case_infos_division_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="button" name="next" class="next action-button" value="Next" />
                                    <input type="button" name="previous" class="previous action-button-previous"
                                        value="Previous" />
                                </fieldset> --}}
                                <fieldset>
                                    <div class="form-card">
                                        <div class="row">
                                            <div class="col-7">
                                                <h2 class="fs-title">Case Events & incidents </h2>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">

                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <label for="case_infos_division_id" class=" col-form-label"> Date
                                                        </label>
                                                        <input class="form-control" type="date"
                                                            name="case_event_date">
                                                        @error('case_infos_division_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <label for="case_infos_division_id" class=" col-form-label">Title
                                                        </label>
                                                        <input class="form-control" type="text"
                                                            name="case_event_title">
                                                        @error('case_infos_division_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <label for="case_infos_division_id" class=" col-form-label">
                                                            Description </label>
                                                        <input class="form-control" type="text"
                                                            name="case_event_description">
                                                        @error('case_infos_division_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <label for="case_infos_division_id" class=" col-form-label">
                                                            Evidence </label>
                                                        <input class="form-control" type="text"
                                                            name="case_event_evidence">
                                                        @error('case_infos_division_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-card">
                                        <div class="row">
                                            <div class="col-7">
                                                <h2 class="fs-title">Service Stages (Steps):</h2>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">

                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <label for="case_infos_division_id" class=" col-form-label">Stage
                                                        </label>
                                                        <input class="form-control" type="text"
                                                            name="steps_application_filed"
                                                            placeholder="Type Application Filed">
                                                        @error('case_infos_division_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <label for="case_infos_division_id" class=" col-form-label"> Date
                                                        </label>
                                                        <input class="form-control" type="date" name="steps_date">
                                                        @error('case_infos_division_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <label for="case_infos_division_id" class=" col-form-label">Note
                                                        </label>
                                                        <input class="form-control" type="text" name="steps_note"
                                                            placeholder="Type Note">
                                                        @error('case_infos_division_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <label for="case_infos_division_id" class=" col-form-label"> Next
                                                            Stage
                                                        </label>
                                                        <input class="form-control" type="text" name="next_stage"
                                                            placeholder="Type next Stage">
                                                        @error('case_infos_division_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <label for="case_infos_division_id" class=" col-form-label">
                                                            Evidence
                                                        </label>
                                                        <input class="form-control" type="date" name="steps_evidence"
                                                            placeholder="Type Evidence">
                                                        @error('case_infos_division_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <input type="button" name="next" class="next action-button" value="Next" />
                                    <input type="button" name="previous" class="previous action-button-previous"
                                        value="Previous" />
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <div class="row">
                                            <div class="col-7">
                                                <h2 class="fs-title"> Client Information</h2>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">

                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <label for="case_infos_division_id" class=" col-form-label">Client
                                                            (On behalf of)
                                                        </label>
                                                        <select name="client_id" class="form-control select2"
                                                            id="client_party_id">
                                                            <option value="">Select</option>
                                                            @foreach ($client as $item)
                                                                <option value="{{ $item->id }}"
                                                                    {{ old('client_id') == $item->id ? 'selected' : '' }}>
                                                                    {{ $item->client_name }} </option>
                                                            @endforeach
                                                        </select>
                                                        @error('client_party_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    {{-- <div class="col-sm-3">
                                                        <label for="case_infos_division_id"
                                                            class=" col-form-label">Division
                                                        </label>
                                                        <input class="form-control" type="text" name=""
                                                            placeholder="type">
                                                        @error('case_infos_division_id')
                                                            <span class="text-danger">{{ $message }} </span>
                                                        @enderror
                                                    </div> --}}
                                                    {{-- <div class="col-sm-3">
                                                        <label for="case_infos_division_id" class=" col-form-label">Zone
                                                        </label>
                                                        <input class="form-control" type="text" name=""
                                                            placeholder="type">
                                                        @error('case_infos_division_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div> --}}
                                                </div>
                                                {{-- <div class="form-group row">

                                                    <div class="col-sm-6">
                                                        <label for="case_infos_division_id" class=" col-form-label">Client
                                                            Category
                                                        </label>
                                                        <select name="client_party_id" class="form-control select2"
                                                            id="client_party_id">
                                                            <option value="">Select</option>
                                                            @foreach ($in_favour_of as $item)
                                                                <option value="{{ $item->id }}"
                                                                    {{ old('client_party_id') == $item->id ? 'selected' : '' }}>
                                                                    {{ $item->in_favour_of_name }} </option>
                                                            @endforeach
                                                        </select>
                                                        @error('client_party_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label for="case_infos_division_id"
                                                            class=" col-form-label">District
                                                        </label>
                                                        <input class="form-control" type="text" name=""
                                                            placeholder="type">
                                                        @error('case_infos_division_id')
                                                            <span class="text-danger">{{ $message }} </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label for="case_infos_division_id" class=" col-form-label">Area
                                                        </label>
                                                        <input class="form-control" type="text" name=""
                                                            placeholder="type">
                                                        @error('case_infos_division_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div> --}}
                                                {{-- <div class="form-group row">

                                                    <div class="col-sm-6">
                                                        <label for="case_infos_division_id" class=" col-form-label">Client
                                                            Sub-Category
                                                        </label>
                                                        <select name="client_party_id" class="form-control select2"
                                                            id="client_party_id">
                                                            <option value="">Select</option>
                                                            @foreach ($in_favour_of as $item)
                                                                <option value="{{ $item->id }}"
                                                                    {{ old('client_party_id') == $item->id ? 'selected' : '' }}>
                                                                    {{ $item->in_favour_of_name }} </option>
                                                            @endforeach
                                                        </select>
                                                        @error('client_party_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label for="case_infos_division_id" class=" col-form-label">Police
                                                            Station
                                                        </label>
                                                        <input class="form-control" type="text" name=""
                                                            placeholder="type">
                                                        @error('case_infos_division_id')
                                                            <span class="text-danger">{{ $message }} </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label for="case_infos_division_id" class=" col-form-label">Branch
                                                        </label>
                                                        <input class="form-control" type="text" name=""
                                                            placeholder="type">
                                                        @error('case_infos_division_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div> --}}
                                                {{-- <div class="form-group row">

                                                    <div class="col-sm-6">
                                                        <label for="case_infos_division_id" class=" col-form-label">Client
                                                            Group
                                                        </label>
                                                        <input class="form-control" type="text" name=""
                                                            placeholder="type">

                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="case_infos_division_id" class=" col-form-label">Client
                                                            Profession
                                                        </label>
                                                        <input class="form-control" type="text" name=""
                                                            placeholder="type">
                                                        @error('case_infos_division_id')
                                                            <span class="text-danger">{{ $message }} </span>
                                                        @enderror
                                                    </div>
                                                </div> --}}
                                                {{-- <div class="form-group row">

                                                    <div class="col-sm-6">
                                                        <label for="case_infos_division_id" class=" col-form-label">Client
                                                            Business Name
                                                        </label>
                                                        <input class="form-control" type="text" name=""
                                                            placeholder="type">

                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="case_infos_division_id" class=" col-form-label">Client
                                                            Communication
                                                        </label>
                                                        <input class="form-control" type="text" name=""
                                                            placeholder="type">
                                                        @error('case_infos_division_id')
                                                            <span class="text-danger">{{ $message }} </span>
                                                        @enderror
                                                    </div>
                                                </div> --}}
                                                {{-- <div class="form-group row">

                                                    <div class="col-sm-3">
                                                        <label for="case_infos_division_id" class=" col-form-label">Client
                                                            Name
                                                        </label>
                                                        <input class="form-control" type="text" name=""
                                                            placeholder="type">

                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label for="case_infos_division_id" class=" col-form-label">Client
                                                            Mobile
                                                        </label>
                                                        <input class="form-control" type="text" name=""
                                                            placeholder="type">

                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label for="case_infos_division_id" class=" col-form-label">Client
                                                            Email
                                                        </label>
                                                        <input class="form-control" type="text" name=""
                                                            placeholder="type">
                                                        @error('case_infos_division_id')
                                                            <span class="text-danger">{{ $message }} </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label for="case_infos_division_id"
                                                            class=" col-form-label">Address
                                                        </label>
                                                        <input class="form-control" type="text" name=""
                                                            placeholder="type">
                                                        @error('case_infos_division_id')
                                                            <span class="text-danger">{{ $message }} </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">

                                                    <div class="col-sm-3">
                                                        <label for="case_infos_division_id" class=" col-form-label">Client
                                                            Representative Name
                                                        </label>
                                                        <input class="form-control" type="text" name=""
                                                            placeholder="type">

                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label for="case_infos_division_id" class=" col-form-label">
                                                            Mobile
                                                        </label>
                                                        <input class="form-control" type="text" name=""
                                                            placeholder="type">

                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label for="case_infos_division_id" class=" col-form-label"> Email
                                                        </label>
                                                        <input class="form-control" type="text" name=""
                                                            placeholder="type">
                                                        @error('case_infos_division_id')
                                                            <span class="text-danger">{{ $message }} </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label for="case_infos_division_id"
                                                            class=" col-form-label">Address
                                                        </label>
                                                        <input class="form-control" type="text" name=""
                                                            placeholder="type">
                                                        @error('case_infos_division_id')
                                                            <span class="text-danger">{{ $message }} </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">

                                                    <div class="col-sm-3">
                                                        <label for="case_infos_division_id" class=" col-form-label">Client
                                                            Coordinator Name
                                                        </label>
                                                        <input class="form-control" type="text" name=""
                                                            placeholder="type">

                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label for="case_infos_division_id" class=" col-form-label">
                                                            Mobile
                                                        </label>
                                                        <input class="form-control" type="text" name=""
                                                            placeholder="type">

                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label for="case_infos_division_id" class=" col-form-label"> Email
                                                        </label>
                                                        <input class="form-control" type="text" name=""
                                                            placeholder="type">
                                                        @error('case_infos_division_id')
                                                            <span class="text-danger">{{ $message }} </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label for="case_infos_division_id" class=" col-form-label">
                                                            Address
                                                        </label>
                                                        <input class="form-control" type="text" name=""
                                                            placeholder="type">
                                                        @error('case_infos_division_id')
                                                            <span class="text-danger">{{ $message }} </span>
                                                        @enderror
                                                    </div>
                                                </div> --}}
                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <label for="case_infos_division_id"
                                                            class=" col-form-label">Previous Legal Dispute
                                                        </label>
                                                        <textarea class="form-control" id="exampleFormControlTextarea1" name="previous_legal_dispute" rows="3"></textarea>
                                                        @error('case_infos_division_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <label for="case_infos_division_id"
                                                            class=" col-form-label">Special Note
                                                        </label>
                                                        <textarea class="form-control" id="exampleFormControlTextarea1" name="special_note_for_client" rows="3"></textarea>
                                                        @error('case_infos_division_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-card">
                                        <div class="row">
                                            <div class="col-7">
                                                <h2 class="fs-title">Opponent Info :</h2>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">

                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <label for="case_infos_division_id"
                                                            class=" col-form-label">Opponent (On behalf of)
                                                        </label>
                                                        <select name="opponent_id" class="form-control select2"
                                                            id="opponent_id">
                                                            <option value="">Select</option>
                                                            @foreach ($opponent as $item)
                                                                <option value="{{ $item->id }}"
                                                                    {{ old('opponent_id') == $item->id ? 'selected' : '' }}>
                                                                    {{ $item->opponent_name }} </option>
                                                            @endforeach
                                                        </select>
                                                        @error('opponent_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    {{-- <div class="col-sm-3">
                                                        <label for="case_infos_division_id"
                                                            class=" col-form-label">Division
                                                        </label>
                                                        <input class="form-control" type="text" name=""
                                                            placeholder="type">
                                                        @error('case_infos_division_id')
                                                            <span class="text-danger">{{ $message }} </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label for="case_infos_division_id" class=" col-form-label">Zone
                                                        </label>
                                                        <input class="form-control" type="text" name=""
                                                            placeholder="type">
                                                        @error('case_infos_division_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div> --}}
                                                </div>
                                                {{-- <div class="form-group row">

                                                    <div class="col-sm-6">
                                                        <label for="case_infos_division_id"
                                                            class=" col-form-label">Opponent Category
                                                        </label>
                                                        <select name="client_party_id" class="form-control select2"
                                                            id="client_party_id">
                                                            <option value="">Select</option>
                                                            @foreach ($in_favour_of as $item)
                                                                <option value="{{ $item->id }}"
                                                                    {{ old('client_party_id') == $item->id ? 'selected' : '' }}>
                                                                    {{ $item->in_favour_of_name }} </option>
                                                            @endforeach
                                                        </select>
                                                        @error('client_party_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label for="case_infos_division_id"
                                                            class=" col-form-label">District
                                                        </label>
                                                        <input class="form-control" type="text" name=""
                                                            placeholder="type">
                                                        @error('case_infos_division_id')
                                                            <span class="text-danger">{{ $message }} </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label for="case_infos_division_id" class=" col-form-label">Area
                                                        </label>
                                                        <input class="form-control" type="text" name=""
                                                            placeholder="type">
                                                        @error('case_infos_division_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">

                                                    <div class="col-sm-6">
                                                        <label for="case_infos_division_id"
                                                            class=" col-form-label">Opponent Sub-Category
                                                        </label>
                                                        <select name="client_party_id" class="form-control select2"
                                                            id="client_party_id">
                                                            <option value="">Select</option>
                                                            @foreach ($in_favour_of as $item)
                                                                <option value="{{ $item->id }}"
                                                                    {{ old('client_party_id') == $item->id ? 'selected' : '' }}>
                                                                    {{ $item->in_favour_of_name }} </option>
                                                            @endforeach
                                                        </select>
                                                        @error('client_party_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label for="case_infos_division_id" class=" col-form-label">Police
                                                            Station
                                                        </label>
                                                        <input class="form-control" type="text" name=""
                                                            placeholder="type">
                                                        @error('case_infos_division_id')
                                                            <span class="text-danger">{{ $message }} </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label for="case_infos_division_id" class=" col-form-label">Branch
                                                        </label>
                                                        <input class="form-control" type="text" name=""
                                                            placeholder="type">
                                                        @error('case_infos_division_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">

                                                    <div class="col-sm-6">
                                                        <label for="case_infos_division_id"
                                                            class=" col-form-label">Opponent Group
                                                        </label>
                                                        <input class="form-control" type="text" name=""
                                                            placeholder="type">

                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="case_infos_division_id"
                                                            class=" col-form-label">Opponent Profession
                                                        </label>
                                                        <input class="form-control" type="text" name=""
                                                            placeholder="type">
                                                        @error('case_infos_division_id')
                                                            <span class="text-danger">{{ $message }} </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">

                                                    <div class="col-sm-6">
                                                        <label for="case_infos_division_id"
                                                            class=" col-form-label">Opponent Business Name
                                                        </label>
                                                        <input class="form-control" type="text" name=""
                                                            placeholder="type">

                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="case_infos_division_id"
                                                            class=" col-form-label">Opponent Communication
                                                        </label>
                                                        <input class="form-control" type="text" name=""
                                                            placeholder="type">
                                                        @error('case_infos_division_id')
                                                            <span class="text-danger">{{ $message }} </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">

                                                    <div class="col-sm-3">
                                                        <label for="case_infos_division_id"
                                                            class=" col-form-label">Opponent Name
                                                        </label>
                                                        <input class="form-control" type="text" name=""
                                                            placeholder="type">

                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label for="case_infos_division_id"
                                                            class=" col-form-label">Opponent Mobile
                                                        </label>
                                                        <input class="form-control" type="text" name=""
                                                            placeholder="type">

                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label for="case_infos_division_id"
                                                            class=" col-form-label">Opponent Email
                                                        </label>
                                                        <input class="form-control" type="text" name=""
                                                            placeholder="type">
                                                        @error('case_infos_division_id')
                                                            <span class="text-danger">{{ $message }} </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label for="case_infos_division_id"
                                                            class=" col-form-label">Address
                                                        </label>
                                                        <input class="form-control" type="text" name=""
                                                            placeholder="type">
                                                        @error('case_infos_division_id')
                                                            <span class="text-danger">{{ $message }} </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">

                                                    <div class="col-sm-3">
                                                        <label for="case_infos_division_id"
                                                            class=" col-form-label">Opponent Representative Name
                                                        </label>
                                                        <input class="form-control" type="text" name=""
                                                            placeholder="type">

                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label for="case_infos_division_id" class=" col-form-label">
                                                            Mobile
                                                        </label>
                                                        <input class="form-control" type="text" name=""
                                                            placeholder="type">

                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label for="case_infos_division_id" class=" col-form-label"> Email
                                                        </label>
                                                        <input class="form-control" type="text" name=""
                                                            placeholder="type">
                                                        @error('case_infos_division_id')
                                                            <span class="text-danger">{{ $message }} </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label for="case_infos_division_id"
                                                            class=" col-form-label">Address
                                                        </label>
                                                        <input class="form-control" type="text" name=""
                                                            placeholder="type">
                                                        @error('case_infos_division_id')
                                                            <span class="text-danger">{{ $message }} </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">

                                                    <div class="col-sm-3">
                                                        <label for="case_infos_division_id"
                                                            class=" col-form-label">Opponent Coordinator Name
                                                        </label>
                                                        <input class="form-control" type="text" name=""
                                                            placeholder="type">

                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label for="case_infos_division_id" class=" col-form-label">
                                                            Mobile
                                                        </label>
                                                        <input class="form-control" type="text" name=""
                                                            placeholder="type">

                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label for="case_infos_division_id" class=" col-form-label"> Email
                                                        </label>
                                                        <input class="form-control" type="text" name=""
                                                            placeholder="type">
                                                        @error('case_infos_division_id')
                                                            <span class="text-danger">{{ $message }} </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label for="case_infos_division_id" class=" col-form-label">
                                                            Address
                                                        </label>
                                                        <input class="form-control" type="text" name=""
                                                            placeholder="type">
                                                        @error('case_infos_division_id')
                                                            <span class="text-danger">{{ $message }} </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <label for="case_infos_division_id"
                                                            class=" col-form-label">Previous Legal Dispute
                                                        </label>
                                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                        @error('case_infos_division_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div> --}}
                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <label for="case_infos_division_id"
                                                            class=" col-form-label">Special Note
                                                        </label>
                                                        <textarea class="form-control" id="exampleFormControlTextarea1" name="special_note_for_opponent"rows="3"></textarea>
                                                        @error('case_infos_division_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <input type="button" name="next" class="next action-button" value="Next" />
                                    <input type="button" name="previous" class="previous action-button-previous"
                                        value="Previous" />
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <div class="row">
                                            <div class="col-7">
                                                <h2 class="fs-title">Client Lawyer Information :</h2>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">

                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <label for="lawyer_advocate_id" class="form-label">Name of
                                                            Advocate/Law Firm</label>
                                                        <div class="row">
                                                            <div class="col-md-11">
                                                                <select name="lawyer_advocate_id"
                                                                    class="form-control select2" id="lawyer_advocate_id">
                                                                    <option value="">Select</option>
                                                                    @foreach ($chamber as $item)
                                                                        <option value="{{ $item->professional_name }}">
                                                                            {{ $item->professional_name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <div class="input-group-btn">
                                                                    <button
                                                                        class="btn btn-success btn_success_required_wanting_documents"
                                                                        type="button"><i
                                                                            class="fldemo glyphicon glyphicon-plus"></i>+
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        @error('client_profession_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror

                                                    </div>
                                                </div>
                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <label for="lead_laywer_name" class="form-label">Name of Lead
                                                            Laywer</label>
                                                        <div class="row">
                                                            <div class="col-md-11">

                                                                <select name="lead_laywer_id" class="form-control select2"
                                                                    id="lead_laywer_name">
                                                                    <option value="">Select</option>

                                                                    @foreach ($leadLaywer as $item)
                                                                        <option value="{{ $item->professional_name }}">
                                                                            {{ $item->professional_name }}</option>
                                                                    @endforeach

                                                                </select>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <div class="input-group-btn">
                                                                    <button
                                                                        class="btn btn-success btn_success_required_wanting_documents"
                                                                        type="button"><i
                                                                            class="fldemo glyphicon glyphicon-plus"></i>+
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        @error('client_profession_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <label for="lead_laywer_name" class="form-label">Name of
                                                            Assigned Para Legal</label>
                                                        <div class="row">
                                                            <div class="col-md-11">

                                                                <select name="para_legal_id" class="form-control select2"
                                                                    id="lead_laywer_name">
                                                                    <option value="">Select</option>

                                                                    @foreach ($leadLaywer as $item)
                                                                        <option value="{{ $item->professional_name }}">
                                                                            {{ $item->professional_name }}</option>
                                                                    @endforeach

                                                                </select>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <div class="input-group-btn">
                                                                    <button
                                                                        class="btn btn-success btn_success_required_wanting_documents"
                                                                        type="button"><i
                                                                            class="fldemo glyphicon glyphicon-plus"></i>+
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        @error('client_profession_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <label for="case_infos_division_id"
                                                            class=" col-form-label">Special Note
                                                        </label>
                                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="special_note_for_lawyer"></textarea>
                                                        @error('case_infos_division_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-card">
                                        <div class="row">
                                            <div class="col-7">
                                                <h2 class="fs-title">Opponent Lawyer Information (if any):</h2>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">

                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <label for="case_infos_division_id" class=" col-form-label">
                                                            Name of Advocate/ Law Firm
                                                        </label>
                                                        <input class="form-control" type="text"
                                                            name="opposition_advocate_firm" placeholder="type">

                                                    </div>


                                                </div>
                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <label for="case_infos_division_id" class=" col-form-label">Name
                                                            of Concerned Lawyer
                                                        </label>
                                                        <input class="form-control" type="text"
                                                            name="opposition_concerned_lawyer" placeholder="type">

                                                    </div>

                                                </div>
                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <label for="case_infos_division_id"
                                                            class=" col-form-label">Opponent Lawyer Contact Details
                                                        </label>
                                                        <input class="form-control" type="text"
                                                            name="opposition_lawyer_contact_details" placeholder="type">

                                                    </div>

                                                </div>
                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <label for="case_infos_division_id"
                                                            class=" col-form-label">Opponent para-legal Contact Details
                                                        </label>
                                                        <input class="form-control" type="text"
                                                            name="opposition_para_legal_contact_details"
                                                            placeholder="type">

                                                    </div>

                                                </div>
                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <label for="case_infos_division_id" class=" col-form-label">
                                                            Note
                                                        </label>
                                                        <textarea class="form-control" id="exampleFormControlTextarea1" name=""rows="3"></textarea>
                                                        @error('case_infos_division_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="button" name="next" class="next action-button" value="Next" />
                                    <input type="button" name="previous" class="previous action-button-previous"
                                        value="Previous" />
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <div class="row">
                                            <div class="col-7">
                                                <h2 class="fs-title"> Documents Received</h2>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group row">

                                                <div class="col-12">
                                                    <div
                                                        class="input-group hdtuto_received_documents control-group increment_received_documents">

                                                        <input type="hidden" name="received_documents_sections[]"
                                                            class="myfrm form-control mr-2"
                                                            value="received_documents_sections">
                                                        <select name="received_documents_id[]" class="form-control mr-3">
                                                            <option value="">Select</option>
                                                            @foreach ($documents as $item)
                                                                <option value="{{ $item->id }}"
                                                                    {{ old('received_documents_id') == $item->id ? 'selected' : '' }}>
                                                                    {{ $item->documents_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <input type="text" name="received_documents[]"
                                                            class="myfrm form-control mr-2">
                                                        <input type="date" name="received_documents_date[]"
                                                            class="myfrm form-control ml-2 mr-2" value="dd/mm/yyyy">
                                                        <select name="received_documents_type_id[]"
                                                            class="form-control mr-3 ml-2">
                                                            <option value="">Select</option>
                                                            @foreach ($documents_type as $item)
                                                                <option value="{{ $item->id }}"
                                                                    {{ old('received_documents_type_id') == $item->id ? 'selected' : '' }}>
                                                                    {{ $item->documents_type_name }}</option>
                                                            @endforeach
                                                        </select>
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
                                                            <input type="hidden" name="received_documents_sections[]"
                                                                class="myfrm form-control mr-2"
                                                                value="received_documents_sections">
                                                            <select name="received_documents_id[]"
                                                                class="form-control mr-3">
                                                                <option value="">Select</option>
                                                                @foreach ($documents as $item)
                                                                    <option value="{{ $item->id }}"
                                                                        {{ old('received_documents_id') == $item->id ? 'selected' : '' }}>
                                                                        {{ $item->documents_name }}</option>
                                                                @endforeach
                                                            </select>
                                                            <input type="text" name="received_documents[]"
                                                                class="myfrm form-control mr-2">
                                                            <input type="date" name="received_documents_date[]"
                                                                class="myfrm form-control ml-2 mr-2" value="dd/mm/yyyy">
                                                            <select name="received_documents_type_id[]"
                                                                class="form-control mr-3 ml-2">
                                                                <option value="">Select</option>
                                                                @foreach ($documents_type as $item)
                                                                    <option value="{{ $item->id }}"
                                                                        {{ old('received_documents_type_id') == $item->id ? 'selected' : '' }}>
                                                                        {{ $item->documents_type_name }}</option>
                                                                @endforeach
                                                            </select>
                                                            <div class="input-group-btn">
                                                                <button
                                                                    class="btn btn-danger btn_danger_received_documents"
                                                                    type="button"><i
                                                                        class="fldemo glyphicon glyphicon-remove"></i> -
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    @error('case_infos_received_documents_informant_name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-card">
                                        <div class="row">
                                            <div class="col-7">
                                                <h2 class="fs-title">Documents Required </h2>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div
                                                    class="input-group hdtuto_required_wanting_documents control-group increment_required_wanting_documents">
                                                    <input type="hidden" name="required_wanting_documents_sections[]"
                                                        class="myfrm form-control mr-2"
                                                        value="required_wanting_documents_sections">
                                                    <select name="required_wanting_documents_id[]"
                                                        class="form-control mr-3">
                                                        <option value="">Select</option>
                                                        @foreach ($documents as $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ old('required_wanting_documents_id') == $item->id ? 'selected' : '' }}>
                                                                {{ $item->documents_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <input type="text" name="required_wanting_documents[]"
                                                        class="myfrm form-control mr-2">
                                                    <input type="date" name="required_wanting_documents_date[]"
                                                        class="myfrm form-control ml-2 mr-2" value="dd/mm/yyyy">
                                                    <select name="required_wanting_documents_type_id[]"
                                                        class="form-control mr-3 ml-2">
                                                        <option value="">Select</option>
                                                        @foreach ($documents_type as $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ old('required_wanting_documents_type_id') == $item->id ? 'selected' : '' }}>
                                                                {{ $item->documents_type_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="input-group-btn">
                                                        <button
                                                            class="btn btn-success btn_success_required_wanting_documents"
                                                            type="button"><i
                                                                class="fldemo glyphicon glyphicon-plus"></i>+
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="clone_required_wanting_documents hide">
                                                    <div class="hdtuto_required_wanting_documents control-group lst input-group"
                                                        style="margin-top:10px">
                                                        <input type="hidden" name="required_wanting_documents_sections[]"
                                                            class="myfrm form-control mr-2"
                                                            value="required_wanting_documents_sections">
                                                        <select name="required_wanting_documents_id[]"
                                                            class="form-control mr-3">
                                                            <option value="">Select</option>
                                                            @foreach ($documents as $item)
                                                                <option value="{{ $item->id }}"
                                                                    {{ old('required_wanting_documents_id') == $item->id ? 'selected' : '' }}>
                                                                    {{ $item->documents_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <input type="text" name="required_wanting_documents[]"
                                                            class="myfrm form-control mr-2">

                                                        <input type="date" name="required_wanting_documents_date[]"
                                                            class="myfrm form-control ml-2 mr-2" value="dd/mm/yyyy">
                                                        <select name="required_wanting_documents_type_id[]"
                                                            class="form-control mr-3 ml-2">
                                                            <option value="">Select</option>
                                                            @foreach ($documents_type as $item)
                                                                <option value="{{ $item->id }}"
                                                                    {{ old('required_wanting_documents_type_id') == $item->id ? 'selected' : '' }}>
                                                                    {{ $item->documents_type_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <div class="input-group-btn">
                                                            <button
                                                                class="btn btn-danger btn_danger_required_wanting_documents"
                                                                type="button"><i
                                                                    class="fldemo glyphicon glyphicon-remove"></i> -
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                                @error('required_wanting_documents')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-card">
                                        <div class="row">
                                            <div class="col-7">
                                                <h2 class="fs-title">Documents Upload </h2>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="input-group hdtuto_files control-group increment_files">
                                                    <input type="file" name="uploaded_document[]"
                                                        class="myfrm form-control col-md-4 mr-2">
                                                    <input type="date" name="uploaded_date[]"
                                                        class="myfrm form-control mr-2 col-md-4"
                                                        value="{{ old('uploaded_date') }}">
                                                    <select name="documents_type_id[]" class="form-control col-md-4">
                                                        <option value="">Select</option>
                                                        @foreach ($documents_type as $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ old('documents_type_id') == $item->id ? 'selected' : '' }}>
                                                                {{ $item->documents_type_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="input-group-btn">
                                                        <button class="btn btn-success btn_success_files"
                                                            type="button"><i
                                                                class="fldemo glyphicon glyphicon-plus"></i>+
                                                        </button>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="clone_files hide">
                                                <div class="hdtuto_files control-group lst input-group"
                                                    style="margin-top:10px">
                                                    <input type="file" name="uploaded_document[]"
                                                        class="myfrm form-control col-md-4 mr-2">
                                                    <input type="date" name="uploaded_date[]"
                                                        class="myfrm form-control mr-2 col-md-4"
                                                        value="{{ old('uploaded_date') }}">
                                                    <select name="documents_type_id[]" class="form-control col-md-4">
                                                        <option value="">Select</option>
                                                        @foreach ($documents_type as $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ old('documents_type_id') == $item->id ? 'selected' : '' }}>
                                                                {{ $item->documents_type_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="input-group-btn">
                                                        <div class="input-group-btn">
                                                            <button class="btn btn-danger btn_danger_files"
                                                                type="button"><i
                                                                    class="fldemo glyphicon glyphicon-remove"></i> -
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            @error('required_wanting_documents')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>

                                    <input type="button" name="previous" class="previous action-button-previous"
                                        value="Previous" />
                                    <button type="submit" id="submit_button" class=" btn btn-success mx-auto p-2 m-2"
                                        style="padding-right:20px ">Submit</button>

                        </div>

                        </fieldset>

                        </form>

                    </div>
                </div>
            </div>
    </div>
    </section>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {

            var current_fs, next_fs, previous_fs; //fieldsets
            var opacity;
            var current = 1;
            var steps = 6;

            setProgressBar(current);

            $(".next").click(function() {

                current_fs = $(this).parent();
                next_fs = $(this).parent().next();

                //Add Class Active
                $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

                //show the next fieldset
                next_fs.show();
                //hide the current fieldset with style
                current_fs.animate({
                    opacity: 0
                }, {
                    step: function(now) {
                        // for making fielset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        next_fs.css({
                            'opacity': opacity
                        });
                    },
                    duration: 500
                });
                setProgressBar(++current);


            });

            $(".previous").click(function() {

                current_fs = $(this).parent();
                previous_fs = $(this).parent().prev();

                //Remove class active
                $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

                //show the previous fieldset
                previous_fs.show();

                //hide the current fieldset with style
                current_fs.animate({
                    opacity: 0
                }, {
                    step: function(now) {
                        // for making fielset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        previous_fs.css({
                            'opacity': opacity
                        });
                    },
                    duration: 500
                });
                setProgressBar(--current);
            });

            function setProgressBar(curStep) {
                console.log(curStep);

                var percent = parseFloat(100 / steps) * curStep;
                percent = percent.toFixed();
                $(".progress-bar")
                    .css("width", percent + "%")
            }

            $(".submit").click(function() {
                return false;
            })

        });
    </script>
@endsection
