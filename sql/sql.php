UPDATE `cities` SET `country_id` = '99' WHERE `country_id` = '1';

UPDATE `members` SET `created_by` = '1' WHERE `created_by` IS NULL;


colorjet layout 2 code 

<div class="row">
                    <div class="col-6 mt-7">
                        <div class="form-group row validated">
                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Image 1 </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <div class="image-input image-input-outline product-highlight-image-1" id="image_1_${length}" style="background-image: url({{asset('media/users/blank.png')}})">
                                    <div class="image-input-wrapper image_1_${length}_base64"></div>
                                    <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change">
                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                        <input type="file" name="images_1[]" accept=".png, .jpg, .jpeg"/>
                                        <input type="hidden" name="image_1_${length}_remove"/>
                                    </label>
                                    <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel">
                                        <i class="ki ki-bold-close icon-xs text-muted"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 mt-7">
                        <div class="form-group row validated">
                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Image 1 Alt </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <input type="text" name="image_alts_1[]" class="form-control" placeholder="Enter Image 1 Alt" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 mt-7">
                        <div class="form-group row validated">
                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Image 2 </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <div class="image-input image-input-outline product-highlight-image-2" id="image_2_${length}" style="background-image: url({{asset('media/users/blank.png')}})">
                                    <div class="image-input-wrapper image_2_${length}_base64"></div>
                                    <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change">
                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                        <input type="file" name="images_2[]" accept=".png, .jpg, .jpeg"/>
                                        <input type="hidden" name="image_2_${length}_remove"/>
                                    </label>
                                    <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel">
                                        <i class="ki ki-bold-close icon-xs text-muted"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 mt-7">
                        <div class="form-group row validated">
                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Image 2 Alt </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <input type="text" name="image_alts_2[]" class="form-control" placeholder="Enter Image 2 Alt" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 mt-7">
                        <div class="form-group row validated">
                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Image 3 </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <div class="image-input image-input-outline product-highlight-image-3" id="image_3_${length}" style="background-image: url({{asset('media/users/blank.png')}})">
                                    <div class="image-input-wrapper image_3_${length}_base64"></div>
                                    <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change">
                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                        <input type="file" name="images_3[]" accept=".png, .jpg, .jpeg"/>
                                        <input type="hidden" name="image_3_${length}_remove"/>
                                    </label>
                                    <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel">
                                        <i class="ki ki-bold-close icon-xs text-muted"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 mt-7">
                        <div class="form-group row validated">
                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Image 3 Alt </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <input type="text" name="image_alts_3[]" class="form-control" placeholder="Enter Image 3 Alt" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 mt-7">
                        <div class="form-group row validated">
                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Image 4 </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <div class="image-input image-input-outline product-highlight-image-4" id="image_4_${length}" style="background-image: url({{asset('media/users/blank.png')}})">
                                    <div class="image-input-wrapper image_4_${length}_base64"></div>
                                    <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change">
                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                        <input type="file" name="images_4[]" accept=".png, .jpg, .jpeg"/>
                                        <input type="hidden" name="image_4_${length}_remove"/>
                                    </label>
                                    <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel">
                                        <i class="ki ki-bold-close icon-xs text-muted"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 mt-7">
                        <div class="form-group row validated">
                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Image 4 Alt </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <input type="text" name="image_alts_4[]" class="form-control" placeholder="Enter Image 4 Alt" />
                            </div>
                        </div>
                    </div>

<!-- frontend product single  -->

<!-- @elseif($row->product_highlights_layout == 3)

@include('includes.common.product_highlights_layout_3') -->


<!-- frontend layout 2  -->

<!-- <div class="col-md-12">
    <div class="single-item">
        <div class="item-icon-image">
            
        </div>
        <div class="item-content">
            <div class="highlight-image-grid">
                <div class="row">

                    @if($value->image_1)
                        <div class="col-md-3">
                            <img src="{{asset('uploads/products/product_highlights/'.$value->image_1)}}" alt="{{ $value->image_alt_1 }}" width="100%">
                        </div>
                    @endif

                    @if($value->image_2)
                        <div class="col-md-3">
                            <img src="{{asset('uploads/products/product_highlights/'.$value->image_2)}}" alt="{{ $value->image_alt_2 }}" width="100%">
                        </div>
                    @endif

                    @if($value->image_3)
                        <div class="col-md-3">
                            <img src="{{asset('uploads/products/product_highlights/'.$value->image_3)}}" alt="{{ $value->image_alt_3 }}" width="100%">
                        </div>
                    @endif

                    @if($value->image_4)
                        <div class="col-md-3">
                            <img src="{{asset('uploads/products/product_highlights/'.$value->image_4)}}" alt="{{ $value->image_alt_4 }}" width="100%">
                        </div>
                    @endif
                </div>
            </div>
        </div>
        
    </div>
</div> -->


ALTER TABLE `queries` CHANGE `site_type_id` `product` VARCHAR(255) NULL DEFAULT NULL;