//Getting information from login.php
const form = document.querySelector(".login form");
constinueBtn = form.querySelector(".button input");
errorText = form.querySelector(".error-txt");

form.onsubmit = (e) => {
    e.preventDefault();
}

//Sendinginformation to verify and send information to php/login.php
constinueBtn.onclick = () => {
    //no olvides esto es ajax
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/login.php");
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;

                // console.log(data); Aquí se reciben los datos de php 
                if (data == "success") {
                    location.href = "users.php";

                } else {
                    errorText.textContent = data;
                    errorText.style.display = "block";
                }
            }
        }

    }
    //sendgin data to php
    let formData = new FormData(form); //create form data object
    xhr.send(formData); //sending data to php
}