@extends('layouts.admin_layouts.admin_layout')
@section('content')

<style>

.card-header {
    background-color: #f3f3f3 !important;
}

    /*Start Scroll View */
    .card.allCard {
            height: 53.5rem;
            overflow-y: scroll;
        }
        .allCard::-webkit-scrollbar {
            width: 5px;
        }
        .allCard::-webkit-scrollbar-track {
            background: #fff !important;
            border-left: 1px solid #ddd;
        }
        .allCard::-webkit-scrollbar-thumb {
            background: rgb(0 0 0 / 20%) !important;
            border-radius: 10px !important;
            padding: 2px;
        }


        .card.caseSteps {
            height: 42rem;
            overflow-y: scroll;
        }
        .caseSteps::-webkit-scrollbar {
            width: 5px;
        }
        .caseSteps::-webkit-scrollbar-track {
            background: #fff !important;
            border-left: 1px solid #ddd;
        }
        .caseSteps::-webkit-scrollbar-thumb {
            background: rgb(0 0 0 / 20%) !important;
            border-radius: 10px !important;
            padding: 2px;
        }

        .card-header.positionCard {
            position: sticky;
            top: 0;
            z-index: 1;
        }


.nav-pills .nav-link.active::before{
  display:none;
}

.nav-pills .nav-link.active{
   color:#fff;
   background:#0CA2A3 !important;
}

.btn-success {
  color: #fff;
  background-color: #0CA2A3 !important;
  border-color: #0CA2A3 !important;
}

.btn-success:hover {
  color: #fff;
  background-color: #0CA2A3 !important;
  border-color: #0CA2A3 !important;
}


.col-form-label{
    color: #0CA2A3 !important;
    font-weight: bold !important;
    font-size: 14px !important;
}

.select2-container--default .select2-selection--single {
  background-color: #fff !important;
  border: 1px solid #0CA2A3 !important;
}
.select2-container .select2-selection--single {
  height: 40px !important;
}

.select2-container--default .select2-selection--single .select2-selection__rendered {
  line-height: 33px !important;
}

.select2-container--default .select2-selection--single .select2-selection__rendered {
  color: #0CA2A3 !important;
}

.select2-container--default .select2-selection--single .select2-selection__arrow {
  top: 8px !important;
  color: #0CA2A3 !important;

}

.form-control {
  padding: 1.6em .75rem !important;
  color: #0CA2A3 !important;
  border: 1px solid #0CA2A3 !important;
  }

  .select2-container--default .select2-selection--multiple {
  border: 1px solid #0CA2A3 !important;
}

.select2-container .select2-selection--multiple {
  min-height: 40px !important;
  color: #0CA2A3 !important;
}
.form-control::placeholder {
  color: #0CA2A3 !important;
  opacity: 1 !important;
}

.row{
    color: #0CA2A3 !important;
}

.date_span_steps {
  border: 1px solid #0CA2A3 !important;
  height: 40px !important;
  color: #0CA2A3 !important;
}

.date_second_span {
  padding-top: 12px !important;
}
</style>



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Add Court Cases</h1>

                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">
                                <a  type="button" href="{{URL::previous() }}" aria-disabled="false"
                                    role="link" tabindex="-1">Back </a>
                            </li>
                        </ol>
                    </div>


                    <!-- partial:index.partial.html -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row" style="background: #fff;padding: 20px; margin-top: 15px;">
                                        <div class="tabs-to-dropdown" style="width: 100%;">
                                            <div class="nav-wrapper d-flex align-items-center justify-content-between" class="margin-bottom:20px;">
                                                <ul class="nav nav-pills d-none d-md-flex" id="pills-tab" role="tablist" style="margin: 0 auto;">
                                                  <li class="nav-item" role="presentation">
                                                    <a class="nav-link active" id="pills-company-tab" data-toggle="pill" href="#pills-company" role="tab" aria-controls="pills-company" aria-selected="true">Case Info</a>
                                                  </li>
                                                  <li class="nav-item" role="presentation">
                                                    <a class="nav-link" id="pills-product-tab" data-toggle="pill" href="#pills-product" role="tab" aria-controls="pills-product" aria-selected="false">Events & Stages</a>
                                                  </li>
                                                  <li class="nav-item" role="presentation">
                                                    <a class="nav-link" id="pills-news-tab" data-toggle="pill" href="#pills-news" role="tab" aria-controls="pills-news" aria-selected="false">Party Info</a>
                                                  </li>
                                                  <li class="nav-item" role="presentation">
                                                    <a class="nav-link" id="pills-lawyer-tab" data-toggle="pill" href="#pills-lawyer" role="tab" aria-controls="pills-lawyer" aria-selected="false">Lawyer Info</a>
                                                  </li>
                                                  <li class="nav-item" role="presentation">
                                                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Document Info</a>
                                                  </li>
                                                  <li class="nav-item" role="presentation">
                                                    <a class="nav-link" id="pills-casefile-tab" data-toggle="pill" href="#pills-casefile" role="tab" aria-controls="pills-casefile" aria-selected="false">Case File Location</a>
                                                  </li>
                                                </ul>

                                            </div>
                                            <hr style="margin-bottom:50px; color: #000;">  

                                      <form id="addcaseform" action="{{ route('save-criminal-cases') }}" method="post" enctype="multipart/form-data" name="addcaseform">            
                                            <div class="tab-content" id="pills-tabContent">
                                                <div class="tab-pane fade show active" id="pills-company" role="tabpanel" aria-labelledby="pills-company-tab">
                                                  <div class="container-fluid">
                                                    <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="case_type"
                                            class="col-sm-12 col-form-label padding-null">Case Class</label>
                                    <div class="col-sm-12 padding-null">
                                        <select name="case_type"
                                                class="form-control select2"
                                                id="case_type" required>
                                            <option value="">Select</option>
                                                <option value="District">District</option>
                                                <option value="Special">Special</option>

                                        </select>
                                        @error('case_type')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>

                                </div>                        
                                <div class="col-md-6">
                                    <label for="case_infos_division_id"
                                            class="col-sm-12 col-form-label padding-null">Division</label>
                                    <div class="col-sm-12 padding-null">
                                        <select name="case_infos_division_id"
                                                class="form-control select2"
                                                id="case_infos_division_id"
                                                action="{{ route('find_district') }}">
                                            <option value="">Select</option>
                                            @foreach ($division as $item)
                                                <option
                                                    value="{{ $item->id }}" {{(old('case_infos_division_id') == $item->id ? 'selected':'')}}>{{ ucfirst($item->division_name) }}</option>
                                            @endforeach
                                        </select>
                                        @error('case_infos_division_id')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>

                                </div>    
                                
                                    
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                    <label for="case_infos_district_id"
                                            class="col-sm-12 col-form-label padding-null">District</label>
                                    <div class="col-sm-12 padding-null">
                                        <select name="case_infos_district_id"
                                                class="form-control select2"
                                                id="case_infos_district_id"
                                                action="{{ route('find-case-infos-thana') }}">
                                            <option value=""> Select</option>

                                        </select>
                                        @error('case_infos_district_id')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                
                                    <div class="col-md-6">
                                    <label for="case_infos_thana_id"
                                            class="col-sm-12 col-form-label padding-null">Thana</label>
                                    <div class="col-sm-12 padding-null">
                                        <select name="case_infos_thana_id"
                                                id="case_infos_thana_id"
                                                class="form-control select2">
                                            <option value="">Select</option>

                                        </select>
                                        @error('case_infos_thana_id')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="case_category_id"
                                            class="col-sm-12 col-form-label padding-null">Case
                                        Category </label>
                                    <div class="col-sm-12 padding-null">
                                        <select name="case_category_id" id="case_category_id"
                                                class="form-control select2"
                                                >
                                            <option value="">Select</option>
                                            <option value="Civil">Civil</option>
                                            <option value="Criminal">Criminal</option>
                                            {{-- @foreach($case_category as $item)
                                                <option
                                                    value="{{ $item->id }}" {{(old('case_category_id') == $item->id ? 'selected':'')}}>{{ $item->case_category }}</option>
                                            @endforeach --}}
                                        </select>
                                        @error('case_category_id')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                
                                {{-- 
                                    <label for="case_subcategory_id"
                                            class="col-sm-6 col-form-label">Case
                                        Subcategory </label>
                                    <div class="col-sm-6">

                                        <select name="case_subcategory_id"
                                                id="case_subcategory_id"
                                                class="form-control select2">
                                            <option value="">Select</option>

                                        </select>
                                        @error('case_subcategory_id')<span
                                            class="text-danger">{{$message}}</span>@enderror

                                    </div>
                                </div> --}}
                                <div class="col-sm-6">
                                    <label for="case_type_id" style="color: #0CA2A3 !important; font-weight: bold !important; font-size: 14px; line-height: 25px; !important;
