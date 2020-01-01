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

    private function init()
    {
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

    public function pseudoUpload($lady)
    {
        $imgs = glob('../public/images/'.$lady.'/*.jpg');
        $images = [];
        foreach ($imgs as $img) {
            $infos = pathinfo($img);
            $images[] = $infos;
        }
        return $images;
    }

    public function maria()
    {

        $images = $this->pseudoUpload('maria');

        return ($this->init())->twigRender('pages/maria.html.twig', [
            'images' => $images,
            'lady' => 'maria'

        ]);
    }

    public function seniors()
    {
        $images = $this->pseudoUpload('seniors');

        return $this->init()->twigRender('pages/seniors.html.twig',[
            'images' => $images,
            'lady'=> 'seniors'
        ]);

    }


}