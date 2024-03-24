<?php 
  include 'admin/db_connect.php';
  $product_id = isset($_GET['id']) ? $_GET['id'] : 0;
  $qry = $conn->query("SELECT * FROM product_list WHERE id = $product_id")->fetch_array();
?>
<div class="container-fluid">
    <div class="card">
        <img src="assets/img/<?php echo $qry['img_path'] ?>" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?php echo $qry['name'] ?></h5>
            <p class="card-text truncate"><?php echo $qry['description'] ?></p>
            <div class="form-group">
            </div>
            <div class="row">
                <div class="col-md-2"><label class="control-label">Qty</label></div>
                <div class="input-group col-md-7 mb-3">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-secondary" type="button" id="qty-minus"><span class="fa fa-minus"></span></button>
                    </div>
                    <input type="number" readonly value="1" min="1" class="form-control text-center" name="qty">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-secondary" type="button" id="qty-plus"><span class="fa fa-plus"></span></button>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <button class="btn btn-outline-primary btn-sm btn-block" id="add_to_cart_modal"><i class="fa fa-cart-plus"></i> Add to Cart</button>
                <button class="btn btn-block btn-outline-success" type="button" id="cancel">Cancel Order</button>    
            </div>
        </div>
    </div>
</div>

<style>
    #uni_modal_right .modal-footer {
        display: none;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>


$("#cancel").click(function(){
       
        window.location.href = 'index.php?page=home';
    });

    $('#qty-minus').click(function() {
        var qty = $('input[name="qty"]').val();
        if (qty == 1) {
            return false;
        } else {
            $('input[name="qty"]').val(parseInt(qty) - 1);
        }
    });

    $('#qty-plus').click(function() {
        var qty = $('input[name="qty"]').val();
        $('input[name="qty"]').val(parseInt(qty) + 1);
    });

    $('#add_to_cart_modal').click(function() {
    start_load();
    var selectedQty = $('[name="qty"]').val();
    var availableQty = <?php echo $qry['quantity'] ?>; 

    if (selectedQty > availableQty) {
        Swal.fire({
            icon: 'error',
            title: 'Insufficient Quantity',
            text: 'The selected quantity exceeds the available quantity for this product.',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'
        });
        end_load();
    } else {
        $.ajax({
            url: 'admin/ajax.php?action=add_to_cart',
            method: 'POST',
            data: {
                pid: '<?php echo $product_id ?>',
                qty: selectedQty
            },
            success: function(resp) {
                if (resp == 1) {
                    alert_toast("Order successfully added to cart");
                    $('.item_count').html(parseInt($('.item_count').html()) + parseInt(selectedQty));
                    $('.modal').modal('hide');
                    end_load();
                }
            }
        });
    }
});

</script>
