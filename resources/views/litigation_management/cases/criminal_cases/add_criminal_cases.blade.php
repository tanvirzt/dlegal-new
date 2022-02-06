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
                                <a class="leading-normal inline-flex items-center font-normal spark-button-focus h-8 text-md px-4 bg-transparent border-0 border-solid text-blue-700 hover:text-blue-800 active:text-blue-700 rounded-md" type="button" href="{{ route('criminal-cases') }}" aria-disabled="false" role="link" tabindex="-1">Cancel</a>
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
                                <h3 class="card-title" id="heading">Add Criminal Cases</h3>
                            </div>

                            <form action="{{ route('save-criminal-cases') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">

                                    <div class="col-md-12">

                                        <div class="form-group">
                                            <label for="case_no"> Case No. </label>
                                            <input type="text" class="form-control" name="case_no"
                                                   id="case_no">
                                            @error('case_no')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="case_category_nature_id"> Case Category
                                            </label>
                                            <select name="case_category_nature_id" class="form-control
                                            select2" id="case_category_nature_id"
                                                    required="">
                                                <option>Select</option>
                                                @foreach($case_category as $item)
                                                    <option value="{{ $item->id }}">{{ $item->case_category_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('case_category_nature_id')<span class="text-danger">{{$message}}</span>@enderror
                                        <div class="form-group">
                                            <label for="subsequent_case_no"> Subsequent Case No. </label>
                                            <input type="text" class="form-control" name="subsequent_case_no"
                                                   id="subsequent_case_no" value="{{old('subsequent_case_no')}}">
                                            @error('subsequent_case_no')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="region_id"> Region
                                            </label>
                                            <select name="region_id" class="form-control
                                            select2" id="region_id"
                                                    required="">
                                                <option>Select</option>
                                                @foreach($case_status as $item)
                                                    <option value="{{ $item->id }}">{{ $item->case_status_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="area_id"> Area
                                            </label>
                                            <select name="area_id" class="form-control select2" id="area_id"
                                                    required="">
                                                <option>Select</option>
                                                @foreach($last_court_order as $item)
                                                    <option value="{{ $item->id }}">{{ $item->court_last_order_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="branch_id"> Branch
                                            </label>
                                            <select name="branch_id" class="form-control
                                            select2" id="branch_id"
                                                    required="">
                                                <option>Select</option>
                                                @foreach($case_status as $item)
                                                    <option value="{{ $item->id }}">{{ $item->case_status_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('branch_id')<span class="text-danger">{{$message}}</span>@enderror
                                        <div class="form-group">
                                            <label for="date_of_cash_received"> Member No. </label>
                                            <input type="date" class="form-control" name="date_of_cash_received"
                                                   id="date_of_cash_received">
                                            @error('date_of_cash_received')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="program_id"> Program 
                                            </label>
                                            <select name="program_id" class="form-control
                                            select2" id="program_id"
                                                    required="">
                                                <option>Select</option>
                                                @foreach($case_status as $item)
                                                    <option value="{{ $item->id }}">{{ $item->case_status_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('branch_id')<span class="text-danger">{{$message}}</span>@enderror     
                                        <div class="form-group">
                                            <label for="police_station"> Police Station </label>
                                            <input type="text" class="form-control" name="police_station"
                                                   id="police_station">
                                            @error('police_station')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="name_of_the_court_id"> Name of the Court
                                                
                                            </label>
                                            <select name="name_of_the_court_id" class="form-control
                                            select2" id="name_of_the_court_id"
                                                    required="">
                                                <option>Select</option>
                                                @foreach($court as $item)
                                                    <option value="{{ $item->id }}" {{(old('name_of_the_court_id') == $item->id?'selected':'')}}>{{ $item->court_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('name_of_the_court_id')<span class="text-danger">{{$message}}</span>@enderror
                                        
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
                                        <div class="form-group {{ ($errors->has('name'))?'has-error':'' }}">
                                            <label for="roll"> District </label>
                                            <select name="district_id" class="form-control" id="city">
                                                <option value=""> Select </option>

                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="alligation_id"> Alligation
                                            </label>
                                            <select name="alligation_id" class="form-control
                                            select2" id="alligation_id"
                                                    required="">
                                                <option>Select</option>
                                                @foreach($case_status as $item)
                                                    <option value="{{ $item->id }}">{{ $item->case_status_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="complainant_name"> Name of the Complainant </label>
                                            <input type="text" class="form-control" name="complainant_name"
                                                   id="complainant_name" value="{{old('complainant_name')}}">
                                            @error('complainant_name')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="complainant_contact_number"> Complainant Contact Number </label>
                                            <input type="text" class="form-control" name="complainant_contact_number"
                                                   id="complainant_contact_number" value="{{old('complainant_contact_number')}}">
                                            @error('complainant_contact_number')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="complainant_designation_id"> Designation of the Complainant
                                            </label>
                                            <select name="complainant_designation_id" class="form-control
                                            select2" id="complainant_designation_id"
                                                    required="">
                                                <option>Select</option>
                                                @foreach($case_status as $item)
                                                    <option value="{{ $item->id }}">{{ $item->case_status_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('complainant_designation_id')<span class="text-danger">{{$message}}</span>@enderror
                                           
                                        
                                        <div class="form-group">
                                            <label for="amount"> Amount </label>
                                            <input type="text" class="form-control" name="amount"
                                                   id="amount">
                                            @error('amount')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="case_status_id"> Status of the Case
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
                                        <div class="form-group">
                                            <label for="external_council_name_id"> External Council Name
                                            </label>
                                            <select name="external_council_name_id" class="form-control
                                            select2" id="external_council_name_id"
                                                    required="">
                                                <option>Select</option>
                                                @foreach($external_council as $item)
                                                    <option value="{{ $item->id }}">{{ $item->first_name }} {{ $item->middle_name }} {{ $item->last_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('division_id')<span class="text-danger">{{$message}}</span>@enderror
                                        
                                        
                                        <div class="form-group">
                                            <label for="plaintiff_name"> Plaintiff Name </label>
                                            <input type="text" class="form-control" name="plaintiff_name"
                                                   id="plaintiff_name" value="{{old('plaintiff_name')}}">
                                            @error('plaintiff_name')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="plaintiff_designaiton_id"> Plaintiff Designation
                                            </label>
                                            <select name="plaintiff_designaiton_id" class="form-control
                                            select2" id="plaintiff_designaiton_id"
                                                    required="">
                                                <option>Select</option>
                                                @foreach($designation as $item)
                                                    <option value="{{ $item->id }}" {{(old('plaintiff_designaiton_id') == $item->id?'selected':'')}}>{{ $item->designation_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('division_id')<span class="text-danger">{{$message}}</span>@enderror
                                        <div class="form-group">
                                            <label for="plaintiff_contact_number"> Plaintiff Contact No </label>
                                            <input type="text" class="form-control" name="plaintiff_contact_number"
                                                   id="plaintiff_contact_number" value="{{old('plaintiff_contact_number')}}">
                                            @error('plaintiff_contact_number')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <label for="last_order_court"> Last Order of the Court
                                            </label>
                                            <select name="last_order_court" class="form-control
                                            select2" id="last_order_court"
                                                    required="">
                                                <option>Select</option>
                                                @foreach($last_court_order as $item)
                                                    <option value="{{ $item->id }}">{{ $item->court_last_order_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="date_of_filing"> Date of Filing </label>
                                            <input type="date" class="form-control" name="date_of_filing"
                                                   id="date_of_filing">
                                            @error('date_of_filing')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="date_of_cash_received"> Date of Case Received </label>
                                            <input type="date" class="form-control" name="date_of_cash_received"
                                                   id="date_of_cash_received">
                                            @error('date_of_cash_received')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="relevant_law_sections_id"> Laws Sections
                                                
                                            </label>
                                            <select name="relevant_law_sections_id" class="form-control
                                            select2" id="relevant_law_sections_id"
                                                    required="">
                                                <option>Select</option>
                                                @foreach($law_section as $item)
                                                    <option value="{{ $item->id }}">{{ $item->law_section_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('relevant_law_sections_id')<span class="text-danger">{{$message}}</span>@enderror
                                        
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
                                            <label for="accused_name"> Name of the Accused </label>
                                            <input type="text" class="form-control" name="accused_name"
                                                   id="accused_name">
                                            @error('accused_name')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="accused_contact_number"> Accused Contact Number </label>
                                            <input type="text" class="form-control" name="accused_contact_number"
                                                   id="accused_contact_number">
                                            @error('accused_contact_number')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="accused_contact_number"> Address of the Accused </label>
                                            <input type="text" class="form-control" name="accused_contact_number"
                                                   id="accused_contact_number">
                                            @error('accused_contact_number')<span class="text-danger">{{$message}}</span>@enderror
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




