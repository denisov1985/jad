<?php

namespace App\Controller;

use App\Entity\Event;
use App\Entity\Photo;
use App\Entity\Speaker;
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

        $data = $event->getSponsorsByType();

        foreach ($data as $type) {
            dump($type['type']->getName());
            foreach ($type['sponsors'] as $sponsor) {
                dump($sponsor);
            }
        }

        die();

        $photos = $em->getRepository(Photo::class)->findAll();

        $titleSpeakers = $em->getRepository(Speaker::class)->findBy(['weight' => 2], ['id' => 'DESC']);
        $speakers = $em->getRepository(Speaker::class)->findBy([], ['id' => 'DESC'], 9);
        // replace this line with your own code!
        return $this->render('front-page/index3.html.twig', [
            'event'  => $event,
            'photos' => $photos,
            'titleSpeakers' => $titleSpeakers,
            'speakers' => $speakers
        ]);
    }
}
