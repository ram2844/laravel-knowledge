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
                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left"> Meeting Person Name </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <select class="form-control selectpicker" name="name" tabindex="null" required>
                                    <option value="">Select</option>
                                    @if($meetingPersons->count())
                                        @foreach($meetingPersons as $value)
                                           <option {{ old('name', $row->name ?? '') == $value->name ? 'selected' : ''  }} value="{{$value->name}}">{{$value->name}}</option>
                                        @endforeach
                                    @endif
                                </select>

                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            
                            </div>
                        </div>

                        <div class="form-group row validated">
                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Meeting Date </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <div class="input-group date">
                                    <input type="text" name="meeting_date" value="{{ old('meeting_date', $row->meeting_date ?? '') }}" class="form-control kt_datepicker"}} placeholder="Enter Meeting Date" readonly />
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="la la-calendar-check-o"></i>
                                        </span>
                                    </div>
                                </div>
                                @error('meeting_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                            </div>
                        </div>

                        <div class="form-group row validated">
                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Meeting From Time </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <div class="input-group timepicker">
                                    <input type="text" name="meeting_from_time" value="{{ old('meeting_from_time', $row->meeting_from_time ?? '') }}" class="form-control kt_timepicker" placeholder="Enter Meeting From Time" readonly />
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="la la-clock-o"></i>
                                        </span>
                                    </div>
                                </div>
                                @error('meeting_from_time')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row validated">
                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Meeting To Time </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <div class="input-group timepicker">
                                    <input type="text" name="meeting_to_time" value="{{ old('meeting_to_time', $row->meeting_to_time ?? '') }}" class="form-control kt_timepicker" placeholder="Enter Meeting To Time" readonly />
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="la la-clock-o"></i>
                                        </span>
                                    </div>
                                </div>
                                @error('meeting_to_time')
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
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4 text-center">
                        <button type="submit" class="btn btn-primary mr-2"><i class="flaticon2-check-mark icon-nm"></i> Submit</button>
                        <a class="btn btn-light-danger" href="{{ route($moduleConfig['routes']['listRoute']) }}"><i class="flaticon2-cross icon-nm"></i> Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@push('scripts')

@endpush