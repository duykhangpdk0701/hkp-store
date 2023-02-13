<script>
    $(document).ready(function() {
        var citySelectedValue = $('#sSelectedCity').val();
        applyValueToSelect('#sCity', citySelectedValue);
    })

    $('#sCity').on('change', function() {
        let $this = $(this);
        let url = '{{ route('admin.address.city.get_districts', ':id') }}';
        let id = $this.val();
        if (!id) {
            resetSelects('#sDistrict', '{{ __('general.common.choose.choose') }}');
            return false;
        }
        url = url.replace(":id", id);

        resetSelects('#sWard', '{{ __('general.common.choose.choose') }}');
        $.ajax({
            url: url,
            method: 'GET',
            success: function(res) {
                let data = res.data;
                var districtSelectedValue = $('#sSelectedDistrict').val();
                appendOptions('#sDistrict', data, '{{ __('general.common.choose.choose') }}');
                applyValueToSelect('#sDistrict', districtSelectedValue);
            }
        })
    })

    $('#sDistrict').on('change', function() {
        let $this = $(this);
        let url = '{{ route('admin.address.district.get_wards', ':id') }}';
        let id = $this.val();
        if (!id) {
            resetSelects('#sWard', '{{ __('general.common.choose.choose') }}');
            return false;
        }
        url = url.replace(":id", id);
        $.ajax({
            url: url,
            method: 'GET',
            success: function(res) {
                let data = res.data;
                var wardSelectedValue = $('#sSelectedWard').val();
                appendOptions('#sWard', data, '{{ __('general.common.choose.choose') }}');
                applyValueToSelect('#sWard', wardSelectedValue);
            }
        })
    })
</script>
