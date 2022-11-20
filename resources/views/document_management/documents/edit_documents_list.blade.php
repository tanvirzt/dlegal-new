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

                            <form action="{{ route('update-documents-list', $data->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">

                                            
                                            <div class="form-group row external_file_name">
                                                <label for="folder_name" class="col-sm-4 col-form-label">Folder Name</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="folder_name" name="folder_name" value="{{ $data->folder_name }}">
                                                    @error('folder_name')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row external_file_name">
                                                <label for="file_document_name" class="col-sm-4 col-form-label">File Name</label>
                                                <div class="col-sm-8">
                                                    <input type="file" class="form-control" id="file_document_name" name="file_document_name" value="{{old('file_document_name')}}">
                                                    @error('file_document_name')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>

                                        

                                            <div class="float-right mt-4">
                                                <button type="submit" class="btn btn-primary text-uppercase"><i
                                                        class="fas fa-save"></i> Update</button>
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
