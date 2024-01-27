<?php

include('layouts/header.php');
include('server/connection.php');

if(isset($_SESSION['logged_in'])){
  header('location: account.php');
  exit;
}

if(isset($_POST['register'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirmPassword'];

  //if passwords dont match
  if($password !== $confirmPassword){
    header('location: register.php?error=Passwords do not match');
  
  //if password is < 6 character
  }else if(strlen($password) < 6 ){
    header('location: register.php?error=Password must be at least 6 characters');

  //if there is no error
  }else{
    //check if the user has an account
    $stmt1 = $conn->prepare("SELECT count(*) FROM users where user_email=?");
    $stmt1->bind_param('s', $email);
    $stmt1->execute();
    $stmt1->bind_result($num_rows);
    $stmt1->store_result();
    $stmt1->fetch();

    //if the user already registered
    if($num_rows != 0){
      header('location: register.php?error=User with this email already exists');

      //if no user registered with this email before
    }else{
      //create a new user
      $stmt = $conn->prepare("INSERT INTO users (user_name,user_email,user_password)
      VALUES (?,?,?)");

      $stmt->bind_param('sss', $name, $email, md5($password)); 

      //if account was created successfully
      if($stmt->execute()){
        $user_id = $stmt->insert_id;
        $_SESSION['user_id'] = $user_id;
        $_SESSION['user_email'] = $email;
        $_SESSION['user_name'] = $name;
        $_SESSION['logged_in'] = true;
        header('location: account.php?register_success=You registered successfully');

        //account could not be created
      }else{
        header('location: register.php?error=Could not create an account at the moment');
      }
    }
  }
}

  //if the user has already registered, then user to account page


?>

    <!--Register-->
    <section class="my-5 py-5">
      <div class="container text-center my-3 pt-5">
        <h2 class="form-weight-bold">Register</h2>
      </div>
      <div class="mx-auto container">
        <form id="register-form" method="POST" action="register.php">
          <p style="color: #da4f4f;"><?php if(isset($_GET['error'])){ echo $_GET['error']; }?></p>
          <div class="form-group form-floating">
            <input type="text" class="form-control" id="register-name" name="name" placeholder="Name" required>
            <label for="floatingInput">Name</label>
          </div>
          <div class="form-group form-floating">
            <input type="text" class="form-control" id="register-email" name="email" placeholder="Email" required>
            <label for="floatingInput">Email</label>
          </div>
          <div class="form-group form-floating">
            <input type="password" class="form-control" id="register-password" name="password" placeholder="Password" required>
            <label for="floatingInput">Password</label>
          </div>
          <div class="form-group form-floating">
            <input type="password" class="form-control" id="register-confirm-password" name="confirmPassword" placeholder="Confirm Password" required>
            <label for="floatingInput">Confirm Password</label>
          </div>
          <div class="form-group form-floating">
            <input type="submit" class="btn" id="register-btn" name="register" value="Register">
          </div>
          <div class="form-group">
            <a id="login-url" href="login.php" class="btn">Do you have an account? Login</a>
          </div>
        </form>
      </div>
    </section>

<?php 
include('layouts/footer.php');
?>