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
</head>
<style>
  body {
    width: 100%;
    height: calc(100%);
    /* background: #007bff; */
  }
  main#main {
    width: 100%;
    height: calc(100%);
    background: white;
  }
  #login-right {
    position: absolute;
    right: 0;
    width: 40%;
    height: calc(100%);
    background: white;
    display: flex;
    align-items: center;
  }
  #login-right .card {
    margin: auto;
    box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.75); /* Add box shadow styling */
  }
  .logo {
    margin: auto;
    font-size: 8rem;
    background: white;
    border-radius: 50% 50%;
    height: 29vh;
    width: 13vw;
    display: flex;
    align-items: center;
  }
  .logo img {
    height: 80%;
    width: 80%;
    margin: auto;
  }
  .newcontainer {
           
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh;
			margin-left:-260px;
}

.newcontent {
  position: relative;
  width: 400px;
  height: 400px; 
  overflow: hidden;

}

.track {
  position: absolute;
  width:400px;
  height:5px;
  background-color: #333;
  top:300px;
}

.track:before {
  content:"";
  position: absolute;
  width:10px;
  height:5px;
  background-color: #333;
  top:4px;
  box-shadow: 20px 0 #333, -20px 0 #333, -40px 0 #333, -60px 0 #333, -80px 0 #333, 40px 0 #333, 60px 0 #333, 80px 0 #333, 100px 0 #333, 120px 0 #333, 140px 0 #333, 160px 0 #333, 180px 0 #333, 200px 0 #333, 220px 0 #333, 240px 0 #333, 260px 0 #333, 280px 0 #333, 300px 0 #333, 320px 0 #333, 340px 0 #333, 360px 0 #333, 380px 0 #333, 400px 0 #333, 420px 0 #333, 440px 0 #333, -100px 0 #333, -120px 0 #333, -140px 0 #333, 460px 0 #333, 480px 0 #333;
  animation: move 1s linear infinite reverse;
}

@keyframes move {  
  from { left: -100px; }
    to { left: 100px; }
}

.train {
  position: absolute;
  width: 50px;
  height: 30px;
  border:5px solid #333;
  background-color: #9e2a2b;
  border-radius:0 10px 0 0;
  top:230px;
  left:285px;
  animation: scale 2s linear infinite;
}

@keyframes scale {
  0% {transform: scaleY(1);}
  50% {transform: scaleY(0.99);}
  100% {transform: scaleY(1);}
}

.train:before {
  content:"";
  position: absolute;
  border:5px solid #333;
  background-color: #335c67;
  width:35px;
  height:60px;
  left:-45px;
  top:-35px;
}

.train:after {
  position: absolute;
  content:"";
  width: 100px;
  height:5px;
  border-radius:10px;
  border: 5px solid #333;
  background-color: #fff3b0;
  top:30px;
  left:-50px;
}

.front {
  position: absolute;
  border: 5px solid #333;
  background-color: #aed9e0;
  box-shadow: inset 2px -5px rgba(255,255,255,0.3);
  width:20px;
  height:30px;
  left:-37.5px;
  top:-20px;
}

.front:before {
  content:"";
  position: absolute;
  background-color: #333;
  width:15px;
  height:5px;
  border-radius:10px;
  top: 25px;
  left:70px;
  box-shadow: 0px 10px #333, -50px -45px #333, -86px -45px #333, -22px -41px #333,-11px -41px #333;
}

.front:after {
  content:"";
  position: absolute;
  width:12px;
  height:20px;
  border: 5px solid #333;
  left:50px;
  top:-16px;
  background-color:#adb5bd;
}

.wheels {
  position: absolute;
  z-index:1;
}

.smallOne, .smallTwo, .smallThree, .smallFour, .smallFive, .smallSix {
  position: absolute;
  border: 5px solid #333;
  border-radius:50%;
  width: 15px;
  height:15px;
  top:40px;
  background-color: #e09f3e;
  box-shadow: inset 2px 2px white;
  z-index:2;
}

.smallOne {
  left: 30px;
  animation: spin .5s infinite linear;
}

.smallTwo {
  left:0;
  animation: spin .5s infinite linear;
}

.smallThree {
  left:-225px;
  animation: spin .5s infinite linear;
}

.smallFour {
  left:-190px;
  animation: spin .5s infinite linear;
}

.smallFive {
  left:-130px;
  animation: spin .5s infinite linear;
}

.smallSix {
  left:-95px;
  animation: spin .5s infinite linear;
}

