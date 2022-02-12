@extends('layouts.admin_layouts.admin_layout')
@section('content')



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Admin Setup</h1>

                    </div><!-- /.col -->



                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">
                                <a class="leading-normal inline-flex items-center font-normal spark-button-focus h-8 text-md px-4 bg-transparent border-0 border-solid text-blue-700 hover:text-blue-800 active:text-blue-700 rounded-md" type="button" href="{{ route('company') }}" aria-disabled="false" role="link" tabindex="-1">Cancel</a>
                            </li>
                        </ol>
                    </div>


                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
            <div class="row im-flex">
                <div class="col-md-2">
{{--                    @include('fixed-asset.dashboard-sidebar')--}}
                </div>
                <div class="col-md-10">
                    @if(Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                            {{Session::get('success')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="card">
                        <div class="">
                            <div class="card-header">
                                <h3 class="card-title" id="heading">Add Company</h3>
                            </div>

                            <form action="{{ route('save-company') }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="company_type_id" class="col-sm-4 col-form-label">Company Type</label>
                                                <div class="col-sm-8">
                                                        <select name="company_type_id" class="form-control select2" id="company_type_id">
                                                            <option value="">Select</option>
                                                            @foreach($company_type as $item)
                                                                <option value="{{ $item->id }}" {{(old('company_type_id') == $item->id?'selected':'')}}>{{ $item->company_type_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('company_type_id')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="company_name" class="col-sm-4 col-form-label">Company Name</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="company_name" name="company_name" value="{{old('company_name')}}">
                                                    @error('company_name')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="owner_name" class="col-sm-4 col-form-label"> Owner Name </label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="owner_name" name="owner_name"  value="{{old('owner_name')}}">
                                                    @error('owner_name')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="designation_id" class="col-sm-4 col-form-label">Owner's Designation</label>
                                                <div class="col-sm-8">
                                                        <select name="designation_id" class="form-control select2" id="designation_id">
                                                            <option value="">Select</option>
                                                            @foreach($designation as $item)
                                                                <option value="{{ $item->id }}" {{(old('designation_id') == $item->id?'selected':'')}}>{{ $item->designation_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('designation_id')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                        </div>                                       
                                    </div>
                                    <div class="">
                                        
                                        <div class="float-right mt-4">
                                            <button type="submit" class="btn btn-primary text-uppercase"><i class="fas fa-save"></i> Save</button>
                                        </div>
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




