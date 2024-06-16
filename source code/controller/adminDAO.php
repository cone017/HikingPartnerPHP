<?php
require_once '../config/db.php';

class DAO {
	private $db;

	// za 2. nacin resenja
	private $LOGIN = "SELECT * FROM admini WHERE korisnickoIme = ? AND lozinka = ?";

	public function __construct()
	{
		$this->db = DB::createInstance();
	}

	public function proveraAdmin($korisnickoIme, $lozinka)
	{
		$statement = $this -> db -> prepare($this -> LOGIN);

		$statement -> bindValue(1, $korisnickoIme);
		$statement -> bindValue(2, $lozinka);

		$statement -> execute();

		if($statement -> rowCount() > 0)
			return true;

		else
			return false;
		
	}
}
?>
