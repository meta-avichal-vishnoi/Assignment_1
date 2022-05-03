    <?php
         $connection = mysqli_connect('localhost', 'root');
         mysqli_select_db($connection, 'company');
        if (isset($_GET['param'])) 
        {
            $id = $_GET['param'];
            $update = true;
            $record = mysqli_query($connection, "SELECT * FROM employee WHERE e_id=$id");

            
                
                while($n = mysqli_fetch_array($record))
                {
                $GLOBALS['name'] = $n['name'];
                $GLOBALS['email'] = $n['email'];
                $GLOBALS['contact'] = $n['contact_no'];
                $GLOBALS['department'] = $n['department'];
                $GLOBALS['e_id'] = $n['e_id'];

                echo $GLOBALS['name'];
                }
                
        }
    ?>
    <form action="update.php" method="post" class="mx-5 px-5" enctype="multipart/form-data">
    <div class="mb-3">
      <label for="inputName" class="form-label">Employee Name</label>
      <input type="text" class="form-control" id="inputName" name="name" value=<?php echo $GLOBALS['name']?> placeholder="Enter Employee Full Name">
    </div>
    <div class="mb-3">
      <label for="inputEmail" class="form-label">Email address</label>
      <input type="email" class="form-control" id="inputEmail" name="email" value=<?php echo $GLOBALS['email']?> placeholder="Enter Employee Email ID">
    </div>
    <div class="mb-3">
      <label for="inputContact" class="form-label">Contact</label>
      <input type="text" class="form-control" id="inputContact" name="contact" value=<?php echo $GLOBALS['contact']?> placeholder="Enter Employee Contact No.">
    </div>
    <div class="mb-3">
      <label for="selectDepartment" class="form-label">Select Department</label>
      <select class="form-control" id="selectDepartment" name="department" value=<?php echo $GLOBALS['department']?>">
        <option >--Select--</option>
        <?php           // This section is to retrive department names from department table in company database
          $connection = mysqli_connect("localhost", "root", "");                      // connecting to the database management system
          mysqli_select_db($connection, "company");                                   // selecting the database
          $query = mysqli_query($connection, "SELECT d_name FROM department");        // Executing the querry
  
          while($dept = mysqli_fetch_assoc($query))
          {
            $d_name = $dept['d_name'];
            echo "<option value=\"$d_name\">{$d_name}</option>";
          }
  
        ?>
        
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
  </form>