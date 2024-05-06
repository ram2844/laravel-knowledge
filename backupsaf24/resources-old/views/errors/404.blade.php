@extends('layouts.app')

@section('content')

<style>



.error-page{
    padding: 80px 0px 120px 0px;
}

.error-page .error-card{
    background: #f1f2f2;
    border-radius: 0px;
    text-align: center;
    padding: 40px 40px 40px 40px;
    border-bottom: 5px solid #000000;
}


@media (max-width:767px){
    .error-page .error-card{
        margin: 15px 15px 15px 15px;
        padding: 30px 30px 30px 30px;
    }
}

.error-page .error-card .title{
    text-transform: uppercase;
    color: #000000;
    font-size: 52px;
}

.error-page .error-card .title span{
    font-size: 38px;
}

.error-page .error-card .description{
    font-size: 26px;
    line-height: 32px;
    margin-bottom: 20px;
}




</style>

<section class="error-page">
    <div class="container">
            <div class="row justify-content-center">
            <div class="col-md-6 error-card">
                <div class="title">
                    404 <span>Error</span>
                </div>
                <div class="description">
                 This page does not exist.
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
