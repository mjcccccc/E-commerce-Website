<?php

include('layouts/header.php');

include('server/connection.php');

if(!isset($_SESSION['logged_in'])){
  header('location: login.php');
  exit;
}


if(isset($_GET['logout'])){
  if(isset($_SESSION['logged_in'])){
    unset($_SESSION['logged_in']);
    unset($_SESSION['user_email']);
    unset($_SESSION['user_name']);
    header('location: login.php');
    exit;
  }
}

if(isset($_POST['change_password'])){
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirmPassword'];
  $user_email = $_SESSION['user_email'];


  //if passwords dont match
  if($password !== $confirmPassword){
    header('location: account.php?error=Passwords do not match');
  
  //if password is < 6 character
  }else if(strlen($password) < 6 ){
    header('location: account.php?error=Password must be at least 6 characters');

  //no errors
  }else{
    $stmt = $conn->prepare("UPDATE users SET user_password=? WHERE user_email=?");
    $stmt->bind_param('ss', md5($password),$user_email);

    if($stmt->execute()){
      header('location: account.php?message=Password has been updated successfully');
    }else{
      header('location: account.php?error=Could not update password');
    }
  }
}


//get orders
if(isset($_SESSION['logged_in'])){

  $user_id = $_SESSION['user_id'];

  $stmt = $conn->prepare("SELECT * FROM orders WHERE user_id=?");

  $stmt->bind_param('i', $user_id);

  $stmt->execute();

  $orders = $stmt->get_result();

}


?>

    <!--Account-->
    <section class="mt-4 pt-4">
      <div class="row container mx-auto">
        <?php if(isset($_GET['payment_message'])) {?>
          <p class="mt-5 text-center" style="color: green;"><?php echo $_GET['payment_message']; ?></p>
        <?php } ?>
        <div class="account-section text-center mt-3 pt-5 col-lg-6 col-md-12 col-sm-12">
          <div class="my-2 py-2">
            <p style="color: green;"><?php if(isset($_GET['register_success'])){ echo $_GET['register_success']; }?></p>
            <p style="color: green;"><?php if(isset($_GET['login_success'])){ echo $_GET['login_success']; }?></p>
          </div>
          <h3 class="font-weight-bold">Account Info</h3>
          <hr class="mx-auto">
          <div class="account-info">
            <div class="my-3"> 
              <p class="mb-0 fw-bold">Name</p>
              <span><?php if(isset($_SESSION['user_name'])){ echo $_SESSION['user_name'];} ?></span>
            </div>
            <div class="my-3">
              <p class="mb-0 fw-bold">Email</p>
              <span><?php if(isset($_SESSION['user_email'])){ echo $_SESSION['user_email'];} ?></span>
            </div>
            <p class="mt-4 pt-4"><a href="#orders" id="orders-btn">Your Orders</a></p>
            <p><a href="account.php?logout=1" id="logout-btn">Logout</a></p>
          </div>
        </div>

        <div class="text-center d-flex justify-content-center mt-3 pt-5 col-lg-6 col-md-12 col-sm-12">
          <form id="account-form" method="POST" action="account.php">
            <div class="my-2 py-2">
              <p style="color: #da4f4f;"><?php if(isset($_GET['error'])){ echo $_GET['error']; }?></p>
              <p style="color: green;"><?php if(isset($_GET['message'])){ echo $_GET['message']; }?></p>
            </div>
            <h3>Change Password</h3>
            <hr class="mx-auto">
            <div class="form-group form-floating">
              <input type="password" class="form-control" id="account-password" name="password" placeholder="Password" required>
              <label for="floatingInput">Password</label>
            </div>
            <div class="form-group form-floating">
              <input type="password" class="form-control" id="account-password-confirm" name="confirmPassword" placeholder="Confirm Password" required>
              <label for="floatingInput">Confirm Password</label>
            </div>

            <div class="form-group">
              <input type="submit" value="Change Password" name="change_password" class="btn" id="change-pass-btn">
            </div>
          </form>
        </div>
      </div>
    </section>

    <!--Order -->
    <section id="orders" class="orders container my-5 py-3">
      <div class="container mt-2">
        <h2 class="font-weight-bold text-center my-0 py-0">Your Order</h2>
        <hr class="mx-auto">
      </div>

      <table class="mt-5 pt-5">
        <tr>
          <th>Order Id</th>
          <th>Order Cost</th>
          <th>Order Status</th>
          <th>Order Date</th>
          <th>Order Details</th>
        </tr>

        <?php while($row = $orders->fetch_assoc()){ ?>

          <tr>
            <td>
              <!--
              <div>
                <img src="./assets/imgs/feature1.jpeg">
                <div>
                  <p class="mt-3"><?php echo $row['order_id']; ?></p>
                </div>
              </div>
              -->
              <span><?php echo $row['order_id']; ?></span>
            </td>
            <td>
              <span><?php echo $row['order_cost']; ?></span>
            </td>
            <td>
              <span><?php echo $row['order_status']; ?></span>
            </td>
            <td>
              <span><?php echo $row['order_date']; ?></span>
            </td>
            <td>
              <form method="POST" action="order_details.php">
                <input type="hidden" value="<?php echo $row['order_status']; ?>" name="order_status">
                <input type="hidden" value="<?php echo $row['order_id']; ?>" name="order_id">
                <input class="btn order-details-btn" name="order_details_btn" type="submit" value="Details">
              </form>
            </td>
          </tr>

        <?php } ?>


      </table>
    </section>

<?php 
include('layouts/footer.php');
?>