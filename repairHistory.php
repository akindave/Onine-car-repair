<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
   <meta name="keywords" content="">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="description" content="">
   <meta name="author" content="">
    <title>Repair History </title>
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/history.css">
  </head>
  <body>
<?php include 'php/header.php';?>
    <main>

    <section class="holder-sect">

    <?php
        if(isset($_SESSION['user_id'])){
            $user_id = $_SESSION['user_id'];

        }
        else{ 
            header('Location:login.php');
        }
?>


      <section class="flex-wrap">

                

                    <?php
                    $selectAllCars = "SELECT * FROM cars WHERE user_id = '$user_id'";
                    $TotalCost = 0;
                    $results = mysqli_query($connection,$selectAllCars);
                    if(!$results){
                      echo 'Error getting cars';
                    }
                    else{

                          $row = mysqli_num_rows($results);
                          if($row > 0){
                                while($row = mysqli_fetch_array($results)){
                                  $car_plate = $row['num_plate'];
                                  $selectRecord = "SELECT * FROM repairs WHERE num_plate = '$car_plate'";
                                  $received = mysqli_query($connection,$selectRecord);
                                  $repair_row = mysqli_num_rows($received);
                                  if($repair_row>0){

                                  
                                  echo '
                                  <article class="repair-card">

                                  <h4><span class="num-plate"> <img src="icons/car.svg" class="icon" alt="car">'.$car_plate.'</span></h4> 
                                        
                                          <div class="holder-tbl">
                                            <div class="header-row flex-wrap">
                                              <span class="act-header"><strong>Activity</strong></span>
                                              <span class="cost-header"><strong>Cost (Kshs)</strong></span>
                                            </div>

                                          <ol>
                                  ';

                                    while($repair_row = mysqli_fetch_array($received)){ 
                                      // echo 'working';
                                      $activity = $repair_row['activity'];
                                      $cost = $repair_row['cost'];
                                      $date = $repair_row['date'];
                                      $TotalCost = $TotalCost + $cost;
                                      echo '
                                          <div class="data-row">
                                          <li> <div class="row-activity">'.$activity.'</div></li>
                                            <div class="row-cost">'.$cost.'</div>
                                          </div>
                                      ';

                                      // echo '<br>'.$repair_row['activity'];
                                      
                                      
                                    }
                                    $username = $_SESSION['name'];
                                    echo '
                                    <div class="header-row flex-wrap">
                                        <span class="total-header"><strong>Total</strong></span>
                                        <span class="total-val"> '.$TotalCost.' </span>
                                      </div>

                                      <div class="row1 flex-wrap">
                                      <div class="mech-name">Uploaded by: '.$username.'</div>

                                          <div class="date">'.$date.'</div>
                                        </div>

                                    </div>
                                </article>
                                
                                    ';
                                    $TotalCost = 0;
                                  }
                                }
                          }
                          else{
                            // echo '       <h3><span class="num-plate">KAA 123A</span> Repair History</h3>        ';
                  
                          }
                        }        
 ?>


                    


        <article class="repair-card">
          <div class="row1 flex-wrap">
            <div class="date">15-09-2021</div>
            <div class="mech-name">John Mechanic</div>
          </div>
        
          <div class="holder-tbl">
            <div class="header-row flex-wrap">
              <span class="act-header"><strong>Activity</strong></span>
              <span class="cost-header"><strong>Cost (Kshs)</strong></span>
            </div>

          <ol>
            
          <div class="data-row">
          <li> <div class="row-activity">Wheel balancing</div></li>
            <div class="row-cost">2000</div>
          </div>

          <div class="data-row ">
            <li> <div class="row-activity">Brake pads replacement</div></li>
            <div class="row-cost">2000</div>
          </div>

          
        </ol>

        <div class="header-row flex-wrap">
          <span class="total-header"><strong>Total</strong></span>
          <span class="total-val"> 4000 </span>
        </div>

      </div>

</article>
      </section>


    </main>
  </body>
  <script src="js/nav.js" charset="utf-8"></script>

</html>
