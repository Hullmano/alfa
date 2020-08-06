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
	
	public static function updateClient($id, $name, $fantasy, $address, $district, $cpf, $complem, $city, $state, $zipcode, $phone1, $phone2, $email, $limit, $others)
	{
		try {

		$sql = new Sql();
		$results = $sql->query('UPDATE tb_clients SET clientName = :NAME, clientFantasy = :FANTASY, clientAddress = :ADDRESS, clientDistrict = :DISTRICT, clientCpf = :CPF, clientComplem = :COMPLEM, clientCity = :CITY, clientState = :STATE, clientZipecode = :ZIPCODE, clientPhone1 = :PHONE1, clientPhone2 = :PHONE2, clientEmail = :EMAIL, clientLimit = :VLIMIT, clientOthers = :OTHERS WHERE clientId = :ID', array(
			":ID"=>$id,
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

					
		} catch (Exception $e) {
			echo $e->getMessage();
		}
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

	public static function checksReturned($id)
	{
		$sql = new Sql();
		return $results = $sql->select('SELECT SUM(checkValue) as retrnVals FROM tb_checks WHERE clientId = :ID AND checkReturned = :RETRND', array(
			"ID"=>$id,
			"RETRND"=>'1'
		));
	}
}

 ?>