<?php include('./layouts/header.php'); ?>

<?php 
if(isset($_GET['product_id'])){
  $product_id = $_GET['product_id'];
  $product_name = $_GET['product_name'];

}else{
  header('location: products.php');
}
?>

<?php include('./layouts/sidemenu.php'); ?>

<main id="content">
    <div class="card mt-5">
        <div class="card-header">
            <h2>Update Product Images</h2>
        </div>
        <div class="card-body">
            <form id="create-form" enctype="multipart/form-data" method="POST" action="update_images.php">
            <p style="color: #da4f4f;"><?php if (isset($_GET['error'])) {echo $_GET['error']; }?></p>
                
                  <input type="hidden" name="product_id" value="<?php echo $product_id;?>">
                  <input type="hidden" name="product_name" value="<?php echo $product_name;?>">

                  <!--Image--> 
                  <div class="form-group mb-3">
                    <h6>Image 1</h6>
                    <input type="file" class="form-control" id="image1" name="image1" placeholder="Image 1" required>
                  </div>

                  <!--Image1--> 
                  <div class="form-group mb-3">
                    <h6>Image 2</h6>
                    <input type="file" class="form-control" id="image2" name="image2" placeholder="Image 2" required>
                  </div>

                  <!--Image2--> 
                  <div class="form-group mb-3">
                    <h6>Image 3</h6>
                    <input type="file" class="form-control" id="image3" name="image3" placeholder="Image 3" required>
                  </div>

                  <!--Image3--> 
                  <div class="form-group mb-3">
                    <h6>Image 4</h6>
                    <input type="file" class="form-control" id="image4" name="image4" placeholder="Image 4" required>
                  </div>

                  <!-- Submit Button -->
                  <input type="submit" class="btn btn-primary" name="update_images" value="Update">
            </form>
        </div>
    </div>
</main>

<?php include('./layouts/footer.php'); ?>
