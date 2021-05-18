const usernameInput = document.querySelectorAll('.custom-login-input')[0];

const loginSubmit = document.querySelector('.custom-login-button');
const legend = document.querySelector('.login-legend');

loginSubmit.addEventListener('click', () => {
    if(usernameInput.value.length < 3 || !usernameInput.value.includes("@")) {
        legend.innerHTML = "Fick dich: Mindestens 3 Buchstaben und ein @, du Hurensohn.";
    }    
    else {
        legend.innerHTML = "Login";
    }
});