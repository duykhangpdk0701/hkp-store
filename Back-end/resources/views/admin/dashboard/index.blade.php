@extends('admin.layouts.app')

@section('title', __('general.dashboard.title'))

@section('breadcrumbs')
<li class="breadcrumb-item active" aria-current="page"><span>Dashboard</span></li>
@endsection

@section('content')
<div class="col-xl-12 col-lg-12 col-md-12 col-12">
    <div class="widget widget-content-area br-4">
        <div class="widget-one">
            <h6>{{ __('general.dashboard.subtitle') }}</h6>

            <p class="mb-0 mt-3">
                {{ $quote }}
            </p>
        </div>
    </div>
</div>
@endsection
