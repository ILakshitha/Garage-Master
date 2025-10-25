@extends('layouts.app')
@section('content')
<?php $timezone	= Auth::User()->timezone; ?>
<style>
    .bootstrap-datetimepicker-widget table td span {
        width: 0px !important;
    }

    .table-condensed>tbody>tr>td {
        padding: 3px;
    }

    .step1 {
        color: #5A738E !important;
        background-color: #f5f5f5;
        border-color: #ddd;
        padding: 10px 15px;
    }

    #date_of_birth-error {
        margin: 0px;
    }

    .jobcardmargintop {
        margin-top: 9px;
    }

    .table>tbody>tr>td {
        padding: 10px;
        vertical-align: unset !important;
    }

    .jobcard_heading {
        margin-left: 19px;
        margin-bottom: 15px
    }

    label {
        margin-bottom: 0px;
    }

    .checkbox_padding {
        margin: 10px 0px;
    }

    .first_observation {
        margin-left: 23px;
    }

    .height {
        height: 28px;
    }

    .all {
        width: 226px;
    }

    .step1 {
        color: #5A738E !important;

        background-color: #f5f5f5;
        border-color: #ddd;
        padding: 10px 15px;
    }

    .panel-title {
        background-color: #f5f5f5;
        padding: 10px 15px;
    }

    .bootstrap-datetimepicker-widget table td span {
        width: 0px !important;
    }

    .table-condensed>tbody>tr>td {
        padding: 3px;
    }

    body#app-layout.nav-md .top_nav .right_col {
    min-height: 3575px !important;
}
/* .modal-content {
    width: 150% !important;
} */
.select2-selection--multiple{
    width:80% !important;
}
    .select2-results__group {
    background-color:rgb(155, 155, 155) !important;
    font-weight: bold !important;
    padding: 5px !important;
    border-radius: 3px;
}
.nav-link-active{
        color:#EA6B00;
    }
    .tab-container {
    width: 100%;
    margin-bottom: 2%;
    background: #fff;
    overflow: hidden;
}

/* Parts Sell Table Styles */
.adddatatable {
    width: 100%;
    margin-bottom: 20px;
}

.adddatatable th,
.adddatatable td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
    vertical-align: middle;
}

.adddatatable th {
    background-color: #f8f9fa;
    font-weight: bold;
}

.adddatatable select,
.adddatatable input {
    width: 100%;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.adddatatable input[readonly] {
    background-color: #f9f9f9;
}

/* Button styles for part sell */
#add_new_part_product {
    margin-left: 10px;
    padding: 5px 10px;
}

/* Error message styles for parts sell */
.help-block.error-help-block {
    color: #a94442;
    font-size: 12px;
    margin-top: 2px;
}

.has-error .form-control {
    border-color: #a94442;
}

@media (max-width: 768px) {
    .table-responsive {
        overflow-x: auto !important;
        -webkit-overflow-scrolling: touch !important;
        margin-bottom: 15px !important;
    }
    
    .adddatatable {
        min-width: 800px !important;
        width: 100% !important;
    }
    
    .adddatatable th,
    .adddatatable td {
        white-space: nowrap !important;
        min-width: 120px !important;
        padding: 8px 5px !important;
        font-size: 12px !important;
    }
    
    /* Specific column widths */
    .adddatatable th:nth-child(1), /* Manufacturer Name */
    .adddatatable td:nth-child(1) {
        min-width: 150px !important;
    }
    
    .adddatatable th:nth-child(2), /* Product Name */
    .adddatatable td:nth-child(2) {
        min-width: 180px !important;
    }
    
    .adddatatable th:nth-child(3), /* Quantity */
    .adddatatable td:nth-child(3) {
        min-width: 100px !important;
    }
    
    .adddatatable th:nth-child(4), /* Price */
    .adddatatable td:nth-child(4) {
        min-width: 120px !important;
    }
    
    .adddatatable th:nth-child(5), /* Amount */
    .adddatatable td:nth-child(5) {
        min-width: 120px !important;
    }
    
    .adddatatable th:nth-child(6), /* Action */
    .adddatatable td:nth-child(6) {
        min-width: 80px !important;
    }
    
    /* Select dropdown styling in mobile */
    .adddatatable select {
        width: 100% !important;
        min-width: 140px !important;
        font-size: 14px !important;
    }
    
    .adddatatable input {
        width: 100% !important;
        min-width: 80px !important;
        font-size: 14px !important;
    }
}

@media (max-width: 540px) {
    .adddatatable {
        min-width: 700px !important;
    }
    
    .adddatatable th,
    .adddatatable td {
        font-size: 11px !important;
        padding: 6px 3px !important;
    }
    
    .adddatatable select,
    .adddatatable input {
        font-size: 12px !important;
        padding: 4px !important;
    }
}

.tab-menu {
    display: flex;
    background-color: transparent; /* Remove background color of tabs */
    border-bottom: 1px solid #959595; /* Optional: Add a bottom border for the container */
}

.tab-link {
    flex: 1;
    padding: 10px 15px;
    cursor: pointer;
    background: none; /* Remove background color */
    color: black; /* Default text color */
    border: none;
    text-align: center;
    font-size: 16px;
    transition: color 0.3s ease, border-bottom 0.3s ease;
    position: relative;
}

.tab-link:hover {
    color: #EA6B00; /* Hover text color */
}

.tab-link.active {
    color: #EA6B00; /* Active tab text color */
    font-weight: bold; /* Optional: Make the active tab text bold */
    border-bottom: 3px solid #EA6B00; /* Underline for the active tab */
}

.tab-content {
    display: none;
    padding: 20px;
}

.tab-content.active {
    display: block;
}


/* Ensure dropdown scroll works and appears on the right */
.select2-container--default .select2-results > .select2-results__options {
    max-height: 300px; 
    overflow-y: auto; 
    scrollbar-width: thin; /* For modern browsers, make scrollbar thinner */
}

/* Style the scrollbar for Webkit browsers (Chrome, Safari) */
.select2-container--default .select2-results > .select2-results__options::-webkit-scrollbar {
    width: 8px; 
}

.select2-container--default .select2-results > .select2-results__options::-webkit-scrollbar-track {
    background: #f1f1f1; 
}

.select2-container--default .select2-results > .select2-results__options::-webkit-scrollbar-thumb {
    background: #888; /* Scrollbar thumb color */
    border-radius: 4px; 
}


/* Style the dropdown icon on the right side */
.select2-container--default .select2-selection--multiple {
    position: relative;
    padding-right: 30px; 
}

.select2-container--default .select2-selection--multiple:after {
    content: '▼'; /* Dropdown arrow icon */
    position: absolute;
    right: 10px; /* Position the icon on the right */
    top: 50%;
    transform: translateY(-50%);
    font-size: 15px; /* Adjust the size of the icon */
    color: #aaa; /* Icon color */
    pointer-events: none; /* Prevent icon from blocking interaction */
}

/* Adjust the dropdown width if needed */
.select2-container--default .select2-dropdown {
    border-radius: 4px; /* Optional: rounded corners */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Optional: add shadow */
    width: 100%; /* Ensure dropdown matches width */
}
.select2-dropdown{
    width:670px !important;
}
</style>

<!-- page content -->
<div class="right_col position-relative" role="main">
  <div class="page-title">
    <div class="nav_menu">
      <nav>
        <div class="nav toggle">
          <span class="titleup">
            <a id="menu_toggle"><i class="fa fa-bars sidemenu_toggle"></i></a>
            <a href="{!! url('/jobcard/list') !!}" id=""><i class=""><img src="{{ URL::asset('public/supplier/Back Arrow.png') }}" class="back-arrow"></i><span class="titleup">&nbsp; {{ trans('message.JobCard') }}</span></a>
          </span>
        </div>
        @include('dashboard.profile')
      </nav>
    </div>
  </div>
    <div class="tab-container ">
        <div class="tab-menu">
           
            <button class="tab-link" id="step1Btn">{{ Request::path() == 'service/store' ? trans('message.Step 1: Add Service') : trans('message.Step 1: Edit Service') }}</button>
            <button class="tab-link active">{{trans('message.Step 2: Job Card Details')}}</button>
        </div>
    </div>
