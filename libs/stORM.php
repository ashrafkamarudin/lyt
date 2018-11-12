<?php

/**
* 
*/
trait stORM
{
	/**
	* Static method All()
	* this method will retrieve all data in database 
	* and will return the data as array of user object
	*/
	public static function All($value='')
	{
        $table = Self::$table;
        $thisClass = get_called_class();
		$query = "SELECT * FROM $table";

		try {
	    	if ($stmt = DB::run($query)) {
				$data=$stmt->fetchAll(PDO::FETCH_ASSOC);

				$Models = [];

				foreach ($data as $d) {
					$Model = new $thisClass();
					foreach ($d as $field => $value) {
						if ($field == 'id') {
							$Model->id = $value;
						}
						if (array_key_exists($field, $Model->fields)) {
							$Model->$field = $value;
						}
					}
					array_push($Models, $Model);
				}

				return $Models;
			};
		} catch (PDOException $e) {
			return $e->getMessage();
		}
	}

	/**
	* Static method getById()
	* this method will retrieve 1 row of data from database
	* based on the id passed to the method
	* @param int id
	*/
	public static function getById($id)
	{
        $table = Self::$table;
		$query = "SELECT * FROM $table WHERE id = :id";
		$param = [':id' => $id];

		try {
	    	if ($stmt = DB::Run($query, $param)) {

				$thisClass = get_called_class();
				$Model = new $thisClass;

				$Model->id = $id;

				foreach ($stmt->fetch(PDO::FETCH_ASSOC) as $field => $value) {
					if (array_key_exists($field, $Model->fields)) {
						$Model->$field = $value;
					}
				}

				return $Model;
			};
		} catch (PDOException $e) {
			return $e->getMessage();
		}
	}

	/**
	* Method save()
	* this method will retrieve save or update data on database
	* bdepends on the id.
	* if there is id, then the data will be update instead of create
	* @param int id
	*/
	public function save($value='')
	{
        $table = Self::$table;
		$columns = '';
		$values  = array_values($this->fields);

		if (isset($this->id)) { // if isset id then update
			foreach ($this->fields as $name => $value) {
		    	$columns .= ' '.$name.' = ?,';
			}
			$columns = substr($columns, 0, -1);
			$query = "UPDATE $this->table SET $columns WHERE id=?";
			array_push($values, $this->id);
		} else { // else create new
			$qs      = str_repeat("?,",count($values)-1);
			$columns = implode(", ",array_keys($this->fields));
			$query = "INSERT INTO $table ($columns) VALUES(${qs}?)";
		}
		
		try {
	    	if ($stmt = DB::Run($query, $values)) {
	    		return $stmt;
	    	};
		} catch (PDOException $e) {
			return $e->getMessage();
		}
	}

	/**
	* Method delete()
	* this method will delete 1 row of data on database
	* based on the id passed to the method
	* @param int id
	*/
	public function delete()
	{
        $table = Self::$table;
		$query = "DELETE FROM $table WHERE id=:id";
		$param = [':id' => $this->id];

		try {
			if ($stmt = DB::Run($query, $param)) {
				return true;
			}
		} catch (PDOException $e) {
			return $e->getMessage();
		}
	}

	public function has($path)
	{
		$strings = explode("/", $path);

		$self = Self::All();
		$data = $strings[1]::all();

		echo "<pre>";

		$grouped = [];
		foreach ($data as $lisst) {
			$grouped[$lisst->user_id][] = $lisst;
		}

		foreach ($self as $user) {
			$user->list = $grouped[$user->id];
		}
		return $self;
	}


	public function where()
	{
		
	}

	public function test($value='')
	{
		return Self;
	}
}