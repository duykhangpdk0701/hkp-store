<!-- Modal -->
<div class="modal fade bd-example-modal-m show" id="sChangePaymentStatus" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    {{ __('general.order.change_payment_form') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="sOrderIdChangePayment" name="order_id">
                <div class="content clearfix">
                    <div class="form-group mb4">
                        <label for="sBrand">
                            {{ __('general.order.payment_method') }}
                            <strong class="text-danger">*</strong>
                        </label>
                        <div>
                            <select class="selectpicker form-control @error('brand_id') is-invalid @enderror"
                                id="sPaymentMethod" name="order_status_id" data-live-search="true" data-size="5">
                                <option selected value="">--{{ __('general.order.choose_payment_method') }}--
                                </option>
                                @foreach ($paymentMethods as $method)
                                    <option value="{{ $method->id }}">
                                        {{ $method->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group mb4">
                        <label for="sSlug">{{ __('general.order.password') }}
                            <strong class="text-danger">*</strong></label>
                        <input type="password" name="password" class="form-control" id="sPasswordPayment"
                            placeholder="{{ __('general.order.password') }}">
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>
                    {{ __('general.close') }}</button>
                <a href="">
                    <button type="button" class="btn btn-primary"
                        id="sChangePaymentMethodButton">{{ __('general.save') }}</button>
                </a>
            </div>
        </div>
    </div>
</div>
@push('script')
@endpush
