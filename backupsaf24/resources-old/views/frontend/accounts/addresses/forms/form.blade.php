<div class="row">
    <div class="col-md-12">
        <!--Begin::Header-->
        <div class="card-header pt-0 pb-0">
            @include('includes.common.error')
            @include('flash::message')

            <div class="card-title">
                <h3 class="card-label">{{ isset($row) && !empty($row) ? 'Edit' : 'Add' }} Address</h3>
            </div>
        </div>
        <!--end::Header-->
        <!--Begin::Body-->
        <div class="card-body">
            
            <div class="row">

                <div class="col-12">
                    <div class="form-group row validated">
                        <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Name </label>
                        <div class="col-lg-9 col-md-9 col-sm-12">
                            <input type="text" name="name" value="{{ old('name') ? old('name') :( isset($row->name) ? $row->name : '') }}" class="form-control" placeholder="Enter Name"/>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="col-12">
                    <div class="form-group row validated">
                        <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Contact </label>
                        <div class="col-lg-9 col-md-9 col-sm-9">
                            <input type="text" oninput="this.value=this.value.replace(/[^0-9]/, '')" name="contact" value="{{ old('contact') ? old('contact') :( isset($row->contact) ? $row->contact : '') }}" class="form-control"  minlength="10" maxlength="10"  placeholder="Enter Contact"/>
                            @error('contact')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="col-12">
                    <div class="form-group row validated">
                        <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Pincode </label>
                        <div class="col-lg-9 col-md-9 col-sm-12">
                            <input type="text" name="pincode" value="{{ old('pincode') ? old('pincode') : ( isset($row->pincode) ? $row->pincode : '') }}" class="form-control"  placeholder="Enter Pincode" />
                            @error('pincode')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        
                        </div>
                    </div>
                </div>
                
                <div class="col-12">
                    <div class="form-group row validated">
                        <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Landmark </label>
                        <div class="col-lg-9 col-md-9 col-sm-12">
                            <input type="text" name="landmark" value="{{ old('landmark') ? old('landmark') : ( isset($row->landmark) ? $row->landmark : '') }}" class="form-control"  placeholder="Enter Landmark" />
                            @error('landmark')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        
                        </div>
                    </div>
                </div>
            
                <div class="col-12">
                    <div class="form-group row validated">
                        <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Address (Area and Street) </label>
                        <div class="col-lg-9 col-md-9 col-sm-12">
                            <textarea class="form-control no-summernote-editor" name="address" id="address" placeholder="Enter Address" require>{{ old('address') ? old('address') : ( isset($row->address) ? $row->address : '') }}</textarea>
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group row validated">
                        <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Locality </label>
                        <div class="col-lg-9 col-md-9 col-sm-12">
                            <input type="text" name="locality" value="{{ old('locality') ? old('locality') : ( isset($row->locality) ? $row->locality : '') }}" class="form-control"  placeholder="Enter Locality" />
                            @error('locality')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
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
                </div>

                <div class="col-12 other-country-div" style="display: {{ old('country_id') == '2' ? '' : 'none'; }}">
                    <div class="form-group row validated">
                        <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Other Country </label>
                        <div class="col-lg-9 col-md-9 col-sm-12">
                            <input type="text" name="other_country" value="{{ old('other_country') ? old('other_country') : ( isset($row->other_country) ? $row->other_country : '') }}" class="form-control"  placeholder="Enter other country"/>
                            @error('other_country')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        
                        </div>
                    </div>
                </div>

                <div class="col-12 other-country-cond" style="display: {{ old('country_id', $row->country_id ?? 0) == 2 ? 'none' : ''; }}">
                    <div class="form-group row validated">
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
                </div>
                
                <div class="col-12 other-country-cond" style="display: {{ old('country_id', $row->country_id ?? 0) == 2 ? 'none' : ''; }}">
                    <div class="form-group row validated">
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
                </div>
            </div>
        </div>
        <!--end::Body-->

        <div class="card-footer">
            <div class="row">
                <div class="col-lg-4"></div>
                <div class="col-lg-4 text-center">
                    <input type="submit" class="theme-btn" value="{{ isset($row) && !empty($row) ? 'UPDATE' : 'CREATE' }} &LongRightArrow;">
                </div>
            </div>
        </div>
    </div>
</div>