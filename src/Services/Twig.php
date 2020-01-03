<?php


namespace App\Services;


use Twig\Environment;
use Twig\Extension\DebugExtension;
use Twig\Loader\FilesystemLoader;
use Twig\TwigFunction;

class Twig
{
    public function twigRender(string $view, array $arguments=[])
    {
        $loader = new FilesystemLoader('../templates');
        $twig = new Environment($loader,[
            'cache'=>false,//'../tmp',
            'debug'=>true,
        ]);
        $twig->addFunction(new TwigFunction('asset',function ($asset){
            return sprintf('../%s', ltrim($asset, '/'));
        }));
        $twig->addFunction(new TwigFunction('letters',function ($string){
            return str_split($string,1);
        }));
        $twig->addFunction(new TwigFunction('colors',function (){
            $googleColors = "primary,danger,warning,success";
            return explode(",", $googleColors);
        }));
        $twig->addExtension(new DebugExtension());

        echo $twig->render($view,$arguments);
    }

    public function getGoogleString (string $string)
    {
        $strToGoogleCorlorised = str_split($string,1);



        return $strToGoogleCorlorised;
    }

    public function getGoogleColors()
    {
        $googleColors = "primary,danger,warning,success";
        return explode(",", $googleColors);

    }



}