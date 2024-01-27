<?php include('./layouts/header.php'); ?>

<?php include('./layouts/sidemenu.php'); ?>

<main id="content">
    <div class="py-1 mb-2 text-start">
        <h3>ADD PRODUCTS</h3>
        <hr class="mx-auto">
    </div>

    <div class="card mt-3">
        <div class="card-body">
            <form id="create-form" enctype="multipart/form-data" method="POST" action="create_product.php">
            <p style="color: #da4f4f;"><?php if (isset($_GET['error'])) {echo $_GET['error']; }?></p>

                <!-- Product Name -->
                <div class="mb-3">
                    <input type="text" class="form-control" id="product-name" name="name" value="" placeholder="Enter product name" required> 
                </div>

                    <!-- Product Price -->
                <div class="mb-3">
                    <div class="input-group">
                        <span class="input-group-text">$</span>
                        <input type="text" class="form-control" id="product-price" name="price" value="" placeholder="Enter product price" required> 
                    </div>
                </div>

                    <!-- Product Special Offer -->
                <div class="mb-3">
                    <div class="input-group">
                        <span class="input-group-text">$</span>
                        <input type="number" class="form-control" id="product-special-offer" name="special_offer" value="" placeholder="Enter special offer/sale" required>
                    </div>
                </div>

                <!--Product Category-->
                <div class="mb-3">
                    <input type="text" class="form-control" id="product-category" name="category" value="" placeholder="Enter product category" required>
                </div>

                <!-- Product Description -->
                <div class="mb-3">
                    <textarea class="form-control" id="product-description" name="description" value="" rows="3" placeholder="Enter product description" required></textarea>
                </div>

                <!--Product Color-->
                <div class="mb-3">
                    <input type="text" class="form-control" id="product-color" name="color" value="" placeholder="Enter product color" required>
                </div>

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
                <input type="submit" class="btn btn-primary" name="create_product" value="Add">
            </form>
        </div>
    </div>
</main>

<?php include('./layouts/footer.php'); ?>
