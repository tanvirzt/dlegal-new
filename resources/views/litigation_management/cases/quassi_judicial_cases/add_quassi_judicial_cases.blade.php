@extends('layouts.admin_layouts.admin_layout')
@section('content')



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Special / Quassi-Judicial Cases</h1>

                    </div><!-- /.col -->



                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">
                                <a class="leading-normal inline-flex items-center font-normal spark-button-focus h-8 text-md px-4 bg-transparent border-0 border-solid text-blue-700 hover:text-blue-800 active:text-blue-700 rounded-md" type="button" href="{{ route('quassi-judicial-cases') }}" aria-disabled="false" role="link" tabindex="-1">Back</a>
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
                                <h3 class="card-title" id="heading">Add Special / Quassi-Judicial Cases</h3>
                            </div>

                            <form action="{{ route('save-quassi-judicial-cases') }}" method="post" enctype="multipart/form-data">
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
                                                <label for="date_of_case_received" class="col-sm-4 col-form-label"> Date of Case Received </label>
                                                <div class="col-sm-8">
                                                    <input type="date" class="form-control" id="date_of_case_received" name="date_of_case_received" value="{{old('date_of_case_received')}}">
                                                    @error('date_of_case_received')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="case_category_nature_id" class="col-sm-4 col-form-label"> Case Category </label>
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
                                                <label for="subsequent_case_no" class="col-sm-4 col-form-label">Subsequent Case No.</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="subsequent_case_no" name="subsequent_case_no" value="{{old('subsequent_case_no')}}">
                                                    @error('subsequent_case_no')<span class="text-danger">{{$message}}</span>@enderror
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
                                                <label for="branch_id" class="col-sm-4 col-form-label"> Branch </label>
                                                <div class="col-sm-8">
                                                        <select name="branch_id" class="form-control select2">
                                                            <option value="">Select</option>
                                                            @foreach($branch as $item)
                                                                <option value="{{ $item->id }}" {{(old('branch_id') == $item->id ? 'selected':'')}}>{{ $item->branch_name }}</option>
                                                            @endforeach                                                         
                                                        </select>
                                                        @error('branch_id')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="member_no" class="col-sm-4 col-form-label">Member No.</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="member_no" name="member_no" value="{{old('member_no')}}">
                                                    @error('member_no')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="program_id" class="col-sm-4 col-form-label"> Program </label>
                                                <div class="col-sm-8">
                                                        <select name="program_id" class="form-control select2">
                                                            <option value="">Select</option>
                                                            @foreach($program as $item)
                                                                <option value="{{ $item->id }}" {{(old('program_id') == $item->id ? 'selected':'')}}>{{ $item->program_name }}</option>
                                                            @endforeach                                                         
                                                        </select>
                                                        @error('program_id')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="police_station" class="col-sm-4 col-form-label">Police Station</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="police_station" name="police_station" value="{{old('police_station')}}">
                                                    @error('police_station')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="name_of_the_court_id" class="col-sm-4 col-form-label"> Name of the Court </label>
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
                                                <label for="date_of_filing" class="col-sm-4 col-form-label">Date of filing</label>
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
                                                <label for="district_id" class="col-sm-4 col-form-label">District</label>
                                                <div class="col-sm-8">
                                                    <select name="district_id" class="form-control" id="district_id">
                                                        <option value=""> Select </option>

                                                    </select>       
                                                    @error('district_id')<span class="text-danger">{{$message}}</span>@enderror
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
                                                <label for="alligation_id" class="col-sm-4 col-form-label"> Alligation </label>
                                                <div class="col-sm-8">
                                                        <select name="alligation_id" class="form-control select2">
                                                            <option value="">Select</option>
                                                            @foreach($alligation as $item)
                                                                <option value="{{ $item->id }}" {{(old('alligation_id') == $item->id ? 'selected':'')}}>{{ $item->alligation_name }}</option>
                                                            @endforeach                                                         
                                                        </select>
                                                        @error('alligation_id')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="amount" class="col-sm-4 col-form-label">Amount of Money</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="amount" name="amount" value="{{old('amount')}}">
                                                    @error('amount')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="name_of_the_complainant" class="col-sm-4 col-form-label">Name of the Complainant</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="name_of_the_complainant" name="name_of_the_complainant" value="{{old('name_of_the_complainant')}}">
                                                    @error('name_of_the_complainant')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="complainant_contact_no" class="col-sm-4 col-form-label"> Complainant Contact No. </label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="complainant_contact_no" name="complainant_contact_no" value="{{old('complainant_contact_no')}}">
                                                    @error('complainant_contact_no')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="complainant_designation_id" class="col-sm-4 col-form-label">Designation of the Complainant</label>
                                                <div class="col-sm-8">

                                                        <select name="complainant_designation_id" class="form-control select2">
                                                            <option value="">Select</option>
                                                            @foreach($designation as $item)
                                                                <option value="{{ $item->id }}" {{(old('complainant_designation_id') == $item->id ? 'selected':'')}}>{{ $item->designation_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('complainant_designation_id')<span class="text-danger">{{$message}}</span>@enderror

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
                                                <label for="opposite_party_name" class="col-sm-4 col-form-label"> Name of the Opposite Party </label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="opposite_party_name" name="opposite_party_name" value="{{old('opposite_party_name')}}">
                                                    @error('opposite_party_name')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="opposite_party_address" class="col-sm-4 col-form-label"> Address of Opposite Party </label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="opposite_party_address" name="opposite_party_address" value="{{old('opposite_party_address')}}">
                                                    @error('opposite_party_address')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="case_status_id" class="col-sm-4 col-form-label">Status of the Cases</label>
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
                                            
                                        </div>
                                        <div class="col-md-6">
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
                                                <label for="accused_name" class="col-sm-4 col-form-label">Name of the Accused</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="accused_name" name="accused_name" value="{{old('accused_name')}}">
                                                    @error('accused_name')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="accused_company_id" class="col-sm-4 col-form-label">Name of the Accused Company</label>
                                                <div class="col-sm-8">
                                                        <select name="accused_company_id" class="form-control select2">
                                                            <option value="">Select</option>
                                                            @foreach($company as $item)
                                                                <option value="{{ $item->id }}" {{(old('company_id') == $item->id ? 'selected':'')}}>{{ $item->company_name }}</option>
                                                            @endforeach                                                         
                                                        </select>
                                                    @error('accused_company_id')<span class="text-danger">{{$message}}</span>@enderror
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
                                                <label for="accused_address" class="col-sm-4 col-form-label"> Address of the Accused </label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="accused_address" name="accused_address" value="{{old('accused_address')}}">
                                                    @error('accused_address')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="accused_contact_no" class="col-sm-4 col-form-label"> Accused Contact No. </label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="accused_contact_no" name="accused_contact_no" value="{{old('accused_contact_no')}}">
                                                    @error('accused_contact_no')<span class="text-danger">{{$message}}</span>@enderror
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
                                                <label for="plaintiff_contact_number" class="col-sm-4 col-form-label">Plaintiff Contact No</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="plaintiff_contact_number" name="plaintiff_contact_number" value="{{old('plaintiff_contact_number')}}">
                                                    @error('plaintiff_contact_number')<span class="text-danger">{{$message}}</span>@enderror
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
                                                <label for="case_notes" class="col-sm-4 col-form-label"> Case Notes </label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="case_notes" name="case_notes"  value="{{old('case_notes')}}">
                                                    @error('case_notes')<span class="text-danger">{{$message}}</span>@enderror
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
                                                <label for="total_legal_bill_amount" class="col-sm-4 col-form-label">Total Legal Bill Amount and Cost</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="total_legal_bill_amount" name="total_legal_bill_amount" value="{{old('total_legal_bill_amount')}}">
                                                    @error('total_legal_bill_amount')<span class="text-danger">{{$message}}</span>@enderror
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
                                                <label for="prayer_claims_by_psg" class="col-sm-4 col-form-label"> Prayer/Claims by PSG </label>
                                                <div class="col-sm-8">
                                                    <textarea name="prayer_claims_by_psg" class="form-control" rows="3" placeholder="">{{old('prayer_claims_by_psg')}}</textarea>
                                                    @error('prayer_claims_by_psg')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="missing_documents_evidence" class="col-sm-4 col-form-label"> Missing Documents/Evidence/Information </label>
                                                <div class="col-sm-8">
                                                    <textarea name="missing_documents_evidence" class="form-control" rows="3" placeholder="">{{old('missing_documents_evidence')}}</textarea>
                                                    @error('missing_documents_evidence')<span class="text-danger">{{$message}}</span>@enderror
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
                                                <label for="uploaded_document"> Document Upload </label>
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




