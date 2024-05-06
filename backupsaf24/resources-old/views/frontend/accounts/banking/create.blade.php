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
                        <form action="{{ route('volunteer.banking.store') }}" method="POST" enctype="multipart/form-data">
                            
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
                                            <input type="text" name="accnum" value="" class="form-control" placeholder="Enter Account Number">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group row validated">
                                        <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Re-Enter Account number </label>
                                        <div class="col-lg-9 col-md-9 col-sm-12">
                                            <input type="text" name="reaccnum" value="" class="form-control" placeholder="Enter Confirm Account Number">
                                        </div>
                                    </div>
                                </div>


                                <div class="col-12">
                                    <div class="form-group row validated">
                                        <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Bank Holder Name (As Per Bank Records) </label>
                                        <div class="col-lg-9 col-md-9 col-sm-12">
                                            <input type="text" name="bankholdername" value="" class="form-control" placeholder="Enter Bank Holder Name (As Per Bank Records)">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group row validated">
                                        <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Bank Name</label>
                                        <div class="col-lg-9 col-md-9 col-sm-12">
                                            <input type="text" name="bankname" value="" class="form-control" placeholder="Enter Bank Name">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group row validated">
                                        <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Branch Address</label>
                                        <div class="col-lg-9 col-md-9 col-sm-12">
                                            <input type="text" name="branchaddress" value="" class="form-control" placeholder="Enter Branch Address">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group row validated">
                                        <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">IFSC Code</label>
                                        <div class="col-lg-9 col-md-9 col-sm-12">
                                            <input type="text" name="ifsccode" value="" class="form-control" placeholder="Enter IFSC Code">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group row validated">
                                        <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Cancelled Cheque(Image)</label>
                                        <div class="col-lg-9 col-md-9 col-sm-12">
                                            <input type="file" name="cancheq" value="" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group row validated">
                                        <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">PAN Card Number</label>
                                        <div class="col-lg-9 col-md-9 col-sm-12">
                                            <input type="text" name="pannum" value="" class="form-control" placeholder="Enter PAN Card Number">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group row validated">
                                        <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">PAN Card (Image)</label>
                                        <div class="col-lg-9 col-md-9 col-sm-12">
                                            <input type="file" name="panimage" value="" class="form-control">
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