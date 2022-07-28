@extends('layouts.admin_layouts.admin_layout')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark"> Criminal Cases </h1>
                    </div><!-- /.col -->

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">
                                <a  type="button" href="{{ route('criminal-cases') }}" aria-disabled="false"
                                    role="link" tabindex="-1">Back </a>
                            </li>
                        </ol>
                    </div>


                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <div class="links">
            <a href="#section1st" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top"
                title="Case Info"><i class="fas fa-info-circle"></i></a>
            <a href="#section1" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top"
                title="Case Proceedings Log"> <i class="fas fa-signal"></i> </a>
            <a href="#section2" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top"
                title="Activity Log"><i class="fas fa-chart-line"></i></a>
            <a href="#section3" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top"
                title="Documents Log"><i class="fas fa-file-archive nav-icon"></i></a>
            <a href="#section4" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top"
                title="Billings Log"><i class="fas fa-money-bill"></i></a>
        </div>

        <section class="content" id="section1st">
            <div class="container-fluid py-2">
                <div class="col-md-12">

                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                            {{ Session::get('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card">
                            <div class="card-header">

                                <style>
                                    .stick {
    position: fixed;
    top: 50px;
}
                                </style>


                                <div id="mainMenuBarAnchor"></div>
                                {{-- <div id="mainMenuBar" style="width: 100%; height: 30px; background: #999; margin: 0;">Sticky Panel</div> --}}
                                
                              









                                <h3 id="mainMenuBar" class="card-title custom_h3 font-italic text-uppercase font_weight"
                                    style="color: #FF7034;z-index:99">Criminal Case
                                    No.
                                    {{ $data->case_infos_case_no ? $data->case_infos_case_title_name . ' ' . $data->case_infos_case_no . ' of ' . $data->case_infos_case_year : '' }}
                                    @if ($data->sub_seq_case_title_name != null)
                                        ,
                                    @endif
                                    {{ $data->sub_seq_case_title_name }}
                                    @php
                                        $case_infos_sub_seq_case_no = explode(', ', trim($data->case_infos_sub_seq_case_no));
                                        $key = array_key_last($case_infos_sub_seq_case_no);
                                        echo $case_infos_sub_seq_case_no[$key];
                                        
                                        $case_infos_sub_seq_case_year = explode(', ', trim($data->case_infos_sub_seq_case_year));
                                        $key = array_key_last($case_infos_sub_seq_case_year);
                                        $last_case_no = $case_infos_sub_seq_case_year[$key];
                                        if ($last_case_no != null) {
                                            echo ' of ' . $last_case_no;
                                        }
                                    @endphp

                                </h3>
                                {{-- <h3 class="card-title custom_h3 font-italic text-uppercase font_weight header_links">
                                    Criminal Case
                                    No.
                                    {{ $data->case_infos_case_no ? $data->case_infos_case_title_name . ' ' . $data->case_infos_case_no . ' of ' . $data->case_infos_case_year : '' }}
                                    @if ($data->sub_seq_case_title_name != null)
                                        ,
                                    @endif
                                    {{ $data->sub_seq_case_title_name }}
                                    @php
                                        $case_infos_sub_seq_case_no = explode(', ', trim($data->case_infos_sub_seq_case_no));
                                        $key = array_key_last($case_infos_sub_seq_case_no);
                                        echo $case_infos_sub_seq_case_no[$key];
                                        
                                        $case_infos_sub_seq_case_year = explode(', ', trim($data->case_infos_sub_seq_case_year));
                                        $key = array_key_last($case_infos_sub_seq_case_year);
                                        $last_case_no = $case_infos_sub_seq_case_year[$key];
                                        if ($last_case_no != null) {
                                            echo ' of ' . $last_case_no;
                                        }
                                    @endphp

                                </h3> --}}
                                <div class="card-tools">
                                    
                                    
                                    <a href="{{ route('criminal-case-print-preview', $data->id) }}" target="_blank"
                                        class="btn btn-info btn-sm"><i class="fas fa-print"></i></a>
                                        {{-- <i class="far fa-bell"></i> --}}
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#modal-lg-send-messages" data-toggle="tooltip" data-placement="top"
                                        title="Send Messages"><i class="fas fa-bell"></i></button>

                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#modal-lg" data-toggle="tooltip" data-placement="top"
                                        title="Update Status"><i class="fas fa-signal"></i></button>


                                    <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal"
                                        data-target="#modal-lg-2" data-toggle="tooltip" data-placement="top"
                                        title="Update Activities"><i class="fas fa-chart-line"></i></button>


                                    <a href="{{ route('edit-criminal-cases', $data->id) }}">
                                        <button class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top"
                                            title="Edit"><i class="fas fa-edit"></i></button>
                                    </a>

                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-6">

                                        <div class="appeal_case_info">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h6 class="text-uppercase text-bold"><u> Primary Information </u>
                                                        <button type="button" class="btn btn-info btn-sm float-right"
                                                            data-toggle="modal" data-target="#modal-lg-basic-info"
                                                            data-toggle="tooltip" data-placement="top"
                                                            title="Update Basic Information"><i class="fas fa-edit"></i>
                                                        </button>
                                                        {{-- <a href="{{ route('update-criminal-cases-basic-info', $data->id) }}" class="float-right"><button class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Edit" --}}
                                                        {{-- ><i class="fas fa-edit"></i></button></a> --}}
                                                    </h6>
                                                    <table class="table table-bordered">

                                                        <tbody>
                                                            <tr>
                                                                <td width="50%">ID </td>
                                                                <td width="50%"> {{ $data->created_case_id }} </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Client Name</td>
                                                                <td> {{ $data->client }} </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Legal Issue</td>
                                                                <td>{{ $data->legal_issue_name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Legal Service</td>
                                                                <td>{{ $data->legal_service_name }}
                                                                    {{ $data->legal_service_write }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Complainant/Informant Name</td>
                                                                <td>{{ $data->complainant_name }}
                                                                    {{ $data->complainant_informant_write }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Accused Name</td>
                                                                <td>{{ $data->accused_name }}
                                                                    {{ $data->accused_write }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>In favour of</td>
                                                                <td> {{ $data->in_favour_of_name }} </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Case No.</td>
                                                                <td>{{ $data->case_no }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Name of the Court</td>
                                                                <td> {{ $data->court_name }} </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Next Date</td>
                                                                <td>
                                                                    @if (!empty($data->next_date))
                                                                        {{ date('d-m-Y', strtotime($data->next_date)) }}
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Next date fixed for</td>
                                                                <td> {{ $data->next_date_reason_name }} </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Received Date</td>
                                                                <td>{{ date('d-m-Y', strtotime($data->received_date)) }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Mode of Receipt</td>
                                                                <td>{{ $data->mode_name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Referrer Name</td>
                                                                <td>{{ $data->referrer_name }}
                                                                    {{ $data->referrer_write }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Referrer Details</td>
                                                                <td>{{ $data->referrer_details }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Received By</td>
                                                                <td>{{ $data->name }} {{ $data->received_by_write }}
                                                                </td>
                                                            </tr>


                                                        </tbody>
                                                    </table>

                                                    <h6 class="text-uppercase text-bold mt-3"><u> Case File Location </u>
                                                    </h6>
                                                    <table class="table table-bordered">
                                                        <tbody>
                                                            <tr>
                                                                <td width="50%">Cabinet Name</td>
                                                                <td width="50%">{{ $data->cabinet_name }} @if ($data->self_number)
                                                                        ({{ $data->self_number }})
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-body">
                                                    <h6 class="text-uppercase text-bold"><u> Client Information </u>
                                                        <button type="button" class="btn btn-info btn-sm float-right"
                                                            data-toggle="modal" data-target="#modal-lg-client-info"
                                                            data-toggle="tooltip" data-placement="top"
                                                            title="Update Primary Information"><i class="fas fa-edit"></i>
                                                        </button>
                                                    </h6>
                                                    <table class="table table-bordered">

                                                        <tbody>
                                                            <tr>
                                                                <td >Client(Which Party)</td>
                                                                <td colspan="2"> {{ $data->client_party_name }} </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Client Category</td>
                                                                <td colspan="2"> {{ $data->client_category_name }} </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Client Subcategory</td>
                                                                <td colspan="2">{{ $data->client_subcategory_name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Client Name</td>
                                                                <td colspan="2">
                                                                    @php
                                                                        $client_explode = explode(', ', $data->client_id);
                                                                    @endphp
                                                                    @if ($data->client_id)
                                                                        @if (count($client_explode) > 1)
                                                                            @foreach ($client_explode as $pro)
                                                                                <li class="text-left">{{ $pro }}
                                                                                </li>
                                                                            @endforeach
                                                                        @else
                                                                            @foreach ($client_explode as $pro)
                                                                                {{ $pro }}
                                                                            @endforeach
                                                                        @endif
                                                                    @endif

                                                                    @php
                                                                        $client_name_write = explode(', ', $data->client_name_write);
                                                                    @endphp
                                                                    @if ($data->client_name_write)
                                                                        @if (count($client_name_write) > 1)
                                                                            @foreach ($client_name_write as $pro)
                                                                                <li class="text-left">{{ $pro }}
                                                                                </li>
                                                                            @endforeach
                                                                        @else
                                                                            @foreach ($client_name_write as $pro)
                                                                                {{ $pro }}
                                                                            @endforeach
                                                                        @endif
                                                                    @endif

                                                            </tr>
                                                            <tr>
                                                                <td>Client Business Name</td>
                                                                <td colspan="2">{{ $data->client_business_name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Client Address</td>
                                                                <td colspan="2">{{ $data->client_address }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Client Mobile</td>
                                                                <td colspan="2">{{ $data->client_mobile }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Client Email</td>
                                                                <td colspan="2">{{ $data->client_email }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Profession/Type</td>
                                                                <td colspan="2">{{ $data->profession_name }}
                                                                    {{ $data->client_profession_write }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td width="50%">Division/Zone</td>
                                                                <td width="25%">{{ $data->client_division_name }} @if ($data->client_division_name && $data->client_divisoin_write) @endif 
                                                                    </td>
                                                                    <td width="25%">{{ $data->client_divisoin_write }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>District/Area</td>
                                                                <td>{{ $data->client_district_name }} @if ($data->client_district_name && $data->client_district_write) @endif 
                                                                    </td>
                                                                    <td>{{ $data->client_district_write }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Thana/Branch</td>
                                                                <td>{{ $data->client_thana_name }} @if ($data->client_thana_name && $data->client_thana_write) @endif 
                                                                    </td>
                                                                    <td>{{ $data->client_thana_write }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Representative Name</td>
                                                                <td colspan="2">{{ $data->client_representative_name }} </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Representative Details</td>
                                                                <td colspan="2">{{ $data->client_representative_details }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Coordinator/Tadbirkar</td>
                                                                <td colspan="2">{{ $data->coordinator_name }}
                                                                    {{ $data->coordinator_tadbirkar_write }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Coordinator Details</td>
                                                                <td colspan="2">{{ $data->client_coordinator_details }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="card">
                                                <div class="card-body">
                                                    <h6 class="text-uppercase text-bold"><u> OPPOSITE PARTY INFORMATION
                                                        </u>
                                                        <button type="button" class="btn btn-info btn-sm float-right"
                                                            data-toggle="modal" data-target="#modal-lg-opposition-info"
                                                            data-toggle="tooltip" data-placement="top"
                                                            title="Update Opposite Party Information"><i
                                                                class="fas fa-edit"></i>
                                                        </button>
                                                    </h6>
                                                    <table class="table table-bordered">

                                                        <tbody>
                                                            <tr>
                                                                <td>Opposition(Which Party)</td>
                                                                <td colspan="2"> {{ $data->oppsition_party_name }}
                                                                </td>
                                                                
                                                            </tr>
                                                            <tr>
                                                                <td>Opposition Category</td>
                                                                <td colspan="2"> {{ $data->opposition_category_name }} </td>
                                                                

                                                            </tr>
                                                            <tr>
                                                                <td>Opposition Subcategory</td>
                                                                <td colspan="2">{{ $data->opposition_subcategory_name }}</td>
                                                                

                                                            </tr>
                                                            <tr>
                                                                <td>Opposition Name</td>
                                                                <td colspan="2">
                                                                    @php
                                                                        $opposition_id = explode(', ', $data->opposition_id);
                                                                    @endphp
                                                                    @if ($data->opposition_id)
                                                                        @if (count($opposition_id) > 1)
                                                                            @foreach ($opposition_id as $pro)
                                                                                <li class="text-left">{{ $pro }}
                                                                                </li>
                                                                            @endforeach
                                                                        @else
                                                                            @foreach ($opposition_id as $pro)
                                                                                {{ $pro }}
                                                                            @endforeach
                                                                        @endif
                                                                    @endif
                                                                    @php
                                                                        $opposition_write = explode(', ', $data->opposition_write);
                                                                    @endphp
                                                                    @if ($data->opposition_write)
                                                                        @if (count($opposition_write) > 1)
                                                                            @foreach ($opposition_write as $pro)
                                                                                <li class="text-left">{{ $pro }}
                                                                                </li>
                                                                            @endforeach
                                                                        @else
                                                                            @foreach ($opposition_write as $pro)
                                                                                {{ $pro }}
                                                                            @endforeach
                                                                        @endif
                                                                    @endif

                                                                </td>
                                                                

                                                            </tr>
                                                            <tr>
                                                                <td>Opposition Business Name</td>
                                                                <td colspan="2">{{ $data->opposition_business_name }}</td>
                                                               

                                                            </tr>
                                                            <tr>
                                                                <td>Opposition Address</td>
                                                                <td colspan="2">{{ $data->opposition_address }}</td>
                                                                

                                                            </tr>
                                                            <tr>
                                                                <td>Opposition Mobile</td>
                                                                <td colspan="2">{{ $data->opposition_mobile }}</td>
                                                            

                                                            </tr>
                                                            <tr>
                                                                <td>Opposition Email</td>
                                                                <td colspan="2">{{ $data->opposition_email }}</td>
                                                            

                                                            </tr>
                                                            <tr>
                                                                <td>Profession/Type</td>
                                                                <td colspan="2">{{ $data->opposition_profession_name }}
                                                                    {{ $data->opposition_profession_write }}</td>
                                                                

                                                            </tr>
                                                            <tr>
                                                                <td width="50%">Division/Zone</td>
                                                                <td width="25%"> {{ $data->opposition_division_name }} @if ($data->opposition_division_name && $data->opposition_divisoin_write) @endif 
                                                                    </td>
                                                                <td width="25%">{{ $data->opposition_divisoin_write }}</td>

                                                            </tr>
                                                            <tr>
                                                                <td>District/Area</td>
                                                                <td>{{ $data->opposition_district_name }} @if ($data->opposition_district_name && $data->opposition_district_write) @endif 
                                                                    </td>
                                                                    <td>{{ $data->opposition_district_write }}</td>
                                                                
                                                            </tr>
                                                            <tr>
                                                                <td>Thana/Branch</td>
                                                                <td>{{ $data->opposition_thana_name }} @if ($data->opposition_thana_name && $data->opposition_thana_write) @endif
                                                                </td>
                                                                <td>{{ $data->opposition_thana_write }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Representative Name</td>
                                                                <td colspan="2">{{ $data->opposition_representative_name }} </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Representative Details</td>
                                                                <td colspan="2">{{ $data->opposition_representative_details }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Coordinator/Tadbirkar</td>
                                                                <td colspan="2">{{ $data->opposition_coordinator_name }}
                                                                    {{ $data->opposition_coordinator_tadbirkar_write }}
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td>Coordinator Details</td>
                                                                <td colspan="2">{{ $data->opposition_coordinator_details }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-body">
                                                    <h6 class="text-uppercase text-bold"><u> Documents
                                                            Received </u>
                                                        <button type="button" class="btn btn-info btn-sm float-right"
                                                            data-toggle="modal" data-target="#modal-lg-documents-info"
                                                            data-toggle="tooltip" data-placement="top"
                                                            title="Update Documents"><i class="fas fa-edit"></i>
                                                        </button>
                                                    </h6>

                                                    <table class="table table-bordered">
                                                        <tbody>
                                                            @foreach ($received_documents_explode as $value)
                                                                <tr>
                                                                    <td width="50%">{{ $value['received_documents_id'] }}</td>
                                                                    <td width="30%">{{ $value['received_documents'] }}</td>
                                                                    <td width="20%">{{ !empty($value['received_documents_date']) ? date('d-m-Y', strtotime($value['received_documents_date'])) : '' }}</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                    <h6 class="text-uppercase text-bold mt-4">
                                                        <u> Documents
                                                            Required </u>
                                                    </h6>
                                                    <table class="table table-bordered">
                                                        <tbody>
                                                            @foreach ($required_wanting_documents_explode as $value)
                                                                <tr>
                                                                    <td width="50%">{{ $value['required_wanting_documents_id'] }}</td>
                                                                    <td width="30%">{{ $value['required_wanting_documents'] }}</td>
                                                                    <td width="20%">{{ !empty($value['required_wanting_documents_date']) ? date('d-m-Y', strtotime($value['required_wanting_documents_date'])) : '' }}</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="revision_case_info">

                                            <div class="card">
                                                <div class="card-body">
                                                    <h6 class="text-uppercase text-bold"><u> Case Information </u>
                                                        <button type="button" class="btn btn-info btn-sm float-right"
                                                            data-toggle="modal" data-target="#modal-lg-case-info"
                                                            data-toggle="tooltip" data-placement="top"
                                                            title="Update Primary Information"><i class="fas fa-edit"></i>
                                                        </button>
                                                    </h6>
                                                    <table class="table table-bordered">

                                                        <tbody>

                                                            <tr>
                                                                <td width="50%">Division</td>
                                                                <td width="50%">
                                                                    {{ $data->case_infos_division_name }} </td>
                                                            </tr>
                                                            <tr>
                                                                <td>District</td>
                                                                <td>{{ $data->case_infos_district_name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Thana</td>
                                                                <td>{{ $data->case_infos_thana_name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Case Category</td>
                                                                <td>{{ $data->case_category }}</td>
                                                            </tr>
                                                            {{-- <tr>
                                                            <td>Case Subcategory</td>
                                                            <td>{{ $data->case_subcategory }}</td>
                                                        </tr> --}}
                                                            <tr>
                                                                <td>Case Type</td>
                                                                <td>{{ $data->case_types_name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Case Matter</td>
                                                                <td>{{ $data->matter_name }} {{ $data->matter_write }}
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>Case Title</td>
                                                                <td>{{ $data->case_infos_case_title_name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Case No.</td>
                                                                <td>{{ rtrim($data->case_infos_case_no, ', ') }} of
                                                                    {{ rtrim($data->case_infos_case_year, ', ') }} </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Name of the Court</td>
                                                                <td>
                                                                    @php
                                                                        $case_infos_court_id = explode(', ', $data->case_infos_court_id);
                                                                    @endphp
                                                                    @if ($data->case_infos_court_id)
                                                                        @if (count($case_infos_court_id) > 1)
                                                                            @foreach ($case_infos_court_id as $pro)
                                                                                <li class="text-left">{{ $pro }}
                                                                                </li>
                                                                            @endforeach
                                                                        @else
                                                                            @foreach ($case_infos_court_id as $pro)
                                                                                {{ $pro }}
                                                                            @endforeach
                                                                        @endif
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Name of Court(Short)</td>
                                                                <td>
                                                                    @php
                                                                        $case_infos_court_short_id = explode(', ', $data->case_infos_court_short_id);
                                                                    @endphp
                                                                    @if ($data->case_infos_court_short_id)
                                                                        @if (count($case_infos_court_short_id) > 1)
                                                                            @foreach ($case_infos_court_short_id as $pro)
                                                                                <li class="text-left">{{ $pro }}
                                                                                </li>
                                                                            @endforeach
                                                                        @else
                                                                            @foreach ($case_infos_court_short_id as $pro)
                                                                                {{ $pro }}
                                                                            @endforeach
                                                                        @endif
                                                                    @endif

                                                                    @php
                                                                        $court_short_write = explode(', ', $data->court_short_write);
                                                                    @endphp
                                                                    @if ($data->court_short_write)
                                                                        @if (count($court_short_write) > 1)
                                                                            @foreach ($court_short_write as $pro)
                                                                                <li class="text-left">{{ $pro }}
                                                                                </li>
                                                                            @endforeach
                                                                        @else
                                                                            @foreach ($court_short_write as $pro)
                                                                                {{ $pro }}
                                                                            @endforeach
                                                                        @endif
                                                                    @endif

                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Sub Seq. Case Title</td>
                                                                <td> {{ $data->sub_seq_case_infos_case_title_name }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Sub Seq. Case No.</td>
                                                                <td>

                                                                    
                                                                    @php
                                                                        $case_infos_sub_seq_case_no = explode(', ', trim($data->case_infos_sub_seq_case_no));
                                                                        $key = array_key_last($case_infos_sub_seq_case_no);
                                                                        echo $case_infos_sub_seq_case_no[$key];
                                                                        
                                                                        $case_infos_sub_seq_case_year = explode(', ', trim($data->case_infos_sub_seq_case_year));
                                                                        $key = array_key_last($case_infos_sub_seq_case_year);
                                                                        $last_case_no = $case_infos_sub_seq_case_year[$key];
                                                                        if ($last_case_no != null) {
                                                                            echo ' of ' . $last_case_no;
                                                                        }
                                                                    @endphp


                                                                    
                                                                    {{-- @php
                                                                        $case_infos_sub_seq_case_no = explode(', ', $data->case_infos_sub_seq_case_no);
                                                                    @endphp
                                                                    @if ($data->case_infos_sub_seq_case_no)
                                                                        @if (count($case_infos_sub_seq_case_no) > 1)
                                                                            @foreach ($case_infos_sub_seq_case_no as $pro)
                                                                                <li class="text-left">{{ $pro }}
                                                                                </li>
                                                                            @endforeach
                                                                        @else
                                                                            @foreach ($case_infos_sub_seq_case_no as $pro)
                                                                                {{ $pro }}
                                                                            @endforeach
                                                                        @endif
                                                                    @endif --}}

                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Sub-Seq. Court</td>
                                                                <td>
                                                                    @php
                                                                        $case_infos_sub_seq_court_id = explode(', ', $data->case_infos_sub_seq_court_id);
                                                                    @endphp
                                                                    @if ($data->case_infos_sub_seq_court_id)
                                                                        @if (count($case_infos_sub_seq_court_id) > 1)
                                                                            @foreach ($case_infos_sub_seq_court_id as $pro)
                                                                                <li class="text-left">{{ $pro }}
                                                                                </li>
                                                                            @endforeach
                                                                        @else
                                                                            @foreach ($case_infos_sub_seq_court_id as $pro)
                                                                                {{ $pro }}
                                                                            @endforeach
                                                                        @endif
                                                                    @endif


                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Sub-Seq. Court(Short)</td>
                                                                <td>
                                                                    @php
                                                                        $case_infos_sub_seq_court_short_id = explode(', ', $data->case_infos_sub_seq_court_short_id);
                                                                    @endphp
                                                                    @if ($data->case_infos_sub_seq_court_short_id)
                                                                        @if (count($case_infos_sub_seq_court_short_id) > 1)
                                                                            @foreach ($case_infos_sub_seq_court_short_id as $pro)
                                                                                <li class="text-left">{{ $pro }}
                                                                                </li>
                                                                            @endforeach
                                                                        @else
                                                                            @foreach ($case_infos_sub_seq_court_short_id as $pro)
                                                                                {{ $pro }}
                                                                            @endforeach
                                                                        @endif
                                                                    @endif
                                                                    @php
                                                                        $sub_seq_court_short_write = explode(', ', $data->sub_seq_court_short_write);
                                                                    @endphp
                                                                    @if ($data->sub_seq_court_short_write)
                                                                        @if (count($sub_seq_court_short_write) > 1)
                                                                            @foreach ($sub_seq_court_short_write as $pro)
                                                                                <li class="text-left">{{ $pro }}
                                                                                </li>
                                                                            @endforeach
                                                                        @else
                                                                            @foreach ($sub_seq_court_short_write as $pro)
                                                                                {{ $pro }}
                                                                            @endforeach
                                                                        @endif
                                                                    @endif

                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Law</td>
                                                                <td>
                                                                    @php
                                                                        $law_id = explode('/ ', $data->law_id);
                                                                        $law_write = explode('/ ', $data->law_write);
                                                                        // dd(!empty($data->law_id));
                                                                    @endphp

                                                                    @if ($data->law_id || $data->law_write)
                                                                        @if (count($law_id) >= 1 && count($law_write) >= 1)
                                                                            @if (!empty($data->law_id) && count($law_id) >= 1 && count($law_write) >= 1)
                                                                                {{-- {{ dd('case info') }} --}}
                                                                                @foreach ($law_id as $pro)
                                                                                    <li class="text-left">
                                                                                        {{ $pro }}</li>
                                                                                @endforeach
                                                                            @else
                                                                                @foreach ($law_id as $pro)
                                                                                    {{ $pro }}
                                                                                @endforeach
                                                                            @endif
                                                                            @if (!empty($data->law_write) && count($law_write) >= 1 && count($law_id) >= 1)
                                                                                @foreach ($law_write as $pro)
                                                                                    <li class="text-left">
                                                                                        {{ $pro }}</li>
                                                                                @endforeach
                                                                            @else
                                                                                @foreach ($law_write as $pro)
                                                                                    {{ $pro }}
                                                                                @endforeach
                                                                            @endif
                                                                        @elseif (count($law_id) > 1 && count($law_write) == 0)
                                                                            @foreach ($law_id as $pro)
                                                                                <li class="text-left">{{ $pro }}
                                                                                </li>
                                                                            @endforeach
                                                                            @foreach ($law_write as $pro)
                                                                                {{ $pro }}
                                                                            @endforeach
                                                                        @elseif (count($law_id) == 0 && count($law_write) > 1)
                                                                            @foreach ($law_id as $pro)
                                                                                {{ $pro }}
                                                                            @endforeach
                                                                            @foreach ($law_write as $pro)
                                                                                <li class="text-left">{{ $pro }}
                                                                                </li>
                                                                            @endforeach
                                                                        @else
                                                                            @foreach ($law_id as $pro)
                                                                                {{ $pro }}
                                                                            @endforeach
                                                                            @foreach ($law_write as $pro)
                                                                                {{ $pro }}
                                                                            @endforeach
                                                                        @endif
                                                                    @endif



                                                                    {{-- @if ($data->law_id)
                                                                    @if (count($law_id) > 1)
                                                                        @foreach ($law_id as $pro)
                                                                            <li class="text-left">{{ $pro }}</li>
                                                                        @endforeach
                                                                    @else
                                                                        @foreach ($law_id as $pro)
                                                                            {{ $pro }}
                                                                        @endforeach
                                                                    @endif
                                                                @endif

                                                                @if ($data->law_write)
                                                                    @if (count($law_write) > 1)
                                                                        @foreach ($law_write as $pro)
                                                                            <li class="text-left">{{ $pro }}</li>
                                                                        @endforeach
                                                                    @else
                                                                        @foreach ($law_write as $pro)
                                                                            {{ $pro }}
                                                                        @endforeach
                                                                    @endif
                                                                @endif --}}


                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Section</td>
                                                                <td>
                                                                    @php
                                                                        $section_id = explode(', ', $data->section_id);
                                                                    @endphp
                                                                    @if ($data->section_id)
                                                                        @if (count($section_id) > 1)
                                                                            @foreach ($section_id as $pro)
                                                                                <li class="text-left">{{ $pro }}
                                                                                </li>
                                                                            @endforeach
                                                                        @else
                                                                            @foreach ($section_id as $pro)
                                                                                {{ $pro }}
                                                                            @endforeach
                                                                        @endif
                                                                    @endif
                                                                    @php
                                                                        $section_write = explode(', ', $data->section_write);
                                                                    @endphp
                                                                    @if ($data->section_write)
                                                                        @if (count($section_write) > 1)
                                                                            @foreach ($section_write as $pro)
                                                                                <li class="text-left">{{ $pro }}
                                                                                </li>
                                                                            @endforeach
                                                                        @else
                                                                            @foreach ($section_write as $pro)
                                                                                {{ $pro }}
                                                                            @endforeach
                                                                        @endif
                                                                    @endif


                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Case Filing Date</td>
                                                                <td>{{ $data->date_of_filing }}</td>
                                                            </tr>
                                                            {{-- <tr>
                                                            <td>Status of the Cases</td>
                                                            <td>{{ $data->case_status_name }}</td>
                                                        </tr> --}}

                                                            <tr>
                                                                <td>Complainant/Informant Name</td>
                                                                <td>
                                                                    @php
                                                                        $case_infos_complainant_informant_name = explode(', ', $data->case_infos_complainant_informant_name);
                                                                    @endphp
                                                                    @if ($data->case_infos_complainant_informant_name)
                                                                        @if (count($case_infos_complainant_informant_name) > 1)
                                                                            @foreach ($case_infos_complainant_informant_name as $pro)
                                                                                <li class="text-left">{{ $pro }}
                                                                                </li>
                                                                            @endforeach
                                                                        @else
                                                                            @foreach ($case_infos_complainant_informant_name as $pro)
                                                                                {{ $pro }}
                                                                            @endforeach
                                                                        @endif
                                                                    @endif

                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Complainant/Informant's Representative</td>
                                                                <td>
                                                                    @php
                                                                        $complainant_informant_representative = explode(', ', $data->complainant_informant_representative);
                                                                    @endphp
                                                                    @if ($data->complainant_informant_representative)
                                                                        @if (count($complainant_informant_representative) > 1)
                                                                            @foreach ($complainant_informant_representative as $pro)
                                                                                <li class="text-left">{{ $pro }}
                                                                                </li>
                                                                            @endforeach
                                                                        @else
                                                                            @foreach ($complainant_informant_representative as $pro)
                                                                                {{ $pro }}
                                                                            @endforeach
                                                                        @endif
                                                                    @endif

                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Accused Name</td>
                                                                <td>
                                                                    @php
                                                                        $case_infos_accused_name = explode(', ', $data->case_infos_accused_name);
                                                                    @endphp
                                                                    @if ($data->case_infos_accused_name)
                                                                        @if (count($case_infos_accused_name) > 1)
                                                                            @foreach ($case_infos_accused_name as $pro)
                                                                                <li class="text-left">{{ $pro }}
                                                                                </li>
                                                                            @endforeach
                                                                        @else
                                                                            @foreach ($case_infos_accused_name as $pro)
                                                                                {{ $pro }}
                                                                            @endforeach
                                                                        @endif
                                                                    @endif

                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Accused's Representative</td>
                                                                <td>
                                                                    @php
                                                                        $case_infos_accused_representative = explode(', ', $data->case_infos_accused_representative);
                                                                    @endphp
                                                                    @if ($data->case_infos_accused_representative)
                                                                        @if (count($case_infos_accused_representative) > 1)
                                                                            @foreach ($case_infos_accused_representative as $pro)
                                                                                <li class="text-left">{{ $pro }}
                                                                                </li>
                                                                            @endforeach
                                                                        @else
                                                                            @foreach ($case_infos_accused_representative as $pro)
                                                                                {{ $pro }}
                                                                            @endforeach
                                                                        @endif
                                                                    @endif

                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Prosecution Witnesses</td>
                                                                <td>{{ $data->prosecution_witness }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Defense Witnesses</td>
                                                                <td> {{ $data->defense_witness }} </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Allegation/Claim</td>
                                                                <td> {{ $edit_case_steps->allegation_name }}
                                                                    {{ $edit_case_steps->case_infos_allegation_claim_write }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Amount of Money</td>
                                                                <td>{{ number_format($edit_case_steps->amount_of_money, 0) }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Another Claim(if any)</td>
                                                                <td>{{ $edit_case_steps->another_claim }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Recovery/Seizure Articles</td>
                                                                <td>{{ $edit_case_steps->recovery_seizure_articles }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Summary of Facts</td>
                                                                <td>{{ $edit_case_steps->summary_facts }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Remarks</td>
                                                                <td>{{ $edit_case_steps->case_info_remarks }}</td>
                                                            </tr>


                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            


                                            <div class="card">
                                                <div class="card-body">
                                                    <h6 class="text-uppercase text-bold"><u> Status of the Case </u>
                                                        <button type="button" class="btn btn-info btn-sm float-right"
                                                            data-toggle="modal" data-target="#modal-lg-status-of-the-case"
                                                            data-toggle="tooltip" data-placement="top"
                                                            title="Update Lawyers Information"><i class="fas fa-edit"></i>
                                                        </button>
                                                    </h6>
                                                    <table class="table table-bordered">

                                                        <tbody>

                                                            <tr>
                                                                <td width="50%">Status</td>
                                                                <td width="50%">
                                                                    {{-- @if (!empty($latest)) --}}
                                                                        {{ $data->case_status_name }}
                                                                    {{-- @endif --}}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Fixed For</td>
                                                                <td>
                                                                    @if (!empty($latest))
                                                                        {{ $latest->next_date_reason_name }}
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Next Date</td>
                                                                <td> {{ date('d-m-Y', strtotime($data->next_date)) }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Next Date Fixed For</td>
                                                                <td>
                                                                    @if (!empty($latest))
                                                                        {{ $latest->index_fixed_for_reason_name }}
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Remarks</td>
                                                                <td>
                                                                    @if (!empty($latest))
                                                                        {{ $latest->updated_remarks }}
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-body">
                                                    <h6 class="text-uppercase text-bold"><u> Letter / Notice / Reply </u></h6>
                                                <h6 class="text-uppercase text-bold">
                                                    <div class="row">
                                                        <div class="col-md-3"> Date </div>
                                                        <div class="col-md-2"> Document Name </div>
                                                        <div class="col-md-3"> Particulars </div>
                                                        <div class="col-md-2"> ORG </div>
                                                        <div class="col-md-1"> PHT 
                                                            
                                                        </div>
                                                        <div class="col-md-1">
                                                            <button type="button"
                                                                    class="btn btn-info btn-sm float-right"
                                                                    data-toggle="modal" data-target="#modal-lg-letter-notice"
                                                                    data-toggle="tooltip" data-placement="top"
                                                                    title="Update Case Steps"><i
                                                                        class="fas fa-edit"></i></button>
                                                        </div>
                                                    </div>
                                                </h6>
                                                    
                                                    <table class="table table-bordered">
                                                        <tbody>
                                                            @foreach ($letter_notice_explode as $value)
                                                            <tr>
                                                                <td width="20%">{{ $value['letter_notice_date'] }}</td>
                                                                <td width="20%">{{ $value['letter_notice_documents_id'] }}
                                                                     </td>
                                                                <td width="20%">{{ $value['letter_notice_particulars_id'] }}
                                                                    </td>
                                                                <td width="20%">{{ $value['letter_notice_org'] == '1' ? 'Yes' : 'No' }}
                                                                </td>
                                                                <td width="20%">{{ $value['letter_notice_pht'] == '1' ? 'Yes' : 'No' }}
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                            
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="card">
                                                <div class="card-body">
                                                    <h6 class="text-uppercase text-bold">
                                                        <div class="row">
                                                            <div class="col-md-4"><u> Case Steps </u>
                                                            </div>
                                                            <div class="col-md-3">Date</div>
                                                            <div class="col-md-2">Note</div>
                                                            <div class="col-md-3">Yes/No
                                                                <button type="button"
                                                                    class="btn btn-info btn-sm float-right"
                                                                    data-toggle="modal" data-target="#modal-lg-case-steps"
                                                                    data-toggle="tooltip" data-placement="top"
                                                                    title="Update Case Steps"><i
                                                                        class="fas fa-edit"></i></button>
                                                            </div>
                                                        </div>
                                                    </h6>
                                                    <table class="table table-bordered">
                                                        <tbody>
                                                            <tr>
                                                                <td width="30%">Filing Date</td>
                                                                <td width="20%">
                                                                    {{ $edit_case_steps->case_steps_filing }} </td>
                                                                <td width="30%">
                                                                    {{ $edit_case_steps->case_steps_filing_copy }} </td>
                                                                <td width="20%">
                                                                    {{ $edit_case_steps->case_steps_filing_yes_no }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Taking Cognizance</td>
                                                                <td> {{ $edit_case_steps->taking_cognizance }} </td>
                                                                <td> {{ $edit_case_steps->taking_cognizance_copy }}
                                                                </td>
                                                                <td> {{ $edit_case_steps->taking_cognizance_yes_no }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Arrest/Surrender/C.W.</td>
                                                                <td> {{ $edit_case_steps->arrest_surrender_cw }} </td>
                                                                <td> {{ $edit_case_steps->arrest_surrender_cw_copy }}
                                                                </td>
                                                                <td> {{ $edit_case_steps->arrest_surrender_cw_yes_no }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Bail</td>
                                                                <td> {{ $edit_case_steps->case_steps_bail }} </td>
                                                                <td> {{ $edit_case_steps->case_steps_bail_copy }} </td>
                                                                <td> {{ $edit_case_steps->case_steps_bail_yes_no }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Court Transfer</td>
                                                                <td> {{ $edit_case_steps->case_steps_court_transfer }}
                                                                </td>
                                                                <td> {{ $edit_case_steps->case_steps_court_transfer_copy }}
                                                                </td>
                                                                <td> {{ $edit_case_steps->case_steps_court_transfer_yes_no }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Charge Framed</td>
                                                                <td> {{ $edit_case_steps->case_steps_charge_framed }}
                                                                </td>
                                                                <td> {{ $edit_case_steps->case_steps_charge_framed_copy }}
                                                                </td>
                                                                <td> {{ $edit_case_steps->case_steps_charge_framed_yes_no }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Witness (From)</td>
                                                                <td> {{ $edit_case_steps->case_steps_witness_from }}
                                                                </td>
                                                                <td> {{ $edit_case_steps->case_steps_witness_from_copy }}
                                                                </td>
                                                                <td> {{ $edit_case_steps->case_steps_witness_from_yes_no }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Witness (To)</td>
                                                                <td> {{ $edit_case_steps->case_steps_witness_to }} </td>
                                                                <td> {{ $edit_case_steps->case_steps_witness_to_copy }}
                                                                </td>
                                                                <td> {{ $edit_case_steps->case_steps_witness_to_yes_no }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Argument</td>
                                                                <td> {{ $edit_case_steps->case_steps_argument }} </td>
                                                                <td> {{ $edit_case_steps->case_steps_argument_copy }}
                                                                </td>
                                                                <td> {{ $edit_case_steps->case_steps_argument_yes_no }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Judgement & Order</td>
                                                                <td> {{ $edit_case_steps->case_steps_judgement_order }}
                                                                </td>
                                                                <td> {{ $edit_case_steps->case_steps_judgement_order_copy }}
                                                                </td>
                                                                <td> {{ $edit_case_steps->case_steps_judgement_order_yes_no }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Summary of Cases</td>
                                                                <td> {{ $edit_case_steps->case_steps_summary_of_cases }}
                                                                </td>
                                                                <td> {{ $edit_case_steps->case_steps_summary_of_cases_copy }}
                                                                </td>
                                                                <td> {{ $edit_case_steps->case_steps_summary_of_cases_yes_no }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Remarks</td>
                                                                <td colspan="3"> {{ $edit_case_steps->case_steps_remarks }} </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-body">
                                                    <h6 class="text-uppercase text-bold"><u> Lawyers Information </u>
                                                        <button type="button" class="btn btn-info btn-sm float-right"
                                                            data-toggle="modal" data-target="#modal-lg-lawyers-info"
                                                            data-toggle="tooltip" data-placement="top"
                                                            title="Update Lawyers Information"><i class="fas fa-edit"></i>
                                                        </button>
                                                    </h6>
                                                    <table class="table table-bordered">

                                                        <tbody>

                                                            <tr>
                                                                <td width="50%">Name of Advocate/Law Firm</td>
                                                                <td width="50%"> {{ $data->first_name }}
                                                                    {{ $data->middle_name }} {{ $data->last_name }}
                                                                    {{ $data->lawyer_advocate_write }} </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Name of Assigned Lawyer</td>
                                                                <td>
                                                                    @php
                                                                        $assigned_lawyer_id = explode(', ', $data->assigned_lawyer_id);
                                                                    @endphp
                                                                    @if ($data->assigned_lawyer_id)
                                                                        @if (count($assigned_lawyer_id) > 1)
                                                                            @foreach ($assigned_lawyer_id as $pro)
                                                                                <li class="text-left">{{ $pro }}
                                                                                </li>
                                                                            @endforeach
                                                                        @else
                                                                            @foreach ($assigned_lawyer_id as $pro)
                                                                                {{ $pro }}
                                                                            @endforeach
                                                                        @endif
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Remarks</td>
                                                                <td> {{ $data->lawyers_remarks }} </td>
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
                        <div>
                            <div class="card" id="section1">
                                <div class="card-header">
                                    <h3 class="card-title custom_h3 text-uppercase font-italic font_weight"
                                        id="heading">Case Proceedings Log
                                        @php
                                            $now = Carbon\Carbon::now();
                                            $days_count = Carbon\Carbon::parse($data->date_of_filing)->diffInDays($now);
                                        @endphp

                                        <span class="font-italic custom_font text-capitalize"> (Total Elapsed Time:

                                            {{ $days_count }} Days) </span>
                                    </h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                            data-target="#modal-lg" data-toggle="tooltip" data-placement="top"
                                            title="Update Status"><i class="fas fa-signal"></i></button>
                                        <a href="{{ route('case-porceedings-print-preview', $data->id) }}"
                                            target="_blank" class="btn btn-info btn-sm"><i class="fas fa-print"></i></a>

                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <table class="table view_table table-bordered table-striped data_table">
                                        <thead>
                                            <tr>
                                                <th class=" hide" width="2%">SL</th>
                                                <th width="8%">Date</th>
                                                <th width="10%">Fixed For</th>
                                                <th width="10%">Court Proceeding</th>
                                                <th width="10%">Court Order</th>
                                                <th width="10%">Next Date</th>
                                                <th width="10%">Fixed For</th>
                                                <th width="10%">Day Note</th>
                                                <th width="10%">Engaged Advocates</th>
                                                <th width="10%">Action</th>
                                                <th width="10%">Update</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($case_logs as $logs)
                                                <tr>
                                                    <td class="hide"> {{ $logs->id }} </td>
                                                    <td> {{ date('d-m-Y', strtotime($logs->updated_order_date)) }} </td>
                                                    <td width="10%"> {{ $logs->next_date_reason_name }}
                                                        {{ $logs->updated_fixed_for_write }} </td>
                                                    <td>
                                                        @php
                                                            $proceedings = explode(', ', $logs->court_proceedings_id);
                                                        @endphp

                                                        @if ($logs->court_proceedings_id)
                                                            @if (count($proceedings) > 1)
                                                                @foreach ($proceedings as $pro)
                                                                    <li class="text-left">{{ $pro }}</li>
                                                                @endforeach
                                                            @else
                                                                @foreach ($proceedings as $pro)
                                                                    {{ $pro }}
                                                                @endforeach
                                                            @endif
                                                        @endif
                                                        {{ $logs->court_proceedings_write }}
                                                    </td>
                                                    <td>
                                                        @php
                                                            $order = explode(', ', $logs->updated_court_order_id);
                                                        @endphp
                                                        @if ($logs->updated_court_order_id)
                                                            @foreach ($order as $pro)
                                                                <li class="text-left">{{ $pro }}</li>
                                                            @endforeach
                                                        @endif
                                                        {{ $logs->updated_court_order_write }}
                                                    </td>
                                                    <td> {{ date('d-m-Y', strtotime($logs->updated_next_date)) }} </td>
                                                    <td width="8%"> {{ $logs->index_next_date_reason_name }}
                                                        {{ $logs->updated_index_fixed_for_write }}</td>

                                                    <td>
                                                        @php
                                                            $notes = explode(', ', $logs->updated_day_notes_id);
                                                        @endphp
                                                        @if ($logs->updated_day_notes_id)
                                                            @foreach ($notes as $pro)
                                                                <li class="text-left">{{ $pro }}</li>
                                                            @endforeach
                                                        @endif
                                                        {{ $logs->updated_day_notes_write }}
                                                    </td>
                                                    <td> {{ $logs->updated_engaged_advocate_id }}
                                                        {{ $logs->updated_engaged_advocate_write }} </td>
                                                    <td>

                                                        
                                                        <a href="{{ route('edit-criminal-cases-status', $logs->id) }}">
                                                            <button class="btn btn-outline-success btn-sm" data-toggle="tooltip"
                                                                data-placement="top" title="Edit"><i
                                                                    class="fas fa-edit"></i></button>
                                                        </a>
                                                        <form method="POST"
                                                            action="{{ route('delete-criminal-cases-status', $logs->id) }}"
                                                            class="delete-user btn btn-outline-danger btn-xs">
                                                            @csrf
                                                            <button type="submit" class="btn btn-sm"
                                                                data-toggle="tooltip" data-placement="top"
                                                                title="Delete"><i class="fas fa-trash"></i></button>
                                                        </form>
                                                    </td>
                                                    <td> {{ date('d-m-Y H:i:s', strtotime($logs->created_at)) }} </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                            <div class="card" id="section2">
                                <div class="card-header">
                                    <h3 class="card-title custom_h3 text-uppercase font-italic font_weight"
                                        id="heading">Case Activities Log</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal"
                                            data-target="#modal-lg-2" data-toggle="tooltip" data-placement="top"
                                            title="Update Activities"><i class="fas fa-chart-line"></i></button>

                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <table class="table view_table table-bordered table-striped data_table">
                                        <thead>
                                            <tr>
                                                <th class=" hide" width="2%">SL</th>
                                                <th width="8%"> Date </th>
                                                <th width="10%">Activity/Action</th>
                                                <th width="10%">Progress</th>
                                                <th width="10%">Mode</th>
                                                <th width="10%">Time Spent</th>
                                                <th width="10%">Engaged Lawyer</th>
                                                <th width="10%">Forwarded To</th>
                                                <th width="10%">Requirements</th>
                                                <th width="10%">Note</th>
                                                <th width="10%">Action</th>
                                                <th width="10%">Update</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($case_activity_log as $activity_log)
                                                <tr>
                                                    <td class="hide"> {{ $activity_log->id }} </td>
                                                    <td> {{ date('d-m-Y', strtotime($activity_log->activity_date)) }}
                                                    </td>
                                                    <td> {{\Illuminate\Support\Str::limit($activity_log->activity_action, 15)}} </td>
                                                    <td> {{\Illuminate\Support\Str::limit($activity_log->activity_progress, 15)}} </td>
                                                    <td> {{ $activity_log->mode_name }} </td>
                                                    <td> {{ $activity_log->total_time }} @if (!empty($activity_log->time_spend_manual)) / {{ $activity_log->time_spend_manual }} @endif </td>
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

                                                        {{ $activity_log->activity_forwarded_to_write }} </td>
                                                    <td> {{\Illuminate\Support\Str::limit($activity_log->activity_requirements, 15)}} </td>

                                                    <td> {{\Illuminate\Support\Str::limit($activity_log->activity_remarks, 15)}} </td>
                                                    <td>

                                                       
                                                        <a
                                                            href="{{ route('view-criminal-cases-activity', $activity_log->id) }}">
                                                            <button class="btn btn-outline-success btn-sm" data-toggle="tooltip"
                                                                data-placement="top" title="View"><i class="fas fa-eye"></i></button>
                                                        </a>
                                                        <a
                                                            href="{{ route('edit-criminal-cases-activity', $activity_log->id) }}">
                                                            <button class="btn btn-outline-success btn-sm" data-toggle="tooltip"
                                                                data-placement="top" title="Edit"><i
                                                                    class="fas fa-edit"></i></button>
                                                        </a>
                                                        
                                                        <form method="POST"
                                                            action="{{ route('delete-criminal-cases-activity', $activity_log->id) }}"
                                                            class="delete-user btn btn-outline-danger btn-xs">
                                                            @csrf
                                                            <button type="submit" class="btn btn-sm"
                                                                data-toggle="tooltip" data-placement="top"
                                                                title="Delete"><i class="fas fa-trash"></i></button>
                                                        </form>
                                                    </td>
                                                    <td> {{ date('d-m-Y H:i:s', strtotime($activity_log->created_at)) }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                            <div class="card" id="section3">
                                <div class="card-header">
                                    <h3 class="card-title custom_h3 text-uppercase font-italic font_weight"
                                        id="heading">Documents Log

                                    </h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                            data-target="#exampleModal" data-toggle="tooltip" data-placement="top"
                                            title="Add Documents"><i class="fas fa-file-archive nav-icon"></i></button>
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <table class="table view_table table-bordered table-striped data_table">
                                        <thead>
                                            <tr>
                                                <th class="hide" width="2%">SL</th>
                                                <th>Document Uploaded</th>
                                                <th>Uploaded By</th>
                                                <th>Date & Time</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($criminal_cases_files as $files)
                                                <tr>
                                                    <td class="hide"> {{ $files->id }} </td>
                                                    <td>{{ $files->uploaded_document }} </td>
                                                    <td>{{ $files->created_by }} </td>
                                                    <td>{{ $files->created_at }} </td>
                                                    <td>
                                                        <a href="{{ route('view-criminal-cases-files', $files->id) }}"
                                                            target="_blank">
                                                            <button class="btn btn-outline-success btn-sm"
                                                                data-toggle="tooltip" data-placement="top"
                                                                title="View Document"><i class="fas fa-eye"></i></button>
                                                        </a>
                                                        <a>
                                                            <button data-toggle="modal" data-target="#edit_document"
                                                                data-toggle="tooltip" data-placement="top"
                                                                action={{ $files->id }}
                                                                class="btn btn-outline-success btn-sm"
                                                                title="Edit"><i class="fas fa-edit"></i></button>
                                                        </a>
                                                        <form method="get"
                                                            action="{{ route('delete-criminal-cases-files', $files->id) }}"
                                                            class="delete-user btn btn-outline-danger btn-xs">
                                                            @csrf
                                                            <button type="submit" class="btn  btn-sm"
                                                                data-toggle="tooltip" data-placement="top"
                                                                title="Delete"><i class="fas fa-trash"></i></button>
                                                        </form>

                                                        {{-- <a href="{{ route('download-criminal-cases-files', $files->id) }}">
                                                        <button
                                                            class="btn btn-outline-success btn-sm" data-toggle="tooltip"
                                                            data-placement="top" title="Download"><i class="fas fa-download"></i></button>
                                                    </a> --}}

                                                        
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                            <div class="card" id="section4">
                                <div class="card-header">
                                    <h3 class="card-title custom_h3 text-uppercase font-italic font_weight"
                                        id="heading">Billings Log <span
                                            class="font-italic custom_font text-capitalize">(Total: <span
                                                style="color: darkgreen;font-size:14px;"> {{ $bill_amount }} ৳</span>, Paid:
                                            {{ $payment_amount }} ৳, Due: <span style="color: red;font-size:14px;">
                                                {{ $due_amount }} ৳ </span>) </span></h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                            data-target="#modal-bill" data-toggle="tooltip" data-placement="top"
                                            title="Bill Entry"><i class="fas fa-money-bill"></i></button>
                                        <a href="{{ route('billings-log-print-preview', $data->id) }}" target="_blank"
                                            class="btn btn-info btn-sm"><i class="fas fa-print"></i></a>

                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <table class="table view_table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th width="150px;">Bill for the Date</th>
                                                <th>Bill Particulars</th>
                                                <th width="80px;">Bill Type</th>
                                                <th>Bill Schedule</th>
                                                <th>Bill Amount</th>
                                                <th>Bill Submitted</th>
                                                <th>Payment Amount</th>
                                                <th>Payment Received</th>
                                                <th>Payment Mode</th>
                                                <th>Balance Amount</th>
                                                <th>Paid/Due</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($bill_history as $bill_logs)
                                                <tr>
                                                    <td> {{ $bill_logs->bill_for_the_date }} </td>
                                                    <td>

                                                        @php
                                                            $engaged = explode(', ', $bill_logs->bill_particulars_id);
                                                            // dd($engaged->count())
                                                        @endphp

                                                        @if (count($engaged) > 1)
                                                            @foreach ($engaged as $item)
                                                                <li class="text-left">{{ $item }}</li>
                                                            @endforeach
                                                            <li class="text-left">{{ $bill_logs->bill_particulars }}
                                                            </li>
                                                        @else
                                                            @foreach ($engaged as $item)
                                                                {{ $item }}
                                                            @endforeach
                                                            {{ $bill_logs->bill_particulars }}
                                                        @endif

                                                    </td>
                                                    <td> {{ $bill_logs->bill_type_name }} </td>
                                                    <td> {{ $bill_logs->bill_schedule_name }} </td>
                                                    <td> {{ $bill_logs->bill_amount }} </td>
                                                    <td> {{ $bill_logs->bill_submitted }} </td>
                                                    <td> {{ $bill_logs->payment_amount }} </td>
                                                    <td> {{ $bill_logs->payment_received }} </td>
                                                    <td> {{ $bill_logs->payment_mode_name }} </td>
                                                    <td> {{ $bill_logs->due_amount }} </td>
                                                    <td>

                                                        @if ($bill_logs->paid_due == 'Paid')
                                                            <button type="button"
                                                                class="btn-custom btn-success-custom text-uppercase">
                                                                {{ $bill_logs->paid_due }}
                                                            </button>
                                                        @else
                                                            <button type="button"
                                                                class="btn-custom btn-danger-custom text-uppercase">{{ $bill_logs->paid_due }}</button>
                                                        @endif

                                                    </td>
                                                    <td>
                                                        <a
                                                            href="{{ route('edit-criminal-cases-billing', $bill_logs->id) }}">
                                                            <button class="btn btn-outline-success btn-sm" data-toggle="tooltip"
                                                                data-placement="top" title="Edit"><i
                                                                    class="fas fa-edit"></i></button>
                                                        </a>
                                                        <form method="POST"
                                                            action="{{ route('delete-criminal-cases-billing', $bill_logs->id) }}"
                                                            class="delete-user btn btn-outline-danger btn-xs">
                                                            @csrf
                                                            <button type="submit" class="btn btn-sm"
                                                                data-toggle="tooltip" data-placement="top"
                                                                title="Delete"><i class="fas fa-trash"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>


                        </div>
                    </div>

                </div>
            </div>
        </section>


    </div>
    <!-- /.content-wrapper -->

    <!-- /.modal -->

    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="card-title"> Update Criminal Case Status </h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('update-criminal-cases-status', $data->id) }}" method="post">
                    <div class="">

                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="updated_case_status_id" class="col-md-4 col-form-label"> Status
                                        </label>
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <select name="updated_case_status_id" id="updated_case_status_id"
                                                        class="form-control select2">
                                                        <option value="">Select</option>
                                                        @foreach ($case_status as $item)
                                                            <option value="{{ $item->id }}"
                                                                @if (!empty($previous_activity->updated_case_status_id) && $previous_activity->updated_case_status_id == $item->id) selected @else {{ old('updated_case_status_id') == $item->id ? 'selected' : '' }} @endif>
                                                                {{ $item->case_status_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control"
                                                        id="updated_case_status_write" name="updated_case_status_write"
                                                        @if (!empty($previous_activity->updated_case_status_write)) value="{{ $previous_activity->updated_case_status_write }}" @endif
                                                        placeholder="Status"
                                                        value="{{ old('updated_case_status_write') }}">
                                                </div>
                                            </div>

                                            @error('updated_case_status')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="updated_order_date" class="col-sm-4 col-form-label">
                                            Case/Order Date
                                        </label>
                                        <div class="col-sm-8">
                                            <span class="date_span_status_modal">
                                                <input type="date" class="xDateContainer date_first_input"
                                                    onchange="setCorrect(this,'updated_order_date');"><input
                                                    type="text" id="updated_order_date" name="updated_order_date"
                                                    @if (!empty($previous_activity->updated_order_date)) value="{{ date('d/m/Y', strtotime($previous_activity->updated_next_date)) }}" @endif
                                                    value="dd-mm-yyyy" class="date_second_input" tabindex="-1"><span
                                                    class="date_second_span" tabindex="-1">&#9660;</span>
                                            </span>
                                            @error('updated_order_date')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="updated_fixed_for_id" class="col-md-4 col-form-label"> Fixed For
                                        </label>
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <select name="updated_fixed_for_id" id="updated_fixed_for_id"
                                                        class="form-control select2">
                                                        <option value="">Select</option>
                                                        @foreach ($next_date_reason as $item)
                                                            <option value="{{ $item->id }}"
                                                                @if (!empty($previous_activity->updated_index_fixed_for_id) && $previous_activity->updated_index_fixed_for_id == $item->id) selected @else {{ old('updated_fixed_for_id') == $item->id ? 'selected' : '' }} @endif>
                                                                {{ $item->next_date_reason_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control"
                                                        id="updated_fixed_for_write" name="updated_fixed_for_write"
                                                        placeholder="Fixed For"
                                                        @if (!empty($previous_activity->updated_fixed_for_write)) value="{{ $previous_activity->updated_fixed_for_write }}" @endif
                                                        value="{{ old('updated_fixed_for_write') }}">
                                                </div>
                                            </div>

                                            @error('updated_fixed_for')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="court_proceedings_id" class="col-md-4 col-form-label"> Court
                                            Proceeding
                                        </label>
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <select name="court_proceedings_id[]" id="court_proceedings_id"
                                                        data-placeholder="Select" class="form-control select2" multiple>
                                                        <option value="">Select</option>
                                                        @foreach ($court_proceeding as $item)
                                                            <option value="{{ $item->court_proceeding_name }}"
                                                                {{ old('court_proceedings_id') == $item->id ? 'selected' : '' }}>
                                                                {{ $item->court_proceeding_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control"
                                                        id="court_proceedings_write" name="court_proceedings_write"
                                                        placeholder="Court Proceeding"
                                                        value="{{ old('court_proceedings_write') }}">
                                                </div>
                                            </div>

                                            @error('court_proceedings')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="updated_court_order_id" class="col-md-4 col-form-label"> Court Order
                                        </label>
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <select name="updated_court_order_id[]" id="updated_court_order_id"
                                                        data-placeholder="Select" class="form-control select2" multiple>
                                                        <option value="">Select</option>
                                                        @foreach ($last_court_order as $item)
                                                            <option value="{{ $item->court_last_order_name }}"
                                                                {{ old('updated_court_order_id') == $item->court_last_order_name ? 'selected' : '' }}>
                                                                {{ $item->court_last_order_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control"
                                                        id="updated_court_order_write" placeholder="Court Order"
                                                        name="updated_court_order_write">

                                                </div>
                                            </div>

                                            @error('updated_court_order_write')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="updated_next_date" class="col-sm-4 col-form-label">
                                            Next Date
                                        </label>
                                        <div class="col-sm-8">
                                            <span class="date_span_status_modal">
                                                <input type="date" class="xDateContainer date_first_input"
                                                    onchange="setCorrect(this,'updated_next_date');"><input type="text"
                                                    id="updated_next_date" name="updated_next_date" value="dd-mm-yyyy"
                                                    class="date_second_input" tabindex="-1"><span
                                                    class="date_second_span" tabindex="-1">&#9660;</span>
                                            </span>
                                            @error('updated_next_date')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="updated_index_fixed_for_id" class="col-md-4 col-form-label"> Next Date
                                            Fixed For
                                        </label>
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <select name="updated_index_fixed_for_id"
                                                        id="updated_index_fixed_for_id" class="form-control select2">
                                                        <option value="">Select</option>
                                                        @foreach ($next_date_reason as $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ old('updated_index_fixed_for_id') == $item->id ? 'selected' : '' }}>
                                                                {{ $item->next_date_reason_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control"
                                                        id="updated_index_fixed_for_write"
                                                        placeholder="Next Date Fixed For"
                                                        name="updated_index_fixed_for_write">

                                                </div>
                                            </div>

                                            @error('updated_index_fixed_for_write')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-6">

                                    <div class="form-group row">
                                        <label for="updated_day_notes_id" class="col-md-4 col-form-label"> Day Notes
                                        </label>
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <select name="updated_day_notes_id[]" id="updated_day_notes_id"
                                                        class="form-control select2" data-placeholder="Select" multiple>
                                                        <option value="">Select</option>
                                                        @foreach ($day_notes as $item)
                                                            <option value="{{ $item->day_notes_name }}"
                                                                {{ old('updated_day_notes_id') == $item->day_notes_name ? 'selected' : '' }}>
                                                                {{ $item->day_notes_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control"
                                                        id="updated_day_notes_write" placeholder="Day Notes"
                                                        name="updated_day_notes_write">
                                                </div>
                                            </div>

                                            @error('updated_day_notes_write')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="updated_engaged_advocate_id" class="col-md-4 col-form-label"> Engaged
                                            Advocate
                                        </label>
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <select name="updated_engaged_advocate_id[]" data-placeholder="Select"
                                                        class="form-control select2" multiple>
                                                        <option value="">Select</option>
                                                        @foreach ($existing_assignend_external_council as $item)
                                                            <option
                                                                value="{{ $item->first_name . ' ' . $item->middle_name . ' ' . $item->last_name }}"
                                                                {{ old('updated_engaged_advocate_id') == $item->id ? 'selected' : '' }}>
                                                                {{ $item->first_name }}
                                                                {{ $item->middle_name }}
                                                                {{ $item->last_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control"
                                                        id="updated_engaged_advocate_write" placeholder="Engaged Advocate"
                                                        name="updated_engaged_advocate_write">
                                                </div>
                                            </div>

                                            @error('updated_engaged_advocate_write')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="updated_next_day_presence_id" class="col-sm-4 col-form-label">
                                            Next Day Presence</label>
                                        <div class="col-sm-8">
                                            <select name="updated_next_day_presence_id" class="form-control select2">
                                                <option value="">Select</option>
                                                @foreach ($next_day_presence as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ old('updated_next_day_presence_id') == $item->id ? 'selected' : '' }}>
                                                        {{ $item->next_day_presence_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('updated_next_day_presence_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="updated_remarks" class="col-sm-4 col-form-label"> Steps To be taken
                                            next date </label>
                                        <div class="col-sm-8">
                                            <textarea name="updated_remarks" class="form-control" rows="3" placeholder=""></textarea>
                                            @error('updated_remarks')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                            </div>


                        </div>


                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <div class="float-right">
                            <button type="submit" class="btn btn-primary text-uppercase"><i class="fas fa-save"></i>
                                Update
                            </button>
                        </div>
                    </div>
                </form>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!-- /.modal -->

    <div class="modal fade" id="modal-lg-2">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="card-title"> Update Activities </h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('update-criminal-cases-activity', $data->id) }}" method="post">
                    @csrf
                    <div class="card-body">


                        <input type="hidden" name="case_no"
                            value="{{ $data->case_infos_case_no ? $data->case_infos_case_title_name . ' ' . $data->case_infos_case_no . ' of ' . $data->case_infos_case_year : '' }}@if ($data->sub_seq_case_title_name != null) , @endif
                        {{ $data->sub_seq_case_title_name }}
                        @php
                            $case_infos_sub_seq_case_no = explode(', ',trim($data->case_infos_sub_seq_case_no));
                            $key = array_key_last($case_infos_sub_seq_case_no);
                            echo $case_infos_sub_seq_case_no[$key];

                            $case_infos_sub_seq_case_year = explode(', ',trim($data->case_infos_sub_seq_case_year));
                            $key = array_key_last($case_infos_sub_seq_case_year);
                            $last_case_no = $case_infos_sub_seq_case_year[$key];
                            if ($last_case_no != null) {
                                echo '/'.$last_case_no;
                            }
                        @endphp">

                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group row">
                                    <label for="activity_date" class="col-sm-4 col-form-label"> Date
                                    </label>
                                    <div class="col-sm-8">
                                        <span class="date_span_status_modal">
                                            <input type="date" class="xDateContainer date_first_input"
                                                onchange="setCorrect(this,'activity_date');"><input type="text"
                                                id="activity_date" name="activity_date" value="dd-mm-yyyy"
                                                class="date_second_input" tabindex="-1"><span class="date_second_span"
                                                tabindex="-1">&#9660;</span>
                                        </span>

                                        @error('activity_date')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="activity_action" class="col-sm-4 col-form-label"> Activity/Action </label>
                                    <div class="col-sm-8">
                                        <textarea name="activity_action" class="form-control" rows="2"
                                                              placeholder="">{{old('activity_action')}}</textarea>
                                        @error('activity_action')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="activity_progress" class="col-sm-4 col-form-label">Progress</label>
                                    <div class="col-sm-8">
                                        <textarea name="activity_progress" class="form-control" rows="2"
                                                              placeholder="">{{old('activity_progress')}}</textarea>
                                        @error('activity_progress')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="activity_mode_id" class="col-md-4 col-form-label"> Mode
                                    </label>
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <select name="activity_mode_id" class="form-control select2">
                                                    <option value="">Select</option>
                                                    @foreach ($mode as $item)
                                                        <option value="{{ $item->id }}"
                                                            {{ old('activity_mode_id') == $item->mode_name ? 'selected' : '' }}>
                                                            {{ $item->mode_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" id="activity_mode_write" placeholder="Mode" name="activity_mode_write" >
                                            </div>

                                        </div>

                                        @error('activity_mode_write')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="start_time" class="col-sm-4 col-form-label">Start Time</label>
                                    <div class="col-sm-8">
                                        <input type="datetime-local" class="form-control" id="start_time"
                                            name="start_time">
                                        @error('start_time')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="end_time" class="col-sm-4 col-form-label">End Time</label>
                                    <div class="col-sm-8">
                                        <input type="datetime-local" class="form-control" id="end_time"
                                            name="end_time">
                                        @error('end_time')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="setup_hours" class="col-sm-4 col-form-label">Time Spent</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="setup_hours" name="setup_hours"
                                            readonly>
                                        @error('setup_hours')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="time_spend_manual" class="col-sm-4 col-form-label">Time Spent</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="time_spend_manual" name="time_spend_manual">
                                        @error('time_spend_manual')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-6">
                                
                                <div class="form-group row">
                                    <label for="activity_engaged_id" class="col-md-4 col-form-label"> Engaged
                                    </label>
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <select name="activity_engaged_id[]" data-placeholder="Select"
                                                    class="form-control select2" multiple>
                                                    <option value="">Select</option>
                                                    @foreach ($external_council as $item)
                                                        <option
                                                            value="{{ $item->first_name . ' ' . $item->last_name }}"
                                                            {{ old('updated_engaged_advocate_id') == $item->id ? 'selected' : '' }}>
                                                            {{ $item->first_name }}
                                                            {{ $item->last_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" id="activity_engaged_write"
                                                    placeholder="Activity Engaged" name="activity_engaged_write">
                                            </div>
                                        </div>

                                        @error('activity_mode_write')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="activity_forwarded_to_id" class="col-md-4 col-form-label"> Forwarded To
                                    </label>
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <select name="activity_forwarded_to_id[]" class="form-control select2" data-placeholder="Select" multiple>
                                                    <option value="">Select</option>
                                                    @foreach ($external_council as $item)
                                                        <option value="{{ $item->id }}"
                                                            {{ old('activity_forwarded_to_id') == $item->id ? 'selected' : '' }}>
                                                            {{ $item->first_name }}
                                                            {{ $item->last_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control"
                                                    id="activity_forwarded_to_write" placeholder="Forwarded To"
                                                    name="activity_forwarded_to_write">
                                            </div>
                                        </div>

                                        @error('activity_forwarded_to_write')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="activity_requirements" class="col-sm-4 col-form-label">Requirements</label>
                                    <div class="col-sm-8">
                                        <textarea name="activity_requirements" class="form-control" rows="2"
                                                              placeholder="">{{old('activity_requirements')}}</textarea>
                                        @error('client')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="activity_remarks" class="col-sm-4 col-form-label">Note</label>
                                    <div class="col-sm-8">
                                        <textarea name="activity_remarks" class="form-control" rows="2"
                                                              placeholder="">{{old('activity_remarks')}}</textarea>
                                        @error('client')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                

                            </div>

                        </div>

                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <div class="float-right">
                                <button type="submit" class="btn btn-primary text-uppercase"><i class="fas fa-save"></i>
                                    Update
                                </button>
                            </div>
                        </div>

                    </div>
                </form>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    {{-- update cases modal --}}

    <div class="modal fade" id="modal-lg-basic-info">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="card-title"> Edit Criminal Cases </h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('update-criminal-cases', $data->id) }}" method="post">
                    @csrf
                    <input type="hidden" value="basic_information" name="basic_information">
                    <div class="card-body">

                        <h6 class="text-uppercase text-bold"><u> Primary Information </u>
                        </h6>
                        <div class="form-group row">
                            <label for="client" class="col-sm-4 col-form-label">Client
                                Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="client" name="client"
                                    value="{{ $data->client }}">
                                @error('client')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="legal_issue_id" class="col-sm-4 col-form-label">Legal
                                Issue</label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-md-6">
                                        <select name="legal_issue_id" id="legal_issue_id" class="form-control select2">
                                            <option value="">Select</option>
                                            @foreach ($legal_issue as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $data->legal_issue_id == $item->id ? 'selected' : '' }}>
                                                    {{ $item->legal_issue_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="legal_issue_write"
                                            name="legal_issue_write" placeholder="Legal Issue"
                                            value="{{ $data->legal_issue_write }}">
                                    </div>
                                </div>

                                @error('legal_issue_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="legal_service_id" class="col-sm-4 col-form-label">Legal
                                Service</label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-md-6">
                                        <select name="legal_service_id" id="legal_service_id"
                                            class="form-control select2">
                                            <option value="">Select</option>
                                            @foreach ($legal_service as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $data->legal_service_id == $item->id ? 'selected' : '' }}>
                                                    {{ $item->legal_service_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="legal_service_write"
                                            name="legal_service_write" placeholder="Legal Service"
                                            value="{{ $data->legal_service_write }}">
                                    </div>
                                </div>


                                @error('legal_service_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="complainant_informant_id" class="col-sm-4 col-form-label">Complainant/Informant
                                Name</label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-md-6">
                                        <select name="complainant_informant_id" id="complainant_informant_id"
                                            class="form-control select2">
                                            <option value="">Select</option>
                                            @foreach ($complainant as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $data->complainant_informant_id == $item->id ? 'selected' : '' }}>
                                                    {{ $item->complainant_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="complainant_informant_write"
                                            name="complainant_informant_write" placeholder="Complainant"
                                            value="{{ $data->complainant_informant_write }}">
                                    </div>
                                </div>


                                @error('legal_service_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="accused_id" class="col-sm-4 col-form-label">Accused
                                Name</label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-md-6">
                                        <select name="accused_id" id="accused_id" class="form-control select2">
                                            <option value="">Select</option>
                                            @foreach ($accused as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $data->accused_id == $item->id ? 'selected' : '' }}>
                                                    {{ $item->accused_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="accused_write"
                                            name="accused_write" placeholder="Accused"
                                            value="{{ $data->accused_write }}">
                                    </div>
                                </div>


                                @error('legal_service_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="in_favour_of_id" class="col-sm-4 col-form-label">In favour
                                of </label>
                            <div class="col-sm-8">
                                <select name="in_favour_of_id" class="form-control select2">
                                    <option value="">Select</option>
                                    @foreach ($in_favour_of as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $data->in_favour_of_id == $item->id ? 'selected' : '' }}>
                                            {{ $item->in_favour_of_name }} </option>
                                    @endforeach
                                </select>
                                @error('in_favour_of_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="case_no" class="col-sm-4 col-form-label">Case
                                No.</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="case_no" name="case_no"
                                    value="{{ $data->case_no }}">
                                @error('case_no')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name_of_the_court_id" class="col-sm-4 col-form-label">
                                Name
                                of the Court </label>
                            <div class="col-sm-8">
                                <select name="name_of_the_court_id" class="form-control select2">
                                    <option value="">Select</option>
                                    @foreach ($court as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $data->name_of_the_court_id == $item->id ? 'selected' : '' }}>
                                            {{ $item->court_name }}</option>
                                    @endforeach
                                </select>
                                @error('name_of_the_court_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="next_date" class="col-sm-4 col-form-label"> Next
                                Date </label>
                            <div class="col-sm-8">
                                <span class="date_span">
                                    <input type="date" class="xDateContainer date_first_input"
                                        onchange="setCorrect(this,'xTime');"><input type="text" id="xTime"
                                        name="next_date"
                                        @if ($data->next_date != null) value="{{ date('d-m-Y', strtotime($data->next_date)) }}"
                                                                                                           @else value="dd-mm-yyyy" @endif
                                        class="date_second_input" tabindex="-1"><span class="date_second_span"
                                        tabindex="-1">&#9660;</span>
                                </span>
                                @error('next_date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="next_date_fixed_id" class="col-sm-4 col-form-label">
                                Next
                                date fixed for </label>
                            <div class="col-sm-8">
                                <select name="next_date_fixed_id" class="form-control select2">
                                    <option value="">Select</option>
                                    @foreach ($next_date_reason as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $data->next_date_fixed_id == $item->id ? 'selected' : '' }}>
                                            {{ $item->next_date_reason_name }}</option>
                                    @endforeach
                                </select>
                                @error('next_date_fixed_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="received_date" class="col-sm-4 col-form-label">
                                Received
                                Date </label>
                            <div class="col-sm-8">
                                <span class="date_span">
                                    <input type="date" class="xDateContainer date_first_input"
                                        onchange="setCorrect(this,'xTime2');"><input type="text" id="xTime2"
                                        name="received_date"
                                        @if ($data->received_date != null) value="{{ date('d-m-Y', strtotime($data->received_date)) }}"
                                                                                                            @else value="dd-mm-yyyy" @endif
                                        class="date_second_input" tabindex="-1"><span class="date_second_span"
                                        tabindex="-1">&#9660;</span>
                                </span>
                                @error('received_date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="mode_of_receipt_id" class="col-sm-4 col-form-label"> Mode
                                of Receipt </label>
                            <div class="col-sm-8">
                                <select name="mode_of_receipt_id" class="form-control select2" id="mode_of_receipt_id"
                                    action="{{ route('find-client-subcategory') }}">
                                    <option value="">Select</option>
                                    @foreach ($mode as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $data->mode_of_receipt_id == $item->id ? 'selected' : '' }}>
                                            {{ ucfirst($item->mode_name) }}</option>
                                    @endforeach
                                </select>
                                @error('mode_of_receipt')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="referrer_id" class="col-sm-4 col-form-label"> Referrer Name </label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-md-6">
                                        <select name="referrer_id" id="referrer_id" class="form-control select2">
                                            <option value="">Select</option>
                                            @foreach ($referrer as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $data->referrer_id == $item->id ? 'selected' : '' }}>
                                                    {{ $item->referrer_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="referrer_write"
                                            name="referrer_write" placeholder="Referrer"
                                            value="{{ $data->referrer_write }}">
                                    </div>
                                </div>
                                @error('contact_person_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="referrer_details" class="col-sm-4 col-form-label"> Referrer
                                Details </label>
                            <div class="col-sm-8">
                                <textarea name="referrer_details" class="form-control" rows="3" placeholder="">{{ $data->referrer_details }}</textarea>
                                @error('referrer_details')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="received_by_id" class="col-sm-4 col-form-label"> Received By </label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-md-6">
                                        <select name="received_by_id" id="received_by_id"
                                            class="form-control select2">
                                            <option value="">Select</option>
                                            @foreach ($user as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $data->received_by_id == $item->id ? 'selected' : '' }}>
                                                    {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="received_by_write"
                                            name="received_by_write" placeholder="Received By"
                                            value="{{ $data->received_by_write }}">
                                    </div>
                                </div>
                                @error('contact_person_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <h6 class="text-uppercase text-bold"><u> Case File Location </u>
                        </h6>
                        <div class="form-group row">
                            <label for="cabinet_id" class="col-sm-4 col-form-label"> Cabinet Name </label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-md-6">
                                        <select name="cabinet_id" id="cabinet_id" class="form-control select2">
                                            <option value="">Select</option>
                                            @foreach ($cabinet as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $data->cabinet_id == $item->id ? 'selected' : '' }}>
                                                    {{ $item->cabinet_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="self_number"
                                            name="self_number" placeholder="Self Number"
                                            value="{{ $data->self_number }}">
                                    </div>
                                </div>
                                @error('self_number')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <div class="float-right">
                                <button type="submit" class="btn btn-primary text-uppercase"><i
                                        class="fas fa-save"></i> Update
                                </button>
                            </div>
                        </div>

                    </div>
                </form>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div class="modal fade" id="modal-lg-client-info">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="card-title"> Edit Criminal Cases </h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('update-criminal-cases', $data->id) }}" method="post">
                    @csrf
                    <input type="hidden" value="client_information" name="client_information">
                    <div class="card-body">

                        <h6 class="text-uppercase text-bold"><u> Client Information </u>
                        </h6>
                        <div class="form-group row">
                            <label for="client_party_id" class="col-sm-4 col-form-label">Client(Which Party)</label>
                            <div class="col-sm-8">
                                <select name="client_party_id" class="form-control select2" id="client_party_id">
                                    <option value="">Select</option>
                                    @foreach ($in_favour_of as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $data->client_party_id == $item->id ? 'selected' : '' }}>
                                            {{ $item->in_favour_of_name }} </option>
                                    @endforeach
                                </select>
                                @error('client_party_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="client_category_id" class="col-sm-4 col-form-label">Client
                                Category</label>
                            <div class="col-sm-8">
                                <select name="client_category_id" class="form-control select2" id="client_category_id"
                                    action="{{ route('find-client-subcategory') }}">
                                    <option value="">Select</option>
                                    @foreach ($client_category as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $data->client_category_id == $item->id ? 'selected' : '' }}>
                                            {{ ucfirst($item->client_category_name) }}</option>
                                    @endforeach
                                </select>
                                @error('client_category_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="client_subcategory_id" class="col-sm-4 col-form-label">Client
                                Subcategory</label>
                            <div class="col-sm-8">
                                <select name="client_subcategory_id" class="form-control select2"
                                    id="client_subcategory_id">
                                    <option value="">Select</option>
                                    @foreach ($existing_client_subcategory as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $data->client_subcategory_id == $item->id ? 'selected' : '' }}>
                                            {{ ucfirst($item->client_subcategory_name) }}</option>
                                    @endforeach
                                </select>
                                @error('client_subcategory_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="client_id" class="col-sm-4 col-form-label">Client
                                Name</label>
                            <div class="col-sm-8">

                                <div class="row">
                                    <div class="col-md-6">
                                        <select name="client_id[]" id="client_id" class="form-control select2"
                                            data-placeholder="Select" multiple>
                                            <option value="">Select</option>
                                            @foreach ($client as $item)
                                                <option value="{{ $item->client_name }}"
                                                    {{ in_array($item->client_name, $client_explode) ? 'selected' : '' }}>
                                                    {{ $item->client_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group hdtuto_client control-group increment_client">
                                            <input type="text" name="client_name_write[]"
                                                class="myfrm form-control col-12" placeholder="Client Name"
                                                value="{{ rtrim($data->client_name_write, ', ') }}">
                                            <div class="input-group-btn">
                                                <button class="btn btn-success btn_success_client" type="button"><i
                                                        class="fldemo glyphicon glyphicon-plus"></i>+
                                                </button>
                                            </div>
                                        </div>
                                        <div class="clone_client hide">
                                            <div class="hdtuto_client control-group lst input-group"
                                                style="margin-top:10px">
                                                <input type="text" name="client_name_write[]"
                                                    class="myfrm form-control col-12">
                                                <div class="input-group-btn">
                                                    <button class="btn btn-danger btn_danger_client" type="button"><i
                                                            class="fldemo glyphicon glyphicon-remove"></i> -
                                                    </button>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>

                                @error('client_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="client_business_name" class="col-sm-4 col-form-label">Client Business
                                Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="client_business_name"
                                    name="client_business_name" value="{{ $data->client_business_name }}">
                                @error('client_business_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="client_address" class="col-sm-4 col-form-label">
                                Client
                                Address </label>
                            <div class="col-sm-8">
                                <textarea name="client_address" class="form-control" rows="3" placeholder="">{{ $data->client_address }}</textarea>
                                @error('client_address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="client_mobile" class="col-sm-4 col-form-label">Client
                                Mobile</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="client_mobile" name="client_mobile"
                                    value="{{ $data->client_mobile }}">
                                @error('client_mobile')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="client_email" class="col-sm-4 col-form-label">Client
                                Email</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="client_email" name="client_email"
                                    value="{{ $data->client_email }}">
                                @error('client_email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="client_profession_id" class="col-sm-4 col-form-label">Profession/Type</label>
                            <div class="col-sm-8">

                                <div class="row">
                                    <div class="col-md-6">
                                        <select name="client_profession_id" class="form-control select2"
                                            id="client_profession_id">
                                            <option value="">Select</option>
                                            @foreach ($profession as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $data->client_profession_id == $item->id ? 'selected' : '' }}>
                                                    {{ ucfirst($item->profession_name) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="client_profession_write"
                                            name="client_profession_write" placeholder="Profession Name"
                                            value="{{ $data->client_profession_write }}">
                                    </div>
                                </div>

                                @error('client_profession_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="client_division_id" class="col-sm-4 col-form-label"> Division/Zone</label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-md-6">
                                        <select name="client_division_id" id="client_division_id"
                                            class="form-control select2" action="{{ route('find_district') }}">
                                            <option value="">Select</option>
                                            @foreach ($division as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $data->client_division_id == $item->id ? 'selected' : '' }}>
                                                    {{ ucfirst($item->division_name) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="client_divisoin_write"
                                            name="client_divisoin_write" placeholder="Client Zone"
                                            value="{{ $data->client_divisoin_write }}">
                                    </div>
                                </div>
                                @error('client_division_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="client_district_id" class="col-sm-4 col-form-label">District/Area</label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-md-6">
                                        <select name="client_district_id" id="client_district_id"
                                            class="form-control select2" action="{{ route('find-thana') }}">
                                            <option value="">Select</option>
                                            @foreach ($existing_district as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $data->client_district_id == $item->id ? 'selected' : '' }}>
                                                    {{ ucfirst($item->district_name) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="client_district_write"
                                            name="client_district_write" placeholder="Client Area"
                                            value="{{ $data->client_district_write }}">
                                    </div>
                                </div>

                                @error('client_district_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="client_thana_id" class="col-sm-4 col-form-label">Thana/Branch</label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-md-6">
                                        <select name="client_thana_id" id="client_thana_id"
                                            class="form-control select2">
                                            <option value="">Select</option>
                                            @foreach ($existing_thana as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $data->client_thana_id == $item->id ? 'selected' : '' }}>
                                                    {{ ucfirst($item->thana_name) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="client_thana_write"
                                            name="client_thana_write" placeholder="Client Branch"
                                            value="{{ $data->client_thana_write }}">
                                    </div>
                                </div>
                                @error('client_thana_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="client_representative_name" class="col-sm-4 col-form-label">Representative
                                Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="client_representative_name"
                                    name="client_representative_name"
                                    value="{{ $data->client_representative_name }}">
                                @error('client_representative_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="client_representative_details" class="col-sm-4 col-form-label"> Representative
                                Details </label>
                            <div class="col-sm-8">
                                <textarea name="client_representative_details" class="form-control" rows="3" placeholder="">{{ $data->client_representative_details }}</textarea>
                                @error('client_representative_details')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="client_coordinator_tadbirkar_id" class="col-sm-4 col-form-label">
                                Coordinator/Tadbirkar </label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-md-6">
                                        <select name="client_coordinator_tadbirkar_id"
                                            id="client_coordinator_tadbirkar_id" class="form-control select2">
                                            <option value="">Select</option>
                                            @foreach ($coordinator as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $data->client_coordinator_tadbirkar_id == $item->id ? 'selected' : '' }}>
                                                    {{ $item->coordinator_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="coordinator_tadbirkar_write"
                                            name="coordinator_tadbirkar_write" placeholder="Tadbirkar Name"
                                            value="{{ $data->coordinator_tadbirkar_write }}">
                                    </div>
                                </div>
                                @error('coordinator_tadbirkar_write')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="client_coordinator_details" class="col-sm-4 col-form-label"> Coordinator Details
                            </label>
                            <div class="col-sm-8">
                                <textarea name="client_coordinator_details" class="form-control" rows="3" placeholder="">{{ $data->client_coordinator_details }}</textarea>
                                @error('client_coordinator_details')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <div class="float-right">
                                <button type="submit" class="btn btn-primary text-uppercase"><i
                                        class="fas fa-save"></i> Update
                                </button>
                            </div>
                        </div>

                    </div>
                </form>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


    {{-- opposite party Information --}}

    <div class="modal fade" id="modal-lg-opposition-info">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="card-title"> Edit Criminal Cases </h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('update-criminal-cases', $data->id) }}" method="post">
                    @csrf
                    <input type="hidden" value="opposite_party_information" name="opposite_party_information">
                    <div class="card-body">

                        <h6 class="text-uppercase text-bold"><u> Opposite Party Information </u>
                        </h6>
                        <div class="form-group row">
                            <label for="opposition_party_id" class="col-sm-4 col-form-label">Opposition(Which
                                Party)</label>
                            <div class="col-sm-8">
                                <select name="opposition_party_id" class="form-control select2"
                                    id="opposition_party_id">
                                    <option value="">Select</option>
                                    @foreach ($in_favour_of as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $data->opposition_party_id == $item->id ? 'selected' : '' }}>
                                            {{ $item->in_favour_of_name }} </option>
                                    @endforeach
                                </select>
                                @error('opposition_party_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="opposition_category_id" class="col-sm-4 col-form-label">Opposition
                                Category</label>
                            <div class="col-sm-8">
                                <select name="opposition_category_id" class="form-control select2"
                                    id="opposition_category_id" action="{{ route('find-client-subcategory') }}">
                                    <option value="">Select</option>
                                    @foreach ($client_category as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $data->opposition_category_id == $item->id ? 'selected' : '' }}>
                                            {{ ucfirst($item->client_category_name) }}</option>
                                    @endforeach
                                </select>
                                @error('opposition_category_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="opposition_subcategory_id" class="col-sm-4 col-form-label">Opposition
                                Subcategory</label>
                            <div class="col-sm-8">
                                <select name="opposition_subcategory_id" class="form-control select2"
                                    id="opposition_subcategory_id">
                                    <option value="">Select</option>
                                    @foreach ($existing_opposition_subcategory as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $data->opposition_subcategory_id == $item->id ? 'selected' : '' }}>
                                            {{ ucfirst($item->client_subcategory_name) }}</option>
                                    @endforeach
                                </select>
                                @error('opposition_subcategory_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="opposition_id" class="col-sm-4 col-form-label">Opposition
                                Name</label>
                            <div class="col-sm-8">

                                <div class="row">
                                    <div class="col-md-6">
                                        <select name="opposition_id[]" id="opposition_id" class="form-control select2"
                                            data-placeholder="Select" multiple>
                                            <option value="">Select</option>
                                            @foreach ($opposition as $item)
                                                <option value="{{ $item->opposition_name }}"
                                                    {{ in_array($item->opposition_name, $opposition_explode) ? 'selected' : '' }}>
                                                    {{ $item->opposition_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group hdtuto_opposition control-group increment_opposition">
                                            <input type="text" name="opposition_write[]"
                                                class="myfrm form-control col-12" placeholder="Opposition Name"
                                                value="{{ rtrim($data->opposition_write, ', ') }}">
                                            <div class="input-group-btn">
                                                <button class="btn btn-success btn_success_opposition" type="button"><i
                                                        class="fldemo glyphicon glyphicon-plus"></i>+
                                                </button>
                                            </div>
                                        </div>
                                        <div class="clone_opposition hide">
                                            <div class="hdtuto_opposition control-group lst input-group"
                                                style="margin-top:10px">
                                                <input type="text" name="opposition_write[]"
                                                    class="myfrm form-control col-12">
                                                <div class="input-group-btn">
                                                    <button class="btn btn-danger btn_danger_opposition"
                                                        type="button"><i class="fldemo glyphicon glyphicon-remove"></i>
                                                        -
                                                    </button>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>

                                @error('client_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="opposition_business_name" class="col-sm-4 col-form-label">Opposition Business
                                Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="opposition_business_name"
                                    name="opposition_business_name" value="{{ $data->opposition_business_name }}">
                                @error('opposition_business_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="opposition_address" class="col-sm-4 col-form-label">
                                Opposition
                                Address </label>
                            <div class="col-sm-8">
                                <textarea name="opposition_address" class="form-control" rows="3" placeholder="">{{ $data->opposition_address }}</textarea>
                                @error('opposition_address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="opposition_mobile" class="col-sm-4 col-form-label">Opposition
                                Mobile</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="opposition_mobile"
                                    name="opposition_mobile" value="{{ $data->opposition_mobile }}">
                                @error('opposition_mobile')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="opposition_email" class="col-sm-4 col-form-label">Opposition
                                Email</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="opposition_email"
                                    name="opposition_email" value="{{ $data->opposition_email }}">
                                @error('opposition_email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="opposition_profession_id"
                                class="col-sm-4 col-form-label">Profession/Type</label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-md-6">
                                        <select name="opposition_profession_id" class="form-control select2"
                                            id="opposition_profession_id">
                                            <option value="">Select</option>
                                            @foreach ($profession as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $data->opposition_profession_id == $item->id ? 'selected' : '' }}>
                                                    {{ ucfirst($item->profession_name) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="opposition_profession_write"
                                            name="opposition_profession_write" placeholder="Profession Name"
                                            value="{{ $data->opposition_profession_write }}">
                                    </div>
                                </div>
                                @error('opposition_profession_write')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="opposition_division_id" class="col-sm-4 col-form-label">Division/Zone</label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-md-6">
                                        <select name="opposition_division_id" id="opposition_division_id"
                                            class="form-control select2" action="{{ route('find_district') }}">
                                            <option value="">Select</option>
                                            @foreach ($division as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $data->opposition_division_id == $item->id ? 'selected' : '' }}>
                                                    {{ ucfirst($item->division_name) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="opposition_divisoin_write"
                                            name="opposition_divisoin_write" placeholder="Opposition Zone"
                                            value="{{ $data->opposition_divisoin_write }}">
                                    </div>
                                </div>
                                @error('opposition_divisoin_write')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="opposition_district_id" class="col-sm-4 col-form-label">District/Area</label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-md-6">
                                        <select name="opposition_district_id" id="opposition_district_id"
                                            class="form-control select2" action="{{ route('find-thana') }}">
                                            <option value="">Select</option>

                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="opposition_district_write"
                                            name="opposition_district_write" placeholder="Opposition Area"
                                            value="{{ $data->opposition_district_write }}">
                                    </div>
                                </div>

                                @error('opposition_district_write')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="opposition_thana_id" class="col-sm-4 col-form-label">Thana/Branch</label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-md-6">
                                        <select name="opposition_thana_id" id="opposition_thana_id"
                                            class="form-control select2">
                                            <option value="">Select</option>

                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="opposition_thana_write"
                                            name="opposition_thana_write" placeholder="Opposition Branch"
                                            value="{{ $data->opposition_thana_write }}">
                                    </div>
                                </div>
                                @error('opposition_thana_write')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="opposition_representative_name" class="col-sm-4 col-form-label">Representative
                                Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="opposition_representative_name"
                                    name="opposition_representative_name"
                                    value="{{ $data->opposition_representative_name }}">
                                @error('opposition_representative_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="opposition_representative_details" class="col-sm-4 col-form-label">
                                Representative Details </label>
                            <div class="col-sm-8">
                                <textarea name="opposition_representative_details" class="form-control" rows="3" placeholder="">{{ $data->opposition_representative_details }}</textarea>
                                @error('opposition_representative_details')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="opposition_coordinator_tadbirkar_id" class="col-sm-4 col-form-label">
                                Coordinator/Tadbirkar </label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-md-6">
                                        <select name="opposition_coordinator_tadbirkar_id"
                                            id="opposition_coordinator_tadbirkar_id" class="form-control select2">
                                            <option value="">Select</option>
                                            @foreach ($coordinator as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $data->opposition_coordinator_tadbirkar_id == $item->id ? 'selected' : '' }}>
                                                    {{ $item->coordinator_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control"
                                            id="opposition_coordinator_tadbirkar_write"
                                            name="opposition_coordinator_tadbirkar_write" placeholder="Tadbirkar Name"
                                            value="{{ $data->opposition_coordinator_tadbirkar_write }}">
                                    </div>
                                </div>
                                @error('coordinator_tadbirkar_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="opposition_coordinator_details" class="col-sm-4 col-form-label"> Coordinator
                                Details </label>
                            <div class="col-sm-8">
                                <textarea name="opposition_coordinator_details" class="form-control" rows="3" placeholder="">{{ $data->opposition_coordinator_details }}</textarea>
                                @error('opposition_coordinator_details')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <div class="float-right">
                                <button type="submit" class="btn btn-primary text-uppercase"><i
                                        class="fas fa-save"></i> Update
                                </button>
                            </div>
                        </div>

                    </div>
                </form>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    {{-- opposite party Information --}}

    {{-- case Information --}}

    <div class="modal fade" id="modal-lg-case-info">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="card-title"> Edit Criminal Cases </h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('update-criminal-cases', $data->id) }}" method="post">
                    @csrf
                    <input type="hidden" value="case_information" name="case_information">

                    <div class="card-body">

                        <h6 class="text-uppercase text-bold"><u> Case Information </u>
                        </h6>
                        <div class="form-group row">
                            <label for="case_infos_division_id" class="col-sm-4 col-form-label">Division</label>
                            <div class="col-sm-8">
                                <select name="case_infos_division_id" class="form-control select2"
                                    id="case_infos_division_id" action="{{ route('find_district') }}">
                                    <option value="">Select</option>
                                    @foreach ($division as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $data->case_infos_division_id == $item->id ? 'selected' : '' }}>
                                            {{ ucfirst($item->division_name) }}</option>
                                    @endforeach
                                </select>
                                @error('case_infos_division_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="case_infos_district_id" class="col-sm-4 col-form-label">District</label>
                            <div class="col-sm-8">
                                <select name="case_infos_district_id" class="form-control select2"
                                    id="case_infos_district_id" action="{{ route('find-case-infos-thana') }}">
                                    <option value=""> Select</option>
                                    @foreach ($case_infos_existing_district as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $data->case_infos_district_id == $item->id ? 'selected' : '' }}>
                                            {{ ucfirst($item->district_name) }}</option>
                                    @endforeach
                                </select>
                                @error('case_infos_district_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="case_infos_thana_id" class="col-sm-4 col-form-label">Thana</label>
                            <div class="col-sm-8">
                                <select name="case_infos_thana_id" id="case_infos_thana_id"
                                    class="form-control select2">
                                    <option value="">Select</option>
                                    @foreach ($case_infos_existing_thana as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $data->case_infos_thana_id == $item->id ? 'selected' : '' }}>
                                            {{ ucfirst($item->thana_name) }}</option>
                                    @endforeach
                                </select>
                                @error('case_infos_thana_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="case_category_id" class="col-sm-4 col-form-label">Case
                                Category </label>
                            <div class="col-sm-8">
                                <select name="case_category_id" id="case_category_id" class="form-control select2"
                                    action="{{ route('find-case-type') }}">
                                    <option value="">Select</option>
                                    @foreach ($case_category as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $data->case_category_id == $item->id ? 'selected' : '' }}>
                                            {{ $item->case_category }}</option>
                                    @endforeach
                                </select>
                                @error('case_category_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        {{-- <div class="form-group row">
                            <label for="case_subcategory_id"
                                   class="col-sm-4 col-form-label">Case
                                Subcategory </label>
                            <div class="col-sm-8">

                                <select name="case_subcategory_id"
                                        id="case_subcategory_id"
                                        class="form-control select2">
                                    <option value="">Select</option>
                                    @foreach ($existing_case_subcategory as $item)
                                        <option
                                            value="{{ $item->id }}" {{( $data->case_subcategory_id  == $item->id ? 'selected':'')}}>{{ $item->case_subcategory }}</option>
                                    @endforeach
                                </select>
                                @error('case_subcategory_id')<span
                                    class="text-danger">{{$message}}</span>@enderror

                            </div>
                        </div> --}}
                        <div class="form-group row">
                            <label for="case_type_id" class="col-sm-4 col-form-label">Case Type </label>
                            <div class="col-sm-8">
                                <select name="case_type_id" id="case_type_id" class="form-control select2">
                                    <option value="">Select</option>
                                    @foreach ($exist_case_type as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $data->case_type_id == $item->id ? 'selected' : '' }}>
                                            {{ $item->case_types_name }}</option>
                                    @endforeach
                                </select>
                                @error('case_type_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="matter_id" class="col-sm-4 col-form-label">Case Matter</label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-md-6">
                                        <select name="matter_id" id="matter_id" class="form-control select2">
                                            <option value="">Select</option>
                                            @foreach ($matter as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $data->matter_id == $item->id ? 'selected' : '' }}>
                                                    {{ $item->matter_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="matter_write"
                                            name="matter_write" placeholder="Matter"
                                            value="{{ $data->matter_write }}">
                                    </div>
                                </div>


                                @error('matter_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="case_infos_case_title_id" class="col-sm-4 col-form-label">Case Title</label>
                            <div class="col-sm-8">
                                <select name="case_infos_case_title_id" id="case_infos_case_title_id"
                                    class="form-control select2">
                                    <option value="">Select</option>
                                    @foreach ($case_title as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $data->case_infos_case_title_id == $item->id ? 'selected' : '' }}>
                                            {{ $item->case_title_name }}</option>
                                    @endforeach

                                </select>
                                @error('case_infos_case_title_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="case_infos_case_no" class="col-sm-4 col-form-label">Case No</label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="case_infos_case_no"
                                            name="case_infos_case_no" placeholder="Case No"
                                            value="{{ $data->case_infos_case_no }}">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="case_infos_case_year"
                                            name="case_infos_case_year" placeholder="Case Year"
                                            value="{{ $data->case_infos_case_year }}">
                                    </div>
                                </div>

                                @error('legal_issue_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="case_infos_court_id" class="col-sm-4 col-form-label"> Name
                                of the Court </label>
                            <div class="col-sm-8">
                                <select name="case_infos_court_id[]" id="case_infos_court_id" class="form-control select2"
                                    data-placeholder="Select" multiple>
                                    <option value="">Select</option>
                                    @foreach ($exist_court_short as $item)
                                        <option value="{{ $item->court_name }}"
                                            {{ in_array($item->court_name, $court_explode) ? 'selected' : '' }}>
                                            {{ $item->court_name }}</option>
                                    @endforeach
                                </select>
                                @error('case_infos_court_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="case_infos_court_short_id" class="col-sm-4 col-form-label">Name of
                                Court(Short)</label>
                            <div class="col-sm-8">

                                <div class="row">
                                    <div class="col-md-6">
                                        <select name="case_infos_court_short_id[]" id="case_infos_court_short_id"
                                            class="form-control select2" data-placeholder="Select" multiple>
                                            <option value="">Select</option>
                                            @foreach ($exist_court_short as $item)
                                                <option value="{{ $item->court_short_name }}"
                                                    {{ in_array($item->court_short_name, $court_short_explode) ? 'selected' : '' }}>
                                                    {{ $item->court_short_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group hdtuto_court_short control-group increment_court_short">
                                            <input type="text" name="court_short_write[]"
                                                class="myfrm form-control col-12" placeholder="Court Name(Short)"
                                                value="{{ $data->court_short_write }}">
                                            <div class="input-group-btn">
                                                <button class="btn btn-success btn_success_court_short"
                                                    type="button"><i class="fldemo glyphicon glyphicon-plus"></i>+
                                                </button>
                                            </div>
                                        </div>
                                        <div class="clone_court_short hide">
                                            <div class="hdtuto_court_short control-group lst input-group"
                                                style="margin-top:10px">
                                                <input type="text" name="court_short_write[]"
                                                    class="myfrm form-control col-12">
                                                <div class="input-group-btn">
                                                    <button class="btn btn-danger btn_danger_court_short"
                                                        type="button"><i class="fldemo glyphicon glyphicon-remove"></i>
                                                        -
                                                    </button>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>

                                @error('client_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="case_infos_sub_seq_case_title_id" class="col-sm-4 col-form-label">Sub Seq. Case
                                Title</label>
                            <div class="col-sm-8">
                                <select name="case_infos_sub_seq_case_title_id" id="case_infos_sub_seq_case_title_id"
                                    class="form-control select2">
                                    <option value="">Select</option>
                                    @foreach ($case_title as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $data->case_infos_sub_seq_case_title_id == $item->id ? 'selected' : '' }}>
                                            {{ $item->case_title_name }}</option>
                                    @endforeach

                                </select>
                                @error('case_infos_sub_seq_case_title_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="case_infos_sub_seq_case_no" class="col-sm-4 col-form-label">Sub Seq. Case
                                No.</label>
                            <div class="col-sm-8">
                                <div
                                    class="input-group hdtuto_case_infos_sub_seq_case_no control-group increment_case_infos_sub_seq_case_no ml-2">
                                    <div class="row" style="">
                                        <input type="text" class="form-control col-5"
                                            id="case_infos_sub_seq_case_no" name="case_infos_sub_seq_case_no[]"
                                            placeholder="Case No."
                                            value="{{ rtrim($data->case_infos_sub_seq_case_no, ', ') }}">
                                        <input type="text" class="form-control col-5 ml-0"
                                            id="case_infos_sub_seq_case_year" name="case_infos_sub_seq_case_year[]"
                                            placeholder="Case Year"
                                            value="{{ rtrim($data->case_infos_sub_seq_case_year, ', ') }}">
                                        <div class="input-group-btn col-2">

                                            <button class="btn btn-success btn_success_case_infos_sub_seq_case_no ml-2"
                                                type="button"><i class="fldemo glyphicon glyphicon-plus"></i>+
                                            </button>
                                        </div>
                                    </div>

                                </div>
                                <div class="clone_case_infos_sub_seq_case_no hide ">
                                    <div class="hdtuto_case_infos_sub_seq_case_no control-group lst input-group ml-2"
                                        style="margin-top:10px">
                                        <div class="row" style="">
                                            <input type="text" class="form-control col-5"
                                                id="case_infos_sub_seq_case_no" name="case_infos_sub_seq_case_no[]"
                                                placeholder="Case No.">
                                            <input type="text" class="form-control col-5 ml-0"
                                                id="case_infos_sub_seq_case_year" name="case_infos_sub_seq_case_year[]"
                                                placeholder="Case Year">
                                            <div class="input-group-btn col-2">
                                                <button class="btn btn-danger btn_danger_case_infos_sub_seq_case_no ml-2"
                                                    type="button"><i class="fldemo glyphicon glyphicon-remove"></i> -
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                @error('case_infos_sub_seq_case_no')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="case_infos_sub_seq_court_id" class="col-sm-4 col-form-label"> Sub-Seq. Court
                            </label>
                            <div class="col-sm-8">
                                <select name="case_infos_sub_seq_court_id[]" id="case_infos_sub_seq_court_id" class="form-control select2"
                                    data-placeholder="Select" multiple>
                                    <option value="">Select</option>
                                    @foreach ($exist_court_short as $item)
                                        <option value="{{ $item->court_name }}"
                                            {{ in_array($item->court_name, $sub_seq_court_explode) ? 'selected' : '' }}>
                                            {{ $item->court_name }}</option>
                                    @endforeach
                                </select>
                                @error('case_infos_sub_seq_court_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="case_infos_sub_seq_court_short_id" class="col-sm-4 col-form-label">Sub-Seq.
                                Court(Short)</label>
                            <div class="col-sm-8">

                                <div class="row">
                                    <div class="col-md-6">
                                        <select name="case_infos_sub_seq_court_short_id[]"
                                            id="case_infos_sub_seq_court_short_id" class="form-control select2"
                                            data-placeholder="Select" multiple>
                                            <option value="">Select</option>
                                            @foreach ($exist_court_short as $item)
                                                <option value="{{ $item->court_short_name }}"
                                                    {{ in_array($item->court_short_name, $sub_seq_court_short_explode) ? 'selected' : '' }}>
                                                    {{ $item->court_short_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <div
                                            class="input-group hdtuto_sub_seq_court_short control-group increment_sub_seq_court_short">
                                            <input type="text" name="sub_seq_court_short_write[]"
                                                class="myfrm form-control col-12"
                                                placeholder="Sub-Seq. Court Name(Short)"
                                                value="{{ $data->sub_seq_court_short_write }}">
                                            <div class="input-group-btn">
                                                <button class="btn btn-success btn_success_sub_seq_court_short"
                                                    type="button"><i class="fldemo glyphicon glyphicon-plus"></i>+
                                                </button>
                                            </div>
                                        </div>
                                        <div class="clone_sub_seq_court_short hide">
                                            <div class="hdtuto_sub_seq_court_short control-group lst input-group"
                                                style="margin-top:10px">
                                                <input type="text" name="sub_seq_court_short_write[]"
                                                    class="myfrm form-control col-12">
                                                <div class="input-group-btn">
                                                    <button class="btn btn-danger btn_danger_sub_seq_court_short"
                                                        type="button"><i class="fldemo glyphicon glyphicon-remove"></i>
                                                        -
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @error('client_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="law_id" class="col-sm-4 col-form-label">
                                Law </label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-md-6">
                                        <select name="law_id[]" id="law_id" class="form-control select2"
                                            data-placeholder="Select" multiple>
                                            <option value="">Select</option>
                                            @foreach ($law as $item)
                                                <option value="{{ $item->law_name }}"
                                                    {{ in_array($item->law_name, $law_explode) ? 'selected' : '' }}>
                                                    {{ $item->law_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group hdtuto_law control-group increment_law">
                                            <input type="text" name="law_write[]" class="myfrm form-control col-12"
                                                placeholder="Law Name" value="{{ rtrim($data->law_write, ', ') }}">
                                            <div class="input-group-btn">
                                                <button class="btn btn-success btn_success_law" type="button"><i
                                                        class="fldemo glyphicon glyphicon-plus"></i>+
                                                </button>
                                            </div>
                                        </div>
                                        <div class="clone_law hide">
                                            <div class="hdtuto_law control-group lst input-group"
                                                style="margin-top:10px">
                                                <input type="text" name="law_write[]"
                                                    class="myfrm form-control col-12">
                                                <div class="input-group-btn">
                                                    <button class="btn btn-danger btn_danger_law" type="button"><i
                                                            class="fldemo glyphicon glyphicon-remove"></i> -
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @error('law')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="section_id" class="col-sm-4 col-form-label">
                                Section </label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-md-6">
                                        <select name="section_id[]" id="section_id" class="form-control select2"
                                            data-placeholder="Select" multiple>
                                            <option value="">Select</option>
                                            @foreach ($section as $item)
                                                <option value="{{ $item->section_name }}"
                                                    {{ in_array($item->section_name, $section_explode) == $item->id ? 'selected' : '' }}>
                                                    {{ $item->section_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group hdtuto_section control-group increment_section">
                                            <input type="text" name="section_write[]"
                                                class="myfrm form-control col-12" placeholder="Section Name"
                                                value="{{ rtrim($data->section_write, ', ') }}">
                                            <div class="input-group-btn">
                                                <button class="btn btn-success btn_success_section" type="button"><i
                                                        class="fldemo glyphicon glyphicon-plus"></i>+
                                                </button>
                                            </div>
                                        </div>
                                        <div class="clone_section hide">
                                            <div class="hdtuto_section control-group lst input-group"
                                                style="margin-top:10px">
                                                <input type="text" name="section_write[]"
                                                    class="myfrm form-control col-12">
                                                <div class="input-group-btn">
                                                    <button class="btn btn-danger btn_danger_section" type="button"><i
                                                            class="fldemo glyphicon glyphicon-remove"></i> -
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @error('section')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date_of_filing" class="col-sm-4 col-form-label">Case Filing
                                Date</label>
                            <div class="col-sm-8">
                                <span class="date_span">
                                    <input type="date" class="xDateContainer date_first_input"
                                        onchange="setCorrect(this,'xTime4');"><input type="text" id="xTime4"
                                        name="date_of_filing"
                                        @if ($data->date_of_filing != null) value="{{ $data->date_of_filing }}"
                                                                @else value="dd-mm-yyyy" @endif
                                        class="date_second_input" tabindex="-1"><span class="date_second_span"
                                        tabindex="-1">&#9660;</span>
                                </span>
                                @error('date_of_filing')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        {{-- <div class="form-group row">
                            <label for="case_status_id" class="col-sm-4 col-form-label">Status of
                                the Cases</label>
                            <div class="col-sm-8">
                                <select name="case_status_id" class="form-control select2">
                                    <option value="">Select</option>
                                    @foreach ($case_status as $item)
                                        <option
                                            value="{{ $item->id }}" {{( $data->case_status_id == $item->id ? 'selected':'')}}>{{ $item->case_status_name }}</option>
                                    @endforeach
                                </select>
                                @error('case_status_id')<span
                                    class="text-danger">{{$message}}</span>@enderror
                            </div>
                        </div> --}}

                        <div class="form-group row">
                            <label for="case_infos_complainant_informant_name" class="col-sm-4 col-form-label">
                                Complainant/Informant Name </label>
                            <div class="col-sm-8">

                                <div class="input-group hdtuto_complainant control-group increment_complainant">
                                    <input type="text" name="case_infos_complainant_informant_name[]"
                                        class="myfrm form-control"
                                        value="{{ rtrim($data->case_infos_complainant_informant_name, ', ') }}">
                                    <div class="input-group-btn">
                                        <button class="btn btn-success btn_success_complainant" type="button"><i
                                                class="fldemo glyphicon glyphicon-plus"></i>+
                                        </button>
                                    </div>
                                </div>
                                <div class="clone_complainant hide">
                                    <div class="hdtuto_complainant control-group lst input-group"
                                        style="margin-top:10px">
                                        <input type="text" name="case_infos_complainant_informant_name[]"
                                            class="myfrm form-control">
                                        <div class="input-group-btn">
                                            <button class="btn btn-danger btn_danger_complainant" type="button"><i
                                                    class="fldemo glyphicon glyphicon-remove"></i> -
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                @error('case_infos_complainant_informant_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="complainant_informant_representative" class="col-sm-4 col-form-label">
                                Complainant/Informant's Representative </label>
                            <div class="col-sm-8">

                                <div
                                    class="input-group hdtuto_complainant_representative control-group increment_complainant_representative">
                                    <input type="text" name="complainant_informant_representative[]"
                                        value="{{ rtrim($data->complainant_informant_representative, ', ') }}"
                                        class="myfrm form-control">
                                    <div class="input-group-btn">
                                        <button class="btn btn-success btn_success_complainant_representative"
                                            type="button"><i class="fldemo glyphicon glyphicon-plus"></i>+
                                        </button>
                                    </div>
                                </div>
                                <div class="clone_complainant_representative hide">
                                    <div class="hdtuto_complainant_representative control-group lst input-group"
                                        style="margin-top:10px">
                                        <input type="text" name="complainant_informant_representative[]"
                                            class="myfrm form-control">
                                        <div class="input-group-btn">
                                            <button class="btn btn-danger btn_danger_complainant_representative"
                                                type="button"><i class="fldemo glyphicon glyphicon-remove"></i> -
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                @error('complainant_informant_representative')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="case_infos_accused_name" class="col-sm-4 col-form-label">
                                Accused Name </label>
                            <div class="col-sm-8">

                                <div class="input-group hdtuto_accused control-group increment_accused">
                                    <input type="text" name="case_infos_accused_name[]"
                                        value="{{ rtrim($data->case_infos_accused_name, ', ') }}"
                                        class="myfrm form-control">
                                    <div class="input-group-btn">
                                        <button class="btn btn-success btn_success_accused" type="button"><i
                                                class="fldemo glyphicon glyphicon-plus"></i>+
                                        </button>
                                    </div>
                                </div>
                                <div class="clone_accused hide">
                                    <div class="hdtuto_accused control-group lst input-group" style="margin-top:10px">
                                        <input type="text" name="case_infos_accused_name[]"
                                            class="myfrm form-control">
                                        <div class="input-group-btn">
                                            <button class="btn btn-danger btn_danger_accused" type="button"><i
                                                    class="fldemo glyphicon glyphicon-remove"></i> -
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                @error('case_infos_accused_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="case_infos_accused_representative" class="col-sm-4 col-form-label">
                                Accused's Representative </label>
                            <div class="col-sm-8">

                                <div
                                    class="input-group hdtuto_accused_representative control-group increment_accused_representative">
                                    <input type="text" name="case_infos_accused_representative[]"
                                        value="{{ rtrim($data->case_infos_accused_representative, ', ') }}"
                                        class="myfrm form-control">
                                    <div class="input-group-btn">
                                        <button class="btn btn-success btn_success_accused_representative"
                                            type="button"><i class="fldemo glyphicon glyphicon-plus"></i>+
                                        </button>
                                    </div>
                                </div>
                                <div class="clone_accused_representative hide">
                                    <div class="hdtuto_accused_representative control-group lst input-group"
                                        style="margin-top:10px">
                                        <input type="text" name="case_infos_accused_representative[]"
                                            class="myfrm form-control">
                                        <div class="input-group-btn">
                                            <button class="btn btn-danger btn_danger_accused_representative"
                                                type="button"><i class="fldemo glyphicon glyphicon-remove"></i> -
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                @error('case_infos_accused_representative')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="prosecution_witness" class="col-sm-4 col-form-label">Prosecution
                                Witnesses</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="prosecution_witness"
                                    name="prosecution_witness" value="{{ $data->prosecution_witness }}">
                                @error('prosecution_witness')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="defense_witness" class="col-sm-4 col-form-label">Defense Witnesses</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="defense_witness"
                                    name="defense_witness" value="{{ $data->defense_witness }}">
                                @error('defense_witness')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="case_infos_allegation_claim_id" class="col-sm-4 col-form-label">
                                Allegation/Claim </label>
                            <div class="col-sm-8">

                                <div class="row">
                                    <div class="col-md-6">
                                        <select name="case_infos_allegation_claim_id" class="form-control select2">
                                            <option value="">Select</option>
                                            @foreach ($allegation as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $edit_case_steps->case_infos_allegation_claim_id == $item->id ? 'selected' : '' }}>
                                                    {{ $item->allegation_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">

                                        <input type="text" class="form-control"
                                            id="case_infos_allegation_claim_write"
                                            name="case_infos_allegation_claim_write" placeholder="Allegation"
                                            value="{{ $edit_case_steps->case_infos_allegation_claim_write }}">
                                    </div>
                                </div>

                                @error('case_infos_allegation_claim_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="amount_of_money" class="col-sm-4 col-form-label">Amount
                                of
                                Money</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="amount_of_money"
                                    name="amount_of_money" value="{{ $edit_case_steps->amount_of_money }}">
                                @error('amount_of_money')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="another_claim" class="col-sm-4 col-form-label">
                                Another
                                Claim(if
                                any) </label>
                            <div class="col-sm-8">
                                <textarea name="another_claim" class="form-control" rows="3" placeholder="">{{ $edit_case_steps->another_claim }}</textarea>
                                @error('another_claim')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="recovery_seizure_articles" class="col-sm-4 col-form-label">
                                Recovery/Seizure Articles </label>
                            <div class="col-sm-8">
                                <textarea name="recovery_seizure_articles" class="form-control" rows="3" placeholder="">{{ $edit_case_steps->recovery_seizure_articles }}</textarea>
                                @error('recovery_seizure_articles')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="summary_facts" class="col-sm-4 col-form-label">
                                Summary
                                of Facts </label>
                            <div class="col-sm-8">
                                <textarea name="summary_facts" class="form-control" rows="3" placeholder="">{{ $edit_case_steps->summary_facts }}</textarea>
                                @error('summary_facts')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="case_info_remarks" class="col-sm-4 col-form-label">
                                Remarks </label>
                            <div class="col-sm-8">
                                <textarea name="case_info_remarks" class="form-control" rows="3" placeholder="">{{ $edit_case_steps->case_info_remarks }}</textarea>
                                @error('case_info_remarks')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <div class="float-right">
                                <button type="submit" class="btn btn-primary text-uppercase"><i
                                        class="fas fa-save"></i> Update
                                </button>
                            </div>
                        </div>

                    </div>
                </form>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    {{-- case Information --}}

    {{-- case Information --}}

    <div class="modal fade" id="modal-lg-lawyers-info">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="card-title"> Edit Criminal Cases </h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('update-criminal-cases', $data->id) }}" method="post">
                    @csrf
                    <input type="hidden" value="lawyers_information" name="lawyers_information">
                    <div class="card-body">

                        <h6 class="text-uppercase text-bold"><u> Lawyers Information </u>
                        </h6>
                        <div class="form-group row">
                            <label for="lawyer_advocate_id" class="col-sm-4 col-form-label">Name of Advocate/Law
                                Firm</label>
                            <div class="col-sm-8">

                                <div class="row">
                                    <div class="col-md-6">
                                        <select name="lawyer_advocate_id" class="form-control select2"
                                            id="lawyer_advocate_id" action="{{ route('find-associates') }}">
                                            <option value="">Select</option>
                                            @foreach ($external_council as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $data->lawyer_advocate_id == $item->id ? 'selected' : '' }}>
                                                    {{ $item->first_name }} {{ $item->middle_name }}
                                                    {{ $item->last_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="lawyer_advocate_write"
                                            name="lawyer_advocate_write" placeholder="Advocate Name"
                                            value="{{ $data->lawyer_advocate_write }}">
                                    </div>
                                </div>

                                @error('client_profession_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="assigned_lawyer_id" class="col-sm-4 col-form-label">Name of Assigned
                                Lawyer</label>
                            <div class="col-sm-8">
                                <select name="assigned_lawyer_id[]" id="assigned_lawyer_id"
                                    class="form-control select2" data-placeholder="Select" multiple>
                                    <option value="">Select</option>
                                    @foreach ($existing_assignend_external_council as $item)
                                        <option
                                            value="{{ $item->first_name . ' ' . $item->middle_name . ' ' . $item->last_name }}"
                                            {{ in_array($item->first_name . ' ' . $item->middle_name . ' ' . $item->last_name, $assigned_lawyer_explode) ? 'selected' : '' }}>
                                            {{ $item->first_name }} {{ $item->middle_name }}
                                            {{ $item->last_name }}</option>
                                    @endforeach
                                </select>
                                @error('assigned_lawyer_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lawyers_remarks" class="col-sm-4 col-form-label"> Remarks </label>
                            <div class="col-sm-8">
                                <textarea name="lawyers_remarks" class="form-control" rows="3" placeholder="">{{ $data->lawyers_remarks }}</textarea>
                                @error('lawyers_remarks')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <div class="float-right">
                                <button type="submit" class="btn btn-primary text-uppercase"><i
                                        class="fas fa-save"></i> Update
                                </button>
                            </div>
                        </div>

                    </div>
                </form>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    {{-- case Information --}}

    {{-- case Information --}}

    <div class="modal fade" id="modal-lg-documents-info">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="card-title"> Edit Criminal Cases </h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('update-criminal-cases', $data->id) }}" method="post">
                    @csrf
                    <input type="hidden" value="documents_information" name="documents_information">
                    <div class="card-body">
                        <h6 class="text-uppercase text-bold"><u> Documents
                                Received </u></h6>

                        <div class="form-group row">
                            <div class="col-sm-12">
                                <div class="input-group hdtuto_received_documents control-group increment_received_documents">
                                    <select name="received_documents_id[]"
                                        class="form-control mr-3">
                                        <option value="">Select</option>
                                        @foreach($documents as $item)
                                            <option
                                                value="{{ $item->documents_name }}" {{ !empty($received_documents_explode[0]['received_documents_id']) && $received_documents_explode[0]['received_documents_id'] == $item->documents_name ? 'selected' : '' }}>{{ $item->documents_name }}</option>
                                        @endforeach
                                    </select>
                                    <input type="text" name="received_documents[]"
                                           class="myfrm form-control mr-2" value="{{ !empty($received_documents_explode[0]['received_documents']) && $received_documents_explode[0]['received_documents'] ? $received_documents_explode[0]['received_documents'] : '' }}">
                                    <input type="date" name="received_documents_date[]"
                                           class="myfrm form-control ml-2" value="{{ !empty($received_documents_explode[0]['received_documents_date']) && $received_documents_explode[0]['received_documents_date'] ? $received_documents_explode[0]['received_documents_date'] : '' }}">
                                    <div class="input-group-btn">
                                        <button class="btn btn-success btn_success_received_documents"
                                                type="button"><i
                                                class="fldemo glyphicon glyphicon-plus"></i>+
                                        </button>
                                    </div>
                                </div>
                                
                                <div class="clone_received_documents hide">
                                   
                                    <div class="hdtuto_received_documents control-group input-group"
                                         style="margin-top:10px">
                                         <select name="received_documents_id[]"
                                            class="form-control mr-3" >
                                            <option value="">Select</option>
                                            @foreach($documents as $item)
                                                <option
                                                    value="{{ $item->documents_name }}" {{ old('received_documents_id') == $item->documents_name ? 'selected' : '' }}>{{ $item->documents_name }}</option>
                                            @endforeach
                                        </select>
                                        <input type="text" name="received_documents[]"
                                               class="myfrm form-control mr-2">
                                        <input type="date" name="received_documents_date[]"
                                               class="myfrm form-control ml-2">
                                        <div class="input-group-btn">
                                            <button class="btn btn-danger btn_danger_received_documents"
                                                    type="button"><i
                                                    class="fldemo glyphicon glyphicon-remove"></i> -
                                            </button>
                                        </div>
                                    </div>
                                </div>


                                <div class="clone_received_documents @if(count($received_documents_explode) <= 1) hide @endif">
                                    @php
                                        array_shift($received_documents_explode);
                                    @endphp
                                    @foreach ( $received_documents_explode as $datas)
                                    <div class="hdtuto_received_documents control-group input-group"
                                         style="margin-top:10px">
                                         <select name="received_documents_id[]"
                                            class="form-control mr-3" >
                                            <option value="">Select</option>
                                            @foreach($documents as $item)
                                                <option
                                                    value="{{ $item->documents_name }}" {{ $datas['received_documents_id'] == $item->documents_name ? 'selected' : '' }}>{{ $item->documents_name }}</option>
                                            @endforeach
                                        </select>
                                        <input type="text" name="received_documents[]"
                                               class="myfrm form-control mr-2" value="{{ $datas['received_documents'] }}">
                                        <input type="date" name="received_documents_date[]"
                                               class="myfrm form-control ml-2" value="{{ $datas['received_documents_date'] }}">
                                        <div class="input-group-btn">
                                            <button class="btn btn-danger btn_danger_received_documents"
                                                    type="button"><i
                                                    class="fldemo glyphicon glyphicon-remove"></i> -
                                            </button>
                                        </div>
                                    </div>
                                    @endforeach
                                    

                                </div>

                                @error('case_infos_received_documents_informant_name')<span
                                    class="text-danger">{{$message}}</span>@enderror
                            </div>
                        </div>
                        <h6 class="text-uppercase text-bold">
                            <u> Documents
                                Required </u>
                        </h6>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <div class="input-group hdtuto_required_wanting_documents control-group increment_required_wanting_documents">
                                    <select name="required_wanting_documents_id[]"
                                        class="form-control mr-3">
                                        <option value="">Select</option>
                                        @foreach($documents as $item)
                                            <option
                                                value="{{ $item->documents_name }}" {{ !empty($required_wanting_documents_explode[0]['required_wanting_documents_id']) && $required_wanting_documents_explode[0]['required_wanting_documents_id']  == $item->documents_name ? 'selected' : '' }}>{{ $item->documents_name }}</option>
                                        @endforeach
                                    </select>
                                    <input type="text" name="required_wanting_documents[]"
                                           class="myfrm form-control mr-2" value="{{ !empty($required_wanting_documents_explode[0]['required_wanting_documents']) ? $required_wanting_documents_explode[0]['required_wanting_documents'] : '' }}">
                                    <input type="date" name="required_wanting_documents_date[]"
                                           class="myfrm form-control ml-2" value="{{ !empty($required_wanting_documents_explode[0]['required_wanting_documents_date']) ? $required_wanting_documents_explode[0]['required_wanting_documents_date'] : '' }}">
                                    <div class="input-group-btn">
                                        <button class="btn btn-success btn_success_required_wanting_documents"
                                                type="button"><i
                                                class="fldemo glyphicon glyphicon-plus"></i>+
                                        </button>
                                    </div>
                                </div>
                                
                                <div class="clone_required_wanting_documents hide">
                                   
                                    <div class="hdtuto_required_wanting_documents control-group input-group"
                                         style="margin-top:10px">
                                         <select name="required_wanting_documents_id[]"
                                            class="form-control mr-3" >
                                            <option value="">Select</option>
                                            @foreach($documents as $item)
                                                <option
                                                    value="{{ $item->documents_name }}" {{ old('required_wanting_documents_id') == $item->documents_name ? 'selected' : '' }}>{{ $item->documents_name }}</option>
                                            @endforeach
                                        </select>
                                        <input type="text" name="required_wanting_documents[]"
                                               class="myfrm form-control mr-2">
                                        <input type="date" name="required_wanting_documents_date[]"
                                               class="myfrm form-control ml-2">
                                        <div class="input-group-btn">
                                            <button class="btn btn-danger btn_danger_required_wanting_documents"
                                                    type="button"><i
                                                    class="fldemo glyphicon glyphicon-remove"></i> -
                                            </button>
                                        </div>
                                    </div>
                                </div>


                                <div class="clone_required_wanting_documents @if(count($required_wanting_documents_explode) <= 1) hide @endif">
                                    @php
                                        array_shift($required_wanting_documents_explode);
                                    @endphp
                                    @foreach ( $required_wanting_documents_explode as $datas)
                                    <div class="hdtuto_required_wanting_documents control-group input-group"
                                         style="margin-top:10px">
                                         <select name="required_wanting_documents_id[]"
                                            class="form-control mr-3" >
                                            <option value="">Select</option>
                                            @foreach($documents as $item)
                                                <option
                                                    value="{{ $item->documents_name }}" {{ $datas['required_wanting_documents_id'] == $item->documents_name ? 'selected' : '' }}>{{ $item->documents_name }}</option>
                                            @endforeach
                                        </select>
                                        <input type="text" name="required_wanting_documents[]"
                                               class="myfrm form-control mr-2" value="{{ $datas['required_wanting_documents'] }}">
                                        <input type="date" name="required_wanting_documents_date[]"
                                               class="myfrm form-control ml-2" value="{{ $datas['required_wanting_documents_date'] }}">
                                        <div class="input-group-btn">
                                            <button class="btn btn-danger btn_danger_required_wanting_documents"
                                                    type="button"><i
                                                    class="fldemo glyphicon glyphicon-remove"></i> -
                                            </button>
                                        </div>
                                    </div>
                                    @endforeach
                                    

                                </div>

                                @error('case_infos_required_wanting_documents_informant_name')<span
                                    class="text-danger">{{$message}}</span>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <div class="float-right">
                            <button type="submit" class="btn btn-primary text-uppercase"><i class="fas fa-save"></i>
                                Update
                            </button>
                        </div>
                    </div>
                </form>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    {{-- case Information --}}

    {{-- case Information --}}

    <div class="modal fade" id="modal-lg-case-steps">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="card-title"> Edit Criminal Cases </h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('update-criminal-cases', $data->id) }}" method="post">
                    @csrf
                    <input type="hidden" value="case_steps" name="case_steps">
                    <div class="card-body">

                        {{-- <h6 class="text-uppercase text-bold"><u> Case Steps </u>
                        </h6> --}}
                        <h6 class="text-uppercase text-bold">
                            <div class="row">
                                <div class="col-md-4"><u> Case Steps </u></div>
                                <div class="col-md-3">Date</div>
                                <div class="col-md-3">Note</div>
                                <div class="col-md-2">Yes/No</div>
                            </div>
                        </h6>
                        <div class="form-group row">
                            <label for="case_steps_filing" class="col-sm-4 col-form-label"> Filing
                                Date </label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="case_steps_filing"
                                    name="case_steps_filing" value="{{ $edit_case_steps->case_steps_filing }}"
                                    readonly>
                                @error('case_steps_filing')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="case_steps_filing_copy"
                                    name="case_steps_filing_copy"
                                    value="{{ $edit_case_steps->case_steps_filing_copy }}">
                                @error('case_steps_filing_copy')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-2">
                                <input type="checkbox" class="form-control" id="case_steps_filing_yes_no"
                                    name="case_steps_filing_yes_no"
                                    {{ $edit_case_steps->case_steps_filing_yes_no == 'Yes' ? 'checked' : '' }}>
                                @error('case_steps_filing_yes_no')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="taking_cognizance" class="col-sm-4 col-form-label"> Taking Cognizance </label>
                            <div class="col-sm-3">
                                <span class="date_span_steps">
                                    <input type="date" class="xDateContainer date_first_input"
                                        onchange="setCorrect(this,'taking_cognizance');">
                                    <input type="text" id="taking_cognizance" name="taking_cognizance"
                                        value="{{ $edit_case_steps->taking_cognizance }}"
                                        class="date_second_input_steps" tabindex="-1">
                                    <span class="date_second_span" tabindex="-1">&#9660;</span>
                                </span>
                                @error('taking_cognizance')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="taking_cognizance_copy"
                                    name="taking_cognizance_copy"
                                    value="{{ $edit_case_steps->taking_cognizance_copy }}">
                                @error('taking_cognizance_copy')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-2">
                                <input type="checkbox" class="form-control" id="taking_cognizance_yes_no"
                                    name="taking_cognizance_yes_no"
                                    {{ $edit_case_steps->taking_cognizance_yes_no == 'Yes' ? 'checked' : '' }}>
                                @error('taking_cognizance_yes_no')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="arrest_surrender_cw" class="col-sm-4 col-form-label"> Arrest/Surrender/C.W.
                            </label>
                            <div class="col-sm-3">
                                <span class="date_span_steps">
                                    <input type="date" class="xDateContainer date_first_input"
                                        onchange="setCorrect(this,'arrest_surrender_cw');">
                                    <input type="text" id="arrest_surrender_cw" name="arrest_surrender_cw"
                                        value="{{ $edit_case_steps->arrest_surrender_cw }}"
                                        class="date_second_input_steps" tabindex="-1">
                                    <span class="date_second_span" tabindex="-1">&#9660;</span>
                                </span>
                                @error('arrest_surrender_cw')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="arrest_surrender_cw_copy"
                                    name="arrest_surrender_cw_copy"
                                    value="{{ $edit_case_steps->arrest_surrender_cw_copy }}">
                                @error('arrest_surrender_cw_copy')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-2">
                                <input type="checkbox" class="form-control" id="arrest_surrender_cw_yes_no"
                                    name="arrest_surrender_cw_yes_no"
                                    {{ $edit_case_steps->arrest_surrender_cw_yes_no == 'Yes' ? 'checked' : '' }}>
                                @error('arrest_surrender_cw_yes_no')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="case_steps_bail" class="col-sm-4 col-form-label"> Bail </label>
                            <div class="col-sm-3">
                                <span class="date_span_steps">
                                    <input type="date" class="xDateContainer date_first_input"
                                        onchange="setCorrect(this,'case_steps_bail');">
                                    <input type="text" id="case_steps_bail" name="case_steps_bail"
                                        value="{{ $edit_case_steps->case_steps_bail }}"
                                        class="date_second_input_steps" tabindex="-1">
                                    <span class="date_second_span" tabindex="-1">&#9660;</span>
                                </span>
                                @error('case_steps_bail')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="case_steps_bail_copy"
                                    name="case_steps_bail_copy"
                                    value="{{ $edit_case_steps->case_steps_bail_copy }}">
                                @error('case_steps_bail_copy')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-2">
                                <input type="checkbox" class="form-control" id="case_steps_bail_yes_no"
                                    name="case_steps_bail_yes_no"
                                    {{ $edit_case_steps->case_steps_bail_yes_no == 'Yes' ? 'checked' : '' }}>
                                @error('case_steps_bail_yes_no')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="case_steps_court_transfer" class="col-sm-4 col-form-label"> Court Transfer
                            </label>
                            <div class="col-sm-3">
                                <span class="date_span_steps">
                                    <input type="date" class="xDateContainer date_first_input"
                                        onchange="setCorrect(this,'case_steps_court_transfer');">
                                    <input type="text" id="case_steps_court_transfer"
                                        name="case_steps_court_transfer"
                                        value="{{ $edit_case_steps->case_steps_court_transfer }}"
                                        class="date_second_input_steps" tabindex="-1">
                                    <span class="date_second_span" tabindex="-1">&#9660;</span>
                                </span>
                                @error('case_steps_court_transfer')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="case_steps_court_transfer_copy"
                                    name="case_steps_court_transfer_copy"
                                    value="{{ $edit_case_steps->case_steps_court_transfer_copy }}">
                                @error('case_steps_court_transfer_copy')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-2">
                                <input type="checkbox" class="form-control" id="case_steps_court_transfer_yes_no"
                                    name="case_steps_court_transfer_yes_no"
                                    {{ $edit_case_steps->case_steps_court_transfer_yes_no == 'Yes' ? 'checked' : '' }}>
                                @error('case_steps_court_transfer_yes_no')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="case_steps_charge_framed" class="col-sm-4 col-form-label"> Charge Framed
                            </label>
                            <div class="col-sm-3">
                                <span class="date_span_steps">
                                    <input type="date" class="xDateContainer date_first_input"
                                        onchange="setCorrect(this,'case_steps_charge_framed');">
                                    <input type="text" id="case_steps_charge_framed"
                                        name="case_steps_charge_framed"
                                        value="{{ $edit_case_steps->case_steps_charge_framed }}"
                                        class="date_second_input_steps" tabindex="-1">
                                    <span class="date_second_span" tabindex="-1">&#9660;</span>
                                </span>
                                @error('case_steps_charge_framed')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="case_steps_charge_framed_copy"
                                    name="case_steps_charge_framed_copy"
                                    value="{{ $edit_case_steps->case_steps_charge_framed_copy }}">
                                @error('case_steps_charge_framed_copy')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-2">
                                <input type="checkbox" class="form-control" id="case_steps_charge_framed_yes_no"
                                    name="case_steps_charge_framed_yes_no"
                                    {{ $edit_case_steps->case_steps_charge_framed_yes_no == 'Yes' ? 'checked' : '' }}>
                                @error('case_steps_charge_framed_yes_no')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="case_steps_witness_from" class="col-sm-4 col-form-label"> Witness (From)
                            </label>
                            <div class="col-sm-3">
                                <span class="date_span_steps">
                                    <input type="date" class="xDateContainer date_first_input"
                                        onchange="setCorrect(this,'case_steps_witness_from');">
                                    <input type="text" id="case_steps_witness_from" name="case_steps_witness_from"
                                        value="{{ $edit_case_steps->case_steps_witness_from }}"
                                        class="date_second_input_steps" tabindex="-1">
                                    <span class="date_second_span" tabindex="-1">&#9660;</span>
                                </span>
                                @error('case_steps_witness_from')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="case_steps_witness_from_copy"
                                    name="case_steps_witness_from_copy"
                                    value="{{ $edit_case_steps->case_steps_witness_from_copy }}">
                                @error('case_steps_witness_from_copy')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-2">
                                <input type="checkbox" class="form-control" id="case_steps_witness_from_yes_no"
                                    name="case_steps_witness_from_yes_no"
                                    {{ $edit_case_steps->case_steps_witness_from_yes_no == 'Yes' ? 'checked' : '' }}>
                                @error('case_steps_witness_from_yes_no')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="case_steps_witness_to" class="col-sm-4 col-form-label"> Witness (To) </label>
                            <div class="col-sm-3">
                                <span class="date_span_steps">
                                    <input type="date" class="xDateContainer date_first_input"
                                        onchange="setCorrect(this,'case_steps_witness_to');">
                                    <input type="text" id="case_steps_witness_to" name="case_steps_witness_to"
                                        value="{{ $edit_case_steps->case_steps_witness_to }}"
                                        class="date_second_input_steps" tabindex="-1">
                                    <span class="date_second_span" tabindex="-1">&#9660;</span>
                                </span>
                                @error('case_steps_witness_to')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="case_steps_witness_to_copy"
                                    name="case_steps_witness_to_copy"
                                    value="{{ $edit_case_steps->case_steps_witness_to_copy }}">
                                @error('case_steps_witness_to_copy')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-2">
                                <input type="checkbox" class="form-control" id="case_steps_witness_to_yes_no"
                                    name="case_steps_witness_to_yes_no"
                                    {{ $edit_case_steps->case_steps_witness_to_yes_no == 'Yes' ? 'checked' : '' }}>
                                @error('case_steps_witness_to_yes_no')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="case_steps_argument" class="col-sm-4 col-form-label"> Argument </label>
                            <div class="col-sm-3">
                                <span class="date_span_steps">
                                    <input type="date" class="xDateContainer date_first_input"
                                        onchange="setCorrect(this,'case_steps_argument');">
                                    <input type="text" id="case_steps_argument" name="case_steps_argument"
                                        value="{{ $edit_case_steps->case_steps_argument }}"
                                        class="date_second_input_steps" tabindex="-1">
                                    <span class="date_second_span" tabindex="-1">&#9660;</span>
                                </span>
                                @error('case_steps_argument')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="case_steps_argument_copy"
                                    name="case_steps_argument_copy"
                                    value="{{ $edit_case_steps->case_steps_argument_copy }}">
                                @error('case_steps_argument_copy')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-2">
                                <input type="checkbox" class="form-control" id="case_steps_argument_yes_no"
                                    name="case_steps_argument_yes_no"
                                    {{ $edit_case_steps->case_steps_argument_yes_no == 'Yes' ? 'checked' : '' }}>
                                @error('case_steps_argument_yes_no')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="case_steps_judgement_order" class="col-sm-4 col-form-label"> Judgement &
                                Order </label>
                            <div class="col-sm-3">
                                <span class="date_span_steps">
                                    <input type="date" class="xDateContainer date_first_input"
                                        onchange="setCorrect(this,'case_steps_judgement_order');">
                                    <input type="text" id="case_steps_judgement_order"
                                        name="case_steps_judgement_order"
                                        value="{{ $edit_case_steps->case_steps_judgement_order }}"
                                        class="date_second_input_steps" tabindex="-1">
                                    <span class="date_second_span" tabindex="-1">&#9660;</span>
                                </span>
                                @error('case_steps_judgement_order')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="case_steps_judgement_order_copy"
                                    name="case_steps_judgement_order_copy"
                                    value="{{ $edit_case_steps->case_steps_judgement_order_copy }}">
                                @error('case_steps_judgement_order_copy')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-2">
                                <input type="checkbox"
                                    {{ $edit_case_steps->case_steps_judgement_order_yes_no == 'Yes' ? 'checked' : '' }}
                                    class="form-control" id="case_steps_judgement_order_yes_no"
                                    name="case_steps_judgement_order_yes_no">
                                @error('case_steps_judgement_order_yes_no')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="case_steps_summary_of_cases" class="col-sm-4 col-form-label"> Summary of Case </label>
                            <div class="col-sm-3">
                                <span class="date_span_steps">
                                    <input type="date" class="xDateContainer date_first_input"
                                           onchange="setCorrect(this,'case_steps_summary_of_cases');">
                                    <input type="text" id="case_steps_summary_of_cases" name="case_steps_summary_of_cases"
                                    value="{{  $edit_case_steps->case_steps_summary_of_cases }}" class="date_second_input_steps"
                                           tabindex="-1">
                                    <span class="date_second_span" tabindex="-1">&#9660;</span>
                                </span>
                                @error('case_steps_summary_of_cases')<span
                                    class="text-danger">{{$message}}</span>@enderror
                            </div>
                            <div class="col-sm-3">
                                <input type="text" class="form-control"
                                       id="case_steps_summary_of_cases_copy"
                                       name="case_steps_summary_of_cases_copy"
                                       value="{{$edit_case_steps->case_steps_summary_of_cases_copy}}">
                                @error('case_steps_summary_of_cases_copy')<span
                                    class="text-danger">{{$message}}</span>@enderror
                            </div>
                            <div class="col-sm-2">
                                <input type="checkbox" class="form-control"
                                       id="case_steps_summary_of_cases_yes_no"
                                       name="case_steps_summary_of_cases_yes_no"
                                       {{ $edit_case_steps->case_steps_summary_of_cases_yes_no == 'Yes' ? 'checked': '' }}>
                                @error('case_steps_summary_of_cases_yes_no')<span
                                    class="text-danger">{{$message}}</span>@enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="case_steps_remarks" class="col-sm-4 col-form-label"> Remarks </label>
                            <div class="col-sm-8">
                                <textarea name="case_steps_remarks" class="form-control" rows="3" placeholder="">{{ $edit_case_steps->case_steps_remarks }}</textarea>
                                @error('case_steps_remarks')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <div class="float-right">
                                <button type="submit" class="btn btn-primary text-uppercase"><i
                                        class="fas fa-save"></i> Update
                                </button>
                            </div>
                        </div>

                    </div>
                </form>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


    {{-- documents add --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <form method="post" action="{{ route('upload-criminal-cases-files', $data->id) }}"
            enctype="multipart/form-data">
            @csrf
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Document</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label for="uploaded_document" class="col-sm-4 col-form-label">Document Upload</label>
                                <div class="col-sm-8">
                                    <input type="file" class="form-control" id="uploaded_document"
                                        name="uploaded_document" value="{{ old('uploaded_document') }}">
                                    @error('uploaded_document')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <div class="float-right">
                            <button type="submit" class="btn btn-primary text-uppercase"><i class="fas fa-save"></i>
                                Save
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="modal fade" id="edit_document" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <form method="post" action="{{ route('update-criminal-cases-files') }}" enctype="multipart/form-data">
            @csrf
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Document</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label for="uploaded_document" class="col-sm-4 col-form-label">Document Upload</label>
                                <div class="col-sm-8">
                                    <span id="files_id"></span>
                                    <input type="file" class="form-control" id="uploaded_document"
                                        name="uploaded_document" value="{{ old('uploaded_document') }}">
                                    @error('uploaded_document')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <div class="float-right">
                            <button type="submit" class="btn btn-primary text-uppercase"><i class="fas fa-save"></i>
                                Save
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    {{-- documents add --}}
    {{-- case Information --}}

    {{-- billings log --}}

    <div class="modal fade" id="modal-bill">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="card-title"> Add Billing </h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('save-criminal-cases-billing', $data->id) }}" method="post">
                    @csrf
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group row">
                                    <label for="bill_date" class="col-sm-4 col-form-label">
                                        Bill Date
                                    </label>
                                    <div class="col-sm-8">
                                        <span class="date_span_status_modal">
                                            <input type="date" class="xDateContainer date_first_input"
                                                onchange="setCorrect(this,'bill_date');"><input type="text"
                                                id="bill_date" name="bill_date" value="dd-mm-yyyy"
                                                class="date_second_input" tabindex="-1"><span
                                                class="date_second_span" tabindex="-1">&#9660;</span>
                                        </span>
                                        @error('bill_date')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="bill_for_the_date" class="col-sm-4 col-form-label">
                                        Bill for the Date
                                    </label>
                                    <div class="col-sm-8">
                                        <span class="date_span_status_modal">
                                            <input type="date" class="xDateContainer date_first_input"
                                                onchange="setCorrect(this,'bill_for_the_date');"><input type="text"
                                                id="bill_for_the_date" name="bill_for_the_date" value="dd-mm-yyyy"
                                                class="date_second_input" tabindex="-1"><span
                                                class="date_second_span" tabindex="-1">&#9660;</span>
                                        </span>
                                        @error('bill_for_the_date')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="bill_particulars_id" class="col-md-4 col-form-label"> Bill Particulars
                                    </label>
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <select name="bill_particulars_id[]" id="bill_particulars_id" multiple
                                                    data-placeholder="Select" class="form-control select2">
                                                    <option value="">Select</option>
                                                    @foreach ($bill_particulars as $item)
                                                        <option value="{{ $item->bill_particulars_name }}"
                                                            {{ old('bill_particulars_id') == $item->id ? 'selected' : '' }}>
                                                            {{ $item->bill_particulars_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" id="bill_particulars"
                                                    name="bill_particulars" placeholder="Bill Particulars"
                                                    value="">
                                            </div>
                                        </div>

                                        @error('updated_fixed_for')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="bill_type_id" class="col-md-4 col-form-label"> Bill Type
                                    </label>
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <select name="bill_type_id" id="bill_type_id"
                                                    class="form-control select2">
                                                    <option value="">Select</option>
                                                    @foreach ($bill_type as $item)
                                                        <option value="{{ $item->id }}"
                                                            {{ old('bill_type_id') == $item->id ? 'selected' : '' }}>
                                                            {{ $item->bill_type_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" id="bill_type"
                                                    name="bill_type" placeholder="Bill Type" value="">
                                            </div>
                                        </div>

                                        @error('updated_fixed_for')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="bill_schedule_id" class="col-sm-4 col-form-label">Bill Schedule</label>
                                    <div class="col-sm-8">
                                        <select name="bill_schedule_id" class="form-control select2"
                                            id="bill_schedule_id">
                                            <option value=""> Select </option>
                                            @foreach ($bill_schedule as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ old('bill_schedule_id') == $item->id ? 'selected' : '' }}>
                                                    {{ $item->bill_schedule_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('bill_schedule_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="bill_amount" class="col-sm-4 col-form-label">Bill Amount</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="bill_amount"
                                            name="bill_amount" value="{{ old('bill_amount') }}">
                                        @error('bill_amount')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="payment_amount" class="col-sm-4 col-form-label">Payment Amount</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="payment_amount"
                                            name="payment_amount" value="{{ old('payment_amount') }}">
                                        @error('payment_amount')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="bill_submitted" class="col-sm-4 col-form-label">
                                        Bill Submitted
                                    </label>
                                    <div class="col-sm-8">
                                        <span class="date_span_status_modal">
                                            <input type="date" class="xDateContainer date_first_input"
                                                onchange="setCorrect(this,'bill_submitted');"><input type="text"
                                                id="bill_submitted" name="bill_submitted" value="dd-mm-yyyy"
                                                class="date_second_input" tabindex="-1"><span
                                                class="date_second_span" tabindex="-1">&#9660;</span>
                                        </span>
                                        @error('bill_submitted')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="payment_received" class="col-sm-4 col-form-label">
                                        Payment Received
                                    </label>
                                    <div class="col-sm-8">
                                        <span class="date_span_status_modal">
                                            <input type="date" class="xDateContainer date_first_input"
                                                onchange="setCorrect(this,'payment_received');"><input type="text"
                                                id="payment_received" name="payment_received" value="dd-mm-yyyy"
                                                class="date_second_input" tabindex="-1"><span
                                                class="date_second_span" tabindex="-1">&#9660;</span>
                                        </span>
                                        @error('payment_received')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="payment_mode_id" class="col-sm-4 col-form-label">Payment Mode</label>
                                    <div class="col-sm-8">
                                        <select name="payment_mode_id" class="form-control select2"
                                            id="payment_mode_id">
                                            <option value=""> Select </option>
                                            @foreach ($payment_mode as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ old('payment_mode_id') == $item->id ? 'selected' : '' }}>
                                                    {{ $item->payment_mode_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('payment_mode_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <div class="float-right">
                                <button type="submit" class="btn btn-primary text-uppercase"><i
                                        class="fas fa-save"></i> Save
                                </button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    {{-- update status fo the case --}}

    <div class="modal fade" id="modal-lg-status-of-the-case">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="card-title"> Edit Status of the Case </h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('update-criminal-cases-status-column', $data->id) }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="updated_case_status_id" class="col-sm-4 col-form-label">Status</label>
                            <div class="col-sm-8">
                                <select name="updated_case_status_id" id="updated_case_status_id"
                                    class="form-control select2">
                                    <option value="">Select</option>
                                    @foreach ($case_status as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('updated_case_status_id') == $item->id ? 'selected' : '' }}>
                                            {{ $item->case_status_name }}</option>
                                    @endforeach
                                </select>
                                @error('updated_case_status_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <div class="float-right">
                                <button type="submit" class="btn btn-primary text-uppercase"><i
                                        class="fas fa-save"></i> Update
                                </button>
                            </div>
                        </div>

                    </div>
                </form>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="modal-lg-letter-notice">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="card-title"> Edit Criminal Cases </h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('update-criminal-cases-status-column', $data->id) }}" method="post">
                    @csrf
                    <div class="card-body">
                        <h6 class="text-uppercase text-bold"><u> Letter / Notice / Reply </u></h6>
                                                                        <h6 class="text-uppercase text-bold">
                                                                            <div class="row">
                                                                                <div class="col-md-3"> Date </div>
                                                                                <div class="col-md-3"> Document Name </div>
                                                                                <div class="col-md-3"> Particulars </div>
                                                                                <div class="col-md-1"> ORG </div>
                                                                                <div class="col-md-1"> PHT </div>
                                                                            </div>
                                                                        </h6>
                                                                        <div class="form-group row">
                                                                            <div class="col-sm-12">
                                                                                <div class="input-group hdtuto_letter_notice control-group increment_letter_notice">
                                                                                    <input type="date" name="letter_notice_date[]"
                                                                                           class="myfrm form-control mr-2 col-md-4" value="{{ !empty($letter_notice_explode[0]['letter_notice_date']) ? $letter_notice_explode[0]['letter_notice_date'] : '' }}">
                                                                                    <select name="letter_notice_documents_id[]"
                                                                                        class="form-control mr-2 col-md-3">
                                                                                        <option value="">Select</option>
                                                                                        @foreach($documents as $item)
                                                                                            <option
                                                                                                value="{{ $item->documents_name }}" {{ !empty($letter_notice_explode[0]['letter_notice_documents_id']) && $letter_notice_explode[0]['letter_notice_documents_id']  == $item->documents_name ? 'selected' : '' }}>{{ $item->documents_name }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    <input type="text" name="letter_notice_documents_write[]"
                                                                                           class="myfrm form-control mr-2 col-md-4" value="{{ !empty($letter_notice_explode[0]['letter_notice_documents_write']) ? $letter_notice_explode[0]['letter_notice_documents_write'] : '' }}">
                                                                                    <select name="letter_notice_particulars_id[]"
                                                                                        class="form-control col-md-3 mr-2">
                                                                                        <option value="">Select</option>
                                                                                        @foreach($particulars as $item)
                                                                                            <option
                                                                                                value="{{ $item->particulars_name }}" {{ !empty($letter_notice_explode[0]['letter_notice_particulars_id']) && $letter_notice_explode[0]['letter_notice_particulars_id']  == $item->particulars_name ? 'selected' : '' }}>{{ $item->particulars_name }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    <input type="text" name="letter_notice_particulars_write[]"
                                                                                           class="myfrm form-control mr-2 col-md-4" value="{{ !empty($letter_notice_explode[0]['letter_notice_particulars_write']) ? $letter_notice_explode[0]['letter_notice_particulars_write'] : '' }}">
                                                                                    <input type="checkbox" name="letter_notice_org[]"
                                                                                           class="myfrm form-control col-md-1" @if (!empty($letter_notice_explode[0]['letter_notice_org']) && $letter_notice_explode[0]['letter_notice_org'] == '1') checked @endif>
                                                                                    <input type="checkbox" name="letter_notice_pht[]"
                                                                                           class="myfrm form-control mr-2 col-md-1" @if (!empty($letter_notice_explode[0]['letter_notice_pht']) && $letter_notice_explode[0]['letter_notice_pht'] == '1') checked @endif>
                                                                                    
                                                                                    <div class="input-group-btn">
                                                                                        <button class="btn btn-success btn_success_letter_notice"
                                                                                                type="button"><i
                                                                                                class="fldemo glyphicon glyphicon-plus"></i>+
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="clone_letter_notice hide">
                                                                                    <div class="hdtuto_letter_notice control-group lst input-group"
                                                                                         style="margin-top:10px">
                                                                                         <input type="date" name="letter_notice_date[]"
                                                                                           class="myfrm form-control mr-2 col-md-4">
                                                                                    <select name="letter_notice_documents_id[]"
                                                                                        class="form-control mr-2 col-md-3">
                                                                                        <option value="">Select</option>
                                                                                        @foreach($documents as $item)
                                                                                            <option
                                                                                                value="{{ $item->documents_name }}" {{ old('letter_notice_id') == $item->id ? 'selected' : '' }}>{{ $item->documents_name }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    <input type="text" name="letter_notice_documents_write[]"
                                                                                           class="myfrm form-control mr-2 col-md-4">
                                                                                    <select name="letter_notice_particulars_id[]"
                                                                                        class="form-control col-md-3 mr-2">
                                                                                        <option value="">Select</option>
                                                                                        @foreach($particulars as $item)
                                                                                            <option
                                                                                                value="{{ $item->particulars_name }}" {{ old('letter_notice_id') == $item->id ? 'selected' : '' }}>{{ $item->particulars_name }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    <input type="text" name="letter_notice_particulars_write[]"
                                                                                           class="myfrm form-control mr-2 col-md-4">
                                                                                    <input type="checkbox" name="letter_notice_org[]"
                                                                                           class="myfrm form-control col-md-1">
                                                                                    <input type="checkbox" name="letter_notice_pht[]"
                                                                                           class="myfrm form-control mr-2 col-md-1">
                                                                                        <div class="input-group-btn">
                                                                                            <button class="btn btn-danger btn_danger_letter_notice"
                                                                                                    type="button"><i
                                                                                                    class="fldemo glyphicon glyphicon-remove"></i> -
                                                                                            </button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="clone_letter_notice @if(count($letter_notice_explode) <= 1) hide @endif">
                                                                                    @php
                                                                                        array_shift($letter_notice_explode);
                                                                                    @endphp
                                                                                    @foreach ( $letter_notice_explode as $datas)
                                                                                    <div class="hdtuto_letter_notice control-group lst input-group"
                                                                                         style="margin-top:10px">
                                                                                         <input type="date" name="letter_notice_date[]"
                                                                                           class="myfrm form-control mr-2 col-md-4" value="{{ $datas['letter_notice_date'] }}">
                                                                                        <select name="letter_notice_documents_id[]"
                                                                                            class="form-control mr-2 col-md-3">
                                                                                            <option value="">Select</option>
                                                                                            @foreach($documents as $item)
                                                                                                <option
                                                                                                    value="{{ $item->documents_name }}" {{ $datas['letter_notice_documents_id'] == $item->documents_name ? 'selected' : '' }}>{{ $item->documents_name }}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                        <input type="text" name="letter_notice_documents_write[]"
                                                                                           class="myfrm form-control mr-2 col-md-4" value="{{ $datas['letter_notice_documents_write'] }}">
                                                                                        <select name="letter_notice_particulars_id[]"
                                                                                            class="form-control col-md-3 mr-2">
                                                                                            <option value="">Select</option>
                                                                                            @foreach($particulars as $item)
                                                                                                <option
                                                                                                    value="{{ $item->particulars_name }}" {{ $datas['letter_notice_particulars_id'] == $item->particulars_name ? 'selected' : '' }}>{{ $item->particulars_name }}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                        <input type="text" name="letter_notice_particulars_write[]"
                                                                                           class="myfrm form-control mr-2 col-md-4" value="{{ $datas['letter_notice_particulars_write'] }}">
                                                                                        <input type="checkbox" name="letter_notice_org[]"
                                                                                            class="myfrm form-control col-md-1" @if ($datas['letter_notice_org'] == '1') checked @endif >
                                                                                        <input type="checkbox" name="letter_notice_pht[]"
                                                                                            class="myfrm form-control mr-2 col-md-1" @if ($datas['letter_notice_pht'] == '1') checked @endif>
                                                                                        <div class="input-group-btn">
                                                                                            <button class="btn btn-danger btn_danger_letter_notice"
                                                                                                    type="button"><i
                                                                                                    class="fldemo glyphicon glyphicon-remove"></i> -
                                                                                            </button>
                                                                                        </div>
                                                                                    </div>
                                                                                    @endforeach
                                                                                </div>
                        
                                                                                @error('case_infos_letter_notice_informant_name')<span
                                                                                    class="text-danger">{{$message}}</span>@enderror
                                                                            </div>
                                                                        </div>


                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <div class="float-right">
                                <button type="submit" class="btn btn-primary text-uppercase"><i
                                        class="fas fa-save"></i> Update
                                </button>
                            </div>
                        </div>

                    </div>
                </form>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    {{-- update status of the case --}}

    {{-- billings log --}}
    {{-- update cases modal --}}


    <div class="modal fade" id="modal-lg-send-messages">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="card-title"> Send Messages </h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('send-messages-for-criminal-cases', $data->id) }}" method="post">
                    @csrf
                    <div class="card-body">
                        <input type="hidden" name="case_no"
                            value="{{ $data->case_infos_case_no ? $data->case_infos_case_title_name . ' ' . $data->case_infos_case_no . ' of ' . $data->case_infos_case_year : '' }}@if ($data->sub_seq_case_title_name != null) , @endif
                        {{ $data->sub_seq_case_title_name }}
                        @php
                            $case_infos_sub_seq_case_no = explode(', ',trim($data->case_infos_sub_seq_case_no));
                            $key = array_key_last($case_infos_sub_seq_case_no);
                            echo $case_infos_sub_seq_case_no[$key];

                            $case_infos_sub_seq_case_year = explode(', ',trim($data->case_infos_sub_seq_case_year));
                            $key = array_key_last($case_infos_sub_seq_case_year);
                            $last_case_no = $case_infos_sub_seq_case_year[$key];
                            if ($last_case_no != null) {
                                echo '/'.$last_case_no;
                            }
                        @endphp">
                        <input type="hidden" name="client_name" value="{{ $data->client_name }}">
                        <div class="form-group row">
                            <div class="form-check ml-2">
                                <input class="form-check-input" type="checkbox" name="send_sms" id="send_sms">
                                <label class="form-check-label mt-1" for="send_sms">
                                    Send SMS
                                </label>
                            </div>
                            <div class="form-check ml-2">
                                <input class="form-check-input" type="checkbox" name="send_mail" id="send_mail">
                                <label class="form-check-label mt-1" for="send_mail">
                                    Send Mail
                                </label>
                            </div>
                        </div>
                        <div class="form-group row" id="mobile" style="display: none;">
                            <label for="client_mobile" class="col-sm-4 col-form-label">Client Mobile</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="client_mobile"
                                    name="client_mobile" value="{{ $data->client_mobile }}" readonly>
                                @error('client_mobile')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row" id="mail" style="display: none;">
                            <label for="client_email" class="col-sm-4 col-form-label">Client Email</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="client_email"
                                    name="client_email" value="{{ $data->client_email }}" readonly>
                                @error('client_email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="messages" class="col-sm-4 col-form-label"> Messages </label>
                            <div class="col-sm-8">
                                <textarea name="messages" id="messages" class="form-control" rows="5"
                                                              placeholder="">{{old('messages')}}</textarea>
                                @error('messages')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <div class="float-right">
                                <button type="submit" class="btn btn-primary text-uppercase"><i
                                        class="fas fa-save"></i> Send
                                </button>
                            </div>
                        </div>

                    </div>
                </form>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


@endsection
