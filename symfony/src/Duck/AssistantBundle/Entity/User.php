<?php

namespace  Duck\AssistantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
* @ORM\Table(name="User")
*/
class User
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
    protected $email;

    /**
    * @ORM\Column(type="string", length=20)
    */
    protected $password;

    /**
    * @ORM\Column(type="string", length=100)
    */
    protected $name;

    /**
    * @ORM\Column(type="datetime")
    */
    protected $createdAt;


    /**
     * @ORM\OneToMany(targetEntity="Task", mappedBy="createdBy")
     */
    protected $createdTasks;

    /**
     * @ORM\OneToMany(targetEntity="Task", mappedBy="assignee")
     */
    protected $assignedTasks;

    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="createdBy")
     */
    protected $createdCategories;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->createdTasks = new \Doctrine\Common\Collections\ArrayCollection();
        $this->assignedTasks = new \Doctrine\Common\Collections\ArrayCollection();
        $this->createdAt = new \DateTime();
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
     * @return User
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
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return User
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return User
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
     * Add createdTasks
     *
     * @param \Duck\AssistantBundle\Entity\Task $createdTasks
     * @return User
     */
    public function addCreatedTask(\Duck\AssistantBundle\Entity\Task $createdTasks)
    {
        $this->createdTasks[] = $createdTasks;

        return $this;
    }

    /**
     * Remove createdTasks
     *
     * @param \Duck\AssistantBundle\Entity\Task $createdTasks
     */
    public function removeCreatedTask(\Duck\AssistantBundle\Entity\Task $createdTasks)
    {
        $this->createdTasks->removeElement($createdTasks);
    }

    /**
     * Get createdTasks
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCreatedTasks()
    {
        return $this->createdTasks;
    }

    /**
     * Add assignedTasks
     *
     * @param \Duck\AssistantBundle\Entity\Task $assignedTasks
     * @return User
     */
    public function addAssignedTask(\Duck\AssistantBundle\Entity\Task $assignedTasks)
    {
        $this->assignedTasks[] = $assignedTasks;

        return $this;
    }

    /**
     * Remove assignedTasks
     *
     * @param \Duck\AssistantBundle\Entity\Task $assignedTasks
     */
    public function removeAssignedTask(\Duck\AssistantBundle\Entity\Task $assignedTasks)
    {
        $this->assignedTasks->removeElement($assignedTasks);
    }

    /**
     * Get assignedTasks
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAssignedTasks()
    {
        return $this->assignedTasks;
    }

    /**
     * Set createdCategories
     *
     * @param \Duck\AssistantBundle\Entity\Category $createdCategories
     * @return User
     */
    public function setCreatedCategories(\Duck\AssistantBundle\Entity\Category $createdCategories = null)
    {
        $this->createdCategories = $createdCategories;

        return $this;
    }

    /**
     * Get createdCategories
     *
     * @return \Duck\AssistantBundle\Entity\Category 
     */
    public function getCreatedCategories()
    {
        return $this->createdCategories;
    }
}
