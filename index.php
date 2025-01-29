<?php
include_once("system/connexpdo.php");

if(isset($_POST['btn'])){
  //retrouver les information de la form et energistrer cets information
  $email = $_POST['txt_email'];
  $passw = $_POST['txt_pass'];
  //connection et query database
  echo($email." ".$passw);
  $select = connexpdo("unite")->prepare("select * from access where email = '$email' AND password ='$passw'");
  $select->execute();
  $row = $select->fetch(PDO::FETCH_ASSOC);
  if(is_array($row)){
    if($row['email']==$email && $row['password']==$passw){
     $services = $row['service'];
     switch($services){
      case 'parc':
        if($row['role'] == "user"){
          header('refresh:1;system/parc/parcuser.php');
        }else{
          header('refresh:1;system/parc/parcadmin.php');
        }
     }
    }
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>System</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b style="color:tomato">TIARET</b>UNITE</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Connection</p>

      <form action="#" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name ="txt_email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name ="txt_pass">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" name="btn">Connecte</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- /.social-auth-links -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>

</body>
</html>
