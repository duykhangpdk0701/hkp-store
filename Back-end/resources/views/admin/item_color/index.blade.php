@extends('admin.layouts.app')

@section('title', __('general.item_color.title'))

@section('breadcrumbs')
    <li class="breadcrumb-item active" aria-current="page"><span>{{ __('general.item_color.title') }}</span></li>
@endsection

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/forms/theme-checkbox-radio.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/dt-global_style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/custom_dt_custom.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/forms/switches.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/elements/color_library.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/sweetalerts/sweetalert.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/components/custom-sweetalert.css') }}" />
@endpush

@section('content')
    <div class="col-lg-12">
        <div class="statbox widget box box-shadow">
            <div class="widget-content widget-content-area">

                @can(Acl::PERMISSION_ITEM_COLOR_ADD)
                    <div class="layout-top-spacing col-12">
                        <a href="{{ route('admin.item_color.create') }}"
                            class="btn btn-primary">{{ __('general.button.create') }}</a>
                    </div>
                @endcan

                @include('admin.item_color.partials.dt_item_color_index_table')
            </div>
        </div>
    </div>
@endsection

@prepend('script')
    <script src="{{ asset('plugins/table/datatable/datatables.js') }}"></script>
    <script src="{{ asset('plugins/sweetalerts/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('plugins/sweetalerts/custom-sweetalert.js') }}"></script>
    <script src="{{ asset('plugins/blockui/jquery.blockUI.min.js') }}"></script>
    <script src="{{ asset('plugins/blockui/custom-blockui.js') }}"></script>
@endprepend

@push('script')
@endpush
