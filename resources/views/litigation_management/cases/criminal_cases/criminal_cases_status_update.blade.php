@extends('layouts.admin_layouts.admin_layout')
@section('content')



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Update Criminal Case Status</h1>

                    </div><!-- /.col -->



                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">
                                <a class="leading-normal inline-flex items-center font-normal spark-button-focus h-8 text-md px-4 bg-transparent border-0 border-solid text-blue-700 hover:text-blue-800 active:text-blue-700 rounded-md" type="button" href="{{ route('law') }}" aria-disabled="false" role="link" tabindex="-1">Back</a>
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

                            <div class="panel-body">
                                <div class="tab-content">
                                    <div id="home" class="tab-pane active">

                                        <div class="card-header">
                                            <h3 class="card-title" id="heading">Update Criminal Case
                                                Status</h3>

                                        </div>

                                        <form
                                            action="{{ route('update-criminal-cases-status-logs', $data->id) }}"
                                            method="post">
                                            @csrf
                                            <div class="card-body">

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label for="updated_case_status_id"
                                                                   class="col-md-4 col-form-label"> Status
                                                            </label>
                                                            <div class="col-md-8">
                                                                <div class="row" >
                                                                    <div class="col-md-6">
                                                                        <select name="updated_case_status_id"
                                                                                id="updated_case_status_id"
                                                                                class="form-control select2">
                                                                            <option value="">Select</option>
                                                                            @foreach($case_status as $item)
                                                                                <option
                                                                                    value="{{ $item->id }}" {{  $data->updated_case_status_id == $item->id ? 'selected' : '' }}>{{ $item->case_status_name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <input type="text" class="form-control"
                                                                               id="updated_case_status_write"
                                                                               name="updated_case_status_write"
                                                                               placeholder="Status"
                                                                               value="{{ $data->updated_case_status_write }}">
                                                                    </div>
                                                                </div>

                                                                @error('updated_case_status')<span
                                                                    class="text-danger">{{$message}}</span>@enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="updated_order_date"
                                                                   class="col-sm-4 col-form-label">
                                                                Order Date
                                                            </label>
                                                            <div class="col-sm-8">
                                                                <span class="date_span_status">
                                                                    <input type="date" class="xDateContainer date_first_input"
                                                                           onchange="setCorrect(this,'updated_order_date');"><input type="text" id="updated_order_date" name="updated_order_date" value="{{ $data->updated_order_date }}"
                                                                                                                        value="dd/mm/yyyy"
                                                                                                                       class="date_second_input"
                                                                                                                       tabindex="-1"><span
                                                                                                    class="date_second_span" tabindex="-1">&#9660;</span>
                                                                </span>
                                                                @error('updated_order_date')
                                                                <span
                                                                    class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="updated_fixed_for_id"
                                                                   class="col-md-4 col-form-label"> Fixed For
                                                            </label>
                                                            <div class="col-md-8">
                                                                <div class="row" >
                                                                    <div class="col-md-6">
                                                                        <select name="updated_fixed_for_id"
                                                                                id="updated_fixed_for_id"
                                                                                class="form-control select2">
                                                                            <option value="">Select</option>
                                                                            @foreach($next_date_reason as $item)
                                                                                <option
                                                                                    value="{{ $item->id }}" {{( $data->updated_fixed_for_id  == $item->id ? 'selected':'')}}>{{ $item->next_date_reason_name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <input type="text" class="form-control"
                                                                               id="updated_fixed_for_write"
                                                                               name="updated_fixed_for_write"
                                                                               placeholder="Fixed For"
                                                                               value="{{ $data->updated_fixed_for_write }}">
                                                                    </div>
                                                                </div>

                                                                @error('updated_fixed_for')<span
                                                                    class="text-danger">{{$message}}</span>@enderror
                                                            </div>
                                                        </div>



                                                        <div class="form-group row">
                                                            <label for="court_proceedings_id"
                                                                   class="col-md-4 col-form-label"> Court Proceeding
                                                            </label>
                                                            <div class="col-md-8">
                                                                <div class="row" >
                                                                    <div class="col-md-6">
                                                                    <select name="court_proceedings_id[]"
                                                                            id="court_proceedings_id"
                                                                            class="form-control select2" data-placeholder="Select" multiple>
                                                                        <option value="">Select</option>
                                                                        @foreach($court_proceeding as $item)
                                                                            <option
                                                                                value="{{ $item->court_proceeding_name }}" {{ in_array($item->court_proceeding_name, $court_proceeding_explode) ? 'selected' : ''  }}>{{ $item->court_proceeding_name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                    <input type="text" class="form-control"
                                                                           id="court_proceedings_write"
                                                                           name="court_proceedings_write"
                                                                           placeholder="Court Proceeding"
                                                                           value="{{ $data->court_proceedings_write }}">
                                                                    </div>
                                                                </div>

                                                                @error('court_proceedings')<span
                                                                    class="text-danger">{{$message}}</span>@enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="updated_court_order_id"
                                                                   class="col-md-4 col-form-label"> Court Order
                                                            </label>
                                                            <div class="col-md-8">
                                                                <div class="row" >
                                                                    <div class="col-md-6">
                                                                        <select name="updated_court_order_id[]"
                                                                                id="updated_court_order_id" 
                                                                                class="form-control select2" data-placeholder="Select" multiple>
                                                                            <option value="">Select</option>
                                                                            @foreach($last_court_order as $item)
                                                                                <option
                                                                                    value="{{ $item->court_last_order_name }}" {{ in_array($item->court_last_order_name, $updated_court_order_explode) ? 'selected' : ''}}>{{ $item->court_last_order_name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <input type="text" class="form-control"
                                                                               id="updated_court_order_write"
                                                                               placeholder="Court Order"
                                                                               name="updated_court_order_write" value="{{ $data->updated_court_order_write }}">

                                                                    </div>
                                                                </div>

                                                                @error('updated_court_order_write')<span
                                                                    class="text-danger">{{$message}}</span>@enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="updated_next_date"
                                                                   class="col-sm-4 col-form-label">
                                                                Next Date
                                                            </label>
                                                            <div class="col-sm-8">
                                                                <span class="date_span_status">
                                                                    <input type="date" class="xDateContainer date_first_input"
                                                                           onchange="setCorrect(this,'updated_next_date');"><input type="text" id="updated_next_date" name="updated_next_date"
                                                                                                                                    value="{{ $data->updated_next_date }}"
                                                                                                                                   class="date_second_input"
                                                                                                                                   tabindex="-1"><span
                                                                        class="date_second_span" tabindex="-1">&#9660;</span>
                                                                </span>
                                                                @error('updated_next_date')
                                                                <span
                                                                    class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label for="updated_index_fixed_for_id"
                                                                   class="col-md-4 col-form-label"> Fixed For
                                                            </label>
                                                            <div class="col-md-8">
                                                                        <select name="updated_index_fixed_for_id"
                                                                                id="updated_index_fixed_for_id"
                                                                                class="form-control select2">
                                                                            <option value="">Select</option>
                                                                            @foreach($next_date_reason as $item)
                                                                                <option
                                                                                    value="{{ $item->id }}" {{( $data->updated_index_fixed_for_id == $item->id ? 'selected':'')}}>{{ $item->next_date_reason_name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                @error('updatindex_ed_fixed_for')<span
                                                                    class="text-danger">{{$message}}</span>@enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="updated_day_notes_id"
                                                                   class="col-md-4 col-form-label"> Day Notes
                                                            </label>
                                                            <div class="col-md-8">
                                                                <div class="row" >
                                                                    <div class="col-md-6">
                                                                        <select name="updated_day_notes_id[]"
                                                                                id="updated_day_notes_id"
                                                                                class="form-control select2" data-placeholder="Select" multiple>
                                                                            <option value="">Select</option>
                                                                            @foreach($day_notes as $item)
                                                                                <option
                                                                                    value="{{ $item->day_notes_name }}" {{ in_array($item->day_notes_name, $updated_day_notes_explode) ? 'selected' : '' }}>{{ $item->day_notes_name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <input type="text" class="form-control"
                                                                               id="updated_day_notes_write"
                                                                               placeholder="Day Notes"
                                                                               name="updated_day_notes_write" value="{{ $data->updated_day_notes_write }}">
                                                                    </div>
                                                                </div>

                                                                @error('updated_day_notes_write')<span
                                                                    class="text-danger">{{$message}}</span>@enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="updated_engaged_advocate_id"
                                                                   class="col-md-4 col-form-label"> Engaged Advocate
                                                            </label>
                                                            <div class="col-md-8">
                                                                <div class="row" >
                                                                    <div class="col-md-6">
                                                                        <select name="updated_engaged_advocate_id"
                                                                                class="form-control select2"
                                                                        >
                                                                            <option value="">Select</option>
                                                                            {{-- @foreach ($exist_engaged_advocate as $item)
                                                                                <option
                                                                                    value="{{ $item->id }}"
                                                                                    {{ $data->updated_engaged_advocate_id == $item->id ? 'selected' : '' }}>
                                                                                    {{ $item->first_name }}
                                                                                    {{ $item->middle_name }}
                                                                                    {{ $item->last_name }}
                                                                                </option>
                                                                            @endforeach --}}
                                                                            @foreach ($exist_engaged_advocate_associates as $item)
                                                                                <option
                                                                                    value="{{ $item->id }}"
                                                                                    {{ $data->updated_engaged_advocate_id == $item->id ? 'selected' : '' }}>
                                                                                    {{ $item->first_name }}
                                                                                    {{ $item->middle_name }}
                                                                                    {{ $item->last_name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <input type="text" class="form-control"
                                                                               id="updated_engaged_advocate_write"
                                                                               placeholder="Engaged Advocate"
                                                                               name="updated_engaged_advocate_write" value="{{ $data->updated_engaged_advocate_write }}">
                                                                    </div>
                                                                </div>

                                                                @error('updated_engaged_advocate_write')<span
                                                                    class="text-danger">{{$message}}</span>@enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="updated_next_day_presence_id"
                                                                   class="col-sm-4 col-form-label">
                                                                Next Day Presence</label>
                                                            <div class="col-sm-8">
                                                                <select name="updated_next_day_presence_id"
                                                                        class="form-control select2">
                                                                    <option value="">Select</option>
                                                                    @foreach($next_day_presence as $item)
                                                                        <option
                                                                            value="{{ $item->id }}" {{($data->updated_next_day_presence_id == $item->id ? 'selected':'')}}>{{ $item->next_day_presence_name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('updated_next_day_presence_id')<span
                                                                    class="text-danger">{{$message}}</span>@enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="updated_remarks"
                                                                   class="col-sm-4 col-form-label"> Steps To be taken next date </label>
                                                            <div class="col-sm-8">
                                    <textarea name="updated_remarks" class="form-control"
                                              rows="3"
                                              placeholder="">{{ $data->updated_remarks }}</textarea>
                                                                @error('updated_remarks')<span
                                                                    class="text-danger">{{$message}}</span>@enderror
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="float-right mt-4">
                                                    <button type="submit"
                                                            class="btn btn-primary text-uppercase"><i
                                                            class="fas fa-save"></i> Update
                                                    </button>
                                                </div>


                                            </div>
                                        </form>

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




