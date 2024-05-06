<div class="row mb-7 position-relative program-item" style="border: lightgray 1px dashed">
    <div class="col-6 mt-7">
        <div class="form-group row validated">
            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Size Name </label>
            <div class="col-lg-9 col-md-9 col-sm-12">
                <input type="hidden" name="ids[]" value="{{ $value->id ?? '' }}" />
                <input type="text" name="size_name[]" value="{{ @old('size_name', [$value->size_name ?? ''])[0] }}" class="form-control" placeholder="Enter Size Name" />
                    
                @error('size_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

            </div>
        </div>
    </div>

    <div class="col-6 mt-7">
        <div class="form-group row validated">
            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Stock</label>
            <div class="col-lg-9 col-md-9 col-sm-12">
                    <input type="text" name="stock[]" value="{{ @old('stock', [$value->stock ?? ''])[0] }}" class="form-control" placeholder="Enter Stock" />
                @error('stock')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    @if(@$_counter > 0)
        <a href="javascript:void(0)" onclick="deleteVariant(this)" class="btn btn-danger btn-sm" style="position: absolute; right: 0; top: -15px;">X</a>
    @else
        <a href="javascript:void(0)" onclick="addMore(this)" class="btn btn-primary btn-sm" style="position: absolute; right: 0; top: -15px;">+</a>
    @endif
</div>