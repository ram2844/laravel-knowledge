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
		                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-right">Title: </label>
		                            <div class="col-lg-9 col-md-9 col-sm-12">
		                            	<label class="col-form-label text-lg-right">{{$row->name}}</label>
		                                
		                            </div>
		                        </div>

		                        <div class="form-group row validated">
		                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-right">Sponsor Type: </label>
		                            <div class="col-lg-9 col-md-9 col-sm-12">
		                            	<label class="col-form-label text-lg-right">{{ $row->sponsorType->name ?? 'N/A' }}</label>
		                                
		                            </div>
		                        </div>

		                        <div class="form-group row validated">
		                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-right">Logo: </label>
		                            <div class="col-lg-9 col-md-9 col-sm-12">
		                                
		                                @if(isset($row->logo) && !empty($row->logo))
		                            	<div class="image-input image-input-outline">
	                            		@else
		                            	<div class="image-input image-input-outline" style="background-image: url({{asset('media/users/blank.png')}})">
	                            		@endif

		                            		@if(isset($row->logo) && !empty($row->logo))
												<div class="image-input-wrapper" style="background-image: url({{asset('uploads/sponsors/thumbnails/250/'.$row->logo)}})"></div>
		                            		@else
		                            			<div class="image-input-wrapper curator_image_base64"></div>
		                            		@endif
										</div>
		                            
		                            </div>
		                        </div>

		                        <div class="form-group row validated">
		                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-right">URL: </label>
		                            <div class="col-lg-9 col-md-9 col-sm-12">
		                            	<label class="col-form-label text-lg-right">{{$row->url}}</label>
		                                
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