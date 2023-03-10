@extends('layouts.admin_layouts.admin_layout')
@section('content')



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Chamber Staff</h1>

                    </div><!-- /.col -->


                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">
                                <a  type="button" href="{{ route('chamber-staff') }}" aria-disabled="false"
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
                <form action="{{ route('store-chamber-staff') }}" method="post" enctype="multipart/form-data">

                    <!-- Default box -->
                    <div class="card">

                        <div class="card-header">
                            <h3 class="card-title"> Add Chamber Staff </h3>
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
                                                    <label for="counsel_role_id" class="col-sm-4 col-form-label"> Role </label>
                                                    <div class="col-sm-8">
                                                        <select name="counsel_role_id" class="form-control select2">
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
                                                        @error('counsel_role_id')<span
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
                                                    <label for="counsel_name" class="col-sm-4 col-form-label">Name</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="counsel_name"
                                                               name="counsel_name"
                                                               value="{{old('counsel_name')}}">
                                                        @error('counsel_name')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="father_name" class="col-sm-4 col-form-label">Father Name</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="father_name"
                                                               name="father_name"
                                                               value="{{old('father_name')}}">
                                                        @error('father_name')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="mother_name" class="col-sm-4 col-form-label">Mother Name</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="mother_name"
                                                               name="mother_name"
                                                               value="{{old('mother_name')}}">
                                                        @error('mother_name')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="spouse_name" class="col-sm-4 col-form-label">Spouse Name</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="spouse_name"
                                                               name="spouse_name"
                                                               value="{{old('spouse_name')}}">
                                                        @error('spouse_name')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="present_address" class="col-sm-4 col-form-label">Present Address</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="present_address"
                                                               name="present_address"
                                                               value="{{old('present_address')}}">
                                                        @error('present_address')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="permanent_address" class="col-sm-4 col-form-label">Permanent Address</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="permanent_address"
                                                               name="permanent_address"
                                                               value="{{old('permanent_address')}}">
                                                        @error('permanent_address')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="date_of_birth" class="col-sm-4 col-form-label">Date of Birth</label>
                                                    <div class="col-sm-8">
                                                        <span class="date_span">
                                                            <input type="date" class="xDateContainer date_first_input"
                                                                   onchange="setCorrect(this,'date_of_birth');"><input type="text" id="date_of_birth"
                                                                                                                name="date_of_birth" value="dd-mm-yyyy"
                                                                                                                class="date_second_input"
                                                                                                                tabindex="-1"><span
                                                                class="date_second_span" tabindex="-1">&#9660;</span>
                                                        </span>
                                                        
                                                        @error('date_of_birth')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="nid_number" class="col-sm-4 col-form-label">NID Number</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="nid_number"
                                                               name="nid_number"
                                                               value="{{old('nid_number')}}">
                                                        @error('nid_number')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="mobile_number" class="col-sm-4 col-form-label">Mobile Number</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="mobile_number"
                                                               name="mobile_number"
                                                               value="{{old('mobile_number')}}">
                                                        @error('mobile_number')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="email" class="col-sm-4 col-form-label">Email</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="email"
                                                               name="email"
                                                               value="{{old('email')}}">
                                                        @error('email')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="emergency_contact" class="col-sm-4 col-form-label">Emergency Contact</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="emergency_contact"
                                                               name="emergency_contact"
                                                               value="{{old('emergency_contact')}}">
                                                        @error('emergency_contact')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="relation" class="col-sm-4 col-form-label">Relation</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="relation"
                                                               name="relation"
                                                               value="{{old('relation')}}">
                                                        @error('relation')<span
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
                                                <label for="professional_name" class="col-sm-4 col-form-label">Name</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control"
                                                               id="professional_name"
                                                               name="professional_name"
                                                               value="{{old('professional_name')}}">
                                                        @error('professional_name')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="case_no" class="col-sm-4 col-form-label">S.S.C</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control"
                                                               id="ssc_year"
                                                               name="ssc_year" placeholder="Year"
                                                               value="{{old('ssc_year')}}">
                                                        @error('ssc_year')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control"
                                                               id="ssc_institution"
                                                               name="ssc_institution" placeholder="Institution"
                                                               value="{{old('ssc_institution')}}">
                                                        @error('ssc_institution')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="case_no" class="col-sm-4 col-form-label">H.S.C</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control"
                                                               id="hsc_year"
                                                               name="hsc_year" placeholder="Year"
                                                               value="{{old('hsc_year')}}">
                                                        @error('hsc_year')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control"
                                                               id="hsc_institution"
                                                               name="hsc_institution" placeholder="Institution"
                                                               value="{{old('hsc_institution')}}">
                                                        @error('hsc_institution')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="case_no" class="col-sm-4 col-form-label">LL.B (Hons)</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control"
                                                               id="llb_year"
                                                               name="llb_year" placeholder="Year"
                                                               value="{{old('llb_year')}}">
                                                        @error('llb_year')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control"
                                                               id="llb_institution"
                                                               name="llb_institution" placeholder="Institution"
                                                               value="{{old('llb_institution')}}">
                                                        @error('llb_institution')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="case_no" class="col-sm-4 col-form-label"> Professional Contact Number </label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control"
                                                               id="professional_contact_number"
                                                               name="professional_contact_number"
                                                               value="{{old('professional_contact_number')}}">
                                                        @error('professional_contact_number')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control"
                                                               id="professional_contact_number_write"
                                                               name="professional_contact_number_write"
                                                               value="{{old('professional_contact_number_write')}}">
                                                        @error('professional_contact_number_write')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="case_no" class="col-sm-4 col-form-label"> Professional Email </label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control"
                                                               id="professional_email"
                                                               name="professional_email"
                                                               value="{{old('professional_email')}}">
                                                        @error('professional_email')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control"
                                                               id="professional_email_write"
                                                               name="professional_email_write"
                                                               value="{{old('professional_email_write')}}">
                                                        @error('professional_email_write')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="case_no" class="col-sm-4 col-form-label"> Professoinal Experience - 1 </label>
                                                    <div class="col-sm-8">
                                                        <textarea name="professional_experience_one" class="form-control"
                                                          rows="3"
                                                          placeholder="">{{old('professional_experience_one')}}</textarea>
                                                        @error('professional_experience_one')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="case_no" class="col-sm-4 col-form-label"> Professoinal Experience - 2 </label>
                                                    <div class="col-sm-8">
                                                        <textarea name="professional_experience_two" class="form-control"
                                                          rows="3"
                                                          placeholder="">{{old('professional_experience_two')}}</textarea>
                                                        @error('professional_experience_two')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="case_no" class="col-sm-4 col-form-label"> Date of Joining (Chamber) </label>
                                                    <div class="col-sm-8">
                                                        <span class="date_span">
                                                            <input type="date" class="xDateContainer date_first_input"
                                                                   onchange="setCorrect(this,'date_of_joining');"><input type="text" id="date_of_joining"
                                                                                                                name="date_of_joining" value="dd-mm-yyyy"
                                                                                                                class="date_second_input"
                                                                                                                tabindex="-1"><span
                                                                class="date_second_span" tabindex="-1">&#9660;</span>
                                                        </span>
                                                        {{-- <input type="text" class="form-control"
                                                               id="date_of_joining"
                                                               name="date_of_joining"
                                                               value="{{old('date_of_joining')}}"> --}}
                                                        @error('date_of_joining')<span
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
                                                    <h6 class="text-uppercase text-bold">
                                                        <u> Documents
                                                            Required </u>
                                                    </h6>
                                                    <div class="form-group row">
                                                        
                                                        <div class="col-sm-12">
                                                            <div class="input-group hdtuto_required_wanting_documents control-group increment_required_wanting_documents">
                                                                <input type="hidden" name="required_wanting_documents_sections[]"
                                                                       class="myfrm form-control mr-2" value="required_wanting_documents_sections">
                                                                <select name="required_wanting_documents_id[]"
                                                                    class="form-control mr-3">
                                                                    <option value="">Select</option>
                                                                    @foreach($documents as $item)
                                                                        <option
                                                                            value="{{ $item->id }}" {{ old('required_wanting_documents_id') == $item->id ? 'selected' : '' }}>{{ $item->documents_name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                <input type="text" name="required_wanting_documents[]"
                                                                       class="myfrm form-control mr-2">
                                                                <input type="date" name="required_wanting_documents_date[]"
                                                                       class="myfrm form-control ml-2 mr-2" value="dd/mm/yyyy">
                                                                <select name="required_wanting_documents_type_id[]"
                                                                       class="form-control mr-3 ml-2">
                                                                       <option value="">Select</option>
                                                                       @foreach($documents_type as $item)
                                                                           <option
                                                                               value="{{ $item->id }}" {{ old('required_wanting_documents_type_id') == $item->id ? 'selected' : '' }}>{{ $item->documents_type_name }}</option>
                                                                       @endforeach
                                                                </select>
                                                                <div class="input-group-btn">
                                                                    <button class="btn btn-success btn_success_required_wanting_documents"
                                                                            type="button"><i
                                                                            class="fldemo glyphicon glyphicon-plus"></i>+
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div class="clone_required_wanting_documents hide">
                                                                <div class="hdtuto_required_wanting_documents control-group lst input-group"
                                                                     style="margin-top:10px">
                                                                     <input type="hidden" name="required_wanting_documents_sections[]"
                                                                       class="myfrm form-control mr-2" value="required_wanting_documents_sections">
                                                                     <select name="required_wanting_documents_id[]"
                                                                        class="form-control mr-3">
                                                                        <option value="">Select</option>
                                                                        @foreach($documents as $item)
                                                                            <option
                                                                                value="{{ $item->id }}" {{ old('required_wanting_documents_id') == $item->id ? 'selected' : '' }}>{{ $item->documents_name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <input type="text" name="required_wanting_documents[]"
                                                                           class="myfrm form-control mr-2">
                                                                    
                                                                    <input type="date" name="required_wanting_documents_date[]"
                                                                       class="myfrm form-control ml-2 mr-2" value="dd/mm/yyyy">
                                                                <select name="required_wanting_documents_type_id[]"
                                                                       class="form-control mr-3 ml-2">
                                                                       <option value="">Select</option>
                                                                       @foreach($documents_type as $item)
                                                                           <option
                                                                               value="{{ $item->id }}" {{ old('required_wanting_documents_type_id') == $item->id ? 'selected' : '' }}>{{ $item->documents_type_name }}</option>
                                                                       @endforeach
                                                                </select>
                                                                    <div class="input-group-btn">
                                                                        <button class="btn btn-danger btn_danger_required_wanting_documents"
                                                                                type="button"><i
                                                                                class="fldemo glyphicon glyphicon-remove"></i> -
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
    
                                                            @error('required_wanting_documents')<span
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




