<?php

@include '../../PHP/config.php';

session_start();



?>





<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us</title>

  <link rel="stylesheet" href="../../CSS/header1.css">
  <link rel="stylesheet" href="../../CSS/footer.css">
  <link rel="stylesheet" href="../../CSS/general.css">

  <script src="../../JavaScript/sidebar.js" defer></script>
  <style>
    .contact {
      margin: 60px;
      padding-bottom: 200px;
      padding-top: 200px;
    }
  </style>

  
<link rel="stylesheet" href="../../CSS/sidebar.css">
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

    <link rel="shortcut icon" href="../../IMAGES/LOGO/1_2.png" type="image/x-icon">


    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
    />
</head>

<body>

  <div class="header">



    <div class="header_logo">
      <a href="../index.php">
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
        <a href="https://www.instagram.com/mit25779/" target="_blank">
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
            <a href="../index.php" class="nav-link">
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
                      <a href='../..\PHP\organizer\oraganizer_add_event.php' class='nav-link'>
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




  <div class="contact">
    <h3>About Us</h3>
    <p>Welcome to MegaMeet.com - Where Adventure Meets Flavor, Inspired by India's Beloved Student , Mit Prajapati!</p>
    <p>Founded in 2024 by  managment enthusiast Mit Prajapati , MegaMeet.com embodies our shared passion for exploration, Event Organizing, and diverse culinary experiences.</p>
    <p><br></p>
    <p><b>Our Vision</b></p>
    <p>At MegaMeet.com, we aspire to inspire and enable extraordinary organizing experiences, igniting the wanderlust within each person. We firmly believe that event transcends the act of socializing places and different people—it's an expedition into a realm of diverse experiences, flavors, and enduring memories.</p>
    <p><br></p>
    <p><b>Meet the Visionaries</b></p>
    <p><b>Mit Prajapati</b></p>
    <p>Founder </p>
    <p>Mit, ourfounder, is a student at Gujarat University in Animation Department . MIT's creative prowess and zest for life infuse MegaMeet.com with an electrifying energy, making every Event tale and culinary adventure all the more captivating.</p>
    <p><br></p>
    </p>
    <p><b>Our Offerings</b></p>
    <p>&nbsp; &nbsp; Event Chronicles and Guides: Immerse yourself in our vibrant event narratives, capturing the essence of diverse destinations and offering invaluable insights and recommendations for unforgettable memories.</p>
    <p>&nbsp; &nbsp; Culinary Expeditions: Embark on a gastronomic adventure with our comprehensive guides and delightful anecdotes, allowing you to savor unique flavors and culinary delights from around the world.</p>
    <p>&nbsp; &nbsp; Tailored Event Hosting Services: Let us assist you in crafting your next Event. Our seasoned management experts and extensive network ensure a seamless and memorable experiences tailored to your preferences.</p>
    <p>&nbsp; &nbsp; Community Engagement: Join our thriving community of  enthusiasts and food aficionados. Share your stories, tips, and experiences, and connect with kindred spirits who share your passion for exploration.</p>
    <p><br></p>
    <p>Join us on this Epic Journey</p>
    <p>Embark  with MegaMeet.com as we unveil hidden treasures, tantalize your taste buds, and inspire you to embrace the world with an open heart and an adventurous spirit. Together, let's create memories that last a lifetime. Welcome to the adventure—welcome to MegaMeet.com!</p>

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
        <img src="../../IMAGES/ICONS/instagram2.svg" alt="" style="width: 1.5em;"></a>
    </div>
    <div class="important_links footer_box">
      <span class="title span_text" style="font-size: 1.2em;">IMPORTANT LINKS</span>
      <a class="link" href="AboutUs.php">ABOUT US</a>
      <a class="link" href="Cancellation.php">CANCELLATION POLICY</a>
      <a href="PrivacyPolicy.php" class="link">PRIVACY POLICY</a>
      <a href="TermsAndConditions.php" class="link">TERMS & CONDITIONS</a>
      <a href="ContactUs.php"> CONTACT US</a>
    </div>
  </footer>




  <div class="copyright" style="text-align: center; width: 100%; background-color: #e9ecef;">
    &#169; Mega Meet <sup style="font-size: 10px;">TM</sup> 2024
  </div>
</body>

</html>




</div>