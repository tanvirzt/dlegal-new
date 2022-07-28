@extends('layouts.admin_layouts.admin_layout')
@section('content')



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Document Uploaded</h1>

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
            <div class="card">

                <a class="text-center mb-2" href="{{ route('download-criminal-cases-files', $file->id) }}">
                    <button
                        class="btn btn-outline-success btn-sm float-right" data-toggle="tooltip"
                        data-placement="top" title="Download"><i class="fas fa-download"></i> Download</button>
                </a>
                @if ($doc_explode[1] == 'png' || $doc_explode[1] == 'jpeg' || $doc_explode[1] == 'jpg' || $doc_explode[1] == 'gif')
                    <img src="{{asset('files/criminal_cases/'.$file->uploaded_document)}}"/>
                @elseif ($doc_explode[1] == 'pdf' )
                    <iframe src="{{asset('files/criminal_cases/'.$file->uploaded_document)}}" frameborder="0" style="width:100%;min-height:640px;"></iframe>
                @elseif ($doc_explode[1] == 'doc' ||  $doc_explode[1] == 'docx')
                    <iframe src="https://view.officeapps.live.com/op/view.aspx?src={{url("http://www.dlegal.info/dev/public/files/criminal_cases/".$file->uploaded_document)}}" frameborder="0" style="width: 100%; min-height: 842px;"></iframe>
                @endif


                {{-- @if(upload is image)
                    <img src="{{image url}}"/>
                @elseif(upload is pdf)
                    <iframe src="{{pdf url}}" frameborder="0" style="width:100%;min-height:640px;"></iframe>
                @elseif(upload is document)
                    <iframe src="https://view.officeapps.live.com/op/view.aspx?src={{urlendoe(doc url)}}" frameborder="0" style="width:100%;min-height:640px;"></iframe>
                @else
                //manage things here
                @endif --}}
            </div>
                
        </section>
        <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->

@endsection




