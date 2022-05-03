<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body class="mx-5 my-3">
    <center>
        <h3><i>All Employees of Metacube Software Ltd.</i></h3>
    </center>
<?php 
    $connection = mysqli_connect('localhost', 'root');
    mysqli_select_db($connection, 'company');

    $query = mysqli_query($connection, "SELECT * FROM employee");

    $row_no = 0;            // This variable is used to set background color of a row.

    echo "<table class=\"mx-3 px-3 py-2 my-4 \">";
    echo "  <tr>
              <td class=\"px-4\"><b>S.No.</b></td>
              <td class=\"px-4\"><b>E_ID</b></td>
              <td class=\"px-4\"><b>Name</b></td>
              <td class=\"px-4\"><b>Email</b></td>
              <td class=\"px-4\"><b>Contact</b></td>
              <td class=\"px-4\"><b>Department</b></td>
              <td class=\"px-4\"><b>Delete</b></td>
              <td class=\"px-4\"><b>Change</b></td>
            </tr>   ";

    while($emp = mysqli_fetch_assoc($query))
    {
        $row_no++;

        switch($row_no % 4)
        {
            case 1 : echo "<tr class=\"bg-primary\">"; break;
            case 2 : echo "<tr class=\"bg-light\">"; break;
            case 3 : echo "<tr class=\"bg-success\">"; break;
            case 0 : echo "<tr class=\"bg-danger\">"; break;
        }
        
        echo "  <td class=\"px-4\">
                  {$row_no}
                </td>";
        echo "  <td class=\"px-4\">
                  {$emp['e_id']}
                </td>";
        echo "  <td class=\"px-4\">
                    {$emp['name']}
                </td>";
        echo "  <td class=\"px-4\">
                    {$emp['email']}
                </td>";
        echo "  <td class=\"px-4\">
                    {$emp['contact_no']}
                </td>";
        echo "  <td class=\"px-4\">
                {$emp['department']}
                </td>";
        echo "  <td class=\"px-4\">
                    <a href= \"remove.php/?param={$emp['e_id']}\" class=\"text-dark\">Remove</a>
                </td>";
        echo "  <td class=\"px-4\">
                <a href= \"edit.php/?param={$emp['e_id']}\" class=\"text-dark\">Edit</a>
                </td>";
        echo "</tr>";
    }

    echo "</table>";

    echo "<a href=\"index.php\">Goto Home</a>";


?>
</body>
</html>

