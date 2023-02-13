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
        "processing": true,
        "serverSide": true,
        "ordering": true,
        "ajax": {
            "url": "{{ route('admin.item.index') }}",
            "data": function(d) {
                drawDT = d.draw;
                d.limit = d.length;
                d.page = d.start / d.length + 1;
                d.brand_id = $('#sBrand').val();
                d.item_category_id = $('#sItemCategories').val();
            },
            "dataSrc": function(res) {
                res.draw = drawDT;
                res.recordsTotal = res.meta.total;
                res.recordsFiltered = res.meta.total;
                return res.data;
            }
        },
        "columns": [{
                "data": "thumbnail_url",
                "orderable": false,
                "render": function(data, type, full) {
                    return `<img class="item__img" src="${data}">`;
                },
            },
            {
                "data": "name",
                "width": "500px",
                "render": function(data, type, full) {
                    return `
                        <p>
                            <strong>${data}</strong>
                        </p>
                        <p>
                            <small class="font-weight-bold">SKU:</small>
                            <span class="badge badge-secondary">
                                ${full.sku}
                            </span>
                        </p>
                    `
                }
            },
            {
                "data": "created_at"
            },
            {
                "data": "is_featured",
                "render": function(data, type, full) {
                    return `
                        <label class="switch s-primary mr-2">
                            <input type="checkbox" class="toggle-feature-active" ${ data ? 'checked' : '' }
                                data-id="${full.id}">
                            <span class="slider round"></span>
                        </label>
                    `
                }
            },
            {
                "data": "media_type",
                "render": function(data, type, full) {
                    return `
                        <label class="switch s-primary mr-2">
                            <input type="checkbox" class="toggle-media-type" ${ data ? 'checked' : '' }
                                data-id="${full.id}">
                            <span class="slider round"></span>
                        </label>
                    `
                }
            },
            {
                "data": "status",
                "render": function(data, type, full) {
                    return `
                        <label class="switch s-primary mr-2">
                            <input type="checkbox" class="toggle-active" ${ data ? 'checked' : '' }
                                data-id="${full.id}">
                            <span class="slider round"></span>
                        </label>
                    `
                }
            },
            {
                "data": "id",
                "class": "text-center",
                "orderable": false,
                "render": function(data, type, full) {
                    let detailUrl = "{{ route('admin.item.show', ':id') }}";
                    detailUrl = detailUrl.replace(':id', data);
                    return `
                        <ul class="table-controls">
                            <li>
                                <a href="${ detailUrl }" class="bs-tooltip"
                                    data-toggle="tooltip" data-placement="top" title=""
                                    data-original-title="{{ __('general.tooltip.show') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-eye p-1 br-6 mb-1">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    `
                }
            }
        ],
    });

    $('#sBrand,#sItemCategories').on('change', function() {
        c3.ajax.reload()
    })

    $(document).on('click', '.toggle-feature-active', function() {
        let $this = $(this);
        let id = $this.data('id');
        let container = '#dt-table';
        let url = $('#featuredItemEditUrl').val();

        url = url.replace(':id', id);
        load(container);

        $.ajax({
            url: url,
            method: 'PUT',
            data: {
                _token: @json(csrf_token())
            },
            success: function() {
                unLoad(container);
                Snackbar.show({
                    text: '{{ __('success.item.changed_featured') }}',
                    actionTextColor: '#fff',
                    customClass: 'bg-success'
                });
            }
        })
    })

    $(document).on('click', '.toggle-active', function() {
        let $this = $(this);
        let id = $this.data('id');
        let container = '#dt-table';
        let url = $('#statusEditUrl').val();
        let status = $this.is(':checked');

        url = url.replace(':id', id);
        load(container);

        $.ajax({
            url: url,
            method: 'PUT',
            data: {
                status: +status,
                _token: @json(csrf_token())
            },
            success: function(res) {
                unLoad(container);
                Snackbar.show({
                    text: res?.data?.message,
                    actionTextColor: '#fff',
                    customClass: 'bg-success'
                });
            }
        })
    })

    $(document).on('click', '.toggle-media-type', function() {
        let $this = $(this);
        let id = $this.data('id');
        let container = '#dt-table';
        let url = $('#mediaTypeEditUrl').val();
        let status = $this.is(':checked');

        url = url.replace(':id', id);
        load(container);

        $.ajax({
            url: url,
            method: 'PUT',
            data: {
                status: +status,
                _token: @json(csrf_token())
            },
            success: function(res) {
                unLoad(container);
                Snackbar.show({
                    text: res?.data?.message,
                    actionTextColor: '#fff',
                    customClass: 'bg-success'
                });
            }
        })
    })

    multiCheck(c3);
</script>
