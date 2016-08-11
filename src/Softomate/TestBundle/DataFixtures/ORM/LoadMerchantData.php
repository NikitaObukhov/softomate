<?php

namespace Softomate\TestBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Softomate\TestBundle\Entity\Merchant;

class LoadMerchantData implements FixtureInterface
{

    public function load(ObjectManager $manager)
    {
        for($i = 0; $i < 10; $i++) {
            $merchant = new Merchant();
            $merchant->setName('Merchant #'. $i);
            $manager->persist($merchant);
        }
        $manager->flush();
    }
}