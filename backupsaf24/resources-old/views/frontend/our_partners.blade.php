@extends('layouts.app')
@section('content')

<section class="saf-partnerspage">
	<div class="container">
		<div class="row pb-3">
			<div class="col-md-12">
				<h1 class="main-title">Partners</h1>
				<p class="sub-title">We extend our heartfelt gratitude to our dedicated supporters whose unwavering commitment empowers us to pursue our mission. Their generosity fuels our efforts and helps make a positive impact on the community. Together, we are shaping a better future, and we are immensely grateful for their invaluable support.</p>
			</div>
		</div>

        <div class="row">
            <div class="col-md-12">

                @php
                    $partners = \Helper::getPartners('Associate Partner');
                @endphp

                @if($partners->count() )
                    <div class="partneritem">
                        <h3 class="title">Associate Partner</h3>
                        <div class="imgrow">
                            @foreach($partners as $key => $value)
                                <a target="_blank" href="{{ $value->url }}"><img src="{{ asset('/uploads/sponsors/thumbnails/250/'.$value->logo) }}" alt="{{ $value->name }}"></a>
                            @endforeach
                        </div>
                    </div>
                @endif

                @php
                    $partners = \Helper::getPartners('Supported By');
                @endphp

                @if($partners->count() )
                    <div class="partneritem">
                        <h3 class="title">Supported By</h3>
                        <div class="imgrow">
                            @foreach($partners as $key => $value)
                                <a target="_blank" href="{{ $value->url }}"><img src="{{ asset('/uploads/sponsors/thumbnails/250/'.$value->logo) }}" alt="{{ $value->name }}"></a>
                            @endforeach
                        </div>
                    </div>
                @endif

                @php
                    $partners = \Helper::getPartners('Beverage Partner');
                @endphp

                @if($partners->count() )
                    <div class="partneritem">
                        <h3 class="title">Beverage Partner</h3>
                        <div class="imgrow">
                            @foreach($partners as $key => $value)
                                <a target="_blank" href="{{ $value->url }}"><img src="{{ asset('/uploads/sponsors/thumbnails/250/'.$value->logo) }}" alt="{{ $value->name }}"></a>
                            @endforeach
                        </div>
                    </div>
                @endif

                @php
                    $partners = \Helper::getPartners('Logistics Partner');
                @endphp

                @if($partners->count() )
                    <div class="partneritem">
                        <h3 class="title">Logistics Partner</h3>
                        <div class="imgrow">
                            @foreach($partners as $key => $value)
                                <a target="_blank" href="{{ $value->url }}"><img src="{{ asset('/uploads/sponsors/thumbnails/250/'.$value->logo) }}" alt="{{ $value->name }}"></a>
                            @endforeach
                        </div>
                    </div>
                @endif

                @php
                    $partners = \Helper::getPartners('Project Partners');
                @endphp

                @if($partners->count() )
                    <div class="partneritem">
                        <h3 class="title">Project Partners</h3>
                        <div class="imgrow">
                            @foreach($partners as $key => $value)
                                <a target="_blank" href="{{ $value->url }}"><img src="{{ asset('/uploads/sponsors/thumbnails/250/'.$value->logo) }}" alt="{{ $value->name }}"></a>
                            @endforeach
                        </div>
                    </div>
                @endif

                @php
                    $partners = \Helper::getPartners('Institutional Partners');
                @endphp

                @if($partners->count() )
                    <div class="partneritem">
                        <h3 class="title">Institutional Partners</h3>
                        <div class="imgrow">
                            @foreach($partners as $key => $value)
                                <a target="_blank" href="{{ $value->url }}"><img src="{{ asset('/uploads/sponsors/thumbnails/250/'.$value->logo) }}" alt="{{ $value->name }}"></a>
                            @endforeach
                        </div>
                    </div>
                @endif

                @php
                    $partners = \Helper::getPartners('Banking Partners');
                @endphp

                @if($partners->count() )
                    <div class="partneritem">
                        <h3 class="title">Banking Partners</h3>
                        <div class="imgrow">
                            @foreach($partners as $key => $value)
                                <a target="_blank" href="{{ $value->url }}"><img src="{{ asset('/uploads/sponsors/thumbnails/250/'.$value->logo) }}" alt="{{ $value->name }}"></a>
                            @endforeach
                        </div>
                    </div>
                @endif

                @php
                    $partners = \Helper::getPartners('Media Partners');
                @endphp

                @if($partners->count() )
                    <div class="partneritem">
                        <h3 class="title">Media Partners</h3>
                        <div class="imgrow">
                            @foreach($partners as $key => $value)
                                <a target="_blank" href="{{ $value->url }}"><img src="{{ asset('/uploads/sponsors/thumbnails/250/'.$value->logo) }}" alt="{{ $value->name }}"></a>
                            @endforeach
                        </div>
                    </div>
                @endif

                @php
                    $partners = \Helper::getPartners('Technology Partners');
                @endphp

                @if($partners->count() )
                    <div class="partneritem">
                        <h3 class="title">Technology Partners</h3>
                        <div class="imgrow">
                            @foreach($partners as $key => $value)
                                <a target="_blank" href="{{ $value->url }}"><img src="{{ asset('/uploads/sponsors/thumbnails/250/'.$value->logo) }}" alt="{{ $value->name }}"></a>
                            @endforeach
                        </div>
                    </div>
                @endif

                @php
                    $partners = \Helper::getPartners('Hospitality Partners');
                @endphp

                @if($partners->count() )
                    <div class="partneritem">
                        <h3 class="title">Hospitality Partners</h3>
                        <div class="imgrow">
                            @foreach($partners as $key => $value)
                                <a target="_blank" href="{{ $value->url }}"><img src="{{ asset('/uploads/sponsors/thumbnails/250/'.$value->logo) }}" alt="{{ $value->name }}"></a>
                            @endforeach
                        </div>
                    </div>
                @endif

                @php
                    $partners = \Helper::getPartners('Strategic Media Partners');
                @endphp

                @if($partners->count() )
                    <div class="partneritem">
                        <h3 class="title">Strategic Media Partners</h3>
                        <div class="imgrow">
                            @foreach($partners as $key => $value)
                                <a target="_blank" href="{{ $value->url }}"><img src="{{ asset('/uploads/sponsors/thumbnails/250/'.$value->logo) }}" alt="{{ $value->name }}"></a>
                            @endforeach
                        </div>
                    </div>
                @endif

                @php
                    $partners = \Helper::getPartners('Lifestyle Magazine Partner');
                @endphp

                @if($partners->count() )
                    <div class="partneritem">
                        <h3 class="title">Lifestyle Magazine Partner</h3>
                        <div class="imgrow">
                            @foreach($partners as $key => $value)
                                <a target="_blank" href="{{ $value->url }}"><img src="{{ asset('/uploads/sponsors/thumbnails/250/'.$value->logo) }}" alt="{{ $value->name }}"></a>
                            @endforeach
                        </div>
                    </div>
                @endif

                @php
                    $partners = \Helper::getPartners('Art Partners');
                @endphp

                @if($partners->count() )
                    <div class="partneritem">
                        <h3 class="title">Art Partners</h3>
                        <div class="imgrow">
                            @foreach($partners as $key => $value)
                                <a target="_blank" href="{{ $value->url }}"><img src="{{ asset('/uploads/sponsors/thumbnails/250/'.$value->logo) }}" alt="{{ $value->name }}"></a>
                            @endforeach
                        </div>
                    </div>
                @endif

                @php
                    $partners = \Helper::getPartners('Beauty & Wellness Partner');
                @endphp

                @if($partners->count() )
                    <div class="partneritem">
                        <h3 class="title">Beauty & Wellness Partner</h3>
                        <div class="imgrow">
                            @foreach($partners as $key => $value)
                                <a target="_blank" href="{{ $value->url }}"><img src="{{ asset('/uploads/sponsors/thumbnails/250/'.$value->logo) }}" alt="{{ $value->name }}"></a>
                            @endforeach
                        </div>
                    </div>
                @endif

                @php
                    $partners = \Helper::getPartners('Special Thanks');
                @endphp

                @if($partners->count() )
                    <div class="partneritem">
                        <h3 class="title">Special Thanks</h3>
                        <div class="imgrow">
                            @foreach($partners as $key => $value)
                                <a target="_blank" href="{{ $value->url }}"><img src="{{ asset('/uploads/sponsors/thumbnails/250/'.$value->logo) }}" alt="{{ $value->name }}"></a>
                            @endforeach
                        </div>
                    </div>
                @endif

                @php
                    $partners = \Helper::getPartners('Coffee Partner');
                @endphp

                @if($partners->count() )
                    <div class="partneritem">
                        <h3 class="title">Coffee Partner</h3>
                        <div class="imgrow">
                            @foreach($partners as $key => $value)
                                <a target="_blank" href="{{ $value->url }}"><img src="{{ asset('/uploads/sponsors/thumbnails/250/'.$value->logo) }}" alt="{{ $value->name }}"></a>
                            @endforeach
                        </div>
                    </div>
                @endif
        
            </div>

        </div>
    </div>
</section>


@endsection