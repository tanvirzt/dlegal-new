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
                <form action="{{ route('save-chamber') }}" method="post" enctype="multipart/form-data">

                    <!-- Default box -->
                    <div class="card">

                        <div class="card-header">
                            <h3 class="card-title"> Add Chamber </h3>
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
                                                               value="{{old('chamber_name')}}">
                                                        @error('chamber_name')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="chamber_logo" class="col-sm-4 col-form-label">Chamber Logo</label>
                                                    <div class="col-sm-8">
                                                        <input type="file" class="form-control" id="chamber_logo"
                                                               name="chamber_logo"
                                                               value="{{old('chamber_logo')}}">
                                                        @error('chamber_logo')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="main_office_address" class="col-sm-4 col-form-label">Main Office Address</label>
                                                    <div class="col-sm-8">
                                                        <textarea name="main_office_address" class="form-control"
                                                              rows="3"
                                                              placeholder="">{{old('main_office_address')}}</textarea>
                                                        @error('main_office_address')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="chamber_telephone" class="col-sm-4 col-form-label">Chamber Telephone</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="chamber_telephone"
                                                               name="chamber_telephone"
                                                               value="{{old('chamber_telephone')}}">
                                                        @error('chamber_telephone')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="chamber_mobile_one" class="col-sm-4 col-form-label">Chamber Mobile-1</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="chamber_mobile_one"
                                                               name="chamber_mobile_one"
                                                               value="{{old('chamber_mobile_one')}}">
                                                        @error('chamber_mobile_one')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="chamber_mobile_two" class="col-sm-4 col-form-label">Chamber Mobile-2</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="chamber_mobile_two"
                                                               name="chamber_mobile_two"
                                                               value="{{old('chamber_mobile_two')}}">
                                                        @error('chamber_mobile_two')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="chamber_email_one" class="col-sm-4 col-form-label">Chamber Email-1</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="chamber_email_one"
                                                               name="chamber_email_one"
                                                               value="{{old('chamber_email_one')}}">
                                                        @error('chamber_email_one')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="chamber_email_two" class="col-sm-4 col-form-label">Chamber Email-2</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="chamber_email_two"
                                                               name="chamber_email_two"
                                                               value="{{old('chamber_email_two')}}">
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
                                                              placeholder="">{{old('branch_office_address_one')}}</textarea>
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
                                                              placeholder="">{{old('branch_office_address_two')}}</textarea>
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
                                                               value="{{old('head_of_chamber')}}">
                                                        @error('head_of_chamber')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                        <input type="text" class="form-control col-sm-5"
                                                               id="head_of_chamber_signature"
                                                               name="head_of_chamber_signature"
                                                               value="{{old('head_of_chamber_signature')}}">
                                                        @error('head_of_chamber_signature')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="case_no" class="col-sm-4 col-form-label">Partner of Chamber</label>
                                                <div class="col-sm-8">
                                                    <div class="input-group hdtuto_partner_of_chamber control-group increment_partner_of_chamber">
                                                        <input type="text" name="partner_of_chamber[]"
                                                            class="myfrm form-control col-md-7">
                                                        <input type="text" name="partner_of_chamber_signature[]"
                                                            class="myfrm form-control col-md-5">
                                                        <div class="input-group-btn">
                                                            <button class="btn btn-success btn_success_partner_of_chamber"
                                                                    type="button"><i
                                                                    class="fldemo glyphicon glyphicon-plus"></i>+
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="clone_partner_of_chamber hide">
                                                        <div class="hdtuto_partner_of_chamber control-group lst input-group"
                                                            style="margin-top:10px">
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
                                                        <input type="text" name="associate[]"
                                                            class="myfrm form-control col-md-7">
                                                        <input type="text" name="associate_signature[]"
                                                            class="myfrm form-control col-md-5">
                                                        <div class="input-group-btn">
                                                            <button class="btn btn-success btn_success_associate"
                                                                    type="button"><i
                                                                    class="fldemo glyphicon glyphicon-plus"></i>+
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="clone_associate hide">
                                                        <div class="hdtuto_associate control-group lst input-group"
                                                            style="margin-top:10px">
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
                                                               value="{{old('admin_of_chamber')}}">
                                                        @error('admin_of_chamber')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    
                                                        <input type="text" class="form-control col-sm-5"
                                                               id="admin_of_chamber_signature"
                                                               name="admin_of_chamber_signature"
                                                               value="{{old('admin_of_chamber_signature')}}">
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
                                                               value="{{old('accountant')}}">
                                                        @error('accountant')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    
                                                        <input type="text" class="form-control col-sm-5"
                                                               id="accountant_signature"
                                                               name="accountant_signature"
                                                               value="{{old('accountant_signature')}}">
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
                                                               value="{{old('head_clerk')}}">
                                                        @error('head_clerk')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    
                                                        <input type="text" class="form-control col-sm-5"
                                                               id="head_clerk_signature"
                                                               name="head_clerk_signature"
                                                               value="{{old('head_clerk_signature')}}">
                                                        @error('head_clerk_signature')<span
                                                            class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="case_no" class="col-sm-4 col-form-label">Clerk</label>
                                                <div class="col-sm-8">
                                                    <div class="input-group hdtuto_clerk control-group increment_clerk">
                                                        <input type="text" name="clerk[]"
                                                            class="myfrm form-control col-md-7">
                                                        <input type="text" name="clerk_signature[]"
                                                            class="myfrm form-control col-md-5">
                                                        <div class="input-group-btn">
                                                            <button class="btn btn-success btn_success_clerk"
                                                                    type="button"><i
                                                                    class="fldemo glyphicon glyphicon-plus"></i>+
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="clone_clerk hide">
                                                        <div class="hdtuto_clerk control-group lst input-group"
                                                            style="margin-top:10px">
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
                                                        <input type="text" name="support_staff[]"
                                                            class="myfrm form-control col-md-7">
                                                        <input type="text" name="support_staff_signature[]"
                                                            class="myfrm form-control col-md-5">
                                                        <div class="input-group-btn">
                                                            <button class="btn btn-success btn_success_support_staff"
                                                                    type="button"><i
                                                                    class="fldemo glyphicon glyphicon-plus"></i>+
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="clone_support_staff hide">
                                                        <div class="hdtuto_support_staff control-group lst input-group"
                                                            style="margin-top:10px">
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
                                                          placeholder="">{{old('letterhead_write_up')}}</textarea>
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
                                                          placeholder="">{{old('letterhead_address')}}</textarea>
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
                                        <div class="input-group hdtuto_files control-group increment_files">
                                            <input type="text" name="chamber_accounts[]"
                                                   class="myfrm form-control col-md-3 mr-2">
                                            <input type="text" name="account_name[]"
                                                class="myfrm form-control mr-2 col-md-3" value="{{ old('uploaded_date') }}">
                                            <input type="text" name="account_number[]"
                                                    class="myfrm form-control col-md-3 mr-2">
                                            <input type="text" name="bank_name[]"
                                                class="myfrm form-control mr-2 col-md-3" value="{{ old('uploaded_date') }}">
                                         
                                            <div class="input-group-btn">
                                                <button class="btn btn-success btn_success_files"
                                                        type="button"><i
                                                        class="fldemo glyphicon glyphicon-plus"></i>+
                                                </button>
                                            </div>
                                        </div>
                                        <div class="clone_files hide">
                                            <div class="hdtuto_files control-group lst input-group"
                                                 style="margin-top:10px">
                                                 <input type="text" name="chamber_accounts[]"
                                                        class="myfrm form-control col-md-3 mr-2">
                                                <input type="text" name="account_name[]"
                                                    class="myfrm form-control mr-2 col-md-3" value="{{ old('uploaded_date') }}">
                                                <input type="text" name="account_number[]"
                                                        class="myfrm form-control col-md-3 mr-2">
                                                <input type="text" name="bank_name[]"
                                                    class="myfrm form-control mr-2 col-md-3" value="{{ old('uploaded_date') }}">
                                            <div class="input-group-btn">
                                                <div class="input-group-btn">
                                                    <button class="btn btn-danger btn_danger_files"
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




