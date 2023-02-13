<script>
    $(document).on('click', '.delete', function(e) {
        e.preventDefault()
        let $this = $(this)
        swal({
            title: '{{ __('general.confirm.delete.title') }}',
            text: '{{ __('general.confirm.delete.description') }}',
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: '{{ __('general.button.delete') }}',
            cancelButtonText: '{{ __('general.button.cancel') }}',
            padding: '2em'
        }).then(function(result) {
            if (result.value) {
                $this.closest('form').submit();
            }
        })
    })
</script>
