<?php
/**
 * Created by PhpStorm.
 * User: Lukasz
 * Date: 2015-03-21
 * Time: 14:58
 */

namespace Duck\AssistantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Shops")
 */
class Shops {
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $name;
    /**
     * @ORM\OneToMany(targetEntity="Price", mappedBy="shop")
     */
    protected $assignee_shop;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->assignee_shop = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return Shops
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add assignee_shop
     *
     * @param \Duck\AssistantBundle\Entity\Price $assigneeShop
     * @return Shops
     */
    public function addAssigneeShop(\Duck\AssistantBundle\Entity\Price $assigneeShop)
    {
        $this->assignee_shop[] = $assigneeShop;

        return $this;
    }

    /**
     * Remove assignee_shop
     *
     * @param \Duck\AssistantBundle\Entity\Price $assigneeShop
     */
    public function removeAssigneeShop(\Duck\AssistantBundle\Entity\Price $assigneeShop)
    {
        $this->assignee_shop->removeElement($assigneeShop);
    }

    /**
     * Get assignee_shop
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAssigneeShop()
    {
        return $this->assignee_shop;
    }
}
