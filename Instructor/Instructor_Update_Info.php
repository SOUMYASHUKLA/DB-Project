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
      <li style="float:right"><a class="active" href="#logout">Logout</a></li>
    </ul>
    
    <div class="container">
      <form action="Instructor_Update_Info.php" method="POST">

        <p><label for="fname"><b>First Name</b></label>
        <input type="text" placeholder="Enter First Name" name="fname"></p>

        <p><label for="lname"><b>Last Name</b></label>
        <input type="text" placeholder="Enter Last Name" name="lname"></p>

        <p><label for="faculty"><b>Faculty</b></label>
        <input type="text" placeholder="Enter Faculty" name="faculty"></p>

        <p><label for="contact"><b>Contact No.</b></label>
        <input type="text" placeholder="Enter Contact No." name="contact"></p>

        <!--button type="button" onclick="myFunction();">Submit</button-->
        <input type="submit" value="Submit" name="submit">

        <!--label><input type="checkbox" checked="checked" name="remember"> Remember me</label-->

      </form>
    </div>


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

//$sql = "INSERT INTO Instructor (IID, Fname, Lname, Contact, Faculty)
//erVALUES (2005,'Lisa', 'Fan', 306123462, 'Computer Science' )";

/*if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}*/

// How to check which ID.
$current_user_id = 2000;

/*$result_Field_Data = mysql_query("SELECT * FROM field"); 

while($row = mysql_fetch_array($result)) 
  { 
  echo '<form action="">'; 
  echo '<select name="nameofname :D">'; 
  echo '<option value=". $row['nameoffield'] .">". $row['nameoffield']. "</option>'; 
  echo '</form>'; 
  } */
  

  


if(isset($_POST['submit']))
{
   echo "in fn..";
$Fname1 = $_POST['fname'];
$Lname1 = $_POST['lname'];
$Faculty1 = $_POST['faculty'];
$Contact1 = $_POST['contact'];
echo $Fname1;
$sql = "UPDATE Instructor SET Fname='$Fname1' WHERE IID='$current_user_id'";
//$sql = "INSERT INTO Instructor (IID, Fname, Lname, Contact, Faculty)
//VALUES (2007,'S', 'Shukla', 3061232222, 'Computer Science' )";

//$sql = "INSERT INTO Instructor (IID, Fname, Lname, Contact, Faculty)
//VALUES (6000, $Fname1, $Lname1, $Contact1,$Faculty1)";

echo "post query..";
echo $conn->query($sql);

$result = $conn->query($sql);

if ($result === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}

/*$Fname = $_POST['fname'];
$Lname = $_POST['lname'];
$Faculty = $_POST['faculty'];
$Contact = $_POST['contact'];
echo $Fname;*/


$conn->close();



?>



  </body>
</html>