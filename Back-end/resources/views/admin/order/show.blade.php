@extends('admin.layouts.app')

@section('meta-title', __('general.order_details.meta_title', ['order_code' => $order->order_code]))

@section('breadcrumbs')
    <li class="breadcrumb-item active" aria-current="page"><span>{{ __('general.order.title') }}</span></li>
@endsection

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/dt-global_style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrap-select/bootstrap-select.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/forms/theme-checkbox-radio.css') }}">
    <style>
        .widget-content-area {
            border: none;
            box-shadow: unset;
            padding: 20px;
        }
    </style>
@endpush

@section('content')
    <input id="sCityUrl" type="hidden" value="{{ route('admin.address.city.get_districts', ':id') }}">
    <input id="sDistrictUrl" type="hidden" value="{{ route('admin.address.district.get_wards', ':id') }}">

    {{-- Title --}}
    <div class="col-8">
        <div class="d-md-flex align-items-center">
            <div>
                <p class="font-weight-bold text-uppercase">
                    {{ __('general.common.orders') }}
                    <span class="text-primary">{{ $order->order_code }}</span>
                </p>
            </div>
            <p class="mx-0 mx-md-2">
                <span
                    class="badge {{ collect(ORDER_STATUS_LIST)->where('id', $order->order_status_id)->first()['badge'] }}">
                    {{ collect(ORDER_STATUS_LIST)->where('id', $order->order_status_id)->first()['name'] }}
                </span>
            </p>
        </div>
        <span>{{ $order->created_at }}</span>
    </div>
    <div class="col-4">
        <div class="d-flex justify-content-end">
            <button class="btn btn-primary btn-change-status-order" type="button"
                data-order_status="{{ $order->order_status_id }}" data-toggle="modal" data-target="#sChangeStatus"
                data-uuid="{{ $order->uuid }}">{{ __('general.button.update_status') }}
            </button>
        </div>
    </div>

    {{-- Left Details --}}
    <div class="col-12 col-md-8 pr-md-2 order-details">
        {{-- Order Details --}}

        <form action="" autocomplete="off" onsubmit="e.preventDefault()">
            @include('admin.order.partials.dt_tables.dt_order_items')
        </form>

        {{-- Order Information --}}
        <div class="row mt-3">
            <div class="col-12">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>{{ __('general.common.order_info') }}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area rounded">
                        <div class="row">
                            <div class="col-12 order-details__info">
                                <div class="order-details__info-item">
                                    <div class="title">
                                        <p>{{ __('general.common.discount') }}</p>
                                    </div>
                                    <div class="info">
                                        <p>- {{ number_format($order->total_discount) }}</p>
                                    </div>
                                </div>
                                <div class="order-details__info-item">
                                    <div class="title font-weight-bold">
                                        <p>{{ __('general.common.total') }}</p>
                                    </div>
                                    <div class="info font-weight-bold">
                                        <p>{{ number_format($order->total) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Right Details --}}
    <div class="col-12 col-md-4 pl-md-2">
        {{-- Notes --}}
        <div class="row mt-3">
            <div class="col-12">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>{{ __('general.common.note') }}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area rounded">
                        <p>
                            {{ $order->comment ?? 'No notes' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Customer Details --}}
        <div class="row mt-3">
            <div class="col-12">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>{{ __('general.common.customer') }}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area rounded">
                        <p>
                            <strong>{{ __('general.common.name') }}:</strong> {{ $order->customer->name }}
                        </p>
                        <hr>

                        {{-- Payment Info --}}
                        <div>
                            <h6>{{ __('general.common.payment_info') }}</h6>
                            <div class="mt-3">
                                <p>
                                    <strong>{{ __('general.common.payment_method') }}
                                        :</strong> {{ $order->paymentMethod->name }}
                                </p>
                                <p>
                                    <strong>{{ __('general.common.fee') }}
                                        :</strong> {{ number_format($order->paymentMethod->fee) }}
                                </p>
                                <div class="d-flex justify-content-end">
                                    <button class="btn btn-outline-dark btn-payment-method-order" data-toggle="modal"
                                        data-target="#sChangePaymentStatus" data-id="{{ $order->id }}">
                                        {{ __('general.button.edit_payment') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                        <hr>

                        {{-- Shipping Info --}}
                        <div>
                            <h6>{{ __('general.common.shipping_info') }}</h6>
                            <div class="mt-3">
                                <p>
                                    <strong>{{ __('general.common.name') }}:</strong> {{ $order->shipping_name }}
                                </p>
                                <p>
                                    <strong>{{ __('general.common.address') }}:</strong> {{ $order->shippingAddress() }}
                                </p>
                                <p>
                                    <strong>{{ __('general.common.phone') }}:</strong> {{ $order->shipping_phone }}
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Edit Payment Modal --}}
    @include('admin.order.partials.modal.payment-method-modal')

    {{-- Update Status Modal --}}
    @include('admin.order.partials.modal.status-modal-order-detail')
@endsection

@prepend('script')
    <script src="{{ asset('plugins/table/datatable/datatables.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-select/bootstrap-select.min.js') }}"></script>
@endprepend

@push('script')
    <script>
        $(document).on('click', '.btn-payment-method-order', function() {
            $('#sOrderIdChangePayment').val($(this).data('id'));
        });

        $('#sChangePaymentMethodButton').on('click', function(e) {
            e.preventDefault();
            var orderId = $('#sOrderIdChangePayment').val();
            var paymentMethodId = $('#sPaymentMethod').val();
            var password = $('#sPasswordPayment').val()

            let updateStatusUrl = '{{ route('admin.order.update-payment-method', ':id') }}';
            updateStatusUrl = updateStatusUrl.replace(':id', orderId);
            $.ajax({
                type: "PUT",
                url: updateStatusUrl,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    payment_method_id: paymentMethodId,
                    password: password
                },
                async: false,
                success: function(response) {
                    if (response.success) {
                        $('#sChangePaymentStatus').modal('hide')
                        Snackbar.show({
                            text: response.success,
                            actionTextColor: '#fff',
                            customClass: 'bg-success'
                        });
                        window.location.reload();
                    }

                    if (response.error) {
                        Snackbar.show({
                            text: response.error,
                            actionTextColor: '#fff',
                            customClass: 'bg-danger'
                        });
                    }

                },
                error: function(response) {
                    Snackbar.show({
                        text: response.responseJSON.message,
                        actionTextColor: '#fff',
                        customClass: 'bg-danger'
                    });
                },
            });
        })
    </script>
@endpush
