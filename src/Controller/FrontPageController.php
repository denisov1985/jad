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
     * @Route("/", name="front")
     * @Route("/{template}", name="front_legacy", requirements={"template"="[2][0][0-9][0-9]"})
     * @Route("/{page}", name="front_page", requirements={"page"="[A-z]+"})
     * @Route("/{template}/{page}", name="front_page_legacy", requirements={"page"="[A-z]+", "template"="[2][0][0-9][0-9]"})
     */
    public function index($template = '', $page = '')
    {
        $em = $this->get('doctrine.orm.entity_manager');
        $event = $em->getRepository(Event::class)->find(1);

        return $this->_renderTemplate($template, $page, $event);
    }

    /**
     * Renders template by template name and page
     * @param $template
     * @param $page
     * @param $event
     * @return \Symfony\Component\HttpFoundation\Response
     */
    private function _renderTemplate($template, $page, $event) {
        if (empty($template)) {
            $template = $this->_getTemplateName();
        }
        if (empty($page)) {
            $page = 'onepage';
        }
        return $this->render(sprintf('%s/pages/%s.html.twig', $template, $page), [
            'event'  => $event,
        ]);
    }

    private function _getTemplateName() {
        return '2018';
    }
}
