<?php
namespace  Duck\AssistantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Duck\AssistantBundle\Interfaces\EntityAuthorInterface;
use Symfony\Component\Validator\Constraints as Assert;
/**
* @ORM\Entity
* @ORM\Table(name="Task")
*/
class Task  implements EntityAuthorInterface
{
    /**
    * @ORM\Column(type="integer")
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    */
    protected $id;

    /**
    * @ORM\Column(type="string")
    * @Assert\NotBlank()
    */
    protected $content;

    /**
    * @ORM\Column(type="date")
    * @Assert\NotBlank()
    */
    protected $date;

    /**
    * @ORM\Column(type="date")
     * @Assert\NotBlank()
    */
    protected $dueDate;


    /**
     * @ORM\Column(type="boolean")
     */
    protected $done;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $createAt;


    /**
     * @ORM\Column(type="integer")
     */
    protected $priority;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="createdTasks")
     * @ORM\JoinColumn(name="createdBy_id", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     */
    protected $createdBy;


    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="assignedTasks")
     * @ORM\JoinColumn(name="assignee_id", referencedColumnName="id", nullable=true, onDelete="SET NULL")
     */
    protected $assignee;

    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="tasks")
     *
     */
    protected $category;


    public function __construct(){
        $this->setCreateAt( new \DateTime() );

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
     * Set content
     *
     * @param string $content
     * @return Task
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Task
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set dueDate
     *
     * @param \DateTime $dueDate
     * @return Task
     */
    public function setDueDate($dueDate)
    {
        $this->dueDate = $dueDate;

        return $this;
    }

    /**
     * Get dueDate
     *
     * @return \DateTime 
     */
    public function getDueDate()
    {
        return $this->dueDate;
    }

    /**
     * Set done
     *
     * @param boolean $done
     * @return Task
     */
    public function setDone($done)
    {
        $this->done = $done;

        return $this;
    }

    /**
     * Get done
     *
     * @return boolean 
     */
    public function getDone()
    {
        return $this->done;
    }

    /**
     * Set createAt
     *
     * @param \DateTime $createAt
     * @return Task
     */
    public function setCreateAt($createAt)
    {
        $this->createAt = $createAt;

        return $this;
    }

    /**
     * Get createAt
     *
     * @return \DateTime 
     */
    public function getCreateAt()
    {
        return $this->createAt;
    }

    /**
     * Set priority
     *
     * @param integer $priority
     * @return Task
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * Get priority
     *
     * @return integer 
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * Set createdBy
     *
     * @param \Duck\AssistantBundle\Entity\User $createdBy
     * @return Task
     */
    public function setCreatedBy(\Duck\AssistantBundle\Entity\User $createdBy)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get createdBy
     *
     * @return \Duck\AssistantBundle\Entity\User 
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Set assignee
     *
     * @param \Duck\AssistantBundle\Entity\User $assignee
     * @return Task
     */
    public function setAssignee(\Duck\AssistantBundle\Entity\User $assignee)
    {
        $this->assignee = $assignee;

        return $this;
    }

    /**
     * Get assignee
     *
     * @return \Duck\AssistantBundle\Entity\User 
     */
    public function getAssignee()
    {
        return $this->assignee;
    }

    /**
     * Set category
     *
     * @param \Duck\AssistantBundle\Entity\Category $category
     * @return Task
     */
    public function setCategory(\Duck\AssistantBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \Duck\AssistantBundle\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }
}
