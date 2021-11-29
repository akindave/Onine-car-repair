<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
   <meta name="keywords" content="">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="description" content="">
   <meta name="author" content="">
    <title>Notifications </title>
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/history.css">
    <link rel="stylesheet" href="css/noti.css">
    
  </head>
  <body>
<?php include 'php/header.php';?>
<div class="dark"></div>

    <main>

    <!-- notification pop up   -->
      <p class="noti-pop">
      <img src="icons/notification.svg" alt="notification" class="icon">  
      1 new notification(s)
      </p>

    <section class="holder-sect">
          <a href="addRepair.php" class="add-btn flex-wrap">
          <img src="icons/plus.svg" alt="add" class="icon">
            Add repair record
          </a>
            <?php
                if(isset($_SESSION['user_id'])){
                    $user_id = $_SESSION['user_id'];
                    $username = $_SESSION['name'];
                }
                else{ 
                    header('Location:login.php');
                }
            ?>
      <h4>
        (Records are sorted by car number plate and date)
      </h4>

      <section class="flex-wrap reverse">
                <div class="noti-holder-div">

                <div class="close-icon" onclick="closePop('noti-holder-div')">X</div>


      <section class="flex-wrap reverse maxH">

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
                                    $counter = 0;
                                    while($repair_row = mysqli_fetch_array($received)){ 
                                      // echo 'working';
                                      $activity = $repair_row['activity'];
                                      $cost = $repair_row['cost'];
                                      $date = $repair_row['date'];

                                      //create an array for storing the date 
                                      $dateArray[$counter] = $date;

                                      // separating by date 
                                      if($counter>0 && $dateArray[$counter-1] != $dateArray[$counter]){
                                        //card ends when dates are different
                                              
                                                  echo '
                                                  <div class="header-row flex-wrap">
                                                      <span class="total-header"><strong>Total</strong></span>
                                                      <span class="total-val"> '.$TotalCost.' </span>
                                                    </div>

                                                    <div class="row1 flex-wrap">
                                                    <div class="mech-name">Recorded by: '.$username.'</div>

                                                        <div class="date">'.$dateArray[$counter-1].'</div>
                                                      </div>

                                                  </div>
                                              </article>';
                                          $TotalCost = 0;


                                              //creating a new card
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
                                              echo '
                                                <div class="data-row">
                                                <li> <div class="row-activity">'.$activity.'</div></li>
                                                  <div class="row-cost">'.$cost.'</div>
                                                </div>
                                            ';

                                        // break;
                                      $TotalCost = $TotalCost + $cost;

                                      }

                                      //if the dates are the same
                                      else{
                                            echo '
                                              <div class="data-row">
                                              <li> <div class="row-activity">'.$activity.'</div></li>
                                                <div class="row-cost">'.$cost.'</div>
                                              </div>
                                          ';
                                      $TotalCost = $TotalCost + $cost;


                                      }
                                      $counter++;                                
                                    }
                                    echo '
                                    <div class="header-row flex-wrap">
                                        <span class="total-header"><strong>Total</strong></span>
                                        <span class="total-val"> '.$TotalCost.' </span>
                                      </div>

                                      <div class="row1 flex-wrap">
                                      <div class="mech-name">Recorded by: '.$username.'</div>

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
                            echo  '<h3><span class="num-plate">No repair history added</span></h3>        ';
                          }
                        }        
                 ?>
      </section>

        <div class="input-grp">
            <p class="wish">
                Do you wish to rate <span class="mech-name"> John Doe</span>'s service
            </p>
            <p>
               (Rate out of 5 stars)
            </p>
            <p class="rates">
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" class="svg-inline--fa fa-star fa-w-18 icon" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="#BDBDBD" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></xpath></svg>
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" class="svg-inline--fa fa-star fa-w-18 icon" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="#BDBDBD" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></xpath></svg>
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" class="svg-inline--fa fa-star fa-w-18 icon" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="#BDBDBD" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></xpath></svg>
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" class="svg-inline--fa fa-star fa-w-18 icon" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="#BDBDBD" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></xpath></svg>
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" class="svg-inline--fa fa-star fa-w-18 icon" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="#BDBDBD" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></xpath></svg>

            </p>
        </div>

        <div class="input-grp">
            <label for="review">Add review message (optional)</label>
            <textarea name="review" id="" cols="15" rows="3" placeholder="e.g Excellent service" required  class="input-elmt rev-text"></textarea>

        </div>

        <div class="input-grp">
        <button class="save-changes flex-wrap save-review">
            <img src="icons/white-clipboard.svg" alt="save" class="icon">
            Save review
        </button>
        </div>
        </div>

         
      </section>

    </section>
    </main>
  </body>
  <script src="js/nav.js" charset="utf-8"></script>
  <script>
    let stars = document.querySelectorAll('.fa-star');
    let rateVal;
    let actualValue;
    // stars = Object.keys(stars)

  for (let i = 0; i < stars.length; i++){
    stars[i].addEventListener('click',function() {
      clearAll();
      let child = stars[i].childNodes;
      child[0].style.fill = 'var(--deepOrange)';
      rateVal = i;
      actualValue = i+1;
      colorOthers();
  } );
  }

  function colorOthers() {
    for(let i = 0; i<rateVal;i++) {
    let child = stars[i].childNodes
    child[0].style.fill = 'var(--deepOrange)';
  }
  }

  function clearAll() {
  for (let i = 0; i < stars.length; i++){
    let child = stars[i].childNodes
    child[0].style.fill = '#BDBDBD';
  }
  }
  
  </script>

</html>
