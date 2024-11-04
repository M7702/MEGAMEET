<?php

@include '../PHP/config.php';

session_start();

$event_id = $_GET["event_id"];
$select = " SELECT * FROM events WHERE event_id='$event_id'";

$result = mysqli_query($conn, $select);



$row = mysqli_fetch_array($result);
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
// $event_id=$row['event_id'];
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>view page</title>


  <link rel="stylesheet" href="../CSS/header1.css" />
  <link rel="stylesheet" href="../CSS/sidebar.css" />
  <link rel="stylesheet" href="../CSS/subheading.css" />
  <link rel="stylesheet" href="../CSS/featured.css" />
  <link rel="stylesheet" href="../CSS/state_card.css" />
  <link rel="stylesheet" href="../CSS/custom.css">
  <link rel="stylesheet" href="../CSS/footer.css">
  <link rel="stylesheet" href="../CSS/general.css">
  <link rel="stylesheet" href="../CSS/full_card.css">




  <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
  <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />

  <link rel="shortcut icon" href="../IMAGES/LOGO/1_2.png" type="image/x-icon">


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />




  <script src="../JavaScript/subheader.js" defer></script>
  <script src="../JavaScript/sidebar.js" defer></script>
  <script src="../JavaScript/state_card.js" defer></script>
  <script src="../JavaScript/featured.js" defer></script>
  <style>
    div {
      border: none !important;
    }

    .image {
      background-color: #FFF !important;
    }
    button{
    border-radius: 1em;
}
.location_input{
          display: none !important;
        }
    .booking {
      min-height: 50px;
      justify-content: space-evenly;
    }

    .details {
      border: solid black 1px !important;
      border-radius: 1em;
      margin-bottom: 2em;

    }

    .image .image_container,
    .image .image_container_1,
    .image .image_container_2 {
      flex: 1;
      height: 100%;
      width: 100px;
      border-radius: 1em;
      object-fit: cover;
      object-position: center;
      border-top-left-radius: 1em;
      border-bottom-left-radius: 1em;
      flex: 1;


      /* height: 11em; */



      /* height: 18em; */
      /* width: 100%; */
      /* padding-top: 1em; */
      /* border-radius: 0.5em; */
      display: flex;
      justify-content: center;
      align-self: center;
      align-items: center;

      /* height: 100%; */
      object-fit: cover;
      object-position: center;
      aspect-ratio: auto;
      overflow: hidden;

    }

    .include,
    .exclude,
    .location {
      flex: 1;
      width: 100%;
      display: flex;
      flex-direction: column;
    }
     a button:hover {

      color: #7245FF;
    }
    @media screen and (max-width: 992px) {
.booking{
flex-direction: column;
}
button{
  margin-bottom: 5px;
}
.float_right{
width: 90%;
}
.image_container{
display: none !important;
}


}
@media screen and (max-width: 350px) {
.image_container_2{
display: none !important;
}
}
  </style>

</head>

