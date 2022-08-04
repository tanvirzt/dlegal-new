@extends('layouts.admin_layouts.admin_layout')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> Chamber </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>

                            <li class="breadcrumb-item active"> Chamber </li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @if(Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                        {{Session::get('success')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="row">

                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> List </h3>
                                <div class="float-right">
                                    <a href="{{ route('add-chamber') }}"><button class="btn btn-sm
                                    btn-success add_btn"><i class="fas fa-plus"></i> Add Chamber </button></a>
                                </div>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="data_table" class="table dataTable no-footer dtr-inline">
                                    <thead>
                                    <tr>
                                        <th class="text-center"> Name </th>
                                        <th class="text-center"> Logo </th>
                                        <th class="text-center"> Telephone </th>
                                        <th class="text-nowrap"> Mobile </th>
                                        <th class="text-center"> Status </th>
                                        <th width="13%">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="search_data">
                                    @foreach($data as $datum)
                                        <tr>
                                            <td>
                                                {{ $datum->case_year }}
                                            </td>
                                            <td>
                                                {{ $datum->alligation }}
                                            </td>
                                            <td>
                                                {{ $datum->amount }}
                                            </td>
                                            <td>
                                                {{ $datum->name_of_the_first_party }}
                                            </td>
                                            <td>
                                                {{ $datum->second_party_name }}
                                            </td>
                                            <td>
                                                {{ $datum->case_notes }}
                                            </td>

                                            <td>
                                                @if ($datum->delete_status == 0)
                                                    <button type="button"
                                                        class="btn-custom btn-success-custom text-uppercase"> Active
                                                    </button>
                                                @else
                                                    <button type="button"
                                                        class="btn-custom btn-warning-custom text-uppercase">Inactive</button>
                                                @endif
                                                </span>
                                            </td>
                                            <td>
                                            <a href="{{ route('view-labour-cases',$datum->id) }}"><button class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Details"
                                                ><i class="fas fa-eye"></i></button></a>
                                            <a href="{{ route('add-billing-labour-cases', $datum->id) }}"><button
                                                class="btn btn-warning btn-sm" data-toggle="tooltip"
                                                data-placement="top" title="Bill Entry"><i class="fas fa-money-bill"></i></button></a>
                                            <a href="{{ route('edit-labour-cases',$datum->id) }}"><button class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Edit"
                                                ><i class="fas fa-edit"></i></button></a>

                                                <form method="POST" action="{{ route('delete-labour-cases',$datum->id) }}" class="delete-user btn btn-danger btn-xs">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i> </button>
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


