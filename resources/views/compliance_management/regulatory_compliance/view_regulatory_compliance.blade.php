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
                        <h1 class="m-0 text-dark"> Regulatory Compliance </h1>

                    </div><!-- /.col -->



                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">
                                <a class="leading-normal inline-flex items-center font-normal spark-button-focus h-8 text-md px-4 bg-transparent border-0 border-solid text-blue-700 hover:text-blue-800 active:text-blue-700 rounded-md" type="button" href="{{ route('regulatory-compliance') }}" aria-disabled="false" role="link" tabindex="-1">Back</a>
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
                                <h3 class="card-title custom_h3" id="heading">Regulatory Compliance Details</h3>
                                <div class="float-right">
                                    <a href="{{ route('edit-regulatory-compliance', $data->id) }}"><button
                                        class="btn btn-info btn-sm" data-toggle="tooltip"
                                        data-placement="top" title="Edit"><i
                                            class="fas fa-edit"></i></button></a>


                                    {{-- <a class="btn btn-info"
                                        href="{{ route('edit-regulatory-compliance', $data->id) }}"> Edit </a> --}}
                                </div>
                            </div>
                                <div class="card-body">
                                    <table class="table table-responsive table-hover table-bordered">
                                        <tbody>
                                            <tr>
                                                <th>Property Type</th>
                                                <td>{{ $data->certificates_name }}</td>
                                                <th>Boundary Wall</th>
                                                <td>{{ $data->govt_getting_cl_first_date }}</td>
                                            </tr>
                                            <tr>
                                                <th>District</th>
                                                <td>{{ $data->compliance_category_name }}</td>
                                                <th>Any Dispute</th>
                                                <td>{{ $data->govt_getting_cl_first_date }}</td>
                                            </tr>
                                            <tr>
                                                <th>Thana</th>
                                                <td>{{ $data->certificates_authority }}</td>
                                                <th>Any Suit/Case</th>
                                                <td>{{ $data->govt_renew }}</td>
                                            </tr>
                                            <tr>
                                                <th>Seller Name</th>
                                                <td>{{ $data->certificates_ministry }}</td>
                                                <th>Name of Owner of the Property</th>
                                                <td>{{ $data->govt_special_provision }}</td>
                                            </tr>
                                            <tr>
                                                <th>Buyer Name</th>
                                                <td>{{ $data->certificates_getting_cl_first_date }}</td>
                                                <th>Mouza Name</th>
                                                <td>{{ $data->govt_special_remarks }}</td>
                                            </tr>
                                            <tr>
                                                <th>CS Khatian</th>
                                                <td>{{ $data->certificates_expires }}</td>
                                                <th>Mutation Khatian No.</th>
                                                <td>{{ $data->utility_electricity }}</td>
                                            </tr>
                                            <tr>
                                                <th>CS Dag</th>
                                                <td>{{ $data->certificates_renew }}</td>
                                                <th>Mutation Case No.</th>
                                                <td>{{ $data->utility_gas }}</td>
                                            </tr>
                                            <tr>
                                                <th>SA Khatian</th>
                                                <td>{{ $data->certificates_special_provision }}</td>
                                                <th>Mutation Khatian Owner(Previous Owner) </th>
                                                <td>{{ $data->utility_sewerage }}</td>
                                            </tr>
                                            <tr>
                                                <th>SA Dag</th>
                                                <td>{{ $data->certificates_special_remarks }}</td>
                                                <th>DCR Number</th>
                                                <td>{{ $data->utility_water }}</td>
                                            </tr>
                                            <tr>
                                                <th>RS Khatian</th>
                                                <td>{{ $data->govt_authority }}</td>
                                                <th>DCR Date</th>
                                                <td>{{ $data->utility_expires }}</td>
                                            </tr>
                                            <tr>
                                                <th>RS Dag</th>
                                                <td>{{ $data->govt_ministry_dept }}</td>
                                                <th>Name of Register Office</th>
                                                <td>{{ $data->utility_renew }}</td>
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




