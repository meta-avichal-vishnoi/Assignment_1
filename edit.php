<!DOCTYPE html>
<html>
 
<head>
  <title>Assignment 1</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
</head>
 
<body class="mx-5 px-5 py-2">
    <center>
      <h2>Metacube Software Ltd.<h2>
      <h2><i>Employee Registration form</i></h2>
    </center>
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

                
                }
                
        }
    
        echo "<form action=\"http://localhost/Spryker/Assignments/Assignment%201/update.php?e_id={$GLOBALS['e_id']}\" method=\"post\" class=\"mx-5 px-5\" id=\"form\">";
    ?>

<div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" name="name" id="name" value="<?php echo $GLOBALS['name']?>" placeholder="Enter Employee Full Name">
        </div>
        <div class="form-group">
          <label for="email">Email Address</label>
          <input type="text" class="form-control" name="email" id="email" value=<?php echo $GLOBALS['email']?> placeholder="Enter Employee Email ID">
        </div>
        <div class="form-group">
          <label for="contact">Contact</label>
          <input type="text" class="form-control" name="contact" id="contact" value=<?php echo $GLOBALS['contact']?> placeholder="Enter Employee Contact No.">
        </div>
        <div class="mb-3">
    <label for="selectDepartment" class="form-label">Select Department</label>
    <select class="form-control" id="selectDepartment" name="department" value=<?php echo $GLOBALS['department']?>>
      <option value="0">--Select--</option>
      <?php           // This section is to retrive department names from department table in company database
        $connection = mysqli_connect("localhost", "root", "");                      // connecting to the database management system
        mysqli_select_db($connection, "company");                                   // selecting the database
        $query = mysqli_query($connection, "SELECT * FROM department");        // Executing the querry

        while($dept = mysqli_fetch_assoc($query))
        {
          $d_name = $dept['d_name'];
          $d_id = $dept['d_id'];
          echo $d_id;
          echo "<option value=\"$d_id\">{$d_name}</option>";
        }

      ?>
      
    </select>
        <input type="submit" class="btn btn-primary" value="Submit" />
      </form>

      </body>
<style>
  .error {
    color: red;
  }
</style>
<script>
  $(document).ready(function () {
    $('#form').validate({
      rules: {
        name: {
          required: true
        },
        email: {
          required: true,
          email: true
        },
        contact: {
          required: true,
          rangelength: [10, 12],
          number: true
        },
        department: {
          required: true,
          min: 1,
          number: true
        }
      },
      messages: {
        name: 'Please enter Name.',
        email: {
          required: 'Please enter Email Address.',
          email: 'Please enter a valid Email Address.',
        },
        contact: {
          required: 'Please enter Contact.',
          rangelength: 'Contact should be 10 digit number.'
        },
        department: {
          required: 'Please select a department',
          min: 'Please select department',
          number: 'please select the department'
        }
      },
      submitHandler: function (form) {
        form.submit();
      }
    });
  });
</script>
 
</html>