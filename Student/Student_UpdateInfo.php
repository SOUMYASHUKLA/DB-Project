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
  <script type="text/javascript">
    function con () {
      // body...
      var response = confirm("Are you sure you want to update your details");
      if(response == false)
        preventDefault();
      return false;
    }
  </script>
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
      <form action="Student_UpdateInfo.php" method="POST"></br>

        <p><label for="fname"><b>First Name</b></label>
        <input type="text" placeholder="Enter First Name" name="fname"></p>

        <p><label for="lname"><b>Last Name</b></label>
        <input type="text" placeholder="Enter Last Name" name="lname"></p>

        <p><label for="faculty"><b>Faculty</b></label>
        <input type="text" placeholder="Enter Faculty" name="faculty"></p>

        <p><label for="address"><b>Address</b></label>
        <input type="text" placeholder="Enter Address" name="address"></p>

        <p><label for="contact"><b>Contact No.</b></label>
        <input type="text" placeholder="Enter Contact No." name="contact"></p>

        <p><label for="dob"><b>Date Of Birth</b></label>
        <input type="text" placeholder="Enter DOB " name="dob"></p>

        <!--button type="button" onclick="myFunction();">Submit</button-->
        </br><button type="submit" value="Save" name="submit" onclick=con()>Update</button>

        <!--label><input type="checkbox" checked="checked" name="remember"> Remember me</label-->

      </form>
    </div>


<?php
// Create connection
     $conn = new mysqli("localhost", "root", "root", "UGMS_DB");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


  if(isset($_POST['submit']))
  {

   $Fname1 = $_POST['fname'];
    $Lname1 = $_POST['lname'];
    $Faculty1 = $_POST['faculty'];
    $Address1= $_POST['address'];
    $Contact1 = $_POST['contact'];
    $DOB1 = $_POST['dob'];
  
    $updatesql ="UPDATE Student SET Fname='$Fname1' WHERE '$SID'=5000";
     //, Lname='$Lname1',Faculty='$Faculty1',Address='$Address1',
             // Contact=$Contact1,DOB='$DOB1' WHERE $SID=5000";

  
      $res1 = $conn->query($updatesql);

      if ($res1 === TRUE) {
          echo "Record updated successfully";
      } 
      else {
          echo "Error: " . $updatesql . "<br>" . $conn->error;
          }
        
  }

$conn->close();
?>

  </body>
</html>


