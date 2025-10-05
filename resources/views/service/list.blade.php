@extends('layouts.app')

@section('content')
<style>
    @media screen and (max-width:540px) {
        div#service_info {
            margin-top: -177px;
        }

        span.titleup {
            /* margin-left: -10px; */
        }
    }
    div.dataTables_processing {
        position: fixed;
        top: 50%;
        left: 50%;
        width: 200px;
        color:#EA6B00;
        margin-left: -100px;
        margin-top: -26px;
        text-align: center;
        padding: 1em 0;
        border: none;
    }
    
    /* Single line filter styling */
    .align-items-center {
        align-items: center !important;
    }
    
    .form-group.mb-0 {
        margin-bottom: 0 !important;
    }
    
    /* Responsive adjustments */
    @media (min-width: 992px) {
        .align-items-center .form-group {
            min-height: 50px;
        }
    }
    
    @media (max-width: 991px) {
        .align-items-center .col-md-2,
        .align-items-center .col-sm-6 {
            margin-bottom: 10px;
        }
    }
</style>
<!-- page content -->
<div class="right_col" role="main">
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg" size="xl">
            <!-- Modal content-->
            <div class="modal-content modal_data p-2">
            </div>
        </div>
    </div>

    <!-- Modal for Coupon Data -->
    <div class="modal fade" id="coupaon_data" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content used_coupn_modal_data">

            </div>
        </div>
    </div>
    <!-- End Modal for Coupon Data -->
    <div class="">
        <div class="page-title">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                    <a id="menu_toggle"><i class="fa fa-bars sidemenu_toggle"></i></a>
                        <i class=""></i><span class="titleup">{{ trans('message.Services') }}
                            @can('service_add')
                            <a id="" href="{!! url('/service/add') !!}" class="addbotton">
                                <img src="{{ URL::asset('public/img/icons/plus Button.png') }}">
                            </a>
                            @endcan
                        </span>
                    </div>
                    @include('dashboard.profile')
                </nav>
            </div>
        </div>
        @include('success_message.message')
        
        <!-- Search Filters Section -->
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel table_up_div">
                    <div class="x_content" style="padding: 15px 20px;">
                        <div class="row align-items-center">
                            <div class="col-md-2 col-sm-6 col-xs-12">
                                <div class="form-group mb-0">
                                    <label for="days_filter" class="control-label" style="font-size: 11px; margin-bottom: 3px; display: block;">{{ trans('Filter by Days') }}</label>
                                    <select id="days_filter" class="form-control form-select" style="height: 32px; font-size: 13px;">
                                        <option value="">{{ trans('All Days') }}</option>
                                        <option value="today">{{ trans('Today') }}</option>
                                        <option value="yesterday">{{ trans('Yesterday') }}</option>
                                        <option value="last_7_days">{{ trans('Last 7 Days') }}</option>
                                        <option value="last_30_days">{{ trans('Last 30 Days') }}</option>
                                        <option value="this_month">{{ trans('This Month') }}</option>
                                        <option value="last_month">{{ trans('Last Month') }}</option>
                                        <option value="custom">{{ trans('Custom Range') }}</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-2 col-sm-6 col-xs-12" id="start_date_col" style="display: none;">
                                <div class="form-group mb-0">
                                    <label for="start_date" class="control-label" style="font-size: 11px; margin-bottom: 3px; display: block;">{{ trans('Start Date') }}</label>
                                    <input type="date" id="start_date" class="form-control" style="height: 32px; font-size: 13px;">
                                </div>
                            </div>
                            
                            <div class="col-md-2 col-sm-6 col-xs-12" id="end_date_col" style="display: none;">
                                <div class="form-group mb-0">
                                    <label for="end_date" class="control-label" style="font-size: 11px; margin-bottom: 3px; display: block;">{{ trans('End Date') }}</label>
                                    <input type="date" id="end_date" class="form-control" style="height: 32px; font-size: 13px;">
                                </div>
                            </div>
                            
                            <div class="col-md-2 col-sm-6 col-xs-12">
                                <div class="form-group mb-0">
                                    <label for="assignee_filter" class="control-label" style="font-size: 11px; margin-bottom: 3px; display: block;">{{ trans('Filter by Assignee') }}</label>
                                    <select id="assignee_filter" class="form-control form-select" style="height: 32px; font-size: 13px;">
                                        <option value="">{{ trans('All Assignees') }}</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-2 col-sm-12 col-xs-12">
                                <div class="d-flex form-group mb-0" style="margin-top: 18px;">
    <button type="button" id="apply_filters" class="btn btn-primary btn-sm" style="margin-right: 8px; height: 32px; font-size: 13px;">{{ trans('Apply') }}</button>
    <button type="button" id="clear_filters" class="btn btn-secondary btn-sm" style="height: 32px; font-size: 13px;">{{ trans('Clear') }}</button>
