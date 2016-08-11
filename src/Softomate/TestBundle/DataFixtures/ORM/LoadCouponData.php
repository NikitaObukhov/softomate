<?php

namespace Softomate\TestBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Softomate\TestBundle\Entity\Coupon;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadCouponData implements FixtureInterface, ContainerAwareInterface, DependentFixtureInterface
{

    private $container;


    public function load(ObjectManager $manager)
    {
        $merchants = $manager->getRepository('Softomate\TestBundle\Entity\Merchant')->findAll();
        $codeGenerator = $this->container->get('softomate.coupon_code_generator');
        for($i = 0; $i < 100; $i++) {
            $coupon = new Coupon();
            $coupon->setTitle('Coupon #'. $i);
            $coupon->setCode($codeGenerator->generateCodeForCoupon($coupon));
            $randKey = array_rand($merchants);
            $coupon->setMerchant($merchants[$randKey]);
            $manager->persist($coupon);
        }
        $manager->flush();
    }
    /**
     * Sets the container.
     *
     * @param ContainerInterface|null $container A ContainerInterface instance or null
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * This method must return an array of fixtures classes
     * on which the implementing class depends on
     *
     * @return array
     */
    function getDependencies()
    {
        return array('Softomate\TestBundle\DataFixtures\ORM\LoadMerchantData');
    }
}