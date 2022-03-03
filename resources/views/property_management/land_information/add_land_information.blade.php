@extends('layouts.admin_layouts.admin_layout')
@section('content')



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Land Information</h1>

                    </div><!-- /.col -->



                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">
                                <a class="leading-normal inline-flex items-center font-normal spark-button-focus h-8 text-md px-4 bg-transparent border-0 border-solid text-blue-700 hover:text-blue-800 active:text-blue-700 rounded-md" type="button" href="{{ route('land-information') }}" aria-disabled="false" role="link" tabindex="-1">Back</a>
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
                                <h3 class="card-title" id="heading">Add Land Information</h3>
                            </div>

                            <form action="{{ route('save-civil-cases') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="case_no" class="col-sm-4 col-form-label">Property Type</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="case_no" name="case_no" value="{{old('case_no')}}">
                                                    @error('case_no')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="date_of_filing" class="col-sm-4 col-form-label"> District </label>
                                                <div class="col-sm-8">
                                                    <input type="date" class="form-control" id="date_of_filing" name="date_of_filing" value="{{old('date_of_filing')}}">
                                                    @error('date_of_filing')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <label for="case_year" class="col-sm-4 col-form-label">Thana</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="case_year" name="case_year" value="{{old('case_year')}}">
                                                    @error('case_year')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="district_id" class="col-sm-4 col-form-label">CS Khatian</label>
                                                <div class="col-sm-8">
                                                    <select name="district_id" class="form-control select2" id="district_id">
                                                        <option value=""> Select </option>

                                                    </select>       
                                                    @error('district_id')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="district_id" class="col-sm-4 col-form-label"> CS Dag</label>
                                                <div class="col-sm-8">
                                                    <select name="district_id" class="form-control select2" id="district_id">
                                                        <option value=""> Select </option>

                                                    </select>       
                                                    @error('district_id')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="ref_no" class="col-sm-4 col-form-label">SA Khatian </label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="ref_no" name="ref_no" value="{{old('ref_no')}}">
                                                    @error('ref_no')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="ref_no" class="col-sm-4 col-form-label"> SA Dag  </label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="ref_no" name="ref_no" value="{{old('ref_no')}}">
                                                    @error('ref_no')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="amount" class="col-sm-4 col-form-label">RS Khatian</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="amount" name="amount" value="{{old('amount')}}">
                                                    @error('amount')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="amount" class="col-sm-4 col-form-label"> RS Dag </label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="amount" name="amount" value="{{old('amount')}}">
                                                    @error('amount')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="location" class="col-sm-4 col-form-label"> BS Khatian </label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="location" name="location" value="{{old('location')}}">
                                                    @error('location')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="location" class="col-sm-4 col-form-label"> BS Dag  </label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="location" name="location" value="{{old('location')}}">
                                                    @error('location')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="external_council_associates_id" class="col-sm-4 col-form-label">Khatian & Dag City Jorip</label>
                                                <div class="col-sm-8">
                                                        <select name="external_council_associates_id" class="form-control select2" id="external_council_associates_id">
                                                            <option value="">Select</option>

                                                        </select>
                                                        @error('external_council_associates_id')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="plaintiff_name" class="col-sm-4 col-form-label">Land Area (in Decimal)</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="plaintiff_name" name="plaintiff_name" value="{{old('plaintiff_name')}}">
                                                    @error('plaintiff_name')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="contact_number" class="col-sm-4 col-form-label">Seller Name</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="contact_number" name="contact_number" value="{{old('contact_number')}}">
                                                    @error('contact_number')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="next_date" class="col-sm-4 col-form-label"> Buyer Name </label>
                                                <div class="col-sm-8">
                                                    <input type="date" class="form-control" id="next_date" name="next_date" value="{{old('next_date')}}">
                                                    @error('next_date')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            
                                            <div class="form-group row">
                                                <label for="plaintiff_contact_number" class="col-sm-4 col-form-label">Deed No.</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="plaintiff_contact_number" name="plaintiff_contact_number" value="{{old('plaintiff_contact_number')}}">
                                                    @error('plaintiff_contact_number')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="subsequent_plaintiff_name" class="col-sm-4 col-form-label">Date of Deed</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="subsequent_plaintiff_name" name="subsequent_plaintiff_name" value="{{old('subsequent_plaintiff_name')}}">
                                                    @error('subsequent_plaintiff_name')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="name_of_suit" class="col-sm-4 col-form-label"> Deed Value </label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="name_of_suit" name="name_of_suit" value="{{old('name_of_suit')}}">
                                                    @error('name_of_suit')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="defendent_name" class="col-sm-4 col-form-label"> Possession </label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="defendent_name" name="defendent_name" value="{{old('defendent_name')}}">
                                                    @error('defendent_name')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="defendent_address" class="col-sm-4 col-form-label"> Boundary Wall </label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="defendent_address" name="defendent_address" value="{{old('defendent_address')}}">
                                                    @error('defendent_address')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <label for="date_of_incident" class="col-sm-4 col-form-label"> Any Dispute </label>
                                                <div class="col-sm-8">
                                                    <input type="date" class="form-control" id="date_of_incident" name="date_of_incident" value="{{old('date_of_incident')}}">
                                                    @error('date_of_incident')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <label for="date_of_incident_to" class="col-sm-4 col-form-label"> Any Suit/Case </label>
                                                <div class="col-sm-8">
                                                    <input type="date" class="form-control" id="date_of_incident_to" name="date_of_incident_to" value="{{old('date_of_incident_to')}}">
                                                    @error('date_of_incident_to')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="case_no" class="col-sm-4 col-form-label">Name of Owner of the Property</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="case_no" name="case_no" value="{{old('case_no')}}">
                                                    @error('case_no')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="case_no" class="col-sm-4 col-form-label">Mouza Name</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="case_no" name="case_no" value="{{old('case_no')}}">
                                                    @error('case_no')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="case_no" class="col-sm-4 col-form-label">Mutation Khatian No.</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="case_no" name="case_no" value="{{old('case_no')}}">
                                                    @error('case_no')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="case_no" class="col-sm-4 col-form-label">Mutation Case No.</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="case_no" name="case_no" value="{{old('case_no')}}">
                                                    @error('case_no')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="case_no" class="col-sm-4 col-form-label">Mutation Khatian Owner(Previous Owner)</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="case_no" name="case_no" value="{{old('case_no')}}">
                                                    @error('case_no')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="case_no" class="col-sm-4 col-form-label">DCR Number</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="case_no" name="case_no" value="{{old('case_no')}}">
                                                    @error('case_no')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="case_no" class="col-sm-4 col-form-label">Name of Register Office</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="case_no" name="case_no" value="{{old('case_no')}}">
                                                    @error('case_no')<span class="text-danger">{{$message}}</span>@enderror
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




