<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ActivityRepository")
 */
class Activity
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
    private $name;

    /**
     * @ORM\Column(type="string")
     */
    private $description;

    /**
     * @ORM\Column(type="time")
     */
    private $startedAt;

    /**
     * @ORM\Column(type="time")
     */
    private $endedAt;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Speaker", inversedBy="activities")
     */
    private $speaker;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Day", inversedBy="activities")
     */
    private $day;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Room", inversedBy="activities")
     */
    private $room;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Event", inversedBy="activities")
     */
    private $event;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ActivityType", inversedBy="activities")
     */
    private $type;

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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
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
    public function getEndedAt()
    {
        return $this->endedAt;
    }

    /**
     * @param mixed $endedAt
     */
    public function setEndedAt($endedAt)
    {
        $this->endedAt = $endedAt;
    }

    /**
     * @return mixed
     */
    public function getSpeaker()
    {
        return $this->speaker;
    }

    public function hasSpeaker()
    {
        return !is_null($this->speaker);
    }

    /**
     * @param mixed $speaker
     */
    public function setSpeaker($speaker)
    {
        $this->speaker = $speaker;
    }

    // add your own fields

    public function __toString()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * @param mixed $day
     */
    public function setDay($day)
    {
        $this->day = $day;
    }

    /**
     * @return mixed
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * @param mixed $event
     */
    public function setEvent($event)
    {
        $this->event = $event;
    }

    /**
     * @return mixed
     */
    public function getRoom()
    {
        return $this->room;
    }

    /**
     * @param mixed $room
     */
    public function setRoom($room)
    {
        $this->room = $room;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }



}
