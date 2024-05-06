<div class="modal fade" id="AddToCartModal" tabindex="-1" role="dialog" aria-labelledby="AddToCartModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('ecomm.cart.add') }}" method="GET" autocomplete="off" >
                
                <div class="modal-header">
                    <h5 class="modal-title">Select Size</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="row product-item">
                        <div class="col-md-6">
                            <label class="col-form-label font-weight-bolder">Size</label>
                            <select class="form-control selectpicker product-size" name="product_size" tabindex="null" required>
                                <option value="">Select Size</option>
                                
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="col-form-label font-weight-bolder">Qty</label>
                            <input type="hidden" name="product_id" class="product-id">
                            <input type="number" name="qty" value="1" class="form-control qty input-limit" placeholder="Qty">
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary font-weight-bold external-link-btn">Add To Cart</button>
                </div>
            </form>
        </div>
    </div>
</div>


@push('scripts')

<script type="text/javascript">
    $(document).ready(function(){

        $(".addtocart").click(function(e){

            e.preventDefault();
            $("#AddToCartModal").modal('show');
            getProductSizes(this);

        });

        $("#AddToCartModal .close").click(function(e){

            $("#AddToCartModal").modal('hide');

        });

    });

    function getProductSizes(_this) {

        var product_id = $(_this).parents('.product-item:first').find('.product_id').val();

        $("#AddToCartModal .product-id").val(product_id);

        if(product_id){

            $.ajax({
                type: "GET",
                url: __BASE_URL_JS__ + "/product-sizes/" + product_id,
                datatype: 'json',
                success: function (response) {
                    if(response?.status){
                        var options = '<option value="">Select Size</option>';
                        if(response?.data.length){
                            for (var i = 0; i < response.data.length; i++) {

                                var remainingQty = (response?.data[i]?.stock - response?.data[i]?.used_qty);
                                var isDisabled = '';
                                if(remainingQty == 0){
                                    var isDisabled = 'disabled';
                                }

                                options += '<option data-stock="'+response?.data[i]?.stock+'" '+isDisabled+' value="'+response?.data[i]?.id+'">'+response?.data[i]?.size_name+'</option>';
                            }

                            $('#AddToCartModal .product-size select').html(options);
                            $('#AddToCartModal .product-size select').selectpicker('refresh');
                        }
                    }
                }
            });
        } else {
            $('#AddToCartModal .product-size select').html('<option value="">Select Size</option>');
            $('#AddToCartModal .product-size select').selectpicker('refresh');
        }
    }
</script>

@endpush