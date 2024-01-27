<?php include('./layouts/header.php'); ?>

<?php 

if(isset($_GET['order_id'])){

  $order_id = $_GET['order_id'];
  $stmt = $conn->prepare("SELECT * FROM orders WHERE order_id=?");
  $stmt->bind_param('i', $order_id);
  $stmt->execute();
  $order = $stmt->get_result(); 
}else if(isset($_POST['edit_order'])){

  $order_status = $_POST['order_status'];
  $order_id = $_POST['order_id'];

  $stmt = $conn->prepare("UPDATE orders SET order_status=? WHERE order_id=?");
  $stmt->bind_param('si', $order_status, $order_id);

  if($stmt->execute()){
    header('location: index.php?order_updated=Order has been updated successfully');
  }else{
    header('location: products.php?order_failed=Error ocurred, Try again');
  }
}else{
  header('location: index.php');
  exit;
}
?>

<?php include('./layouts/sidemenu.php'); ?>

<main id="content">
    <div class="card mt-5">
        <div class="card-header">
            <h2>Edit Order</h2>
        </div>
        <div class="card-body">
            <form id="edit-order-form" method="POST" action="edit_order.php">
              <?php foreach($order as $r){?>
                <p style="color: #da4f4f;"> <!-- Replace this with your error handling logic --> </p>

                <!-- order ID-->
                <div class="mb-3">
                    <strong>Order Id:</strong>
                    <span><?php echo $r['order_id']; ?></span>
                </div>

                <!-- Order Price -->
                <div class="mb-3">
                    <strong>Order Price:</strong>
                    <span><?php echo $r['order_cost']; ?></span>
                </div>

                <input type="hidden" name="order_id" value="<?php echo $r['order_id'];?>">

                <!-- Order Status -->
                <div class="mb-3">
                    <strong>Order Status: </strong>
                    <select class="form-select" name="order_status" required>
                      
                        <option value="not paid" <?php if($r['order_status'] == 'not paid') {echo "selected";} ?>>Not Paid</option>
                        <option value="paid" <?php if($r['order_status'] == 'paid') {echo "selected";} ?>>Paid</option>
                        <option value="shipped" <?php if($r['order_status'] == 'shipped') {echo "selected";} ?>>Shipped</option>
                        <option value="delivered" <?php if($r['order_status'] == 'delivered') {echo "selected";} ?>>Delivered</option>
                    </select>
                </div>

                <!-- Order Date -->
                <div class="mb-3">
                    <strong>Order Date:</strong>
                    <span><?php echo $r['order_date']; ?></span>
                </div>

                <!-- Submit Button -->
                <input type="submit" class="btn btn-primary" name="edit_order" value="Edit">
                <?php }?>
            </form>
        </div>
    </div>
</main>

<?php include('./layouts/footer.php'); ?>
