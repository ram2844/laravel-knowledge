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
                        <form action="{{ route('store.address') }}" method="POST" enctype="multipart/form-data">

                            {{ csrf_field() }}

                            @include('frontend.accounts.addresses.forms.form')

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

    function getStates(_this, source_id, target_id, title = '', selectedId = 0) {

        var country_id = $('#'+source_id).val();
        if(country_id == '2'){

            $(".other-country-cond").hide();
            $(".other-country-div").show();
            return false;

        } else {
            $(".other-country-cond").show();
            $(".other-country-div").hide();
        }

        if(country_id){
            $.ajax({
                type: "GET",
                url: "{{ url('states') }}/" + country_id,
                datatype: 'json',
                success: function (response) {
                    if(response?.status){
                        var options = '<option value="">Select '+title+'</option>';
                        if(response.data.length) {
                            for (var i = 0; i < response.data.length; i++) {

                                var _selected = '';

                                if(selectedId == response.data[i].id){

                                    _selected = 'selected';
                                }

                                options += '<option '+_selected+' value="'+response.data[i].id+'">'+response.data[i].state_name+'</option>';
                            }

                            $("#"+target_id).html(options);
                            $("#"+target_id).selectpicker('refresh');

                            if(selectedId){
                                getCities(null, 'state_id', 'city_id', 'State', <?php echo old( 'city_id', $row->city_id ?? 0 )?>);
                            }
                        }
                    }
                }
            });
        } else {
            $("#"+target_id).html('<option value="">Select '+title+'</option>');
            $("#"+target_id).selectpicker('refresh');
        }
    }

    function getCities(_this, source_id, target_id, title = '', selectedId = 0) {

        var state_id = $('#'+source_id).val();
        if (state_id){
            $.ajax({
                type: "GET",
                url: "{{ url('cities') }}/" + state_id,
                datatype: 'json',
                success: function (response) {
                    if(response?.status){
                        var options = '<option value="">Select '+title+'</option>';
                        if(response.data.length){
                            for (var i = 0; i < response.data.length; i++) {

                                var _selected = '';

                                if(selectedId == response.data[i].id){

                                    _selected = 'selected';
                                }

                                options += '<option '+_selected+' value="'+response.data[i].id+'">'+response.data[i].city_name+'</option>';
                            }

                            $("#"+target_id).html(options);
                            $("#"+target_id).selectpicker('refresh');
                        }
                    }
                }
            });
        } else {
            $("#"+target_id).html('<option value="">Select '+title+'</option>');
            $("#"+target_id).selectpicker('refresh');
        }
    }
    
    $(document).ready(function(){
        
        getStates(null, 'country_id', 'state_id', 'State', <?php echo old( 'state_id', $row->state_id ?? 0 )?>);
        getCities(null, 'state_id', 'city_id', 'City', <?php echo old( 'city_id', $row->city_id ?? 0 )?>);
        
    });

    
</script>
@endpush