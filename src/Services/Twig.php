<?php


namespace App\Services;


use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\TwigFunction;

class Twig
{
    public function twigRender(string $view, array $arguments=[])
    {
        $loader = new FilesystemLoader('../templates');
        $twig = new Environment($loader,[
            'cache'=>false,//'../tmp',
        ]);
        $twig->addFunction(new TwigFunction('asset',function ($asset){
            return sprintf('../%s', ltrim($asset, '/'));
        }));

        echo $twig->render($view,$arguments);
    }
}