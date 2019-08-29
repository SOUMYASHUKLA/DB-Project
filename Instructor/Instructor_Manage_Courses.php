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

    <h2 align="center">University Grade Management System - UGMS</h2>

    <ul>
      <li><a class="Home" href="http://localhost:8888/ugms/Instructor/Instructor_Home_Page.php">Home</a></li>
      <li><a href="http://localhost:8888/ugms/Instructor/Instructor_Manage_Courses.php">Manage Courses</a></li>
      <li><a href="http://localhost:8888/ugms/Instructor/Instructor_Update_Info.php">Update Info</a></li>
      <li style="float:right"><a class="active" href="#logout">Logout</a>
      </li>
    </ul>
    
    <div class="container">
     
    

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
    /*else
    {
      echo "db connected";
    }*/

    
$current_user_id = 2001;

    $sql = "SELECT * FROM Instructor_Enrolment WHERE IID = $current_user_id";
    $result = $conn->query($sql);
    
    echo "<br>";

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            
          
            echo "Course: " . $row["CID"]. "<br>";
            echo "<form action='iv.php' method='POST'>
              <input type='hidden' name='tempId' value='".$row["CID"]."'>
              <input type='submit' name='submit-btn' value='View' />
              <!--input type='hidden' name='tempId' value='".$row["CID"]."'-->
              <!--input type='submit' name='submit-btn' value='Edit' /-->
              ";
            echo "</form>";
            

        }
    } else {
        echo "0 results";
    }


    $conn->close();

  ?>
  </div>
  </body>
</html>