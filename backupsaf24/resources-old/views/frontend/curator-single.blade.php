@extends('layouts.app')

@section('content')

<section class="curatorsingle-section">
	<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="gotoback">
                    <a href="{{ route('curators') }}">⟵ Back</a>
                <div>
            </div>
        </div>
		<div class="row">
            <div class="col-md-1">
            	@if($prevCurator)
                	<div class="left-arrow"><a href="{{ route('curator.details', ['id' => $prevCurator->slug]) }}">⟵</a></div>
                @endif
            </div>
            <div class="col-md-5">
                <div class="profile-img">
                    <img src="{{url('uploads/curators').'/'.$curator->curator_image}}">
                </div>
            </div>
            <div class="col-md-5">
                <div class="profile-title">
                    <h3>{{$curator->name}}</h3> 
                    <div class="seperator-box"></div>
                    <span>{{$curator->discipline_name}}</span>
                </div>
                <div class="profile-info">
                    {!! $curator->bio !!}
                </div>
            </div>
            <div class="col-md-1">
            	@if($nextCurator)
                	<div class="right-arrow"><a href="{{ route('curator.details', ['id' => $nextCurator->slug]) }}">⟶</a></div>
                @endif
            </div>
        </div>

	    <div class="row">
	        <div class="explore-curators">
	            <h3 class="main-title">
	                Explore more curators
	            </h3>

	            <div class="scroll-curators">

	            	@if($otherCurators->count())
	        			@foreach($otherCurators as $value)
			                <div class="single-item">
			        			<a href="{{ route('curator.details', ['id' => $value->slug]) }}" style="display: block;">
					                    <div class="row">
					                        <div class="col-md-3">
					                            <img src="{{url('uploads/curators').'/'.$value->curator_image}}">
					                        </div>
					                        <div class="col-md-9">
					                            <h3 class="title">{{$value->name}}</h3>
					                            <p class="desg">{{$value->discipline_name}}</p>
					                        </div>
					                    </div>
					            </a>
			                </div>
		                @endforeach
	                @endif
	            </div>
	        </div>
	    </div>
    </div>
</section>

@endsection