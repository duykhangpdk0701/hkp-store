@push('script')

@if (session()->has(NOTIFICATION_SUCCESS))
<script>
    Snackbar.show({
        text: '{{ session()->get(NOTIFICATION_SUCCESS) }}',
        actionTextColor: '#fff',
        customClass: 'bg-success',
        actionText: "{{ __('general.common.dismiss') }}"
    });
</script>
@endif

@if (session()->has(NOTIFICATION_ERRORS))
<script>
    Snackbar.show({
        text: '{{ session()->get(NOTIFICATION_ERRORS)->first() }}',
        actionTextColor: '#fff',
        customClass: 'bg-danger',
        actionText: "{{ __('general.common.dismiss') }}"
    });
</script>
@endif

@if (session()->has(NOTIFICATION_ERROR))
<script>
    Snackbar.show({
        text: '{{ session()->get(NOTIFICATION_ERROR) }}',
        actionTextColor: '#fff',
        customClass: 'bg-danger',
        actionText: "{{ __('general.common.dismiss') }}"
    });
</script>
@endif

@endpush
