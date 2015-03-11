<?php

namespace Duck\AssistantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
* @ORM\Table(name="Category")
*/
class Category
{
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
* @ORM\Column(type="string", length=20)
*/
protected $color;

/**
* @ORM\Column(type="datetime")
*/
protected $createdAt;

    /**
     * @ORM\OneToMany(targetEntity="User", mappedBy="createdCategories")
     */
    protected $createdBy;
    /**
     * @ORM\OneToMany(targetEntity="Task", mappedBy="category")
     */
    protected $tasks;


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
     * @return Category
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
     * Set color
     *
     * @param string $color
     * @return Category
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string 
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Category
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->createdBy = new \Doctrine\Common\Collections\ArrayCollection();
        $this->tasks = new \Doctrine\Common\Collections\ArrayCollection();
        $this->setCreatedAt(new \Datetime() );
    }

    /**
     * Add createdBy
     *
     * @param \Duck\AssistantBundle\User $createdBy
     * @return Category
     */
    public function addCreatedBy(\Duck\AssistantBundle\User $createdBy)
    {
        $this->createdBy[] = $createdBy;

        return $this;
    }

    /**
     * Remove createdBy
     *
     * @param \Duck\AssistantBundle\User $createdBy
     */
    public function removeCreatedBy(\Duck\AssistantBundle\User $createdBy)
    {
        $this->createdBy->removeElement($createdBy);
    }

    /**
     * Get createdBy
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Add tasks
     *
     * @param \Duck\AssistantBundle\Task $tasks
     * @return Category
     */
    public function addTask(\Duck\AssistantBundle\Task $tasks)
    {
        $this->tasks[] = $tasks;

        return $this;
    }

    /**
     * Remove tasks
     *
     * @param \Duck\AssistantBundle\Task
     */
    public function removeTask(\Duck\AssistantBundle\Task $tasks)
    {
        $this->tasks->removeElement($tasks);
    }

    /**
     * Get tasks
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTasks()
    {
        return $this->tasks;
    }
}