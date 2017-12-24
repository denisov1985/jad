<?php

namespace App\Command;

use App\Entity\Event;
use App\Entity\Speaker;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DomCrawler\Crawler;

class ParseCommand extends Command
{
    protected static $defaultName = 'Parse';
    /**
     * @var ContainerInterface
     */
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setDescription('Add a short description for your command')
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
        $argument = $input->getArgument('arg1');

        if ($input->getOption('option1')) {
            // ...
        }
        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');

        $em = $this->container->get('doctrine.orm.entity_manager');
        $event = $em->getRepository(Event::class)->find(1);

        $content = file_get_contents(__DIR__ . '/Resources/speakers.html');
        $crawler = new Crawler($content);

        $crawler = $crawler->filter('.speaker-block');
        foreach ($crawler as $domElement) {
            $nodes = $domElement->childNodes->item(1);
            $infoNodes = $nodes->childNodes->item(3)->childNodes;

            $imageUrl = $nodes->childNodes->item(1)->attributes[0]->textContent;
            $name    = $infoNodes->item(1)->childNodes->item(0)->textContent;
            $company = $infoNodes->item(3)->childNodes->item(0)->textContent;

            dump('________________________');
            dump($company);
            sleep(1);

            dump($name);
            $role = '';
            $social = [];
            dump($infoNodes);

            if ($infoNodes->length === 7) {
                foreach($infoNodes->item(5)->childNodes as $childNode) {
                    if ($childNode->nodeName === '#text') {
                        continue;
                    }
                    $social[] = $childNode->getAttribute('href');
                }
            }   else if ($infoNodes->length === 8) {
                $role = $infoNodes->item(4)->childNodes->item(0)->textContent;
                foreach($infoNodes->item(6)->childNodes as $childNode) {
                    if ($childNode->nodeName === '#text') {
                        continue;
                    }
                    $social[] = $childNode->getAttribute('href');
                }
            }   else  {
                continue;
                $role = $infoNodes->item(5)->childNodes->item(0)->textContent;

                //dump($infoNodes->item(9)->childNodes); die();

                foreach($infoNodes->item(9)->childNodes as $childNode) {
                    if ($childNode->nodeName === '#text') {
                        continue;
                    }
                    $social[] = $childNode->getAttribute('href');
                }
            }

            dump($social);
            dump($name);

            $entity = $em->getRepository(Speaker::class)->findByName($name);

            if (!empty($entity)) {
                continue;
            }

            $imageContent = file_get_contents($imageUrl);
            $fileName     = explode('/', $imageUrl);
            $fileName     = $fileName[count($fileName) - 1];
            $filePath     = implode(DIRECTORY_SEPARATOR, [dirname(dirname(__DIR__)), 'public', 'images', 'speakers', $fileName]);

            file_put_contents($filePath, $imageContent);

            $speaker = new Speaker();
            $speaker->setEvent($event);
            $speaker->setCompany($company);
            $speaker->setName($name);
            $speaker->setRole($role);
            $speaker->setSocial($social);
            $speaker->setPhoto($fileName);
            $speaker->setUpdatedAt(new \DateTime());

            $em->persist($speaker);
            $em->flush();
        }
    }
}
