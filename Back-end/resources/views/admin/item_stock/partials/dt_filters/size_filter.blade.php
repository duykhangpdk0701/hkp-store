<select class="form-control size-select" id="sSizeSelect">
    <option></option>
</select>

@push('script')
    <script>
        function createSizeSelect() {
            if (url.searchParams.has('size_id')) {
                let sizeId = url.searchParams.get('size_id');
                let detailUrl = '{{ route('admin.item_size.show', ':id') }}';
                detailUrl = detailUrl.replace(':id', sizeId);
                $.ajax({
                    url: detailUrl,
                    type: 'GET',
                    success: function(res) {
                        let data = res.data;
                        let newOption = new Option(name, data.id, true, true);

                        if ($('.size-select').find("option[value='" + data.id + "']").length) {
                            $('.size-select').val(data.id).trigger('change');
                        } else {
                            let newOption = new Option(data.value, data.id, true, true);
                            $('.size-select').append(newOption).trigger('change');
                        }
                    }
                })
            }

            $('.size-select').select2({
                placeholder: "{{ __('general.common.select.size') }}",
                allowClear: true,
                ajax: {
                    url: '{{ route('admin.item_size.index') }}',
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        let query = {
                            search: params.term,
                            is_paginated: true,
                            per_page: 10,
                            page: params.page || 1
                        }
                        return query;
                    },
                    processResults: function(res, params) {
                        let data = res.data;
                        params.page = params.page || 1;
                        return {
                            results: data,
                            pagination: {
                                more: params.page < res.meta.last_page
                            }
                        };
                    }
                },
                templateResult: formatSize,
                templateSelection: formatSizeSelection
            });
        }

        function formatSize(data) {
            if (!data.id) {
                return data.name;
            }

            var $data = $(
                `
                    <div>
                        ${data.value}
                    </div>
                `
            );

            return $data;
        };

        function formatSizeSelection(data) {
            return data.value || data.text;
        }

        $(document).on('select2:select', '.size-select', function(e) {
            let $this = $(this);
            let data = e.params.data;

            url.searchParams.set('size_id', data.id)
            window.history.pushState({}, '', url);

            c3.ajax.reload()
        })

        $(document).on('select2:clear', '.size-select', function(e) {
            let $this = $(this);
            let data = e.params.data;

            url.searchParams.delete('size_id')
            window.history.pushState({}, '', url);

            c3.ajax.reload()
        })
    </script>
@endpush
