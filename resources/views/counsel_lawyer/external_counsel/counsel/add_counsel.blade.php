@extends('layouts.admin_layouts.admin_layout')
@section('content')



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Counsel</h1>

                    </div><!-- /.col -->


                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">
                                <a  type="button" href="{{ route('criminal-cases') }}" aria-disabled="false"
                                    role="link" tabindex="-1">Back </a>
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
                            <h3 class="card-title"> Add Counsel </h3>
                        </div>

                        <div class="card-body">
                            <div class="row original_case">
                                <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <h6 class="text-uppercase text-bold"><u> Chamber Information </u>
                                                </h6>
                                                <div class="form-group row">
                                                    <label for="chamber_name" class="col-sm-4 col-form-label">Name</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="chamber_name"
                                                               name="chamber_name"
                                                               value="{{old('chamber_name')}}">
                                                        @error('chamber_name')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="in_favour_of_id" class="col-sm-4 col-form-label"> Role </label>
                                                    <div class="col-sm-8">
                                                        <select name="in_favour_of_id" class="form-control select2">
                                                            <option value="">Select</option>
                                                            <option value="Head of Chamber">Head of Chamber</option>
                                                            <option value="Partner of Chamber">Partner of Chamber</option>
                                                            <option value="Associate">Associate</option>
                                                            <option value="Admin of Chamber">Admin of Chamber</option>
                                                            <option value="Accountant">Accountant</option>
                                                            <option value="Head Clerk">Head Clerk</option>
                                                            <option value="Clerk">Clerk</option>
                                                            <option value="Support Staff">Support Staff</option>
                                                        </select>
                                                        @error('in_favour_of_id')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                                <h6 class="text-uppercase text-bold"><u> Personal Information </u>
                                                </h6>
                                                <div class="form-group row">
                                                    <label for="chamber_name" class="col-sm-4 col-form-label">Name</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="chamber_name"
                                                               name="chamber_name"
                                                               value="{{old('chamber_name')}}">
                                                        @error('chamber_name')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="fathers_name" class="col-sm-4 col-form-label">Father Name</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="fathers_name"
                                                               name="fathers_name"
                                                               value="{{old('fathers_name')}}">
                                                        @error('fathers_name')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="chamber_name" class="col-sm-4 col-form-label">Mother Name</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="chamber_name"
                                                               name="chamber_name"
                                                               value="{{old('chamber_name')}}">
                                                        @error('chamber_name')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="chamber_name" class="col-sm-4 col-form-label">Spouse Name</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="chamber_name"
                                                               name="chamber_name"
                                                               value="{{old('chamber_name')}}">
                                                        @error('chamber_name')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="chamber_name" class="col-sm-4 col-form-label">Present Address</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="chamber_name"
                                                               name="chamber_name"
                                                               value="{{old('chamber_name')}}">
                                                        @error('chamber_name')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="chamber_name" class="col-sm-4 col-form-label">Permanent Address</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="chamber_name"
                                                               name="chamber_name"
                                                               value="{{old('chamber_name')}}">
                                                        @error('chamber_name')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="chamber_name" class="col-sm-4 col-form-label">Date of Birth</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="chamber_name"
                                                               name="chamber_name"
                                                               value="{{old('chamber_name')}}">
                                                        @error('chamber_name')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="chamber_name" class="col-sm-4 col-form-label">NID Number</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="chamber_name"
                                                               name="chamber_name"
                                                               value="{{old('chamber_name')}}">
                                                        @error('chamber_name')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="chamber_name" class="col-sm-4 col-form-label">Mobile Number</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="chamber_name"
                                                               name="chamber_name"
                                                               value="{{old('chamber_name')}}">
                                                        @error('chamber_name')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="chamber_name" class="col-sm-4 col-form-label">Email</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="chamber_name"
                                                               name="chamber_name"
                                                               value="{{old('chamber_name')}}">
                                                        @error('chamber_name')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="chamber_name" class="col-sm-4 col-form-label">Emergency Contact</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="chamber_name"
                                                               name="chamber_name"
                                                               value="{{old('chamber_name')}}">
                                                        @error('chamber_name')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="chamber_name" class="col-sm-4 col-form-label">Relation</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="chamber_name"
                                                               name="chamber_name"
                                                               value="{{old('chamber_name')}}">
                                                        @error('chamber_name')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h6 class="text-uppercase text-bold">
                                                <u>Professional Information</u>
                                            </h6>

                                            <div class="form-group row">
                                                <label for="case_no" class="col-sm-4 col-form-label">Name</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control"
                                                               id="head_of_chamber"
                                                               name="head_of_chamber"
                                                               value="{{old('head_of_chamber')}}">
                                                        @error('head_of_chamber')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control"
                                                               id="head_of_chamber"
                                                               name="head_of_chamber"
                                                               value="{{old('head_of_chamber')}}">
                                                        @error('head_of_chamber')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="case_no" class="col-sm-4 col-form-label">S.S.C</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control"
                                                               id="head_of_chamber"
                                                               name="head_of_chamber"
                                                               value="{{old('head_of_chamber')}}">
                                                        @error('head_of_chamber')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control"
                                                               id="head_of_chamber"
                                                               name="head_of_chamber"
                                                               value="{{old('head_of_chamber')}}">
                                                        @error('head_of_chamber')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="case_no" class="col-sm-4 col-form-label">H.S.C</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control"
                                                               id="head_of_chamber"
                                                               name="head_of_chamber"
                                                               value="{{old('head_of_chamber')}}">
                                                        @error('head_of_chamber')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control"
                                                               id="head_of_chamber"
                                                               name="head_of_chamber"
                                                               value="{{old('head_of_chamber')}}">
                                                        @error('head_of_chamber')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="case_no" class="col-sm-4 col-form-label">LL.B (Hons)</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control"
                                                               id="head_of_chamber"
                                                               name="head_of_chamber"
                                                               value="{{old('head_of_chamber')}}">
                                                        @error('head_of_chamber')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control"
                                                               id="head_of_chamber"
                                                               name="head_of_chamber"
                                                               value="{{old('head_of_chamber')}}">
                                                        @error('head_of_chamber')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="case_no" class="col-sm-4 col-form-label">LL.M</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control"
                                                               id="head_of_chamber"
                                                               name="head_of_chamber"
                                                               value="{{old('head_of_chamber')}}">
                                                        @error('head_of_chamber')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control"
                                                               id="head_of_chamber"
                                                               name="head_of_chamber"
                                                               value="{{old('head_of_chamber')}}">
                                                        @error('head_of_chamber')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="case_no" class="col-sm-4 col-form-label">Bar Council Enrollment</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control"
                                                               id="head_of_chamber"
                                                               name="head_of_chamber"
                                                               value="{{old('head_of_chamber')}}">
                                                        @error('head_of_chamber')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control"
                                                               id="head_of_chamber"
                                                               name="head_of_chamber"
                                                               value="{{old('head_of_chamber')}}">
                                                        @error('head_of_chamber')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="case_no" class="col-sm-4 col-form-label">Mother Bar</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control"
                                                               id="head_of_chamber"
                                                               name="head_of_chamber"
                                                               value="{{old('head_of_chamber')}}">
                                                        @error('head_of_chamber')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control"
                                                               id="head_of_chamber"
                                                               name="head_of_chamber"
                                                               value="{{old('head_of_chamber')}}">
                                                        @error('head_of_chamber')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="case_no" class="col-sm-4 col-form-label">Practicing Bar</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control"
                                                               id="head_of_chamber"
                                                               name="head_of_chamber"
                                                               value="{{old('head_of_chamber')}}">
                                                        @error('head_of_chamber')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control"
                                                               id="head_of_chamber"
                                                               name="head_of_chamber"
                                                               value="{{old('head_of_chamber')}}">
                                                        @error('head_of_chamber')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="case_no" class="col-sm-4 col-form-label"> High Court Enrollment </label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control"
                                                               id="head_of_chamber"
                                                               name="head_of_chamber"
                                                               value="{{old('head_of_chamber')}}">
                                                        @error('head_of_chamber')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control"
                                                               id="head_of_chamber"
                                                               name="head_of_chamber"
                                                               value="{{old('head_of_chamber')}}">
                                                        @error('head_of_chamber')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="case_no" class="col-sm-4 col-form-label"> Bar Council Fees (Latest) </label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control"
                                                               id="head_of_chamber"
                                                               name="head_of_chamber"
                                                               value="{{old('head_of_chamber')}}">
                                                        @error('head_of_chamber')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control"
                                                               id="head_of_chamber"
                                                               name="head_of_chamber"
                                                               value="{{old('head_of_chamber')}}">
                                                        @error('head_of_chamber')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="case_no" class="col-sm-4 col-form-label"> District Bar Mem. Fee (Update) </label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control"
                                                               id="head_of_chamber"
                                                               name="head_of_chamber"
                                                               value="{{old('head_of_chamber')}}">
                                                        @error('head_of_chamber')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control"
                                                               id="head_of_chamber"
                                                               name="head_of_chamber"
                                                               value="{{old('head_of_chamber')}}">
                                                        @error('head_of_chamber')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="case_no" class="col-sm-4 col-form-label"> SCBA Memb. Fee (Update) </label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control"
                                                               id="head_of_chamber"
                                                               name="head_of_chamber"
                                                               value="{{old('head_of_chamber')}}">
                                                        @error('head_of_chamber')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control"
                                                               id="head_of_chamber"
                                                               name="head_of_chamber"
                                                               value="{{old('head_of_chamber')}}">
                                                        @error('head_of_chamber')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="case_no" class="col-sm-4 col-form-label"> Professional Contact Number </label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control"
                                                               id="head_of_chamber"
                                                               name="head_of_chamber"
                                                               value="{{old('head_of_chamber')}}">
                                                        @error('head_of_chamber')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control"
                                                               id="head_of_chamber"
                                                               name="head_of_chamber"
                                                               value="{{old('head_of_chamber')}}">
                                                        @error('head_of_chamber')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="case_no" class="col-sm-4 col-form-label"> Professional Email </label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control"
                                                               id="head_of_chamber"
                                                               name="head_of_chamber"
                                                               value="{{old('head_of_chamber')}}">
                                                        @error('head_of_chamber')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control"
                                                               id="head_of_chamber"
                                                               name="head_of_chamber"
                                                               value="{{old('head_of_chamber')}}">
                                                        @error('head_of_chamber')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="case_no" class="col-sm-4 col-form-label"> Name of Associates </label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control"
                                                               id="head_of_chamber"
                                                               name="head_of_chamber"
                                                               value="{{old('head_of_chamber')}}">
                                                        @error('head_of_chamber')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control"
                                                               id="head_of_chamber"
                                                               name="head_of_chamber"
                                                               value="{{old('head_of_chamber')}}">
                                                        @error('head_of_chamber')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="case_no" class="col-sm-4 col-form-label"> Professoinal Experience - 1 </label>
                                                    <div class="col-sm-4">
                                                        <textarea name="branch_office_address_one" class="form-control"
                                                          rows="3"
                                                          placeholder="">{{old('branch_office_address_one')}}</textarea>
                                                        @error('head_of_chamber')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <textarea name="branch_office_address_one" class="form-control"
                                                          rows="3"
                                                          placeholder="">{{old('branch_office_address_one')}}</textarea>
                                                        @error('head_of_chamber')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="case_no" class="col-sm-4 col-form-label"> Professoinal Experience - 2 </label>
                                                    <div class="col-sm-4">
                                                        <textarea name="branch_office_address_one" class="form-control"
                                                          rows="3"
                                                          placeholder="">{{old('branch_office_address_one')}}</textarea>
                                                        @error('head_of_chamber')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <textarea name="branch_office_address_one" class="form-control"
                                                          rows="3"
                                                          placeholder="">{{old('branch_office_address_one')}}</textarea>
                                                        @error('head_of_chamber')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="case_no" class="col-sm-4 col-form-label"> Date of Joining (Chamber) </label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control"
                                                               id="head_of_chamber"
                                                               name="head_of_chamber"
                                                               value="{{old('head_of_chamber')}}">
                                                        @error('head_of_chamber')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control"
                                                               id="head_of_chamber"
                                                               name="head_of_chamber"
                                                               value="{{old('head_of_chamber')}}">
                                                        @error('head_of_chamber')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-body">
                                            <h6 class="text-uppercase text-bold"><u> Documents
                                                    Received </u></h6>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                             <div class="input-group hdtuto_received_documents control-group increment_received_documents">
                                                                
                                                                <input type="hidden" name="received_documents_sections[]"
                                                                       class="myfrm form-control mr-2" value="received_documents_sections">
                                                                <select name="received_documents_id[]"
                                                                    class="form-control mr-3">
                                                                    <option value="">Select</option>
                                                                    @foreach($documents as $item)
                                                                        <option
                                                                            value="{{ $item->id }}" {{ old('received_documents_id') == $item->id ? 'selected' : '' }}>{{ $item->documents_name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                <input type="text" name="received_documents[]"
                                                                       class="myfrm form-control mr-2">
                                                                <input type="date" name="received_documents_date[]"
                                                                       class="myfrm form-control ml-2 mr-2" value="dd/mm/yyyy">
                                                                <select name="received_documents_type_id[]"
                                                                    class="form-control mr-3 ml-2">
                                                                    <option value="">Select</option>
                                                                    @foreach($documents_type as $item)
                                                                        <option
                                                                            value="{{ $item->id }}" {{ old('received_documents_type_id') == $item->id ? 'selected' : '' }}>{{ $item->documents_type_name }}</option>
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
                                                                       class="myfrm form-control mr-2" value="received_documents_sections">
                                                                     <select name="received_documents_id[]"
                                                                        class="form-control mr-3" >
                                                                        <option value="">Select</option>
                                                                        @foreach($documents as $item)
                                                                            <option
                                                                                value="{{ $item->id }}" {{ old('received_documents_id') == $item->id ? 'selected' : '' }}>{{ $item->documents_name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <input type="text" name="received_documents[]"
                                                                           class="myfrm form-control mr-2">
                                                                    <input type="date" name="received_documents_date[]"
                                                                           class="myfrm form-control ml-2 mr-2" value="dd/mm/yyyy">
                                                                    <select name="received_documents_type_id[]"
                                                                        class="form-control mr-3 ml-2">
                                                                        <option value="">Select</option>
                                                                        @foreach($documents_type as $item)
                                                                            <option
                                                                                value="{{ $item->id }}" {{ old('received_documents_type_id') == $item->id ? 'selected' : '' }}>{{ $item->documents_type_name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <div class="input-group-btn">
                                                                        <button class="btn btn-danger btn_danger_received_documents"
                                                                                type="button"><i
                                                                                class="fldemo glyphicon glyphicon-remove"></i> -
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
    
                                                            @error('case_infos_received_documents_informant_name')<span
                                                                class="text-danger">{{$message}}</span>@enderror
                                                        </div>
                                                    </div>
                                                    
                                                    
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="float-right mt-4">
                                    <button type="submit" class="btn btn-primary text-uppercase"><i
                                            class="fas fa-save"></i> Save
                                    </button>
                                </div>
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




