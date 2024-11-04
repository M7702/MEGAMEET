<?php

@include '../../PHP/config.php';

session_start();



?>





<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Terms & Condition</title>

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
  <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
  <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />

  <link rel="shortcut icon" href="../../IMAGES/LOGO/1_2.png" type="image/x-icon">


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
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
    <h3>Terms & Conditions</h3>
    <div class="content mt-4">
      <p>Terms and Conditions for "MegaMeet" </p>
      <p>
        <font color="#636363">Last Updated: 030-06-2024</font>
      </p>
      <p><span style="font-weight: bolder;">Acceptance of Terms</span></p>
      <p>By accessing or using the services provided under the brand name "Enjoy Kara Do," you agree to be bound by these terms and conditions. If you do not agree with any part of these terms, please do not use our services.</p>
      <p><span style="font-weight: bolder;">Services Offered</span></p>
      <p>"MegaMeet" offers event-related services, including but not limited to  packages, event planning, and accommodations. The details of these services are outlined on our website and may be subject to change without notice.</p>
      <p><span style="font-weight: bolder;">Booking and Reservations</span></p>
      <p>a. To book any of our services, users must provide accurate and complete information.</p>
      <p>b. Booking confirmation is subject to availability, and MegaMeet reserves the right to decline bookings at its discretion.</p>
      
      <p><span style="font-weight: bolder;">Payment</span></p>
      <p>a. Payment details, including pricing and any applicable fees, are outlined during the booking process.</p>
      <p>b. Payment must be made in full to confirm reservations.</p>
      <p>c. Prices are subject to change, and any changes will be communicated before confirmation.</p>
      <p><span style="font-weight: bolder;">Cancellation and Refunds</span></p>
      <p>a. Cancellation policies vary based on the type of service booked. Please refer to the specific cancellation policy provided during the booking process.</p>
      <p>b. Refunds, if applicable, will be processed in accordance with our refund policy.</p>
      <p><span style="font-weight: bolder;">User Responsibilities</span></p>
      <p>a. Users are responsible for providing accurate information during the booking process.</p>
      <p>b. Users are required to comply with all events requirements, including  health regulations, and insurance.</p>
      <p><span style="font-weight: bolder;">Intellectual Property</span></p>
      <p>a. The content on the "MegaMeet" website, including text, graphics, logos, and images, is the intellectual property  and is protected by copyright laws.</p>
      <p><span style="font-weight: bolder;">Limitation of Liability</span></p>
      <p>a. MegaMeet is not liable for any loss, injury, or damage arising from the use of our services.</p>
      <p>b. Users acknowledge that travel involves inherent risks and release MegaMeet from any liability for such risks.</p>
      <p><span style="font-weight: bolder;">Privacy</span></p>
      <p>a. The privacy of user information is important to us. Please refer to our Privacy Policy for details on how we collect, use, and protect your information.</p>
      <p><span style="font-weight: bolder;">Termination</span></p>
      <p>MegaMeet reserves the right to terminate or suspend services to users who violate these terms and conditions.</p>
      <p><span style="background-color: var(--bs-body-bg); font-size: var(--bs-body-font-size); text-align: var(--bs-body-text-align);"><span style="font-weight: bolder;">Governing Law</span></span><br></p>
      <p>These terms and conditions are governed by the laws of Shimla, Himachal Pradesh. Any disputes arising from these terms will be resolved in the courts of Shimla, Himachal Pradesh.</p>
      <p><br></p>
      <p><b>Contact Information</b></p>
      <p>For any inquiries regarding these terms and conditions, please contact us at contact@megameet.com</p>
      <p><br></p>
      <p>By using the services of "MegaMeet," you agree to these terms and conditions. MegaMeet reserves the right to update or modify these terms at any time, and users are encouraged to review them periodically.</p>
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