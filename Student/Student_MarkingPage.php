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
      <form action="Student_MarkingPage.php" method="POST">

        </br></br>

        <?php
               $conn = new mysqli("localhost", "root", "root", "UGMS_DB");
                if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
                } 

              $sql = 'SELECT * from Student_Enrolment WHERE SID =1001';
              $result = $conn->query($sql);

              $IsMarkerSql = 'SELECT * FROM Student_Enrolment where SID=1001';
              $IsMarkerSqlresult = $conn->query($IsMarkerSql);

            //  $r = $IsMarkerSqlresult->fetch_assoc();
               echo $r["Role"];
              //echo $sql;

          ?>
          <p>

          <table border = '1'>
             <thead>
                <tr>
                <th>STUDENT ID</th>
                <th>COURSE ID</th>
                <th>ACTIVITY</th>
                </tr>
             </thead>
                <tbody>
                  <?php while( $row = $result->fetch_assoc()) : ?>
                        <?php while( $r = $IsMarkerSqlresult->fetch_assoc()) : ?>
                   <tr>
                    <td><?php echo $row["SID"]; ?></td>
                    <td><?php echo $row["CID"]; ?></td>
                    <td>

                      <!--a href="ViewGrades.php" target="_blank">View</a--> 
                      <!-- Check if student is marker, to allow edit marks-->
                      <?php if($r["Role"] === "marker") :?>
                        <a href="EditGrades.php" target="_blank">Edit</a>
                      <?php endif; ?>
                    </td>

                    <!--td><a href="https://www.thesitewizard.com/" target="_blank">Edit</a></td-->
                   </tr>
                   <tr>
                      <td> 1002</td>
                      <td> cs890</td>
                      <td> <a href="ViewGrades.php" target="_blank">View</a> </td>
                   </tr>
                     <?php endwhile ?>
                 <?php endwhile ?>
             </tbody>
          </table>

        </form>
      </div>
  </body>
</html>