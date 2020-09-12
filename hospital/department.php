<?php
($db = mysqli_connect('localhost','root','','hospital'))
or die('Error connecting to MySQL server.');
$q="SELECT * from `doctor` order by dept";
mysqli_query($db, $q) or die('Error querying database.');
$result = mysqli_query($db, $q);
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
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
     </style>
     </head>
   </head>

   <body>
     <div class="bg"></div>
     <table border="2" width="1520">
         <caption align="top">DOCTORS</caption>
         <thead>
           <tr>
             <th>Name</th>
             <th>Department</th>
             <th>Degree</th>
             <th>Experience</th>
           </tr>
         </thead>
         <tbody>
           <?php
           while ($row = mysqli_fetch_array($result)) {
            echo "<tr><td>{$row['doc_name']}</td><td>{$row['dept']}</td><td>{$row['degree']}</td><td>{$row['experience']}</tr>";
           }
           ?>
        </tbody>
     </table>
     <form action="patientlog.php" method="post">
       <center>
         <input type="submit" name="submit" value="book an appointment" style="height:50px;width:200px">
       </center>
     </form>
   </body>
 </html>
 <?php
 mysqli_close($db);  ?>
