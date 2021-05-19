const changePasswordSubmit = document.querySelector('.forgot-password-button');
const oldPassword = document.querySelector('.old-password');
const newPassword = document.querySelector('.new-password');
const repeatPassword = document.querySelector('.repeat-password');

const oldInfo = document.querySelector('.old-password-info');
const newInfo = document.querySelector('.new-password-info');
const repeatInfo = document.querySelector('.repeat-password-info');

changePasswordSubmit.addEventListener('click', () => {
    if(oldPassword.value.length == 0) {
        oldInfo.innerHTML = "Please enter your old password";
    }
    else {
        oldInfo.innerHTML = "";
    }
    if(newPassword.value.length == 0) {
        newInfo.innerHTML = "Please enter a new password";
    }
    else {
        newInfo.innerHTML = "";
    }
    if(repeatPassword.value.length == 0) {
        repeatInfo.innerHTML = "Please repeat your new password";
    }
    else if(newPassword.value != repeatPassword.value) {
        repeatInfo.innerHTML = "The new Passwords do not match";
    }
    else {
        newInfo.innerHTML = "";
    }
});