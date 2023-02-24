@extends('layouts.admin_layouts.admin_layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
<style type="text/css">
.card-title{
    color: #0CA2A3 !important;
    font-weight: bold;
    font-size: 22px;
    text-decoration: underline;
}
</style>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> Schedule Category </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>

                            <li class="breadcrumb-item active"> Schedule Category </li>
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
                                <h3 class="card-title"> Schedule Category List </h3>
                                <div class="float-right">
                                        <a href="{{ route('schedule.category.create') }}"><button
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
                                            <th class="text-center text-nowrap"> SL </th>
                                            <th class="text-center text-nowrap"> Category Name </th>
                                            <th class="text-center text-nowrap"> Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $datum)
                                            <tr>
                                                <td class="text-center">
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td class="text-center">
                                                  <i class="fa fa-circle" style="color: {{$datum->color}}"></i>  {{ $datum->category_name }}
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('schedule.category.edit', $datum->id) }}"><button
                                                            class="btn btn-info btn-sm" data-toggle="tooltip"
                                                            data-placement="top" title="Edit"><i
                                                                class="fas fa-edit"></i></button></a>

                                                    <form method="POST" action="{{ route('schedule.category.destroy', $datum->id) }}"
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
