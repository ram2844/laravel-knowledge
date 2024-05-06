@extends('layouts.app')

@section('content')

<img src="https://vacationmart.o18.click/p?m=7533&t=i&gb=1" width="0px" height="0px">

<section class="confirmpage">
	<div class="container">
	    <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="message-card">
                   
                    <h1 class="title" style="font-size:36px; color:#000;">Registration successful.</h1>
                    <p class="desc" style="font-size:18px; color:#000;">Redirecting in 4 seconds.</p>
                    <br/>
                    <a style="background:#000; padding:12px 20px; color:#fff;" href="{{ route('programs') }}">Continue...</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection         

@push('pixelCode')

<!-- Meta Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '333234732624008');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=333234732624008&ev=PageView&noscript=1"
/></noscript>
<!-- End Meta Pixel Code -->
@endpush

@push('scripts')
<!-- Event snippet for Submit_Registrations conversion page -->
<script>
    jQuery(document).ready(function() {

        gtag('event', 'conversion', {'send_to': 'AW-11381686179/v8_gCNKhze4YEKP_mrMq'}); // old
        gtag('event', 'conversion', {'send_to': 'AW-11386587174/aYpsCKO5xu8YEKaQxrUq'}); // new 

        gtag('event', 'conversion', {'send_to': 'AW-11385051980/S2aDCJvch_IYEMy26LQq'});

        gtag('event', 'conversion', {'send_to': 'AW-11385052634/09vqCOjqh_IYENq76LQq'});

        gtag('event', 'conversion', {'send_to': 'AW-11384929312/5HNDCNeMiPIYEKD44LQq'});

        gtag('event', 'conversion', {'send_to': 'AW-11385053660/nYUMCNzshPIYENzD6LQq'});


        setTimeout(function(){
            window.location.replace(__BASE_URL_JS__ + '/programs');
        }, 4000)
    });
</script>
@endpush
