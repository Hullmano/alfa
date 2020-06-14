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

	User::login($_POST["login"], $_POST["senha"]);

	exit;
});

$app->get('/register', function() {   //aqui são definidas as rotas. Neste caso "/" é a raiz.

	$page = new Page("views/register/", "register"); 

});

$app->get('/calculation', function() {   //aqui são definidas as rotas. Neste caso "/" é a raiz.

	$page = new Page("views/calculation/", "calculation"); 

});

$app->run();                  //aqui chama as rotas.

 ?>