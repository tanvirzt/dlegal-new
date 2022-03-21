@extends('layouts.admin_layouts.admin_layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">High Court of Bangladesh</h1>

                    </div><!-- /.col -->


                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">
                                <a class="leading-normal inline-flex items-center font-normal spark-button-focus h-8 text-md px-4 bg-transparent border-0 border-solid text-blue-700 hover:text-blue-800 active:text-blue-700 rounded-md"
                                   type="button" href="{{ route('high-court-cases') }}" aria-disabled="false"
                                   role="link"
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
                            <div class="card-header">
                                <h3 class="card-title" id="heading">Add High Court of Bangladesh</h3>
                            </div>

                            <form action="{{ route('save-high-court-cases') }}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-md-6">

                                            <div class="form-group row">
                                                <label for="lower_court" class="col-sm-4 col-form-label"> Lower Court
                                                </label>
                                                <div class="col-sm-8">
                                                    <input type="checkbox" class="mt-2" id="lower_court"
                                                           name="lower_court" value="Lower Court">
                                                </div>
                                            </div>
                                            <div id="lower_court_info" style="display: none;">
                                                <div class="form-group row">
                                                    <label for="case_no" class="col-sm-4 col-form-label">Case
                                                        No. (Lower Court)</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="case_no"
                                                               name="case_no"
                                                               value="{{ old('case_no') }}">
                                                        @error('case_no')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="division_id"
                                                           class="col-sm-4 col-form-label">Division</label>
                                                    <div class="col-sm-8">
                                                        <select name="division_id" class="form-control select2"
                                                                id="division_id"
                                                                action="{{ route('find_district') }}">
                                                            <option value="">Select</option>
                                                            @foreach ($division as $item)
                                                                <option value="{{ $item->id }}"
                                                                    {{ old('division_id') == $item->id ? 'selected' : '' }}>
                                                                    {{ ucfirst($item->division_name) }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('division_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="district_id"
                                                           class="col-sm-4 col-form-label">District</label>
                                                    <div class="col-sm-8">
                                                        <select name="district_id" class="form-control select2"
                                                                id="district_id" action="{{ route('find-thana') }}">
                                                            <option value=""> Select</option>

                                                        </select>
                                                        @error('district_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="thana_id" class="col-sm-4 col-form-label">Police
                                                        Station</label>
                                                    <div class="col-sm-8">
                                                        <select name="thana_id" class="form-control select2"
                                                                id="thana_id">
                                                            <option value=""> Select</option>

                                                        </select>
                                                        @error('thana_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="case_category_id"
                                                           class="col-sm-4 col-form-label"> Case
                                                        Category </label>
                                                    <div class="col-sm-8">

                                                        <select name="case_category_id"
                                                                class="form-control select2">
                                                            <option value="">Select</option>
                                                            @foreach ($case_category as $item)
                                                                <option value="{{ $item->id }}"
                                                                    {{ old('case_category_id') == $item->id ? 'selected' : '' }}>
                                                                    {{ $item->case_category_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('case_category_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="case_class_id"
                                                           class="col-sm-4 col-form-label"> Class of Cases </label>
                                                    <div class="col-sm-8">

                                                        <select name="case_class_id"
                                                                class="form-control select2">
                                                            <option value="">Select</option>

                                                            @foreach($case_class as $item)
                                                                <option value="{{ $item->id }}" {{ old('case_class_id') == $item->id ? 'selected' : '' }}>{{ $item->case_class_name }}</option>
                                                            @endforeach


                                                        </select>
                                                        @error('case_class_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="case_type_id" class="col-sm-4 col-form-label">Type of
                                                        Cases</label>
                                                    <div class="col-sm-8">

                                                        <select name="case_type_id" class="form-control select2">
                                                            <option value="">Select</option>
                                                            @foreach ($case_types as $item)
                                                                <option value="{{ $item->id }}"
                                                                    {{ old('case_type_id') == $item->id ? 'selected' : '' }}>
                                                                    {{ $item->case_types_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('case_type_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="relevant_law_sections_id"
                                                           class="col-sm-4 col-form-label">
                                                        Relevant Laws/Sections </label>
                                                    <div class="col-sm-8">
                                                        <select name="relevant_law_sections_id"
                                                                class="form-control select2">
                                                            <option value="">Select</option>
                                                            @foreach ($law_section as $item)
                                                                <option value="{{ $item->id }}"
                                                                    {{ old('relevant_law_sections_id') == $item->id ? 'selected' : '' }}>
                                                                    {{ $item->law_section_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('relevant_law_sections_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="section_id"
                                                           class="col-sm-4 col-form-label">
                                                        Section </label>
                                                    <div class="col-sm-8">
                                                        <select name="section_id"
                                                                class="form-control select2">

                                                            <option value="">Select</option>
                                                            @foreach($section as $item)
                                                                <option value="{{ $item->id }}" {{ old('section_id') == $item->id ? 'selected' : '' }}>{{ $item->section_name }}</option>
                                                            @endforeach

                                                        </select>
                                                        @error('section_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="date_of_filing" class="col-sm-4 col-form-label">Date of
                                                        filing</label>
                                                    <div class="col-sm-8">
                                                        <input type="date" class="form-control" id="date_of_filing"
                                                               name="date_of_filing"
                                                               value="{{ old('date_of_filing') }}">
                                                        @error('date_of_filing')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="plaintiff_name" class="col-sm-4 col-form-label">Plaintiff
                                                        Name</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="plaintiff_name"
                                                               name="plaintiff_name"
                                                               value="{{ old('plaintiff_name') }}">
                                                        @error('plaintiff_name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="plaintiff_designaiton_id"
                                                           class="col-sm-4 col-form-label">Plaintiff Designation</label>
                                                    <div class="col-sm-8">

                                                        <select name="plaintiff_designaiton_id"
                                                                class="form-control select2">
                                                            <option value="">Select</option>
                                                            @foreach ($designation as $item)
                                                                <option value="{{ $item->id }}"
                                                                    {{ old('plaintiff_designaiton_id') == $item->id ? 'selected' : '' }}>
                                                                    {{ $item->designation_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('plaintiff_designaiton_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="plaintiff_contact_number"
                                                           class="col-sm-4 col-form-label">Plaintiff Contact No</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control"
                                                               id="plaintiff_contact_number"
                                                               name="plaintiff_contact_number"
                                                               value="{{ old('plaintiff_contact_number') }}">
                                                        @error('plaintiff_contact_number')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="name_of_the_complainant"
                                                           class="col-sm-4 col-form-label">Name
                                                        of the Complainant</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control"
                                                               id="name_of_the_complainant"
                                                               name="name_of_the_complainant"
                                                               value="{{ old('name_of_the_complainant') }}">
                                                        @error('name_of_the_complainant')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="complainant_contact_no" class="col-sm-4 col-form-label">
                                                        Complainant Contact No. </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control"
                                                               id="complainant_contact_no"
                                                               name="complainant_contact_no"
                                                               value="{{ old('complainant_contact_no') }}">
                                                        @error('complainant_contact_no')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="complainant_designation_id"
                                                           class="col-sm-4 col-form-label">Designation of the
                                                        Complainant</label>
                                                    <div class="col-sm-8">

                                                        <select name="complainant_designation_id"
                                                                class="form-control select2">
                                                            <option value="">Select</option>
                                                            @foreach ($designation as $item)
                                                                <option value="{{ $item->id }}"
                                                                    {{ old('complainant_designation_id') == $item->id ? 'selected' : '' }}>
                                                                    {{ $item->designation_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('complainant_designation_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="accused_name" class="col-sm-4 col-form-label">Name of
                                                        the
                                                        Accused</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="accused_name"
                                                               name="accused_name" value="{{ old('accused_name') }}">
                                                        @error('accused_name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="accused_company_id" class="col-sm-4 col-form-label">Name
                                                        of
                                                        the
                                                        Accused Company</label>
                                                    <div class="col-sm-8">
                                                        <select name="accused_company_id" class="form-control select2">
                                                            <option value="">Select</option>
                                                            @foreach ($company as $item)
                                                                <option value="{{ $item->id }}"
                                                                    {{ old('accused_company_id') == $item->id ? 'selected' : '' }}>
                                                                    {{ $item->company_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('accused_company_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="accused_address" class="col-sm-4 col-form-label">
                                                        Address of
                                                        the Accused </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="accused_address"
                                                               name="accused_address"
                                                               value="{{ old('accused_address') }}">
                                                        @error('accused_address')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="accused_contact_no" class="col-sm-4 col-form-label">
                                                        Accused
                                                        Contact No. </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="accused_contact_no"
                                                               name="accused_contact_no"
                                                               value="{{ old('accused_contact_no') }}">
                                                        @error('accused_contact_no')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="other_claim" class="col-sm-4 col-form-label"> Other
                                                        Claim(if
                                                        any) </label>
                                                    <div class="col-sm-8">
                                                    <textarea name="other_claim" class="form-control" rows="3"
                                                              placeholder="">{{ old('other_claim') }}</textarea>
                                                        @error('other_claim')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="summary_facts_alligation"
                                                           class="col-sm-4 col-form-label">
                                                        Summary of Facts & Alligation </label>
                                                    <div class="col-sm-8">
                                                    <textarea name="summary_facts_alligation" class="form-control"
                                                              rows="3"
                                                              placeholder="">{{ old('summary_facts_alligation') }}</textarea>
                                                        @error('summary_facts_alligation')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="trial_court_id" class="col-sm-4 col-form-label">
                                                        Name of Trial / Impugned Court </label>
                                                    <div class="col-sm-8">
                                                        <select name="trial_court_id"
                                                                class="form-control select2">
                                                            <option value="">Select</option>
                                                            @foreach ($court as $item)
                                                                <option value="{{ $item->id }}"
                                                                    {{ old('trial_court_id') == $item->id ? 'selected' : '' }}>
                                                                    {{ $item->court_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('trial_court_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="trial_court_judgement_date" class="col-sm-4 col-form-label">
                                                        Date of Judgement/Order (Trial Court) </label>
                                                    <div class="col-sm-8">
                                                        <input type="date" class="form-control" id="trial_court_judgement_date"
                                                               name="trial_court_judgement_date"
                                                               value="{{ old('trial_court_judgement_date') }}">
                                                        @error('trial_court_judgement_date')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="trial_grounds_judgement"
                                                           class="col-sm-4 col-form-label">
                                                        Judgment/Order with Grounds (Trial Court) </label>
                                                    <div class="col-sm-8">
                                                    <textarea name="trial_grounds_judgement" class="form-control"
                                                              rows="3"
                                                              placeholder="">{{ old('trial_grounds_judgement') }}</textarea>
                                                        @error('trial_grounds_judgement')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="appeal_court_id" class="col-sm-4 col-form-label">
                                                        Name of Appeal/Revision Court (District) </label>
                                                    <div class="col-sm-8">
                                                        <select name="appeal_court_id"
                                                                class="form-control select2">
                                                            <option value="">Select</option>
                                                            @foreach ($court as $item)
                                                                <option value="{{ $item->id }}"
                                                                    {{ old('appeal_court_id') == $item->id ? 'selected' : '' }}>
                                                                    {{ $item->court_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('appeal_court_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="appeal_court_judgement_date" class="col-sm-4 col-form-label">
                                                        Date of Judgement (Appeal/Revision Court) </label>
                                                    <div class="col-sm-8">
                                                        <input type="date" class="form-control" id="appeal_court_judgement_date"
                                                               name="appeal_court_judgement_date"
                                                               value="{{ old('appeal_court_judgement_date') }}">
                                                        @error('appeal_court_judgement_date')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="appeal_grounds_judgement" class="col-sm-4 col-form-label">
                                                        Judgement of Appeal/Revision with Grounds (District
                                                        Court) </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="appeal_grounds_judgement"
                                                               name="appeal_grounds_judgement"
                                                               value="{{ old('appeal_grounds_judgement') }}">
                                                        @error('appeal_grounds_judgement')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="appeal_court_judgement" class="col-sm-4 col-form-label">
                                                        Judgement/Order of Appeal/Revision Court (District) </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="appeal_court_judgement"
                                                               name="appeal_court_judgement"
                                                               value="{{ old('appeal_court_judgement') }}">
                                                        @error('appeal_court_judgement')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="panel_lawyer_id" class="col-sm-4 col-form-label">Panel
                                                        Lawyer</label>
                                                    <div class="col-sm-8">

                                                        <select name="panel_lawyer_id" class="form-control select2">
                                                            <option value="">Select</option>
                                                            @foreach ($external_council as $item)
                                                                <option value="{{ $item->id }}"
                                                                    {{ old('panel_lawyer_id') == $item->id ? 'selected' : '' }}>
                                                                    {{ $item->first_name }} {{ $item->middle_name }}
                                                                    {{ $item->last_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('panel_lawyer_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="total_legal_bill_amount" class="col-sm-4 col-form-label">Total
                                                    Legal Bill Amount and Cost</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="total_legal_bill_amount"
                                                           name="total_legal_bill_amount"
                                                           value="{{ old('total_legal_bill_amount') }}">
                                                    @error('total_legal_bill_amount')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="case_received_lawyer_id"
                                                       class="col-sm-4 col-form-label">Case Received (From)</label>
                                                <div class="col-sm-8">

                                                    <select name="case_received_lawyer_id"
                                                            class="form-control select2"
                                                            id="case_received_lawyer_id"
                                                            action="{{ route('find-associates') }}">
                                                        <option value="">Select</option>
                                                        @foreach ($external_council as $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ old('case_received_lawyer_id') == $item->id ? 'selected' : '' }}>
                                                                {{ $item->first_name }} {{ $item->middle_name }}
                                                                {{ $item->last_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('case_received_lawyer_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="case_papers_received" class="col-sm-4 col-form-label">Case
                                                    Papers Received</label>
                                                <div class="col-sm-8">
                                                    <input type="date" class="form-control" id="case_papers_received"
                                                           name="case_papers_received"
                                                           value="{{ old('case_papers_received') }}">
                                                    @error('case_papers_received')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="tadbirkar_details" class="col-sm-4 col-form-label">
                                                    Tadbirkar Details </label>
                                                <div class="col-sm-8">
                                                    <textarea name="tadbirkar_details" class="form-control"
                                                              rows="3"
                                                              placeholder="">{{ old('tadbirkar_details') }}</textarea>
                                                    @error('tadbirkar_details')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="tender_no" class="col-sm-4 col-form-label">Tender
                                                    No.</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="tender_no"
                                                           name="tender_no"
                                                           value="{{ old('tender_no') }}">
                                                    @error('tender_no')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>


                                        <div class="col-md-6">

                                            <div class="form-group row">
                                                <label for="tender_no_date" class="col-sm-4 col-form-label">Tender
                                                    No. Date</label>
                                                <div class="col-sm-8">
                                                    <input type="date" class="form-control" id="tender_no_date"
                                                           name="tender_no_date"
                                                           value="{{ old('tender_no_date') }}">
                                                    @error('tender_no_date')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="supreme_court_category_id"
                                                       class="col-sm-4 col-form-label">Category of Supreme Court
                                                    Case</label>
                                                <div class="col-sm-8">
                                                    <select name="supreme_court_category_id"
                                                            class="form-control select2"
                                                            id="supreme_court_category_id" action="{{ route('find-supreme-court-subcategory') }}">
                                                        <option value="">Select</option>
                                                        @foreach ($supreme_court_category as $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ old('supreme_court_category_id') == $item->id ? 'selected' : '' }}>
                                                                {{ $item->supreme_court_category }} </option>
                                                        @endforeach
                                                    </select>
                                                    @error('supreme_court_category_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="supreme_court_subcategory_id"
                                                       class="col-sm-4 col-form-label">Subcategory of Supreme Court
                                                    Case</label>
                                                <div class="col-sm-8">

                                                    <select name="supreme_court_subcategory_id"
                                                            class="form-control select2"
                                                            id="supreme_court_subcategory_id">
                                                        <option value="">Select</option>

                                                    </select>
                                                    @error('supreme_court_subcategory_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="case_no_hcd" class="col-sm-4 col-form-label">
                                                    Case No. (High Court Division) </label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="case_no_hcd"
                                                           name="case_no_hcd"
                                                           value="{{ old('case_no_hcd') }}">
                                                    @error('case_no_hcd')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="date_of_filing_hcd" class="col-sm-4 col-form-label">Date of
                                                    filing(High Court Division)</label>
                                                <div class="col-sm-8">
                                                    <input type="date" class="form-control" id="date_of_filing_hcd"
                                                           name="date_of_filing_hcd"
                                                           value="{{ old('date_of_filing_hcd') }}">
                                                    @error('date_of_filing_hcd')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="hcd_court_id" class="col-sm-4 col-form-label">
                                                    Court (High Court Division) </label>
                                                <div class="col-sm-8">
                                                    <select name="hcd_court_id"
                                                            class="form-control select2">
                                                        <option value="">Select</option>
                                                        @foreach ($court as $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ old('hcd_court_id') == $item->id ? 'selected' : '' }}>
                                                                {{ $item->court_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('hcd_court_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="law_sections_id"
                                                       class="col-sm-4 col-form-label">
                                                    Law & Sections </label>
                                                <div class="col-sm-8">
                                                    <select name="law_sections_id"
                                                            class="form-control select2">
                                                        <option value="">Select</option>
                                                        @foreach ($law_section as $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ old('law_sections_id') == $item->id ? 'selected' : '' }}>
                                                                {{ $item->law_section_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('law_sections_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="order" class="col-sm-4 col-form-label">
                                                    Order
                                                </label>
                                                <div class="col-sm-8">
                                                    <textarea name="order" class="form-control"
                                                              rows="3"
                                                              placeholder="">{{ old('order') }}</textarea>
                                                    @error('order')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="order_date" class="col-sm-4 col-form-label">
                                                    Order Date </label>
                                                <div class="col-sm-8">
                                                    <input type="date" class="form-control" name="order_date" id="order_date"
                                                           name="order_date"
                                                           value="{{ old('order_date') }}">
                                                    @error('order_date')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="order_no_memo" class="col-sm-4 col-form-label">
                                                    Order No. & Memo </label>
                                                <div class="col-sm-8">
                                                    <input type="date" class="form-control" name="order_no_memo" id="order_no_memo"
                                                           name="order_no_memo"
                                                           value="{{ old('order_no_memo') }}">
                                                    @error('order_no_memo')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="appellant_petitioner_name" class="col-sm-4 col-form-label">
                                                    Name of the Appellant/Petitioner </label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="appellant_petitioner_name"
                                                           name="appellant_petitioner_name"
                                                           value="{{ old('appellant_name') }}">
                                                    @error('appellant_petitioner_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="appellant_designation_id" class="col-sm-4 col-form-label">
                                                    Designation of the Appellant/Petitioner </label>
                                                <div class="col-sm-8">
                                                    <select name="appellant_designation_id"
                                                            class="form-control select2">
                                                        <option value="">Select</option>
                                                        @foreach ($designation as $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ old('appellant_designation_id') == $item->id ? 'selected' : '' }}>
                                                                {{ $item->designation_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('appellant_designation_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="appellant_address" class="col-sm-4 col-form-label">
                                                    Address of the Appellant/Petitioner </label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="appellant_address"
                                                           name="appellant_address"
                                                           value="{{ old('appellant_address') }}">
                                                    @error('appellant_address')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="opposite_party_name" class="col-sm-4 col-form-label">
                                                    Name of
                                                    the Respondent/Opposite Party </label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="opposite_party_name"
                                                           name="opposite_party_name"
                                                           value="{{ old('opposite_party_name') }}">
                                                    @error('opposite_party_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="opposite_party_designation_id"
                                                       class="col-sm-4 col-form-label">Designation of the
                                                    Respondent/Opposite Party</label>
                                                <div class="col-sm-8">
                                                    <select name="opposite_party_designation_id"
                                                            class="form-control select2">
                                                        <option value="">Select</option>
                                                        @foreach ($designation as $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ old('opposite_party_designation_id') == $item->id ? 'selected' : '' }}>
                                                                {{ $item->designation_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('opposite_party_designation_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="opposite_party_address" class="col-sm-4 col-form-label">
                                                    Address of Respondent/Opposite Party </label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control"
                                                           id="opposite_party_address"
                                                           name="opposite_party_address"
                                                           value="{{ old('opposite_party_address') }}">
                                                    @error('opposite_party_address')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="party_steps_taken_id" class="col-sm-4 col-form-label">Step Taken
                                                    by the Party</label>
                                                <div class="col-sm-8">
                                                    <select name="party_steps_taken_id" class="form-control select2">
                                                        <option value="">Select</option>
                                                        @foreach ($next_date_reason as $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ old('party_steps_taken_id') == $item->id ? 'selected' : '' }}>
                                                                {{ $item->next_date_reason_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('party_steps_taken_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="case_status_id" class="col-sm-4 col-form-label">Status of
                                                    the
                                                    Cases</label>
                                                <div class="col-sm-8">
                                                    <select name="case_status_id" class="form-control select2">
                                                        <option value="">Select</option>
                                                        @foreach ($case_status as $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ old('case_status_id') == $item->id ? 'selected' : '' }}>
                                                                {{ $item->case_status_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('case_status_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="fixed_hearing_court_id" class="col-sm-4 col-form-label">
                                                    Name of Court (Fixed for Hearing) </label>
                                                <div class="col-sm-8">
                                                    <select name="fixed_hearing_court_id"
                                                            class="form-control select2">
                                                        <option value="">Select</option>
                                                        @foreach ($court as $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ old('fixed_hearing_court_id') == $item->id ? 'selected' : '' }}>
                                                                {{ $item->court_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('fixed_hearing_court_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="court_steps_taken_id" class="col-sm-4 col-form-label"> Next
                                                    Step to be Taken in Court </label>
                                                <div class="col-sm-8">
                                                    <select name="court_steps_taken_id" class="form-control select2">
                                                        <option value="">Select</option>
                                                        @foreach ($next_date_reason as $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ old('court_steps_taken_id') == $item->id ? 'selected' : '' }}>
                                                                {{ $item->next_date_reason_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('court_steps_taken_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="court_next_steps_date" class="col-sm-4 col-form-label"> Date for Next
                                                    Step in Court </label>
                                                <div class="col-sm-8">
                                                    <input type="date" class="form-control" id="court_next_steps_date"
                                                           name="court_next_steps_date" value="{{ old('court_next_steps_date') }}">
                                                    @error('court_next_steps_date')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="assigned_lawyer_id" class="col-sm-4 col-form-label">Name of
                                                    Lawyer</label>
                                                <div class="col-sm-8">
                                                    <select name="assigned_lawyer_id" class="form-control select2">
                                                        <option value="">Select</option>
                                                        @foreach ($internal_council as $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ old('assigned_lawyer_id') == $item->id ? 'selected' : '' }}>
                                                                {{ $item->first_name }} {{ $item->middle_name }}
                                                                {{ $item->last_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('assigned_lawyer_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="documents_lawyers_appointment" class="col-sm-4 col-form-label">
                                                    Documents(Lawyer's Appointment) </label>
                                                <div class="col-sm-8">
                                                    <textarea name="documents_lawyers_appointment" class="form-control"
                                                              rows="3"
                                                              placeholder="">{{ old('documents_lawyers_appointment') }}</textarea>
                                                    @error('documents_lawyers_appointment')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="documents_sent_to_law_chamber" class="col-sm-4 col-form-label">
                                                    Documents sent to Lawyer/Law Chamber </label>
                                                <div class="col-sm-8">
                                                    <textarea name="documents_sent_to_law_chamber" class="form-control"
                                                              rows="3"
                                                              placeholder="">{{ old('documents_sent_to_law_chamber') }}</textarea>
                                                    @error('documents_sent_to_law_chamber')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="documents_received_field_programe" class="col-sm-4 col-form-label">
                                                    Documents received from field office/programe </label>
                                                <div class="col-sm-8">
                                                    <textarea name="documents_received_field_programe" class="form-control"
                                                              rows="3"
                                                              placeholder="">{{ old('documents_received_field_programe') }}</textarea>
                                                    @error('documents_received_field_programe')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="missing_documents_evidence" class="col-sm-4 col-form-label">
                                                    Missing Documents/Evidence/Information </label>
                                                <div class="col-sm-8">
                                                    <textarea name="missing_documents_evidence" class="form-control"
                                                              rows="3"
                                                              placeholder="">{{ old('missing_documents_evidence') }}</textarea>
                                                    @error('missing_documents_evidence')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="ground_appeal_revision" class="col-sm-4 col-form-label">
                                                    Ground of Appeal/Revision </label>
                                                <div class="col-sm-8">
                                                    <textarea name="ground_appeal_revision" class="form-control"
                                                              rows="3"
                                                              placeholder="">{{ old('ground_appeal_revision') }}</textarea>
                                                    @error('ground_appeal_revision')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="recommendations" class="col-sm-4 col-form-label">
                                                    Recommendations </label>
                                                <div class="col-sm-8">
                                                    <textarea name="recommendations" class="form-control"
                                                              rows="3"
                                                              placeholder="">{{ old('recommendations') }}</textarea>
                                                    @error('recommendations')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
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
                                                class="fas fa-save"></i> Save
                                        </button>
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
