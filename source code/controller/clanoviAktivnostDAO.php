<?php
require_once '../config/db.php';

class clanoviAktivnostDAO {
    
	private $db;

	private $INSERT = "INSERT INTO clanoviaktivnosti (korisnikId, aktivnostId, naziv, pridruzeniClan) VALUES (?, ?, ?, ?)";

	public function __construct()
	{
		$this->db = DB::createInstance();
	}

	public function insertClanoviAktivnost($korisnikId, $aktivnostId, $naziv, $pridruzeniClan){

		$statement = $this -> db -> prepare($this -> INSERT);

		$statement -> bindValue(1, $korisnikId);
		$statement -> bindValue(2, $aktivnostId);
		$statement -> bindValue(3, $naziv);
		$statement -> bindValue(4, $pridruzeniClan);

		$statement -> execute();

		if($statement -> rowCount() > 0)
			return true;
		
		else
			return false;
	}
}
?>
