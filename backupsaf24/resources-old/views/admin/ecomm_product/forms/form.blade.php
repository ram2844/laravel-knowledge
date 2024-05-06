@include('flash::message')
<style type="text/css">
    .image-input {
        margin-right: 10px;
        margin-top: 15px;
    }
    .image-input .image-input-wrapper {
        width: 85px;
        height: 85px;
    }
</style>

<div class="row">
    <div class="col-md-12">
        
        <div class="card card-custom gutter-b">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">{{ isset($row) && !empty($row) ? 'Edit' : 'Add' }} {{ $moduleConfig['moduleTitle'] }}</h3>
                </div>
            </div>
            
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group row validated">
                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Product Name</label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <input type="text" name="product_name" value="{{ old('product_name', $row->product_name ?? '') }}" class="form-control" placeholder="Enter Product Name"/>
                                @error('product_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group row validated">
                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Product SKU</label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <input type="text" name="product_sku" value="{{ old('product_sku', $row->product_sku ?? '') }}" class="form-control" placeholder="Enter Product SKU"/>
                                @error('product_sku')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group row validated">
                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Product Price </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <input type="text" oninput="this.value=this.value.replace(/[^0-9.]/, '')" name="product_price" value="{{ old('product_price', $row->product_price ?? '') }}" class="form-control" placeholder="Enter Product Price"/>
                                @error('product_price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group row validated">
                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left"> Category </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <select class="form-control selectpicker" name="category_id" tabindex="null" data-live-search="true">
                                    <option value="">Select</option>
                                    @if($ecommCategories->count())
                                        @foreach($ecommCategories as $value)
                                           <option {{ old('category_id', $row->category_id ?? 0) == $value->id ? 'selected' : '' }} value="{{$value->id}}">{{$value->name}}</option>
                                        @endforeach
                                    @endif
                                </select>

                                @error('category_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group row validated">
                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Product Main Image </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                
                                <div class="image-input image-input-outline" id="product_main_image" style="background-image: url({{asset('media/users/blank.png')}})">

                                    @if(isset($row->product_main_image) && !empty($row->product_main_image))
                                        <div class="image-input-wrapper" style="background-image: url({{asset('uploads/ecomm_products/'.$row->product_main_image)}})"></div>
                                    @else
                                        <div class="image-input-wrapper product_image_base64"></div>
                                    @endif

                                    <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change">
                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                        <input type="file" name="product_main_image" accept=".png, .jpg, .jpeg"/>
                                        <input type="hidden" name="product_image_remove"/>
                                    </label>

                                    @if(isset($row->product_main_image) && !empty($row->product_main_image))
                                        <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove">
                                            <i class="ki ki-bold-close icon-xs text-muted"></i>
                                        </span>
                                    @else
                                        <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel">
                                            <i class="ki ki-bold-close icon-xs text-muted"></i>
                                        </span>
                                    @endif
                                </div>

                                @error('product_main_image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group row validated">
                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Gallery Images </label>
                            <div class="col-lg-9 col-md-9 col-sm-12 product-gallery-images-container">
                                @php
                                $customClass = 'product-gallery-image';
                                @endphp

                                @if($ecommProductGalleries->count())
                                    @foreach($ecommProductGalleries as $glr_counter => $glrRow)

                                        @include('admin.'.$moduleConfig['viewFolder'].'.forms.gallery_image_uploader')

                                    @endforeach
                                @else

                                    @include('admin.'.$moduleConfig['viewFolder'].'.forms.gallery_image_uploader')
                                    
                                @endif

                                <div class="image-input image-input-outline cursor-pointer" style="background-image: url( {{asset('media/users/plus.png')}} );background-color: #e3e4e5;" onclick="addGallertImageUplaoderHtml(this)">
                                    <div class="image-input-wrapper"></div>
                                    <label class="" data-action="change" ></label>
                                </div>

                                @error('product_gallery_image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="form-group row validated">
                            <label class="col-form-label -col-lg-2 -col-sm-12 text-lg-left">Short Description </label>
                            <div class="-col-lg-10 -col-md-10 -col-sm-12">
                                <textarea class="form-control summernote-editor" name="short_description" id="short_description" placeholder="Enter Short Description">{!! old('short_description', $row->short_description ?? '') !!}</textarea>
                                @error('short_description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="form-group row validated">
                            <label class="col-form-label -col-lg-2 -col-sm-12 text-lg-left">Description </label>
                            <div class="-col-lg-10 -col-md-10 -col-sm-12">
                                <textarea class="form-control summernote-editor" name="description" id="description" placeholder="Enter Description">{!! old('description', $row->description ?? '') !!}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group row validated">
                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Status</label>
                            <div class="col-3">
                                <span class="switch switch-icon">
                                    <label>
                                        <input type="checkbox" value="1" name="status" {{ old('status', $row->status ?? 1) == '1' ? 'checked' : '' }} />
                                        <span></span>
                                    </label>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="form-group row validated">
                            <label class="col-form-label -col-lg-2 -col-sm-12 text-lg-left">Meta Title </label>
                            <div class="-col-lg-10 -col-md-10 -col-sm-12">
                                <input type="text" name="meta_title" value="{{ old('meta_title', $row->meta_title ?? '') }}" class="form-control" placeholder="Enter Meta Title"/>
                                @error('meta_title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            
                            </div>
                        </div>
                    </div>
                
                    <div class="col-12">
                        <div class="form-group row validated">
                            <label class="col-form-label -col-lg-2 -col-sm-12 text-lg-left">Meta Keywords </label>
                            <div class="-col-lg-10 -col-md-10 -col-sm-12">
                                <input type="text" name="meta_keywords" value="{{ old('meta_keywords', $row->meta_keywords ?? '') }}" class="form-control" placeholder="Enter Meta Keywords"/>
                                @error('meta_keywords')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            
                            </div>
                        </div>
                    </div>
                
                    <div class="col-12">

                        <div class="form-group row validated">
                            <label class="col-form-label -col-lg-2 -col-sm-12 text-lg-left">Meta Description </label>
                            <div class="-col-lg-10 -col-md-10 -col-sm-12">
                                <textarea class="form-control --summernote-editor" name="meta_description" id="meta_description" rows="5" placeholder="Enter Meta Description">{!! old('meta_description', $row->meta_description ?? '') !!}</textarea>
                                @error('meta_description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            
                            </div>
                        </div>
                    </div>
                </div>

                <div class="items">

                    @if(isset($ecommProductDetails) && !empty($ecommProductDetails) && $ecommProductDetails->count())
                        @foreach($ecommProductDetails as $_counter => $value)

                            @include('admin.'.$moduleConfig['viewFolder'].'.forms.variant')

                        @endforeach
                    @else

                        @include('admin.'.$moduleConfig['viewFolder'].'.forms.variant')
                        
                    @endif

                </div>

            </div>

            <div class="card-footer">
                <div class="row">
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4 text-center">
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a class="btn btn-light-danger" href="{{ route($moduleConfig['routes']['listRoute']) }}">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@push('scripts')
<script type="text/javascript">

    var product_main_image = new KTImageInput('product_main_image');
    product_main_image.on('cancel', function(imageInput) {
        __sweetAlert('Image successfully cancelled !', 'success');
    });

    product_main_image.on('remove', function(imageInput) {
        __sweetAlert('Image successfully removed !', 'error');
    });

    $(document).ready(function(){
        $('.product-gallery-image').each(function(){

            var id = $(this).attr('id');
            initInputFile(id);

        });
    });

    function initInputFile(id) {

        var product_gallery_images = new KTImageInput(id);

        product_gallery_images.on('change', function(imageInput) {

            $("#"+id).find('input[name="product_gallery_image_ids[]"]').val('0');
        });
        
        product_gallery_images.on('cancel', function(imageInput) {

            $("#"+id).find('input[name="product_gallery_image_ids[]"]').val('0');
            __sweetAlert('Image successfully cancelled !', 'success');
        });

        product_gallery_images.on('remove', function(imageInput) {

            $("#"+id).find('input[name="product_gallery_image_ids[]"]').val('0');
            __sweetAlert('Image successfully removed !', 'error');
        });
    }

    function addGallertImageUplaoderHtml(_this){

        var length = ($(".product-gallery-image").length ?? 0);
        var imageUploaderHtml = `
            <div class="image-input image-input-outline product-gallery-image" id="product_gallery_image_${length}" style="background-image: url({{asset('media/users/blank.png')}})">
                <div class="image-input-wrapper product_gallery_image_${length}_base64"></div>
                <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change">
                    <i class="fa fa-pen icon-sm text-muted"></i>
                    <input type="file" name="product_gallery_images[]" accept=".png, .jpg, .jpeg"/>
                    <input type="hidden" name="product_image_${length}_remove"/>
                    <input type="hidden" name="product_gallery_image_ids[]" value="0" />
                </label>
                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel">
                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                </span>
            </div>`;

        $(".product-gallery-images-container .product-gallery-image:last").after(imageUploaderHtml);
        initInputFile('product_gallery_image_'+length);
    }

    function addMore(_this){

        var html = '\
                <div class="row mb-7 position-relative program-item" style="border: lightgray 1px dashed">\
                    <div class="col-6 mt-7">\
                        <div class="form-group row validated">\
                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Size Name </label>\
                            <div class="col-lg-9 col-md-9 col-sm-12">\
                                <input type="hidden" name="ids[]" value="" />\
                                <input type="text" name="size_name[]" class="form-control" placeholder="Enter Size Name" />\
                            </div>\
                        </div>\
                    </div>\
                    <div class="col-6 mt-7">\
                        <div class="form-group row validated">\
                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Stock </label>\
                            <div class="col-lg-9 col-md-9 col-sm-12">\
                                <input type="text" name="stock[]" class="form-control" placeholder="Enter Stock" />\
                            </div>\
                        </div>\
                    </div>\
                    <a href="javascript:void(0)" onclick="deleteVariant(this)" class="btn btn-danger btn-sm" style="position: absolute;right: 0;top: -15px; back">X</a>\
                </div>';

        $(".program-item:last").after(html);
        $(".venue_id").selectpicker('refresh');

        $('.kt_datepicker').datepicker({
            todayHighlight: true,
            orientation: "bottom left",
            autoClose: true,
            format: 'dd/mm/yyyy',
        });

        $('.kt_timepicker').timepicker({
            minuteStep: 1,
            defaultTime: '',
            showSeconds: false,
            showMeridian: false,
            snapToStep: true
        });
    }

    function deleteVariant(_this, id = null){

        if(id){

            if(confirm('Are you sure')){
                $.ajax({
                    type: "GET",
                    url: "{{ url('delete-program-item') }}/" + id,
                    datatype: 'json',
                    success: function (response) {
                        if(response?.status){
                            $(_this).parents('.program-item:first').remove();
                        } else {
                            alert(response?.message);
                        }
                    }
                });
            }
        } else {
            $(_this).parents('.program-item:first').remove();
        }
    }

</script>
@endpush