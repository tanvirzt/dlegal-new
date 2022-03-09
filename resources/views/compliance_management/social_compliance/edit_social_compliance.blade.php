@extends('layouts.admin_layouts.admin_layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Social Compliance</h1>

                    </div><!-- /.col -->



                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">
                                <a class="leading-normal inline-flex items-center font-normal spark-button-focus h-8 text-md px-4 bg-transparent border-0 border-solid text-blue-700 hover:text-blue-800 active:text-blue-700 rounded-md"
                                    type="button" href="{{ route('social-compliance') }}" aria-disabled="false"
                                    role="link" tabindex="-1">Back</a>
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
                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                            {{ Session::get('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="card">
                        <div class="">

                            <section class="panel">
                                <div class="card-header">
                                    <h3 class="card-title">

                                        <ul class="nav custom_top_tab">
                                            <li class="">
                                                <a data-toggle="tab" href="#home" class="active">Labour Law
                                                    Compliance</a>
                                            </li>
                                            <li class="">
                                                <a data-toggle="tab" href="#about">Safety and Security</a>
                                            </li>
                                            <li class="">
                                                <a data-toggle="tab" href="#buyer_investor">Buyer/Investor Compliance</a>
                                            </li>

                                    </h3>
                                    <div class="float-right">
                                        <a href="{{ route('view-social-compliance', $data->id) }}"><button
                                                class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top"
                                                title="Details"><i class="fas fa-eye"></i></button></a>
                                    </div>
                                </div>
                                <form action="{{ route('update-social-compliance', $data->id) }}" method="post"
                                    enctype="multipart/form-data">


                                    <div class="panel-body">
                                        <div class="tab-content">
                                            <div id="home" class="tab-pane active">
                                                <div class="card-header">
                                                    <h3 class="card-title" id="heading">Labour Law Compliance</h3>
                                                    
                                                </div>
                                                @csrf
                                                <div class="card-body">

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label for="employment_condition"
                                                                    class="col-sm-4 col-form-label">Employment
                                                                    Condition</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control"
                                                                        id="employment_condition"
                                                                        name="employment_condition"
                                                                        value="{{ $data->employment_condition }}">
                                                                    @error('employment_condition')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="working_hour_leave"
                                                                    class="col-sm-4 col-form-label">Working Hour &
                                                                    Leave</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control"
                                                                        id="working_hour_leave" name="working_hour_leave"
                                                                        value="{{ $data->working_hour_leave }}">
                                                                    @error('working_hour_leave')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="compensation_benefit"
                                                                    class="col-sm-4 col-form-label">Compensation &
                                                                    Benefit</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control"
                                                                        id="compensation_benefit"
                                                                        name="compensation_benefit"
                                                                        value="{{ $data->compensation_benefit }}">
                                                                    @error('compensation_benefit')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>


                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label for="hygine_safety"
                                                                    class="col-sm-4 col-form-label">Hygine and
                                                                    Safety</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control"
                                                                        id="hygine_safety" name="hygine_safety"
                                                                        value="{{ $data->hygine_safety }}">
                                                                    @error('hygine_safety')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="welfare_security"
                                                                    class="col-sm-4 col-form-label"> Welfare & Security
                                                                </label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control"
                                                                        id="welfare_security" name="welfare_security"
                                                                        value="{{ $data->welfare_security }}">
                                                                    @error('welfare_security')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="industrial_relation"
                                                                    class="col-sm-4 col-form-label"> Industrial Relation
                                                                </label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control"
                                                                        id="industrial_relation" name="industrial_relation"
                                                                        value="{{ $data->industrial_relation }}">
                                                                    @error('industrial_relation')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="float-right mt-4">
                                                        <button type="submit" class="btn btn-primary text-uppercase"><i
                                                                class="fas fa-save"></i> Update </button>
                                                    </div>


                                                </div>


                                            </div>
                                            <div id="about" class="tab-pane">
                                                <div class="panel-body">
                                                    <div class="tab-content">
                                                        <div id="home" class="tab-pane active">

                                                            <div class="card-header">
                                                                <h3 class="card-title" id="heading">Safety and Security
                                                                </h3>
                                                                
                                                            </div>

                                                            @csrf
                                                            <div class="card-body">

                                                                <div class="row">

                                                                    <div class="col-md-6">

                                                                        <div class="form-group row">
                                                                            <label for="labour_law_safety"
                                                                                class="col-sm-4 col-form-label">
                                                                                Labour Law Safety
                                                                            </label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control"
                                                                                    id="labour_law_safety"
                                                                                    name="labour_law_safety"
                                                                                    value="{{ $data->labour_law_safety }}">
                                                                                @error('labour_law_safety')
                                                                                    <span
                                                                                        class="text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="bnbc_safety"
                                                                                class="col-sm-4 col-form-label">
                                                                                BNBC Safety
                                                                            </label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control"
                                                                                    id="bnbc_safety" name="bnbc_safety"
                                                                                    value="{{ $data->bnbc_safety }}">
                                                                                @error('bnbc_safety')
                                                                                    <span
                                                                                        class="text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="fire_safety"
                                                                                class="col-sm-4 col-form-label"> Fire Safety
                                                                            </label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control"
                                                                                    id="fire_safety" name="fire_safety"
                                                                                    value="{{ $data->fire_safety }}">
                                                                                @error('fire_safety')
                                                                                    <span
                                                                                        class="text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group row">
                                                                            <label for="electrical_safety"
                                                                                class="col-sm-4 col-form-label">
                                                                                Electrical Safety
                                                                            </label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control"
                                                                                    id="electrical_safety"
                                                                                    name="electrical_safety"
                                                                                    value="{{ $data->electrical_safety }}">
                                                                                @error('electrical_safety')
                                                                                    <span
                                                                                        class="text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="natural_disaster"
                                                                                class="col-sm-4 col-form-label"> Natural
                                                                                Disaster
                                                                            </label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control"
                                                                                    id="natural_disaster"
                                                                                    name="natural_disaster"
                                                                                    value="{{ $data->natural_disaster }}">
                                                                                @error('natural_disaster')
                                                                                    <span
                                                                                        class="text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="float-right mt-4">
                                                                    <button type="submit"
                                                                        class="btn btn-primary text-uppercase"><i
                                                                            class="fas fa-save"></i> Update </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="buyer_investor" class="tab-pane">

                                                <div class="card-header">
                                                    <h3 class="card-title" id="heading">Buyer/Investor Compliance</h3>
                                                    
                                                </div>

                                                @csrf
                                                <div class="card-body">

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label for="code_of_conduct"
                                                                    class="col-sm-4 col-form-label">Code of Conduct
                                                                </label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control"
                                                                        id="code_of_conduct" name="code_of_conduct"
                                                                        value="{{ $data->code_of_conduct }}">
                                                                    @error('code_of_conduct')
                                                                        <span
                                                                            class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="col-md-6">

                                                            <div class="form-group row">
                                                                <label for="international_standard"
                                                                    class="col-sm-4 col-form-label">International Standard
                                                                </label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control"
                                                                        id="international_standard"
                                                                        name="international_standard"
                                                                        value="{{ $data->international_standard }}">
                                                                    @error('international_standard')
                                                                        <span
                                                                            class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div class="float-right mt-4">
                                                        <button type="submit" class="btn btn-primary text-uppercase"><i
                                                                class="fas fa-save"></i> Update </button>
                                                    </div>


                                                </div>


                                </form>
                        </div>
        </section>
    </div>
    </div>

    </div>
    </section>
    <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->
@endsection
