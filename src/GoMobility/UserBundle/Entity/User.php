<?php

namespace GoMobility\UserBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="GoMobility\UserBundle\Entity\UserRepository")
 * @ORM\Table(name="users")
 */
class User extends BaseUser
{
    /**
     * @ORM\OneToMany(targetEntity="GoMobility\SiteBundle\Entity\Experiences", mappedBy="user")
     */
    protected $experiences;
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="ges", type="decimal")
     */
    private $ges = 0;

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
     * Set ges
     *
     * @param string $ges
     * @return User
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
}