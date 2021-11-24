<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adding a repair record</title>
    <!-- <link rel="stylesheet" href="css/profile.css"> -->
    <link rel="stylesheet" href="css/home.css">

    <link rel="stylesheet" href="css/nav.css">

    <link rel="stylesheet" href="css/addRepair.css">

</head>
<body>
<?php include 'php/header.php';?>

<main>
 <section class="flex-wrap">
        
<button type="button" class="add-btn flex-wrap" onclick="openPop('record-pop')">
            <img src="icons/plus.svg" alt="add" class="icon">
            Add repair record
</button>


 </section>
<aside class="record-pop">
      <div class="close-icon" onclick="closePop('record-pop')">X</div>
      <!-- <img src="icons/close.svg" alt="close window" class="icon"> -->

      <form action="" method="post">
        <div class="input-grp">
          <label for="num_plate">Enter car number plate</label>
          <input type="text" name="num_plate" required placeholder="e.g KAA 123A" class="input-elmt">
        </div>

        <div class="input-grp">
          <label for="num_plate">Enter repair activity done</label>
          <textarea name="activity" id="" cols="15" rows="3" placeholder="e.g Wheel alignment" required  class="input-elmt"></textarea>
          <!-- <input type="text" name="activity" required placeholder="e.g Wheel alignment" class="input-elmt"> -->
        </div>

        <div class="input-grp">
          <label for="num_plate">Enter cost of repair</label>
            <span>Kshs 
          <input type="number" name="cost" required placeholder="e.g 3000" class="input-elmt cost-input">
            </span>
        </div>
        

        <div class="pwd-btns">
          <button type="submit" name="addRecord" class="save-changes">Save repair record</button>
        <button type="reset" class="cancel-btn" onclick="closePop('record-pop')">Cancel</button>
        </div>

      </form>
    </aside>


    <div class="dark-overlay"></div>

    
</main>    
<script src="js/nav.js" defer></script>

<script defer>
  openPop('record-pop');
</script>
</body>
</html>

<?php
if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
}
else{ 
    header('Location:login.php');
}

if(isset($_POST['addRecord'])){
    $num_plate = mysqli_escape_string($connection,$_POST["num_plate"]);
    $activity = mysqli_escape_string($connection,$_POST["activity"]);
    $cost = mysqli_escape_string($connection,$_POST["cost"]);

    $addRecord = "INSERT INTO repairs(num_plate,activity,cost) VALUES('$num_plate','$activity','$cost')";
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
                    if(mysqli_query($connection,$addRecord)){ 
                        echo "Success";
                    }
                    else{ 
                        echo "Error";
                    }
                }
                
        }
       
      }
    }
}

?>