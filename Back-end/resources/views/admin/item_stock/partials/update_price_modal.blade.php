<div class="modal fade" id="updatePriceModal" tabindex="-1" role="dialog" aria-labelledby="updatePriceModal"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="" method="POST" id="update-price-form">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updatePriceModalLabel">{{ __('general.common.update_stock_price') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-4">
                        <label for="sOldPrice">
                            {{ __('general.common.old_price') }}
                        </label>
                        <input type="text" class="form-control" id="sOldPrice" placeholder="Old Price" readonly>
                    </div>
                    <div class="form-group mb-4">
                        <label for="sNewPrice">
                            {{ __('general.common.new_price') }}
                            <strong class="text-danger">*</strong>
                        </label>
                        <input type="text" name="price"
                            class="form-control currency-input @error('price') is-invalid @enderror" id="sNewPrice"
                            placeholder="New Price" value="{{ old('price') }}">
                        @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal">
                        <i class="flaticon-cancel-12"></i>
                        {{ __('general.button.cancel') }}
                    </button>
                    <button class="btn btn-primary" data-dismiss="modal" data-toggle="modal"
                        data-target="#verifyAccountModal">{{ __('general.button.save') }}</button>
                </div>
            </div>
        </form>
    </div>
</div>

@include('admin.layouts.partials.verify_password_modal', ['formId' => 'update-price-form'])

@push('script')
    <script>
        $('#updatePriceModal').on('show.bs.modal', function(event) {
            let button = $(event.relatedTarget);
            let currentPrice = button.data('current-price');
            let id = button.data('id');
            let modal = $(this);
            let url = "{{ route('admin.item_stock.update_price', ':id') }}";
            url = url.replace(':id', id);

            $('#update-price-form').attr('action', url);
            modal.find('#sOldPrice').val(currentPrice);
        })
    </script>
@endpush
