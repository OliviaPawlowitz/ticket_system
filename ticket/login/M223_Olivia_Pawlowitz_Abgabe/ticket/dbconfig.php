<?php

class Database
{
public $con;
public function __construct(){
$this->con = mysqli_connect("localhost","root","","ticket_system");
if (!$this->con) { // if connection fails the system returns an error
echo "Error in Connecting ".mysqli_connect_error();
}
}
}

?>
