<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Assignment 1</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body class="mx-5 px-5 py-2">
<center>
  <h2>Metacube Software Ltd.<h2>
  <h2><i>Employee Registration form</i></h2>
</center>

<form action="get_data.php" method="post" class="mx-5 px-5" enctype="multipart/form-data" id="form">
  <div class="mb-3">
    <label for="inputName" class="form-label">Employee Name</label>
    <input type="text" class="form-control" id="inputName" name="name" placeholder="Enter Employee Full Name">
  </div>
  <div class="mb-3">
    <label for="inputEmail" class="form-label">Email address</label>
    <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Enter Employee Email ID">
  </div>
  <div class="mb-3">
    <label for="inputContact" class="form-label">Contact</label>
    <input type="text" class="form-control" id="inputContact" name="contact" placeholder="Enter Employee Contact No.">
  </div>
  <div class="mb-3">
    <label for="selectDepartment" class="form-label">Select Department</label>
    <select class="form-control" id="selectDepartment" name="department">
      <option >--Select--</option>
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
  </div>
  <input type="submit" class="btn btn-primary" value="submit" />
</form>

<form action="show_data.php" class="m-5 px-5">
  <button type="submit" class="btn btn-primary">Show all Registered</button>
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
          rangelength: [10, 10],
          number: true
        }
      },
      messages: {
        name: 'Please enter Name.',
        email: {
          required: 'Please enter Email Address.',
          email: 'Please enter a valid Email Address. apana wala',
        },
        contact: {
          required: 'Please enter Contact.',
          rangelength: 'Contact should be 10 digit number.'
        }
      },
      submitHandler: function (form) {
        form.submit();
      }
    });
  });
</script>
</html>
