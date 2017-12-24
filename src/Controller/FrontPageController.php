<?php

namespace App\Controller;

use App\Entity\Event;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FrontPageController extends Controller
{
    /**
     * @Route("/", name="front_page")
     */
    public function index()
    {
        $em = $this->get('doctrine.orm.entity_manager');
        $event = $em->getRepository(Event::class)->find(1);
        // replace this line with your own code!
        return $this->render('front-page/index2.html.twig', [
            'event' => $event
        ]);
    }
}
