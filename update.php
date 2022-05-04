<?php 

    class Update_Data
    {
        private $connection;
        private $name;
        private $email;
        private $contact;
        private $department;
        private $e_id;

        public function __construct($host, $user, $pass, $database, $e_id)
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

            // Setting the employee id
            $this->e_id = $e_id;
        }

        public function read_data()
         {  
            $this->name = $_POST['name'];
            $this->email = $_POST['email'];
            $this->contact = $_POST['contact'];
            $this->department = $_POST['department'];
    

        }

        public function update()
        {
                $query = "UPDATE `employee` SET `name` = '".$this->name."', `email` = '".$this->email."', `contact_no` = '".$this->contact."', `department` = '".$this->department."' WHERE `employee`.`e_id` = '".$this->e_id."'";
            
                mysqli_query($this->connection, $query);

                header('location:show_data.php');
        }
    }

    
    $my_form = new Update_Data("localhost", "root", "", "company", $_GET['e_id']);

    $my_form->read_data();
    $my_form->update();

?>
