<?php

namespace App\Controller;

use App\Entity\Event;
use App\Entity\Photo;
use App\Entity\Speaker;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BlogController extends Controller
{
    /**
     * @Route("/blog/{offset}", name="blog")
     */
    public function index($template = '', $offset = '0')
    {
        dump('blog');
        dump($offset);

        $em = $this->get('doctrine.orm.entity_manager');
        $event = $em->getRepository(Event::class)->find(1);

        return $this->render(sprintf('2018/blog/list.html.twig'), [
            'event'  => $event,
        ]);
    }
}
