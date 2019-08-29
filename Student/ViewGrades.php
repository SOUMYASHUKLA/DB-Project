<html>
  <head>
  	<h1 align="center"><u>Student's Grade View</u></h1>
  </head>

   <body style="background-color:BABAAC;">

   	<h2 align="center" style="color:blue"><u>Task-wise View</u></h2>

        <div class="container">
      <form action="ViewGrades.php" method="POST">
        </br>

        <?php
               $conn = new mysqli("localhost", "root", "root", "UGMS_DB");
                if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
                } 

              $sql = 'SELECT * from Student_Enrolment WHERE SID =1000';
              $result = $conn->query($sql);
     

              $cnamesql = 'SELECT * from course where CID in (SELECT CID from Student_Enrolment where SID=1000)';
              $rcname = $conn->query($cnamesql);
          

              $task_marks_sql = 'SELECT * from Assignment_Mark where SID =1000 and 
              						CID in (SELECT CID from Student_Enrolment where SID=1000)';
              $rtmsql = $conn->query($task_marks_sql);

          ?>

          <p>
          <table border = '1' align="center">
             <thead>
                <tr>
                <th>Course ID</th>
                <th>Course Name</th>
                <th>Task Type</th>
                 <th>Marks</th>
                </tr>
             </thead>
                <tbody>
                  <?php while( $row = $result->fetch_assoc() and 
                  				$rowcname = $rcname->fetch_assoc() and 
                  				$rowtm = $rtmsql->fetch_assoc()
                  				) : ?> <!--FOR ALL COURSE IDS -->                   
                   <tr>
                    <td><?php echo $row["CID"]; ?></td>
                    <td><?php echo $rowcname["Cname"]; ?></td>
                    <td><?php echo $rowtm["Task_Type"]; ?></td>
                    <td><?php echo $rowtm["Marks"]; ?></td>
                   </tr>
                
             
                 <?php endwhile ?>
             </tbody>
          </table>
        </form>
      </div>
      <br/>


   </body>
</html>