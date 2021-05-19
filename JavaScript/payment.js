(function () {
    'use strict'
  
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')
  
    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
      .forEach(function (form) {
        form.addEventListener('submit', function (event) {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }
  
          form.classList.add('was-validated')
        }, false)
      })
  })()

// Payment method collapse
var creditRadio = document.querySelector(".creditRadio");
var paypalRadio = document.querySelector(".paypalRadio");

var creditCollapse = document.querySelector(".creditCollapse");
var paypalCollapse = document.querySelector(".paypalCollapse");

// Damit nur das required ist was auch ausgefüllt wird
var creditInputs = document.querySelectorAll(".creditInputs");
var paypalInputs = document.querySelectorAll(".paypalInputs");


creditRadio.addEventListener("click", ()=> {
  creditCollapse.classList.add("show");
  paypalCollapse.classList.remove("show");

  // Damit nur das required ist was auch ausgefüllt wird
  console.log(creditInputs[1]);
  creditInputs[0].setAttribute("required", ""); 
  creditInputs[1].setAttribute("required", ""); 
  creditInputs[2].setAttribute("required", ""); 
  creditInputs[3].setAttribute("required", ""); 

  paypalInputs[0].removeAttribute("required"); 
  paypalInputs[1].removeAttribute("required"); 
});

paypalRadio.addEventListener("click", ()=> {
  creditCollapse.classList.remove("show");
  paypalCollapse.classList.add("show");

  // Damit nur das required ist was auch ausgefüllt wird
  creditInputs[0].removeAttribute("required"); 
  creditInputs[1].removeAttribute("required"); 
  creditInputs[2].removeAttribute("required"); 
  creditInputs[3].removeAttribute("required"); 

  paypalInputs[0].setAttribute("required", ""); 
  paypalInputs[1].setAttribute("required", ""); 
});


// JVersuche
//document.getElementById("cc-number").setAttribute("required", ""); 



