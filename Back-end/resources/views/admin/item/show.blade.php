@extends('admin.layouts.app')

@section('title', $item->name)

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('admin.item.index') }}">{{ __('general.item.title') }}</a></li>
    <li class="breadcrumb-item active" aria-current="page"><span>{{ __('general.tooltip.show') }}</span></li>
@endsection

@prepend('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/dt-global_style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/custom_dt_custom.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/forms/theme-checkbox-radio.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrap-select/bootstrap-select.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/file-upload/file-upload-with-preview.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/forms/theme-checkbox-radio.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/forms/switches.css') }}">
    <link href="{{ asset('plugins/sweetalerts/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/sweetalerts/sweetalert.css') }}" rel="stylesheet" type="text/css" />
@endprepend

@push('styles')
    <style>
        .detail__img {
            height: 140px;
            overflow: hidden;
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid">
        <form action="{{ route('admin.item.update', $item) }}" method="POST" id="edit-item" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mt-4 mb-3">
                <a href="{{ route('admin.item.index') }}" class="btn btn-gray">{{ __('general.button.cancel') }}</a>
                <button type="submit" class="btn btn-primary">{{ __('general.button.update') }}</button>
            </div>
            <div class="row">
                <div class="col-lg-8 col-sm-12 col-12 layout-spacing mt-3">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-content widget-content-area">
                            <div class="container-fluid">
                                <h4 class="mt-3 mb-4">{{ __('general.common.general_information') }}</h4>
                                <div class="row">
                                    <div class="col-12 mt-md-0 mt-4">
                                        <div class="form">
                                            <div class="form-group mb-4">
                                                <label for="sName">
                                                    {{ __('general.common.item_name') }}
                                                    <strong class="text-danger">*</strong>
                                                </label>
                                                <input type="text" name="name"
                                                    class="form-control @error('name') is-invalid @enderror" id="sName"
                                                    placeholder="{{ __('general.common.item_name') }}"
                                                    value="{{ old('name') ? old('name') : $item->name }}">
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-4">
                                                <label for="sSku">
                                                    Sku
                                                    <strong class="text-danger">*</strong>
                                                </label>
                                                <input type="text" name="sku"
                                                    class="form-control @error('sku') is-invalid @enderror" id="sSku"
                                                    placeholder="Sku" value="{{ old('sku') ? old('sku') : $item->sku }}">
                                                @error('sku')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-4">
                                                <label for="sDescription">
                                                    {{ __('general.common.description') }}
                                                    <strong class="text-danger">*</strong>
                                                </label>
                                                <input type="text" name="description"
                                                    class="form-control @error('description') is-invalid @enderror"
                                                    id="sDescription" placeholder="{{ __('general.common.description') }}"
                                                    value="{{ old('description') ? old('description') : $item->description }}">
                                                @error('description')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="statbox widget box box-shadow mt-5">
                        <div class="widget-content widget-content-area">
                            <div class="container-fluid">
                                <h4 class="mt-3 mb-4">{{ __('general.common.thumbnail') }}</h4>
                                <div class="form">
                                    <div class="custom-file-container @error('thumbnail_image') is-invalid @enderror"
                                        data-upload-id="thumbnailImage">
                                        <label>{{ __('general.common.thumbnail_upload_sub') }} <a href="javascript:void(0)"
                                                class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                        <label class="custom-file-container__custom-file">
                                            <input type="file"
                                                class="custom-file-container__custom-file__custom-file-input"
                                                accept="image/*" name="thumbnail_image">
                                            <span class="custom-file-container__custom-file__custom-file-control"></span>
                                        </label>
                                        <div class="custom-file-container__image-preview"></div>
                                    </div>
                                    @error('thumbnail_image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="statbox widget box box-shadow mt-5 detail-images-section">
                        <div class="widget-content widget-content-area">
                            <div class="container-fluid">
                                <h4 class="mt-3 mb-4">{{ __('general.common.detail_images') }}</h4>
                                <button type="button" class="btn btn-dark mb-5" data-toggle="modal"
                                    data-target="#detailImageModal">{{ __('general.common.add.image') }}</button>
                                <div class="row">
                                    @foreach ($item->getMedia(ITEM_MEDIA_COLLECTION_DETAIL) as $mediaItem)
                                        <div class="col-4 detail-images">
                                            <div class="detail__img">
                                                <img class="w-100 h-100 rounded" src="{{ $mediaItem->getFullUrl() }}"
                                                    alt="">
                                            </div>
                                            <button type="button" class="btn btn-danger my-3 remove-media"
                                                data-media-id="{{ $mediaItem->id }}">
                                                {{ __('general.button.cancel') }}
                                            </button>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-12 col-12 layout-spacing mt-3">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-content widget-content-area">
                            <div class="container-fluid">
                                <h4 class="mt-3 mb-4">{{ __('general.common.detail_information') }}</h4>
                                <div class="form">
                                    <h5 class="mt-5 mb-4">{{ __('general.common.item_originality') }}</h5>
                                    <div class="form-group mb-4">
                                        <label for="sBrand">
                                            {{ __('general.common.brand') }}
                                            <strong class="text-danger">*</strong>
                                        </label>
                                        <div>
                                            <select
                                                class="selectpicker form-control @error('brand_id') is-invalid @enderror"
                                                id="sBrand" name="brand_id" data-live-search="true" data-size="5">
                                                <option selected value="">
                                                    --{{ __('general.common.choose.brand') }}--</option>
                                                @foreach ($brands as $brand)
                                                    <option value="{{ $brand->id }}"
                                                        {{ old('brand_id', $item->brand_id) == $brand->id ? 'selected' : '' }}>
                                                        {{ $brand->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('brand_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="sItemCategories">
                                            {{ __('general.common.category') }}
                                            <strong class="text-danger">*</strong>
                                        </label>
                                        <div>
                                            <select
                                                class="selectpicker form-control @error('item_categories') is-invalid @enderror"
                                                id="sItemCategories" name="item_categories[]"
                                                title="--{{ __('general.common.category') }}--" data-live-search="true"
                                                data-actions-box="true" data-size="10" multiple>
                                                @foreach ($itemCategories as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ old('item_categories', $selectedCategories) &&
                                                        in_array($category->id, old('item_categories', $selectedCategories))
                                                            ? 'selected'
                                                            : '' }}>
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('item_categories')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form">
                                    <h5 class="mt-5 mb-4">{{ __('general.common.item_stock_status') }}</h5>
                                    <div class="form-group mb-4">
                                        <label for="sStockIn">
                                            {{ __('general.common.stock_in') }}
                                        </label>
                                        <input type="text" name="stock_in"
                                            class="form-control @error('stock_in') is-invalid @enderror" id="sStockIn"
                                            disabled value="{{ $item->stock_in }}">
                                        @error('stock_in')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="sStockOut">
                                            {{ __('general.common.stock_out') }}
                                        </label>
                                        <input type="text" name="stock_out"
                                            class="form-control @error('stock_out') is-invalid @enderror" id="sStockOut"
                                            disabled value="{{ $item->stock_out }}">
                                        @error('stock_out')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="sStockStatus">
                                            {{ __('general.common.stock_status') }}
                                            <strong class="text-danger">*</strong>
                                        </label>
                                        <div>
                                            <select
                                                class="selectpicker form-control @error('item_stock_status_id') is-invalid @enderror"
                                                id="sStockStatus" name="item_stock_status_id"
                                                title="--{{ __('general.common.choose.stock_status') }}--"
                                                data-live-search="true" data-actions-box="true" data-size="5">
                                                @foreach ($stockStatuses as $stockStatus)
                                                    <option value="{{ $stockStatus->id }}"
                                                        {{ old('item_stock_status_id', $item->item_stock_status_id) == $stockStatus->id ? 'selected' : '' }}>
                                                        {{ $stockStatus->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('item_stock_status_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="row">
            <div class="col-lg-8 col-md-12 col-12 order-lg-1 order-2 layout-spacing mt-4">
                <div class="statbox widget box box-shadow">
                    <div class="widget-content widget-content-area">
                        <div class="container-fluid">
                            <h4 class="mt-3 mb-4">{{ __('general.common.item_variants') }}</h4>

                            <table id="dt-table" class="table style-3  table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th>SKU</th>
                                        <th>Sizes</th>
                                        <th>Colors</th>
                                        <th class="text-center">{{ __('general.common.stock_in') }}</th>
                                        <th class="text-center">{{ __('general.common.show') }}</th>
                                        <th class="text-center dt-no-sorting">{{ __('general.common.actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($item->itemVariants as $itemVariant)
                                        <tr>
                                            <td class="text-center">
                                                {{ $loop->index + 1 }}
                                            </td>
                                            <td>
                                                <p class="badge badge-info">
                                                    {{ $itemVariant->sku }}
                                                </p>
                                            </td>
                                            <td>
                                                <p class="font-weight-bold">
                                                    {{ $itemVariant->size->value }}
                                                </p>
                                            </td>
                                            <td>
                                                <p class="font-weight-bold">
                                                    {{ $itemVariant->color->name }} - ({{ $itemVariant->color->value }})
                                                </p>
                                            </td>
                                            <td class="text-center">
                                                <a
                                                    href="{{ route('admin.item.item_variant.show', [$item, $itemVariant]) }}">
                                                    <span class="badge badge-dark">
                                                        {{ $itemVariant->item_stocks_count }}
                                                        {{ __('general.common.stock_in') }}
                                                    </span>
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <label class="switch s-primary mr-2">
                                                    <input type="checkbox" class="toggle-active"
                                                        {{ $itemVariant->status ? 'checked' : '' }}
                                                        data-id="{{ $itemVariant->id }}">
                                                    <span class="slider round"></span>
                                                </label>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.item.item_variant.show', [$item, $itemVariant]) }}"
                                                    class="btn btn-info">
                                                    {{ __('general.common.add.stock') }}
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-12 order-lg-2 order-1 layout-spacing mt-4">
                <div class="statbox widget box box-shadow">
                    <div class="widget-content widget-content-area">
                        <div class="container-fluid">
                            <h4 class="mt-3 mb-4">{{ __('general.common.options') }}</h4>
                            <button type="button" class="btn btn-dark mb-4" data-toggle="modal"
                                data-target="#addSizeModal">Add options</button>
                            <div class="row">
                                <div class="col-12 mt-md-0 mt-4">
                                    <div class="form">
                                        <div class="form-group mb-4">
                                            <label for="sPersonType">
                                                {{ __('general.common.person_type') }}
                                            </label>
                                            <div>
                                                <select
                                                    class="selectpicker form-control @error('item_person_type_id') is-invalid @enderror"
                                                    id="sPersonType" name="item_person_type_id" data-live-search="true"
                                                    data-size="5" disabled>
                                                    @foreach ($personTypes as $personType)
                                                        <option value="{{ $personType->id }}"
                                                            {{ old('item_person_type_id', $item->item_person_type_id) == $personType->id ? 'selected' : '' }}>
                                                            {{ $personType->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('item_person_type_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="sPersonType">
                                                {{ __('general.common.size_option') }}
                                            </label>
                                            <form action="{{ route('admin.item.delete_size', $item) }}"
                                                class="delete-size-form" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div>
                                                    @foreach ($item->sizes as $size)
                                                        <span class="badge badge-dark mb-2">
                                                            <a type="submit" class="text-white remove-size"
                                                                data-id="{{ $size->id }}">x</a>
                                                            {{ $size->value }}
                                                        </span>
                                                    @endforeach
                                                </div>
                                            </form>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="sPersonType">
                                                Color option
                                            </label>
                                            <form action="{{ route('admin.item.delete_size', $item) }}"
                                                class="delete-color-form" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div>
                                                    @foreach ($item->colors as $color)
                                                        <span class="badge badge-dark mb-2">
                                                            <a type="submit" class="text-white remove-color"
                                                                data-id="{{ $color->id }}">x</a>
                                                            {{ $color->name }} - ({{ $color->value }})
                                                        </span>
                                                    @endforeach
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Detail Image -->
    @include('admin.item.partials.modals.detail_image')

    <!-- Modal Add Size -->
    @include('admin.item.partials.modals.add_size')

@endsection

@prepend('script')
    <script src="{{ asset('plugins/table/datatable/datatables.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-select/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('plugins/file-upload/file-upload-with-preview.min.js') }}"></script>
    <script src="{{ asset('plugins/blockui/jquery.blockUI.min.js') }}"></script>
    <script src="{{ asset('plugins/blockui/custom-blockui.js') }}"></script>
    <script src="{{ asset('plugins/sweetalerts/sweetalert2.min.js') }}"></script>
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
            "pageLength": 10,
        });

        multiCheck(c3);

        $(document).ready(function() {
            $('.delete').on('click', function(e) {
                $(this).closest('form').submit();
            })
        });

        var thumbnailImageUpload = new FileUploadWithPreview('thumbnailImage');
        thumbnailImageUpload.addImagesFromPath(['{{ $item->getFirstMediaUrl(ITEM_MEDIA_COLLECTION_THUMBNAIL) }}']);

        var detailImagesUpload = new FileUploadWithPreview('detailImages');
        $('#addDetailImage').submit(function() {
            let list = new DataTransfer();
            for (const e of detailImagesUpload.cachedFileArray) {
                list.items.add(e);
            }
            $('#detailImagesInput').prop("files", list.files);
            return true;
        })

        $('.remove-media').on('click', function() {
            let $this = $(this);
            let section = '.detail-images-section';
            let id = $this.data('media-id');
            let url = "{{ route('admin.item.delete_media', ':id') }}";
            url = url.replace(':id', id);
            load(section);

            $.ajax({
                url: url,
                type: 'DELETE',
                data: {
                    _token: @json(csrf_token())
                },
                success: function() {
                    $this.parent().remove();
                    unLoad(section);
                }
            })
        })
    </script>


    <script>
        $(document).on('click', '.toggle-active', function() {
            let $this = $(this);
            let id = $this.data('id');
            let container = '#dt-table';
            let url = '{{ route('admin.item_variant.toggle_status', ':id') }}';
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
                        text: '{{ __('success.changed_status') }}',
                        actionTextColor: '#fff',
                        customClass: 'bg-success'
                    });
                }
            })
        })

        $(document).on('click', '.remove-color', function() {
            let $this = $(this);
            let formClass = '.delete-color-form';
            let input = $("<input>")
                .attr("type", "hidden")
                .attr("name", "color_id").val($this.data('id'));

            const swalWithBootstrapButtons = swal.mixin({
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger mr-3',
                buttonsStyling: false,
            })

            swalWithBootstrapButtons({
                title: 'Are you sure?',
                text: "If you delete this color, the variants of the color will also be deleted",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true,
                padding: '2em'
            }).then(function(result) {
                if (result.value) {
                    $this.closest(formClass).append(input);
                    $this.closest(formClass).submit();
                }
            })
        })

        $(document).on('click', '.remove-size', function() {
            let $this = $(this);
            let formClass = '.delete-size-form';
            let input = $("<input>")
                .attr("type", "hidden")
                .attr("name", "size_id").val($this.data('id'));

            const swalWithBootstrapButtons = swal.mixin({
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger mr-3',
                buttonsStyling: false,
            })

            swalWithBootstrapButtons({
                title: 'Are you sure?',
                text: "If you delete this size, the variants of the size will also be deleted",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true,
                padding: '2em'
            }).then(function(result) {
                if (result.value) {
                    $this.closest(formClass).append(input);
                    $this.closest(formClass).submit();
                }
            })
        })
    </script>
@endpush