</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
        @if(!empty($services) && count($services) > 0)
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel table_up_div">
                    <table id="supplier" class="table jambo_table" style="width:100%">
                        <thead>
                            <tr>
                                @can('service_delete')
                                <th> </th>
                                @endcan
                                <th>{{ trans('message.Job No') }}</th>
                                <th>{{ trans('message.Receiver Name') }}</th>
                                <th>{{ trans('message.Date') }}</th>
                                <th>{{ trans('message.Service Category') }}</th>
                                <th>{{ trans('message.Upcoming Service Date') }}</th>
                                <th>{{ trans('message.Assign To') }}</th>
                                <!-- <th>{{ trans('message.Free Service Coupen') }}</th> -->
                                <th>{{ trans('message.Number Plate') }}</th>
                                <th>{{ trans('message.Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                    @can('service_delete')
                    <button id="select-all-btn" class="btn select_all"><input type="checkbox" name="selectAll"> {{ trans('message.Select All') }}</button>
                    <button id="delete-selected-btn" class="btn btn-danger text-white border-0" data-url="{!! url('/service/list/delete/') !!}"><i class="fa fa-trash" aria-hidden="true"></i></button>
                    @endcan
                </div>
            </div>
        @else
            <p class="d-flex justify-content-center mt-5 pt-5"><img src="{{ URL::asset('public/img/dashboard/No-Data.png') }}" width="300px"></p>
        @endif
        </div>
    </div>
</div>
<!-- /page content -->


<!-- Scripts starting -->
<script src="{{ URL::asset('vendors/jquery/dist/jquery.min.js') }}"></script>
<!-- language change in user selected -->
<script>
    $(document).ready(function() {

        var search = "{{ trans('message.Search...') }}";
        var info = "{{ trans('message.Showing page _PAGE_ - _PAGES_') }}";
        var zeroRecords = "{{ trans('message.No Data Found') }}";
        var infoEmpty = "{{ trans('message.No records available') }}";
        var filtermessage = "{{trans('message.filtered from _MAX_ total records')}}";
        // $('#supplier').DataTable({
        //     columnDefs: [{
        //         width: 2,
        //         targets: 0
        //     }],
        //     fixedColumns: true,
        //     paging: true,
        //     scrollCollapse: true,
        //     scrollX: true,
        //     // scrollY: 300,

        //     responsive: true,
        //     "language": {
        //         lengthMenu: "_MENU_ ",
        //         info: info,
        //         zeroRecords: zeroRecords,
        //         infoEmpty: infoEmpty,
        //         infoFiltered: '(filtered from _MAX_ total records)',
        //         searchPlaceholder: search,
        //         search: '',
        //         paginate: {
        //             previous: "<",
        //             next: ">",
        //         }
        //     },
        //     aoColumnDefs: [{
        //         bSortable: false,
        //         aTargets: [-1]
        //     }],
        //     order: [
        //         [1, 'desc']
        //     ]

        // });
        // Initialize DataTable
        var serviceTable = $('#supplier').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        url: '{{ url("/service/list") }}',
        type: 'GET',
        data: function(d) {
            d.days_filter = $('#days_filter').val();
            d.start_date = $('#start_date').val();
            d.end_date = $('#end_date').val();
            d.assignee_filter = $('#assignee_filter').val();
        }
    },
    columns: [
        @can('service_delete')
        {
            data: 'id',
            name: 'id',
            orderable: false,
            searchable: false,
            render: function(data) {
                return `<label class="container checkbox">
                            <input type="checkbox" name="chk" value="${data}">
                            <span class="checkmark"></span>
                        </label>`;
            }
        },
        @endcan
        {
            data: 'job_no',
            name: 'job_no'
        },
        {
            data: 'customer_name',
            name: 'customer_id'
        },
        {
            data: 'date',
            name: 'service_date'
        },
        {
            data: 'service_category',
            name: 'service_category'
        },
        {
            data: 'upcoming_service_date',
            name: 'upcoming_service_date'
        },
        {
            data: 'assign_to',
            name: 'assign_to'
        },
        {
            data: 'number_plate',
            name: 'vehicle_id'
        },
        {
            data: 'action',
            name: 'action',
            orderable: false,
            searchable: false
        }
    ],
    language: {
        lengthMenu: "_MENU_ ",
        info: info,
        zeroRecords: zeroRecords,
        infoEmpty: infoEmpty,
        infoFiltered: filtermessage,
        searchPlaceholder: search,
        search: '',
        paginate: {
            previous: "<",
            next: ">",
        },
        processing: '<div class="loading-indicator"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span></div>'
    },
    order: [[1, 'asc']],
    responsive: true,
    fixedColumns: true,
    paging: true,
    scrollCollapse: true,
    scrollX: true,
});

// Load Assignees on page load
loadAssignees();

// Handle Days Filter Change
$('#days_filter').on('change', function() {
    if ($(this).val() === 'custom') {
        $('#start_date_col').show();
        $('#end_date_col').show();
    } else {
        $('#start_date_col').hide();
        $('#end_date_col').hide();
        $('#start_date').val('');
        $('#end_date').val('');
    }
});

// Apply Filters
$('#apply_filters').on('click', function() {
    serviceTable.ajax.reload();
});

// Clear Filters
$('#clear_filters').on('click', function() {
    $('#days_filter').val('');
    $('#assignee_filter').val('');
    $('#start_date').val('');
    $('#end_date').val('');
    $('#start_date_col').hide();
    $('#end_date_col').hide();
    serviceTable.ajax.reload();
});

// Function to load assignees
function loadAssignees() {
    $.ajax({
        url: '{{ url("/service/get-assignees") }}',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            var assigneeSelect = $('#assignee_filter');
            assigneeSelect.empty();
            assigneeSelect.append('<option value="">{{ trans('All Assignees') }}</option>');
            
            $.each(data, function(key, value) {
                assigneeSelect.append('<option value="' + value.id + '">' + value.name + '</option>');
            });
        },
        error: function(xhr, status, error) {
            console.log('Error loading assignees:', error);
        }
    });
}

$(document).on('click', '#select-all-btn', function () {
        let $checkbox = $(this).find('input[type="checkbox"]');
        let isChecked = !$checkbox.prop('checked'); // toggle the value
        $checkbox.prop('checked', isChecked); // update checkbox
        $('input[name="chk"]').prop('checked', isChecked); // select/deselect all rows
    });
    
    $(document).on('change', 'input[name="chk"]', function () {
    console.log($('input[name="chk"]:checked').length);
    let total = $('input[name="chk"]').length;
    let checked = $('input[name="chk"]:checked').length;
    
    // if all checkboxes are checked manually, check the main checkbox
    $('input[name="selectAll"]').prop('checked', total === checked);
    });
    // When the user directly clicks the checkbox (optional, same logic to keep consistent)
    $(document).on('click', '#select-all-btn input[type="checkbox"]', function (e) {
        e.stopPropagation(); // prevent triggering the button click again
        $('input[name="chk"]').prop('checked', $(this).prop('checked'));
    });

        $('body').on('click', '.deletedatas', function() {

            var url = $(this).attr('url');
            var msg1 = "{{ trans('message.Are You Sure?') }}";
            var msg2 = "{{ trans('message.You will not be able to recover this data afterwards!') }}";
            var msg3 = "{{ trans('message.Cancel') }}";
            var msg4 = "{{ trans('message.Yes, delete!') }}";

            swal({
                title: msg1,
                text: msg2,
                icon: 'warning',
                cancelButtonColor: '#C1C1C1',
                buttons: [msg3, msg4],
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    window.location.href = url;
                }
            });

        });


        $('body').on('click', '.save', function() {
            var servicesid = $(this).attr("serviceid");
            var url = $(this).attr('url');
            var msg10 = "{{ trans('message.An error occurred :') }}";

            $.ajax({
                type: 'GET',
                url: url,
                data: {
                    servicesid: servicesid
                },
                dataType:'json',
                success: function(data) {
                    $('.modal_data').html(data.html);
                },
                error: function(e) {
                    alert(msg10 + " " + e.responseText);
                    console.log(e);
                }
            });

        });



        $('body').on('click', '.coupon_btn', function() {
            var coupon_no = $(this).attr('coupon_no');
            var ser_id = $(this).attr('servi_id');
            var url = $(this).attr('url');

            $.ajax({

                url: url,
                type: 'GET',
                data: {
                    coupon_no: coupon_no,
                    ser_id: ser_id
                },

                success: function(response) {

                    $('.used_coupn_modal_data').html(response.html);
                },
                erro: function(e) {
                    console.log(e);
                }
            });
        });
    });
