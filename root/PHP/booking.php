<?php

@include 'config.php';

session_start();

$event_id = $_GET["event_id"];
$id = $_SESSION['id'];


if (isset($_SESSION['email'])) {

    $insert = "INSERT INTO `booked`( `id`, `event_id`) VALUES ('$id','$event_id')";

    mysqli_query($conn, $insert);
    header('location:USER\user_booked_events.php');
} else {
    header('location:register_form.php');
}
