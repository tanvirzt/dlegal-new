@extends('layouts.admin_layouts.admin_layout')
@section('content')


<style>
    th {
        text-align: right;
        width:25%;
        background: none;
    }
    td{
        width:25%;
    }
</style>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Criminal Cases</h1>
                    </div>
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
                                            <h3 class="card-title" id="heading">Criminal Cases Activities</h3>

                                        </div>

                                        <div class="card-body">
                                            <table class="table table-hover table-bordered">
                                                <tbody>

                                                    <tr>
                                                        <th>Date </th>
                                                        <td>{{ date('d-m-Y', strtotime($activity_log->activity_date)) }} </td>
                                                        <th>Engaged</th>
                                                        <td>
                                                            @php
                                                            $engaged = explode(', ', $activity_log->activity_engaged_id);
                                                        @endphp

                                                        @if ($activity_log->activity_engaged_id)
                                                            @foreach ($engaged as $item)
                                                                <li class="text-left">{{ $item }}</li>
                                                            @endforeach
                                                        @endif

                                                        {{ $activity_log->activity_engaged_write }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Activity/Action</th>
                                                        <td>{{ $activity_log->activity_action }} </td>
                                                        <th>Forwarded To</th>
                                                        <td>
                                                            @php
                                                            $forwarded = explode(', ', $activity_log->activity_forwarded_to_id);
                                                        @endphp

                                                        @if ($activity_log->activity_forwarded_to_id)
                                                            @foreach ($forwarded as $item)
                                                            @php
                                                                $name = App\Models\SetupExternalCouncil::where('id',$item)->first();
                                                            @endphp
                                                                <li class="text-left">{{  $name->first_name.' '.$name->last_name }}</li>
                                                            @endforeach
                                                        @endif 

                                                        {{ $activity_log->activity_forwarded_to_write }} 
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Progress </th>
                                                        <td>{{ $activity_log->activity_progress }} </td>
                                                        <th>Remarks </th>
                                                        <td>
                                                            {{ $activity_log->activity_remarks }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Mode </th>
                                                        <td>{{ $activity_log->mode_name }} {{ $activity_log->activity_mode_write }} </td>
                                                        <th>Requirements</th>
                                                        <td>{{ $activity_log->activity_requirements }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Time Spent </th>
                                                        <td>{{ $activity_log->total_time }}  </td>
                                                    </tr>
                                                
                                                </tbody>
                                            </table>
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




