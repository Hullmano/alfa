<?php 

namespace Abcb;

use \Abcb\Sql;

class Master extends Sql
{

	public static function updateUser($id, $login, $psw, $actived)
	{
		try {
			
		$sql = new Sql();
		$results = $sql->query("UPDATE tb_users SET userLogin = :LOGIN, userPassword = :PSW, userActived = :ACTV WHERE userId = :ID", array(
			":ID"   =>$id,
			":LOGIN"=>$login,
			":PSW"  =>$psw,
			":ACTV" =>$actived
		));

			} catch (Exception $e) {
				echo $e->getMessage();
		}
	}
	

}

?>