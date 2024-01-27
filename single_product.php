<?php

include('layouts/header.php');
include('server/connection.php');

if(isset($_GET['product_id'])){

  $product_id = $_GET['product_id'];

  $stmt = $conn->prepare("SELECT * FROM products WHERE product_id = ?");
  $stmt->bind_param("i", $product_id);
  $stmt->execute();

  $products = $stmt->get_result();

//no product id was given
}else{
  header('location: index.php');
}

?>
    <!--Product-->
    <section class="container single-product my-5 pt-5">
      <div class="row mt-5">

      <?php while($row = $products->fetch_assoc()){?>

        <div class="col-lg-5 col-md-6 col-sm-12">
          <img class="img-fluid w-100 pb-1" src="./assets/imgs/<?php echo $row['product_image']; ?>" id="mainImg">
          <div class="small-img-group">
            <div class="small-img-col">
              <img src="./assets/imgs/<?php echo $row['product_image']; ?>" width="100%" class="small-img">
            </div>
            <div class="small-img-col">
              <img src="./assets/imgs/<?php echo $row['product_image2']; ?>" width="100%" class="small-img">
            </div>
            <div class="small-img-col">
              <img src="./assets/imgs/<?php echo $row['product_image3']; ?>" width="100%" class="small-img">
            </div>
            <div class="small-img-col">
              <img src="./assets/imgs/<?php echo $row['product_image4']; ?>" width="100%" class="small-img">
            </div>
          </div>
        </div>

        <div class="col-lg-6 col-md-12 col-12">
          <h6><?php echo $row['product_category']; ?></h6>
          <h2 class="pt-4"><?php echo $row['product_name']; ?></h2>
          <div class="star p-0 pb-3">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <h3>$<?php echo $row['product_price']; ?></h3>

          <form method="POST" action="cart.php">
            <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $row['product_image']; ?>">
            <input type="hidden" name="product_name" value="<?php echo $row['product_name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $row['product_price']; ?>"> 
            <input type="number" name="product_quantity" value="1">
            <button id="single-bnt" type="submit" name="add_to_cart" class="buy-bnt">Add To Cart</button>
          </form>
          
          <h4 class="mt-5 mb-3">Product Details</h4>
          <hr class="mb-4">
          <h5 class="my-3"><?php echo $row['product_name']; ?></h5>
          <span><?php echo $row['product_description'];?></span>
        </div>

        <?php } ?>
      </div>
    </section>

    <!--Discover This -->
    <section id="discover_section" class="my-2 mt-5 py-2">
      <div class="container text-center mt-2 py-2">
        <h2>Discover This</h2>
        <hr class="mx-auto">
        <p>Discover trending products!</p>
      </div>
      <div class="row mx-auto container">

        <?php include('server/get_featured_products.php'); ?>

        <?php while($row = $featured_products->fetch_assoc()){ ?>

          <div class="product text-center col-lg-2 col-md-4 col-sm-12">
          <img class="img-fluid mb-3" src="./assets/imgs/<?php echo $row['product_image']; ?>"/>
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
          <h6 class="p-price">$<?php echo $row['product_price']; ?></h6>
          <a href="<?php echo "single_product.php?product_id=". $row['product_id'];?>"><button class="buy-btn">ADD TO CART</button></a>
        </div>

        <?php } ?>
        
      </div>
    </section>


  <script>
    var mainImg = document.getElementById("mainImg");
    var smallImg= document.getElementsByClassName("small-img");


    for(let i=0; i<4; i++){
      smallImg[i].onclick = function(){
        mainImg.src = smallImg[i].src;
      }
    }
  </script>

<?php
include('layouts/footer.php');
?>