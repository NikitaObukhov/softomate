<?php

namespace Softomate\TestBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

class MerchantCouponsController extends FOSRestController
{

     /**
     * List coupons of a given merchant.
     *
     * @ApiDoc(
     *  resource = true,
     *  requirements = {
     *      {
     *          "name"="id",
     *          "dataType"="integer",
     *          "description"="ID of a merchant which coupons to get"
     *      }
     *  },
     *  output = {
     *      "class" = "Softomate\TestBundle\Entity\Coupon",
     *      "collection" = true,
     *      "collectionName" = "coupons",
     *      "groups" = {"Default"},
     *      "parsers" = {"Nelmio\ApiDocBundle\Parser\CollectionParser", "Nelmio\ApiDocBundle\Parser\JmsMetadataParser"}
     *  },
     *  statusCodes = {
     *    200 = "When merchant with a given ID exists",
     *    404 = "When merchant with a given ID does not exist"
     *  }
     * )
     */
    public function getCouponsAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        if (null === $merchant = $em->getRepository('Softomate\TestBundle\Entity\Merchant')->findOneById($id))
        {
            throw $this->createNotFoundException();
        }
        /* @var $merchant \Softomate\TestBundle\Entity\Merchant */
        return $this->view($merchant->getCoupons());
    }

}