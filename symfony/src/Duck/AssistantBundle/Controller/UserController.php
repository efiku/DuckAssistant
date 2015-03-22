<?php

namespace Duck\AssistantBundle\Controller;

use Duck\AssistantBundle\Form\UserType;
use Duck\AssistantBundle\Interfaces\ContrInterfaces;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Duck\AssistantBundle\Entity\User;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class UserController extends Controller implements  ContrInterfaces
{

    public function createNewItem(){
        return new User();
    }

    public function createFormType(){
        return new UserType();
    }

    public function getDoctrimeManager(){
        return $this->getDoctrine()->getManager();
    }

    public function getDoctrimeRepository($repository) {
        return $this->getDoctrine()->getRepository($repository);
    }

    public function indexAction()
    {
        $repository = $this->getDoctrimeRepository('DuckAssistantBundle:User');

        return $this->render('DuckAssistantBundle:User:index.html.twig',  array(
        'list' => $repository->findAll()
        ));

    }

    public function addAction(Request $request )
    {
        $form = $this->createForm($this->createFormType(),$this->createNewItem() );

        if($form->handleRequest($request)->isValid())
        {
            $entity = $form->getData();

            $this->getDoctrimeManager()->persist($entity);
            $this->getDoctrimeManager()->flush();

            return $this->redirectToRoute('duck_assistantBundle_cat_Lists');
        }

        return $this->render( 'DuckAssistantBundle:User:form.html.twig' , array(
            'form' => $form->createView()
        ));
    }

    public function editAction(Request $request, User $user)
    {
        $form = $this->createForm( $this->createFormType(), $user);

        if($form->handleRequest($request)->isValid()){
            $this->getDoctrimeManager()->flush();
            return $this->redirectToRoute('duck_assistantBundle_user_index');
        }

        return $this->render('DuckAssistantBundle:User:form.html.twig', array(
            'form' => $form->createView()
        ));
    }


    public function delAction(User $user)
    {
        if( null == $user){
            throw $this->createNotFoundException();
        }

        $this->getDoctrimeManager()->remove($user);
        $this->getDoctrimeManager()->flush();

        return $this->redirectToRoute('duck_assistantBundle_user_index');
    }

}
