<?php 
include_once 'Session.php';
include 'Database.php'; 

Session::init();
$db = new Database;
$tablename = "tbl_student";
if (isset($_REQUEST["action"]) && !empty($_REQUEST["action"])) 
{
	/*
	add student section to process the student date
	 */

	if ($_REQUEST["action"] == "add") 
	{
		
		$studentdata = [
		"name" => $_POST["name"],
		"email" => $_POST["email"],
		"phone" => $_POST["phone"]
		];

		$insertdata = $db->insert($tablename,$studentdata);

		if ($insertdata) {
			$msg = "Success! Data inserted";
			
			

		} else {
			$msg = "Error! No data inserted";
			
		}
			/*
			redirecting to the index page 
			
			 */
			Session::set("msg",$msg);
			$home_url = "../index.php";	
			
			header("Location: ".$home_url);
	



	}

	/*
	update student section to process the student date
	 */
	

	elseif ($_REQUEST["action"] == "edit" && !empty($_REQUEST["action"])) 
	{
		$id = $_POST["id"];
		if (!empty($id)) 
		{
			$studentdata = [
							"name" => $_POST["name"],
							"email" => $_POST["email"],
							"phone" => $_POST["phone"]
							];
			$tablename = "tbl_student";
			$condition = ["id" => $id];
			$updateddata = $db->update($tablename,$studentdata,$condition);

			if ($updateddata) {
				$msg = "Data updated successfuly";
				
			} else {
				$msg = "Error! No data updated";
				
			}

			/*
			redirecting to the index page 
			
			 */
			Session::set("msg",$msg);
			$home_url = "../index.php";	
			
			header("Location: ".$home_url);
							
		} 
	}

	/*
	update student section to process the student date
	 */
	
	elseif ($_REQUEST["action"] == "delete" && !empty($_REQUEST["action"])) {
		$id = $_GET["id"];
		
		if (!empty($id)) 
		{
			$tablename = "tbl_student";
			$condition = ["id" => $id];
			$deletedata = $db->delete($tablename,$condition);

			if ($deletedata) {
				$msg = "Data deleted successfuly";
				
			} else {
				$msg = "Error! No data deleted";
				
			}

			/*
			redirecting to the index page 
			
			 */
			Session::set("msg",$msg);
			$home_url = "../index.php";	
			
			header("Location: ".$home_url);
		} 

		else 
		{
			# code...
		}
		
	}

	
	
}



 ?>