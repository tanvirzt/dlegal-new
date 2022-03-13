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
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">
                                <a class="leading-normal inline-flex items-center font-normal spark-button-focus h-8 text-md px-4 bg-transparent border-0 border-solid text-blue-700 hover:text-blue-800 active:text-blue-700 rounded-md" type="button" href="{{ route('document-management') }}" aria-disabled="false" role="link" tabindex="-1">Back</a>
                            </li>
                        </ol>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid py-2">
                <div class="col-md-8 mx-auto">
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

                            <form action="{{ route('save-document') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">

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
                                            <div class="form-group row external_file_name" style="display: none;">
                                                <label for="file_name" class="col-sm-4 col-form-label">File Name</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="file_name" name="file_name" value="{{old('file_name')}}">
                                                    @error('file_name')<span class="text-danger">{{$message}}</span>@enderror
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
                                                            <select name="admin_menu" class="form-control select2" id="admin_setup" action="{{ route('find-admin-setup') }}">
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
                                                            <select name="cases_menu" class="form-control select2" id="litigation_m" action="{{ route('find-litigation-cases') }}">
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
                                                            @error('cases_menu')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="property_management" style="display: none;">
                                                    <div class="form-group row">
                                                        <label for="menu" class="col-sm-4 col-form-label"> Menu </label>
                                                        <div class="col-sm-8">
                                                            <select name="property_management_menu" class="form-control select2" id="property_management" action="{{ route('find-property-management') }}">
                                                                <option value=""> Select </option>
                                                                <option value="Land Information"> Land Information </option>
                                                                <option value="Flat Information"> Flat Information </option>
                                                            </select>
                                                            @error('property_management_menu')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="admin_setup_d" style="display: none;">
                                                    <div class="form-group row">
                                                        <label for="admin_setup_data" class="col-sm-4 col-form-label"> File For </label>
                                                        <div class="col-sm-8">
                                                            <select name="admin_setup_data" class="form-control select2" id="admin_setup_data">
                                                                <option value=""> Select </option>
                                                                
                                                            </select>
                                                            @error('admin_setup_data')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="litigation_management_d" style="display: none;">
                                                    <div class="form-group row">
                                                        <label for="litagation_cases" class="col-sm-4 col-form-label"> File For </label>
                                                        <div class="col-sm-8">
                                                            <select name="litagation_cases" class="form-control select2" id="litagation_cases">
                                                                <option value=""> Select </option>
                                                                
                                                            </select>
                                                            @error('litagation_cases')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                
                                                <div class="p_management_d" style="display: none;">
                                                    <div class="form-group row">
                                                        <label for="p_management" class="col-sm-4 col-form-label"> File For </label>
                                                        <div class="col-sm-8">
                                                            <select name="p_management" class="form-control select2" id="p_management">
                                                                <option value=""> Select </option>
                                                                
                                                            </select>
                                                            @error('p_management')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>




                                            <div class="form-group">
                                                <label for="case_notes"> Document Upload </label>
                                                <div class="input-group hdtuto control-group lst increment">
                                                    <input type="file" name="uploaded_document[]" class="myfrm form-control">
                                                    <div class="input-group-btn">
                                                        <button class="btn btn-success" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>+</button>
                                                    </div>
                                                </div>
                                                <div class="clone hide">
                                                    <div class="hdtuto control-group lst input-group" style="margin-top:10px">
                                                        <input type="file" name="uploaded_document[]" class="myfrm form-control">
                                                        <div class="input-group-btn">
                                                            <button class="btn btn-danger" type="button"><i class="fldemo glyphicon glyphicon-remove"></i> - </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                @error('uploaded_document')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
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
