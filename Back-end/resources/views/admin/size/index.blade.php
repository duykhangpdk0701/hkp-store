@extends('admin.layouts.app')

@section('title', __('general.item_size.title'))

@section('breadcrumbs')
    <li class="breadcrumb-item active" aria-current="page"><span>{{ __('general.item_size.title') }}</span></li>
@endsection

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/forms/theme-checkbox-radio.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/dt-global_style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/custom_dt_custom.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/sweetalerts/sweetalert.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/components/custom-sweetalert.css') }}" />
@endpush

@section('content')
    <div class="col-lg-12">
        <div class="statbox widget box box-shadow">
            <div class="widget-content widget-content-area">

                @can(Acl::PERMISSION_ITEM_SIZE_ADD)
                    <div class="layout-top-spacing col-12">
                        <a href="{{ route('admin.item_size.create') }}"
                            class="btn btn-primary">{{ __('general.button.create') }}</a>
                    </div>
                @endcan

                <table id="dt-table" class="table style-3  table-hover">
                    <thead>
                        <tr>
                            <th>{{ __('general.common.value') }}</th>
                            <th>{{ __('general.common.item_category') }}</th>
                            <th>{{ __('general.common.person_type') }}</th>
                            <th>{{ __('general.common.ordering') }}</th>
                            <th class="text-center dt-no-sorting">{{ __('general.common.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($itemSizes as $item)
                            <tr>
                                <td>
                                    {{ $item->value }}
                                </td>
                                <td>
                                    {{ $item->itemCategory ? $item->itemCategory->name : '-' }}
                                </td>
                                <td>
                                    {{ $item->itemPersonType ? trans('general.item.person_types.' . $item->itemPersonType['code']) : '-' }}
                                </td>
                                <td>
                                    {{ $item->order }}
                                </td>
                                <td class="text-center">
                                    <form action="{{ route('admin.item_size.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <ul class="table-controls">

                                            @can(Acl::PERMISSION_ITEM_SIZE_EDIT)
                                                <li>
                                                    <a href="{{ route('admin.item_size.edit', $item->id) }}" class="bs-tooltip"
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

                                            @can(Acl::PERMISSION_ITEM_SIZE_DELETE)
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
            "lengthMenu": [10, 20, 30, 50, 100],
            "pageLength": 50
        });

        multiCheck(c3);
    </script>

    @include('admin.layouts.partials.script_delete_item_form_table')
@endpush
