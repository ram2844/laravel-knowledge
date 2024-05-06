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
                    
                    <div class="col-8">
                        
                        <div class="form-group row validated">
                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-right">Title</label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <input type="text" name="title" value="{{ old('title') ? old('title') :( isset($row->title) ? $row->title : '') }}" class="form-control" required placeholder="Enter Title"/>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- <div class="form-group row validated">
                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-right">Short Description </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                            	<textarea class="form-control" name="short_description" id="short_description" placeholder="Enter Short Description" required>{{ old('short_description') ? old('short_description') : ( isset($row->short_description) ? $row->short_description : '') }}</textarea>
                                @error('short_description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            
                            </div>
                        </div> -->

                        <div class="form-group row validated">
                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-right">Description </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                            	<textarea class="form-control summernote-editor" name="description" id="description" placeholder="Enter Description" require>{{ old('description') ? old('description') : ( isset($row->description) ? $row->description : '') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            
                            </div>
                        </div>
                        
                        <div class="form-group row validated">
                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-right">Google Map URL </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <input type="text" name="google_map_url" value="{{ old('google_map_url') ? old('google_map_url') : ( isset($row->google_map_url) ? $row->google_map_url : '') }}" class="form-control" {{isset($row->google_map_url) ? '':'required'}} placeholder="Enter Google Map URL" autocomplete="new google_map_url" />
                                @error('google_map_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            
                            </div>
                        </div>

                        <div class="form-group row validated">
                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-right"> Accessibility </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <select class="form-control selectpicker" name="accessibility_ids[]" tabindex="null" multiple="">
                                    <!-- <option value="">Select</option> -->
                                    @if($accessibilities->count())
                                        @foreach($accessibilities as $value)
                                           <option {{ @in_array($value->id, old('accessibility_ids', $row->accessibility_ids ?? [])) ? 'selected' : '' }} value="{{$value->id}}">{{$value->name}}</option>
                                        @endforeach
                                    @endif
                                </select>

                                @error('accessibility_ids')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            
                            </div>
                        </div>

                        <div class="form-group row validated">
                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-right">Featured Image </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                
                            	<div class="image-input image-input-outline" id="featured_image" style="background-image: url({{asset('media/users/blank.png')}})">

                            		@if(isset($row->featured_image) && !empty($row->featured_image))
										<div class="image-input-wrapper" style="background-image: url({{asset('uploads/vanues/'.$row->featured_image)}})"></div>
                            		@else
                            			<div class="image-input-wrapper featured_image_base64"></div>
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
                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-right">Motifs Icon </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                
                            	<div class="image-input image-input-outline" id="accesebility_icon" style="background-image: url({{asset('media/users/blank.png')}})">

                            		@if(isset($row->accesebility_icon) && !empty($row->accesebility_icon))
										<div class="image-input-wrapper" style="background-image: url({{asset('uploads/vanues/'.$row->accesebility_icon)}})"></div>
                            		@else
                            			<div class="image-input-wrapper accesebility_icon_base64"></div>
                            		@endif

									<label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change">
										<i class="fa fa-pen icon-sm text-muted"></i>
										<input type="file" name="accesebility_icon" accept=".png, .jpg, .jpeg"/>
										<input type="hidden" name="accesebility_icon_remove"/>
									</label>

									@if(isset($row->accesebility_icon) && !empty($row->accesebility_icon))
										<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove">
											<i class="ki ki-bold-close icon-xs text-muted"></i>
										</span>
                            		@else
										<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel">
											<i class="ki ki-bold-close icon-xs text-muted"></i>
										</span>
                            		@endif
								</div>

                                @error('accesebility_icon')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            
                            </div>
                        </div>

                        <div class="form-group row validated">

                        	<label class="col-form-label col-lg-3 col-sm-12 text-lg-right">Status</label>
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
    
    // START featured_image
    var featured_image = new KTImageInput('featured_image');

	featured_image.on('cancel', function(imageInput) {
		swal.fire({
			title: 'Image successfully canceled !',
			type: 'success',
			buttonsStyling: false,
			confirmButtonText: 'Okay!',
			confirmButtonClass: 'btn btn-primary font-weight-bold'
		});
	});

	featured_image.on('change', function(imageInput) {

		// swal.fire({
		// 	title: 'Image successfully uploaded !',
		// 	type: 'error',
		// 	buttonsStyling: false,
		// 	confirmButtonText: 'Okay!',
		// 	confirmButtonClass: 'btn btn-primary font-weight-bold'
		// });
		
	});

	featured_image.on('remove', function(imageInput) {
		swal.fire({
			title: 'Image successfully removed !',
			type: 'error',
			buttonsStyling: false,
			confirmButtonText: 'Got it!',
			confirmButtonClass: 'btn btn-primary font-weight-bold'
		});
	});
	// END featured_image
	
	// START accesebility_icon
    var accesebility_icon = new KTImageInput('accesebility_icon');

	accesebility_icon.on('cancel', function(imageInput) {
		swal.fire({
			title: 'Image successfully canceled !',
			type: 'success',
			buttonsStyling: false,
			confirmButtonText: 'Okay!',
			confirmButtonClass: 'btn btn-primary font-weight-bold'
		});
	});

	accesebility_icon.on('change', function(imageInput) {
		
	});

	accesebility_icon.on('remove', function(imageInput) {
		swal.fire({
			title: 'Image successfully removed !',
			type: 'error',
			buttonsStyling: false,
			confirmButtonText: 'Got it!',
			confirmButtonClass: 'btn btn-primary font-weight-bold'
		});
	});
	// END accesebility_icon
	

</script>
@endpush