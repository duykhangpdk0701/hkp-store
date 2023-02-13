<select class="form-control stock-status-select" id="sStockStatus">
    <option></option>
    @foreach ($stockStatuses as $key => $value)
        <option value="{{ $key }}">
            {{ __('general.item_stock.status')[$key]['name'] }}
        </option>
    @endforeach
</select>

@push('script')
    <script>
        function createStockStatusSelect() {
            if (url.searchParams.has('stock_status_id')) {
                let stockStatusId = url.searchParams.get('stock_status_id');
                $('.stock-status-select').val(stockStatusId).trigger('change');
            }
            $('.stock-status-select').select2({
                placeholder: "{{ __('general.common.select.stock_status') }}",
                allowClear: true
            });
        }

        $(document).on('select2:select', '.stock-status-select', function(e) {
            let data = e.params.data;

            url.searchParams.set('stock_status_id', data.id)
            window.history.pushState({}, '', url);

            c3.ajax.reload()
        })

        $(document).on('select2:clear', '.stock-status-select', function(e) {
            url.searchParams.delete('stock_status_id')
            window.history.pushState({}, '', url);

            c3.ajax.reload()
        })
    </script>
@endpush
