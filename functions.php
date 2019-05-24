<?php

class Functions {


	public $host = "localhost";
	public $username = "root";
	public $password = "";
	public $database = "Employee";

	public $db;

	function connect() {
		$this->db = mysqli_connect(
			$this->host,
			$this->username,
			$this->password,
			$this->database
		);

		if (mysqli_connect_errno())
		{
			die( mysqli_connect_error());
		}
	}

	function create($table, $data) {


		$sql1 = "INSERT INTO `$table` (";
		$sql2 = " VALUES (";

		for($d=0; $d<count($data); $d++) {
			if($d != count($data)-1) {
				$sql1 .= $data[$d][0] . ", ";
				$sql2 .= "'".$data[$d][1] . "', ";
			} else {
				$sql1 .= $data[$d][0] . ")";
				$sql2 .= "'".$data[$d][1]."'". ")";
			}
		}

		$sql = $sql1 . $sql2;

		if ($this->db->query($sql) === TRUE) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}


	}

	function update($table, $where, $data) {


		$sql = "UPDATE `$table` SET ";

		for($d=0; $d<count($data); $d++) {
			//die($data[0][0]);
			if($d != count($data) -1) {
				$sql .= $data[$d][0]."='".$data[$d][1]."', ";
			} else {

				$sql .= $data[$d][0]."='".$data[$d][1]."'";
			}
		}

		$sql .= " WHERE ";

		for($d=0; $d<count($where); $d++) {
			if($d != count($where) -1) {
				$sql .= $where[$d][0]."=".$where[$d][1]." and ";
			} else {
				$sql .= $where[$d][0]."=".$where[$d][1];
			}
		}

		//echo($sql."\n");
		if ($this->db->query($sql) === TRUE) {
			echo "Record updated successfully";
		} else {
			echo "Error updating record: " . $this->db->error;
		}
	}

	function read_all($table) {

		$sql = "SELECT * FROM `$table`";
		$result = $this->db->query($sql);

		if ($result->num_rows > 0) {
			return $result->fetch_all(MYSQLI_ASSOC);
		} else {
			return false;
		}
	}



	function read($table, $where, $value) {

		$sql = "SELECT * FROM `$table` where $where=$value";
		$result = $this->db->query($sql);

		if ($result->num_rows > 0) {
			return $result->fetch_all(MYSQLI_ASSOC);
		} else {
			return false;
		}
	}

	function delete($table, $where, $value) {
		$sql = "DELETE FROM `$table` WHERE $where=$value";

		if ($this->db->query($sql) === TRUE) {
			echo "Record deleted successfully";
		} else {
			echo "Error deleting record: " . $this->db->error;
		}
	}

	function close() {
		$db->close();
	}



}



?>