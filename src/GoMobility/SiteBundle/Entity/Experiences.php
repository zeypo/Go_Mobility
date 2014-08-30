<?php

namespace GoMobility\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Experiences
 *
 * @ORM\Table(name="experiences")
 * @ORM\Entity(repositoryClass="GoMobility\SiteBundle\Entity\ExperiencesRepository")
 */
class Experiences
{   
    /**
     * @ORM\ManyToMany(targetEntity="GoMobility\SiteBundle\Entity\Keyword", cascade={"persist"})
     */
    private $keywords;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="transport", type="string", length=255)
     */
    private $transport;

    /**
     * @var string
     *
     * @ORM\Column(name="start", type="string", length=255)
     */
    private $start;

    /**
     * @var string
     *
     * @ORM\Column(name="arrival", type="string", length=255)
     */
    private $arrival;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string")
     */
    private $description;

    /**
     * @var boolean
     *
     * @ORM\Column(name="game", type="boolean")
     */
    private $game;

    /**
     * @var string
     *
     * @ORM\Column(name="ges", type="decimal")
     */
    private $ges;

    /**
     * @var boolean
     *
     * @ORM\Column(name="publish", type="boolean")
     */
    private $publish = false;

    public function __construct()
    {
        $this->keywords = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Parcours
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set transport
     *
     * @param string $transport
     * @return Parcours
     */
    public function setTransport($transport)
    {
        $this->transport = $transport;

        return $this;
    }

    /**
     * Get transport
     *
     * @return string 
     */
    public function getTransport()
    {
        return $this->transport;
    }

    /**
     * Set start
     *
     * @param string $start
     * @return Parcours
     */
    public function setStart($start)
    {
        $this->start = $start;

        return $this;
    }

    /**
     * Get start
     *
     * @return string 
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Set arrival
     *
     * @param string $arrival
     * @return Parcours
     */
    public function setArrival($arrival)
    {
        $this->arrival = $arrival;

        return $this;
    }

    /**
     * Get arrival
     *
     * @return string 
     */
    public function getArrival()
    {
        return $this->arrival;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Parcours
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set game
     *
     * @param boolean $game
     * @return Parcours
     */
    public function setGame($game)
    {
        $this->game = $game;

        return $this;
    }

    /**
     * Get game
     *
     * @return boolean 
     */
    public function getGame()
    {
        return $this->game;
    }

    /**
     * Set ges
     *
     * @param string $ges
     * @return Parcours
     */
    public function setGes($ges)
    {
        $this->ges = $ges;

        return $this;
    }

    /**
     * Get ges
     *
     * @return string 
     */
    public function getGes()
    {
        return $this->ges;
    }

    /**
     * Set publish
     *
     * @param boolean $publish
     * @return Publish
     */
    public function setPublish($publish)
    {
        $this->publish = $publish;

        return $this;
    }

    /**
     * Get publish
     *
     * @return boolean 
     */
    public function getPublish()
    {
        return $this->publish;
    }

    /**
    * Mapping Relations
    **/

    /**
     * @ORM\ManyToOne(targetEntity="GoMobility\UserBundle\Entity\User", inversedBy="experiences")
     * @ORM\JoinColumn()
     */
    private $user;

    /**
     * Set user
     *
     * @param \GoMobility\UserBundle\Entity\User $user
     * @return Experiences
     */
    public function setUser(\GoMobility\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \GoMobility\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add keywords
     *
     * @param \GoMobility\SiteBundle\Entity\Keyword $keywords
     * @return Articles
     */
    public function addKeyword(\GoMobility\SiteBundle\Entity\Keyword $keywords)
    {
        $this->keywords[] = $keywords;

        return $this;
    }

    /**
     * Remove keywords
     *
     * @param \GoMobility\SiteBundle\Entity\Keyword $keywords
     */
    public function removeKeyword(\GoMobility\SiteBundle\Entity\Keyword $keywords)
    {
        $this->keywords->removeElement($keywords);
    }

    /**
     * Get keywords
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getKeywords()
    {
        return $this->keywords;
    }
}
