@extends('layouts.app')
@section('content')

@push('style')
<link rel="stylesheet" href="{{ asset('css/swiper.min.css') }}" />
<link rel="stylesheet" href="{{ asset('css/easyzoom.css') }}" />

<style type="text/css">
        
    .product__carousel {
        display: block;
    }

    .product__carousel .gallery-top {
        border: 1px solid #ebebeb;
        border-radius: 3px;
        margin-bottom: 5px;
    }

    .product__carousel .gallery-top .swiper-slide {
        position: relative;
        overflow: hidden;
    }

    .product__carousel .gallery-top .swiper-slide a {
        position: relative;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        width: 100%;
        height: 100%;
    }

    .product__carousel .gallery-top .swiper-slide a img {
        width: 100%;
        height: 100%;
        -o-object-fit: cover;
        object-fit: cover;
    }

    .product__carousel .gallery-top .swiper-slide .easyzoom-flyout img {
        min-width: 100%;
        min-height: 100%;
    }

    .product__carousel .swiper-button-next.swiper-button-white,
    .product__carousel .swiper-button-prev.swiper-button-white {
        color: #ff3720;
        display:none;
    }

    .gallery-parent{
        display:flex;
    }

    .product__carousel .gallery-thumbs{
        width:15%;
        height: 100%!important;
    }

    .product__carousel .gallery-top{
        width:85%;
    }

    .gallery-thumbs .swiper-wrapper{
        display: inline-grid!important;
    }

    .product__carousel .gallery-thumbs .swiper-slide {
        position: relative;
        -webkit-transition: border 0.15s linear;
        transition: border 0.15s linear;
        border: 1px solid #ebebeb;
        border-radius: 0px;
        cursor: pointer;
        overflow: hidden;
        height: 71px;
        width: 90%!important;
        margin-bottom:10px;
    }

    .product__carousel .gallery-thumbs .swiper-slide.swiper-slide-thumb-active {
        border-color: #000;
    }



    .product__carousel .gallery-thumbs .swiper-slide img {
        position: absolute;
        left: 50%;
        top: 50%;
        -webkit-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        max-width: 100%;
    }

    .singlchart a{
        text-decoration:underline;
        color:blue;
        text-transform:uppercase;
    }

.lk-btn{
    color: var(--black-primary);
    text-decoration: underline;
    font-size: 24px;
    text-transform: capitalize;
    margin-top: 5px;
    display: block;
    width: max-content;
}


.lk-btn:hover{
    text-decoration:none;
    color: var(--black-primary);
}

@media (max-width:767px){
    .product__carousel .gallery-thumbs{
        width: 15%;
        height: 42vw!important;
    }
}

</style>
@endpush

