@prepend('styles')
@endprepend

<input id="rangeCalendarFlatpickr" class="form-control flatpickr flatpickr-input active" type="text"
       placeholder="{{ __('general.order.select_date') }}">

@prepend('script')
@endprepend

@push('script')
    <script>
        function createDateRangeFiler() {
            let defaultStart = url.searchParams.get('from_date');
            let defaultEnd = url.searchParams.get('to_date');

            var f3 = flatpickr(document.getElementById('rangeCalendarFlatpickr'), {
                mode: "range",
                maxDate: "today",
                dateFormat: "Y-m-d",
                defaultDate: [defaultStart, defaultEnd],
                onChange: function(selectedDates, dateStr, instance) {
                    if (selectedDates.length == 2) {
                        let start = selectedDates[0];
                        let end = selectedDates[1];

                        url.searchParams.set('from_date', this.formatDate(start, "Y-m-d"))
                        url.searchParams.set('to_date', this.formatDate(end, "Y-m-d"))
                        window.history.pushState({}, '', url);

                        c3.ajax.reload()
                    } else {
                        url.searchParams.delete('from_date')
                        url.searchParams.delete('to_date')
                        window.history.pushState({}, '', url);

                        c3.ajax.reload()
                    }
                }
            });
        }
    </script>
@endpush
