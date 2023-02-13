@extends('admin.layouts.app')

@section('title', __('general.user.title'))

@section('breadcrumbs')
    <li class="breadcrumb-item active" aria-current="page"><span>{{ __('general.user.title') }}</span></li>
@endsection

@push('styles')
    <link href="{{ asset('plugins/file-upload/file-upload-with-preview.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrap-select/bootstrap-select.min.css') }}">
@endpush

@section('content')
    <input type="hidden" id="sSelectedCity" value="{{ old('city_id') }}">
    <input type="hidden" id="sSelectedDistrict" value="{{ old('district_id') }}">
    <input type="hidden" id="sSelectedWard" value="{{ old('ward_id') }}">

    <div id="basic" class="col-lg-8 col-sm-12 col-12 layout-spacing">
        <form action="{{ route('admin.user.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="statbox widget box box-shadow">
                <div class="widget-content widget-content-area">
                    <div class="layout-top-spacing mb-4">
                        <a href="{{ route('admin.user.index') }}" class="btn btn-gray">{{ __('general.button.cancel') }}</a>
                        <button type="submit" class="btn btn-primary">{{ __('general.button.create') }}</button>
                    </div>
                    <div class="row">
                        <div class="form-group mb-4 col-md-6">
                            <label for="sFirstName">{{ __('general.common.first_name') }}</label>
                            <input type="text" name="first_name"
                                class="form-control @error('first_name') is-invalid @enderror" id="sFirstName"
                                placeholder="{{ __('general.common.first_name') }}" value="{{ old('first_name') }}">
                            @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-4 col-md-6">
                            <label for="sLastName">{{ __('general.common.last_name') }}</label>
                            <input type="text" name="last_name"
                                class="form-control @error('last_name') is-invalid @enderror" id="sLastName"
                                placeholder="{{ __('general.common.last_name') }}" value="{{ old('last_name') }}">
                            @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="sEmail">{{ __('general.common.email') }}</label>
                        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                            id="sEmail" placeholder="Email" value="{{ old('email') }}">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label for="sPassword">{{ __('general.common.password') }}</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                            id="sPassword" placeholder="{{ __('general.common.password') }}"
                            value="{{ old('password') }}">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label for="sPasswordConfirm">{{ __('general.common.password_confirm') }}</label>
                        <input type="password" name="password_confirmation" class="form-control" id="sPasswordConfirm"
                            placeholder="{{ __('general.common.password_confirm') }}"
                            value="{{ old('password_confirmation') }}">
                    </div>
                    <div class="form-group mb-4">
                        @if (auth()->user()->can(Acl::PERMISSION_ASSIGNEE))
                            <label for="sRolePicker">{{ __('general.common.user_role') }}</label>
                            <div>
                                <select class="selectpicker w-100 @error('role') is-invalid @enderror" id="sRolePicker"
                                    title="Choose role" name="role[]" multiple>
                                    @foreach ($roles as $item)
                                        <option value="{{ $item->name }}" {{ checkOldArray($item->name, 'role') }}>
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        @else
                            <input type="hidden" name="role" value="{{ Acl::ROLE_CUSTOMER }}">
                        @endif
                    </div>
                    <div class="row">
                        <div class="form-group mb-4 col-md-4">
                            <label for="sCity">{{ __('general.common.city') }}</label>
                            <select class="selectpicker form-control @error('city_id') is-invalid @enderror" id="sCity"
                                name="city_id" data-live-search="true" data-size="5">
                                <option selected value="" disabled>-- {{ __('general.common.choose.choose') }} --
                                </option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                            @error('city_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-4 col-md-4 p-md-0">
                            <label for="sDistrict">{{ __('general.common.district') }}</label>
                            <select class="selectpicker form-control @error('district_id') is-invalid @enderror"
                                id="sDistrict" name="district_id" data-live-search="true" data-size="5">
                                <option selected value="" disabled>-- {{ __('general.common.choose.choose') }} --
                                </option>
                            </select>
                            @error('district_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-4 col-md-4">
                            <label for="sWard">{{ __('general.common.ward') }}</label>
                            <select class="selectpicker form-control @error('ward_id') is-invalid @enderror"
                                id="sWard" name="ward_id" data-live-search="true" data-size="5">
                                <option selected value="" disabled>-- {{ __('general.common.choose.choose') }} --
                                </option>
                            </select>
                            @error('ward_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="sAddress">{{ __('general.common.address') }}</label>
                        <input type="text" name="address" class="form-control @error('address') is-invalid @enderror"
                            id="sSlug" placeholder="{{ __('general.common.address') }}"
                            value="{{ old('address') }}">
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label for="sPhone">{{ __('general.common.phone_number') }}</label>
                        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                            id="sPhone" placeholder="{{ __('general.common.phone_number') }}"
                            value="{{ old('phone') }}">
                        @error('phone')
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
    <script src="{{ asset('plugins/file-upload/file-upload-with-preview.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-select/bootstrap-select.min.js') }}"></script>
@endprepend

@push('script')
    @include('admin.layouts.partials.choose-address')
@endpush
