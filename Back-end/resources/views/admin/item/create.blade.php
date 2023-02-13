@extends('admin.layouts.app')

@section('title', __('general.item.title'))

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('admin.item.index') }}">{{ __('general.item.title') }}</a></li>
    <li class="breadcrumb-item active" aria-current="page"><span>{{ __('general.button.create') }}</span></li>
@endsection

@prepend('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrap-select/bootstrap-select.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/jquery-step/jquery.steps.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/file-upload/file-upload-with-preview.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/forms/theme-checkbox-radio.css') }}">
@endprepend

@push('styles')
    <style>
        .wizard>.content {
            background-color: transparent;
        }
    </style>
@endpush

@section('content')
    <div id="basic" class="col-lg-12 col-sm-12 col-12 layout-spacing">
        <form action="{{ route('admin.item.store') }}" method="POST" enctype="multipart/form-data" id="form">
            @csrf
            <input type="hidden" name="item_stock_status_id" value="{{ CONST_STOCK_IN_STOCK }}">
            <div class="statbox widget box box-shadow">
                <div class="widget-content widget-content-area">
                    <div id="form-wizard" class="">
                        <h3>{{ __('general.common.general_information') }}</h3>
                        <section class="layout-top-spacing mb-4 p-3">
                            <div class="form-group mb-4">
                                <label for="sName">
                                    {{ __('general.common.item_name') }}
                                    <strong class="text-danger">*</strong>
                                </label>
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror" id="sName"
                                    placeholder="{{ __('general.common.item_name') }}" value="{{ old('name') }}">
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
                                <input type="text" name="sku" class="form-control @error('sku') is-invalid @enderror"
                                    id="sSku" placeholder="Sku" value="{{ old('sku') }}">
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
                                    class="form-control @error('description') is-invalid @enderror" id="sDescription"
                                    placeholder="{{ __('general.common.description') }}" value="{{ old('description') }}">
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </section>

                        <h3>{{ __('general.common.detail_information') }}</h3>
                        <section class="layout-top-spacing mb-4 p-3">
                            <div class="header pt-4 pb-3">
                                <h4>{{ __('general.common.item_originality') }}</h4>
                            </div>
                            <div class="form-group mb-4">
                                <label for="sBrand">
                                    {{ __('general.common.brand') }}
                                    <strong class="text-danger">*</strong>
                                </label>
                                <div>
                                    <select class="selectpicker form-control @error('brand_id') is-invalid @enderror"
                                        id="sBrand" name="brand_id" data-live-search="true" data-size="5">
                                        <option selected value="">--{{ __('general.common.choose.brand') }}--
                                        </option>
                                        @foreach ($brands as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('brand_id') == $item->id ? 'selected' : '' }}>
                                                {{ $item->name }}
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
                                    <select class="selectpicker form-control @error('item_categories') is-invalid @enderror"
                                        id="sItemCategories" name="item_categories[]"
                                        title="--{{ __('general.common.category') }}--" data-live-search="true"
                                        data-actions-box="true" data-size="10" multiple>
                                        @foreach ($itemCategories as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('item_categories') && in_array($item->id, old('item_categories')) ? 'selected' : '' }}>
                                                {{ $item->name }}
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
                        </section>

                        <h3>{{ __('general.common.image') }}</h3>
                        <section class="layout-top-spacing mb-4 p-3">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="header pt-4">
                                        <h4>{{ __('general.common.thumbnail') }}</h4>
                                    </div>
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

                                <div class="col-12 col-md-6">
                                    <div class="header pt-4">
                                        <h4>{{ __('general.common.detail_images') }}</h4>
                                    </div>

                                    <div class="custom-file-container @error('detail_images') is-invalid @enderror"
                                        data-upload-id="detailImages">
                                        <label>{{ __('general.common.upload_detail_image') }} <a href="javascript:void(0)"
                                                class="custom-file-container__image-clear"
                                                title="Clear Image">x</a></label>
                                        <label class="custom-file-container__custom-file">
                                            <input type="file" name="detail_images[]" id="detailImagesInput"
                                                class="custom-file-container__custom-file__custom-file-input" multiple>
                                            <span class="custom-file-container__custom-file__custom-file-control"></span>
                                        </label>
                                        <div class="custom-file-container__image-preview"></div>
                                    </div>
                                    @error('detail_images')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </section>

                        <h3>{{ __('general.common.item_variants') }}</h3>
                        <section class="layout-top-spacing mb-4 p-3 variants">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="header pt-4 pb-3">
                                        <h4>{{ __('general.common.person_types') }}</h4>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="sPersonType">
                                            {{ __('general.common.person_type') }}
                                            <strong class="text-danger">*</strong>
                                        </label>
                                        <select
                                            class="selectpicker form-control @error('item_person_type_id') is-invalid @enderror"
                                            id="sPersonType" name="item_person_type_id" data-live-search="true"
                                            data-size="5" title="--{{ __('general.common.choose.person_type') }}--">
                                            @foreach ($personTypes as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ old('item_person_type_id') == $item->id ? 'selected' : '' }}>
                                                    {{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('item_person_type_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="header pt-4 pb-3">
                                        <h4>{{ __('general.common.size_option') }}</h4>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="sSize">
                                            {{ __('general.common.choose.size') }}
                                            <strong class="text-danger">*</strong>
                                        </label>
                                        <div class="size-options row mt-3 @error('item_sizes') is-invalid @enderror">
                                            @includeWhen(old('item_person_type_id'),
                                                'admin.item.partials.checkbox_size',
                                                ['selected' => old('item_sizes')])
                                            @if (!old('item_person_type_id'))
                                                <strong class="text-danger ml-3">
                                                    {{ __('general.common.please_choose_person_type') }}
                                                </strong>
                                            @endif
                                        </div>
                                        @error('item_sizes')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="header pt-4 pb-3">
                                        <h4>{{ __('general.common.color') }}</h4>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="sItemColors">
                                            {{ __('general.common.color') }}
                                            <strong class="text-danger">*</strong>
                                        </label>
                                        <div>
                                            <select
                                                class="selectpicker form-control @error('item_colors') is-invalid @enderror"
                                                id="sItemColors" name="item_colors[]"
                                                title="--{{ __('general.common.color') }}--" data-live-search="true"
                                                data-actions-box="true" data-size="10" multiple>
                                                @foreach ($itemColors as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ old('item_colors') && in_array($item->id, old('item_colors')) ? 'selected' : '' }}>
                                                        {{ $item->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('item_colors')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@prepend('script')
    <script src="{{ asset('plugins/bootstrap-select/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-step/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('plugins/file-upload/file-upload-with-preview.min.js') }}"></script>
    <script src="{{ asset('plugins/blockui/jquery.blockUI.min.js') }}"></script>
    <script src="{{ asset('plugins/blockui/custom-blockui.js') }}"></script>
@endprepend

@push('script')
    @include('admin.item.partials.wizard')
    <script>
        var thumbnailImageUpload = new FileUploadWithPreview('thumbnailImage');
        var detailImagesUpload = new FileUploadWithPreview('detailImages');
    </script>
@endpush
