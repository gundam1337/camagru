function username_validation() {
  var username = document.getElementById("username").value;
  var name = document.getElementById("name");
  var bt = document.getElementById("bt");

  var pattern = /^[a-z\d](?:[a-z\d]|-(?=[a-z\d])){0,21}$/i;

  if (username.match(pattern)) {
    name.classList.remove("erro");
    name.classList.add("valid");
    name.innerHTML = "this " + username + " is Okey.";
    return true;
  } else if (username.length >= 20) {
    name.classList.remove("valid");
    name.classList.add("erro");
    name.innerHTML = "Username is too long (maximum is 21 characters).";
    return false;
  } else {
    name.classList.remove("valid");
    name.classList.add("erro");
    name.innerHTML =
      "Username " +
      username +
      " is not Okey. Username may only contain alphanumeric characters or single hyphens, and cannot begin or end with a hyphen.";
    return false;
  }
}
