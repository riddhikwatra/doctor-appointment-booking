<html>
<head>
<style>
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
h1{
  font-size: 70;
}
b{
  font-size: 50;
}
</style>
</head>
<body>
  <div class="bg"></div>
  <center>
  <h1>DOCTORS LOGIN</h1>
  </center>
  <form action="doctorLogin.php" method="post">
     <label for="doc_no"><b>enter doc_id</b></label>
     <input type="number" name="doc_no" size="100">
     <br>
     <label for="password"><b>enter password</b></label>
     <input type="password" name="pass">
     <br>
     <input type="submit" name="submit" value="submit">
  </form>
</body>
</html>