@if (session('message'))
    <div class="row massage">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="checkbox checkbox-success checkbox-circle mb-2 alert alert-success alert-dismissible fade show">

                <label for="checkbox-10 colo_success" style="margin-left: 20px;font-weight: 600;">
                    {{ session('message') }} </label>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="padding: 1rem 0.75rem;"></button>
            </div>
        </div>
    </div>
    @endif
    <div class="x_content">

        <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 col-xs-12 space">
                        <h4><b>{{ trans('message.Step - 2 : Add Jobcard Details...') }}</b></h4>
                        <p class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 col-xs-12 ln_solid"></p>
                    </div>

                    <form id="service2Step" method="post" action="{{ url('/service/add_jobcard') }}" class="addJobcardForm">
                        <input type="hidden" class="service_id" name="service_id" value="{{ $service_data->id }}" />
                        <input type="hidden" name="message" value="{{ $message }}" />

                        <div class="row">
                            <div class="row col-md-7 col-lg-7 col-xl-7 col-xxl-7 col-sm-7 col-xs-7">
                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 col-xs-12" colspan="2" valign="top">
                                    <h3><?php echo $logo->system_name; ?></h3>
                                </div>
                                <div class="row col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 col-xs-12">
                                    <div class="col-md-5 col-lg-5 col-xl-5 col-xxl-5 col-sm-5 col-xs-5 printimg mx-0 mt-4">
                                        <img src="{{ url('/public/general_setting/' . $logo->logo_image) }}" class="img-fluid">
                                    </div>
                                    <div class="col-md-7 col-lg-7 col-xl-7 col-xxl-7 col-sm-7 col-xs-7 garrageadd mt-4" valign="top">
                                        <img src="{{ url::asset('public/img/icons/Vector (14).png') }}">&nbsp;
                                        <?php
                                        echo $logo->address . ' ';
                                        echo ',' . getCityName($logo->city_id);
                                        echo ',' . getStateName($logo->state_id);
                                        echo ', ' . getCountryName($logo->country_id);
                                        ?>
                                        <br>
                                        <img src="{{ URL::asset('public/img/icons/Vector (15).png') }}">
                                        <?php
                                        echo '' . $logo->email;
                                        echo '<br><i class="fa fa-phone fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;' . $logo->phone_number;
                                        ?>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 col-lg-5 col-xl-5 col-xxl-5 col-sm-5 col-xs-5">
                                <div class="row row-mb-0">
                                    <label class="control-label jobcardmargintop col-md-4 col-lg-4 col-xl-4 col-xxl-4 col-sm-4 col-xs-4">{{ trans('message.Job Card No') }}
                                        : <label class="color-danger">*</label></label>
                                    <div class="col-md-8 col-lg-8 col-xl-8 col-xxl-8 col-sm-8 col-xs-8">
                                        <input type="text" id="job_no" name="job_no" value="{{ $service_data->job_no }}" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="row row-mb-0">
                                    <label class="control-label jobcardmargintop col-md-4 col-lg-4 col-xl-4 col-xxl-4 col-sm-4 col-xs-4">{{ trans('message.In Date/Time') }}
                                        : <label class="color-danger">*</label></label>
                                    <div class="col-md-8 col-lg-8 col-xl-8 col-xxl-8 col-sm-8 col-xs-8 date">
                                        <input type="text" id="in_date" name="in_date" value="<?php echo date(getDateFormat() . ' H:i:s', strtotime($service_data->service_date)); ?>" class="form-control datepicker" placeholder="<?php echo getDateFormat();
                                                                                                                                                                                                                                    echo ' hh:mm:ss'; ?>"  readonly>
                                    </div>
                                </div>
                                <div class="row row-mb-0">
                                    <label class="control-label jobcardmargintop col-md-4 col-lg-4 col-xl-4 col-xxl-4 col-sm-4 col-xs-4">{{ trans('message.Expected Out Date/Time') }}
                                        : <label class="color-danger">*</label> </label>
                                    <div class="col-md-8 col-lg-8 col-xl-8 col-xxl-8 col-sm-8 col-xs-8 date ">
                                        <input type="text" id="date_of_birth" autocomplete="off" name="out_date" class="form-control datepicker" placeholder="<?php echo getDatepicker();
                                                                                                                         echo ' hh:mm:ss'; ?>" onkeypress="return false;"  value="{{ isset($jobcard_detail->out_date) ? $jobcard_detail->out_date : now()->setTimezone($timezone)->format('Y-m-d H:i:s') }}" required />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4 col-lg-4 col-xl-4 col-xxl-4 col-sm-4 col-xs-4">
                                <h2 class="text-left fw-bold">{{ trans('message.Customer Details') }}
                                </h2>
                                <p class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 col-xs-12 space1_solid">
                                </p>
                                <div class="row row-mb-0">
                                    <label class="control-label jobcardmargintopcol-md-4 col-lg-4 col-xl-4 col-xxl-4 col-sm-4 col-xs-4">{{ trans('message.Name') }}:</label>
                                    <div class="col-md-8 col-lg-8 col-xl-8 col-xxl-8 col-sm-8 col-xs-8">
                                        <input type="hidden" name="cust_id" value="{{ $service_data->customer_id }}">
                                        <input type="text" id="name" name="name" value="{{ getCustomerName($service_data->customer_id) }}" class="form-control">
                                    </div>
                                </div>
                                <div class="row row-mb-0">
                                    <label class="control-label jobcardmargintop col-md-4 col-lg-4 col-xl-4 col-xxl-4 col-sm-4 col-xs-4">{{ trans('message.Address') }}:
                                    </label>
                                    <div class="col-md-8 col-lg-8 col-xl-8 col-xxl-8 col-sm-8 col-xs-8">
                                        <input type="text" id="address" value="{{ getCustomerAddress($service_data->customer_id) }}" name="address" class="form-control">
                                    </div>
                                </div>
                                <div class="row row-mb-0">
                                    <label class="control-label jobcardmargintop col-md-4 col-lg-4 col-xl-4 col-xxl-4 col-sm-4 col-xs-4">{{ trans('message.Contact No') }}:</label>
                                    <div class="col-md-8 col-lg-8 col-xl-8 col-xxl-8 col-sm-8 col-xs-8">
                                        <input type="text" id="con_no" name="con_no" value="{{ getCustomerMobile($service_data->customer_id) }}" class="form-control">
                                    </div>
                                </div>
                                <div class="row row-mb-0">
                                    <label class="control-label jobcardmargintop col-md-4 col-lg-4 col-xl-4 col-xxl-4 col-sm-4 col-xs-4">
                                        {{ trans('message.Email') }}: </label>
                                    <div class="col-md-8 col-lg-8 col-xl-8 col-xxl-8 col-sm-8 col-xs-8">
                                        <input type="text" id="email" name="email" value="{{ getCustomerEmail($service_data->customer_id) }}" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-8 col-lg-8 col-xl-8 col-xxl-8 col-sm-8 col-xs-8 vehicle_space">
                                <h2 class="text-left fw-bold">{{ trans('message.Vehicle Details') }}
                                </h2>
                                <p class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 col-xs-12 space1_solid">
                                </p>
                                <div class="row mt-2">
                                    <label class="jobcardmargintop col-md-3 col-lg-3 col-xl-3 col-xxl-3 col-sm-3 col-xs-3">{{ trans('message.Model Name') }}:</label>
                                    <div class="col-md-5 col-lg-5 col-xl-5 col-xxl-5 col-sm-5 col-xs-5">
                                        <input type="hidden" name="vehi_id" value="{{ $vehical ? $vehical->id : '' }}">
                                        <input type="text" id="model" name="model" class="form-control" value="{{ $vehical ? $vehical->modelname : '' }}">
                                    </div>
                                    <div class="col-md-4 col-lg-4 col-xl-4 col-xxl-4 col-sm-4 col-xs-4"></div>
                                </div>
                                @if (!empty($vehical) && !empty($vehical->chassisno))
                                <div class="row mt-2">
                                    <label class="jobcardmargintop col-md-3 col-lg-3 col-xl-3 col-xxl-3 col-sm-3 col-xs-3">{{ trans('message.Chasis No') }}:</label>
                                    <div class="col-md-5 col-lg-5 col-xl-5 col-xxl-5 col-sm-5 col-xs-5">
                                        <input type="text" id="chassis" name="chassis" class="form-control" value="{{ $vehical->chassisno }}">
                                    </div>
                                    <div class="col-md-4 col-lg-4 col-xl-4 col-xxl-4 col-sm-4 col-xs-4"></div>
                                </div>
                                @endif

                                @if (!empty($vehical->engineno))
                                <div class="row mt-2">
                                    <label class="control-label col-md-3 col-lg-3 col-xl-3 col-xxl-3 col-sm-3 col-xs-3">{{ trans('message.Engine No') }}:</label>
                                    <div class="col-md-5 col-lg-5 col-xl-5 col-xxl-5 col-sm-5 col-xs-5">
                                        <input type="text" id="engine_no" name="engine_no" class="form-control" value="{{ $vehical->engineno }}" />
                                    </div>
                                    <div class="col-md-4 col-lg-4 col-xl-4 col-xxl-4 col-sm-4 col-xs-4"></div>
                                </div>
                                @endif
                                <!-- <div class="row mt-2">
                                    <label class="col-md-3 col-lg-3 col-xl-3 col-xxl-3 col-sm-3 col-xs-3">{{ trans('message.KMS Run') }}:<label class="text-danger">*</label></label>
                                    <div class="col-md-5 col-lg-5 col-xl-5 col-xxl-5 col-sm-5 col-xs-5">
                                        <input type="text" min='0' id="kms" name="kms" value="<?php if (!empty($jobcard_detail)) {
                                                                                                    echo "$jobcard_detail->kms_run";
                                                                                                } ?>" maxlength="10" class="form-control" required>
                                    </div>

                                    <div class="col-md-4 col-lg-4 col-xl-4 col-xxl-4 col-sm-4 col-xs-4"></div>
                                </div> -->

                                @if ($service_data->service_type == 'free')
                                <div class="row mt-2 ">
                                    <label class="col-md-3 col-lg-3 col-xl-3 col-xxl-3 col-sm-3 col-xs-3">{{ trans('message.F                               ree Service Coupan No') }}<label class="text-danger">*</label> :</label>
                                    <div class="col-md-5 col-lg-5 col-xl-5 col-xxl-5 col-sm-5 col-xs-5">
                                        <select id="coupan_no" name="coupan_no" class="form-control" required>
                                            <option value=""> {{ trans('message.Select Free Coupen') }}</option>
                                            @foreach ($free_coupan as $coupan)
                                            <?php $useddata = getUsedCoupon($service_data->customer_id, $service_data->vehicle_id, $coupan->job_no); ?>
                                            @if ($useddata == 0)
                                            <option value="{{ $coupan->job_no }}">{{ $coupan->job_no }}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                        <div class="text-danger" style="display: none;" id="service-coupon-error">
                                            {{ trans('message.Please Select Free Service Coupon.') }}
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-lg-4 col-xl-4 col-xxl-4 col-sm-4 col-xs-4"></div>
                                </div>
                                @endif
                                @if (!empty($sale_date))
                                <div class="row mt-2" id="divId">
                                    <label class="col-md-3 col-lg-3 col-xl-3 col-xxl-3 col-sm-3 col-xs-3">{{ trans('message.Date Of Sale') }}
                                        :</label>
                                    <div class="col-md-5 col-lg-5 col-xl-5 col-xxl-5 col-sm-5 col-xs-5">
                                        <input type="text" id="sales_date" name="sales_date" class="form-control datepicker" value="{{ date(getDateFormat(), strtotime($sale_date->date)) }}">
                                    </div>
                                    <div class="col-md-4 col-lg-4 col-xl-4 col-xxl-4 col-sm-4 col-xs-4"></div>
                                </div>
                                @endif

                                @if ($washbay_price != null)
                                <div class="row mt-2">
                                    <label class="col-md-3 col-lg-3 col-xl-3 col-xxl-3 col-sm-3 col-xs-3">{{ trans('message.Wash Bay Charge') }}<label class="text-danger"></label>:</label>
                                    <div class="col-md-5 col-lg-5 col-xl-5 col-xxl-5 col-sm-5 col-xs-5">
                                        <input type="text" id="washBay" name="washBayCharge" class="form-control" value="{{ $washbay_price->price }}" readonly>
                                    </div>
                                    <div class="col-md-4 col-lg-4 col-xl-4 col-xxl-4 col-sm-4 col-xs-4"></div>
                                </div>
                                @endif

                            </div>
                        </div>
                        
                        <!-- Parts Sell Section Start -->
                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 col-xs-12 space1">
                            <p class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 col-xs-12 ln_solid"></p>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-10 col-lg-10 col-xl-10 col-xxl-10 col-sm-10 col-xs-10 header">
                                <h3><b>{{ trans('message.Part Sells') }}</b>
                                <button type="button" id="add_new_part_product" class="btn btn-outline-secondary" url="{{ url('sales_part/add/getproductname') }}">{{ trans('+') }} </button>
                                </h3>   
                            </div>
                        </div>
                        
                        <div class="col-md-12 col-xs-12 col-sm-12 form-group table-responsive ms-0">
                            <table class="table table-bordered adddatatable" id="tab_part_sell_detail" align="center">
                                <thead>
                                    <tr>
                                        <th class="actionre">{{ trans('message.Manufacturer Name') }}</th>
                                        <th class="actionre">{{ trans('message.Product Name') }}</th>
                                        <th class="actionre">{{ trans('message.Quantity') }}</th>
                                        <th class="actionre" style="width:10%;">{{ trans('message.Price') }}
                                            (<?php echo getCurrencySymbols(); ?>)</th>
                                        <th class="actionre" style="width:13%;">{{ trans('message.Amount') }}
                                            (<?php echo getCurrencySymbols(); ?>)</th>
                                        <th class="actionre">{{ trans('message.Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr id="part_row_id_1">
                                        <td class="tbl_td_selectManufac_error_part_1">
                                            <select class="form-control select_part_producttype select_part_producttype_1 form-select" name="part_product[Manufacturer_id][]" m_url="{{ url('/sales_part/productitem') }}" row_did="1" data-id="1" id="">
                                                <option value="">
                                                    -{{ trans('message.Select Manufacturing Name') }}-</option>
                                                @if (!empty($manufacture_name))
                                                @foreach ($manufacture_name as $manufacture_nm)
                                                <option value="{{ $manufacture_nm->id }}">
                                                    {{ $manufacture_nm->type }}
                                                </option>
                                                @endforeach
                                                @endif
                                            </select>
                                            <span id="select_part_producttype_error_1" class="help-block error-help-block color-danger" style="display: none">{{ trans('message.Manufacturer name is required.') }}</span>
                                        </td>
                                        <td class="tbl_td_selectProductname_error_part_1">
                                            <select name="part_product[product_id][]" class="form-control part_productid select_part_productname_1 form-select" id="part_productid" url="{{ url('/sales_part/getprice') }}" row_did="1" data-id="1">
                                                <option value="">{{ trans('message.--Select Product--') }}
                                                </option>
                                                @if (!empty($brand))
                                                @foreach ($brand as $brands)
                                                <option value="{{ $brands->id }}">{{ $brands->name }}
                                                </option>
                                                @endforeach
                                                @endif
                                            </select>
                                            <span id="select_part_productname_error_1" class="help-block error-help-block color-danger" style="display: none">{{ trans('message.Product name is required.') }}</span>
                                        </td>
                                        <td class="tbl_td_quantity_error_part_1">
                                            <input type="number" name="part_product[qty][]" url="{!! url('purchase/add/getqty') !!}" prd_url="{{ url('/sale_part/get_available_product') }}" class="part_quantity form-control part_qty part_qty_1 qtyt" id="part_qty_1" autocomplete="off" row_id="1" value="" maxlength="8">
                                            <span id="part_quantity_error_1" class="help-block error-help-block color-danger" style="display: none">{{ trans('message.Quantity is required.') }}</span>
                                        </td>
                                        <td class="tbl_td_price_error_part_1">
                                            <input type="text" name="part_product[price][]" class="part_product form-control part_prices part_price_1" value="" id="part_price_1" row_id="1" style="width:100%;" readonly="true">
                                            <span id="part_price_error_1" class="help-block error-help-block color-danger" style="display: none">{{ trans('message.Price is required.') }}</span>
                                        </td>
                                        <td class="tbl_td_totaPrice_error_part_1">
                                            <input type="text" name="part_product[total_price][]" class="part_product form-control part_total_price part_total_price_1" value="" style="width:100%;" id="part_total_price_1" readonly="true">
                                            <span id="part_total_price_error_1" class="help-block error-help-block color-danger" style="display: none">{{ trans('message.Total price is required.') }}</span>
                                        </td>
                                        <td align="center">
                                            <input type="hidden" value="1" name="part_row_number" class="part_row_number">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- Parts Sell Section End -->
                        
                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 col-xs-12 space1">
                            <p class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 col-xs-12 ln_solid"></p>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-lg-3 col-xl-3 col-xxl-3 col-sm-3 col-xs-3 ms-1">
                                <h3>{{ trans('message.Observation List') }}</h3>
                            </div>
                            <!-- <div class="col-md-2 col-lg-2 col-xl-2 col-xxl-2 col-sm-2 col-xs-2 ps-0">
                                <button type="button" data-bs-target="#responsive-modal-observation" data-bs-toggle="modal" class="btn btn-outline-secondary clickAddNewButton ms-0 mt-2"> + </button>
                            </div> -->
                        </div>
                        <div class=" col-md-12 col-xs-12 col-sm-12 panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">   
                                    <h6 class="panel-title tbl_points">
                                        <a class="observation_Plus1" data-bs-toggle="collapse" href="#collapse1" role="button" aria-expanded="true" aria-controls="collapseExample">
                                            <i class="fa fa-plus"></i>
                                            {{ trans('message.Observation Points') }}</a>
                                        </a>
                                    </h6>
                                </div>
                                <div id="collapse1" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                    <div class="row row-mb-0">
                                        <label for="searchable-select" class="control-label col-md-2 col-lg-2 col-xl-2 col-xxl-2 col-sm-2 col-xs-2 px-3 mt-2">{{ trans('message.Select Checkpoints') }}:
                                        </label>
                                        <div class="col-md-10 col-lg-10 col-xl-10 col-xxl-10 col-sm-10 col-xs-10">
                                            @if (!empty($tbl_checkout_categories))
                                            <select id="searchable-select" class="form-control custom-dropdown" multiple="multiple"  data-placeholder="{{ trans('message.Select Checkpoints') }}">
                                                @foreach ($tbl_checkout_categories as $checkoout)
                                                    <?php
                                                    $subcategory = getCheckPointSubCategory($checkoout->checkout_point, $checkoout->vehicle_id);
                                                    ?>
                                                    @if (!empty($subcategory))
                                                        <optgroup label="{{ $checkoout->checkout_point }}">
                                                            @foreach ($subcategory as $subcategorys)
                                                                <option value="{{ $subcategorys->id }}" data-category="{{ $checkoout->checkout_point }}" data-point="{{ $subcategorys->checkout_point }}">
                                                                    {{ $subcategorys->checkout_point }}
                                                                </option>
                                                            @endforeach
                                                        </optgroup>
                                                    @endif
                                                @endforeach
                                                </select>
                                            @else
                                                <p>{{ trans('message.No data available') }}</p>
                                            @endif 
                                        </div>
                                    </div>
                               
                    
                                    <table class="table" id="selected-checkpoints">
                                        <thead>
                                            <tr>
                                            <th class="all">{{ trans('message.Category') }}</th>
                                                <th class="all">{{ trans('message.Observation Point') }}</th>
                                                <th class="all">{{ trans('message.Comments') }}</th>
                                                <th class="all">{{ trans('message.Actions') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $serviceId = $service_data->id;
                                                $selectedPoints = getSelectedObservationPoints($serviceId);
                                               
                                            @endphp
                                            @if (!empty($selectedPoints) && count($selectedPoints) > 0)
                                                @foreach ($selectedPoints as $point)
                                                    <tr id="row-{{ $point['obs_id'] }}" data-obs-id="{{ $point['obs_id'] }}">
                                                        <td><input type="text" name="product[]" class="form-control" readonly value="{{ $point['category'] }}"></td>
                                                        <td><input type="text" name="sub_product[]" class="form-control" readonly value="{{ $point['obs_point'] }}"></td>
                                                        <td><textarea name="comment[]" class="form-control" maxlength="250">{{ $point['comment'] }}</textarea></td>
                                                        <td>
                                                            <button type="button" class="btn delete-row border-0" data-id="{{ $point['obs_id'] }}">
                                                                <i class="fa fa-trash fa-2x"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>

                                        <!-- Hidden input to track deleted rows -->
                                        <input type="hidden" id="deleted_obs_ids" name="deleted_obs_ids" value="">
                                    </table>
                               
                                         <!-- <table class="table main_data"> 
                                               Observation Checcked Points   
                                        </table>  -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ************* MOT Module Starting ************* -->
                        @if ($service_data->mot_status == 1)
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="col-md-9 col-sm-8 col-xs-8">
                                <h4>{{ trans('message.MOT Test') }}</h4>
                            </div>
                        </div>

                        <div class="col-md-12 col-xs-12 col-sm-12 panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h6 class="panel-title">
                                        <a class="observation_Plus2" data-bs-toggle="collapse" href="#collapse2" role="button" aria-expanded="true" aria-controls="collapseExample">
                                            <i class="fa fa-plus"></i>
                                            {{ trans('message.MOT Test View') }}</a>
                                        </a>
                                    </h6>
                                </div>
                                <div id="collapse2" class="panel-collapse collapse show">
                                    <div class="panel-body">

                                        <!-- Step:1 Starting -->
                                        <div class=" col-md-12 col-xs-12 col-sm-12 panel-group pGroup">
                                            <div class="panel panel-default">
                                                <div class="panel-heading pHeading">
                                                    <h6 class="panel-title">
                                                        <a class="observation_Plus" data-bs-toggle="collapse" href="#collapse3" role="button" aria-expanded="true" aria-controls="collapseExample">
                                                            <i class="fa fa-plus"></i>
                                                            {{ trans('message.Step 1: Fill MOT Details') }}</a>
                                                        </a>
                                                    </h6>
                                                </div>
                                                <div id="collapse3" class="panel-collapse collapse show">
                                                    <div class="panel-body">
                                                        <div class=" col-md-12 col-xs-12 col-sm-12 panel-group pGroupInsideStep1">

                                                            <div class="row text-center">
                                                                <div class="col-md-3">
                                                                    <h6 class="boldFont text-start">
                                                                        {{ trans('message.OK = Satisfactory') }}
                                                                    </h6>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <h6 class="boldFont text-start">
                                                                        {{ trans('message.X = Safety Item Defact') }}
                                                                    </h6>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <h6 class="boldFont text-start">
                                                                        {{ trans('message.R = Repair Required') }}
                                                                    </h6>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <h6 class="boldFont text-start">
                                                                        {{ trans('message.NA = Not Applicable') }}
                                                                    </h6>
                                                                </div>
                                                            </div>

                                                            <!-- Inside Cab  Starting -->
                                                            <div class="panel panel-default">
                                                                <div class="panel-heading pHeadingInsideStep1">
                                                                    <h6 class="panel-title">
                                                                        <a class="" data-bs-toggle="collapse" href="#collapse5" role="button" aria-expanded="true" aria-controls="collapseExample">
                                                                            <i class="fa fa-plus"></i>
                                                                            {{ trans('message.Inside Cab') }}</a>
                                                                        {{-- </a> --}}
                                                                    </h6>
                                                                </div>
                                                                <div id="collapse5" class="panel-collapse collapse show">
                                                                    <div class="panel-body">


                                                                        @php
                                                                        $a = $b = '';
                                                                        $count = count($inspection_points_library_data);
                                                                        $count = $count / 2;
                                                                        @endphp

                                                                        @foreach ($inspection_points_library_data as $key => $inspection_library)
                                                                        @if ($inspection_library->inspection_type == 1)
                                                                        @if (!empty($mot_inspections_answers))
                                                                        @if ($key % 2 != 1)
                                                                        <?php
                                                                        $a .=
                                                                            "<tr>
                                                                                                                                                                                                                                      																	<td>$inspection_library->code</td>
                                                                                                                                                                                                                                      																	<td>$inspection_library->point</td>
                                                                                                                                                                                                                                      																	<td>
                                                                                                                                                                                                                                      																	<select name=inspection[$inspection_library->id] data-id='$inspection_library->id' class='common'  id='$inspection_library->code'>
                                                                                                                                                                                                                                      															    		<option value='ok'" .
                                                                            ($mot_inspections_answers[$inspection_library->code] == 'ok' ? 'selected																		' : '') .
                                                                            ">OK</option>
                                                                                                                                                                                                                                      															    		<option value='x'" .
                                                                            ($mot_inspections_answers[$inspection_library->code] == 'x' ? 'selected' : '') .
                                                                            ">X</option>
                                                                                                                                                                                                                                      															    		<option value='r'" .
                                                                            ($mot_inspections_answers[$inspection_library->code] == 'r' ? 'selected' : '') .
                                                                            ">R</option>
                                                                                                                                                                                                                                      															    		<option value='na'" .
                                                                            ($mot_inspections_answers[$inspection_library->code] == 'na' ? 'selected' : '') .
                                                                            ">NA</option>
                                                                                                                                                                                                                                      															  		</select>
                                                                                                                                                                                                                                      															  		</td></tr>";
                                                                        ?>
                                                                        @else
                                                                        <?php
                                                                        $b .=
                                                                            "<tr>
                                                                                                                                                                                                                                      																	<td>$inspection_library->code</td>
                                                                                                                                                                                                                                      																	<td>$inspection_library->point</td>
                                                                                                                                                                                                                                      																	<td>
                                                                                                                                                                                                                                      																	<select name=inspection[$inspection_library->id] data-id='$inspection_library->id' class='common' id='$inspection_library->code'>
                                                                                                                                                                                                                                      															    	<option value='ok'" .
                                                                            ($mot_inspections_answers[$inspection_library->code] == 'ok' ? 'selected' : '') .
                                                                            ">OK</option>
                                                                                                                                                                                                                                      															    		<option value='x'" .
                                                                            ($mot_inspections_answers[$inspection_library->code] == 'x' ? 'selected' : '') .
                                                                            ">X</option>
                                                                                                                                                                                                                                      															    		<option value='r'" .
                                                                            ($mot_inspections_answers[$inspection_library->code] == 'r' ? 'selected' : '') .
                                                                            ">R</option>
                                                                                                                                                                                                                                      															    		<option value='na'" .
                                                                            ($mot_inspections_answers[$inspection_library->code] == 'na' ? 'selected' : '') .
                                                                            ">NA</option>
                                                                                                                                                                                                                                      															  		</select>
                                                                                                                                                                                                                                      															  		</td>
                                                                                                                                                                                                                                      															  		</tr>";
                                                                        ?>
                                                                        @endif
                                                                        @else
                                                                        @if ($key % 2 != 1)
                                                                        <?php
                                                                        $a .= "<tr>
                                                                                                                                                                                                                                      																		<td>$inspection_library->code</td>
                                                                                                                                                                                                                                      																		<td>$inspection_library->point</td>
                                                                                                                                                                                                                                      																		<td>
                                                                                                                                                                                                                                      																		<select name=inspection[$inspection_library->id] data-id='$inspection_library->id' class='common'  id='$inspection_library->code'>
                                                                                                                                                                                                                                      																    		<option value='ok'>OK</option>
                                                                                                                                                                                                                                      																    		<option value='x'>X</option>
                                                                                                                                                                                                                                      																    		<option value='r'>R</option>
                                                                                                                                                                                                                                      																    		<option value='na'>NA</option>
                                                                                                                                                                                                                                      																  		</select>
                                                                                                                                                                                                                                      																  		</td></tr>";
                                                                        ?>
                                                                        @else
                                                                        <?php
                                                                        $b .= "<tr>
                                                                                                                                                                                                                                      																		<td>$inspection_library->code</td>
                                                                                                                                                                                                                                      																		<td>$inspection_library->point</td>
                                                                                                                                                                                                                                      																		<td>
                                                                                                                                                                                                                                      																		<select name=inspection[$inspection_library->id] data-id='$inspection_library->id' class='common' id='$inspection_library->code'>
                                                                                                                                                                                                                                      																    	<option value='ok'>OK</option>
                                                                                                                                                                                                                                      																    	<option value='x'>X</option>
                                                                                                                                                                                                                                      																    	<option value='r'>R</option>
                                                                                                                                                                                                                                      																    	<option value='na'>NA</option>
                                                                                                                                                                                                                                      																  		</select>
                                                                                                                                                                                                                                      																  		</td>
                                                                                                                                                                                                                                      																  		</tr>";
                                                                        ?>
                                                                        @endif
                                                                        @endif
                                                                        @endif
                                                                        @endforeach
                                                                        <div class="row">
                                                                            <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-6 col-sm-6 col-xs-6">
                                                                                <table class="table">
                                                                                    <thead class="thead-dark">
                                                                                        <tr>
                                                                                            <th><b>{{ trans('message.Code') }}</b>
                                                                                            </th>
                                                                                            <th><b>{{ trans('message.Inspection Details') }}</b>
                                                                                            </th>
                                                                                            <th><b>{{ trans('message.Answer') }}</b>
                                                                                            </th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <?php echo $a; ?>
                                                                                </table>
                                                                            </div>
                                                                            <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-6 col-sm-6 col-xs-6">
                                                                                <table class="table">
                                                                                    <thead class="thead-dark smallDisplayTheadHiddenInsideCab">
                                                                                        <tr>
                                                                                            <th><b>{{ trans('message.Code') }}</b>
                                                                                            </th>
                                                                                            <th><b>{{ trans('message.Inspection Details') }}</b>
                                                                                            </th>
                                                                                            <th><b>{{ trans('message.Answer') }}</b>
                                                                                            </th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <?php echo $b; ?>
                                                                                </table>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- Inside Cab  Ending -->

                                                        </div>

                                                        <!-- Ground Level and Under Vehicle  Starting -->
                                                        <div class=" col-md-12 col-xs-12 col-sm-12 panel-group pGroupInsideStep1">
                                                            <div class="panel panel-default">
                                                                <div class="panel-heading pHeadingInsideStep1">
                                                                    <h6 class="panel-title">
                                                                        <a class="observation_Plus4" data-bs-toggle="collapse" href="#collapse6" role="button" aria-expanded="true" aria-controls="collapseExample">
                                                                            <i class="fa fa-plus"></i>
                                                                            {{ trans('message.Ground Level and Under Vehicle') }}</a>
                                                                    </h6>
                                                                </div>
                                                                <div id="collapse6" class="panel-collapse collapse">
                                                                    <div class="panel-body">
                                                                        @php
                                                                        $a = $b = '';
                                                                        $count = count($inspection_points_library_data);
                                                                        $count = $count / 2;
                                                                        @endphp

                                                                        @foreach ($inspection_points_library_data as $key => $inspection_library)
                                                                        @if ($inspection_library->inspection_type == 2)
                                                                        @if (!empty($mot_inspections_answers))
                                                                        @if ($key % 2 != 0)
                                                                        <?php
                                                                        $a .=
                                                                            "<tr>
                                                                                                                                                                                                                                      																	<td>$inspection_library->code</td>
                                                                                                                                                                                                                                      																	<td>$inspection_library->point</td>
                                                                                                                                                                                                                                      																	<td>
                                                                                                                                                                                                                                      																	<select name=inspection[$inspection_library->id] data-id='$inspection_library->id' class='common'  id='$inspection_library->code'>
                                                                                                                                                                                                                                      															    		<option value='ok'" .
                                                                            ($mot_inspections_answers[$inspection_library->code] == 'ok' ? 'selected' : '') .
                                                                            ">OK</option>
                                                                                                                                                                                                                                      															    		<option value='x'" .
                                                                            ($mot_inspections_answers[$inspection_library->code] == 'x' ? 'selected' : '') .
                                                                            ">X</option>
                                                                                                                                                                                                                                      															    		<option value='r'" .
                                                                            ($mot_inspections_answers[$inspection_library->code] == 'r' ? 'selected' : '') .
                                                                            ">R</option>
                                                                                                                                                                                                                                      															    		<option value='na'" .
                                                                            ($mot_inspections_answers[$inspection_library->code] == 'na' ? 'selected' : '') .
                                                                            ">NA</option>
                                                                                                                                                                                                                                      															  		</select>
                                                                                                                                                                                                                                      															  		</td></tr>";
                                                                        ?>
                                                                        @else
                                                                        <?php
                                                                        $b .=
                                                                            "<tr>
                                                                                                                                                                                                                                      																	<td>$inspection_library->code</td>
                                                                                                                                                                                                                                      																	<td>$inspection_library->point</td>
                                                                                                                                                                                                                                      																	<td>
                                                                                                                                                                                                                                      																	<select name=inspection[$inspection_library->id] data-id='$inspection_library->id' class='common'  id='$inspection_library->code'>
                                                                                                                                                                                                                                      															    	<option value='ok'" .
                                                                            ($mot_inspections_answers[$inspection_library->code] == 'ok' ? 'selected' : '') .
                                                                            ">OK</option>
                                                                                                                                                                                                                                      															    		<option value='x'" .
                                                                            ($mot_inspections_answers[$inspection_library->code] == 'x' ? 'selected' : '') .
                                                                            ">X</option>
                                                                                                                                                                                                                                      															    		<option value='r'" .
                                                                            ($mot_inspections_answers[$inspection_library->code] == 'r' ? 'selected' : '') .
                                                                            ">R</option>
                                                                                                                                                                                                                                      															    		<option value='na'" .
                                                                            ($mot_inspections_answers[$inspection_library->code] == 'na' ? 'selected' : '') .
                                                                            ">NA</option>
                                                                                                                                                                                                                                      															  		</select>
                                                                                                                                                                                                                                      															  		</td>
                                                                                                                                                                                                                                      															  		</tr>";
                                                                        ?>
                                                                        @endif
                                                                        @else
                                                                        @if ($key % 2 != 0)
                                                                        <?php
                                                                        $a .= "<tr>
                                                                                                                                                                                                                                      																		<td>$inspection_library->code</td>
                                                                                                                                                                                                                                      																		<td>$inspection_library->point</td>
                                                                                                                                                                                                                                      																		<td>
                                                                                                                                                                                                                                      																		<select name=inspection[$inspection_library->id] data-id='$inspection_library->id' class='common'  id='$inspection_library->code'>
                                                                                                                                                                                                                                      																    		<option value='ok'>OK</option>
                                                                                                                                                                                                                                      																    		<option value='x'>X</option>
                                                                                                                                                                                                                                      																    		<option value='r'>R</option>
                                                                                                                                                                                                                                      																    		<option value='na'>NA</option>
                                                                                                                                                                                                                                      																  		</select>
                                                                                                                                                                                                                                      																  		</td></tr>";
                                                                        ?>
                                                                        @else
                                                                        <?php
                                                                        $b .= "<tr>
                                                                                                                                                                                                                                      																		<td>$inspection_library->code</td>
                                                                                                                                                                                                                                      																		<td>$inspection_library->point</td>
                                                                                                                                                                                                                                      																		<td>
                                                                                                                                                                                                                                      																		<select name=inspection[$inspection_library->id] data-id='$inspection_library->id' class='common'  id='$inspection_library->code'>
                                                                                                                                                                                                                                      																    	<option value='ok'>OK</option>
                                                                                                                                                                                                                                      																    	<option value='x'>X</option>
                                                                                                                                                                                                                                      																    	<option value='r'>R</option>
                                                                                                                                                                                                                                      																    	<option value='na'>NA</option>
                                                                                                                                                                                                                                      																  		</select>
                                                                                                                                                                                                                                      																  		</td>
                                                                                                                                                                                                                                      																  		</tr>";
                                                                        ?>
                                                                        @endif
                                                                        @endif
                                                                        @endif
                                                                        @endforeach
                                                                        <div class="row">
                                                                            <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-6 col-sm-6 col-xs-6">
                                                                                <table class="table">
                                                                                    <thead class="thead-dark">
                                                                                        <tr>
                                                                                            <th><b>{{ trans('message.Code') }}</b>
                                                                                            </th>
                                                                                            <th><b>{{ trans('message.Inspection Details') }}</b>
                                                                                            </th>
                                                                                            <th><b>{{ trans('message.Answer') }}</b>
                                                                                            </th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <?php echo $a; ?>
                                                                                </table>
                                                                            </div>
                                                                            <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-6 col-sm-6 col-xs-6">
                                                                                <table class="table">
                                                                                    <thead class="thead-dark smallDisplayTheadHiddenGroundLevel">
                                                                                        <tr>
                                                                                            <th><b>{{ trans('message.Code') }}</b>
                                                                                            </th>
                                                                                            <th><b>{{ trans('message.Inspection Details') }}</b>
                                                                                            </th>
                                                                                            <th><b>{{ trans('message.Answer') }}</b>
                                                                                            </th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <?php echo $b; ?>
                                                                                </table>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Ground Level and Under Vehicle Ending -->

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Step 1: Ending -->

                                        <!-- Step 2: Show Filled MOT Details Starting -->
                                        <div class=" col-md-12 col-xs-12 col-sm-12 panel-group pGroup">
                                            <div class="panel panel-default">
                                                <div class="panel-heading pHeading">
                                                    <h6 class="panel-title">
                                                        <a class="observation_Plus5" data-bs-toggle="collapse" href="#collapse4" role="button" aria-expanded="true" aria-controls="collapseExample">
                                                            <i class="fa fa-plus"></i>
                                                            {{ trans('message.Step 2: Show Filled MOT Details') }}</a>
                                                    </h6>
                                                </div>
                                                <div id="collapse4" class="panel-collapse collapse">
                                                    <div class="panel-body">

                                                    <table class="table">
                                                            <thead class="thead-dark">
                                                                <tr>
                                                                    <th><b>{{ trans('message.Code') }}</b></th>
                                                                    <th><b>{{ trans('message.Inspection Details') }}</b>
                                                                    </th>
                                                                    <th><b>{{ trans('message.Answer') }}</b></th>
                                                                <tr>
                                                            </thead>
                                                            @if (!empty($mot_inspections_answers))
                                                            @foreach ($inspection_points_library_data as $key => $value)
                                                            <thead>
                                                                @if ($mot_inspections_answers[$value->code] == 'x' || $mot_inspections_answers[$value->code] == 'r')
                                                                <tr style="" id="tr_{{ $value->id }}">
                                                                    <td id="">
                                                                        {{ $value->id }}
                                                                    </td>
                                                                    <td id="">
                                                                        {{ $value->point }}
                                                                    </td>
                                                                    <td id="row_{{ $value->id }}" class="text-uppercase">
                                                                        {{ $mot_inspections_answers[$value->code] }}
                                                                    </td>
                                                                </tr>
                                                                @else
                                                                <tr style="display: none;" id="tr_{{ $value->id }}">
                                                                    <td id="">
                                                                        {{ $value->id }}
                                                                    </td>
                                                                    <td id="">
                                                                        {{ $value->point }}
                                                                    </td>
                                                                    <td id="row_{{ $value->id }}" class="text-uppercase"> </td>
                                                                </tr>
                                                                @endif
                                                            </thead>
                                                            @endforeach
                                                            @else
                                                            @foreach ($inspection_points_library_data as $key => $value)
                                                            <thead>
                                                                <tr style="display: none;" id="tr_{{ $value->id }}">
                                                                    <td id="">
                                                                        {{ $value->id }}
                                                                    </td>
                                                                    <td id="">
                                                                        {{ $value->point }}
                                                                    </td>
                                                                    <td id="row_{{ $value->id }}" class="text-uppercase"> </td>
                                                                </tr>
                                                            </thead>
                                                            @endforeach
                                                            @endif
                                                        </table>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Step 2: Show Filled MOT Details Ending -->

                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        <!-- ************* MOT Module Ending ************* -->


                        <div class="row">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <!-- <div class="row col-md-6 col-lg-6 col-xl-6 col-xxl-6 col-sm-6 col-xs-6 my-1 mx-0">
                                <a class="btn btn-primary" href="{{ URL::previous() }}">{{ trans('message.CANCEL') }}</a>
                            </div> -->
                            <div class="row col-md-6 col-lg-6 col-xl-6 col-xxl-6 col-sm-6 col-xs-6 my-1 mx-0">
                                <button type="submit" id="submitButton" class="btn btn-success jobcardFormSubmitButton">{{ trans('message.SUBMIT') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            </div>
    </div></div>
        </div>
    </div>   
<!-- model in observation Point -->
<script>
    var service_Id = {{$service_data->id}};
    var mainurl = "{{ url('service/list/edit/update') }}/" + service_Id;
    if(mainurl){
    document.getElementById('step1Btn').addEventListener('click', function () {
        var serviceId = {{ $service_data->id }};  // This should be passed dynamically from Laravel
        var url = "{{ url('service/list/edit') }}/" + serviceId;
        window.location.href = url;
    });
}
</script>

<!-- /page content -->
<!-- <script>
$(document).ready(function () {
    // Initialize Select2 for dropdown
    $('#searchable-select').select2({
        placeholder: "Select checkpoints",
        width: '100%',
        closeOnSelect: false,
    }).on('select2:close', function () {
        updateSelect2Placeholder(); // Update placeholder when Select2 dropdown is closed
    });

    // Add selected options to the table when an option is selected
    $('#searchable-select').on('change', function () {
        const selectedOptions = $(this).select2('data');
        const $tableBody = $('#selected-checkpoints tbody');

        // Keep track of existing IDs in the table
        const selectedIds = selectedOptions.map(option => option.id);

        // Add new rows for newly selected options
        selectedOptions.forEach((option) => {
            const category = option.element.dataset.category || '';
            const observationPoint = option.element.dataset.point || '';
            const categoryId = option.id;

            // Prevent duplicates: Check if the row with the selected categoryId already exists
            if ($(`#row-${categoryId}`).length > 0) return;

            // Append new row to the table
            const row = `
                <tr id="row-${categoryId}" data-obs-id="${categoryId}">
                    <td><input type="text" name="product[]" class="form-control" readonly value="${category}"></td>
                    <td><input type="text" name="sub_product[]" class="form-control" readonly value="${observationPoint}"></td>
                    <td><textarea name="comment[]" class="form-control" maxlength="250"></textarea></td>
                    <td>
                        <button type="button" class="btn delete-row border-0" data-id="${categoryId}">
                            <i class="fa fa-trash fa-2x"></i>
                        </button>
                    </td>
                    <input type="hidden" name="obs_id[]" value="${categoryId}">
                </tr>
            `;
            $tableBody.append(row);
        });

        updateSelect2Placeholder(); // Update placeholder count after change
    });

    // Handle delete row
    $(document).on('click', '.delete-row', function () {
        const rowId = $(this).data('id'); // Fetch the correct row ID from the delete button
        $(`#row-${rowId}`).remove(); // Remove the row from the table

        // Remove the corresponding item from Select2 dropdown
        const $select = $('#searchable-select');
        const optionToRemove = $select.find(`option[value="${rowId}"]`);
        if (optionToRemove.length) {
            optionToRemove.prop('selected', false);
            $select.trigger('change'); // Trigger change to update Select2
        }

        updateSelect2Placeholder(); // Update Select2 placeholder after deletion
    });

    // Function to update Select2 placeholder with selected count
    function updateSelect2Placeholder() {
        const $select = $('#searchable-select');
        const numSelected = $select.select2('data').length;
        const placeholderText = numSelected > 0 ? `${numSelected} selected` : 'Select checkpoints';

        // Update the custom placeholder
        $select.next('span.select2').find('.select2-selection__rendered').html(placeholderText);
    }

    // On page load, update Select2 placeholder to match the initial selected items
    updateSelect2Placeholder();
});

</script> -->
<script>
$(document).ready(function () {
    // Initialize Select2 for dropdown
    $('#searchable-select').select2({
        placeholder: $('#searchable-select').data('placeholder'),
        width: '100%',
        closeOnSelect: false,
    });

    // Function to fetch preselected points from the table and mark them as selected in the dropdown
    function initializePreselectedPoints() {
        const preselectedPoints = [];
        const selectedKeys = new Set(); // Track unique keys for selected points

        // Collect `category` and `obs_point` values from the table rows
        $('#selected-checkpoints tbody tr').each(function () {
            const category = $(this).find('input[name="product[]"]').val();
            const obsPoint = $(this).find('input[name="sub_product[]"]').val();

            // Only push unique values if not already processed
            const pointKey = `${category}_${obsPoint}`;
            if (category && obsPoint && !selectedKeys.has(pointKey)) {
                selectedKeys.add(pointKey);
                preselectedPoints.push({ category, obsPoint });
            }
        });

        // Deselect all options before applying preselection
        $('#searchable-select option').prop('selected', false);

        const $select = $('#searchable-select');
        const uniqueOptions = new Set(); // Track unique selected options to update Select2

        preselectedPoints.forEach((point) => {
            const option = $select.find(`option[data-category="${point.category}"][data-point="${point.obsPoint}"]`);

            if (option.length > 0) {
                const optionKey = `${point.category}_${point.obsPoint}`; // Unique key for selected options
                if (!uniqueOptions.has(optionKey)) {
                    uniqueOptions.add(optionKey);
                    option.prop('selected', true); // Select the matching option
                }
            }
        });

        // Trigger Select2 update to reflect preselected options
        $select.trigger('change');

        // Update the Select2 placeholder to reflect the selected points
        updateSelect2Placeholder(uniqueOptions.size); // Pass the unique count
    }

    function updateSelect2Placeholder(uniqueCount) {
        const $select = $('#searchable-select');

        // Update the placeholder text to show the number of selected points
        const placeholderText = uniqueCount > 0 ? `${uniqueCount} selected` :$('#searchable-select').data('placeholder');

        // Update the custom placeholder manually
        $select.next('span.select2').find('.select2-selection__rendered').text(placeholderText);
    }

    // Initialize preselected points on page load
    initializePreselectedPoints();

    // Handle dropdown selection changes to add new rows to the table
    $('#searchable-select').on('change', function () {
        const selectedOptions = $(this).select2('data');
        const $tableBody = $('#selected-checkpoints tbody');
        const selectedKeys = new Set(); // Track selected points to prevent duplicates
        const existingRows = new Set(); // Track existing rows to avoid duplicates

        // Check the existing rows in the table to avoid adding the same points
        $('#selected-checkpoints tbody tr').each(function () {
            const category = $(this).find('input[name="product[]"]').val();
            const observationPoint = $(this).find('input[name="sub_product[]"]').val();
            const pointKey = `${category}_${observationPoint}`;
            existingRows.add(pointKey);
        });

        selectedOptions.forEach((option) => {
            const category = option.element.dataset.category || '';
            const observationPoint = option.element.dataset.point || '';
            const categoryId = option.id;

            // Create a unique key for the selected point
            const pointKey = `${category}_${observationPoint}`;

            // Prevent duplicates: Check if the combination of category and obsPoint already exists in the table
            if (selectedKeys.has(pointKey) || existingRows.has(pointKey)) return;

            // Add to selectedKeys to track this point
            selectedKeys.add(pointKey);

            // Append new row to the table
            const row = `
                <tr id="row-${categoryId}" data-obs-id="${categoryId}">
                    <td><input type="text" name="product[]" class="form-control" readonly value="${category}"></td>
                    <td><input type="text" name="sub_product[]" class="form-control" readonly value="${observationPoint}"></td>
                    <td><textarea name="comment[]" class="form-control" maxlength="250"></textarea></td>
                    <td>
                        <button type="button" class="btn delete-row border-0" data-id="${categoryId}">
                            <i class="fa fa-trash fa-2x"></i>
                        </button>
                    </td>
                    <input type="hidden" name="obs_id[]" value="${categoryId}">
                </tr>
            `;
            $tableBody.append(row);
        });

        // Update the Select2 placeholder after adding new rows to the table
        updateSelect2Placeholder($('#selected-checkpoints tbody tr').length); // Update placeholder count after change
    });

    // Handle row deletion and update Select2 accordingly
    $(document).on('click', '.delete-row', function () {
        const rowId = $(this).data('id'); // Get row ID
        $(`#row-${rowId}`).remove(); // Remove the row from the table

        // Unselect the corresponding option in the dropdown
        const $select = $('#searchable-select');
        const optionToDeselect = $select.find(`option[value="${rowId}"]`);
        if (optionToDeselect.length) {
            optionToDeselect.prop('selected', false);
            $select.trigger('change'); // Refresh Select2
        }

        updateSelect2Placeholder($('#selected-checkpoints tbody tr').length); // Update placeholder after deletion
    });
});

</script>


<script>
    document.addEventListener('DOMContentLoaded', function () {
    const deletedObsIdsInput = document.getElementById('deleted_obs_ids');

    document.querySelectorAll('.delete-row').forEach(button => {
        button.addEventListener('click', function () {
            const rowId = this.getAttribute('data-id');
            const rowElement = document.getElementById(`row-${rowId}`);
            
            // Add the ID to the deleted list
            const deletedIds = deletedObsIdsInput.value ? deletedObsIdsInput.value.split(',') : [];
            deletedIds.push(rowId);
            deletedObsIdsInput.value = deletedIds.join(',');

            // Remove the row visually
            rowElement.remove();
        });
    });
});
</script>

<!-- Scripts starting -->
<!-- Display observation points in list -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {

        $('.tbl_points, .check_submit').click(function() {

            var url = "<?php echo url('service/get_obs'); ?>"
            var service_id = $('.service_id').val();

            $.ajax({
                type: 'GET',
                url: url,
                data: {
                    service_id: service_id
                },
                success: function(response) {
                    $('.main_data').html(response.html);
                    $('.modal').modal('hide');
                },
                error: function(e) {
                    console.log(e);
                }
            });
        });


        /*Checkpoints in modal*/
        var msg10 = "{{ trans('message.An error occurred :') }}";

        $('input.check_pt[type="checkbox"]').click(function() {

            if ($(this).prop("checked") == true) {
                var value = 1;
                var url = $(this).attr('url');
                var id = $(this).attr('check_id');
                var s_id = $(this).attr('s_id');

                $('.check_submit').prop("disabled", false);
                $.ajax({
                    type: 'GET',
                    url: url,
                    data: {
                        value: value,
                        id: id,
                        service_id: s_id
                    },
                    success: function(response) {

                    },
                    error: function(e) {
                        alert(msg10 + " " + e.responseText);
                        console.log(e);
                    }
                });
            } else if ($(this).prop("checked") == false) {

                var value = 0;
                var url = $(this).attr('url');
                var id = $(this).attr('check_id');
                var s_id = $(this).attr('s_id');

                $('.check_submit').prop("disabled", false);

                $.ajax({
                    type: 'GET',
                    url: url,
                    data: {
                        value: value,
                        id: id,
                        service_id: s_id
                    },
                    success: function(response) {

                    },
                    error: function(e) {
                        alert(msg10 + " " + e.responseText);
                        console.log(e);
                    }
                });
            }
        });


        /*delete in script*/
        $('.deletedatas').click(function() {

            var url = $(this).attr('url');

            var msg1 = "{{ trans('message.Are You Sure?') }}";
            var msg2 = "{{ trans('message.You will not be able to recover this data afterwards!') }}";
            var msg3 = "{{ trans('message.Cancel') }}";
            var msg4 = "{{ trans('message.Yes, delete!') }}";

            swal({
                title: msg1,
                text: msg2,
                type: "warning",
                showCancelButton: true,
                cancelButtonText: msg3,
                cancelButtonColor: "#C1C1C1",
                confirmButtonColor: "#297FCA",
                confirmButtonText: msg4,
                closeOnConfirm: false
            }, function() {
                window.location.href = url;

            });
        });

        var i = 0;
        $('.observation_Plus').click(function() {
            i = i + 1;
            if (i % 2 != 0) {
                $(this).parent().find(".fa-plus:first").removeClass("fa-plus").addClass(
                    "fa-minus");

            } else {
                $(this).parent().find(".fa-minus:first").removeClass("fa-minus").addClass(
                    "fa-plus");
            }
        });
        var c = 0;
        $('.observation_Plus1').click(function() {
            c = c + 1;
            if (c % 2 != 0) {
                $(this).parent().find(".fa-plus:first").removeClass("fa-plus").addClass(
                    "fa-minus");
            } else {
                $(this).parent().find(".fa-minus:first").removeClass("fa-minus").addClass(
                    "fa-plus");
            }
        });
        var l = 0;
        $('.observation_Plus3').click(function() {
            l = l + 1;
            if (l % 2 != 0) {
                $(this).parent().find(".fa-plus:first").removeClass("fa-plus").addClass(
                    "fa-minus");

            } else {
                $(this).parent().find(".fa-minus:first").removeClass("fa-minus").addClass(
                    "fa-plus");
            }
        });
        var a = 0;
        $('.observation_Plus4').click(function() {
            a = a + 1;
            if (a % 2 != 0) {
                $(this).parent().find(".fa-plus:first").removeClass("fa-plus").addClass(
                    "fa-minus");

            } else {
                $(this).parent().find(".fa-minus:first").removeClass("fa-minus").addClass(
                    "fa-plus");
            }
        });
        var b = 0;
        $('.observation_Plus5').click(function() {
            b = b + 1;
            if (b % 2 != 0) {
                $(this).parent().find(".fa-plus:first").removeClass("fa-plus").addClass(
                    "fa-minus");
            } else {
                $(this).parent().find(".fa-minus:first").removeClass("fa-minus").addClass(
                    "fa-plus");
            }
        });
        var j = 0;
        $('.observation_Plus2').click(function() {
            j = j + 1;
            if (j % 2 != 0) {
                $(this).parent().find(".fa-plus:first").removeClass("fa-plus").addClass(
                    "fa-minus");

            } else {
                $(this).parent().find(".fa-minus:first").removeClass("fa-minus").addClass(
                    "fa-plus");
            }
        });

        $('.datepicker').datetimepicker({
            format: "<?php echo getDatetimepicker(); ?>",
            todayBtn: true,
            autoclose: 1,
            language: "{{ getLangCode() }}",
        });
        $(function() {

            function toggleIcon(e) {
                $(e.target)
                    .prev('.pHeading')
                    .find(".plus-minus")
                    .toggleClass('glyphicon-plus glyphicon-minus');
            }
            $('.pGroup').on('hidden.bs.collapse', toggleIcon);
            $('.pGroup').on('shown.bs.collapse', toggleIcon);
        });

        $(function() {

            function toggleIcon(e) {
                $(e.target)
                    .prev('.pHeadingInsideStep1')
                    .find(".plus-minus")
                    .toggleClass('glyphicon-plus glyphicon-minus');
            }
            $('.pGroupInsideStep1').on('hidden.bs.collapse', toggleIcon);
            $('.pGroupInsideStep1').on('shown.bs.collapse', toggleIcon);
        });


        $('.common').change(function(e) {

            var selectBoxValue = $(this, ':selected').val();
            var id = $(this).attr('data-id');

            if (selectBoxValue == "r" || selectBoxValue == "x") {
                $('#tr_' + id).css("display", "");
                $('#row_' + id).html(selectBoxValue);
            } else {
                $('#tr_' + id).css("display", "none");
            }
        });


        /*If date field have value then error msg and has error class remove*/
        $('#date_of_birth').on('change', function() {

            var pDateValue = $(this).val();

            if (pDateValue != null) {
                $('#date_of_birth-error').css({
                    "display": "none",
                });
            }

            if (pDateValue != null) {
                $(this).parent().parent().removeClass('has-error');
            }
        });

        $('.clickAddNewButton').on('click', function() {

            $('.check_submit').prop("disabled", true);
            $('.closeButton').prop('disabled', false);
        });


        $('body').on('keyup', '.kmsValid', function() {

            var kmsVal = $(this).val();
            var rex = /^[0-9]*\d?(\.\d{1,2})?$/;

            if (!kmsVal.replace(/\s/g, '').length) {
                $(this).val("");
            }
            if (kmsVal == 0) {
                $(this).val("");
            } else if (!rex.test(kmsVal)) {
                $(this).val("");
            }
        });
        $('body').on('click', '#submitButton', function(e) {
            var service_id = $('#coupan_no').val();
            if (service_id == "") {
                $('#service-coupon-error').css("display", "");
                $('#submitButton').addClass('disabled');
                $('#submitButton').prop('disabled', true);
            } else {
                $('#service-coupon-error').css("display", "none");
                $('#submitButton').removeClass('disabled');
            }
        });
        $('#coupan_no').change(function(e) {
            var pDateValue = $(this).val();

            if (pDateValue == "") {
                $('#service-coupon-error').css("display", "");
                $('#submitButton').addClass('disabled');
            } else {
                $('#service-coupon-error').css("display", "none");
                $('#submitButton').removeClass('disabled');
            }
            $('#submitButton').prop('disabled', !pDateValue);
        });

        // Parts Sell Form JavaScript Functions
        // Add new parts sell product row
        $("#add_new_part_product").click(function() {
            var url = $(this).attr('url');
            var row_len = jQuery(".part_row_number").length;
            if (row_len > 0) {
                var num = jQuery(".part_row_number:last").val();
                var row_id = parseInt(num) + 1;
            } else {
                var row_id = 1;
            }

            var msg16 = "{{ trans('app.An error occurred :') }}";
            $.ajax({
                type: 'GET',
                url: url,
                data: {
                    row_id: row_id
                },
                beforeSend: function() {
                    $("#add_new_part_product").prop('disabled', true);
                },
                success: function(response) {
                    // Modify response HTML to use part-specific IDs and classes and update URLs
                    var modifiedHtml = response.html
                        .replace(/row_id_/g, 'part_row_id_')
                        .replace(/select_producttype_/g, 'select_part_producttype_')
                        .replace(/select_productname_/g, 'select_part_productname_')
                        .replace(/qty_/g, 'part_qty_')
                        .replace(/price_/g, 'part_price_')
                        .replace(/total_price_/g, 'part_total_price_')
                        .replace(/productid/g, 'part_productid')
                        .replace(/quantity/g, 'part_quantity')
                        .replace(/product\[/g, 'part_product[')
                        .replace(/row_number/g, 'part_row_number')
                        .replace(/class="product /g, 'class="part_product ')
                        .replace(/class="product_delete/g, 'class="part_product_delete')
                        .replace(/class="product form-control prices/g, 'class="part_product form-control part_prices')
                        .replace(/tbl_td_selectManufac_error_/g, 'tbl_td_selectManufac_error_part_')
                        .replace(/tbl_td_selectProductname_error_/g, 'tbl_td_selectProductname_error_part_')
                        .replace(/tbl_td_quantity_error_/g, 'tbl_td_quantity_error_part_')
                        .replace(/tbl_td_price_error_/g, 'tbl_td_price_error_part_')
                        .replace(/tbl_td_totaPrice_error_/g, 'tbl_td_totaPrice_error_part_')
                        .replace(/\/purchase\/producttype\/names/g, '/sales_part/productitem')
                        .replace(/purchase\/add\/getproduct/g, 'sales_part/getprice');

                    $("#tab_part_sell_detail > tbody").append(modifiedHtml);
                    $("#add_new_part_product").prop('disabled', false);
                    
                    return false;
                },
                error: function(e) {
                    alert(msg16 + " " + e.responseText);
                    console.log(e);
                    $("#add_new_part_product").prop('disabled', false);
                }
            });
        });

        // Part product delete functionality
        $('body').on('click', '.part_product_delete', function() {
            var row_id = $(this).attr('data-id');
            
            $('table#tab_part_sell_detail tr#part_row_id_' + row_id).fadeOut(function() {
                $(this).remove();
            });
            
            return false;
        });

        // Part product selection change handler
        $('body').on('change', '.part_productid', function() {
            var row_id = $(this).attr('row_did');
            var p_id = $(this).val();
            var url = $(this).attr('url');
            var msg17 = "{{ trans('message.An error occurred :') }}";
            
            if (p_id == '') {
                $('.part_price_' + row_id).val('');
                $('.part_total_price_' + row_id).val('');
                $('.part_qty_' + row_id).val('');
                return;
            }
            
            $.ajax({
                type: 'GET',
                url: url,
                data: {
                    vehicale_id: p_id  // Changed from p_id to vehicale_id to match SalesPartcontroller
                },
                success: function(response) {
                    var json_obj = response;
                    var price = json_obj['price'];
                    
                    $('.part_price_' + row_id).val(price);
                    $('.part_qty_' + row_id).val(1);
                    $('.part_total_price_' + row_id).val(price);
                    
                    $('#select_part_productname_error_' + row_id).css({"display": "none"});
                    $('.tbl_td_selectProductname_error_part_' + row_id).removeClass('has-error');
                },
                error: function(e) {
                    alert(msg17 + " " + e.responseText);
                    console.log(e);
                }
            });
        });

        // Part quantity input handler with stock validation
        $('body').on('input', '.part_qty', function(event) {
            var row_id = $(this).attr('row_id');
            var productid = $('.select_part_productname_' + row_id).find(":selected").val();
            var qty = $(this).val();
            var price = $('.part_price_' + row_id).val();
            var url = $(this).attr('prd_url');
            var msg21 = "{{ trans('message.Product Not Available') }}";
            var msg22 = "{{ trans('message.Current Stock :') }}";
            var msg20 = "{{ trans('message.First select product name') }}";

            if (productid == '' || productid == null) {
                alert(msg20);
                $('.part_qty_' + row_id).val('');
                return;
            }

            if (/\D/g.test(qty) || qty <= 0) {
                $('.part_qty_' + row_id).val('');
                $('#part_quantity_error_' + row_id).css({"display": ""});
                $('.tbl_td_quantity_error_part_' + row_id).addClass('has-error');
                $('.part_total_price_' + row_id).val('');
                return;
            }

            $('#part_quantity_error_' + row_id).css({"display": "none"});
            $('.tbl_td_quantity_error_part_' + row_id).removeClass('has-error');

            var total_price = parseFloat(price) * parseFloat(qty);
            $('.part_total_price_' + row_id).val(total_price.toFixed(2));

            clearTimeout($(this).data('timeout'));
            $(this).data('timeout', setTimeout(function() {
                $.ajax({
                    type: 'GET',
                    url: url,
                    data: {
                        qty: qty,
                        productid: productid
                    },
                    success: function(response) {
                        if (response.success == '1') {
                            swal({
                                title: msg21 + '\n' + msg22 + ' ' + response.currentStock,
                                cancelButtonColor: '#C1C1C1',
                                buttons: {
                                    cancel: msg10,
                                },
                                dangerMode: true,
                            });

                            $('.part_qty_' + row_id).val('');
                            $('.part_total_price_' + row_id).val('');
                        }
                    },
                    error: function(e) {
                        console.log('Stock check error:', e);
                    }
                });
            }, 500));
        });

        // Part quantity change handler
        $('body').on('change', '.part_qty', function() {
            var row_id = $(this).attr('row_id');
            var qty = $(this).val();
            var price = $('.part_price_' + row_id).val();
            
            if (qty == '' || qty <= 0) {
                $('.part_total_price_' + row_id).val('');
                return;
            }
            
            var total_price = parseFloat(price) * parseFloat(qty);
            $('.part_total_price_' + row_id).val(total_price.toFixed(2));
        });

        // Part manufacturer selection handler
        $('body').on('change', '.select_part_producttype', function() {
            var row_id = $(this).attr('row_did');
            var m_id = $(this).val();
            var url = $(this).attr('m_url');
            
            $('.select_part_productname_' + row_id).html('<option value="">{{ trans("message.--Select Product--") }}</option>');
            $('.part_price_' + row_id).val('');
            $('.part_qty_' + row_id).val('');
            $('.part_total_price_' + row_id).val('');
            
            if (m_id == '') {
                return;
            }
            
            $.ajax({
                type: 'GET',
                url: url,
                data: {
                    m_id: m_id
                },
                success: function(response) {
                    $('.select_part_productname_' + row_id).html(response);
                    
                    $('#select_part_producttype_error_' + row_id).css({"display": "none"});
                    $('.tbl_td_selectManufac_error_part_' + row_id).removeClass('has-error');
                },
                error: function(e) {
                    console.log('Manufacturer change error:', e);
                }
            });
        });

        // Part manufacturer selection change handler
        $('body').on('change', '.select_part_producttype', function() {
            var row_id = $(this).attr('row_did');
            var m_id = $(this).val();
            var url = $(this).attr('m_url');
            
            if (m_id == '') {
                return;
            }
            
            $.ajax({
                type: 'GET',
                url: url,
                data: {
                    m_id: m_id
                },
                success: function(response) {
                    $('.select_part_productname_' + row_id).html(response);
                    
                    $('#select_part_producttype_error_' + row_id).css({"display": "none"});
                    $('.tbl_td_selectManufac_error_part_' + row_id).removeClass('has-error');
                },
                error: function(e) {
                    console.log('Manufacturer change error:', e);
                }
            });
        });

        // Part price change handler
        $('body').on('change', '.part_prices', function() {
            var row_id = $(this).attr('row_id');
            var qty = $('.part_qty_' + row_id).val();
            var price = $(this).val();
            
            var regex = /^\d*\.?\d{0,2}$/;

            if (!regex.test(price) || price == 0 || price == null) {
                $('.part_price_' + row_id).val("");
                $('#part_price_error_' + row_id).css({"display": ""});
                $('.tbl_td_price_error_part_' + row_id).addClass('has-error');
                $('.part_total_price_' + row_id).val('');
            } else {
                $('#part_price_error_' + row_id).css({"display": "none"});
                $('.tbl_td_price_error_part_' + row_id).removeClass('has-error');
                
                if (qty && qty > 0) {
                    var total_price = parseFloat(price) * parseFloat(qty);
                    $('.part_total_price_' + row_id).val(total_price.toFixed(2));
                }
            }
        });

        // Part quantity keyboard input validation
        $('body').on('keydown', '.part_qty', function(e) {
            var keyCode = e.keyCode || e.which;

            if (!(keyCode >= 48 && keyCode <= 57 || keyCode >= 96 && keyCode <= 105 || 
                  keyCode === 8 || keyCode === 46 || keyCode === 37 || keyCode === 39 || 
                  keyCode === 38 || keyCode === 40)) {
                e.preventDefault();
            }

            if (keyCode === 38 || keyCode === 40) {
                e.preventDefault();
                var currentValue = parseInt($(this).val()) || 0;
                var newValue = (keyCode === 38) ? currentValue + 1 : Math.max(0, currentValue - 1);
                $(this).val(newValue).trigger('input');
            }
        });
    });
</script>

<!-- Form field validation -->
{!! JsValidator::formRequest('App\Http\Requests\StoreServiceSecondStepAddFormRequest', '#service2Step') !!}
<script type="text/javascript" src="{{ asset('public/vendor/jsvalidation/js/jsvalidation.js') }}"></script>

@endsection
