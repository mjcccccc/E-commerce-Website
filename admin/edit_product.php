<?php include('./layouts/header.php'); ?>

<?php 

if(isset($_GET['product_id'])){

  $product_id = $_GET['product_id'];
  $stmt = $conn->prepare("SELECT * FROM products WHERE product_id=?");
  $stmt->bind_param('i', $product_id);
  $stmt->execute();
  $products = $stmt->get_result(); 


}else if(isset($_POST['edit_btn'])){
  $product_id = $_POST['product_id'];
  $name = $_POST['name'];
  $price = $_POST['price'];
  $special_offer = $_POST['special_offer'];
  $category = $_POST['category'];
  $description = $_POST['description'];
  $color = $_POST['color'];


  $stmt = $conn->prepare("UPDATE products SET product_name=?, product_price=?, product_special_offer=?, product_category=?, product_description=?, product_color=? WHERE product_id=?");
  $stmt->bind_param('ssssssi', $name, $price, $special_offer, $category, $description, $color, $product_id);
  if($stmt->execute()){
    header('location: products.php?edit_success_message=Product has been updated successfully');
  }else{
    header('location: products.php?edit_failure_message=Error ocurred, Try again');
  }
  


}else{
  header('products.php');
  exit;
}


?>

<?php include('./layouts/sidemenu.php'); ?>

<main id="content">
    <div class="card mt-5">
        <div class="card-header">
            <h2 >Edit Product</h2>
        </div>
        <div class="card-body">
            <form id="edit-form" method="POST" action="edit_product.php">
            <p style="color: #da4f4f;"><?php if (isset($_GET['error'])) {echo $_GET['error']; }?></p>
                
                <?php foreach($products as $product) { ?>
                  <input type="hidden" name="product_id" value="<?php echo $product['product_id'];?>">

                  <!-- Product Name -->
                  <div class="mb-3">
                      <input type="text" class="form-control" id="product-name" name="name" value="<?php echo $product['product_name'] ?>" placeholder="Enter product name">
                    </div>

                  <!-- Product Price -->
                  <div class="mb-3">
                      <div class="input-group">
                          <span class="input-group-text">$</span>
                          <input type="text" class="form-control" id="product-price" name="price" value="<?php echo $product['product_price'] ?>" placeholder="Enter product price">
                      </div>
                  </div>

                  <!-- Product Special Offer -->
                  <div class="mb-3">
                      <div class="input-group">
                          <span class="input-group-text">$</span>
                          <input type="number" class="form-control" id="product-special-offer" name="special_offer" value="<?php echo $product['product_special_offer'] ?>"placeholder="Enter special offer/sale">
                      </div>
                  </div>

                  <!--Product Category-->
                  <div class="mb-3">
                      <input type="text" class="form-control" id="product-category" name="category" value="<?php echo $product['product_category'] ?>" placeholder="Enter product category">
                  </div>

                  <!-- Product Description -->
                  <div class="mb-3">
                      <textarea class="form-control" id="product-description" name="description" value="<?php echo $product['product_description'] ?>" rows="3" placeholder="Enter product description"></textarea>
                  </div>

                  <!--Product Color-->
                  <div class="mb-3">
                      <input type="text" class="form-control" id="product-color" name="color" value="<?php echo $product['product_color'] ?>" placeholder="Enter product color">
                  </div>
                  <!-- Submit Button -->
                  <input type="submit" class="btn btn-primary" name="edit_btn" value="Edit">
                <?php } ?>
            </form>
        </div>
    </div>
</main>

<?php include('./layouts/footer.php'); ?>
