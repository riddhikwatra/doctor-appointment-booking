<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title></title>
    <style media="screen">
    .bg{
      position: absolute;
      top: 0;
      bottom:0;
      left: 0;
      right: 0;
      z-index: -5;
    background-image:url("hospital.jpg");
    background-size: cover;
    background-attachment: fixed;
    background-size: contain;
    opacity: 0.7;
    }
    </style>
    <link rel="stylesheet" href="patientlog.css">
  </head>
  <body>
    <div class="bg">

    </div>
    <div class="app" align="center">
    <form action="appointment.php"method="post">
      <h1>register yourself/ log in!</h1>
      <div class="form-group">

          <label for="usr">Full Name:</label><br>
          <input type="text" name="name" required><br>
</div>
<div class="form-group">

          <label for="pwd">Password:</label><br>
          <input type="password"  name="password" required>
          </div>
          <input type="submit" name="submit" value="Register">

    </form>
  </div>
  </body>
</html>
