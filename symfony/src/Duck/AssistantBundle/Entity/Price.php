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
 * @ORM\Table(name="Price")
 */
class Price {
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="integer")
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="assignee_product")
     * @ORM\JoinColumn(name="assignee_product_id", referencedColumnName="id", nullable=true, onDelete="SET NULL")
     */
    protected $product;
    /**
     * @ORM\Column(type="integer")
     * @ORM\ManyToOne(targetEntity="Shops", inversedBy="assignee_shop")
     * @ORM\JoinColumn(name="assignee_shop_id", referencedColumnName="id", nullable=true, onDelete="SET NULL")
     */
    protected $shop;

    /**
     * @ORM\Column(type="integer")
     */
    protected $price;


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
     * Set product
     *
     * @param integer $product
     * @return Price
     */
    public function setProduct($product)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return integer 
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Set shop
     *
     * @param integer $shop
     * @return Price
     */
    public function setShop($shop)
    {
        $this->shop = $shop;

        return $this;
    }

    /**
     * Get shop
     *
     * @return integer 
     */
    public function getShop()
    {
        return $this->shop;
    }

    /**
     * Set price
     *
     * @param integer $price
     * @return Price
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return integer 
     */
    public function getPrice()
    {
        return $this->price;
    }
}