<body>


















  <div class="header">



    <div class="header_logo">
      <a href="../HTML/index.php">
        <img class="megameet_logo" src="../IMAGES/LOGO/1_2.png" />
      </a>
    </div>


    <div class="header_serch_bar">
      <input class="search-bar" type="text" placeholder="Search..." />
      <button class="search-button">
        <img class="search-icon" src="../IMAGES/ICONS/search.svg" />
      </button>
    </div>


    <div class="location_input">
      <img src="../IMAGES/ICONS/location.svg" alt="" class="location-icon" />
      <select name="location" id="location" class="location">
        <ul>
          <li>
            <option value="Default" selected>City</option>
          </li>
          <li>
            <option value="Ahemadabad">Ahemadabad</option>
          </li>
          <li>
            <option value="Bhavnagar">Bhavnagar</option>
          </li>
          <li>
            <option value="Daman">Daman And Diu</option>
          </li>
          <li>
            <option value="Gandhidham">Gandhidham</option>
          </li>
          <li>
            <option value="Mehesana">Mehesana</option>
          </li>
          <li>
            <option value="Morvi">Morvi</option>
          </li>
          <li>
            <option value="Patan">Patan</option>
          </li>
          <li>
            <option value="Porbandar">Porbandar</option>
          </li>
          <li>
            <option value="Rajkot">Rajkot</option>
          </li>
          <li>
            <option value="Surat">Surat</option>
          </li>
          <li>
            <option value="Vadodara">Vadodara</option>
          </li>
        </ul>
      </select>
    </div>


    <div class="left_header">

      <div class="instagram_icon icon">
        <a href="https://www.instagram.com/mit25779/" target="_blank">
          <img src="../IMAGES/ICONS/instagram.svg" alt="" />
        </a>
      </div>

      <div class="sign_cart">

        <div class="header_cart icon">
          <img src="../IMAGES/ICONS/cart.svg" alt="" />
          <div class="notifications-count">
          <?php
                if(isset($_SESSION['email'])){
                  $user_id = $_SESSION['id'];
                  $select_table = "SELECT * FROM `cart` WHERE `id` = '$user_id'";
                  $result_number = mysqli_query($conn, $select_table);
                  $rowCount = mysqli_num_rows($result_number);
                    echo $rowCount;
                }
                    else{
                    echo"";
                    }
                    ?>
          </div>
        </div>

        <div class="account">
          <a href="../PHP/login_form.php">
            <!-- sign in text -->
            <div class="signin">
              <p>
                <?php
                if (isset($_SESSION['email'])) {
                  echo "";
                } else {
                  echo "Sign in";
                }
                ?>
              </p>
            </div>
          </a>
          <!-- account icon -->
          <a href="<?php
                    if (isset($_SESSION['email'])) {
                      if ($_SESSION['user_type'] == 'user') {
                        echo "../PHP/USER/user_profile.php";
                      } else {
                        echo "../PHP/organizer/organizer_profile.php";
                      }
                    } else {
                      echo "../PHP/login_form.php";
                    }
                    ?>
                    ">
            <div class="account_icon icon">
              <img src="../IMAGES/ICONS/user-regular.svg" alt="" />
            </div>
          </a>
        </div>
      </div>

      <div class="sidebar_button icon">
        <img src="../IMAGES/ICONS/sidebar.svg" alt="" class="sidebar_icon" />
      </div>

    </div>




  </div>






  <nav>




    <div class="sidebar">
      <div class="logo">
        <img src="../IMAGES/ICONS/xmark.svg" class="cross_icon" style="height: 24px; margin-right: 1em" />
        <span class="logo-name">
          <?php
          if (isset($_SESSION['email'])) {
            if ($_SESSION['user_type'] == 'user') {
              echo $_SESSION['user_name'];
            } else {
              echo $_SESSION['organizer_name'];
            }
          } else {
            echo " Name";
          }
          ?>
        </span>
      </div>
      <div class="sidebar-content">
        <ul class="lists">
          <li class="list">
            <a href="index.php" class="nav-link">
              <i class="bx bx-home-alt icon"></i>
              <span class="link">Home</span>
            </a>
          </li>
          <li class="list">
            <a href="<?php
                      if (isset($_SESSION['email'])) {
                        if ($_SESSION['user_type'] == 'user') {
                          echo "../PHP/USER/user_profile.php";
                        } else {
                          echo "../PHP/organizer/organizer_profile.php";
                        }
                      } else {
                        echo "../PHP/login_form.php";
                      }
                      ?>" class="nav-link">
              <i class="bx bx-user icon"></i>
              <span class="link">Profile</span>
            </a>
          </li>
          <!-- show add event option for organizer -->
          <?php
          if (isset($_SESSION['email'])) {
            if ($_SESSION['user_type'] == 'user') {
              echo "<li class='list'>
                      <a href='../PHP/USER/user_cart.php' class='nav-link'>
                        <i class='bx bx-cart icon'></i>
                        <span class='link'>Cart</span>
                      </a>
                    </li>";
            } else {
              echo "<li class='list'>
                      <a href='..\PHP\organizer\oraganizer_add_event.php' class='nav-link'>
                        <i class='bx bx-plus icon'></i>
                        <span class='link'>Add Event</span>
                      </a>
                    </li>";
            }
          } else {
            echo "<li class='list'>
                      <a href='../PHP/login_form.php' class='nav-link'>
                        <i class='bx bx-cart icon'></i>
                        <span class='link'>Cart</span>
                      </a>
                    </li>";
          }
          ?>
          <!-- show created event option for organizer -->
          <?php
          if (isset($_SESSION['email'])) {
            if ($_SESSION['user_type'] == 'user') {
              echo "<li class='list'>
                      <a href='../PHP/USER/user_booked_events.php' class='nav-link'>
                      <i class='fa-solid fa-ticket icon'></i>
                        <span class='link'>Booked Event</span>
                      </a>
                    </li>";
            } else {
              echo "<li class='list'>
                      <a href='../PHP\organizer\oraganizer_created_event.php' class='nav-link'>
                        <i class='bx bx-table icon'></i>
                        <span class='link'>Created Event</span>
                      </a>
                    </li>";
            }
          } else {
            echo "<li class='list'>
                      <a href='../PHP/login_form.php' class='nav-link'>
                      <i class='fa-solid fa-ticket icon'></i>
                        <span class='link'>Booked Event</span>
                      </a>
                    </li>";
          }
          ?>
        </ul>
        <div class="bottom-cotent">
          <li class="list">
            <a href="<?php
                      if (isset($_SESSION['email'])) {
                        echo "../PHP/logout.php";
                      } else {
                        echo "../PHP/login_form.php";
                      }
                      ?>" class="nav-link">
              <?php
              if (isset($_SESSION['email'])) {
                echo "<i class='bx bx-log-out icon'></i>";
              } else {
                echo "<i class='bx bx-log-in icon'></i>";
              }
              ?>
              <span class="link">
                <?php
                if (isset($_SESSION['email'])) {
                  echo "Sign out";
                } else {
                  echo "Sign in";
                }
                ?>
              </span>
            </a>
          </li>
        </div>
      </div>
    </div>
  </nav>


  <div class="half">
    <div class="image">
      <div class="image_container_1">
        <img src='<?php
                  echo "../IMAGES/events/$img2'"
                  ?>' alt="">
      </div>
      <div class="image_container_2">
        <img src='<?php
                  echo "../IMAGES/events/$img3'"
                  ?>' alt="">
      </div>
      <div class="image_container">
        <img src='<?php
                  echo "../IMAGES/events/$img4'"
                  ?>' alt="">
      </div>
      <div class="image_container">
        <img src='<?php
                  echo "../IMAGES/events/$img5'"
                  ?>' alt="">
      </div>
      <div class="image_container">
        <img src='<?php
                  echo "../IMAGES/events/$img6'"
                  ?>' alt="">
      </div>
    </div>
    <div class="details">
      <div class="name_date" style="margin-left: 1em;">
        <h2><?php
            echo "$event_name"
            ?></h2>
        <p><?php
            echo "$event_location"
            ?></p>
      </div>
      <div class="facility " style="margin-bottom: 1em;">
        <div>
          <img src="../IMAGES/ICONS/clock-regular.svg" alt="" class="logo" height="25px">
          <p><?php
              echo "$event_date"
              ?></p>
        </div>
        <div>
          <img src="../IMAGES/ICONS/people-group-solid.svg" alt="" class="logo" height="25px" style="align-self: center; margin-left:1em;">
          <p style="text-align: center;">Available tickets<br>
            <?php
              echo "$event_length"
              ?></p>
        </div>
        <div>
          <img src="../IMAGES/ICONS/tag-solid.svg" alt="" class="logo" height="25px">
          <p><?php
              echo " &#8377; $event_price"
              ?></p>
        </div>
      </div>
      <div class='booking'>
        <div>
          <a href='<?php 
          echo"../PHP/cart.php?event_id=$event_id" ?>'>
            <button style='padding:0.5em 1em; background-color:#fff; font-size:1em; '>
              Add to Cart</button>
          </a>
        </div>

        <div>
          <a href='<?php
                    echo "../PHP/booking.php?event_id=$event_id" ?>'>
            <button style='padding:0.5em 1em; background-color:#8BC4BB; font-size:1em; color:#fff;margin-left:5px'>
              Book Now
            </button>
          </a>
        </div>

      </div>
    </div>
    <div class="booking_detail">

      <div class="booking">
        <div class="float_left">
          <div class="include">

            <h2 style="display: block;">Included In Event</h2>
            <div style="margin-top: 1em;">
              <img src="../IMAGES/ICONS/circle-check-regular.svg" alt="" class="" height="20px" style="display: inline;">

              <p style="display: inline;"><?php
                                          echo "$event_include"
                                          ?></p>
            </div>
          </div>
          <div class="exclude">
            <h2 style="display: block;">Excluded In Event</h2>
            <div style="margin-top: 1em;">
              <img src="../IMAGES/ICONS/circle-xmark-regular.svg" alt="" class="" height="20px" style="display: inline;">

              <p style="display: inline;"><?php
                                          echo "$event_omit"
                                          ?>
              </p>
            </div>

          </div>
          <div class="location">
            <h2 style="display: block;">Event location</h2>
            <div style="margin-top: 1em;">
              <img src="../IMAGES/ICONS/location.svg" alt="" class="" height="20px" style="display: inline;">

              <p style="display: inline;"><?php
                                          echo "$event_fLocation"
                                          ?></p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>




  <footer class="footer">
    <div class="our_vision footer_box">
      <h2 style="padding-bottom: 1em;">Our Vision</h2>
      <p>Discover the more people like you with Mega Meet – where joy meets inspiration. Join us as we explore captivating events, connect with influencers, and create memories that last a lifetime. Your new experiences begins here <a href="">..read more</a></p>
    </div>
    <div class="contact_us footer_box" style="border-right: solid  #ced4da;border-left: solid  #ced4da;">
      <center> <img src="../IMAGES/LOGO/1_2.png" alt="logo" class="logo" style="width:7em; height:auto; max-width:300px; border-radius: 50%; border: solid black 2px; display: block;align-self: center;justify-self:center;"></center>
      <span class="title span_text" style="font-size: 1.2em">MEGA MEET<sup style="font-size: 0.5em;">TM</sup></span>
      <span class="gray_text span_text" style="font-size: 1.2em;">contact@megameet.com</span>
      <a class="link" href="tel:+91 9099227700">+91 9099227700</a>
      <span class="gray_text">FOLLOW US ON SOCIAL MEDIA</span>
      <a href="https://www.instagram.com/mit25779/" target="_blank">
        <img src="../IMAGES/ICONS/instagram2.svg" alt="" style="width: 1.5em;"></a>
    </div>
    <div class="important_links footer_box">
      <span class="title span_text" style="font-size: 1.2em;">IMPORTANT LINKS</span>
      <a class="link" href="IMPORTANT_LINKS\AboutUs.php">ABOUT US</a>
      <a class="link" href="IMPORTANT_LINKS\Cancellation.php">CANCELLATION POLICY</a>
      <a href="IMPORTANT_LINKS\PrivacyPolicy.php" class="link">PRIVACY POLICY</a>
      <a href="IMPORTANT_LINKS\TermsAndConditions.php" class="link">TERMS & CONDITIONS</a>
      <a href="IMPORTANT_LINKS\ContactUs.php"> CONTACT US</a>
    </div>
  </footer>




  <div class="copyright" style="text-align: center; width: 100%; background-color: #e9ecef;">
    &#169; Mega Meet <sup style="font-size: 10px;">TM</sup> 2024
  </div>
</body>

</html>