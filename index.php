<?php 

session_start();

require_once("vendor/autoload.php");

use \Slim\Slim;               //- para definir rotas.
use \Abcb\Page;
use \Abcb\User;

$app = new Slim();

$app->config('debug', true);

$app->get('/', function() {   //aqui são definidas as rotas. Neste caso "/" é a raiz.

	$page = new Page();       //chama a classe Page. Esta classe posso o construct e o destruct, que são executados assim que instanciada a classe. Dentro do construct chama o header, e no destruct chama o footer.
	//$page->__construct("views/");

});
$app->post('/', function() {   //aqui são definidas as rotas. Neste caso "/" é a raiz.

	User::login($_POST["login"], $_POST["password"]);

	header("Location: /alfa/calculation");
	exit;
});

$app->get('/new_user', function() {   //aqui são definidas as rotas. Neste caso "/" é a raiz.

	$page = new Page("views/new_user/", "new_user"); 

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


$app->get('/calculation', function() {   //aqui são definidas as rotas. Neste caso "/" é a raiz.

	User::verifyLogin();

	$page = new Page("views/calculation/", "calculation"); 

});

$app->get('/calculation/logout', function() {

	User::logout();

	header("Location: /alfa/");
	exit;
});

$app->get('/bank_check', function() {   //aqui são definidas as rotas. Neste caso "/" é a raiz.

	$page = new Page("views/bank_check/", "bank_check"); 

});
$app->post('/bank_check', function() {   //aqui são definidas as rotas. Neste caso "/" é a raiz.
	
	header("Location: /alfa/");
	exit;
});

$app->run();                  //aqui chama as rotas.

 ?>