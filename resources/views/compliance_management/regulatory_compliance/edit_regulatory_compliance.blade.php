@extends('layouts.admin_layouts.admin_layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Regulatory Compliance</h1>

                    </div><!-- /.col -->



                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">
                                <a class="leading-normal inline-flex items-center font-normal spark-button-focus h-8 text-md px-4 bg-transparent border-0 border-solid text-blue-700 hover:text-blue-800 active:text-blue-700 rounded-md"
                                    type="button" href="{{ route('regulatory-compliance') }}" aria-disabled="false"
                                    role="link" tabindex="-1">Back</a>
                            </li>
                        </ol>
                    </div>


                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid py-2">
                <div class="col-md-12">
                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                            {{ Session::get('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="card">
                        <div class="">
                            <form action="{{ route('update-regulatory-compliance', $data->id) }}" method="post" enctype="multipart/form-data">

                                <section class="panel">
                                    <header class="panel-heading tab-bg-dark-navy-blue">
                                        <ul class="nav nav-tabs" style="padding-bottom:10px;">
                                            <li class="">
                                                <a data-toggle="tab" href="#home"
                                                    class="active">Certificate/License</a>
                                            </li>
                                            <li class="">
                                                <a data-toggle="tab" href="#about">Local Govt./License</a>
                                            </li>
                                            <li class="">
                                                <a data-toggle="tab" href="#buyer_investor">Utility Management</a>
                                            </li>

                                        </ul>
                                    </header>
                                    <div class="panel-body">
                                        <div class="tab-content">
                                            <div id="home" class="tab-pane active">

                                                <div class="card-header">
                                                    <h3 class="card-title" id="heading">Certificate/License</h3>
                                                    <div class="float-right">
                                                        <a class="btn btn-success" href="#"> Preview </a>
                                                    </div>
                                                </div>

                                                @csrf
                                                <div class="card-body">

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label for="certificates_name"
                                                                    class="col-sm-4 col-form-label">Name of
                                                                    Certificates/License</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control"
                                                                        id="certificates_name" name="certificates_name"
                                                                        value="{{ $data->certificates_name }}">
                                                                    @error('certificates_name')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="compliance_category_id"
                                                                    class="col-sm-4 col-form-label">Category </label>
                                                                <div class="col-sm-8">
                                                                    <select class="form-control select2"
                                                                        name="compliance_category_id"
                                                                        id="compliance_category_id">
                                                                        <option value="">Select</option>
                                                                        @foreach ($compliance_category as $item)
                                                                            <option value="{{ $item->id }}" {{ ($data->compliance_category_id == $item->id ? 'selected' : '') }}>
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
                                                                <label for="certificates_authority"
                                                                    class="col-sm-4 col-form-label">Name of
                                                                    Authority</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control"
                                                                        id="certificates_authority"
                                                                        name="certificates_authority"
                                                                        value="{{ $data->certificates_authority }}">
                                                                    @error('certificates_authority')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="certificates_ministry"
                                                                    class="col-sm-4 col-form-label">Ministry/Dept.</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control"
                                                                        id="certificates_ministry" name="certificates_ministry"
                                                                        value="{{ $data->certificates_ministry }}">
                                                                    @error('certificates_ministry')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="certificates_getting_cl_first_date"
                                                                    class="col-sm-4 col-form-label">First Date of Getting
                                                                    C/L</label>
                                                                <div class="col-sm-8">
                                                                    <input type="date" class="form-control"
                                                                        id="certificates_getting_cl_first_date"
                                                                        name="certificates_getting_cl_first_date"
                                                                        value="{{ $data->certificates_getting_cl_first_date }}">
                                                                    @error('certificates_getting_cl_first_date')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label for="certificates_expires"
                                                                    class="col-sm-4 col-form-label"> Expires
                                                                </label>
                                                                <div class="col-sm-8">
                                                                    <input type="date" class="form-control"
                                                                        id="certificates_expires"
                                                                        name="certificates_expires"
                                                                        value="{{ $data->certificates_expires }}">
                                                                    @error('certificates_expires')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="certificates_renew"
                                                                    class="col-sm-4 col-form-label"> Renew
                                                                </label>
                                                                <div class="col-sm-8">
                                                                    <input type="date" class="form-control"
                                                                        id="certificates_renew" name="certificates_renew"
                                                                        value="{{ $data->certificates_renew }}">
                                                                    @error('certificates_renew')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="certificates_special_provision"
                                                                    class="col-sm-4 col-form-label"> Special Provision
                                                                </label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control"
                                                                        id="certificates_special_provision"
                                                                        name="certificates_special_provision"
                                                                        value="{{ $data->certificates_special_provision }}">
                                                                    @error('certificates_special_provision')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="certificates_special_remarks"
                                                                    class="col-sm-4 col-form-label"> Special Remarks
                                                                </label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control"
                                                                        id="certificates_special_remarks"
                                                                        name="certificates_special_remarks"
                                                                        value="{{ $data->certificates_special_remarks }}">
                                                                    @error('certificates_special_remarks')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>


                                                        </div>

                                                    </div>

                                                    <div class="float-right mt-4">
                                                        <button type="submit" class="btn btn-primary text-uppercase"><i
                                                                class="fas fa-save"></i> Update </button>
                                                    </div>


                                                </div>


                                            </div>
                                            <div id="about" class="tab-pane">
                                                <div class="panel-body">
                                                    <div class="tab-content">
                                                        <div id="home" class="tab-pane active">

                                                            <div class="card-header">
                                                                <h3 class="card-title" id="heading">Local Govt./License
                                                                </h3>
                                                                <div class="float-right">
                                                                    <a class="btn btn-success" href="#">
                                                                        Preview </a>
                                                                </div>
                                                            </div>

                                                                <div class="card-body">

                                                                    <div class="row">

                                                                        <div class="col-md-6">

                                                                            <div class="form-group row">
                                                                                <label for="govt_authority"
                                                                                    class="col-sm-4 col-form-label">
                                                                                    Name of
                                                                                    Authority
                                                                                </label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="govt_authority"
                                                                                        name="govt_authority"
                                                                                        value="{{ $data->govt_authority }}">
                                                                                    @error('govt_authority')
                                                                                        <span
                                                                                            class="text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="govt_ministry_dept"
                                                                                    class="col-sm-4 col-form-label">
                                                                                    Ministry/Dept.
                                                                                </label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="govt_ministry_dept"
                                                                                        name="govt_ministry_dept"
                                                                                        value="{{ $data->govt_ministry_dept }}">
                                                                                    @error('govt_ministry_dept')
                                                                                        <span
                                                                                            class="text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="govt_getting_cl_first_date"
                                                                                    class="col-sm-4 col-form-label"> First
                                                                                    Date
                                                                                    of getting C/L
                                                                                </label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="date"
                                                                                        class="form-control"
                                                                                        id="govt_getting_cl_first_date"
                                                                                        name="govt_getting_cl_first_date"
                                                                                        value="{{ $data->govt_getting_cl_first_date }}">
                                                                                    @error('govt_getting_cl_first_date')
                                                                                        <span
                                                                                            class="text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="govt_expires"
                                                                                    class="col-sm-4 col-form-label">
                                                                                    Expires
                                                                                </label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="date"
                                                                                        class="form-control"
                                                                                        id="govt_expires"
                                                                                        name="govt_expires"
                                                                                        value="{{ $data->govt_expires }}">
                                                                                    @error('govt_expires')
                                                                                        <span
                                                                                            class="text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">

                                                                            <div class="form-group row">
                                                                                <label for="govt_renew"
                                                                                    class="col-sm-4 col-form-label"> Renew
                                                                                </label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="date"
                                                                                        class="form-control"
                                                                                        id="govt_renew" name="govt_renew"
                                                                                        value="{{ $data->govt_renew }}">
                                                                                    @error('govt_renew')
                                                                                        <span
                                                                                            class="text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="govt_special_provision"
                                                                                    class="col-sm-4 col-form-label">
                                                                                    Special
                                                                                    Provision
                                                                                </label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="govt_special_provision"
                                                                                        name="govt_special_provision"
                                                                                        value="{{ $data->govt_special_provision }}">
                                                                                    @error('govt_special_provision')
                                                                                        <span
                                                                                            class="text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="govt_special_remarks"
                                                                                    class="col-sm-4 col-form-label">
                                                                                    Special
                                                                                    Remarks
                                                                                </label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="govt_special_remarks"
                                                                                        name="govt_special_remarks"
                                                                                        value="{{ $data->govt_special_remarks }}">
                                                                                    @error('govt_special_remarks')
                                                                                        <span
                                                                                            class="text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>

                                                                        </div>

                                                                    </div>

                                                                    <div class="float-right mt-4">
                                                                        <button type="submit"
                                                                            class="btn btn-primary text-uppercase"><i
                                                                                class="fas fa-save"></i> Update </button>
                                                                    </div>


                                                                </div>


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="buyer_investor" class="tab-pane">

                                                <div class="card-header">
                                                    <h3 class="card-title" id="heading">Utility Management</h3>
                                                    <div class="float-right">
                                                        <a class="btn btn-success" href="#"> Preview </a>
                                                    </div>
                                                </div>

                                                    <div class="card-body">

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label for="utility_electricity"
                                                                        class="col-sm-4 col-form-label">Electricity
                                                                    </label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" class="form-control"
                                                                            id="utility_electricity"
                                                                            name="utility_electricity"
                                                                            value="{{ $data->utility_electricity }}">
                                                                        @error('utility_electricity')
                                                                            <span
                                                                                class="text-danger">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="utility_gas"
                                                                        class="col-sm-4 col-form-label">Gas </label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" class="form-control"
                                                                            id="utility_gas" name="utility_gas"
                                                                            value="{{ $data->utility_gas }}">
                                                                        @error('utility_gas')
                                                                            <span
                                                                                class="text-danger">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="utility_sewerage"
                                                                        class="col-sm-4 col-form-label">Sewerage
                                                                    </label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" class="form-control"
                                                                            id="utility_sewerage" name="utility_sewerage"
                                                                            value="{{ $data->utility_sewerage }}">
                                                                        @error('utility_sewerage')
                                                                            <span
                                                                                class="text-danger">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label for="utility_water"
                                                                        class="col-sm-4 col-form-label">
                                                                        Water
                                                                    </label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" class="form-control"
                                                                            id="utility_water" name="utility_water"
                                                                            value="{{ $data->utility_water }}">
                                                                        @error('utility_water')
                                                                            <span
                                                                                class="text-danger">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="utility_expires"
                                                                        class="col-sm-4 col-form-label"> Expires
                                                                    </label>
                                                                    <div class="col-sm-8">
                                                                        <input type="date" class="form-control"
                                                                            id="utility_expires" name="utility_expires"
                                                                            value="{{ $data->utility_expires }}">
                                                                        @error('utility_expires')
                                                                            <span
                                                                                class="text-danger">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="utility_renew"
                                                                        class="col-sm-4 col-form-label">
                                                                        Renew
                                                                    </label>
                                                                    <div class="col-sm-8">
                                                                        <input type="date" class="form-control"
                                                                            id="utility_renew" name="utility_renew"
                                                                            value="{{ $data->utility_renew }}">
                                                                        @error('utility_renew')
                                                                            <span
                                                                                class="text-danger">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="float-right mt-4">
                                                            <button type="submit" class="btn btn-primary text-uppercase"><i
                                                                    class="fas fa-save"></i> Update </button>
                                                        </div>


                                                    </div>


                                            </div>
                                </section>
                            </form>
                        </div>
                    </div>

                </div>
        </section>
        <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->
@endsection
