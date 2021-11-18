
<?php
//create db connection
session_start();
require 'connect.php';

if(!isset($_SESSION['errorNumber'])){
    $_SESSION['errorNumber'] = 0;
}


if(isset($_POST['email']) && isset($_POST['pass'])){
    
$email = mysqli_escape_string($connection,$_POST['email']);
$pass = mysqli_escape_string($connection,$_POST['pass']);

//the username entered should match with the password
$selectUser = "SELECT * FROM car_owner  WHERE Email='$email' ";
$received = mysqli_query($connection,$selectUser);

//checking number of rows received
if(!$received){
    echo "msqli error" .mysqli_error($connection);
}
else{
    $row =mysqli_num_rows($received);
    $received = mysqli_fetch_assoc($received);
    if($row>0)
    {
            //php ftn for checking hashed passwords
                if(password_verify($pass,$received['password']))
                {

                    $_SESSION['username'] = $username;
                    // echo $_SESSION['username'] ."welcome";
                   //delay the code below for 5 seconds
                    // sleep(5);

                    //if its the admin logging in, take him to admin page
                    if($username == 'admin'){
                        header("location: ../front-end/admin-page/admin.php");
                    }
                    //go to landing page
                    else{
                        header("location: ../front-end/landing-shop/landing.php");
                    }
                     
                }
                else{
                    $_SESSION['errorNumber'] = 1;
                   $checkPassword = "<div style = 'color:red'> <strong>Check Your password </strong></div>";
                 
                   header("location:../motorist-Homepage.html");

                }
            }
    else
         {
            $_SESSION['errorNumber'] = 3;
             $noUser = "<h1 style= 'color:red;'>User not registered</h1> <br> ";
             header("location:../motorist-Homepage.html");

            }
        }


}

?>