<?php 

if (!empty($_POST["login"])) ($login = $_POST["login"]);

if (!empty($_POST["senha"]))
{
	$senha = $_POST["senha"];

	/*-----------------------------------------------------------------------------*/
	$conn = new PDO("mysql:dbname=cheques;host=localhost", "root", "Strong...999");

	$stmt = $conn->prepare("SELECT * FROM tb_users WHERE userLogin = :LOGIN");

	$stmt->bindParam(":LOGIN", $login);

	$stmt->execute();

	$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
	/*----------------------------------------------------------------------------*/

	if (count($results) === 0)
	{
		throw new Exception("Usuário ou Senha Inválido.");
	}

	$data = $results[0];                             //recebe a 1º posição do array $results.

	if ($senha === $data["userPassword"]) 
	{
		echo "Ok";
	} else {
		throw new Exception("Usuário ou Senha Inválido..");
		
	}

/*	if (password_verify($senha, $data["userPassword"]) === true)
	{
		echo "Ok";
	} else {
		throw new Exception("Senha Inválida.");	
	} */

}

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Alfa</title>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 </head>
 <body>
 	<form method="post">
	 	<label for="login">Usuário</label>
	 	<input type="text" name="login" id="login"><br>
	 	<label for="senha">Senha ..</label>
	 	<input type="password" name="senha" id="senha">
	 	<input type="submit" name="Ok" value="Ok">
	</form>
 </body>
 </html>