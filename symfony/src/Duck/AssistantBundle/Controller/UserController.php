<?php

namespace Duck\AssistantBundle\Controller;

use Duck\AssistantBundle\Form\UserType;
use Symfony\Component\HttpFoundation\Request;
use Duck\AssistantBundle\Entity\User;

class UserController extends BaseController
{

    public function createNewItem(){
        return new User();
    }

    public function createFormType(){
        return new UserType();
    }

    public function indexAction()
    {
        return $this->BaseList(
            'DuckAssistantBundle:User',
            'DuckAssistantBundle:User:index.html.twig'
        );
    }

    public function addAction(Request $request )
    {
        $form = $this->createForm($this->createFormType(),$this->createNewItem() );

        if($form->handleRequest($request)->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($form->getData());
            $entityManager->flush();

            return $this->redirectToRoute('duck_assistantBundle_user_index');
        }

        return $this->render('DuckAssistantBundle:User:form.html.twig', array(
            'form' => $form->createView()
        ));

    }

    public function editAction(Request $request, $id)
    {
        return  $this->BaseEdit(
            $request,
            $id,
            'DuckAssistantBundle:User:form.html.twig',
            'duck_assistantBundle_user_index',
            'DuckAssistantBundle:User'
        );
    }

    public function delAction($id)
    {
        return $this->BaseDelete(
            $id,
            'User not found in database',
            'duck_assistantBundle_user_index',
            'DuckAssistantBundle:User'
        );
    }

}