padding-left: 0 !important;" class="col-sm-12 col-form-labe padding-nulll">Case Type </label>
                                    <div class="col-sm-12 padding-null">
                                        <select name="case_type_id" id="case_type_id"
                                                class="form-control select2" >
                                            <option value="">Select</option>
                                        </select>
                                        @error('case_type_id')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                            </div>
                                <div class="form-group row">
                                    <label for="case_prayer_id" class="col-sm-12 col-form-label">Case Prayer </label>
                                    <div class="col-sm-12">
                                        <select name="case_prayer_id" id="case_prayer_id"
                                                class="form-control select2">
                                            <option value="">Select</option>
                                            {{-- @foreach($case_types as $item)
                                                <option
                                                    value="{{ $item->id }}" {{(old('case_prayer_id') == $item->id ? 'selected':'')}}>{{ $item->case_types_name }}</option>
                                            @endforeach --}}
                                        </select>
                                        @error('case_prayer_id')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="case_nature_id" class="col-sm-12 col-form-label">Case Nature</label>
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <select name="case_nature_id"
                                                        id="case_nature_id"
                                                        class="form-control select2">
                                                    <option value="">Select</option>
                                                    {{-- @foreach($matter as $item)
                                                        <option value="{{ $item->id }}" {{( old('case_nature_id') == $item->id ? 'selected':'')}}>{{ $item->matter_name }}</option>
                                                    @endforeach --}}
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control"
                                                        id="case_nature_write"
                                                        name="case_nature_write"
                                                        placeholder="Nature"
                                                        value="{{ old('case_nature_write') }}">
                                            </div>
                                        </div>


                                        @error('matter_id')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="matter_id" class="col-sm-12 col-form-label">Case Matter</label>
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <select name="matter_id"
                                                        id="matter_id"
                                                        class="form-control select2">
                                                    <option value="">Select</option>
                                                    {{-- @foreach($matter as $item)
                                                        <option
                                                            value="{{ $item->id }}" {{( old('matter_id') == $item->id ? 'selected':'')}}>{{ $item->matter_name }}</option>
                                                    @endforeach --}}
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control"
                                                        id="matter_write"
                                                        name="matter_write"
                                                        placeholder="Matter"
                                                        value="{{ old('matter_write') }}">
                                            </div>
                                        </div>


                                        @error('matter_id')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="case_infos_case_title_id"
                                            class="col-sm-12 col-form-label">Case Title</label>
                                    <div class="col-sm-12">
                                        <select name="case_infos_case_title_id"
                                                id="case_infos_case_title_id"
                                                class="form-control select2">
                                            <option value="">Select</option>
                                            @foreach($case_title as $item)
                                                <option
                                                    value="{{ $item->id }}" {{(old('case_infos_case_title_id') == $item->id ? 'selected':'')}}>{{ $item->case_title_name }}</option>
                                            @endforeach

                                        </select>
                                        @error('case_infos_case_title_id')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="case_infos_case_titel_sort_id"
                                            class="col-sm-12 col-form-label">Case Title (Short)</label>
                                    <div class="col-sm-12">
                                        <select name="case_infos_case_titel_sort_id"
                                                id="case_infos_case_titel_sort_id"
                                                class="form-control select2">
                                            <option value="">Select</option>
                                            @foreach($case_title as $item)
                                                <option
                                                    value="{{ $item->id }}" {{(old('case_infos_case_titel_sort_id') == $item->id ? 'selected':'')}}>{{ $item->case_title_name }}</option>
                                            @endforeach

                                        </select>
                                        @error('case_infos_case_titel_sort_id')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="case_infos_case_no" class="col-sm-12 col-form-label">Case No</label>
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="text" class="form-control"
                                                        id="case_infos_case_no"
                                                        name="case_infos_case_no"
                                                        placeholder="Case No"
                                                        value="{{ old('case_infos_case_no') }}" required>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control"
                                                        id="case_infos_case_year"
                                                        name="case_infos_case_year"
                                                        placeholder="Case Year"
                                                        value="{{ old('case_infos_case_year') }}" required>
                                            </div>
                                        </div>

                                        @error('legal_issue_id')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="case_infos_court_id"
                                            class="col-sm-12 col-form-label"> Name
                                        of the Court </label>
                                    <div class="col-sm-12">
                                        <select name="case_infos_court_id[]" id="case_infos_court_id"
                                                class="form-control select2" data-placeholder="Select" multiple>
                                            <option value="">Select</option>
                                            {{-- @foreach($court as $item)
                                                <option
                                                    value="{{ $item->court_name }}" {{(old('case_infos_court_id') == $item->id ? 'selected':'')}}>{{ $item->court_name }}</option>
                                            @endforeach --}}
                                        </select>
                                        @error('case_infos_court_id')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="case_infos_court_short_id" class="col-sm-12 col-form-label">Name of
                                        Court(Short)</label>
                                    <div class="col-sm-12">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <select name="case_infos_court_short_id[]"
                                                        id="case_infos_court_short_id"
                                                        class="form-control select2" data-placeholder="Select" multiple>
                                                    <option value="">Select</option>
                                                    {{-- @foreach($court_short as $item)
                                                        <option
                                                            value="{{ $item->court_short_name }}" {{  old('case_infos_court_short_id') == $item->id ? 'selected' : '' }}>{{ $item->court_short_name }}</option>
                                                    @endforeach --}}
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group hdtuto_court_short control-group increment_court_short">
                                                    <input type="text" name="court_short_write[]"
                                                            class="myfrm form-control col-12" placeholder="Court Name(Short)">
                                                    <div class="input-group-btn">
                                                        <button class="btn btn-success btn_success_court_short"
                                                                type="button"><i
                                                                class="fldemo glyphicon glyphicon-plus"></i>+
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
                                                                    type="button"><i
                                                                    class="fldemo glyphicon glyphicon-remove"></i> -
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>

                                        @error('client_name')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                                  </div>
                                                </div>
                                                <div class="tab-pane fade" id="pills-product" role="tabpanel" aria-labelledby="pills-product-tab">
                                                  <div class="container-fluid">
                                                    <h6 class="text-uppercase text-bold">
                                    <div class="row">
                                        <div class="col-md-2"> Date </div>
                                        <div class="col-md-4 text-center ml-3">Title</div>
                                        <div class="col-md-3 text-center">Description</div>
                                        <div class="col-md-2">Type</div>
                                    </div>
                                </h6>
                                {{-- <h6 class="text-uppercase text-bold">
                                    <div class="row">
                                        <div class="col-md-3"> Date </div>
                                        <div class="col-md-3"> Document Name </div>
                                        <div class="col-md-3"> Particulars </div>
                                        <div class="col-md-1"> ORG </div>
                                        <div class="col-md-1"> CC </div>
                                        <div class="col-md-1"> COPY </div>
                                    </div>
                                </h6> --}}
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <div class="input-group hdtuto_letter_notice control-group increment_letter_notice">
                                                    <input type="hidden" name="letter_notice_sections[]"
                                                           class="myfrm form-control mr-2 col-md-4" value="letter_notice_sections">
                                                    <input type="date" name="letter_notice_date[]"
                                                           class="myfrm form-control mr-2 col-md-4">
                                                    <select name="letter_notice_documents_id[]"
                                                        class="form-control mr-2 col-md-3">
                                                        <option value="">Select</option>
                                                        @foreach($documents as $item)
                                                            <option
                                                                value="{{ $item->id }}" {{ old('letter_notice_id') == $item->id ? 'selected' : '' }}>{{ $item->documents_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <input type="text" name="letter_notice_documents_write[]"
                                                           class="myfrm form-control mr-2 col-md-4" placeholder="Document">

                                                    <input type="text" name="letter_notice_particulars_write[]"
                                                           class="myfrm form-control mr-2 col-md-4" placeholder="Particulars">
                                                    <select name="letter_notice_type_id[]"
                                                           class="form-control mr-2">
                                                           <option value="">Select</option>
                                                           @foreach($documents_type as $item)
                                                               <option
                                                                   value="{{ $item->id }}" {{ old('letter_notice_type_id') == $item->id ? 'selected' : '' }}>{{ $item->documents_type_name }}</option>
                                                           @endforeach
                                                    </select>
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
                                                         <input type="hidden" name="letter_notice_sections[]"
                                                           class="myfrm form-control mr-2 col-md-4" value="letter_notice_sections">
                                                         <input type="date" name="letter_notice_date[]"
                                                           class="myfrm form-control mr-2 col-md-4">
                                                    <select name="letter_notice_documents_id[]"
                                                        class="form-control mr-2 col-md-3">
                                                        <option value="">Select</option>
                                                        @foreach($documents as $item)
                                                            <option
                                                                value="{{ $item->id }}" {{ old('letter_notice_id') == $item->id ? 'selected' : '' }}>{{ $item->documents_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <input type="text" name="letter_notice_documents_write[]"
                                                           class="myfrm form-control mr-2 col-md-4" placeholder="Document">

                                                    <input type="text" name="letter_notice_particulars_write[]"
                                                           class="myfrm form-control mr-2 col-md-4" placeholder="Particulars">
                                                    <select name="letter_notice_type_id[]"
                                                           class="form-control mr-2">
                                                           <option value="">Select</option>
                                                           @foreach($documents_type as $item)
                                                               <option
                                                                   value="{{ $item->id }}" {{ old('letter_notice_type_id') == $item->id ? 'selected' : '' }}>{{ $item->documents_type_name }}</option>
                                                           @endforeach
                                                    </select>
                                                        <div class="input-group-btn">
                                                            <button class="btn btn-danger btn_danger_letter_notice"
                                                                    type="button"><i
                                                                    class="fldemo glyphicon glyphicon-remove"></i> -
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                                @error('case_infos_letter_notice_informant_name')<span
                                                    class="text-danger">{{$message}}</span>@enderror
                                                 <br><br>
                                                 <div class="form-group row">
                                    <label for="case_steps_filing" class="col-sm-3 col-form-label"> Case Filed </label>
                                    {{-- <label for="case_steps_filing" class="col-sm-3 col-form-label"> Filing
                                        Date </label> --}}
                                    <div class="col-sm-3">
                                        <span class="date_span_steps">
                                            <input type="date" class="xDateContainer date_first_input"
                                                   onchange="setCorrect(this,'case_steps_filing12');">
                                            <input type="text" id="case_steps_filing12" name="case_steps_filing"
                                                value="dd-mm-yyyy" class="date_second_input_steps"
                                                   tabindex="-1">
                                            <span class="date_second_span" tabindex="-1">&#9660;</span>
                                        </span>

                                        @error('case_steps_filing')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control"
                                               id="case_steps_filing_note"
                                               name="case_steps_filing_note"
                                               value="{{old('case_steps_filing_note')}}">
                                        @error('case_steps_filing_note')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <select name="case_steps_filing_type_id"
                                                class="form-control">
                                                <option value="">Select</option>
                                                @foreach($documents_type as $item)
                                                    <option
                                                        value="{{ $item->id }}" {{ old('case_steps_filing_type_id') == $item->id ? 'selected' : '' }}>{{ $item->documents_type_name }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                        @error('case_steps_filing_copy')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                </div>

                                <div class="form-group row case_step_civil">
                                    <label for="case_steps_servicr_return" class="col-sm-3 col-form-label"> Service Return </label>
                                    <div class="col-sm-3">
                                        <span class="date_span_steps">
                                            <input type="date" class="xDateContainer date_first_input"
                                                   onchange="setCorrect(this,'case_steps_servicr_return');">
                                            <input type="text" id="case_steps_servicr_return" name="case_steps_servicr_return"
                                                    value="dd-mm-yyyy" class="date_second_input_steps"
                                                   tabindex="-1">
                                            <span class="date_second_span" tabindex="-1">&#9660;</span>
                                        </span>
                                        @error('case_steps_servicr_return')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control"
                                               id="case_steps_servicr_return_note"
                                               name="case_steps_servicr_return_note"
                                               value="{{old('case_steps_servicr_return_note')}}">
                                        @error('case_steps_servicr_return_note')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <select name="case_steps_servicr_return_type_id"
                                                class="form-control">
                                                <option value="">Select</option>
                                                @foreach($documents_type as $item)
                                                    <option
                                                        value="{{ $item->id }}" {{ old('case_steps_servicr_return_type_id') == $item->id ? 'selected' : '' }}>{{ $item->documents_type_name }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                        @error('case_steps_servicr_return_copy')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                </div>
                                <div class="form-group row case_step_civil">
                                    <label for="case_steps_sr_completed" class="col-sm-3 col-form-label"> S.R. Completed </label>
                                    <div class="col-sm-3">
                                        <span class="date_span_steps">
                                            <input type="date" class="xDateContainer date_first_input"
                                                   onchange="setCorrect(this,'case_steps_sr_completed');">
                                            <input type="text" id="case_steps_sr_completed" name="case_steps_sr_completed"
                                                    value="dd-mm-yyyy" class="date_second_input_steps"
                                                   tabindex="-1">
                                            <span class="date_second_span" tabindex="-1">&#9660;</span>
                                        </span>
                                        @error('case_steps_sr_completed')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control"
                                               id="case_steps_sr_completed_note"
                                               name="case_steps_sr_completed_note"
                                               value="{{old('case_steps_sr_completed_note')}}">
                                        @error('case_steps_sr_completed_note')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <select name="case_steps_sr_completed_type_id"
                                                class="form-control">
                                                <option value="">Select</option>
                                                @foreach($documents_type as $item)
                                                    <option
                                                        value="{{ $item->id }}" {{ old('case_steps_sr_completed_type_id') == $item->id ? 'selected' : '' }}>{{ $item->documents_type_name }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                        @error('case_steps_sr_completed_copy')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                </div>
                                <div class="form-group row case_step_civil">
                                    <label for="case_steps_set_off" class="col-sm-3 col-form-label"> Set Off </label>
                                    <div class="col-sm-3">
                                        <span class="date_span_steps">
                                            <input type="date" class="xDateContainer date_first_input"
                                                   onchange="setCorrect(this,'case_steps_set_off');">
                                            <input type="text" id="case_steps_set_off" name="case_steps_set_off"
                                                    value="dd-mm-yyyy" class="date_second_input_steps"
                                                   tabindex="-1">
                                            <span class="date_second_span" tabindex="-1">&#9660;</span>
                                        </span>
                                        @error('case_steps_set_off')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control"
                                               id="case_steps_set_off_note"
                                               name="case_steps_set_off_note"
                                               value="{{old('case_steps_set_off_note')}}">
                                        @error('case_steps_set_off_note')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <select name="case_steps_set_off_type_id"
                                                class="form-control">
                                                <option value="">Select</option>
                                                @foreach($documents_type as $item)
<option value="{{ $item->id }}" {{ old('case_steps_set_off_type_id')== $item->id ? 'selected' : '' }}>{{ $item->documents_type_name }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                        @error('case_steps_set_off_copy')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                </div>

                                <div class="form-group row case_step_civil">
                                    <label for="case_steps_issue_frame" class="col-sm-3 col-form-label"> Issue Frame </label>
                                    <div class="col-sm-3">
                                        <span class="date_span_steps">
                                            <input type="date" class="xDateContainer date_first_input"
                                                   onchange="setCorrect(this,'case_steps_issue_frame');">
                                            <input type="text" id="case_steps_issue_frame" name="case_steps_issue_frame"
                                                    value="dd-mm-yyyy" class="date_second_input_steps"
                                                   tabindex="-1">
                                            <span class="date_second_span" tabindex="-1">&#9660;</span>
                                        </span>
                                        @error('case_steps_issue_frame')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control"
                                               id="case_steps_issue_frame_note"
                                               name="case_steps_issue_frame_note"
                                               value="{{old('case_steps_issue_frame_note')}}">
                                        @error('case_steps_issue_frame_note')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <select name="case_steps_issue_frame_type_id"
                                                class="form-control">
                                                <option value="">Select</option>
                                                @foreach($documents_type as $item)
                                                    <option
                                                        value="{{ $item->id }}" {{ old('case_steps_issue_frame_type_id') == $item->id ? 'selected' : '' }}>{{ $item->documents_type_name }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                        @error('case_steps_issue_frame_copy')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                </div>
                                <div class="form-group row case_step_civil">
                                    <label for="case_steps_ph" class="col-sm-3 col-form-label"> PH </label>
                                    <div class="col-sm-3">
                                        <span class="date_span_steps">
                                            <input type="date" class="xDateContainer date_first_input"
                                                   onchange="setCorrect(this,'case_steps_ph');">
                                            <input type="text" id="case_steps_ph" name="case_steps_ph"
                                                    value="dd-mm-yyyy" class="date_second_input_steps"
                                                   tabindex="-1">
                                            <span class="date_second_span" tabindex="-1">&#9660;</span>
                                        </span>
                                        @error('case_steps_ph')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control"
                                               id="case_steps_ph_note"
                                               name="case_steps_ph_note"
                                               value="{{old('case_steps_ph_note')}}">
                                        @error('case_steps_ph_note')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <select name="case_steps_ph_type_id"
                                                class="form-control">
                                                <option value="">Select</option>
                                                @foreach($documents_type as $item)
                                                    <option
                                                        value="{{ $item->id }}" {{ old('case_steps_ph_type_id') == $item->id ? 'selected' : '' }}>{{ $item->documents_type_name }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                        @error('case_steps_ph_copy')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                </div>
                                <div class="form-group row case_step_civil">
                                    <label for="case_steps_fph" class="col-sm-3 col-form-label"> F.PH </label>
                                    <div class="col-sm-3">
                                        <span class="date_span_steps">
                                            <input type="date" class="xDateContainer date_first_input"
                                                   onchange="setCorrect(this,'case_steps_fph');">
                                            <input type="text" id="case_steps_fph" name="case_steps_fph"
                                                    value="dd-mm-yyyy" class="date_second_input_steps"
                                                   tabindex="-1">
                                            <span class="date_second_span" tabindex="-1">&#9660;</span>
                                        </span>
                                        @error('case_steps_fph')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control"
                                               id="case_steps_fph_note"
                                               name="case_steps_fph_note"
                                               value="{{old('case_steps_fph_note')}}">
                                        @error('case_steps_fph_note')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <select name="case_steps_fph_type_id"
                                                class="form-control">
                                                <option value="">Select</option>
                                                @foreach($documents_type as $item)
                                                    <option
                                                        value="{{ $item->id }}" {{ old('case_steps_fph_type_id') == $item->id ? 'selected' : '' }}>{{ $item->documents_type_name }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                        @error('case_steps_fph_copy')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                </div>


                                <div class="form-group row case_step_criminal">
                                    <label for="taking_cognizance" class="col-sm-3 col-form-label"> Taking Cognizance </label>
                                    <div class="col-sm-3">
                                        <span class="date_span_steps">
                                            <input type="date" class="xDateContainer date_first_input"
                                                   onchange="setCorrect(this,'taking_cognizance');">
                                            <input type="text" id="taking_cognizance" name="taking_cognizance"
                                                value="dd-mm-yyyy" class="date_second_input_steps"
                                                   tabindex="-1">
                                            <span class="date_second_span" tabindex="-1">&#9660;</span>
                                        </span>
                                        @error('taking_cognizance')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control"
                                               id="taking_cognizance_note"
                                               name="taking_cognizance_note"
                                               value="{{old('taking_cognizance_note')}}">
                                        @error('taking_cognizance_note')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <select name="taking_cognizance_type_id"
                                                class="form-control">
                                                <option value="">Select</option>
                                                @foreach($documents_type as $item)
                                                    <option
                                                        value="{{ $item->id }}" {{ old('taking_cognizance_type_id') == $item->id ? 'selected' : '' }}>{{ $item->documents_type_name }}</option>
                                                @endforeach
                                        </select>
                                    </div>

                                        @error('taking_cognizance_yes_no')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                <div class="form-group row case_step_criminal">
                                    <label for="arrest_surrender_cw" class="col-sm-3 col-form-label"> Arrest/Surrender/C.W.</label>
                                    <div class="col-sm-3">
                                        <span class="date_span_steps">
                                            <input type="date" class="xDateContainer date_first_input"
                                                   onchange="setCorrect(this,'arrest_surrender_cw');">
                                            <input type="text" id="arrest_surrender_cw" name="arrest_surrender_cw"
                                                value="dd-mm-yyyy" class="date_second_input_steps"
                                                   tabindex="-1">
                                            <span class="date_second_span" tabindex="-1">&#9660;</span>
                                        </span>
                                        @error('arrest_surrender_cw')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control"
                                               id="arrest_surrender_cw_note"
                                               name="arrest_surrender_cw_note"
                                               value="{{old('arrest_surrender_cw_note')}}">
                                        @error('arrest_surrender_cw_note')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <select name="arrest_surrender_cw_type_id"
                                                class="form-control">
                                                <option value="">Select</option>
                                                @foreach($documents_type as $item)
                                                    <option
                                                        value="{{ $item->id }}" {{ old('arrest_surrender_cw_type_id') == $item->id ? 'selected' : '' }}>{{ $item->documents_type_name }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                        @error('arrest_surrender_cw_yes_no')<span
                                            class="text-danger">{{$message}}</span>@enderror

                                </div>
                                <div class="form-group row case_step_criminal">
                                    <label for="case_steps_bail" class="col-sm-3 col-form-label"> Bail </label>
                                    <div class="col-sm-3">
                                        <span class="date_span_steps">
                                            <input type="date" class="xDateContainer date_first_input"
                                                   onchange="setCorrect(this,'case_steps_bail');">
                                            <input type="text" id="case_steps_bail" name="case_steps_bail"
                                                    value="dd-mm-yyyy" class="date_second_input_steps"
                                                   tabindex="-1">
                                            <span class="date_second_span" tabindex="-1">&#9660;</span>
                                        </span>
                                        @error('case_steps_bail')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control"
                                               id="case_steps_bail_note"
                                               name="case_steps_bail_note"
                                               value="{{old('case_steps_bail_note')}}">
                                        @error('case_steps_bail_note')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <select name="case_steps_bail_type_id"
                                                class="form-control">
                                                <option value="">Select</option>
                                                @foreach($documents_type as $item)
                                                    <option
                                                        value="{{ $item->id }}" {{ old('case_steps_bail_type_id') == $item->id ? 'selected' : '' }}>{{ $item->documents_type_name }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                        @error('case_steps_bail_copy')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                </div>
                                <div class="form-group row case_step_criminal">
                                    <label for="case_steps_court_transfer" class="col-sm-3 col-form-label"> Court Transfer </label>
                                    <div class="col-sm-3">
                                        <span class="date_span_steps">
                                            <input type="date" class="xDateContainer date_first_input"
                                                   onchange="setCorrect(this,'case_steps_court_transfer');">
                                            <input type="text" id="case_steps_court_transfer" name="case_steps_court_transfer"
                                                   value="dd-mm-yyyy" class="date_second_input_steps"
                                                   tabindex="-1">
                                            <span class="date_second_span" tabindex="-1">&#9660;</span>
                                        </span>
                                        @error('case_steps_court_transfer')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control"
                                               id="case_steps_court_transfer_note"
                                               name="case_steps_court_transfer_note"
                                               value="{{old('case_steps_court_transfer_note')}}">
                                        @error('case_steps_court_transfer_note')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <select name="case_steps_court_transfer_type_id"
                                                class="form-control">
                                                <option value="">Select</option>
                                                @foreach($documents_type as $item)
                                                    <option
                                                        value="{{ $item->id }}" {{ old('case_steps_court_transfer_type_id') == $item->id ? 'selected' : '' }}>{{ $item->documents_type_name }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                        @error('case_steps_court_transfer_yes_no')<span
                                            class="text-danger">{{$message}}</span>@enderror

                                </div>
                                <div class="form-group row case_step_criminal">
                                    <label for="case_steps_charge_framed" class="col-sm-3 col-form-label"> Charge Framed </label>
                                    <div class="col-sm-3">
                                        <span class="date_span_steps">
                                            <input type="date" class="xDateContainer date_first_input"
                                                   onchange="setCorrect(this,'case_steps_charge_framed');">
                                            <input type="text" id="case_steps_charge_framed" name="case_steps_charge_framed"
                                                    value="dd-mm-yyyy"  class="date_second_input_steps"
                                                   tabindex="-1">
                                            <span class="date_second_span" tabindex="-1">&#9660;</span>
                                        </span>
                                        @error('case_steps_charge_framed')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control"
                                               id="case_steps_charge_framed_note"
                                               name="case_steps_charge_framed_note"
                                               value="{{old('case_steps_charge_framed_note')}}">
                                        @error('case_steps_charge_framed_note')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <select name="case_steps_charge_framed_type_id"
                                                class="form-control">
                                                <option value="">Select</option>
                                                @foreach($documents_type as $item)
                                                    <option
                                                        value="{{ $item->id }}" {{ old('case_steps_charge_framed_type_id') == $item->id ? 'selected' : '' }}>{{ $item->documents_type_name }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                        @error('case_steps_charge_framed_yes_no')<span
                                            class="text-danger">{{$message}}</span>@enderror

                                </div>
                                <div class="form-group row">
                                    <label for="case_steps_witness_from" class="col-sm-3 col-form-label"> Witness (From) </label>
                                    <div class="col-sm-3">
                                        <span class="date_span_steps">
                                            <input type="date" class="xDateContainer date_first_input"
                                                   onchange="setCorrect(this,'case_steps_witness_from');">
                                            <input type="text" id="case_steps_witness_from" name="case_steps_witness_from"
                                                    value="dd-mm-yyyy" class="date_second_input_steps"
                                                   tabindex="-1">
                                            <span class="date_second_span" tabindex="-1">&#9660;</span>
                                        </span>
                                        @error('case_steps_witness_from')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control"
                                               id="case_steps_witness_from_note"
                                               name="case_steps_witness_from_note"
                                               value="{{old('case_steps_witness_from_note')}}">
                                        @error('case_steps_witness_from_note')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <select name="case_steps_witness_from_type_id"
                                                class="form-control">
                                                <option value="">Select</option>
                                                @foreach($documents_type as $item)
                                                    <option
                                                        value="{{ $item->id }}" {{ old('case_steps_witness_from_type_id') == $item->id ? 'selected' : '' }}>{{ $item->documents_type_name }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                        @error('case_steps_witness_from_yes_no')<span
                                            class="text-danger">{{$message}}</span>@enderror

                                </div>
                                <div class="form-group row">
                                    <label for="case_steps_witness_to" class="col-sm-3 col-form-label"> Witness (To) </label>
                                    <div class="col-sm-3">
                                        <span class="date_span_steps">
                                            <input type="date" class="xDateContainer date_first_input"
                                                   onchange="setCorrect(this,'case_steps_witness_to');">
                                            <input type="text" id="case_steps_witness_to" name="case_steps_witness_to"
                                                   value="dd-mm-yyyy" class="date_second_input_steps"
                                                   tabindex="-1">
                                            <span class="date_second_span" tabindex="-1">&#9660;</span>
                                        </span>
                                        @error('case_steps_witness_to')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control"
                                               id="case_steps_witness_to_note"
                                               name="case_steps_witness_to_note"
                                               value="{{old('case_steps_witness_to_note')}}">
                                        @error('case_steps_witness_to_note')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <select name="case_steps_witness_to_type_id"
                                                class="form-control">
                                                <option value="">Select</option>
                                                @foreach($documents_type as $item)
                                                    <option
                                                        value="{{ $item->id }}" {{ old('case_steps_witness_to_type_id') == $item->id ? 'selected' : '' }}>{{ $item->documents_type_name }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                        @error('case_steps_witness_to_yes_no')<span
                                            class="text-danger">{{$message}}</span>@enderror

                                </div>
                                <div class="form-group row">
                                    <label for="case_steps_argument" class="col-sm-3 col-form-label"> Argument </label>
                                    <div class="col-sm-3">
                                        <span class="date_span_steps">
                                            <input type="date" class="xDateContainer date_first_input"
                                                   onchange="setCorrect(this,'case_steps_argument');">
                                            <input type="text" id="case_steps_argument" name="case_steps_argument"
                                                    value="dd-mm-yyyy" class="date_second_input_steps"
                                                   tabindex="-1">
                                            <span class="date_second_span" tabindex="-1">&#9660;</span>
                                        </span>
                                        @error('case_steps_argument')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control"
                                               id="case_steps_argument_note"
                                               name="case_steps_argument_note"
                                               value="{{old('case_steps_argument_note')}}">
                                        @error('case_steps_argument_note')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <select name="case_steps_argument_type_id"
                                                class="form-control">
                                                <option value="">Select</option>
                                                @foreach($documents_type as $item)
                                                    <option
                                                        value="{{ $item->id }}" {{ old('case_steps_argument_type_id') == $item->id ? 'selected' : '' }}>{{ $item->documents_type_name }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                        @error('case_steps_argument_yes_no')<span
                                            class="text-danger">{{$message}}</span>@enderror

                                </div>
                                <div class="form-group row">
                                    <label for="case_steps_judgement_order" class="col-sm-3 col-form-label"> Judgement &
                                        Order </label>
                                    <div class="col-sm-3">
                                        <span class="date_span_steps">
                                            <input type="date" class="xDateContainer date_first_input"
                                                   onchange="setCorrect(this,'case_steps_judgement_order');">
                                            <input type="text" id="case_steps_judgement_order" name="case_steps_judgement_order"
                                                   value="dd-mm-yyyy" class="date_second_input_steps"
                                                   tabindex="-1">
                                            <span class="date_second_span" tabindex="-1">&#9660;</span>
                                        </span>
                                        @error('case_steps_judgement_order')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control"
                                               id="case_steps_judgement_order_note"
                                               name="case_steps_judgement_order_note"
                                               value="{{old('case_steps_judgement_order_note')}}">
                                        @error('case_steps_judgement_order_note')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <select name="case_steps_judgement_order_type_id"
                                                class="form-control">
                                                <option value="">Select</option>
                                                @foreach($documents_type as $item)
                                                    <option
                                                        value="{{ $item->id }}" {{ old('case_steps_judgement_order_type_id') == $item->id ? 'selected' : '' }}>{{ $item->documents_type_name }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                        @error('case_steps_judgement_order_yes_no')<span
                                            class="text-danger">{{$message}}</span>@enderror

                                </div>

                                <div class="form-group row">
                                    <label for="case_steps_subsequent_status" class="col-sm-3 col-form-label"> Subsequent Status </label>
                                    <div class="col-sm-3">
                                        <span class="date_span_steps">
                                            <input type="date" class="xDateContainer date_first_input"
                                                   onchange="setCorrect(this,'case_steps_subsequent_status');">
                                            <input type="text" id="case_steps_subsequent_status" name="case_steps_subsequent_status"
                                                   value="dd-mm-yyyy" class="date_second_input_steps"
                                                   tabindex="-1">
                                            <span class="date_second_span" tabindex="-1">&#9660;</span>
                                        </span>
                                        @error('case_steps_subsequent_status')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control"
                                               id="case_steps_subsequent_status_note"
                                               name="case_steps_subsequent_status_note"
                                               value="{{old('case_steps_subsequent_status_note')}}">
                                        @error('case_steps_subsequent_status_note')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <select name="case_steps_subsequent_status_type_id"
                                                class="form-control">
                                                <option value="">Select</option>
                                                @foreach($documents_type as $item)
                                                    <option
                                                        value="{{ $item->id }}" {{ old('case_steps_subsequent_status_type_id') == $item->id ? 'selected' : '' }}>{{ $item->documents_type_name }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                        @error('case_steps_subsequent_status_yes_no')<span
                                            class="text-danger">{{$message}}</span>@enderror

                                </div>
                                {{-- <div class="form-group row">
                                    <label for="case_steps_summary_judgement_order"
                                           class="col-sm-4 col-form-label"> Summary of Case </label>
                                    <div class="col-sm-8">
                                    <textarea name="case_steps_summary_judgement_order" class="form-control"
                                              rows="3"
                                              placeholder="">{{old('case_steps_summary_judgement_order')}}</textarea>
                                        @error('case_steps_summary_judgement_order')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div> --}}
                                <div class="form-group row">
                                    <label for="case_steps_summary_of_cases_note"
                                           class="col-sm-3 col-form-label"> Sumery of the Case </label>
                                    <div class="col-sm-9">
                                    <textarea name="case_steps_summary_of_cases_note" class="form-control"
                                              rows="3"
                                              placeholder="">{{old('case_steps_summary_of_cases_note')}}</textarea>
                                        @error('case_steps_summary_of_cases_note')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="case_steps_remarks"
                                           class="col-sm-3 col-form-label"> Note </label>
                                    <div class="col-sm-9">
                                    <textarea name="case_steps_remarks" class="form-control"
                                              rows="3"
                                              placeholder="">{{old('case_steps_remarks')}}</textarea>
                                        @error('case_steps_remarks')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>   

                                            </div>
                                        </div>
                                                    
                                                  </div>
                                                </div>
<div class="tab-pane fade" id="pills-news" role="tabpanel" aria-labelledby="pills-news-tab">
                                                  <div class="container-fluid">
<div class="card allCard" style="width:100%">
                            <div class="card-header positionCard">
                                <h6 class="card-title text-uppercase"> Client Information </h6>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="client_party_id"
                                            class="col-sm-4 col-form-label">Client(Which Party)</label>
                                    <div class="col-sm-8">
                                        <select name="client_party_id"
                                                class="form-control select2"
                                                id="client_party_id">
                                            <option value="">Select</option>
                                            @foreach($in_favour_of as $item)
                                                <option
                                                    value="{{ $item->id }}" {{(old('client_party_id') == $item->id ? 'selected':'')}}> {{ $item->in_favour_of_name }} </option>
                                            @endforeach
                                        </select>
                                        @error('client_party_id')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="client_category_id"
                                            class="col-sm-4 col-form-label">Client
                                        Category</label>
                                    <div class="col-sm-8">
                                        <select name="client_category_id"
                                                class="form-control select2"
                                                id="client_category_id"
                                                action="{{ route('find-client-subcategory') }}">
                                            <option value="">Select</option>
                                            @foreach ($client_category as $item)
                                                <option
                                                    value="{{ $item->id }}" {{(old('client_category_id') == $item->id ? 'selected':'')}}>{{ ucfirst($item->client_category_name) }}</option>
                                            @endforeach
                                        </select>
                                        @error('client_category_id')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="client_subcategory_id"
                                            class="col-sm-4 col-form-label">Client
                                        Subcategory</label>
                                    <div class="col-sm-8">
                                        <select name="client_subcategory_id"
                                                class="form-control select2"
                                                id="client_subcategory_id">
                                            <option value="">Select</option>

                                        </select>
                                        @error('client_subcategory_id')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="client_id" class="col-sm-4 col-form-label">Client
                                        Name</label>
                                    <div class="col-sm-8">

                                      
                                        <div class="row">

                                            <div class="col-md-10">
                                                <select name="client_id[]" id="client_id_select" class="form-control select2"
                                                    data-placeholder="Select" multiple>
                                                    <option value="">Select</option>
                                                    @foreach ($client as $item)
                                                        <option value="{{ $item->id }}"
                                                          >
                                                            {{ $item->client_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <button class="btn btn-success btn_success_client" type="button"
                                                    data-toggle="modal" data-target="#modal-client-info" data-toggle="tooltip"
                                                    data-placement="top" title="Add Client"><i
                                                        class="fldemo glyphicon glyphicon-plus"></i>+
                                                </button>
        
                                            </div>
        
                                        </div>
                                        @error('client_name')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="client_business_name" class="col-sm-4 col-form-label">Client Business Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="client_business_name"
                                                name="client_business_name"
                                                value="{{ old('client_business_name') }}">
                                        @error('client_business_name')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="client_group_id" class="col-sm-4 col-form-label">Client Group Name</label>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <select name="client_group_id"
                                                        id="client_group_id"
                                                        class="form-control select2">
                                                    <option value="">Select</option>
                                                    @foreach($group_name as $item)
                                                        <option
                                                            value="{{ $item->id }}" {{  old('client_group_id') == $item->id ? 'selected' : '' }}>{{ $item->group_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control"
                                                        id="client_group_write"
                                                        name="client_group_write"
                                                        placeholder="Client Group"
                                                        value="{{ old('client_group_write') }}">
                                            </div>
                                        </div>
                                        @error('client_name')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="client_address" class="col-sm-4 col-form-label">
                                        Client
                                        Address </label>
                                    <div class="col-sm-8">
                                    <textarea name="client_address" class="form-control" rows="3"
                                                placeholder="">{{old('client_address')}}</textarea>
                                        @error('client_address')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="client_mobile" class="col-sm-4 col-form-label">Client
                                        Mobile</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="client_mobile"
                                                name="client_mobile"
                                                value="{{old('client_mobile')}}">
                                        @error('client_mobile')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="client_email" class="col-sm-4 col-form-label">Client
                                        Email</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="client_email"
                                                name="client_email"
                                                value="{{old('client_email')}}">
                                        @error('client_email')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="client_profession_id"
                                            class="col-sm-4 col-form-label">Profession/Type</label>
                                    <div class="col-sm-8">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <select name="client_profession_id"
                                                        class="form-control select2"
                                                        id="client_profession_id">
                                                    <option value="">Select</option>
                                                    @foreach ($profession as $item)
                                                        <option
                                                            value="{{ $item->id }}" {{(old('client_profession_id') == $item->id ? 'selected':'')}}>{{ ucfirst($item->profession_name) }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control"
                                                        id="client_profession_write"
                                                        name="client_profession_write"
                                                        placeholder="Profession Name"
                                                        value="{{ old('client_profession_write') }}">
                                            </div>
                                        </div>

                                        @error('client_profession_id')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="client_division_id"
                                            class="col-sm-4 col-form-label">Division/Zone</label>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <select name="client_division_id"
                                                        id="client_division_id"
                                                        class="form-control select2" action="{{ route('find_district') }}">
                                                    <option value="">Select</option>
                                                    @foreach ($division as $item)
                                                        <option
                                                            value="{{ $item->id }}" {{(old('client_division_id') == $item->id ? 'selected':'')}}>{{ ucfirst($item->division_name) }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control"
                                                        id="client_divisoin_write"
                                                        name="client_divisoin_write"
                                                        placeholder="Client Zone"
                                                        value="{{ old('client_divisoin_write') }}">
                                            </div>
                                        </div>
                                        @error('client_division_id')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="client_district_id"
                                            class="col-sm-4 col-form-label">District/Area</label>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <select name="client_district_id"
                                                        id="client_district_id"
                                                        class="form-control select2" action="{{ route('find-thana') }}">
                                                    <option value="">Select</option>

                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control"
                                                        id="client_district_write"
                                                        name="client_district_write"
                                                        placeholder="Client Area"
                                                        value="{{ old('client_district_write') }}">
                                            </div>
                                        </div>

                                        @error('client_district_id')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="client_thana_id"
                                            class="col-sm-4 col-form-label">Thana/Branch</label>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <select name="client_thana_id"
                                                        id="client_thana_id"
                                                        class="form-control select2">
                                                    <option value="">Select</option>

                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control"
                                                        id="client_thana_write"
                                                        name="client_thana_write"
                                                        placeholder="Client Branch"
                                                        value="{{ old('client_thana_write') }}">
                                            </div>
                                        </div>
                                        @error('client_thana_id')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="client_representative_name" class="col-sm-4 col-form-label">Representative
                                        Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="client_representative_name"
                                                name="client_representative_name"
                                                value="{{old('client_representative_name')}}">
                                        @error('client_representative_name')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="client_representative_details"
                                            class="col-sm-4 col-form-label"> Representative Details </label>
                                    <div class="col-sm-8">
                                    <textarea name="client_representative_details" class="form-control"
                                                rows="3"
                                                placeholder="">{{old('client_representative_details')}}</textarea>
                                        @error('client_representative_details')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="client_coordinator_tadbirkar_id"
                                            class="col-sm-4 col-form-label"> Coordinator/Tadbirkar </label>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <select name="client_coordinator_tadbirkar_id"
                                                        id="client_coordinator_tadbirkar_id"
                                                        class="form-control select2">
                                                    <option value="">Select</option>
                                                    @foreach($coordinator as $item)
                                                        <option
                                                            value="{{ $item->id }}" {{ old('client_coordinator_tadbirkar_id') == $item->id ? 'selected' : '' }}>{{ $item->coordinator_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control"
                                                        id="coordinator_tadbirkar_write"
                                                        name="coordinator_tadbirkar_write"
                                                        placeholder="Tadbirkar Name"
                                                        value="{{old('coordinator_tadbirkar_write')}}">
                                            </div>
                                        </div>
                                        @error('coordinator_tadbirkar_write')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="client_coordinator_details"
                                            class="col-sm-4 col-form-label"> Coordinator Details </label>
                                    <div class="col-sm-8">
                                    <textarea name="client_coordinator_details" class="form-control"
                                                rows="3"
                                                placeholder="">{{old('client_coordinator_details')}}</textarea>
                                        @error('client_coordinator_details')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>

                            </div>
                        </div>

                      

                        <div class="card allCard" style="width:100%">
                            <div class="card-header positionCard">
                                <h6 class="card-title text-uppercase"> Oposit party information </h6>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="opposition_party_id"
                                            class="col-sm-4 col-form-label">Opposition(Which Party)</label>
                                    <div class="col-sm-8">
                                        <select name="opposition_party_id"
                                                class="form-control select2"
                                                id="opposition_party_id">
                                            <option value="">Select</option>
                                            @foreach($in_favour_of as $item)
                                                <option
                                                    value="{{ $item->id }}" {{(old('opposition_party_id') == $item->id ? 'selected':'')}}> {{ $item->in_favour_of_name }} </option>
                                            @endforeach
                                        </select>
                                        @error('opposition_party_id')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="opposition_category_id"
                                            class="col-sm-4 col-form-label">Opposition
                                        Category</label>
                                    <div class="col-sm-8">
                                        <select name="opposition_category_id"
                                                class="form-control select2"
                                                id="opposition_category_id"
                                                action="{{ route('find-client-subcategory') }}">
                                            <option value="">Select</option>
                                            @foreach ($client_category as $item)
                                                <option
                                                    value="{{ $item->id }}" {{(old('opposition_category_id') == $item->id ? 'selected':'')}}>{{ ucfirst($item->client_category_name) }}</option>
                                            @endforeach
                                        </select>
                                        @error('opposition_category_id')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="opposition_subcategory_id"
                                            class="col-sm-4 col-form-label">Opposition
                                        Subcategory</label>
                                    <div class="col-sm-8">
                                        <select name="opposition_subcategory_id"
                                                class="form-control select2"
                                                id="opposition_subcategory_id">
                                            <option value="">Select</option>

                                        </select>
                                        @error('opposition_subcategory_id')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="opposition_id" class="col-sm-4 col-form-label">Opposition
                                        Name</label>
                                    <div class="col-sm-8">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <select name="opposition_id[]"
                                                        id="opposition_id"
                                                        class="form-control select2" data-placeholder="Select" multiple>
                                                    <option value="">Select</option>
                                                    @foreach($opposition as $item)
                                                        <option
                                                            value="{{ $item->opposition_name }}" {{  old('opposition_id') == $item->id ? 'selected' : '' }}>{{ $item->opposition_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group hdtuto_opposition control-group increment_opposition">
                                                    <input type="text" name="opposition_write[]"
                                                            class="myfrm form-control col-12" placeholder="Opposition">
                                                    <div class="input-group-btn">
                                                        <button class="btn btn-success btn_success_opposition"
                                                                type="button"><i
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
                                                                    type="button"><i
                                                                    class="fldemo glyphicon glyphicon-remove"></i> -
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>

                                        @error('client_name')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="opposition_business_name" class="col-sm-4 col-form-label">Opposition Business
                                        Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="opposition_business_name"
                                                name="opposition_business_name"
                                                value="{{ old('opposition_business_name') }}">
                                        @error('opposition_business_name')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="opposition_group_id" class="col-sm-4 col-form-label">Opposition Group Name</label>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <select name="opposition_group_id"
                                                        id="opposition_group_id"
                                                        class="form-control select2">
                                                    <option value="">Select</option>
                                                    @foreach($group_name as $item)
                                                        <option
                                                            value="{{ $item->id }}" {{  old('opposition_group_id') == $item->id ? 'selected' : '' }}>{{ $item->group_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control"
                                                        id="opposition_group_write"
                                                        name="opposition_group_write"
                                                        placeholder="Opposition Group"
                                                        value="{{ old('opposition_group_write') }}">
                                            </div>
                                        </div>
                                        @error('opposition_group_write')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="opposition_address" class="col-sm-4 col-form-label">
                                        Opposition
                                        Address </label>
                                    <div class="col-sm-8">
                                    <textarea name="opposition_address" class="form-control" rows="3"
                                                placeholder="">{{old('opposition_address')}}</textarea>
                                        @error('opposition_address')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="opposition_mobile" class="col-sm-4 col-form-label">Opposition
                                        Mobile</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="opposition_mobile"
                                                name="opposition_mobile"
                                                value="{{old('opposition_mobile')}}">
                                        @error('opposition_mobile')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="opposition_email" class="col-sm-4 col-form-label">Opposition
                                        Email</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="opposition_email"
                                                name="opposition_email"
                                                value="{{old('opposition_email')}}">
                                        @error('opposition_email')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="opposition_profession_id"
                                            class="col-sm-4 col-form-label">Profession/Type</label>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <select name="opposition_profession_id"
                                                        class="form-control select2"
                                                        id="opposition_profession_id">
                                                    <option value="">Select</option>
                                                    @foreach ($profession as $item)
                                                        <option
                                                            value="{{ $item->id }}" {{(old('opposition_profession_id') == $item->id ? 'selected':'')}}>{{ ucfirst($item->profession_name) }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control"
                                                        id="opposition_profession_write"
                                                        name="opposition_profession_write"
                                                        placeholder="Profession Name"
                                                        value="{{ old('opposition_profession_write') }}">
                                            </div>
                                        </div>
                                        @error('opposition_profession_write')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="opposition_division_id"
                                            class="col-sm-4 col-form-label">Division/Zone</label>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <select name="opposition_division_id"
                                                        id="opposition_division_id"
                                                        class="form-control select2" action="{{ route('find_district') }}">
                                                    <option value="">Select</option>
                                                    @foreach ($division as $item)
                                                        <option
                                                            value="{{ $item->id }}" {{(old('opposition_division_id') == $item->id ? 'selected':'')}}>{{ ucfirst($item->division_name) }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control"
                                                        id="opposition_divisoin_write"
                                                        name="opposition_divisoin_write"
                                                        placeholder="Opposition Zone"
                                                        value="{{ old('opposition_divisoin_write') }}">
                                            </div>
                                        </div>
                                        @error('opposition_divisoin_write')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="opposition_district_id"
                                            class="col-sm-4 col-form-label">District/Area</label>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <select name="opposition_district_id"
                                                        id="opposition_district_id"
                                                        class="form-control select2" action="{{ route('find-thana') }}">
                                                    <option value="">Select</option>

                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control"
                                                        id="opposition_district_write"
                                                        name="opposition_district_write"
                                                        placeholder="Opposition Area"
                                                        value="{{ old('opposition_district_write') }}">
                                            </div>
                                        </div>

                                        @error('opposition_district_write')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="opposition_thana_id"
                                            class="col-sm-4 col-form-label">Thana/Branch</label>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <select name="opposition_thana_id"
                                                        id="opposition_thana_id"
                                                        class="form-control select2">
                                                    <option value="">Select</option>

                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control"
                                                        id="opposition_thana_write"
                                                        name="opposition_thana_write"
                                                        placeholder="Opposition Branch"
                                                        value="{{ old('opposition_thana_write') }}">
                                            </div>
                                        </div>
                                        @error('opposition_thana_write')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="opposition_representative_name" class="col-sm-4 col-form-label">Representative
                                        Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="opposition_representative_name"
                                                name="opposition_representative_name"
                                                value="{{old('opposition_representative_name')}}">
                                        @error('opposition_representative_name')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="opposition_representative_details"
                                            class="col-sm-4 col-form-label"> Representative Details </label>
                                    <div class="col-sm-8">
                                    <textarea name="opposition_representative_details" class="form-control"
                                                rows="3"
                                                placeholder="">{{old('opposition_representative_details')}}</textarea>
                                        @error('opposition_representative_details')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="opposition_coordinator_tadbirkar_id"
                                            class="col-sm-4 col-form-label"> Coordinator/Tadbirkar </label>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <select name="opposition_coordinator_tadbirkar_id"
                                                        id="opposition_coordinator_tadbirkar_id"
                                                        class="form-control select2">
                                                    <option value="">Select</option>
                                                    @foreach($coordinator as $item)
                                                        <option
                                                            value="{{ $item->id }}" {{ old('opposition_coordinator_tadbirkar_id') == $item->id ? 'selected' : '' }}>{{ $item->coordinator_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control"
                                                        id="opposition_coordinator_tadbirkar_write"
                                                        name="opposition_coordinator_tadbirkar_write"
                                                        placeholder="Tadbirkar Name"
                                                        value="{{old('opposition_coordinator_tadbirkar_write')}}">
                                            </div>
                                        </div>
                                        @error('coordinator_tadbirkar_id')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="opposition_coordinator_details"
                                            class="col-sm-4 col-form-label"> Coordinator Details </label>
                                    <div class="col-sm-8">
                                    <textarea name="opposition_coordinator_details" class="form-control"
                                                rows="3"
                                                placeholder="">{{old('opposition_coordinator_details')}}</textarea>
                                        @error('opposition_coordinator_details')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>

                            </div>
                        </div>

  <div class="card caseFileLoacation">
                                        <div class="card-header caseInfoHeader">
                                            <h6 class="text-uppercase text-bold">Lawyers Information : (Opposition Lawyer)
                                                <button type="button" class="btn btn-info btn-sm float-right"
                                                    data-toggle="modal" data-target="#modal-lg-opp-lawyers-info"
                                                    data-toggle="tooltip" data-placement="top"
                                                    title="Update Lawyers Information"><i class="fas fa-edit"></i>
                                                </button>
                                            </h6>
                                        </div>
                                        <div class="card-body">

                                            <table class="table table-bordered caseInfoTable2">

                                                <tbody>

                                                    <tr>
                                                        <td width="50%">Name of Advocate/Law Firm</td>
                                                        <td width="50%">{{ @$oppLawyer->opp_lawyer_advocate_write }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Name of Assigned Lawyer</td>
                                                        <td>{{ @$oppLawyer->opp_lawyer_assigned_lawyer }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Lawyer Contact</td>
                                                        <td>{{ @$oppLawyer->opp_lawyer_contact }} </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Note</td>
                                                        <td>{{ @$oppLawyer->opp_lawyers_note }} </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>                      


                                                  </div>
                                                </div>






<div class="tab-pane fade" id="pills-lawyer" role="tabpanel" aria-labelledby="pills-lawyer-tab">
    <div class="container-fluid">
        <div class="card allCard" style="width:100%">




                        <div class="card" style="height: 355px; width: 100%;">
                            <div class="card-header positionCard">
                                <h6 class="card-title text-uppercase"> Lawyer Information </h6>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="lawyer_advocate_id"
                                           class="col-sm-4 col-form-label">Name of Advocate/Law Firm</label>
                                    <div class="col-sm-8">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <select name="lawyer_advocate_id"
                                                        class="form-control select2"
                                                        id="lawyer_advocate_id">
                                                    <option value="">Select</option>
                                                    @foreach($chamber as $item)
                                                      <option value="{{$item->professional_name}}">{{$item->professional_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control"
                                                       id="lawyer_advocate_write"
                                                       name="lawyer_advocate_write"
                                                       placeholder="Advocate Name"
                                                       value="{{ old('lawyer_advocate_write') }}">
                                            </div>
                                        </div>

                                        @error('client_profession_id')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lead_laywer_name"
                                           class="col-sm-4 col-form-label">Name of Lead Laywer</label>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <select name="lead_laywer_name"
                                                        class="form-control select2"
                                                        id="lead_laywer_name">
                                                    <option value="">Select</option>

                                                    @foreach($leadLaywer as $item)
                                                    <option value="{{$item->professional_name}}">{{$item->professional_name}}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control"
                                                       id="lead_laywer_name_extra"
                                                       name="lead_laywer_name_extra"
                                                       placeholder="Advocate Name"
                                                       value="{{ old('lead_laywer_name_extra') }}">
                                            </div>
                                        </div>

                                        @error('client_profession_id')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="assigned_lawyer_id" class="col-sm-4 col-form-label">Name of Assigned
                                        Lawyer</label>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <select name="assigned_lawyer_id[]" class="form-control select2"
                                                data-placeholder="Select">
                                            <option value="">Select</option>

                                            @foreach($assignedlaywer as $item)
                                                    <option value="{{$item->professional_name}}">{{$item->professional_name}}</option>
                                            @endforeach

                                        </select>

                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control"
                                                       id="assigned_lawyer_extra"
                                                       name="assigned_lawyer_extra"
                                                       placeholder="Advocate Name"
                                                       value="{{ old('assigned_lawyer_extra') }}">
                                            </div>

                                        </div>

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="lawyers_remarks"
                                           class="col-sm-4 col-form-label"> Remarks </label>
                                    <div class="col-sm-8">
                                    <textarea name="lawyers_remarks" class="form-control"
                                              rows="3"
                                              placeholder="">{{old('lawyers_remarks')}}</textarea>
                                        @error('lawyers_remarks')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card oppLowyer" style="width:100%">
                            <div class="card-header positionCard">
                                <h6 class="card-title text-uppercase"> Lawyer Information ( Opposition Lawyer) </h6>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="lawyer_advocate_id"
                                           class="col-sm-4 col-form-label"> Advocate/Law Firm</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control"
                                            id="opp_lawyer_advocate_write"
                                            name="opp_lawyer_advocate_write"
                                            placeholder="Advocate Name"
                                            value="{{ old('opp_lawyer_advocate_write') }}">

                                    {{-- <select name="opp_lawyer_advocate_write"
                                            class="form-control select2"
                                            id="opp_lawyer_advocate_write" action="{{ route('find-associates') }}">
                                        <option value="">Select</option>
                                        @foreach($external_council as $item)
                                            <option
                                                value="{{$item->first_name}} {{$item->last_name}}" {{( old('opp_lawyer_advocate_write') == $item->id ? 'selected':'')}}>{{ $item->first_name }} {{ $item->last_name }}</option>
                                        @endforeach
                                    </select> --}}

                                        @error('client_profession_id')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="assigned_lawyer_id" class="col-sm-4 col-form-label">Assigned
                                        Lawyer</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control"
                                        id="opp_lawyer_assigned_lawyer"
                                        name="opp_lawyer_assigned_lawyer"
                                        placeholder="Assigned Lawyer"
                                        value="{{ old('opp_lawyer_assigned_lawyer') }}">

                                        @error('assigned_lawyer_id')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="assigned_lawyer_id" class="col-sm-4 col-form-label">
                                        Lawyer Contact</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control"
                                        id="opp_lawyer_contact"
                                        name="opp_lawyer_contact"
                                        placeholder="Lawyer Contact"
                                        value="{{ old('opp_lawyer_contact') }}">

                                        @error('assigned_lawyer_id')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="opp_lawyers_note"
                                           class="col-sm-4 col-form-label"> Note </label>
                                    <div class="col-sm-8">
                                    <textarea name="opp_lawyers_note" class="form-control"
                                              rows="3"
                                              placeholder="">{{old('opp_lawyers_note')}}</textarea>
                                        @error('opp_lawyers_note')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                            </div>
                        </div>




        </div> 
    </div>
</div>



















                                                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                                  <div class="container-fluid">
                                                    <div class="card" style="width:100%">
                            <div class="card-header positionCard">
                                <h6 class="card-title text-uppercase"> Documents Received </h6>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">

                                    <div class="col-sm-12">
                                            <div class="input-group hdtuto_received_documents control-group increment_received_documents">

                                            <input type="hidden" name="received_documents_sections[]"
                                                    class="myfrm form-control mr-2" value="received_documents_sections">
                                            <select name="received_documents_id[]"
                                                class="form-control mr-3">
                                                <option value="">Select</option>
                                                @foreach($documents as $item)
                                                    <option
                                                        value="{{ $item->id }}" {{ old('received_documents_id') == $item->id ? 'selected' : '' }}>{{ $item->documents_name }}</option>
                                                @endforeach
                                            </select>
                                            <input type="text" name="received_documents[]"
                                                    class="myfrm form-control mr-2">
                                            <input type="date" name="received_documents_date[]"
                                                    class="myfrm form-control ml-2 mr-2" value="dd/mm/yyyy">
                                            <select name="received_documents_type_id[]"
                                                class="form-control mr-3 ml-2">
                                                <option value="">Select</option>
                                                @foreach($documents_type as $item)
                                                    <option value="{{ $item->id }}" {{ old('received_documents_type_id') == $item->id ? 'selected' : '' }}>{{ $item->documents_type_name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="input-group-btn">
                                                <button class="btn btn-success btn_success_received_documents"
                                                        type="button"><i
                                                        class="fldemo glyphicon glyphicon-plus"></i>+
                                                </button>
                                            </div>
                                        </div>
                                        <div class="clone_received_documents hide">
                                            <div class="hdtuto_received_documents control-group lst input-group"
                                                    style="margin-top:10px">
                                                    <input type="hidden" name="received_documents_sections[]"
                                                    class="myfrm form-control mr-2" value="received_documents_sections">
                                                    <select name="received_documents_id[]"
                                                    class="form-control mr-3" >
                                                    <option value="">Select</option>
                                                    @foreach($documents as $item)
                                                        <option
                                                            value="{{ $item->id }}" {{ old('received_documents_id') == $item->id ? 'selected' : '' }}>{{ $item->documents_name }}</option>
                                                    @endforeach
                                                </select>
                                                <input type="text" name="received_documents[]"
                                                        class="myfrm form-control mr-2">
                                                <input type="date" name="received_documents_date[]"
                                                        class="myfrm form-control ml-2 mr-2" value="dd/mm/yyyy">
                                                <select name="received_documents_type_id[]"
                                                    class="form-control mr-3 ml-2">
                                                    <option value="">Select</option>
                                                    @foreach($documents_type as $item)
                                                        <option
                                                            value="{{ $item->id }}" {{ old('received_documents_type_id') == $item->id ? 'selected' : '' }}>{{ $item->documents_type_name }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="input-group-btn">
                                                    <button class="btn btn-danger btn_danger_received_documents"
                                                            type="button"><i
                                                            class="fldemo glyphicon glyphicon-remove"></i> -
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        @error('case_infos_received_documents_informant_name')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>


                            </div>
                        </div>

<div class="card" style="width:100%">
                            <div class="card-header positionCard">
                                <h6 class="card-title text-uppercase"> Documents Required </h6>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">

                                    <div class="col-sm-12">
                                        <div class="input-group hdtuto_required_wanting_documents control-group increment_required_wanting_documents">
                                            <input type="hidden" name="required_wanting_documents_sections[]"
                                                    class="myfrm form-control mr-2" value="required_wanting_documents_sections">
                                            <select name="required_wanting_documents_id[]"
                                                class="form-control mr-3">
                                                <option value="">Select</option>
                                                @foreach($documents as $item)
                                                    <option
                                                        value="{{ $item->id }}" {{ old('required_wanting_documents_id') == $item->id ? 'selected' : '' }}>{{ $item->documents_name }}</option>
                                                @endforeach
                                            </select>
                                            <input type="text" name="required_wanting_documents[]"
                                                    class="myfrm form-control mr-2">
                                            <input type="date" name="required_wanting_documents_date[]"
                                                    class="myfrm form-control ml-2 mr-2" value="dd/mm/yyyy">
                                            <select name="required_wanting_documents_type_id[]"
                                                    class="form-control mr-3 ml-2">
                                                    <option value="">Select</option>
                                                    @foreach($documents_type as $item)
                                                        <option
                                                            value="{{ $item->id }}" {{ old('required_wanting_documents_type_id') == $item->id ? 'selected' : '' }}>{{ $item->documents_type_name }}</option>
                                                    @endforeach
                                            </select>
                                            <div class="input-group-btn">
                                                <button class="btn btn-success btn_success_required_wanting_documents"
                                                        type="button"><i
                                                        class="fldemo glyphicon glyphicon-plus"></i>+
                                                </button>
                                            </div>
                                        </div>
                                        <div class="clone_required_wanting_documents hide">
                                            <div class="hdtuto_required_wanting_documents control-group lst input-group"
                                                    style="margin-top:10px">
                                                    <input type="hidden" name="required_wanting_documents_sections[]"
                                                    class="myfrm form-control mr-2" value="required_wanting_documents_sections">
                                                    <select name="required_wanting_documents_id[]"
                                                    class="form-control mr-3">
                                                    <option value="">Select</option>
                                                    @foreach($documents as $item)
                                                        <option
                                                            value="{{ $item->id }}" {{ old('required_wanting_documents_id') == $item->id ? 'selected' : '' }}>{{ $item->documents_name }}</option>
                                                    @endforeach
                                                </select>
                                                <input type="text" name="required_wanting_documents[]"
                                                        class="myfrm form-control mr-2">

                                                <input type="date" name="required_wanting_documents_date[]"
                                                    class="myfrm form-control ml-2 mr-2" value="dd/mm/yyyy">
                                            <select name="required_wanting_documents_type_id[]"
                                                    class="form-control mr-3 ml-2">
                                                    <option value="">Select</option>
                                                    @foreach($documents_type as $item)
                                                        <option
                                                            value="{{ $item->id }}" {{ old('required_wanting_documents_type_id') == $item->id ? 'selected' : '' }}>{{ $item->documents_type_name }}</option>
                                                    @endforeach
                                            </select>
                                                <div class="input-group-btn">
                                                    <button class="btn btn-danger btn_danger_required_wanting_documents"
                                                            type="button"><i
                                                            class="fldemo glyphicon glyphicon-remove"></i> -
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        @error('required_wanting_documents')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>


                            </div>
                        </div>
<div class="card" style="width:100%">
                            <div class="card-header positionCard">
                                <h6 class="card-title text-uppercase"> Document Upload </h6>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="input-group hdtuto_files control-group increment_files">
                                        <input type="file" name="uploaded_document[]"
                                               class="myfrm form-control col-md-4 mr-2">
                                        <input type="date" name="uploaded_date[]"
                                            class="myfrm form-control mr-2 col-md-4" value="{{ old('uploaded_date') }}">
                                        <select name="documents_type_id[]"
                                            class="form-control col-md-4">
                                            <option value="">Select</option>
                                            @foreach($documents_type as $item)
                                                <option
                                                    value="{{ $item->id }}" {{ old('documents_type_id') == $item->id ? 'selected' : '' }}>{{ $item->documents_type_name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-btn">
                                            <button class="btn btn-success btn_success_files"
                                                    type="button"><i
                                                    class="fldemo glyphicon glyphicon-plus"></i>+
                                            </button>
                                        </div>
                                    </div>
                                    <div class="clone_files hide">
                                        <div class="hdtuto_files control-group lst input-group"
                                             style="margin-top:10px">
                                            <input type="file" name="uploaded_document[]"
                                                   class="myfrm form-control col-md-4 mr-2">
                                            <input type="date" name="uploaded_date[]"
                                                class="myfrm form-control mr-2 col-md-4" value="{{ old('uploaded_date') }}">
                                            <select name="documents_type_id[]"
                                                class="form-control col-md-4">
                                                <option value="">Select</option>
                                                @foreach($documents_type as $item)
                                                    <option
                                                        value="{{ $item->id }}" {{ old('documents_type_id') == $item->id ? 'selected' : '' }}>{{ $item->documents_type_name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="input-group-btn">
                                                <div class="input-group-btn">
                                                    <button class="btn btn-danger btn_danger_files"
                                                            type="button"><i
                                                            class="fldemo glyphicon glyphicon-remove"></i> -
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>



                            </div>
                        </div>


                                                  </div>
                                                </div>
                                                <div class="tab-pane fade" id="pills-casefile" role="tabpanel" aria-labelledby="pills-casefile-tab">
                                                  <div class="container-fluid">
                                                     <div class="card" style="width:100%;">
                            <div class="card-header positionCard">
                                <h6 class="card-title text-uppercase"> CASE FILE LOCATION </h6>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">

                                    <div class="col-sm-12">
                                        <div class="input-group hdtuto_case_file_location_new control-group increment_case_file_location_new">
                                            <input type="hidden" name="case_file_location_new_sections[]"
                                                    class="myfrm form-control mr-2" value="case_file_location_new_sections">
                                            <select name="case_file_location_new_id[]"
                                                class="form-control mr-3">
                                                <option value="">Select</option>
                                                @foreach($cabinet as $item)
                                                <option
                                                    value="{{ $item->id }}" {{  old('case_file_location_new_id') == $item->id ? 'selected' : '' }}>{{ $item->cabinet_name }}</option>
                                                 @endforeach
                                            </select>
                                            <input type="text" name="case_file_location_new_office[]"
                                                    class="myfrm form-control mr-2">
                                            <input type="text" name="case_file_location_new_almirah[]"
                                                    class="myfrm form-control mr-2">
                                            <input type="text" name="case_file_location_new_self[]"
                                                    class="myfrm form-control mr-2">

                                            <div class="input-group-btn">
                                                <button class="btn btn-success btn_success_case_file_location_new"
                                                        type="button"><i
                                                        class="fldemo glyphicon glyphicon-plus"></i>+
                                                </button>
                                            </div>
                                        </div>
                                        <div class="clone_case_file_location_new hide">
                                            <div class="hdtuto_case_file_location_new control-group lst input-group"
                                                    style="margin-top:10px">
                                                    <input type="hidden" name="case_file_location_new_sections[]"
                                                    class="myfrm form-control mr-2" value="case_file_location_new_sections">
                                            <select name="case_file_location_new_id[]"
                                                class="form-control mr-3">
                                                <option value="">Select</option>
                                                @foreach($cabinet as $item)
                                                <option
                                                    value="{{ $item->id }}" {{  old('case_file_location_new_id') == $item->id ? 'selected' : '' }}>{{ $item->cabinet_name }}</option>
                                                 @endforeach
                                            </select>
                                            <input type="text" name="case_file_location_new_office[]"
                                                    class="myfrm form-control mr-2">
                                            <input type="text" name="case_file_location_new_almirah[]"
                                                    class="myfrm form-control mr-2">
                                            <input type="text" name="case_file_location_new_self[]"
                                                    class="myfrm form-control mr-2">
                                                <div class="input-group-btn">
                                                    <button class="btn btn-danger btn_danger_case_file_location_new"
                                                            type="button"><i
                                                            class="fldemo glyphicon glyphicon-remove"></i> -
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        @error('case_file_location_new')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="row">
                      
                      </div>
                   </div>
                                                   
                                                  </div>
                                                </div>
                                                <div class="col-md-12">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary text-uppercase submitForm"><i
                                    class="fas fa-save"></i> Save
                            </button>
                        </div>
                        
</form>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>    

<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css'>
  <script src='https://code.jquery.com/jquery-3.5.1.slim.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js'></script>








                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->

        


        <!-- /.content -->

    </div>
    
    <!-- /.content-wrapper -->
    @section('scripts')
       
        <script>
            $(document).ready(function() {
                fatchdata()

                function fatchdata() {

                    $.ajax({
                        type: "GET",
                        
                        url: '{{ url('client-data') }}',
                        dataType: "json",
                        success: function(response) {
                            console.log(response);
                             $('#client_id_select').html("");
                            $.each(response.data,function(key,item){
                            $('#client_id_select').append(`
                                <option  value="${item.id}">${item.client_name}</option>
                            `);
                            });
                        }
                    });
                }
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $('#save_client').on('click', function(e) {
                    console.log('anamika');
                    e.preventDefault();
                    $(this).html('Sending..');

                    $.ajax({

                        data: $('#add-client').serialize(),
                        url: '{{ url('store-client') }}',
                        type: "POST",
                        datatype: 'json',
                        cache: false,
                        success: function(data) {

                            $('#add-client').trigger("reset");
                            $('#modal-client-info').modal('hide');

                            fatchdata()
                        }

                    });


                });



            });
        </script>
    @endsection
@endsection

{{-- <script type="text/javascript">
    $('#case_category_id').on('change', function() {
       alert("asdfa");
    });
</script> --}}

<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script>
   $(document).ready(function(){
    $('#case_category_id').on('change', function() {
       if ($(this).val() === 'Civil') {
        $('.case_step_civil').show();
        $('.case_step_criminal').hide();


        $('.complainant_informant_name').html('Petitioner/Plaintiff Name')
        $('.complainant_informant_representative').html('Petitioner/Plaintiff Representative')
        $('.accused_name').html('Opposite Party/Defendant Name')
        $('.accused_representative').html('Defendant Representative')
        $('.prosecution_witness').html('Plaintiff Witnesses')
        $('.defense_witness').html('Defendant Witnesses')
        $('.allegation_claim').html(`Prayer/Claim`)

       } else {
        $('.case_step_criminal').show();
        $('.case_step_civil').hide();

        $('.complainant_informant_name').html('Complainant/Informant Name')
        $('.complainant_informant_representative').html(`Complainant/Informant's Representative`)
        $('.accused_name').html('Accused Name')
        $('.accused_representative').html(`Accused's Representative`)
        $('.prosecution_witness').html('Prosecution Witnesses')
        $('.defense_witness').html('Defense Witnesses')
        $('.allegation_claim').html(`Allegation/Claim`)








       }
    });
    });
</script>







