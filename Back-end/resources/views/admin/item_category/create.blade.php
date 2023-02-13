@extends('admin.layouts.app')

@section('title', __('general.item_category.title'))

@section('breadcrumbs')
<li class="breadcrumb-item active" aria-current="page"><span>{{ __('general.item_category.title') }}</span></li>
@endsection

@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrap-select/bootstrap-select.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/forms/switches.css') }}">
@endpush

@section('content')
<div id="basic" class="col-lg-12 col-sm-12 col-12 layout-spacing">
    <form action="{{ route('admin.item_category.store') }}" method="POST">
        @csrf
        <div class="statbox widget box box-shadow">
            <div class="widget-content widget-content-area">
                <div class="layout-top-spacing mb-4">
                    <a href="{{ route('admin.item_category.index') }}" class="btn btn-gray">{{ __('general.button.cancel') }}</a>
                    <button type="submit" class="btn btn-primary">{{ __('general.button.create') }}</button>
                </div>
                @foreach (config('app.locales') as $locale)
                    <div class="form-group mb-4">
                        <label for="sName{{ $locale }}">{{ __('general.common.name') }} ({{ $locale }})</label>
                        <input type="text" name="name[{{ $locale }}]"
                            class="form-control @error('name.' . $locale) is-invalid @enderror"
                            id="sName{{ $locale }}" placeholder="{{ __('general.common.name') }}"
                            value="{{ old('name.' . $locale) }}">
                        @error('name.' . $locale)
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                @endforeach
                <div class="form-group mb-4">
                    <label for="sRolePicker">{{ __('general.common.item_category') }}</label>
                    <div>
                        <select class="selectpicker w-100 @error('parent_id') is-invalid @enderror" id="sRolePicker"
                            title="{{ __('general.common.choose.parent_category') }}" name="parent_id" data-live-search="true">
                            <option value="" selected>-- {{ __('general.common.item_category') }} --</option>
                            @foreach ($itemCategories as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('parent_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group mb-4">
                    <label for="textarea">{{ __('general.common.description') }}</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="textarea" rows="3"
                        placeholder="{{ __('general.common.description') }}"
                        name="description">{{ old('description') }}</textarea>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group mb-4">
                    <label for="sOrder">{{ __('general.common.ordering') }}</label>
                    <input type="number" name="order" class="form-control @error('order') is-invalid @enderror"
                        id="sOrder" placeholder="{{ __('general.common.ordering') }}"
                        value="{{ old('order') ? old('order') : 0 }}">
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
    $('.selectpicker').selectpicker('val', '{{ @old('parent_id') }}');
</script>
@endpush
