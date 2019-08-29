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

              $cname ="SELECT * from course where CID in ( SELECT CID from Student_Enrolment WHERE SID =1000)";
              $rcname = $conn->query($cname);

              $sqlm = "SELECT * from Assignment_Mark where SID =1000 and CID in
                          (SELECT CID from Student_Enrolment where SID=1000) ";
              $sm = $conn->query($sqlm);
            
          

          ?>
          <p>
          <table id="myTable" border = '1' align="center">
             <thead>
                <tr>
                <th>Course ID</th>
                <th>Course Name</th>
                <th>Task Type</th>
                
                <!--div contenteditable="true">
                    CourseID
                </div-->  
                <th>SID</th>
                 <th >Marks</th>
                 <th>Save</th>

              

                </tr>
             </thead>
                <tbody>
                  <?php while( $row = $result->fetch_assoc()
                              and $cn = $rcname->fetch_assoc()
                              and $rsm = $sm->fetch_assoc()
                  ) : ?>
                   <tr>
                 
                    <td><?php echo $row["CID"]; ?></td>                  
                    <td><?php echo $cn["Cname"]; ?></td>
                    <td> <?php echo $rsm["Task_Type"]; ?> </td>

                    <!--?php if() ?--> 
                    <td> <?php echo $rsm["SID"]; ?> </td>
                    
                    <td contenteditable="true" id="marks">
                      
                        <?php echo $rsm["Marks"]; ?> 
                      
                    </td>
                    
                    <td> 
                      </br><button type="submit" name="submit" 
                      onclick= "changeContent()"> Update</button>

                        <!--/br><button type="submit" value="Save" name="submit" onclick=con()>Update</button-->

                    </td>
   
                   </tr>

                 <?php endwhile ?>
             </tbody>
          </table>
        </form>
      </div>
      <br/>

  <script type="text/javascript">
    
    function changeContent(){

    var x = document.getElementById("marks");
    console.log(x);
    x.innerHTML = "NEW CONTENT";

      /*
      var b = document.querySelector("button"); 

      b.setAttribute("name", "helloButton");
      b.setAttribute("disabled", "");

      

      rn = window.prompt("Input the Row number(0,1,2)", "0");
      cn = window.prompt("Input the Column number(0,1)","0");
      content = window.prompt("Input the Cell content");  

      var x=document.getElementById('myTable').rows[parseInt(rn,10)].cells;
      x[parseInt(cn,10)].innerHTML=content;



      if (confirm("Confirm Save Marks?")) {

                  
                } else 
        
                {
                        
          
                  }

      var element = document.getElementById("id01");
      element.innerHTML = "New Heading";
      
        var x=document.getElementById('myTable').rows
        var y=x[0].cells
        y[5].innerHTML="NEW CONTENT"
      */

      //document.getElementById("myTable").value = ish;

     // document.getElementById('myTable').innerHTML = new HTML


    }
    </script>

   </body>

</html>