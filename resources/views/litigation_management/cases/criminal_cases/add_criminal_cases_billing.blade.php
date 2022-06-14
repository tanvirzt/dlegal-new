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
                                <a class="leading-normal inline-flex items-center font-normal spark-button-focus h-8 text-md px-4 bg-transparent border-0 border-solid text-blue-700 hover:text-blue-800 active:text-blue-700 rounded-md" type="button"

                                    href="{{ url()->previous() }}"

                                aria-disabled="false" role="link" tabindex="-1">Back</a>
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
                                <h3 class="card-title" id="heading"> Add Billing </h3>
                            </div>

                            <form action="{{ route('save-criminal-cases-billing',$data->id) }}" method="post">
                                @csrf
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-md-6">

                                            <div class="form-group row">
                                                <label for="bill_date"
                                                       class="col-sm-4 col-form-label">
                                                    Bill Date
                                                </label>
                                                <div class="col-sm-8">
                                                                <span class="date_span_bill">
                                                                    <input type="date" class="xDateContainer date_first_input"
                                                                           onchange="setCorrect(this,'bill_date');"><input type="text" id="bill_date" name="bill_date"
                                                                                                                                    value="dd-mm-yyyy"
                                                                                                                                    class="date_second_input"
                                                                                                                                    tabindex="-1"><span
                                                                        class="date_second_span" tabindex="-1">&#9660;</span>
                                                                </span>
                                                    @error('bill_date')
                                                    <span
                                                        class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="bill_for_the_date"
                                                       class="col-sm-4 col-form-label">
                                                    Bill for the Date
                                                </label>
                                                <div class="col-sm-8">
                                                                <span class="date_span_bill">
                                                                    <input type="date" class="xDateContainer date_first_input"
                                                                           onchange="setCorrect(this,'bill_for_the_date');"><input type="text" id="bill_for_the_date" name="bill_for_the_date"
                                                                                                                           value="dd-mm-yyyy"
                                                                                                                           class="date_second_input"
                                                                                                                           tabindex="-1"><span
                                                                        class="date_second_span" tabindex="-1">&#9660;</span>
                                                                </span>
                                                    @error('bill_for_the_date')
                                                    <span
                                                        class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="bill_particulars_id"
                                                       class="col-md-4 col-form-label"> Bill Particulars
                                                </label>
                                                <div class="col-md-8">
                                                    <div class="row" >
                                                        <div class="col-md-6">
                                                            <select name="bill_particulars_id[]"
                                                                    id="bill_particulars_id" multiple data-placeholder="Select"
                                                                    class="form-control select2">
                                                                <option value="">Select</option>
                                                                @foreach($bill_particulars as $item)
                                                                    <option
                                                                        value="{{ $item->bill_particulars_name }}" {{( $data->bill_particulars_id  == $item->id ? 'selected':'')}}>{{ $item->bill_particulars_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control"
                                                                   id="bill_particulars"
                                                                   name="bill_particulars"
                                                                   placeholder="Bill Particulars"
                                                                   value="">
                                                        </div>
                                                    </div>

                                                    @error('updated_fixed_for')<span
                                                        class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="bill_type_id"
                                                       class="col-md-4 col-form-label"> Bill Type
                                                </label>
                                                <div class="col-md-8">
                                                    <div class="row" >
                                                        <div class="col-md-6">
                                                            <select name="bill_type_id"
                                                                    id="bill_type_id"
                                                                    class="form-control select2">
                                                                <option value="">Select</option>
                                                                @foreach($bill_type as $item)
                                                                    <option value="{{ $item->id }}" {{(old('bill_type_id') == $item->id ? 'selected':'')}}>{{ $item->bill_type_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control"
                                                                   id="bill_type"
                                                                   name="bill_type"
                                                                   placeholder="Bill Type"
                                                                   value="">
                                                        </div>
                                                    </div>

                                                    @error('updated_fixed_for')<span
                                                        class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="bill_schedule_id" class="col-sm-4 col-form-label">Bill Schedule</label>
                                                <div class="col-sm-8">
                                                    <select name="bill_schedule_id" class="form-control select2" id="bill_schedule_id">
                                                        <option value=""> Select </option>
                                                            @foreach($bill_schedule as $item)
                                                                <option value="{{ $item->id }}" {{(old('bill_schedule_id') == $item->id ? 'selected':'')}}>{{ $item->bill_schedule_name }}</option>
                                                            @endforeach
                                                    </select>
                                                    @error('bill_schedule_id')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="bill_amount" class="col-sm-4 col-form-label">Bill Amount</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="bill_amount" name="bill_amount" value="{{old('bill_amount')}}">
                                                    @error('bill_amount')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="payment_amount" class="col-sm-4 col-form-label">Payment Amount</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="payment_amount" name="payment_amount" value="{{old('payment_amount')}}">
                                                    @error('payment_amount')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="bill_submitted"
                                                       class="col-sm-4 col-form-label">
                                                    Bill Submitted
                                                </label>
                                                <div class="col-sm-8">
                                                                <span class="date_span_bill">
                                                                    <input type="date" class="xDateContainer date_first_input"
                                                                           onchange="setCorrect(this,'bill_submitted');"><input type="text" id="bill_submitted" name="bill_submitted"
                                                                                                                           value="dd-mm-yyyy"
                                                                                                                           class="date_second_input"
                                                                                                                           tabindex="-1"><span
                                                                        class="date_second_span" tabindex="-1">&#9660;</span>
                                                                </span>
                                                    @error('bill_submitted')
                                                    <span
                                                        class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="payment_received"
                                                       class="col-sm-4 col-form-label">
                                                    Payment Received
                                                </label>
                                                <div class="col-sm-8">
                                                                <span class="date_span_bill">
                                                                    <input type="date" class="xDateContainer date_first_input"
                                                                           onchange="setCorrect(this,'payment_received');"><input type="text" id="payment_received" name="payment_received"
                                                                                                                           value="dd-mm-yyyy"
                                                                                                                           class="date_second_input"
                                                                                                                           tabindex="-1"><span
                                                                        class="date_second_span" tabindex="-1">&#9660;</span>
                                                                </span>
                                                    @error('payment_received')
                                                    <span
                                                        class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="payment_mode_id" class="col-sm-4 col-form-label">Payment Mode</label>
                                                <div class="col-sm-8">
                                                    <select name="payment_mode_id" class="form-control select2" id="payment_mode_id">
                                                        <option value=""> Select </option>
                                                            @foreach($payment_mode as $item)
                                                                <option value="{{ $item->id }}" {{(old('payment_mode_id') == $item->id ? 'selected':'')}}>{{ $item->payment_mode_name }}</option>
                                                            @endforeach
                                                    </select>
                                                    @error('payment_mode_id')<span class="text-danger">{{$message}}</span>@enderror
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




