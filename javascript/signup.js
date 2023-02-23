//Getting information from index.php
const form = document.querySelector(".signup form");
constinueBtn = form.querySelector(".button input");
//Pussing error in div(.error-txt)
errorText = form.querySelector(".error-txt");

form.onsubmit = (e) => {
    e.preventDefault();
}
constinueBtn.onclick = () => {
    let xhr = new XMLHttpRequest();
    //sending data to php/signup.php - to verify and save 
    xhr.open("POST", "php/signup.php");
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                //Getting echo "success" from php/signup.php
                if (data == "success") {
                    //redirecting new user to users.php
                    location.href = "users.php";
                } else {
                    //Displaying error in index.php
                    errorText.textContent = data;
                    errorText.style.display = "block";
                }
            }
        }

    }
    let formData = new FormData(form);
    xhr.send(formData);
}
