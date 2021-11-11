let navText = document.querySelectorAll(".nav-text")
let navMenu = document.querySelector(".menu-dark")
let navHolder = document.querySelector(".menu-links")
let overviewBtn = document.querySelector(".overview-btn")
let landlordBtn = document.querySelector(".landlord-btn")
let userBtn = document.querySelector(".user-btn")

// getting sections
let overSect = document.querySelector(".overview-details")
let landSect = document.querySelector(".landlord-details")
let userSect = document.querySelector(".user-details")

overviewBtn.addEventListener("click",function(){
  overviewBtn.classList.add("activeBtn")
  landlordBtn.classList.remove("activeBtn")
  userBtn.classList.remove("activeBtn")

  overSect.style.display = "block"
  landSect.style.display = "none"
  userSect.style.display = "none"
})

landlordBtn.addEventListener("click",function(){
  overviewBtn.classList.remove("activeBtn")
  landlordBtn.classList.add("activeBtn")
  userBtn.classList.remove("activeBtn")

  overSect.style.display = "none"
  landSect.style.display = "block"
  userSect.style.display = "none"
})

userBtn.addEventListener("click",function(){
  overviewBtn.classList.remove("activeBtn")
  landlordBtn.classList.remove("activeBtn")
  userBtn.classList.add("activeBtn")

  overSect.style.display = "none"
  landSect.style.display = "none"
  userSect.style.display = "block"
})

// hiding text in menu
function alterText(){
  navText.forEach((item) => {
    item.classList.toggle("showBlock")
  });

  // changing width
  navHolder.classList.toggle("bigWidth")
}

navMenu.addEventListener("click",alterText);
