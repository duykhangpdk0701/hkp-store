@extends('admin.layouts.app')

@section('title', __('general.brand.title'))

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('admin.brand.index') }}">{{ __('general.brand.title') }}</a></li>
    <li class="breadcrumb-item active" aria-current="page"><span>{{ __('general.tooltip.show') }}</span></li>
@endsection

@section('content')
    <div id="basic" class="col-lg-8 col-sm-12 col-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-content widget-content-area">
                <div class="form-group mb-4">
                    <label for="sName">{{ __('general.common.name') }}</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                        id="sName" placeholder="{{ __('general.common.name') }}"
                        value="{{ old('name') ? old('name') : $brand->name }}" readonly>
                </div>
                <div class="form-group mb-4">
                    <label for="sSlug">Slug</label>
                    <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror"
                        id="sSlug" placeholder="Slug" value="{{ old('slug') ? old('slug') : $brand->slug }}" readonly>
                </div>
                <div class="form-group mb-4">
                    <label for="sOrder">{{ __('general.common.ordering') }}</label>
                    <input type="number" name="order" class="form-control @error('order') is-invalid @enderror"
                        id="sOrder" placeholder="{{ __('general.common.ordering') }}"
                        value="{{ old('order', $brand->order) }}" readonly>
                </div>
            </div>
        </div>
    </div>
@endsection

@prepend('script')
@endprepend

@push('script')
@endpush
