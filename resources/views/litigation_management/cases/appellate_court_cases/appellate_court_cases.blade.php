@extends('layouts.admin_layouts.admin_layout')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> Appellate Court of Bangladesh </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>

                            <li class="breadcrumb-item active"> Appellate Court of Bangladesh</li>
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
                    <div class="col-md-8">
                        <div class="card">


                            <div id="accordion">

                                <div class="card-header" id="headingTwo">
                                    <h3 class="card-title"> Appellate Court of Bangladesh :: Search </h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn collapsed" data-toggle="collapse"
                                                data-target="#collapseTwo" aria-expanded="false"
                                                aria-controls="collapseTwo">
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


                                        <form id="form_data" method="post"
                                              action="{{ route('search-appellate-court-cases') }}">
                                            @csrf

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label for="case_no" class="col-sm-4 col-form-label">
                                                            Case No. </label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="case_no"
                                                                   name="case_no"
                                                                   value="{{ old('case_no') }}">
                                                            @error('case_no')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="tender_no" class="col-sm-4 col-form-label">Tender
                                                            No.</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="tender_no"
                                                                   name="tender_no"
                                                                   value="{{ old('tender_no') }}">
                                                            @error('tender_no')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="tender_no_date" class="col-sm-4 col-form-label">Tender
                                                            No. Date</label>
                                                        <div class="col-sm-8">
                                                            <input type="date" class="form-control" id="tender_no_date"
                                                                   name="tender_no_date"
                                                                   value="{{ old('tender_no_date') }}">
                                                            @error('tender_no_date')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label for="case_category_id"
                                                               class="col-sm-4 col-form-label">Category of Supreme Court
                                                            Case</label>
                                                        <div class="col-sm-8">
                                                            <select name="case_category_id"
                                                                    class="form-control select2"
                                                                    id="case_category_id"
                                                                    action="{{ route('find-case-subcategory') }}">
                                                                <option value="">Select</option>
                                                                @foreach ($case_category as $item)
                                                                    <option value="{{ $item->id }}"
                                                                        {{ old('case_category_id') == $item->id ? 'selected' : '' }}>
                                                                        {{ $item->case_category }} </option>
                                                                @endforeach
                                                            </select>
                                                            @error('case_category_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="case_subcategory_id"
                                                               class="col-sm-4 col-form-label">Subcategory of Supreme
                                                            Court
                                                            Case</label>
                                                        <div class="col-sm-8">

                                                            <select name="case_subcategory_id"
                                                                    class="form-control select2"
                                                                    id="case_subcategory_id">
                                                                <option value="">Select</option>

                                                            </select>
                                                            @error('case_subcategory_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="float-right">
                                                <button type="submit" id="submit"
                                                        class="btn btn-primary text-uppercase"><i
                                                        class="fas fa-search"></i> Search
                                                </button>
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
                                    <a href="{{ route('add-appellate-court-cases') }}">
                                        <button class="btn btn-sm
                                    btn-success add_btn"><i class="fas fa-plus"></i> Add Appellate Court of Bangladesh
                                        </button>
                                    </a>
                                </div>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="data_table" class="table dataTable no-footer dtr-inline">
                                    <thead>
                                    <tr>
                                        <th class="text-center">Case No</th>
                                        <th class="text-center">Tender No.</th>
                                        <th class="text-center">Tender No. Date</th>
                                        <th class="text-center">Category</th>
                                        <th class="text-center">Subcategory</th>
                                        <th class="text-center">Date of filing</th>
                                        <th class="text-center">Order</th>
                                        <th class="text-center">Status</th>
                                        <th width="13%">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="search_data">
                                    @foreach($data as $datum)

                                        <tr>
                                            <td>
                                                <a href="{{ route('view-appellate-court-cases', $datum->id) }}"> {{ $datum->case_no }} </a>
                                            </td>
                                            <td>
                                                {{ $datum->tender_no }}
                                            </td>
                                            <td>
                                                {{ $datum->tender_no_date }}
                                            </td>
                                            <td>
                                                {{ $datum->case_category }}
                                            </td>
                                            <td>
                                                {{ $datum->case_subcategory }}
                                            </td>

                                            <td>
                                                {{ $datum->date_of_filing_hcd }}
                                            </td>
                                            <td>
                                                {{ $datum->order }}
                                            </td>
                                            <td>
                                                @if ($datum->delete_status == 0)
                                                    <button type="button"
                                                            class="btn-custom btn-success-custom text-uppercase"> Active
                                                    </button>
                                                @else
                                                    <button type="button"
                                                            class="btn-custom btn-warning-custom text-uppercase">
                                                        Inactive
                                                    </button>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('view-appellate-court-cases',$datum->id) }}">
                                                    <button class="btn btn-primary btn-sm" data-toggle="tooltip"
                                                            data-placement="top" title="Details"
                                                    ><i class="fas fa-eye"></i></button>
                                                </a>
                                                <a href="{{ route('add-billing-appellate-court-cases', $datum->id) }}">
                                                    <button
                                                        class="btn btn-warning btn-sm" data-toggle="tooltip"
                                                        data-placement="top" title="Bill Entry"><i
                                                            class="fas fa-money-bill"></i></button>
                                                </a>
                                                <a href="{{ route('edit-appellate-court-cases',$datum->id) }}">
                                                    <button class="btn btn-info btn-sm" data-toggle="tooltip"
                                                            data-placement="top" title="Edit"
                                                    ><i class="fas fa-edit"></i></button>
                                                </a>
                                                <form method="POST"
                                                      action="{{ route('delete-appellate-court-cases',$datum->id) }}"
                                                      class="delete-user btn btn-danger btn-xs">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                            data-toggle="tooltip" data-placement="top" title="Delete"><i
                                                            class="fas fa-trash"></i></button>
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


