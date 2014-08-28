<?php

namespace GoMobility\UserBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 * @ORM\AttributeOverrides({
 *      @ORM\AttributeOverride(name="email", column=@ORM\Column(type="string", name="email", length=255, unique=false, nullable=true)),
 *      @ORM\AttributeOverride(name="emailCanonical", column=@ORM\Column(type="string", name="email_canonical", length=255, unique=false, nullable=true)),
 *      @ORM\AttributeOverride(name="username", column=@ORM\Column(type="string", name="username", length=255, nullable=true, unique=true)),
 *      @ORM\AttributeOverride(name="usernameCanonical", column=@ORM\Column(type="string", name="username_canonical", length=255, nullable=true, unique=true))
 * })
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

    public function __construct()
    {
        $this->experiences = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function addExperience(\GoMobility\SiteBundle\Entity\Experiences $experience)
    {
        $this->experiences[] = $experience;
        return $this;
    }

    public function removeExperience(\GoMobility\SiteBundle\Entity\Experiences $experience)
    {
        $this->experiences->removeElement($experience);
    }

    public function getExperiences()
    {
        return $this->experiences;
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