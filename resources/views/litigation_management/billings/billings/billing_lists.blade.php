@extends('layouts.admin_layouts.admin_layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> Billings </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>

                            <li class="breadcrumb-item active"> Billings </li>
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
                                    <h3 class="card-title"> Billings :: Search </h3>
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
                                        <form id="form_data" method="post" action="{{ route('search-case-billings') }}">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label for="case_type" class="col-sm-4 col-form-label"> Case Type </label>
                                                        <div class="col-sm-8">
                                                            <select name="case_type" class="form-control select2" id="case_type" action="{{ route('find-case-no') }}">
                                                                <option value=""> Select </option>
                                                                <option value="Civil Cases"> Civil Cases </option>
                                                                <option value="Criminal Cases"> Criminal Cases </option>
                                                                <option value="Labour Cases"> Labour Cases </option>
                                                                <option value="Special Quassi - Judicial Cases"> Special Quassi - Judicial Cases </option>
                                                                <option value="Supreme Court of Bangladesh"> Supreme Court of Bangladesh </option>
                                                                <option value="High Court Division"> High Court Division </option>
                                                                <option value="Appellate Court Division"> Appellate Court Division </option>
                                                            </select>
                                                            @error('case_type')<span class="text-danger">{{$message}}</span>@enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="case_id" class="col-sm-4 col-form-label"> Case No </label>
                                                        <div class="col-sm-8">
                                                            <select name="case_no" class="form-control select2" id="case_no">
                                                                <option value=""> Select </option>

                                                            </select>
                                                            @error('case_no')<span class="text-danger">{{$message}}</span>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label for="panel_lawyer_id" class="col-sm-4 col-form-label">Panel Lawyer</label>
                                                        <div class="col-sm-8">
                                                                <select name="panel_lawyer_id" class="form-control select2">
                                                                    <option value="">Select</option>
                                                                    @foreach($external_council as $item)
                                                                        <option value="{{ $item->id }}" {{(old('panel_lawyer_id') == $item->id ? 'selected':'')}}>{{ $item->first_name }} {{ $item->middle_name }} {{ $item->last_name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('panel_lawyer_id')<span class="text-danger">{{$message}}</span>@enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="date_of_billing" class="col-sm-4 col-form-label">Date of the Billing</label>
                                                        <div class="col-sm-8">
                                                            <input type="date" class="form-control" id="date_of_billing" name="date_of_billing" value="{{old('date_of_billing')}}">
                                                            @error('date_of_billing')<span class="text-danger">{{$message}}</span>@enderror
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

                        <section class="content">

                            <!-- Default box -->
                            <div class="card card-solid">
                                <div class="card-header">
                                    <h3 class="card-title"> Billings </h3>
                                    <div class="float-right">
                                        @can('billing-add')
                                        <a href="{{ route('add-billing') }}"><button
                                                class="btn btn-sm
                                        btn-success add_btn"><i
                                                    class="fas fa-plus"></i> Add Billings </button></a>
                                        @endcan
                                    </div>
                                </div>



                            <div class="row p-3" id="search_data">
                                @foreach ($data as $datum)
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="">
                                            <div class="float-right">
                                                @if ($datum->is_approved == null)
                                                    <a href="{{ route('edit-billing',$datum->id) }}"><button class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Edit"
                                                    ><i class="fas fa-edit"></i></button></a>
                                                    <form method="POST"
                                                        action="{{ route('delete-billing', $datum->id) }}"
                                                        class="delete-user btn btn-danger btn-xs">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            data-toggle="tooltip" data-placement="top" title="Delete"><i
                                                                class="fas fa-trash"></i> </button>
                                                    </form>
                                                @endif

                                                </div>
                                                <div class="card-body">
                                                    <div class="col-md-12">
                                                        <p class="text-muted text-sm"><b>Bill Type: </b> {{ $datum->bill_type_name }}  </p>
                                                        <p class="text-muted text-sm"><b>Payment Type: </b> {{ $datum->payment_type }}  </p>
                                                        <p class="text-muted text-sm"><b>District: </b> {{ $datum->district_name }}  </p>
                                                        <p class="text-muted text-sm"><b>Case Type: </b> {{  $datum->case_type }}  </p>
                                                        <p class="text-muted text-sm"><b>Case No: </b> {{ $datum->case_no }}  </p>
                                                        <p class="text-muted text-sm"><b>Panel Lawyer: </b> {{ $datum->first_name }} {{ $datum->middle_name }} {{ $datum->last_name }} </p>
                                                        <p class="text-muted text-sm"><b>Bill Amount: </b> {{ $datum->bill_amount }}  </p>
                                                        <p class="text-muted text-sm"><b>Date of Billing: </b> {{ $datum->date_of_billing }}  </p>
                                                        <p class="text-muted text-sm"><b>Bank: </b> {{ $datum->bank_name }} </p>
                                                        <p class="text-muted text-sm"><b>Branch: </b> {{ $datum->bank_branch_name }} </p>
                                                        <p class="text-muted text-sm"><b>Cheque No: </b> {{ $datum->cheque_no }}  </p>
                                                        <p class="text-muted text-sm"><b>Payment Amount: </b> {{ $datum->payment_amount }}  </p>
                                                        <p class="text-muted text-sm"><b>Digital Payment Type: </b> {{ $datum->digital_payment_type_name }}  </p>
                                                        <p class="text-muted text-sm"><b>Approval: </b> {{ $datum->is_approved }} </p>
                                                    </div>

                                                </div>

                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>

                            </div>
                            <!-- /.card -->

                        </section>

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
