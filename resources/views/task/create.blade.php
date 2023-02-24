@extends('layouts.admin_layouts.admin_layout')
@section('content')



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Create Task</h1>

                    </div><!-- /.col -->



                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">
                                <a class="leading-normal inline-flex items-center font-normal spark-button-focus h-8 text-md px-4 bg-transparent border-0 border-solid text-blue-700 hover:text-blue-800 active:text-blue-700 rounded-md" type="button" href="{{ route('task.index') }}" aria-disabled="false" role="link" tabindex="-1">Back</a>
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
                                <h3 class="card-title" style="color: #0CA2A3; font-weight: bold; font-size: 18px;text-decoration: underline;" id="heading">Create Task</h3>
                            </div>

                            <form action="{{ route('task.store') }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12 mx-auto" style="padding-left:20px; padding-right:20px;">
                                            <div class="form-group">
                                                <label class="form-label col-form-label">Task Category</label>
                                                <select name="task_category_id" class="select2 form-control theme-input-style">
                                                    <option value="">Select Task Category</option>
                                                    @foreach ($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('task_category_id')<span class="text-danger">{{$message}}</span>@enderror
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label col-form-label">Task Title</label>
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
                                                <label class="form-label col-form-label">Priority</label>
                                                <select name="priority" class="select2 form-control theme-input-style">
                                                    <option value="">Select Priority</option>
                                                    <option value="Law">Law</option>
                                                    <option value="Medium">Medium</option>
                                                    <option value="High">High</option>
                                                </select>
                                                @error('priority')<span class="text-danger">{{$message}}</span>@enderror
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




