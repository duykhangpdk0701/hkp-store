@extends('admin.layouts.app')

@section('title', __('general.my_profile.title'))

@section('breadcrumbs')
    <li class="breadcrumb-item active" aria-current="page"><span>{{ __('general.my_profile.title') }}</span></li>
@endsection

@prepend('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/file-upload/file-upload-with-preview.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrap-select/bootstrap-select.min.css') }}">
@endprepend()

@section('content')
    <input type="hidden" id="sSelectedCity" value="{{ old('city_id',auth()->user()->getAddressApplied()->city_id ?? '') }}">
    <input type="hidden" id="sSelectedDistrict"
        value="{{ old('district_id',auth()->user()->getAddressApplied()->district_id ?? '') }}">
    <input type="hidden" id="sSelectedWard"
        value="{{ old('ward_id',auth()->user()->getAddressApplied()->ward_id ?? '') }}">

    <div class="col-lg-8 col-sm-12 col-12 layout-spacing">
        <form action="{{ route('admin.user.my_profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="statbox widget box box-shadow">
                <div class="widget-content widget-content-area">
                    <h5 class="mb-4">{{ __('general.common.profile') }}</h5>
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="custom-file-container @error('avatar') is-invalid @enderror"
                                data-upload-id="avatarImg">
                                <label>{{ __('general.common.upload_avatar') }} <a href="javascript:void(0)"
                                        class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                <label class="custom-file-container__custom-file">
                                    <input type="file" class="custom-file-container__custom-file__custom-file-input"
                                        accept="image/*" name="avatar">
                                    <span class="custom-file-container__custom-file__custom-file-control"></span>
                                </label>
                                <div class="custom-file-container__image-preview"></div>
                            </div>
                            @error('avatar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group mb-4 col-md-6">
                            <label for="sFirstName">{{ __('general.common.first_name') }}</label>
                            <input type="text" name="first_name"
                                class="form-control @error('first_name') is-invalid @enderror" id="sFirstName"
                                placeholder="{{ __('general.common.first_name') }}"
                                value="{{ old('first_name', auth()->user()->userProfile->first_name) }}">
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
                                placeholder="{{ __('general.common.last_name') }}"
                                value="{{ old('last_name', auth()->user()->userProfile->last_name) }}">
                            @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="sPhoneNumber">{{ __('general.common.phone_number') }}</label>
                        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                            id="sPhoneNumber" placeholder="Phone Number"
                            value="{{ old('phone', auth()->user()->userProfile->phone) }}">
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label for="sEmail">{{ __('general.common.email') }}</label>
                        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                            id="sEmail" placeholder="Email" value="{{ old('email', auth()->user()->email) }}">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="d-xl-flex flex-xl-row flex-md-column flex-sm-column p-xl-0 p-md-0 p-0">
                        <div class="form-group col-12 col-xl-4 col-md-12 col-sm-12 col-xs-12 mb-4 p-xl-0 p-0 pr-xl-2">
                            <label for="sCity">{{ __('general.common.city') }}</label>
                            <select class="selectpicker form-control @error('city_id') is-invalid @enderror" id="sCity"
                                name="city_id" data-live-search="true" data-size="5">
                                <option selected value="" disabled>-- {{ __('general.common.choose.city') }} --
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
                        <div
                            class="form-group col-12 col-xl-4 col-md-12 col-sm-12 col-xs-12 mb-4 p-xl-0 p-0 pl-xl-2 pr-xl-2">
                            <label for="sDistrict">{{ __('general.common.district') }}</label>
                            <select class="selectpicker form-control @error('district_id') is-invalid @enderror"
                                id="sDistrict" name="district_id" data-live-search="true" data-size="5">
                                <option selected value="" disabled>-- {{ __('general.common.choose.district') }} --
                                </option>
                            </select>
                            @error('district_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-12 col-xl-4 col-md-12 col-sm-12 col-xs-12 mb-4 p-xl-0 p-0 pl-xl-2">
                            <label for="sWard">{{ __('general.common.ward') }}</label>
                            <select class="selectpicker form-control @error('ward_id') is-invalid @enderror"
                                id="sWard" name="ward_id" data-live-search="true" data-size="5">
                                <option selected value="" disabled>-- {{ __('general.common.choose.ward') }} --
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
                            id="sAddress" placeholder="{{ __('general.common.address') }}"
                            value="{{ old('address',auth()->user()->getAddressApplied()->address ?? '') }}">
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="layout-top-spacing mb-4">
                        <button type="submit" class="btn btn-primary">{{ __('general.button.update') }}</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="col-lg-4 col-sm-12 col-12 layout-spacing">
        <form action="{{ route('admin.my_profile.change_password') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="statbox widget box box-shadow">
                <div class="widget-content widget-content-area">
                    <h5 class="mb-4">{{ __('general.reset_password.title') }}</h5>
                    <div class="form-group mb-4">
                        <label for="sCurrentPassword">{{ __('general.reset_password.old') }}</label>
                        <input type="password" name="current_password"
                            class="form-control @error('current_password') is-invalid @enderror" id="sCurrentPassword"
                            placeholder="Current Password">
                        @error('current_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label for="sNewPassword">{{ __('general.reset_password.new') }}</label>
                        <input type="password" name="password"
                            class="form-control @error('password') is-invalid @enderror" id="sNewPassword"
                            placeholder="New Password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label for="sPasswordConfirmation">{{ __('general.reset_password.confirm') }}</label>
                        <input type="password" name="password_confirmation"
                            class="form-control @error('password_confirmation') is-invalid @enderror"
                            id="sPasswordConfirmation" placeholder="{{ __('general.common.password_confirm') }}">
                    </div>
                    <div class="layout-top-spacing mb-4">
                        <button type="submit" class="btn btn-primary">{{ __('general.button.update') }}</button>
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
    <script>
        var avatarImgUpload = new FileUploadWithPreview('avatarImg');
        avatarImgUpload.addImagesFromPath(['{{ auth()->user()->avatar }}']);
    </script>
@endpush
