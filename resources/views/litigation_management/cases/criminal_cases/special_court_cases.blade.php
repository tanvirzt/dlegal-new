@extends('layouts.admin_layouts.admin_layout')
@section('content')
@php
if (empty($case_cat)) {
    $case_cat = '';
}
@endphp
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> Special Court </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>

                            <li class="breadcrumb-item active"> Special Court Cases</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                        {{ Session::get('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if (Session::has('error'))
                    <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                        {{ Session::get('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div id="accordion">
                                <div class="card-header" id="headingTwo">
                                    <h3 class="card-title"> Special Court Cases :: Search </h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn collapsed" data-toggle="collapse"
                                            data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                           <i class="fas fa-plus-circle" style="font-size: 23px;color: #0CA2A3;"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="far fa-times-circle" style="font-size: 23px;color: red;"></i>
                                        </button>
                                    </div>
                                </div>


                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                    data-parent="#accordion">
                                    <div class="card-body">


                                        <form method="get" action="{{ route('advanced-search-criminal-cases') }}">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label for="created_case_id" class="col-sm-4 col-form-label">Case
                                                            ID</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="created_case_id"
                                                                name="created_case_id" value="{{ old('created_case_id') }}">
                                                            @error('created_case_id')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="case_infos_case_no" class="col-sm-4 col-form-label">Case
                                                            No.</label>
                                                        <div class="col-sm-4">
                                                            <input type="text" class="form-control"
                                                                id="case_infos_case_no" name="case_infos_case_no"
                                                                placeholder="Case No."
                                                                value="{{ old('case_infos_case_no') }}">
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <input type="text" class="form-control"
                                                                id="case_infos_case_year" name="case_infos_case_year"
                                                                placeholder="Year"
                                                                value="{{ old('case_infos_case_year') }}">
                                                        </div>

                                                        @error('case_infos_case_no')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="name_of_the_court_id" class="col-sm-4 col-form-label">
                                                            Name of the Court </label>
                                                        <div class="col-sm-8">
                                                            <select name="name_of_the_court_id"
                                                                class="form-control select2">
                                                                <option value="">Select</option>
                                                                @foreach ($court as $item)
                                                                    <option value="{{ $item->id }}">
                                                                        {{ $item->court_name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('name_of_the_court_id')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="case_infos_complainant_informant_name"
                                                            class="col-sm-4 col-form-label">1st
                                                            Party/Complainant/ Petitioner/Plaintiff</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control"
                                                                id="case_infos_complainant_informant_name"
                                                                name="case_infos_complainant_informant_name"
                                                                value="{{ old('case_infos_complainant_informant_name') }}">
                                                            @error('case_infos_complainant_informant_name')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="case_infos_accused_name"
                                                            class="col-sm-4 col-form-label">2nd Party/Accused/
                                                            Oppositon/Defendant</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control"
                                                                id="case_infos_accused_name"
                                                                name="case_infos_accused_name"
                                                                value="{{ old('case_infos_accused_name') }}">
                                                            @error('case_infos_accused_name')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="client_id"
                                                            class="col-sm-4 col-form-label">Client/Party</label>
                                                        <div class="col-sm-8">

                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <select name="client_id" id="client_id"
                                                                        class="form-control select2">
                                                                        <option value="">Select</option>
                                                                        @foreach ($client_name as $item)
                                                                            <option value="{{ $item->client_name }}"
                                                                                {{ old('client_id') == $item->id ? 'selected' : '' }}>
                                                                                {{ $item->client_name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <input type="text" class="form-control"
                                                                        id="client_name_write" name="client_name_write"
                                                                        placeholder="Client/Party"
                                                                        value="{{ old('client_name_write') }}">
                                                                </div>
                                                            </div>

                                                            @error('client_name')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="client_category_id"
                                                            class="col-sm-4 col-form-label">Client/Party
                                                            Category</label>
                                                        <div class="col-sm-8">
                                                            <select name="client_category_id" class="form-control select2"
                                                                id="client_category_id"
                                                                action="{{ route('find-client-subcategory') }}">
                                                                <option value="">Select</option>
                                                                @foreach ($client_category as $item)
                                                                    <option value="{{ $item->id }}"
                                                                        {{ old('client_category_id') == $item->id ? 'selected' : '' }}>
                                                                        {{ ucfirst($item->client_category_name) }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('client_category_id')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="client_subcategory_id"
                                                            class="col-sm-4 col-form-label">Client/Party
                                                            Subcategory</label>
                                                        <div class="col-sm-8">
                                                            <select name="client_subcategory_id"
                                                                class="form-control select2" id="client_subcategory_id">
                                                                <option value="">Select</option>

                                                            </select>
                                                            @error('client_subcategory_id')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="client_group_id"
                                                            class="col-sm-4 col-form-label">Client Group Name</label>
                                                        <div class="col-sm-8">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <select name="client_group_id" id="client_group_id"
                                                                        class="form-control select2">
                                                                        <option value="">Select</option>
                                                                        @foreach ($group_name as $item)
                                                                            <option value="{{ $item->id }}"
                                                                                {{ old('client_group_id') == $item->id ? 'selected' : '' }}>
                                                                                {{ $item->group_name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <input type="text" class="form-control"
                                                                        id="client_group_write" name="client_group_write"
                                                                        placeholder="Client Group"
                                                                        value="{{ old('client_group_write') }}">
                                                                </div>
                                                            </div>
                                                            @error('client_name')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label for="case_category_id" class="col-sm-4 col-form-label">Case
                                                            Category</label>
                                                        <div class="col-sm-8">

                                                            <select name="case_category_id" id="case_category_id"
                                                                class="form-control select2">
                                                                <option value="">Select</option>
                                                                <option value="Civil">Civil</option>
                                                                <option value="Criminal">Criminal</option>
                                                                {{-- @foreach ($case_category as $item)
                                                                    <option value="{{ $item->id }}"
                                                                        {{ old('case_category_id') == $item->id ? 'selected' : '' }}>
                                                                        {{ $item->case_category }}</option>
                                                                @endforeach --}}
                                                            </select>
                                                            @error('case_category_id')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="case_type_id" class="col-sm-4 col-form-label">Case
                                                            Type </label>
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
                                                        <label for="matter_id" class="col-sm-4 col-form-label">Case
                                                            Matter</label>
                                                        <div class="col-sm-8">
                                                            <select name="matter_id" id="matter_id"
                                                                class="form-control select2">
                                                                <option value="">Select</option>
                                                                @foreach ($matter as $item)
                                                                    <option value="{{ $item->id }}"
                                                                        {{ old('matter_id') == $item->id ? 'selected' : '' }}>
                                                                        {{ $item->matter_name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('matter_id')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="client_division_id"
                                                            class="col-sm-4 col-form-label">Division/Zone</label>
                                                        <div class="col-sm-8">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <select name="client_division_id"
                                                                        id="client_division_id"
                                                                        class="form-control select2"
                                                                        action="{{ route('find_district') }}">
                                                                        <option value="">Select</option>
                                                                        @foreach ($division as $item)
                                                                            <option value="{{ $item->id }}"
                                                                                {{ old('client_division_id') == $item->id ? 'selected' : '' }}>
                                                                                {{ ucfirst($item->division_name) }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <input type="text" class="form-control"
                                                                        id="client_divisoin_write"
                                                                        name="client_divisoin_write"
                                                                        placeholder="Client Zone"
                                                                        value="{{ old('client_divisoin_write') }}">
                                                                </div>
                                                            </div>
                                                            @error('client_division_id')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="client_district_id"
                                                            class="col-sm-4 col-form-label">District/Area</label>
                                                        <div class="col-sm-8">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <select name="client_district_id"
                                                                        id="client_district_id"
                                                                        class="form-control select2"
                                                                        action="{{ route('find-thana') }}">
                                                                        <option value="">Select</option>

                                                                    </select>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <input type="text" class="form-control"
                                                                        id="client_district_write"
                                                                        name="client_district_write"
                                                                        placeholder="Client Area"
                                                                        value="{{ old('client_district_write') }}">
                                                                </div>
                                                            </div>

                                                            @error('client_district_id')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="client_thana_id"
                                                            class="col-sm-4 col-form-label">Thana/Branch</label>
                                                        <div class="col-sm-8">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <select name="client_thana_id" id="client_thana_id"
                                                                        class="form-control select2">
                                                                        <option value="">Select</option>

                                                                    </select>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <input type="text" class="form-control"
                                                                        id="client_thana_write" name="client_thana_write"
                                                                        placeholder="Client Branch"
                                                                        value="{{ old('client_thana_write') }}">
                                                                </div>
                                                            </div>
                                                            @error('client_thana_id')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="case_status_id" class="col-sm-4 col-form-label">Status
                                                            of the Case</label>
                                                        <div class="col-sm-8">
                                                            <select name="case_status_id" id="case_status_id"
                                                                class="form-control select2">
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
                                                        <label for="case_no" class="col-sm-4 col-form-label"> Next Date
                                                        </label>
                                                        <div class="col-sm-4">
                                                            <span class="date_span_counsel">
                                                                <input type="date"
                                                                    class="xDateContainer date_first_input"
                                                                    onchange="setCorrect(this,'from_next_date');"><input
                                                                    type="text" id="from_next_date"
                                                                    name="from_next_date" placeholder="From"
                                                                    class="date_second_input" tabindex="-1"><span
                                                                    class="date_second_span" tabindex="-1">???</span>
                                                            </span>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <span class="date_span_counsel">
                                                                <input type="date"
                                                                    class="xDateContainer date_first_input"
                                                                    onchange="setCorrect(this,'to_next_date');"><input
                                                                    type="text" id="to_next_date" name="to_next_date"
                                                                    placeholder="To" class="date_second_input"
                                                                    tabindex="-1"><span class="date_second_span"
                                                                    tabindex="-1">???</span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="next_date_fixed_id" class="col-sm-4 col-form-label">
                                                            Next
                                                            date fixed for </label>
                                                        <div class="col-sm-8">
                                                            <select name="next_date_fixed_id"
                                                                class="form-control select2">
                                                                <option value="">Select</option>
                                                                @foreach ($next_date_reason as $item)
                                                                    <option value="{{ $item->id }}"
                                                                        {{ old('next_date_fixed_id') == $item->id ? 'selected' : '' }}>
                                                                        {{ $item->next_date_reason_name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('next_date_fixed_id')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="lawyer_advocate_id"
                                                            class="col-sm-4 col-form-label">Panel
                                                            Lawyer</label>
                                                        <div class="col-sm-8">
                                                            <select name="lawyer_advocate_id" id="lawyer_advocate_id"
                                                                class="form-control select2">
                                                                <option value="">Select</option>
                                                                @foreach ($external_council as $item)
                                                                    <option value="{{ $item->id }}"
                                                                        {{ old('lawyer_advocate_id') == $item->id ? 'selected' : '' }}>
                                                                        {{ $item->first_name }} {{ $item->last_name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            @error('lawyer_advocate_id')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="float-right">
                                                <button type="submit" id="submit"
                                                    class="btn btn-primary text-uppercase"><i class="fas fa-search"></i>
                                                    Search
                                                </button>
                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row ">

                                        <div class="col-sm-10  tab-btn">
                                            <a href="{{ route('special-court-cases-all') }}" class="btn {{ $case_cat == 'all' ? 'civil_active_btn' : 'civil_btn' }}" style="margin-left: 6px;" ><span>All</span></a>
                                            <a href="{{ route('special-court-cases-civil') }}" class="btn {{ $case_cat == 'Civil' ? 'civil_active_btn' : 'civil_btn' }}" ><span>Civil</span></a>
                                            <a href="{{ route('special-court-cases-criminal') }}" class="btn {{ $case_cat == 'Criminal' ? 'civil_active_btn' : 'civil_btn' }}" style="margin-left: 6px;" ><span>Criminal</span></a>

                                        </div>
                                        {{-- <div class="col-sm-1">
                                        </div> --}}
                                        <div class="col-sm-2">
                                            <div class="float-right">
                                                @can('criminal-cases-create')
                                                    <a href="{{ route('add-criminal-cases') }}">
                                                        <button type="button" class="btn btn-success" style="padding: 5px 70px; font-size:18px; background: #0CA2A3; border: 1px solid #0CA2A3;">ADD</button>
                                                    </a>
                                                @endcan
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                <table id="all-cases-dt" class="table all-cases-dt table-bordered table-striped">

                                        <thead>
                                            <tr>
                                                <th class="text-center"> Sl</th>
                                                <th class="text-center"> ID</th>
                                                <!--<th class="text-center"> Status</th>-->
                                                <th class="text-center"> Next Date</th>
                                                <th class="text-center"> Fixed for</th>
                                                <th class="text-center"> Case No.</th>
                                                <th class="text-center"> Sub. Case </th>
                                                <th class="text-center"> Court </th>
                                                <th class="text-center"> District (P-1)</th>
                                                <th class="text-center"> 1st Party</th>
                                                <th class="text-center"> 2nd Party</th>
                                                <th class="text-center"> District (P-2)</th>
                                                <th class="text-center"> Matter</th>
                                                <th class="text-center"> Lawyer</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="search_data">
                                            @foreach ($data as $key => $datum)
                                                <tr>
                                                    <td>
                                                        {{ $key + 1 }}
                                                    </td>

                                                    <td>
                                                        {{ $datum->created_case_id }}
                                                    </td>
                                                    <!--<td>
                                                        @if (Is_numeric($datum->case_status_id))
                                                            {{ $datum->case_status_name }}
                                                        @else
                                                            {{ $datum->case_status_id }}
                                                        @endif
                                                    </td>-->
                                                    <td width="8%">
                                                        @if (!empty($datum->next_date) && $datum->next_date < date('Y-m-d'))
                                                            <span
                                                                style="font-size:11.5px;">{{ date('d-m-Y', strtotime($datum->next_date)) }}</span>
                                                        @elseif(!empty($datum->next_date))
                                                            {{ date('d-m-Y', strtotime($datum->next_date)) }}
                                                        @else
                                                            <button type='button'
                                                                class='btn-custom btn-danger-custom-next-date text-uppercase'
                                                                style="padding:2px;line-height: 10px;">Not Upd
                                                            </button>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{ $datum->next_date_reason_name }}
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('view-criminal-cases', $datum->id) }}">
                                                            {{ $datum->case_infos_case_no ? $datum->case_title_name . ' ' . $datum->case_infos_case_no . '/' . $datum->case_infos_case_year : '' }}
                                                        </a>
                                                    </td>
                                                    <td>
                                                        {{ $datum->sub_seq_case_title_name }}
                                                        @php
                                                            $case_infos_sub_seq_case_no = explode(', ', trim($datum->case_infos_sub_seq_case_no));
                                                            $key = array_key_last($case_infos_sub_seq_case_no);
                                                            echo $case_infos_sub_seq_case_no[$key];

                                                            $case_infos_sub_seq_case_year = explode(', ', trim($datum->case_infos_sub_seq_case_year));
                                                            $key = array_key_last($case_infos_sub_seq_case_year);
                                                            $last_case_no = $case_infos_sub_seq_case_year[$key];
                                                            if ($last_case_no != null) {
                                                                echo '/' . $last_case_no;
                                                            }
                                                        @endphp
                                                    </td>
                                                    <td>


                                                        @if (!empty($datum->case_infos_sub_seq_court_short_id) || !empty($datum->sub_seq_court_short_write))
                                                            @php
                                                                $notes = explode(', ', $datum->case_infos_sub_seq_court_short_id);
                                                            @endphp
                                                            @if ($datum->case_infos_sub_seq_court_short_id)
                                                                @if (count($notes) > 1)
                                                                    @foreach ($notes as $pro)
                                                                        <li class="text-left">{{ $pro }}</li>
                                                                    @endforeach
                                                                @else
                                                                    @foreach ($notes as $pro)
                                                                        {{ $pro }}
                                                                    @endforeach
                                                                @endif
                                                            @endif
                                                            @php
                                                                $notes = explode(', ', $datum->sub_seq_court_short_write);
                                                            @endphp
                                                            @if ($datum->sub_seq_court_short_write)
                                                                @if (count($notes) > 1)
                                                                    @foreach ($notes as $pro)
                                                                        <li class="text-left">{{ $pro }}</li>
                                                                    @endforeach
                                                                @else
                                                                    @foreach ($notes as $pro)
                                                                        {{ $pro }}
                                                                    @endforeach
                                                                @endif
                                                            @endif
                                                        @else
                                                            @php
                                                                $notes = explode(', ', $datum->case_infos_court_short_id);
                                                            @endphp
                                                            @if ($datum->case_infos_court_short_id)
                                                                @if (count($notes) > 1)
                                                                    @foreach ($notes as $pro)
                                                                        <li class="text-left">{{ $pro }}</li>
                                                                    @endforeach
                                                                @else
                                                                    @foreach ($notes as $pro)
                                                                        {{ $pro }}
                                                                    @endforeach
                                                                @endif
                                                            @endif
                                                            @php
                                                                $notes = explode(', ', $datum->court_short_write);
                                                            @endphp
                                                            @if ($datum->court_short_write)
                                                                @if (count($notes) > 1)
                                                                    @foreach ($notes as $pro)
                                                                        <li class="text-left">{{ $pro }}</li>
                                                                    @endforeach
                                                                @else
                                                                    @foreach ($notes as $pro)
                                                                        {{ $pro }}
                                                                    @endforeach
                                                                @endif
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{ $datum->district_name }}
                                                    </td>
                                                    <td>
                                                        @php
                                                            $notes = explode(', ', $datum->case_infos_complainant_informant_name);
                                                        @endphp
                                                        @if ($datum->case_infos_complainant_informant_name)
                                                            @if (count($notes) > 1)
                                                                @foreach ($notes as $pro)
                                                                    <li class="text-left">{{ $pro }}</li>
                                                                @endforeach
                                                            @else
                                                                @foreach ($notes as $pro)
                                                                    {{ $pro }}
                                                                @endforeach
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @php
                                                            $accused = explode(', ', $datum->case_infos_accused_name);
                                                        @endphp
                                                        @if ($datum->case_infos_accused_name)
                                                            @if (count($accused) > 1)
                                                                @foreach ($accused as $item)
                                                                    <li class="text-left">{{ $item }}</li>
                                                                @endforeach
                                                            @else
                                                                @foreach ($accused as $item)
                                                                    {{ $item }}
                                                                @endforeach
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{ $datum->accused_district_name }}
                                                    </td>
                                                    <td>
                                                        {{ $datum->matter_name }} {{ $datum->matter_write }}
                                                    </td>
                                                    <td>
                                                        {{ $datum->first_name }} {{ $datum->last_name }}
                                                        {{ $datum->lawyer_advocate_write }}
                                                    </td>
                                                    <td>
                                                        @if ($datum->delete_status == 0)
                                                            <button type="button"
                                                                class="btn-custom btn-success-custom text-uppercase">
                                                                Active
                                                            </button>
                                                        @else
                                                            <button type="button"
                                                                class="btn-custom btn-warning-custom text-uppercase">Inactive
                                                            </button>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @can('criminal-cases-edit')
                                                            <a href="{{ route('view-criminal-cases', $datum->id) }}">
                                                                <button class="btn btn-outline-info btn-sm" type="button"
                                                                    data-toggle="tooltip" data-placement="top"
                                                                    title="Details"><i class="fas fa-eye"></i></button>
                                                            </a>
                                                        @endcan
                                                        @can('criminal-cases-edit')
                                                            <a href="{{ route('view-criminal-cases', $datum->id) }}#section1">
                                                                <button class="btn btn-outline-primary btn-sm" type="button"
                                                                    data-toggle="tooltip" data-placement="top"
                                                                    title="Proceedings"><i class="fas fa-signal"></i></button>
                                                            </a>
                                                        @endcan
                                                        {{-- @can('criminal-cases-add-billing')
                                                            <a href="{{ route('add-criminal-cases-billling', $datum->id) }}">
                                                                <button type="button" class="btn btn-outline-warning btn-sm"
                                                                    data-toggle="tooltip" data-placement="top"
                                                                    title="Bill Entry"><i
                                                                        class="fas fa-money-bill"></i></button>
                                                            </a>
                                                        @endcan --}}
                                                        {{-- @can('criminal-cases-edit')
                                                            <a href="{{ route('edit-criminal-cases', $datum->id) }}">
                                                                <button type="button" class="btn btn-outline-info btn-sm"
                                                                    data-toggle="tooltip" data-placement="top"
                                                                    title="Edit"><i class="fas fa-edit"></i></button>
                                                            </a>
                                                        @endcan --}}
                                                        @can('criminal-cases-delete')
                                                            {{-- <a href="{{ route('delete-criminal-cases-latest', $datum->id) }}">
                                                                <button type="button" class="btn btn-outline-danger btn-sm"
                                                                    data-toggle="tooltip" data-placement="top"
                                                                    title="Edit"><i class="fas fa-trash"></i></button>
                                                            </a> --}}

                                                            {{-- {{ Form::open(array('method' => 'post', 'route' => array('delete-criminal-cases', $datum->id), 'class' => 'delete-form')) }}
                                                    {{ Form::submit('Delete', array('class' => 'btn btn-danger', 'role' => 'button')) }}
                                                {{ Form::close() }} --}}

                                                            <form method="POST" action="{{ route('delete-criminal-cases',$datum->id) }}" class="delete-user btn btn-outline-danger btn-xs">
                                                                @csrf
                                                                <button type="submit" class="btn btn-outline-danger btn-sm" style="line-height: 1.4"
                                                                        data-toggle="tooltip" data-placement="top"
                                                                        title="Delete"><i class="fas fa-trash"></i></button>
                                                            </form>
                                                        @endcan
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->

                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
