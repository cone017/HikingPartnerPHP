<?php
require_once '../config/db.php';

class korisnikDAO {
	private $db;

	// za 2. nacin resenja
	private $LOGIN = "SELECT * FROM korisnik WHERE mejlAdresa = ? AND sifra = ?";

	public function __construct()
	{
		$this->db = DB::createInstance();
	}

	public function proveraKorisnik($mejlAdresa, $sifra)
	{
		$statement = $this -> db -> prepare($this -> LOGIN);

		$statement -> bindValue(1, $mejlAdresa);
		$statement -> bindValue(2, $sifra);

		$statement -> execute();

		if($statement -> rowCount() > 0)
			return true;

		else
			return false;
		
	}
}
?>
