<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){
   
   // $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   // $cpass = md5($_POST['cpassword']);
   // $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_info WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);
         $_SESSION['email'] = $row['email'];
         $_SESSION['phone_number'] = $row['phone_number'];
         $_SESSION['id'] = $row['id'];
      if($row['user_type'] == 'organizer'){
         $_SESSION['user_type'] = 'organizer';
         $_SESSION['organizer_name'] = $row['name'];
         header('location:../HTML/index.php');

      }elseif($row['user_type'] == 'user'){
         $_SESSION['user_type'] = 'user';
         $_SESSION['user_name'] = $row['name'];
         header('location:../HTML/index.php');

      }

   }else{
      $error[] = 'incorrect email or password!';
   }

};
?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Oraganizer Password Change</title>

    <link rel="stylesheet" href="../../CSS/organizer_logout.css" />

    <script src="../../JavaScript/organizer_activePage.js" defer></script>
    <script src="../../JavaScript/account_sidebar.js" defer></script>

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    />
    <link
      href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css"
      rel="stylesheet"
    />
  </head>
  <body>
    <div class="header">
      <div class="header_logo">
        <a href="../../HTML/index.php">
          <img
            class="megameet_logo"
            src="../../IMAGES/LOGO/1_2.png"
          />
        </a>
      </div>

      <div class="left_header">
        <div class="sign_cart">
          <div class="account">
            <a href="C:\xampp\htdocs\CODES\login system/login_form.php">
              <div class="account_icon icon">
                <img src="../../IMAGES/ICONS/user-regular.svg" alt="" />
              </div>
            </a>
          </div>
        </div>

        <div class="sidebar_button icon">
          <img src="../../IMAGES/ICONS/sidebar.svg" alt="" class="sidebar_icon" />
        </div>
      </div>
    </div>

    <div class="organizer_dashboard">
      <div class="menu">
        <div class="big_logo">
          <a
            href="../../HTML/index.php"
            style="background-color: #fff; margin-top: 1px; height: 100px"
          >
            <img
              src="../../IMAGES/LOGO/1_2.png"
              alt=""
            />
          </a>
        </div>
        <div class="profile_pages">
          <ul>
            <li class="home">
              <a href="../../HTML/index.php">Home</a>
            </li>
            <li class="profile">
              <a href="organizer_profile.php">profile</a>
            </li>
            <li class="booked_events">
              <a href="oraganizer_created_event.php">Created Events</a>
            </li>
            <li class="cart_added_event">
              <a href="oraganizer_add_event.php"> Add Event </a>
            </li>
            <li class="logout"><a href="oraganizer_logout.php">Logout</a></li>
            <li class="password_change">
              <a href="oraganizer_password_change.php">Password Change</a>
            </li>
          </ul>
        </div>
      </div>
      <div class="organizer_booked_events profile_info">
        <div class="scrolling_page scrolling">
          <!-- <div class="profile_image"></div>
          <div class="name_email">
            <div class="organizer_name">
              <h3>Name:</h3>
              <p></p>
            </div>
            <div class="organizer_email">
              <h3>Email:</h3>
              <p></p>
            </div>
            <div class="organizer_phoneNumber">
              <h3>Phone Number:</h3>
              <p></p>
            </div>
            <div class="organizer_id">
              <h3>Organizer Id:</h3>
              <p></p>
            </div> -->
          </div>
        </div>
      </div>
    </div>

    <nav>
      <div class="sidebar">
        <div class="logo">
          <img
            src="../../IMAGES/ICONS/xmark.svg"
            alt=""
            class="cross_icon"
            style="height: 24px; margin-right: 1em"
          />
          <span class="logo-name">
          <?php
                if(isset($_SESSION['email'])){
                  echo $_SESSION['organizer_name'] ;
                    }
                    else{
                    echo"Name";
                    }
                    ?>
          </span>
        </div>

        <div class="sidebar-content">
          <ul class="lists">
            <li class="list">
              <a href="../../HTML/index.php " class="nav-link">
                <i class="bx bx-home-alt icon"></i>
                <span class="link">Home</span>
              </a>
            </li>

            <li class="list">
              <a href="organizer_profile.php" class="nav-link">
                <i class="bx bx-user icon"></i>
                <span class="link">Profile</span>
              </a>
            </li>

            <li class="list">
              <a href="oraganizer_created_event.php" class="nav-link">
                <i class="bx bx-table icon"></i>
                <span class="link">Created event</span>
              </a>
            </li>
            <li class="list">
              <a href="oraganizer_add_event.php" class="nav-link">
                <i class="bx bx-plus icon"></i>
                <span class="link">Add Event</span>
              </a>
            </li>
          </ul>

          <div class="bottom-cotent">
            <li class="list">
              <a href="oraganizer_password_change.php" class="nav-link">
                <i class="bx bx-cog icon"></i>
                <span class="link">Password Change</span>
              </a>
            </li>

            <li class="list">
              <a href="oraganizer_logout.php" class="nav-link">
                <i class="bx bx-log-out icon"></i>
                <span class="link">Logout</span>
              </a>
            </li>
          </div>
        </div>
      </div>
    </nav>

  
  </body>
</html>
