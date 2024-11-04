<?php
session_start();
@include '../config.php'; ?>


<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "megameet";
// $port = "3307";

$conn = new mysqli($host, $user, $password, $database);


if ($_SERVER["REQUEST_METHOD"]=="POST"){
  

if(isset($_POST["submit"])){
  $event_name = $_POST['event_name'];
  $event_type =  $_POST['event_type'];
  $event_date = $_POST['event_date'];
  $event_location =$_POST['event_location'];
  $event_length =$_POST['event_length'];
  $event_price =$_POST['event_price'];
  $event_include =  $_POST['event_include'];
  $event_omit =$_POST['event_omit'];
  $event_fLocation= $_POST['event_fLocation'];
  $id = $_SESSION['id'];


  $subjects = array(
    'image' => 'image',
    'image2'=>  'image2',
    'image3' => 'image3',
    'image4' => 'image4',
    'image5' => 'image5',
    'image6' => 'image6'
  );

  $keys = array_keys($subjects);
  $sum = 0;
  foreach($subjects as $subject => $mark){
    
    if($_FILES["$subject"]["error"] == 4){
      $error[] = 'Image Does Not Exist!';
      // break;
    }
    else{
      $fileName = $_FILES["$subject"]["name"];
      $fileSize = $_FILES["$subject"]["size"];
      $tmpName = $_FILES["$subject"]["tmp_name"];
  
      $validImageExtension = ['jpg', 'jpeg', 'png'];
      $imageExtension = explode('.', $fileName);
      $imageExtension = strtolower(end($imageExtension));
      if ( !in_array($imageExtension, $validImageExtension) ){

        $error[] = 'Invalid Image Extension!';
        // break;
      }
      else if($fileSize > 10000000){
        
        $error[] = 'Image Size Is Too Large!';
        // break;
      }
      else{
        $newImageName = uniqid();
        $newImageName .= '.' . $imageExtension;
        $subjects[$subject] = $newImageName;
  
        move_uploaded_file($tmpName, '../../IMAGES\events/' . $newImageName);
        $sum = $sum +1 ;

      }
    }
  }
  $img1 = $subjects[$keys[0]];
  $img2 = $subjects[$keys[1]];
  $img3 = $subjects[$keys[2]];
  $img4 = $subjects[$keys[3]];
  $img5 = $subjects[$keys[4]];
  $img6 = $subjects[$keys[5]];
  
  
  if ($sum == 6) {
    $insert = "INSERT INTO events
    (id,event_name,event_type,event_date,event_location,event_length,event_price,event_fLocation,event_include,event_omit,event_cover,event_img1,event_img2,event_img3,event_img4,event_img5)
    VALUES
    ('$id','$event_name','$event_type','$event_date','$event_location','$event_length','$event_price','$event_fLocation','$event_include','$event_omit','$img1','$img2','$img3','$img4','$img5','$img6')";
    mysqli_query($conn, $insert);
    // header('location:');
    $error[] = ' added to event!';
  }
  else{
    $error[] = 'Unable to add event!';
  }
}
}



?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Oraganizer Event Add</title>

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

    <link rel="stylesheet" href="../css/style.css">

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" defer></script> -->
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
              <a href="oraganizer_password_change.php" style="display: none;">Password Change</a>
            </li>
          </ul>
        </div>
      </div>
      <div class="organizer_booked_events profile_info">
        <div class="scrolling_page scrolling">
          <!-- add product start -->
          

          <div class="form-container" style="min-height: auto;">


    <form class="" action="" method="post" autocomplete="off" enctype="multipart/form-data">
    <h3>Add Event</h3>

    <?php
                    if(isset($error)){
                      foreach($error as $error){
                          echo '<span class="error-msg">'.$error.'</span>';
                      };
                    };
                    ?>

<input type="text" name="event_name" required placeholder="enter event name">

                    <label for="event_type">Type of Event</label>
                    <select name="event_type">
                      <option value="GroupTrip">Group Trip</option>
                      <option value="Socialising">Socialising</option>
                      <option value="Sports">Sports</option>
                      <option value="FunActivities">Fun Activities</option>
                      <option value="Cultural">Cultural</option>
                      <option value="Other">Other</option>
                    </select>
                    <input type="date" name="event_date" required placeholder="">
                    <select name="event_location">
                    <ul>
                        <li>
                          <option  value="Default" selected>City</option>
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
                    <input type="number" name="event_length" required placeholder="max number of people">
                    <input type="number" name="event_price" required placeholder="enter price per person">
                    <input type="text" name="event_include" required placeholder="What's included ? ">
                    <input type="text" name="event_omit" required placeholder="What's forbidden ?">
                    <input type="text" name="event_fLocation" required placeholder="enter full location">

      <label for="image">Cover Image : </label>
      <input type="file" name="image" id = "image" accept=".jpg, .jpeg, .png" value=""> <br> <br>
      <label for="image">Showcase Images : </label>
      <input type="file" name="image2" id = "image" accept=".jpg, .jpeg, .png" value=""> <br> <br>
      <input type="file" name="image3" id = "image" accept=".jpg, .jpeg, .png" value=""> <br> <br>
      <input type="file" name="image4" id = "image" accept=".jpg, .jpeg, .png" value=""> <br> <br>
      <input type="file" name="image5" id = "image" accept=".jpg, .jpeg, .png" value=""> <br> <br>
      <input type="file" name="image6" id = "image" accept=".jpg, .jpeg, .png" value=""> <br> <br>
 

      <input type="submit" name="submit" value="Add now" class="form-btn">

    </form>
  
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

          <div class="bottom-cotent" >
            <li class="list" style="display: none;">
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
