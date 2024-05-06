@extends('layouts.app')
@section('content')

<section class="saf-mediapage">
	<div class="container">
		<div class="row pb-3">
			<div class="col-md-12">
	            <h1 class="main-title">Media</h1>
	            <p class="sub-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt consectetur adipiscing.</p> 
	        </div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="saf-media">
					<div class="row">
						@if($medias->count())
		        			@foreach($medias as $value)
								<div class="col-md-4">
									<div class="media-item">
										<img src="{{url('uploads/medias/').'/'.$value->featured_image}}" alt="" width="100%">

										<h3 class="title">{{$value->name}}</h3>
										<p class="short-desc">{{ $value->short_description }}</p>
										<a href="javascript:void(0)" data-toggle="modal" data-target="#knowMoreModal{{$value->id}}" class="link-btn">Know More &LongRightArrow;</a>
									</div>
								</div>

								<div class="modal fade" id="knowMoreModal{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="knowMoreModalLabel{{$value->id}}" aria-hidden="true">
			                        <div class="modal-dialog" role="document">
			                            <div class="modal-content">
			                                <div class="modal-header">
			                                    <h5 class="modal-title" id="knowMoreModalLabel{{$value->id}}">Information</h5>
			                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                                        <i aria-hidden="true" class="ki ki-close"></i>
			                                    </button>
			                                </div>
			                                <div class="modal-body">
			                                    {!! $value->description !!}
			                                </div>
			                                <div class="modal-footer">
			                                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
			                                    <a href="{{$value->external_link}}" target="_blank" class="btn btn-primary font-weight-bold external-link-btn">Visit Site</a>
			                                </div>
			                            </div>
			                        </div>
			                    </div>
							@endforeach
			        	@endif

					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection