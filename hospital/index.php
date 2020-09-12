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
font-style:italic;
}
a:visited {
color: blue;
background-color: transparent;

}
a:hover {
color: red;
background-color: transparent;
}
h2{
  font-size: 300%;
}
</style>
<title>php file</title>
</head>
<body>
  <div class="bg"></div>
 <center>
<font size="6">
<h1>LIFE PLUS HOSPITAL</h1>
</font>
<img src="doctor.jpg" alt="doctor image" style="width:500px;height:400px;">
<h2>
<a href="department.php">Departments</a><br>
<a href="patientlog.php">Book an appointment</a><br>
<a href="doctor.php">Doctor's login</a><br>

</center>
</body>
</html>
