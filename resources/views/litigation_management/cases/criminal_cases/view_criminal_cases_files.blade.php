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
                        class="btn btn-outline-success btn-sm" data-toggle="tooltip"
                        data-placement="top" title="Download"><i class="fas fa-download"></i> Download</button>
                </a>
                @if ($doc_explode[1] == 'png' )
                    <img src="{{asset('files/criminal_cases/'.$file->uploaded_document)}}"/>
                @elseif ($doc_explode[1] == 'pdf' )
                    <iframe src="{{asset('files/criminal_cases/'.$file->uploaded_document)}}" frameborder="0" style="width:100%;min-height:640px;"></iframe>
                @elseif ($doc_explode[1] == 'doc' ||  $doc_explode[1] == 'docx')
                <iframe src="https://view.officeapps.live.com/op/view.aspx?src={{url("https://file-examples.com/wp-content/uploads/2017/02/file-sample_100kB.doc")}}" frameborder="0" style="width: 62%; min-height: 562px;"></iframe>
                {{-- <iframe src='https://view.officeapps.live.com/op/embed.aspx?src=http://localhost/dlegal-software/public/admin/files/criminal_cases/{{ $file->uploaded_document }}' width='100%' height='100%' frameborder='0'>This is an embedded <a target='_blank' href='http://office.com'>Microsoft Office</a> document, powered by <a target='_blank' href='http://office.com/webapps'>Office Online</a>.</iframe> --}}
                {{-- <iframe src='https://view.officeapps.live.com/op/embed.aspx?src=http%3A%2F%2Fieee802%2Eorg%3A80%2Fsecmail%2FdocIZSEwEqHFr%2Edoc' width='100%' height='100%' frameborder='0'>This is an embedded <a target='_blank' href='http://office.com'>Microsoft Office</a> document, powered by <a target='_blank' href='http://office.com/webapps'>Office Online</a>.</iframe> --}}
                {{-- <iframe src='https://view.officeapps.live.com/op/embed.aspx?src={{ asset('files/criminal_cases/'.$file->uploaded_document) }}' width='1366px' height='623px' frameborder='0'>This is an embedded <a target='_blank' href='http://office.com'>Microsoft Office</a> document, powered by <a target='_blank' href='http://office.com/webapps'>Office Online</a>.</iframe> --}}
                {{-- <iframe src="https://view.officeapps.live.com/op/view.aspx?src={{ asset('files/criminal_cases/'.$file->uploaded_document) }}" frameborder="0" style="width: 62%; min-height: 562px;"></iframe> --}}
                    {{-- <iframe src="https://view.officeapps.live.com/op/view.aspx?src={{asset('files/criminal_cases/'.$file->uploaded_document)}}" frameborder="0" style="width:100%;min-height:640px;"></iframe> --}}
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




