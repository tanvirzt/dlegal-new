@extends('layouts.admin_layouts.admin_layout')
@section('content')
@php
if (empty($case_cat)) {
    $case_cat = '';
}
@endphp
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> All Cases </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>

                            <li class="breadcrumb-item active"> All Cases</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                        {{ Session::get('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if (Session::has('error'))
                    <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                        {{ Session::get('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                      
                        </div>
                    </div>

                    <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row ">
                                        <div class="col-md-12 list-title">
                                            <img src="{{ asset('login_assets/img/all-cases-icon.png') }}" width="40px" style="display:block !important; float:left; margin-right: 15px; margin-top: 5px;" />General Litigation Service
                                        </div>
                                        <div class="col-sm-10 tab-btn">
                                            <a href="#" class="btn {{ $case_cat == 'all' ? 'civil_active_btn' : 'civil_btn' }}" style="margin-left: 6px;" ><span>All</span></a>
                                            <a href="#" class="btn {{ $case_cat == 'Civil' ? 'civil_active_btn' : 'civil_btn' }}" ><span>Dreafting</span></a>
                                            <a href="#" class="btn {{ $case_cat == 'Criminal' ? 'civil_active_btn' : 'civil_btn' }}" style="margin-left: 6px;" ><span>vetting</span></a>
                                            <a href="#" class="btn {{ $case_cat == 'Criminal' ? 'civil_active_btn' : 'civil_btn' }}" style="margin-left: 6px;" ><span>Legal Openion</span></a>
                                            <a href="#" class="btn {{ $case_cat == 'Criminal' ? 'civil_active_btn' : 'civil_btn' }}" style="margin-left: 6px;" ><span>Legal Consaltation</span></a>
                                            <a href="#" class="btn {{ $case_cat == 'Criminal' ? 'civil_active_btn' : 'civil_btn' }}" style="margin-left: 6px;" ><span>vetting</span></a>

                                        </div>
                                        {{-- <div class="col-sm-1">
                                        </div> --}}
                                        <div class="col-sm-2">
                                            <div class="float-right">
                                                @can('criminal-cases-create')
                                                    <a href="{{ route('legal.service') }}">
                                                        <button type="button" class="btn btn-success" style="padding: 5px 70px; font-size:18px; background: #0CA2A3; border: 1px solid #0CA2A3;">ADD</button>
                                                    </a>
                                                @endcan
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                <table id="all-cases-dt" class="all-cases-dt table table-bordered table-striped">

                                        <thead>
                                            <tr>
                                                <th class="text-center"> Sl</th>
                                                <th class="text-center"> ID</th>
                                                <!--<th class="text-center"> Status</th>-->
                                                <th class="text-center"> Progress Status</th>
                                                <th class="text-center"> Service Received</th>
                                                <th class="text-center"> Service Timeline</th>
                                                <th class="text-center widthCust"> Service Completed </th>
                                                <th class="text-center"> Service Delivered </th>
                                                <th class="text-center"> Delivered Mode</th>
                                                <th class="text-center"> Service  Category</th>
                                                <th class="text-center"> Service Type</th>
                                                <th class="text-center"> District (P-2)</th>
                                                <th class="text-center"> Matter</th>
                                                <th class="text-center"> Lawyer</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center" style="width: 15%;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="search_data">
                                            @foreach ($data as $key => $datum)
                                                <tr>
                                                    <td>
                                                        {{ $key + 1 }}
                                                    </td>

                                                    <td>
                                                        {{ $datum->created_case_id }}
                                                    </td>
                                                    <!--<td>
                                                        @if (Is_numeric($datum->case_status_id))
                                                            {{ $datum->case_status_name }}
                                                        @else
                                                            {{ $datum->case_status_id }}
                                                        @endif
                                                    </td>-->
                                                    <td width="8%">
                                                        @if (!empty($datum->next_date) && $datum->next_date < date('Y-m-d'))
                                                            <span
                                                                style="font-size:11.5px;">{{ date('d-m-Y', strtotime($datum->next_date)) }}</span>
                                                        @elseif(!empty($datum->next_date))
                                                            {{ date('d-m-Y', strtotime($datum->next_date)) }}
                                                        @else
                                                            <button type='button'
                                                                class='btn-custom btn-danger-custom-next-date text-uppercase'>Not Upd</button>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{ $datum->next_date_reason_name }}
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('view-criminal-cases', $datum->id) }}">
                                                            {{ $datum->case_infos_case_no ? $datum->case_title_name . ' ' . $datum->case_infos_case_no . '/' . $datum->case_infos_case_year : '' }}
                                                        </a>
                                                    </td>
                                                    <td>
                                                        {{ $datum->sub_seq_case_title_name }}
                                                        @php
                                                            $case_infos_sub_seq_case_no = explode(', ', trim($datum->case_infos_sub_seq_case_no));
                                                            $key = array_key_last($case_infos_sub_seq_case_no);
                                                            echo $case_infos_sub_seq_case_no[$key];

                                                            $case_infos_sub_seq_case_year = explode(', ', trim($datum->case_infos_sub_seq_case_year));
                                                            $key = array_key_last($case_infos_sub_seq_case_year);
                                                            $last_case_no = $case_infos_sub_seq_case_year[$key];
                                                            if ($last_case_no != null) {
                                                                echo '/' . $last_case_no;
                                                            }
                                                        @endphp
                                                    </td>
                                                    <td>


                                                        @if (!empty($datum->case_infos_sub_seq_court_short_id) || !empty($datum->sub_seq_court_short_write))
                                                            @php
                                                                $notes = explode(', ', $datum->case_infos_sub_seq_court_short_id);
                                                            @endphp
                                                            @if ($datum->case_infos_sub_seq_court_short_id)
                                                                @if (count($notes) > 1)
                                                                    @foreach ($notes as $pro)
                                                                        <li class="text-left">{{ $pro }}</li>
                                                                    @endforeach
                                                                @else
                                                                    @foreach ($notes as $pro)
                                                                        {{ $pro }}
                                                                    @endforeach
                                                                @endif
                                                            @endif
                                                            @php
                                                                $notes = explode(', ', $datum->sub_seq_court_short_write);
                                                            @endphp
                                                            @if ($datum->sub_seq_court_short_write)
                                                                @if (count($notes) > 1)
                                                                    @foreach ($notes as $pro)
                                                                        <li class="text-left">{{ $pro }}</li>
                                                                    @endforeach
                                                                @else
                                                                    @foreach ($notes as $pro)
                                                                        {{ $pro }}
                                                                    @endforeach
                                                                @endif
                                                            @endif
                                                        @else
                                                            @php
                                                                $notes = explode(', ', $datum->case_infos_court_short_id);
                                                            @endphp
                                                            @if ($datum->case_infos_court_short_id)
                                                                @if (count($notes) > 1)
                                                                    @foreach ($notes as $pro)
                                                                        <li class="text-left">{{ $pro }}</li>
                                                                    @endforeach
                                                                @else
                                                                    @foreach ($notes as $pro)
                                                                        {{ $pro }}
                                                                    @endforeach
                                                                @endif
                                                            @endif
                                                            @php
                                                                $notes = explode(', ', $datum->court_short_write);
                                                            @endphp
                                                            @if ($datum->court_short_write)
                                                                @if (count($notes) > 1)
                                                                    @foreach ($notes as $pro)
                                                                        <li class="text-left">{{ $pro }}</li>
                                                                    @endforeach
                                                                @else
                                                                    @foreach ($notes as $pro)
                                                                        {{ $pro }}
                                                                    @endforeach
                                                                @endif
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{ $datum->district_name }}
                                                    </td>
                                                    <td>
                                                        @php
                                                            $notes = explode(', ', $datum->case_infos_complainant_informant_name);
                                                        @endphp
                                                        @if ($datum->case_infos_complainant_informant_name)
                                                            @if (count($notes) > 1)
                                                                @foreach ($notes as $pro)
                                                                    <li class="text-left">{{ $pro }}</li>
                                                                @endforeach
                                                            @else
                                                                @foreach ($notes as $pro)
                                                                    {{ $pro }}
                                                                @endforeach
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @php
                                                            $accused = explode(', ', $datum->case_infos_accused_name);
                                                        @endphp
                                                        @if ($datum->case_infos_accused_name)
                                                            @if (count($accused) > 1)
                                                                @foreach ($accused as $item)
                                                                    <li class="text-left">{{ $item }}</li>
                                                                @endforeach
                                                            @else
                                                                @foreach ($accused as $item)
                                                                    {{ $item }}
                                                                @endforeach
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{ $datum->accused_district_name }}
                                                    </td>
                                                    <td>
                                                        {{ $datum->matter_name }} {{ $datum->matter_write }}
                                                    </td>
                                                    <td>
                                                        {{ $datum->first_name }} {{ $datum->last_name }}
                                                        {{ $datum->lawyer_advocate_write }}
                                                    </td>
                                                    <td>
                                                        @if ($datum->delete_status == 0)
                                                            <button type="button"
                                                                class="btn-custom btn-success-custom text-uppercase">
                                                                ACTIVE
                                                            </button>
                                                        @else
                                                            <button type="button"
                                                                class="btn-custom btn-warning-custom text-uppercase">INACTIVE
                                                            </button>
                                                        @endif
                                                    </td>
                                                    <td class="actionBtn">
                                                        @can('criminal-cases-edit')
                                                            <a href="{{ route('view-criminal-cases', $datum->id) }}">
                                                                <button class="btn btn-outline-info btn-sm" type="button"
                                                                    data-toggle="tooltip" data-placement="top"
                                                                    title="Details">View</button>
                                                            </a>
                                                        @endcan
                                                        @can('criminal-cases-edit')
                                                            <a href="{{ route('view-criminal-cases', $datum->id) }}#section1">
                                                                <button class="btn btn-outline-primary btn-sm" type="button"
                                                                    data-toggle="tooltip" data-placement="top"
                                                                    title="Proceedings">Log</button>
                                                            </a>
                                                        @endcan
                                                        {{-- @can('criminal-cases-add-billing')
                                                            <a href="{{ route('add-criminal-cases-billling', $datum->id) }}">
                                                                <button type="button" class="btn btn-outline-warning btn-sm"
                                                                    data-toggle="tooltip" data-placement="top"
                                                                    title="Bill Entry"><i
                                                                        class="fas fa-money-bill"></i></button>
                                                            </a>
                                                        @endcan --}}
                                                        {{-- @can('criminal-cases-edit')
                                                            <a href="{{ route('edit-criminal-cases', $datum->id) }}">
                                                                <button type="button" class="btn btn-outline-info btn-sm"
                                                                    data-toggle="tooltip" data-placement="top"
                                                                    title="Edit"><i class="fas fa-edit"></i></button>
                                                            </a>
                                                        @endcan --}}
                                                        @can('criminal-cases-delete')
                                                            {{-- <a href="{{ route('delete-criminal-cases-latest', $datum->id) }}">
                                                                <button type="button" class="btn btn-outline-danger btn-sm"
                                                                    data-toggle="tooltip" data-placement="top"
                                                                    title="Edit"><i class="fas fa-trash"></i></button>
                                                            </a> --}}

                                                            {{-- {{ Form::open(array('method' => 'post', 'route' => array('delete-criminal-cases', $datum->id), 'class' => 'delete-form')) }}
                                                    {{ Form::submit('Delete', array('class' => 'btn btn-danger', 'role' => 'button')) }}
                                                {{ Form::close() }} --}}

                                                            <form method="POST" action="{{ route('delete-criminal-cases',$datum->id) }}" class="delete-user btn btn-outline-danger btn-xs">
                                                                @csrf
                                                                <button type="submit" class="btn btn-outline-danger btn-sm" style="line-height: 1.4"
                                                                        data-toggle="tooltip" data-placement="top"
                                                                        title="Delete">Remove</button>
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