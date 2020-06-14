<?php 

namespace Abcb;

use \Abcb\Sql;

class User extends Sql
{

	public static function login($login, $senha)
	{
		
		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_users WHERE userLogin = :LOGIN", array(
			":LOGIN"=>$login
		)); 

		/*-----------------------------------------------------------------------------
		$this->conn = new PDO("mysql:dbname=cheques;host=localhost", "root", "Strong...999");
		$stmt = $conn->prepare("SELECT * FROM tb_users WHERE userLogin = :LOGIN");
		$stmt->bindParam(":LOGIN", $login);
		$stmt->execute();
		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
		/*----------------------------------------------------------------------------*/

		if (count($results) === 0)
		{
			throw new \Exception("Usuário ou Senha Inválido.");
		}

		$data = $results[0];                             //recebe a 1º posição do array $results.

		if ($senha === $data["userPassword"]) 
		{
			echo "Ok";
		} else {
			throw new \Exception("Usuário ou Senha Inválido..");
			
		}

	/*	if (password_verify($senha, $data["userPassword"]) === true)
		{
			echo "Ok";
		} else {
			throw new Exception("Senha Inválida.");	
		} */
	}
	
}

 ?>