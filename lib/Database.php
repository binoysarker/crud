<?php 
/**
* Dtabase connection
*/
class Database 
{
	private $dbhost = "localhost";
	private $dbname = "db_student";
	private $dbuser = "root";
	private $dbpass = "";
	private $pdo;
	function __construct()
	{
		if (!isset($this->pdo)) {
			try {
				$link = new PDO("mysql:host=".$this->dbhost.";dbname=".$this->dbname,$this->dbuser,$this->dbpass);
				$link->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				
				$this->pdo = $link;
				
			} catch (PDOException $e) {
				die("filed to connect".$e->getMessage());
			}
		}
	}

	// read data
	// $sql = $this->pdo->prepare("SELECT * FROM tbl_student WHERE id = :id AND email = :email LIMIT 1");
	// $sql->bindValue("id",$id);
	// $sql->bindValue("email",$email);
	// $sql->execute();
	// $result = $sql->fetch(PDO::FETCH_OBJ);
	public function select($tablename,$data = [])
	{
		$sql = "SELECT ";
		$sql .= array_key_exists("select", $data)?$data["select"]:"*";
		$sql .= " FROM ".$tablename;
		if (array_key_exists("where", $data)) {
			$sql .= " WHERE ";
			$i = 0;
			foreach ($data["where"] as $key => $value) {
				$add = ($i > 0)?" AND " : "";
				$sql .= "$add"."$key=:$key";
				$i++;
			}
		}

		if (array_key_exists("order_by", $data)) {
			$sql .= " ORDER BY ".$data["order_by"];
			
		}
		if (array_key_exists("start", $data) && array_key_exists("limit", $data)) {
			$sql .= " LIMIT ".$data["start"].",".$data["limit"];
			
		}
		elseif (!array_key_exists("start", $data) && array_key_exists("limit", $data)) {
			$sql .= " LIMIT ".$data["limit"];
		}

		// now prepare and execute
		$query = $this->pdo->prepare($sql);

		// bind value
		if (array_key_exists("where", $data)) {
			foreach ($data["where"] as $key => $value) {
				$query->bindValue(":$key","$value");
			}
		}

		// now execute
		$query->execute();

		// now for the return type

		if (array_key_exists("return_type", $data)) {
			switch ($data["return_type"]) {
				case 'count':
					$value = $query->rowCount();
					break;
				case 'single':
					$value = $query->fetch(PDO::FETCH_ASSOC);
					break;	
				
				default:
					$value = "";
					break;
			}
		}
		elseif ($query->rowCount() > 0) {
			$value = $query->fetchAll();
		}

		// finaly return
		return !empty($value)?$value:false;




	}

	// insert method

	/*
	$sql = "INSERT INTO tbl_student(name,email,phone) Values(:name,:email,:phone)";
	$query = $this->pdo->prepare($sql);
	$query->bindValue(":name",$name);
	$query->bindValue(":email",$email);
	$query->bindValue(":phone",$phone);
	$result = $query->execute();
	*/

	public function insert($tablename,$data)
	{
		if (!empty($data) && is_array($data)) {
			$key = "";
			$value = "";
			$key = implode(",", array_keys($data));
			$value = ":".implode(", :", array_keys($data));

			// insert section format
			$sql = "INSERT INTO $tablename ($key) VALUES($value)";
			$query = $this->pdo->prepare($sql);
			foreach ($data as $key => $value) {
				$query->bindValue(":$key",$value);
			}
			$insertdata = $query->execute();

			if ($insertdata) {
				$lastid = $this->pdo->lastInsertId();
				return $lastid;
			} else {
				return false;
			}
			

		}

	}
	// update method
	/*
	$sql = "UPDATE tablename SET name=:name, email=:email WHERE id=:id";
	$query = $this->pdo->prepare($sql);
	$query->bindValue(":name",$name);
	$query->bindValue(":email",$email);
	$query->bindValue(":phone",$phone);
	$query->bindValue(":id",$id);
	$result = $query->execute();
	*/
	public function update($tablename,$data,$condition)
	{
		if (!empty($data) && is_array($data)) 
		{
				$keys = "";
				$wherecond = "";
				$i = 0;
				
				foreach ($data as $key => $value) {
				$add = ($i > 0)?" , " : "";
				$keys .= "$add"."$key=:$key";
				$i++;
			}
			if (!empty($condition) && is_array($condition)) 
			{
				$wherecond = " WHERE ";
				$i = 0;
				foreach ($condition as $key => $value) {
				$add = ($i > 0)?" AND " : "";
				$wherecond .= "$add"."$key=:$key";
				$i++;
				}
			}
			// update section format
			$sql = "UPDATE $tablename SET $keys $wherecond";
			$query = $this->pdo->prepare($sql);
			foreach ($data as $key => $value) {
				$query->bindValue(":$key",$value);
			}
			foreach ($condition as $key => $value) {
				$query->bindValue(":$key",$value);
			}
			$updatadata = $query->execute();

			return $updatadata?$query->rowCount():false; 
		}
		else
		{
			return false;
		}

	}
	
		
	


	// delete method
	/*
	$sql = "DELETE FROM `tbl_student` WHERE `id` = 48;";
	$query = $this->pdo->prepare($sql);
	$query->bindValue(":id",$id);
	$result = $query->execute();
	 */
	public function delete($tablename,$condition)
	{
		if (!empty($condition) && is_array($condition)) 
		{

				$wherecond = " WHERE ";
				$i = 0;
				foreach ($condition as $key => $value) {
				$add = ($i > 0)?" AND " : "";
				$wherecond .= "$add"."$key=:$key";
				$i++;
				}

				// update section format
				$sql = "DELETE FROM $tablename $wherecond";
				$query = $this->pdo->prepare($sql);
				
				foreach ($condition as $key => $value) {
					$query->bindValue(":$key",$value);
				}
				$updatadata = $query->execute();

				return $updatadata?$query->rowCount():false; 

		}
		else
		{
			return false;
		}
	}

}

 



 ?>