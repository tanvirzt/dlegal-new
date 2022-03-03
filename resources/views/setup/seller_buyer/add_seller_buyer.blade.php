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
                                <a class="leading-normal inline-flex items-center font-normal spark-button-focus h-8 text-md px-4 bg-transparent border-0 border-solid text-blue-700 hover:text-blue-800 active:text-blue-700 rounded-md" type="button" href="{{ route('seller-buyer') }}" aria-disabled="false" role="link" tabindex="-1">Back</a>
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
                                <h3 class="card-title" id="heading">Add Seller Buyer</h3>
                            </div>

                            <form action="{{ route('save-seller-buyer') }}" enctype="multipart/form-data" method="post">
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
                                            <div class="form-group row">
                                                <label for="seller_or_buyer" class="col-sm-4 col-form-label">Seller / Buyer</label>
                                                <div class="col-sm-8">
                                                        <select name="seller_or_buyer" class="form-control select2" id="seller_or_buyer">
                                                            <option value="">Select</option>
                                                            <option value="Seller">Seller</option>
                                                            <option value="Buyer">Buyer</option>
                                                        </select>
                                                        @error('seller_or_buyer')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="seller_buyer_name" class="col-sm-4 col-form-label"> Name </label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="seller_buyer_name" name="seller_buyer_name" value="{{old('seller_buyer_name')}}">
                                                    @error('seller_buyer_name')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="email" class="col-sm-4 col-form-label">Email</label>
                                                <div class="col-sm-8">
                                                    <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}">
                                                    @error('email')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
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
                                            <div class="form-group row">
                                                <label for="mobile_phone" class="col-sm-4 col-form-label">Mobile No.</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="mobile_phone" name="mobile_phone" value="{{old('mobile_phone')}}">
                                                    @error('mobile_phone')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="address1" class="col-sm-4 col-form-label">Emergency Contact</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="address1" name="address1" value="{{old('address1')}}">
                                                    @error('address1')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="address2" class="col-sm-4 col-form-label">Emergency Contact</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="address2" name="address2" value="{{old('address2')}}">
                                                    @error('address2')<span class="text-danger">{{$message}}</span>@enderror
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




