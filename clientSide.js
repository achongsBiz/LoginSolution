/*******************************************
Module: clientSide.js
Project: Login Solution
Log:
20180515 - Initial revision.
********************************************/

/**********
Function validates registration user input.
**********/
function validateRegInput() {

   var validationPass = true;
   var errorMessages = ["",""];
   var errorMessagetxt = "";
   var statusBox = document.getElementById("validationResults");

   var userNameInput = document.getElementById("userName");
   var firstNameInput = document.getElementById("firstName");
   var lastNameInput = document.getElementById("lastName");
   var credentialInput = document.getElementById("credential");
   var streetLine1Input = document.getElementById("streetLine1");
   var streetLine2Input = document.getElementById("streetLine2");
   var cityInput = document.getElementById("city");
   var regionInput = document.getElementById("region");
   var postalCodeInput = document.getElementById("postalCode");
   var countryInput = document.getElementById("country");
   var emailInput = document.getElementById("email");

   var pageElements = [userNameInput, credentialInput, firstNameInput, lastNameInput, streetLine1Input, streetLine2Input, cityInput, regionInput, postalCodeInput, countryInput, emailInput];

   // Reset all formatting.
   for (var i=0; i <pageElements.length; i++) {

     pageElements[i].style.backgroundColor = "white";
   }

   // Password must be at least 6 characters long.
   if (credentialInput.value.length < 7) {

      errorMessages[0] = "Password must be at least 6 characters long.<br>";
      credentialInput.style.backgroundColor = "orange";
      validationPass = false;
   }

   // Checks for 0 length fields.
   for (var j=0; j < pageElements.length; j++) {

      errorMessages[1] = "There are empty fields.<br>";
      if (pageElements[j].value.length == 0) {
         pageElements[j].style.backgroundColor = "orange";
         validationPass = false;
      }
   }

   // Build error list, feedback to user.
   if (validationPass == false) {
      errorMessagetxt += "<ul>";
      for (var i=0; i < 2; i++) {
         if (errorMessages[i].length > 0) {
            errorMessagetxt = errorMessagetxt + "<li>" + errorMessages[i] + "</li>";
         }
      }
      errorMessagetxt += "</ul>"
   }
   statusBox.innerHTML = errorMessagetxt;

   return validationPass;
}

/**********
Function validates update user input.
**********/
function validateUpdInput() {

   var validationPass = true;
   var errorMessages = [""];
   var errorMessagetxt = "";
   var statusBox = document.getElementById("validationResults");

   var firstNameInput = document.getElementById("firstName");
   var lastNameInput = document.getElementById("lastName");
   var streetLine1Input = document.getElementById("streetLine1");
   var streetLine2Input = document.getElementById("streetLine2");
   var cityInput = document.getElementById("city");
   var regionInput = document.getElementById("region");
   var postalCodeInput = document.getElementById("postalCode");
   var emailInput = document.getElementById("email");

   var pageElements = [firstNameInput,lastNameInput,streetLine1Input,streetLine2Input,cityInput,regionInput,postalCodeInput,emailInput];

   // Reset all formatting.
   for (var i=0; i< pageElements.length; i++) {
       pageElements[i].style.backgroundColor = "white";
   }

   // Checks for 0 length fields.
   for (var j=0; j < pageElements.length; j++) {

     errorMessages[0] = "There are empty fields.<br>";
     if (pageElements[j].value.length == 0) {
         pageElements[j].style.backgroundColor = "orange";
         validationPass = false;
      }
   }

   // Build error list, feedback to user.
   if (validationPass == false) {
      errorMessagetxt += "<ul>";
      for (var i=0; i < 1; i++) {
         if (errorMessages.length > 0) {
            errorMessagetxt = errorMessagetxt + "<li>" + errorMessages[i] + "</li>";
         }
      }
      errorMessagetxt += "</ul>";
   }
   statusBox.innerHTML = errorMessagetxt;

   return validationPass;
}
