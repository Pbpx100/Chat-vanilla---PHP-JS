//This dopcument is helping to show the password and hide it
// Information comming from index.php
const pswrdField = document.querySelector(".form .field  input[type='password']");
toggleBtn = document.querySelector(".form .field i");
toggleBtn.onclick = () => {
    if (pswrdField.type == "password") {
        pswrdField.type = "text";
        toggleBtn.classList.add("active");
    } else {
        pswrdField.type = "password";
        toggleBtn.classList.remove("active");
    }
}