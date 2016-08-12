<?php

namespace Softomate\TestBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

class UserCouponsController extends FOSRestController
{

    /**
     * List coupons of a given user.
     *
     * @ApiDoc(
     *  resource = true,
     *  requirements = {
     *      {
     *          "name"="id",
     *          "dataType"="integer",
     *          "description"="ID of a user whose coupons to get"
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
     *    200 = "When user with a given ID exists",
     *    404 = "When user with a given ID does not exist"
     *  }
     * )
     */
    public function getCouponsAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        if (null === $user = $em->getRepository('Softomate\TestBundle\Entity\User')->findOneById($id))
        {
            throw $this->createNotFoundException();
        }
        /* @var $user \Softomate\TestBundle\Entity\User */
        return $this->view($user->getCoupons());
    }


}