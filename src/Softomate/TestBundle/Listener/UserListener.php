<?php

namespace Softomate\TestBundle\Listener;

use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use Softomate\TestBundle\Entity\User;
use Softomate\TestBundle\Utils\TokenGenerator;

class UserListener {

    private $tokenGenerator;

    public function __construct(TokenGenerator $tokenGenerator)
    {
        $this->tokenGenerator = $tokenGenerator;
    }

    public function prePersist(LifecycleEventArgs $args)
    {
        $user = $args->getObject();
        if (false === $user instanceof User) {
            throw new \InvalidArgumentException(sprintf('Expected User, got %s', get_class($user)));
        }
        $user->setToken($this->tokenGenerator->generateToken());
    }
}