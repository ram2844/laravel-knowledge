@extends('layouts.backend')

@section('content')

<div class="d-flex flex-column-fluid">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                
                <div class="card card-custom gutter-b">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">Show {{$moduleConfig['moduleTitle']}}</h3>
                        </div>
                    </div>
                    
                    <div class="card-body">
                        <div class="row">
                            
                            <div class="col-6">
                                
                                <div class="form-group row validated">
                                    <label class="col-form-label col-lg-3 col-sm-12 text-lg-right">First Name: </label>
                                    <div class="col-lg-9 col-md-9 col-sm-12">
                                        <label class="col-form-label text-lg-right">{{$row->first_name}}</label>
                                        
                                    </div>
                                </div>

                                <div class="form-group row validated">
                                    <label class="col-form-label col-lg-3 col-sm-12 text-lg-right">Last Name: </label>
                                    <div class="col-lg-9 col-md-9 col-sm-12">
                                        <label class="col-form-label text-lg-right">{{$row->last_name}}</label>
                                        
                                    </div>
                                </div>

                                <div class="form-group row validated">
                                    <label class="col-form-label col-lg-3 col-sm-12 text-lg-right">Gender: </label>
                                    <div class="col-lg-9 col-md-9 col-sm-12">

                                        <label class="col-form-label text-lg-right">{{ ucwords($row->gender) }}</label>
                                    
                                    </div>
                                </div>

                                <div class="form-group row validated">
                                    <label class="col-form-label col-lg-3 col-sm-12 text-lg-right">Contact: </label>
                                    <div class="col-lg-9 col-md-9 col-sm-12">

                                        <label class="col-form-label text-lg-right">{{ $row->contact }}</label>
                                    
                                    </div>
                                </div>

                                <div class="form-group row validated">
                                    <label class="col-form-label col-lg-3 col-sm-12 text-lg-right">Email: </label>
                                    <div class="col-lg-9 col-md-9 col-sm-12">
                                        <label class="col-form-label text-lg-right">{{$row->email}}</label>
                                    
                                    </div>
                                </div>

                                <div class="form-group row validated">
                                    <label class="col-form-label col-lg-3 col-sm-12 text-lg-right">Residential Address: </label>
                                    <div class="col-lg-9 col-md-9 col-sm-12">
                                        <label class="col-form-label text-lg-right">{{$row->residential_address}}</label>
                                    
                                    </div>
                                </div>

                                <div class="form-group row validated">
                                    <label class="col-form-label col-lg-3 col-sm-12 text-lg-right">Country: </label>
                                    <div class="col-lg-9 col-md-9 col-sm-12">

                                        <label class="col-form-label text-lg-right">{{ $row->country->country_name ?? 'N/A' }}</label>
                                    
                                    </div>
                                </div>

                                @if($row->country_id == 2)
                                    <div class="form-group row validated">
                                        <label class="col-form-label col-lg-3 col-sm-12 text-lg-right">Other Country: </label>
                                        <div class="col-lg-9 col-md-9 col-sm-12">

                                            <label class="col-form-label text-lg-right">{{ $row->other_country ?? 'N/A' }}</label>
                                        
                                        </div>
                                    </div>
                                @endif

                                @if($row->country_id != 2)
                                    <div class="form-group row validated">
                                        <label class="col-form-label col-lg-3 col-sm-12 text-lg-right">State: </label>
                                        <div class="col-lg-9 col-md-9 col-sm-12">

                                            <label class="col-form-label text-lg-right">{{ $row->state->state_name ?? 'N/A' }}</label>
                                        
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row validated">
                                        <label class="col-form-label col-lg-3 col-sm-12 text-lg-right">City: </label>
                                        <div class="col-lg-9 col-md-9 col-sm-12">

                                            <label class="col-form-label text-lg-right">{{ $row->city->city_name ?? 'N/A' }}</label>
                                        
                                        </div>
                                    </div>
                                @endif

                                <div class="form-group row validated">
                                    <label class="col-form-label col-lg-3 col-sm-12 text-lg-right">Pincode: </label>
                                    <div class="col-lg-9 col-md-9 col-sm-12">
                                        <label class="col-form-label text-lg-right">{{$row->pincode}}</label>
                                    
                                    </div>
                                </div>

                                <div class="form-group row validated">
                                    <label class="col-form-label col-lg-3 col-sm-12 text-lg-right">HIGHEST EDUCATIONAL HIGHEST_EDUCATIONAL_QUALIFICATIONCATION: </label>
                                    <div class="col-lg-9 col-md-9 col-sm-12">
                                        <label class="col-form-label text-lg-right">{{$row->highest_educational_qualification}}</label>
                                    
                                    </div>
                                </div>

                                <div class="form-group row validated">
                                    <label class="col-form-label col-lg-3 col-sm-12 text-lg-right">Profession: </label>
                                    <div class="col-lg-9 col-md-9 col-sm-12">
                                        <label class="col-form-label text-lg-right">{{$row->profession}}</label>
                                    
                                    </div>
                                </div>

                                <div class="form-group row validated">
                                    <label class="col-form-label col-lg-3 col-sm-12 text-lg-right">Resume </label>
                                    <div class="col-lg-9 col-md-9 col-sm-12">
                                        
                                        <a href="{{asset('uploads/volunteers/'.$row->resume)}}" target="_blank">View Resume</a>
                                    
                                    </div>
                                </div>

                                <div class="form-group row validated">
                                    <label class="col-form-label col-lg-3 col-sm-12 text-lg-right">Profile Image </label>
                                    <div class="col-lg-9 col-md-9 col-sm-12">
                                        
                                        <div class="image-input image-input-outline" style="background-image: url({{asset('media/users/blank.png')}})">

                                            @if(isset($row->profile_image) && !empty($row->profile_image))
                                                <div class="image-input-wrapper" style="background-image: url({{asset('uploads/volunteers/'.$row->profile_image)}})"></div>
                                            @else
                                                <div class="image-input-wrapper program_image_base64"></div>
                                            @endif
                                        </div>
                                    
                                    </div>
                                </div>


                                <div class="form-group row validated">
                                    <label class="col-form-label col-lg-3 col-sm-12 text-lg-right">Guardian Name: </label>
                                    <div class="col-lg-9 col-md-9 col-sm-12">
                                        <label class="col-form-label text-lg-right">{{$row->guardian_name}}</label>
                                    
                                    </div>
                                </div>

                                <div class="form-group row validated">
                                    <label class="col-form-label col-lg-3 col-sm-12 text-lg-right">Guardian Contact: </label>
                                    <div class="col-lg-9 col-md-9 col-sm-12">
                                        <label class="col-form-label text-lg-right">{{$row->guardian_contact}}</label>
                                    
                                    </div>
                                </div>

                                <div class="form-group row validated">
                                    <label class="col-form-label col-lg-3 col-sm-12 text-lg-right">HAVE YOU ALREADY BEEN A VOLUNTEER WITH US?: </label>
                                    <div class="col-lg-9 col-md-9 col-sm-12">
                                        <label class="col-form-label text-lg-right">{{$row->has_volunteer_with_us}}</label>
                                    
                                    </div>
                                </div>

                                @if($row->has_volunteer_with_us == 'Yes')
                                    <div class="form-group row validated">
                                        <label class="col-form-label col-lg-3 col-sm-12 text-lg-right">IF YES, WHICH YEAR(S)? PLEASE MENTION THE DISCIPLINE YOU WERE ENGAGED WITH: </label>
                                        <div class="col-lg-9 col-md-9 col-sm-12">
                                            <label class="col-form-label text-lg-right">{{$row->volunteer_with_us_year}}</label>
                                        </div>
                                    </div>

                                    <div class="form-group row validated">
                                        <label class="col-form-label col-lg-3 col-sm-12 text-lg-right">DISCIPLINE: </label>
                                        <div class="col-lg-9 col-md-9 col-sm-12">
                                            <label class="col-form-label text-lg-right">{{$row->discipline->name ?? 'N/A'}}</label>
                                        </div>
                                    </div>

                                    <div class="form-group row validated">
                                        <label class="col-form-label col-lg-3 col-sm-12 text-lg-right">DEPARTMENT: </label>
                                        <div class="col-lg-9 col-md-9 col-sm-12">
                                            <label class="col-form-label text-lg-right">{{$row->department->name ?? 'N/A'}}</label>
                                        </div>
                                    </div>

                                @endif

                                <div class="form-group row validated">
                                    <label class="col-form-label col-lg-3 col-sm-12 text-lg-right">IF GIVEN A CHANCE WHICH DISCIPLINE WOULD YOU LIKE TO VOLUNTEER FOR?:
                                    </label>
                                </div>

                                <div class="form-group row validated">
                                    <label class="col-form-label col-lg-3 col-sm-12 text-lg-right">
                                        DISCIPLINE PRIORITY 1:
                                    </label><br>
                                    <div class="col-lg-9 col-md-9 col-sm-12">
                                        <label class="col-form-label text-lg-right">{{$row->discipline1->name ?? 'N/A'}}</label>
                                    </div>
                                </div>

                                <div class="form-group row validated">
                                    <label class="col-form-label col-lg-3 col-sm-12 text-lg-right">DISCIPLINE PRIORITY 2: </label>
                                    <div class="col-lg-9 col-md-9 col-sm-12">
                                        <label class="col-form-label text-lg-right">{{$row->discipline2->name ?? 'N/A'}}</label>
                                    
                                    </div>
                                </div>

                                <div class="form-group row validated">
                                    <label class="col-form-label col-lg-3 col-sm-12 text-lg-right">DISCIPLINE PRIORITY 3: </label>
                                    <div class="col-lg-9 col-md-9 col-sm-12">
                                        <label class="col-form-label text-lg-right">{{$row->discipline3->name ?? 'N/A'}}</label>
                                    
                                    </div>
                                </div>

                                <div class="form-group row validated">
                                        <label class="col-form-label col-lg-3 col-sm-12 text-lg-right">DEPARTMENT: </label>
                                        <div class="col-lg-9 col-md-9 col-sm-12">
                                            <label class="col-form-label text-lg-right">{{$row->department1->name ?? 'N/A'}}</label>
                                        </div>
                                    </div>

                                <div class="form-group row validated">
                                    <label class="col-form-label col-lg-3 col-sm-12 text-lg-right">WHAT DO YOU HOPE TO GAIN OUT OF YOUR EXPERIENCE AS AVOLUNTEER AT SERENDIPITY ARTS FESTIVAL 2023?: </label>
                                    <div class="col-lg-9 col-md-9 col-sm-12">
                                        <label class="col-form-label text-lg-right">{{$row->experience_as_avolunteer ?? 'N/A'}}</label>
                                    
                                    </div>
                                </div>

                                <div class="form-group row validated">
                                    <label class="col-form-label col-lg-3 col-sm-12 text-lg-right">Interests: </label>
                                    <div class="col-lg-9 col-md-9 col-sm-12">

                                        <label class="col-form-label text-lg-right">{{ @implode(', ', $row->interests()) }}</label>
                                    
                                    </div>
                                </div>

                                <div class="form-group row validated">
                                    <label class="col-form-label col-lg-3 col-sm-12 text-lg-right">Status: </label>
                                    <div class="col-lg-9 col-md-9 col-sm-12">

                                        <label class="col-form-label text-lg-right">{{ $row->status ? 'Active' : 'Inactive' }}</label>
                                    
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-4"></div>
                            <div class="col-lg-4 text-center">
                                <a class="btn btn-primary" href="{{ route($moduleConfig['routes']['listRoute']) }}">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection