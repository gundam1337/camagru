const indicator = document.querySelector(".indicator");
const weak = document.querySelector(".weak");
const medium = document.querySelector(".medium");
const strong = document.querySelector(".strong");
const input = document.getElementById("password");
const text = document.querySelector(".text");
const myForm = document.getElementById("forum");
const passwordInput = document.getElementById("password");

/* regex match */
let regExpWeak = /[a-z]/;
let regExpMedium = /\d+/;
let regExpStrong = /.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/;

function password_validation() {
  let no = 1;
  if (input.value != "") {
    indicator.style.display = "block";
    indicator.style.display = "flex";
    if (
      input.value.length <= 3 &&
      (input.value.match(regExpWeak) ||
        input.value.match(regExpMedium) ||
        input.value.match(regExpStrong))
    )
      no = 1;
    if (
      input.value.length >= 6 &&
      ((input.value.match(regExpWeak) && input.value.match(regExpMedium)) ||
        (input.value.match(regExpMedium) && input.value.match(regExpStrong)) ||
        (input.value.match(regExpWeak) && input.value.match(regExpStrong)))
    )
      no = 2;
    if (
      input.value.length >= 6 &&
      input.value.match(regExpWeak) &&
      input.value.match(regExpMedium) &&
      input.value.match(regExpStrong)
    )
      no = 3;
    if (no == 1) {
      weak.classList.add("active");
      text.style.display = "block";
      text.textContent = "Your password is too week";
      text.classList.add("weak");
    }
    if (no == 2) {
      medium.classList.add("active");
      text.textContent = "Your password is medium";
      text.classList.add("medium");
    } else {
      medium.classList.remove("active");
      text.classList.remove("medium");
    }
    if (no == 3) {
      weak.classList.add("active");
      medium.classList.add("active");
      strong.classList.add("active");
      text.textContent = "Your password is strong";
      text.classList.add("strong");
    } else {
      strong.classList.remove("active");
      text.classList.remove("strong");
    }
  } else {
    indicator.style.display = "none";
    text.style.display = "none";
  }
  return no;
}

// function cheakInputMatch(){
//     const password1 = passwordInput.value;
//     const password2 = document.getElementById("confirm_password").value;
//     const message = document.getElementById("email-error-message");
//     console.log("first password ",password1,"second password", password2);
//     message.style.color = "red";
//     if(password1 == password2){
//         message.textContent = "Passwords do not match";
//         // return true;
//         console.log(true);
//     }
//     else{
//         console.log(false);
//     }
// }

passwordInput.addEventListener("input", function () {
  let satus = password_validation();
  if (satus == 1) {
    myForm.addEventListener("submit", function (ev) {
      ev.preventDefault();
    });
  } else {
    myForm.removeEventListener("submit", function () {});
  }
});

const password1 = document.getElementById("password");
const password2 = document.getElementById("confirm_password");
const message = document.getElementById("email-error-message");
message.style.color = "red";

form.addEventListener("submit", function (event) {
  event.preventDefault(); // prevent the form from submitting

  if (password1.value !== password2.value) {
    message.textContent = "Passwords do not match";
  } else {
    myForm.submit(); // submit the form if the passwords match
  }
});
