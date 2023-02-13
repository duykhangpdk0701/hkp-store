<div class="row mt-3">
    <div class="col-12">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-12">
                        <h4 class="d-flex align-items-center">
                            <i data-feather="check-circle" class="text-success mr-3"></i>
                            {{ __('general.common.allocated_items') }} ({{ $order->order_items_count }})
                        </h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area rounded">
                <table id="dt-allocated-items" class="table style-3 table-hover">
                    <thead>
                        <tr>
                            <th>{{ __('general.common.name') }}</th>
                            <th>Sku</th>
                            <th>{{ __('general.common.size') }}</th>
                            <th>Color</th>
                            <th>{{ __('general.common.quantity') }}</th>
                            <th class="text-center dt-no-sorting">{{ __('general.common.subtotal') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->orderItems as $orderItem)
                            <tr>
                                <td class="font-weight-bold d-flex">
                                    <img src="{{ $orderItem->item->thumbnail }}" style="height: 50px;">
                                    <div class="ml-2">
                                        {{ $orderItem->item->name }}
                                        <p>
                                            <span class="badge outline-badge-dark">
                                                {{ $orderItem->itemStock->code }}
                                            </span>
                                        </p>
                                    </div>
                                </td>
                                <td>
                                    {{ $orderItem->itemStock->sku }}
                                </td>
                                <td>
                                    {{ $orderItem->size_value }}
                                </td>
                                <td>
                                    {{ $orderItem->color_name }}
                                </td>
                                <td>
                                    {{ $orderItem->quantity }} x
                                    {{ number_format($orderItem->price) }}
                                </td>
                                <td class="text-center font-weight-bold">
                                    {{ number_format($orderItem->price * $orderItem->quantity) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- <div class="actions mt-4 d-flex justify-content-end">
                    <button id="unallocated-btn" class="btn btn-primary" disabled>
                        Un-allocate Items
                    </button>
                </div> --}}
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
        c4 = $('#dt-allocated-items').DataTable({
            "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
                "<'table-responsive'tr>",
            "oLanguage": {
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "{{ __('general.search') }}",
            },
            "stripeClasses": [],
            "paging": false,
            "info": false
        });

        multiCheck(c4);


        $(".select-stock-items-info").on("click", function() {
            if ($(".select-stock-items-info:checked").length > 0) {
                $('#unallocated-btn').prop('disabled', false);
            } else {
                $('#unallocated-btn').prop('disabled', true);
            }
        });
    </script>
@endpush
