<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CssAndHtml/index.css">
    <link rel="stylesheet" href="../CssAndHtml/index.css">
    <script async src="../javascript/password_validation.js"></script>
    <title>camagru : passwor reset</title>
  </head>

  <body>
    <div class="login-page">
      <div class="form" id="form">
        <form class="login-form" id ="forum" name="forum">
          <h1>New password</h1>
          <input type="password" id="password" name="password" placeholder="password" required>
          <div class="indicator">
              <span class="weak"></span>
              <span class="medium"></span>
              <span class="strong"></span>
            </div>
            <div class="text"></div>
          <input type="password" id="confirm_password" name="confirm_password"
            placeholder="confirm password" required>
          <div id="email-error-message" class="error-message"></div>
          <button type="submit">Reset the password</button>
        </form>
      </div>
    </div>
  </body>

</html>

