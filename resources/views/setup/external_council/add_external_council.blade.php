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
                                <a class="leading-normal inline-flex items-center font-normal spark-button-focus h-8 text-md px-4 bg-transparent border-0 border-solid text-blue-700 hover:text-blue-800 active:text-blue-700 rounded-md" type="button" href="{{ route('external-council') }}" aria-disabled="false" role="link" tabindex="-1">Cancel</a>
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
                                <h3 class="card-title" id="heading">Add External Council</h3>
                            </div>

                            <form action="{{ route('save-external-council') }}" method="post">
                                @csrf
                                <div class="card-body">

                                    <div class="col-md-12">

                                    <div class="form-group">
                                        <label for="title_id"> Title </label>
                                        <select name="title_id" class="form-control select2" id="title_id">
                                                <option value="">Select</option>
                                            @foreach($person_title as $item)
                                                <option value="{{ $item->id }}">{{ $item->person_title_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                        <div class="form-group">
                                            <label for="first_name"> First Name </label>
                                            <input type="text" class="form-control" name="first_name"
                                                   id="first_name">
                                            @error('first_name')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="middle_name"> Middle Name</label>
                                            <input type="text" class="form-control" name="middle_name"
                                                   id="middle_name">
                                            @error('middle_name')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="last_name">Last Name</label>
                                            <input type="text" class="form-control" name="last_name"
                                                   id="last_name">
                                            @error('last_name')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email </label>
                                            <input type="text" class="form-control" name="email"
                                                   id="email">
                                            @error('email')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="work_phone">Work Phone</label>
                                            <input type="text" class="form-control" name="work_phone"
                                                   id="work_phone">
                                            @error('work_phone')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="home_phone">Home Phone</label>
                                            <input type="text" class="form-control" name="home_phone"
                                                   id="home_phone">
                                            @error('home_phone')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="mobile_phone">Mobile No.</label>
                                            <input type="text" class="form-control" name="mobile_phone"
                                                   id="mobile_phone">
                                            @error('mobile_phone')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="emergency_contact">Emergency Contact</label>
                                            <input type="text" class="form-control" name="emergency_contact"
                                                   id="emergency_contact">
                                            @error('emergency_contact')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>

                                        <!-- <div class="form-group">
                                            <label for="document_upload">License/Document</label>
                                            <input type="text" class="form-control" name="document_upload"
                                                   id="document_upload">
                                            @error('document_upload')<span class="text-danger">{{$message}}</span>@enderror
                                        </div> -->

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="document_upload">License/Document</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" name="file"
                                                                    id="profile-img">
                                                            <label class="custom-file-label" for="exampleInputFile">Choose
                                                                file</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="float-right">
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




