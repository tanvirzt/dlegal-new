@extends('layouts.admin_layouts.admin_layout')
@section('content')



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Schedule Details</h1>

                    </div><!-- /.col -->



                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
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
                                <h3 class="card-title" id="heading">Schedule Details</h3>
                            </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-10 mx-auto">
                                            <div class="form-group">
                                                <label class="form-label">Schedule Category</label>
                                                <select name="schedule_category_id" class="select2 form-control" disabled>
                                                    <option value="">Select Schedule Category</option>
                                                    @foreach ($categories as $category)
                                                    <option value="{{$category->id}}" {{$data->schedule_category_id == $category->id ? 'selected' : false}}>{{$category->category_name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('schedule_category_id')<span class="text-danger">{{$message}}</span>@enderror
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label">Schedule Title</label>
                                                <input type="text" class="form-control" placeholder="Enter title" name="title" value="{{old('title',$data->title)}}" readonly>
                                                @error('title')<span class="text-danger">{{$message}}</span>@enderror
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label">Note</label>
                                                <textarea name="note" rows="2" class="form-control" placeholder="Enter note" readonly>{{old('note',$data->note)}}</textarea>
                                                @error('note')<span class="text-danger">{{$message}}</span>@enderror
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label">Date</label>
                                                <input type="datetime-local" class="form-control" name="date" value="{{old('date',$data->date)}}" readonly>
                                                @error('date')<span class="text-danger">{{$message}}</span>@enderror
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label">Priority</label>
                                                <select name="priority" class="select2 form-control" disabled>
                                                    <option value="">Select Priority</option>
                                                    <option value="Law" {{$data->priority == 'Law' ? 'selected' : false}}>Law</option>
                                                    <option value="Medium" {{$data->priority == 'Medium' ? 'selected' : false}}>Medium</option>
                                                    <option value="High" {{$data->priority == 'High' ? 'selected' : false}}>High</option>
                                                </select>
                                                @error('priority')<span class="text-danger">{{$message}}</span>@enderror
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label">Details</label>
                                                <textarea name="details" rows="4" class="form-control" placeholder="Enter details" readonly>{{old('details',$data->details)}}</textarea>
                                                @error('details')<span class="text-danger">{{$message}}</span>@enderror
                                            </div>
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




