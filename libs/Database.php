<?php

/**
* Class Database
* handle database connection and simple CRUD operation
*/
class DB
{
	private $e;

    public static function connect($value='')
	{
		$pdo = new PDO(DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
	}

	/**
	* update() function [CUSTOM]
	* for custom query [e.g JOIN]
	* @param string $sql
	* @param string $args
	*/
	public static function Query($sql, $args = NULL)
    {
        if (!$args)
        {
            return DB::connect()->query($sql);
        }
        $stmt = DB::connect()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }

    public function lastInsertId(){
        return $this->pdo->lastInsertId();
    }
}