<?php
//create db connection
session_start();
require 'connect.php';
?>
        <nav class="nav">
        <img src="icons/car.svg" alt="logo" class="logo">
        <button class="menu-btn">
            <img src="icons/menu.svg" alt="menu" class="nav-icon">
            Menu

            <!--    code for 3 lines in html -->
        </button>
        <div class="flex-wrap links">

        <a href="motorist-Homepage.php">Home</a>

            <a href="allMechanics.php">Mechanics</a>
            <a href="contact.php">Contact us </a>

            <?php
            if(isset($_SESSION['name'])){
                echo '
                
                <div class="admin-holder user-holder">
                <div class="has-drop">

                <img src="icons/prof-pic.svg" alt="user" class="icon">'.$_SESSION['name']. '
                <img src="icons/arrow-white.svg" alt="d" class="down-arrow">
                </div>
                <div class="admin-drop">

                <a href="userProfile.php" class="noti-holder prof-link flex-wrap">
                <img src="icons/user.svg" alt="user" class="icon">
                My profile
                 </a>
                
                 
                <a href="addRepair.php"> 
                <img src="icons/repair-white.svg" alt="repair" class="icon">
                Add Repair</a>

                <a class="noti-holder flex-wrap" onclick="openPop(`car-pop`)">
                    <img src="icons/car-white.svg" alt="notification" class="icon">
                    Add a car
                </a>

                
                <form action="php/destroySession.php" method="post">
                    <input type="submit" value="Log out" class="log-out-btn">
                </form>
                </div>
            </div>
                ';
            }
            else{
                echo '
            <a href="login.php">Log in</a>
            <a href="signup.php">Sign up</a>

                
                ';
            }
            ?>
            

        </div>
        </nav>

<?php include 'php/addCar.php'; ?>


        <script src="http://localhost/mechlocator/js/profile.js"></script>
