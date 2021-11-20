<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
   <meta name="keywords" content="">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="description" content="">
   <meta name="author" content="">
    <meta charset="utf-8">
    <title>MechLocator</title>
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/nav.css">
    <!-- <script src="https://kit.fontawesome.com/e5226850c4.js" crossorigin="anonymous"></script> -->

  </head>
  <body>
    
<?php include 'php/header.php';?>


    <main>

      <!-- button for locating a mech  -->
      <button type="button" name="button" class="loc-btn flex-wrap">
        <img src="icons/location.svg" alt="locate" class="icon"> Mechanic near me
      </button>
       <section class="landing">
           <article class="mid-landing">
              <article class="search-holder">
                  <input type="text" name="search" id="" placeholder="Search mechanic by location.." class="searchType">
                  <img src="icons/search-icon.svg" alt="search" class="icon search-icon">
               </article>
          </article>

          <div class="swiper-container">

             <section class="swiper-wrapper swiper-wrapper-new houses-sect">


               <div class="swiper-slide" >
                 <img src="Images/broken-car.jpg" alt="broken" class="slide-img">
               </div>

               <div class="swiper-slide" >
                 <img src="Images/broken-car.jpg" alt="broken" class="slide-img">
               </div>
               <div class="swiper-slide" >
                 <img src="Images/broken-car.jpg" alt="broken" class="slide-img">
               </div>

             </section>

       <div class="swiper-button-next swiper-button-next-img"></div>
       <div class="swiper-button-prev swiper-button-prev-img"></div>
       <div class="swiper-pagination swiper-pagination-new"></div>

     </div>

        </section>

        <section class="flex-wrap card-sect">
          <article class="card">
            <img src="icons/repair.svg" alt="repair history" class="card-icon">
            <p>Repair History</p>
          </article>

          <article class="card">
            <img src="icons/tools.svg" alt="repair history" class="card-icon">
            <p>Mechanics</p>
          </article>
        </section>
  </body>
  <script src="js/nav.js" charset="utf-8"></script>
  <script src="js/swiperJs/swiper.min.js" charset="utf-8"></script>
  <link rel="stylesheet" href="js/swiperJs/swiper.min.css">

  <script type="text/javascript">
  let swiperNew = new Swiper('.swiper-container', {
 slidesPerView: 'auto',
 spaceBetween: 15,
 // centeredSlides: true,
 watchSlidesVisibility: true,
 watchSlidesProgress: true,
 freeMode: false,
 pagination: {
  el: '.swiper-pagination-new',
  clickable: true,
 },
 loop:false,
 navigation: {
  nextEl: '.swiper-button-next-img',
  prevEl: '.swiper-button-prev-img',
 },
});
  </script>
</html>
