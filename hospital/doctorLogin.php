
<?php
session_start();
if(isset($_POST['doc_no'])&&isset($_POST['pass'])&&isset($_POST['submit']))
{
  $id=$_POST['doc_no'];
  $pass=$_POST['pass'];
  $_SESSION["id"] =$id;
}
($db = mysqli_connect('localhost','root','','hospital'))
or die('Error connecting to MySQL server.');
$query = "SELECT * FROM `doc_time` where `docNo`=(select `doc_id` from `doctor` where `doc_id`=1 and `password`='123') and `status`=1 order by `date`";
mysqli_query($db, $query) or die('Error querying database.');
$result = mysqli_query($db, $query);
?>

<!-- html begins  -->
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>

  <style media="screen">
  body{
  background-color: #fff;
  }
  table {
    margin-top:2em;
  }
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
  opacity: 0.2;
  }
  </style>
</head>
  <body>
      <div class="bg"></div>
    <table border="2" width="1400">
      <caption align="top"><h3>already booked slots</h3></caption>
      <thead>
        <tr>
          <th>docID</th>
          <th>date</th>
          <th>time</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($row = mysqli_fetch_array($result)) {
         echo "<tr><td>{$row['docNo']}</td><td>{$row['date']}</td><td>{$row['time']}</td></tr>";
        }
        ?>
     </tbody>
   </table>

     <?php
      $query = "SELECT * FROM `doc_time` where `docNo`=(select `doc_id` from `doctor` where `doc_id`=1 and `password`='123') and `status`=0 order by `date`";
      mysqli_query($db, $query) or die('Error querying database.');
      $result = mysqli_query($db, $query);
      ?>

          <table border="2" width="1400">
            <caption align="top"><h3>free slots</h3></caption>
              <caption align="bottom">you can only make changes in free slots</caption>
            <thead>
              <tr>
                <th>docID</th>
                <th>date</th>
                <th>time</th>
              </tr>
            </thead>
            <tbody>
              <?php
              while ($row = mysqli_fetch_array($result)) {
               echo "<tr><td>{$row['docNo']}</td><td>{$row['date']}</td><td>{$row['time']}</td></tr>";
              }
              ?>
           </tbody>
         </table>

             <form action="" method="post">
               <center>
                 <br>
              <input type="submit" name="option" value="insert"><br><br>
              <input type="submit" name="option" value="delete">
            </center>
             </form>

         <?php
         if(isset($_POST['option']))
         {
        if ($_POST['option']=='insert') {
          echo<<<HTML
          <form  action="" method="post">
          <label for="date"><b>enter date</b></label>
          <input type="date" name="date">
          <br>
          <label for="time"><b>enter time</b></label>
          <input type="time" name="time">
          <br>
          <input type="submit" name="insert" value="proceed">
          </form>
          HTML;
        }
        if($_POST['option']=='delete')
        {
          echo<<<HTML
          <form  action="" method="post">
          <label for="date"><b> date</b></label>
          <input type="date" name="date">
          <br>
          <label for="time"><b>enter time</b></label>
          <input type="time" name="time">
          <br>
          <input type="submit" name="delete" value="delete">
          </form>
          HTML;

        }
      }
      ?>
      <?php
      if(isset($_POST['insert']))
      {
        $d=$_POST['date'];
        $t=$_POST['time'];
        $i=$_SESSION["id"];
        $sql="INSERT INTO `doc_time` (`docNo`, `date`, `time`, `status`) VALUES ($i,'$d', '$t', '0')";
        if (mysqli_query($db, $sql)) {
        echo "New record created successfully";
      }
       else {
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
      }
    }
    if(isset($_POST['delete']))
    {
      $i=$_SESSION["id"];
      $d=$_POST['date'];
      $t=$_POST['time'];
      $sql="DELETE FROM `doc_time` WHERE `time`='$t' and `date`='$d' and `docNo`=$i";
      if (mysqli_query($db, $sql)) {
      echo "deletion successfull";
    }
     else {
      echo "Error: " . $sql . "<br>" . mysqli_error($db);
    }
  }?>
</body>
</html>
