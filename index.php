<?php 

session_start();

require_once("vendor/autoload.php");

use \Slim\Slim;               //- para definir rotas.
use \Abcb\Page;
use \Abcb\User;
use \Abcb\Client;

$app = new Slim();

$app->config('debug', true);

$app->get('/', function() {   //aqui são definidas as rotas. Neste caso "/" é a raiz.

	$page = new Page();       //chama a classe Page. Esta classe posso o construct e o destruct, que são executados assim que instanciada a classe. Dentro do construct chama o header, e no destruct chama o footer.
	$page->setDraw("login");
});
$app->post('/', function() {   //aqui são definidas as rotas. Neste caso "/" é a raiz.

	User::login($_POST["login"], $_POST["password"]);

	header("Location: /alfa/calculation");
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
	
		header("Location: /alfa/");
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

	header("Location: /alfa/");
	exit;
});
/*------------------------------------------------------------------------------------------*/
$app->get('/bank_check', function() {   //aqui são definidas as rotas. Neste caso "/" é a raiz.

	User::verifyLogin();

	$clients = Client::listClients();
	
	//print_r($clients[0]);
	
	//$page = new Page("views/bank_check/", "bank_check"); 
	$page = new Page("views/bank_check/");
	$page->setDraw("bank_check", array(
		"Usuario"=>$clients
	));


});
$app->post('/bank_check', function() {   //aqui são definidas as rotas. Neste caso "/" é a raiz.
	
	header("Location: /alfa/");
	exit;
});
/*------------------------------------------------------------------------------------------*/
$app->get('/client', function() {   //aqui são definidas as rotas. Neste caso "/" é a raiz.

	User::verifyLogin();

	//$page = new Page("views/client/", "client"); 
	$page = new Page("views/client/"); 
	$page->setDraw("client");

});
$app->post('/client', function() {   //aqui são definidas as rotas. Neste caso "/" é a raiz.
	
	Client::newClient($_POST["name"], $_POST["fantasy"], $_POST["address"], $_POST["district"], $_POST["cpf"], $_POST["complement"], $_POST["city"], $_POST["state"], $_POST["zipcode"], $_POST["phone1"], $_POST["phone2"], $_POST["email"], $_POST["limit"], $_POST["others"]);

	//header("Location: /alfa/");
	echo "Ok";
	exit;
});
$app->get('/client/search', function() {   //aqui são definidas as rotas. Neste caso "/" é a raiz.

	User::verifyLogin();

	$results = Client::listClients();
	echo json_encode($results);
});
/*------------------------------------------------------------------------------------------*/
$app->run();                  //aqui chama as rotas.

 ?>