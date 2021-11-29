<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
   <meta name="keywords" content="">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="description" content="">
   <meta name="author" content="">
    <title>mechLocator | sign up</title>
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/registration.css">
  </head>
  <body>
  <?php include 'php/header.php';?>

    <main>

    <section class="form-sect wrap">
      <img src="icons/Welcome.svg" alt="welcome" class="welcome-svg">

      <form class="register-form" action="php/signup.php" method="post">
        <h3>Apply as a mechanic</h3>
        <p>Please enter the details below.</p>
       
        <div class="input-grp">
          <label for="location" class="loc" data-tooltip="(We need your location to find customers near you.)">Location<img src="icons/question-dark.svg" alt="ask" class="icon"></label>
          <!-- <input type="text" name="location" required placeholder="e.g Rongai" class="input-elmt"> -->
          <button class="add-btn current-loc-btn" type="submit">
            <img src="icons/location.svg" alt="location" class="icon">
            Use current location
          </button>

          <p>or</p>

          <button class="add-btn current-loc-btn loc-map" type="submit">
            <img src="icons/map-loc.svg" alt="location" class="icon">
            Choose location on map
          </button>

        </div>

        <div class="input-grp">
          <button type="submit" name="register" class="reg-btn shadow-drop-2-tb">Apply now</button>
        </div>

      </form>


    </section>

    </main>
  </body>
  <script src="js/nav.js" charset="utf-8"></script>

</html>
