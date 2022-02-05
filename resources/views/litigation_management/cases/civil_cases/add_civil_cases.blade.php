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
                                <a class="leading-normal inline-flex items-center font-normal spark-button-focus h-8 text-md px-4 bg-transparent border-0 border-solid text-blue-700 hover:text-blue-800 active:text-blue-700 rounded-md" type="button" href="{{ route('civil-cases') }}" aria-disabled="false" role="link" tabindex="-1">Cancel</a>
                            </li>
                        </ol>
                    </div>


                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
            <div class="row im-flex">
                <div class="col-md-2">
{{--                    @include('fixed-asset.dashboard-sidebar')--}}
                </div>
                <div class="col-md-10">
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
                                <h3 class="card-title" id="heading">Add Civil Cases</h3>
                            </div>

                            <form action="{{ route('save-civil-cases') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">

                                    <div class="col-md-12">

                                        <div class="form-group">
                                            <label for="case_no"> Case No. </label>
                                            <input type="text" class="form-control" name="case_no"
                                                   id="case_no">
                                            @error('case_no')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>

{{--                                        <div class="form-group">--}}
{{--                                            <label for="division_id"> Division--}}
{{--                                            </label>--}}
{{--                                            <select name="division_id" id="division" class="form-control--}}
{{--                                            select2" required="">--}}
{{--                                                <option selected>Select</option>--}}
{{--                                                @foreach ($division as $item)--}}
{{--                                                    <option value="{{ $item->id }}">{{ $item->division_name }}</option>--}}
{{--                                                @endforeach--}}
{{--                                            </select>--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="district_id"> District--}}
{{--                                            </label>--}}
{{--                                            <select name="district_id" id="district" class="form-control--}}
{{--                                            select2" required="">--}}
{{--                                                <option selected>Select</option>--}}
{{--                                            </select>--}}
{{--                                        </div>--}}


                                        {{--                                        <div class="row">--}}
                                        {{--                                            <div class="col-md-6">--}}
                                        <div class="form-group {{ ($errors->has('roll'))?'has-error':'' }}">
                                            <label for="roll"> Division </label>
                                            <select name="division_id" class="form-control" id="state">
                                                <option value=""> Select </option>
                                                @foreach ($division as $item)
                                                    <option value="{{ $item->id }}">{{ ucfirst($item->division_name) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('division_id')<span class="text-danger">{{$message}}</span>@enderror

                                        {{--                                            </div>--}}
                                        {{--                                            <div class="col-md-6">--}}
                                        <div class="form-group {{ ($errors->has('name'))?'has-error':'' }}">
                                            <label for="roll"> District </label>
                                            <select name="district_id" class="form-control" id="city">
                                                <option value=""> Select </option>

                                            </select>
                                        </div>
                                        @error('district_id')<span class="text-danger">{{$message}}</span>@enderror

                                        {{--                                            </div>--}}
                                        {{--                                        </div>--}}





                                        <div class="form-group">
                                            <label for="amount"> Amount </label>
                                            <input type="text" class="form-control" name="amount"
                                                   id="amount">
                                            @error('amount')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="case_status_id"> Case Status
                                                <!-- <span style="color:
                                            red">*</span> -->
                                            </label>
                                            <select name="case_status_id" class="form-control
                                            select2" id="case_status_id"
                                                    required="">
                                                <option>Select</option>
                                                @foreach($case_status as $item)
                                                    <option value="{{ $item->id }}">{{ $item->case_status_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('case_status_id')<span class="text-danger">{{$message}}</span>@enderror


                                        <!-- <div class="form-group">
                                            <label for="case_status_id"> Case Status </label>
                                            <input type="text" class="form-control" name="case_status_id"
                                                   id="case_status_id">
                                            @error('case_status_id')<span class="text-danger">{{$message}}</span>@enderror
                                        </div> -->
                                        <!-- <div class="form-group">
                                            <label for="case_category_nature_id"> Case Category/Nature </label>
                                            <input type="text" class="form-control" name="case_category_nature_id"
                                                   id="case_category_nature_id">
                                            @error('case_category_nature_id')<span class="text-danger">{{$message}}</span>@enderror
                                        </div> -->
                                        <div class="form-group">
                                            <label for="case_category_nature_id"> Case Category
                                                <!-- <span style="color:
                                            red">*</span> -->
                                            </label>
                                            <select name="case_category_nature_id" class="form-control
                                            select2" id="case_category_nature_id"
                                                    required="">
                                                <option>Select</option>
                                                @foreach($case_category as $item)
                                                    <option value="{{ $item->id }}" {{(old('division') == $item->id?'selected':'')}}>{{ $item->case_category_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('case_category_nature_id')<span class="text-danger">{{$message}}</span>@enderror

                                        <div class="form-group">
                                            <label for="external_council_name_id"> External Council Name
                                                <!-- <span style="color:
                                            red">*</span> -->
                                            </label>
                                            <select name="external_council_name_id" class="form-control
                                            select2" id="external_council_name_id"
                                                    required="">
                                                <option>Select</option>
                                                @foreach($external_council as $item)
                                                    <option value="{{ $item->id }}" {{(old('division') == $item->id?'selected':'')}}>{{ $item->first_name }} {{ $item->middle_name }} {{ $item->last_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('division_id')<span class="text-danger">{{$message}}</span>@enderror

                                        <div class="form-group">
                                            <label for="plaintiff_name"> Plaintiff Name </label>
                                            <input type="text" class="form-control" name="plaintiff_name"
                                                   id="plaintiff_name">
                                            @error('plaintiff_name')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="plaintiff_designaiton_id"> Plaintiff Designation
                                                <!-- <span style="color:
                                            red">*</span> -->
                                            </label>
                                            <select name="plaintiff_designaiton_id" class="form-control
                                            select2" id="plaintiff_designaiton_id"
                                                    required="">
                                                <option>Select</option>
                                                @foreach($designation as $item)
                                                    <option value="{{ $item->id }}" {{(old('division') == $item->id?'selected':'')}}>{{ $item->designation_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('division_id')<span class="text-danger">{{$message}}</span>@enderror

                                        <!-- <div class="form-group">
                                            <label for="plaintiff_designaiton_id"> Plaintiff Designation </label>
                                            <input type="text" class="form-control" name="plaintiff_designaiton_id"
                                                   id="plaintiff_designaiton_id">
                                            @error('plaintiff_designaiton_id')<span class="text-danger">{{$message}}</span>@enderror
                                        </div> -->

                                        <div class="form-group">
                                            <label for="plaintiff_contact_number"> Plaintiff Contact No </label>
                                            <input type="text" class="form-control" name="plaintiff_contact_number"
                                                   id="plaintiff_contact_number">
                                            @error('plaintiff_contact_number')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="subsequent_plaintiff_name"> Subsequent Plaintiff Name </label>
                                            <input type="text" class="form-control" name="subsequent_plaintiff_name"
                                                   id="subsequent_plaintiff_name">
                                            @error('subsequent_plaintiff_name')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="last_order_court"> Last Order of the Court
                                            </label>
                                            <select name="last_order_court" class="form-control
                                            select2" id="last_order_court"
                                                    required="">
                                                <option>Select</option>
                                                @foreach($last_court_order as $item)
                                                    <option value="{{ $item->id }}" {{(old('division') == $item->id?'selected':'')}}>{{ $item->court_last_order_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="additional_order"> Additional Order </label>
                                            <input type="date" class="form-control" name="additional_order"
                                                   id="additional_order">
                                            @error('additional_order')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="disbursement_date"> Disbursement Date </label>
                                            <input type="date" class="form-control" name="disbursement_date"
                                                   id="disbursement_date">
                                            @error('disbursement_date')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="last_date_of_cash_receipt"> Last date of cash receipt </label>
                                            <input type="date" class="form-control" name="last_date_of_cash_receipt"
                                                   id="last_date_of_cash_receipt">
                                            @error('last_date_of_cash_receipt')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="date_of_disposed"> Date of Disposed </label>
                                            <input type="date" class="form-control" name="date_of_disposed"
                                                   id="date_of_disposed">
                                            @error('date_of_disposed')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="date_of_filing"> Date of Filing </label>
                                            <input type="date" class="form-control" name="date_of_filing"
                                                   id="date_of_filing">
                                            @error('date_of_filing')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="defendent_name"> Defendent Name </label>
                                            <input type="text" class="form-control" name="defendent_name"
                                                   id="defendent_name">
                                            @error('defendent_name')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="defendent_address"> Address </label>
                                            <input type="text" class="form-control" name="defendent_address"
                                                   id="defendent_address">
                                            @error('defendent_address')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="defendent_contact_no"> Contact No. </label>
                                            <input type="text" class="form-control" name="defendent_contact_no"
                                                   id="defendent_contact_no">
                                            @error('contact_no')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="date_of_cash_received"> Date of Case Received </label>
                                            <input type="date" class="form-control" name="date_of_cash_received"
                                                   id="date_of_cash_received">
                                            @error('date_of_cash_received')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="case_year"> Case Year </label>
                                            <input type="text" class="form-control" name="case_year"
                                                   id="case_year">
                                            @error('case_year')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="ref_no"> Ref No. </label>
                                            <input type="text" class="form-control" name="ref_no"
                                                   id="ref_no">
                                            @error('ref_no')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="location"> Location </label>
                                            <input type="text" class="form-control" name="location"
                                                   id="location">
                                            @error('location')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="property_type"> Property Type </label>
                                            <input type="text" class="form-control" name="property_type"
                                                   id="property_type">
                                            @error('property_type')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="name_of_the_court_id"> Name of the Court
                                                
                                            </label>
                                            <select name="name_of_the_court_id" class="form-control
                                            select2" id="name_of_the_court_id"
                                                    required="">
                                                <option>Select</option>
                                                @foreach($court as $item)
                                                    <option value="{{ $item->id }}" {{(old('division') == $item->id?'selected':'')}}>{{ $item->court_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('name_of_the_court_id')<span class="text-danger">{{$message}}</span>@enderror


                                        <div class="form-group">
                                            <label for="relevant_law_sections_id"> Relevant Laws/Sections
                                                
                                            </label>
                                            <select name="relevant_law_sections_id" class="form-control
                                            select2" id="relevant_law_sections_id"
                                                    required="">
                                                <option>Select</option>
                                                @foreach($law_section as $item)
                                                    <option value="{{ $item->id }}" {{(old('division') == $item->id?'selected':'')}}>{{ $item->law_section_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('relevant_law_sections_id')<span class="text-danger">{{$message}}</span>@enderror

                                        <!-- <div class="form-group">
                                            <label for="relevant_law_sections_id"> Relevant Laws/Sections </label>
                                            <input type="text" class="form-control" name="relevant_law_sections_id"
                                                   id="relevant_law_sections_id">
                                            @error('relevant_law_sections_id')<span class="text-danger">{{$message}}</span>@enderror
                                        </div> -->

                                        <div class="form-group">
                                            <label for="contact_no"> Contact Number </label>
                                            <input type="text" class="form-control" name="contact_no"
                                                   id="contact_no">
                                            @error('contact_no')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="next_date"> Next Date </label>
                                            <input type="date" class="form-control" name="next_date"
                                                   id="next_date">
                                            @error('next_date')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="next_date_fixed_id"> Next date fixed for
                                            </label>
                                            <select name="next_date_fixed_id" class="form-control
                                            select2" id="next_date_fixed_id"
                                                    required="">
                                                <option>Select</option>

                                                @foreach($next_date_reason as $item)
                                                    <option value="{{ $item->id }}">{{ $item->next_date_reason_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('next_date_fixed_id')<span class="text-danger">{{$message}}</span>@enderror
                                        <div class="form-group">
                                            <label for="name_of_suit"> Name of the Suit </label>
                                            <input type="text" class="form-control" name="name_of_suit"
                                                   id="name_of_suit">
                                            @error('name_of_suit')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="date_of_incident"> Date of incident </label>
                                            <input type="date" class="form-control" name="date_of_incident"
                                                   id="date_of_incident">
                                            @error('date_of_incident')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="date_of_incident_to"> Date of Incident To </label>
                                            <input type="date" class="form-control" name="date_of_incident_to"
                                                   id="date_of_incident_to">
                                            @error('date_of_incident_to')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="first_identification_person"> Who identified the Incident First ? </label>
                                            <input type="text" class="form-control" name="first_identification_person"
                                                   id="first_identification_person">
                                            @error('first_identification_person')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="date_of_identification"> Date of Identification </label>
                                            <input type="date" class="form-control" name="date_of_identification"
                                                   id="date_of_identification">
                                            @error('date_of_identification')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="case_notes"> Case Notes </label>
                                            <input type="text" class="form-control" name="case_notes"
                                                   id="case_notes">
                                            @error('case_notes')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="case_notes"> Document Upload </label>
                                            <div class="input-group hdtuto control-group lst increment">
                                                <input type="file" name="uploaded_document[]" class="myfrm form-control">
                                                <div class="input-group-btn">
                                                    <button class="btn btn-success" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>+</button>
                                                </div>
                                            </div>
                                            <div class="clone hide">
                                                <div class="hdtuto control-group lst input-group" style="margin-top:10px">
                                                    <input type="file" name="uploaded_document[]" class="myfrm form-control">
                                                    <div class="input-group-btn">
                                                        <button class="btn btn-danger" type="button"><i class="fldemo glyphicon glyphicon-remove"></i> - </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="float-right mt-4">
                                            <button type="submit" class="btn btn-primary text-uppercase"><i class="fas fa-save"></i> Save</button>
                                        </div>
                                    </div>

                                </div>
                            </form>

                        </div>
                    </div>

                </div>
        </section>
        <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->




@endsection




