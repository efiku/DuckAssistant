<?php
/**
 * Created by PhpStorm.
 * User: efik
 * Date: 21.03.15
 * Time: 11:11
 */

namespace Duck\AssistantBundle\lists;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;


class ListProvider {

    private $entityManager;
    private $tokenStorage;

    public function  __construct(ObjectManager $entityManager, TokenStorageInterface $tokenStorage )
    {
            $this->entityManager = $entityManager;
            $this->tokenStorage = $tokenStorage;
    }

    public function getProviderLists($repo){

       $repo =  $this->entityManager->getRepository($repo);
       $token = $this->tokenStorage->getToken();

        if( NULL != $token && NULL != $token->getUser()  && 'anon.' != $token->getUser()){
            return $repo->findBy(array( 'createdBy' => $token->getUser()) );
        }
        return $repo->findAll();
    }
    public function getProvidersAll( $repo ){
        $repo =  $this->entityManager->getRepository($repo);
        return $repo->findAll();
    }
}