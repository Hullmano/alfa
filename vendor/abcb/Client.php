<?php 

namespace Abcb;

use \Abcb\Sql;

class Client extends Sql
{

	public static function listClients()
	{
		
		$sql = new Sql();
		return $results = $sql->select('SELECT * FROM tb_clients ORDER BY clientName'); 
		
		//return "Adriano";

	}#fim function listClients

	public static function newClient($name, $fantasy, $address, $district, $cpf, $complem, $city, $state, $zipcode, $phone1, $phone2, $email, $limit, $others)
	{

		$sql = new Sql();
		$results = $sql->query('INSERT INTO tb_clients VALUES (default, :NAME, :FANTASY, :ADDRESS, :DISTRICT, :CPF, :COMPLEM, :CITY, :STATE, :ZIPCODE, :PHONE1, :PHONE2, :EMAIL, default, :VLIMIT, :OTHERS)', array(
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

	public static function deleteClient($id)
	{
		$sql = new Sql();
		$results = $sql->query('DELETE FROM tb_clients WHERE clientId = :ID', array(
			"ID"=>$id
		));
	}	

	public static function clientById($id)
	{
		$sql = new Sql();
		return $results = $sql->select('SELECT * FROM tb_clients WHERE clientId = :ID ORDER BY clientName', array(
			"ID"=>$id
		)); 
	}
	
	public static function checksDue($id)
	{
		$sql = new Sql();
		return $results = $sql->select('SELECT SUM(checkValue) AS vals FROM tb_checks WHERE clientId = :ID AND checkDue > current_date()', array(
			"ID"=>$id
		));
	}

	public static function checksTotal($id)
	{
		$sql = new Sql();
		return $results = $sql->select('SELECT SUM(checkValue) AS totVals, SUM(checkIntrst) AS totIntrst, SUM(checkLiquid) AS totLiquid FROM tb_checks WHERE clientId = :ID', array(
			"ID"=>$id
		));
	}
}

 ?>