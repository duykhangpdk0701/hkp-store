<select class="form-control item-select" id="sItem">
    <option></option>
</select>

@push('script')
    <script>
        function createItemSelect() {
            if (url.searchParams.has('item_id')) {
                let itemId = url.searchParams.get('item_id');
                let detailUrl = '{{ route('admin.item.show', ':id') }}';
                detailUrl = detailUrl.replace(':id', itemId);
                $.ajax({
                    url: detailUrl,
                    type: 'GET',
                    success: function(res) {
                        let data = res.data;
                        let newOption = new Option(name, data.id, true, true);

                        if ($('.item-select').find("option[value='" + data.id + "']").length) {
                            $('.item-select').val(data.id).trigger('change');
                        } else {
                            let newOption = new Option(data.name, data.id, true, true);
                            $('.item-select').append(newOption).trigger('change');
                        }
                    }
                })
            }

            $('.item-select').select2({
                placeholder: "{{ __('general.common.select.item') }}",
                allowClear: true,
                ajax: {
                    url: '{{ route('admin.item.index') }}',
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        let query = {
                            search: params.term,
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
                templateResult: formatItem,
                templateSelection: formatItemSelection
            });
        }

        function formatItem(data) {
            if (!data.id) {
                return data.name;
            }

            var $data = $(
                `
                    <div>
                        <img src="${data.thumbnail_url}" alt="" style="width:70px;height:70px;" />
                        ${data.name}
                    </div>
                `
            );

            return $data;
        };

        function formatItemSelection(data) {
            return data.name || data.text;
        }

        $(document).on('select2:select', '.item-select', function(e) {
            let $this = $(this);
            let data = e.params.data;

            url.searchParams.set('item_id', data.id)
            window.history.pushState({}, '', url);

            c3.ajax.reload()
        })

        $(document).on('select2:clear', '.item-select', function(e) {
            let $this = $(this);
            let data = e.params.data;

            url.searchParams.delete('item_id')
            window.history.pushState({}, '', url);

            c3.ajax.reload()
        })
    </script>
@endpush
