<?php
$disableNavbar = true; // Set this variable to disable the navbar
include('./layouts/header.php');
include('../server/connection.php');

if (isset($_SESSION['admin_logged_in'])) {
    header('location: index.php');
    exit;
}

if (isset($_POST['login_btn'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $stmt = $conn->prepare("SELECT admin_id, admin_name, admin_email, admin_password FROM admins WHERE admin_email=? LIMIT 1");
    $stmt->bind_param('s', $email);

    if ($stmt->execute()) {
        $stmt->bind_result($admin_id, $admin_name, $admin_email, $admin_password);
        $stmt->store_result();

        if ($stmt->num_rows() == 1) {
            $stmt->fetch();

            if (md5($_POST['password']) === $admin_password) {
                $_SESSION['admin_id'] = $admin_id;
                $_SESSION['admin_name'] = $admin_name;
                $_SESSION['admin_email'] = $admin_email;
                $_SESSION['admin_logged_in'] = true;

                header('location: index.php?login_success=Logged in successfully');
            } else {
                header('location: login.php?error=Incorrect password');
            }
        } else {
            header('location: login.php?error=Could not verify your account');
        }
    } else {
        header('location: login.php?error=' . $stmt->error);
    }
}

?>



<div class="container">
    <div class="login-container">
        <h2 class="text-center mb-4">Login</h2>
        <div class="col-md-6 col-lg-4">
            <form id="login-form" enctype="multipart/form-data" method="POST" action="login.php">
                <p style="color: #da4f4f;"><?php if (isset($_GET['error'])) {
                    echo $_GET['error'];
                } ?></p>
                <div class="form-group">
                    <input type="text" class="form-control" id="email" name="email" placeholder=" ">
                    <label for="email">Email</label>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder=" ">
                    <label for="password">Password</label>
                </div>
                <button type="submit" class="btn btn-primary btn-block" name="login_btn">Login</button>
            </form>
        </div>
    </div>
</div>

<?php include('./layouts/footer.php');?>