<?php

@include '../PHP/config.php';

session_start();



?>





<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>

    <link rel="stylesheet" href="../CSS/header1.css" />
    <link rel="stylesheet" href="../CSS/sidebar.css" />
    <link rel="stylesheet" href="../CSS/subheading.css" />
    <link rel="stylesheet" href="../CSS/featured.css" />
    <link rel="stylesheet" href="../CSS/state_card.css" />
    <link rel="stylesheet" href="../CSS/custom.css">
    <link rel="stylesheet" href="../CSS/footer.css">
    <link rel="stylesheet" href="../CSS/general.css">



    <link
      href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    />
    <link
      href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css"
      rel="stylesheet"
    />

    <link rel="shortcut icon" href="../IMAGES/LOGO/1_2.png" type="image/x-icon">


    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
    />




    <script src="../JavaScript/subheader.js" defer></script>
    <script src="../JavaScript/sidebar.js" defer></script>
    <script src="../JavaScript/state_card.js" defer></script>
    <script src="../JavaScript/featured.js" defer></script>


      <style>
        .location_input{
          display: none !important;
        }
      </style>

  </head>












  <body>






    <div class="header">



      <div class="header_logo">
        <a href="#">
            <img
            class="megameet_logo"
            src="../IMAGES/LOGO/1_2.png"
          />
        </a>
      </div>


      <div class="header_serch_bar">
        <input class="search-bar" type="text"  id="live_search"
        
        placeholder="Search..." />
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
          <a
            href="https://www.instagram.com/mit25779/"
            target="_blank"
          >
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
                if(isset($_SESSION['email'])){
                    echo"";
                    }
                    else{
                    echo"Sign in";
                    }
                    ?>
                  </p>
              </div>
            </a>
            <!-- account icon -->
            <a href="<?php
                if(isset($_SESSION['email'])){
                    if($_SESSION['user_type'] == 'user'){
                      echo"../PHP/USER/user_profile.php";
                    }
                    else{
                      echo"../PHP/organizer/organizer_profile.php";
                    }
                    }
                    else{
                      echo"../PHP/login_form.php";
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
          <img src="../IMAGES/ICONS/xmark.svg" class="cross_icon"style="height: 24px; margin-right: 1em" />
          <span class="logo-name">
          <?php
                if(isset($_SESSION['email'])){
                    if($_SESSION['user_type'] == 'user'){
                      echo $_SESSION['user_name'];
                    }
                    else{
                      echo $_SESSION['organizer_name'];
                    }
                    }
                    else{
                      echo" Name";
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
                if(isset($_SESSION['email'])){
                    if($_SESSION['user_type'] == 'user'){
                      echo"../PHP/USER/user_profile.php";
                    }
                    else{
                      echo"../PHP/organizer/organizer_profile.php";
                    }
                    }
                    else{
                      echo"../PHP/login_form.php";
                    }
                    ?>" class="nav-link">
                <i class="bx bx-user icon"></i>
                <span class="link">Profile</span>
              </a>
            </li>
            <!-- show add event option for organizer -->
            <?php
                if(isset($_SESSION['email'])){
                    if($_SESSION['user_type'] == 'user'){
                      echo"<li class='list'>
                      <a href='../PHP/USER/user_cart.php' class='nav-link'>
                        <i class='bx bx-cart icon'></i>
                        <span class='link'>Cart</span>
                      </a>
                    </li>";
                    }
                    else{
                      echo"<li class='list'>
                      <a href='..\PHP\organizer\oraganizer_add_event.php' class='nav-link'>
                        <i class='bx bx-plus icon'></i>
                        <span class='link'>Add Event</span>
                      </a>
                    </li>";
                    }
                    }
                    else{
                      echo"<li class='list'>
                      <a href='../PHP/login_form.php' class='nav-link'>
                        <i class='bx bx-cart icon'></i>
                        <span class='link'>Cart</span>
                      </a>
                    </li>";
                    }
                    ?>
            <!-- show created event option for organizer -->
            <?php
                if(isset($_SESSION['email'])){
                    if($_SESSION['user_type'] == 'user'){
                      echo"<li class='list'>
                      <a href='../PHP/USER/user_booked_events.php' class='nav-link'>
                      <i class='fa-solid fa-ticket icon'></i>
                        <span class='link'>Booked Event</span>
                      </a>
                    </li>";
                    }
                    else{
                      echo"<li class='list'>
                      <a href='../PHP\organizer\oraganizer_created_event.php' class='nav-link'>
                        <i class='bx bx-table icon'></i>
                        <span class='link'>Created Event</span>
                      </a>
                    </li>";
                    }
                    }
                    else{
                      echo"<li class='list'>
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
                if(isset($_SESSION['email'])){
                  echo "../PHP/logout.php" ;
                    }
                    else{
                    echo"../PHP/login_form.php";
                    }
                    ?>" class="nav-link">
                    <?php
                if(isset($_SESSION['email'])){
                  echo "<i class='bx bx-log-out icon'></i>";
                    }
                    else{
                    echo"<i class='bx bx-log-in icon'></i>";
                    }
                    ?>
                <span class="link">
                <?php
                if(isset($_SESSION['email'])){
                  echo "Sign out";
                    }
                    else{
                    echo"Sign in";
                    }
                    ?>
                </span>
              </a>
            </li>
          </div>
        </div>
      </div>
    </nav>







    <div class="subheader">
      <div class="filter_bar">
        
        <button class="filter_button"><i class="bx bx-filter icon " ></i> Filter</button>
      </div>
      <div class="wrapper1">
        <div class="icon1">
          <i id="left" class="fa-solid fa-angle-left"></i>
        </div>
        <ul class="tabs-box">
          <a href="../PHP/USER/filter.php?"><li class="tab active">All</li></a>
          <a href="../PHP/USER/filter.php?event_type=Sports"><li class="tab ">Sports</li></a>
          <a href="../PHP/USER/filter.php?event_type=Cultural"><li class="tab ">Cultural</li></a>
          <a href="../PHP/USER/filter.php?event_type=FunActivities"><li class="tab">Fun Activities</li></a>
          <a href="../PHP/USER/filter.php?event_type=GroupTrip"><li class="tab">Trips</li></a>
          <a href="../PHP/USER/filter.php?event_type=FunActivities"><li class="tab">Adventures</li></a>
          <a href="../PHP/USER/filter.php?event_type=Other"><li class="tab">Leisure</li></a>
          <a href="../PHP/USER/filter.php?event_type=Socialising"><li class="tab">Socialising</li></a>
        </ul>
        <div class="icon1">
          <i id="right" class="fa-solid fa-angle-right"></i>
        </div>
      </div>
    </div>








    <div class="main">


      <div style="display: flex; align-items: center; font-size: 20px;text-align: center;margin: 1em;">
        <h2>Featured Trips</h2>
      </div>



      <div class="feature_main">

        <div class="wrapper">
          <i id="left" class="fa-solid fa-angle-left"></i>
          <ul class="carousel">
            <a
              href="../PHP/USER/filter.php?event_type=Socialising"
            >
              <li class="card">
                <div class="img">
                  <img src="../IMAGES/FEATURES/cafe.webp" alt="img" draggable="false" />
                </div>
                <h2>Coffee Meet</h2>
              </li>
            </a>
            <a
              href="../PHP/USER/filter.php?event_type=Sports"
            >
              <li class="card">
                <div class="img">
                  <img src="../IMAGES/FEATURES/cricket.jpeg" alt="img" draggable="false" />
                </div>
                <h2>cricket</h2>
              </li>
            </a>

            <a
              href="../PHP/USER/filter.php?event_type=Cultural"
            >
              <li class="card">
                <div class="img">
                  <img src="../IMAGES/FEATURES/garba.jpeg" alt="img" draggable="false" />
                </div>
                <h2>Garba</h2>
              </li>
            </a>
            <a
              href="../PHP/USER/filter.php?event_type=Sports"
            >
              <li class="card">
                <div class="img">
                  <img src="../IMAGES/FEATURES/football.jpeg" alt="img" draggable="false" />
                </div>
                <h2>football</h2>
              </li>
            </a>
            <a
              href="../PHP/USER/filter.php?event_type=FunActivities"
            >
              <li class="card">
                <div class="img">
                  <img
                    src="../IMAGES/FEATURES/Hindi-Natak.webp"
                    alt="img"
                    draggable="false"
                  />
                </div>
                <h2>Hindi Natak</h2>
              </li>
            </a>
            <a
              href="../PHP/USER/filter.php?event_type=FunActivities"
            >
              <li class="card">
                <div class="img">
                  <img
                    src="../IMAGES/FEATURES/motor-bike.jpg"
                    alt="img"
                    draggable="false"
                  />
                </div>
                <h2>Bike Ride</h2>
              </li>
            </a>
            <a
              href="../PHP/USER/filter.php?event_type=GroupTrip"
            >
              <li class="card">
                <div class="img">
                  <img src="../IMAGES/FEATURES/park.jpg" alt="img" draggable="false" />
                </div>
                <h2>Picnic Trip</h2>
              </li>
            </a>
            <a
              href="../PHP/USER/filter.php?event_type=Other"
            >
              <li class="card">
                <div class="img">
                  <img src="../IMAGES/FEATURES/seminar.jpg" alt="img" draggable="false" />
                </div>
                <h2>Seminar</h2>
              </li>
            </a>
            <a
              href="../PHP/USER/filter.php?event_type=FunActivities"
            >
              <li class="card">
                <div class="img">
                  <img
                    src="../IMAGES/FEATURES/cycle_ride.jpg"
                    alt="img"
                    draggable="false"
                  />
                </div>
                <h2>Cycle ride</h2>
              </li>
            </a>
            <a
              href="../PHP/USER/filter.php?event_type=Sports"
            >
              <li class="card">
                <div class="img">
                  <img src="../IMAGES/FEATURES/yoga.jpg" alt="img" draggable="false" />
                </div>
                <h2>Yoga</h2>
              </li>
            </a>
          </ul>
          <i id="right" class="fa-solid fa-angle-right"></i>
        </div>
      </div>




      <div
        style="
          display: flex;
          align-items: center;
          font-size: 20px;
          text-align: center;
          margin: 1em;
        "
      >
        <h2>Gujarat</h2>
      </div>




      <div class="india_state">
        <div class="wrapper">
          <i id="left" class="fa-solid fa-angle-left"></i>
          <ul class="carousel">
            <a
              href="../PHP/USER/filter.php?event_location=Ahemadabad"
            >
              <li class="card">
                <div class="img">
                  <img src="../IMAGES/CITIES/Ahmedabad.jpg" alt="img" draggable="false" />
                </div>
                <h2>Ahmedabad</h2>
              </li>
            </a>
            <a
              href="../PHP/USER/filter.php?event_location=Bhavnagar"
            >
              <li class="card">
                <div class="img">
                  <img
                    src="../IMAGES/CITIES/Bhavnagar.jpeg"
                    alt="img"
                    draggable="false"
                  />
                </div>
                <h2>Bhavnagar</h2>
              </li>
            </a>
            <a
              href="../PHP/USER/filter.php?event_location=Daman"
            >
              <li class="card">
                <div class="img">
                  <img
                    src="../IMAGES/CITIES/Daman And Diu.jpg"
                    alt="img"
                    draggable="false"
                  />
                </div>
                <h2>Daman And Diu</h2>
              </li>
            </a>
            <a
              href="../PHP/USER/filter.php?event_location=Gandhidham"
            >
              <li class="card">
                <div class="img">
                  <img
                    src="../IMAGES/CITIES/Gandhidham.jpg"
                    alt="img"
                    draggable="false"
                  />
                </div>
                <h2>Gandhidham</h2>
              </li>
            </a>
            <a
              href="../PHP/USER/filter.php?event_location=Mehesana"
            >
              <li class="card">
                <div class="img">
                  <img src="../IMAGES/CITIES/Mahesana.webp" alt="img" draggable="false" />
                </div>
                <h2>Mahesana</h2>
              </li>
            </a>
            <a
              href="../PHP/USER/filter.php?event_location=Morvi"
            >
              <li class="card">
                <div class="img">
                  <img src="../IMAGES/CITIES/Morvi.jpeg" alt="img" draggable="false" />
                </div>
                <h2>Morvi</h2>
              </li>
            </a>
            <a
              href="../PHP/USER/filter.php?event_location=Patan"
            >
              <li class="card">
                <div class="img">
                  <img src="../IMAGES/CITIES/Patan.jpg" alt="img" draggable="false" />
                </div>
                <h2>Patan</h2>
              </li>
            </a>
            <a
              href="../PHP/USER/filter.php?event_location=Porbandar"
            >
              <li class="card">
                <div class="img">
                  <img src="../IMAGES/CITIES/Porbandar.jpg" alt="img" draggable="false" />
                </div>
                <h2>Porbandar</h2>
              </li>
            </a>
            <a
              href="../PHP/USER/filter.php?event_location=Rajkot"
            >
              <li class="card">
                <div class="img">
                  <img src="../IMAGES/CITIES/Rajkot.jpg" alt="img" draggable="false" />
                </div>
                <h2>Rajkot</h2>
              </li>
            </a>
            <a
              href="../PHP/USER/filter.php?event_location=Surat"
            >
              <li class="card">
                <div class="img">
                  <img src="../IMAGES/CITIES/Surat.jpg" alt="img" draggable="false" />
                </div>
                <h2>Surat</h2>
              </li>
            </a>
            <a
              href="../PHP/USER/filter.php?event_location=Vadodara"
            >
              <li class="card">
                <div class="img">
                  <img src="../IMAGES/CITIES/Vadodara.jpeg" alt="img" draggable="false" />
                </div>
                <h2>Vadodara</h2>
              </li>
            </a>
          </ul>
          <i id="right" class="fa-solid fa-angle-right"></i>
        </div>
      </div>


                     <a href=""></a>
      <div class="custom" >
        <a href="" class="custom_planer">
          <div class="custom_planer">
            Customize your Trip
          </div>
        </a>
        <a href="<?php 
         if(isset($_SESSION['email'])){
          if($_SESSION['user_type'] == 'organizer'){
            echo"../PHP/organizer/oraganizer_add_event.php";
          }
          else{
            echo"../PHP/register_form.php";
          }
          }
          else{
            echo"../PHP/register_form.php";
          }?>" class="oraganizing_event">
        <div class="oraganizing_event">
          Have Event Idea? Let us organize!
        </div>
      </a>
        
      </div>





    </div>






    <footer class="footer">
      <div class="our_vision footer_box">
          <h2 style="padding-bottom: 1em;">Our Vision</h2>
          <p>Discover the more people like you with Mega Meet – where joy meets inspiration. Join us as we explore captivating events, connect with influencers, and create memories that last a lifetime. Your new experiences begins here <a href="../HTML/IMPORTANT_LINKS/AboutUs.php">..read more</a></p>
      </div>
      <div class="contact_us footer_box" style="border-right: solid  #ced4da;border-left: solid  #ced4da;">
         <center> <img src="../IMAGES/LOGO/1_2.png" alt="logo" class="logo" style="width:7em; height:auto; max-width:300px; border-radius: 50%; border: solid black 2px; display: block;align-self: center;justify-self:center;"></center>
          <span class="title span_text"  style="font-size: 1.2em">MEGA MEET<sup style="font-size: 0.5em;">TM</sup></span>
          <span class="gray_text span_text" style="font-size: 1.2em;">contact@megameet.com</span>
          <a class="link" href="tel:+91 9099227700" >+91 9099227700</a>
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
    &#169;  Mega Meet <sup style="font-size: 10px;">TM</sup> 2024
  </div>

    <!-- TABLES -->
    <!-- EVENT TO ORGANIZER -->
    <!-- STATUS -->
    <!-- USER TO EVENT FOR ORGANIZER -->
    <!-- STATUS -->

  </body>
</html>
