const changePasswordSubmit = document.querySelector('.forgot-password-button');
const newPassword = document.querySelector('.new-password');
const repeatPassword = document.querySelector('.repeat-password');

const oldInfo = document.querySelector('.old-password-info');
const newInfo = document.querySelector('.new-password-info');
const repeatInfo = document.querySelector('.repeat-password-info');

changePasswordSubmit.addEventListener('click', (event) => {
    if(newPassword.value.length == 0) {
        event.preventDefault();
        newInfo.innerHTML = "Please enter a new password";
        return;
    }
    else {
        newInfo.innerHTML = "";
    }
    if(repeatPassword.value.length == 0) {
        event.preventDefault();
        repeatInfo.innerHTML = "Please repeat your new password";
        return;
    }
    else if(newPassword.value != repeatPassword.value) {
        event.preventDefault();
        repeatInfo.innerHTML = "The new Passwords do not match";
        return;
    }
    else {
        newInfo.innerHTML = "";
    }
});