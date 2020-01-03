<?php


namespace App\Twig;


use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class AppExtension extends AbstractExtension
{
    public function getFunctions()
    {
        return[
            new TwigFunction('letters',[$this,'getGoogleString']),
            new TwigFunction('colors',[$this,'getGoogleColors'])
        ];
    }


    public function getGoogleString (string $string)
    {
        return str_split($string,1);




    }

    public function getGoogleColors()
    {
        $googleColors = "primary,danger,warning,success";
        return explode(",", $googleColors);

    }
}