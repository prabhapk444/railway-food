
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

$mail = new PHPMailer(true);
try {
  
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'karanprabha22668@gmail.com'; 
    $mail->Password   = 'hrmq uoyw zory obcg';
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    
    $mail->setFrom('karanprabha22668@gmail.com', 'Admin');
    $mail->addAddress($email, $first_name . ' ' . $last_name); 

 
    $mail->isHTML(true);
    $mail->Subject = 'Order Confirmation';
    $mail->Body    = "Dear $first_name $last_name,<br><br>Your order has been successfully placed.";

    $mail->send();
    echo json_encode(array("status" => "success"));
} catch (Exception $e) {
    echo json_encode(array("status" => "error", "message" => $mail->ErrorInfo));
}
?>