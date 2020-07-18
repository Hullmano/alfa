<?php 

namespace Abcb;

use \Abcb\Sql;

class Bank_Check extends Sql
{

	public static function listChecks()
	{
		$sql = new Sql();

		return $results = $sql->select('SELECT checkId, checkBank, checkAgency, checkAccount, checkNumChk, checkValue, checkIssuer, checkDays, checkTax, checkIntrst, checkLiquid, checkClient, DATE_FORMAT(checkToday,"%d-%m-%y") AS checkToday, DATE_FORMAT(checkDue,"%d-%m-%y") AS checkDue FROM tb_checks');

	}

	public static function newCheck($bank, $agency, $account, $numchk, $value, $dtToday, $issuer, $dtDue, $days, $tax, $interest, $liquid, $client)
	{
		$sql = new Sql();

		$results = $sql->query("INSERT INTO tb_checks VALUES (default, :BANK, :AGENCY, :ACCOUNT, :NUMCHK, :VALUE, :DTTODAY, :ISSUER, :DTDUE, :DAYS, :TAX, :INTEREST, :LIQUID, :CLIENT)", array(
			":BANK"=>$bank,
			":AGENCY"=>$agency,
			":ACCOUNT"=>$account,
			":NUMCHK"=>$numchk,
			":VALUE"=>$value,
			":DTTODAY"=>$dtToday,
			":ISSUER"=>$issuer,
			":DTDUE"=>$dtDue,
			":DAYS"=>$days,
			":TAX"=>$tax,
			":INTEREST"=>$interest,
			":LIQUID"=>$liquid,
			":CLIENT"=>$client
		));

	}

	public static function deleteCheck($id)
	{
		$sql = new Sql();

		$results = $sql->query("DELETE FROM tb_checks WHERE checkId = :ID", array(
			"ID"=>$id
		));
	}

	public static function listById($id)
	{
		$sql = new Sql();

		//return $results = $sql->select("SELECT * FROM tb_checks WHERE checkId = :ID", array(
		return $results = $sql->select('SELECT checkId, checkBank, checkAgency, checkAccount, checkNumChk, checkValue, checkIssuer, checkDays, checkTax, checkIntrst, checkLiquid, checkClient, DATE_FORMAT(checkToday,"%Y-%m-%d") AS checkToday, DATE_FORMAT(checkDue,"%Y-%m-%d") AS checkDue FROM tb_checks WHERE checkId = :ID', array(		
			"ID"=>$id
		));
	}

	public static function updateCheck($id, $bank, $agency, $account, $numchk, $value, $dtToday, $issuer, $dtDue, $days, $tax, $interest, $liquid, $client)
	{
		$sql = new Sql();

		$results = $sql->query("UPDATE tb_checks SET checkBank = :BANK, checkAgency = :AGENCY, checkAccount = :ACCOUNT, checkNumChk = :NUMCHK, checkValue = :VALUE, checkToday = :DTTODAY, checkIssuer = :ISSUER, checkDue = :DTDUE, checkDays = :DAYS, checkTax = :TAX, checkIntrst = :INTEREST, checkLiquid = :LIQUID, checkClient = :CLIENT WHERE checkId = :ID", array(
			":ID"=>$id,
			":BANK"=>$bank,
			":AGENCY"=>$agency,
			":ACCOUNT"=>$account,
			":NUMCHK"=>$numchk,
			":VALUE"=>$value,
			":DTTODAY"=>$dtToday,
			":ISSUER"=>$issuer,
			":DTDUE"=>$dtDue,
			":DAYS"=>$days,
			":TAX"=>$tax,
			":INTEREST"=>$interest,
			":LIQUID"=>$liquid,
			":CLIENT"=>$client
		)); 
	}


}

?>