<script>
    $("#form-wizard").steps({
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        autoFocus: true,
        cssClass: 'pill wizard',
        startIndex: 0,
        enableAllSteps: {{ $errors->any() ? 'true' : 'false' }},
        onFinished: function(event, currentIndex) {
            let list = new DataTransfer();
            for (const e of detailImagesUpload.cachedFileArray) {
                list.items.add(e);
            }
            $('#detailImagesInput').prop("files", list.files);
            $("#form").submit();
        }
    });

    $('#sPersonType').on('changed.bs.select', function() {
        let id = this.value;
        let url = "{{ route('admin.item_person_type.show', ':id') }}";
        url = url.replace(':id', id);
        load('.variants');
        $.ajax({
            url: url,
            type: 'GET',
            success: function(data) {
                $('.size-options').html(data);
                unLoad('.variants');
                console.log(data);
            },
            error: function(error) {
                console.log(error);
            }
        })
    });
</script>
