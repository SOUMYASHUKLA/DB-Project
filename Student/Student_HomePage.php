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

      .container {
    position: relative;
    text-align: center;
    color: black;
    }

    .centered {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}



</style>

  </head>
  <body style="background-color:E8CC56;">

    <h1 align="center">University Grade Management System - UGMS</h1>
    <!--img src="file:///Applications/MAMP/htdocs/UGMS/Student/images/user.png"-->

    <ul>
      <li><a class="Home" href="http://localhost:8888/ugms/Student/Student_HomePage.php">Home</a></li>
      <li><a href="http://localhost:8888/ugms/Student/Student_GradePage.php">View Grades</a></li>
      <li><a href="http://localhost:8888/ugms/Student/Student_UpdateInfo.php">Update Info</a></li>
      <li><a href="http://localhost:8888/ugms/Student/Student_MarkingPage.php">Marking</a></li>
      <li style="float:right"><a class="active" href="#logout">Logout</a>
      </li>
    </ul>
    
    <div class="container">
    <br/><br/> 

  <?php
  $servername = "localhost";
  $username = "root";
  $password = "root";
  $dbname = "UGMS_DB";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  } 

  $sql = "SELECT * FROM Student where SID=1000";
  $result = $conn->query($sql);
  $coursesql= "SELECT * from Student_Enrolment where sid = 1000";
  $res = $conn->query($coursesql);
  $r = $res->fetch_assoc();

  $IsMarkerSql = 'SELECT * FROM Student_Enrolment where SID=1001';
  $IsMarkerSqlresult = $conn->query($IsMarkerSql);
  //$rm = $IsMarkerSqlresult->fetch_assoc();

  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {  
          echo "<u><h3 align='center' style='font-size:200%; color:blue'>"."Welcome ". $row["Fname"]."</h3></u>";
          //echo $row["Fname"];
         // echo "Student ID: " . $row["SID"]. "<br><br/>";
         // echo " Name: " . $row["Fname"]. " " . $row["Lname"]. "<br><br>";
          echo "<div class 'container'>";

         // echo "<img src='images/np.png' style='width:40%;''>";
          echo "<div class='centered'>"."You belong to " . $row["Faculty"]." faculty"."</div>"."<br><br>";
          echo "You are enroled in : " . $r["CID"]. "<br><br>";
          echo "<u>"."Below are your roles:"."</u>"."<br>";
          while( $rm = $IsMarkerSqlresult->fetch_assoc())
        { 
          if($rm["Role"] === "marker")
          {
            echo "<p style='font-size:100%; color:red'>"."Marker access : " . $rm["CID"]. "</p>";
          }
            else
            {
              echo "<p style='font-size:100%; color:green'>"."Student access : " . $rm["CID"]. "</p>";
            }  
        }         
      }
      echo "</div>";

  } else {
      echo "0 results";
  }


  $conn->close();
  ?>
  </div>
  </body>
</html>