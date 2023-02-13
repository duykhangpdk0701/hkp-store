<table id="dt-table" class="table style-3 table-hover">
    <thead>
        <tr>
            <th class="checkbox-column text-center">No.</th>
            <th>{{ __('general.common.stock_status') }}</th>
            <th>{{ __('general.common.item_name') }}</th>
            <th>{{ __('general.common.price_in') }}</th>
            <th>{{ __('general.common.price') }}</th>
            <th>{{ __('general.common.created_at') }}</th>
            <th class="text-center dt-no-sorting">{{ __('general.common.actions') }}</th>
        </tr>
    </thead>
</table>

<!-- Modal Update Price Modal -->
@include('admin.item_stock.partials.update_price_modal')

@push('script')
    <script>
        let drawDT = 0;

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
            "ajax": {
                "url": "{{ route('admin.item_stock.index') }}",
                "data": function(d) {
                    let searchParams = new URLSearchParams(window.location.search);
                    let page = parseInt(searchParams.get('page'));

                    drawDT = d.draw;
                    d.limit = d.length;
                    d.page = d.start / d.length + 1;
                    d.user_id = searchParams.get('user_id');
                    d.item_id = searchParams.get('item_id');
                    d.stock_status_id = searchParams.get('stock_status_id');
                    d.size_id = searchParams.get('size_id');
                    d.to_date = searchParams.get('to_date');
                    d.from_date = searchParams.get('from_date');
                    d.item_variant_id = $('#itemVariantId').val();
                },
                "dataSrc": function(res) {
                    res.draw = drawDT;
                    res.recordsTotal = res.meta.total;
                    res.recordsFiltered = res.meta.total;
                    return res.data;
                }
            },
            "processing": true,
            "serverSide": true,
            "ordering": true,
            "order": [
                [0, 'desc']
            ],
            "columns": [{
                    "data": "id",
                    "orderable": true,
                },
                {
                    "data": "stock_status_id",
                    "orderable": true,
                    "render": function(data, type, full) {
                        return `
                            <span class="badge badge-primary">
                                ${full.stock_status_name}
                            </span>
                        `
                    }
                },
                {
                    "data": "item.name",
                    "orderable": false,
                    "render": function(data, type, full) {
                        let detailItemUrl = '{{ route('admin.item.show', ':id') }}';
                        let detailItemVariantUrl =
                            '{{ route('admin.item.item_variant.show', [':itemId', ':variantId']) }}';

                        detailItemUrl = detailItemUrl.replace(':id', full.item.id);
                        detailItemVariantUrl = detailItemVariantUrl.replace(':itemId', full.item.id)
                            .replace(':variantId', full.variant.id);

                        return `
                            <p class="font-weight-bold">
                                <a href="${detailItemUrl}">
                                    ${full.item.name}
                                </a>
                            </p>
                            <p>
                                <a href="${detailItemVariantUrl}">
                                    {{ __('general.common.item_variants') }}:
                                    <span class="badge outline-badge-primary">
                                        ${full.size_value}
                                    </span>
                                    <span class="badge outline-badge-primary">
                                        ${full.color_name} - (${full.color_value})
                                    </span>
                                </a>
                            </p>
                            <p>
                                SKU:
                                <span class="badge outline-badge-primary">
                                    ${full.item.sku}
                                </span>
                            </p>
                            <p>
                                {{ __('general.common.code') }}:
                                <span class="badge outline-badge-primary">
                                    ${full.code}
                                </span>
                            </p>
                        `
                    }
                },
                {
                    "data": "price_in",
                    "class": "text-center",
                },
                {
                    "data": "price",
                    "class": "text-center",
                },
                {
                    "data": "created_at",
                    "class": "text-center",
                },
                {
                    "data": "id",
                    "orderable": true,
                    "render": function(data, type, full) {
                        let html = `
                                <button class="btn btn-primary update-price" data-id="${data}"
                                    data-current-price="${full.price}"
                                    data-toggle="modal"
                                    data-target="#updatePriceModal">
                                    {{ __('general.button.update_price') }}
                                </button>
                            `;
                        return html;
                    }
                },
            ],
            "drawCallback": function() {
                $('.bs-tooltip').tooltip();
            },
        });

        multiCheck(c3);
    </script>
@endpush
