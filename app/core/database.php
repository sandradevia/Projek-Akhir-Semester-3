<?php

class Database{
	private $host = 'localhost';
	private $user = 'root';
	private $pass = '';
	private $dbnm = 'kantin4';

	private $dbh;
	private $stmt;
	private $error;

	public function __construct()
	{
		//set DSN
		$dsn = 'mysql:host='. $this->host .';dbname='. $this->dbnm;
		
		//set option
		$option = [
			PDO::ATTR_PERSISTENT => true,
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		];
		
		//Buat instan PDO baru
		try{
			$this->dbh = new PDO($dsn,$this->user,$this->pass, $option);
		}catch(PDOException $e){
			$this->error = $e->getMessage();
			echo'KONEKSI GAGAL!' . $this->error;
		}
	}

	//Siapkan statment dengan query
	public function query($query)
	{
		$this->stmt = $this->dbh->prepare($query);
	}

	//bind values
	public function bind($param, $value, $type = null){
		if(is_null($type)){
			switch (true) {
				case is_int($value):
					$type = PDO::PARAM_INT;
					break;
				case is_bool($value):
					$type = PDO::PARAM_BOOL;
					break;
				case is_null($value):
					$type = PDO::PARAM_NULL;
					break;
				default:
					$type = PDO::PARAM_STR;
			}
		}

		$this->stmt->bindValue($param, $value, $type);
	}

	//Eksekusi statment
	public function execute()
	{
		$this->stmt->execute();
	}

	//Get result sebafai asosiasi array
	public function resultSet()
	{
		$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	//GET single record sebagai asosiasi array
	public function single()
	{
		$this->execute();
		return $this->stmt->fetch(PDO::FETCH_ASSOC);
	}

	//Get row count
	public function rowCount()
	{
		return $this->stmt->rowCount();
	}
}

