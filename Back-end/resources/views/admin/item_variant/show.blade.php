@extends('admin.layouts.app')

@section('title', __('general.item_stock.title'))

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('admin.item.index') }}">{{ __('general.item.title') }}</a></li>
    <li class="breadcrumb-item">
        <a href="{{ route('admin.item.show', $item) }}">
            {{ $itemVariant->item->name }}
        </a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">
        <span>
            Variant {{ $itemVariant->size->value }}
        </span>
    </li>
@endsection

@prepend('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/forms/theme-checkbox-radio.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/dt-global_style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/custom_dt_custom.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/select2/select2.min.css') }}">
@endprepend

@push('styles')
@endpush

@section('content')
    <div class="col-lg-12 col-sm-12 col-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <form action="{{ route('admin.item_stock.store') }}" method="POST" id="formStoreStock">
                @csrf
                <input type="hidden" name="item_variant_id" value="{{ $itemVariant->id }}">
                <input type="hidden" name="stock_status_id" value="1">
                <div class="widget-content widget-content-area rounded">
                    <div class="container-fluid my-4">
                        <h4>{{ __('general.common.inbound') }}</h4>
                        <div class="layout-top-spacing mb-4">
                            <a href="{{ route('admin.item.show', $item) }}" class="btn btn-gray">
                                {{ __('general.button.cancel') }}
                            </a>
                            <button type="submit" class="btn btn-primary">{{ __('general.button.save') }}</button>
                        </div>
                    </div>
                    <div class="container-fluid" id="inbound_form">
                        @include('admin.item_variant.partials.inbound_item')
                    </div>
                    <div class="container-fluid my-4">
                        <button type="button"
                            class="btn btn-secondary additem btn-sm">{{ __('general.common.add.item') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-lg-12 col-sm-12 col-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-content widget-content-area rounded">
                <div class="container-fluid mt-4">
                    <h4>{{ __('general.common.stocks') }}</h4>
                </div>
                <input type="hidden" value="{{ $itemVariant->id }}" id="itemVariantId">
                @include('admin.item_stock.partials.datatable')
            </div>
        </div>
    </div>
@endsection

@prepend('script')
    <script src="{{ asset('plugins/table/datatable/datatables.js') }}"></script>
    <script src="{{ asset('plugins/input-mask/jquery.inputmask.bundle.min.js') }}"></script>
    <script src="{{ asset('plugins/blockui/jquery.blockUI.min.js') }}"></script>
    <script src="{{ asset('plugins/blockui/custom-blockui.js') }}"></script>
    <script src="{{ asset('plugins/select2/select2.min.js') }}"></script>
@endprepend

@push('script')
    <script>
        createInputMask();

        $('.additem').on('click', function() {
            let index = $('.inbound-item').length;
            let url = '{{ route('admin.item.inbound_row') }}';
            load('#formStoreStock');
            $.ajax({
                url: url,
                type: 'get',
                data: {
                    index: index
                },
                success: function(data) {
                    let selectEl = '#sSupplier' + index;
                    $('#inbound_form').append(data);
                    feather.replace();
                    createInputMask();
                    unLoad('#formStoreStock');
                }
            })
        })

        $('#formStoreStock').on('submit', function(e) {
            load('#formStoreStock');
        })

        $(document).on('click', '.remove-inbound-item', function() {
            $(this).closest('.inbound-item').remove();
        })

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
