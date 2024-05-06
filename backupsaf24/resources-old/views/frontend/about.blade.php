@extends('layouts.app')

@section('content')

<section class="saf-programpage">
    <div class="container">
        
        <div class="row">
            <div class="col-md-12">
                <div class="program-featureimg">
                    <!-- <img src="http://saf23.demoserver.co.in/image/programsingleimg.jpg"> -->
                    <img src="{{url('/image/SAF19RRIMGHR 5.jpg')}}">
                </div>
            </div>
        </div>

        <div class="row mt-10">
            <div class="col-md-9">
                <div class="programsingle">
                    <h3 class="title">About Serendipity Arts</h3>
                    <div class="description">
                        <p>Serendipity Arts is an arts and cultural development foundation created to encourage and support the arts as a significant contributor to society. It aims to promote new creative strategies, artistic interventions, and cultural partnerships that are responsive and seek to address the social, cultural, and environmental milieu of South Asia. Committed to innovation, Serendipity Arts (SA) intends to promote and create platforms for creativity, providing the wider public with a unique source of contemporary art and culture. SA programmes are designed and initiated through collaborations with partners across a multitude of fields, and each intervention uses the arts to impact education, create social initiatives, foster community development, and explore multi-disciplinarity forays in the arts, with a special focus on South Asia.</p>
                    </div>
                </div>

                <div class="programsingle">
                    <h3 class="title">About Serendipity Arts Festival</h3>
                    <div class="description">
                        <p>The Foundation's primary initiative and largest project, Serendipity Arts Festival is a multi-disciplinary arts event held annually every December in Goa. Curated by a panel of eminent artists and institutional figures, the Festival is a long-term cultural project that hopes to instigate positive change across the arts in India on a large scale. Spanning the visual, performing and culinary arts, the Festival’s programming includes music, dance, visual arts, craft, photography, film, and theatre. The Festival addresses pressing social issues such as arts education and pedagogy, cultural patronage, interdisciplinary discourse, and access to the arts. Serendipity Arts Festival’s intensive programme of exhibitions and performances is energised by spaces for social and educational engagement. Serendipity Arts Festival will take place in Goa from 15-23 December 2023. This is the 8th edition of the festival, of which two were digitally presented in 2020 and 2021, respectively.</p>
                    </div>
                </div>
                
            </div>

            <div class="col-md-3">
                <div class="programrightblock">
                    <div class="partners">
                        <h3 class="title">Serendipity Arts Foundation</h3>
                        
                        <a href="https://serendipityarts.org/" target="_blank"><img src="https://serendipityarts.org/wp-content/uploads/2020/10/Logo-SVG.svg"></a>
                    </div>
                </div>
            </div>
        </div>
              
    </div>
</section>

@endsection