.big {
  position: absolute;
  border: 5px solid #333;
  border-radius:50%;
  width:25px;
  height:25px;
  background-color: #e09f3e;
  box-shadow: inset 2px 2px white;
  top:30px;
  left:-40px;
  animation: spin .5s infinite linear;
}

.cord {
  position: absolute;
  width: 10px;
  height:5px;
  background-color: #333;
  top:35px;
  left:-59px;
  z-index:3;
}

.cord:before {
  content:"";
  position: absolute;
  height:5px;
  width: 70px;
  background-color: #333;
  top:15px;
  left:35px;
}

.cord:after {
  content:"";
  position: absolute;
  background-color: #333;
  border-radius:50%;
  width:15px;
  height:15px;
  top:5px;
  left:29px;
}

.coach {
  position: absolute;
  width:80px;
  height:60px;
  border:5px solid #333;
  background-color: #9e2a2b;
  left:-145px;
  top:-20px;
}

.coach:before {
  content:"";
  position: absolute;
  width: 10px;
  height:5px;
  background-color: #333;
  top:50px;
  left:-15px;
}

.coach:after {
  content:"";
  position: absolute;
  width:80px;
  height:60px;
  border:5px solid #333;
  background-color: #335c67;
  top:-5px;
  left:-100px;
}

.coachTwo {
  position: absolute;
  border:5px solid #333;
  background-color: #aed9e0;
  box-shadow: inset 2px -5px rgba(255,255,255,0.3);
  width: 15px;
  height:25px;
  left:-225px;
  top:-5px;
}

.coachTwo:before, .coachTwo:after {
  content:"";
  position: absolute;
  border:5px solid #333;
  background-color: #aed9e0;
  box-shadow: inset 2px -5px rgba(255,255,255,0.3);
  width: 15px;
  height:25px;
  top:-5px;
}

.coachTwo:before {
  left:30px;
}

.coachTwo:after {
  left:90px;
}

.windows {
  position: absolute;
  border:5px solid #333;
  background-color: #aed9e0;
  box-shadow: inset 2px -5px rgba(255,255,255,0.3);
  width: 15px;
  height:25px;
  left:-95px;
  top:-5px;
  z-index:6;
}

.windows:before {
  content:"";
  position: absolute;
  background-color: #333;
  height:5px;
  width: 95px;
  border-radius:10px;
  top:-20px;
  left:-153px;
  box-shadow: 95px 0px #333;
}

.windows:after {
  content:"";
  position: absolute;
  background-color: #333;
  height:5px;
  width:40px;
  top:51px;
  left:-125px;
  box-shadow: 95px 0 #333;
}

@keyframes spin {
  from { transform: rotate(0deg); }
  to { transform: rotate(360deg); }
}

#up {
  position: absolute;
  width: 20px;
  height: 20px;
  background-color: #fff;
  border-radius: 50%;
  opacity: 0;
  top: -30px;
  left: 25.5px;
  z-index:-1;
}

.steam {
  animation: up 2.5s ease-out infinite; 
}

.steam2 {
  animation: up 1.7s ease-out infinite 1s; 
}

.steam2:before {
  content:"";
  position: absolute;
  left:5px;
  width:15px;
  height:15px;
  background-color: #fff;
  border-radius:50%;
  top:20px;
}

@keyframes up {
  0%{
    transform: translateY(0) translateX(0) scale(0.5);
    opacity: 1;
  }
  100%{
    transform: translateY(-110px) translateX(-80px) scale(1.5);
    opacity: 0.2;
  }
}
</style>
<body>
  <marquee behavior="scroll" direction="right" style="margin-top: 40px; font-weight: bold; font-size: 30px;" id="marquee">Admin Login</marquee>
  <div class="newcontainer">
  <div class="newcontent">
    <div class="track"></div>
    <div class="train">
      <div class="front"></div>
      <div class="wheels">
        <div class="smallOne"></div>
        <div class="smallTwo"></div>
        <div class="smallThree"></div>
        <div class="smallFour"></div>
        <div class="smallFive"></div>
        <div class="smallSix"></div>
        <div class="big"></div>
      </div>
      <div class="cord"></div>
      <div class="coach"></div>
      <div class="coachTwo"></div>
      <div class="windows"></div>  
      <div id="up" class="steam"></div>
      <div id="Div1" class="steam2"></div>
    </div>
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
          <center><button class="btn-sm btn-block btn-wave col-md-4 btn-primary">Login</button></center>
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
