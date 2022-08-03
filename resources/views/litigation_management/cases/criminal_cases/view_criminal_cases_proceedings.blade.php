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
                                            <h3 class="card-title" id="heading">Criminal Cases Proceedings</h3>

                                        </div>

                                        <div class="card-body">
                                            <table class="table table-hover table-bordered">
                                                <tbody>

                                                    <tr>
                                                        <th>Status </th>
                                                        <td>{{ $case_logs->case_status_name }} {{ $case_logs->updated_case_status_write }}</td>
                                                        <th>Day Notes</th>
                                                        <td>
                                                            @php
                                                                $notes = explode(', ', $case_logs->updated_day_notes_id);
                                                            @endphp

                                                            @if ($case_logs->updated_day_notes_id)
                                                                @foreach ($notes as $item)
                                                                    <li class="text-left">{{ $item }}</li>
                                                                @endforeach
                                                            @endif

                                                        {{ $case_logs->updated_day_notes_write }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Case/Order Date</th>
                                                        <td>{{ $case_logs->updated_order_date }} </td>
                                                        <th>Engaged Advocate</th>
                                                        <td>
                                                            @php
                                                                $engaged = explode(', ', $case_logs->updated_engaged_advocate_id);
                                                            @endphp

                                                            @if ($case_logs->updated_engaged_advocate_id)
                                                                @foreach ($engaged as $item)
                                                                @php
                                                                    $name = App\Models\SetupExternalCouncil::where('id',$item)->first();
                                                                @endphp
                                                                    <li class="text-left">{{  $name->first_name.' '.$name->last_name }}</li>
                                                                @endforeach
                                                            @endif 

                                                        {{ $case_logs->updated_engaged_advocate_write }} 
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Fixed For </th>
                                                        <td>{{ $case_logs->next_date_reason_name }} </td>
                                                        <th>Next Day Presence</th>
                                                        <td>{{ $case_logs->next_day_presence_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Court Proceeding </th>
                                                        <td>
                                                            @php
                                                                $court_proceedings = explode(', ', $case_logs->court_proceedings_id);
                                                            @endphp

                                                            @if ($case_logs->court_proceedings_id)
                                                                @foreach ($court_proceedings as $item)
                                                                    <li class="text-left">{{ $item }}</li>
                                                                @endforeach
                                                            @endif
                                                            {{ $case_logs->court_proceedings_write }} </td>
                                                        <th>Steps to be taken next date </th>
                                                        <td>
                                                            {{ $case_logs->updated_remarks }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Court Order </th>
                                                        <td>
                                                            @php
                                                                $court_order = explode(', ', $case_logs->updated_court_order_id);
                                                            @endphp

                                                            @if ($case_logs->updated_court_order_id)
                                                                @foreach ($court_order as $item)
                                                                    <li class="text-left">{{ $item }}</li>
                                                                @endforeach
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Next Date </th>
                                                        <td>{{ $case_logs->updated_next_date }}  </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Next Date Fixed For </th>
                                                        <td>{{ $case_logs->index_next_date_reason_name }}  </td>
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




