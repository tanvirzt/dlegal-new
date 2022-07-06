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
                                <a class="leading-normal inline-flex items-center font-normal spark-button-focus h-8 text-md px-4 bg-transparent border-0 border-solid text-blue-700 hover:text-blue-800 active:text-blue-700 rounded-md" type="button" href="{{ route('matter') }}" aria-disabled="false" role="link" tabindex="-1">Back</a>
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
                                <h3 class="card-title" id="heading">Edit Matter</h3>
                            </div>

                            <form action="{{ route('update-matter',$data->id) }}" method="post">
                                @csrf
                                <div class="card-body">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="case_class_id"> Class of Cases </label>
                                            <select name="case_class_id" class="form-control select2" id="case_class_id" action="{{ route('find-case-category') }}">
                                                <option value="">Select</option>
                                                <option value="Civil" {{ $data->case_class_id == "Civil" ? 'selected' : '' }}> Civil </option>
                                                <option value="Criminal" {{ $data->case_class_id == "Criminal" ? 'selected' : '' }}> Criminal </option>
                                                <option value="Service Matter" {{ $data->case_class_id == "Service Matter" ? 'selected' : '' }}> Service Matter </option>
                                                <option value="Special/Quassi - Judicial Cases" {{ $data->case_class_id == "Special/Quassi - Judicial Cases" ? 'selected' : '' }}> Special/Quassi - Judicial Cases </option>
                                                <option value="High Court Division" {{ $data->case_class_id == "High Court Division" ? 'selected' : '' }}> High Court Division </option>
                                                <option value="Appellate Court Division" {{ $data->case_class_id == "Appellate Court Division" ? 'selected' : '' }}> Appellate Court Division </option>
                                            </select>
                                            @error('case_class_id')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="case_category_id"> Case Category </label>
                                            <select name="case_category_id" class="form-control select2" id="case_category_id" action="{{ route('find-case-category') }}">
                                                <option value="">Select</option>
                                                @foreach($existing_case_category as $item)
                                                    <option
                                                        value="{{ $item->id }}" {{( $data->case_category_id == $item->id ? 'selected':'')}}>{{ $item->case_category }}</option>
                                                @endforeach
                                            </select>
                                            @error('case_category_id')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="matter_name"> Matter </label>
                                            <input type="text" class="form-control" name="matter_name"
                                                   id="matter_name" value="{{ $data->matter_name }}">
                                            @error('matter_name')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>

                                        <div class="float-right">
                                        <button type="submit" class="btn btn-primary text-uppercase"><i class="fas fa-save"></i> Update </button>

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




