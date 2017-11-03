<?php

class Database
{
public $con;
public function __construct(){
$this->con = mysqli_connect("localhost","root","","ticket_system");
if (!$this->con) {
echo "Error in Connecting ".mysqli_connect_error();
}
}
}

?>
