<?php

namespace Softomate\TestBundle\Utils;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Softomate\TestBundle\Entity\Coupon;

class CouponCodeGenerator
{

    private $repository;
    
    private $length;

    public function __construct(EntityManager $em, $length)
    {
        $this->repository = $em->getRepository('Softomate\TestBundle\Entity\Coupon');
        $this->length = $length;
    }

    public function generateCodeForCoupon(Coupon $coupon)
    {
        do 
        {
            $bytes = random_bytes($this->length);
            $string = bin2hex($bytes);
            $code = substr($string, 0, $this->length);
            $existWithSameCode = null !== $this->repository->findOneByCode($code);
        } while($existWithSameCode);
        return $code;
    }
}