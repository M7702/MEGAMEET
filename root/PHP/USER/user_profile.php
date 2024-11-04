<?php

@include 'config.php';

session_start();



?>





<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User Profile</title>

    <link rel="stylesheet" href="../../CSS/user_profile.css" />

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

    <div class="user_dashboard">
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
                  <a href="../../HTML/index.php">Home</a></li>
                <li class="profile">
                  <a href="user_profile.php">profile</a></li>
                <li class="booked_events">
                  <a href="user_booked_events.php">Booked Events</a></li>
                <li class="cart_added_event"><a href="user_cart.php">
                  Cart Event
                </a></li>
                <li class="logout"><a href="user_logout.php">Logout</a></li>
                <li class="password_change" style="display: none;"><a href="user_passwordchange.php">Password Change</a></li>
            </ul>
        </div>
      </div>
      <div class="user_booked_events profile_info">
        <div class="scrolling_page scrolling">
          <div class="profile_image">
            <img src="../../IMAGES/LOGO/Designer.png" alt="" style="background-color: #fff; margin-top: 1px; height: 80px;border-radius:50%;">
          </div>
          <div class="name_email">
            <div class="user_name">
              <h3>Name:</h3>
              <p><?php
                if(isset($_SESSION['email'])){
                  echo $_SESSION['user_name'] ;
                    }
                    else{
                    echo"";
                    }
                    ?></p>
            </div>
            <div class="user_email">
              <h3>Email:</h3>
              <p>
              <?php
                if(isset($_SESSION['email'])){
                  echo $_SESSION['email'] ;
                    }
                    else{
                    echo"";
                    }
                    ?>
              </p>
            </div>
            <div class="user_phoneNumber">
              <h3>Phone Number:</h3>
              <p><?php
                if(isset($_SESSION['email'])){
                  echo $_SESSION['phone_number'] ;
                    }
                    else{
                    echo"";
                    }
                    ?></p>
            </div>
            <div class="user_id">
              <h3>User Id:</h3>
              <p><?php
                if(isset($_SESSION['email'])){
                  echo $_SESSION['id'] ;
                    }
                    else{
                    echo"";
                    }
                    ?>
                    </p>
            </div>
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
                if(isset($_SESSION['user_name'])){
                  echo $_SESSION['user_name'] ;
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
              <a href="../../HTML/index.php" class="nav-link">
                <i class="bx bx-home-alt icon"></i>
                <span class="link">Home</span>
              </a>
            </li>

            <li class="list">
              <a href="user_profile.php" class="nav-link">
                <i class="bx bx-user icon"></i>
                <span class="link">Profile</span>
              </a>
            </li>

            <li class="list">
              <a href="user_booked_events.php" class="nav-link">
                <i class="bx bx-heart icon"></i>
                <!-- <i class="fa-solid fa-ticket"></i> -->
                <span class="link">Booked event</span>
              </a>
            </li>
            <li class="list">
              <a href="user_cart.php" class="nav-link">
                <i class="bx bx-cart icon"></i>
                <span class="link">Cart</span>
              </a>
            </li>
          </ul>

          <div class="bottom-cotent">
            <li class="list" style="display: none;">
              <a href="user_passwordchange.php" class="nav-link">
                <i class="bx bx-cog icon"></i>
                <span class="link">Password Change</span>
              </a>
            </li>

            <li class="list">
              <a href="user_logout.php" class="nav-link">
                <i class="bx bx-log-out icon"></i>
                <span class="link">Logout</span>
              </a>
            </li>
          </div>
        </div>
      </div>
  </body>
</html>
