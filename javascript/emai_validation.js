function email_validation() {
    var email = document.getElementById("emi");
    var user_email = document.getElementById("email").value;
    var pattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    if (user_email.match(pattern)) {
        email.classList.remove("erro");
        email.classList.add("valid");
        email.innerHTML = "this " + user_email + " is Okey.";
        return true;
       
    }else {
        email.classList.remove("valid");
        email.classList.add("erro");
        email.innerHTML = "this email " + user_email + " is not Okey.";
        return false;
    }
}