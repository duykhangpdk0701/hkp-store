<div class="modal fade" id="detailImageModal" tabindex="-1" role="dialog" aria-labelledby="detailImageModal"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{ route('admin.item.add_media', $item) }}" method="POST" enctype="multipart/form-data"
            id="addDetailImage">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailImageModalLabel">{{ __('general.common.add.detail_image') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="custom-file-container @error('detail_images') is-invalid @enderror"
                        data-upload-id="detailImages">
                        <label>{{ __('general.common.upload_detail_image') }} <a href="javascript:void(0)"
                                class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                        <label class="custom-file-container__custom-file">
                            <input type="file" name="detail_images[]" id="detailImagesInput"
                                class="custom-file-container__custom-file__custom-file-input" multiple>
                            <span class="custom-file-container__custom-file__custom-file-control"></span>
                        </label>
                        <div class="custom-file-container__image-preview"></div>
                    </div>
                    @error('detail_images')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>
                        {{ __('general.button.cancel') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('general.button.save') }}</button>
                </div>
            </div>
        </form>
    </div>
</div>
