@extends('layouts.admin_layouts.admin_layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> Task </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>

                            <li class="breadcrumb-item active"> Task </li>
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
                        @if (Session::has('success'))
                            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                                {{ Session::get('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> Task List </h3>
                                <div class="float-right">
                                    <a href="{{ route('task.create') }}"><button
                                            class="btn btn-sm
                                    btn-success add_btn"><i
                                                class="fas fa-plus"></i> Add New </button></a>
                                </div>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="data_table" class="table dataTable no-footer dtr-inline">
                                    <thead>
                                        <tr>
                                            <th class=" text-nowrap">Current Status</th>
                                            <th class="text-center text-nowrap">Title</th>
                                            <th class="text-center text-nowrap">Date</th>
                                            <th class="text-center text-nowrap">Priority</th>
                                            <th class="text-center text-nowrap"> Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $datum)
                                            <tr>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-1">
                                                            <i class="fa fa-circle" style="color:

                                                            {{$datum->current_status == 'To Do' ? 'grey' : ''}}
                                                            {{$datum->current_status == 'In Progress' ? 'yellow' : ''}}
                                                            {{$datum->current_status == 'Due' ? 'red' : ''}}
                                                            {{$datum->current_status == 'Complete' ? 'green' : ''}}

                                                            "></i>
                                                        </div>
                                                        <div class="col-11">
                                                            <form action="{{ route('task.change.status', $datum->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('PUT')
                                                                <select class="select2 form-control-sm"
                                                                    name="current_status" onchange="this.form.submit()">
                                                                    <option value="In Progress"
                                                                        {{ $datum->current_status == 'In Progress' ? 'selected' : false }}>
                                                                        In Progress</option>
                                                                    <option value="To Do"
                                                                        {{ $datum->current_status == 'To Do' ? 'selected' : false }}>
                                                                        To Do</option>
                                                                    <option value="Due"
                                                                        {{ $datum->current_status == 'Due' ? 'selected' : false }}>
                                                                        Due</option>
                                                                    <option value="Complete"
                                                                        {{ $datum->current_status == 'Complete' ? 'selected' : false }}>
                                                                        Complete</option>
                                                                </select>
                                                            </form>
                                                        </div>
                                                    </div>



                                                </td>
                                                <td class="text-center">
                                                    {{ $datum->title }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $datum->date }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $datum->priority }}
                                                </td>

                                                <td class="text-center">
                                                    <a href="{{ route('task.show', $datum->id) }}"><button
                                                            class="btn btn-primary btn-sm" data-toggle="tooltip"
                                                            data-placement="top" title="Edit"><i
                                                                class="fas fa-eye"></i></button></a>

                                                    <a href="{{ route('task.edit', $datum->id) }}"><button
                                                            class="btn btn-info btn-sm" data-toggle="tooltip"
                                                            data-placement="top" title="Edit"><i
                                                                class="fas fa-edit"></i></button></a>

                                                    <form method="POST" action="{{ route('task.destroy', $datum->id) }}"
                                                        class="delete-user btn btn-danger btn-xs">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            data-toggle="tooltip" data-placement="top" title="Delete"><i
                                                                class="fas fa-trash"></i> </button>
                                                    </form>
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
