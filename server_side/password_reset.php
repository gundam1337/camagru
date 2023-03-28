<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../CssAndHtml/index.css">
  <link rel="stylesheet" href="../CssAndHtml/index.css">
  <script type="module" src="../javascript/password_rest.js"></script>
  <title>camagru : passwor reset</title>
</head>
<body>
  <div class="login-page">
    <div class="form" id="form">
      <form class="login-form" id = "forum" name="forum">
        <h1>Password reset</h1>
        <input id="email" type="email" placeholder="email" name="email" required />
        <div id="email-error-message" class="error-message"></div>
        <button type="submit">Email me a link</button>
      </form>
    </div>
  </div>
</body>
</html>