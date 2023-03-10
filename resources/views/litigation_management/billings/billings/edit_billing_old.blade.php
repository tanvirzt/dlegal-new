@extends('layouts.admin_layouts.admin_layout')
@section('content')



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Billing</h1>

                    </div><!-- /.col -->



                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">
                                <a class="leading-normal inline-flex items-center font-normal spark-button-focus h-8 text-md px-4 bg-transparent border-0 border-solid text-blue-700 hover:text-blue-800 active:text-blue-700 rounded-md" type="button" href="{{ route('billing') }}" aria-disabled="false" role="link" tabindex="-1">Back</a>
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
                                <h3 class="card-title" id="heading">Edit Billing</h3>
                            </div>

                            <form action="{{ route('update-billing',$data->id) }}" method="post">
                                @csrf
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="case_no" class="col-sm-4 col-form-label">Bill Type</label>
                                                <div class="col-sm-8">
                                                    <select name="bill_type_id" class="form-control select2" id="bill_type_id">
                                                        <option value=""> Select </option>
                                                            @foreach($bill_type as $item)
                                                                <option value="{{ $item->id }}" {{($data->bill_type_id == $item->id ? 'selected':'')}}>{{ $item->bill_type_name }}</option>
                                                            @endforeach
                                                    </select>       
                                                    @error('bill_type_id')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="payment_type" class="col-sm-4 col-form-label"> Payment Type </label>
                                                <div class="col-sm-8">
                                                    <select name="payment_type" class="form-control select2" id="payment_type">
                                                        <option value=""> Select </option>
                                                        <option @if ($data->payment_type == "Cash Payment") selected @endif value="Cash Payment"> Cash Payment </option>
                                                        <option @if ($data->payment_type == "Bank Payment") selected @endif value="Bank Payment"> Bank Payment </option>
                                                        <option @if ($data->payment_type == "Digital Payment") selected @endif value="Digital Payment"> Digital Payment </option>
                                                    </select>       
                                                    @error('payment_type')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="district_id" class="col-sm-4 col-form-label">District</label>
                                                <div class="col-sm-8">
                                                    <select name="district_id" class="form-control select2" id="district_id">
                                                        <option value=""> Select </option>
                                                        @foreach($district as $item)
                                                            <option value="{{ $item->id }}" {{($data->district_id == $item->id ? 'selected':'')}}>{{ $item->district_name }}</option>
                                                        @endforeach
                                                    </select>       
                                                    @error('district_id')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="case_type" class="col-sm-4 col-form-label"> Case Type </label>
                                                <div class="col-sm-8">
                                                    <select name="case_type" class="form-control select2" id="case_type" action="{{ route('find-case-no') }}">
                                                        <option value=""> Select </option>
                                                        <option @if ($data->case_type == "Civil Cases") selected @endif value="Civil Cases"> Civil Cases </option>
                                                        <option @if ($data->case_type == "Criminal Cases") selected @endif value="Criminal Cases"> Criminal Cases </option>
                                                        <option @if ($data->case_type == "Labour Cases") selected @endif value="Labour Cases"> Labour Cases </option>
                                                        <option @if ($data->case_type == "Special Quassi - Judicial Cases") selected @endif value="Special Quassi - Judicial Cases"> Special Quassi - Judicial Cases </option>
                                                        <option @if ($data->case_type == "Supreme Court of Bangladesh") selected @endif value="Supreme Court of Bangladesh"> Supreme Court of Bangladesh </option>
                                                        <option @if ($data->case_type == "High Court Division") selected @endif value="High Court Division"> High Court Division </option>
                                                        <option @if ($data->case_type == "Appellate Court Division") selected @endif value="Appellate Court Division"> Appellate Court Division </option>
                                                    </select>       
                                                    @error('case_type')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="case_no" class="col-sm-4 col-form-label"> Case No </label>
                                                <div class="col-sm-8">
                                                    <select name="case_no" class="form-control select2" id="case_no">
                                                        <option value=""> Select </option>
                                                        @foreach($case_no as $item)
                                                            <option value="{{ $item->case_no }}" {{($data->case_no == $item->case_no ? 'selected':'')}}>{{ $item->case_no }}</option>
                                                        @endforeach
                                                    </select>       
                                                    @error('case_no')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="panel_lawyer_id" class="col-sm-4 col-form-label">Panel Lawyer</label>
                                                <div class="col-sm-8">
                                                        <select name="panel_lawyer_id" class="form-control select2">
                                                            <option value="">Select</option>
                                                            @foreach($external_council as $item)
                                                                <option value="{{ $item->id }}" {{($data->panel_lawyer_id == $item->id ? 'selected':'')}}>{{ $item->first_name }} {{ $item->middle_name }} {{ $item->last_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('panel_lawyer_id')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="bill_amount" class="col-sm-4 col-form-label">Bill Amount</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="bill_amount" name="bill_amount" value="{{ $data->bill_amount }}">
                                                    @error('bill_amount')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">  
                                            <div class="form-group row">
                                                <label for="date_of_billing" class="col-sm-4 col-form-label">Date of the Billing</label>
                                                <div class="col-sm-8">
                                                    <input type="date" class="form-control" id="date_of_billing" name="date_of_billing" value="{{ $data->date_of_billing }}">
                                                    @error('date_of_billing')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row" id="bank" @if ($data->bank_id == "") style="display:none;" @endif>
                                                <label for="bank_id" class="col-sm-4 col-form-label"> Name of Bank </label>
                                                <div class="col-sm-8">
                                                    <select name="bank_id" class="form-control select2" id="bank_id" action="{{ route('find-bank-branch') }}">
                                                        <option value=""> Select </option>
                                                            @foreach($bank as $item)
                                                                <option value="{{ $item->id }}" {{($data->bank_id == $item->id ? 'selected':'')}}>{{ $item->bank_name }}</option>
                                                            @endforeach
                                                    </select>       
                                                    @error('bank_id')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row" id="branch" @if ($data->branch_id == "") style="display:none;" @endif>
                                                <label for="branch_id" class="col-sm-4 col-form-label"> Branch </label>
                                                <div class="col-sm-8">
                                                    <select name="branch_id" class="form-control select2" id="branch_id">
                                                        <option value=""> Select </option>
                                                        @foreach($bank_branch as $item)
                                                            <option value="{{ $item->id }}" {{($data->branch_id == $item->id ? 'selected':'')}}>{{ $item->bank_branch_name }}</option>
                                                        @endforeach
                                                    </select>       
                                                    @error('branch_id')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row" id="cheque" @if ($data->cheque_no == "") style="display:none;" @endif>
                                                <label for="cheque_no" class="col-sm-4 col-form-label">Checque No.</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="cheque_no" name="cheque_no" value="{{ $data->cheque_no }}">
                                                    @error('cheque_no')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row" id="payment_amounts" @if ($data->payment_amount == "") style="display:none;" @endif>
                                                <label for="payment_amount" class="col-sm-4 col-form-label">Payment Amount</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="payment_amount" name="payment_amount" value="{{ $data->payment_amount }}">
                                                    @error('payment_amount')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row" id="digital_payment_type" @if ($data->digital_payment_type_id == "") style="display:none;" @endif >
                                                <label for="digital_payment_type_id" class="col-sm-4 col-form-label"> Digital Payment Type </label>
                                                <div class="col-sm-8">
                                                    <select name="digital_payment_type_id" class="form-control select2" id="digital_payment_type_id">
                                                        <option value=""> Select </option>
                                                            @foreach($digital_payment_type as $item)
                                                                <option value="{{ $item->id }}" {{($data->digital_payment_type_id == $item->id ? 'selected':'')}}>{{ $item->digital_payment_type_name }}</option>
                                                            @endforeach
                                                    </select>       
                                                    @error('digital_payment_type_id')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                                                                        
                                        </div>
                                    </div>
                                    <div class="float-right mt-4">
                                        <button type="submit" class="btn btn-primary text-uppercase"><i class="fas fa-save"></i> Update </button>
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




