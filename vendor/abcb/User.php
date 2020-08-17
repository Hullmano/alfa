<?php 

namespace Abcb;

use \Abcb\Sql;

class User extends Sql
{

	public static function login($login, $password)
	{
		
		$sql = new Sql();

		$results = $sql->select('SELECT * FROM tb_users WHERE userLogin = :LOGIN', array(
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

		if ($password === $data["userPassword"]) 
		{
			//echo "Ok";

			$_SESSION["User"] = $results;

		} else {
			throw new \Exception("Usuário ou Senha Inválido..");
			
		}

	/*	if (password_verify($senha, $data["userPassword"]) === true)
		{
			echo "Ok";
		} else {
			throw new Exception("Senha Inválida.");	
		} */
	}#fim function login

	public static function verifyLogin()
	{

		if(
			!isset($_SESSION["User"]) 
			||
			!$_SESSION["User"]
			||
			!(int)$_SESSION["User"][0] > 0 
		){
			header("Location: /");
			exit;
		}

	}

	public static function logout()
	{
		$_SESSION["User"] = NULL;

	}

	public static function newUser($newUser, $newPsw, $confUser)
	{
		if ($newPsw !== $confUser) {
			throw new \Exception("As Senhas não Conferem!");

		} else {
			//print_r($_POST["newUser"]);

			$sql = new Sql();

			$results = $sql->query("INSERT INTO tb_users VALUES (default, :LOGIN, :PSW, default)", array(
				":LOGIN"=>$newUser,
				":PSW"  =>$newPsw
			));

		}
	}

	public static function listUsers()
	{
		$sql = new Sql();

		return $results = $sql->select("SELECT * FROM tb_clients"); 

	}
	
}

 ?>