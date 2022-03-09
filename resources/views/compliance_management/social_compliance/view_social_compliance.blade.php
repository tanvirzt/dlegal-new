@extends('layouts.admin_layouts.admin_layout')
@section('content')

<style>
    th {
        text-align: right;
        width:25%;
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
                        <h1 class="m-0 text-dark"> Social Compliance </h1>

                    </div><!-- /.col -->



                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">
                                <a class="leading-normal inline-flex items-center font-normal spark-button-focus h-8 text-md px-4 bg-transparent border-0 border-solid text-blue-700 hover:text-blue-800 active:text-blue-700 rounded-md" type="button" href="{{ route('social-compliance') }}" aria-disabled="false" role="link" tabindex="-1">Back</a>
                            </li>
                        </ol>
                    </div>


                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        


        <section class="content">
            <div class="container-fluid py-2">
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
                                <h3 class="card-title custom_h3" id="heading">Social Compliance Details</h3>
                                <div class="float-right">
                                    <a href="{{ route('edit-social-compliance', $data->id) }}"><button
                                        class="btn btn-info btn-sm" data-toggle="tooltip"
                                        data-placement="top" title="Edit"><i
                                            class="fas fa-edit"></i></button></a>

                                </div>
                            </div>
                                <div class="card-body">
                                    <table class="table table-hover table-bordered">
                                        <tbody>
                                            <tr>
                                                <th>Employment Condition</th>
                                                <td>{{ $data->employment_condition }}</td>
                                                <th>BNBC Safety</th>
                                                <td>{{ $data->bnbc_safety }}</td>
                                            </tr>
                                            <tr>
                                                <th>Working Hour & Leave</th>
                                                <td>{{ $data->working_hour_leave }}</td>
                                                <th>Fire Safety</th>
                                                <td>{{ $data->fire_safety }}</td>
                                            </tr>
                                            <tr>
                                                <th>Compensation & Benefit</th>
                                                <td>{{ $data->compensation_benefit }}</td>
                                                <th>Electrical Safety</th>
                                                <td>{{ $data->electrical_safety }}</td>
                                            </tr>
                                            <tr>
                                                <th>Hygine and Safety</th>
                                                <td>{{ $data->hygine_safety }}</td>
                                                <th>Natural Disaster</th>
                                                <td>{{ $data->natural_disaster }}</td>
                                            </tr>
                                            <tr>
                                                <th>Welfare & Security</th>
                                                <td>{{ $data->welfare_security }}</td>
                                                <th>Code of Conduct</th>
                                                <td>{{ $data->code_of_conduct }}</td>
                                            </tr>
                                            <tr>
                                                <th>Industrial Relation</th>
                                                <td>{{ $data->industrial_relation }}</td>
                                                <th>International Standard</th>
                                                <td>{{ $data->international_standard }}</td>
                                            </tr>
                                            <tr>
                                                <th>Labour Law Safety</th>
                                                <td>{{ $data->labour_law_safety }}</td>

                                            </tr>



                                        </tbody>
                                    </table>               
                                </div>

                        </div>
                    </div>

                </div>
        </section>
    </div>
    <!-- /.content-wrapper -->

@endsection




