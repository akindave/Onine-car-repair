<?php include 'php/connect.php';
  // session_start();
  $name = '';
  $email = '';
  $phone = '';
?>
<?php include 'php/header.php'; ?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
   <meta name="keywords" content="">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="description" content="">
   <meta name="author" content="">
    <title>User profile</title>
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/nav.css">
    <!-- <link rel="stylesheet" href="css/registration.css"> -->
    <link rel="stylesheet" href="css/profile.css">
  <!-- <script src="js/profile.js"></script> -->

  </head>
  <body>
    <?php
    //Fetching profile data
    if(isset($_SESSION['name'])){ 

      //getting user profile details from the db
      $user_id = $_SESSION['user_id'];
      $selectUser = "SELECT * FROM users  WHERE user_id='$user_id' ";

      $selectCar = "SELECT * FROM cars WHERE user_id='$user_id'";
      $receivedCar = mysqli_query($connection,$selectCar);

      $received = mysqli_query($connection,$selectUser);

        //getting person details from the db
          if(!$received){
            echo "msqli error" .mysqli_error($connection);
          }
          else{ 
            $row =mysqli_num_rows($received);
            $received = mysqli_fetch_assoc($received);
            if($row>0)
            {
              $name = $received['name'];
              $email = $received['email'];
              $phone = $received['phone'];
              $oldPassword = $received['password'];
            }
          }

        //getting car details from db
        if(!$receivedCar){
          echo "msqli error" .mysqli_error($connection);
        }
        else{ 
          $row =mysqli_num_rows($receivedCar);
          $receivedCar = mysqli_fetch_assoc($receivedCar);
          if($row>0)
          {
            $num_plate = $receivedCar['num_plate'];
          }
          else{ 
            $num_plate = 0;
          }
        }

            //changing the password
    if(isset($_POST['pass'])){

      $newPass = mysqli_escape_string($connection,password_hash($_POST['newPass'], PASSWORD_BCRYPT));

      $pass = mysqli_escape_string($connection,$_POST['pass']);
      // $newPass = $_POST['newPass'];

      if(password_verify($pass, $oldPassword)){
        $changePword = "UPDATE users SET password = '$newPass' WHERE user_id = '$user_id'";
        if(mysqli_query($connection,$changePword)){ 
          // echo "Updated password";
        }
        else{ 
          echo "Error updating password".mysqli_error($connection);
        }
      }
      else{ 
        echo "
        <script> 
        <alert> Wrong password</alert>
        </script>
        ";
      }
    }

    //changing all details
    if(isset($_POST['saveBtn'])){
      $name = mysqli_escape_string($connection,$_POST["name"]);
      $email = mysqli_escape_string($connection,$_POST["email"]);
      $phone = mysqli_escape_string($connection,$_POST["phone"]);

      $editDetail = "UPDATE users SET name = '$name', email = '$email' , phone = '$phone' WHERE user_id = '$user_id' ";
      if(mysqli_query($connection,$editDetail)){ 
        // echo "successfully updated details";
        // header("Location:userProfile.php");
        $_SESSION['name'] = $name;
      }
      else{
        echo "Error".mysqli_error($connection);
      }
    }

    }
    else{ 
      //if not logged in, go to login page
      header("location:login.php");
    }
    


    ?>
    <!-- <nav class="nav">
        <img src="icons/car.svg" alt="logo" class="logo">
        <button class="menu-btn">
            <img src="icons/menu.svg" alt="menu" class="nav-icon">
            Menu

            
        </button>
        <div class="flex-wrap links">

          <a href="#">Home</a>

            <a class="has-drop" href="#">Mechanics</a>
            <a>Contact us </a>

            <div class="admin-holder user-holder">
                <div class="has-drop">

                  <img src="icons/user.svg" alt="user" class="icon"> 
                  
                  <?php echo $_SESSION['name']; ?>

                  <img src="icons/arrow-white.svg" alt="d" class="down-arrow">
                </div>

               
                 <div class="admin-drop">

                   <a href="#" class="noti-holder flex-wrap">
                     <small class="noti-no">3</small>
                     <img src="icons/notification-dark.svg" alt="notification" class="icon">
                     Notifications
                   </a>

                   <a href="#" class="noti-holder flex-wrap">
                       <img src="icons/plus.svg" alt="notification" class="icon">
                       Add a car
                     </a>

                  <form action="php/destroySession.php" method="post">
                    <input type="submit" value="Log out" class="log-out-btn">
                </form>

                 </div>
             </div>




        </div>
    </nav> -->

    <main>
<aside class="bgPattern">
  <img src="icons/prof-pic.svg" class="user-img" alt="image">
  
  <h3>Hello👋! 

  <?php echo $_SESSION['name']; ?>

  </h3>
