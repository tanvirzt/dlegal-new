@extends('layouts.admin_layouts.admin_layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> Social Compliance </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>

                            <li class="breadcrumb-item active"> Social Compliance </li>
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
                                    <h3 class="card-title"> Social Compliance :: Search </h3>
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


                                        <form id="form_data" method="post" action="{{ route('search-social-compliance') }}">
                                            @csrf


                                            <div class="row">
                                                <div class="col-md-6">
                                                    
                                                    <div class="form-group row">
                                                        <label for="employment_condition"
                                                            class="col-sm-4 col-form-label">Employment
                                                            Condition</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control"
                                                                id="employment_condition"
                                                                name="employment_condition"
                                                                value="{{ old('employment_condition') }}">
                                                            @error('employment_condition')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="code_of_conduct"
                                                            class="col-sm-4 col-form-label">Code of Conduct
                                                        </label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control"
                                                                id="code_of_conduct" name="code_of_conduct"
                                                                value="{{ old('code_of_conduct') }}">
                                                            @error('code_of_conduct')
                                                                <span
                                                                    class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                                                                       
                                                    <div class="form-group row">
                                                        <label for="international_standard"
                                                            class="col-sm-4 col-form-label">International Standard
                                                        </label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control"
                                                                id="international_standard"
                                                                name="international_standard"
                                                                value="{{ old('international_standard') }}">
                                                            @error('international_standard')
                                                                <span
                                                                    class="text-danger">{{ $message }}</span>
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
                                    <a href="{{ route('add-social-compliance') }}"><button class="btn btn-sm btn-success add_btn"><i
                                                class="fas fa-plus"></i> Add Social Compliance </button></a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="data_table" class="table table-responsive no-footer dtr-inline">
                                    <thead>
                                        <tr>
                                            <th class="text-center text-nowrap">Employment Condition</th>
                                            <th class="text-center text-nowrap">Working Hr & Leave</th>
                                            <th class="text-center text-nowrap">Compensation</th>
                                            <th class="text-center text-nowrap">Hygine and Safety</th>
                                            <th class="text-center text-nowrap">Welfare & Security</th>
                                            <th class="text-center text-nowrap">Industrial Relation</th>
                                            <th class="text-center text-nowrap">Status</th>
                                            <th width="10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="search_data">
                                        @foreach ($data as $datum)
                                            <tr>
                                                <td class="text-center">
                                                    {{ $datum->employment_condition }} 
                                                </td>
                                                <td class="text-center">
                                                    {{ $datum->working_hour_leave }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $datum->compensation_benefit }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $datum->hygine_safety }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $datum->welfare_security }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $datum->industrial_relation }}
                                                </td>
                                                
                                                <td class="text-center">
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
                                                <td class="text-center">
                                                    <a href="{{ route('view-social-compliance', $datum->id) }}"><button
                                                            class="btn btn-primary btn-sm" data-toggle="tooltip"
                                                            data-placement="top" title="Details"><i
                                                                class="fas fa-eye"></i></button></a>
                                                    <a href="{{ route('edit-social-compliance', $datum->id) }}"><button
                                                            class="btn btn-info btn-sm" data-toggle="tooltip"
                                                            data-placement="top" title="Edit"><i
                                                                class="fas fa-edit"></i></button></a>
                                                    <form method="POST"
                                                        action="{{ route('delete-social-compliance', $datum->id) }}"
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
