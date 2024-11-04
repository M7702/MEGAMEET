<?php

@include '../../PHP/config.php';

session_start();

$user_id = $_SESSION['id'];

$select_table = " SELECT `event_id` FROM `cart` WHERE `id` = '$user_id'";






?>





<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>User Cart</title>

  <!-- <link rel="stylesheet" href="../../CSS/user_profile.css" /> -->
  <link rel="stylesheet" href="../../CSS/user_booked_events.css">
  <link rel="stylesheet" href="../../CSS/filter_card.css">

  <script src="../../JavaScript/organizer_activePage.js" defer></script>
  <script src="../../JavaScript/account_sidebar.js" defer></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
  <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />

  <style>
    .organizedEvent_table {
      min-width: 90%;
    }

    td,
    tr {
      border: black solid 1px;
    }

    td,
    th {
      padding: 5px 2em;
    }

    .scrolling {
      border: solid black 1px;
    }
    .full{
      outline: black solid 1px;
    }
  </style>
</head>

<body>
  <div class="header">
    <div class="header_logo">
      <a href="../../HTML/index.php">
        <img class="megameet_logo" src="../../IMAGES/LOGO/1_2.png" />
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
        <a href="../../HTML/index.php" style="background-color: #fff; margin-top: 1px; height: 100px">
          <img src="../../IMAGES/LOGO/1_2.png" alt="" />
        </a>
      </div>
      <div class="profile_pages">
        <ul>
          <li class="home">
            <a href="../../HTML/index.php">Home</a>
          </li>
          <li class="profile">
            <a href="user_profile.php">profile</a>
          </li>
          <li class="booked_events">
            <a href="user_booked_events.php">Booked Events</a>
          </li>
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



      <?php
        $result_table = mysqli_query($conn, $select_table);
        while ($row_table = mysqli_fetch_assoc($result_table)) {
          $event_id = $row_table['event_id'];
          // $ticket_number = $row_table['ticket_number'];
          echo "
      <div class='organizedEvent_table'>
        <table style='border-collapse: collapse; border:black solid 1px;'>
          
          <tr>
            <th>Event Id</th>
          </tr>





        

      
          <tr>
            <td>
              $event_id
            </td>

          </tr>
        </table>
      </div>";


          $select = " SELECT * FROM events WHERE event_id='$event_id' ";

          $result = mysqli_query($conn, $select);
          while ($row = mysqli_fetch_assoc($result)) {



            $event_name = $row['event_name'];
            $event_type = $row['event_type'];
            $event_date = $row['event_date'];
            $event_location = $row['event_location'];
            $event_length = $row['event_length'];
            $event_price = $row['event_price'];
            $event_include =  $row['event_include'];
            $event_omit = $row['event_omit'];
            $event_fLocation = $row['event_fLocation'];
            $img1 = $row['event_cover'];
            $img2 = $row['event_img1'];
            $img3 = $row['event_img2'];
            $img4 = $row['event_img3'];
            $img5 = $row['event_img4'];
            $img6 = $row['event_img5'];
            $event_id = $row['event_id'];


            echo "<div class='full' style='margin-bottom:1em; outline-bottom:1em;'>
                            <div class='image'>
                                <img src='../../IMAGES/events/$img1' alt=''>
                            </div>

                <div class='details'>

                            <div class='name_date'>
                                <h2>$event_name</h2>
                                <p>$event_date</p>
                            </div>
                            <div class='facility'>
                            <div style='text-align:center;'>
                            <img src='../../IMAGES/ICONS/clock-regular.svg' style='height:25px;'>
                            <p>$event_date</p>
                          </div>
                          <div style='text-align:center;'>
                            <img src='../../IMAGES/ICONS/people-group-solid.svg' style='height:25px;'>
                            <p>$event_length</p>
                          </div>
                          <div style='text-align:center;'>
                            <img src='../../IMAGES/ICONS/tag-solid.svg' style='height:25px;'>
                            <p>$event_price</p>
                          </div>
                            </div>
                </div>
                <div class='booking_detail'>
                    <div class='price'>
                            
                        
                            <div>
                                <p class='actual_price' style='text-align: center;'>
                                <img src='../../IMAGES\ICONS\indian-rupee-sign-solid.svg' style='height:15px;'> $event_price</p>
                                    
            
                                    <p class='per_person'>
                                        per person
                                    </p>
                            </div>
                        
                    </div>
                    <div>
                        <a href='../../HTML/full.php?event_id=$event_id'>
                            <button style='padding:0.5em 1em; background-color:#7245FF; font-size:1em; color:#fff;'>View</button>
                        </a>
                    </div>
                    <div class='booking' style='display:none;'>
                        <div>
                        <a href='../../HTML/full.php'>
                        <button style='padding:0.5em 1em; background-color:#fff; font-size:1em;'>
                        Add to Cart</button>
                        </a>
                        </div>

                        <div>
                        <a href='../../HTML/full.php'>
                        <button style='padding:0.5em 1em; background-color:#8BC4BB; font-size:1em; color:#fff;margin-left:5px'>
                        Book Now
                        </button>
                    </a>
                        </div>

                    </div>

                </div>
            </div>
            

            ";
          }
        }
        ?>
      </div>
    </div>
  </div>

  <nav>
    <div class="sidebar">
      <div class="logo">
        <img src="../../IMAGES/ICONS/xmark.svg" alt="" class="cross_icon" style="height: 24px; margin-right: 1em" />
        <span class="logo-name">
          <?php
          if (isset($_SESSION['user_name'])) {
            echo $_SESSION['user_name'];
          } else {
            echo "Name";
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
          <li class="list" style="display:none;">
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
  </nav>
</body>

</html>