@extends('layouts.admin_layouts.admin_layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> Flat Information </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>

                            <li class="breadcrumb-item active"> Flat Information </li>
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
                                    <h3 class="card-title"> Flat Information :: Search </h3>
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


                                        <form id="form_data" method="post" action="{{ route('search-flat-information') }}">
                                            @csrf


                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label for="property_type_id" class="col-sm-4 col-form-label">Property Type</label>
                                                        <div class="col-sm-8">
                                                            <select class="form-control select2" id="property_type_id" name="property_type_id">
                                                                <option value="">Select</option>
                                                                @foreach ($property_type as $item)
                                                                    <option value="{{ $item->id }}" {{ (old('property_type_id') == $item->id ? 'selected' : '' ) }}>{{ $item->property_type_name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('property_type_id')<span class="text-danger">{{$message}}</span>@enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="district_id" class="col-sm-4 col-form-label"> District </label>
                                                        <div class="col-sm-8">
                                                            <select name="district_id" class="form-control select2" id="district_id" action="{{ route('find-thana') }}">
                                                                <option value="">Select</option>
                                                                @foreach($district as $item)
                                                                    <option value="{{ $item->id }}" {{(old('district_id') == $item->id ? 'selected' : '')}}>{{ $item->district_name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('district_id')<span class="text-danger">{{$message}}</span>@enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="thana_id" class="col-sm-4 col-form-label">Thana</label>
                                                        <div class="col-sm-8">
                                                            <select name="thana_id" class="form-control select2" id="thana_id">
                                                                <option value=""> Select </option>
        
                                                            </select>  
                                                            @error('thana_id')<span class="text-danger">{{$message}}</span>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    
                                                    <div class="form-group row">
                                                        <label for="seller_id" class="col-sm-4 col-form-label">Seller Name</label>
                                                        <div class="col-sm-8">
                                                            <select name="seller_id" class="form-control select2" id="seller_id">
                                                                <option value="">Select</option>
                                                                @foreach($seller as $item)
                                                                    <option value="{{ $item->id }}" {{(old('seller_id') == $item->id ? 'selected' : '')}}>{{ $item->seller_buyer_name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('seller_id')<span class="text-danger">{{$message}}</span>@enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="buyer_id" class="col-sm-4 col-form-label"> Buyer Name </label>
                                                        <div class="col-sm-8">
                                                            <select name="buyer_id" class="form-control select2" id="buyer_id" action="{{ route('find-buyer-details') }}">
                                                                <option value="">Select</option>
                                                                @foreach($buyer as $item)
                                                                    <option value="{{ $item->id }}" {{(old('buyer_id') == $item->id ? 'selected' : '')}}>{{ $item->seller_buyer_name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('buyer_id')<span class="text-danger">{{$message}}</span>@enderror
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
                                    <a href="{{ route('add-flat-information') }}"><button
                                            class="btn btn-sm
                                    btn-success add_btn"><i
                                                class="fas fa-plus"></i> Add Flat Information </button></a>
                                </div>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="data_table" class="table table-responsive no-footer dtr-inline">
                                    <thead>
                                        <tr>
                                            <th>Property Type</th>
                                            <th>District</th>
                                            <th>Thana</th>
                                            <th>Seller Name</th>
                                            <th>Buyer Name</th>
                                            <th>CS Khatian</th>
                                            <th>CS Dag</th>
                                            <th>SA Khatian</th>
                                            <th>SA Dag</th>
                                            <th>Status</th>
                                            <th width="13%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="search_data">
                                        @foreach ($data as $datum)
                                            <tr>
                                                <td>
                                                    {{ $datum->property_type_name }} 
                                                </td>
                                                <td>
                                                    {{ $datum->district_name }}
                                                </td>
                                                <td>
                                                    {{ $datum->thana_name }}
                                                </td>
                                                <td>
                                                    {{ $datum->seller_name }}
                                                </td>
                                                <td>
                                                    {{ $datum->buyer_name }}
                                                </td>
                                                <td>
                                                    {{ $datum->cs_khatian }}
                                                </td>
                                                <td>
                                                    {{ $datum->cs_dag }}
                                                </td>
                                                <td>
                                                    {{ $datum->sa_khatian }}
                                                </td>
                                                <td>
                                                    {{ $datum->sa_dag }}
                                                </td>
                                                <td>
                                                    @if ($datum->delete_status == 0)
                                                        Active
                                                    @else
                                                        Inactive
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('view-flat-information', $datum->id) }}"><button
                                                            class="btn btn-primary btn-sm" data-toggle="tooltip"
                                                            data-placement="top" title="Details"><i
                                                                class="fas fa-eye"></i></button></a>
                                                    <a href="{{ route('edit-flat-information', $datum->id) }}"><button
                                                            class="btn btn-info btn-sm" data-toggle="tooltip"
                                                            data-placement="top" title="Edit"><i
                                                                class="fas fa-edit"></i></button></a>
                                                    <form method="POST"
                                                        action="{{ route('delete-flat-information', $datum->id) }}"
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
