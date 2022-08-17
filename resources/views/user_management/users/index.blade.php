@extends('layouts.admin_layouts.admin_layout')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> User </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>

                            <li class="breadcrumb-item active"> User </li>
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

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> List </h3>
                                <div class="float-right">
                                    <a href="{{ route('users.create') }}"><button class="btn btn-sm
                                    btn-success add_btn"><i class="fas fa-plus"></i> Add User </button></a>
                                </div>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="data_table" class="table dataTable no-footer dtr-inline">
                                    <thead>
                                    <tr>

                                        <th class="text-center text-nowrap">No</th>
                                        <th class="text-center text-nowrap">Name</th>
                                        <th class="text-center text-nowrap">Email</th>
                                        <th class="text-center text-nowrap">Roles</th>
                                        <th class="text-center text-nowrap">Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($data as $key => $user)

                                        <tr>
                                            <td class="text-center">
                                                {{ ++$i }}
                                            </td>
                                            <td class="text-center">
                                                {{ $user->name }}
                                            </td>
                                            <td class="text-center">
                                                {{ $user->email }}
                                            </td>
                                            <td class="text-center">
                                                @if(!empty($user->getRoleNames()))
                                                    @foreach($user->getRoleNames() as $v)
                                                        <label class="badge badge-success">{{ $v }}</label>
                                                    @endforeach
                                                @endif
                                            </td>


                                            <td class="text-center">
{{--                                                @can('user-edit')--}}
                                                    <a href="{{ route('users.edit',$user->id) }}"><button class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Edit"
                                                    ><i class="fas fa-edit"></i></button></a>
{{--                                                @endcan--}}

                                                <a href="{{ route('users.add-permissions',$user->id) }}"><button class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Permission"
                                                    ><i class="fas fa-check"></i></button></a>

{{--                                              @can('user-delete')--}}
                                                <form method="POST" action="{{ route('users.destroy',$user->id) }}" class="delete-user btn btn-danger btn-xs">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i> </button>
                                                </form>
{{--                                              @endcan--}}


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





