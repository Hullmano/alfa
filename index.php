<?php 

session_start();

require_once("vendor/autoload.php");

use \Slim\Slim;               //- para definir rotas.
use \Abcb\Page;
use \Abcb\User;
use \Abcb\Client;
use \Abcb\Bank_Check;

$app = new Slim();

$app->config('debug', true);

$app->get('/', function() {   //aqui são definidas as rotas. Neste caso "/" é a raiz.

	$page = new Page();       //chama a classe Page. Esta classe posso o construct e o destruct, que são executados assim que instanciada a classe. Dentro do construct chama o header, e no destruct chama o footer.
	$page->setDraw("login");
});
$app->post('/', function() {   //aqui são definidas as rotas. Neste caso "/" é a raiz.

	User::login($_POST["login"], $_POST["password"]);
	//print_r($_SESSION);
	header("Location: /calculation");
	exit;
});
/*------------------------------------------------------------------------------------------*/
$app->get('/new_user', function() {   //aqui são definidas as rotas. Neste caso "/" é a raiz.

	//$page = new Page("views/new_user/", "new_user"); 
	$page = new Page("views/new_user/"); 
	$page->setDraw("new_user");

});
$app->post('/new_user', function() {   //aqui são definidas as rotas. Neste caso "/" é a raiz.

	if ($_POST["newUser"] === '' || $_POST["newPsw"] === '' || $_POST["confPsw"] === '')
	{
		throw new \Exception("Os Campos Não Podem Estar Vazios");
		exit;
		
	} else {
		
		User::newUser($_POST["newUser"], $_POST["newPsw"], $_POST["confPsw"]);	
	
		header("Location: /");
		exit;
	}
});
/*------------------------------------------------------------------------------------------*/
$app->get('/calculation', function() {   //aqui são definidas as rotas. Neste caso "/" é a raiz.

	User::verifyLogin();

	//$page = new Page("views/calculation/", "calculation"); 
	$page = new Page("views/calculation/");
	$page->setDraw("calculation");

});
/*------------------------------------------------------------------------------------------*/
$app->get('/logout', function() {

	User::logout();

	header("Location: /");
	exit;
});
/*------------------------------------------------------------------------------------------*/
$app->get('/bank_check', function() {   //aqui são definidas as rotas. Neste caso "/" é a raiz.

	User::verifyLogin();

	$clients = Client::listClients();
	$data    = Bank_Check::listChecks();
	
	//print_r($data);
	//print_r($_SESSION["User"][0]["userId"]);
	//$page = new Page("views/bank_check/", "bank_check"); 
	$page = new Page("views/bank_check/");
	$page->setDraw("bank_check", array(
		"Users"=>$clients,
		"Data"=>$data
	));
});
$app->post('/bank_check', function() {   //aqui são definidas as rotas. Neste caso "/" é a raiz.

	Bank_Check::newCheck($_POST["bank"], $_POST["agency"], $_POST["account"], $_POST["numchk"], $_POST["value"], $_POST["dtToday"], $_POST["issuer"], $_POST["dtDue"], $_POST["days"], $_POST["tax"], $_POST["interest"], $_POST["liquid"], $_POST["idClient"]);

	header("Location: /bank_check");
	exit;
});
$app->get('/bank_check/:checkId/update', function($checkId) {   //aqui são definidas as rotas. Neste caso "/" é a raiz.

	User::verifyLogin();

	$clients = Client::listClients();
	$data = bank_check::listById($checkId);

	$page = new Page("views/bank_check/");
	$page->setDraw("bank_check_updt", array(
		"Users"=>$clients,
		"Update"=>$data
	));
});
$app->post('/bank_check/:checkId/update', function() {   //aqui são definidas as rotas. Neste caso "/" é a raiz.

	$_POST["returned"] = (isset($_POST["returned"]))?1:0; //Atribui 1 para checked ou 0 para not checked.
	Bank_Check::updateCheck($_POST["cod"] ,$_POST["bank"], $_POST["agency"], $_POST["account"], $_POST["numchk"], $_POST["value"], $_POST["dtToday"], $_POST["issuer"], $_POST["dtDue"], $_POST["days"], $_POST["tax"], $_POST["interest"], $_POST["liquid"], $_POST["idClient"], $_POST["returned"]);

	header("Location: /bank_check");
	exit; 
});
$app->get('/bank_check/:checkId/delete', function($checkId) {   //aqui são definidas as rotas. Neste caso "/" é a raiz.

	Bank_Check::deleteCheck($checkId);

	//sleep(1);
	header("Location: /bank_check");
	exit;
});
/*------------------------------------------------------------------------------------------*/
$app->get('/client', function() {   //aqui são definidas as rotas. Neste caso "/" é a raiz.

	User::verifyLogin();

	$Data = Client::listClients();

	//$page = new Page("views/client/", "client"); 
	$page = new Page("views/client/"); 
	$page->setDraw("client", array(
		"Data"=>$Data
	));

});
$app->post('/client', function() {   //aqui são definidas as rotas. Neste caso "/" é a raiz.
	
	Client::newClient($_POST["name"], $_POST["fantasy"], $_POST["address"], $_POST["district"], $_POST["cpf"], $_POST["complement"], $_POST["city"], $_POST["state"], $_POST["zipcode"], $_POST["phone1"], $_POST["phone2"], $_POST["email"], $_POST["limit"], $_POST["others"]);

	header("Location: /client");
	exit;
});
$app->get('/client/:clientId/update', function($clientId) { //aqui são definidas as rotas. Neste caso "/" é a raiz.

	User::verifyLogin();

	$client    = Client::clientById($clientId);
	$chkDues   = Client::checksDue($clientId);
	$chkTot    = Client::checksTotal($clientId);
	$chkRetrnd = Client::checksReturned($clientId);

	$page = new Page("views/client/");
	$page->setDraw("client_updt", array(
		"Update"   =>$client,
		"ChkDues"  =>$chkDues,
		"ChkTots"  =>$chkTot,
		"ChkRetrnds"=>$chkRetrnd
	));
});
$app->post('/client/:clientId/update', function() {   //aqui são definidas as rotas. Neste caso "/" é a raiz.
	
	Client::updateClient($_POST["id"], $_POST["name"], $_POST["fantasy"], $_POST["address"], $_POST["district"], $_POST["cpf"], $_POST["complement"], $_POST["city"], $_POST["state"], $_POST["zipcode"], $_POST["phone1"], $_POST["phone2"], $_POST["email"], $_POST["limit"], $_POST["others"]);

	header("Location: /client");
	exit;
});
$app->get('/client/:clientId/delete', function($clientId) { //aqui são definidas as rotas. Neste caso "/" é a raiz.

	Client::deleteClient($clientId);

	//sleep(1);
	header("Location: /client");
	exit;
});

$app->get('/bank_check/reports/paid_check_rp', function() {   //aqui são definidas as rotas. Neste caso "/" é a raiz.

	User::verifyLogin();
	
	$page = new Page("views/bank_check/reports/");
	$page->setDraw("paid_check_rp");
});
/*------------------------------------------------------------------------------------------*/
$app->run();                  //aqui chama as rotas.

 ?>