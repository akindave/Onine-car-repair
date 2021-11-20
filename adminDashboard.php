<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
   <meta name="keywords" content="">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="description" content="">
   <meta name="author" content="">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/adminPanel.css">
  </head>
  <body>
  <?php include 'php/header.php';?>


<main>
    <section class="menu-sect">
      <button class="menu-btn menu-dark">
          <img src="icons/menu-dark.svg" alt="menu" class="nav-icon">
          <span class="nav-text">Menu</span>
          <!--    code for 3 lines in html -->
      </button>
      <div class="menu-links">

                <div class="overview-btn  menu-option-btn activeBtn">
                  <img src="icons/overview-dark.svg" alt="overview" class="icon">
                  <span class="nav-text">Overview</span>
                </div>

                <div class="owners-btn menu-option-btn ">
                  <img src="icons/user-dark.svg" alt="owners" class="icon">
                <span class="nav-text">Car owners</span>
              </div>

                <div class="mechanics-btn menu-option-btn ">
                  <img src="icons/mechanic.svg" alt="Mechanics" class="icon">
                  <span class="nav-text">Mechanics</span>
                </div>

                <div class="cars-btn menu-option-btn ">
                    <img src="icons/car.svg" alt="Mechanics" class="icon">
                    <span class="nav-text">Cars</span>
                  </div>

                <div class="applications-btn menu-option-btn ">
                    <img src="icons/application.svg" alt="Mechanics" class="icon">
                    <span class="nav-text">Applications</span>
                </div>
            
                <div class="questions-btn menu-option-btn ">
                    <img src="icons/question.svg" alt="Mechanics" class="icon">
                    <span class="nav-text">Mechanic Questions</span>
                </div>
      </div>
    </section>

    <!-- overview  -->
    <section class="view-details overview-details">
      <div class="detail-title">
        <img src="icons/overview-dark.svg" alt="overview" class="icon">
        Overview
      </div>

      <div class="detail-cards-holder flex-wrap">
        <!-- number of users  -->
        <div class="detail-card">
          <img src="icons/user-dark.svg" alt="users" class="icon detail-icon">
          <p class="num-value">
            437
          </p>

          <p class="detail-desc">
            Total no. of car owners
          </p>
        </div>

        <!-- number of mechs  -->
        <div class="detail-card">
          <img src="icons/mechanic.svg" alt="mechanic" class="icon detail-icon">
          <p class="num-value">
            237
          </p>

          <p class="detail-desc">
            Total no. of mechanics
          </p>
        </div>

        <!-- number of cars  -->
        <div class="detail-card">
          <img src="icons/car.svg" alt="cars" class="icon detail-icon">
          <p class="num-value">
            300
          </p>

          <p class="detail-desc">
            Total no. of cars
          </p>
        </div>

        <!-- received applications  -->
        <div class="detail-card">
          <img src="icons/application.svg" alt="applications" class="icon detail-icon">
          <p class="num-value">
            120
          </p>

          <p class="detail-desc">
            Received applications
          </p>
        </div>

      </div>
    </section>


    <!-- owners -->
    <section class="view-details owners-details">
      <div class="detail-title">
        <img src="icons/user-dark.svg" alt="owners" class="icon">
        Car owners
      </div>

      <div class="detail-cards-holder flex-wrap">

        <!-- one owner -->
        <div class="detail-card">
        <div class="flex-wrap">
            <img src="icons/user-holder.svg" alt="user" class="user-icon">

        <article class="contact-dets">
            <div class="username">
                <strong>George Doe</strong>
              </div>
              <div class="detail-option">
                <img src="icons/email-svgrepo-com.svg" alt="email" class="icon">
                john@gmail.com
              </div>
              <div class="detail-option">
                <img src="icons/call-grey.svg" alt="call" class="icon">
                0712345678
              </div>
              <div class="detail-option">
                <img src="icons/car.svg" alt="car" class="icon">
               KAA 123A
              </div>
        </article>

        </div>
          <div class="detail-option">
           <button class="del-btn">
            <img src="icons/delete-red.svg" alt="delete" class="icon">
            Delete user
            </button>
          </div>

        </div>


      </div>
    </section>

    <!-- mechs section -->
    <section class="view-details mech-details">
      <div class="detail-title">
        <img src="icons/mechanic.svg" alt="user" class="icon">
        Mechanics
      </div>

      <div class="detail-cards-holder flex-wrap">

         <!-- one mech -->
         <div class="detail-card">
            <div class="flex-wrap">
                <img src="icons/user-holder.svg" alt="user" class="user-icon">
    
            <article class="contact-dets">
                <div class="username">
                    <strong>George Doe</strong>
                  </div>
                  <div class="detail-option">
                    <img src="icons/email-svgrepo-com.svg" alt="email" class="icon">
                    john@gmail.com
                  </div>
                  <div class="detail-option">
                    <img src="icons/call-grey.svg" alt="call" class="icon">
                    0712345678
                  </div>
                  <div class="detail-option">
                    <button class="remove-btn">
                        <img src="icons/red-remove.svg" alt="remove" class="icon">
                    Remove mechanic status
                    </button>
                  </div>
            </article>
    
            </div>
              <div class="detail-option">
               <button class="del-btn">
                <img src="icons/delete-red.svg" alt="delete" class="icon">
                Delete user
                </button>
              </div>
    
            </div>
    
      </div>

    </section>

     <!-- cars section -->
     <section class="view-details cars-details">
        <div class="detail-title">
          <img src="icons/car.svg" alt="car" class="icon">
          Cars
        </div>
  
        <div class="detail-cards-holder flex-wrap">
  
          <!-- car -->
          <div class="detail-card">
            <div class="flex-wrap">
                <img src="icons/car.svg" alt="user" class="icon">
    
                <article class="contact-dets">
                    <div class="num-plate">
                        KAA 123A
                    </div>
                    
                    <div class="detail-option">
                       Owner: <strong class="own-name">John Doe</strong>
                    </div>
                </article>
    
            </div>    
        </div>
  
        </div>
  
      </section>

       <!-- applications section -->
    <section class="view-details applications-details">
        <div class="detail-title">
          <img src="icons/application.svg" alt="user" class="icon">
          Applications
        </div>
  
        <div class="detail-cards-holder flex-wrap">
  
                  <!-- one qualification -->
                  <div class="detail-card">
                    <div class="flex-wrap">
                        <img src="icons/user-holder.svg" alt="user" class="user-icon">
            
                    <article class="contact-dets">
                        <div class="username">
                            <strong>George Doe</strong>
                          </div>
                          <div class="detail-option">
                            <img src="icons/email-svgrepo-com.svg" alt="email" class="icon">
                            john@gmail.com
                          </div>
                          <div class="detail-option">
                            <img src="icons/call-grey.svg" alt="call" class="icon">
                            0712345678
                          </div>
                          <div class="detail-option">
                            <button class="edit-btn">
                                <img src="icons/qualification.svg" alt="remove" class="icon">
                            Open qualification
                            </button>
                          </div>
                    </article>
            
                    </div>
                      <div class="detail-option around">
                       <button class="accept-btn">
                           Accept
                       </button>
                       <button class="del-btn">
                           Decline
                       </button>
                      </div>
            
                    </div>
        </div>
  
      </section>

       <!-- questions section -->
    <section class="view-details ques-details">
        <div class="detail-title">
          <img src="icons/question.svg" alt="user" class="icon">
          Mechanic questions
        </div>
  
        <div class="detail-cards-holder flex-wrap">
  
        <!-- one quiz -->
        <div class="detail-card question-card">
            <h3 class="ques-title">
                1. What is a crankshaft?
            </h3>
                <div class="detail-option ques-choices">
                    <ul type="disc">
                        <li>Vulputate tincidunt auctor condimentum.</li>
                        <li>Vulputate tincidunt auctor condimentum.</li>
                        <li>Vulputate tincidunt auctor condimentum.</li>
                        <li>Vulputate tincidunt auctor condimentum.</li>

                    </ul>
                </div>
              <div class="detail-option around">
               <button class="edit-btn">
                   Edit Question
               </button>
               <button class="del-btn">
                   Delete Question
               </button>
              </div>
        </div>
  
         <!-- second quiz -->
         <div class="detail-card question-card">
            <h3 class="ques-title">
                2. What is a piston ring?
            </h3>
                <div class="detail-option ques-choices">
                    <ul type="disc">
                        <li>Vulputate tincidunt auctor condimentum.</li>
                        <li>Vulputate tincidunt auctor condimentum.</li>
                        <li>Vulputate tincidunt auctor condimentum.</li>
                        <li>Vulputate tincidunt auctor condimentum.</li>

                    </ul>
                </div>
              <div class="detail-option around">
               <button class="edit-btn">
                   Edit Question
               </button>
               <button class="del-btn">
                   Delete Question
               </button>
              </div>
        </div>

        </div>
  
        
      <button class="accept-btn addQues-btn">
        <img src="icons/plus.svg" alt="add" class="icon">
        Add Question
    </button>


    <form action="" class="register-form">
        <div class="close-icon close-btn">
            X
        </div>
        <div class="form-elements">
            <h3>Add a question</h3>
        <p>Please enter the details below.</p>
        <div class="input-grp grid">
          <label for="title" class="quesTitle">Question title*</label>
         <textarea name="title" id="" cols="24" rows="3" placeholder="Type title here.."></textarea>
        </div>
         <label for="" class="tick">
             ( Tick the correct answer )
         </label>

         <div class="input-grp">
            <div class="square"></div>
           <input type="text" name="name" required placeholder="Type first choice" class="input-elmt">
         </div>

         <div class="input-grp">
            <div class="square"></div>
           <input type="text" name="name" required placeholder="Type second choice" class="input-elmt">
         </div>

         <div class="input-grp">
            <div class="square"></div>
           <input type="text" name="name" required placeholder="Type third choice" class="input-elmt">
         </div>

         <div class="input-grp">
            <div class="square"></div>
           <input type="text" name="name" required placeholder="Type four choice" class="input-elmt">
         </div>

        </div>
         <div class="detail-option around">
            <button class="edit-btn">
                Save Question
            </button>
            <div class="cancel-btn">
                Cancel
            </div>
           </div>
    </form>

      </section>

<div class="dark-overlay"></div>
  </main>

  <script src="js/admin.js"></script>
</body>