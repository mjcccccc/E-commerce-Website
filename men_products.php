<?php

include('layouts/header.php');
include('server/connection.php');

if(isset($_POST['search'])){
  //1. determine page number
  if(isset($_GET['page_no']) && $_GET['page_no'] != ""){
    //if user has a;reat entered page then page number is the one that they selected
    $page_no = $_GET['page_no'];
  }else{
    $page_no = 1;
  }

  //$category = $_POST['category'];
  $category = '%' . $_POST['category'] . '%';
  $price = $_POST['price'];

// 2. return number of products LIKE 
$stmt1 = $conn->prepare("SELECT COUNT(*) AS total_records FROM products WHERE (product_category LIKE ?) AND (product_price <= ?) AND (product_category LIKE '%Men%' OR product_category LIKE '%Unisex%') AND product_category NOT LIKE '%Women%'");
$stmt1->bind_param('si', $category, $price);
$stmt1->execute();
$stmt1->bind_result($total_records);
$stmt1->store_result();
$stmt1->fetch();

// 3. products per page
$total_records_per_page = 15;  // no. of products
$offset = ($page_no - 1) * $total_records_per_page;
$previous_page = $page_no - 1;
$next_page = $page_no + 1;
$adjacents = "2";
$total_no_of_pages = ceil($total_records / $total_records_per_page);

// 4. get all products
$stmt2 = $conn->prepare("SELECT * FROM products WHERE (product_category LIKE ?) AND (product_price <= ?) AND (product_category LIKE '%Men%' OR product_category LIKE '%Unisex%') AND product_category NOT LIKE '%Women%' LIMIT $offset, $total_records_per_page");
$stmt2->bind_param('si', $category, $price);
$stmt2->execute();
$products = $stmt2->get_result();
// return all the products PAGINATION
} else {
// 1. determine page number
if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
  // if user has already entered page, then page number is the one that they selected
  $page_no = $_GET['page_no'];
} else {
  $page_no = 1;
}
// 2. return number of products
$stmt1 = $conn->prepare("SELECT COUNT(*) AS total_records FROM products WHERE (product_category LIKE '%Men%' OR product_category LIKE '%Unisex%') AND product_category NOT LIKE '%Women%'");
$stmt1->execute();
$stmt1->bind_result($total_records);
$stmt1->store_result();
$stmt1->fetch();

// 3. products per page
$total_records_per_page = 10;  // no. of products
$offset = ($page_no - 1) * $total_records_per_page;
$previous_page = $page_no - 1;
$next_page = $page_no + 1;
$adjacents = "2";
$total_no_of_pages = ceil($total_records / $total_records_per_page);

// 4. get all products 
$stmt2 = $conn->prepare("SELECT * FROM products WHERE (product_category LIKE '%Men%' OR product_category LIKE '%Unisex%') AND product_category NOT LIKE '%Women%' LIMIT $offset, $total_records_per_page");
$stmt2->execute();
$products = $stmt2->get_result();
}

