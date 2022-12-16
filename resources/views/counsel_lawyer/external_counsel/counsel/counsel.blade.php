@extends('layouts.admin_layouts.admin_layout')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>External Counsel</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>

                            <li class="breadcrumb-item active">external Counsel </li>
                        </ol>
                    </div>
                </div>
            </div>
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
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title"> List </h3>
                                    <div>
                                        <a href="{{ route('counsel-chamber') }}" class="btn {{Route::currentRouteName() === 'counsel-chamber' ?'civil_active_btn':'civil_btn'}}" ><span>Chamber</span></a>   
                                        <a href="{{ route('counsel-company') }}" class="btn {{Route::currentRouteName() === 'counsel-company' ?'civil_active_btn':'civil_btn'}}" style="margin-left: 6px;" ><span>Company</span></a>
                                        <a href="{{ route('counsel') }}" class="btn {{Route::currentRouteName() === 'counsel' ?'civil_active_btn':'civil_btn'}}" style="margin-left: 6px;" ><span>All</span></a>
                                    </div>

                                    <div>
                                        @can('counsel-add')
                                        <a href="{{ route('add-counsel') }}"><button class="btn btn-success" style="padding: 3px 10px;"><i class="fas fa-plus"></i> Add</button></a>
                                        @endcan
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                           
                            <div class="card-body">
                                <table id="data_table" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th class="text-center"> Sl </th>
                                        <th class="text-center"> Name </th>
                                        <th class="text-center"> Role </th>
                                        <th class="text-center"> Chamber Joined </th>
                                        <th colspan="2"> Bar Council Enrollment </th>
                                        <th colspan="2"> High Court Enrollment </th>
                                        <th> Professional Contact Number </th>
                                        <th class="text-center"> Professional E-mail </th>
                                        <th class="text-center"> Status </th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="search_data">
                                    @foreach($data as $key=>$datum)
                                        <tr>
                                            <td>
                                                {{ $key+1 }}
                                            </td>
                                            <td>
                                                {{ $datum->professional_name }}
                                            </td>
                                            <td>
                                                {{ $datum->counsel_role_id }}
                                            </td>
                                            <td>
                                                {{ $datum->date_of_joining }}
                                            </td>
                                            <td>
                                                {{ $datum->bar_council_enrollment_date }}
                                            </td>
                                            <td>
                                                {{ $datum->bar_council_enrollment_sanad_no }}
                                            </td>
                                            <td>
                                                {{ $datum->high_court_enrollment_date }}
                                            </td>
                                            <td>
                                                {{ $datum->high_court_enrollment_membership_number }}
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
                                            </td>
                                            <td>
                                                @can('counsel-edit')
                                                <a href="{{ route('view-counsel',$datum->id) }}">
                                                    <button class="btn btn-outline-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Details"><i class="fas fa-eye"></i></button>
                                                </a>
                                                <a href="{{ route('edit-counsel',$datum->id) }}"><button class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Edit"
                                                    ><i class="fas fa-edit"></i></button></a>
                                                @endcan
                                                @can('counsel-delete')
                                                <form method="POST" action="{{ route('delete-counsel',$datum->id) }}" class="delete-user btn btn-danger btn-xs">
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

{{-- <script>
     $(document).ready(function(){
        alert("DFAsdfsdfa")
     })
</script> --}}


