<?php
require_once('config/db.php');
require_once('config/config.php');

session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
}

//Create Query
$query = 'SELECT * FROM about';

//Get Result
$result = pg_query($conn, $query);

//Fetch data
$info = pg_fetch_assoc($result);

//Free result
pg_free_result($result);

pg_close($conn);

?>

<?php include('inc/header.php') ?>


<main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container">

            <div class="section-title">
                <h2>Personal Information</h2>
            </div>

            <div class="container">
                <form action="form/about.php" method="POST">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">Short Name</label>
                            <input type="text" name="sname" class="form-control" value="<?php echo $info['shname']; ?>"/>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="name">Fullname</label>
                            <input type="text" class="form-control" name="fname" value="<?php echo $info['fullname']; ?>"/>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="name">Address</label>
                            <input type="text" name="address" class="form-control" value="<?php echo $info['location']; ?>"/>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="name">City</label>
                            <input type="text" class="form-control" name="city" value="<?php echo $info['city']; ?>"/>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="name">Age</label>
                            <input type="text" name="age" class="form-control" value="<?php echo $info['age']; ?>"/>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="name">Birthday</label>
                            <input type="text" class="form-control" name="birthday" value="<?php echo $info['birthday']; ?>"/>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="name">Degree</label>
                            <input type="text" class="form-control" name="degree" value="<?php echo $info['degree']; ?>"/>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="number">Phone</label>
                            <input type="text" class="form-control" name="phone" value="<?php echo $info['phone']; ?>"/>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="name">Email</label>
                            <input type="email" class="form-control" name="email" value="<?php echo $info['email']; ?>"/>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="name">Website</label>
                            <input type="text" class="form-control" name="website" value="<?php echo $info['website']; ?>"/>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="name">Status</label>
                            <input type="text" class="form-control" name="status" value="<?php echo $info['status']; ?>"/>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="name">Front Text</label>
                            <input type="text" class="form-control" name="frtext" value="<?php echo $info['frtext']; ?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Short Description</label>
                        <textarea class="form-control" name="sinfo" rows="10"><?php echo $info['sdesc']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="name">Full Description</label>
                        <textarea class="form-control" name="finfo" rows="10"><?php echo $info['fulldesc']; ?></textarea>
                    </div>
                    <input type="hidden" name="update_id" value="<?php echo $info['ab_id']; ?>">
                    <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                </form>
            </div>

        </div>
    </section>

</main><!-- End #main -->

<?php include('inc/footer.php') ?>