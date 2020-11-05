<?php
require_once('../config/db.php');
require_once('../config/config.php');

// Check for submit
if (isset($_POST['submit'])) {
    // Get form data
    $update_id = pg_escape_string($conn, $_POST['update_id']);
    $sname = pg_escape_string($conn, $_POST['sname']);
    $fname = pg_escape_string($conn, $_POST['fname']);
    $address = pg_escape_string($conn, $_POST['address']);
    $city = pg_escape_string($conn, $_POST['city']);
    $age = pg_escape_string($conn, $_POST['age']);
    $birthday = pg_escape_string($conn, $_POST['birthday']);
    $degree = pg_escape_string($conn, $_POST['degree']);
    $phone = pg_escape_string($conn, $_POST['phone']);
    $email = pg_escape_string($conn, $_POST['email']);
    $website = pg_escape_string($conn, $_POST['website']);
    $status = pg_escape_string($conn, $_POST['status']);
    $frtext = pg_escape_string($conn, $_POST['frtext']);
    $sinfo = pg_escape_string($conn, $_POST['sinfo']);
    $finfo = pg_escape_string($conn, $_POST['finfo']);
    print_r($city);

    $query = "UPDATE about SET
                shname='$sname',
                fullname='$fname',
                location='$address',
                city='$city',
                age='$age',
                birthday='$birthday',
                degree='$degree',
                phone='$phone',
                email='$email',
                website='$website',
                status='$status',
                frtext='$frtext',
                sdesc='$sinfo',
                fulldesc='$finfo'
                WHERE ab_id = {$update_id}";

    if (pg_query($conn, $query)) {
        header('Location: ' . ROOT_URL . '');
    } else {
        echo 'ERROR: ' . pg_errormessage($conn);
    }
}
