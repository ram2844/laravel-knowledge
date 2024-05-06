@extends('layouts.app')

@section('content')

<div class="d-flex flex-column-fluid">
    <div class="container">
        <div class="d-flex flex-row">
            
            <!--begin::Layout-->
            <div class="flex-row-fluid ml-lg-8">
                <!--begin::Section-->
                <div class="card card-custom gutter-b">
                    <!--begin::Header-->
                    @include('flash::message')
                    <div class="card-header flex-wrap border-0 pt-6 pb-0">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label font-weight-bolder font-size-h3 text-dark">My Cart</span>
                        </h3>
                        <div class="card-toolbar">
                            <div class="dropdown dropdown-inline">
                                <a href="#" class="btn btn-primary font-weight-bolder font-size-sm">
                                    Explore More
                                </a>
                            </div>
                        </div>
                    </div>
                    <!--end::Header-->

                    <div class="card-body">
                        <!--begin::Shopping Cart-->
                        <div class="table-responsive">
                            <table class="table">
                                <!--begin::Cart Header-->
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th class="text-right">Price</th>
                                        <th class="text-right">Size</th>
                                        <th class="text-center">Qty</th>
                                        <th class="text-right">Total Price</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <!--end::Cart Header-->

                                <tbody>
                                    <!--begin::Cart Content-->
                                    @php
                                    $subTotal = 0;
                                    @endphp

                                    @if(isset($carts) && !empty($carts))
                                        @foreach($carts as $key => $cart)
                                            @php
                                                $subTotal += ($cart['product']->product_price * ($cart['qty'] ?? 1));
                                            @endphp
                                
                                            <tr>
                                                <td class="d-flex align-items-center font-weight-bolder">
                                                    <!--begin::Symbol-->
                                                    <div class="symbol symbol-60 flex-shrink-0 mr-4 bg-light">
                                                        @if(isset($cart['product']->product_main_image) && !empty($cart['product']->product_main_image))
                                                            <div class="symbol-label" style="background-image: url({{asset('uploads/ecomm_products/thumbnails/250/'.$cart['product']->product_main_image)}})"></div>
                                                        @else
                                                            <div class="symbol-label" style="background-image: url({{asset('media/users/blank.png')}})"></div>
                                                        @endif
                                                    </div>
                                                    <!--end::Symbol-->
                                                </td>
                                                <td class="">
                                                    <a target="_blank" href="{{ route('ecomm.product.details', ['id' => $cart['product_id']]) }}" class="text-dark text-hover-primary">{{ $cart['product']->product_name ?? 'N/A' }}</a>
                                                </td>
                                                
                                                <td class="text-right align-middle font-weight-bolder font-size-h5">
                                                    <i class="fa fa-rupee-sign fa-sm"></i> {{ number_format($cart['product']->product_price, 2) }}
                                                </td>

                                                <td class="text-right align-middle font-weight-bolder font-size-h5">
                                                    {{ $cart['productDetails']->size_name ?? 'N/A' }}
                                                </td>

                                                <td class="text-center align-middle">
                                                    <a href="{{ url('ecomm/cart/update/' . $cart['product_id'] . '/?product_detail_id='.$cart['product_detail_id'] . '&type=decrease') }}" class="btn btn-xs btn-light-success btn-icon mr-2"><i class="ki ki-minus icon-xs cart-qty-icon"></i></a>
                                                    <span class="mr-2 font-weight-bolder"> {{ $cart['qty'] ?? 1 }} </span>
                                                    <a href="{{ url('ecomm/cart/update/' . $cart['product_id'] . '/?product_detail_id='.$cart['product_detail_id'] . '&type=increase') }}" class="btn btn-xs btn-light-success btn-icon"><i class="ki ki-plus icon-xs cart-qty-icon"></i></a>
                                                </td>

                                                <td class="text-right align-middle font-weight-bolder font-size-h5">
                                                    <i class="fa fa-rupee-sign fa-sm"></i> {{ number_format(($cart['product']->product_price * ($cart['qty'] ?? 1)), 2) }}
                                                </td>
                                                <td class="text-right align-middle">
                                                    <a onclick="return confirmRemove('{{ route('cart.remove', ['id' => $key]) }}')" href="javascript:void(0)" class="btn btn-danger font-weight-bolder font-size-sm">
                                                        Remove
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="8" class="border-0 text-center text-danger font-size-h4">
                                                Your calendar is empty
                                            </td>
                                        </tr>
                                    @endif
                                    <!--end::Cart Content-->

                                    @if(isset($carts) && !empty($carts))
                                        <!--begin::Cart Footer-->
                                        <tr>
                                            <td colspan="5"></td>
                                            <td class="font-weight-bolder font-size-h4 text-right">Total Amount</td>
                                            <td class="font-weight-bolder font-size-h4 text-right">
                                                <i class="fa fa-rupee-sign fa-sm"></i>
                                                {{ $subTotal > 0 ? number_format($subTotal, 2) : 'Free' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="8" class="border-0 text-right pt-10">
                                                <a href="{{ route('ecomm.checkout.index') }}" class="btn btn-success font-weight-bolder px-8">Proceed to Checkout ⟶</a>
                                            </td>
                                        </tr>
                                        <!--end::Cart Footer-->
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <!--end::Shopping Cart-->
                    </div>
                </div>
                <!--end::Section-->
            </div>
            <!--end::Layout-->
        </div>
    </div>
</div>


<div class="modal fade" id="confirmRemoveModal" tabindex="-1" role="dialog" aria-labelledby="confirmRemoveModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 800px">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmRemoveModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>

            <div class="modal-body">
                <h4>Do you want to add this program in your wishlist?</h4>
            </div>

            <div class="modal-footer">
                <a href="" class="btn btn-primary font-weight-bold btn-no">No</a>
                <a href="" class="btn btn-primary font-weight-bold btn-yes">Yes</a>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
    <script type="text/javascript">

        function confirmRemove(url){

            $("#confirmRemoveModal").modal('toggle');

            $("#confirmRemoveModal .btn-no").attr('href', url);
            $("#confirmRemoveModal .btn-yes").attr('href', url + '?add-wishlist=1');
        }

    </script>
@endpush