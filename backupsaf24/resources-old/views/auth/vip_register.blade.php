@extends('layouts.app')

@section('content')

<section class="saf-registerpage">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <h1 class="main-title">VIP Registration Form</h1>
                <p class="sub-title">Registration is free and mandatory for Serendipity Arts Festival. </p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">

                @include('includes.common.error')
                @include('flash::message')
                
                <form class="registerfrm" action="{{ route('vip.register', request()->query()) }}" method="POST" autocomplete="on" onsubmit="return submitRegistrationForm(this)">
                    @csrf
                    <div class="form-group">
                        <label for="name">full name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}"required >

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div class="form-group">
                        <label for="man">Gender</label>
                        <div class="gndr-block">

                            <input type="radio" id="man" name="gender" value="man" class="" {{ old('gender') == 'man' ? 'checked' : '' }}>
                            <label for="man">Man</label>

                            <input type="radio" id="woman" name="gender" value="woman" class="" {{ old('gender') == 'woman' ? 'checked' : '' }}>
                            <label for="woman">Woman</label>

                            <input type="radio" id="transgender" name="gender" value="transgender" class="" {{ old('gender') == 'transgender' ? 'checked' : '' }}>
                            <label for="transgender">Transgender</label>

                            <input type="radio" id="non_binary" name="gender" value="non_binary" class="" {{ old('gender') == 'non_binary' ? 'checked' : '' }}>
                            <label for="non-binay">Non-binary/non-conforming</label>

                            <input type="radio" id="prefer_not_to_respond" name="gender" value="prefer_not_to_respond" class="" {{ old('gender') == 'prefer_not_to_respond' ? 'checked' : '' }}>
                            <label for="prefer_not_to_respond">Prefer not to say</label>

                        </div>

                        @error('gender')
                            <input type="hidden" class="@error('gender') is-invalid @enderror">
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div class="form-group">
                        <label for="country_id">country</label>

                        <select name="country_id" id="country_id" class="form-control @error('country_id') is-invalid @enderror" onchange="getStates(this)">
                            <option value="">Select</option>

                            @if($countries->count())
                                @foreach($countries as $country)
                                    <option value="{{$country->id}}" {{ old('country_id') == $country->id ? 'selected' : '' }}>{{$country->country_name}}</option>
                                @endforeach
                            @endif

                        </select>

                        @error('country_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group other-country-div" style="display: {{ old('country_id') == '2' ? '' : 'none'; }}">
                        <label for="other_country">other country</label>
                        <input type="text" class="form-control @error('other_country') is-invalid @enderror" id="other_country" name="other_country" value="{{ old('other_country') }}">
                        @error('other_country')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div class="form-group other-country-cond" style="display: {{ old('country_id') == '2' ? 'none' : ''; }}">
                        <label for="state_id">State</label>

                        <select name="state_id" id="state_id" class="form-control @error('state_id') is-invalid @enderror" onchange="getCities(this)">
                            <option value="">Select</option>

                        </select>

                        @error('state_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group other-country-cond" style="display: {{ old('country_id') == '2' ? 'none' : ''; }}">
                        <label for="city_id">City</label>

                        <select name="city_id" id="city_id" class="form-control @error('city_id') is-invalid @enderror">
                            <option value="">Select</option>

                        </select>

                        @error('city_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Interests</label>
                        <div class="chks checkbox-inline">
                            
                            @if($disciplines->count())
                                @foreach($disciplines as $discipline)
                                    @if($discipline->name != 'Special Project')
                                        <div class="chk-item">
                                            <input type="checkbox" id="interest_{{$discipline->id}}" name="interest[]" class="interest" value="{{ $discipline->id }}" {{ old('interest') && in_array($discipline->id, old('interest')) ? 'checked' : '' }}>
                                            <label for="interest_{{$discipline->id}}" >{{$discipline->name}}</label><br>
                                        </div>
                                    @endif
                                @endforeach
                            @endif

                            <div class="chk-item">
                                <input type="checkbox" onchange="allCheckClick(this)">
                                <label for="all" >All</label><br>
                            </div>
                        
                        </div>

                        @error('interest')
                            <input type="hidden" class="@error('interest') is-invalid @enderror">
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">email id</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="contact">Whatsapp number</label>

                        <div class="row">
                            <div class="col-4">
                                <select name="country_std_code" id="country_std_code" class="form-control @error('country_std_code') is-invalid @enderror" required>
                                    <option value="">Select Country Code</option>
                                    @if($countryStdCodes->count())
                                        @foreach($countryStdCodes as $value)
                                            @if(!empty($value->std_code))
                                                <option value="{{$value->std_code}}" {{ old('country_std_code', '91') == $value->std_code ? 'selected' : '' }}>+{{$value->std_code}}</option>
                                            @endif
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <div class="col-8">
                                <input type="text" class="form-control @error('contact') is-invalid @enderror" id="contact" name="contact" value="{{ old('contact') }}" required>
                            </div>

                            <!-- <div class="col-2">
                                <button type="button" class="btn btn-success" onclick="requestOtp()" title="OTP will be send to your whatapp number">GET OTP</button>
                            </div> -->
                        </div>

                        <!-- <span class="otp-message-wrapper">
                            <input type="hidden" class="is-valid">
                            <span class="valid-feedback" role="alert" id="otp-message">
                                <strong></strong>
                            </span>
                        </span> -->

                        @error('contact')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div class="form-group otp-wrapper">
                        <div class="row">
                            <div class="col-9">
                                <label for="otp">OTP</label>
                                <input type="text" class="form-control @error('otp') is-invalid @enderror" id="otp" name="otp" value="{{ old('otp') }}">
                                @error('otp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-3 text-right">
                                <label>&nbsp;</label><br>
                                <button type="button" class="btn btn-success" onclick="requestOtp()" title="An OTP will share on your E-mail and Whatsapp">GET OTP</button>
                            </div>
                        </div>

                        <span class="otp-message-wrapper">
                            <input type="hidden" class="is-valid">
                            <span class="valid-feedback" role="alert" id="otp-message">
                                <strong></strong>
                            </span>
                        </span>
                    </div>

                    <div class="form-group acpt">
                        <input type="checkbox" id="terms" name="terms" value="1" required="">
                        <label for="terms" class="cpt"> I accept and agree to all its <a href="{{url('terms-conditions')}}" class="tc-btn">Terms and Conditions</a></label><br>

                        @error('terms')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
               
                    <div class="form-group">
                        <input type="submit" value="Submit &LongRightArrow;">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
@push('scripts')
<script type="text/javascript">
    
    function allCheckClick(_this){
        
        if($(_this).is(':checked')){
            $(".interest").prop('checked', true);
        } else {

            $(".interest").prop('checked', false);
        }
    }

    function submitRegistrationForm(_this){
        
        if($("#terms").is(':checked')){
            $(_this).submit();
        }

        alert("Please accpet terms & conditions");
        return false;
    }

    function getStates(_this) {
        var country_id = $('#country_id').val();

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
                        var options = '<option value="">Select</option>';
                        if(response.data.length){
                            for (var i = 0; i < response.data.length; i++) {
                                options += '<option value="'+response.data[i].id+'">'+response.data[i].state_name+'</option>';
                            }

                            $("#state_id").html(options);
                        }
                    }
                }
            });
        } else {
            $("#state_id").html('');
        }
    }

    function getCities(_this) {

        var state_id = $('#state_id').val();
        if (state_id){
            $.ajax({
                type: "GET",
                url: "{{ url('cities') }}/" + state_id,
                datatype: 'json',
                success: function (response) {
                    if(response?.status){
                        var options = '<option value="">Select</option>';
                        if(response.data.length){
                            for (var i = 0; i < response.data.length; i++) {
                                options += '<option value="'+response.data[i].id+'">'+response.data[i].city_name+'</option>';
                            }

                            $("#city_id").html(options);
                        }
                    }
                }
            });
        } else {
            $("#city_id").html('');
        }
    }

    function requestOtp(_this) {

        var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        var country_std_code    = $('#country_std_code').val();
        var contact             = $('#contact').val();
        var email               = $('#email').val();
        var name                = $('#name').val();
        $("#otp-message strong").text('');
        // console.log("contact.length", contact.length);

        if(!email){

            $(".otp-message-wrapper").find('.is-valid').removeClass('is-valid').addClass('is-invalid');
            $(".otp-message-wrapper").find('.valid-feedback').removeClass('valid-feedback').addClass('invalid-feedback');
            $("#otp-message strong").text('Please enter email address');
            // $(".otp-wrapper").hide();
            return false;

        } else if(!email.match(validRegex)){

            $(".otp-message-wrapper").find('.is-valid').removeClass('is-valid').addClass('is-invalid');
            $(".otp-message-wrapper").find('.valid-feedback').removeClass('valid-feedback').addClass('invalid-feedback');
            $("#otp-message strong").text('Please enter valid email address');
            // $(".otp-wrapper").hide();
            return false;

        } else if(!country_std_code){

            $(".otp-message-wrapper").find('.is-valid').removeClass('is-valid').addClass('is-invalid');
            $(".otp-message-wrapper").find('.valid-feedback').removeClass('valid-feedback').addClass('invalid-feedback');
            $("#otp-message strong").text('Please select country code');
            // $(".otp-wrapper").hide();
            return false;

        } else if(!contact){

            $(".otp-message-wrapper").find('.is-valid').removeClass('is-valid').addClass('is-invalid');
            $(".otp-message-wrapper").find('.valid-feedback').removeClass('valid-feedback').addClass('invalid-feedback');
            $("#otp-message strong").text('Please enter whatsapp contact');
            // $(".otp-wrapper").hide();
            return false;

        } else if(contact.length < 8){
            
            $(".otp-message-wrapper").find('.is-valid').removeClass('is-valid').addClass('is-invalid');
            $(".otp-message-wrapper").find('.valid-feedback').removeClass('valid-feedback').addClass('invalid-feedback');
            $("#otp-message strong").text('Invalid whatsapp contact');
            // $(".otp-wrapper").hide();
            return false;

        } else {

            $("#otp-message strong").text('');
        }

        $.ajax({
            type: "POST",
            url: "{{ url('request-otp-on-whatsapp') }}",
            datatype: 'json',
            data: { email: email, name: name, country_std_code: country_std_code, contact: contact },
            beforeSend: function (){

                $(".otp-message-wrapper").find('.is-invalid').removeClass('is-invalid').addClass('is-valid');
                $(".otp-message-wrapper").find('.invalid-feedback').removeClass('invalid-feedback').addClass('valid-feedback');
                $("#otp-message strong").text('OTP Sending...');
                // $(".otp-wrapper").hide();
            },
            success: function (response) {
                if(response?.status){
                    
                    $(".otp-message-wrapper").find('.is-invalid').removeClass('is-invalid').addClass('is-valid');
                    $(".otp-message-wrapper").find('.invalid-feedback').removeClass('invalid-feedback').addClass('valid-feedback');
                    // $(".otp-wrapper").show();

                } else {
                    $(".otp-message-wrapper").find('.is-valid').removeClass('is-valid').addClass('is-invalid');
                    $(".otp-message-wrapper").find('.valid-feedback').removeClass('valid-feedback').addClass('invalid-feedback');
                    // $(".otp-wrapper").hide();
                }
                
                $("#otp-message strong").text(response?.message || 'Something went wrong!');
            }
        });
    }

</script>
@endpush