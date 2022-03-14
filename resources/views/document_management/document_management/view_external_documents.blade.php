@extends('layouts.admin_layouts.admin_layout')
@section('content')

<style>
    th {
        text-align: right;
        width:25%;
    }
    td{
        width:25%;
    }
</style>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark"> External Documents </h1>

                    </div><!-- /.col -->



                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">
                                <a class="leading-normal inline-flex items-center font-normal spark-button-focus h-8 text-md px-4 bg-transparent border-0 border-solid text-blue-700 hover:text-blue-800 active:text-blue-700 rounded-md" type="button" href="{{ route('civil-cases') }}" aria-disabled="false" role="link" tabindex="-1">Back</a>
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
                                    <h3 class="card-title custom_h3" id="heading">View Documents Of this Case</h3>
                                </div>
                                <div class="card-body">
                                    <table id="data_table" class="table dataTable no-footer dtr-inline">
                                        <thead>
                                            <tr>
                                                <th class="table_text_center">File Name</th>
                                                <th class="table_text_center">Uploaded Document</th>
                                                <th class="table_text_center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($external_document as $files)
                                            <tr>
                                                <td class="table_text_center">
                                                    {{ $files->file_name }}
                                                </td>
                                                <td class="table_text_center">
                                                    {{ $files->uploaded_document }}
                                                </td>
                                                <td class="table_text_center">
                                                        
                                                        <a href="{{ route('download-external-files', $files->id) }}"><button
                                                            class="btn btn-outline-success btn-sm" data-toggle="tooltip"
                                                            data-placement="top" title="Download"><i class="fas fa-download"></i></button></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>

                </div>
        </section>
    </div>
    <!-- /.content-wrapper -->

@endsection




