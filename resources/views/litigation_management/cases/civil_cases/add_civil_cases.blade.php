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
                                <h3 class="card-title" id="heading">Add Civil Cases</h3>
                            </div>

                            <form action="{{ route('save-civil-cases') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="case_no" class="col-sm-4 col-form-label">Case No.</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="case_no" name="case_no" value="{{old('case_no')}}">
                                                    @error('case_no')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="client_category_id" class="col-sm-4 col-form-label">Client Category</label>
                                                <div class="col-sm-8">
                                                    <select name="client_category_id" class="form-control select2" id="client_category_id" action="{{ route('find-client-subcategory') }}">
                                                        <option value="">Select</option>
                                                        @foreach ($client_category as $item)
                                                            <option value="{{ $item->id }}" {{(old('client_category_id') == $item->id ? 'selected':'')}}>{{ ucfirst($item->client_category_name) }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('client_category_id')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="client_subcategory_id" class="col-sm-4 col-form-label">Client Subcategory</label>
                                                <div class="col-sm-8">
                                                    <select name="client_subcategory_id" class="form-control select2" id="client_subcategory_id">
                                                        <option value="">Select</option>

                                                    </select>
                                                    @error('client_subcategory_id')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="date_of_filing" class="col-sm-4 col-form-label"> Date of Filing </label>
                                                <div class="col-sm-8">
                                                    <input type="date" class="form-control" id="date_of_filing" name="date_of_filing" value="{{old('date_of_filing')}}">
                                                    @error('date_of_filing')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="division_id" class="col-sm-4 col-form-label">Division</label>
                                                <div class="col-sm-8">
                                                        <select name="division_id" class="form-control select2" id="division_id" action="{{ route('find_district') }}">
                                                            <option value="">Select</option>
                                                            @foreach ($division as $item)
                                                                <option value="{{ $item->id }}" {{(old('division_id') == $item->id ? 'selected':'')}}>{{ ucfirst($item->division_name) }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('division_id')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="case_year" class="col-sm-4 col-form-label">Case Year</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="case_year" name="case_year" value="{{old('case_year')}}">
                                                    @error('case_year')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="district_id" class="col-sm-4 col-form-label">District</label>
                                                <div class="col-sm-8">
                                                    <select name="district_id" class="form-control select2" id="district_id">
                                                        <option value=""> Select </option>

                                                    </select>
                                                    @error('district_id')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="ref_no" class="col-sm-4 col-form-label"> Ref No. </label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="ref_no" name="ref_no" value="{{old('ref_no')}}">
                                                    @error('ref_no')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="amount" class="col-sm-4 col-form-label">Amount</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="amount" name="amount" value="{{old('amount')}}">
                                                    @error('amount')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="location" class="col-sm-4 col-form-label"> Location </label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="location" name="location" value="{{old('location')}}">
                                                    @error('location')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="case_status_id" class="col-sm-4 col-form-label">Case Status</label>
                                                <div class="col-sm-8">

                                                        <select name="case_status_id" class="form-control select2">
                                                            <option value="">Select</option>
                                                            @foreach($case_status as $item)
                                                                <option value="{{ $item->id }}" {{(old('case_status_id') == $item->id ? 'selected':'')}}>{{ $item->case_status_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('case_status_id')<span class="text-danger">{{$message}}</span>@enderror

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="property_type_id" class="col-sm-4 col-form-label"> Property Type </label>
                                                <div class="col-sm-8">
                                                        <select name="property_type_id" class="form-control select2">
                                                            <option value="">Select</option>
                                                            @foreach($property_type as $item)
                                                                <option value="{{ $item->id }}" {{(old('property_type_id') == $item->id ? 'selected':'')}}>{{ $item->property_type_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('property_type_id')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="case_category_nature_id" class="col-sm-4 col-form-label">Case Category Nature</label>
                                                <div class="col-sm-8">

                                                        <select name="case_category_nature_id" class="form-control select2">
                                                            <option value="">Select</option>
                                                            @foreach($case_category as $item)
                                                                <option value="{{ $item->id }}" {{(old('case_category_nature_id') == $item->id ? 'selected':'')}}>{{ $item->case_category_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('case_category_nature_id')<span class="text-danger">{{$message}}</span>@enderror

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="case_type_id" class="col-sm-4 col-form-label">Type of Cases</label>
                                                <div class="col-sm-8">

                                                        <select name="case_type_id" class="form-control select2">
                                                            <option value="">Select</option>
                                                            @foreach($case_types as $item)
                                                                <option value="{{ $item->id }}" {{(old('case_type_id') == $item->id ? 'selected':'')}}>{{ $item->case_types_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('case_type_id')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="name_of_the_court_id" class="col-sm-4 col-form-label"> Name of the filling Court </label>
                                                <div class="col-sm-8">
                                                        <select name="name_of_the_court_id" class="form-control select2">
                                                            <option value="">Select</option>
                                                            @foreach($court as $item)
                                                                <option value="{{ $item->id }}" {{(old('name_of_the_court_id') == $item->id ? 'selected':'')}}>{{ $item->court_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('name_of_the_court_id')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="external_council_name_id" class="col-sm-4 col-form-label">External Council</label>
                                                <div class="col-sm-8">

                                                        <select name="external_council_name_id" class="form-control select2" id="external_council_name_id" action="{{ route('find-associates') }}">
                                                            <option value="">Select</option>
                                                            @foreach($external_council as $item)
                                                                <option value="{{ $item->id }}" {{(old('external_council_name_id') == $item->id ? 'selected':'')}}>{{ $item->first_name }} {{ $item->middle_name }} {{ $item->last_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('external_council_name_id')<span class="text-danger">{{$message}}</span>@enderror

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="external_council_associates_id" class="col-sm-4 col-form-label">External Council Associates</label>
                                                <div class="col-sm-8">
                                                        <select name="external_council_associates_id" class="form-control select2" id="external_council_associates_id">
                                                            <option value="">Select</option>

                                                        </select>
                                                        @error('external_council_associates_id')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="relevant_law_sections_id" class="col-sm-4 col-form-label"> Relevant Laws/Sections </label>
                                                <div class="col-sm-8">
                                                        <select name="relevant_law_sections_id" class="form-control select2">
                                                            <option value="">Select</option>
                                                            @foreach($law_section as $item)
                                                                <option value="{{ $item->id }}" {{(old('relevant_law_sections_id') == $item->id ? 'selected':'')}}>{{ $item->law_section_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('relevant_law_sections_id')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="plaintiff_name" class="col-sm-4 col-form-label">Plaintiff Name</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="plaintiff_name" name="plaintiff_name" value="{{old('plaintiff_name')}}">
                                                    @error('plaintiff_name')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="plaintiff_designaiton_id" class="col-sm-4 col-form-label">Plaintiff Designation</label>
                                                <div class="col-sm-8">

                                                        <select name="plaintiff_designaiton_id" class="form-control select2">
                                                            <option value="">Select</option>
                                                            @foreach($designation as $item)
                                                                <option value="{{ $item->id }}" {{(old('plaintiff_designaiton_id') == $item->id ? 'selected':'')}}>{{ $item->designation_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('plaintiff_designaiton_id')<span class="text-danger">{{$message}}</span>@enderror

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="next_date" class="col-sm-4 col-form-label"> Next Date </label>
                                                <div class="col-sm-8">
                                                    <input type="date" class="form-control" id="next_date" name="next_date" value="{{old('next_date')}}">
                                                    @error('next_date')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="plaintiff_contact_number" class="col-sm-4 col-form-label">Plaintiff Contact No</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="plaintiff_contact_number" name="plaintiff_contact_number" value="{{old('plaintiff_contact_number')}}">
                                                    @error('plaintiff_contact_number')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="next_date_fixed_id" class="col-sm-4 col-form-label"> Next date fixed for </label>
                                                <div class="col-sm-8">
                                                        <select name="next_date_fixed_id" class="form-control select2">
                                                            <option value="">Select</option>
                                                            @foreach($next_date_reason as $item)
                                                                <option value="{{ $item->id }}" {{(old('next_date_fixed_id') == $item->id ? 'selected':'')}}>{{ $item->next_date_reason_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('next_date_fixed_id')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="company_id" class="col-sm-4 col-form-label"> Company </label>
                                                <div class="col-sm-8">
                                                        <select name="company_id" class="form-control select2">
                                                            <option value="">Select</option>
                                                            @foreach($company as $item)
                                                                <option value="{{ $item->id }}" {{(old('company_id') == $item->id ? 'selected':'')}}>{{ $item->company_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('company_id')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="zone_id" class="col-sm-4 col-form-label"> Zone </label>
                                                <div class="col-sm-8">
                                                        <select name="zone_id" class="form-control select2">
                                                            <option value="">Select</option>
                                                            @foreach($zone as $item)
                                                                <option value="{{ $item->id }}" {{(old('zone_id') == $item->id ? 'selected':'')}}>{{ $item->region_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('zone_id')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="area_id" class="col-sm-4 col-form-label"> Area </label>
                                                <div class="col-sm-8">
                                                        <select name="area_id" class="form-control select2">
                                                            <option value="">Select</option>
                                                            @foreach($area as $item)
                                                                <option value="{{ $item->id }}" {{(old('area_id') == $item->id ? 'selected':'')}}>{{ $item->area_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('area_id')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="subsequent_plaintiff_name" class="col-sm-4 col-form-label">Subsequent Plaintiff Name</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="subsequent_plaintiff_name" name="subsequent_plaintiff_name" value="{{old('subsequent_plaintiff_name')}}">
                                                    @error('subsequent_plaintiff_name')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="name_of_suit" class="col-sm-4 col-form-label"> Name of the Suit </label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="name_of_suit" name="name_of_suit" value="{{old('name_of_suit')}}">
                                                    @error('name_of_suit')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="defendent_name" class="col-sm-4 col-form-label"> Defendent Name </label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="defendent_name" name="defendent_name" value="{{old('defendent_name')}}">
                                                    @error('defendent_name')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="defendent_address" class="col-sm-4 col-form-label"> Defendent Address </label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="defendent_address" name="defendent_address" value="{{old('defendent_address')}}">
                                                    @error('defendent_address')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="defendent_company_id" class="col-sm-4 col-form-label"> Name of Defendent Company </label>
                                                <div class="col-sm-8">
                                                        <select name="defendent_company_id" class="form-control select2">
                                                            <option value="">Select</option>
                                                            @foreach($company as $item)
                                                                <option value="{{ $item->id }}" {{(old('defendent_company_id') == $item->id ? 'selected':'')}}>{{ $item->company_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('defendent_company_id')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="date_of_incident" class="col-sm-4 col-form-label"> Date of incident </label>
                                                <div class="col-sm-8">
                                                    <input type="date" class="form-control" id="date_of_incident" name="date_of_incident" value="{{old('date_of_incident')}}">
                                                    @error('date_of_incident')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="last_order_court_id" class="col-sm-4 col-form-label">Last Order of the Court</label>
                                                <div class="col-sm-8">

                                                        <select name="last_order_court_id" class="form-control select2">
                                                            <option value="">Select</option>
                                                            @foreach($last_court_order as $item)
                                                                <option value="{{ $item->id }}" {{(old('last_order_court_id') == $item->id ? 'selected':'')}}>{{ $item->court_last_order_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('last_order_court_id')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="date_of_incident_to" class="col-sm-4 col-form-label"> Date of Incident To </label>
                                                <div class="col-sm-8">
                                                    <input type="date" class="form-control" id="date_of_incident_to" name="date_of_incident_to" value="{{old('date_of_incident_to')}}">
                                                    @error('date_of_incident_to')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="additional_order" class="col-sm-4 col-form-label">Additional Order</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="additional_order" name="additional_order" value="{{old('additional_order')}}">
                                                    @error('additional_order')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="first_identification_person" class="col-sm-4 col-form-label"> Who identified the Incident First ? </label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="first_identification_person" name="first_identification_person" value="{{old('first_identification_person')}}">
                                                    @error('first_identification_person')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="disbursement_date" class="col-sm-4 col-form-label">Disbursement Date</label>
                                                <div class="col-sm-8">
                                                    <input type="date" class="form-control" id="disbursement_date" name="disbursement_date" value="{{old('disbursement_date')}}">
                                                    @error('disbursement_date')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="date_of_identification" class="col-sm-4 col-form-label"> Date of Identification </label>
                                                <div class="col-sm-8">
                                                    <input type="date" class="form-control" id="date_of_identification" name="date_of_identification" value="{{old('date_of_identification')}}">
                                                    @error('date_of_identification')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="date_of_cash_receipt" class="col-sm-4 col-form-label"> Last date of Cash Receipt </label>
                                                <div class="col-sm-8">
                                                    <input type="date" class="form-control" id="date_of_cash_receipt" name="date_of_cash_receipt" value="{{old('date_of_cash_receipt')}}">
                                                    @error('date_of_cash_receipt')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="case_notes" class="col-sm-4 col-form-label"> Case Notes </label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="case_notes" name="case_notes"  value="{{old('case_notes')}}">
                                                    @error('case_notes')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="date_of_disposed" class="col-sm-4 col-form-label">Date of Disposed</label>
                                                <div class="col-sm-8">
                                                    <input type="date" class="form-control" id="date_of_disposed" name="date_of_disposed" value="{{old('date_of_disposed')}}">
                                                    @error('date_of_disposed')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="power_of_attorny" class="col-sm-4 col-form-label"> Power of Attorny </label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="power_of_attorny" name="power_of_attorny" value="{{old('power_of_attorny')}}">
                                                    @error('power_of_attorny')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="total_legal_bill_amount_cost" class="col-sm-4 col-form-label"> Total Legal Bill Amount & Cost </label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="total_legal_bill_amount_cost" name="total_legal_bill_amount_cost" value="{{old('total_legal_bill_amount_cost')}}">
                                                    @error('total_legal_bill_amount_cost')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="panel_lawyer_id" class="col-sm-4 col-form-label">Panel Lawyer</label>
                                                <div class="col-sm-8">

                                                        <select name="panel_lawyer_id" class="form-control select2">
                                                            <option value="">Select</option>
                                                            @foreach($external_council as $item)
                                                                <option value="{{ $item->id }}" {{(old('panel_lawyer_id') == $item->id ? 'selected':'')}}>{{ $item->first_name }} {{ $item->middle_name }} {{ $item->last_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('panel_lawyer_id')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="assigned_lawyer_id" class="col-sm-4 col-form-label">Assigned Lawyer</label>
                                                <div class="col-sm-8">
                                                        <select name="assigned_lawyer_id" class="form-control select2">
                                                            <option value="">Select</option>
                                                            @foreach($internal_council as $item)
                                                                <option value="{{ $item->id }}" {{(old('assigned_lawyer_id') == $item->id ? 'selected':'')}}>{{ $item->first_name }} {{ $item->middle_name }} {{ $item->last_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('assigned_lawyer_id')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="notes" class="col-sm-4 col-form-label"> Notes </label>
                                                <div class="col-sm-8">
                                                <textarea name="notes" class="form-control" rows="3" placeholder="">{{old('notes')}}</textarea>
                                                    @error('notes')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="other_claim" class="col-sm-4 col-form-label"> Other Claim(if any) </label>
                                                <div class="col-sm-8">
                                                    <textarea name="other_claim" class="form-control" rows="3" placeholder="">{{old('other_claim')}}</textarea>
                                                    @error('other_claim')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="summary_facts_alligation" class="col-sm-4 col-form-label"> Summary of Facts & Alligation </label>
                                                <div class="col-sm-8">
                                                    <textarea name="summary_facts_alligation" class="form-control" rows="3" placeholder="">{{old('summary_facts_alligation')}}</textarea>
                                                    @error('summary_facts_alligation')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="missing_documents_evidence_information" class="col-sm-4 col-form-label"> Missing Documents/Evidence/Information </label>
                                                <div class="col-sm-8">
                                                <textarea name="missing_documents_evidence_information" class="form-control" rows="3" placeholder="">{{old('missing_documents_evidence_information')}}</textarea>
                                                    @error('missing_documents_evidence_information')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="comments" class="col-sm-4 col-form-label"> Comments </label>
                                                <div class="col-sm-8">
                                                <textarea name="comments" class="form-control" rows="3" placeholder="">{{old('comments')}}</textarea>
                                                    @error('comments')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
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
                                        </div>
                                    </div>
                                        <div class="float-right mt-4">
                                            <button type="submit" class="btn btn-primary text-uppercase"><i class="fas fa-save"></i> Save</button>
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




