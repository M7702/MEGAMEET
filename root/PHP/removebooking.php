<?php

@include 'config.php';

session_start();

$ticket_number = $_GET["ticket_number"];



if (isset($_SESSION['email'])) {

    $insert = "DELETE FROM `booked` WHERE `ticket_number` = $ticket_number";

    mysqli_query($conn, $insert);
    header('location:USER\user_booked_events.php');
} else {
    header('location:register_form.php');
}