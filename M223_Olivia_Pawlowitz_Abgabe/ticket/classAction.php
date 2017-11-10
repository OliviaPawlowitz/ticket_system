<?php

include "dbconfig.php";

class Data extends Database
	{
		public function insert_record($table,$fields){ // where I want to insert my content 
		$sql = "";
		$sql .= "INSERT INTO ".$table; // here I will receive my input variables
		$sql .= " (".implode(",", array_keys($fields)).") VALUES ";
		$sql .= "('".implode("','", array_values($fields))."')";
		$query = mysqli_query($this->con,$sql);

		if($query){
			return true;
		
	}

}
		public function fetch_record($table){
		$sql = "SELECT * FROM ".$table; 
		$array = array();
		$query = mysqli_query($this->con,$sql);

		while($row = mysqli_fetch_assoc($query)){

		$array[] = $row;

		}

			return $array;

		}

		public function select_record($table,$where){
		$sql = "";
		$condition = "";

		foreach ($where as $key => $value) {


		$condition .= $key . "='" . $value . "' AND ";

		}
		//AND chars must be removed with substract 
		$condition = substr($condition, 0, -5);
		$sql .= "SELECT * FROM ".$table." WHERE ".$condition;
		$query = mysqli_query($this->con,$sql);
		$row = mysqli_fetch_array($query);
		
		return $row;

	}

	
	
		public function update_record($table,$where,$fields){
		$sql = "";
		$condition = "";

		foreach ($where as $key => $value) {


		$condition .= $key . "='" . $value . "' AND ";

	}

	//AND chars must be removed with substract 
	$condition = substr($condition, 0, -5);
	foreach ($fields as $key => $value) {

			$sql .= $key . "='".$value."', ";
	}

	
	
	
	$sql = substr($sql, 0,-2);
	$sql = "UPDATE ".$table." SET ".$sql." WHERE ".$condition;

	
	if(mysqli_query($this->con,$sql)){
	return true;
}
}
		public function delete_record($table,$where){
		$sql = "";
		$condition = ""; 

		foreach ($where as $key => $value) {

		$condition .= $key . "='" . $value . "' AND ";
}
		//AND chars must be removed with substract 
		$condition = substr($condition, 0, -5);
		$sql = "DELETE FROM ".$table." WHERE ".$condition;

		if(mysqli_query($this->con,$sql)){
			return true;

			}

		}
}


	$obj = new Data;


	//The button save is pressed and the form can be saved the data will be insert in the current fields
	if(isset($_POST["submit"])){

	$myArray = array(
	"t_name" => $_POST["name"],
	"category" => $_POST["category"],
	"departement" => $_POST["departement"],
	"priority" => $_POST["priority"],
	"description" => $_POST["description"]
);
	//call the function insert_record
	if($obj->insert_record("tickets",$myArray)){
	header("location:index.php?msg=Record Inserted");
	//message: Record inserted

	}

}
		//The button edit is pressed and the form can be edited
		if(isset($_POST["edit"])){
		$id = $_POST["id"];
		$where = array("id"=>$id);
		$myArray = array(
		"t_name" => $_POST["name"],
		"category" => $_POST["category"],
		"departement" => $_POST["departement"],
		"priority" => $_POST["priority"],
		"description" => $_POST["description"]

		);
	//call the function update_record
	if($obj->update_record("tickets",$where,$myArray)){
		header("location:index.php?msg=Record Updated Successfully");
		//message: Update Successfully

			}

}

	//The button delete is pressed and the id will be deleted
	if(isset($_GET["delete"])){
	$id = $_GET["id"] ?? null;
	$where = array("id"=>$id);
	//call the function delete_record
	if($obj->delete_record("tickets",$where)){
		header("location:index.php?msg=Record Deleted Successfully");
		//message: Deleted Successfully
}


}
?>
