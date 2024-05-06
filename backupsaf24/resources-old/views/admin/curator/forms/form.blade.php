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
                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Name</label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <input type="text" name="name" value="{{ old('name') ? old('name') :( isset($row->name) ? $row->name : '') }}" class="form-control" required placeholder="Enter Name"/>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row validated">
                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Bio </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                            	<textarea class="form-control summernote-editor" name="bio" id="bio" placeholder="Enter Bio" require>{{ old('bio') ? old('bio') : ( isset($row->bio) ? $row->bio : '') }}</textarea>
                                @error('bio')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            
                            </div>
                        </div>

                        <div class="form-group row validated">
                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left"> Discipline </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <select class="form-control selectpicker" name="discipline_id" tabindex="null" required>
                                    <option value="" data-slug="">Select</option>
                                    @if($disciplines->count())
                                        @foreach($disciplines as $value)

                                           <option {{ !empty(old('discipline_id')) && old('discipline_id') == $value->id ? 'selected' : ( isset($row->discipline_id) && $row->discipline_id == $value->id ? 'selected' : '' ) }} value="{{$value->id}}">{{$value->name}}</option>

                                        @endforeach
                                    @endif
                                </select>

                                @error('discipline_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            
                            </div>
                        </div>

                        <div class="form-group row validated">
                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Curator Image </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                
                            	<div class="image-input image-input-outline" id="curator_image_1" style="background-image: url({{asset('media/users/blank.png')}})">

                            		@if(isset($row->curator_image) && !empty($row->curator_image))
										<div class="image-input-wrapper" style="background-image: url({{asset('uploads/curators/'.$row->curator_image)}})"></div>
                            		@else
                            			<div class="image-input-wrapper"></div>
                            		@endif

									<label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change">
										<i class="fa fa-pen icon-sm text-muted"></i>
										<input type="file" name="curator_image" accept=".png, .jpg, .jpeg"/>
										<input type="hidden" name="curator_image_remove"/>
									</label>

									@if(isset($row->curator_image) && !empty($row->curator_image))
										<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove">
											<i class="ki ki-bold-close icon-xs text-muted"></i>
										</span>
                            		@else
										<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel">
											<i class="ki ki-bold-close icon-xs text-muted"></i>
										</span>
                            		@endif
								</div>

                                @error('curator_image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group row validated">
                                    <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Meta Title </label>
                                    <div class="col-lg-9 col-md-9 col-sm-12">
                                        <input type="text" name="meta_title" value="{{ old('meta_title', $row->meta_title ?? '') }}" class="form-control" placeholder="Enter Meta Title"/>
                                        @error('meta_title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group row validated">
                                    <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Meta Keywords </label>
                                    <div class="col-lg-9 col-md-9 col-sm-12">
                                        <input type="text" name="meta_keywords" value="{{ old('meta_keywords', $row->meta_keywords ?? '') }}" class="form-control" placeholder="Enter Meta Keywords"/>
                                        @error('meta_keywords')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">

                                <div class="form-group row validated">
                                    <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Meta Description </label>
                                    <div class="col-lg-9 col-md-9 col-sm-12">
                                        <textarea class="form-control --summernote-editor" name="meta_description" id="meta_description" rows="5" placeholder="Enter meta Description">{!! old('meta_description', $row->meta_description ?? '') !!}</textarea>
                                        @error('meta_description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    
                                    </div>
                                </div>
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
    
    var avatar4 = new KTImageInput('curator_image_1');

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