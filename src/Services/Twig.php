<?php


namespace App\Services;


use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Twig
{
    public function twigInit(string $path, array $arguments=[])
    {
        $loader = new FilesystemLoader('../templates');
        $twig = new Environment($loader,[
            'cache'=>'../../tmp',
        ]);

        echo $twig->render($path,$arguments);
    }
}