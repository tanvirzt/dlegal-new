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
                        <h1 class="m-0 text-dark"> Flat Information </h1>

                    </div><!-- /.col -->



                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">
                                <a class="leading-normal inline-flex items-center font-normal spark-button-focus h-8 text-md px-4 bg-transparent border-0 border-solid text-blue-700 hover:text-blue-800 active:text-blue-700 rounded-md" type="button" href="{{ route('flat-information') }}" aria-disabled="false" role="link" tabindex="-1">Back</a>
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
                                <h3 class="card-title custom_h3" id="heading">Flat Information Details</h3>
                                <div class="float-right">
                                    <a href="{{ route('edit-flat-information', $data->id) }}"><button
                                        class="btn btn-info btn-sm" data-toggle="tooltip"
                                        data-placement="top" title="Edit"><i
                                            class="fas fa-edit"></i></button></a>

                                </div>
                            </div>
                                <div class="card-body">
                                    <table class="table table-responsive table-hover table-bordered">
                                        <tbody>
                                            <tr>
                                                <th>Property Type</th>
                                                <td>{{ $data->property_type_name }}</td>
                                                <th>Any Dispute</th>
                                                <td>{{ $data->any_dispute }}</td>
                                            </tr>
                                            <tr>
                                                <th>District</th>
                                                <td>{{ $data->district_name }}</td>
                                                <th>Any Suit/Case</th>
                                                <td>{{ $data->any_suit_case }}</td>
                                            </tr>
                                            <tr>
                                                <th>Thana</th>
                                                <td>{{ $data->thana_name }}</td>
                                                <th>Name of Owner of the Flat</th>
                                                <td>{{ $data->flat_owner }}</td>
                                            </tr>
                                            <tr>
                                                <th>Seller Name</th>
                                                <td>{{ $data->seller_name }}</td>
                                                <th>Mouza Name</th>
                                                <td>{{ $data->mouza_name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Buyer Name</th>
                                                <td>{{ $data->buyer_name }}</td>
                                                <th>Mutation Khatian No.</th>
                                                <td>{{ $data->mutation_khatian_no }}</td>
                                            </tr>
                                            <tr>
                                                <th>CS Khatian</th>
                                                <td>{{ $data->cs_khatian }}</td>
                                                <th>Mutation Case No.</th>
                                                <td>{{ $data->mutation_case_no }}</td>
                                            </tr>
                                            <tr>
                                                <th>CS Dag</th>
                                                <td>{{ $data->cs_dag }}</td>
                                                <th>Mutation Khatian Owner(Previous Owner)</th>
                                                <td>{{ $data->mutation_khatian_owner }}</td>
                                            </tr>
                                            <tr>
                                                <th>SA Khatian</th>
                                                <td>{{ $data->sa_khatian }}</td>
                                                <th>DCR Number</th>
                                                <td>{{ $data->dcr_number }}</td>
                                            </tr>
                                            <tr>
                                                <th>SA Dag</th>
                                                <td>{{ $data->sa_dag }}</td>
                                                <th>DCR Date</th>
                                                <td>{{ $data->dcr_date }}</td>
                                            </tr>
                                            <tr>
                                                <th>RS Khatian</th>
                                                <td>{{ $data->rs_khatian }}</td>
                                                <th>Name of Register Office</th>
                                                <td>{{ $data->register_office_name }}</td>
                                            </tr>
                                            <tr>
                                                <th>RS Dag</th>
                                                <td>{{ $data->rs_dag }}</td>
                                                <th>Floor Number</th>
                                                <td>{{ $data->floor_name }}</td>
                                            </tr>
                                            <tr>
                                                <th>BS Khatian</th>
                                                <td>{{ $data->bs_khatian }}</td>
                                                <th>Flat Number</th>
                                                <td>{{ $data->flat_number }}</td>
                                            </tr>
                                            <tr>
                                                <th>BS Dag</th>
                                                <td>{{ $data->bs_dag }}</td>
                                                <th>Flat Size (in Square Feet)</th>
                                                <td>{{ $data->flat_size }}</td>
                                            </tr>
                                            <tr>
                                                <th>Khatian & Dag City Jorip</th>
                                                <td>{{ $data->khatian_dag_city_jorip }}</td>
                                                <th>Flat Compliance</th>
                                                <td>{{ $data->flat_compliance }}</td>
                                            </tr>
                                            <tr>
                                                <th>Flat Area (in Decimal)</th>
                                                <td>{{ $data->flat_area }}</td>
                                                <th>Electricity</th>
                                                <td>{{ $data->electricity }}</td>
                                            </tr>
                                            <tr>
                                                <th>Deed No.</th>
                                                <td>{{ $data->deed_no }}</td>
                                                <th>Gas</th>
                                                <td>{{ $data->gas }}</td>
                                            </tr>
                                            <tr>
                                                <th>Date of Deed</th>
                                                <td>{{ $data->date_of_deed }}</td>
                                                <th>Sewerage</th>
                                                <td>{{ $data->sewerage }}</td>
                                            </tr>
                                            <tr>
                                                <th>Deed Value</th>
                                                <td>{{ $data->deed_value }}</td>
                                                <th>Water</th>
                                                <td>{{ $data->water }}</td>
                                            </tr>
                                            <tr>
                                                <th>Possession</th>
                                                <td>{{ $data->possession }}</td>
                                                <th>Expires</th>
                                                <td>{{ $data->expires }}</td>
                                            </tr>
                                            <tr>
                                                <th>Boundary Wall</th>
                                                <td>{{ $data->boundary_wall }}</td>
                                                <th>Renew</th>
                                                <td>{{ $data->renew }}</td>
                                            </tr>
                                            
                                            
                                            
                                        </tbody>
                                    </table>               
                                </div>
                                <div class="card-header">
                                    <h3 class="card-title custom_h3" id="heading">Flat Information Files</h3>
                                </div>
                                <div class="card-body">
                                    <table id="data_table" class="table dataTable no-footer dtr-inline">
                                        <thead>
                                            <tr>
                                                <th class="table_text_center">Uploaded Document</th>
                                                <th class="table_text_center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($flat_information_files as $files)
                                            <tr>
                                                <td class="table_text_center">
                                                    {{ $files->uploaded_document }}
                                                </td>
                                                <td class="table_text_center">
                                                        <a href="{{ route('download-flat-information-files', $files->id) }}"><button
                                                            class="btn btn-outline-success btn-sm" data-toggle="tooltip"
                                                            data-placement="top" title="Download"><i class="fas fa-download"></i></button></a>

                                                </td>
                                            </tr>
                                        @endforeach
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




