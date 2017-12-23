<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class FrontPageController extends Controller
{
    /**
     * @Route("/", name="front_page")
     */
    public function index()
    {
        // replace this line with your own code!
        return $this->render('front-page/index.html.twig');
    }
}
