const password = document.querySelectorAll('.first-password');
const submitButton = document.querySelector('.submit-button-first-login');
const info = document.querySelector('.info');

password[0].addEventListener('focus', () => {
    password[0].style.backgroundColor = "transparent";
    password[0].style.color = "white";
    password[0].classList.add('new-color');
});
password[0].addEventListener('blur', () => {
    password[0].style.backgroundColor = "white";
    password[0].style.color = "rgb(120,120,120)";
    password[0].classList.remove('new-color');
});
password[1].addEventListener('focus', () => {
    password[1].style.backgroundColor = "transparent";
    password[1].style.color = "white";
    password[1].classList.add('new-color');
});
password[1].addEventListener('blur', () => {
    password[1].style.backgroundColor = "white";
    password[1].style.color = "rgb(120,120,120)";
    password[1].classList.remove('new-color');
});


submitButton.addEventListener('click', () => {
    if(password[0].value != password[1].value) {
        info.innerHTML = "The Passwords don't match";
    }
    if(password[1].value.length == 0) {
        info.innerHTML = "Repeated Password can't be empty";
    }
    if(password[0].value.length == 0) {
        info.innerHTML = "New Password can't be empty";
    }
    else if(password[0].value == password[1].value & password[0].length != 0 & password[1].length != 0) {
        info.innerHTML = "";
    }
});

