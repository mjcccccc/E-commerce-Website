<?php include('layouts/header.php');?>
    
    <!-- Brand's Logo -->
    <div class="logos mt-5 pt-5 pb-3">
      <div class="logos-slide">
        <img src="./assets/imgs/brands/brand1.png" />
        <img src="./assets/imgs/brands/brand2.png" />
        <img src="./assets/imgs/brands/brand3.png" />
        <img src="./assets/imgs/brands/brand4.png" />
        <img src="./assets/imgs/brands/brand11.png" />
        <img src="./assets/imgs/brands/brand6.png" />
        <img src="./assets/imgs/brands/brand7.png" />
        <img src="./assets/imgs/brands/brand9.png" />
        <img src="./assets/imgs/brands/brand8.png" />
        <img src="./assets/imgs/brands/brand10.png" />
        <img src="./assets/imgs/brands/brand12.png" />
        <img src="./assets/imgs/brands/brand5.png" />
        <img src="./assets/imgs/brands/brand13.png" />
        <img src="./assets/imgs/brands/brand14.png" />
        <img src="./assets/imgs/brands/brand15.png" />
        <img src="./assets/imgs/brands/brand16.png" />
      </div>
    </div>

    <!-- Home -->
    <section id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="./assets/imgs/banners/banner5.jpg" class="d-block" alt="...">
        </div>
        <div class="carousel-item">
          <img src="./assets/imgs/banners/banner1.jpg" class="d-block" alt="...">
        </div>
        <div class="carousel-item">
          <img src="./assets/imgs/banners/banner3.jpg" class="d-block" alt="...">
        </div>
        <div class="carousel-item">
          <img src="./assets/imgs/banners/banner4.jpg" class="d-block" alt="...">
        </div>
        <div class="carousel-item">
          <img src="./assets/imgs/banners/banner2.jpg" class="d-block" alt="...">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </section>

    <!-- Categories-->
    <section id="new" class="w-100">
      <div class="row p-0 m-0">
        <div class="container text-center mt-3 py-3">
          <h2 class="categories">CATEGORIES</h2>
          <hr class="mx-auto">
        </div>
        <!-- One -->
        <div class="one d-flex align-items-center justify-content-center col-lg-3 col-md-6 col-sm-12 p-0">
          <a href="men_products.php">
            <img class="img-fluid" src="./assets/imgs/items/item1.png">
            <div class="details position-absolute top-50 start-50 translate-middle">
              <h2>Attractive Things</h2>
            </div>
          </a>
        </div>

        <!-- Two -->
        <div class="one d-flex align-items-center justify-content-center col-lg-3 col-md-6 col-sm-12 p-0">
          <a href="women_products.php">
            <img class="img-fluid" src="./assets/imgs/items/item4.jpg">
            <div class="details position-absolute top-50 start-50 translate-middle">
              <h2>Beautiful You</h2>
            </div>
          </a>
        </div>

        <!-- Three -->
        <div class="one d-flex align-items-center justify-content-center col-lg-3 col-md-6 col-sm-12 p-0">
          <a href="tech_products.php">
            <img class="img-fluid" src="./assets/imgs/items/item2.jpeg">
            <div class="details position-absolute top-50 start-50 translate-middle">
              <h2>Hottest Gadgets</h2>
            </div>
          </a>
        </div>

        <!-- Four -->
        <div class="one d-flex align-items-center justify-content-center col-lg-3 col-md-6 col-sm-12 p-0">
          <a href="skincare_products.php">
            <img class="img-fluid" src="./assets/imgs/items/item3.png">
            <div class="details position-absolute top-50 start-50 translate-middle">
              <h2>Healthy Skin</h2>
            </div>
          </a>
        </div>

      </div>
    </section>

    <!--Top Products -->
    <section id="top-products" class="my-3 py-3">
      <div class="container text-center mt-3 py-3">
        <h2>Top Products</h2>
        <hr class="mx-auto">
        <p>Explore our most popular items!</p>
      </div>
      <div class="row mx-auto container">

      <?php include("server/get_featured_products.php"); ?>

      <?php while($row = $featured_products->fetch_assoc()) { ?>

          <div class="product text-center col-lg-2 col-md-3 col-sm-12">
              <a href="<?php echo "single_product.php?product_id=". $row['product_id'];?>"><img class="img-fluid mb-3" src="./assets/imgs/<?php echo $row['product_image']; ?>"/></a>
              <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
          </div>

      <?php } ?>

      </div>
    </section>

    <!--Banner -->
    <section id="banner" class="my-3 py-3">
      <div class="container">
        <div class="container">
          <h4>Ready, Get set shop</h4>
          <h1>New releases with incredible deals</h1>
          <p>Embrace the thrill of big savings, every time you shop.</p>
          <a href="mall.php"><button>Shop Now</button></a>
        </div>
      </div>
    </section>

    <!-- Women's Section -->
    <section id="women_section" class="my-2 mt-5 py-2">
      <div class="container text-center mt-2 py-2">
        <h2>Women's Fashion</h2>
        <hr class="mx-auto">
        <p>Discover your style with our women's fashion collection!</p>
      </div>
      <div class="row mx-auto container">

        <?php include('server/get_women_products.php'); ?>

        <?php while($row = $women_products->fetch_assoc()){ ?>

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

    <!-- Men's Section -->
    <section id="men_section" class="my-2 mt-3 py-2">
      <div class="container text-center mt-2 py-2">
        <h2>Men's Fashion</h2>
        <hr class="mx-auto">
        <p>Find the perfect fit for every occasion!</p>
      </div>
      <div class="row mx-auto container">

        <?php include('server/get_men_products.php'); ?>

        <?php while($row = $men_products->fetch_assoc()){ ?>

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

    <!-- kids section -->
    <section id="kids_section" class="my-2 mt-3 py-2">
      <div class="container text-center mt-2 py-2">
        <h2>Kids Fashion</h2>
        <hr class="mx-auto">
        <p>Discover joy in every little moment</p>
      </div>
      <div class="row mx-auto container">

        <?php include('server/get_kids_products.php'); ?>

        <?php while($row = $kids_products->fetch_assoc()){ ?>

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
    

    <!-- Technology Section -->
    <section id="tech_section" class="my-2 mt-3 py-2">
      <div class="container text-center mt-2 py-2">
        <h2>Gadgets and Appliances</h2>
        <hr class="mx-auto">
        <p>Experience superior performance with our products!</p>
      </div>
      <div class="row mx-auto container">

        <?php include('server/get_technology_products.php'); ?>

        <?php while($row = $tech_products->fetch_assoc()){ ?>

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
    

    <!-- Skincare Section -->
    <section id="skin_care_section" class="my-2 mb-5 py-2">
      <div class="container text-center mt-2 py-2">
        <h2>Skin Care Products</h2>
        <hr class="mx-auto">
        <p>Transform your skincare regimen today!</p>
      </div>
      <div class="row mx-auto container">

        <?php include('server/get_skincare_products.php'); ?>

        <?php while($row = $skincare_products->fetch_assoc()){ ?>

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
    

<?php include('layouts/footer.php'); ?>