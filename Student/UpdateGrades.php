<html>
  <head>
    <h1 align="center"><u>Marker's Grade View</u></h1>
  </head>

   <body style="background-color:BABAAC;">

    <h2 align="center" style="color:blue"><u>Task-wise View</u></h2>

        <div class="container">
      <form action="EditGrades.php" method="POST">

        </br>

        <?php
               $conn = new mysqli("localhost", "root", "root", "UGMS_DB");
                if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
                } 

              $sql = 'SELECT * from Student_Enrolment WHERE SID =1000';
              $result = $conn->query($sql);

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
                  <?php while( $row = $result->fetch_assoc()) : ?>
                   <tr>
                    <td><?php echo $row["SID"]; ?></td>
                    <td><?php echo $row["CID"]; ?></td>
                    <td>
                      <a href="ViewGrades.php" target="_blank">View</a>
                      <a href="EditGrades.php" target="_blank">Edit</a>
                    </td>
                    <td><?php echo $row["CID"]; ?></td>

                    <!--td><a href="https://www.thesitewizard.com/" target="_blank">Edit</a></td-->
                   </tr>
                 <?php endwhile ?>
             </tbody>
          </table>
        </form>
      </div>
      <br/>

    <h2 align="center" style="color:blue"><u>Overall Grade View</u></h2>

     <div class="container">
      <form action="EditGrades.php" method="POST">

        </br>

        <?php
            
              $sql = 'SELECT * from Student_Enrolment WHERE SID =1000';
              $result = $conn->query($sql);
              //echo $sql;
          ?>
          <p>
          <table border = '1' align="center">
             <thead>
                <tr>
                <th>Course ID</th>
                <th>Course Name</th>
                <th>Overall Grade (%)</th>
                </tr>
             </thead>
                <tbody>
                  <?php while( $row = $result->fetch_assoc()) : ?>
                   <tr>
                    <td><?php echo $row["SID"]; ?></td>
                    <td><?php echo $row["CID"]; ?></td>
                    <td>
                      <a href="ViewGrades.php" target="_blank">View</a>
                      <a href="EditGrades.html" target="_blank">Edit</a>
                    </td>
                   </tr>
                   <!-- Conn obj not closed yet... -->

                 <?php endwhile ?>
             </tbody>
          </table>
        </form>
      </div>

   </body>
</html>