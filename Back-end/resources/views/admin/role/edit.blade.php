@extends('admin.layouts.app')

@section('title', __('general.role.title'))

@section('breadcrumbs')
<li class="breadcrumb-item active" aria-current="page"><span>{{ __('general.role.title') }}</span></li>
@endsection

@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/forms/theme-checkbox-radio.css') }}">
@endpush

@section('content')
<div id="basic" class="col-lg-8 col-sm-12 col-12 layout-spacing">
    <form action="{{ route('admin.role.update', $role->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="statbox widget box box-shadow">
            <div class="widget-content widget-content-area">
                <div class="layout-top-spacing mb-4">
                    <a href="{{ route('admin.role.index') }}" class="btn btn-gray">{{ __('general.button.cancel') }}</a>
                    <button type="submit" class="btn btn-primary">{{ __('general.button.update') }}</button>
                </div>
                <div class="form-group mb-4">
                    <label for="sName">Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="sName"
                        placeholder="Name" value="{{ old('name') ? old('name') : $role->name }}">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group mb-4">
                    <label for="sPermissionsPicker">Permissions</label>
                    <div class="@error('permissions') is-invalid @enderror">
                        @foreach ($permissions as $item)
                        <div class="n-chk">
                            <label class="new-control new-checkbox checkbox-primary">
                                <input type="checkbox" class="new-control-input" value="{{ $item->name }}"
                                    name="permissions[]" {{ is_array(old('permissions')) ? (in_array($item->name, old('permissions')) ? 'checked' : '') : ( $role->hasPermissionTo($item->name) ? 'checked' :'' ) }}>
                                <span class="new-control-indicator"></span>
                                {{ $item->name }}
                            </label>
                        </div>
                        @endforeach
                    </div>
                    @error('permissions')
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

@push('script')
@endpush
