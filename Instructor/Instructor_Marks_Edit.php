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
     
    <table border='1'> 
      <thread>
        <tr>
            <th style="color:blue;">Student ID</th>
            <th style="color:blue;">First Name</th>
            <th style="color:blue;">Last Name</th>
            <th style="color:blue;">Assignment 1</th>
            <th style="color:blue;">Assignment 2</th>
            <th style="color:blue;">Assignment 3</th>
            <th style="color:blue;">Mid Term</th>
            <th style="color:blue;">Option</th>
        </tr>


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

    $current_user_id = 2001;
    $current_course_id = 'CS875';

    $sql = "SELECT * FROM Assignment_Mark WHERE CID = '$current_course_id' ";
    $result = $conn->query($sql);
    
    $ssql = "SELECT * FROM Student WHERE SID in (
                SELECT SID FROM Assignment_Mark WHERE CID = '$current_course_id'
              ) ";
    $rssql = $conn->query($ssql);

    $csql = "SELECT * FROM Course WHERE CID = '$current_course_id'";
    $rcsql = $conn->query($csql);

    $rowcsql = $rcsql->fetch_assoc();
    echo  "<h3 align='center'; style = 'color: red; '>".$rowcsql["CID"]. "-";
    echo  $rowcsql["Cname"]. "<br> <br></h3>";

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc() and
              $rowssql = $rssql->fetch_assoc() 
              ) {

          echo "<tr>";
          echo "<th>".$row["SID"];
          echo "<th>".$rowssql["Fname"];
          echo "<th>".$rowssql["Lname"];
          

          //  echo " Name: " . $rowssql["Fname"]. " " . $rowssql["Lname"]. "\t";
            //select task marks from am where cid and sid 
            $localSID = $row["SID"];
            $AMsql = "SELECT * FROM Assignment_Mark WHERE CID = '$current_course_id' 
            AND SID = '$localSID'";
            $rAMsql = $conn->query($AMsql);

            while($rowAMsql = $rAMsql->fetch_assoc()){
             // echo "<th>".$rowAMsql["Task_Type"];
              echo "<th contenteditable='true'>".$rowAMsql["Marks"];


           // echo "Task: " . $rowAMsql["Task_Type"]. "\t";
            //echo "Marks: " . $rowAMsql["Marks"]. "\t";

            
          }

         
              echo "<form action='Instructor_Marks_Edit.php' method='POST'>
              <input type='hidden' name='tempId' value='".$row["SID"]."'><th>
              <input type='submit' name='submit-btn' value='Update' />";

             echo "<tr>";
            echo "</form>";
           
        }

    } else {
        echo "0 results";
    }



      if(isset($_POST['submit-btn']))
      {
         //echo "in fn..";
      //$Task_at_hand = $_POST['fname'];
      
      $Update_Marks_sql = "UPDATE Assignment_Mark SET Marks=97 WHERE SID=3000 AND Task_Type='Mid Exam' ";


      //echo "post query..";
      echo $conn->query($Update_Marks_sql);

      $Update_Marks_result = $conn->query($Update_Marks_sql);

      if ($Update_Marks_result === TRUE) {
          //echo "Record updated successfully";
      } else {
          echo "Error: " . $Update_Marks_sql . "<br>" . $conn->error;
      }
      }


    $conn->close();

  ?>
  
      </thread>
    </table>
  </div>
  </body>
</html>