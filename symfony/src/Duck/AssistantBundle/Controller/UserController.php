<?php

namespace Duck\AssistantBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Duck\AssistantBundle\Entity\User;
use Duck\AssistantBundle\Form\UserType;

class UserController extends Controller
{
    public function indexAction()
    {
        return $this->render('DuckAssistantBundle:User:index.html.twig', array(
                // ...
            ));    }

    public function addAction(Request $request )
    {
        $user = new User();
        $form = $this->createForm( new UserType(), $user);

        if($form->handleRequest($request)->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('duck_assistantBundle_user_index');
        }
        return $this->render('DuckAssistantBundle:User:form.html.twig', array(
                'form' => $form->createView()
            ));    }

    public function delAction()
    {
        return $this->render('DuckAssistantBundle:User:del.html.twig', array(
                // ...
            ));    }

    public function editAction()
    {
        return $this->render('DuckAssistantBundle:User:form.html.twig', array(
                // ...
            ));    }

}
