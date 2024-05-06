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
                    
                    <div class="col-6">
                        <div class="form-group row validated">
                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Name</label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <input type="text" name="name" value="{{ old('name') ? old('name') :( isset($row->name) ? $row->name : '') }}" class="form-control" placeholder="Enter Name"/>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        
                        <div class="form-group row validated">
                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Amount </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <input type="text" oninput="this.value=this.value.replace(/[^0-9.]/, '')" name="amount" value="{{ old('amount') ? old('amount') : ( isset($row->amount) ? $row->amount : '') }}" class="form-control" placeholder="Enter Amount"/>
                                @error('amount')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group row validated">
                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left"> Category </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <select class="form-control selectpicker" name="category_id" tabindex="null" data-live-search="true">
                                    <option value="">Select</option>
                                    @if($categories->count())
                                        @foreach($categories as $value)
                                           <option {{ !empty(old('category_id')) && old('category_id') == $value->id ? 'selected' : ( isset($row->category_id) && $row->category_id == $value->id ? 'selected' : '' ) }} value="{{$value->id}}">{{$value->name}}</option>
                                        @endforeach
                                    @endif
                                </select>

                                @error('category_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            
                            </div>
                        </div>
                    </div>

                    

                    <div class="col-6">

                        <div class="form-group row validated">
                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left"> Discipline </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <select class="form-control selectpicker" name="discipline_id" tabindex="null" data-live-search="true">
                                    <option value="">Select</option>
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
                    </div>

                    <div class="col-6">

                        <div class="form-group row validated">
                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left"> Curator </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <select class="form-control selectpicker" name="curator_id" tabindex="null" data-live-search="true">
                                    <option value="">Select</option>
                                    @if($curators->count())
                                        @foreach($curators as $value)

                                           <option {{ !empty(old('curator_id')) && old('curator_id') == $value->id ? 'selected' : ( isset($row->curator_id) && $row->curator_id == $value->id ? 'selected' : '' ) }} value="{{$value->id}}">{{$value->name}}</option>

                                        @endforeach
                                    @endif
                                </select>

                                @error('curator_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            
                            </div>
                        </div>
                    </div>

                    <div class="col-6">

                        <div class="form-group row validated">
                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left"> Program Tags </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <select multiple="" class="form-control selectpicker" name="program_tag_ids[]" tabindex="null" data-live-search="true">
                                    @if($program_tags->count())
                                        @foreach($program_tags as $value)

                                           <option {{ @in_array($value->id, old('program_tag_ids', $row->program_tag_ids ?? [])) ? 'selected' : ''  }} value="{{$value->id}}">{{$value->name}}</option>

                                        @endforeach
                                    @endif
                                </select>

                                @error('program_tag_ids')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-6">
                        <div class="form-group row validated">
                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left"> Sponsors </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <select multiple="" class="form-control selectpicker" name="sponsor_ids[]" tabindex="null" data-live-search="true">
                                    @if($sponsors->count())
                                        @foreach($sponsors as $value)

                                           <option {{ @in_array($value->id, old('sponsor_ids', $row->sponsor_ids ?? [])) ? 'selected' : '' }} value="{{$value->id}}">{{$value->name}}</option>

                                        @endforeach
                                    @endif
                                </select>

                                @error('sponsor_ids')
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
                    <div class="col-12">

                        <div class="form-group row validated">
                            <label class="col-form-label -col-lg-2 -col-sm-12 text-lg-left">Disclaimer </label>
                            <div class="-col-lg-10 -col-md-10 -col-sm-12">
                                <textarea class="form-control summernote-editor" name="disclaimer" id="disclaimer" placeholder="Enter Disclaimer">{!! old('disclaimer', $row->disclaimer ?? '') !!}</textarea>
                                @error('disclaimer')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">

                        <div class="form-group row validated">
                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Program Image </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                
                                <div class="image-input image-input-outline" id="program_image_1" style="background-image: url({{asset('media/users/blank.png')}})">

                                    @if(isset($row->program_image) && !empty($row->program_image))
                                        <div class="image-input-wrapper" style="background-image: url({{asset('uploads/programs/'.$row->program_image)}})"></div>
                                    @else
                                        <div class="image-input-wrapper program_image_base64"></div>
                                    @endif

                                    <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change">
                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                        <input type="file" name="program_image" accept=".png, .jpg, .jpeg"/>
                                        <input type="hidden" name="program_image_remove"/>
                                    </label>

                                    @if(isset($row->program_image) && !empty($row->program_image))
                                        <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove">
                                            <i class="ki ki-bold-close icon-xs text-muted"></i>
                                        </span>
                                    @else
                                        <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel">
                                            <i class="ki ki-bold-close icon-xs text-muted"></i>
                                        </span>
                                    @endif
                                </div>

                                @error('program_image')
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
                    <div class="col-6">
                        <div class="form-group row validated">
                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Featured</label>
                            <div class="col-3">
                                <span class="switch switch-icon">
                                    <label>
                                        <input type="checkbox" value="1" name="has_featured" {{ old('has_featured', $row->has_featured ?? 0) == 1 ? 'checked' : '' }} />
                                        <span></span>
                                    </label>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-6">
                        <div class="form-group row validated">
                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">VIP</label>
                            <div class="col-3">
                                <span class="switch switch-icon">
                                    <label>
                                        <input type="checkbox" value="1" name="has_vip" {{ old('has_vip', $row->has_vip ?? 0) == 1 ? 'checked' : '' }} />
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
                </div>

                <div class="row">
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
                </div>

                <div class="row">
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

                <div class="program-items">

                    @if(isset($programDetails) && !empty($programDetails) && $programDetails->count())
                        @foreach($programDetails as $key => $value)

                        	@php

                        	$event_date = '';
                        	if($value->event_date){

                        		$event_date = \Carbon\Carbon::createFromFormat('Y-m-d', $value->event_date)->format('d/m/Y');
                       	 	}

                        	@endphp

                            <div class="row mb-7 position-relative program-item" style="border: lightgray 1px dashed">
	                            <div class="col-6 mt-7">
	                                <div class="form-group row validated">
	                                    <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Event Date </label>
	                                    <div class="col-lg-9 col-md-9 col-sm-12">
	                                        <div class="input-group date">
	                                        	<input type="hidden" name="ids[]" value="{{ $value->id ?? '' }}" />
	                                            <input type="text" name="event_date[]" value="{{ @old('event_date', [$event_date ?? ''])[0] }}" class="form-control kt_datepicker"}} placeholder="Enter Event Date" readonly />
	                                            <div class="input-group-append">
	                                                <span class="input-group-text">
	                                                    <i class="la la-calendar-check-o"></i>
	                                                </span>
	                                            </div>
	                                        </div>
	                                        @error('event_date')
	                                            <div class="invalid-feedback">{{ $message }}</div>
	                                        @enderror

	                                    </div>
	                                </div>
	                            </div>

	                            <div class="col-6 mt-7">
	                                <div class="form-group row validated">
	                                    <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Event From Time </label>
	                                    <div class="col-lg-9 col-md-9 col-sm-12">
	                                        <div class="input-group timepicker">
	                                            <input type="text" name="from_time[]" value="{{ @old('from_time', [$value->from_time ?? ''])[0] }}" class="form-control kt_timepicker" placeholder="Enter Event From Time" readonly />
	                                            <div class="input-group-append">
	                                                <span class="input-group-text">
	                                                    <i class="la la-clock-o"></i>
	                                                </span>
	                                            </div>
	                                        </div>
	                                        @error('from_time')
	                                            <div class="invalid-feedback">{{ $message }}</div>
	                                        @enderror
	                                    </div>
	                                </div>
	                            </div>

	                            <div class="col-6">
	                                <div class="form-group row validated">
	                                    <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Event To Time </label>
	                                    <div class="col-lg-9 col-md-9 col-sm-12">
	                                        <div class="input-group timepicker">
	                                            <input type="text" name="to_time[]" value="{{ @old('to_time', [$value->to_time ?? ''])[0] }}" class="form-control kt_timepicker"  placeholder="Enter Event To Time" readonly/>
	                                            <div class="input-group-append">
	                                                <span class="input-group-text">
	                                                    <i class="la la-clock-o"></i>
	                                                </span>
	                                            </div>
	                                        </div>
	                                        @error('to_time')
	                                            <div class="invalid-feedback">{{ $message }}</div>
	                                        @enderror
	                                    </div>
	                                </div>
	                            </div>

	                            <div class="col-6">
	                                <div class="form-group row validated">
	                                    <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Total Seats <br> <small class="test-muted small text-danger">Booked Seats ({{\Helper::getBookedSeatCount($value->program_id, $value->id, 0)}})</small> </label>
	                                    <div class="col-lg-9 col-md-9 col-sm-12">
	                                        <input  type="number" min="0" max="9999999" name="total_seats[]" value="{{ @old('total_seats', [$value->total_seats ?? ''])[0] }}" class="form-control" placeholder="Enter Total Seats" />
	                                        @error('total_seats')
	                                            <div class="invalid-feedback">{{ $message }}</div>
	                                        @enderror
	                                    </div>
	                                </div>
	                            </div>

	                            <div class="col-6">
			                        <div class="form-group row validated">
			                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">VIP Seats <br> <small class="test-muted small text-danger">Booked Seats ({{\Helper::getBookedSeatCount($value->program_id, $value->id, 1)}})</small></label>
			                            <div class="col-lg-9 col-md-9 col-sm-12">
			                                <input  type="number" min="0" max="9999999" name="vip_seats[]" value="{{ @old('vip_seats', [$value->vip_seats ?? ''])[0] }}" class="form-control"  placeholder="Enter Total VIP Seats" />
			                                @error('vip_seats')
			                                    <div class="invalid-feedback">{{ $message }}</div>
			                                @enderror
			                            </div>
			                        </div>
			                    </div>

                                <div class="col-6">

                                    <div class="form-group row validated">
                                        <label class="col-form-label col-lg-3 col-sm-12 text-lg-left"> Venue </label>
                                        <div class="col-lg-9 col-md-9 col-sm-12">
                                            <select class="form-control selectpicker" name="venue_id[]" tabindex="null" data-live-search="true">
                                                <option value="">Select</option>
                                                @if($venues->count())
                                                    @foreach($venues as $value2)

                                                       <option {{ old('venue_id', [$value->venue_id])[0] == $value2->id ? 'selected' : '' }} value="{{$value2->id}}">{{$value2->title}}</option>

                                                    @endforeach
                                                @endif
                                            </select>

                                            @error('venue_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        
                                        </div>
                                    </div>
                                </div>

			                    @if($key== 0)
	                            	<a href="javascript:void(0)" onclick="addMore(this)" class="btn btn-primary btn-sm" style="position: absolute;right: 0;top: -15px; back">+</a>
	                            @else
	                            	<a href="javascript:void(0)" onclick="deleteProgramItem(this, {{$value->id}})" class="btn btn-danger btn-sm" style="position: absolute;right: 0;top: -15px; back">X</a>
	                            @endif
	                        </div>
                        @endforeach
                    @else
                        <div class="row mb-7 position-relative program-item" style="border: lightgray 1px dashed">
                            <div class="col-6 mt-7">
                                <div class="form-group row validated">
                                    <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Event Date </label>
                                    <div class="col-lg-9 col-md-9 col-sm-12">
                                        <div class="input-group date">
                                            <input type="hidden" name="ids[]" value="" />
                                            <input type="text" name="event_date[]" value="{{ @old('event_date', [$value->event_date ?? ''])[0] }}" class="form-control kt_datepicker"}} placeholder="Enter Event Date" readonly />
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="la la-calendar-check-o"></i>
                                                </span>
                                            </div>
                                        </div>
                                        @error('event_date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror

                                    </div>
                                </div>
                            </div>

                            <div class="col-6 mt-7">
                                <div class="form-group row validated">
                                    <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Event From Time </label>
                                    <div class="col-lg-9 col-md-9 col-sm-12">
                                        <div class="input-group timepicker">
                                            <input type="text" name="from_time[]" value="{{ @old('from_time', [$value->from_time ?? ''])[0] }}" class="form-control kt_timepicker" placeholder="Enter Event From Time" readonly />
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="la la-clock-o"></i>
                                                </span>
                                            </div>
                                        </div>
                                        @error('from_time')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group row validated">
                                    <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Event To Time </label>
                                    <div class="col-lg-9 col-md-9 col-sm-12">
                                        <div class="input-group timepicker">
                                            <input type="text" name="to_time[]" value="{{ @old('to_time', [$value->to_time ?? ''])[0] }}" class="form-control kt_timepicker"  placeholder="Enter Event To Time" readonly/>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="la la-clock-o"></i>
                                                </span>
                                            </div>
                                        </div>
                                        @error('to_time')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group row validated">
                                    <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Total Seats </label>
                                    <div class="col-lg-9 col-md-9 col-sm-12">
                                        <input  type="number" min="0" max="9999999" name="total_seats[]" value="{{ @old('total_seats', [$value->total_seats ?? ''])[0] }}" class="form-control" placeholder="Enter Total Seats" />
                                        @error('total_seats')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
		                        <div class="form-group row validated">
		                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">VIP Seats </label>
		                            <div class="col-lg-9 col-md-9 col-sm-12">
		                                <input  type="number" min="0" max="9999999" name="vip_seats[]" value="{{ old('vip_seats', [$value->vip_seats ?? ''])[0] }}" class="form-control"  placeholder="Enter Total VIP Seats" />
		                                @error('vip_seats')
		                                    <div class="invalid-feedback">{{ $message }}</div>
		                                @enderror
		                            </div>
		                        </div>
		                    </div>


                            <div class="col-6">

                                <div class="form-group row validated">
                                    <label class="col-form-label col-lg-3 col-sm-12 text-lg-left"> Venue </label>
                                    <div class="col-lg-9 col-md-9 col-sm-12">
                                        <select class="form-control venue_id selectpicker" name="venue_id[]" tabindex="null" data-live-search="true">
                                            <option value="">Select</option>
                                            @if($venues->count())
                                                @foreach($venues as $value)

                                                   <option {{ old('venue_id', [''])[0] == $value->id ? 'selected' : '' }} value="{{$value->id}}">{{$value->title}}</option>

                                                @endforeach
                                            @endif
                                        </select>

                                        @error('venue_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    
                                    </div>
                                </div>
                            </div>

                            <a href="javascript:void(0)" onclick="addMore(this)" class="btn btn-primary btn-sm" style="position: absolute;right: 0;top: -15px; back">+</a>
                        </div>
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
    
    var avatar4 = new KTImageInput('program_image_1');

    avatar4.on('cancel', function(imageInput) {
        swal.fire({
            title: 'Image successfully cancelled!',
            type: 'success',
            buttonsStyling: false,
            confirmButtonText: 'Okay!',
            confirmButtonClass: 'btn btn-primary font-weight-bold'
        });
    });

    avatar4.on('change', function(imageInput) {

        // swal.fire({
        //  title: 'Image successfully uploaded !',
        //  type: 'error',
        //  buttonsStyling: false,
        //  confirmButtonText: 'Okay!',
        //  confirmButtonClass: 'btn btn-primary font-weight-bold'
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

    function addMore(_this){

        var html = '\
            <div class="row mb-7 position-relative program-item" style="border: lightgray 1px dashed">\
                        <div class="col-6 mt-7">\
                            <div class="form-group row validated">\
                                <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Event Date </label>\
                                <div class="col-lg-9 col-md-9 col-sm-12">\
                                    <div class="input-group date">\
                                    	<input type="hidden" name="ids[]" value="" />\
                                        <input type="text" name="event_date[]" class="form-control kt_datepicker" placeholder="Enter Event Date" readonly />\
                                        <div class="input-group-append">\
                                            <span class="input-group-text">\
                                                <i class="la la-calendar-check-o"></i>\
                                            </span>\
                                        </div>\
                                    </div>\
                                </div>\
                            </div>\
                        </div>\
                        \
                        <div class="col-6 mt-7">\
                            <div class="form-group row validated">\
                                <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Event From Time </label>\
                                <div class="col-lg-9 col-md-9 col-sm-12">\
                                    <div class="input-group timepicker">\
                                        <input type="text" name="from_time[]" class="form-control kt_timepicker" placeholder="Enter Event From Time" readonly />\
                                        <div class="input-group-append">\
                                            <span class="input-group-text">\
                                                <i class="la la-clock-o"></i>\
                                            </span>\
                                        </div>\
                                    </div>\
                                </div>\
                            </div>\
                        </div>\
                        \
                        <div class="col-6">\
                            <div class="form-group row validated">\
                                <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Event To Time </label>\
                                <div class="col-lg-9 col-md-9 col-sm-12">\
                                    <div class="input-group timepicker">\
                                        <input type="text" name="to_time[]" class="form-control kt_timepicker" placeholder="Enter Event To Time" readonly/>\
                                        <div class="input-group-append">\
                                            <span class="input-group-text">\
                                                <i class="la la-clock-o"></i>\
                                            </span>\
                                        </div>\
                                    </div>\
                                </div>\
                            </div>\
                        </div>\
                        \
                        <div class="col-6">\
                            <div class="form-group row validated">\
                                <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Total Seats </label>\
                                <div class="col-lg-9 col-md-9 col-sm-12">\
                                    <input type="number" min="0" max="9999999" name="total_seats[]" class="form-control"  placeholder="Enter Total Seat"/>\
                                </div>\
                            </div>\
                        </div>\
                        <div class="col-6">\
	                        <div class="form-group row validated">\
	                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">VIP Seats </label>\
	                            <div class="col-lg-9 col-md-9 col-sm-12">\
	                                <input type="number" min="0" max="9999999" name="vip_seats[]" value="" class="form-control"  placeholder="Enter Total VIP Seats" />\
	                            </div>\
	                        </div>\
	                    </div>\
                        <div class="col-6">\
                            <div class="form-group row validated">\
                                <label class="col-form-label col-lg-3 col-sm-12 text-lg-left"> Venue </label>\
                                <div class="col-lg-9 col-md-9 col-sm-12">\
                                    <select class="form-control venue_id selectpicker" name="venue_id[]" tabindex="null" data-live-search="true">\
                                        <option value="">Select</option>\
                                        @if($venues->count())\
                                            @foreach($venues as $value2)\
                                               <option value="{{$value2->id}}">{{$value2->title}}</option>\
                                            @endforeach\
                                        @endif\
                                    </select>\
                                </div>\
                            </div>\
                        </div>\
                        <a href="javascript:void(0)" onclick="deleteProgramItem(this)" class="btn btn-danger btn-sm" style="position: absolute;right: 0;top: -15px; back">X</a>\
                    </div>\
        ';

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

    function deleteProgramItem(_this, id = null){

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