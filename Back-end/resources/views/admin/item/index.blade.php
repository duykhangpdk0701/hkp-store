@extends('admin.layouts.app')

@section('title', __('general.item.title'))

@section('breadcrumbs')
    <li class="breadcrumb-item active" aria-current="page"><span>{{ __('general.item.title') }}</span></li>
@endsection

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/forms/theme-checkbox-radio.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/dt-global_style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/custom_dt_custom.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrap-select/bootstrap-select.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/forms/switches.css') }}">
@endpush

@section('content')
    <input type="hidden" value="{{ route('admin.item.toggle_featured', ':id') }}" id="featuredItemEditUrl">
    <input type="hidden" value="{{ route('admin.item.toggle_status', ':id') }}" id="statusEditUrl">
    <input type="hidden" value="{{ route('admin.item.toggle_media_type', ':id') }}" id="mediaTypeEditUrl">
    <div class="col-lg-12">
        <div class="statbox widget box box-shadow">
            <div class="widget-content widget-content-area">

                @can(Acl::PERMISSION_ITEM_ADD)
                    <div class="layout-top-spacing col-12">
                        <a href="{{ route('admin.item.create') }}" class="btn btn-primary">{{ __('general.button.create') }}</a>
                    </div>
                @endcan

                <div class="container-fluid layout-top-spacing">
                    <div class="form-row flex-row-reverse">
                        <select class="selectpicker col-xl-3 col-lg-4 col-12" id="sBrand" data-live-search="true" data-size="5">
                            <option selected value="">--{{ __('general.common.filter.brand') }}--</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}">
                                    {{ $brand->name }}
                                </option>
                            @endforeach
                        </select>
                        <select class="selectpicker col-xl-3 col-lg-4 col-12" id="sItemCategories" data-live-search="true" data-size="10">
                            <option selected value="">--{{ __('general.common.filter.category') }}--</option>
                            @foreach ($itemCategories as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <table id="dt-table" class="table style-3  table-hover">
                    <thead>
                        <tr>
                            <th>{{ __('general.common.image') }}</th>
                            <th>{{ __('general.common.name') }}</th>
                            <th>{{ __('general.common.created_at') }}</th>
                            <th>{{ __('general.common.featured_item') }}</th>
                            <th>{{ __('general.common.media_type') }}</th>
                            <th>{{ __('general.common.show') }}</th>
                            <th class="text-center dt-no-sorting">{{ __('general.common.actions') }}</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection

@prepend('script')
    <script src="{{ asset('plugins/table/datatable/datatables.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-select/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('plugins/blockui/jquery.blockUI.min.js') }}"></script>
    <script src="{{ asset('plugins/blockui/custom-blockui.js') }}"></script>
@endprepend

@push('script')
    @include('admin.item.partials.dt_index_table')
@endpush
