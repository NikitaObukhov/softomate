<?php

namespace Softomate\TestBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Softomate\TestBundle\Entity\User;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadUserData implements FixtureInterface, ContainerAwareInterface, DependentFixtureInterface
{

    private $container;

    public function load(ObjectManager $manager)
    {
        $coupons = $manager->getRepository('Softomate\TestBundle\Entity\Coupon')->findAll();
        $tokenGenerator = $this->container->get('softomate.token_generator');
        $j = 0;
        for($i = 0; $i < 50; $i++)
        {
            $user = new User();
            $user->setName('user__' . $i);
            $user->setMail($user->getName() . '@foo.bar');
            $user->setPass('123');
            $user->setToken($tokenGenerator->generateToken());

            $userCouponsNum = mt_rand(0, 5); // Give user from 0 to 5 coupons.
            for($k = 0; $k < $userCouponsNum; $k++)
            {
               ++$j;
                do
                {
                    $couponKey = array_rand($coupons);
                    $coupon = $coupons[$couponKey];
                } while($user->hasCoupon($coupon));
                $user->addCoupon($coupon);
            }
            $manager->persist($user);
            if ($j % 100 == 0) {
                $manager->flush();
                $j = 0;
            }
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
        return array('Softomate\TestBundle\DataFixtures\ORM\LoadCouponData');
    }
}