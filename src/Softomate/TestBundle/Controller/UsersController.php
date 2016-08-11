<?php

namespace Softomate\TestBundle\Controller;

use FOS\RestBundle\View\View;
use Softomate\TestBundle\Entity\User;
use Softomate\TestBundle\Form\UserType;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\HttpFoundation\Request;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

class UsersController extends ResourceController
{

    /**
     * Show user with a given token.
     *
     * @ApiDoc(
     *  resource = true,
     *  requirements = {
     *      {
     *          "name"="token",
     *          "dataType"="string",
     *          "description"="User's token"
     *      }
     *  },
     *  output = {
     *      "class" = "Softomate\TestBundle\Entity\User",
     *      "groups" = {"Default", "user_full"},
     *      "parsers" = {"Nelmio\ApiDocBundle\Parser\JmsMetadataParser"}
     *  },
     *  statusCodes = {
     *    200 = "When user with given token exists",
     *    404 = "When user with given token does not exist"
     *  }
     * )
     */
    public function getUserAction($token)
    {
        $user = $this->getRepository()->findOneByToken($token);
        if (null === $user) {
            throw $this->createNotFoundException();
        }
        $view = $this->view($user);
        $view->getContext()
            ->addGroup('Default')
            ->addGroup('user_full');
        return $view;
    }


    /**
     * List all users.
     *
     * @ApiDoc(
     *  resource = true,
     *  output = {
     *      "class" = "Softomate\TestBundle\Entity\User",
     *      "collection" = true,
     *      "collectionName" = "users",
     *      "groups" = {"Default"},
     *      "parsers" = {"Nelmio\ApiDocBundle\Parser\CollectionParser", "Nelmio\ApiDocBundle\Parser\JmsMetadataParser"}
     *  }
     * )
     */
    public function getUsersAction()
    {
        $users = $this->getRepository()->findAll();
        $view = $this->view($users);
        $view->getContext()->addGroup('Default');
        return $view;
    }

    /**
     * Create a new user.
     *
     * @ApiDoc(
     *  resource = true,
     *  input = {
     *      "class" = "Softomate\TestBundle\Entity\User",
     *      "groups" = {"Default", "create_user"},
     *  },
     *  statusCodes = {
     *    201 = "When user created successfully",
     *    400 = "When something gone wrong, e.g. some parameters are invalid or another user with same name/email exists"
     *  }
     * )
     */
    public function postUsersAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm('Softomate\TestBundle\Form\UserType', $user);

        $form->handleRequest($request);
        if ($form->isValid()) {
            $this->getEntityManager()->persist($user);
            $this->getEntityManager()->flush();
            return $this->routeRedirectView('get_user', array('token' => $user->getToken()));
        }
        $errors = $form->getErrors(true);
        $view = $this->view(array(
            'code' => 400,
            'message' => iterator_to_array($errors),
        ), 400);
        return $view;
    }

    /**
     * Update an exiting user.
     *
     * @ApiDoc(
     *  resource = true,
     *  requirements = {
     *      {
     *          "name"="id",
     *          "dataType"="d+",
     *          "description"="User ID"
     *      }
     *  },
     *  input = {
     *      "class" = "Softomate\TestBundle\Entity\User",
     *      "groups" = {"Default", "create_user"},
     *  },
     *  statusCodes = {
     *    204 = "When user created successfully",
     *    400 = "When something gone wrong, e.g. some parameters are invalid or another user with same name/email exists",
     *    404 = "When user with a given ID does not exist"
     *  }
     * )
     */
    public function patchUserAction(Request $request, $id)
    {
        if (null === $user = $this->getRepository()->findOneById($id)) {
            throw $this->createNotFoundException();
        }
        $form = $this->createForm('Softomate\TestBundle\Form\UserType', $user, ['method' => 'PATCH']);

        $form->handleRequest($request);
        if ($form->isValid()) {
            $this->getEntityManager()->persist($user);
            $this->getEntityManager()->flush();
            return;
        }
        $errors = $form->getErrors(true);
        $view = $this->view(array(
            'code' => 400,
            'message' => iterator_to_array($errors),
        ), 400);
        return $view;
    }

    /**
     * Delete a user
     *
     * @ApiDoc(
     *  resource = true,
     *  requirements = {
     *      {
     *          "name"="id",
     *          "dataType"="d+",
     *          "description"="User ID"
     *      }
     *  },
     *  statusCodes = {
     *    204 = "When user was deleted successfully",
     *    404 = "When user with a given ID does not exist"
     *  }
     * )
     */
    public function deleteUserAction($id)
    {
        if (null === $user = $this->getRepository()->findOneById($id)) {
            throw $this->createNotFoundException();
        }
        $this->getEntityManager()->remove($user);
        $this->getEntityManager()->flush();
    }

    protected function getResourceClass()
    {
        return 'Softomate\TestBundle\Entity\User';
    }

}
