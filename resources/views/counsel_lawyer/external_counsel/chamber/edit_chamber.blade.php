@extends('layouts.admin_layouts.admin_layout')
@section('content')



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Chamber</h1>

                    </div><!-- /.col -->


                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">
                                <a  type="button" href="{{ route('chamber') }}" aria-disabled="false"
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
                <form action="{{ route('update-chamber', $data->id) }}" method="post" enctype="multipart/form-data">

                    <!-- Default box -->
                    <div class="card">

                        <div class="card-header">
                            <h3 class="card-title"> Edit Chamber </h3>
                        </div>

                        <div class="card-body">
                            <div class="row original_case">
                                <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <h6 class="text-uppercase text-bold"><u> Chamber Information </u>
                                                </h6>
                                                <div class="form-group row">
                                                    <label for="chamber_name" class="col-sm-4 col-form-label">Name of Chamber</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="chamber_name"
                                                               name="chamber_name"
                                                               value="{{ $data->chamber_name }}">
                                                        @error('chamber_name')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="chamber_logo" class="col-sm-4 col-form-label">Chamber Logo</label>
                                                    <div class="col-sm-8">
                                                        <input type="file" class="form-control" id="image"
                                                               name="chamber_logo"
                                                               >
                                                <img @if ($data->chamber_logo) src="{{ asset('files/chamber_logo/'.$data->chamber_logo) }}" @endif id="preview-image" style="max-height: 250px;max-width:200px;">
                                                 

                                                        @error('chamber_logo')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="main_office_address" class="col-sm-4 col-form-label">Main Office Address</label>
                                                    <div class="col-sm-8">
                                                        <textarea name="main_office_address" class="form-control"
                                                              rows="3"
                                                              placeholder="">{{ $data->main_office_address }}</textarea>
                                                        @error('main_office_address')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="chamber_telephone" class="col-sm-4 col-form-label">Chamber Telephone</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="chamber_telephone"
                                                               name="chamber_telephone"
                                                               value="{{ $data->chamber_telephone }}">
                                                        @error('chamber_telephone')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="chamber_mobile_one" class="col-sm-4 col-form-label">Chamber Mobile-1</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="chamber_mobile_one"
                                                               name="chamber_mobile_one"
                                                               value="{{ $data->chamber_mobile_one }}">
                                                        @error('chamber_mobile_one')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="chamber_mobile_two" class="col-sm-4 col-form-label">Chamber Mobile-2</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="chamber_mobile_two"
                                                               name="chamber_mobile_two"
                                                               value="{{ $data->chamber_mobile_two }}">
                                                        @error('chamber_mobile_two')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="chamber_email_one" class="col-sm-4 col-form-label">Chamber Email-1</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="chamber_email_one"
                                                               name="chamber_email_one"
                                                               value="{{ $data->chamber_email_one }}">
                                                        @error('chamber_email_one')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="chamber_email_two" class="col-sm-4 col-form-label">Chamber Email-2</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="chamber_email_two"
                                                               name="chamber_email_two"
                                                               value="{{ $data->chamber_email_two }}">
                                                        @error('chamber_email_two')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="branch_office_address_one"
                                                           class="col-sm-4 col-form-label"> Branch Office-1 Address </label>
                                                    <div class="col-sm-8">
                                                    <textarea name="branch_office_address_one" class="form-control"
                                                              rows="3"
                                                              placeholder="">{{ $data->branch_office_address_one }}</textarea>
                                                        @error('branch_office_address_one')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="branch_office_address_two"
                                                           class="col-sm-4 col-form-label"> Branch Office-2 Address </label>
                                                    <div class="col-sm-8">
                                                    <textarea name="branch_office_address_two" class="form-control"
                                                              rows="3"
                                                              placeholder="">{{ $data->branch_office_address_two }}</textarea>
                                                        @error('branch_office_address_two')<span
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
                                                <div class="row">
                                                    <div class="col-md-7"><u> Chamber Person </u></div>
                                                    <div class="col-md-5 text-center">Signature</div> 
                                                </div>
                                            </h6>
                                            <div class="form-group row">
                                                <label for="case_no" class="col-sm-4 col-form-label">Head of Chamber</label>
                                                    <div class="col-sm-8 input-group">
                                                        <input type="text" class="form-control col-sm-6"
                                                               id="head_of_chamber"
                                                               name="head_of_chamber"
                                                               value="{{ $data->head_of_chamber }}">
                                                        @error('head_of_chamber')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                        <input type="text" class="form-control col-sm-5"
                                                               id="head_of_chamber_signature"
                                                               name="head_of_chamber_signature"
                                                               value="{{ $data->head_of_chamber_signature }}">
                                                        @error('head_of_chamber_signature')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="case_no" class="col-sm-4 col-form-label">Partner of Chamber</label>
                                                <div class="col-sm-8">
                                                    <div class="input-group hdtuto_partner_of_chamber control-group increment_partner_of_chamber">
                                                        <input type="hidden" name="chamber_partner_sections[]"
                                                                       class="myfrm form-control mr-2" value="chamber_partner_sections">
                                                        <input type="text" name="partner_of_chamber[]"
                                                            class="myfrm form-control col-md-7" value="{{ !empty($chamber_partner_explode[0]['partner_of_chamber']) ? $chamber_partner_explode[0]['partner_of_chamber'] : '' }}">
                                                        <input type="text" name="partner_of_chamber_signature[]"
                                                            class="myfrm form-control col-md-5" value="{{ !empty($chamber_partner_explode[0]['partner_of_chamber_signature']) ? $chamber_partner_explode[0]['partner_of_chamber_signature'] : '' }}">
                                                        <div class="input-group-btn">
                                                            <button class="btn btn-success btn_success_partner_of_chamber_edit"
                                                                    type="button"><i
                                                                    class="fldemo glyphicon glyphicon-plus"></i>+
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="clone_partner_of_chamber @if(count($chamber_partner_explode) <= 1) hide @endif">
                                                        @php
                                                            array_shift($chamber_partner_explode);
                                                        @endphp
                                                        @foreach ( $chamber_partner_explode as $datas)
                                                        <div class="hdtuto_partner_of_chamber control-group lst input-group"
                                                            style="margin-top:10px">
                                                            <input type="hidden" name="chamber_partner_sections[]"
                                                                       class="myfrm form-control mr-2" value="chamber_partner_sections">
                                                            <input type="text" name="partner_of_chamber[]"
                                                                class="myfrm form-control col-12" value="{{ $datas['partner_of_chamber'] }}">
                                                            <input type="text" name="partner_of_chamber_signature[]"
                                                                class="myfrm form-control col-md-5" value="{{ $datas['partner_of_chamber_signature'] }}">
                                                            <div class="input-group-btn">
                                                                <button class="btn btn-danger btn_danger_partner_of_chamber"
                                                                        type="button"><i
                                                                        class="fldemo glyphicon glyphicon-remove"></i> -
                                                                </button>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                    <div class="clone_partner_of_chamber_edit hide">
                                                       
                                                        <div class="hdtuto_partner_of_chamber control-group lst input-group"
                                                            style="margin-top:10px">
                                                            <input type="hidden" name="chamber_partner_sections[]"
                                                                       class="myfrm form-control mr-2" value="chamber_partner_sections">
                                                            <input type="text" name="partner_of_chamber[]"
                                                                class="myfrm form-control col-12">
                                                            <input type="text" name="partner_of_chamber_signature[]"
                                                                class="myfrm form-control col-md-5">
                                                            <div class="input-group-btn">
                                                                <button class="btn btn-danger btn_danger_partner_of_chamber"
                                                                        type="button"><i
                                                                        class="fldemo glyphicon glyphicon-remove"></i> -
                                                                </button>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="case_no" class="col-sm-4 col-form-label">Associate</label>
                                                <div class="col-sm-8">
                                                    <div class="input-group hdtuto_associate control-group increment_associate">
                                                        <input type="hidden" name="associate_sections[]"
                                                                       class="myfrm form-control mr-2" value="associate_sections">
                                                        <input type="text" name="associate[]"
                                                            class="myfrm form-control col-md-7" value="{{ !empty($chamber_associate_explode[0]['associate']) ? $chamber_associate_explode[0]['associate'] : '' }}">
                                                        <input type="text" name="associate_signature[]"
                                                            class="myfrm form-control col-md-5" value="{{ !empty($chamber_associate_explode[0]['associate_signature']) ? $chamber_associate_explode[0]['associate_signature'] : '' }}">
                                                        <div class="input-group-btn">
                                                            <button class="btn btn-success btn_success_associate_edit"
                                                                    type="button"><i
                                                                    class="fldemo glyphicon glyphicon-plus"></i>+
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="clone_associate @if(count($chamber_associate_explode) <= 1) hide @endif">
                                                        @php
                                                            array_shift($chamber_associate_explode);
                                                        @endphp
                                                        @foreach ( $chamber_associate_explode as $datas)
                                                        <div class="hdtuto_associate control-group lst input-group"
                                                            style="margin-top:10px">
                                                            <input type="hidden" name="associate_sections[]"
                                                                       class="myfrm form-control mr-2" value="associate_sections">
                                                            <input type="text" name="associate[]"
                                                                class="myfrm form-control col-md-7" value="{{ $datas['associate'] }}">
                                                            <input type="text" name="associate_signature[]"
                                                                class="myfrm form-control col-md-5" value="{{ $datas['associate_signature'] }}">
                                                            <div class="input-group-btn">
                                                                <button class="btn btn-danger btn_danger_associate"
                                                                        type="button"><i
                                                                        class="fldemo glyphicon glyphicon-remove"></i> -
                                                                </button>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                    <div class="clone_associate_edit hide">
                                                        <div class="hdtuto_associate control-group lst input-group"
                                                            style="margin-top:10px">
                                                            <input type="hidden" name="associate_sections[]"
                                                                       class="myfrm form-control mr-2" value="associate_sections">
                                                            <input type="text" name="associate[]"
                                                                class="myfrm form-control col-md-7">
                                                            <input type="text" name="associate_signature[]"
                                                                class="myfrm form-control col-md-5">
                                                            <div class="input-group-btn">
                                                                <button class="btn btn-danger btn_danger_associate"
                                                                        type="button"><i
                                                                        class="fldemo glyphicon glyphicon-remove"></i> -
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="case_no" class="col-sm-4 col-form-label">Admin of Chamber</label>
                                                    <div class="col-sm-8 input-group">
                                                        
                                                        <input type="text" class="form-control col-sm-6"
                                                               id="admin_of_chamber"
                                                               name="admin_of_chamber"
                                                               value="{{ $data->admin_of_chamber }}">
                                                        @error('admin_of_chamber')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    
                                                        <input type="text" class="form-control col-sm-5"
                                                               id="admin_of_chamber_signature"
                                                               name="admin_of_chamber_signature"
                                                               value="{{ $data->admin_of_chamber_signature }}">
                                                        @error('admin_of_chamber_signature')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="case_no" class="col-sm-4 col-form-label">Accountant</label>
                                                    <div class="col-sm-8 input-group">
                                                        <input type="text" class="form-control col-sm-6"
                                                               id="accountant"
                                                               name="accountant"
                                                               value="{{ $data->accountant }}">
                                                        @error('accountant')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    
                                                        <input type="text" class="form-control col-sm-5"
                                                               id="accountant_signature"
                                                               name="accountant_signature"
                                                               value="{{ $data->accountant_signature }}">
                                                        @error('accountant_signature')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="case_no" class="col-sm-4 col-form-label">Head Clerk</label>
                                                    <div class="col-sm-8 input-group">
                                                        <input type="text" class="form-control col-sm-6"
                                                               id="head_clerk"
                                                               name="head_clerk"
                                                               value="{{ $data->head_clerk }}">
                                                        @error('head_clerk')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    
                                                        <input type="text" class="form-control col-sm-5"
                                                               id="head_clerk_signature"
                                                               name="head_clerk_signature"
                                                               value="{{ $data->head_clerk_signature }}">
                                                        @error('head_clerk_signature')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="case_no" class="col-sm-4 col-form-label">Clerk</label>
                                                <div class="col-sm-8">
                                                    <div class="input-group hdtuto_clerk control-group increment_clerk">
                                                        <input type="hidden" name="clerk_sections[]"
                                                                       class="myfrm form-control mr-2" value="clerk_sections">
                                                        <input type="text" name="clerk[]"
                                                            class="myfrm form-control col-md-7" value="{{ !empty($chamber_clerk_explode[0]['clerk']) ? $chamber_clerk_explode[0]['clerk'] : '' }}">
                                                        <input type="text" name="clerk_signature[]"
                                                            class="myfrm form-control col-md-5" value="{{ !empty($chamber_clerk_explode[0]['clerk_signature']) ? $chamber_clerk_explode[0]['clerk_signature'] : '' }}">
                                                        <div class="input-group-btn">
                                                            <button class="btn btn-success btn_success_clerk_edit"
                                                                    type="button"><i
                                                                    class="fldemo glyphicon glyphicon-plus"></i>+
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="clone_clerk @if(count($chamber_clerk_explode) <= 1) hide @endif">
                                                        @php
                                                            array_shift($chamber_clerk_explode);
                                                        @endphp
                                                        @foreach ( $chamber_clerk_explode as $datas)
                                                        <div class="hdtuto_clerk control-group lst input-group"
                                                            style="margin-top:10px">
                                                            <input type="hidden" name="clerk_sections[]"
                                                                       class="myfrm form-control mr-2" value="clerk_sections">
                                                            <input type="text" name="clerk[]"
                                                                class="myfrm form-control col-md-7" value="{{ $datas['clerk'] }}">
                                                            <input type="text" name="clerk_signature[]"
                                                                class="myfrm form-control col-md-5" value="{{ $datas['clerk_signature'] }}">
                                                            <div class="input-group-btn">
                                                                <button class="btn btn-danger btn_danger_clerk"
                                                                        type="button"><i
                                                                        class="fldemo glyphicon glyphicon-remove"></i> -
                                                                </button>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                    <div class="clone_clerk_edit hide">
                                                        <div class="hdtuto_clerk control-group lst input-group"
                                                            style="margin-top:10px">
                                                            <input type="hidden" name="clerk_sections[]"
                                                                       class="myfrm form-control mr-2" value="clerk_sections">
                                                            <input type="text" name="clerk[]"
                                                                class="myfrm form-control col-md-7">
                                                            <input type="text" name="clerk_signature[]"
                                                                class="myfrm form-control col-md-5">
                                                            <div class="input-group-btn">
                                                                <button class="btn btn-danger btn_danger_clerk"
                                                                        type="button"><i
                                                                        class="fldemo glyphicon glyphicon-remove"></i> -
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="case_no" class="col-sm-4 col-form-label">Support Staff</label>
                                                <div class="col-sm-8">
                                                    <div class="input-group hdtuto_support_staff control-group increment_support_staff">
                                                        <input type="hidden" name="support_staff_sections[]"
                                                                       class="myfrm form-control mr-2" value="support_staff_sections">
                                                        <input type="text" name="support_staff[]"
                                                            class="myfrm form-control col-md-7" value="{{ !empty($chamber_support_staff_explode[0]['support_staff']) ? $chamber_support_staff_explode[0]['support_staff'] : '' }}">
                                                        <input type="text" name="support_staff_signature[]"
                                                            class="myfrm form-control col-md-5" value="{{ !empty($chamber_support_staff_explode[0]['support_staff_signature']) ? $chamber_support_staff_explode[0]['support_staff_signature'] : '' }}">
                                                        <div class="input-group-btn">
                                                            <button class="btn btn-success btn_success_support_staff_edit"
                                                                    type="button"><i
                                                                    class="fldemo glyphicon glyphicon-plus"></i>+
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="clone_support_staff @if(count($chamber_support_staff_explode) <= 1) hide @endif">
                                                        @php
                                                            array_shift($chamber_support_staff_explode);
                                                        @endphp
                                                        @foreach ( $chamber_support_staff_explode as $datas)
                                                        <div class="hdtuto_support_staff control-group lst input-group"
                                                            style="margin-top:10px">
                                                            <input type="hidden" name="support_staff_sections[]"
                                                                       class="myfrm form-control mr-2" value="support_staff_sections">
                                                            <input type="text" name="support_staff[]"
                                                                class="myfrm form-control col-md-7" value="{{ $datas['support_staff'] }}">
                                                            <input type="text" name="support_staff_signature[]"
                                                                class="myfrm form-control col-md-5" value="{{ $datas['support_staff_signature'] }}">
                                                            <div class="input-group-btn">
                                                                <button class="btn btn-danger btn_danger_support_staff"
                                                                        type="button"><i
                                                                        class="fldemo glyphicon glyphicon-remove"></i> -
                                                                </button>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                    <div class="clone_support_staff_edit hide">
                                                        <div class="hdtuto_support_staff control-group lst input-group"
                                                            style="margin-top:10px">
                                                            <input type="hidden" name="support_staff_sections[]"
                                                                       class="myfrm form-control mr-2" value="support_staff_sections">
                                                            <input type="text" name="support_staff[]"
                                                                class="myfrm form-control col-md-7">
                                                            <input type="text" name="support_staff_signature[]"
                                                                class="myfrm form-control col-md-5">
                                                            <div class="input-group-btn">
                                                                <button class="btn btn-danger btn_danger_support_staff"
                                                                        type="button"><i
                                                                        class="fldemo glyphicon glyphicon-remove"></i> -
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-body">
                                            <h6 class="text-uppercase text-bold"><u> Chamber Letterhead </u>
                                            </h6>
                                            <div class="form-group row">
                                                <label for="letterhead_write_up"
                                                       class="col-sm-4 col-form-label"> Letterhead Write-up </label>
                                                <div class="col-sm-8">
                                                <textarea name="letterhead_write_up" class="form-control"
                                                          rows="3"
                                                          placeholder="">{{ $data->letterhead_write_up }}</textarea>
                                                    @error('letterhead_write_up')<span
                                                        class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="letterhead_address"
                                                       class="col-sm-4 col-form-label"> Letterhead Address </label>
                                                <div class="col-sm-8">
                                                <textarea name="letterhead_address" class="form-control"
                                                          rows="3"
                                                          placeholder="">{{ $data->letterhead_address }}</textarea>
                                                    @error('letterhead_address')<span
                                                        class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>

                                        </div>
                                    </div>






                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    
                                    <div class="form-group">
                                        <h6 class="text-uppercase text-bold">
                                            <div class="row">
                                                <div class="col-md-3"> Chamber Accounts</div>
                                                <div class="col-md-3 text-center">Account Name</div> 
                                                <div class="col-md-3 text-center">Account Number</div> 
                                                <div class="col-md-3 text-center">Bank Name</div> 
                                            </div>
                                        </h6>
                                        
                                        <div class="input-group hdtuto_received_documents control-group increment_received_documents">
                                    
                                                    <input type="hidden" name="chamber_account_sections[]"
                                                        class="myfrm form-control mr-2" value="chamber_account_sections">
                                                    <input type="text" name="chamber_accounts[]"
                                                            class="myfrm form-control col-md-3 mr-2" value="{{ !empty($chamber_accounts_explode[0]['chamber_accounts']) ? $chamber_accounts_explode[0]['chamber_accounts'] : '' }}">
                                                    <input type="text" name="account_name[]"
                                                        class="myfrm form-control mr-2 col-md-3" value="{{ !empty($chamber_accounts_explode[0]['account_name']) ? $chamber_accounts_explode[0]['account_name'] : '' }}">
                                                    <input type="text" name="account_number[]"
                                                            class="myfrm form-control col-md-3 mr-2" value="{{ !empty($chamber_accounts_explode[0]['account_number']) ? $chamber_accounts_explode[0]['account_number'] : '' }}">
                                                    <input type="text" name="bank_name[]"
                                                        class="myfrm form-control mr-2 col-md-3" value="{{ !empty($chamber_accounts_explode[0]['bank_name']) ? $chamber_accounts_explode[0]['bank_name'] : '' }}">

                                                <div class="input-group-btn">
                                                    <button class="btn btn-success btn_success_received_documents_edit"
                                                            type="button"><i
                                                            class="fldemo glyphicon glyphicon-plus"></i>+
                                                    </button>
                                                </div>
                                            
                                        </div>
                                        <div class="clone_received_documents @if(count($chamber_accounts_explode) <= 1) hide @endif">
                                            @php
                                                array_shift($chamber_accounts_explode);
                                            @endphp
                                            @foreach ( $chamber_accounts_explode as $datas)
                                            <div class="hdtuto_received_documents control-group input-group"
                                                 style="margin-top:10px">

                                                       <input type="hidden" name="chamber_account_sections[]"
                                                            class="myfrm form-control mr-2" value="chamber_account_sections">
                                                        <input type="text" name="chamber_accounts[]"
                                                                class="myfrm form-control col-md-3 mr-2" value="{{ !empty($datas['chamber_accounts']) ? $datas['chamber_accounts'] : '' }}">
                                                        <input type="text" name="account_name[]"
                                                            class="myfrm form-control mr-2 col-md-3" value="{{ !empty($datas['account_name']) ? $datas['account_name'] : '' }}">
                                                        <input type="text" name="account_number[]"
                                                                class="myfrm form-control col-md-3 mr-2" value="{{ !empty($datas['account_number']) ? $datas['account_number'] : '' }}">
                                                        <input type="text" name="bank_name[]"
                                                            class="myfrm form-control mr-2 col-md-3" value="{{ !empty($datas['bank_name']) ? $datas['bank_name'] : '' }}">

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
                                                    
                                                <input type="hidden" name="chamber_account_sections[]"
                                                                        class="myfrm form-control mr-2" value="chamber_account_sections">
                                                <input type="text" name="chamber_accounts[]"
                                                    class="myfrm form-control col-md-3 mr-2">
                                                <input type="text" name="account_name[]"
                                                    class="myfrm form-control mr-2 col-md-3" value="{{ old('uploaded_date') }}">
                                                <input type="text" name="account_number[]"
                                                        class="myfrm form-control col-md-3 mr-2">
                                                <input type="text" name="bank_name[]"
                                                    class="myfrm form-control mr-2 col-md-3" value="{{ old('uploaded_date') }}">

                                                <div class="input-group-btn">
                                                    <button class="btn btn-danger btn_danger_received_documents"
                                                            type="button"><i
                                                            class="fldemo glyphicon glyphicon-remove"></i> -
                                                    </button>
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




