@extends('layouts.app')

@section('content')

<section class="banner-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <iframe src="https://player.vimeo.com/video/857032133?h=9705234265&amp;badge=0&amp;autoplay=1&loop=1&autopause=0&amp;player_id=0&amp;app_id=58479" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" width="100%" height="700" title="#ComeTogetherAtSAF"></iframe>
                <!-- <iframe src="https://player.vimeo.com/video/857032133?h=9705234265&amp;badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" width="100%" height="700" title="#ComeTogetherAtSAF"></iframe> -->
                <!-- <iframe title="vimeo-player" src="https://player.vimeo.com/video/857032133?h=9705234265" width="100%" height="700" frameborder="0"    allowfullscreen></iframe> -->
            <!-- <iframe width="100%" height="726" src="https://www.youtube.com/embed/NtMH50p5AD4?loop=1&playlist=NtMH50p5AD4&rel=0&autoplay=1&mute=1" title="#ComeTogether at Serendipity Arts Festival 2023" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe> -->
            </div>
        </div>
    </div>
</section>

<section class="intro-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="title">India's largest <span>multidisciplinary arts festival</span> is back for its 6<sup>th</sup> edition.</h1>
            </div>
        </div>
        <div class="row pb-5">
            <div class="col-md-6">
                <!-- <div class="desc">
                    Experience the finest of exhibitions, performances, workshops, books, foodand so much more!
                </div>
                 -->
                <div class="register">   
                <a href="/register/">Register for free</a> to join us for the Serendipity Arts Festival 2023.<br><br>Some events with limited seating require tickets. Visit the Programs tab to secure your seats.
                </div>
                <div class="link-btn">
                    <a href="/programs/">Book Now ⟶</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
<div class="container-fluid pl-0 pr-0">
        <div class="row" style="margin:0;">
     
            <div class="blue-btn">
                <div class="first-link">
                    <ul>
                      
                        <li>#AccessibilityAtSAF</li>
                        <li>#SustainabilityAtSAF</li>
                        <li>#DiversityAtSAF</li>


                        <li>#AccessibilityAtSAF</li>
                        <li>#SustainabilityAtSAF</li>
                        <li>#DiversityAtSAF</li>

                        <li>#AccessibilityAtSAF</li>
                        <li>#SustainabilityAtSAF</li>
                        <li>#DiversityAtSAF</li>

                    </ul>

                    
                </div>
            </div>
        <div>
    </div>
</section>