</aside>
    <section class="flex-wrap holder-sect">
      <section class="prof-sect">

        <h3>Personal details</h3>
        <h4>(Click on a detail to edit)</h4>

        <form action="" method="post">
          <article class="detail">
            <img src="icons/user-dark.svg" alt="Username" class="icon">
            <div class="input-grp">
              <label for="name">Name</label>
              <div class="">
              
              <input type="name" name="name" id="name" required value="<?php echo $name; ?>" class="input-elmt">
             
                <button type="button" class="edit-btn flex-wrap" onclick="allowWrite('name')">
                  Edit
                  <img src="icons/edit.svg" alt="edit" class="icon">
                </button>
              </div>
            </div>

          </article>

          <article class="detail">
            <img src="icons/email-svgrepo-com.svg" alt="email" class="icon">
            <div class="input-grp">
              <label for="email">Email</label>
              <div class="">
           
              <input type="email" name="email" id="email" required value="<?php echo $email; ?>" class="input-elmt">
            
                <button type="button" class="edit-btn flex-wrap" onclick="allowWrite('email')">
                  Edit
                  <img src="icons/edit.svg" alt="edit" class="icon">
                </button>
              </div>
            </div>

          </article>


          <article class="detail">
            <img src="icons/call-grey.svg" alt="Username" class="icon">
            <div class="input-grp">
              <label for="phone">Phone no:</label>
              <div class="">
              
              <input type="number" name="phone" id="phone" required value="<?php echo $phone; ?>" class="input-elmt">
              
                <button type="button" class="edit-btn flex-wrap" onclick="allowWrite('phone')">
                  Edit
                  <img src="icons/edit.svg" alt="edit" class="icon">
                </button>
              </div>
            </div>
          </article>

          <!-- <article class="detail">
            <img src="icons/loc-dark.svg" alt="location" class="icon">
            <div class="input-grp">
              <label for="email">Location:</label>
              <div class="flex-wrap">
                <input type="text" name="email" required value="Rongai" class="input-elmt">
                <button type="button" class="edit-btn flex-wrap">
                  Edit
                  <img src="icons/edit.svg" alt="edit" class="icon">
                </button>
              </div>
            </div>
          </article> -->

          <!-- <article class="detail">
            <img src="icons/picture.svg" alt="picture" class="icon">
            <div class="input-grp">
              <label for="email">Profile image:</label>
              <div class="flex-wrap">
                <input type="file" name="email" required value="file name" class="input-elmt">
                <button type="button" class="edit-btn flex-wrap">
                  Edit
                  <img src="icons/edit.svg" alt="edit" class="icon">
                </button>
              </div>
            </div>
          </article> -->

          <article class="detail">
            <button type="button" name="button" class="edit-btn edit-pwd flex-wrap" onclick="openPop('pwd-pop')">
              <img src="icons/password.svg" alt="password" class="icon">
              Edit password
              <img src="icons/edit.svg" alt="edit" class="icon">
             </button>
          </article>

          <article class="detail flex-wrap">
           
              <button type="submit" name="saveBtn" class="save-changes">Save Changes</button>
             <a href="#"> <button class="cancel-btn">Default details</button> </a>
        
          </article>

        </form>

      </section>

      <!-- car details  -->
      <section class="prof-sect">

          <h3>Car details</h3>

          <div class="flex-wrap">
          <?php 
          if($num_plate ==0){
            echo "No car added yet";
          }
          else{
            $selectAllCar = "SELECT * FROM cars WHERE user_id = '$user_id'";
            $carsOwned = mysqli_query($connection,$selectAllCar);

            if(!$carsOwned){
          echo "msqli error" .mysqli_error($connection);
            }
            else{
              
             
              while($row1 = mysqli_fetch_array($carsOwned)){
                echo '
                <div class="car-detail">
                <article class="detail">
                  <img src="icons/car.svg" alt="Username" class="icon">
                  <div class="input-grp">
                    <label for="car_plate">Number plate:</label>
                    <div class="flex-wrap">
    
                      
                      <input type="text" name="car_plate" required value="' .$row1["num_plate"].'" class="input-elmt" readonly>
    
    
                      <button type="button" class="edit-btn flex-wrap">
                        Edit
                        <img src="icons/edit.svg" alt="edit" class="icon">
                      </button>
                    </div>
                  </div>
                </article>
    
                <button type="button" name="button" class="repair-btn flex-wrap">
                  <img src="icons/repair.svg" alt="repair" class="icon">
                  Repair History</button>
              </div>
                ';
              }
            }
           
          }
          ?>
         </div>

          <button type="button" class="add-btn flex-wrap" onclick="openPop('car-pop')">
            <img src="icons/plus.svg" alt="add" class="icon">
            Add car
          </button>
        </section>
    </section>

    <button type="button" name="button" class="del-btn flex-wrap">
      <img src="icons/delete-red.svg" alt="add" class="icon">
      Delete account
    </button>



    <div class="dark-overlay"></div>

    <aside class="pwd-pop flex-wrap">
      <div class="close-icon" onclick="closePop('pwd-pop')">X</div>
      <!-- <img src="icons/close.svg" alt="close window" class="icon"> -->

      <form action="" method="post">
        <div class="input-grp">
          <label for="pass">Enter old Password*</label>
          <input type="password" name="pass" required placeholder="******" class="input-elmt">
        </div>

        <div class="input-grp">
          <label for="pass">Enter new Password*</label>
          <input type="password" name="newPass" required placeholder="******" class="input-elmt">
        </div>

        <div class="pwd-btns">
          <button type="submit" class="save-changes">Save Changes</button>
        <button type="reset" class="cancel-btn" onclick="closePop('pwd-pop')">Cancel</button>
        </div>

      </form>
    </aside>


    </main>
  </body>
  <script src="js/nav.js" charset="utf-8"></script>

</html>
