<?php

namespace Softomate\TestBundle\Entity;

/**
 * User
 */
class User
{
    /**
     * Unique user name
     *
     * @var string
     */
    private $name;

    /**
     * User password
     *
     * @var string
     */
    private $pass;

    /**
     * User email address
     *
     * @var string
     */
    private $mail;

    /**
     * When user was created
     *
     * @var \DateTime
     */
    private $createdAt;

    /**
     * Automatically generated token
     *
     * @var string
     */
    private $token;

    /**
     * Primary identifier of a user
     *
     * @var integer
     */
    private $id;

    /**
     * List of user co
     *
     * @var \Doctrine\Common\Collections\Collection
     */
    private $coupons;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->coupons = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set name
     *
     * @param string $name
     *
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
     * Set pass
     *
     * @param string $pass
     *
     * @return User
     */
    public function setPass($pass)
    {
        $this->pass = $pass;

        return $this;
    }

    /**
     * Get pass
     *
     * @return string
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * Set mail
     *
     * @param string $mail
     *
     * @return User
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
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
     * Set token
     *
     * @param string $token
     *
     * @return User
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Get token
     *
     * @return string
     */
    public function getToken()
    {
        return $this->token;
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
     * Add coupon
     *
     * @param \Softomate\TestBundle\Entity\Coupon $coupon
     *
     * @return User
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

    public function hasCoupon(\Softomate\TestBundle\Entity\Coupon $coupon) {
        return $this->coupons->contains($coupon);
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

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return User
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
