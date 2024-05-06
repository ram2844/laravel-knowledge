@extends('layouts.app')
@section('content')

<section class="saf-volunteerpage">
    <div class="container">
        <div class="row pb-15">
            <div class="col-md-12">

                @include('flash::message')

                <h1 class="main-title">Apply as a Volunteer</h1>
                <!-- <p class="sub-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt consectetur adipiscing.</p> -->
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="row">
                <div class="col-md-6">
                <div class="volunteer-image">
                    <img src="{{ asset('/image/Volunteer.jpeg') }}" alt="">
                    <!-- <img src="{{ asset('/image/volunteer-image.jpg') }}" alt=""> -->
                </div>
            </div>
            <div class="col-md-6">
                <div class="volunteer-content">
                    <h3 class="title">Who can volunteer?</h3>
                    <ul>
                        <li>We’re looking for enthusiastic, hardworking, and dedicated applicants.</li>
                        <li>You must be 18+ years as of 1st December 2023.</li>
                        <li>You must have double vaccination for Covid.</li>
                        <li>Knowledge or interest in the arts is preferred, but not mandatory.</li>
                        <li>Knowing multiple languages is a bonus. </li>
                        <li>You must share an updated CV.</li>
                        <li>You must have a PAN card.</li>
                    </ul>
                    <!-- <p class="description">Anyone who is 18+ years as on 1st December 2023. Anyone with a knowledge or an interest in the arts is preferred, but this is not mandatory. Anyone who is double vaccinated. Enthusiastic, hardworking, and dedicated applicants. Knowing multiple languages is a bonus. Anyone with an updated CV and a PAN card</p> -->
                </div>

                <!-- <div class="volunteer-content">
                    <h3 class="title">The perks of being a <span>serendipity volunteer</span></h3>
                    <ul>
                        <li>Learn about varied events and projects across the arts</li>
                        <li>Build your communication skills</li>
                        <li>Build your knowledge of how to handle and talk about art, backstage and production work</li>
                        <li>Learn to work with a team</li>
                        <li>Be a part of the Serendipity family</li>
                        <li>Explore Panjim and other parts of Goa</li>
                    </ul>
                </div> -->
            </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container pt-10 pb-10">
        <div class="row">
            <div class="col-md-4">
                <div class="tiny-card">
                    <img src="{{ asset('/image/INCENTIVES.jpg')}}" alt="">
                    <div class="volunteer_tinycontent">
                    <h3 class="title">
                        incentives
                    </h3>
                    <div class="desg">
                        <ul>
                            <li>Volunteers will be given Rs. 1000 per diem for expenses along with evening tea, snacks & dinner (optional).</li>
                            <li>Volunteers will receive a certificate at the end of the festival commending their efforts.</li>
                            <li>Please note that travel and accommodation will not be provided by Serendipity Arts.</li>
                        </ul>
                    </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                 <div class="tiny-card">
                    <img src="{{ asset('/image/PROCESS.jpg')}}" alt="">
                    <div class="volunteer_tinycontent">
                    <h3 class="title">
                        process
                    </h3>
                    <div class="desg">
                        <ul>
                            <li>Candidates willing to volunteer at Serendipity Arts Festival from December are required to register on the website.</li>
                            <li>The Serendipity team will Interview the shortlisted candidates. These interviews are necessary because they provide a dynamic platform for assessing candidates beyond their resumes. Through interviews, we will gauge a candidate's qualifications, interpersonal skills, problem-solving abilities, and overall fit. The face-to-face interactions will enable a comprehensive evaluation that goes beyond what can be conveyed on paper, helping us make informed decisions about hiring.</li>
                            <li>Shortlisted candidates will be informed about their selection over email with details about their reporting and deployment at the Festival.</li>
                            <li>All selected candidates will undergo induction & orientation training before the Festival. A POSH (Prevention of Sexual Harassments at Workplace) training will also be imparted to all the volunteers before they hit the ground.</li>
                            <li>Following the induction, volunteers will see their location and meet their venue manager for further duties.</li>
                            <li>Everyday attendance will be marked at the venue of deployment by the supervisor/manager. The volunteer will be eligible for Per Diem only for the days they are marked present. The volunteer can inform their supervisor if they would like to eat dinner a day in advance, as fulfilling requests on the same day will not be possible.</li>
                        </ul>
                    </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
            <div class="tiny-card">
                    <img src="{{ asset('/image/DEADLINES.jpg')}}" alt="">
                    <div class="volunteer_tinycontent">
                    <h3 class="title">
                        deadlines
                    </h3>
                    <div class="desg">
                        <ul>
                            <li>Candidates wiling to volunteer at Serendipity Arts Festival 2023 are required to register on the website with all their details by 15th October.</li>
                            <li>Shortlisted candidates will be interviewed over call and in-person by the Serendipity team by 31st October.</li>
                            <li>Candidates willing to travel to Goa for volunteering will need to share their travel confirmation details with the SAF team by 15th November.</li>
                            <li>All final candidates will be informed by email on 20th November.</li>
                        </ul>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <h2 class="formtitle">Volunteer Application Form</h2>

            </div>

            <div class="col-md-6">

                @include('includes.common.error')
                <form class="volunteerfrm" action="{{ route('apply.as.a.volunteer.create') }}" method="POST" enctype="multipart/form-data" style="width: 100%">

                    @csrf()

                    <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="fname">first name</label>
                        <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="fname" name="first_name" value="{{ old('first_name') }}">

                        @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div></div>

                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="lname">last name</label>
                        <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="lname" name="last_name" value="{{ old('last_name') }}">

                        @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div></div></div>

                    <div class="form-group">
                        <label for="man">Gender</label>
                        <div class="gndr-block">

                            <input type="radio" id="man" name="gender" value="man" class="" {{ old('gender') == 'man' ? 'checked' : '' }}>
                            <label for="man">Man</label><br>

                            <input type="radio" id="woman" name="gender" value="woman" class="" {{ old('gender') == 'woman' ? 'checked' : '' }}>
                            <label for="woman">Woman</label><br>

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

                    <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">email id</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div></div>
                    
                    <div class="col-md-6">
                    <div class="row">
                        <label for="dob">date of birth</label>
                        <div class="col-md-4">
                            <div class="form-group">
                                <select name="dob_date" id="dob_date" class="form-control @error('dob_date') is-invalid @enderror">
                                    <option value="">DD</option>
                                    <option {{ old('dob_date') == '01' ? 'selected' : '' }} value="01">1</option>
                                    <option {{ old('dob_date') == '02' ? 'selected' : '' }} value="02">2</option>
                                    <option {{ old('dob_date') == '03' ? 'selected' : '' }} value="03">3</option>
                                    <option {{ old('dob_date') == '04' ? 'selected' : '' }} value="04">4</option>
                                    <option {{ old('dob_date') == '05' ? 'selected' : '' }} value="05">5</option>
                                    <option {{ old('dob_date') == '06' ? 'selected' : '' }} value="06">6</option>
                                    <option {{ old('dob_date') == '07' ? 'selected' : '' }} value="07">7</option>
                                    <option {{ old('dob_date') == '08' ? 'selected' : '' }} value="08">8</option>
                                    <option {{ old('dob_date') == '09' ? 'selected' : '' }} value="09">9</option>
                                    <option {{ old('dob_date') == '10' ? 'selected' : '' }} value="10">10</option>
                                    <option {{ old('dob_date') == '11' ? 'selected' : '' }} value="11">11</option>
                                    <option {{ old('dob_date') == '12' ? 'selected' : '' }} value="12">12</option>
                                    <option {{ old('dob_date') == '13' ? 'selected' : '' }} value="13">13</option>
                                    <option {{ old('dob_date') == '14' ? 'selected' : '' }} value="14">14</option>
                                    <option {{ old('dob_date') == '15' ? 'selected' : '' }} value="15">15</option>
                                    <option {{ old('dob_date') == '16' ? 'selected' : '' }} value="16">16</option>
                                    <option {{ old('dob_date') == '17' ? 'selected' : '' }} value="17">17</option>
                                    <option {{ old('dob_date') == '18' ? 'selected' : '' }} value="18">18</option>
                                    <option {{ old('dob_date') == '19' ? 'selected' : '' }} value="19">19</option>
                                    <option {{ old('dob_date') == '20' ? 'selected' : '' }} value="20">20</option>
                                    <option {{ old('dob_date') == '21' ? 'selected' : '' }} value="21">21</option>
                                    <option {{ old('dob_date') == '22' ? 'selected' : '' }} value="22">22</option>
                                    <option {{ old('dob_date') == '23' ? 'selected' : '' }} value="23">23</option>
                                    <option {{ old('dob_date') == '24' ? 'selected' : '' }} value="24">24</option>
                                    <option {{ old('dob_date') == '25' ? 'selected' : '' }} value="25">25</option>
                                    <option {{ old('dob_date') == '26' ? 'selected' : '' }} value="26">26</option>
                                    <option {{ old('dob_date') == '27' ? 'selected' : '' }} value="27">27</option>
                                    <option {{ old('dob_date') == '28' ? 'selected' : '' }} value="28">28</option>
                                    <option {{ old('dob_date') == '29' ? 'selected' : '' }} value="29">29</option>
                                    <option {{ old('dob_date') == '30' ? 'selected' : '' }} value="30">30</option>
                                    <option {{ old('dob_date') == '31' ? 'selected' : '' }} value="31">31</option>
                                </select>

                                <!-- <input type="number" class="form-control @error('dobdate') is-invalid @enderror" id="dobdate" name="dobdate" value="{{ old('dobdate') }}" min="1" max="31" placeholder="DD">
                                 -->
                                @error('dob_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">

                            <select name="dob_month" id="dob_month" class="form-control @error('dob_month') is-invalid @enderror">
                                <option value="">MMM</option>
                                <option {{ old('dob_month') == '01' ? 'selected' : '' }} value="01">Jan</option>
                                <option {{ old('dob_month') == '02' ? 'selected' : '' }} value="02">Feb</option>
                                <option {{ old('dob_month') == '03' ? 'selected' : '' }} value="03">Mar</option>
                                <option {{ old('dob_month') == '04' ? 'selected' : '' }} value="04">Apr</option>
                                <option {{ old('dob_month') == '05' ? 'selected' : '' }} value="05">May</option>
                                <option {{ old('dob_month') == '06' ? 'selected' : '' }} value="06">Jun</option>
                                <option {{ old('dob_month') == '07' ? 'selected' : '' }} value="07">Jul</option>
                                <option {{ old('dob_month') == '08' ? 'selected' : '' }} value="08">Aug</option>
                                <option {{ old('dob_month') == '09' ? 'selected' : '' }} value="09">Sep</option>
                                <option {{ old('dob_month') == '10' ? 'selected' : '' }} value="10">Oct</option>
                                <option {{ old('dob_month') == '11' ? 'selected' : '' }} value="11">Nov</option>
                                <option {{ old('dob_month') == '12' ? 'selected' : '' }} value="12">Dec</option>
                            </select>
                                <!-- <input type="number" class="form-control @error('dobmonth') is-invalid @enderror" id="dobmonth" name="dobmonth" value="{{ old('dobmonth') }}" min="1" max="12" placeholder="MM">
                                 -->
                                @error('dob_month')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                            <select name="dob_year" id="dob_year" class="form-control @error('dob_year') is-invalid @enderror">
                                <option value="">YYYY</option>
                                <option {{ old('dob_year') == '2005' ? 'selected' : '' }} value="2005">2005</option>
                                <option {{ old('dob_year') == '2004' ? 'selected' : '' }} value="2004">2004</option>
                                <option {{ old('dob_year') == '2003' ? 'selected' : '' }} value="2003">2003</option>
                                <option {{ old('dob_year') == '2002' ? 'selected' : '' }} value="2002">2002</option>
                                <option {{ old('dob_year') == '2001' ? 'selected' : '' }} value="2001">2001</option>
                                <option {{ old('dob_year') == '2000' ? 'selected' : '' }} value="2000">2000</option>
                                <option {{ old('dob_year') == '1999' ? 'selected' : '' }} value="1999">1999</option>
                                <option {{ old('dob_year') == '1998' ? 'selected' : '' }} value="1998">1998</option>
                                <option {{ old('dob_year') == '1997' ? 'selected' : '' }} value="1997">1997</option>
                                <option {{ old('dob_year') == '1996' ? 'selected' : '' }} value="1996">1996</option>
                                <option {{ old('dob_year') == '1995' ? 'selected' : '' }} value="1995">1995</option>
                                <option {{ old('dob_year') == '1994' ? 'selected' : '' }} value="1994">1994</option>
                                <option {{ old('dob_year') == '1993' ? 'selected' : '' }} value="1993">1993</option>
                                <option {{ old('dob_year') == '1992' ? 'selected' : '' }} value="1992">1992</option>
                                <option {{ old('dob_year') == '1991' ? 'selected' : '' }} value="1991">1991</option>
                                <option {{ old('dob_year') == '1990' ? 'selected' : '' }} value="1990">1990</option>
                                <option {{ old('dob_year') == '1989' ? 'selected' : '' }} value="1989">1989</option>
                                <option {{ old('dob_year') == '1988' ? 'selected' : '' }} value="1988">1988</option>
                                <option {{ old('dob_year') == '1987' ? 'selected' : '' }} value="1987">1987</option>
                                <option {{ old('dob_year') == '1986' ? 'selected' : '' }} value="1986">1986</option>
                                <option {{ old('dob_year') == '1985' ? 'selected' : '' }} value="1985">1985</option>
                                <option {{ old('dob_year') == '1984' ? 'selected' : '' }} value="1984">1984</option>
                                <option {{ old('dob_year') == '1983' ? 'selected' : '' }} value="1983">1983</option>
                                <option {{ old('dob_year') == '1982' ? 'selected' : '' }} value="1982">1982</option>
                                <option {{ old('dob_year') == '1981' ? 'selected' : '' }} value="1981">1981</option>
                                <option {{ old('dob_year') == '1980' ? 'selected' : '' }} value="1980">1980</option>
                                <option {{ old('dob_year') == '1979' ? 'selected' : '' }} value="1979">1979</option>
                                <option {{ old('dob_year') == '1978' ? 'selected' : '' }} value="1978">1978</option>
                                <option {{ old('dob_year') == '1977' ? 'selected' : '' }} value="1977">1977</option>
                                <option {{ old('dob_year') == '1976' ? 'selected' : '' }} value="1976">1976</option>
                                <option {{ old('dob_year') == '1975' ? 'selected' : '' }} value="1975">1975</option>
                                <option {{ old('dob_year') == '1974' ? 'selected' : '' }} value="1974">1974</option>
                                <option {{ old('dob_year') == '1973' ? 'selected' : '' }} value="1973">1973</option>
                                <option {{ old('dob_year') == '1972' ? 'selected' : '' }} value="1972">1972</option>
                                <option {{ old('dob_year') == '1971' ? 'selected' : '' }} value="1971">1971</option>
                                <option {{ old('dob_year') == '1970' ? 'selected' : '' }} value="1970">1970</option>
                                <option {{ old('dob_year') == '1969' ? 'selected' : '' }} value="1969">1969</option>
                                <option {{ old('dob_year') == '1968' ? 'selected' : '' }} value="1968">1968</option>
                                <option {{ old('dob_year') == '1967' ? 'selected' : '' }} value="1967">1967</option>
                                <option {{ old('dob_year') == '1966' ? 'selected' : '' }} value="1966">1966</option>
                                <option {{ old('dob_year') == '1965' ? 'selected' : '' }} value="1965">1965</option>
                                <option {{ old('dob_year') == '1964' ? 'selected' : '' }} value="1964">1964</option>
                                <option {{ old('dob_year') == '1963' ? 'selected' : '' }} value="1963">1963</option>
                                <option {{ old('dob_year') == '1962' ? 'selected' : '' }} value="1962">1962</option>
                                <option {{ old('dob_year') == '1961' ? 'selected' : '' }} value="1961">1961</option>
                                <option {{ old('dob_year') == '1960' ? 'selected' : '' }} value="1960">1960</option>
                                <option {{ old('dob_year') == '1959' ? 'selected' : '' }} value="1959">1959</option>
                                <option {{ old('dob_year') == '1958' ? 'selected' : '' }} value="1958">1958</option>
                                <option {{ old('dob_year') == '1957' ? 'selected' : '' }} value="1957">1957</option>
                                <option {{ old('dob_year') == '1956' ? 'selected' : '' }} value="1956">1956</option>
                                <option {{ old('dob_year') == '1955' ? 'selected' : '' }} value="1955">1955</option>
                                <option {{ old('dob_year') == '1954' ? 'selected' : '' }} value="1954">1954</option>
                                <option {{ old('dob_year') == '1953' ? 'selected' : '' }} value="1953">1953</option>
                                <option {{ old('dob_year') == '1952' ? 'selected' : '' }} value="1952">1952</option>
                                <option {{ old('dob_year') == '1951' ? 'selected' : '' }} value="1951">1951</option>
                                <option {{ old('dob_year') == '1950' ? 'selected' : '' }} value="1950">1950</option>
                            </select>
                                <!-- <input type="number" class="form-control @error('dobyear') is-invalid @enderror" id="dobyear" name="dobyear" value="{{ old('dobyear') }}" min="1950" max="2025" placeholder="YYYY"> -->

                                @error('dob_year')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    </div>
                    </div>

                    <div class="form-group">

                        <div class="row">
                            <div class="col-4">
                                <label for="contact">Phone Code</label>
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
                                <label for="contact">Whatsapp No.</label>
                                <input type="text" class="form-control @error('contact') is-invalid @enderror" id="contact" name="contact" value="{{ old('contact') }}" required onblur1="requestOtp()">
                            </div>

                            <!-- <div class="col-2">
                                <button type="button" class="btn btn-success" onclick="requestOtp()" title="OTP will be send to your whatapp number">GET OTP</button>
                            </div> -->
                        </div>

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
                                <button type="button" class="btn btn-success" onclick="requestOtp()" title="An OTP will share on your Whatsapp">GET OTP</button>
                            </div>
                        </div>

                        <span class="otp-message-wrapper">
                            <input type="hidden" class="is-valid">
                            <span class="valid-feedback" role="alert" id="otp-message">
                                <strong></strong>
                            </span>
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="residential_address">residential address</label>
                        <textarea class="form-control @error('residential_address') is-invalid @enderror" id="residential_address" name="residential_address">{{ old('residential_address') }}</textarea>
                        
                        @error('residential_address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
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
                        </div>

                        <div class="col-md-6 other-country-div" style="display: {{ old('country_id') == 2 ? '' : 'none' }}">
                            <div class="form-group">
                                <label for="country_other">Country - Other</label>
                                <input type="text" name="country_other" id="country_other" class="form-control  @error('country_other') is-invalid @enderror" value="{{ old('country_other') }}">

                                @error('country_other')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>

                        <div class="col-md-6 state-div" style="display: {{ old('country_id') == 2 ? 'none' : '' }}">
                            <div class="form-group">
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
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 city-div" style="display: {{ old('country_id') == 2 ? 'none' : '' }}">
                            <div class="form-group">
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
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="pincode">PinCode</label>
                                <input type="number" name="pincode" id="pincode" class="form-control  @error('pincode') is-invalid @enderror" value="{{ old('pincode') }}">

                                @error('pincode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="highest_educational_qualification">Highest Qualification</label>
                        <input type="text" class="form-control  @error('highest_educational_qualification') is-invalid @enderror " id="highest_educational_qualification" name="highest_educational_qualification" value="{{ old('highest_educational_qualification') }}">
                        
                        @error('highest_educational_qualification')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="profession">profession</label>

                        <select name="profession" id="profession" class="form-control @error('profession') is-invalid @enderror">
                            <option value="">Select</option>
                            <option {{ old('profession', '') == 'Student' ? 'selected' : '' }} value="Student">Student</option>
                            <option {{ old('profession', '') == 'Private Employee' ? 'selected' : '' }} value="Private Employee">Private Employee</option>
                            <option {{ old('profession', '') == 'Government Employee' ? 'selected' : '' }} value="Government Employee">Government Employee</option>
                            <option {{ old('profession', '') == 'Freelancer' ? 'selected' : '' }} value="Freelancer">Freelancer</option>
                            <option {{ old('profession', '') == 'Others' ? 'selected' : '' }} value="Others">Others</option>
                        </select>

                        @error('profession')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="resume">Resume/cv</label>
                                <input type="file" class="form-control  @error('resume') is-invalid @enderror " id="resume" name="resume">
                                <p class="small"><strong>Max 2MB Allowed</strong></p>
                                
                                @error('resume')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="profile_image">profile image</label>
                                <input type="file" class="form-control  @error('profile_image') is-invalid @enderror " id="profile_image" name="profile_image">
                                <p class="small"><strong>Max 1MB Allowed</strong></p>
                                
                                @error('profile_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="guardian_name">Parents/Guardian Name</label>
                        <input type="text" class="form-control  @error('guardian_name') is-invalid @enderror " id="guardian_name" name="guardian_name" value="{{ old('guardian_name') }}">
                        
                        @error('guardian_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div></div>

                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="guardian_contact">Parents/Guardian Contact No.</label>
                        <input type="text" class="form-control  @error('guardian_contact') is-invalid @enderror " id="guardian_contact" name="guardian_contact" value="{{ old('guardian_contact') }}">
                        
                        @error('guardian_contact')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div></div>
                    </div>

                    <div class="form-group">
                        <label for="has_volunteer_with_us">Have you already been a volunteer with us ?</label>
                        <div class="gndr-block">

                            <input type="radio" id="Yes" name="has_volunteer_with_us" value="Yes" class="" {{ old('has_volunteer_with_us') == 'Yes' ? 'checked' : ''; }} onchange="hasVolunteerWithUsPress(this)">
                            <label for="Yes">Yes</label><br>

                            <input type="radio" id="No" name="has_volunteer_with_us" value="No" class="" {{ old('has_volunteer_with_us') == 'No' ? 'checked' : ''; }} onchange="hasVolunteerWithUsPress(this)">
                            <label for="No">No</label><br>
                        </div>

                        @error('has_volunteer_with_us')
                            <input type="hidden" class="@error('has_volunteer_with_us') is-invalid @enderror">
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
 
                    </div>

                    <div class="volunteer-with-us-year-wrapper" style="display: {{ old('has_volunteer_with_us') == 'Yes' ? '' : 'none' }}">
                        <div class="form-group volunteer-with-us-year-wrapper" style="display: {{ old('has_volunteer_with_us') == 'Yes' ? '' : 'none' }}">
                            <label for="volunteer_with_us_year">if yes, which year(s)? Please mention the discipline & department you were engaged with.</label>

                            <select name="volunteer_with_us_year" id="volunteer_with_us_year" class="form-control @error('volunteer_with_us_year') is-invalid @enderror">
                                <option value="">Select</option>
                                <option {{ old('volunteer_with_us_year') == '2016' ? 'selected' : '' }} value="2016">2016</option>
                                <option {{ old('volunteer_with_us_year') == '2017' ? 'selected' : '' }} value="2017">2017</option>
                                <option {{ old('volunteer_with_us_year') == '2018' ? 'selected' : '' }} value="2018">2018</option>
                                <option {{ old('volunteer_with_us_year') == '2019' ? 'selected' : '' }} value="2019">2019</option>
                                <option {{ old('volunteer_with_us_year') == '2022' ? 'selected' : '' }} value="2022">2022</option>
                            </select>

                            @error('volunteer_with_us_year')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>

                        <div class="form-group" style="margin:0;">
                            <label for="discipline_id">Discipline</label>
                        </div>

                        <div class="row">
                            <div class="col-md-6">    
                                <div class="form-group">
                                    <select name="discipline_id" id="discipline_id" class="form-control  @error('discipline_id') is-invalid @enderror ">
                                        <option value="">Select Discipline</option>
                                        @if($disciplines->count())
                                            @foreach($disciplines as $value)
                                                
                                                <option value="{{$value->id}}" {{ old('discipline_id') == $value->id ? 'selected' : '' }}>{{$value->name}}</option>
                                               
                                            @endforeach
                                        @endif

                                        @error('discipline_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">    
                                <div class="form-group">
                                    <select name="department_id" id="department_id" class="form-control">
                                        <option value="">Select Department</option>
                                        @if($departments->count())
                                            @foreach($departments as $value)
                                                <option value="{{ $value->id }}" {{ old('department_id') == $value->id ? 'selected' : '' }}>{{$value->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="form-group">
                        <label for="discipline1_id">if given a chance which discipline & department would you like to volunteer for?</label>
                    </div>


                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="discipline1_id" class="small">Discipline priority 1</label>
                                <select name="discipline1_id" id="discipline1_id" class="form-control  @error('discipline1_id') is-invalid @enderror " style="width:100%;">
                                    <option value="">Select</option>
                                    @if($disciplines->count())
                                        @foreach($disciplines as $value)
                                            @if($value->name != 'Special Project')
                                                <option value="{{$value->id}}" {{ old('discipline1_id') == $value->id ? 'selected' : '' }}>{{$value->name}}</option>
                                            @endif
                                        @endforeach
                                    @endif

                                    @error('discipline1_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="discipline2_id" class="small">Discipline priority 2</label>
                                <select name="discipline2_id" id="discipline2_id" class="form-control  @error('discipline2_id') is-invalid @enderror " style="width:100%;">
                                    <option value="">Select</option>
                                    @if($disciplines->count())
                                        @foreach($disciplines as $value)
                                            @if($value->name != 'Special Project')
                                                <option value="{{$value->id}}" {{ old('discipline2_id') == $value->id ? 'selected' : '' }}>{{$value->name}}</option>
                                            @endif
                                        @endforeach
                                    @endif

                                    @error('discipline2_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="discipline3_id" class="small">Discipline priority 3</label>
                                <select name="discipline3_id" id="discipline3_id" class="form-control  @error('discipline3_id') is-invalid @enderror " style="width:100%;">
                                    <option value="">Select</option>
                                    @if($disciplines->count())
                                        @foreach($disciplines as $value)
                                            @if($value->name != 'Special Project')
                                            
                                            <option value="{{$value->id}}" {{ old('discipline3_id') == $value->id ? 'selected' : '' }}>{{$value->name}}</option>
                                           @endif
                                        @endforeach
                                    @endif

                                    @error('discipline3_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <select name="department_id1" id="department_id1" class="form-control">
                            <option value="">Select Department</option>
                            @if($departments->count())
                                @foreach($departments as $value)
                                    <option value="{{ $value->id }}" {{ old('department_id1') == $value->id ? 'selected' : '' }}>{{$value->name}}</option>
                                @endforeach
                            @endif
                        <select>
                    </div>

                    <div class="form-group">
                        <label for="gainout">what do you hope to gain out of your experience as a volunteer at Serendipity arts festival 2023?</label>
                        <textarea class="form-control  @error('experience_as_avolunteer') is-invalid @enderror " id="experience_as_avolunteer" name="experience_as_avolunteer">{{ old('experience_as_avolunteer') }}</textarea>

                        @error('experience_as_avolunteer')
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
                                            <input type="checkbox" id="interest_{{ $discipline->id }}" name="interest[]" class="interest" value="{{ $discipline->id }}" {{ @in_array($discipline->id, old('interest') ?? []) ? 'checked' : '' }}>
                                            <label for="interest_{{$discipline->id}}" >{{$discipline->name}}</label><br>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                                                
                            <div class="chk-item">
                                <input type="checkbox" onchange="allCheckClick(this)">
                                <label for="all">All</label><br>
                            </div>
                        </div>

                        @error('experience_as_avolunteer')
                            <input type="hidden" class="@error('experience_as_avolunteer') is-invalid @enderror">
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div class="form-group acpt">
                        <input type="checkbox" id="terms" name="terms" value="1" required>
                        <label for="terms" class="cpt"> I have read and accepted all the <a target="_blank" href="https://serendipityartsfestival.com/terms-and-condition-for-volunteers" class="tc-btn">Terms and Conditions</a>. </label><br>

                        @error('terms')
                            <input type="hidden" class="@error('terms') is-invalid @enderror">
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
               
                    <div class="form-group">
                        <input type="submit" value="Submit ⟶">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script type="text/javascript">
    
    function hasVolunteerWithUsPress(_this){
        
        if($(_this).val() == 'Yes'){

            $(".volunteer-with-us-year-wrapper").show();
        } else {

            $(".volunteer-with-us-year-wrapper").hide();
        }
    }

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

    function getStates(_this, selectedId = null) {
        var country_id = $('#country_id').val();

        if(country_id == '2'){

            $(".state-div").hide();
            $(".city-div").hide();
            $(".other-country-div").show();
            return false;

        } else {
            $(".state-div").show();
            $(".city-div").show();
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

                                var _selected = '';

                                if(selectedId == response.data[i].id){

                                    _selected = 'selected';
                                }

                                options += '<option '+_selected+' value="'+response.data[i].id+'">'+response.data[i].state_name+'</option>';
                            }

                            $("#state_id").html(options);

                            if(selectedId){
                                getCities(null, <?php echo old( 'city_id', null )?>);
                            }
                        }
                    }
                }
            });
        } else {
            $("#state_id").html('<option value="">Select</option>');
        }
    }

    function getCities(_this, selectedId = null) {

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

                                var _selected = '';

                                if(selectedId == response.data[i].id){

                                    _selected = 'selected';
                                }

                                options += '<option '+_selected+' value="'+response.data[i].id+'">'+response.data[i].city_name+'</option>';
                            }

                            $("#city_id").html(options);
                        }
                    }
                }
            });
        } else {
            $("#city_id").html('<option value="">Select</option>');
        }
    }

    function requestOtp(_this) {

        var email               = $('#email').val();
        var country_std_code    = $('#country_std_code').val();
        var contact             = $('#contact').val();
        $("#otp-message strong").text('');
        // console.log("contact.length", contact.length);

        if(!country_std_code){

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

        } else if(!email){

            $(".otp-message-wrapper").find('.is-valid').removeClass('is-valid').addClass('is-invalid');
            $(".otp-message-wrapper").find('.valid-feedback').removeClass('valid-feedback').addClass('invalid-feedback');
            $("#otp-message strong").text('Please enter email address');
            // $(".otp-wrapper").hide();
            return false;

        } else {

            $("#otp-message strong").text('');
        }

        $.ajax({
            type: "POST",
            url: "{{ url('request-otp-on-whatsapp-volunteer') }}",
            datatype: 'json',
            data: { email: email, country_std_code: country_std_code, contact: contact },
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

    $(document).ready(function(){
        
        getStates(null, <?php echo old( 'state_id', null)?>);
        
    });

</script>
@endpush