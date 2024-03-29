<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Admin | Railway Catering System</title>
  <?php include('./header.php'); ?>
  <?php include('./db_connect.php'); ?>
  <?php 
    session_start();
    if(isset($_SESSION['login_id']))
      header("location:index.php?page=home");

    $query = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
    foreach ($query as $key => $value) {
      if(!is_numeric($key))
        $_SESSION['setting_'.$key] = $value;
    }
  ?>
 <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background-image: url('./../assets/train.jpg');
      background-size: cover;
      background-position: center;
      opacity: 0.8; /* Adjust opacity as needed */
    }

    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .card {
      width: 100%;
      max-width: 500px; 
      background: #fff;
      margin-left:350px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4);
      padding: 20px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    label {
      font-weight: bold;
    }

    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      outline: none;
    }

    button {
      width: 100%;
      padding: 10px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    

    .alert-danger {
      margin-bottom: 20px;
      padding: 10px;
      background-color: #f8d7da;
      color: #721c24;
      border: 1px solid #f5c6cb;
      border-radius: 5px;
    }
  </style>
</head>


  
</style>
<body>
  <marquee behavior="scroll" direction="right" style="margin-top: 40px; font-weight: bold; font-size: 30px;" id="marquee">Admin Login</marquee>
 
  </div> <div id="login-right">
    <div class="card col-md-8">
      <div class="card-body">
        <form id="login-form">
          <div class="form-group">
            <label for="username" class="control-label">Username</label>
            <input type="text" id="username" name="username" class="form-control">
          </div>
          <div class="form-group">
            <label for="password" class="control-label">Password</label>
            <input type="password" id="password" name="password" class="form-control">
          </div>
          <center><button class="btn-sm btn-block btn-wave col-md-4 btn-warning">Login</button></center>
        </form>
      </div>
    </div>
  </div>
</body>
<script>
  $('#login-form').submit(function(e){
    e.preventDefault()
    $('#login-form button[type="button"]').attr('disabled',true).html('Logging in...');
    if($(this).find('.alert-danger').length > 0 )
      $(this).find('.alert-danger').remove();
    $.ajax({
      url:'ajax.php?action=login',
      method:'POST',
      data:$(this).serialize(),
      error:err=>{
        console.log(err)
        $('#login-form button[type="button"]').removeAttr('disabled').html('Login');
      },
      success:function(resp){
        if(resp == 1){
          location.href ='index.php?page=home';
        }else if(resp == 2){
          location.href ='voting.php';
        }else{
          $('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>')
          $('#login-form button[type="button"]').removeAttr('disabled').html('Login');
        }
      }
    })
  })

  var colors = ['#ff0000', '#00ff00', '#0000ff', '#ffff00', '#ff00ff', '#00ffff']; // Add more colors if needed

  var marquee = document.getElementById('marquee');
  var currentIndex = 0;

  setInterval(function() {
    marquee.style.color = colors[currentIndex];
    currentIndex = (currentIndex + 1) % colors.length;
  }, 2000); 
</script> 
</html>
