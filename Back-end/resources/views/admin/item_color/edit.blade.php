@extends('admin.layouts.app')

@section('title', __('general.item_color.title'))

@section('breadcrumbs')
    <li class="breadcrumb-item active" aria-current="page"><span>{{ __('general.item_color.title') }}</span></li>
@endsection

@push('styles')
    {{-- Coler picker start --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/pickr/css/classic.min.css') }}" />
    {{-- Coler picker end --}}
@endpush

@section('content')
    <div id="basic" class="col-lg-12 col-sm-12 col-12 layout-spacing">
        <form action="{{ route('admin.item_color.update', $itemColor->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="statbox widget box box-shadow">
                <div class="widget-content widget-content-area">
                    <div class="layout-top-spacing mb-4">
                        <a href="{{ route('admin.item_color.index') }}"
                            class="btn btn-gray">{{ __('general.button.cancel') }}</a>
                        <button type="submit" class="btn btn-primary">{{ __('general.button.update') }}</button>
                    </div>
                    <div class="form-group mb-4">
                        <label for="sName">{{ __('general.common.name') }}</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            id="sName" placeholder="{{ __('general.common.name') }}"
                            value="{{ old('name') ? old('name') : $itemColor->name }}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label for="sColorPicker">
                            {{ __('general.common.pick_a_color') }} :
                        </label>
                        <span class="form-control color-picker @error('value') is-invalid @enderror" id="sColorPicker">
                            {{ old('value', $itemColor->value) }}
                        </span>
                        @error('value')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <input type="hidden" name="value" placeholder="Color"
                            value="{{ old('value', $itemColor->value) }}">
                    </div>
                    <div class="form-group mb-4">
                        <label for="sOrder">{{ __('general.common.ordering') }}</label>
                        <input type="number" name="order" class="form-control @error('order') is-invalid @enderror"
                            id="sOrder" placeholder="{{ __('general.common.ordering') }}"
                            value="{{ old('order', $itemColor->order) }}">
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
    {{-- Coler picker start --}}
    <script src="{{ asset('plugins/pickr/js/pickr.min.js') }}"></script>
    {{-- Coler picker end --}}
@endprepend

@push('script')
    @include('admin.item_color.partials.color_picker')
@endpush
