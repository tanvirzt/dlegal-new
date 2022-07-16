@extends('layouts.admin_layouts.admin_layout')
@section('content')



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Update Criminal Case Activity</h1>

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
                                    <div id="activities" class="tab-pane active">

                                        <div class="card-header">
                                            <h3 class="card-title" id="heading">Update Activities</h3>

                                        </div>

                                        <form
                                            action="{{ route('update-criminal-cases-activity-logs', $data->id) }}"
                                            method="post">
                                            @csrf
                                            <div class="card-body">
                                                <input type="hidden" name="case_no" value="{{ $activity_data->case_infos_case_no ? $activity_data->case_infos_case_title_name.' '.$activity_data->case_infos_case_no.' of '.$activity_data->case_infos_case_year : '' }}@if ($activity_data->sub_seq_case_title_name != null),
                                                @endif
                                                {{ $activity_data->sub_seq_case_title_name }}
                                                @php
                                                    $case_infos_sub_seq_case_no = explode(', ',trim($activity_data->case_infos_sub_seq_case_no));
                                                    $key = array_key_last($case_infos_sub_seq_case_no);
                                                    echo $case_infos_sub_seq_case_no[$key];
                        
                                                    $case_infos_sub_seq_case_year = explode(', ',trim($activity_data->case_infos_sub_seq_case_year));
                                                    $key = array_key_last($case_infos_sub_seq_case_year);
                                                    $last_case_no = $case_infos_sub_seq_case_year[$key];
                                                    if ($last_case_no != null) {
                                                        echo '/'.$last_case_no;
                                                    }
                                                @endphp">
                                                <div class="row">
                                                    <div class="col-md-6">

                                                        <div class="form-group row">
                                                            <label for="activity_date"
                                                                   class="col-sm-4 col-form-label"> Date
                                                            </label>
                                                            <div class="col-sm-8">
                                                                <span class="date_span_status">
                                                                    <input type="date" class="xDateContainer date_first_input"
                                                                           onchange="setCorrect(this,'activity_date');"><input type="text" id="activity_date" name="activity_date"
                                                                                                                        value="{{ date('d/m/Y', strtotime($data->activity_date)) }}"
                                                                                                                       class="date_second_input"
                                                                                                                       tabindex="-1"><span
                                                                                                    class="date_second_span" tabindex="-1">&#9660;</span>
                                                                </span>

                                                                @error('activity_date')
                                                                <span
                                                                    class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="activity_action"
                                                                   class="col-sm-4 col-form-label"> Activity/Action </label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control"
                                                                       id="activity_action" name="activity_action" value="{{ $data->activity_action }}">
                                                                @error('activity_action')
                                                                <span
                                                                    class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="activity_progress"
                                                                   class="col-sm-4 col-form-label">Progress</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control"
                                                                       id="activity_progress" name="activity_progress" value="{{ $data->activity_progress }}">
                                                                @error('activity_progress')
                                                                <span
                                                                    class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="activity_mode_id"
                                                                   class="col-md-4 col-form-label"> Mode
                                                            </label>
                                                            <div class="col-md-8">
                                                                <div class="row" >
                                                                    <div class="col-md-6">
                                                                        <select name="activity_mode_id"
                                                                                class="form-control select2"
                                                                        >
                                                                            <option value="">Select</option>
                                                                            @foreach ($mode as $item)
                                                                                <option
                                                                                    value="{{ $item->id }}"
                                                                                    {{ $data->activity_mode_id == $item->id ? 'selected' : '' }}>
                                                                                    {{ $item->mode_name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <input type="text" class="form-control"
                                                                               id="activity_mode_write"
                                                                               placeholder="Day Notes"
                                                                               name="activity_mode_write" value="{{ $data->activity_mode_write }}">
                                                                    </div>
                                                                </div>

                                                                @error('activity_mode_write')<span
                                                                    class="text-danger">{{$message}}</span>@enderror
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-md-6">

                                                        <div class="form-group row">
                                                            <label for="start_time"
                                                                   class="col-sm-4 col-form-label">Start Time</label>
                                                            <div class="col-sm-8">
                                                                <input type="datetime-local" class="form-control"
                                                                       id="start_time" name="start_time" value="{{ $data->start_time }}">
                                                                @error('start_time')
                                                                <span
                                                                    class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="end_time"
                                                                   class="col-sm-4 col-form-label">End Time</label>
                                                            <div class="col-sm-8">
                                                                <input type="datetime-local" class="form-control"
                                                                       id="end_time" name="end_time" value="{{ $data->end_time }}">
                                                                @error('end_time')
                                                                <span
                                                                    class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="setup_hours"
                                                                   class="col-sm-4 col-form-label">Time Spent</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control"
                                                                       id="setup_hours" name="setup_hours" value="{{ $data->total_time }}" readonly>
                                                                @error('setup_hours')
                                                                <span
                                                                    class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="activity_engaged_id"
                                                                   class="col-md-4 col-form-label"> Engaged
                                                            </label>
                                                            <div class="col-md-8">
                                                                <div class="row" >
                                                                    <div class="col-md-6">
                                                                        <select name="activity_engaged_id[]" class="form-control select2" data-placeholder="Select" multiple>
                                                                            <option value="">Select</option>
                                                                            {{-- @foreach ($exist_engaged_advocate as $item)
                                                                                <option
                                                                                    value="{{ $item->first_name.' '.$item->middle_name.' '.$item->last_name}}"
                                                                                    {{ old('activity_engaged_id') == $item->id ? 'selected' : '' }}>
                                                                                    {{ $item->first_name }}
                                                                                    {{ $item->middle_name }}
                                                                                    {{ $item->last_name }}
                                                                                </option>
                                                                            @endforeach --}}
                                                                            @foreach ($external_council as $item)
                                                                                <option
                                                                                    value="{{ $item->first_name.' '.$item->last_name }}"
                                                                                    {{ in_array($item->first_name.' '.$item->last_name, $exist_engaged_advocate_associates_explode) ? 'selected' : '' }}>
                                                                                    {{ $item->first_name }}
                                                                                    {{ $item->last_name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <input type="text" class="form-control"
                                                                               id="activity_engaged_write"
                                                                               placeholder="Activity Engaged"
                                                                               name="activity_engaged_write" value="{{ $data->activity_engaged_write }}">
                                                                    </div>
                                                                </div>

                                                                @error('activity_mode_write')<span
                                                                    class="text-danger">{{$message}}</span>@enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="activity_forwarded_to_id"
                                                                   class="col-md-4 col-form-label"> Forwarded To
                                                            </label>
                                                            <div class="col-md-8">
                                                                <div class="row" >
                                                                    <div class="col-md-6">
                                                                        <select name="activity_forwarded_to_id"
                                                                                class="form-control select2"
                                                                        >
                                                                            <option value="">Select</option>
                                                                            @foreach ($external_council as $item)
                                                                                <option
                                                                                    value="{{  $item->id }}"
                                                                                    {{ $data->activity_forwarded_to_id == $item->id ? 'selected' : '' }}>
                                                                                    {{ $item->first_name }}
                                                                                    {{ $item->last_name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <input type="text" class="form-control"
                                                                               id="activity_forwarded_to_write"
                                                                               placeholder="Forwarded To"
                                                                               name="activity_forwarded_to_write" value="{{ $data->activity_forwarded_to_write }}">
                                                                    </div>
                                                                </div>

                                                                @error('activity_forwarded_to_write')<span
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




