@extends('admin.layouts.app')

@section('title', __('general.order.title'))

@section('breadcrumbs')
    <li class="breadcrumb-item active" aria-current="page"><span>{{ __('general.order.title') }}</span></li>
@endsection

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/forms/theme-checkbox-radio.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/dt-global_style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/custom_dt_custom.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrap-select/bootstrap-select.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/flatpickr/flatpickr.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/flatpickr/custom-flatpickr.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/sweetalerts/sweetalert2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/sweetalerts/sweetalert.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/components/custom-sweetalert.css') }}">
    <link href="{{ asset('plugins/notification/snackbar/snackbar.min.css') }}" rel="stylesheet" type="text/css">
@endpush

@section('content')
    <div class="col-lg-12">
        <div class="statbox widget box box-shadow">
            <div class="widget-content widget-content-area">
                <input type="hidden" id="orderDetailUrl" value="{{ route('admin.order.show', ':id') }}">

                {{-- Filters --}}
                <form action="" autocomplete="off" onsubmit="e.preventDefault();">
                    <div class="container-fluid layout-top-spacing">
                        <div class="form-row mb-xl-0 mb-2">
                            <div class="form-group col-xl-3 col-lg-4 col-12 mt-sm-3">
                                @include('admin.order.partials.date_range_filter')
                            </div>
                            <div class="form-group col-xl-3 col-lg-4 col-12 mt-sm-3">
                                <input type="text" class="form-control" id="sPhoneNumber" name="phone_number"
                                    placeholder="{{ __('general.order.phone_number') }}">
                            </div>
                        </div>
                        <div class="form-row ">
                            <select class="form-group selectpicker col-xl-3 col-lg-4 col-12" id="sOrderCode"
                                data-live-search="true" data-size="10" name="order_code">
                                <option selected value="">--{{ __('general.order.filter_order_code') }}--</option>
                                @foreach ($orders as $order)
                                    <option value="{{ $order['order_code'] }}">
                                        {{ $order['order_code'] }}
                                    </option>
                                @endforeach
                            </select>
                            <select class="form-group selectpicker col-xl-3 col-lg-4 col-12" id="sOrderStatuses"
                                data-live-search="true" data-size="10" name="order_status">
                                <option selected value="">--{{ __('general.order.filter_order_status') }}--</option>
                                @foreach ($orderStatuses as $status)
                                    <option value="{{ $status['id'] }}">
                                        {{ __($status['name']) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-12">
                        <button type="button" class="btn btn-primary mb-2"
                            id="sSubmitDate">{{ __('general.order.filter') }}</button>
                    </div>

                    {{-- DataTables --}}
                    <form action="" autocomplete="off" onsubmit="e.preventDefault();">
                        <table id="dt-table" class="table style-3  table-hover">
                            <thead>
                                <tr>
                                    <th class="checkbox-column text-center">ID</th>
                                    <th>{{ __('general.order.code') }}</th>
                                    <th>{{ __('general.order.customer') }}</th>
                                    <th>{{ __('general.order.shipping_info') }}</th>
                                    <th>{{ __('general.order.payment_method') }}</th>
                                    <th>{{ __('general.order.status') }}</th>
                                    <th>{{ __('general.order.price') }}</th>
                                    <th>{{ __('general.order.total') }}</th>
                                    <th>{{ __('general.order.created_at') }}</th>
                                    <th>{{ __('general.order.updated_at') }}</th>
                                </tr>
                            </thead>
                        </table>
                    </form>
            </div>
        </div>
    </div>
    @include('admin.order.partials.modal.status-modal')
    @include('admin.order.partials.modal.payment-method-modal')
@endsection

@prepend('script')
    <script src="{{ asset('plugins/table/datatable/datatables.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-select/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('plugins/dropify/dropify.min.js') }}"></script>
    <script src="{{ asset('plugins/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('plugins/sweetalerts/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('plugins/sweetalerts/custom-sweetalert.js') }}"></script>
    <script src="{{ asset('plugins/notification/snackbar/snackbar.min.js') }}"></script>
@endprepend

@push('script')
    @include('admin.order.partials.dt_index_table')
    {{-- <script> --}}
    {{-- var f1 = flatpickr(document.getElementById('sFromDate')); --}}
    {{-- var f2 = flatpickr(document.getElementById('sToDate')); --}}
    {{-- </script> --}}
    <script>
        let url = new URL(window.location);
        createDateRangeFiler();
    </script>
@endpush
