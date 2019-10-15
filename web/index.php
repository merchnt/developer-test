<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

require_once '../vendor/autoload.php';

$request = Request::createFromGlobals();

$routes = new RouteCollection();
$routes->add('user_index', new Route('', ['_controller' => '\DeveloperTest\Controller\UserController::indexAction'], [], [], null, [], ['GET']));
$routes->add('user_form', new Route('/user/{id}', ['_controller' => '\DeveloperTest\Controller\UserController::formAction', 'id' => null], [], [], null, [], ['GET']));
$routes->add('user_add', new Route('/user', ['_controller' => '\DeveloperTest\Controller\UserController::addAction'], [], [], null, [], ['POST']));
$routes->add('user_update', new Route('/user/{id}', ['_controller' => '\DeveloperTest\Controller\UserController::updateAction'], [], [], null, [], ['PUT']));
$routes->add('user_delete', new Route('/user/{id}', ['_controller' => '\DeveloperTest\Controller\UserController::deleteAction'], [], [], null, [], ['DELETE']));

$urlMatcher = new UrlMatcher($routes, (new RequestContext())->fromRequest($request));

try {
    $request->attributes->add($urlMatcher->match($request->getPathInfo()));

    $controllerResolver = new ControllerResolver();
    $argumentResolver = new ArgumentResolver();

    $controller = $controllerResolver->getController($request);
    $arguments = $argumentResolver->getArguments($request, $controller);

    $response = new Response(call_user_func_array($controller, $arguments));
} catch (ResourceNotFoundException $exception) {
    $response = new Response('Not Found', 404);
} catch (Exception $exception) {
    $response = new Response('An error occurred', 500);
}

$response->send();