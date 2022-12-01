@extends('layouts.admin_layouts.admin_layout')
@section('content')



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Ledger Entry</h1>

                    </div><!-- /.col -->


                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">
                                <a class="leading-normal inline-flex items-center font-normal spark-button-focus h-8 text-md px-4 bg-transparent border-0 border-solid text-blue-700 hover:text-blue-800 active:text-blue-700 rounded-md"
                                   type="button" href="{{ route('ledger-entry.index') }}" aria-disabled="false" role="link"
                                   tabindex="-1">Back</a>
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
                    {{-- @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif --}}

                    <div class="card">
                        <div class="">
                            <div class="card-header">
                                <h3 class="card-title" id="heading">Add Ledger Entry</h3>
                            </div>

                            {!! Form::open(array('route' => 'ledger-entry.store','method'=>'POST', 'enctype' => 'multipart/form-data')) !!}

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="transaction_no" class="col-sm-4 col-form-label">Transaction No.</label>
                                            <div class="col-sm-8">
                                                {!! Form::text('transaction_no', $txn_no , array('class' => 'form-control', 'readonly'=>'readonly')) !!}
                                                @error('transaction_no')<span
                                                    class="text-danger">{{$message}}</span>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="job_name" class="col-sm-4 col-form-label"> Job Name </label>
                                            <div class="col-sm-8">
                                                {!! Form::text('job_name', null, array('class' => 'form-control')) !!}
                                                @error('job_name')<span
                                                    class="text-danger">{{$message}}</span>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="ledger_category_id" class="col-sm-4 col-form-label">Ledger Category</label>
                                            <div class="col-sm-8">
                                                <select name="ledger_category_id" class="form-control select2" id="ledger_category_id" action="{{ route('find-ledger-head') }}">
                                                    <option value=""> Select </option>
                                                    <option value="Income"> Income </option>
                                                    <option value="Expense"> Expense </option>
                                                </select>
                                                @error('ledger_category_id')<span
                                                    class="text-danger">{{$message}}</span>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="ledger_head_id" class="col-sm-4 col-form-label">Ledger Head</label>
                                            <div class="col-sm-8">
                                                <select name="ledger_head_id" class="form-control select2" id="ledger_head_id">
                                                    <option value=""> Select </option>
                                                    
                                                </select>
                                                @error('ledger_head_id')<span
                                                    class="text-danger">{{$message}}</span>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="payment_against_bill" class="col-sm-4 col-form-label mt-1">Payment Against Bill</label>
                                            <div class="icheck-success d-inline col-sm-8">
                                                <input type="checkbox" id="payment_against_bill" name="payment_against_bill" @if (!empty($single_case_bill))
                                                    checked disabled
                                                @endif>
                                                <label for="payment_against_bill">
                                                    Yes
                                                </label>
                                            </div>
                                        </div>
                                        <input type="hidden" id="payment_against_bill" name="payment_against_bill" value="on">

                                    </div>


                                    {{-- <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="trial_court" class="col-sm-4 col-form-label">Payment Against Bill</label>
                                            <div class="col-sm-8">
                                                {!! Form::text('email', null, array('class' => 'form-control')) !!}
                                                @error('trial_court')<span
                                                    class="text-danger">{{$message}}</span>@enderror
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="col-md-6" id="bill_no" style="display: none;">
                                        <div class="form-group row">
                                            <label for="bill_id" class="col-sm-4 col-form-label">Bill No</label>
                                            <div class="col-sm-8">
                                                <select name="bill_id" class="form-control select2" id="bill_id" action="{{ route('find-bill') }}">
                                                    <option value=""> Select </option>
                                                    @foreach($bill_no as $item)
                                                        <option value="{{ $item->id }}" {{(old('bill_id') == $item->id ? 'selected':'')}}>{{ $item->billing_no }}</option>
                                                    @endforeach
                                                </select>
                                                @error('bill_id')<span
                                                    class="text-danger">{{$message}}</span>@enderror
                                            </div>
                                        </div>
                                    </div>

                                    @if (!empty($single_case_bill))
                                        
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="bill_id" class="col-sm-4 col-form-label">Bill No</label>
                                            <div class="col-sm-8">
                                                <select name="bill_id" class="form-control select2" id="bill_id" disabled>
                                                    <option value=""> Select </option>
                                                    @foreach($bill_no as $item)
                                                        <option value="{{ $item->id }}" {{( $single_case_bill->id == $item->id ? 'selected':'')}}>{{ $item->billing_no }}</option>
                                                    @endforeach
                                                </select>
                                                @error('bill_id')<span
                                                    class="text-danger">{{$message}}</span>@enderror
                                            </div>
                                        </div>
                                    </div>

                                    <input type="hidden" name="bill_id" value="{{ $single_case_bill->id }}">

                                    @endif

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="ledger_date" class="col-sm-4 col-form-label">Date</label>
                                            <div class="col-sm-8">

                                                <span class="date_span" style="width: 404px;">
                                                    <input type="date" class="xDateContainer date_first_input"
                                                           onchange="setCorrect(this,'xTime4');"><input type="text" id="xTime4"
                                                                                                        name="ledger_date" value="{{ date('d-m-Y') }}"
                                                                                                        class="date_second_input"
                                                                                                        tabindex="-1"><span
                                                        class="date_second_span" tabindex="-1">&#9660;</span>
                                                </span>




                                                {{-- {!! Form::date('ledger_date', null, array('class' => 'form-control')) !!} --}}

                                                {{-- {!! Form::text('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!} --}}
                                                @error('ledger_date')<span
                                                    class="text-danger">{{$message}}</span>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="payment_type" class="col-sm-4 col-form-label">Payment Type</label>
                                            <div class="col-sm-8">
                                                <select name="payment_type" class="form-control select2" id="payment_type">
                                                    <option value=""> Select </option>
                                                    <option value="Cash Payment"> Cash Payment </option>
                                                    <option value="Bank Payment"> Bank Payment </option>
                                                    <option value="Digital Payment"> Digital Payment </option>
                                                </select>
                                                @error('payment_type')<span
                                                    class="text-danger">{{$message}}</span>@enderror
                                            </div>
                                        </div>
                                    </div>

                                    {{-- <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="ledger_head_bill_id" class="col-sm-4 col-form-label">Bill Name</label>
                                            <div class="col-sm-8">
                                                <select name="ledger_head_bill_id" class="form-control select2" id="ledger_head_bill_id">
                                                    <option value=""> Select </option>
                                                    @foreach($ledger_head as $item)
                                                        <option value="{{ $item->id }}" {{(old('ledger_head_bill_id') == $item->id ? 'selected':'')}}>{{ $item->ledger_head_name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('ledger_head_bill_id')<span
                                                    class="text-danger">{{$message}}</span>@enderror
                                            </div>
                                        </div>
                                    </div> --}}
                                    @if (!empty($single_case_bill))

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="bill_amount" class="col-sm-4 col-form-label">Bill Amount</label>
                                            <div class="col-sm-8" >
                                            <input type="text" class="form-control" readonly name="bill_amount" value="{{ $single_case_bill->bill_amount }}">
                                    
                                            </div>
                                        </div>
                                    </div>
@else
                                    <div class="col-md-6" id="bill_amount">
                                        
                                    </div>
@endif
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="paid_amount" class="col-sm-4 col-form-label">Paid Amount</label>
                                            <div class="col-sm-8">
                                                {!! Form::text('paid_amount', null, array('class' => 'form-control')) !!}

                                                @error('paid_amount')<span
                                                    class="text-danger">{{$message}}</span>@enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="remarks" class="col-sm-4 col-form-label">Remarks</label>
                                            <div class="col-sm-8">
                                                {!! Form::textarea('remarks', null, array('class' => 'form-control')) !!}

                                                {{-- {!! Form::text('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!} --}}
                                                @error('remarks')<span
                                                    class="text-danger">{{$message}}</span>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    


                                </div>
                                <div class="float-right mt-4">
                                    <button type="submit" class="btn btn-primary text-uppercase"><i
                                            class="fas fa-save"></i> Save
                                    </button>
                                </div>
                            </div>
                           {!! Form::close() !!}

                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
@endsection
