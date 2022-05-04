<?php 

    class Get_Data
    {
        private $connection;
        private $name;
        private $email;
        private $contact;
        private $department;

        public function __construct($host, $user, $pass, $database)
        {
            // Setting up the connection with database
            $this->connection = mysqli_connect($host, $user, $pass);

            // Checking wheather the connection is set or not
            if($this->connection)
            {
                echo "connected sucessfully";
            }
            else
            {
                echo "not connected";
            }

            // Select the perticular database
            mysqli_select_db($this->connection, $database);
        }

        public function read_data()
        {  
            $this->name = $_POST['name'];
            $this->email = $_POST['email'];
            $this->contact = $_POST['contact'];
            $this->department = $_POST['department'];
        }

        public function insert_values()
        {
            // Checking and counting no. of rows if same email is already present
            $check = mysqli_query($this->connection, "select * from employee where email='".$this->email."' ");             // checking previous versions of same email
            $count = mysqli_num_rows($check); 

            if($count == 0)
            {
                $query = "INSERT INTO employee (name, email, contact_no, department) VALUES ('$this->name', '$this->email', '$this->contact', '$this->department')";
            
                mysqli_query($this->connection, $query);

                header('location:index.php');
            }
            else
            {
               echo "<br>The email is already present.<br>" ;
               echo "<a href=\"index.php\">Goto Home</a>";
            }
        }
    }
    
    $my_form = new Get_Data("localhost", "root", "", "company");

    $my_form->read_data();
    $my_form->insert_values();
    
?>
