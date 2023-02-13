<!-- Modal -->
<div class="modal fade bd-example-modal-m show" id="sChangeStatus" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-m" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('general.order.change_status_form') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="modal-body d-flex justify-content-center">
                <input type="hidden" id="sOrderUuid" name="uuid">
                <div class="content clearfix">
                    <form action="" autocomplete="off" onsubmit="e.preventDefault()">
                        <div class="form-group mb4">
                            <label for="sBrand">
                                {{ __('general.order.order_status') }}
                                <strong class="text-danger">*</strong>
                            </label>
                            <div>
                                <select class="selectpicker form-control" id="sOrderStatus" name="order_status_id"
                                    data-live-search="true" data-size="5">
                                    <option selected value="">--{{ __('general.order.choose_status') }}--</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group mb4" id="sShipperGroup" hidden="true">
                            <label for="sShippingProvider">
                                Shipper
                            </label>
                            <div>
                                <select class="selectpicker form-control" id="sShippers" name="shipper_id"
                                    data-live-search="true" data-size="5">
                                    <option selected value="">
                                        --{{ 'Choose shipper' }}--
                                    </option>
                                </select>
                            </div>
                        </div>
                    </form>


                    <div class="form-group mb4">
                        <label for="sSlug">{{ __('general.order.password') }}
                            <strong class="text-danger">*</strong></label>
                        <input type="password" name="password" class="form-control" id="sPassword"
                            placeholder="{{ __('general.order.password') }}">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>{{ __('general.close') }}
                </button>
                <a href="">
                    <button type="button" class="btn btn-primary"
                        id="sChangeStatusButton">{{ __('general.save') }}</button>
                </a>
            </div>
        </div>
    </div>
</div>
