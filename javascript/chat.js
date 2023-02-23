//Getting information fields from chat.php
const form = document.querySelector(".typing-area"),
    inputField = form.querySelector(".input-field"),
    sendBtn = form.querySelector("button"),
    chatBox = document.querySelector(".chat-box");

form.onsubmit = (e) => {
    e.preventDefault();
}

//Sendign information message to php/insert-chat.php
sendBtn.onclick = () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/insert-chat.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                inputField.value = "";
                scrollToBottom();
            }
        }

    }
    let formData = new FormData(form);
    xhr.send(formData);
}


chatBox.onmouseenter = () => {
    chatBox.classList.add("active")
}

chatBox.onmouseleave = () => {
    chatBox.classList.remove("active")
}


//Getting innformation and scrolling to php/get-chat.php
setInterval(() => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/get-chat.php");
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                chatBox.innerHTML = data;
                if (!chatBox.classList.contains("active")) { // is active class not contains chatboc the scroll to bottom. 

                    scrollToBottom();
                }


            }
        }

    }
    let formData = new FormData(form);
    xhr.send(formData);
}, 500); //this function will run frequently  after after 500ms

//This function is scroll to bottom
function scrollToBottom() {
    chatBox.scrollTop = chatBox.scrollHeight;
}