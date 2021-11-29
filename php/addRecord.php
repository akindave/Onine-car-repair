<?php
include "connect.php";
session_start();
if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
}
else{ 
    header('Location:../login.php');
}



if(isset($_POST['addRecord'])){
    $num_plate = mysqli_escape_string($connection,$_POST["num_plate"]);


    $selectCar = "SELECT * FROM cars WHERE user_id='$user_id'";

    $receivedCar = mysqli_query($connection,$selectCar);

    if(!$receivedCar){
        echo "msqli error" .mysqli_error($connection);
      }
      else{ 
        $row =mysqli_num_rows($receivedCar);
        // $receivedCar = mysqli_fetch_assoc($receivedCar);
        while($row = mysqli_fetch_array($receivedCar)){
        {
         //this means that the user has a car
                if($row['num_plate'] == $num_plate){ 
                   
                       
                        $actArray =($_POST['hiddenActivity']);
                        $costArray = ($_POST['hiddenCost']);
                        $length = ($_POST['length']);
                    
                        $actArray = explode(",",$actArray);
                        $costArray = explode(",",$costArray);


                        $length = $length/2;
                        // echo "length" .$length;

                        for($i=$length;$i>-1;$i--){

                            if($i > 0){
                                // echo "<br>";
                                // echo $actArray[$i] . "=" .$costArray[$i];
                                // echo "<br>";
                                enter($actArray[$i],$costArray[$i]);
                            }                   
                    }
                }
                    
                }
                
        }
       
      }
    }


    // array_map(function($act,$cost){
    //     // echo "$act costs $cost\n";
    //     enter($act,$cost);
    // },$actArray, $costArray);

 
//    foreach($actArray as $item){
//        echo "<br>".$item;
//        echo "The end";
//    }

//    echo "<br> count: ";
//    echo count($actArray);
   

  

else{ 
    echo "button not clicked";
}

// function for entering records  
function enter($acti,$costi){ 
    // $user_id = $_SESSION['user_id'];

    // $num_plate = mysqli_escape_string($GLOBALS['$connection'],$_POST["num_plate"]);
    $num_plate1 = $GLOBALS['num_plate'];

    $addRecord = "INSERT INTO repairs(num_plate,activity,cost) VALUES ('$num_plate1','$acti','$costi')";
   
    if(mysqli_query($GLOBALS['connection'],$addRecord)){ 
        // echo "Successfully added repair";
    }
    else{ 
        echo "error";
    }
}

?>