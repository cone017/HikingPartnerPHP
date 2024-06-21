<?php
require_once '../config/db.php';

class clanoviAktivnostDAO {
    
	private $db;

	private $INSERT = "INSERT INTO clanoviaktivnosti (korisnikId, aktivnostId, naziv, pridruzeniClan) VALUES (?, ?, ?, ?)";
	private $GETCLANOVIBYAKTIVNOSTID = "SELECT pridruzeniClan FROM clanoviaktivnosti WHERE aktivnostId = ?";
	private $KORISNIKPOSTOJI = "SELECT * FROM clanoviaktivnosti WHERE korisnikId = ? AND aktivnostId = ?";
	private $PRIKLJUCENEAKTIVNOSTI = "SELECT aktivnostId FROM clanoviaktivnosti WHERE korisnikId = ?";

	public function __construct()
	{
		$this->db = DB::createInstance();
	}

	public function insertClanoviAktivnost($korisnikId, $aktivnostId, $naziv, $pridruzeniClan)
	{
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

	public function getClanovi($aktivnostId)
	{
		$statement = $this -> db -> prepare($this -> GETCLANOVIBYAKTIVNOSTID);

		$statement -> bindValue(1, $aktivnostId);

		$statement -> execute();

		if($statement -> rowCount() > 0)
			return $statement -> fetchAll();
	
		else
			return false;
	}

	public function korisnikPostoji($korisnikId, $aktivnostId)
	{
		$statement = $this -> db -> prepare($this -> KORISNIKPOSTOJI);

		$statement -> bindValue(1, $korisnikId);
		$statement -> bindValue(2, $aktivnostId);

		$statement -> execute();

		if($statement -> rowCount() > 0)
			return true;

		else
			return false;
	}

	public function prikljuceneAktivnosti($korisnikId)
	{
		$statement = $this -> db -> prepare($this -> PRIKLJUCENEAKTIVNOSTI);

		$statement -> bindValue(1, $korisnikId);	

		$statement -> execute();

		if($statement -> rowCount() > 0)
			return $statement -> fetchAll();

		else
			return false;
	}
}
?>
