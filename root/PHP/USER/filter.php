<?php

@include '../config.php';

session_start();

if(isset($_GET['event_location'])){
  $location = $_GET['event_location'];
  $select = " SELECT * FROM events WHERE event_location= '$location' ";
  $result = mysqli_query($conn, $select);
}
elseif(isset($_GET['event_type'])){
  $type = $_GET['event_type'];
  $select = " SELECT * FROM events WHERE event_type= '$type' ";
  $result = mysqli_query($conn, $select);
}
else{
  $select = " SELECT * FROM events ";
  $result = mysqli_query($conn, $select);
}





// $_GET["name"];





?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home</title>

  <link rel="stylesheet" href="../../CSS/header1.css" />
  <link rel="stylesheet" href="../../CSS/sidebar.css" />
  <link rel="stylesheet" href="../../CSS/subheading.css" />
  <link rel="stylesheet" href="../../CSS/featured.css" />
  <link rel="stylesheet" href="../../CSS/state_card.css" />
  <link rel="stylesheet" href="../../CSS/custom.css">
  <link rel="stylesheet" href="../../CSS/footer.css">
  <link rel="stylesheet" href="../../CSS/general.css">
  <link rel="stylesheet" href="../css/filter_card.css">



  <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
  <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />

  <link rel="shortcut icon" href="../../IMAGES/LOGO/1_2.png" type="image/x-icon">


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />




  <script src="../../JavaScript/subheader.js" defer></script>
  <script src="../../JavaScript/sidebar.js" defer></script>
  <script src="../../JavaScript/state_card.js" defer></script>
  <script src="../../JavaScript/featured.js" defer></script>
</head>












<body>






  <div class="header">



    <div class="header_logo">
      <a href="../../HTML/index.php">
        <img class="megameet_logo" src="../../IMAGES/LOGO/1_2.png" />
      </a>
    </div>


    <div class="header_serch_bar">
      <input class="search-bar" type="text" placeholder="Search..." />
      <button class="search-button">
        <img class="search-icon" src="../../IMAGES/ICONS/search.svg" />
      </button>
    </div>


    <div class="location_input">
      <img src="../../IMAGES/ICONS/location.svg" alt="" class="location-icon" />
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
        <a href="https://www.instagram.com/sumit_.prajapati?igsh=MXY1d2tmZWY2aHUwag==" target="_blank">
          <img src="../../IMAGES/ICONS/instagram.svg" alt="" />
        </a>
      </div>

      <div class="sign_cart">

        <div class="header_cart icon">
          <img src="../../IMAGES/ICONS/cart.svg" alt="" />
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
          <a href="../../PHP/login_form.php">
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
                        echo "../../PHP/USER/user_profile.php";
                      } else {
                        echo "../../PHP/organizer/organizer_profile.php";
                      }
                    } else {
                      echo "../../PHP/login_form.php";
                    }
                    ?>
                    ">
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






  <nav>




    <div class="sidebar">
      <div class="logo">
        <img src="../../IMAGES/ICONS/xmark.svg" class="cross_icon" style="height: 24px; margin-right: 1em" />
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
            <a href="../../HTML/index.php" class="nav-link">
              <i class="bx bx-home-alt icon"></i>
              <span class="link">Home</span>
            </a>
          </li>
          <li class="list">
            <a href="<?php
                      if (isset($_SESSION['email'])) {
                        if ($_SESSION['user_type'] == 'user') {
                          echo "../../PHP/USER/user_profile.php";
                        } else {
                          echo "../../PHP/organizer/organizer_profile.php";
                        }
                      } else {
                        echo "../../PHP/login_form.php";
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
                      <a href='../../PHP/USER/user_cart.php' class='nav-link'>
                        <i class='bx bx-cart icon'></i>
                        <span class='link'>Cart</span>
                      </a>
                    </li>";
            } else {
              echo "<li class='list'>
                      <a href='..\../PHP\organizer\oraganizer_add_event.php' class='nav-link'>
                        <i class='bx bx-plus icon'></i>
                        <span class='link'>Add Event</span>
                      </a>
                    </li>";
            }
          } else {
            echo "<li class='list'>
                      <a href='../../PHP/login_form.php' class='nav-link'>
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
                      <a href='../../PHP/USER/user_booked_events.php' class='nav-link'>
                      <i class='fa-solid fa-ticket icon'></i>
                        <span class='link'>Booked Event</span>
                      </a>
                    </li>";
            } else {
              echo "<li class='list'>
                      <a href='../../PHP\organizer\oraganizer_created_event.php' class='nav-link'>
                        <i class='bx bx-table icon'></i>
                        <span class='link'>Created Event</span>
                      </a>
                    </li>";
            }
          } else {
            echo "<li class='list'>
                      <a href='../../PHP/login_form.php' class='nav-link'>
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
                        echo "../../PHP/logout.php";
                      } else {
                        echo "../../PHP/login_form.php";
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

  <div class="filter_body">
    <div class="user_booked_events" style="margin: auto;">
      <div class="scrolling_page1" style="margin: auto;" id="searchresult">
        <?php
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
          $event_id=$row['event_id'];

          echo "<div class='full'>
                            <div class='image'>
                                <img src='../../IMAGES/events/$img1' alt=''>
                            </div>

                <div class='details'>

                            <div class='name_date'>
                                <h2>$event_name</h2>
                                <p>$event_location</p>
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
                            <p>&#8377;$event_price</p>
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
                    <div class='booking'>
                        <div>
                        <a href='../../PHP/cart.php?event_id=$event_id'>
                        <button style='padding:0.5em 1em; background-color:#fff; font-size:1em;'>
                        Add to Cart</button>
                        </a>
                        </div>
                        
                        <div>
                        <a href='../../PHP/booking.php?event_id=$event_id'>
                        <button style='padding:0.5em 1em; background-color:#8BC4BB; font-size:1em; color:#fff;margin-left:5px'>
                        Book Now
                        </button>
                    </a>
                        </div>

                    </div>

                </div>
            </div>";
        }
        ?>



      </div>
    </div>
  </div>




  <footer class="footer">
    <div class="our_vision footer_box">
      <h2 style="padding-bottom: 1em;">Our Vision</h2>
      <p>Discover the more people like you with Mega Meet – where joy meets inspiration. Join us as we explore captivating events, connect with influencers, and create memories that last a lifetime. Your new experiences begins here <a href="">..read more</a></p>
    </div>
    <div class="contact_us footer_box" style="border-right: solid  #ced4da;border-left: solid  #ced4da;">
      <center> <img src="../../IMAGES/LOGO/1_2.png" alt="logo" class="logo" style="width:7em; height:auto; max-width:300px; border-radius: 50%; border: solid black 2px; display: block;align-self: center;justify-self:center;"></center>
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