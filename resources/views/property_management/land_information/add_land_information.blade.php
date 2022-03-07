@extends('layouts.admin_layouts.admin_layout')
@section('content')



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Land Information</h1>

                    </div><!-- /.col -->



                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">
                                <a class="leading-normal inline-flex items-center font-normal spark-button-focus h-8 text-md px-4 bg-transparent border-0 border-solid text-blue-700 hover:text-blue-800 active:text-blue-700 rounded-md" type="button" href="{{ route('land-information') }}" aria-disabled="false" role="link" tabindex="-1">Back</a>
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
                                <h3 class="card-title" id="heading">Add Land Information</h3>
                            </div>

                            <form action="{{ route('save-land-information') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="property_type_id" class="col-sm-4 col-form-label">Property Type</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control select2" id="property_type_id" name="property_type_id">
                                                        <option value="">Select</option>
                                                        @foreach ($property_type as $item)
                                                            <option value="{{ $item->id }}" {{ (old('property_type_id') == $item->id ? 'selected' : '' ) }}>{{ $item->property_type_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('property_type_id')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="district_id" class="col-sm-4 col-form-label"> District </label>
                                                <div class="col-sm-8">
                                                    <select name="district_id" class="form-control select2" id="district_id" action="{{ route('find-thana') }}">
                                                        <option value="">Select</option>
                                                        @foreach($district as $item)
                                                            <option value="{{ $item->id }}" {{(old('district_id') == $item->id ? 'selected' : '')}}>{{ $item->district_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('district_id')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="thana_id" class="col-sm-4 col-form-label">Thana</label>
                                                <div class="col-sm-8">
                                                    <select name="thana_id" class="form-control select2" id="thana_id">
                                                        <option value=""> Select </option>

                                                    </select>  
                                                    @error('thana_id')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="seller_id" class="col-sm-4 col-form-label">Seller Name</label>
                                                <div class="col-sm-8">
                                                    <select name="seller_id" class="form-control select2" id="seller_id" action="{{ route('find-seller-details') }}">
                                                        <option value="">Select</option>
                                                        @foreach($seller as $item)
                                                            <option value="{{ $item->id }}" {{(old('seller_id') == $item->id ? 'selected' : '')}}>{{ $item->seller_buyer_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('seller_id')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>

                                            <div id="seller_details"></div>

                                            <div class="form-group row">
                                                <label for="buyer_id" class="col-sm-4 col-form-label"> Buyer Name </label>
                                                <div class="col-sm-8">
                                                    <select name="buyer_id" class="form-control select2" id="buyer_id" action="{{ route('find-buyer-details') }}">
                                                        <option value="">Select</option>
                                                        @foreach($buyer as $item)
                                                            <option value="{{ $item->id }}" {{(old('buyer_id') == $item->id ? 'selected' : '')}}>{{ $item->seller_buyer_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('buyer_id')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>

                                            <div id="buyer_details"></div>
                                            <div class="form-group row">
                                                <label for="cs_khatian" class="col-sm-4 col-form-label">CS Khatian</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="cs_khatian" name="cs_khatian" value="{{old('cs_khatian')}}">
                                                    @error('cs_khatian')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="cs_dag" class="col-sm-4 col-form-label"> CS Dag</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="cs_dag" name="cs_dag" value="{{old('cs_dag')}}">   
                                                    @error('cs_dag')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="sa_khatian" class="col-sm-4 col-form-label">SA Khatian </label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="sa_khatian" name="sa_khatian" value="{{old('sa_khatian')}}">
                                                    @error('sa_khatian')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="sa_dag" class="col-sm-4 col-form-label"> SA Dag  </label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="sa_dag" name="sa_dag" value="{{old('sa_dag')}}">
                                                    @error('sa_dag')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="rs_khatian" class="col-sm-4 col-form-label">RS Khatian</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="rs_khatian" name="rs_khatian" value="{{old('rs_khatian')}}">
                                                    @error('rs_khatian')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="rs_dag" class="col-sm-4 col-form-label"> RS Dag </label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="rs_dag" name="rs_dag" value="{{old('rs_dag')}}">
                                                    @error('rs_dag')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="bs_khatian" class="col-sm-4 col-form-label"> BS Khatian </label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="bs_khatian" name="bs_khatian" value="{{old('bs_khatian')}}">
                                                    @error('bs_khatian')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="bs_dag" class="col-sm-4 col-form-label"> BS Dag  </label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="bs_dag" name="bs_dag" value="{{old('bs_dag')}}">
                                                    @error('bs_dag')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="khatian_dag_city_jorip" class="col-sm-4 col-form-label">Khatian & Dag City Jorip</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="khatian_dag_city_jorip" name="khatian_dag_city_jorip" value="{{old('khatian_dag_city_jorip')}}">

                                                    @error('khatian_dag_city_jorip')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="land_area" class="col-sm-4 col-form-label">Land Area (in Decimal)</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="land_area" name="land_area" value="{{old('land_area')}}">
                                                    @error('land_area')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="deed_no" class="col-sm-4 col-form-label">Deed No.</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="deed_no" name="deed_no" value="{{old('deed_no')}}">
                                                    @error('deed_no')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="date_of_deed" class="col-sm-4 col-form-label">Date of Deed</label>
                                                <div class="col-sm-8">
                                                    <input type="date" class="form-control" id="date_of_deed" name="date_of_deed" value="{{old('date_of_deed')}}">
                                                    @error('date_of_deed')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="deed_value" class="col-sm-4 col-form-label"> Deed Value </label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="deed_value" name="deed_value" value="{{old('deed_value')}}">
                                                    @error('deed_value')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            
                                            
                                            <div class="form-group row">
                                                <label for="possession" class="col-sm-4 col-form-label"> Possession </label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="possession" name="possession" value="{{old('possession')}}">
                                                    @error('possession')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="boundary_wall" class="col-sm-4 col-form-label"> Boundary Wall </label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="boundary_wall" name="boundary_wall" value="{{old('boundary_wall')}}">
                                                    @error('boundary_wall')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="any_dispute" class="col-sm-4 col-form-label"> Any Dispute </label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="any_dispute" name="any_dispute" value="{{old('any_dispute')}}">
                                                    @error('any_dispute')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="any_suit_case" class="col-sm-4 col-form-label"> Any Suit/Case </label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="any_suit_case" name="any_suit_case" value="{{old('any_suit_case')}}">
                                                    @error('any_suit_case')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="property_owner" class="col-sm-4 col-form-label">Name of Owner of the Property</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="property_owner" name="property_owner" value="{{old('property_owner')}}">
                                                    @error('property_owner')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="mouza_name" class="col-sm-4 col-form-label">Mouza Name</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="mouza_name" name="mouza_name" value="{{old('mouza_name')}}">
                                                    @error('mouza_name')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="mutation_khatian_no" class="col-sm-4 col-form-label">Mutation Khatian No.</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="mutation_khatian_no" name="mutation_khatian_no" value="{{old('mutation_khatian_no')}}">
                                                    @error('mutation_khatian_no')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="mutation_case_no" class="col-sm-4 col-form-label">Mutation Case No.</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="mutation_case_no" name="mutation_case_no" value="{{old('mutation_case_no')}}">
                                                    @error('mutation_case_no')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="mutation_khatian_owner" class="col-sm-4 col-form-label">Mutation Khatian Owner(Previous Owner)</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="mutation_khatian_owner" name="mutation_khatian_owner" value="{{old('mutation_khatian_owner')}}">
                                                    @error('mutation_khatian_owner')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="dcr_number" class="col-sm-4 col-form-label">DCR Number</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="dcr_number" name="dcr_number" value="{{old('dcr_number')}}">
                                                    @error('dcr_number')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="dcr_date" class="col-sm-4 col-form-label">DCR Date</label>
                                                <div class="col-sm-8">
                                                    <input type="date" class="form-control" id="dcr_date" name="dcr_date" value="{{old('dcr_date')}}">
                                                    @error('dcr_date')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="register_office_name" class="col-sm-4 col-form-label">Name of Register Office</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="register_office_name" name="register_office_name" value="{{old('register_office_name')}}">
                                                    @error('register_office_name')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="land_compliance" class="col-sm-4 col-form-label"> Land Compliance </label>
                                                <div class="col-sm-8">
                                                    <input type="checkbox" class="mt-2" id="land_compliance" name="land_compliance" value="compliance">
                                                </div>
                                            </div>

                                            <div id="compliance_input" style="display: none;">                                          
                                                <div class="form-group row">
                                                    <label for="electricity" class="col-sm-4 col-form-label"> Electricity </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="electricity" name="electricity" value="{{old('electricity')}}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="gas" class="col-sm-4 col-form-label"> Gas </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="gas" name="gas" value="{{old('gas')}}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="sewerage" class="col-sm-4 col-form-label"> Sewerage </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="sewerage" name="sewerage" value="{{old('sewerage')}}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="water" class="col-sm-4 col-form-label"> Water </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="water" name="water" value="{{old('water')}}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="expires" class="col-sm-4 col-form-label"> Expires </label>
                                                    <div class="col-sm-8">
                                                        <input type="date" class="form-control" id="expires" name="expires" value="{{old('expires')}}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="renew" class="col-sm-4 col-form-label"> Renew </label>
                                                    <div class="col-sm-8">
                                                        <input type="date" class="form-control" id="renew" name="renew" value="{{old('renew')}}">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="uploaded_document"> Document Upload </label>
                                                <div class="input-group hdtuto control-group lst increment">
                                                    <input type="file" name="uploaded_document[]" class="myfrm form-control">
                                                    <div class="input-group-btn">
                                                        <button class="btn btn-success" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>+</button>
                                                    </div>
                                                </div>
                                                <div class="clone hide" style="display: none;">
                                                    <div class="hdtuto control-group lst input-group" style="margin-top:10px;">
                                                        <input type="file" name="uploaded_document[]" class="myfrm form-control">
                                                        <div class="input-group-btn">
                                                            <button class="btn btn-danger" type="button"><i class="fldemo glyphicon glyphicon-remove"></i> - </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="float-right mt-4">
                                            <button type="submit" class="btn btn-primary text-uppercase"><i class="fas fa-save"></i> Save</button>
                                        </div>


                                </div>
                            </form>

                        </div>
                    </div>

                </div>
        </section>
        <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->




@endsection




