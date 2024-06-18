<?php
require_once '../config/db.php';

class aktivnostDAO {
    
	private $db;

	private $GETALL = "SELECT * FROM aktivnosti";
	private $INSERT = "INSERT INTO aktivnosti (nazivAktivnosti, datumPocetka, trajanje, opis, lokacija, tipAktivnostiId, korisnikId) VALUES (?, ?, ?, ?, ?, ?, ?)";

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

	public function insertAktivnost($nazivAktivnosti, $datumPocetka, $trajanje, $opis, $lokacija, $tipAktivnosti, $korisnikId){

		$statement = $this -> db -> prepare($this -> INSERT);

		$statement -> bindValue(1, $nazivAktivnosti);
		$statement -> bindValue(2, $datumPocetka);
		$statement -> bindValue(3, $trajanje);
		$statement -> bindValue(4, $opis);
		$statement -> bindValue(5, $lokacija);
		$statement -> bindValue(6, $tipAktivnosti);
		$statement -> bindValue(7, $korisnikId);

		$statement -> execute();

		if($statement -> rowCount() > 0)
			return true;
		
		else
			return false;
	}
}
?>
