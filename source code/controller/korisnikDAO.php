<?php
require_once '../config/db.php';

class korisnikDAO {

	private $db;

	private $LOGIN = "SELECT * FROM korisnik WHERE mejlAdresa = ? AND sifra = ?";
	private $INSERT = "INSERT INTO korisnik (imePrezime, mejlAdresa, sifra, telefon, pol, interesovanje) VALUES (?, ?, ?, ?, ?, ?)";
	private $KORISNIKPOSTOJI = "SELECT * FROM korisnik WHERE mejlAdresa = ?";
	private $GETALL = "SELECT * FROM korisnik";
	private $GETKORISNIKBYID = "SELECT * FROM korisnik WHERE korisnikId = ?";
	private $DELETEKORISNIKBYID = "DELETE FROM korisnik WHERE korisnikId = ?";
	private $GETKORISNIKIDBYEMAIL = "SELECT korisnikId FROM korisnik WHERE mejlAdresa = ?";
	private $UPDATE = "UPDATE korisnik SET imePrezime = ?, mejlAdresa = ?, sifra = ?, telefon = ?, pol = ?, interesovanje = ? WHERE korisnikId = ?";

	private $UPDATE_PASSWORD_INTERESOVANJE = "UPDATE korisnik SET sifra = ?, interesovanje = ? WHERE korisnikId = ?";

	// Ovaj upit sluzi da sacuvamo za ulogovanog korisnika koja je njegova omiljena aktivnost
	private $GETALL_INTERESOVANJE_ZA_KORISNIKA = "SELECT interesovanje FROM korisnik WHERE korisnikId=?";

	// Ovaj upit da nam ispise sve one aktivnosti koje su korisniku omiljene
	private $GETALL_NAZIV_INTERESOVANJA = "SELECT * FROM aktivnosti WHERE tipAktivnostiId = ?";

	public function __construct()
	{
		$this->db = DB::createInstance();
	}

	// Ova funkcija sluzi da nam ispise sve one aktivnosti koje su korisniku omiljene
	
	public function getAllTipAktivnosti($tipAktivnostiId)

{

$statement = $this -> db -> prepare($this -> GETALL_NAZIV_INTERESOVANJA);

  

$statement -> bindValue(1, $tipAktivnostiId);

  

$statement -> execute();

  

if($statement -> rowCount() > 0)

return $statement -> fetchAll();

else

 return false;

 }

	// Ovaj funkcija sluzi da sacuvamo za ulogovanog korisnika koja je njegova omiljena aktivnost
	public function getIntresovanjeZaKorisnika($korisnikId) {
		$statement = $this->db->prepare($this->GETALL_INTERESOVANJE_ZA_KORISNIKA);
		$statement -> bindValue(1, $korisnikId);
		$statement->execute();
		if ($statement->rowCount() > 0)
        return $statement->fetchColumn();
    else
        return false;
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

	public function postojiKorisnik($mejlAdresa)
	{
		$statement = $this -> db -> prepare($this -> KORISNIKPOSTOJI);

		$statement -> bindValue(1, $mejlAdresa);

		$statement -> execute();

		if($statement -> rowCount() > 0)
			return true;

		else
			return false;
	}
	public function registracijaKorisnik($imePrezime, $mejlAdresa, $sifra, $telefon, $pol, $interesovanje) {
		$statement = $this->db->prepare($this->INSERT);
	
		$statement->bindValue(1, $imePrezime);
		$statement->bindValue(2, $mejlAdresa);
		$statement->bindValue(3, $sifra);
		$statement->bindValue(4, $telefon);
		$statement->bindValue(5, $pol);
		$statement->bindValue(6, $interesovanje);
	
		$statement->execute();
	
		return $statement->rowCount() > 0;
	}
	

	public function getKorisnikById($id)
	{
		$statement = $this -> db -> prepare($this -> GETKORISNIKBYID);

		$statement -> bindValue(1, $id);

		$statement -> execute();

		if($statement -> rowCount() > 0)
			return $statement -> fetch();

		else
			return false;
	}

	public function deleteKorisnikById($id)
	{
		$statement = $this -> db -> prepare($this -> DELETEKORISNIKBYID);

		$statement -> bindValue(1, $id);

		$statement -> execute();

		if($statement -> rowCount() > 0)
			return true;
	
		else
			return false;
	}

	public function getKorisnikIdByEmail($mejlAdresa)
	{
		$statement = $this -> db -> prepare($this -> GETKORISNIKIDBYEMAIL);

		$statement -> bindValue(1, $mejlAdresa);

		$statement -> execute();

		if($statement -> rowCount() > 0)
		{
			$row = $statement->fetch();
        	return $row["korisnikId"];
		}

		else
			return false;
	}

	// public function updateKorisnik($imePrezime, $mejlAdresa, $sifra, $telefon, $pol, $interesovanje, $id)
	// {
	// 	$statement = $this -> db -> prepare($this -> UPDATE);

	// 	$statement -> bindValue(1, $imePrezime);
	// 	$statement -> bindValue(2, $mejlAdresa);
	// 	$statement -> bindValue(3, $sifra);
	// 	$statement -> bindValue(4, $telefon);
	// 	$statement -> bindValue(5, $pol);
	// 	$statement -> bindValue(6, $interesovanje);
	// 	$statement -> bindValue(7, $id);

	// 	$statement -> execute();

	// 	if($statement -> rowCount() > 0)
	// 		return true;
	
	// 	else
	// 		return false;
	// }
	public function updateKorisnik($sifra, $interesovanje, $id) {
        $statement = $this->db->prepare($this->UPDATE_PASSWORD_INTERESOVANJE);

        $statement->bindValue(1, $sifra);
        $statement->bindValue(2, $interesovanje);
        $statement->bindValue(3, $id);

        $statement->execute();

        if ($statement->rowCount() > 0)
            return true;
        else
            return false;
    }
}
?>