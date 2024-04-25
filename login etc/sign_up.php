<?php
$showalert = false;
$showerror = false;
if($_SERVER["REQUEST_METHOD"] =="POST"){
  include '_dbconnect.php';

  $err = "";
  $username = $_POST["username"];
  $password = $_POST["password"];
  $cpassword = $_POST["cpassword"];

  // $exists = false;

  $existSQL = "SELECT * FROM `users` WHERE username = '$username'";
  $result = mysqli_query($con, $existSQL);
  $numExistRow = mysqli_num_rows($result);

  if($numExistRow > 0){
      $showerror = "Username already Exists";
  }
  else{
    // $exists = false;
  if(($password == $cpassword)){
      $hash = password_hash($password, PASSWORD_DEFAULT);
      $sql = "INSERT INTO `users` (`username`, `password`, `date`) VALUES ('$username', '$hash', current_timestamp())";
      $result = mysqli_query($con, $sql);
      if($result){
        $showalert = true;
      }
      
    }
    else
      $showerror = "Passwords do not match ";
  }
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sign Up</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <?php require '_nav.php' ?>
  <?php
      if($showalert){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong>Your account is now created and u can now login.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
      }
      if($showerror){
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Error!</strong> '. $showerror .'
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';;
      }
      
  ?>
      
  <div class="container">
    <h1 class="text-center">Sign up to our site</h1>
    
    <form action="/trail mine/login etc/sign_up.php" method="post">
    <div class="col-mb-6">
      <label for="username" class="form-label">Username</label>
      <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" >
      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="col-mb-6">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" id="password" name="password" >
    </div>
    <div class="col-mb-6">
      <label for="cpassword" class="form-label">Confirm Password</label>
      <div id="emailHelp" class="form-text">Make sure type the same password.</div>
      <input type="password" class="form-control" id="cpassword" name="cpassword" >
    </div>
    
    <button type="submit" class="btn btn-primary">Sign Up</button>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>