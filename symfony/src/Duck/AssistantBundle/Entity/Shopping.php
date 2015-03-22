<?php
/**
 * Created by PhpStorm.
 * User: Lukasz
 * Date: 2015-03-22
 * Time: 12:16
 */
namespace Duck\AssistantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Shopping")
 */
class Shopping
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $createdAt;

    /**
     * @ORM\ManyToMany(targetEntity="Product", inversedBy="shopping")
     * @ORM\JoinTable(name="product_shopping")
     **/
    private $products;


    public function __construct() {
        $this->products = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Shopping
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
     * Add products
     *
     * @param \Duck\AssistantBundle\Entity\Product $products
     * @return Shopping
     */
    public function addProduct(\Duck\AssistantBundle\Entity\Product $products)
    {
        $this->products[] = $products;

        return $this;
    }

    /**
     * Remove products
     *
     * @param \Duck\AssistantBundle\Entity\Product $products
     */
    public function removeProduct(\Duck\AssistantBundle\Entity\Product $products)
    {
        $this->products->removeElement($products);
    }

    /**
     * Get products
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProducts()
    {
        return $this->products;
    }
}