</script>
<script>
  $(document).on('click', '#delete-selected-btn', function () {
    var selectedIds = $('input[name="chk"]:checked').map(function () {
        return $(this).val(); // Get checked values
    }).get();

    console.log("Selected IDs:", selectedIds); // Debugging: Check if IDs are collected

    if (selectedIds.length === 0) {
        swal({
          title: "{{ trans('message.Please select atleast one record') }}",
          text:'',
          icon: "warning",
          buttons:  "{{ trans('message.OK') }}",
          dangerMode: true,
      });
        return;
    }

    var deleteUrl = $(this).data('url');

    swal({
        title: "{{ trans('message.Are You Sure?') }}",
        text: "{{ trans('message.You will not be able to recover this data afterwards!') }}",
        icon: "warning",
        buttons: ["{{ trans('message.Cancel') }}", "{{ trans('message.Yes, delete!') }}"],
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            $.ajax({
                url: deleteUrl,
                type: 'POST',
                data: { ids: selectedIds, _token: '{{ csrf_token() }}' },
                success: function (response) {
                    swal("{{ trans('message.Deleted!') }}", response.message, "success");
                    $('#supplier').DataTable().ajax.reload(); // Refresh DataTable
                },
                error: function (xhr) {
                    swal("{{ trans('message.Something went wrong. Please try again.') }}", { icon: "error" });
                }
            });
        }
    });
});

</script>
@endsection