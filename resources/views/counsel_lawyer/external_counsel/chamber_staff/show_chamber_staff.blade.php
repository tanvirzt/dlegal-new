@extends('layouts.admin_layouts.admin_layout')
@section('content')



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Chamber Staff</h1>

                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">
                                <a  type="button" href="{{ route('chamber-staff') }}" aria-disabled="false"
                                    role="link" tabindex="-1">Back </a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content" id="section1st">
            <div class="container-fluid py-2">
                <div class="col-md-12">

                <div class="card">
                    <div>
                        
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-6">

                                    <div class="appeal_case_info">
                                        <div class="card">
                                            <div class="card-body">
                                                <h6 class="text-uppercase text-bold"><u> CHAMBER INFORMATION </u>
                                                    
                                                </h6>
                                                <table class="table table-bordered">
                                                    <tbody>
                                                    <tr>
                                                        <td width="50%">Name</td>
                                                        <td width="50%"> {{ $data->chamber_name }} </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Role</td>
                                                        <td>{{ $data->counsel_role_id }}</td>
                                                    </tr>
                                                    </tbody>
                                                </table>                               
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                                <h6 class="text-uppercase text-bold"><u> PERSONAL INFORMATION </u>
                                                    
                                                </h6>
                                                <table class="table table-bordered">

                                                    <tbody>
                                                    <tr>
                                                        <td width="50%">Name</td>
                                                        <td width="50%"> {{ $data->counsel_name }} </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Father Name</td>
                                                        <td> {{ $data->father_name }} </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Mother Name</td>
                                                        <td>{{ $data->mother_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Spouse Name</td>
                                                        <td>{{ $data->spouse_name }}</td>
                                                            

                                                    </tr>
                                                    <tr>
                                                        <td>Present Address</td>
                                                        <td>{{ $data->present_address }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Permanent Address</td>
                                                        <td>{{ $data->permanent_address }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Date of Birth</td>
                                                        <td>{{ $data->date_of_birth }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>NID Number</td>
                                                        <td>{{ $data->nid_number }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Mobile Number</td>
                                                        <td>{{ $data->mobile_number }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Email</td>
                                                        <td>{{ $data->email }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Emergency Contact</td>
                                                        <td>{{ $data->emergency_contact }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Relation</td>
                                                        <td>{{ $data->relation }}</td>
                                                    </tr>
                                                    
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
                                                <h6 class="text-uppercase text-bold"><u> PROFESSIONAL INFORMATION </u>
                                                    
                                                </h6>
                                                <table class="table table-bordered">

                                                    <tbody>

                                                    <tr>
                                                        <td width="50%">Name</td>
                                                        <td width="50%" colspan="2"> {{ $data->professional_name }} </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="50%">S.S.C</td>
                                                        <td width="25%">{{ $data->ssc_year }}</td>
                                                        <td width="25%">{{ $data->ssc_institution }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>H.S.C</td>
                                                        <td>{{ $data->hsc_year }}</td>
                                                        <td>{{ $data->hsc_institution }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>LL.B (Hons)</td>
                                                        <td>{{ $data->llb_year }}</td>
                                                        <td>{{ $data->llb_institution }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Professional Contact Number</td>
                                                        <td>{{ $data->professional_contact_number }}</td>
                                                        <td>{{ $data->professional_contact_number_write }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Professional Email</td>
                                                        <td>{{ $data->professional_email }}</td>
                                                        <td>{{ $data->professional_email_write }}</td>
                                                    </tr>
                                                
                                                    <tr>
                                                        <td>Professoinal Experience - 1</td>
                                                        <td>{{ $data->professional_experience_one }} </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Professoinal Experience - 2</td>
                                                        <td>{{ $data->professional_experience_two }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Date of Joining (Chamber)</td>
                                                        <td>{{ $data->date_of_joining }}</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                                <h6 class="text-uppercase text-bold"><u> DOCUMENTS RECEIVED </u>
                                                    
                                                </h6>
                                                <table class="table table-bordered">

                                                    <tbody>
                                                @foreach ($data->documents_received as $item)
                                                    <tr>
                                                        <td>{{ received_documents($item->received_documents_id)->documents_name }}</td>
                                                        <td>{{ $item->received_documents }}</td>
                                                        <td>{{ $item->received_documents_date }}</td>
                                                        <td>{{ received_documents_type($item->received_documents_type_id)->documents_type_name }}</td>
                                                    </tr>
                                                @endforeach
                                                    
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                                <h6 class="text-uppercase text-bold"><u> DOCUMENTS REQUIRED </u>
                                                    
                                                </h6>
                                                <table class="table table-bordered">

                                                    <tbody>

                                                    @foreach ($data->documents_required as $item)
                                                        <tr>
                                                            <td>{{ received_documents($item->required_wanting_documents_id)->documents_name }}</td>
                                                            <td>{{ $item->required_wanting_documents }}</td>
                                                            <td>{{ $item->required_wanting_documents_date }}</td>
                                                            <td>{{ received_documents_type($item->required_wanting_documents_type_id)->documents_type_name }}</td>
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



   

                    </div>
                </div>

                </div>
            </div>
            </section>


    </div>

@endsection



