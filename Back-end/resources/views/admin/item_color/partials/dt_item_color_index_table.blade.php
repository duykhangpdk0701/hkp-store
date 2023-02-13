<table id="dt-table" class="table style-3  table-hover">
  <thead>
    <tr>
      <th class="checkbox-column text-center" style="width:10%">ID</th>
      <th style="width:60%">{{ __('general.common.name') }}</th>
      <th class="text-center" style="width:20%">Value</th>
      <th class="text-center dt-no-sorting" style="width:10%">{{ __('general.common.actions') }}</th>
    </tr>
  </thead>
</table>

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
          "pageLength": 5,
          "processing": true,
          "serverSide": true,
          "ordering": true,
          "order": [[0, 'desc']],
          "ajax": {
              "url": "{{ route('admin.item_color.index') }}",
              "data": function(d) {
                  drawDT = d.draw;
                  d.limit = d.length;
                  d.page = d.start / d.length + 1;
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
              "orderable": true,
              "class": "text-center"
            },
            {
              "data": "name",
              "orderable": true
            },
            {
              "data": "value",
              "orderable": false,
              "render": function(data, type, full) {
                return `<div class="color-box">
                  <span class="cl-example"
                      style="width: 64px; height: 64px; margin-right: 12px; background-color: ${data};"></span>
                  <div class="cl-info">
                      <h5 class="cl-title">Hex</h5>
                      <span>${data}</span>
                  </div>
                </div>`
              }
            },
            {
              "data": "id",
              "class": "text-center",
              "orderable": false,
              "render": function(data, type, full) {
                let destroyUrl = "{{ route('admin.item_color.destroy', ':id') }}";
                  destroyUrl = destroyUrl.replace(':id', data);

                let editUrl = "{{ route('admin.item_color.edit', ':id') }}";
                  editUrl = editUrl.replace(':id', data);

                return `<form action="${destroyUrl}" method="POST">
                    @csrf
                    @method('DELETE')
                    <ul class="table-controls">

                        @can(Acl::PERMISSION_ITEM_COLOR_EDIT)
                        <li>
                            <a href="${editUrl}" class="bs-tooltip"
                                data-toggle="tooltip" data-placement="top" title=""
                                data-original-title="{{ __('general.news_genre.tooltip.edit') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-edit-2 p-1 br-6 mb-1">
                                    <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                    </path>
                                </svg>
                            </a>
                        </li>
                        @endcan

                    </ul>
                </form>`
              }
            }
          ]
      });

      multiCheck(c3);
</script>
@endpush
