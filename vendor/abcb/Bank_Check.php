<?php 

namespace Abcb;

use \Abcb\Sql;

class Bank_Check extends Sql
{

	public static function listChecks()
	{
		$sessionId = $_SESSION['User'][0]['userId'];
		//print_r($varId);

		$sql = new Sql();

		return $results = $sql->select('SELECT ch.checkId, ch.checkBank, ch.checkAgency, ch.checkAccount, ch.checkNumChk, ch.checkValue, ch.checkIssuer, ch.checkDays, ch.checkTax, ch.checkIntrst, ch.checkLiquid, ch.checkReturned, ch.clientId, DATE_FORMAT(ch.checkToday,"%d-%m-%y") AS checkToday, DATE_FORMAT(ch.checkDue,"%d-%m-%y") AS checkDue, cl.clientName AS clientName FROM tb_checks AS ch INNER JOIN tb_clients AS cl USING(clientId) WHERE ch.chkSessionId = :SESSIONID ORDER BY ch.checkDue', array(
			"SESSIONID"=>$sessionId
		));		
	}

	public static function listChecks()
	{
		$sessionId = $_SESSION['User'][0]['userId'];
		//print_r($varId);

		$sql = new Sql();

		return $results = $sql->select('SELECT ch.checkId, ch.checkBank, ch.checkAgency, ch.checkAccount, ch.checkNumChk, ch.checkValue, ch.checkIssuer, ch.checkDays, ch.checkTax, ch.checkIntrst, ch.checkLiquid, ch.checkReturned, ch.clientId, DATE_FORMAT(ch.checkToday,"%d-%m-%y") AS checkToday, DATE_FORMAT(ch.checkDue,"%d-%m-%y") AS checkDue, cl.clientName AS clientName FROM tb_checks AS ch INNER JOIN tb_clients AS cl USING(clientId) WHERE ch.chkSessionId = :SESSIONID ORDER BY ch.checkDue', array(
			"SESSIONID"=>$sessionId
		));		
	}


