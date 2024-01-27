<div id="sidebar">

    <a class="navbar-brand d-flex justify-content-center my-4" href="index.php">
        <img src="../assets/imgs/logo1.png" width="120" height="50" class="d-inline-block ml-3" alt="carty_logo">
    </a>
    
    <ul class="nav flex-column my-3">
        <li class="nav-item">
            <a class="nav-link active" href="index.php">Dashboard</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="products.php">Products</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="account.php">Account</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="add_product.php">Add New Product</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="help.php">Help</a>
        </li>
    </ul>

    <form class="logout-btn form-inline d-flex justify-content-center">
        <?php if(isset($_SESSION['admin_logged_in'])){ ?>
            <a class="btn btn-outline-light" href="logout.php?logout=1">Logout</a>
        <?php } ?>
    </form>
</div>