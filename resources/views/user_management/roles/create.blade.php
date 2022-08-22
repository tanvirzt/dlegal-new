@extends('layouts.admin_layouts.admin_layout')
@section('content')


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
                                   type="button" href="{{ route('roles.index') }}" aria-disabled="false" role="link"
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

                            {{--                            {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}--}}
                            {{--                            <div class="row">--}}
                            {{--                                <div class="col-xs-12 col-sm-12 col-md-12">--}}
                            {{--                                    <div class="form-group">--}}
                            {{--                                        <strong>Name:</strong>--}}
                            {{--                                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                                <div class="col-xs-12 col-sm-12 col-md-12">--}}
                            {{--                                    <div class="form-group">--}}
                            {{--                                        <strong>Permission:</strong>--}}
                            {{--                                        <br/>--}}
                            {{--                                        @foreach($permission as $value)--}}
                            {{--                                            <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}--}}
                            {{--                                                {{ $value->name }}</label>--}}
                            {{--                                            <br/>--}}
                            {{--                                        @endforeach--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">--}}
                            {{--                                    <button type="submit" class="btn btn-primary">Submit</button>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                            {{--                            {!! Form::close() !!}--}}



                            {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label for="case_no" class="col-sm-3 col-form-label">Role Name</label>
                                            <div class="col-sm-9">
                                                {!! Form::text('name', null, array('class' => 'form-control')) !!}
                                                @error('case_no')<span
                                                    class="text-danger">{{$message}}</span>@enderror
                                            </div>
                                        </div>
                                    </div>

                                    <label for="case_no" class="col-sm-4 col-form-label mb-3">Permission</label>

                                    <div class="col-md-12">
                                        <div class="form-group row user_permission">
                                            <div class="form-group col-md-3">
                                                <div class="icheck-success d-inline">
                                                    <input type="checkbox" id="check_all_permission">
                                                    <label for="check_all_permission" style="color: #118ce3;">All
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        @php $i = 1; @endphp
                                        @foreach($permission_groups as $group)
                                            @php
                                                $permissions = \App\Models\User::getpermissionByGroupName($group->name);
                                                  $j = 1;
                                            @endphp
                                            <div class="form-group row user_permission">
                                                <div class="form-group col-md-3">
                                                    <div class="icheck-success d-inline">
                                                        <input type="checkbox" id="{{ $i }}Management" onclick="checkPermissionByGroup('role-{{ $i }}-management-checkbox', this)" value="{{ $group->name }}">
                                                        <label for="{{ $i }}Management" style="color: #32b14f;"> {{ ucwords(str_replace('-', ' ', $group->name)) }}
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-9 row role-{{ $i }}-management-checkbox">

                                                    @foreach($permissions as $permission)
                                                        <div class="form-group col-md-3">
                                                            <div class="icheck-success d-inline">
                                                                <input type="checkbox" id="checkPermission{{ $permission->id }}" onclick="checkSinglePermission('role-{{ $i }}-management-checkbox', '{{ $i }}Management', {{ count($permissions) }})"
                                                                       value="{{ $permission->id }}" name="permission[]">
                                                                <label for="checkPermission{{ $permission->id }}">{{ ucwords(str_replace('-', ' ', $permission->name)) }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                        @php $j++; @endphp
                                                    @endforeach
                                                </div>
                                            </div>
                                            @php $i++; @endphp
                                        @endforeach
                                            <button type="submit" class="btn btn-primary float-right text-uppercase"><i class="fas fa-save"></i> Save</button>
                                    </div>


                                    {{--                                <div class="row">--}}
                                    {{--                                    <div class="form-group col-md-4">--}}
                                    {{--                                        <div class="icheck-success d-inline">--}}
                                    {{--                                            <input type="checkbox" id="all">--}}
                                    {{--                                            <label for="all">All--}}
                                    {{--                                            </label>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}
                                    {{--                                    <div class="form-group col-md-8">--}}
                                    {{--                                        <div class="icheck-success d-inline">--}}
                                    {{--                                            <input type="checkbox" id="other">--}}
                                    {{--                                            <label for="other">Success--}}
                                    {{--                                            </label>--}}
                                    {{--                                        </div>--}}
                                    {{--                                        <div class="icheck-success d-inline">--}}
                                    {{--                                            <input type="checkbox" id="other">--}}
                                    {{--                                            <label for="other">Success--}}
                                    {{--                                            </label>--}}
                                    {{--                                        </div>--}}
                                    {{--                                        <div class="icheck-success d-inline">--}}
                                    {{--                                            <input type="checkbox" id="other">--}}
                                    {{--                                            <label for="other">Success--}}
                                    {{--                                            </label>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}
                                    {{--                                </div>--}}









                                    {{--                                <div class="col-xs-12 col-sm-12 col-md-12">--}}
                                    {{--                                    <div class="form-group">--}}
                                    {{--                                        <strong>Permission:</strong>--}}
                                    {{--                                        <br/>--}}
                                    {{--                                        @foreach($permission as $value)--}}
                                    {{--                                            <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}--}}
                                    {{--                                                {{ $value->name }}</label>--}}
                                    {{--                                            <br/>--}}
                                    {{--                                        @endforeach--}}
                                    {{--                                    </div>--}}
                                    {{--                                </div>--}}
{{--                                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">--}}
{{--                                        <button type="submit" class="btn btn-primary">Submit</button>--}}
{{--                                    </div>--}}




                                </div>
                                {!! Form::close() !!}


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
{{--                <h2>Create New Role</h2>--}}
{{--            </div>--}}
{{--            <div class="pull-right">--}}
{{--                <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>--}}
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


{{--    {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}--}}
{{--    <div class="row">--}}
{{--        <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--            <div class="form-group">--}}
{{--                <strong>Name:</strong>--}}
{{--                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--            <div class="form-group">--}}
{{--                <strong>Permission:</strong>--}}
{{--                <br/>--}}
{{--                @foreach($permission as $value)--}}
{{--                    <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}--}}
{{--                        {{ $value->name }}</label>--}}
{{--                    <br/>--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-xs-12 col-sm-12 col-md-12 text-center">--}}
{{--            <button type="submit" class="btn btn-primary">Submit</button>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    {!! Form::close() !!}--}}


{{--    <p class="text-center text-primary"><small>Tutorial by ItSolutionStuff.com</small></p>--}}
{{--@endsection--}}


<script>
    function implementAllChecked(){
        const countPermissions = {{ count($all_permissions)}};
        const countPermissionGroups = {{ count($permission_groups)}};

        console.log(countPermissions + countPermissionGroups);
        console.log($('input[type="checkbox"]:checked').length);

        if ($('input[type="checkbox"]:checked').length >= (countPermissions + countPermissionGroups)){
            $("#check_all_permission").prop('checked', true);
        }else{
            $("#check_all_permission").prop('checked', false);
        }

    }
</script>
