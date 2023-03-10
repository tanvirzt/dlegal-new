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
                <form action="{{ route('update-chamber-staff', $data->id) }}" method="post" enctype="multipart/form-data">

                    <!-- Default box -->
                    <div class="card">

                        <div class="card-header">
                            <h3 class="card-title"> Edit Chamber Staff </h3>
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
                                                               value="{{ $data->chamber_name }}">
                                                        @error('chamber_name')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="counsel_role_id" class="col-sm-4 col-form-label"> Role </label>
                                                    <div class="col-sm-8">
                                                        <select name="counsel_role_id" class="form-control select2">
                                                            <option value="">Select</option>
                                                            <option value="Head of Chamber" {{ $data->counsel_role_id == "Head of Chamber" ? 'selected' : '' }}>Head of Chamber</option>
                                                            <option value="Partner of Chamber" {{ $data->counsel_role_id == "Partner of Chamber" ? 'selected' : '' }}>Partner of Chamber</option>
                                                            <option value="Associate" {{ $data->counsel_role_id == "Associate" ? 'selected' : '' }}>Associate</option>
                                                            <option value="Admin of Chamber" {{ $data->counsel_role_id == "Admin of Chamber" ? 'selected' : '' }}>Admin of Chamber</option>
                                                            <option value="Accountant" {{ $data->counsel_role_id == "Accountant" ? 'selected' : '' }}>Accountant</option>
                                                            <option value="Head Clerk" {{ $data->counsel_role_id == "Head Clerk" ? 'selected' : '' }}>Head Clerk</option>
                                                            <option value="Clerk" {{ $data->counsel_role_id == "Clerk" ? 'selected' : '' }}>Clerk</option>
                                                            <option value="Support Staff" {{ $data->counsel_role_id == "Support Staff" ? 'selected' : '' }}>Support Staff</option>
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
                                                               value="{{ $data->counsel_name }}">
                                                        @error('counsel_name')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="father_name" class="col-sm-4 col-form-label">Father Name</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="father_name"
                                                               name="father_name"
                                                               value="{{ $data->father_name }}">
                                                        @error('father_name')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="mother_name" class="col-sm-4 col-form-label">Mother Name</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="mother_name"
                                                               name="mother_name"
                                                               value="{{ $data->mother_name }}">
                                                        @error('mother_name')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="spouse_name" class="col-sm-4 col-form-label">Spouse Name</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="spouse_name"
                                                               name="spouse_name"
                                                               value="{{ $data->spouse_name }}">
                                                        @error('spouse_name')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="present_address" class="col-sm-4 col-form-label">Present Address</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="present_address"
                                                               name="present_address"
                                                               value="{{ $data->present_address }}">
                                                        @error('present_address')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="permanent_address" class="col-sm-4 col-form-label">Permanent Address</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="permanent_address"
                                                               name="permanent_address"
                                                               value="{{ $data->permanent_address }}">
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
                                                                                                                name="date_of_birth" @if($data->date_of_birth != null) value="{{ $data->date_of_birth }}" @else value="dd-mm-yyyy" @endif
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
                                                               value="{{ $data->nid_number }}">
                                                        @error('nid_number')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="mobile_number" class="col-sm-4 col-form-label">Mobile Number</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="mobile_number"
                                                               name="mobile_number"
                                                               value="{{ $data->mobile_number }}">
                                                        @error('mobile_number')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="email" class="col-sm-4 col-form-label">Email</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="email"
                                                               name="email"
                                                               value="{{ $data->email }}">
                                                        @error('email')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="emergency_contact" class="col-sm-4 col-form-label">Emergency Contact</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="emergency_contact"
                                                               name="emergency_contact"
                                                               value="{{ $data->emergency_contact }}">
                                                        @error('emergency_contact')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="relation" class="col-sm-4 col-form-label">Relation</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="relation"
                                                               name="relation"
                                                               value="{{ $data->relation }}">
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
                                                               value="{{ $data->professional_name }}">
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
                                                               value="{{ $data->ssc_year }}">
                                                        @error('ssc_year')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control"
                                                               id="ssc_institution"
                                                               name="ssc_institution" placeholder="Institution"
                                                               value="{{ $data->ssc_institution }}">
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
                                                               value="{{ $data->hsc_year }}">
                                                        @error('hsc_year')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control"
                                                               id="hsc_institution"
                                                               name="hsc_institution" placeholder="Institution"
                                                               value="{{ $data->hsc_institution }}">
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
                                                               value="{{ $data->llb_year }}">
                                                        @error('llb_year')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control"
                                                               id="llb_institution"
                                                               name="llb_institution" placeholder="Institution"
                                                               value="{{ $data->llb_institution }}">
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
                                                               value="{{ $data->professional_contact_number }}">
                                                        @error('professional_contact_number')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control"
                                                               id="professional_contact_number_write"
                                                               name="professional_contact_number_write"
                                                               value="{{ $data->professional_contact_number_write }}">
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
                                                               value="{{ $data->professional_email }}">
                                                        @error('professional_email')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control"
                                                               id="professional_email_write"
                                                               name="professional_email_write"
                                                               value="{{ $data->professional_email_write }}">
                                                        @error('professional_email_write')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="case_no" class="col-sm-4 col-form-label"> Professoinal Experience - 1 </label>
                                                    <div class="col-sm-8">
                                                        <textarea name="professional_experience_one" class="form-control"
                                                          rows="3"
                                                          placeholder="">{{ $data->professional_experience_one }}</textarea>
                                                        @error('professional_experience_one')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="case_no" class="col-sm-4 col-form-label"> Professoinal Experience - 2 </label>
                                                    <div class="col-sm-8">
                                                        <textarea name="professional_experience_two" class="form-control"
                                                          rows="3"
                                                          placeholder="">{{ $data->professional_experience_two }}</textarea>
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
                                                                                                                name="date_of_joining" @if($data->date_of_joining != null) value="{{ $data->date_of_joining }}" @else value="dd-mm-yyyy" @endif
                                                                                                                class="date_second_input"
                                                                                                                tabindex="-1"><span
                                                                class="date_second_span" tabindex="-1">&#9660;</span>
                                                        </span>
                                                        
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
                                                                <span class="d-flex">
                                                                    <input type="hidden" name="received_documents_sections[]" class="myfrm form-control mr-2" value="received_documents_sections">
                                                                    <select name="received_documents_id[]"
                                                                        class="form-control mr-3">
                                                                        <option value="">Select</option>
                                                                        @foreach($documents as $item)
                                                                            <option
                                                                                value="{{ $item->id }}" {{ !empty($received_documents_explode[0]['received_documents_id']) && $received_documents_explode[0]['received_documents_id']  == $item->id ? 'selected' : '' }}>{{ $item->documents_name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <input type="text" name="received_documents[]"
                                                                        class="myfrm form-control mr-2" value="{{ !empty($received_documents_explode[0]['received_documents']) ? $received_documents_explode[0]['received_documents'] : '' }}">
                                                                    <input type="date" name="received_documents_date[]"
                                                                        class="myfrm form-control ml-2 mr-2" value="{{ !empty($received_documents_explode[0]['received_documents_date']) ? $received_documents_explode[0]['received_documents_date'] : '' }}">
                                                                    
                                                                    <select name="received_documents_type_id[]"
                                                                        class="form-control mr-3 ml-2">
                                                                        <option value="">Select</option>
                                                                        @foreach($documents_type as $item)
                                                                            <option
                                                                                value="{{ $item->id }}" {{ !empty($received_documents_explode[0]['received_documents_type_id']) && $received_documents_explode[0]['received_documents_type_id']  == $item->id ? 'selected' : '' }}>{{ $item->documents_type_name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    
                                                                    
                                                                    <div class="input-group-btn">
                                                                        <button class="btn btn-success btn_success_received_documents_edit"
                                                                                type="button"><i
                                                                                class="fldemo glyphicon glyphicon-plus"></i>+
                                                                        </button>
                                                                    </div>
                                                                </span>
                                                                
                                                            </div>
                                                            <div class="clone_received_documents @if(count($received_documents_explode) <= 1) hide @endif">
                                                                @php
                                                                    array_shift($received_documents_explode);
                                                                @endphp
                                                                @foreach ( $received_documents_explode as $datas)
                                                                <div class="hdtuto_received_documents control-group input-group"
                                                                     style="margin-top:10px">
                                                                    <input type="hidden" name="received_documents_sections[]" class="myfrm form-control mr-2" value="received_documents_sections">

                                                                     <select name="received_documents_id[]"
                                                                        class="form-control mr-3" >
                                                                        <option value="">Select</option>
                                                                        @foreach($documents as $item)
                                                                            <option
                                                                                value="{{ $item->id }}" {{ $datas['received_documents_id'] == $item->id ? 'selected' : '' }}>{{ $item->documents_name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <input type="text" name="received_documents[]"
                                                                           class="myfrm form-control mr-2" value="{{ $datas['received_documents'] }}">
                                                                    <input type="date" name="received_documents_date[]"
                                                                           class="myfrm form-control ml-2 mr-2" value="{{ $datas['received_documents_date'] }}">
                                                                    <select name="received_documents_type_id[]"
                                                                        class="form-control mr-3 ml-2">
                                                                        <option value="">Select</option>
                                                                        @foreach($documents_type as $item)
                                                                            <option
                                                                                value="{{ $item->id }}" {{ !empty($datas['received_documents_type_id']) && $datas['received_documents_type_id']  == $item->id ? 'selected' : '' }}>{{ $item->documents_type_name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <div class="input-group-btn">
                                                                        <button class="btn btn-danger btn_danger_received_documents"
                                                                                type="button"><i
                                                                                class="fldemo glyphicon glyphicon-remove"></i> -
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                @endforeach
                                                            </div>
                                                            <div class="clone_received_documents_edit hide">
                                                                <div class="hdtuto_received_documents control-group input-group"
                                                                     style="margin-top:10px">
                                                                <input type="hidden" name="received_documents_sections[]" class="myfrm form-control mr-2" value="received_documents_sections">
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
                                                                            value="{{ $item->id }}" {{ !empty($required_wanting_documents_explode[0]['required_wanting_documents_id']) && $required_wanting_documents_explode[0]['required_wanting_documents_id']  == $item->id ? 'selected' : '' }}>{{ $item->documents_name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                <input type="text" name="required_wanting_documents[]"
                                                                       class="myfrm form-control mr-2" value="{{ !empty($required_wanting_documents_explode[0]['required_wanting_documents']) ? $required_wanting_documents_explode[0]['required_wanting_documents'] : '' }}">
                                                                <input type="date" name="required_wanting_documents_date[]"
                                                                       class="myfrm form-control ml-2" value="{{ !empty($required_wanting_documents_explode[0]['required_wanting_documents_date']) ? $required_wanting_documents_explode[0]['required_wanting_documents_date'] : '' }}">
                                                                <select name="required_wanting_documents_type_id[]"
                                                                       class="form-control mr-3 ml-2">
                                                                       <option value="">Select</option>
                                                                       @foreach($documents_type as $item)
                                                                           <option
                                                                               value="{{ $item->id }}" {{ !empty($required_wanting_documents_explode[0]['required_wanting_documents_type_id']) && $required_wanting_documents_explode[0]['required_wanting_documents_type_id'] == $item->id ? 'selected' : '' }}>{{ $item->documents_type_name }}</option>
                                                                       @endforeach
                                                                </select>
                                                                
                                                                <div class="input-group-btn">
                                                                    <button class="btn btn-success btn_success_required_wanting_documents_edit"
                                                                            type="button"><i
                                                                            class="fldemo glyphicon glyphicon-plus"></i>+
                                                                    </button>
                                                                </div>
                                                            </div>

                                                            <div class="clone_required_wanting_documents @if(count($required_wanting_documents_explode) <= 1) hide @endif">
                                                                @php
                                                                    array_shift($required_wanting_documents_explode);
                                                                @endphp
                                                                @foreach ( $required_wanting_documents_explode as $datas)
                                                                <div class="hdtuto_required_wanting_documents control-group input-group"
                                                                     style="margin-top:10px">
                                                                     <input type="hidden" name="required_wanting_documents_sections[]"
                                                                    class="myfrm form-control mr-2" value="required_wanting_documents_sections">
                                                                     <select name="required_wanting_documents_id[]"
                                                                        class="form-control mr-3" >
                                                                        <option value="">Select</option>
                                                                        @foreach($documents as $item)
                                                                            <option
                                                                                value="{{ $item->id }}" {{ $datas['required_wanting_documents_id'] == $item->id ? 'selected' : '' }}>{{ $item->documents_name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <input type="text" name="required_wanting_documents[]"
                                                                           class="myfrm form-control mr-2" value="{{ $datas['required_wanting_documents'] }}">
                                                                    <input type="date" name="required_wanting_documents_date[]"
                                                                           class="myfrm form-control ml-2" value="{{ $datas['required_wanting_documents_date'] }}">
                                                                    <select name="required_wanting_documents_type_id[]"
                                                                        class="form-control mr-3 ml-2">
                                                                        <option value="">Select</option>
                                                                        @foreach($documents_type as $item)
                                                                            <option
                                                                                value="{{ $item->id }}" {{ !empty($datas['required_wanting_documents_type_id']) && $datas['required_wanting_documents_type_id'] == $item->id ? 'selected' : '' }}>{{ $item->documents_type_name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <div class="input-group-btn">
                                                                        <button class="btn btn-danger btn_danger_required_wanting_documents"
                                                                                type="button"><i
                                                                                class="fldemo glyphicon glyphicon-remove"></i> -
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                @endforeach
                                                                

                                                            </div>
                                                            <div class="clone_required_wanting_documents_edit hide">
                                                                <div class="hdtuto_required_wanting_documents control-group input-group"
                                                                     style="margin-top:10px">
                                                                     <input type="hidden" name="required_wanting_documents_sections[]"
                                                                    class="myfrm form-control mr-2" value="required_wanting_documents_sections">
                                                                     <select name="required_wanting_documents_id[]"
                                                                        class="form-control mr-3" >
                                                                        <option value="">Select</option>
                                                                        @foreach($documents as $item)
                                                                            <option
                                                                                value="{{ $item->id }}" {{ old('required_wanting_documents_id') == $item->id ? 'selected' : '' }}>{{ $item->documents_name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <input type="text" name="required_wanting_documents[]"
                                                                           class="myfrm form-control mr-2">
                                                                    <input type="date" name="required_wanting_documents_date[]"
                                                                           class="myfrm form-control ml-2">
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
    
                                                            @error('case_infos_required_wanting_documents_informant_name')<span
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
                                            class="fas fa-save"></i> Update
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




