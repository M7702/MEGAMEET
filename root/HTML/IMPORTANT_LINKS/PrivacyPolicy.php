<?php

@include '../../PHP/config.php';

session_start();



?>





<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Privacy Policy</title>

  <link rel="stylesheet" href="../../CSS/header1.css">
  <link rel="stylesheet" href="../../CSS/footer.css">
  <link rel="stylesheet" href="../../CSS/general.css">
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

  <script src="../../JavaScript/sidebar.js" defer></script>
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
    <p><span style="background-color: var(--bs-body-bg); font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);">Welcome to MegaMeet.com ("us", "we", or "our"). This Privacy Policy outlines the types of personal information we collect, how we use and protect that information, and your rights and choices regarding your data.</span><br></p>
    <p><span style="font-weight: bolder;">Information We Collect</span></p>
    <p>&nbsp; &nbsp; Personal Information:</p>
    <p>&nbsp; &nbsp; &nbsp; &nbsp; When you make a booking or interact with our website, we may collect personal information such as name, email address, phone number, and payment details.</p>
    <p>&nbsp; &nbsp; Usage Information:</p>
    <p>&nbsp; &nbsp; &nbsp; &nbsp; We collect information on how you use our website, including pages visited, links clicked, and interactions with features.</p>
    <p>&nbsp; &nbsp; Device Information:</p>
    <p>&nbsp; &nbsp; &nbsp; &nbsp; We may collect information about the device you use to access our website, such as device type, operating system, and browser.</p>
    <p><br></p>
    <p><span style="font-weight: bolder;">Use of Cookies</span></p>
    <p>We use cookies to enhance your browsing experience on EnjoyKarado.com. Cookies are small text files that are stored on your device when you visit a website. We use the following types of cookies:</p>
    <p>&nbsp; &nbsp; Essential Cookies:</p>
    <p>&nbsp; &nbsp; &nbsp; &nbsp; These cookies are necessary for the website to function correctly and enable you to access specific features. They are usually set in response to actions taken by you, such as logging in or filling forms.</p>
    <p>&nbsp; &nbsp; Analytical Cookies:</p>
    <p>&nbsp; &nbsp; &nbsp; &nbsp; We use analytical cookies to analyze how users interact with our website. This information helps us improve our website's performance and user experience.</p>
    <p>&nbsp; &nbsp; Functional Cookies:</p>
    <p>&nbsp; &nbsp; &nbsp; &nbsp; Functional cookies allow the website to remember your preferences and choices to provide enhanced and personalized features.</p>
    <p><br></p>
    <p><span style="font-weight: bolder;">How We Use Your Information</span></p>
    <p>We use the collected information for the following purposes:</p>
    <p>&nbsp; &nbsp; Service Provision:</p>
    <p>&nbsp; &nbsp; &nbsp; &nbsp; To facilitate bookings, provide services, and respond to inquiries.</p>
    <p>&nbsp; &nbsp; Improvement of Services:</p>
    <p>&nbsp; &nbsp; &nbsp; &nbsp; To analyze usage patterns, evaluate preferences, and improve our website, services, and user experience.</p>
    <p>&nbsp; &nbsp; Communication:</p>
    <p>&nbsp; &nbsp; &nbsp; &nbsp; To communicate with you regarding bookings, updates, offers, and promotional materials.</p>
    <p><br></p>
    <p><span style="font-weight: bolder;">Data Security</span></p>
    <p>We prioritize the security of your personal information and implement appropriate security measures to safeguard it.</p>
    <p>Sharing of Information</p>
    <p>We do not sell or share your personal information with third parties for direct marketing purposes. However, we may share your information with:</p>
    <p>&nbsp; &nbsp; Service Providers: Third-party service providers assisting in the operation of our website or fulfilling services on our behalf.</p>
    <p>&nbsp; &nbsp; Legal Obligations: To comply with legal obligations or respond to lawful requests and legal processes.</p>
    <p><br></p>
    <p><span style="font-weight: bolder;">Your Rights and Choices</span></p>
    <p>You have the right to:</p>
    <p>&nbsp; &nbsp; Access, correct, update, or request deletion of your personal information.</p>
    <p>&nbsp; &nbsp; Opt-out of receiving promotional communications.</p>
    <p>&nbsp; &nbsp; Disable cookies through your browser settings.</p>
    <p><br></p>
    <p><span style="font-weight: bolder;">Changes to this Privacy Policy</span></p>
    <p>We may update this Privacy Policy from time to time. Any changes will be reflected on this page, and the updated policy will be effective immediately upon posting.</p>
    <p><br></p>
    <p><span style="font-weight: bolder;">Contact Us</span></p>
    <p>If you have questions or concerns regarding this Privacy Policy, please contact us at contact@megameet.com.</p>

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