<html>
  <head>
    <style type='text/css'>



label {
  float:left;
  width:7em;}



ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover:not(.active) {
    background-color: #111;
}

.active {
    background-color: #4CAF50;
}



</style>
  </head>

  <body style="background-color:E8CC56;">

    <h3 align="center">University Grade Management System - UGMS</h3>

   <ul>
      <li><a class="Home" href="http://localhost:8888/ugms/Student/Student_HomePage.php">Home</a></li>
      <li><a href="http://localhost:8888/ugms/Student/Student_GradePage.php">View Grades</a></li>
      <li><a href="http://localhost:8888/ugms/Student/Student_UpdateInfo.php">Update Info</a></li>
      <li><a href="http://localhost:8888/ugms/Student/Student_MarkingPage.php">Marking</a></li>
      <li style="float:right"><a class="active" href="#logout">Logout</a>
      </li>
    </ul>
    
    <div class="container">
      <form action="Student_GradePage.php" method="POST">
        <?php

        $conn = new mysqli("localhost", "root", "root", "UGMS_DB");
        if ($conn->connect_error) {
           die("Connection failed: " . $conn->connect_error);
          } 


          $q1 = "SELECT * from Student_Enrolment where SID=1000";

          $cidsql = $conn->query($q1);

          $cnamesql = $conn->query("SELECT * from course where CID in 
                     (select CID from Student_Enrolment where SID=1000)");

          $markssql = $conn->query("SELECT * from Assignment_Mark where SID =1000 and CID in
                       (SELECT CID from Student_Enrolment where SID=1000)");

              echo "<p>"."<table border = '1'>";
              echo"<tr>";
              echo"<th>"."Course ID"."</th>";
              echo"<th>"."Course name"."</th>";
              echo"<th>"."Task Type"."</th>";
              echo"<th>"."Marks Obtained"."</th>";
              echo"</tr>";

          while($rcid= $cidsql->fetch_assoc())
          {
              $rcname = $cnamesql ->fetch_assoc();

              while( $rm = $markssql->fetch_assoc() )
              {
                
                $v = $rm["CID"];
                $c = "SELECT * FROM course where CID = '$v' ";
                $cn = $conn->query($c);
                $name= $cn->fetch_assoc();

                 echo"<tr>";
                 echo"<th>";
                 echo "<p>".$rm["CID"];
                 echo"</th>";
                 echo"<th>";
                 echo $name["Cname"]."</p>";
                 echo"</th>";
                 //   echo"<tr>";
                    echo"<th>".$rm["Task_Type"]."</th>";
                    echo"<th>".$rm["Marks"]."</th>";
                    echo"</tr>";
         
              }

          }


          $conn->close();       
  
         ?> 
          </table>

      </form>
    </div>




  </body>
</html>