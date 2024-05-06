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
                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Coupon Code</label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <input type="text" name="coupon_code" value="{{ old('coupon_code') ? old('coupon_code') :( isset($row->coupon_code) ? $row->coupon_code : '') }}" class="form-control" required placeholder="Enter Coupon Code"/>
                                @error('coupon_code')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row validated">
                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Coupon Amount</label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <input type="text" name="amount" value="{{ old('amount') ? old('amount') :( isset($row->amount) ? $row->amount : '') }}" class="form-control" oninput="this.value=this.value.replace(/[^0-9.]/, '')" required placeholder="Enter Amount"/>
                                @error('amount')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row validated">
                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left"> Available For </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <select class="form-control selectpicker" name="available_for" tabindex="null" required onchange="onAvailableForPress(this)">
                                    
                                    <option {{ old('available_for', $row->available_for ?? '') == 'All' ? 'selected' : '' }} value="All">All</option>
                                    <option {{ old('available_for', $row->available_for ?? '') == 'User-Specific' ? 'selected' : ''  }} value="User-Specific">User Specific</option>

                                </select>

                                @error('available_for')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            
                            </div>
                        </div>

                        <div class="form-group row validated user-spacific-container" style="display: {{ old('available_for', $row->available_for ?? 'All') == 'All' ? 'none' : '' }}">
                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left"> Users </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <select class="form-control selectpicker" name="user_ids[]" multiple tabindex="null" data-live-search="true" title="Select Users">
                                    <!-- <option value="">Select</option> -->
                                    
                                    @if($users->count())
                                        @foreach($users as $value)

                                           <option {{ @in_array($value->id, old('user_ids', $row->user_ids ?? [])) ? 'selected' : ''  }}   data-subtext="{{$value->email}}"  value="{{$value->id}}">{{$value->name}}</option>

                                        @endforeach
                                    @endif

                                </select>

                                @error('user_ids')
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
    
    function onAvailableForPress(_this){

        if($(_this).val() == 'All'){
            $(".user-spacific-container").hide();
        } else {
            $(".user-spacific-container").show();
        }
    }

</script>
@endpush