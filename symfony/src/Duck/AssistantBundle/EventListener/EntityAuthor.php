<?php
/**
 * Created by PhpStorm.
 * User: efik
 * Date: 22.03.15
 * Time: 01:54
 */

namespace Duck\AssistantBundle\EventListener;


use Doctrine\ORM\Event\LifecycleEventArgs;
use Duck\AssistantBundle\Interfaces\EntityAuthorInterface;
use Symfony\Component\Security\Acl\Exception\Exception;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class EntityAuthor {

    protected $tokenStorageInterface;
    public function __construct(TokenStorageInterface $tokenStorageInterface)
    {
        $this->tokenStorageInterface = $tokenStorageInterface;
    }

    public function prePersist(LifecycleEventArgs $args)
    {

        $entity = $args->getEntity();
        //$em = $args->getEntityManager();
        $token = $this->tokenStorageInterface->getToken();
        if($entity instanceof EntityAuthorInterface) {
            try {
                if ($token) {

                    $entity->setCreatedBy($token->getUser());
                }
            } catch (Exception $e) {
                throw new Exception('User not logged');
            }
        }
    }
}