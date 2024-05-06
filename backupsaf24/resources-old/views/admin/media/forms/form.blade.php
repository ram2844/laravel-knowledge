@include('flash::message')

<div class="row">
    <div class="col-md-12">
        
        <div class="card card-custom gutter-b">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">{{ isset($row) && !empty($row) ? 'Edit' : 'Add' }} {{$moduleConfig['moduleTitle']}}</h3>
                </div>
            </div>
            
            <div class="card-body">
                <div class="row">
                    
                    <div class="col-9">
                        
                        <div class="form-group row validated">
                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Title</label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <input type="text" name="title" value="{{ old('title') ? old('title') :( isset($row->title) ? $row->title : '') }}" class="form-control" required placeholder="Enter title"/>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row validated">
                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Short Description </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <textarea class="form-control" name="short_description" id="short_description" placeholder="Enter Short Description" required>{{ old('short_description') ? old('short_description') : ( isset($row->short_description) ? $row->short_description : '') }}</textarea>
                                @error('short_description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            
                            </div>
                        </div>

                         <div class="form-group row validated">
                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Description </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <textarea class="form-control summernote-editor" name="description" id="description" placeholder="Enter Description" require>{{ old('description') ? old('description') : ( isset($row->description) ? $row->description : '') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            
                            </div>
                        </div>

                        <div class="form-group row validated">
                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">External link</label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <input type="text" name="external_link" value="{{ old('external_link') ? old('external_link') :( isset($row->external_link) ? $row->external_link : '') }}" class="form-control" required placeholder="Enter External Link"/>
                                @error('external_link')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row validated">
                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Featured Image </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                
                            	<div class="image-input image-input-outline" id="featured_image_1" style="background-image: url({{asset('media/users/blank.png')}})">

                            		@if(isset($row->featured_image) && !empty($row->featured_image))
										<div class="image-input-wrapper" style="background-image: url({{asset('uploads/medias/'.$row->featured_image)}})"></div>
                            		@else
                            			<div class="image-input-wrapper"></div>
                            		@endif

									<label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change">
										<i class="fa fa-pen icon-sm text-muted"></i>
										<input type="file" name="featured_image" accept=".png, .jpg, .jpeg"/>
										<input type="hidden" name="featured_image_remove"/>
									</label>

									@if(isset($row->featured_image) && !empty($row->featured_image))
										<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove">
											<i class="ki ki-bold-close icon-xs text-muted"></i>
										</span>
                            		@else
										<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel">
											<i class="ki ki-bold-close icon-xs text-muted"></i>
										</span>
                            		@endif
								</div>

                                @error('featured_image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            
                            </div>
                        </div>

                        <div class="form-group row validated">

                        	<label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Status</label>
							<div class="col-3">
								<span class="switch switch-icon">
									<label>
										<input type="checkbox" value="1" name="status" {{(old('status') == '1' || (!isset($row->status) || empty($row->status)) ) ? 'checked' : ( isset($row->status) && $row->status == '1' ? 'checked' : '')}} />
										<span></span>
									</label>
								</span>
							</div>
                        </div>
                        
                    </div>
                    
                </div>
            </div>

            <div class="card-footer">
                <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-4 text-center">
                        <button type="submit" class="btn btn-light-primary mr-2">Submit</button>
                        <a class="btn btn-primary" href="{{ route($moduleConfig['routes']['listRoute']) }}">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@push('scripts')
<script type="text/javascript">
    
    var avatar4 = new KTImageInput('featured_image_1');

	avatar4.on('cancel', function(imageInput) {
		swal.fire({
			title: 'Image successfully canceled !',
			type: 'success',
			buttonsStyling: false,
			confirmButtonText: 'Okay!',
			confirmButtonClass: 'btn btn-primary font-weight-bold'
		});
	});

	avatar4.on('change', function(imageInput) {

		// swal.fire({
		// 	title: 'Image successfully uploaded !',
		// 	type: 'error',
		// 	buttonsStyling: false,
		// 	confirmButtonText: 'Okay!',
		// 	confirmButtonClass: 'btn btn-primary font-weight-bold'
		// });
	});

	avatar4.on('remove', function(imageInput) {
		swal.fire({
			title: 'Image successfully removed !',
			type: 'error',
			buttonsStyling: false,
			confirmButtonText: 'Got it!',
			confirmButtonClass: 'btn btn-primary font-weight-bold'
		});
	});

</script>
@endpush