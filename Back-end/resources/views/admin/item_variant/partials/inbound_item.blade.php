@php
    $defaultInbound = [
        [
            'price_in' => '',
            'price' => '',
            'quantity' => '',
        ],
    ];
@endphp

@foreach (old('inbound_item', $defaultInbound) as $i => $inboundItem)
    <div class="inbound-item" data-index="{{ $index ? $index : $i }}">
        <div class="form-row">
            <input type="hidden" name="inbound_item[{{ $index ? $index : $i }}][stock_status_id]"
                value="{{ CONST_STOCK_IN_STOCK }}">
            <div
                class="form-group col-12 col-md-1 d-flex align-items-center justify-content-md-center justify-content-start supplier">
                <a href="javascript:void(0)" class="remove-inbound-item">
                    <i data-feather="x"></i>
                </a>
            </div>
            <div class="form-group col-12 col-md-2 col-lg-2 price-in">
                <label for="sPriceIn{{ $index ? $index : $i }}">{{ __('general.common.price_in') }}</label>
                <input type="text" id="sPriceIn{{ $index ? $index : $i }}"
                    class="form-control currency-input @error('inbound_item.' . $i . '.price_in') is-invalid @enderror"
                    placeholder="Price In" name="inbound_item[{{ $index ? $index : $i }}][price_in]"
                    value="{{ $inboundItem['price_in'] }}">
                @error('inbound_item.' . $i . '.price_in')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group col-12 col-md-2 col-lg-2 price">
                <label for="sPrice{{ $index ? $index : $i }}">{{ __('general.common.price') }}</label>
                <input type="text" id="sPrice{{ $index ? $index : $i }}"
                    class="form-control currency-input @error('inbound_item.' . $i . '.price') is-invalid @enderror"
                    placeholder="Price" name="inbound_item[{{ $index ? $index : $i }}][price]"
                    value="{{ $inboundItem['price'] }}">
                @error('inbound_item.' . $i . '.price')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group col-12 col-md-4 col-lg-1 qty">
                <label for="sQuantity{{ $index ? $index : $i }}">{{ __('general.common.quantity') }}</label>
                <input id="sQuantity{{ $index ? $index : $i }}" type="text"
                    class="form-control @error('inbound_item.' . $i . '.quantity') is-invalid @enderror"
                    placeholder="{{ __('general.common.quantity') }}"
                    name="inbound_item[{{ $index ? $index : $i }}][quantity]" value="{{ $inboundItem['quantity'] }}">
                @error('inbound_item.' . $i . '.quantity')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <hr>
    </div>
@endforeach
