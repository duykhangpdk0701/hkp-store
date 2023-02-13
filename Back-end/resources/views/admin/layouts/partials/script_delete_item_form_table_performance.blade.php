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
        let url = $this.closest('form').attr('action')
        $.ajax({
          method: 'DELETE',
          url: url,
          data: {_token: @json(csrf_token())},
          success: function(response) {
            if (response.result) {
              swal(
                '{{  __('success.confirm.delete.title') }}',
                '{{  __('success.confirm.delete.description') }}',
                'success'
              )
              c3.ajax.reload()
              Snackbar.show({
                text: response.message,
                actionTextColor: '#fff',
                customClass: 'bg-success'
              });
            }else{
              Snackbar.show({
                text: response.message,
                actionTextColor: '#fff',
                customClass: 'bg-danger'
              });
            }
          }
        })
      }
    })
  })
</script>