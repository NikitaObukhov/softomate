<?php

namespace Softomate\TestBundle\Entity;

/**
 * Merchant
 */
class Merchant
{
    /**
     * Merchant name
     *
     * @var string
     */
    private $name;

    /**
     * Merchant description
     *
     * @var string
     */
    private $description;

    /**
     * Merchant unique ID
     *
     * @var integer
     */
    private $id;

    /**
     * List of merchant coupons
     * 
     * @var \Doctrine\Common\Collections\Collection
     */
    private $coupons;

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Merchant
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
     * Set description
     *
     * @param string $description
     *
     * @return Merchant
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->coupons = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add coupon
     *
     * @param \Softomate\TestBundle\Entity\Coupon $coupon
     *
     * @return Merchant
     */
    public function addCoupon(\Softomate\TestBundle\Entity\Coupon $coupon)
    {
        $this->coupons[] = $coupon;

        return $this;
    }

    /**
     * Remove coupon
     *
     * @param \Softomate\TestBundle\Entity\Coupon $coupon
     */
    public function removeCoupon(\Softomate\TestBundle\Entity\Coupon $coupon)
    {
        $this->coupons->removeElement($coupon);
    }

    /**
     * Get coupons
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCoupons()
    {
        return $this->coupons;
    }
}
