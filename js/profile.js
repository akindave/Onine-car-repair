function openPop(targetClass){
let target = document.querySelector(`.${targetClass}`);
target.classList.add("show-flex");
let overlay = document.querySelector(".dark-overlay");
overlay.classList.add("show-flex");
}

function closePop(targetClass){
    let target = document.querySelector(`.${targetClass}`);
    target.classList.remove("show-flex");
    let overlay = document.querySelector(".dark-overlay");
    overlay.classList.remove("show-flex");
}

function allowWrite(targetId){
    let target = document.querySelector(`#${targetId}`);
    target.removeAttribute("readonly");
}
// removeAttribute('readonly');