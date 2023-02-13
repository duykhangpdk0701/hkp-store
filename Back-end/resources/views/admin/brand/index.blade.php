@extends('admin.layouts.app')

@section('title', __('general.brand.title'))

@section('breadcrumbs')
    <li class="breadcrumb-item active" aria-current="page"><span>{{ __('general.brand.title') }}</span></li>
@endsection

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/forms/theme-checkbox-radio.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/dt-global_style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/custom_dt_custom.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/forms/switches.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/sweetalerts/sweetalert.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/components/custom-sweetalert.css') }}" />
@endpush

@section('content')
    <div class="col-lg-12">
        <div class="statbox widget box box-shadow">
            <div class="widget-content widget-content-area">

                @can(Acl::PERMISSION_BRAND_ADD)
                    <div class="layout-top-spacing col-12">
                        <a href="{{ route('admin.brand.create') }}"
                            class="btn btn-primary">{{ __('general.button.create') }}</a>
                    </div>
                @endcan

                <table id="dt-table" class="table style-3  table-hover">
                    <thead>
                        <tr>
                            <th class="checkbox-column text-center">No.</th>
                            <th>{{ __('general.common.name') }}</th>
                            <th>Slug</th>
                            <th>{{ __('general.common.ordering') }}</th>
                            <th class="text-center dt-no-sorting">{{ __('general.common.show') }}</th>
                            <th class="text-center dt-no-sorting">{{ __('general.common.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($brands as $item)
                            <tr>
                                <td class="checkbox-column text-center">
                                    {{ $loop->index + 1 }}
                                </td>
                                <td>
                                    {{ $item->name }}
                                </td>
                                <td>
                                    {{ $item->slug }}
                                </td>
                                <td>
                                    {{ $item->order }}
                                </td>
                                <td class="text-center">
                                    <label class="switch s-primary mr-2">
                                        <input type="checkbox" class="toggle-active" {{ $item->status ? 'checked' : '' }}
                                            data-id="{{ $item->id }}">
                                        <span class="slider round"></span>
                                    </label>
                                </td>
                                <td class="text-center">
                                    <form action="{{ route('admin.brand.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <ul class="table-controls">

                                            @can(Acl::PERMISSION_BRAND_LIST)
                                                <li>
                                                    <a href="{{ route('admin.brand.show', $item->id) }}" class="bs-tooltip"
                                                        data-toggle="tooltip" data-placement="top" title=""
                                                        data-original-title="{{ __('general.tooltip.show') }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-eye p-1 br-6 mb-1">
                                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                            <circle cx="12" cy="12" r="3"></circle>
                                                        </svg>
                                                    </a>
                                                </li>
                                            @endcan

                                            @can(Acl::PERMISSION_BRAND_EDIT)
                                                <li>
                                                    <a href="{{ route('admin.brand.edit', $item->id) }}" class="bs-tooltip"
                                                        data-toggle="tooltip" data-placement="top" title=""
                                                        data-original-title="{{ __('general.tooltip.edit') }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-edit-2 p-1 br-6 mb-1">
                                                            <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                            </path>
                                                        </svg>
                                                    </a>
                                                </li>
                                            @endcan

                                            @can(Acl::PERMISSION_BRAND_DELETE)
                                                <li>
                                                    <a class="bs-tooltip delete" data-toggle="tooltip" data-placement="top"
                                                        title=""
                                                        data-original-title="{{ __('general.tooltip.delete') }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-trash p-1 br-6 mb-1">
                                                            <polyline points="3 6 5 6 21 6"></polyline>
                                                            <path
                                                                d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                            </path>
                                                        </svg>
                                                    </a>
                                                </li>
                                            @endcan
                                        </ul>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@prepend('script')
    <script src="{{ asset('plugins/table/datatable/datatables.js') }}"></script>
    <script src="{{ asset('plugins/blockui/jquery.blockUI.min.js') }}"></script>
    <script src="{{ asset('plugins/blockui/custom-blockui.js') }}"></script>
    <script src="{{ asset('plugins/sweetalerts/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('plugins/sweetalerts/custom-sweetalert.js') }}"></script>
@endprepend

@push('script')
    <script>
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
            "pageLength": 5
        });

        multiCheck(c3);
    </script>

    @include('admin.layouts.partials.script_delete_item_form_table')

    <script>
        $(document).on('click', '.toggle-active', function() {
            let $this = $(this);
            let id = $this.data('id');
            let container = '#dt-table';
            let url = '{{ route('admin.brand.toggle_status', ':id') }}';
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
                        text: '{{ __('success.brand.changed_status') }}',
                        actionTextColor: '#fff',
                        customClass: 'bg-success'
                    });
                }
            })
        })
    </script>
@endpush
