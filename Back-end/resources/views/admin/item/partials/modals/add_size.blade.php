<div class="modal fade" id="addSizeModal" tabindex="-1" role="dialog" aria-labelledby="addSizeModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{ route('admin.item.add_size', $item) }}" method="POST" enctype="multipart/form-data"
            id="addDetailImage">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addColorModalLabel">{{ __('general.common.add.size') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div div class="modal-body row">
                    @foreach ($itemPersonType->itemSizes as $itemSize)
                        @if (!$item->sizes->contains($itemSize->id))
                            <div class="n-chk col-6 col-md-3">
                                <label class="new-control new-checkbox new-checkbox-rounded checkbox-primary">
                                    <input name="item_sizes[]" type="checkbox" class="new-control-input"
                                        value="{{ $itemSize->id }}">
                                    <span class="new-control-indicator"></span>{{ $itemSize->value }}
                                </label>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="modal-header">
                    <h5 class="modal-title" id="addColorModalLabel">Add color</h5>
                </div>
                <div class="modal-body row">
                    @foreach ($itemColors as $itemColor)
                        @if (!$item->colors->contains($itemColor->id))
                            <div class="n-chk col-6 col-md-3">
                                <label class="new-control new-checkbox new-checkbox-rounded checkbox-primary">
                                    <input name="item_colors[]" type="checkbox" class="new-control-input"
                                        value="{{ $itemColor->id }}">
                                    <span class="new-control-indicator"></span>{{ $itemColor->name }} -
                                    ({{ $itemColor->value }})
                                </label>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>
                        {{ __('general.button.cancel') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('general.button.add') }}</button>
                </div>
            </div>
        </form>
    </div>
</div>
