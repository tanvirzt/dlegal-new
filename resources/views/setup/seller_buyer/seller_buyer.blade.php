@extends('layouts.admin_layouts.admin_layout')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> Seller / Buyer </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>

                            <li class="breadcrumb-item active"> Seller / Buyer </li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        @if(Session::has('success'))
                            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                                {{Session::get('success')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> List </h3>
                                <div class="float-right">
                                    <a href="{{ route('add-seller-buyer') }}"><button class="btn btn-sm
                                    btn-success add_btn"><i class="fas fa-plus"></i> Add Seller / Buyer </button></a>
                                </div>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="data_table" class="table dataTable no-footer dtr-inline">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th> Name </th>
                                        <th> Email </th>
                                        <th> Work Phone </th>
                                        <th> Mobile No. </th>
                                        <th> Image </th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $datum)

                                        <tr>
                                            <td>
                                                {{ $datum->id }}
                                            </td>
                                            <td>
                                                {{ $datum->seller_buyer_name }}
                                            </td>
                                            <td>
                                                {{ $datum->email }}
                                            </td>
                                            <td>
                                                {{ $datum->work_phone }}
                                            </td>
                                            <td>
                                                {{ $datum->home_phone }}
                                            </td>
                                            <td>
                                                @if ($datum->image)
                                                    <img src="{{ asset('files/seller_buyer/'.$datum->image) }}" style="max-height: 50px; max-width:50px;">
                                                @else
                                                    
                                                @endif

                                            </td>
                                            <td>
                                                @if($datum->delete_status == 0)
                                                    Active
                                                @else

                                                    Inactive
                                                @endif
                                            </td>
                                            <td>
                                                
                                                <a href="{{ route('edit-seller-buyer',$datum->id) }}"><button class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Edit"
                                                    ><i class="fas fa-edit"></i></button></a>
                                                <form method="POST" action="{{ route('delete-seller-buyer',$datum->id) }}" class="delete-user btn btn-danger btn-xs">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i> </button>     
                                                </form>


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

