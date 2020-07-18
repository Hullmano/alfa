<?php 

namespace Abcb;

use \Abcb\Sql;

class Client extends Sql
{

	public static function listClients()
	{
		
		$sql = new Sql();

		return $results = $sql->select("SELECT * FROM tb_clients"); 
		
		//return "Adriano";

	}#fim function listClients

	public static function newClient($name, $fantasy, $address, $district, $cpf, $complem, $city, $state, $zipcode, $phone1, $phone2, $email, $limit, $others)
	{

		$sql = new Sql();

		$results = $sql->query("INSERT INTO tb_clients VALUES (default, :NAME, :FANTASY, :ADDRESS, :DISTRICT, :CPF, :COMPLEM, :CITY, :STATE, :ZIPCODE, :PHONE1, :PHONE2, :EMAIL, default, :VLIMIT, :OTHERS)", array(
			":NAME"=>$name,
			":FANTASY"=>$fantasy,
			":ADDRESS"=>$address,
			":DISTRICT"=>$district,
			":CPF"=>$cpf,
			":COMPLEM"=>$complem,
			":CITY"=>$city,
			":STATE"=>$state,
			":ZIPCODE"=>$zipcode,
			":PHONE1"=>$phone1,
			":PHONE2"=>$phone2,
			":EMAIL"=>$email,
			":VLIMIT"=>$limit,
			":OTHERS"=>$others
		));

	}
	
}

 ?>