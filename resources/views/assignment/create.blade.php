@extends('layouts.admin_layouts.admin_layout')
@section('content')

 <style type="text/css">
    .card-title, .content-header h1{
        color: #0CA2A3 !important;
        font-weight: bold;
        font-size: 18px;
    }
</style>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Create Assignment</h1>

                    </div><!-- /.col -->



                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">
                                <a class="leading-normal inline-flex items-center font-normal spark-button-focus h-8 text-md px-4 bg-transparent border-0 border-solid text-blue-700 hover:text-blue-800 active:text-blue-700 rounded-md" type="button" href="{{ route('assignment.index') }}" aria-disabled="false" role="link" tabindex="-1">Back</a>
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
                
                <div class="col-md-12" style="padding: 0 20px;">
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
                                <h3 class="card-title" id="heading">Create Assignment</h3>
                            </div>

                            <form action="{{ route('assignment.store') }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12 mx-auto">
                                            <div class="form-group">
                                                <label class="form-label col-form-label">Assignment Category</label>
                                                <select name="assignment_category_id" class="select2 form-control theme-input-style">
                                                    <option value="">Select Assignment Category</option>
                                                    @foreach ($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('assignment_category_id')<span class="text-danger">{{$message}}</span>@enderror
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label col-form-label">Assignment Title</label>
                                                <input type="text" class="form-control theme-input-style" placeholder="Enter title" name="title" value="{{old('title')}}">
                                                @error('title')<span class="text-danger">{{$message}}</span>@enderror
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label col-form-label">Note</label>
                                                <textarea name="note" rows="2" class="form-control theme-input-style" placeholder="Enter note">{{old('note')}}</textarea>
                                                @error('note')<span class="text-danger">{{$message}}</span>@enderror
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label col-form-label">Date</label>
                                                <input type="datetime-local" class="form-control theme-input-style" name="date" value="{{old('date')}}">
                                                @error('date')<span class="text-danger">{{$message}}</span>@enderror
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label col-form-label">Assign</label>
                                                <select name="assign_id" class="select2 form-control theme-input-style">
                                                    <option value="">Select</option>
                                                    @foreach ($counsels as $counsel)
                                                    <option value="{{$counsel->id}}">{{$counsel->counsel_name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('assign_id')<span class="text-danger">{{$message}}</span>@enderror
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label col-form-label">Service Type</label>
                                                <select name="service_type" class="select2 form-control theme-input-style">
                                                    <option value="Litigation" selected>Litigation</option>
                                                </select>
                                                @error('service_type')<span class="text-danger">{{$message}}</span>@enderror
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label col-form-label">Service</label>
                                                <select name="service_id" class="select2 form-control theme-input-style">
                                                    <option value="">Select</option>
                                                    @foreach ($services as $service)
                                                    <option value="{{$service->id}}">{{$service->case_infos_case_no}} / {{$service->case_infos_case_year}}</option>
                                                    @endforeach
                                                </select>
                                                @error('service_id')<span class="text-danger">{{$message}}</span>@enderror
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label col-form-label">Details</label>
                                                <textarea name="details" rows="4" class="form-control theme-input-style" placeholder="Enter details">{{old('note')}}</textarea>
                                                @error('details')<span class="text-danger">{{$message}}</span>@enderror
                                            </div>

                                            
                                            <div class="float-right form-group">
                                                <button type="submit" class="btn btn-primary text-uppercase submitForm"><i class="fas fa-save"></i> Save</button>
                                            </div>
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




