@extends('layouts.admin_layouts.admin_layout')
@section('content')



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Update Criminal Case Status</h1>

                    </div><!-- /.col -->



                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">
                                <a class="leading-normal inline-flex items-center font-normal spark-button-focus h-8 text-md px-4 bg-transparent border-0 border-solid text-blue-700 hover:text-blue-800 active:text-blue-700 rounded-md" type="button" href="{{ url()->previous() }}" aria-disabled="false" role="link" tabindex="-1">Back</a>
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
                <div class="col-md-12">
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

                            <div class="panel-body">
                                <div class="tab-content">
                                    <div id="home" class="tab-pane active">

                                        <div class="card-header">
                                            <h3 class="card-title" id="heading">Update Criminal Case
                                                Status</h3>
                                        </div>

                                        <form
                                            action="{{ route('update-criminal-cases-working-doc', $data->id) }}" enctype="multipart/form-data"
                                            method="post">
                                            @csrf
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label for="uploaded_document" class="col-sm-4 col-form-label">Document Upload</label>
                                                            <div class="col-sm-8">
                                                                <input type="file" class="form-control" id="uploaded_document"
                                                                    name="uploaded_document">
                                                                @error('uploaded_document')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="uploaded_document" class="col-sm-4 col-form-label">Document Date</label>
                                                            <div class="col-sm-8">
                                                                <span class="date_span" style="width: 347px;">
                                                                    <input type="date" class="xDateContainer date_first_input"
                                                                           onchange="setCorrect(this,'uploaded_date');"><input type="text" id="uploaded_date" name="uploaded_date"
                                                                           value="{{ $data->uploaded_date }}" value="dd-mm-yyyy"
                                                                                                                       class="date_second_input"
                                                                                                                       tabindex="-1"><span
                                                                        class="date_second_span" tabindex="-1">&#9660;</span>
                                                                </span>
                                                            </div>
                                                        </div>


                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label for="uploaded_document" class="col-sm-4 col-form-label">Version</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control" id="doc_version"
                                                                       name="doc_version" value="{{ $data->doc_version }}">
                                                                @error('doc_version')
                                                                <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="documents_type_id" class="col-sm-4 col-form-label">Type</label>
                                                            <div class="col-sm-8">
                                                                <select name="documents_type_id"
                                                                    class="form-control">
                                                                    <option value="">Select</option>
                                                                    @foreach($documents_type as $item)
                                                                        <option
                                                                            value="{{ $item->id }}" {{ $data->documents_type_id == $item->id ? 'selected' : '' }}>{{ $item->documents_type_name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="float-right mt-4">
                                                    <button type="submit"
                                                            class="btn btn-primary text-uppercase"><i
                                                            class="fas fa-save"></i> Update
                                                    </button>
                                                </div>


                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
        </section>
        <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->

@endsection




