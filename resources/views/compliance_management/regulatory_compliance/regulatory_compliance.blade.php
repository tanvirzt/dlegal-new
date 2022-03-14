@extends('layouts.admin_layouts.admin_layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> Regulatory Compliance </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>

                            <li class="breadcrumb-item active"> Regulatory Compliance </li>
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
                                    <h3 class="card-title"> Regulatory Compliance :: Search </h3>
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


                                        <form id="form_data" method="post" action="{{ route('search-regulatory-compliance') }}">
                                            @csrf


                                            <div class="row">
                                                <div class="col-md-6">
                                                    
                                                    <div class="form-group row">
                                                        <label for="compliance_category_id"
                                                            class="col-sm-4 col-form-label">Category </label>
                                                        <div class="col-sm-8">
                                                            <select class="form-control select2"
                                                                name="compliance_category_id"
                                                                id="compliance_category_id">
                                                                <option value="">Select</option>
                                                                @foreach ($compliance_category as $item)
                                                                    <option value="{{ $item->id }}" {{ (old('compliance_category_id') == $item->id ? 'selected' : '') }}>
                                                                        {{ $item->compliance_category_name }}
                                                                    </option>
                                                                @endforeach

                                                            </select>
                                                            @error('compliance_category_id')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="certificates_name"
                                                            class="col-sm-4 col-form-label">Certificates/ License</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control"
                                                                id="certificates_name"
                                                                name="certificates_name"
                                                                value="{{ old('certificates_name') }}">
                                                            @error('certificates_name')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label for="certificates_authority"
                                                            class="col-sm-4 col-form-label">Certificates Authority</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control"
                                                                id="certificates_authority"
                                                                name="certificates_authority"
                                                                value="{{ old('certificates_authority') }}">
                                                            @error('certificates_authority')
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
                                    <a href="{{ route('add-regulatory-compliance') }}"><button class="btn btn-sm btn-success add_btn"><i
                                                class="fas fa-plus"></i> Add Regulatory Compliance </button></a>
                                </div>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="data_table" class="table table-responsive no-footer dtr-inline">
                                    <thead>
                                        <tr>
                                            <th class="text-center text-nowrap">Certificates/ License</th>
                                            <th class="text-center text-nowrap">Category</th>
                                            <th class="text-center text-nowrap">Certificates Authority</th>
                                            <th class="text-center text-nowrap">Ministry/Dept.</th>
                                            <th class="text-center text-nowrap">CL Date</th>
                                            <th class="text-center text-nowrap">Expires</th>
                                            <th class="text-center text-nowrap">Renew</th>
                                            <th class="text-center text-nowrap">Status</th>
                                            <th width="13%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="search_data">
                                        @foreach ($data as $datum)
                                            <tr>
                                                <td class="text-center">
                                                    {{ $datum->certificates_name }} 
                                                </td>
                                                <td class="text-center">
                                                    {{ $datum->compliance_category_name }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $datum->certificates_authority }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $datum->certificates_ministry }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $datum->certificates_getting_cl_first_date }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $datum->certificates_expires }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $datum->certificates_renew }}
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
                                                    <a href="{{ route('view-regulatory-compliance', $datum->id) }}"><button
                                                            class="btn btn-primary btn-sm" data-toggle="tooltip"
                                                            data-placement="top" title="Details"><i
                                                                class="fas fa-eye"></i></button></a>
                                                    <a href="{{ route('edit-regulatory-compliance', $datum->id) }}"><button
                                                            class="btn btn-info btn-sm" data-toggle="tooltip"
                                                            data-placement="top" title="Edit"><i
                                                                class="fas fa-edit"></i></button></a>
                                                    <form method="POST"
                                                        action="{{ route('delete-regulatory-compliance', $datum->id) }}"
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
