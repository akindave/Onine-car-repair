<?php
//create db connection
session_start();
require 'connect.php';
echo '
        <nav class="nav">
        <img src="icons/car.svg" alt="logo" class="logo">
        <button class="menu-btn">
            <img src="icons/menu.svg" alt="menu" class="nav-icon">
            Menu

            <!--    code for 3 lines in html -->
        </button>
        <div class="flex-wrap links">

        <a href="#">Home</a>

            <a class="has-drop" href="#">Mechanics</a>
            <a>Contact us </a>

            <div class="admin-holder user-holder">
                <div class="has-drop">

                <img src="icons/user.svg" alt="user" class="icon"> Username
                <img src="icons/arrow-white.svg" alt="d" class="down-arrow">
                </div>

            <!-- admin options dropdown -->
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

                </div>
            </div>

        </div>
        </nav>
';

?>