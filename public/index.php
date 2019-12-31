<?php
declare(strict_types=1);
require_once '../vendor/autoload.php';
require_once "../src/Controller/FrontController.php";

use App\Controller\FrontController;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Generator\UrlGenerator;
use Symfony\Component\Routing\Loader\YamlFileLoader;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Route;

$frontController = new FrontController();
try {

    $fileLocator = new FileLocator([__DIR__]);
    $loader = new YamlFileLoader($fileLocator);
    $routes = $loader->load('routes.yaml');

    $context = new RequestContext();
    $context->fromRequest(Request::createFromGlobals());

    $matcher = new UrlMatcher($routes, $context);
    $matcher->match($context->getPathInfo());
dump($context->getPathInfo());

    if ($matcher != false) {

        if ($context->getPathInfo()==='/')
        {
           $frontController->index();
        }
        elseif ($context->getPathInfo()==='/home')
        {
            $frontController->home();
        }

    } else {
        throw new ResourceNotFoundException('404');
    }

} catch (ResourceNotFoundException $e) {
    echo $e->getMessage();
}
