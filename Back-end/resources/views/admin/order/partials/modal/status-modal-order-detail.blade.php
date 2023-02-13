<!-- Modal -->
<div class="modal fade bd-example-modal-m show" id="sChangeStatus" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-m" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('general.common.change_status') }}</h5>
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
                    <div class="form-group mb4">
                        <label for="sBrand">
                            {{ __('general.common.order_status') }}
                            <strong class="text-danger">*</strong>
                        </label>
                        <div>
                            <select class="selectpicker form-control" id="sOrderStatus" name="order_status_id"
                                data-live-search="true" data-size="5">
                                <option selected value="">-- {{ __('general.common.choose.status') }} --</option>
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
                    <div class="form-group mb4">
                        <label for="sSlug">{{ __('general.common.password') }}
                            <strong class="text-danger">*</strong></label>
                        <input type="password" name="password" class="form-control" id="sPassword"
                            placeholder="{{ __('general.common.password') }}">
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>
                    {{ __('general.button.close') }}</button>
                <a href="">
                    <button type="button" class="btn btn-primary"
                        id="sChangeStatusButton">{{ __('general.button.save') }}</button>
                </a>
            </div>
        </div>
    </div>
</div>
@push('script')
    <script>
        $(document).on('click', '.btn-change-status-order', function() {
            $('#sOrderUuid').val($(this).data('uuid'));
            $('#sOrderStatus').find('option:not(:first)').remove();
            $("#sOrderStatus").selectpicker("refresh");
            $('#sShippers').find('option:not(:first)').remove();
            $("#sShippers").selectpicker("refresh");
            let urlGetOrderStatus = '{{ route('admin.order_status.get_status', ':id') }}';
            urlGetOrderStatus = urlGetOrderStatus.replace(':id', $(this).data('order_status'));

            $.ajax({
                type: "GET",
                url: urlGetOrderStatus,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    uuid: $(this).data('uuid'),
                },
                async: false,
                success: function(response) {
                    $.each(response.order_status, function(order, object) {
                        $('#sOrderStatus').append($('<option/>', {
                            value: order
                        }).text(object));
                    });

                    $.each(response.shippers, function(key, object) {
                        console.log(object)
                        $('#sShippers').append($('<option/>', {
                            value: object.id
                        }).text(object.name + ' - ' + object.user_profile.phone));
                    });

                    $("#sOrderStatus").selectpicker("refresh");
                    $("#sShippers").selectpicker("refresh");
                },
                error: function() {
                    alert('Error occured');
                },
            });


        });

        $('#sChangeStatusButton').on('click', function(e) {
            e.preventDefault();
            let orderUuid = $('#sOrderUuid').val();
            let orderStatus = $('#sOrderStatus').val();
            let email = $('#sEmail').val()
            let password = $('#sPassword').val()
            let arrProducts = [];

            $('#sChangeStatus').find('input[name^="items"]:checked').each(function() {
                arrProducts.push($(this).val());
            });

            let productList = arrProducts.join(",");

            let updateStatusUrl = '{{ route('admin.order.update-order-status', ':order') }}';
            updateStatusUrl = updateStatusUrl.replace(':order', orderUuid);
            console.log($('meta[name="csrf-token"]').attr('content'));
            $.ajax({
                type: "PUT",
                url: updateStatusUrl,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    order_status_id: orderStatus,
                    email: email,
                    password: password,
                    productCancelIDs: productList,
                },
                async: false,
                success: function(response) {
                    if (response.success) {
                        $('#sChangeStatus').modal('hide')
                        window.location.reload();
                        Snackbar.show({
                            text: response.success,
                            actionTextColor: '#fff',
                            customClass: 'bg-success'
                        });
                    }

                    if (response.error) {
                        Snackbar.show({
                            text: response.error,
                            actionTextColor: '#fff',
                            customClass: 'bg-danger'
                        });
                    }

                },
                error: function(error) {
                    Snackbar.show({
                        text: error.responseJSON.message,
                        actionTextColor: '#fff',
                        customClass: 'bg-danger'
                    });
                },
            });
        })

        //Check if order status is Shipped, show shipping provider
        $(document).on('change', '#sOrderStatus', function(e) {
            hideShippingProviderGroup();
        });

        function hideShippingProviderGroup() {
            let orderStatus = $('#sOrderStatus').val();

            //Get order status that will show shipping provider
            let arrOrderStatus = [];
            arrOrderStatus.push((order_status_shipped).toString());

            if (arrOrderStatus.includes(orderStatus)) {
                $('#sShipperGroup').attr("hidden", false);
            } else {
                $('#sShipperGroup').attr("hidden", true);
            }
        }
    </script>
@endpush
