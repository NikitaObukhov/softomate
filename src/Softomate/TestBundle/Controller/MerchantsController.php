<?php

namespace Softomate\TestBundle\Controller;

use Nelmio\ApiDocBundle\Annotation\ApiDoc;

class MerchantsController extends ResourceController
{


    /**
     * List all merchants.
     *
     * @ApiDoc(
     *  resource = true,
     *  output = {
     *      "class" = "Softomate\TestBundle\Entity\Merchant",
     *      "collection" = true,
     *      "collectionName" = "merchants",
     *      "groups" = {"Default"},
     *      "parsers" = {"Nelmio\ApiDocBundle\Parser\CollectionParser", "Nelmio\ApiDocBundle\Parser\JmsMetadataParser"}
     *  }
     * )
     */
    public function getMerchantsAction() 
    {
        $merchants = $this->getRepository()->findAll();
        $view = $this->view($merchants);
        return $view;
    }

    /**
     * Show merchant with a given ID.
     *
     * @ApiDoc(
     *  resource = true,
     *  requirements = {
     *      {
     *          "name"="id",
     *          "dataType"="integer",
     *          "description"="Merchant ID"
     *      }
     *  },
     *  output = {
     *      "class" = "Softomate\TestBundle\Entity\Merchant",
     *      "groups" = {"Default", "merchant_full"},
     *      "parsers" = {"Nelmio\ApiDocBundle\Parser\JmsMetadataParser"}
     *  },
     *  statusCodes = {
     *    200 = "When merchant exists",
     *    404 = "When merchant with a given ID does not exist"
     *  }
     * )
     */
    public function getMerchantAction($id)
    {
        if (null === $merchant = $this->getRepository()->findOneById($id))
        {
            throw $this->createNotFoundException();
        }
        $view = $this->view($merchant);
        $view->getContext()->setGroups(array('Default', 'merchant_full'));
        return $view;
    }

    /**
     * Delete a mercahnt
     *
     * @ApiDoc(
     *  resource = true,
     *  requirements = {
     *      {
     *          "name"="id",
     *          "dataType"="d+",
     *          "description"="Merchant ID"
     *      }
     *  },
     *  statusCodes = {
     *    204 = "When merchant was deleted successfully",
     *    404 = "When merchant with a given ID does not exist"
     *  }
     * )
     */
    public function deleteMerchantAction($id)
    {
        if (null === $merchant = $this->getRepository()->findOneById($id))
        {
            throw $this->createNotFoundException();
        }
        $this->getEntityManager()->remove($merchant);
        $this->getEntityManager()->flush();
    }

    protected function getResourceClass()
    {
        return 'Softomate\TestBundle\Entity\Merchant';
    }
}