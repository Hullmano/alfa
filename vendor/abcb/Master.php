<?php 

namespace Abcb;

use \Abcb\Sql;

class Master extends Sql
{

	public static function updateUser($id, $login, $psw, $register, $actived)
	{
		$sql = new Sql();
		$results = $sql->query('UPDATE tb_users SET userLogin = :LOGIN, userPassword = :PSW, userRegister = :REG, userActived = :ACTV WHERE userId = :ID', array(
			":ID"   =>$id,
			":LOGIN"=>$login,
			":PSW"  =>$psw,
			":REG"  =>$register,
			":ACTV" =>$actived
		));
	}
	

}

?>