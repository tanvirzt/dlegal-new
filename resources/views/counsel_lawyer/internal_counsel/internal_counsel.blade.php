@extends('layouts.admin_layouts.admin_layout')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> Internal Counsel </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>

                            <li class="breadcrumb-item active"> Internal Counsel </li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @if(Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                        {{Session::get('success')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="row">

                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> List </h3>
                                <div class="float-right">
                                    @can('internal-council-create')
                                    <a href="{{ route('add-internal-counsel') }}"><button class="btn btn-sm
                                    btn-success add_btn"><i class="fas fa-plus"></i> Add Internal Counsel </button></a>
                                    @endcan
                                </div>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered table-striped data_table">
                                    <thead>
                                    <tr>
                                        <th class="text-center"> Sl </th>
                                        <th class="text-center"> Name </th>
                                        <th class="text-center"> Role </th>
                                        <th class="text-center"> Chamber Joined </th>
                                        <th class="text-nowrap"> Bar Council Enrollment </th>
                                        <th class="text-nowrap"> High Court Enrollment </th>
                                        <th class="text-nowrap"> Professional Contact Number </th>
                                        <th class="text-center"> Professional E-mail </th>
                                        <th class="text-center"> Status </th>
                                        <th width="13%">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="search_data">
                                    @foreach($data as $key=>$datum)
                                        <tr>
                                            <td>
                                                {{ $key+1 }}
                                            </td>
                                            <td>
                                                {{ $datum->internal_counsel_name }}
                                            </td>
                                            <td>
                                                {{ $datum->internal_counsel_role_id }}
                                            </td>
                                            <td>
                                                {{ $datum->date_of_joining }}
                                            </td>
                                            <td>
                                                {{ $datum->bar_council_enrollment_date }} {{ $datum->bar_council_enrollment_sanad_no }}
                                            </td>
                                            <td>
                                                {{ $datum->high_court_enrollment_date }} {{ $datum->high_court_enrollment_membership_number }}
                                            </td>
                                            <td>
                                                {{ $datum->professional_contact_number }} {{ $datum->professional_contact_number_write }}
                                            </td>
                                            <td>
                                                {{ $datum->professional_email }} {{ $datum->professional_email_write }}
                                            </td>
                                            <td>
                                                @if ($datum->delete_status == 0)
                                                    <button type="button"
                                                        class="btn-custom btn-success-custom text-uppercase"> Active
                                                    </button>
                                                @else
                                                    <button type="button"
                                                        class="btn-custom btn-warning-custom text-uppercase">Inactive</button>
                                                @endif
                                                </span>
                                            </td>
                                            <td>
                                            {{-- <a href="{{ route('view-internal-counsel',$datum->id) }}"><button class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Details"
                                                ><i class="fas fa-eye"></i></button></a>
                                             --}}
                                                @can('internal-council-edit')
                                                <a href="{{ route('edit-internal-counsel',$datum->id) }}"><button class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Edit"
                                                ><i class="fas fa-edit"></i></button></a>
                                                @endcan
                                                @can('internal-counsel-delete')
                                                <form method="POST" action="{{ route('delete-internal-counsel',$datum->id) }}" class="delete-user btn btn-danger btn-xs">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i> </button>
                                                </form>
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection

