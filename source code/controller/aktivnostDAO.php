<?php
require_once '../config/db.php';

class aktivnostDAO {
    
	private $db;

	private $GETALL = "SELECT * FROM aktivnosti";

	public function __construct()
	{
		$this->db = DB::createInstance();
	}

	public function getAll()
	{
		$statement = $this -> db -> prepare($this -> GETALL);

		$statement -> execute();

		if($statement -> rowCount() > 0)
			return $statement -> fetchAll();

		else
			return false;
	}
}
?>
