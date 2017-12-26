<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EventRepository")
 */
class Event
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="string")
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $content;


    /**
     * @ORM\Column(type="boolean")
     */
    private $isFrontPage;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Speaker", mappedBy="event")
     */
    private $speakers;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Sponsor", mappedBy="event")
     */
    private $sponsors;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Photo", mappedBy="event")
     */
    private $photos;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Activity", mappedBy="event")
     */
    private $activities;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ActivityDay", mappedBy="event")
     */
    private $days;

    /**
     * @ORM\Column(type="date")
     */
    private $startedAt;
    /**
     * Page constructor.
     */
    public function __construct()
    {
        $this->speakers = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getDays()
    {
        return $this->days;
    }

    /**
     * @param mixed $days
     */
    public function setDays($days)
    {
        $this->days = $days;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getIsFrontPage()
    {
        return $this->isFrontPage;
    }

    /**
     * @param mixed $isFrontPage
     */
    public function setIsFrontPage($isFrontPage)
    {
        $this->isFrontPage = $isFrontPage;
    }
    // add your own fields

    public function addSpeaker(Speaker $speaker)
    {
        $this->speakers[] = $speaker;
    }

    public function addSponsor(Sponsor $speaker)
    {
        $this->speakers[] = $speaker;
    }

    /**
     * @return mixed
     */
    public function getSpeakers()
    {
        return $this->speakers;
    }

    /**
     * @return mixed
     */
    public function getSponsors()
    {
        return $this->sponsors;
    }

    /**
     * @return mixed
     */
    public function __toString()
    {
        return $this->title;
    }

    /**
     * @param mixed $speakers
     */
    public function setSpeakers($speakers)
    {
        $this->speakers = $speakers;
    }

    /**
     * @param mixed $sponsors
     */
    public function setSponsors($sponsors)
    {
        $this->sponsors = $sponsors;
    }

    /**
     * @return mixed
     */
    public function getActivities()
    {
        return $this->activities;
    }

    /**
     * @param mixed $activities
     */
    public function setActivities($activities)
    {
        $this->activities = $activities;
    }

    /**
     * @return mixed
     */
    public function getStartedAt()
    {
        return $this->startedAt;
    }

    /**
     * @param mixed $startedAt
     */
    public function setStartedAt($startedAt)
    {
        $this->startedAt = $startedAt;
    }

    /**
     * @return mixed
     */
    public function getPhotos()
    {
        return $this->photos;
    }

    /**
     * @param mixed $photos
     */
    public function setPhotos($photos)
    {
        $this->photos = $photos;
    }




}
