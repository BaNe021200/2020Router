<?php


namespace App\Controller;
require_once '../src/Services/Twig.php';


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Services\Twig;

class FrontController extends AbstractController
{
    /**
     * @var Twig
     */
    private $twig;

    private function init(){
        return new Twig();
    }
    /**
     * @return mixed
     */
    public function index()
    {
        return ($this->init())->twigRender('pages/index.html.twig');



    }

    public function home()
    {
        return ($this->init())->twigRender('pages/home.html.twig');
    }
}