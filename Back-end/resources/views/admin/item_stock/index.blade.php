@extends('admin.layouts.app')

@section('title', __('general.item_stock.title'))

@section('breadcrumbs')
    <li class="breadcrumb-item active" aria-current="page"><span>{{ __('general.item_stock.title') }}</span></li>
@endsection

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/forms/theme-checkbox-radio.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/dt-global_style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/custom_dt_custom.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/select2/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/forms/switches.css') }}">
    <link href="{{ asset('assets/css/elements/tooltip.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/flatpickr/flatpickr.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('plugins/flatpickr/custom-flatpickr.css') }}" rel="stylesheet" type="text/css">
@endpush

@section('content')
    <input type="hidden" value="{{ route('admin.item.toggle_featured', ':id') }}" id="featuredItemEditUrl">
    <div class="col-lg-12 mb-3">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-12">
                        <h4 class="d-flex align-items-center">
                            {{ __('general.common.filters') }}
                        </h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area p-3">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-8 px-2">
                            @include('admin.item_stock.partials.dt_filters.item_filter')
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 px-2">
                            @include('admin.item_stock.partials.dt_filters.stock_status_filter')
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 px-2">
                            @include('admin.item_stock.partials.dt_filters.size_filter')
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 px-2">
                            @include('admin.item_stock.partials.dt_filters.date_range_filter')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="statbox widget box box-shadow">
            <div class="widget-content widget-content-area">
                @include('admin.item_stock.partials.datatable')
            </div>
        </div>
    </div>
@endsection

@prepend('script')
    <script src="{{ asset('plugins/table/datatable/datatables.js') }}"></script>
    <script src="{{ asset('plugins/select2/select2.min.js') }}"></script>
    <script src="{{ asset('plugins/blockui/jquery.blockUI.min.js') }}"></script>
    <script src="{{ asset('plugins/blockui/custom-blockui.js') }}"></script>
    <script src="{{ asset('plugins/input-mask/jquery.inputmask.bundle.min.js') }}"></script>
    <script src="{{ asset('plugins/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('assets/js/elements/tooltip.js') }}"></script>
@endprepend

@push('script')
    <script>
        let url = new URL(window.location);

        createStockStatusSelect();
        createItemSelect();
        createInputMask();
        createSizeSelect();
        createDateRangeFiler();

        function createInputMask() {
            $(".currency-input").inputmask({
                alias: "currency",
                prefix: "",
                rightAlign: false,
                digits: 0,
                removeMaskOnSubmit: true
            });
        }
    </script>
@endpush
