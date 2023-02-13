@extends('admin.layouts.app')

@section('title', __('general.user.title'))

@section('breadcrumbs')
<li class="breadcrumb-item active" aria-current="page"><span>{{ __('general.user.title') }}</span></li>
@endsection

@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/datatables.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/forms/theme-checkbox-radio.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/dt-global_style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/custom_dt_custom.css') }}">
@endpush

@section('content')
<div class="col-lg-12">
    <div class="statbox widget box box-shadow">
        <div class="widget-content widget-content-area">
            @can(Acl::PERMISSION_USER_ADD)
            <div class="layout-top-spacing col-12">
                <a href="{{ route('admin.user.create') }}" class="btn btn-primary">{{ __('general.button.create') }}</a>
            </div>
            @endcan
            <table id="dt-table" class="table style-3  table-hover">
                <thead>
                    <tr>
                        <th class="checkbox-column text-center">No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th class="text-center dt-no-sorting">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                    <tr>
                        <td class="checkbox-column text-center">
                            {{ $loop->index + 1 }}
                        </td>
                        <td>
                            {{ $item->name }}
                        </td>
                        <td>
                            {{ $item->email }}
                        </td>
                        <td>
                            @foreach ($item->getRoleNames() as $role)
                            {{ $role }}
                            @endforeach
                        </td>
                        <td class="text-center">
                            <form action="{{ route('admin.user.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <ul class="table-controls">
                                    @can(Acl::PERMISSION_USER_EDIT)
                                    <li>
                                        <a href="{{ route('admin.user.edit', $item->id) }}" class="bs-tooltip"
                                            data-toggle="tooltip" data-placement="top" title=""
                                            data-original-title="{{ __('general.tooltip.edit') }}">
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

                                    @can(Acl::PERMISSION_USER_DELETE)
                                    <li>
                                        <a class="bs-tooltip delete" data-toggle="tooltip" data-placement="top" title=""
                                            data-original-title="{{ __('general.tooltip.delete') }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
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
@endprepend

@push('script')
<script>
    c3 = $('#dt-table').DataTable({
            "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
                    "<'table-responsive'tr>" +
                    "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
               "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [10, 20, 50, 100],
            "pageLength": 50
        });

        multiCheck(c3);

        $(document).ready(function(){
            $('.delete').on('click', function(e) {
                $(this).closest('form').submit();
            })
        });
</script>
@endpush