?>

    <!-- Search and Shop-->
    <div class="d-flex justify-content-between">
      <section id="search" class="mt-5 pt-5">
        <div class="container mt-3 py-3">
          <p>Search Products</p>
          <hr>
        </div>
  
        <form action="men_products.php" method="POST">
          <div class="row mx-auto container">
            <div class="col-lg-12 col-md-12 col-sm-12">
  
              <p>Category</p>

              <div class="form-check">
                <input class="form-check-input" value="Accessories" type="radio" name="category" id="category_two" <?php if(isset($category) && $category=='%Accessories%'){echo 'checked';}?>>
                <label class="form-check-label" for="flexRadioDefault2">
                  Accessories
                </label>
              </div>

              <div class="form-check">
                <input class="form-check-input" value="Bags" type="radio" name="category" id="category_two" <?php if(isset($category)&& $category=='%Bags%'){echo 'checked';}?>>
                <label class="form-check-label" for="flexRadioDefault2">
                  Bags
                </label>
              </div>

              <div class="form-check">
                <input class="form-check-input" value="Caps" type="radio" name="category" id="category_two" <?php if(isset($category)&& $category=='%Caps%'){echo 'checked';}?>>
                <label class="form-check-label" for="flexRadioDefault2">
                  Caps
                </label>
              </div>

              <div class="form-check">
                <input class="form-check-input" value="Clothes" type="radio" name="category" id="category_two" <?php if(isset($category)&& $category=='%Clothes%'){echo 'checked';}?>>
                <label class="form-check-label" for="flexRadioDefault2">
                  Clothes
                </label>
              </div>

              <div class="form-check">
                <input class="form-check-input" value="Pants" type="radio" name="category" id="category_two" <?php if(isset($category)&& $category=='%Pants%'){echo 'checked';}?>>
                <label class="form-check-label" for="flexRadioDefault1">
                  Pants
                </label>
              </div>

              <div class="form-check">
                <input class="form-check-input" value="Watch" type="radio" name="category" id="category_two" <?php if(isset($category)&& $category=='%Watch%'){echo 'checked';}?>>
                <label class="form-check-label" for="flexRadioDefault1">
                  Watch
                </label>
              </div>
              
            </div>
          </div>
  
          <div class="row mx-auto container mt-5">
            <div class="col-lg-12 col-md-12 col-sm-12">
              <p>Price</p>
              <input type="range" class="form-range w-60" name="price" value="<?php if(isset($price)){echo $price;}else{echo "2500";}?>" min="1" max="5000" id="customRange2">
              <div class="w-60">
                <span style="float: left;">$1</span>
                <span style="float: right;">$5000</span>
              </div>
            </div>
          </div>
  
          <div class="form-group my-3 mx-3">
            <input type="submit" name="search" value="Search" class="btn btn-primary">
          </div>
        </form>
      </section>
      
      <!-- Shop -->
      <section id="shop" class="mt-5 pt-5">
        <div class="container mt-3 py-3">
          <h2>| Men's Product</h2>
          <p class="mx-3">From work to play - find versatile men's essentials!</p>
        </div>
        <div class="row mx-auto container">

        <?php while($row = $products->fetch_assoc()) {?>
          <div onclick="window.location.href='single_product.php';" class="product text-center col-lg-2 col-md-4 col-sm-12">
            <a class="shop-buy-btn" href="<?php echo "single_product.php?product_id=".$row['product_id']; ?>">
              <img class="img-fluid mb-3" src="./assets/imgs/<?php echo $row['product_image']; ?>">
              <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
              <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
              <h6 class="p-price">$<?php echo $row['product_price']; ?></h6>
            </a>
          </div>

          <?php } ?>
          
          <nav aria-label="Page navigation example" class="mt-2 mb-5">
            <ul class="pagination mt-5 mx-auto">

              <li class="page-item <?php if($page_no <= 1 ) {echo 'disabled';}?> ">
                <a class="page-link" href="<?php if($page_no <= 1) {echo '#';}else{ echo "?page_no=".$page_no-1;} ?>">Previous</a>
              </li>

              <li class="page-item"><a class="page-link" href="?page_no=1">1</a></li>
              <li class="page-item"><a class="page-link" href="?page_no=2">2</a></li>

              <?php if($page_no >= 3) {?>
                <li class="page-item"><a class="page-link" href="#">...</a></li>
                <li class="page-item"><a class="page-link" href="<?php echo "?page_no=".$page_no; ?>"><?php echo $page_no;?></a></li>
              <?php } ?>

              <li class="page-item <?php if($page_no>= $total_no_of_pages){ echo 'disabled';} ?>">
                <a class="page-link" href="<?php if($page_no >= $total_no_of_pages) {echo '#';}else{ echo "?page_no=".$page_no+1;} ?>">Next</a>
              </li>
            </ul>
          </nav>
        </div>
      </section>
    </div>
    
<?php 
include('layouts/footer.php');
?>