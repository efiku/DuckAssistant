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
 * @ORM\Table(name="Product")
 */
class Product {
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=100)
     *
     */
    protected $name;
    /**
     * @ORM\OneToMany(targetEntity="Price", mappedBy="product")
     */
    protected $assignee_product;

    /**
     * @ORM\ManyToMany(targetEntity="Shopping", mappedBy="products")
     **/
    private $shopping;




    /**
     * Constructor
     */
    public function __construct()
    {
        $this->assignee_product = new \Doctrine\Common\Collections\ArrayCollection();
        $this->shopping = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Product
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
     * Add assignee_product
     *
     * @param \Duck\AssistantBundle\Entity\Price $assigneeProduct
     * @return Product
     */
    public function addAssigneeProduct(\Duck\AssistantBundle\Entity\Price $assigneeProduct)
    {
        $this->assignee_product[] = $assigneeProduct;

        return $this;
    }

    /**
     * Remove assignee_product
     *
     * @param \Duck\AssistantBundle\Entity\Price $assigneeProduct
     */
    public function removeAssigneeProduct(\Duck\AssistantBundle\Entity\Price $assigneeProduct)
    {
        $this->assignee_product->removeElement($assigneeProduct);
    }

    /**
     * Get assignee_product
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAssigneeProduct()
    {
        return $this->assignee_product;
    }

    /**
     * Add shopping
     *
     * @param \Duck\AssistantBundle\Entity\Shopping $shopping
     * @return Product
     */
    public function addShopping(\Duck\AssistantBundle\Entity\Shopping $shopping)
    {
        $this->shopping[] = $shopping;

        return $this;
    }

    /**
     * Remove shopping
     *
     * @param \Duck\AssistantBundle\Entity\Shopping $shopping
     */
    public function removeShopping(\Duck\AssistantBundle\Entity\Shopping $shopping)
    {
        $this->shopping->removeElement($shopping);
    }

    /**
     * Get shopping
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getShopping()
    {
        return $this->shopping;
    }
}
