
<html>

    <h2 align="center" style="color:blue"><u>Student Transcript</u></h2>

     <div class="container">
      <form action="Transcript.php" method="POST">
        </br>

          <?php
            
              $conn1 = new mysqli("localhost", "root", "root", "UGMS_DB");
                if ($conn1->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
                } 
              $sql = 'SELECT * from Student_Enrolment WHERE SID =1000';
              $result = $conn1->query($sql);

              $cnamesql = 'SELECT * from course where CID in (SELECT CID from Student_Enrolment where SID=1000)';
              $rcname = $conn1->query($cnamesql);

              //select avg(Marks) from Assignment_Mark where SID =1000 and CID='cs215';
              $avg_marks_sql ='SELECT avg(Marks) from Assignment_Mark where SID =1000 and 
                                      CID in (SELECT CID from Student_Enrolment where SID=1000)';
              $ram = $conn1->query($avg_marks_sql);

              $oavg_sql ='SELECT avg(Marks) from Assignment_Mark where SID =1000';
              $roam = $conn1->query($oavg_sql);

          ?>
          <p>
          <table border = '1' align="center">
             <thead>
                <tr>
                <th>Course ID</th>
                <th>Course Name</th>
                <th>Course Average (%)</th>
                </tr>
             </thead>
                <tbody>
                  <?php while( $row = $result->fetch_assoc() )
                     : ?>

                    <!--?php while($ram->fetch_assoc()) :?-->
                   <tr>
                    <td><?php echo $row["CID"]; ?></td>
                    <td><?php echo $rowcn["Cname"]; ?></td>
                    <td> <?php 

                        while( $rowcn = $rcname->fetch_assoc() )
                        {
                            $c = $row["CID"];
                            $oavg_sql ='SELECT avg(Marks) from Assignment_Mark where SID =1000 and CID=$c';
                            $roam = $conn1->query($oavg_sql);
                            $rowam = $ram->fetch_assoc() ;
                            echo $rowam["avg(Marks)"]; 
                          }
                          ?>
                          <!--?php echo $ram["avg(Marks)"]; ?></td-->
                    </td>

                    <?php ?>

                    <!--td align="center"><?php //echo $rowam["Marks"]; ?></td-->
                   </tr>

                   <!-- Conn obj not closed yet... -->

                 <?php endwhile ?>
             </tbody>
          </table>

          <br/><h3 align="center" style="color:green"><u>Overall Grade (%): </u></h3>

          <?php
            
              $avg_marks_sql ='SELECT * from Assignment_Mark where SID =1000';
              $ram = $conn1->query($avg_marks_sql);
              $roverallgrade = $ram->fetch_assoc();
              echo "$roverallgrade[Marks]";
        
          ?>


        </form>
      </div>

</html>
