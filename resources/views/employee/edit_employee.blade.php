@extends('layouts.admin_layouts.admin_layout')
@section('content')



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Employee</h1>

                    </div><!-- /.col -->


                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">
                                <a class="leading-normal inline-flex items-center font-normal spark-button-focus h-8 text-md px-4 bg-transparent border-0 border-solid text-blue-700 hover:text-blue-800 active:text-blue-700 rounded-md"
                                   type="button" href="{{ route('users.index') }}" aria-disabled="false" role="link"
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
                    @if(Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                            {{Session::get('success')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="card">
                        <div class="">
                            <div class="card-header">
                                <h3 class="card-title" id="heading">Add Employee</h3>
                            </div>

                            {!! Form::open(array('route' => 'employee.store','method'=>'POST', 'enctype' => 'multipart/form-data')) !!}

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="employee_name" class="col-sm-4 col-form-label">Employee Name</label>
                                            <input type="text" class="form-control col-sm-8" name="employee_name"
                                                   id="employee_name">
                                            @error('employee_name')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="address" class="col-sm-4 col-form-label">Address</label>
                                            <input type="text" class="form-control col-sm-8" name="address"
                                                   id="address">
                                            @error('address')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="nid_passport" class="col-sm-4 col-form-label">NID/Passport Number</label>
                                            <input type="text" class="form-control col-sm-8" name="nid_passport"
                                                   id="nid_passport">
                                            @error('nid_passport')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="phone_number" class="col-sm-4 col-form-label">Phone Number</label>
                                            <input type="text" class="form-control col-sm-8" name="phone_number"
                                                   id="phone_number">
                                            @error('phone_number')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="mobile_number" class="col-sm-4 col-form-label">Mobile Number</label>
                                            <input type="text" class="form-control col-sm-8" name="mobile_number"
                                                   id="mobile_number">
                                            @error('mobile_number')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="fax" class="col-sm-4 col-form-label">Fax</label>
                                            <input type="text" class="form-control col-sm-8" name="fax"
                                                   id="fax">
                                            @error('fax')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="email_address" class="col-sm-4 col-form-label">Email Address</label>
                                            <input type="text" class="form-control col-sm-8" name="email_address"
                                                   id="email_address">
                                            @error('email_address')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="contact_person" class="col-sm-4 col-form-label">Contact Person</label>
                                            <input type="text" class="form-control col-sm-8" name="contact_person"
                                                   id="contact_person">
                                            @error('contact_person')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="short_name" class="col-sm-4 col-form-label">Short Name</label>
                                            <input type="text" class="form-control col-sm-8" name="short_name"
                                                   id="short_name">
                                            @error('short_name')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="credit_sale_limit" class="col-sm-4 col-form-label">Credit Sale Limit</label>
                                            <input type="text" class="form-control col-sm-8" name="credit_sale_limit"
                                                   id="credit_sale_limit">
                                            @error('credit_sale_limit')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="employee_image" class="col-sm-4 col-form-label">Employee Image</label>
                                            <input type="file" class="form-control col-sm-8" name="employee_image"
                                                   id="image">
                                            @error('employee_image')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                        <div class="form-group row">
                                            <label for="preview-image" class="col-sm-4 col-form-label"></label>
                                            <img id="preview-image" style="max-height: 250px;max-width:200px;">
                                        </div>
                                    </div>
                                                                     
                                    {{-- <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="profile_photo_path" class="col-sm-4 col-form-label">Employee Image</label>
                                            <div class="col-sm-8">
                                                <input type="file" class="form-control" id="image" name="profile_photo_path">
                                                @error('profile_photo_path')<span class="text-danger">{{$message}}</span>@enderror
                                            </div>
                                        </div>
                                        
                                    </div> --}}


                                </div>
                                <div class="float-right mt-4">
                                    <button type="submit" class="btn btn-primary text-uppercase"><i
                                            class="fas fa-save"></i> Update
                                    </button>
                                </div>
                            </div>
                           {!! Form::close() !!}

                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->




@endsection
