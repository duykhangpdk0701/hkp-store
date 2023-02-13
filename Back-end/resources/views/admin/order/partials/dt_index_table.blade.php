<script>
    let drawDT = 0;
    let order_status_shipped = {{ ORDER_STT_SHIPPED }};
    let order_status_completed = {{ ORDER_STT_COMPLETED }};

    c3 = $('#dt-table').DataTable({
        "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
            "<'table-responsive'tr>" +
            "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
        "oLanguage": {
            "oPaginate": {
                "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
            },
            "sEmptyTable": "{{ __('general.empty_table_message') }}",
            "sInfo": "{{ __('general.showing_page', ['page' => '_PAGE_', 'pages' => '_PAGES_']) }}",
            "sInfoEmpty": "{{ __('general.showing_page', ['page' => '_PAGE_', 'pages' => '_PAGES_']) }}",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "{{ __('general.search') }}",
            "sLengthMenu": "{{ __('general.result') }} :  _MENU_",
        },
        "stripeClasses": [],
        "lengthMenu": [5, 10, 20, 50],
        "pageLength": 10,
        "processing": true,
        "serverSide": true,
        "ordering": false,
        "ajax": {
            "url": "{{ route('admin.order.index') }}",
            "data": function(d) {
                let searchParams = new URLSearchParams(window.location.search);
                drawDT = d.draw;
                d.limit = d.length;
                d.page = d.start / d.length + 1;
                d.order_code = $('#sOrderCode').val();
                d.phone_number = $('#sPhoneNumber').val();
                d.to_date = searchParams.get('to_date');
                d.from_date = searchParams.get('from_date');
                d.order_status = $('#sOrderStatuses').val();
            },
            "dataSrc": function(res) {
                res.draw = drawDT;
                res.recordsTotal = res.meta.total;
                res.recordsFiltered = res.meta.total;
                return res.data;
            }
        },
        "columns": [{
                "data": "id",
            },
            {
                "data": "order_code",
                "render": function(data, type, full) {
                    let detailUrl = $('#orderDetailUrl').val();
                    detailUrl = detailUrl.replace(':id', full.id);
                    return `
                        <a href="${detailUrl}" class="text-primary">
                            ${data}
                        </a>
                    `;
                }
            },
            {
                "data": "customer",
                "render": function(data, type, full) {
                    let customerName = data !== null ? data.name : '';
                    // console.log(data);
                    return `
                        <p>
                            ${customerName}
                        </p>
                    `;
                }
            },
            {
                "data": "order",
                "render": function(data, type, full) {
                    return `
                        <p>
                            <small class="font-weight-bold">{{ __('general.order.name')  }}:</small>
                            <span class="text-secondary">
                                ${full.shipping_name }
                            </span>
                        </p>
                        <p>
                            <small class="font-weight-bold">{{ __('general.order.address') }}:</small>
                            <span class="text-secondary">
                                ${full.shipping_generate_address ?? ''}
                            </span>
                        </p>
                        <p>
                            <small class="font-weight-bold">{{ __('general.order.phone') }}:</small>
                            <span class="text-secondary">
                                ${full.shipping_phone ?? ''}
                            </span>
                        </p>
                    `
                }
            },
            {
                "data": "order",
                "render": function(data, type, full) {
                    return `
                        <p>
                            <span class="text-secondary">
                                ${full.payment_method}
                            </span>
                        </p>
                        <p>
                            <small class="font-weight-bold">{{ __('general.order.fee') }}:</small>
                            <span class="text-secondary">
                                ${full.payment_fee}
                            </span>
                        </p>
                        @if(auth()->user()->hasAnyRole([ROLE_SUPER_ADMIN, ROLE_ADMIN]))
                            <button type="button" class="btn btn-primary btn-payment-method-order" data-id="${full.id}" data-toggle="modal" data-target="#sChangePaymentStatus"> {{ __('general.order.payment_method_change') }} </button>
                        @endif
                    `
                }
            },
            {
                "data": "order",
                "render": function(data, type, full) {
                    let detailUrl = $('#orderDetailUrl').val();
                    detailUrl = detailUrl.replace(':id', full.id);
                    return `
                        <p>
                            <small class="font-weight-bold">{{ __('general.order.status') }}:</small>
                            <span class="text-secondary">
                                ${full.order_status_value}
                            </span>
                        </p>
                        <p>
                            <small CLASS="font-weight-bold">{{ __('general.order.items') }}:</small>
                            <a href="${detailUrl}">
                            <span class="text-secondary">
                                ${full.number_order_items}
                            </span>
                            </a>
                        </p>
                        @if(auth()->user()->hasAnyRole([ROLE_SUPER_ADMIN, ROLE_ADMIN, ROLE_SHIPPER]))
                            <button type="button" class="btn btn-primary btn-change-status-order" data-uuid="${full.uuid}" data-order_status="${full.order_status_id}"
                            data-toggle="modal" data-target="#sChangeStatus">{{ __('general.order.change_status_order') }}</button>
                        @endif
                    `
                }
            },
            {
                "data": "order",
                "render": function(data, type, full) {
                    return `
                        <p>
                            <small class="font-weight-bold">{{ __('general.order.price') }}:</small>
                            <span class="text-secondary">
                                ${full.total_price}
                            </span>
                        </p>
                        <p>
                            <small class="font-weight-bold">{{ __('general.order.discount') }}:</small>
                            <span class="text-secondary">
                                ${full.total_discount}
                            </span>

                        </p>
                        <p>
                            <small class="font-weight-bold">{{ __('general.order.coupon') }}:</small>
                            <span class="text-secondary">
                                ${full.coupon}
                            </span>
                        </p>
                    `
                }
            },
            {
                "data": "order",
                "render": function(data, type, full) {
                    return `
                        <p>
                            <small class="font-weight-bold">{{ __('general.common.total') }}:</small>
                            <span class="text-secondary">
                                ${full.total}
                            </span>
                        </p>`
                }
            },
            {
                "data": "created_at",
            },
            {
                "data": "updated_at",
            }
        ],
    });

    $('#sOrderCode, #sOrderStatuses').change(function() {
        c3.ajax.reload();
    })

    $('#sSubmitDate').click(function() {
        let fromDate = new Date($('#sFromDate').val());
        let toDate = new Date($('#sToDate').val());
        if (fromDate.getTime() > toDate.getTime()) {
            Snackbar.show({
                text: "{{ __('error.order.invalid_range_time') }}",
                duration: 3000,
                actionTextColor: '#fff',
                backgroundColor: '#e7515a'
            });
        }

        c3.ajax.reload()
    })

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
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
                uuid: $(this).data('uuid'),
            },
            async: false,
            success: function (response) {
                $.each(response.order_status, function(order, object) {
                    $('#sOrderStatus').append($('<option/>', { value : order }).text(object));
                });

                $.each(response.shippers, function(key, object) {
                    console.log(object)
                    $('#sShippers').append($('<option/>', { value : object.id }).text(object.name +' - ' + object.user_profile.phone));
                });

                $("#sOrderStatus").selectpicker("refresh");
                $("#sShippers").selectpicker("refresh");
            },
            error: function () {
                alert('Error occured');
            },
        });
    });

    //Check if order status is Shipped, show shipping provider
    $(document).on('change', '#sOrderStatus', function (e){
        hideShippingProviderGroup();
    });

    function hideShippingProviderGroup(){
        let orderStatus  = $('#sOrderStatus').val();

        //Get order status that will show shipping provider
        let arrOrderStatus  = [];
        arrOrderStatus.push((order_status_shipped).toString());

        if( arrOrderStatus.includes(orderStatus)){
            $('#sShipperGroup').attr("hidden", false);
        } else {
            $('#sShipperGroup').attr("hidden", true);
        }
    }

    $('#sChangeStatusButton').on('click', function (e) {
        e.preventDefault();
        var orderUuid = $('#sOrderUuid').val();
        var orderStatus = $('#sOrderStatus').val();
        var shipper_id = $('#sShippers').val();
        var email = $('#sEmail').val()
        var password = $('#sPassword').val()
        var arrProducts = [];

        $('#sChangeStatus').find('input[name^="items"]:checked').each(function() {
            arrProducts.push($(this).val());
        });

        let productList = arrProducts.join(",");

        let updateStatusUrl = '{{ route('admin.order.update-order-status', ':uuid') }}';
        updateStatusUrl = updateStatusUrl.replace(':uuid', orderUuid);

        $.ajax({
            type: "PUT",
            url: updateStatusUrl,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
                order_status_id: orderStatus,
                email: email,
                password: password,
                productCancelIDs: productList,
                shipper_id:  shipper_id
            },
            async: false,
            success: function (response) {
                if (response.success) {
                    $('#sChangeStatus').modal('hide')
                    swal({
                        title: "{{ __('general.common.titles.success') }}",
                        text: response.success,
                        type: 'success',
                        padding: '2em'
                    })
                    c3.ajax.reload()
                }

                if (response.error) {
                    swal({
                        title: "{{ __('general.common.titles.fail') }}",
                        text: response.error,
                        type: 'error',
                        padding: '2em'
                    })
                }

            },
            error: function (error) {
                swal({
                    title: 'Fail',
                    text: error.responseJSON.message,
                    type: 'error',
                    padding: '2em'
                })
            },
        });
    })

    multiCheck(c3);
</script>
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
                    c3.ajax.reload();
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
    });
</script>