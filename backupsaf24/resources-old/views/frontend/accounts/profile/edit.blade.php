@extends('layouts.app')
<style type="text/css">

    .bootstrap-select>.dropdown-toggle.btn-light, .bootstrap-select>.dropdown-toggle.btn-secondary {
        
        border-color: #000000 !important;
    }


</style>
@section('content')
<section class="saf-dashboard--">
    <div class="container">
        <div class="row dashboard-panel">
            <div class="col-md-3">
                @include('frontend/includes/aside-customer')
            </div>

            <div class="col-md-9">
                <div class="content-area">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-bs">
                        <form action="{{ route('update.profile') }}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="id" value="{{$row->id}}">
                            {{ csrf_field() }}

                            <!--Begin::Header-->
                            <div class="card-header pt-0 pb-0">
                                @include('includes.common.error')
                                @include('flash::message')

                                <div class="card-title">
                                    <h3 class="card-label">Edit Profile</h3>
                                </div>
                            </div>
                            <!--end::Header-->
                            <!--Begin::Body-->
                            <div class="card-body">
                                
                                <div class="row">

                                    <div class="col-12">
                                        <div class="form-group row validated">
                                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Full Name </label>
                                            <div class="col-lg-9 col-md-9 col-sm-12">
                                                <input type="text" name="name" value="{{ old('name') ? old('name') :( isset($row->name) ? $row->name : '') }}" class="form-control"  placeholder="Enter Full Name"/>
                                                @error('name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group row validated">
                                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Gender </label>
                                            <div class="col-lg-9 col-md-9 col-sm-12">
                                                <div class="theme-radio-inline">
                                                    <input type="radio" id="man" name="gender" value="man" class="" {{ old('gender', $row->gender ?? '') == 'man' ? 'checked' : '' }}>
                                                    <label for="man">Man</label><br>

                                                    <input type="radio" id="woman" name="gender" value="woman" class="" {{ old('gender', $row->gender ?? '') == 'woman' ? 'checked' : '' }}>
                                                    <label for="woman">Woman</label><br>

                                                    <input type="radio" id="transgender" name="gender" value="transgender" class="" {{ old('gender', $row->gender ?? '') == 'transgender' ? 'checked' : '' }}>
                                                    <label for="transgender">Transgender</label><br>

                                                    <input type="radio" id="non_binay" name="gender" value="non_binay" class="" {{ old('gender', $row->gender ?? '') == 'non_binay' ? 'checked' : '' }}>
                                                    <label for="non_binay">Non-binay/non-confirming</label><br>
                                                    
                                                    <input type="radio" id="prefer_not_to_respond" name="gender" value="prefer_not_to_respond" class="" {{ old('gender', $row->gender ?? '') == 'prefer_not_to_respond' ? 'checked' : '' }}>
                                                    <label for="prefer_not_to_respond">Prefer not to respond</label>
                                                </div>
                                            </div>

                                            @error('gender')
                                                <input type="hidden" class="@error('gender') is-invalid @enderror">
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

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
                                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Email </label>
                                            <div class="col-lg-9 col-md-9 col-sm-12">
                                                <input type="text" name="email" value="{{ old('email') ? old('email') : ( isset($row->email) ? $row->email : '') }}" class="form-control"  placeholder="Enter Email" readonly="" />
                                                @error('email')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group row validated">
                                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Permanent Address </label>
                                            <div class="col-lg-9 col-md-9 col-sm-12">
                                                <textarea class="form-control no-summernote-editor" name="permanent_address" id="permanent_address" placeholder="Enter Permanent Address" require>{{ old('permanent_address') ? old('permanent_address') : ( isset($row->permanent_address) ? $row->permanent_address : '') }}</textarea>
                                                @error('permanent_address')
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

                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group row validated">
                                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Interests </label>
                                            <div class="col-lg-9 col-md-9 col-sm-12">
                                                <div class="theme-checkbox-inline">
                            
                                                    @if($disciplines->count())
                                                        @foreach($disciplines as $discipline)
                                                            <div class="checkbox-item">
                                                                <input type="checkbox" id="interest_{{$discipline->id}}" name="interest[]" class="interest" value="{{ $discipline->id }}" {{ @in_array($discipline->id, old('interest', ($row->interest ?? []))) ? 'checked' : '' }}>
                                                                <label for="interest_{{$discipline->id}}" >{{$discipline->name}}</label><br>
                                                            </div>
                                                        @endforeach
                                                    @endif

                                                    <div class="checkbox-item">
                                                        <input type="checkbox" onchange="allCheckClick(this)">
                                                        <label for="all" >All</label><br>
                                                    </div>
                                                
                                                </div>
                                            </div>

                                            @error('interest')
                                                <input type="hidden" class="@error('interest') is-invalid @enderror">
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="row">
                                    <div class="col-12">
                                        <div class="form-group row validated">
                                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Password </label>
                                            <div class="col-lg-9 col-md-9 col-sm-12">
                                                <input type="password" name="password" value="" class="form-control" placeholder="Enter Password" autocomplete="new-password" />
                                                @error('password')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="form-group row validated">
                                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Confirm Password </label>
                                            <div class="col-lg-9 col-md-9 col-sm-12">
                                                <input type="password" name="password_confirm" value="" class="form-control"  placeholder="Enter Confirm Password" autocomplete="new-password_confirm" />
                                                @error('password_confirm')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                            <!--end::Body-->

                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-lg-4"></div>
                                    <div class="col-lg-4 text-center">
                                        <input type="submit" class="theme-btn" value="UPDATE &LongRightArrow;">
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                    <!--end::Card-->
                </div>
            </div>

        </div>
    </div>
</section>
@endsection

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