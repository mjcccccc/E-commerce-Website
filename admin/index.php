<?php include('./layouts/header.php');?>

<?php 

if (!isset($_SESSION['admin_logged_in'])){
    header('location: login.php');
    exit();
}

    //1. determine page number
    if(isset($_GET['page_no']) && $_GET['page_no'] != ""){
        //if user has a;reat entered page then page number is the one that they selected
        $page_no = $_GET['page_no'];
    }else{
        $page_no = 1;
    }
    //2. return number of products
    $stmt1 =  $conn->prepare("SELECT COUNT(*) AS total_records FROM orders");
    $stmt1->execute();
    $stmt1->bind_result($total_records);
    $stmt1->store_result();
    $stmt1->fetch();

    //3. products per page
    $total_records_per_page = 10;  //no. of products
    $offset = ($page_no-1) * $total_records_per_page;
    $previous_page = $page_no - 1;
    $next_page = $page_no + 1;
    $adjacents = "2";
    $total_no_of_pages = ceil($total_records/$total_records_per_page);

    //4. get all products
    $stmt2 = $conn->prepare("SELECT * FROM orders LIMIT $offset, $total_records_per_page");
    $stmt2->execute();
    $orders = $stmt2->get_result();


?>

<?php include('./layouts/sidemenu.php');?>

<main id="content">
    <div class="py-1 mb-2">
        <h3>ORDERS</h3>
        <hr class="mx-auto">
    </div>
    
    <?php if(isset($_GET['order_updated'])) {?>
        <p class="text-center" style="color:green;"><?php echo $_GET['order_updated']; ?></p>
    <?php } ?>

    <?php if(isset($_GET['order_failed'])) {?>
        <p class="text-center" style="color: #da4f4f;"><?php echo $_GET['order_failed']; ?></p>
    <?php } ?>
    
    <?php if(isset($_GET['order_deleted_successfully'])) {?>
        <p class="text-center" style="color:green;"><?php echo $_GET['order_deleted_successfully']; ?></p>
    <?php } ?>

    <?php if(isset($_GET['order_deleted_failure'])) {?>
        <p class="text-center" style="color: #da4f4f;"><?php echo $_GET['order_deleted_failure']; ?></p>
    <?php } ?>
    <table class="table table-striped table-sm">
        <thead>
        <tr>
            <th scope="col">Order Id</th>
            <th scope="col">Order Status</th>
            <th scope="col">User Id</th>
            <th scope="col">Order Date</th>
            <th scope="col">User Phone</th>
            <th scope="col">User Address</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>

            <?php foreach($orders as $order){?>
            <tr>
                <td><?php echo $order['order_id'];?></td>
                <td><?php echo $order['order_status'];?></td>
                <td><?php echo $order['user_id'];?></td>
                <td><?php echo $order['order_date'];?></td>
                <td><?php echo $order['user_phone'];?></td>
                <td><?php echo $order['user_address'];?></td>
                <td><a class="btn btn-primary" href="edit_order.php?order_id=<?php echo $order['order_id'];?>">Edit</a></td>
                <td><a class="btn btn-danger" href="delete_order.php?order_id=<?php echo $order['order_id'];?>">Delete</a></td>
            </tr>
            <?php } ?>   
        </tbody>
    </table>

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
</main>



<?php include('./layouts/footer.php');?>