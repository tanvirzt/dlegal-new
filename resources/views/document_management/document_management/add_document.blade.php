@extends('layouts.admin_layouts.admin_layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Document</h1>
                    </div><!-- /.col -->



                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">
                                <a class="leading-normal inline-flex items-center font-normal spark-button-focus h-8 text-md px-4 bg-transparent border-0 border-solid text-blue-700 hover:text-blue-800 active:text-blue-700 rounded-md"
                                    type="button"
                                    @if (!empty($civil_case)) href="{{ route('civil-cases') }}" 
                                @else
                                    href="{{ route('billing') }}" @endif
                                    aria-disabled="false" role="link" tabindex="-1">Back</a>
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
                            <div class="card-header">
                                <h3 class="card-title" id="heading"> Add Document </h3>
                            </div>

                            <form action="{{ route('save-billing') }}" method="post">
                                @csrf
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-md-6">

                                            <div class="form-group row">
                                                <label for="document_type" class="col-sm-4 col-form-label"> Document Type
                                                </label>
                                                <div class="col-sm-8">
                                                    <select name="document_type" class="form-control select2"
                                                        id="document_type">
                                                        <option value=""> Select </option>
                                                        <option value="Internal Files"> Internal Files </option>
                                                        <option value="External Files"> External Files </option>
                                                    </select>
                                                    @error('document_type')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="module" style="display: none;">
                                                <div class="form-group row">
                                                    <label for="module" class="col-sm-4 col-form-label"> Module </label>
                                                    <div class="col-sm-8">
                                                        <select name="module" class="form-control select2" id="module">
                                                            <option value=""> Select </option>
                                                            <option value="Admin Setup">Admin Setup </option>
                                                            <option value="Litigation Mangement"> Litigation Mangement
                                                            </option>
                                                            <option value="Property Management"> Property Management
                                                            </option>
                                                        </select>
                                                        @error('module')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="setup" style="display: none;">
                                                    <div class="form-group row">
                                                        <label for="menu" class="col-sm-4 col-form-label"> Menu </label>
                                                        <div class="col-sm-8">
                                                            <select name="menu" class="form-control select2" id="admin_setup">
                                                                <option value=""> Select </option>
                                                                <option value="External Council"> External Council </option>
                                                                <option value="External Council Associates"> External
                                                                    Council
                                                                    Associates </option>
                                                                <option value="Internal Council"> Internal Council </option>
                                                            </select>
                                                            @error('menu')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="cases" style="display: none;">
                                                    <div class="form-group row">
                                                        <label for="menu" class="col-sm-4 col-form-label"> Menu </label>
                                                        <div class="col-sm-8">
                                                            <select name="menu" class="form-control select2" id="cases">
                                                                <option value=""> Select </option>
                                                                <option value="Civil Cases"> Civil Cases </option>
                                                                <option value="Criminal Cases"> Criminal Cases </option>
                                                                <option value="Labour Cases"> Labour Cases </option>
                                                                <option value="Special Quassi - Judicial Cases"> Special
                                                                    Quassi
                                                                    - Judicial Cases </option>
                                                                <option value="Supreme Court of Bangladesh"> Supreme Court
                                                                    of
                                                                    Bangladesh </option>
                                                                <option value="High Court Division"> High Court Division
                                                                </option>
                                                                <option value="Appellate Court Division"> Appellate Court
                                                                    Division </option>
                                                            </select>
                                                            @error('menu')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="property_management" style="display: none;">
                                                    <div class="form-group row">
                                                        <label for="menu" class="col-sm-4 col-form-label"> Menu </label>
                                                        <div class="col-sm-8">
                                                            <select name="menu" class="form-control select2" id="property_management">
                                                                <option value=""> Select </option>
                                                                <option value="Land Information"> Land Information </option>
                                                                <option value="Flat Information"> Flat Information </option>
                                                            </select>
                                                            @error('menu')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>



                                        </div>
                                        <div class="col-md-6">





                                        </div>
                                    </div>
                                    <div class="float-right mt-4">
                                        <button type="submit" class="btn btn-primary text-uppercase"><i
                                                class="fas fa-save"></i> Save</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
        </section>
        <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->
@endsection
