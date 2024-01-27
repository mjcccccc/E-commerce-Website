<?php

include('layouts/header.php');

if(!empty($_SESSION['cart'])){

  //let user in



  //send user to home
}else{
  header("location: index.php");
}


?>
    <!--Checkout-->
    <section class="my-5 py-5">
      <div class="container text-center my-3 pt-5">
        <h2 class="form-weight-bold">Check Out</h2>
        <hr class="mx-auto">
      </div>
      <div class="mx-auto container">
        <form id="checkout-form" method="POST" action="server/place_order.php">
          <p class="text-center" style="color: #da4f4f;">
          <?php if(isset($_GET['message'])){echo $_GET['message'];} ?> 
          <?php if(isset($_GET['message'])) {?>
            
            <a class="btn btn-primary" href="login.php">Login</a>

          <?php } ?>

        
          </p>
          <div class="form-group checkout-small-element form-floating">
            <input type="text" class="form-control" id="checkout-name" name="name" placeholder="Name" required>
            <label for="floatingInput">Name</label>
          </div>
          <div class="form-group checkout-small-element form-floating">
            <input type="text" class="form-control" id="checkout-email" name="email" placeholder="Email" required>
            <label for="floatingInput">Email</label>
          </div>
          <div class="form-group checkout-small-element form-floating">
            <input type="tel" class="form-control" id="checkout-password" name="phone" placeholder="Phone" required>
            <label for="floatingInput">Phone Number</label>
          </div>
          <div class="form-group checkout-small-element form-floating">
            <input type="text" class="form-control" id="checkout-city" name="city" placeholder="City" required>
            <label for="floatingInput">City</label>
          </div>
          <div class="form-group checkout-large-element form-floating">
            <input type="text" class="form-control" id="checkout-address" name="address" placeholder="Address" required>
            <label for="floatingInput">Address</label>
          </div>
          <div class="form-group checkout-btn-container">
            <p>Total Amount: $<?php echo $_SESSION['total']; ?></p>
            <input type="submit" class="btn" id="checkout-btn" name="place_order" value="Place Order">
          </div>
        </form>
      </div>
    </section>

<?php 
include('layouts/footer.php');
?>