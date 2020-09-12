<?php
session_start();
if(isset($_POST['submit']))
{
  $n=$_POST['name'];
  $p=$_POST['password'];
  $_SESSION['p_name']=$n;
  $_SESSION['p_pass']=$p;
  ($db = mysqli_connect('localhost','root','','hospital'))
  or die('Error connecting to MySQL server.');
  $q="SELECT * FROM `patient` where name='$n' and pass='$p'";
  $result = mysqli_query($db, $q) or die("Selection Query Failed !!!");
if (mysqli_num_rows($result) > 0) {
  $q="SELECT * FROM `apt_details` where pid=(SELECT p_id FROM `patient` where name='$n' and pass='$p')";
    $result = mysqli_query($db, $q) or die("Selection Query Failed !!!");
  echo<<<HTML
       <table border="2" width="1450">
        <caption align="top"><h3>your previous appointments</h3></caption>
        <thead>
          <tr>
            <th>pid</th>
            <th>pno</th>
            <th>department</th>
            <th>doctor</th>
            <th>date</th>
            <th>time</th>
            <th>status</th>
         </tr>
       </thead>
       <tbody>
      HTML;
      while ($row = mysqli_fetch_array($result)) {
       echo "<tr><td>{$row['pid']}</td><td>{$row['pno']}</td><td>{$row['dept']}</td><td>{$row['doctor']}</td><td>{$row['date']}</td><td>{$row['time']}</td><td>{$row['status']}</tr>";
      }
    print("</table>");

}
 else {
   $sql="INSERT INTO `patient` ( `name`, `pass`) VALUES ('$n', '$p')";
   if (mysqli_query($db, $sql)) {
   echo "you have registered successfully";
         }
  else {
   echo "Error: " . $sql . "<br>" . mysqli_error($conn);
 }

}
}
mysqli_close($db);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>appointment</title>
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
  </head>
  <body>
    <div class="bg">

    </div>
    <form action="bookapt.php" method="post">
      <center>
        <br>
      <input type="submit" name="apt" value="book an appointment">
    </center>
    </form>
  </body>
</html>
