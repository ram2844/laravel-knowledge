@extends('layouts.app')

@section('content')

<section class="saf-vibepage">
    <div class="container">

        <div class="row pb-3">
            <div class="col-md-12">
                <h1 class="main-title">Eat, Drink, Stay</h1>
                <p class="sub-title">Enjoy Serendipity Arts Festival with our list of curated venues, cafes and spaces of pleasure.</p> 
            </div>
        </div>

        
            @if($partners->count())
                @foreach($partners as $value)
                    <div class="row">
                        <div class="col-md-8">
                            <h2 class="block-title">Partner {{$value->name}}</h2>
                        </div>
                        <div class="col-md-4" style="text-align:right;">
                        </div>
                        
                        <div class="col-md-12">
                            <div class="saf-partner {{$value->name}}">
                                @if($vibes->count())
                                    @foreach($vibes as $key)
                                        @if($key->partner_type_id == $value->id)
                                            <div class="single-item single-item-{{$value->id}}">
                                                <img src="{{url('uploads/vibes/').'/'.$key->featured_image}}" alt="" width="100%" >
                                                <h3 class="title">{{$key->title}}</h3>
                                                <p class="short-desc">{{$key->short_description}}</p>
                                                <a href="javascript:void(0)" data-toggle="modal" data-target="#knowMoreModal{{$key->id}}" class="link-btn">Know More &LongRightArrow;</a>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif

                            </div>
                        </div>
                    </div>

                @endforeach
            @endif
          
    </div>
</section>


@if($partners->count())
    @foreach($partners as $value1)
        @if($vibes->count())
            @foreach($vibes as $value2)
                @if($value2->partner_type_id == $value1->id)
                    <div class="modal fade" id="knowMoreModal{{$value2->id}}" tabindex="-1" role="dialog" aria-labelledby="knowMoreModalLabel{{$value2->id}}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <!-- <div class="modal-header">
                                    <h5 class="modal-title" id="knowMoreModalLabel{{$value2->id}}">Information</h5>
                                    
                                </div> -->
                                <div class="modal-body">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <i aria-hidden="true" class="ki ki-close"></i>
                                    </button>
                                    {!! $value->description !!}
                                    <div class="description">
                                    Bird’s Nest Restaurant is one of the most remarkable and unique restaurants worldwide. Guests are hoisted 16 feet into the branches by a “treepod,” a sophisticated table and booth structure overlooking the lush Koh Kood rainforest.
                                    </div>
                                </div>
                                <div class="modal-footer" style="padding: 5px 10px 5px 10px;">
                                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                                    <a href="{{$value2->external_link}}" target="_blank" class="btn btn-primary font-weight-bold external-link-btn">Visit Site</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        @endif
    @endforeach
@endif

@endsection

@push('scripts')
   <script type="text/javascript">

        function openKnowMoreModal(id){

            // var description = $(".single-item-" + id + " .long-desc").html();
            // var external_link = $(".single-item-" + id + " .external-link").text();

            // console.log("id", id);
            // console.log("external_link", external_link);

            // $("#knowMoreModal .modal-body").html(description);
            // $("#knowMoreModal .external-link-btn").attr('href', '');
            // $("#knowMoreModal .external-link-btn").attr('href', external_link);
            // $("#knowMoreModal").modal('toggle');
        }

        // $(document).ready(function(){

        //     $(document).on('show.bs.modal','#knowMoreModal', function(e) {

        //         alert('Hi');
        //     });
        // });

   </script>
@endpush