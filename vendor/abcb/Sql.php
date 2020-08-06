<?php 

namespace Abcb;

class Sql
{
	private $conn;

	public function __construct()
	{
		$errors = array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION);
		$this->conn = new \PDO("mysql:dbname=cheques;hostname=localhost", "root", "Strong...999", $errors);
	}	

	public function query($rowQuery, $parameters = array())
	{
		$stmt = $this->conn->prepare($rowQuery);

		foreach ($parameters as $key => $value) {
			$stmt->bindValue($key, $value);
		}

		$stmt->execute();

		return $stmt;
	}

	public function select($query, $param = array()):array
	{
		$statement = $this->query($query, $param);

		return $statement->fetchAll(\PDO::FETCH_ASSOC);
	}  

}
 ?>