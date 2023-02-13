@extends('admin.layouts.app')

@section('title', __('general.item_size.title'))

@section('breadcrumbs')
    <li class="breadcrumb-item active" aria-current="page"><span>{{ __('general.item_size.title') }}</span></li>
@endsection

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrap-select/bootstrap-select.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/forms/switches.css') }}">
@endpush

@section('content')
    <div id="basic" class="col-lg-12 col-sm-12 col-12 layout-spacing">
        <form action="{{ route('admin.item_size.update', $itemSize->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="statbox widget box box-shadow">
                <div class="widget-content widget-content-area">
                    <div class="layout-top-spacing mb-4">
                        <a href="{{ route('admin.item_size.index') }}"
                            class="btn btn-gray">{{ __('general.button.cancel') }}</a>
                        <button type="submit" class="btn btn-primary">{{ __('general.button.update') }}</button>
                    </div>
                    <div class="form-group mb-4">
                        <label for="sValue">{{ __('general.common.value') }}</label>
                        <input type="text" name="value" class="form-control @error('value') is-invalid @enderror"
                            id="sValue" placeholder="{{ __('general.common.value') }}"
                            value="{{ old('value') ? old('value') : $itemSize->value }}">
                        @error('value')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label for="sItemCategory">{{ __('general.common.item_category') }}</label>
                        <div>
                            <select class="selectpicker w-100 @error('item_category_id') is-invalid @enderror"
                                id="sItemCategory" title="{{ __('general.common.choose.item_category') }}"
                                name="item_category_id" data-live-search="true">
                                @foreach ($itemCategories as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('item_category_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="sItemPersonType">{{ __('general.common.person_type') }}</label>
                        <div>
                            <select class="selectpicker w-100 @error('item_person_type_id') is-invalid @enderror"
                                id="sItemPersonType" title="{{ __('general.common.choose.item_category') }}"
                                name="item_person_type_id" data-live-search="true">
                                @foreach ($itemPersonTypes as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
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
                        <label for="sOrder">{{ __('general.common.ordering') }}</label>
                        <input type="number" name="order" class="form-control @error('order') is-invalid @enderror"
                            id="sOrder" placeholder="{{ __('general.common.ordering') }}"
                            value="{{ old('order', $itemSize->order) }}">
                        @error('order')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@prepend('script')
    <script src="{{ asset('plugins/bootstrap-select/bootstrap-select.min.js') }}"></script>
@endprepend

@push('script')
    <script>
        $('#sItemCategory').selectpicker('val',
            '{{ @old('item_category_id') ? @old('item_category_id') : $itemSize->item_category_id }}');
        $('#sItemPersonType').selectpicker('val',
            '{{ @old('item_person_type_id') ? @old('item_person_type_id') : $itemSize->item_person_type_id }}');
    </script>
@endpush
