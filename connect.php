<?php
$user = "mechApp";
$host = 'localhost';
$password = 'mech1234';
$database = 'mechlocator';

if($conn = mysqli_connect($host,$user,$password,$database)){
echo "<h3 style='color:green'>Connected successfully</h3>";
}
else{ 
    echo"<h3 style='color:red'>Could not connect successfully</h3>" .mysqli_error($connection);
}
?>