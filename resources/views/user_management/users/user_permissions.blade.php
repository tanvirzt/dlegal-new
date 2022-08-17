@extends('layouts.admin_layouts.admin_layout')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Role</h1>

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
                                <h3 class="card-title" id="heading">Add Role</h3>
                            </div>

                            <form action="{{ route('users.save_permissions',$user->id) }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="case_no" class="col-sm-4 col-form-label">Name</label>
                                                <div class="col-sm-8">
                                                    {!! Form::text('name', $user->name, array('class' => 'form-control', 'readonly'=>'readonly')) !!}
                                                    @error('case_no')<span
                                                        class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="case_no" class="col-sm-4 col-form-label">Email</label>
                                                <div class="col-sm-8">
                                                    {!! Form::text('email', $user->email, array('class' => 'form-control', 'readonly'=>'readonly')) !!}
                                                    @error('case_no')<span
                                                        class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="col-md-12 col-form-label">Permission</label>
                                                @foreach($permission as $value)
                                                    <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                                        {{ $value->name }}</label>
                                                    <br/>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>






{{--                                    <div class="form-group">--}}
{{--                                        <label class="form-label">Name</label>--}}
{{--                                        {!! Form::text('name', $user->name, array('placeholder' => 'Name','class' => 'form-control mb-4', 'readonly'=>'readonly')) !!}--}}
{{--                                    </div>--}}


                                    <button type="submit" class="btn btn-primary float-end mb-4 text-uppercase"> <i class="fa fa-save" data-bs-toggle="tooltip" title="fa fa-plus"></i> Save</button>
                                </div>
                            </form>


                        </div>
                    </div>

                </div>
        </section>

    </div>

@endsection































{{--@extends('layouts.app')--}}
{{--@section('content')--}}
{{--    <div class="row">--}}
{{--        <div class="col-lg-12 margin-tb">--}}
{{--            <div class="pull-left">--}}
{{--                <h2>Create New User</h2>--}}
{{--            </div>--}}
{{--            <div class="pull-right">--}}
{{--                <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}


{{--    @if (count($errors) > 0)--}}
{{--        <div class="alert alert-danger">--}}
{{--            <strong>Whoops!</strong> There were some problems with your input.<br><br>--}}
{{--            <ul>--}}
{{--                @foreach ($errors->all() as $error)--}}
{{--                    <li>{{ $error }}</li>--}}
{{--                @endforeach--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    @endif--}}



{{--    <form action="{{ route('users.save_permissions',$user->id) }}" method="POST">--}}
{{--        @csrf--}}
{{--        <div class="card-body">--}}
{{--            <div class="form-group">--}}
{{--                <label class="form-label">Name</label>--}}
{{--                {!! Form::text('name', $user->name, array('placeholder' => 'Name','class' => 'form-control mb-4', 'readonly'=>'readonly')) !!}--}}

{{--            </div>--}}
{{--            <div class="form-group">--}}
{{--                <label class="form-label">Permission</label>--}}
{{--                @foreach($permission as $value)--}}
{{--                    <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}--}}
{{--                        {{ $value->name }}</label>--}}
{{--                    <br/>--}}
{{--                @endforeach--}}
{{--            </div>--}}

{{--            <button type="submit" class="btn btn-primary float-end mb-4 text-uppercase"> <i class="fa fa-save" data-bs-toggle="tooltip" title="fa fa-plus"></i> Save</button>--}}
{{--        </div>--}}
{{--    </form>--}}
{{--    <p class="text-center text-primary"><small>Tutorial by ItSolutionStuff.com</small></p>--}}
{{--@endsection--}}
