<?php include 'php/header.php';
function getAvgRating($mechId){
  $select = "SELECT AVG(rating) AS avg FROM ratings WHERE user_id = '$mechId'";
  $avgRating = mysqli_query($GLOBALS['connection'],$select);
  if($avgRating){
    while($row = mysqli_fetch_assoc($avgRating)){
    
    return round($row['avg']);

    }
    
  }
  else{
    echo "No rating".mysqli_error($GLOBALS['connection']);
  }
}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
   <meta name="keywords" content="">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="description" content="">
   <!-- <meta name="theme-color" content="#ffffff"> -->
   <meta name="author" content="">
    <title> Mechanics near you</title>
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/allMech.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/map.css">

    <!-- <script src="js/near.js"></script> -->

    <script>
    getCurrentLocation();
var map;
    let longi, lati,selfCoords;
      function getCurrentLocation() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(showPosition);
          // console.log("Get ftn")
        } else {
          // x.innerHTML = "Geolocation is not supported by this browser.";
          alert("Please allow mechLocator to access your location. We need it to find mechanics near you.");

          showError(error);
          return false;

        }
      }
     
      function showPosition(position) {
          longi = position.coords.longitude
          lati = position.coords.latitude
          var accuracy = position.coords.accuracy;
          selfCoords = {lat: lati, lng: longi }
          longi = Math.round(longi * 100) / 100
          lati = Math.round(lati * 100) / 100                         
     }

      function showError(error) {
        let x = document.getElementById('map')
          switch(error.code) {
            case error.PERMISSION_DENIED:
              x.innerHTML = "User denied the request for Geolocation."
              break;
            case error.POSITION_UNAVAILABLE:
              x.innerHTML = "Location information is unavailable."
              break;
            case error.TIMEOUT:
              x.innerHTML = "The request to get user location timed out."
              break;
            case error.UNKNOWN_ERROR:
              x.innerHTML = "An unknown error occurred."
              break;
          }
        }


      var map;
      let markerIcon = "icons/mech-marker.svg";

      let name = 'John';

      

          function setMarkers(map) {              
                const shape = {
                  coords: [1, 1, 1, 20, 18, 20, 18, 1],
                  type: "poly",
                };
                
                let contentEle = document.querySelector("#content");
               
                  // Create an info window to share between markers.
                for (let i = 0; i < mechs.length; i++) {
                  let mech = mechs[i];
                  // console.log(mech);
                  lati = mechs[i][0]
                  longi = mechs[i][1]
                  name = mechs[i][2]
                  email = mechs[i][3]
                  phone = mechs[i][4]
                  ratValue = mechs[i][5]

                  let marker = new google.maps.Marker({
                    
                    position: { lat: lati, lng: longi },
                    map,
                    icon: markerIcon,
                    shape: shape,
                    title: mechs[i][2],
                    zIndex: 5,
                    optimized: false,
                  });


                  let contentString;
                  let ratingText;
                  if(ratValue == 0) {
                    ratingText = "Not rated"
                  }
                  else{ ratingText = ratValue + " / 5"}

                  contentString =    `<div class="detail-card" id="content">
                        <div class="flex-wrap">
                            <img src="icons/mech-white.svg" alt="user" class="user-icon">
  
                        <article class="contact-dets">
                            <div class="username"> <strong> ${name}</strong></div>
                            
                            <p class="rates"> 
                            Rating: <strong> ${ratingText} </strong>
                            </p>

                            <span class="">
                                <div class="mech-contact flex-wrap">
                                <a href="mailto:${email}">
                                  <img src="icons/email-svgrepo-com.svg" alt="email" class="icon">
                                </a>
                                <a href="https://wa.me/${phone}">
                                  <img src="icons/whatsapp.svg" alt="whatsapp" class="icon">
                                </a>
                                <a href="tel:${phone}">
                                  <img src="icons/call.svg" alt="call" class="icon">
                                </a>
                              </div>
                             </span>

                        </article>
  
                        </div>
                  </div>`;

                  

                  let infoWindow = new google.maps.InfoWindow({
                    content: contentString,
                    
                  })
                  
                  

                  // Add a click listener for each marker, and set up the info window.
                  marker.addListener("click", () => {
                    infoWindow.close();

                    infoWindow.open({
                      anchor: marker,
                      map,
                      shouldFocus: true,
                    });


                   
                    // const para = document.querySelector(".rates"+i);
                    //   // console.log(para.children)
                    //       let stars = para.childNodes;
                    //       let arr = Object.entries(stars);
                    //       for(let p = 0;p < ratValue;p++){
                    //         let itemArray = Object.entries(arr[p]) 
                    //         itemArray[1][1].style.filter = 'invert(28%) sepia(97%) saturate(2124%) hue-rotate(357deg) brightness(100%) contrast(96%)';
                    //       }
                  
                  });
                  

                }

}
    </script>
  </head>
  <body>

    <main>

    <section class="holder-sect">
      <h3>Mechanics near your location</h3>

      <div class="map" id="map">
     <img src="images/seo-edited.svg" alt="searching for mech" class="search-img">
     <h4 class="flex-wrap search-title">Searching for mechanics <span><img src="icons/dots-loading.svg" alt="loading" class="icon rotate-icon"></span> </h4>
            <article>
              Please allow mechLocator to access your location. 
              We need it to find mechanics near you.
            </article>

      </div>

      <div id="request"></div>
      <div id="response"></div>

      <section class="flex-wrap">
           
        
      </section>
      <script>
        let mechs = [];
        let mechDetails = {};
      </script>

      <?php
      $getLocs = "SELECT * FROM map_details INNER JOIN users ON map_details.user_id = users.user_id";
      $results = mysqli_query($connection,$getLocs);
      if(!$results){
        echo "msqli error" .mysqli_error($connection);
     }
       else{
         $row = mysqli_num_rows($results);

         if($row<1){
           echo "No cordinates in database";
         }
         else{
        echo '
        <script>
          i = 0;
        </script>
        ';
        $count = 0;
        $k = 0;
         while($row = mysqli_fetch_assoc($results)){
          
        $ratValue = getAvgRating($row['user_id']);
          
          echo '
           <script> 
           
            mechDetails[0] = '.$row['long_cor'].'
            mechDetails[1] = '.$row['lat_cor'].'
            mechDetails[2] = "'.$row['name'].'"

            mechDetails[3] = "'.$row['email'].'"
            mechDetails[4] = "'.$row['phone'].'"
            mechDetails[5] = '.$ratValue.'

            newArr = [mechDetails[0],mechDetails[1],mechDetails[2],mechDetails[3],mechDetails[4],mechDetails[5]]
            mechs.push(newArr)
           </script>
           ';
         }
      }
    }
      ?>

    </main>
  


  </body>
  <script src="js/nav.js" charset="utf-8"></script>
  <!-- <script src="js/map.js"></script> -->

    <script defer>
       function initMap() {
        const bounds = new google.maps.LatLngBounds();
        const markersArray = [];

     // initialize services
      // const geocoder = new google.maps.Geocoder();
      const service = new google.maps.DistanceMatrixService();
      
      // build request
  // const origin1 = { lat: 55.93, lng: -3.118 };
  const destNew = "Nairobi, Kenya";
  // const destinationA = "Stockholm, Sweden";
  // const destinationB = { lat: 50.087, lng: 14.421 };

  selfCoordsObj = {lat: -1.2841, lng: 36.8155}
  mmu = {lat:-1.381831 , lng: 36.76847}
  let dest = [{}];
  p = 0
  for(p = 0; p<mechs.length;p++){
 
    dest[p] = {
      lat: mechs[p][0],
      lng: mechs[p][1]
    }

  }
  // console.log(dest);
  const request = {
    origins: [selfCoordsObj],
    destinations: dest,
    travelMode: google.maps.TravelMode.DRIVING,
    unitSystem: google.maps.UnitSystem.METRIC,
    avoidHighways: false,
    avoidTolls: false,
  };

  // put request on page
  // document.getElementById("request").innerText = JSON.stringify(
  //   request,
  //   null,
  //   2
  // );
  // get distance matrix response
  service.getDistanceMatrix(request,callback);
  shortestDistArray = [];
  function callback(response, status) {
  if (status == 'OK') {
    var origins = response.originAddresses;
    var destinations = response.destinationAddresses;

    // console.log(destinations)
    for (var i = 0; i < origins.length; i++) {
      var results = response.rows[i].elements;
      for (var j = 0; j < results.length; j++) {
        var element = results[j];
        var distance = element.distance.text;
        var disVal = element.distance.value;
        var duration = element.duration.text;
        var from = origins[i];
        var to = destinations[j];
        shortestDistArray.push(disVal)
        // console.log(distance, duration, from, to);
        if(disVal < 400 ){
          console.log("Shorter than 4km by " + disVal)
        }
      }
    }

    shortestDist = Math.min(...shortestDistArray)
    console.log(shortestDist + " km")
  }
}
            // show on map
           

            // let coords = {lat: lati, lng: longi}
            map = new google.maps.Map(document.getElementById('map'), {
              center: selfCoords,
              zoom: 10
            });

            setMarkers(map);

           myLoc = new google.maps.Marker({
              // animation: google.maps.Animation.DROP,
              position: selfCoords, 
              map,
              animation: google.maps.Animation.DROP,
              title: "My location", 
              zIndex:1,
              // shadow: shadow,
            })
          
            // myLoc.setAnimation(google.maps.Animation.BOUNCE);

            const cityCircle = new google.maps.Circle({
              strokeColor: "#005e91",
              strokeOpacity: 0.8,
              strokeWeight: 3,
              fillColor: "#036399c4",
              fillOpacity: 0.35,
              map,
              center: selfCoords,
              radius: 5000,
            });
          }

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDFnF2qmmYTCzGn72vSGQVJB1uCR2SHpKU&callback=initMap"  async   defer> 
  </script>
    <!-- <script src="js/rate.js"></script> -->
 
</html>
