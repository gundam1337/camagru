function username_validation()
{
    var form = document.getElementById("form");
    var username = document.getElementById("username").value;
    var msg = document.getElementById("msg");

    var pattern = /^[a-z\d](?:[a-z\d]|-(?=[a-z\d])){0,38}$/i;

  if(username.match(pattern)) {
    form.classList.remove("invalid");
    form.classList.add("valid");

    msg.innerHTML = username + " is available.";
  }
  else if (username.length >= 21 ) {
    form.classList.remove("valid");
    form.classList.add("invalid");

    msg.innerHTML = "Username is too long (maximum is 20 characters).";
  }
  else {
    form.classList.remove("valid");
    form.classList.add("invalid");

    msg.innerHTML = "Username " + username + " is not available. Username may only contain alphanumeric characters or single hyphens, and cannot begin or end with a hyphen.";
  }
}