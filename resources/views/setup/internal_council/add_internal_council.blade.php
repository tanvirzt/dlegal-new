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
                                <a class="leading-normal inline-flex items-center font-normal spark-button-focus h-8 text-md px-4 bg-transparent border-0 border-solid text-blue-700 hover:text-blue-800 active:text-blue-700 rounded-md" type="button" href="{{ route('internal-council') }}" aria-disabled="false" role="link" tabindex="-1">Cancel</a>
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
                                <h3 class="card-title" id="heading">Add Internal Council</h3>
                            </div>

                            <form action="{{ route('save-internal-council') }}" enctype="multipart/form-data" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="title_id" class="col-sm-4 col-form-label">Title</label>
                                                <div class="col-sm-8">
                                                        <select name="title_id" class="form-control select2" id="title_id">
                                                            <option value="">Select</option>
                                                            @foreach($person_title as $item)
                                                                <option value="{{ $item->id }}" {{(old('title_id') == $item->id?'selected':'')}}>{{ $item->person_title_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('title_id')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="first_name" class="col-sm-4 col-form-label">First Name</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="first_name" name="first_name" value="{{old('first_name')}}">
                                                    @error('first_name')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="middle_name" class="col-sm-4 col-form-label">Middle Name</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="middle_name" name="middle_name"  value="{{old('middle_name')}}">
                                                    @error('middle_name')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="last_name" class="col-sm-4 col-form-label">Last Name</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="last_name" name="last_name" value="{{old('last_name')}}">
                                                    @error('last_name')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="email" class="col-sm-4 col-form-label">Email</label>
                                                <div class="col-sm-8">
                                                    <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}">
                                                    @error('email')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="work_phone" class="col-sm-4 col-form-label">Work Phone</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="work_phone" name="work_phone" value="{{old('work_phone')}}">
                                                    @error('work_phone')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="home_phone" class="col-sm-4 col-form-label">Home Phone</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="home_phone" name="home_phone" value="{{old('home_phone')}}">
                                                    @error('home_phone')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="mobile_phone" class="col-sm-4 col-form-label">Mobile No.</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="mobile_phone" name="mobile_phone" value="{{old('mobile_phone')}}">
                                                    @error('mobile_phone')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="emergency_contact" class="col-sm-4 col-form-label">Emergency Contact</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="emergency_contact" name="emergency_contact" value="{{old('emergency_contact')}}">
                                                    @error('emergency_contact')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
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
                                        </div>
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




