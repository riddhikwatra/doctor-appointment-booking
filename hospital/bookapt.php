<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>book appointment</title>
    <style >
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
    <center>
    <h1>APPOINTMENT DETAILS</h1>
    <form action="" method="post">
      <label for="dept"><b>enter department</b></label>
      <input type="text" name="dept"><br><br>
      <label for="doctor"><b>enter doctor</b></label>
      <input type="text" name="doctor"><br><br>
      <label for="date"><b>enter date</b></label>
      <input type="date" name="date"><br><br>
    <input type="submit" name="book" value="book">
  </center>
    </form>
  </body>
</html>
<?php
session_start();
($db = mysqli_connect('localhost','root','','hospital'))
or die('Error connecting to MySQL server.');
if(isset($_POST['book']))
{
  $d=$_POST['doctor'];
  $dep=$_POST['dept'];
  $_SESSION['p_date']=$_POST['date'];
  $_SESSION['p_dep']=$dep;
  $_SESSION['p_d']=$d;
  $key=false;
  $q="SELECT `time` FROM `doc_time` WHERE docNo=(SELECT doc_id from doctor where doc_name='$d' and dept='$dep' and status='0')";
  mysqli_query($db, $q) or die('Error querying database.');
  $result = mysqli_query($db, $q);
  while( $row = mysqli_fetch_array( $result ) ) {
  $arr[]= $row['time'];
  $key=true;
}

echo<<<HTML
<html lang="en" dir="ltr">
<head>
 <title></title>
</head>
<body>
HTML;
    echo "the available timings are:<br>";
    if($key)
  {  foreach ($arr as $key => $value) {
      echo<<<HTML
      <form action="" method="post">
      <input type="radio" name="dat" value="$value">$value<br>
      HTML;
    }
    echo<<<HTML

       <input type="submit" name="finalBook" value="done">
       </form>

   </body>
   </html>
HTML;
}
else {
  echo "timings not available";
}
}
if(isset($_POST['finalBook']))
{
  $t=$_POST["dat"];
  $n=$_SESSION["p_name"];
  $p=$_SESSION["p_pass"];
  $q="SELECT p_id FROM `patient` where name='$n' and pass='$p'";
  mysqli_query($db, $q) or die('Error querying database.');
  $result = mysqli_query($db, $q);
  while ($row = mysqli_fetch_array($result))
  $pid=$row['p_id'];
  $do=$_SESSION['p_d'];
  $dep=$_SESSION['p_dep'];
  $date=$_SESSION['p_date'];
  echo $pid;
  echo $n;
  $q="INSERT INTO `apt_details` (`pid`, `dept`, `doctor`,`date`,`time`, `status`) VALUES ($pid,'$dep','$do','$date', '$t', '0')";
  if (mysqli_query($db, $q)) {
  echo "New record created successfully<br>";
  $q="UPDATE `doc_time` set `status`='1' where  `docNo`=(SELECT doc_id from doctor where doc_name='$d' and dept='$dep' and `date`='$date' and `time`='$t'";
  if(mysqli_query($db,$q))
  {
    echo "table updated";
  }
}
 else {
  echo "Error: " . $q . "<br>" . mysqli_error($db);
}
}
?>
