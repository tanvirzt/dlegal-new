@extends('layouts.admin_layouts.admin_layout')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> Role </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>

                            <li class="breadcrumb-item active"> Role </li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        @if(Session::has('success'))
                            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                                {{Session::get('success')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
{{--                            @if ($message = Session::get('success'))--}}
{{--                                <div class="alert alert-success">--}}
{{--                                    <p>{{ $message }}</p>--}}
{{--                                </div>--}}
{{--                            @endif--}}

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> List </h3>
                                <div class="float-right">
{{--                                    <a href="{{ route('roles.add-role') }}"><button class="btn btn-sm--}}
{{--                                        btn-success add_btn"><i class="fas fa-plus"></i> Add Role Design </button></a>--}}
                                    @can('role-create')
                                        <a href="{{ route('roles.create') }}"><button class="btn btn-sm
                                        btn-success add_btn"><i class="fas fa-plus"></i> Add Role </button></a>
                                    @endcan
                                </div>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="data_table" class="table dataTable no-footer dtr-inline">
                                    <thead>
                                    <tr>

                                        <th class="text-center text-nowrap">No</th>
                                        <th class="text-center text-nowrap">Name</th>
                                        <th class="text-center text-nowrap">Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($roles as $key => $role)
                                        <tr>
                                            <td class="text-center">
                                                {{ ++$i }}
                                            </td>
                                            <td class="text-center">
                                                {{ $role->name }}
                                            </td>


                                            <td class="text-center">
                                                {{--                                                @can('role-edit')--}}
                                                <a href="{{ route('roles.edit',$role->id) }}"><button class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Edit"
                                                    ><i class="fas fa-edit"></i></button></a>
                                                {{--                                                @endcan--}}
{{--                                                @can('role-delete')--}}
{{--                                                    {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}--}}
{{--                                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}--}}
{{--                                                    {!! Form::close() !!}--}}
{{--                                                @endcan--}}


{{--                                                <form method="POST" action="{{ route('roles.destroy',$role->id) }}" class="delete-user btn btn-danger btn-xs p-0">--}}
{{--                                                    @csrf--}}
{{--                                                    @method('DELETE')--}}
{{--                                                    <button type="button" class="btn btn-danger btn-xs custom_delete bs-tooltip" title="Delete">--}}
{{--                                                        <i class="fa-solid fa-trash"></i>--}}
{{--                                                    </button>--}}
{{--                                                </form>--}}


                                              @can('role-delete')
                                                <form method="POST" action="{{ route('roles.destroy',$role->id) }}" class="delete-user btn btn-danger btn-xs">
                                                  @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i> </button>
                                                </form>
                                              @endcan


                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection










{{--@extends('layouts.app')--}}
{{--@section('content')--}}
{{--    <div class="row">--}}
{{--        <div class="col-lg-12 margin-tb">--}}
{{--            <div class="pull-left">--}}
{{--                <h2>Role Management</h2>--}}
{{--            </div>--}}
{{--            <div class="pull-right">--}}
{{--                @can('role-create')--}}
{{--                    <a class="btn btn-success" href="{{ route('roles.create') }}"> Create New Role</a>--}}
{{--                @endcan--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}


{{--    @if ($message = Session::get('success'))--}}
{{--        <div class="alert alert-success">--}}
{{--            <p>{{ $message }}</p>--}}
{{--        </div>--}}
{{--    @endif--}}


{{--    <table class="table table-bordered">--}}
{{--        <tr>--}}
{{--            <th>No</th>--}}
{{--            <th>Name</th>--}}
{{--            <th width="280px">Action</th>--}}
{{--        </tr>--}}
{{--        @foreach ($roles as $key => $role)--}}
{{--            <tr>--}}
{{--                <td>{{ ++$i }}</td>--}}
{{--                <td>{{ $role->name }}</td>--}}
{{--                <td>--}}
{{--                    <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>--}}
{{--                    @can('role-edit')--}}
{{--                        <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>--}}
{{--                    @endcan--}}
{{--                    @can('role-delete')--}}
{{--                        {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}--}}
{{--                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}--}}
{{--                        {!! Form::close() !!}--}}
{{--                    @endcan--}}
{{--                </td>--}}
{{--            </tr>--}}
{{--        @endforeach--}}
{{--    </table>--}}


{{--    {!! $roles->render() !!}--}}


{{--    <p class="text-center text-primary"><small>Tutorial by ItSolutionStuff.com</small></p>--}}
{{--@endsection--}}
