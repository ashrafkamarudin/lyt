<?php

class Model {

    function __construct() {
        $this->db = new Database();
    }

    public function __set($field, $value)
	{
		if (array_key_exists($field, $this->fields)) {
			$this->fields[$field] = $value;
		}

		// array_key_exists(key, array)
	}

	// override magic method to retrieve properties
	public function __get($field)
	{
		if ($field == 'id') {
			return $this->id;
		} else {
			return $this->fields[$field];
		}
	}

	public static function All($value='')
	{
		$db = DB::connect();
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        echo $thisClass = get_called_class();

		$query = "SELECT * FROM users";

		$stmt = $db->prepare($query);
		if ($stmt->execute()) {
			$data=$stmt->fetchAll(PDO::FETCH_ASSOC);

			$Models = [];

			//var_dump($data);

			foreach ($data as $d) {
				$Model = new $thisClass();
				foreach ($d as $field => $value) {
					if (array_key_exists($field, $Model->fields)) {
						$Model->$field = $value;
					}
				}
				array_push($Models, $Model);
			}

			return $Models;
		};
	}

	public static function getById($id)
	{
		$db = DB::connect();
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$query = "SELECT * FROM users WHERE id = :id";

		$stmt = $db->prepare($query);
		$stmt->bindparam(":id", $id);

		if ($stmt->execute()) {
			$data=$stmt->fetch(PDO::FETCH_ASSOC);

			$thisClass = get_called_class();
			$Model = new $thisClass;

			$Model->id = $id;

			var_dump($model);

			foreach ($data as $field => $value) {
				if (array_key_exists($field, $Model->fields)) {
					$Model->$field = $value;
				}
			}

			return $Model;
		};
	}

	public function save($value='')
	{
		$columns = '';
		$values  = array_values($this->fields);

		if (isset($this->id)) {
			foreach ($this->fields as $name => $value) {
		    	$columns .= ' '.$name.' = ?,';
			}
			$columns = substr($columns, 0, -1);
			$query = "UPDATE $this->table SET $columns WHERE id=?";
			array_push($values, $this->id);
		} else {
			$qs      = str_repeat("?,",count($values)-1);
			$columns = implode(", ",array_keys($this->fields));
			$query = "INSERT INTO $this->table ($columns) VALUES(${qs}?)";
		}

		$db = DB::connect();
		
		$stmt = $db->prepare($query);
		$stmt->queryString;
    	if ($stmt->execute($values)) {
    		return $stmt;
    	};
	}

	public function delete()
	{
		$db = DB::connect();

		try {
			$stmt = $db->prepare("DELETE FROM $this->table WHERE id=:id");
			$stmt->bindparam(":id", $this->id);
			
			if ($stmt->execute()) {
				return true;
			}
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}

}