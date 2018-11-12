<?php

class Model {

	protected static $table;
	protected $id;
	protected $fields = [];

    public function __set($field, $value)
	{
		if (array_key_exists($field, $this->fields)) {
			$this->fields[$field] = $value;
		}

		$value;

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

}