<?php
	require_once 'vendor/autoload.php';
	require_once('Configuration.php');

	ob_start();

	use App\Core\DatabaseConfiguration;
	use App\Core\DatabaseConnection;
	use App\Controllers\MainController;
	use App\Core\Router;
    use App\Core\ApiController;

	$databaseConfiguration = new DatabaseConfiguration(Configuration::DATABASE_HOST,Configuration::DATABASE_USER,Configuration::DATABASE_PASSWORD,Configuration::DATABASE_NAME);
	$databaseConnection = new DatabaseConnection($databaseConfiguration);

	
	$url = strval(filter_input(INPUT_GET,'URL'));
	$httpMethod = filter_input(INPUT_SERVER,'REQUEST_METHOD');
	$router = new Router();
	$routes = require_once 'Routes.php';
	foreach($routes as $route){
		$router->add($route);
	}
	$route = $router->find($httpMethod,$url);
	$arguments = $route->extractArguments($url);
	$fullControllerName = "\\App\\Controllers\\" . $route->getControllerName() . 'Controller';
	$controller = new $fullControllerName($databaseConnection);

	$sessonStorageClassName = Configuration::SESSION_STORAGE;
	$sessonStorageConstructorArguments = Configuration::SESSION_STORAGE_DATA;
	$sessonStorage = new $sessonStorageClassName(...$sessonStorageConstructorArguments);

	$session = new App\Core\Session\Session($sessonStorage);
	$controller->setSession($session);
	$controller->getSession()->reload();

	$controller->__pre();
	call_user_func_array([$controller,$route->getMethodName()],$arguments);
	$controller->getSession()->save();
	$data = $controller->getData();

	if($controller instanceof ApiController){
		ob_clean();
		header('Content-type: application/json; charset=utf-8');
		echo json_encode($data);
		exit;
	}
	
	$loader = new \Twig\Loader\FilesystemLoader("./views");
	$twig = new \Twig\Environment($loader,[
		"cache" => "./twig-cache",
		"auto_reload" => true
	]);
	echo $twig->render($route->getControllerName() . '/' . $route->getMethodName() . '.html', $data);

?>