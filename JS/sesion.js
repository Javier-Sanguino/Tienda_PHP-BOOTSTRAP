const newUser = document.getElementById("newUser");
const signIn = document.getElementById("signIn");
const signBox = document.getElementById("sign_contenedor");
const backBtn = document.getElementById("btn_back");

function makeUser() {
    newUser.classList.add("active");
    signBox.classList.add("inactive");
    backBtn.classList.add("active");
}

function doSignIn() {
    signIn.classList.add("active");
    signBox.classList.add("inactive"); 
    backBtn.classList.add("active");
}

function back() {
    newUser.classList.remove("active");
    signIn.classList.remove("active");
    signBox.classList.remove("inactive");
    backBtn.classList.remove("active");
    
}