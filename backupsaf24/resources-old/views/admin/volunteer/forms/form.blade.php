@include('flash::message')
<style type="text/css">
	.radio {
		display: -webkit-box;
	}
</style>
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
                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left"> Role </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <select class="form-control selectpicker" name="role_id" tabindex="null" required>
                                    <option value="" data-slug="">Select</option>
                                    @if($roles->count())
                                        @foreach($roles as $role)

                                           <option {{ !empty(old('role_id')) && old('role_id') == $role->id ? 'selected' : ( isset($row->role_id) && $row->role_id == $role->id ? 'selected' : '' ) }} value="{{$role->id}}" data-slug="{{$role->slug}}">{{$role->name}}</option>

                                        @endforeach
                                    @endif
                                </select>

                                @error('role')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            
                            </div>
                        </div>

                        <div class="form-group row validated">
                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Full Name </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <input type="text" name="name" value="{{ old('name') ? old('name') :( isset($row->name) ? $row->name : '') }}" class="form-control" required placeholder="Enter Full Name"/>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row validated">
                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Gender </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                               
                               	<div class="radio-inline">
							        <label class="radio">
							            <input type="radio" name="gender" value="man" {{(old('gender') == 'man' || (!isset($row->gender) || empty($row->gender)) ) ? 'checked' : ( isset($row->gender) && $row->gender == 'man' ? 'checked' : '')}} />
							            <span></span>
							            Man
							        </label>

							        <label class="radio">
							            <input type="radio" name="gender" value="woman" {{(old('gender') == 'woman' ) ? 'checked' : ( isset($row->gender) && $row->gender == 'woman' ? 'checked' : '')}} />
							            <span></span>
							            Woman
							        </label>

							        <label class="radio">
							            <input type="radio" name="gender" value="transgender" {{(old('gender') == 'transgender' ) ? 'checked' : ( isset($row->gender) && $row->gender == 'transgender' ? 'checked' : '')}} />
							            <span></span>
							            Transgender
							        </label>

							        <label class="radio">
							            <input type="radio" name="gender" value="non_binay" {{(old('gender') == 'non_binay' ) ? 'checked' : ( isset($row->gender) && $row->gender == 'non_binay' ? 'checked' : '')}} />
							            <span></span>
							            Non-binay/non-confirming
							        </label>

							        <label class="radio">
							            <input type="radio" name="gender" value="prefer_not_to_respond" {{(old('gender') == 'prefer_not_to_respond' ) ? 'checked' : ( isset($row->gender) && $row->gender == 'prefer_not_to_respond' ? 'checked' : '')}} />
							            <span></span>
							            Prefer not to say
							        </label>
							        
							    </div>

                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row validated">
                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Contact </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <input type="text" oninput="this.value=this.value.replace(/[^0-9]/, '')" name="contact" value="{{ old('contact') ? old('contact') :( isset($row->contact) ? $row->contact : '') }}" class="form-control" maxlength="15" required placeholder="Enter Contact"/>
                                @error('contact')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            
                            </div>
                        </div>

                        <div class="form-group row validated">
                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Country </label>
                        	<div class="col-lg-9 col-md-9 col-sm-12">
                                <select name="country_id" id="country_id" class="form-control form-control-lg form-control-custom selectpicker @error('country_id') is-invalid @enderror" onchange="getStates(this, 'country_id', 'state_id', 'State');">
			                    	<option value="">Select Country</option>

			                    	@if($countries->count())
		                                @foreach($countries as $country)
		                                   	<option value="{{$country->id}}" {{ old('country_id', $row->country_id ?? 0) == $country->id ? 'selected' : '' }}>{{$country->country_name}}</option>
		                                @endforeach
		                            @endif
			                    </select>
                                @error('country_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            
                            </div>
                        </div>

                        <div class="form-group row validated other-country-div">
                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Other Country </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <input type="text" name="other_country" value="{{ old('other_country') ? old('other_country') :( isset($row->other_country) ? $row->other_country : '') }}" class="form-control" placeholder="Enter other country"/>
                                @error('other_country')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            
                            </div>
                        </div>

                        <div class="form-group row validated other-country-cond" style="display: {{ old('country_id', $row->country_id ?? 0) == 2 ? 'none' : ''; }}">
                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">State </label>
                            	<div class="col-lg-9 col-md-9 col-sm-12">
                                
                                <select name="state_id" id="state_id" class="form-control form-control-lg form-control-custom selectpicker @error('state_id') is-invalid @enderror" onchange="getCities(this, 'state_id', 'city_id', 'City')">
			                    	<option value="">Select State</option>

			                    </select>

                                @error('state_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row validated other-country-cond" style="display: {{ old('country_id', $row->country_id ?? 0) == 2 ? 'none' : ''; }}">
                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">City</label>
                        	<div class="col-lg-9 col-md-9 col-sm-12">
                               	<select name="city_id" id="city_id" class="form-control form-control-lg form-control-custom selectpicker @error('city_id') is-invalid @enderror" data-live-search="true" onchange="checkOtherCity(this, 'pa-city-other')">
			                    	<option value="">Select City</option>
			                    </select>
                                @error('city_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row validated">
                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Interests </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                
                                <div class="checkbox-inline">

                                	@if($disciplines->count())
                                        @foreach($disciplines as $discipline)
                                           <label class="checkbox">
							                    <input type="checkbox" class="interest" name="interest[]" value="{{ $discipline->id }}" {{ old('interest') && @in_array($discipline->id, old('interest')) ? 'checked' : ( isset($row->interest) && @in_array($discipline->id, $row->interest) ? 'checked' : '') }} />
							                    <span></span>
							                    {{$discipline->name ?? 'N/A'}}
							                </label>
                                        @endforeach
                                    @endif

                                    <label class="checkbox">
					                    <input type="checkbox" onchange="allCheckClick(this)" />
					                    <span></span>
					                    All
					                </label>
					            </div>

                                @error('interests')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            
                            </div>
                        </div>

                        <div class="form-group row validated">
                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Email </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <input type="text" name="email" value="{{ old('email') ? old('email') : ( isset($row->email) ? $row->email : '') }}" class="form-control" required placeholder="Enter Email"/>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            
                            </div>
                        </div>

                        <div class="form-group row validated">
                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Password </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <input type="password" name="password" value="" class="form-control" {{isset($row->password) ? '':'required'}} placeholder="Enter Password" autocomplete="new-password" />
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            
                            </div>
                        </div>

                        <div class="form-group row validated">
                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Confirm Password </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <input type="password" name="password_confirm" value="" class="form-control" {{isset($row->password) ? '':'required'}} placeholder="Enter Confirm Password" autocomplete="new password_confirm" />
                                @error('password_confirm')
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
    
    function getStates(_this, source_id, target_id, title = '', selectedId = 0) {

	    var country_id = $('#'+source_id).val();

	    if(country_id == '2'){

	    	$(".other-country-cond").hide();
	    	$(".other-country-div").show();
	    	return false;

	    } else {
	    	$(".other-country-cond").show();
	    	$(".other-country-div").hide();
	    }

	    if(country_id){
		    $.ajax({
				type: "GET",
				url: "{{ url('states') }}/" + country_id,
				datatype: 'json',
				success: function (response) {
					if(response?.status){
						var options = '<option value="">Select '+title+'</option>';
						if(response.data.length) {
							for (var i = 0; i < response.data.length; i++) {

								var _selected = '';

								if(selectedId == response.data[i].id){

									_selected = 'selected';
								}

								options += '<option '+_selected+' value="'+response.data[i].id+'">'+response.data[i].state_name+'</option>';
							}

							$("#"+target_id).html(options);
							$("#"+target_id).selectpicker('refresh');

							if(selectedId){
								getCities(null, 'state_id', 'city_id', 'State', <?php echo old( 'city_id', $row->city_id ?? 0 )?>);
							}
						}
					}
				}
			});
	    } else {
	    	$("#"+target_id).html('<option value="">Select '+title+'</option>');
	    	$("#"+target_id).selectpicker('refresh');
	    }
    }

    function getCities(_this, source_id, target_id, title = '', selectedId = 0) {

	    var state_id = $('#'+source_id).val();
	    if (state_id){
		    $.ajax({
				type: "GET",
				url: "{{ url('cities') }}/" + state_id,
				datatype: 'json',
				success: function (response) {
					if(response?.status){
						var options = '<option value="">Select '+title+'</option>';
						if(response.data.length){
							for (var i = 0; i < response.data.length; i++) {

								var _selected = '';

								if(selectedId == response.data[i].id){

									_selected = 'selected';
								}

								options += '<option '+_selected+' value="'+response.data[i].id+'">'+response.data[i].city_name+'</option>';
							}

							$("#"+target_id).html(options);
							$("#"+target_id).selectpicker('refresh');
						}
					}
				}
			});
	    } else {
	    	$("#"+target_id).html('<option value="">Select '+title+'</option>');
	    	$("#"+target_id).selectpicker('refresh');
	    }
    }

    function allCheckClick(_this){
    	
    	if($(_this).is(':checked')){
    		$(".interest").prop('checked', true);
    	} else {

    		$(".interest").prop('checked', false);
    	}
    }
	
 	$(document).ready(function(){
		
		getStates(null, 'country_id', 'state_id', 'State', <?php echo old( 'state_id', $row->state_id ?? 0 )?>);
		getCities(null, 'state_id', 'city_id', 'City', <?php echo old( 'city_id', $row->city_id ?? 0 )?>);
		
	});

</script>
@endpush