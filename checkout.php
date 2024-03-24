
<?php
require '././PHPMailer/src/Exception.php';
require '././PHPMailer/src/PHPMailer.php';
require '././PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$first_name = isset($_SESSION['login_first_name']) ? $_SESSION['login_first_name'] : '';
$last_name = isset($_SESSION['login_last_name']) ? $_SESSION['login_last_name'] : '';
$email = isset($_SESSION['login_email']) ? $_SESSION['login_email'] : '';
$train_name = isset($_SESSION['login_train']) ? $_SESSION['login_train'] : '';
$amount = isset($_SESSION['total_amount']) ? $_SESSION['total_amount'] : '';
date_default_timezone_set('Asia/Kolkata');
$current_date_time = date('Y-m-d H:i:s');


$user_mail = new PHPMailer(true);
try {
    $user_mail->isSMTP();
    $user_mail->Host       = 'smtp.gmail.com';
    $user_mail->SMTPAuth   = true;
    $user_mail->Username   = 'karanprabha22668@gmail.com'; 
    $user_mail->Password   = 'hrmq uoyw zory obcg';
    $user_mail->SMTPSecure = 'tls';
    $user_mail->Port       = 587;
    $user_mail->setFrom('karanprabha22668@gmail.com', 'Admin');
    $user_mail->addAddress($email, $first_name . ' ' . $last_name); 

    $user_mail->isHTML(true);
    $user_mail->Subject = 'Order Confirmation';
    $user_mail->Body    = "Dear $first_name $last_name,<br><br>Your order has been successfully placed.<br><br>Train Name: $train_name<br>Amount: $amount<br>Date and Time: $current_date_time";

    $user_mail->send();
} catch (Exception $e) {
   
}

require("./admin/db_connect.php");
$admin_mail = new PHPMailer(true);
try {
    $admin_mail->isSMTP();
    $admin_mail->Host       = 'smtp.gmail.com';
    $admin_mail->SMTPAuth   = true;
    $admin_mail->Username   = 'karanprabha22668@gmail.com'; 
    $admin_mail->Password   = 'hrmq uoyw zory obcg';
    $admin_mail->SMTPSecure = 'tls';
    $admin_mail->Port       = 587;
    $admin_mail->setFrom('marumitha67@gmail.com', 'Admin');
    $admin_mail->addAddress('marumitha67@gmail.com', 'employee'); 
    $admin_mail->isHTML(true);
    $admin_mail->Subject = 'New Order Placed';
    $admin_mail->Body    = "A new order has been placed.<br><br>User: $first_name $last_name<br>Email: $email<br>Train Name: $train_name<br>Amount: $amount<br>Date and Time: $current_date_time";
    $admin_mail->send();
} catch (Exception $e) {
}
?>


<header class="masthead">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-10 align-self-end mb-4 page-title">
                	<h3 class="text-white">Checkout</h3>
                    <hr class="divider my-4" />

                </div>
                
            </div>
        </div>
    </header>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="" id="checkout-frm">
                    <h4>Confirm Delivery Information</h4>
                    <div class="form-group">
                        <label for="" class="control-label">Firstname</label>
                        <input type="text" name="first_name" required="" class="form-control" value="<?php echo $_SESSION['login_first_name'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Last Name</label>
                        <input type="text" name="last_name" required="" class="form-control" value="<?php echo $_SESSION['login_last_name'] ?>">
                    </div>
                    <div class="form-group">
                    <label for="" class="control-label">Total Amount</label>
                    <input type="text" name="price" class="form-control" value="<?php echo isset($_SESSION['total_amount']) ? $_SESSION['total_amount'] : '0.00'; ?>" readonly>
                </div>
                    <div class="form-group">
                        <label for="" class="control-label">Contact</label>
                        <input type="text" name="mobile" required="" class="form-control" value="<?php echo $_SESSION['login_mobile'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Address</label>
                        <textarea cols="30" rows="3" name="address" required="" class="form-control"><?php echo $_SESSION['login_address'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Train Name</label>
                        <input type="text" name="train" required class="form-control" value="<?php echo $_SESSION['login_train'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Email</label>
                        <input type="email" name="email" required="" class="form-control" value="<?php echo $_SESSION['login_email'] ?>">
                    </div>  

                    <div class="text-center">
                    <button type="submit" name="submit" class="btn btn-block btn-outline-primary">Place Order</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
$(document).ready(function(){
    $('#checkout-frm').submit(function(e){
        e.preventDefault();
        start_load();
        var form_data = $(this).serialize();
        $.ajax({
            url: "admin/ajax.php?action=save_order",
            method: 'POST',
            data: form_data,
            success: function(resp){
                if(resp == 1){
                    alert_toast("Order successfully Placed.");
                    setTimeout(function(){
                        location.replace('index.php?page=home');
                    }, 1500);
                }
            }
        });
    });
});

</script>
