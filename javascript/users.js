/*********Getting tags from users.php file***********/
const searchBar = document.querySelector(".users .search input"),
    searchBtn = document.querySelector(".users .search button"),
    usersList = document.querySelector(".users .users-list");

//Activing field to search
searchBtn.onclick = () => {
    searchBar.classList.toggle("active");
    searchBar.focus();
    searchBtn.classList.toggle("active");
    searchBar.value = "";
}

//Searching terms value and send information to php/search.php 
searchBar.onkeyup = () => {
    let searchTerm = searchBar.value;
    if (searchTerm != "") {
        searchBar.classList.add("active");

    } else {
        searchBar.classList.remove("active");
    }
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/search.php",);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                usersList.innerHTML = data;
            }
        }

    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("searchTerm=" + searchTerm);

}

//Uploading the users.php file to check if theere are users Active now
setInterval(() => {

    let xhr = new XMLHttpRequest();
    xhr.open("GET", "php/users.php");
    if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
            let data = xhr.response;
            if (!searchBar.classList.contains("active")) {

                usersList.innerHTML = data;
            }

        }
    }
    xhr.send();
},

    500);