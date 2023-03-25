let myForum = document.getElementById("forum");
const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
const emailErrorMessage = document.getElementById("email-error-message");

myForum.addEventListener("submit", function (event) {
  event.preventDefault();

  const email = document.getElementById("email").value;
  if (email.match(emailRegex)) {
    const info = { email: email };
    const DataJson = JSON.stringify(info);
    fetch("http://camagru.nginx/server_side/verify_email.php", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: DataJson,
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.exists) {
          window.location.href =
            "http://camagru.nginx/CssAndHtml/user_found.html";
        } else {
          window.location.href =
            "http://camagru.nginx/CssAndHtml/no-user-found.html";
        }
      })
      .catch((error) => console.error(error));
  } else {
    emailErrorMessage.textContent = "Please enter a valid email address";
  }
});
