<?php include('./layouts/header.php'); ?>

<?php 
if(!isset($_SESSION['admin_logged_in'])){
  header('location: login.php');
  exit();
}
?>

<?php include('./layouts/sidemenu.php'); ?>

<main id="content">
    <div class="py-1 mb-2 text-start">
        <h3>ACCOUNT</h3>
        <hr class="mx-auto">
    </div>

    <div class="card text-center mt-5 p-4 mb-3" style="width: 18rem; margin: 0 auto; border-radius: 10%;">
        <div class="card-body">
            <div class="mb-3">
                <h6 class="fw-semibold">Admin ID:</h6>
                <p style="color: green;"><?php echo $_SESSION['admin_id']; ?></p>
            </div>

            <div class="mb-3">
                <h6 class="fw-semibold">Name:</h6>
                <p style="color: green;"><?php echo $_SESSION['admin_name']; ?></p>
            </div>

            <div class="mb-3">
                <h6 class="fw-semibold">Email:</h6> 
                <p style="color: green;"><?php echo $_SESSION['admin_email']; ?></p>
            </div>
            
            
        </div>
    </div>
</main>

<?php include('./layouts/footer.php'); ?>
