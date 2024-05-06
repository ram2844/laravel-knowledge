@extends('layouts.app')
<style type="text/css">

    .bootstrap-select>.dropdown-toggle.btn-light, .bootstrap-select>.dropdown-toggle.btn-secondary {
        
        border-color: #000000 !important;
    }


</style>
@section('content')
<section class="saf-dashboard--">
    <div class="container">
        <div class="row dashboard-panel">
            <div class="col-md-3">
                @include('frontend/includes/aside-customer')
            </div>

            <div class="col-md-9">
                <div class="content-area">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-bs">
                        <form action="{{ route('volunteer.banking.update') }}" method="POST" enctype="multipart/form-data">
                            
                            {{ csrf_field() }}

                            <!--Begin::Header-->
                            <div class="card-header pt-0 pb-0">
                                @include('includes.common.error')
                                @include('flash::message')

                                <div class="card-title">
                                    <h3 class="card-label">Volunteer Banking Details Form</h3>
                                </div>
                            </div>
                            <!--end::Header-->
                            <!--Begin::Body-->
                            <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group row validated">
                                        <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Account number </label>
                                        <div class="col-lg-9 col-md-9 col-sm-12">
                                            <input type="text" name="account_number" value="{{ old('account_number', $row->account_number ?? '') }}" class="form-control @error('account_number') is-invalid @enderror" placeholder="Enter Account Number">

                                            @error('account_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group row validated">
                                        <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Re-Enter Account number </label>
                                        <div class="col-lg-9 col-md-9 col-sm-12">
                                            <input type="text" name="re_account_number" value="{{ old('re_account_number', $row->re_account_number ?? '') }}" class="form-control @error('re_account_number') is-invalid @enderror" placeholder="Enter Confirm Account Number">

                                            @error('re_account_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="col-12">
                                    <div class="form-group row validated">
                                        <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Bank Holder Name (As Per Bank Records) </label>
                                        <div class="col-lg-9 col-md-9 col-sm-12">
                                            <input type="text" name="bank_holder_name" value="{{ old('bank_holder_name', $row->bank_holder_name ?? '') }}" class="form-control @error('bank_holder_name') is-invalid @enderror" placeholder="Enter Bank Holder Name (As Per Bank Records)">

                                            @error('bank_holder_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group row validated">
                                        <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Bank Name</label>
                                        <div class="col-lg-9 col-md-9 col-sm-12">
                                            <input type="text" name="bank_name" value="{{ old('bank_name', $row->bank_name ?? '') }}" class="form-control @error('bank_name') is-invalid @enderror" placeholder="Enter Bank Name">

                                            @error('bank_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group row validated">
                                        <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Branch Address</label>
                                        <div class="col-lg-9 col-md-9 col-sm-12">
                                            <input type="text" name="branch_address" value="{{ old('branch_address', $row->branch_address ?? '') }}" class="form-control @error('branch_address') is-invalid @enderror" placeholder="Enter Branch Address">

                                            @error('branch_address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group row validated">
                                        <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">IFSC Code</label>
                                        <div class="col-lg-9 col-md-9 col-sm-12">
                                            <input type="text" name="ifsc_code" value="{{ old('ifsc_code', $row->ifsc_code ?? '') }}" class="form-control @error('ifsc_code') is-invalid @enderror" placeholder="Enter IFSC Code">

                                            @error('ifsc_code')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group row validated">
                                        <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Cancelled Cheque(Image)</label>
                                        <div class="col-lg-9 col-md-9 col-sm-12">
                                            <input type="file" name="cancel_cheque_image" value="" class="form-control @error('cancel_cheque_image') is-invalid @enderror">

                                            Uploaded File: 
                                            @if(isset($row->cancel_cheque_image) && !empty($row->cancel_cheque_image))
                                                <a target="_blank" href="{{ asset('uploads/volunteers/'.$row->cancel_cheque_image) }}">{{$row->cancel_cheque_image}}</a>
                                            @else
                                            N/A
                                            @endif

                                            @error('cancel_cheque_image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group row validated">
                                        <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">PAN Card Number</label>
                                        <div class="col-lg-9 col-md-9 col-sm-12">
                                            <input type="text" name="pancard_number" value="{{ old('pancard_number', $row->pancard_number ?? '') }}" class="form-control @error('pancard_number') is-invalid @enderror" placeholder="Enter PAN Card Number">

                                            @error('pancard_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group row validated">
                                        <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">PAN Card (Image)</label>
                                        <div class="col-lg-9 col-md-9 col-sm-12">
                                            <input type="file" name="pancard_image" value="" class="form-control @error('pancard_image') is-invalid @enderror">

                                            Uploaded File: 
                                            @if(isset($row->pancard_image) && !empty($row->pancard_image))
                                                <a target="_blank" href="{{ asset('uploads/volunteers/'.$row->pancard_image) }}">{{$row->pancard_image}}</a>
                                            @else
                                            N/A
                                            @endif
                                            
                                            @error('pancard_image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            </div>
                            <!--end::Body-->

                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-lg-4"></div>
                                    <div class="col-lg-4 text-center">
                                        <input type="submit" class="theme-btn" value="UPDATE &LongRightArrow;">
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                    <!--end::Card-->
                </div>
            </div>

        </div>
    </div>
</section>
@endsection

@push('scripts')
<script type="text/javascript">
    

</script>
@endpush