<section class="experience-exhibitions">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="title">What's on your mind?</h1>
                <p class="sub-title">There is plenty to experience at Serendipity Arts Festival, from thought-provoking exhibitions and talks to memorable performances and workshops. Find your groove here!</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <form method="GET" action="{{ route('programs') }}" class="searchform" id="searchform">
                    <div class="field-line">
                        <p>I want to experience</p>

                        <select name="category[]" class="extype">
                            @if($categories->count())
                                @foreach($categories as $value)
                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                @endforeach
                            @endif
                        </select>

                        <p>on</p>

                        <select class="extype2" name="event_date[]">
                            <option value="2023-12-15">15 Dec</option>
                            <option value="2023-12-16">16 Dec</option>
                            <option value="2023-12-17">17 Dec</option>
                            <option value="2023-12-18">18 Dec</option>
                            <option value="2023-12-19">19 Dec</option>
                            <option value="2023-12-20">20 Dec</option>
                            <option value="2023-12-21">21 Dec</option>
                            <option value="2023-12-22">22 Dec</option>
                            <option value="2023-12-23">23 Dec</option>
                        </select>

                    </div>

                    <div class="submit-btn">
                        <input type="submit" value="Search ⟶">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<section class="highlights-section" id="highlightsSection">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="title">Serendipity Arts Festival 2023</h1>
                <p class="sub-title">Highlights</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-7">
                <div class="row">
                    <div class="col-md-12 pb-5">
                        <div class="filter-date">

                            @if($event_dates)
                                
                                <a href="javascript:void(0)" onclick="getHighlights('PREV')">⟵</a>

                                <p id="dayTitle">DAY 1, {{ @date('d M', strtotime($event_dates[0])) }}</p>

                                <a href="javascript:void(0)" id="highlight-next-btn" data-day="1" onclick="getHighlights('NEXT')">⟶</a>

                            @endif

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 pb-5">
                        <form>
                            <select name="filter-highlight" class="form-control" id="filter-highlight-venue" onchange="getHighlights()">
                                <option value="">All venues</option>
                                @if($venues->count())
                                    @foreach($venues as $value)
                                        <option value="{{ $value->id }}">{{ $value->title }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </form>
                    </div>
                </div>

            </div>
        </div>

        <div class="highlighrow" id="highlights">
            <div class="row">
                <div class="col-md-12 text-center">
                    <img class="img-fluid mx-auto d-block" src="{{ asset('image/loader.gif') }}">
                </div>
            </div>
        </div>

    </div>
</section>

<section class="browseprogram-section d-none1">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1 class="title">Browse programming by category</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">

            <div class="wrapper">

                <input class="radio" id="one" name="group" type="radio" checked>
                <input class="radio" id="two" name="group" type="radio">
                <input class="radio" id="three" name="group" type="radio">
                <input class="radio" id="four" name="group" type="radio">
                <input class="radio" id="five" name="group" type="radio">

                <div class="tabs">

                    <label class="tab" id="one-tab" for="one">Exhibitions</label>
                    <div class="seprator-item"></div>

                    <label class="tab" id="two-tab" for="two">Performances</label>
                    <div class="seprator-item"></div>

                    <label class="tab" id="three-tab" for="three">Workshops</label>
                    <div class="seprator-item"></div>

                    <label class="tab" id="four-tab" for="four">Talks</label>
                    <div class="seprator-item"></div>

                    <label class="tab" id="five-tab" for="five">Other Programmes</label>

                </div>

                <div class="panels">
                    <div class="cropshape-left"><img src="{{url('/image/shape-crop-left.png')}}"></div>

                    @php
                        $programs = \Helper::getPrograms('Exhibitions and Installations');
                    @endphp
                    
                    @if($programs->count())
                        <div class="panel" id="one-panel">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="exhibition-gallery">
                                        @foreach($programs as $key2 => $value2)
                                            <div class="single-item">
                                                <img src="{{ url('uploads/programs').'/'.$value2->program_image}}" class="pgrimg">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div> 
                    @endif

                    @php
                        $programs = \Helper::getPrograms('Performances');
                    @endphp
                    
                    @if($programs->count())
                        <div class="panel" id="two-panel">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="exhibition-gallery">
                                        @foreach($programs as $key2 => $value2)
                                            <div class="single-item">
                                                <img src="{{ url('uploads/programs').'/'.$value2->program_image}}" class="pgrimg">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div> 
                    @endif

                    @php
                        $programs = \Helper::getPrograms('Workshops');
                    @endphp
                    
                    @if($programs->count())
                        <div class="panel" id="three-panel">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="exhibition-gallery">
                                        @foreach($programs as $key2 => $value2)
                                            <div class="single-item">
                                                <img src="{{ url('uploads/program').'/'.$value2->program_image}}" class="pgrimg">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div> 
                    @endif

                    @php
                        $programs = \Helper::getPrograms('Talks');
                    @endphp
                    
                    @if($programs->count())
                        <div class="panel" id="four-panel">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="exhibition-gallery">
                                        @foreach($programs as $key2 => $value2)
                                            <div class="single-item">
                                                <img src="{{ url('uploads/programs').'/'.$value2->program_image}}" class="pgrimg">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div> 
                    @endif

                    @php
                        $programs = \Helper::getPrograms('Other Programmes');
                    @endphp
                    
                    @if($programs->count())
                        <div class="panel" id="five-panel">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="exhibition-gallery">
                                        @foreach($programs as $key2 => $value2)
                                            <div class="single-item">
                                                <img src="{{ url('uploads/programs').'/'.$value2->program_image}}" class="pgrimg">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div> 
                    @endif

                    <div class="cropshape-right"><img src="{{url('/image/shape-crop-right.png')}}"></div>
                </div>
            </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="book-seat">
                   <div class="bookseat-content">
                   There is plenty to experience at Serendipity Arts Festival, from thought-provoking exhibitions and talks to memorable performances and workshops. Find your groove here! 
                   </div>
                   <a class="bookseat-link" href="#">book seats ⟶</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="keything-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="title"><span>Key things to know</span> when you are at Serendipity Arts Festival</h1>
                <!-- <p class="sub-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt consectetur adipiscing.</p> -->
            </div>
        </div>

        <div class="row">

            <div class="col-md-6">
                <div class="image-section">
                    <img src="{{url('/image/qa1.jpg')}}" alt="">
                    <!-- <img src="{{url('/image/qa2.jpg')}}" alt="">
                    <img src="{{url('/image/qa3.jpg')}}" alt=""> -->
                </div>
            </div>

            <div class="col-md-6">
                <div class="qa-section">

                    <div class="qa-single">
                        <h3 class="title">All events are not free</h3>
                        <p class="desg">Owing to popular demand, we are charging a nominal fee for select projects to ensure pre-registration for limited seating. </p>
                    </div>

                    <!-- <div class="qa-single">
                        <h3 class="title">why has saf started changing?</h3>
                        <p class="desg">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        ncididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div> -->

                    <div class="qa-single">
                        <h3 class="title">how accessible are we?</h3>
                        <p class="desg">Facilities like ramps, tactile braille artworks, braille guides, sign language experts, inclusive outreach programmes and on-ground accessibility team, are provided at the Festival. We also strive to make our venues as wheelchair-accessible as possible. </p>
                    </div>
                    
                    <!-- <div class="qa-single">
                        <h3 class="title">how to enter and what are the exits</h3>
                        <p class="desg">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        ncididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div> -->

                    <!-- <div class="qa-single">
                        <h3 class="title">things to know for ease of accesss</h3>
                        <p class="desg">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        ncididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div> -->

                </div>
            </div>

        </div>
    </div>
</section>





<!-- <section class="tinytots-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="title"><span>Children’s</span> Programming</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="tiny-card">
                    <img src="{{url('/image/tiny-dummy.jpg')}}" alt="">
                    <h3 class="title">
                        accelerate your creative process
                    </h3>
                    <p class="desg">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                 <div class="tiny-card">
                    <img src="{{url('/image/tiny-dummy.jpg')}}" alt="">
                    <h3 class="title">
                        accelerate your creative process
                    </h3>
                    <p class="desg">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                    </p>
                </div>
            </div>
            <div class="col-md-4">
            <div class="tiny-card">
                    <img src="{{url('/image/tiny-dummy.jpg')}}" alt="">
                    <h3 class="title">
                        accelerate your creative process
                    </h3>
                    <p class="desg">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                    </p>
                </div>
            </div>
        </div>
    </div>
</section> -->


<section class="insta-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="title"><span>Testimonials</span></h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="saf-testimonials">

                    <div class="single-block">
                        <div class="cstmpadd">
                        <div class="cstm-col">
                            <div class="image-profile">
                                <img src="{{url('/image/Mr-Ojha-Camlin.jpg')}}">
                            </div>
                            <div class="detail-profile">
                                <div class="title">Chandra Shekhar Ojha</div>
                                <div class="desg">Director Sales Kokuyo Camlin</div>
                            </div>
                        </div>
                        <div class="description">
                            I feel privileged and delighted that KCL has been a part of the Serendipity Arts Festival right from its inception, which has allowed me to attend all its editions so far. The festival offers a remarkable range of genres and activities that never fail to pleasantly surprise me with something new every time. This is particularly noteworthy given my extensive experience in the art world spanning over three decades, during which I have traveled widely and attended numerous festivals. Despite the challenges faced after two years, the festival was at par with the previous editions, with great crowds and visitors from all over India. I want to thank the SAF team for making it possible, and a special mention to the enthusiastic volunteers who made a huge contribution to the visitor experience. I hope to witness this grand celebration of arts for years to come." I highly recommend everyone to experience the festival at least once.
                        </div>
                    </div>
                    </div>


                    <div class="single-block">
                        <div class="cstmpadd">
                        <div class="cstm-col">
                            <div class="image-profile">
                                <img src="{{url('/image/Krupa-Shah-Vybe-Brands.jpg')}}">
                            </div>
                            <div class="detail-profile">
                                <div class="title">Krupa Shah</div>
                                <div class="desg">CEO Co-Founder - Vybe Brands</div>
                            </div>
                        </div>
                        <div class="description">
                        Working with the Serendipity Arts Festival has been an incredible experience for IST. As an early-stage start-up in Goa, we were thrilled to have the opportunity to collaborate and showcase our products to a wider audience. The deep consumer love and acceptance we received was heart-warming and encourages us to continue to innovate. We are grateful for the support of the festival team and look forward to continuing this partnership in the future.
                        </div>
                        </div>
                    </div>

                    <div class="single-block">
                    <div class="cstmpadd">
                        <div class="cstm-col">
                            <div class="image-profile">
                                <img src="{{url('/image/Wicher-Slagter-Netherlands-Embassy-in-India.jpg')}}">
                            </div>
                            <div class="detail-profile">
                                <div class="title">Wicher Slagter</div>
                                <div class="desg">First Secretary for Political Affairs, Press and Public Diplomacy | Netherlands Embassy in India</div>
                            </div>
                        </div>
                        <div class="description">
                        The sound installation by Dutch artist, Edwin van der Heijden, showcased at the festival, was a truly unique experience. It made me aware of the power of sound and how it can convey meaning and tell a story. Walking through the HP sound installation was unlike any other art project I have seen in museums, galleries, and exhibitions. Edwin's creativity and ingenuity in transcending traditional art forms are truly reflected in this installation. I am proud that the Netherlands embassy supported this project as part of its cultural program, bringing Dutch and Indian artists together. I hope that visitors of the festival enjoy the experience of walking through this amazing sound installation.
                        </div></div>
                    </div>


                    <div class="single-block">
                    <div class="cstmpadd">
                        <div class="cstm-col">
                            <div class="image-profile">
                                <img src="{{url('/image/Gregoire-Sula.jpg')}}">
                            </div>
                            <div class="detail-profile">
                                <div class="title">Gregoire Verdin</div>
                                <div class="desg">Brand Ambassodor Sula Vineyard</div>
                            </div>
                        </div>
                        <div class="description">
                        I had a fantastic time at Serendipity Arts Festival 2022, thanks to the impressive art installations and the live music. The stage at Dona Paula was beautiful – with amazing performances! It was a pleasure to see such great quality being showcased, especially with a glass of my favourite The Source Grenache rosé wine in hand! Cannot wait to be a part of the next edition. Cheers!
                        </div></div>
                    </div>

                 


                </div>
            </div>

        </div>

        
    </div>
</section>



<!-- <section class="supporters-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="title"><span>Supporters and Friends</span> of the festival</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="supporters">

                    <div class="item">
                        <img src="{{url('/image/logo-2.png')}}" alt="Image"/>
                    </div>
                    <div class="item">
                        <img src="{{url('/image/logo-2.png')}}" alt="Image"/>
                    </div>
                    <div class="item">
                        <img src="{{url('/image/logo-2.png')}}" alt="Image"/>
                    </div>
                    <div class="item">
                        <img src="{{url('/image/logo-2.png')}}" alt="Image"/>
                    </div>
                    <div class="item">
                        <img src="{{url('/image/logo-2.png')}}" alt="Image"/>
                    </div>
                    <div class="item">
                        <img src="{{url('/image/logo-2.png')}}" alt="Image"/>
                    </div>
                    <div class="item">
                        <img src="{{url('/image/logo-2.png')}}" alt="Image"/>
                    </div>
                    <div class="item">
                        <img src="{{url('/image/logo-2.png')}}" alt="Image"/>
                    </div>
                    <div class="item">
                        <img src="{{url('/image/logo-2.png')}}" alt="Image"/>
                    </div>
                    <div class="item">
                        <img src="{{url('/image/logo-2.png')}}" alt="Image"/>
                    </div>

                </div>
            </div>

        </div>

        
    </div>
</section> -->

@endsection


@push('scripts')
<script type="text/javascript">

    $(document).ready(function(){
        
        getHighlights();
        
    });

    function getHighlights(type = null, active_program_index = 0){

        var venue_id = $("#filter-highlight-venue").val();
        var day = $("#highlight-next-btn").attr('data-day');
        day     = parseInt(day) || 1;

        if(type == 'PREV'){

            if(day == 1){
                return false;
            }

            day--;
        } else if(type == 'NEXT'){
           
            day++;
        } else {

           // $("#highlight-next-btn").attr('data-day', day);
        }

        $.ajax({
            type: "GET",
            url: "{{ url('highlights') }}?day="+day+"&venue_id="+venue_id+"&active_program_index="+active_program_index,
            dataType: 'json',
            beforeSend: function(){

                $("#highlights").html(`<div class="row">
                        <div class="col-md-12 text-center">
                            <img class="img-fluid high-load mx-auto d-block" src="${__BASE_URL_JS__ }/image/loader.gif">
                        </div>
                    </div>`);
            },
            success: function (response) {

                if(response?.status){

                    $("#highlights").html(response?.data?.html);
                    $("#dayTitle").text(response?.data?.date);
                    $("#highlight-next-btn").attr('data-day', day);
                    $(".selectpicker").selectpicker('refresh');

                } else {

                    $("#highlights").html('');
                }

            }
        });
    }
</script>

@endpush