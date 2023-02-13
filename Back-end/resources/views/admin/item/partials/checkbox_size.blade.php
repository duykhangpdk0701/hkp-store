@forelse ($itemPersonType->itemSizes as $item)
    <div class="n-chk col-6 col-md-3">
        <label class="new-control new-checkbox new-checkbox-rounded checkbox-primary">
            <input name="item_sizes[]" type="checkbox" class="new-control-input" value="{{ $item->id }}"
                {{ old('item_sizes') ? (in_array($item->id, old('item_sizes')) ? 'checked' : '') : 'checked' }}>
            <span class="new-control-indicator"></span>{{ $item->value }}
        </label>
    </div>
@empty
    <strong class="text-danger ml-3">{{ __('general.common.no_size_configured') }}</strong>
@endforelse
