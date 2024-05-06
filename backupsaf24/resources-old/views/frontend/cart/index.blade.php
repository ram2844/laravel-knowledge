@extends('layouts.app')

@section('content')

<div class="d-flex flex-column-fluid">
    <div class="container">
        <div class="d-flex flex-row">
            
            <!--begin::Layout-->
            <div class="flex-row-fluid">
                <!--begin::Section-->
                <div class="card card-custom gutter-b">
                    <!--begin::Header-->
                    @include('flash::message')
                    <div class="card-header flex-wrap border-0 pt-6 pb-0 saf-cart-head">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label font-weight-bolder font-size-h3 text-dark">My Calendar</span>
                        </h3>
                        <div class="card-toolbar">
                            <div class="dropdown dropdown-inline">
                                <a href="{{ route('programs') }}" class="btn btn-primary font-weight-bolder font-size-sm">
                                    Explore More
                                </a>
                            </div>
                        </div>
                    </div>
                    <!--end::Header-->

                    <div class="card-body saf-cart-body">
                        <!--begin::Shopping Cart-->
                        <div class="table-responsive">
                            <table class="table">
                                <!--begin::Cart Header-->
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th class="text-right">Price</th>
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
                                                if(\Auth::check() && \Auth::user()->getRoleType() == 'VIP'){

                                                    $cart['program']->amount = 0;
                                                }

                                                $subTotal += ($cart['program']->amount * ($cart['qty'] ?? 1));

                                            @endphp

                                            <tr>
                                                <td class="d-flex align-items-center font-weight-bolder">
                                                    <!--begin::Symbol-->
                                                    <div class="symbol symbol-60 flex-shrink-0 mr-4 bg-light">
                                                        @if(isset($cart['program']->program_image) && !empty($cart['program']->program_image))
                                                            <div class="symbol-label" style="background-image: url({{asset('uploads/programs/thumbnails/250/'.$cart['program']->program_image)}})"></div>
                                                        @else
                                                            <div class="symbol-label" style="background-image: url({{asset('media/users/blank.png')}})"></div>
                                                        @endif
                                                    </div>
                                                    <!--end::Symbol-->
                                                </td>
                                                <td class="">
                                                    <a target="_blank" href="{{ route('program.details', ['id' => $cart['program']->slug]) }}" class="text-dark text-hover-primary">{{ $cart['program']->name ?? 'N/A' }}</a>
                                                </td>
                                                <td class="">
                                                    {{ $cart['programDetails']->formatForAddToCalenderEventDate() ?? 'N/A' }}
                                                </td>
                                                <td class="">
                                                    {{ $cart['programDetails']->formatForAddToCalenderEventTime() ?? 'N/A' }}
                                                </td>
                                                <td class="text-right align-middle font-weight-bolder font-size-h5">
                                                    <i class="fa fa-rupee-sign fa-sm"></i> {{ number_format($cart['program']->amount, 2) }}
                                                </td>
                                                <!-- <td class="text-right align-middle font-weight-bolder font-size-h5">
                                                    {{ $cart['qty'] ?? 1 }}
                                                </td> -->

                                                <td class="text-center align-middle">
                                                    <a href="{{ url('cart/update/' . $cart['program_id'] . '/?program_detail_id='.$cart['program_detail_id'] . '&type=decrease') }}" class="btn btn-xs btn-light-success btn-icon mr-2"><i class="ki ki-minus icon-xs cart-qty-icon"></i></a>
                                                    <span class="mr-2 font-weight-bolder"> {{ $cart['qty'] ?? 1 }} </span>
                                                    <a href="{{ url('cart/update/' . $cart['program_id'] . '/?program_detail_id='.$cart['program_detail_id'] . '&type=increase') }}" class="btn btn-xs btn-light-success btn-icon"><i class="ki ki-plus icon-xs cart-qty-icon"></i></a>
                                                </td>

                                                <td class="text-right align-middle font-weight-bolder font-size-h5">
                                                    <i class="fa fa-rupee-sign fa-sm"></i> {{ number_format(($cart['program']->amount * ($cart['qty'] ?? 1)), 2) }}
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
                                            <td colspan="6"></td>
                                            <td class="font-weight-bolder font-size-h4 text-right">Total Amount</td>
                                            <td class="font-weight-bolder font-size-h4 text-right">
                                                <i class="fa fa-rupee-sign fa-sm"></i>
                                                {{ $subTotal > 0 ? number_format($subTotal, 2) : 'Free' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="8" class="border-0 text-right pt-10">
                                                <a href="{{ route('checkout.index') }}" class="btn btn-success font-weight-bolder px-8">Proceed to check out ⟶</a>
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