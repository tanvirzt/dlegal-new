@extends('layouts.admin_layouts.admin_layout')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Domain Setup</h1>
                    </div>


                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">
                                <a class="leading-normal inline-flex items-center font-normal spark-button-focus h-8 text-md px-4 bg-transparent border-0 border-solid text-blue-700 hover:text-blue-800 active:text-blue-700 rounded-md"
                                   type="button" href="{{ route('domain-setup.index') }}" aria-disabled="false" role="link"
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

                    <div class="card">
                        <div class="">
                            <div class="card-header">
                                <h3 class="card-title" id="heading">Edit Domain Setup</h3>
                            </div>

                            {!! Form::model($domainSetup, ['method' => 'PUT', 'enctype' => 'multipart/form-data', 'route' => ['domain-setup.update', $domainSetup->id]]) !!}

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="domain_name" class="col-sm-4 col-form-label">Domain Name</label>
                                            <div class="col-sm-8">
                                                {!! Form::text('domain_name', null, array('class' => 'form-control')) !!}
                                                @error('domain_name')<span
                                                    class="text-danger">{{$message}}</span>@enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 company_id">
                                        <div class="form-group row">
                                            <label for="company_id" class="col-sm-4 col-form-label">Company</label>
                                            <div class="col-sm-8">
                                                {!! Form::select('company_id', [null => 'Select'] + $company, null, ['class' => 'form-control select2']) !!}
                                                @error('company_id')<span
                                                    class="text-danger">{{$message}}</span>@enderror
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="company_logo" class="col-sm-4 col-form-label">Logo</label>
                                            <div class="col-sm-8">
                                                <input type="file" class="form-control" id="image" name="company_logo">
                                                @error('company_logo')<span class="text-danger">{{$message}}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="preview-image" class="col-sm-4 col-form-label"></label>
                                            <img @if ($domainSetup->company_logo) src="{{ asset('files/company_logo/'.$domainSetup->company_logo) }}" @endif id="preview-image" style="max-height: 250px;max-width:200px;">
                                        </div>
                                    </div>




                                </div>
                                <div class="float-right mt-4">
                                    <button type="submit" class="btn btn-primary text-uppercase"><i
                                            class="fas fa-save"></i> Update
                                    </button>
                                </div>
                            </div>
                            {!! Form::close() !!}








































{{--                            {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <strong>Name:</strong>--}}
{{--                                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <strong>Email:</strong>--}}
{{--                                        {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <strong>Password:</strong>--}}
{{--                                        {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <strong>Confirm Password:</strong>--}}
{{--                                        {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <strong>Role:</strong>--}}
{{--                                        {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">--}}
{{--                                    <button type="submit" class="btn btn-primary">Submit</button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            {!! Form::close() !!}--}}


                        </div>
                    </div>
                </div>
                </div>
        </section>
        <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->




@endsection