	public static function newCheck($bank, $agency, $account, $numchk, $value, $dtToday, $issuer, $dtDue, $days, $tax, $interest, $liquid, $idClient)
	{
		
		try {
			
		$sessionId = $_SESSION['User'][0]['userId'];			

		$sql = new Sql();

		$results = $sql->query('INSERT INTO tb_checks VALUES (default, :BANK, :AGENCY, :ACCOUNT, :NUMCHK, :VALUE, :DTTODAY, :ISSUER, :DTDUE, :DAYS, :TAX, :INTEREST, :LIQUID, :IDCLIENT, default, :SESSIONID)', array(
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
			":IDCLIENT"=>$idClient,
			":SESSIONID"=>$sessionId
		));

		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public static function deleteCheck($id)
	{
		$sql = new Sql();

		$results = $sql->query('DELETE FROM tb_checks WHERE checkId = :ID', array(
			"ID"=>$id
		));
	}

	public static function listById($id)
	{
		$sql = new Sql();

		return $results = $sql->select('SELECT checkId, checkBank, checkAgency, checkAccount, checkNumChk, checkValue, checkIssuer, checkDays, checkTax, checkIntrst, checkLiquid, checkReturned, clientId, DATE_FORMAT(checkToday,"%Y-%m-%d") AS checkToday, DATE_FORMAT(checkDue,"%Y-%m-%d") AS checkDue, clientName FROM tb_checks INNER JOIN tb_clients USING(clientId) WHERE checkId = :ID', array(		
			"ID"=>$id
		));
	}

	public static function updateCheck($id, $bank, $agency, $account, $numchk, $value, $dtToday, $issuer, $dtDue, $days, $tax, $interest, $liquid, $idClient, $returned)
	{
	try {

		$sql = new Sql();

		$results = $sql->query('UPDATE tb_checks SET checkBank = :BANK, checkAgency = :AGENCY, checkAccount = :ACCOUNT, checkNumChk = :NUMCHK, checkValue = :VALUE, checkToday = :DTTODAY, checkIssuer = :ISSUER, checkDue = :DTDUE, checkDays = :DAYS, checkTax = :TAX, checkIntrst = :INTEREST, checkLiquid = :LIQUID, clientId = :IDCLIENT, checkReturned = :IDRETURNED WHERE checkId = :ID', array(
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
			":IDCLIENT"=>$idClient,
			":IDRETURNED"=>$returned
		)); 

	} catch (Exception $e) {
		echo $e->getMessage();	
	}		
	}

#------------------------------------------------------REPORTS-------------------------------------------------
	//Relatório de cheques à vencer!
	public static function checksDue($sClient, $sIssuer, $sNumChk, $sValue)
	{
		$sessionId = $_SESSION['User'][0]['userId'];
		//print_r($varId);

		$sql = new Sql();

		return $results = $sql->select('SELECT ch.checkId, ch.checkBank, ch.checkAgency, ch.checkAccount, ch.checkNumChk, ch.checkValue, ch.checkIssuer, ch.checkDays, ch.checkTax, ch.checkIntrst, ch.checkLiquid, ch.checkReturned, ch.clientId, DATE_FORMAT(ch.checkToday,"%d-%m-%y") AS checkToday, DATE_FORMAT(ch.checkDue,"%d-%m-%y") AS checkDue, cl.clientName AS clientName FROM tb_checks AS ch INNER JOIN tb_clients AS cl USING(clientId) WHERE ch.chkSessionId = :SESSIONID AND ch.checkDue > current_date() AND cl.clientName LIKE :SCLI AND ch.checkIssuer LIKE :SISS AND ch.checkNumChk LIKE :SNUM AND ch.checkValue LIKE :SVAL ORDER BY ch.checkDue', array(
			"SESSIONID"=>$sessionId,
			"SCLI"  =>$sClient.'%',
			"SISS"  =>$sIssuer.'%',			
			"SNUM"  =>$sNumChk.'%',
			"SVAL"  =>$sValue.'%'
		));		
	}
	//Quantidade.
	public static function checksDueCount($sClient, $sIssuer, $sNumChk, $sValue)
	{
		$sessionId = $_SESSION['User'][0]['userId'];
		//print_r($varId);

		$sql = new Sql();

		return $results = $sql->select('SELECT COUNT(checkId) AS Amount, SUM(checkValue) AS tValue, SUM(checkIntrst) AS tIntrst, SUM(checkLiquid) AS tLiquid FROM tb_checks ch INNER JOIN tb_clients cl USING(clientId) WHERE chkSessionId = :SESSIONID AND checkDue > current_date() AND cl.clientName LIKE :SCLI AND ch.checkIssuer LIKE :SISS AND ch.checkNumChk LIKE :SNUM AND ch.checkValue LIKE :SVAL', array(
			"SESSIONID"=>$sessionId,
			"SCLI"=>$sClient.'%',
			"SISS"=>$sIssuer.'%',			
			"SNUM"=>$sNumChk.'%',
			"SVAL"=>$sValue.'%'			
		));		
	}//Fim Relatório de cheques à vencer!
	
	//Relatório de cheques compensados!
	public static function checksPaid($sClient, $sIssuer, $sNumChk, $sValue)
	{
		$sessionId = $_SESSION['User'][0]['userId'];
		//print_r($varId);

		$sql = new Sql();

		return $results = $sql->select('SELECT ch.checkId, ch.checkBank, ch.checkAgency, ch.checkAccount, ch.checkNumChk, ch.checkValue, ch.checkIssuer, ch.checkDays, ch.checkTax, ch.checkIntrst, ch.checkLiquid, ch.checkReturned, ch.clientId, DATE_FORMAT(ch.checkToday,"%d-%m-%y") AS checkToday, DATE_FORMAT(ch.checkDue,"%d-%m-%y") AS checkDue, cl.clientName AS clientName FROM tb_checks AS ch INNER JOIN tb_clients AS cl USING(clientId) WHERE ch.chkSessionId = :SESSIONID AND checkDue < current_date() AND cl.clientName LIKE :SCLI AND ch.checkIssuer LIKE :SISS AND ch.checkNumChk LIKE :SNUM AND ch.checkValue LIKE :SVAL ORDER BY ch.checkDue', array(
			"SESSIONID"=>$sessionId,
			"SCLI"=>$sClient.'%',
			"SISS"=>$sIssuer.'%',			
			"SNUM"=>$sNumChk.'%',
			"SVAL"=>$sValue.'%'
		));		

	}	
	//Quantidade.
	public static function checksPaidCount($sClient, $sIssuer, $sNumChk, $sValue)
	{
		$sessionId = $_SESSION['User'][0]['userId'];
		//print_r($varId);

		$sql = new Sql();

		return $results = $sql->select('SELECT COUNT(checkId) AS Amount, SUM(checkValue) AS tValue, SUM(checkIntrst) AS tIntrst, SUM(checkLiquid) AS tLiquid FROM tb_checks ch INNER JOIN tb_clients cl USING(clientId) WHERE chkSessionId = :SESSIONID AND checkDue < current_date() AND cl.clientName LIKE :SCLI AND ch.checkIssuer LIKE :SISS AND ch.checkNumChk LIKE :SNUM AND ch.checkValue LIKE :SVAL', array(
			"SESSIONID"=>$sessionId,
			"SCLI"=>$sClient.'%',
			"SISS"=>$sIssuer.'%',			
			"SNUM"=>$sNumChk.'%',
			"SVAL"=>$sValue.'%'	
		));		
	}//Fim Relatório de cheques à vencer!	

	//Relatório de cheques Devolvidos!
	public static function checksReturned($sClient, $sIssuer, $sNumChk, $sValue)
	{
		$sessionId = $_SESSION['User'][0]['userId'];
		//print_r($varId);

		$sql = new Sql();

		return $results = $sql->select('SELECT ch.checkId, ch.checkBank, ch.checkAgency, ch.checkAccount, ch.checkNumChk, ch.checkValue, ch.checkIssuer, ch.checkDays, ch.checkTax, ch.checkIntrst, ch.checkLiquid, ch.checkReturned, ch.clientId, DATE_FORMAT(ch.checkToday,"%d-%m-%y") AS checkToday, DATE_FORMAT(ch.checkDue,"%d-%m-%y") AS checkDue, cl.clientName AS clientName FROM tb_checks AS ch INNER JOIN tb_clients AS cl USING(clientId) WHERE ch.chkSessionId = :SESSIONID AND checkReturned = :RETURNED AND cl.clientName LIKE :SCLI AND ch.checkIssuer LIKE :SISS AND ch.checkNumChk LIKE :SNUM AND ch.checkValue LIKE :SVAL ORDER BY ch.checkDue', array(
			"SESSIONID"=>$sessionId,
			"RETURNED" =>'1',
			"SCLI"=>$sClient.'%',
			"SISS"=>$sIssuer.'%',			
			"SNUM"=>$sNumChk.'%',
			"SVAL"=>$sValue.'%'
		));		
	}
	//Quantidade.	
	public static function checksReturnedCount($sClient, $sIssuer, $sNumChk, $sValue)
	{
		$sessionId = $_SESSION['User'][0]['userId'];
		//print_r($varId);

		$sql = new Sql();

		return $results = $sql->select('SELECT COUNT(checkId) AS Amount, SUM(checkValue) AS tValue, SUM(checkIntrst) AS tIntrst, SUM(checkLiquid) AS tLiquid FROM tb_checks ch INNER JOIN tb_clients cl USING(clientId) WHERE chkSessionId = :SESSIONID AND checkReturned = :RETURNED AND cl.clientName LIKE :SCLI AND ch.checkIssuer LIKE :SISS AND ch.checkNumChk LIKE :SNUM AND ch.checkValue LIKE :SVAL', array(
			"SESSIONID"=>$sessionId,
			"RETURNED" =>'1',
			"SCLI"=>$sClient.'%',
			"SISS"=>$sIssuer.'%',			
			"SNUM"=>$sNumChk.'%',
			"SVAL"=>$sValue.'%'
		));
	}//Fim Relatório de cheques à vencer!		


}//end class	
?>