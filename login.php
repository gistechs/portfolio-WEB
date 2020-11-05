<?php
require('config/db.php');
require('config/config.php');


// Message vars
$msg = '';
$msgClass = '';

if (isset($_POST['submit'])) {
    session_start(); // Start session


    $username = htmlentities($_POST['username']);
    $password = htmlentities($_POST['password']);

    // Check required fields
    if (!empty($username) && !empty($password)) {
        $squery = "SELECT * FROM login WHERE username='$username' AND password='$password'";
        $sresult = pg_query($conn, $squery);

        if (pg_num_rows($sresult) == 1) {
            $_SESSION['user'] = $username;
            header('Location: admin_panel.php');
        }
        // Failed
        $msg = 'Incorrect Email/ Password';
        $msgClass = 'alert-danger';
    } else {
        // Failed
        $msg = 'Please fill in all fields';
        $msgClass = 'alert-danger';
    }
};

?>

<?php include('inc/header.php') ?>


<main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container">
            <?php if ($msg != '') : ?>
                <div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div>
            <?php endif; ?>
            <div class="section-title">
                <h2>Admin Panel</h2>
            </div>
            <div class="card card-login mx-5 mt-5">
                <div class="card-header text-center">Login Form</div>
                <div class="card-body">
                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block" name="submit">Login</button>
                    </form>
                </div>
            </div>
        </div>

</main><!-- End #main -->

<?php include('inc/footer.php') ?>