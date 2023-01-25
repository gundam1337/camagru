function password_validation() {
    var form = document.getElementById("form");
    var password = document.getElementById("password").value;
    var msg = document.getElementById("psg");

    
    
     if (password.length < 9) {
        
        form.classList.remove("valid");
        form.classList.add("invalid");

         msg.innerHTML = "Password must be at least 8 characters";
    }
}


let state = false;

function toggle(){
    if(state){
        document.getElementById("password").setAttribute("type","password");
        state = false;
    }else{
        document.getElementById("password").setAttribute("type","text")
        state = true;
    }
}

function myFunction(show){
    show.classList.toggle("fa-eye-slash");
}
