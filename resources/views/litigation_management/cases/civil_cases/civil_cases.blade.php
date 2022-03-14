@extends('layouts.admin_layouts.admin_layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> Civil Cases </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>

                            <li class="breadcrumb-item active"> Civil Cases </li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                        {{ Session::get('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="row">

                    <div class="col-md-8">
                        <div class="card">



                            <div id="accordion">

                                <div class="card-header" id="headingTwo">
                                    <h3 class="card-title"> Civil Cases :: Search </h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn collapsed" data-toggle="collapse"
                                            data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>


                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                    data-parent="#accordion">
                                    <div class="card-body">


                                        <form id="form_data" method="post" action="{{ route('search_civil_cases') }}">
                                            @csrf


                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label for="case_no" class="col-sm-4 col-form-label">Case
                                                            No.</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="case_no"
                                                                name="case_no" value="{{ old('case_no') }}">
                                                            @error('case_no')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="date_of_filing" class="col-sm-4 col-form-label"> Date of
                                                            Filing </label>
                                                        <div class="col-sm-8">
                                                            <input type="date" class="form-control" id="date_of_filing"
                                                                name="date_of_filing" value="{{ old('date_of_filing') }}">
                                                            @error('date_of_filing')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label for="name_of_the_court_id" class="col-sm-4 col-form-label">
                                                            Name of the Court </label>
                                                        <div class="col-sm-8">
                                                            <select name="name_of_the_court_id"
                                                                class="form-control select2">
                                                                <option value="">Select</option>
                                                                @foreach ($court as $item)
                                                                    <option value="{{ $item->id }}">
                                                                        {{ $item->court_name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('name_of_the_court_id')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="float-right">
                                                <button type="submit" id="submit" class="btn btn-primary text-uppercase"><i
                                                        class="fas fa-search"></i> Search </button>
                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> List </h3>
                                <div class="float-right">
                                    <a href="{{ route('add-civil-cases') }}"><button
                                            class="btn btn-sm
                                    btn-success add_btn"><i
                                                class="fas fa-plus"></i> Add Civil Cases </button></a>
                                </div>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="data_table" class="table table-responsive no-footer dtr-inline">
                                    <thead>
                                        <tr>
                                            <th class="text-nowrap text-center">Case No</th>
                                            <th class="text-center">Suit Value</th>
                                            <th class="text-center">Division</th>
                                            <th class="text-nowrap"> Court Name</th>
                                            <th class="text-center">District</th>
                                            <th class="text-center">Company</th>
                                            <th class="text-nowrap">Plaintiff Name</th>
                                            <th class="text-nowrap">Defendent Name</th>
                                            <th class="text-center">Status</th>
                                            <th width="13%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="search_data">
                                        @foreach ($data as $datum)
                                            <tr>
                                                <td>
                                                    <a href="{{ route('view-civil-cases', $datum->id) }}">
                                                        {{ $datum->case_no }} </a>
                                                </td>
                                                <td>
                                                    {{ $datum->name_of_suit }}
                                                </td>
                                                <td>
                                                    {{ $datum->division_name }}
                                                </td>
                                                <td>
                                                    {{ $datum->court_name }}
                                                </td>
                                                <td>
                                                    {{ $datum->district_name }}
                                                </td>

                                                <td>
                                                    {{ $datum->company_name }}
                                                </td>
                                                <td>
                                                    {{ $datum->plaintiff_name }}
                                                </td>
                                                <td>
                                                    {{ $datum->defendent_name }}
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
                                                    <a href="{{ route('view-civil-cases', $datum->id) }}"><button
                                                            class="btn btn-primary btn-sm" data-toggle="tooltip"
                                                            data-placement="top" title="Details"><i
                                                                class="fas fa-eye"></i></button></a>
                                                    <a href="{{ route('add-billing-civil-cases', $datum->id) }}"><button
                                                            class="btn btn-warning btn-sm" data-toggle="tooltip"
                                                            data-placement="top" title="Bill Entry"><i
                                                                class="fas fa-money-bill"></i></button></a>
                                                    <a href="{{ route('edit-civil-cases', $datum->id) }}"><button
                                                            class="btn btn-info btn-sm" data-toggle="tooltip"
                                                            data-placement="top" title="Edit"><i
                                                                class="fas fa-edit"></i></button></a>
                                                    <form method="POST"
                                                        action="{{ route('delete-civil-cases', $datum->id) }}"
                                                        class="delete-user btn btn-danger btn-xs">
                                                        @csrf
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
