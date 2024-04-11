@include('flash::message')
<div class="row">
    <div class="col-md-12">
        <div class="card card-custom gutter-b">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">Add Members</h3>
                </div>
                <div class="text-right mt-5">
                    <a href="javascript:void(0)" class="add-more-form float-end btn btn-primary">+ Add More</a>
                </div>
            </div>
            <div class="card-body">                
                <div class="row member-form">
                    <div class="col-6">
                        <div class="form-group row validated">
                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Full Name</label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <input type="text" name="name[]" value="{{ old('name.0') }}" class="form-control" placeholder="Enter Full Name"/>
                                @error('name.0')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group row validated">
                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">DOB</label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <div class="input-group date">
                                    <input type="text" name="dob[]" value="{{ old('dob.0') }}" class="form-control kt_datepicker" placeholder="Enter DOB" autocomplete="new dob" readonly/>
                                    @error('dob.0')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="la la-calendar-check-o"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group row validated">
                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Contact</label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <input type="text" oninput="this.value=this.value.replace(/[^0-9]/, '')" name="contact[]" value="{{ old('contact.0') }}" class="form-control" minlength="10" maxlength="10" placeholder="Enter Contact"/>
                                @error('contact.0')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group row validated">
                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Email</label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <input type="text" name="email[]" value="{{ old('email.0') }}" class="form-control" placeholder="Enter Email"/>
                                @error('email.0')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="add-new-forms"></div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4 text-center">
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a class="btn btn-light-danger" href="#">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', '.remove-btn', function() {
            $(this).closest('.member-form').remove();
        });

        $(document).on('click', '.add-more-form', function() {
            var index = $('.member-form').length;
            var newForm = '<div class="row member-form">' + $('.member-form').html().replace(/\[0\]/g, '[' + index + ']') + '<div class="col-12 text-right "><button type="button" class="remove-btn btn btn-danger">Remove</button></div></div><hr>';
            $('.add-new-forms').append(newForm);
        });
    });
</script>

@endpush
