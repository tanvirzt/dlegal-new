@extends('layouts.admin_layouts.admin_layout')
@section('content')


<style type="text/css">
.card-title{
    color: #0CA2A3 !important;
    font-weight: bold;
    font-size: 24px;
    text-decoration: underline;
}
.select2-container{
    width: 100% !important;
}
</style>
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
                                <h3 class="card-title" id="heading">Schedule Details</h3>
                            </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12 mx-auto" style="padding:0 20px;">
                                            <div class="form-group">
                                                <label class="form-label col-form-label">Schedule Category</label>
                                                <select name="schedule_category_id" class="select2 form-control theme-input-style" disabled>
                                                    <option value="">Select Schedule Category</option>
                                                    @foreach ($categories as $category)
                                                    <option value="{{$category->id}}" {{$data->schedule_category_id == $category->id ? 'selected' : false}}>{{$category->category_name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('schedule_category_id')<span class="text-danger">{{$message}}</span>@enderror
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label col-form-label">Meeting Type</label>
                                                <select name="meeting_type" class="select2 form-control theme-input-style" disabled>
                                                    <option value="Call" {{$data->meeting_type == 'Call' ? 'selected' : ''}}>Call</option>
                                                    <option value="Meeting" {{$data->meeting_type == 'Meeting' ? 'selected' : ''}}>Meeting</option>
                                                    <option value="Visit" {{$data->meeting_type == 'Visit' ? 'selected' : ''}}>Visit</option>
                                                </select>
                                                @error('meeting_type')<span class="text-danger">{{$message}}</span>@enderror
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label">Schedule Title</label>
                                                <input type="text" class="form-control theme-input-style" placeholder="Enter title" name="title" value="{{old('title',$data->title)}}" readonly>
                                                @error('title')<span class="text-danger">{{$message}}</span>@enderror
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label col-form-label">Note</label>
                                                <textarea name="note" rows="2" class="form-control theme-input-style" placeholder="Enter note" readonly>{{old('note',$data->note)}}</textarea>
                                                @error('note')<span class="text-danger">{{$message}}</span>@enderror
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label col-form-label">Date</label>
                                                <input type="datetime-local" class="form-control theme-input-style" name="date" value="{{old('date',$data->date)}}" readonly>
                                                @error('date')<span class="text-danger">{{$message}}</span>@enderror
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label col-form-label">Place</label>
                                                <input type="text" class="form-control theme-input-style" placeholder="Place" name="place" value="{{old('place',$data->place)}}" readonly>
                                                @error('place')<span class="text-danger">{{$message}}</span>@enderror
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label col-form-label">Assign</label>
                                                <select name="assign_id" class="select2 form-control theme-input-style" disabled>
                                                    <option value="">Select</option>
                                                    @foreach ($counsels as $counsel)

                                                    <option value="{{$counsel->id}}"
                                                     {{ $counsel->id == $data->assign_id ? 'selected' : false
                                                     }} >{{$counsel->counsel_name}}</option>

                                                    @endforeach
                                                </select>
                                                @error('assign_id')<span class="text-danger">{{$message}}</span>@enderror
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label col-form-label">Service Type</label>
                                                <select name="service_type" class="select2 form-control theme-input-style" disabled>
                                                    <option value="Litigation" selected>Litigation</option>
                                                </select>
                                                @error('service_type')<span class="text-danger">{{$message}}</span>@enderror
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label col-form-label">Service</label>
                                                <select name="service_id" class="select2 form-control theme-input-style" disabled>
                                                    <option value="">Select</option>
                                                    @foreach ($services as $service)
                                                    <option value="{{$service->id}}" {{$service->id == $data->service_id ? 'selected' : false}}> {{$service->case_no}} </option>
                                                    @endforeach
                                                </select>
                                                @error('service_id')<span class="text-danger">{{$message}}</span>@enderror
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label col-form-label">Details</label>
                                                <textarea name="details" rows="4" class="form-control theme-input-style" placeholder="Enter details" readonly>{{old('details',$data->details)}}</textarea>
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