<section class="saf-singleproductpage">
    <div class="container">
        <div class="row">
            @include('flash::message')
            <div class="col-md-8" style="margin-bottom:50px;">
               <a class="lk-btn" href="/shop/">← Back</a>
            </div>
        </div>

        <div class="row pb-20">
            <div class="col-md-1"></div>
            <div class="col-md-6 product__carousel">
                <!-- <div class="product-singleimg">
                    <img src="{{ url('uploads/ecomm_products/').'/'.$product->product_main_image }}" alt="{{$product->product_name}}" width="90%">
                </div> -->

                <div class="gallery-parent">
                    <!-- SwiperJs and EasyZoom plugins start -->

                    
                    <div class="swiper-container gallery-thumbs">
                        <div class="swiper-wrapper" style="display:block;">
                            <div class="swiper-slide">
                                <img src="{{ url('uploads/ecomm_products/').'/'.$product->product_main_image }}" alt="" />
                            </div>

                            @if($product->productGallery->count())
                                @foreach($product->productGallery as $key => $value)
                                    <div class="swiper-slide">
                                        <img src="{{ url('uploads/ecomm_products/').'/'.$value->image }}" alt="" />
                                    </div>

                                @endforeach
                            @endif
                        </div>
                    </div>

                    <div class="swiper-container gallery-top">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide easyzoom easyzoom--overlay">
                                <a href="{{ url('uploads/ecomm_products/').'/'.$product->product_main_image }}">
                                    <img src="{{ url('uploads/ecomm_products/').'/'.$product->product_main_image }}" alt="" />
                                </a>
                            </div>

                            @if($product->productGallery->count())
                                @foreach($product->productGallery as $key => $value)
                                    <div class="swiper-slide easyzoom easyzoom--overlay">
                                        <a href="{{ url('uploads/ecomm_products/').'/'.$value->image }}">
                                            <img src="{{ url('uploads/ecomm_products/').'/'.$value->image }}" alt="" />
                                        </a>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <!-- Add Arrows -->
                        <div class="swiper-button-next swiper-button-white"></div>
                        <div class="swiper-button-prev swiper-button-white"></div>
                    </div>
                    
                    
                    <!-- SwiperJs and EasyZoom plugins end -->
                </div>

            </div>
            <div class="col-md-5">
                <div class="single-detail">
                    <div class="category-name">{{$product->category->name ?? 'N/A'}}</div>
                    <div class="product-name">{{$product->product_name}}</div>
                    <div class="product-price">₹ {{$product->product_price}}</div>
                    <div class="singlchart"><a href="javascript:void(0)">Size chart</a></div>

                    <form action="{{ route('ecomm.cart.add') }}" method="GET" id="addToCartForm" autocomplete="off">
                        <div class="radio-toolbar">

                            @if($product->productDetails->count())
                                @foreach($product->productDetails as $key => $value)
                                    <input type="radio" id="radio{{$key+1}}" name="product_size" value="{{ $value->id }}" {{ $key == 0 ? 'checked' : '' }}>
                                    <label for="radio{{$key+1}}">{{$value->size_name}}</label>
                                @endforeach
                            @endif
                        </div>

                        <div class="single-quantity">
                            <label>Quantity</label>
                            <select class="form-control" name="qty">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>

                        <div class="singleaction">
                            <button type="button" onclick="$('#addToCartForm').attr('action', '{{ route("ecomm.wishlist.add") }}');$('#addToCartForm').submit();" class="icon-wishlist border-0"><i class="fa fa-heart"></i></button>
                            <input type="hidden" name="product_id" class="product_id" value="{{$product->id}}">
                            <div class="addtocartbtn"><input type="submit" value="Add to cart"></div>
                        </div>

                        <div class="socialshare">
                        <div class="social-icon">
                                <h4>Share</h4>
                                <a href="" target="_blank"><i class="fab fa-instagram"></i></a>
                                <a href="" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                <a href="" target="_blank"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Product Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Product Description</a>
                    </li>
                </ul><!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="tabs-1" role="tabpanel">
                        <p>First Panel</p>
                    </div>
                    <div class="tab-pane" id="tabs-2" role="tabpanel">
                        <p>Second Panel</p>
                    </div>
                </div>
            </div>
        </div>

        @if($similarProducts->count())
            <div class="row">
                <div class="col-md-12">
                    <h3 class="viewmore-title">View more items</h3>
                </div>
            </div>

            <div class="row view-moreitems">
                @foreach($similarProducts as $value)
                    <div class="col-md-3">
                        <a href="{{ route('ecomm.product.details', ['id' => $value->slug]) }}">
                            <div class="product-card">
                                <div class="imgblock">
                                    <img src="{{ url('uploads/ecomm_products/thumbnails/250').'/'.$value->product_main_image }}" alt="">
                                </div>
                                <div class="product-detail">
                                    <div class="catg-name">
                                        <div class="category-name">{{$value->category->name ?? 'N/A'}}</div>
                                        <div class="product-name">{{$value->product_name}}</div>
                                        <div class="product-price">₹ {{$value->product_price}}</div>
                                    </div>
                                    <div class="actionbtn">
                                        <div class="icon-wishlist"><i class="fa fa-heart"></i></div>
                                        <input type="hidden" name="product_id" class="product_id" value="{{$value->id}}">
                                        <div class="addtocart">Add to cart</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>


@include('frontend.ecomm.inc.add_to_cart_modal')

@endsection


@push('scripts')

<script src="{{ asset('js/swiper.min.js') }}"></script>
<script src="{{ asset('js/easyzoom.js') }}"></script>
<script type="text/javascript">
    // product Gallery and Zoom
    $('.gallery-parent').each(function () {
        // We finding any "gallery-parent" and find child with class "gallery-top" and "gallery-thumbs" for multiple using plugin
        let thumbs = $(this).children('.gallery-thumbs'),
            top = $(this).children('.gallery-top');

        // activation carousel plugin
        let galleryThumbs = new Swiper(thumbs, {
            spaceBetween: 5,
            freeMode: true,
            watchSlidesVisibility: true,
            watchSlidesProgress: true,
            breakpoints: {
                0: {
                    slidesPerView: 4,
                },
                992: {
                    slidesPerView: 8,
                },
            },
        });
        let galleryTop = new Swiper(top, {
            spaceBetween: 10,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            thumbs: {
                swiper: galleryThumbs,
            },
        });

        // change carousel item height
        // gallery-top
        let productCarouselTopWidth = top.outerWidth();
        top.css('height', productCarouselTopWidth);

        // gallery-thumbs
        let productCarouselThumbsItemWith = thumbs.find('.swiper-slide').outerWidth();
        thumbs.css('height', productCarouselThumbsItemWith);
    });

    // activation zoom plugin
    let $easyzoom = $('.easyzoom').easyZoom();

</script>
@endpush