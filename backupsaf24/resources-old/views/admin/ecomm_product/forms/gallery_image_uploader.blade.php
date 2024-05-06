<div class="image-input image-input-outline {{$customClass}}" id="product_gallery_image_{{$glr_counter ?? '0'}}" style="background-image: url({{asset('media/users/blank.png')}})">

    @if(isset($glrRow->image) && !empty($glrRow->image))
        <div class="image-input-wrapper" style="background-image: url({{asset('uploads/ecomm_products/'.$glrRow->image)}})"></div>
    @else
        <div class="image-input-wrapper product_gallery_image_{{$glr_counter ?? '0'}}_base64"></div>
    @endif

    @if(isset($glrRow->image) && !empty($glrRow->image))
        <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change">
            <i class="fa fa-pen icon-sm text-muted"></i>
            <input type="file" name="product_gallery_images[]" accept=".png, .jpg, .jpeg" />
            <input type="hidden" name="product_image_{{$glr_counter ?? '0'}}_remove"/>
            <input type="hidden" name="product_gallery_image_ids[]" value="{{$glrRow->id ?? 0}}" />
        </label>
    @else
        <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change">
            <i class="fa fa-pen icon-sm text-muted"></i>
            <input type="file" name="product_gallery_images[]" accept=".png, .jpg, .jpeg" />
            <input type="hidden" name="product_image_{{$glr_counter ?? '0'}}_remove"/>
            <input type="hidden" name="product_gallery_image_ids[]" value="{{$glrRow->id ?? 0}}" />
        </label>
    @endif

    @if(isset($glrRow->image) && !empty($glrRow->image))
        <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove">
            <i class="ki ki-bold-close icon-xs text-muted"></i>
        </span>
    @else
        <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel">
            <i class="ki ki-bold-close icon-xs text-muted"></i>
        </span>
    @endif
</div>