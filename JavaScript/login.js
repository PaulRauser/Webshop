const usernameInput = document.querySelectorAll('.custom-login-input')[0];
const passwordInput = document.querySelectorAll('.custom-login-input')[1];

const loginSubmit = document.querySelector('.custom-login-button');
const legend = document.querySelector('.login-legend');

loginSubmit.addEventListener('click', (event) => {
    if(usernameInput.value.length < 3 || !usernameInput.value.includes("@")) {
        legend.innerHTML = "At least 3 letters and an @ for username.";
        event.preventDefault();
    }    
    else if(passwordInput.value.length == 0) {
        legend.innerHTML = "At least 1 character for password.";
        event.preventDefault();
      }
    else {
        legend.innerHTML = "Login";
    }
});

  document.getElementById("login-button").addEventListener('click', () => {
    document.getElementById("os-input").setAttribute("value", getOS());
    
    document.getElementById("resolution-input").setAttribute("value", `${ screen.width } × ${ screen.height }`);

    document.getElementById("datetime-input").setAttribute("value", today);

    var sd = sha512($("#password-input").val());

    $('#hash-input').val(sha512($("#password-input").val())); // In Ehren von Michael Zink
    
  });

  var today = new Date();  

  function getOS() {
    var userAgent = window.navigator.userAgent,
        platform = window.navigator.platform,
        macosPlatforms = ['Macintosh', 'MacIntel', 'MacPPC', 'Mac68K'],
        windowsPlatforms = ['Win32', 'Win64', 'Windows', 'WinCE'],
        iosPlatforms = ['iPhone', 'iPad', 'iPod'],
        os = null;

    if (macosPlatforms.indexOf(platform) !== -1) {
      os = 'Mac OS';
    } else if (iosPlatforms.indexOf(platform) !== -1) {
      os = 'iOS';
    } else if (windowsPlatforms.indexOf(platform) !== -1) {
      os = 'Windows';
    } else if (/Android/.test(userAgent)) {
      os = 'Android';
    } else if (!os && /Linux/.test(platform)) {
      os = 'Linux';
    }

    return os;
  }